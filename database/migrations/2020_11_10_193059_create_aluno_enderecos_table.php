<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlunoEnderecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aluno_enderecos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('estudante_id');
            $table->integer('cep');
            $table->integer('numero');
            $table->string('complemento', 50);
            $table->string('bairro', 100);
            $table->string('cidade', 100);
            $table->integer('estado');
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
        Schema::dropIfExists('aluno_enderecos');
    }
}
