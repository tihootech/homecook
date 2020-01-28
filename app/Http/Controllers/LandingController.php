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
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $website = website();
        $blogs = Blog::latest()->take(3)->get();
        $reviews = Review::whereAccepted(1)->whereNotNull('body')->inRandomOrder()->take(5)->get();
        $foods = Food::inRandomOrder()->whereType('food')->take(4)->get();
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
        return view('landing.new_cook', compact('slides'));
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

    public function order($order = 1, Request $request)
    {
        $type = rn() == 'order_food' ? 'food' : 'product';
        $slides = Slide::wherePage(rn())->get();
        $cats = Cat::whereType($type)->get();

        $foods = Food::select(
            'foods.*',
            \DB::raw('(price - ROUND((price * discount) / 100, 2 )) AS cost'),
            \DB::raw('CASE WHEN AVG(reviews.rate) IS NULL THEN 0 ELSE AVG(reviews.rate) END AS rate'),
            \DB::raw('SUM(transaction_items.count) AS sells')
        )->leftJoin('reviews', 'foods.id', '=', 'reviews.food_id')
        ->leftJoin('transaction_items', 'foods.id', '=', 'transaction_items.food_id');

        // TODO: check and fix sells attribute

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

    public function peyk_view_transaction($tuid)
    {
        $transaction = Transaction::whereUid($tuid)->firstOrFail();
        return view('landing.peyk', compact('transaction'));
    }
}
