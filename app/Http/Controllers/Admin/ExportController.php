<?php

namespace App\Http\Controllers\Admin;

use App\Exports\UserExport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function exportUsers(Request $request)
    {
        return Excel::download(new UserExport(request('category'), request('date'), request('status')), 'users.xlsx');
    }
}
