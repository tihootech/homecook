<?php

namespace App\Http\Controllers;

use App\Cat;
use App\Food;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CatController extends Controller
{

    public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('master');
	}

    public function index()
    {
        $food = Cat::whereType('food')->get();
        $product = Cat::whereType('product')->get();
        $types = ['food', 'product'];
        return view('dashboard.cats.index', compact('food', 'product', 'types'));
    }

    public function store(Request $request)
    {
        $data = self::validation();
        Cat::create($data);
        return back()->withMessage(__('SUCCESS'));
    }

    public function update(Request $request, Cat $cat)
    {
        $data = self::validation(false);
        $cat->update($data);
        return back()->withMessage(__('SUCCESS'));
    }

    public function destroy(Cat $cat)
    {
        if ($cat->type == 'food' || $cat->type == 'product') {
            Food::where('cat_id', $cat->id)->update([
                'cat_id' => 0
            ]);
        }
        $cat->delete();
        return back()->withMessage(__('SUCCESS'));
    }

    public static function validation($new=true)
    {
        return request()->validate([
            'title'=>'required',
            'type'=>[
                Rule::requiredIf($new),
                Rule::in(['product', 'food'])
            ],
        ]);
    }
}
