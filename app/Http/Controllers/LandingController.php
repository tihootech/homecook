<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Food;
use App\Cook;
use App\TransactionItem;
use App\User;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->take(3)->get();
        $foods = Food::inRandomOrder()->take(4)->get();
        $counts = [
            'cooks' => Cook::count(),
            'foods' => Food::count(),
            'orders' => TransactionItem::sum('count'),
            'users' => User::count(),
        ];
    	return view('landing.index', compact('blogs', 'foods', 'counts'));
    }

    public function new_cook()
    {
        return view('landing.new_cook');
    }

    public function show_cook($name, $uid)
    {
        $cook = Cook::whereUid($uid)->firstOrFail();
        return view('landing.show_cook', compact('cook'));
    }

    public function show_food($title, $uid)
    {
        $food = Food::whereUid($uid)->firstOrFail();
        $food->increment('seens');
        return view('landing.show_food', compact('food'));
    }

    public function order_food($order = 1, Request $request)
    {
        $foods = Food::select( '*',
             \DB::raw('(price - ROUND((price * discount) / 100, 2 )) AS f_cost'),
             \DB::raw('RAND()*5 AS f_rate'),
             \DB::raw('RAND()*100 AS f_sells')
        );

        $foods = $foods->whereConfirmed(1);
        if ($phrase = $request->t) {
            $foods = $foods->where('title', 'like', "%$phrase%");
        }
        $food_count = $foods->count();

        if ($order == 1) {
            // best
            $foods = $foods->orderBy('f_rate', 'DESC');
        }elseif ($order == 2) {
            // most expensive
            $foods = $foods->orderBy('f_cost', 'DESC');
        }elseif ($order == 3) {
            // cheapest
            $foods = $foods->orderBy('f_cost', 'ASC');
        }elseif ($order == 4) {
            // best selling
            $foods = $foods->orderBy('f_sells', 'DESC');
        }elseif ($order == 5) {
            // latest
            $foods = $foods->latest();
        }elseif ($order == 6) {
            // most discount
            $foods = $foods->where('discount', '<>', '0')->orderBy('discount', 'DESC');
        }

        $foods = $foods->paginate(9);

        return view('landing.order_food', compact('foods', 'food_count', 'order'));
    }

    public function blogs(Request $request)
    {
        // init vars
        $count = Blog::count();

        // prepare query
        $blogs = Blog::query();

        if ($phrase = $request->search) {
            $blogs = $blogs->where(function ($query) use ($phrase) {
                $query->orWhere('title', 'like', "%$phrase%")->orWhere('subtitle', 'like', "%$phrase%")->orWhere('tags', 'like', "%$phrase%");
            });
        }

        $blogs = $blogs->paginate(9);
        return view('landing.blogs', compact('blogs', 'count'));
    }

    public function show_blog($title)
    {
        $blog = Blog::whereTitle(raw($title))->firstOrFail();
        $blog->increment('seens');
        return view('landing.blog', compact('blog'));
    }

    public function message()
    {
        $message = session('message');
        return view('landing.message', compact('message'));
    }
}
