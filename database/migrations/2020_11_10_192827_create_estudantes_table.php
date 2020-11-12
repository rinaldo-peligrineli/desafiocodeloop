<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudantes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome_aluno', 100);
            $table->string('data_nascimento', 10);
            $table->integer('serie_ingresso_id')->nullable()->unsigned();
            $table->integer('responsavel_id')->nullable()->unsigned();
            $table->integer('aluno_endereco_id')->nullable()->unsigned();
            $table->timestamps();
            $table->foreign('serie_ingresso_id')->references('id')->on('serie_ingresso');
            $table->foreign('responsavel_id')->references('id')->on('aluno_responsavel');
            $table->foreign('aluno_endereco_id')->references('id')->on('aluno_enderecos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estudantes');
    }
}
