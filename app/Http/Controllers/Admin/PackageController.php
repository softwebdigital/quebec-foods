<?php

namespace App\Http\Controllers\Admin;

use App\Models\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PackageController extends Controller
{
    public function index($type)
    {
        $packages = [];
        return view('admin.package.index', compact('packages', 'type'));
    }

    public function create($type)
    {
        return view('admin.package.create', compact('type'));
    }

    public function edit(Package $package, $type)
    {
        return view('admin.package.edit', compact('package', 'type'));
    }
    public function store(Request $request)
    {
        // return $request->all();

        // Validate request
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'unique:packages,name'],
            'roi' => ['required', 'numeric'],
            'start_date' => ['required'],
            'slot' => ['required'],
            'duration_mode' => ['required'],
            'price' => ['required', 'numeric', 'gt:0'],
            'milestone' => ['required'],
            'duration' => ['required', 'numeric'],
            'payout_mode' => ['required'],
            'rollover' => ['required'],
            'description' => ['required'],
            'image' => ['required', 'mimes:jpeg,jpg,png', 'max:1024'],
            'status' => ['required']
        ]);
        if ($validator->fails()){
            return back()->withErrors($validator)->withInput()->with('error', 'Invalid input data');
        }
        // Collect data from request
        $data = $request->except('image', 'image_remove');
        // Save file to folder
        $data['image'] = $this->uploadPackageImageAndReturnPathToSave($request['image']);
        // Store package
        if (Package::create($data)){
            return redirect()->route('admin.packages')->with('success', 'Package created successfully');
        }
        return back()->with('error', 'Error creating package');
    }

    protected function uploadPackageImageAndReturnPathToSave($image): string
    {
        $destinationPath = 'assets/packages'; // upload path
        $transferImage = \auth()->user()['id'].'-'. time() . '.' . $image->getClientOriginalExtension();
        $image->move($destinationPath, $transferImage);
        return $destinationPath ."/".$transferImage;
    }
}
