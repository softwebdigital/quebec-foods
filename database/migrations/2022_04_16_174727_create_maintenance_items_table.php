<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaintenanceItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenance_items', function (Blueprint $table) {
            $table->id();
            $table->string('month');
            $table->string('year');
            $table->decimal('active_investments');
            $table->text('active_investments_id')->nullable();
            $table->decimal('percentage');
            $table->enum('status', ['pending', 'queued', 'approved', 'declined'])->default('pending');
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
        Schema::dropIfExists('maintenance_items');
    }
}
