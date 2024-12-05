<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddArchivoToBombasTable extends Migration
{
    public function up()
    {
        Schema::table('bombas', function (Blueprint $table) {
            $table->string('archivo')->nullable(); // Añadimos la columna para almacenar el archivo
        });
    }

    public function down()
    {
        Schema::table('bombas', function (Blueprint $table) {
            $table->dropColumn('archivo');
        });
    }
}

