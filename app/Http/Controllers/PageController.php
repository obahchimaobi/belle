<?php

namespace App\Http\Controllers;

use App\Models\Products;

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

    public function product_details($slug)
    {
        $get_slug = Products::where('slug', $slug)->firstOrFail();

        return view('pages.product-details', compact('get_slug'));
    }
}
