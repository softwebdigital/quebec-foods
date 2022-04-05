<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('investment_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->enum('type', ['deposit', 'withdrawal', 'investment', 'payout']);
            $table->string('amount');
            $table->string('description');
            $table->text('preferred_bank')->nullable();
            $table->enum('method', ['wallet', 'card', 'deposit']);
            $table->enum('channel', ['web', 'mobile'])->default('web');
            $table->enum('status', ['approved', 'pending', 'declined'])->default('pending');
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
        Schema::dropIfExists('transactions');
    }
}
