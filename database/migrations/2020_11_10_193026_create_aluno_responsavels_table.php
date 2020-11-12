<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlunoResponsavelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aluno_responsavel', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('estudante_id');
            $table->string('nome_responsavel');
            $table->string('cpf_responsavel');
            $table->string('dia_vencimento', 50);
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
        Schema::dropIfExists('aluno_responsavels');
    }
}
