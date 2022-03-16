<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermisosTable extends Migration
{

    public function up()
    {
        Schema::create('permisos', function (Blueprint $table) {
            $table->id();
            $table->string('rol',40);
            $table->timestamps();
        });
    }

 
    public function down()
    {
        Schema::dropIfExists('permisos');
    }
}
