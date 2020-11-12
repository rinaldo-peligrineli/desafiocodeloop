<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlunoEndereco extends Model
{
    protected $table = 'aluno_enderecos';
    protected $fillable = [
        'estudante_id', 'rua', 'cep', 'numero', 'complemento', 'bairro', 'cidade', 'estado'];
}
