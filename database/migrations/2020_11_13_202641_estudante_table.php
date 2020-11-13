<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EstudanteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('estudantes', function (Blueprint $table) {
            $table->foreign('serie_ingresso_id')->references('id')->on('serie_ingresso');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('estudantes', function (Blueprint $table) {
            //
        });
    }
}
