<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternationalBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('international_banks', function (Blueprint $table) {
            $table->id();
            $table->string('bank_name')->nullable();
            $table->string('account_name')->nullable();
            $table->string('account_number')->nullable();
            $table->longText('added_information')->nullable();
            $table->string('base_currency')->default('NGN');
            $table->boolean('show_cash')->default(true);
            $table->double('usd_to_ngn', 10, 2)->default(0);
            $table->double('rate_plus', 10, 2)->default(0);
            $table->boolean('invest')->default(true);
            $table->boolean('rollover')->default(true);
            $table->boolean('withdrawal')->default(true);
            $table->boolean('auto_delete_unverified_users')->default(true);
            $table->string('auto_delete_unverified_users_after')->default('3 days');
            $table->boolean('pending_transaction_mail')->default(true);
            $table->boolean('exchange_rate_error_mail')->default(true);
            $table->string('error_mail_interval')->default('30 minutes');
            $table->string('pending_transaction_mail_interval')->default('5 minutes');
            $table->dateTime('last_pending_transaction_notification')->default(now());

            $table->timestamps();
        });

        \Illuminate\Support\Facades\DB::table('international_banks')->insert([
            [
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('international_banks');
    }
}
