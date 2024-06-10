<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

use Illuminate\Support\Facades\Mail;
use App\Mail\NewsletterSubscription;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->take(3)->get();
        $trendingProducts = Product::where('trending', true)->orderBy('created_at', 'desc')->take(3)->get();
        return view('users.home', compact('products', 'trendingProducts'));
    }
    

    public function strayusers()
    {
        return view('strayusers');
    }
    public function subscribe(Request $request)
    {
        $email = $request->input('email');

        // Gửi email
        Mail::to($email)->send(new NewsletterSubscription());

        // Hiển thị thông báo thành công
        return view('thankyou');
    }
    public function thankyou(){

        return view('thankyou');
    }
}
