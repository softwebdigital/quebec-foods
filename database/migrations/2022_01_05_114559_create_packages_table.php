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
            $table->string('slot');
            $table->integer('duration');
            $table->enum('duration_mode', ['day', 'month', 'year'])->default('day');
            $table->string('milestone');
            $table->enum('payout_mode', ['single', 'monthly', 'quarterly', 'biannually', 'annually' ]);
            $table->text('description');
            $table->text('image');
            $table->enum('type', ['farm', 'plant']);
            $table->boolean('rollover')->default(false);
            $table->enum('status', ['open', 'close']);
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
