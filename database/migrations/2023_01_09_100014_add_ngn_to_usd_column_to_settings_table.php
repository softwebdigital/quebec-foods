<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNgnToUsdColumnToSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->double('ngn_to_usd', 10, 2)->after('usd_to_ngn')->default(0);
            $table->double('ngn_rate_plus', 10, 2)->after('rate_plus')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn(['ngn_to_usd', 'ngn_rate_plus']);
        });
    }
}
