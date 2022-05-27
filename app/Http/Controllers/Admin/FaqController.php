<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\FaqCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FaqController extends Controller
{
    public function index()
    {
        $faqCategories = FaqCategory::with('faqs')->get();
        return view("admin.faq.index", compact('faqCategories'));
    }

    public function edit(Faq $faq)
    {
        $faqCategories = FaqCategory::query()->get();
        return view('admin.faq.edit', compact('faq', 'faqCategories'));
    }

    public function create()
    {
        $faqCategories = FaqCategory::query()->get();
        return view('admin.faq.create', compact('faqCategories'));
    }

    public function store(Request $request)
    {
        // Validate request
        $validator = Validator::make($request->all(), [
            'category' => ['required', 'exists:faq_categories,name'],
            'question' => ['required', 'unique:faqs,question'],
            'answer' => ['required'],
        ]);
        if ($validator->fails()){
            return back()->withErrors($validator)->withInput()->with('error', 'Invalid input data');
        }
        $category = FaqCategory::query()->where('name', request('category'))->first();
        // Store package
        if ( $category->faqs()->create(['question' => request('question'), 'answer' => request('answer')])){
            return redirect()->route('admin.faq')->with('success', 'Question created successfully');
        }
        return back()->with('error', 'Error creating question');
    }

    public function update(Request $request, Faq $faq)
    {
        // Validate request
        $validator = Validator::make($request->all(), [
            'category' => ['required', 'exists:faq_categories,name'],
            'question' => ['required'],
            'answer' => ['required'],
        ]);
        if ($validator->fails()){
            return back()->withErrors($validator)->withInput()->with('error', 'Invalid input data');
        }
        $category = FaqCategory::query()->where('name', request('category'))->first();
        // Collect data from request
        $data = [];
        $data['question'] = $request['question'];
        $data['answer'] = $request['answer'];
        $data['faq_category_id'] = $category['id'];

        // Store question
        if ($faq->update($data)){
            return redirect()->route('admin.faq')->with('success', 'Question updated successfully');
        }
        return back()->with('error', 'Error updating question');
    }

    public function destroy(Faq $faq)
    {
        if($faq->delete()){
            return redirect()->route('admin.faq')->with('success', 'Question deleted successfully');
        }
        return back()->with('error', 'Error deleting question');
    }

}
