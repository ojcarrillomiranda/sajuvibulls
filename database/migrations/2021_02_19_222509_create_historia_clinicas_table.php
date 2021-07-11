<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriaClinicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historia_clinicas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('paciente_id')->constrained()->onDelete('cascade');
            $table->unsignedInteger('representante_documento');
            $table->foreign('representante_documento')->references('documento')->on('personas')->onDelete('cascade');
            $table->string('contacto_representante');
            $table->foreignId('especie_id')->constrained()->onDelete('cascade');
            $table->foreignId('raza_id')->constrained()->onDelete('cascade');
            $table->foreignId('tipo_consulta_id')->constrained()->onDedete('cascade');
            $table->text('observaciones');
            $table->text('medicamentos');
            $table->unsignedBigInteger('medico_id');
            $table->foreign('medico_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('historia_clinicas');
    }
}
