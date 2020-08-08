<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Competition;

class CompetitionController extends Controller
{

    public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('master');
	}

    public function index()
    {
        $compts = Competition::latest()->paginate(20);
        return view('dashboard.compt.index', compact('compts'));
    }

    public function show(Competition $compt)
    {
        return view('dashboard.compt.show', compact('compt'));
    }

    public function create()
    {
        $compt = new Competition;
        return view('dashboard.compt.form', compact('compt'));
    }

    public function store(Request $request)
    {
        $data = self::validation();
        Competition::create($data);
        return redirect()->route('compt.index')->withMessage( __('SUCCESS') );
    }

    public function edit(Competition $compt)
    {
        return view('dashboard.compt.form', compact('compt'));
    }

    public function update(Competition $compt, Request $request)
    {
        $data = self::validation();
        $compt->update($data);
        return redirect()->route('compt.index')->withMessage( __('SUCCESS') );
    }

    public function destroy(Competition $compt)
    {
        $compt->delete();
        return redirect()->route('compt.index')->withMessage( __('SUCCESS') );
    }

    public function set_winners(Competition $compt, Request $request)
    {
        for ($i=1; $i <= 3 ; $i++) {
            $var = "rank_{$i}";
            $compt->$var = $request->$var;
        }
        $compt->save();
        return back()->withMessage(__('SUCCESS'));
    }

    public static function validation()
    {
        $data =  request()->validate([
            'title' => 'required|string',
            'date' => 'required|string',
            'info' => 'required|string',
        ]);

        $data['date'] = persian_to_carbon($data['date']);

        return $data;
    }
}
