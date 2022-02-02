<?php

namespace App\Http\Controllers\Admin;

use App\Models\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PackageController extends Controller
{
    public function index($type)
    {
        if (!in_array($type, ['farm', 'index'])) {
            return redirect('/admin/dashboard')->with('error', 'Invalid input data');
        }
        return view('admin.package.index', ['packages' => Package::all()]);
    }
}
