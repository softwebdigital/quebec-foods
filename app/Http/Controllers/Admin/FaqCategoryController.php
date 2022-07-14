<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FaqCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FaqCategoryController extends Controller
{
    //
    public function index()
    {
        $faqCategories = FaqCategory::query()->get();
        return view('admin.faq.category', compact('faqCategories'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category' => ['required']
        ]);
        if($validator->fails()){
            return back()->withErrors($validator)->withInput()->with('error', 'Invalid Input data');
        }
        // Collect data from request.
        $data['name'] = $request['category'];

        // Store category.
        if(FaqCategory::create($data)){
            return redirect()->route('admin.faq.category')->with('success', 'Category created Successfully');
        }
        return back()->with('error', 'Error creating Category');

    }

    public function update(Request $request, FaqCategory $faqCategory)
    {
        $validator = Validator::make($request->all(), [
            'category' => ['required', 'unique:faq_categories,name,'.$faqCategory['id']]
        ]);
        if($validator->fails()){
            return back()->withErrors($validator)->withInput()->with('error', 'Invalid Input data');
        }
        // Collect data from request.
        $data['name'] = $request['category'];

        // Store category.
        if($faqCategory->update($data)){
            return redirect()->route('admin.faq.category')->with('success', 'Category updated Successfully');
        }
        return back()->with('error', 'Error updating Category');

    }

    public function destroy(FaqCategory $faqCategory)
    {
        if($faqCategory->delete()){
            return redirect()->route('admin.faq.category')->with('success', 'Category deleted Successfully');
        }
        return back()->with('error', 'Error deleting Category');
    }
}

