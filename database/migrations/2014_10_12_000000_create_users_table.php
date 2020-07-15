<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments("id");
            // Obligatorio para: Estudiantes, Profesores.
            $table->string('name')->default("usuario");
            $table->string('email')->unique();
            // rut requerido segun el rol. Obligatorio para: Estudiantes, Profesores.
            $table->string('rut')->default("no aplica");
            // carrera requerida segun el rol. Obligatorio para: Estudiantes.
            $table->string('carrera')->default("no aplica");
            // rol primario, Admin no es un rol seleccionable.
            $table->enum('rol', ['Admin', 'Estudiante', 'Profesor', 'Secretaria', 'Encargado Titulación']);
            // El Encargado de Titulación puede además tener el rol de Profesor.
            $table->string("rol_secundario")->default("ninguno");
            // en caso de eliminar a un usuario, solo pasa de Activo a Removido.
            $table->enum('estado', ['Activo', 'Removido'])->default('Activo');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
