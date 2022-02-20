<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::query()->get();
        return view("admin.faq.index", compact('faqs'));
    }

    public function edit(Faq $faq)
    {
        return view('admin.faq.edit', compact('faq'));
    }

    public function create()
    {
        return view('admin.faq.create');
    }

    public function store(Request $request)
    {
        // Validate request
        $validator = Validator::make($request->all(), [
            'category' => ['required', ],
            'question' => ['required'],
            'answer' => ['required'],
        ]);
        if ($validator->fails()){
            return back()->withErrors($validator)->withInput()->with('error', 'Invalid input data');
        }
        // Collect data from request
        $data = $request->all();
        // Store package
        if (Faq::create($data)){
            return redirect()->route('admin.faq')->with('success', 'Question created successfully');
        }
        return back()->with('error', 'Error creating question');
    }

    public function update(Request $request, Faq $faq)
    {
        // Validate request
        $validator = Validator::make($request->all(), [
            'question' => ['required', 'unique:faqs,question,'.$faq['id']],
            'answer' => ['required'],
        ]);
        if ($validator->fails()){
            return back()->withErrors($validator)->withInput()->with('error', 'Invalid input data');
        }

        // Collect data from request
        $data = $request->all();

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
