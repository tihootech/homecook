<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Slide;

class WebsiteController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('master');
	}

    public function general_management()
    {
		$website = website();
    	return view('dashboard.website.general', compact('website'));
    }

    public function settings()
    {
		$settings = settings();
    	return view('dashboard.website.settings', compact('settings'));
    }

    public function slides()
    {
		$pages = Slide::$pages;
		$slides_list = [];
		foreach ($pages as $page => $persian) {
			$slides_list[$page] = Slide::wherePage($page)->get();
		}
    	return view('dashboard.website.slides', compact('slides_list', 'pages'));
    }

	public function update_settings(Request $request)
	{
		$data = $request->validate([
			'peyk_share' => 'required|integer',
			'tax' => 'required|integer|min:1|max:99',
			'added_price' => 'required|integer|min:1|max:99',
			'deliver_type' => 'required',
		]);
		$settings = settings();
		$settings->update($data);
		return back()->withMessage(__('SUCCESS'));
	}

	public function update_website(Request $request)
	{

		// init vars
		$data = $request->all();
		$website = website();

		// unset data
		unset($data['_token']);
		unset($data['_method']);

		// cols
		$incoming_cols = prepare_multiple($data['cols']);
		$cols = [];
		foreach ($incoming_cols as $incoming_col) {
			$cols []= implode('&&', $incoming_col);
		}
		$data['cols'] = implode('&&&', $cols);

		// images
		if ( isset($data['about_image']) && $data['about_image'] ) {
            $data['about_image'] = upload($data['about_image'], $website->about_image);
        }
		if ( isset($data['statics_image']) && $data['statics_image'] ) {
            $data['statics_image'] = upload($data['statics_image'], $website->statics_image);
        }
		if ( isset($data['testimonial_image']) && $data['testimonial_image'] ) {
            $data['testimonial_image'] = upload($data['testimonial_image'], $website->testimonial_image);
        }

		// action
		$website->update($data);
		return back()->withMessage(__('SUCCESS'));

	}

	public function store_slides(Request $request)
	{
		$data = self::slide_validation(new Slide);
		Slide::create($data);
		return back()->withMessage(__('SUCCESS'));
	}

	public function edit_slides(Slide $slide)
	{
		return view('dashboard.website.edit_slides', compact('slide'));
	}

	public function update_slides(Slide $slide, Request $request)
	{
		$data = self::slide_validation($slide);
		$slide->update($data);
		return redirect()->route('website.slides')->withMessage(__('SUCCESS'));
	}

	public function destroy_slides(Slide $slide)
	{
		$slide->delete();
		return back()->withMessage(__('SUCCESS'));
	}

	public static function slide_validation($slide)
	{
		$data = request()->validate([
			'page' => [Rule::requiredIf(!$slide->id)],
			'title' => 'nullable',
			'english_word' => 'nullable',
			'subtitle' => 'nullable',
			'path' => [Rule::requiredIf(!$slide->id), 'image'],
		]);

		if ( isset($data['path']) && $data['path'] ) {
            $data['path'] = upload($data['path'], $slide->path);
        }

		return $data;
	}

}
