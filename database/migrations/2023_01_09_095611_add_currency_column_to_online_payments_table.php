<?php

use App\Models\Setting;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCurrencyColumnToOnlinePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('online_payments', function (Blueprint $table) {
            $table->string('currency')->nullable()->default(Setting::all()->first()?->base_currency ?? 'NGN');
            $table->double('rate')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('online_payments', function (Blueprint $table) {
            $table->dropColumn(['currency', 'rate']);
        });
    }
}
