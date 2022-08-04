<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::query()->latest()->get();
        return view('admin.category.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'description' => ['required'],
            'image' => ['required', 'mimes:jpeg,jpg,png', 'max:1024'],
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('error', 'Invalid Input data');
        }

        // Store the data
        $data = $request->except('image', 'image_remove');
        $data['image'] = $this->uploadPackageImageAndReturnPathToSave($request['image']);
        if (Category::create($data)){
            return redirect()->route('admin.category')->with('success', 'Category Created Successfully');
        }
        return back()->with('error', 'Error creating category');
    }

    public function update(Request $request, Category $category)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'unique:categories,name,' .$category['id']],
            'description' => ['required'],
            'image' => ['mimes:jpeg,jpg,png', 'max:1024'],
        ]);
        
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('error', 'Invalid Input data');
        }

        $data = $request->except('image', 'image_remove');
        if ($request->file('image')){
            $data['image'] = $this->uploadPackageImageAndReturnPathToSave($request['image']);
        }

        if ($category->update($data)){
            return redirect()->route('admin.category')->with('success', 'Category updated successfully');
        }

        return back()->with('error', 'Error updating category');
    }

    public function destroy(Category $category)
    {
        if (($category->packages()->count()) > 0){
            return back()->with('error', 'Cannot delete category, packages already associated');
        }

        if ($category->delete()){
            return redirect()->route('admin.category')->with('success', 'Category deleted Successfully');
        }

        return back()->with('error', 'Error deleting category');
    }

    protected function uploadPackageImageAndReturnPathToSave($image): string
    {
        $destinationPath = 'assets/categories'; // upload path
        $transferImage = time() . '.' . $image->getClientOriginalExtension();
        $image->move($destinationPath, $transferImage);
        return $destinationPath ."/".$transferImage;
    }
}
