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
            $table->bigIncrements("id");
            $table->string("titulo");

            // estado de bitacora. Posibles casos: no continuidad del trabajo o aprobación del término del trabajo.
            $table->enum("estado", ["Activa", "Finalizada"])->default('Activa');

            $table->text('causa_renuncia')->default(null);

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
