<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\FaqCategory;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    //
    public function index()
    {
        $faqCategories = FaqCategory::with('faqs')->get();
        return view("user.faq.index", compact('faqCategories'));
    }
}
