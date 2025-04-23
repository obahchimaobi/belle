<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    //
    public function home()
    {
        return view('home');
    }

    public function shop()
    {
        return view('pages.shop');
    }

    public function wishlist()
    {
        return view('pages.wishlist');
    }

    public function about_us()
    {
        return view('pages.about');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function faq()
    {
        return view('pages.faq');
    }
}
