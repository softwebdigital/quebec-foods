<?php

namespace App\Http\Controllers\Admin;

use App\Models\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::latest();

        if (request('category')) {
            $packages = $packages->where('type', request('category'));
        }

        if (request('status')) {
            $packages = $packages->where('status', request('status'));
        }

        $packages = $packages->get();



        return view('admin.package.index', compact('packages'));


    }

    public function show($type, Package $package)
    {
        return view('admin.package.show', compact('package', 'type'));
    }

    public function create($type)
    {
        return view('admin.package.create', compact('type'));
    }

    public function edit($type, Package $package)
    {
        // Confirm the type.
        if ($type != $package['type']) {
            return redirect()->route('admin.packages', $type)->with('error', 'Invalid package type for package');
        }
        return view('admin.package.edit', compact('package', 'type'));
    }

    public function store(Request $request)
    {
        // Validate request
        $validator = Validator::make($request->all(), [
            'type' => ['required', 'in:plant,farm'],
            'name' => ['required', 'unique:packages,name'],
            'roi' => ['required', 'numeric'],
            'start_date' => ['required', 'date', 'after:'.date('Y-m-d h:m:d')],
            'slots' => ['required_if:type,farm'],
            'duration' => ['required_if:type,farm', 'numeric'],
            'price' => ['required', 'numeric', 'gt:0'],
            'milestones' => ['required_if:type,plant'],
            'duration' => ['required_if:type,farm', 'numeric'],
            'payout_mode' => ['required_if:type,plant'],
            'rollover' => ['sometimes'],
            'description' => ['required'],
            'image' => ['required_if:type,plant', 'mimes:jpeg,jpg,png', 'max:1024'],
            'category' => ['required_if:type,farm']
        ]);
        if ($validator->fails()){
            return back()->withErrors($validator)->withInput()->with('error', 'Invalid input data');
        }
        // Collect data from request
        $data = $request->except('image', 'image_remove');
        if ($request->type == 'plant') $data['status'] = $data['status'] ?? "closed";
        if ($request->category) {
            $data['category_id'] = $data['category'];
            unset($data['category']);
        }
        // Save file to folder
        if ($request['type'] == 'plant') {
            $data['image'] = $this->uploadPackageImageAndReturnPathToSave($request['image']);
            $data['slots'] = -1;
        }
        // Store package
        if (Package::create($data)){
            return redirect()->route('admin.packages')->with('success', 'Package created successfully');
        }
        return back()->with('error', 'Error creating package');
    }

    public function update(Request $request, $type, Package $package)
    {
        // Validate request
        $validator = Validator::make($request->all(), [
            'type' => ['required', 'in:plant,farm'],
            'name' => ['required', 'unique:packages,name,'.$package['id']],
            'roi' => ['required', 'numeric'],
            'start_date' => ['required', 'date', 'after:'.date('Y-m-d h:m:d')],
            'slots' => ['required_if:type,farm'],
            'duration' => ['required_if:type,farm', 'numeric'],
            'price' => ['required', 'numeric', 'gt:0'],
            'milestones' => ['required_if:type,plant'],
            'duration' => ['required_if:type,farm', 'numeric'],
            'payout_mode' => ['required_if:type,plant'],
            'rollover' => ['sometimes'],
            'description' => ['required'],
            'image' => ['mimes:jpeg,jpg,png', 'max:1024'],
            'category' => ['required_if:type,farm']
        ]);
        if ($validator->fails()){
            return back()->withErrors($validator)->withInput()->with('error', 'Invalid input data');
        }
        // Collect data from request
        $data = $request->except('image', 'image_remove');
        if ($type == 'plant') $data['status'] = $data['status'] ?? "closed";
        if ($request->category) {
            $data['category_id'] = $data['category'];
            unset($data['category']);
        }
        // Save file to folder if uploaded
        if ($request->file('image')){
            $data['image'] = $this->uploadPackageImageAndReturnPathToSave($request['image']);
        }
        // Store package
        if ($package->update($data)){
            return redirect()->route('admin.packages')->with('success', 'Package updated successfully');
        }
        return back()->with('error', 'Error updating package');
    }

    public function destroy($type, Package $package)
    {
        // Check for type.
        if ($type != $package['type']) {
            return back()->withInput()->with('error', 'Invalid package type');
        }
        // check if package doesn't have investment
        if ($package->investments()->count() > 0){
            return back()->with('error', 'Can\'t delete package, investments already associated');
        }
        unlink($package['image']);
        if ($package->delete()){
            return redirect()->route('admin.packages')->with('success', 'Package deleted successfully');
        }
        return back()->with('error', 'Error deleting package');
    }

    public function investments($type, Package $package)
    {
        $investments = $package->investments;
        return view('admin.package.investments', compact('type', 'investments', 'package'));
    }


    protected function uploadPackageImageAndReturnPathToSave($image): string
    {
        $destinationPath = 'assets/packages'; // upload path
        $transferImage = \auth()->user()['id'].'-'. time() . '.' . $image->getClientOriginalExtension();
        $image->move($destinationPath, $transferImage);
        return $destinationPath ."/".$transferImage;
    }
}
