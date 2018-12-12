<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalImgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_imgs', function (Blueprint $table) {
            $table->unsignedInteger('personal_id');
            $table->string('original_name');
            $table->string('new_name');
            $table->timestamps();

            $table->foreign('personal_id')->references('id')->on('personals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personal_imgs');
    }
}
