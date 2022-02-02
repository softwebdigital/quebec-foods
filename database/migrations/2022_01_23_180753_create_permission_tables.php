<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Spatie\Permission\PermissionRegistrar;

class CreatePermissionTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tableNames = config('permission.table_names');
        $columnNames = config('permission.column_names');
        $teams = config('permission.teams');

        if (empty($tableNames)) {
            throw new \Exception('Error: config/permission.php not loaded. Run [php artisan config:clear] and try again.');
        }
        if ($teams && empty($columnNames['team_foreign_key'] ?? null)) {
            throw new \Exception('Error: team_foreign_key on config/permission.php not loaded. Run [php artisan config:clear] and try again.');
        }

        Schema::create($tableNames['permissions'], function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');       // For MySQL 8.0 use string('name', 125);
            $table->string('guard_name'); // For MySQL 8.0 use string('guard_name', 125);
            $table->timestamps();

            $table->unique(['name', 'guard_name']);
        });

        Schema::create($tableNames['roles'], function (Blueprint $table) use ($teams, $columnNames) {
            $table->bigIncrements('id');
            if ($teams || config('permission.testing')) { // permission.testing is a fix for sqlite testing
                $table->unsignedBigInteger($columnNames['team_foreign_key'])->nullable();
                $table->index($columnNames['team_foreign_key'], 'roles_team_foreign_key_index');
            }
            $table->string('name');       // For MySQL 8.0 use string('name', 125);
            $table->string('guard_name'); // For MySQL 8.0 use string('guard_name', 125);
            $table->timestamps();
            if ($teams || config('permission.testing')) {
                $table->unique([$columnNames['team_foreign_key'], 'name', 'guard_name']);
            } else {
                $table->unique(['name', 'guard_name']);
            }
        });

        Schema::create($tableNames['model_has_permissions'], function (Blueprint $table) use ($tableNames, $columnNames, $teams) {
            $table->unsignedBigInteger(PermissionRegistrar::$pivotPermission);

            $table->string('model_type');
            $table->unsignedBigInteger($columnNames['model_morph_key']);
            $table->index([$columnNames['model_morph_key'], 'model_type'], 'model_has_permissions_model_id_model_type_index');

            $table->foreign(PermissionRegistrar::$pivotPermission)
                ->references('id')
                ->on($tableNames['permissions'])
                ->onDelete('cascade');
            if ($teams) {
                $table->unsignedBigInteger($columnNames['team_foreign_key']);
                $table->index($columnNames['team_foreign_key'], 'model_has_permissions_team_foreign_key_index');

                $table->primary([$columnNames['team_foreign_key'], PermissionRegistrar::$pivotPermission, $columnNames['model_morph_key'], 'model_type'],
                    'model_has_permissions_permission_model_type_primary');
            } else {
                $table->primary([PermissionRegistrar::$pivotPermission, $columnNames['model_morph_key'], 'model_type'],
                    'model_has_permissions_permission_model_type_primary');
            }

        });

        Schema::create($tableNames['model_has_roles'], function (Blueprint $table) use ($tableNames, $columnNames, $teams) {
            $table->unsignedBigInteger(PermissionRegistrar::$pivotRole);

            $table->string('model_type');
            $table->unsignedBigInteger($columnNames['model_morph_key']);
            $table->index([$columnNames['model_morph_key'], 'model_type'], 'model_has_roles_model_id_model_type_index');

            $table->foreign(PermissionRegistrar::$pivotRole)
                ->references('id')
                ->on($tableNames['roles'])
                ->onDelete('cascade');
            if ($teams) {
                $table->unsignedBigInteger($columnNames['team_foreign_key']);
                $table->index($columnNames['team_foreign_key'], 'model_has_roles_team_foreign_key_index');

                $table->primary([$columnNames['team_foreign_key'], PermissionRegistrar::$pivotRole, $columnNames['model_morph_key'], 'model_type'],
                    'model_has_roles_role_model_type_primary');
            } else {
                $table->primary([PermissionRegistrar::$pivotRole, $columnNames['model_morph_key'], 'model_type'],
                    'model_has_roles_role_model_type_primary');
            }
        });

        Schema::create($tableNames['role_has_permissions'], function (Blueprint $table) use ($tableNames) {
            $table->unsignedBigInteger(PermissionRegistrar::$pivotPermission);
            $table->unsignedBigInteger(PermissionRegistrar::$pivotRole);

            $table->foreign(PermissionRegistrar::$pivotPermission)
                ->references('id')
                ->on($tableNames['permissions'])
                ->onDelete('cascade');

            $table->foreign(PermissionRegistrar::$pivotRole)
                ->references('id')
                ->on($tableNames['roles'])
                ->onDelete('cascade');

            $table->primary([PermissionRegistrar::$pivotPermission, PermissionRegistrar::$pivotRole], 'role_has_permissions_permission_id_role_id_primary');
        });

        app('cache')
            ->store(config('permission.cache.store') != 'default' ? config('permission.cache.store') : null)
            ->forget(config('permission.cache.key'));

        \Illuminate\Support\Facades\DB::table('roles')->insert(['name' => 'Super Admin', 'guard_name' => 'admin']);
        \Illuminate\Support\Facades\DB::table('permissions')->insert([
            ['name' => 'View Quick Overview', 'guard_name' => 'admin'],
            ['name' => 'View Investment Dashboard', 'guard_name' => 'admin'],
            ['name' => 'View Trading Dashboard', 'guard_name' => 'admin'],
            ['name' => 'View Packages', 'guard_name' => 'admin'],
            ['name' => 'Create Packages', 'guard_name' => 'admin'],
            ['name' => 'Edit Packages', 'guard_name' => 'admin'],
            ['name' => 'Delete Packages', 'guard_name' => 'admin'],
            ['name' => 'View Users', 'guard_name' => 'admin'],
            ['name' => 'Export Users CSV', 'guard_name' => 'admin'],
            ['name' => 'Block Users', 'guard_name' => 'admin'],
            ['name' => 'Unblock Users', 'guard_name' => 'admin'],
            ['name' => 'Deposit For Users', 'guard_name' => 'admin'],
            ['name' => 'Withdraw For Users', 'guard_name' => 'admin'],
            ['name' => 'Make Investment For Users', 'guard_name' => 'admin'],
            ['name' => 'Rollover Investment For Users', 'guard_name' => 'admin'],
            ['name' => 'View Investments', 'guard_name' => 'admin'],
            ['name' => 'View Investments Maturity', 'guard_name' => 'admin'],
            ['name' => 'Export Investments CSV', 'guard_name' => 'admin'],
            ['name' => 'View Transactions', 'guard_name' => 'admin'],
            ['name' => 'Export Transactions CSV', 'guard_name' => 'admin'],
            ['name' => 'View Trades', 'guard_name' => 'admin'],
            ['name' => 'Export Trades CSV', 'guard_name' => 'admin'],
            ['name' => 'Approve Transactions', 'guard_name' => 'admin'],
            ['name' => 'Decline Transactions', 'guard_name' => 'admin'],
            ['name' => 'View Referrals Leaderboard', 'guard_name' => 'admin'],
            ['name' => 'View Emails', 'guard_name' => 'admin'],
            ['name' => 'Send Emails', 'guard_name' => 'admin'],
            ['name' => 'View Admins', 'guard_name' => 'admin'],
            ['name' => 'Create Admins', 'guard_name' => 'admin'],
            ['name' => 'Change Admins Role', 'guard_name' => 'admin'],
            ['name' => 'Block Admins', 'guard_name' => 'admin'],
            ['name' => 'Unblock Admins', 'guard_name' => 'admin'],
            ['name' => 'View Roles', 'guard_name' => 'admin'],
            ['name' => 'Create Roles', 'guard_name' => 'admin'],
            ['name' => 'Edit Roles', 'guard_name' => 'admin'],
            ['name' => 'Delete Roles', 'guard_name' => 'admin'],
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
        $tableNames = config('permission.table_names');

        if (empty($tableNames)) {
            throw new \Exception('Error: config/permission.php not found and defaults could not be merged. Please publish the package configuration before proceeding, or drop the tables manually.');
        }

        Schema::drop($tableNames['role_has_permissions']);
        Schema::drop($tableNames['model_has_roles']);
        Schema::drop($tableNames['model_has_permissions']);
        Schema::drop($tableNames['roles']);
        Schema::drop($tableNames['permissions']);
    }
}
