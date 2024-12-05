<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImagenToBombasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bombas', function (Blueprint $table) {
            $table->string('imagen')->nullable()->after('estado'); // Agrega la columna 'imagen'
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bombas', function (Blueprint $table) {
            $table->dropColumn('imagen'); // Elimina la columna 'imagen'
        });
    }
}

