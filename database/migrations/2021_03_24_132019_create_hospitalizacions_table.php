<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHospitalizacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospitalizaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('historia_clinica_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('paciente');
            $table->string('representante');
            $table->string('contacto_representante');
            $table->string('especie');
            $table->string('raza');
            $table->string('tipo_consulta');
            $table->text('observaciones');
            $table->text('medicamentos');
            $table->string('medico');
            $table->string('estado');
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
        Schema::dropIfExists('hospitalizaciones');
    }
}
