<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class StaticPageController extends Controller
{
    public function home(): View
    {
        return view('static.home');
    }

    public function about(): View
    {
        return view('static.about');
    }

    public function contact(): View
    {
        return view('static.contact');
    }

    public function faq(): View
    {
        return view('static.faq');
    }

    public function farm(): View
    {
        return view('static.farm-estate');
    }

    public function privacy(): View
    {
        return view('static.privacy-policy');
    }

    public function plant(): View
    {
        return view('static.processing-plant');
    }

    public function terms(): View
    {
        return view('static.terms');
    }

    public function tractor(): View
    {
        return view('static.tractor-investment');
    }
}
