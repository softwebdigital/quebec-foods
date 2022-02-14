<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('roi');
            $table->string('price');
            $table->date('start_date');
            $table->string('slots');
            $table->integer('duration');
            $table->enum('duration_mode', ['day', 'month', 'year'])->default('day');
            $table->string('milestones')->default(1);
            $table->enum('payout_mode', ['single', 'monthly', 'quarterly', 'biannually', 'annually' ])->default('single');
            $table->text('description');
            $table->text('image')->nullable();
            $table->enum('type', ['farm', 'plant']);
            $table->boolean('rollover')->default(false);
            $table->enum('status', ['open', 'closed'])->default('open');
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
        Schema::dropIfExists('packages');
    }
}
