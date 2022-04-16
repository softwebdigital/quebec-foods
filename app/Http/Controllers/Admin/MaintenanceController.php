<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\MaintenanceItem;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    public function index(Request $request)
    {
        $data = MaintenanceItem::latest()->get();
        return view('admin.swd.index', compact('data'));
    }

    public function change(MaintenanceItem $maintenance, $status)
    {
        $maintenance->update([
            'status' => $status
        ]);
        if ($status == 'queued') {
            $admin = Admin::where('email', 'softwebdigital@gmail.com')->first();
            if ($admin) {
                \App\Http\Controllers\NotificationController::sendMaintenancePaidNotitfication($maintenance, $admin);
            }
        }
        return back()->with('success', "Payment {$status} successfully");
    }
}
