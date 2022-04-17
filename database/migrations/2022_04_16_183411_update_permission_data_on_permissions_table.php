<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePermissionDataOnPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Illuminate\Support\Facades\DB::table('permissions')->delete();
        \Illuminate\Support\Facades\DB::table('permissions')->insert([
            ['name' => 'View Dashboard', 'guard_name' => 'admin'],
            ['name' => 'View Users', 'guard_name' => 'admin'],
            ['name' => 'Export Users', 'guard_name' => 'admin'],
            ['name' => 'Block Users', 'guard_name' => 'admin'],
            ['name' => 'Unblock Users', 'guard_name' => 'admin'],
            ['name' => 'Deposit For Users', 'guard_name' => 'admin'],
            ['name' => 'View Users Wallet', 'guard_name' => 'admin'],
            ['name' => 'Withdraw For Users', 'guard_name' => 'admin'],
            ['name' => 'View Packages', 'guard_name' => 'admin'],
            ['name' => 'Create Packages', 'guard_name' => 'admin'],
            ['name' => 'Edit Packages', 'guard_name' => 'admin'],
            ['name' => 'Delete Packages', 'guard_name' => 'admin'],
            ['name' => 'View Categories', 'guard_name' => 'admin'],
            ['name' => 'Create Categories', 'guard_name' => 'admin'],
            ['name' => 'Edit Categories', 'guard_name' => 'admin'],
            ['name' => 'Delete Categories', 'guard_name' => 'admin'],
            ['name' => 'View Investments', 'guard_name' => 'admin'],
            ['name' => 'Export Investments', 'guard_name' => 'admin'],
            ['name' => 'View Transactions', 'guard_name' => 'admin'],
            ['name' => 'Export Transactions', 'guard_name' => 'admin'],
            ['name' => 'Approve Transactions', 'guard_name' => 'admin'],
            ['name' => 'Decline Transactions', 'guard_name' => 'admin'],
            ['name' => 'View Payments', 'guard_name' => 'admin'],
            ['name' => 'Resolve Payments', 'guard_name' => 'admin'],
            ['name' => 'Export Payments', 'guard_name' => 'admin'],
            ['name' => 'View Admins', 'guard_name' => 'admin'],
            ['name' => 'Create Admins', 'guard_name' => 'admin'],
            ['name' => 'Change Admins Role', 'guard_name' => 'admin'],
            ['name' => 'Block Admins', 'guard_name' => 'admin'],
            ['name' => 'Unblock Admins', 'guard_name' => 'admin'],
            ['name' => 'View Roles', 'guard_name' => 'admin'],
            ['name' => 'Create Roles', 'guard_name' => 'admin'],
            ['name' => 'Edit Roles', 'guard_name' => 'admin'],
            ['name' => 'Delete Roles', 'guard_name' => 'admin'],
            ['name' => 'View Pending Verifications', 'guard_name' => 'admin'],
            ['name' => 'Approve Pending Verifications', 'guard_name' => 'admin'],
            ['name' => 'Decline Pending Verifications', 'guard_name' => 'admin'],
            ['name' => 'View FAQs', 'guard_name' => 'admin'],
            ['name' => 'View FAQs Category', 'guard_name' => 'admin'],
            ['name' => 'Create FAQs Category', 'guard_name' => 'admin'],
            ['name' => 'Delete FAQs Category', 'guard_name' => 'admin'],
            ['name' => 'Edit FAQs Category', 'guard_name' => 'admin'],
            ['name' => 'Create FAQs', 'guard_name' => 'admin'],
            ['name' => 'Delete FAQs', 'guard_name' => 'admin'],
            ['name' => 'Edit FAQs', 'guard_name' => 'admin'],
            ['name' => 'View Referrals', 'guard_name' => 'admin'],
            ['name' => 'Export Referrals', 'guard_name' => 'admin'],
            ['name' => 'View Maintenance', 'guard_name' => 'admin'],
            ['name' => 'Pay Maintenance Fee', 'guard_name' => 'admin'],
            ['name' => 'View Settings', 'guard_name' => 'admin'],
            ['name' => 'Update Company Bank Details', 'guard_name' => 'admin'],
            ['name' => 'Update Other Settings', 'guard_name' => 'admin'],
        ]);
        $role = \Spatie\Permission\Models\Role::all()->first();
        $permissions = \Spatie\Permission\Models\Permission::all();
        $role->syncPermissions($permissions);
        $admins = \App\Models\Admin::all();
        foreach ($admins as $admin){
            $admin->assignRole($role);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
