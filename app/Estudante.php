<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudante extends Model
{
    protected $fillable = ['estudante', 'nome_aluno', 'data_nascimento', 'serie_ingresso_id'];

    protected $casts = [
        'data_nascimento' => 'datetime:Y-m-d'
     ];

     public function serieIngresso() {
        return $this->belongsTo('App\SerieIngresso');
     } 
}
