<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function index()
    {
        $data = Document::where('status', 'pending')->get();
        return view('admin.verification.index', compact('data'));
    }

    public function process(Document $verification, $status)
    {
        $verification->update(['status' => $status]);
        return back()->with('success', "ID submission {$status} successfully");
    }
}
