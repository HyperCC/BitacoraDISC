<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearUserBitacora extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_bitacora', function (Blueprint $table) {
            $table->increments("id");

            $table->integer('bitacora_id')->unsigned();
            $table->integer('profesor_id')->unsigned();
            $table->integer('alumno1_id')->unsigned();
            $table->integer('alumno2_id')->unsigned();
            $table->integer('alumno3_id')->unsigned();
            $table->integer('alumno4_id')->unsigned();

            $table->foreign('bitacora_id')->references('id')->on('bitacoras')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('profesor_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('alumno1_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('alumno2_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('alumno3_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('alumno4_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

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
        //
    }
}
