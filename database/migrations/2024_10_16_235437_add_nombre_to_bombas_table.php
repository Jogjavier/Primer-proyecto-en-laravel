<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNombreToBombasTable extends Migration
{
    public function up()
    {
        Schema::table('bombas', function (Blueprint $table) {
            $table->string('nombre'); // Añade la columna 'nombre'
        });
    }

    public function down()
    {
        Schema::table('bombas', function (Blueprint $table) {
            $table->dropColumn('nombre'); // Elimina la columna 'nombre' si se revierte la migración
        });
    }
}

