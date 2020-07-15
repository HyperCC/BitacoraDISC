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
            $table->string("id_estudiante");
            // como tiene relacion muchos a uno debe tener este id a 1 profesor.
            $table->string("id_profesor");
            // como tiene relacion muchos a uno debe tener este id a 1 registro.
            $table->string("id_registro");
            // estado de bitacora. Posibles casos: no continuidad del trabajo o aprobación del término del trabajo.
            $table->enum("estado", ["renuncia", "aprobacion"])->deault(null);
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
        Schema::dropIfExists('bitacoras');
    }
}
