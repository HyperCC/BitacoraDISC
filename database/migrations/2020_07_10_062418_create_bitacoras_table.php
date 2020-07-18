<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBitacorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bitacoras', function (Blueprint $table) {
            $table->increments("id");
            $table->string("titulo");
            // como tiene relacion muchos a uno debe tener este id a 1 estudiante.
            $table->integer('id_estudiante1')->unsigned()->nullable();
            $table->integer('id_estudiante2')->unsigned()->nullable();
            $table->integer('id_estudiante3')->unsigned()->nullable();
            $table->integer('id_estudiante4')->unsigned()->nullable();
            // como tiene relacion muchos a uno debe tener este id a 1 profesor.
            $table->integer('id_profesor1')->unsigned()->nullable();
            $table->integer('id_profesor2')->unsigned()->nullable();
            // como tiene relacion muchos a uno debe tener este id a 1 registro.
            $table->integer("id_registro")->nullable();
            // estado de bitacora. Posibles casos: no continuidad del trabajo o aprobación del término del trabajo.
            $table->enum("estado", ["renuncia", "aprobacion"])->default(null);

            $table->foreign('id_estudiante1')->references("id")->on("users");
            $table->foreign('id_estudiante2')->references("id")->on("users");
            $table->foreign('id_estudiante3')->references("id")->on("users");
            $table->foreign('id_estudiante4')->references("id")->on("users");

            $table->foreign('id_profesor1')->references("id")->on("users");
            $table->foreign('id_profesor2')->references("id")->on("users");
           // $table->primary (['id_estudiante' , 'id_profesor']);
            $table->timestamps();
            $table->softDeletes();
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bitacoras');
    }



}
