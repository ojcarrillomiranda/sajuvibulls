<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->date('fecha_nacimiento');
            $table->foreignId('especie_id')->constrained()->onDelete('cascade');
            $table->foreignId('sexo_id')->constrained()->onDelete('cascade');
            $table->foreignId('raza_id')->constrained()->onDelete('cascade');
            $table->integer('peso');
            $table->string('foto');
            $table->unsignedInteger('representante_documento');
            $table->foreign('representante_documento')->references('documento')->on('personas')->onDelete('cascade');
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
        Schema::dropIfExists('pacientes');
    }
}
