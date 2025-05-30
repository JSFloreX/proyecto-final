<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::table('archivos', function (Blueprint $table) {
        $table->string('tipo')->default('pdf')->change();
        // o $table->string('tipo')->nullable()->change();
    });
}

public function down()
{
    Schema::table('archivos', function (Blueprint $table) {
        $table->string('tipo')->change(); 
    });
}

};
