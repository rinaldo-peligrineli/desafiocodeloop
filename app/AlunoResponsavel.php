<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlunoResponsavel extends Model
{
    protected $table = 'aluno_responsavel';
    protected $fillable = ['estudante_id', 'nome_responsavel', 'cpf_responsavel', 'dia_vencimento'];
}
