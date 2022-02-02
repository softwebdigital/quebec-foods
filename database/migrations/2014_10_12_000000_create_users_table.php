<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->text('address')->nullable();
            $table->text('avatar')->nullable();
            $table->string('nk_name')->nullable();
            $table->string('nk_phone')->nullable();
            $table->text('nk_address')->nullable();
            $table->string('password');
            $table->string('ref_code')->nullable();
            $table->boolean('gotMail')->default(false);
            $table->boolean('active')->default(true);
            $table->text('otp')->nullable();
            $table->timestamp('otp_expiry')->nullable();
            $table->text('reset_otp')->nullable();
            $table->timestamp('reset_otp_expiry')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
