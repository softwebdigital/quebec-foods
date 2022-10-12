<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvestmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('package_id')->constrained();
            $table->integer('slots');
            $table->decimal('amount', 15, 2);
            $table->string('amount_in_naira')->nullable();
            $table->decimal('total_return', 15, 2);
            $table->text('package_data');
            $table->dateTime('investment_date');
            $table->dateTime('start_date');
            $table->enum('payment', ['approved', 'declined', 'pending']);
            $table->enum('status', ['active', 'pending', 'cancelled', 'settled'])->default('pending');
            $table->boolean('rollover')->default(false);
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
        Schema::dropIfExists('investments');
    }
}
