<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateDocumentsTableForApproval extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('documents', function (Blueprint $table) {
            $table->dropColumn('type');
            $table->dropColumn('path');
            $table->string('method');
            $table->text('photo');
            $table->string('number');
            $table->enum('status', ['pending', 'approved', 'declined'])->default('pending');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('documents', function (Blueprint $table) {
            $table->enum('type', ['national_id', 'drivers_license', 'international_passport']);
            $table->dropColumn('method');
            $table->dropColumn('photo');
            $table->dropColumn('status');
            $table->dropColumn('number');
            $table->string('path');
        });
    }
}
