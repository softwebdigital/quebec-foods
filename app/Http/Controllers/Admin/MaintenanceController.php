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
        $soft = Admin::where('email', env('SOFTWEB_EMAIL'))->first();
        $admin = Admin::where('email', env('ADMIN_EMAIL'))->first();
        if ($status == 'queued') {
            if ($soft) \App\Http\Controllers\NotificationController::sendMaintenancePaidNotitfication($maintenance, $soft);
            if ($admin) \App\Http\Controllers\NotificationController::sendMaintenancePaidNotitfication($maintenance, $admin);
        }
        if ($status == 'approved') {
            if ($soft) \App\Http\Controllers\NotificationController::sendMaintenanceApprovedNotitfication($maintenance, $soft);
            if ($admin) \App\Http\Controllers\NotificationController::sendMaintenanceApprovedNotitfication($maintenance, $admin);
        }
        if ($status == 'declined') {
            if ($soft) \App\Http\Controllers\NotificationController::sendMaintenanceDeclinedNotitfication($maintenance, $soft);
            if ($admin) \App\Http\Controllers\NotificationController::sendMaintenanceDeclinedNotitfication($maintenance, $admin);
        }
        return back()->with('success', "Payment {$status} successfully");
    }
}
