<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCtypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */ 
    
    public function up()
    {   
        Schema::create('ctypes', function (Blueprint $table) {
            $table->string('type_id');
            $table->string('type_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ctypes');
    }
}
