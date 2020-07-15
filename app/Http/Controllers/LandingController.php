<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Food;
use App\Cook;
use App\Transaction;
use App\TransactionItem;
use App\User;
use App\Cat;
use App\Slide;
use App\Review;
use App\City;
use App\State;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $website = website();
        $blogs = Blog::latest()->take(3)->get();
        $reviews = Review::whereAccepted(1)->whereNotNull('body')->inRandomOrder()->take(5)->get();
        $foods = Food::inRandomOrder()->whereConfirmed(1)->whereType('food')->take(4)->get();
        $products = Food::inRandomOrder()->whereType('product')->take(3)->get();
        $slides = Slide::wherePage('home_page')->get();
        $counts = [
            'cooks' => Cook::count(),
            'foods' => Food::count(),
            'orders' => TransactionItem::sum('count'),
            'users' => User::count(),
        ];
    	return view('landing.index', compact('blogs', 'foods', 'products', 'counts', 'website', 'slides', 'reviews'));
    }

    public function new_cook()
    {
        $slides = Slide::wherePage('new_cook')->get();
        $states = State::all();
        $cities = City::where('state_id', 22)->get();
        return view('landing.new_cook', compact('slides', 'cities', 'states'));
    }

    public function show_cook($name, $uid)
    {
        $cook = Cook::whereUid($uid)->firstOrFail();
        return view('landing.show_cook', compact('cook'));
    }

    public function show_food($title, $uid)
    {
        $food = Food::whereUid($uid)->whereConfirmed(1)->firstOrFail();
        $food->increment('seens');
        return view('landing.show_food', compact('food'));
    }

    public function search(Request $request)
    {
        $food = $request->f;
        $foods = Food::getList();
        $foods = $foods->whereConfirmed(1)->where('title', 'like', "%$food%")->paginate(9);
        return view('landing.search', compact('foods'));
    }

    public function order($order = 1, Request $request)
    {
        $type = rn() == 'order_food' ? 'food' : 'product';
        $slides = Slide::wherePage(rn())->get();
        $cats = Cat::whereType($type)->get();

        $foods = Food::getList();

        $foods = $foods->whereConfirmed(1)->whereType($type);
        if ($request->t) {
            $foods = $foods->where('title', 'like', "%$request->t%");
        }
        if ($request->c && is_array($request->c) && count($request->c)) {
            $foods = $foods->whereIn('cat_id', $request->c);
        }
        $food_count = $foods->count();

        if ($order == 1) {
            // best
            $foods = $foods->orderBy('rate', 'DESC');
        }elseif ($order == 2) {
            // most expensive
            $foods = $foods->orderBy('cost', 'DESC');
        }elseif ($order == 3) {
            // cheapest
            $foods = $foods->orderBy('cost', 'ASC');
        }elseif ($order == 4) {
            // best selling
            $foods = $foods->orderBy('sells', 'DESC');
        }elseif ($order == 5) {
            // latest
            $foods = $foods->latest();
        }elseif ($order == 6) {
            // most discount
            $foods = $foods->where('discount', '<>', '0')->orderBy('discount', 'DESC');
        }

        $foods = $foods->groupBy('foods.id')->paginate(9);

        return view('landing.order', compact('foods', 'food_count', 'order', 'cats', 'slides'));
    }

    public function blogs(Request $request)
    {
        // init vars
        $slides = Slide::wherePage('blogs')->get();
        $count = Blog::count();

        // prepare query
        $blogs = Blog::query();

        if ($phrase = $request->search) {
            $blogs = $blogs->where(function ($query) use ($phrase) {
                $query->orWhere('title', 'like', "%$phrase%")->orWhere('subtitle', 'like', "%$phrase%")->orWhere('tags', 'like', "%$phrase%");
            });
        }

        $blogs = $blogs->paginate(9);
        return view('landing.blogs', compact('blogs', 'count', 'slides'));
    }

    public function show_blog($title)
    {
        $blog = Blog::whereTitle(raw($title))->firstOrFail();
        $blog->increment('seens');
        return view('landing.blog', compact('blog'));
    }

    public function message()
    {
        $slides = Slide::wherePage('message')->get();
        $message = session('message');
        return view('landing.message', compact('message', 'slides'));
    }

    public function view_transaction($type, $tuid, $cuid=null)
    {
        $transaction = Transaction::whereUid($tuid)->firstOrFail();
        $list = ['peyk', 'customer', 'cook', 'master'];
        $cook = Cook::whereUid($cuid)->first();
        if ( !in_array($type, $list) || ($type == 'cook' && !$cook) ) {
            abort(404);
        }
        return view('landing.view_transaction', compact('transaction', 'type', 'cook'));
    }

    public function rnr()
    {
        return view('landing.rnr');
    }
}
