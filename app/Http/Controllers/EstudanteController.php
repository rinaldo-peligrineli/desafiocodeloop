<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\EstudanteCollection;
use Illuminate\Support\Facades\DB;
use App\Estudante;
use App\AlunoResponsavel;
use App\AlunoEndereco;
use App\SerieIngresso;

class EstudanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objEstudantes =DB::table('estudantes')
            ->join('serie_ingresso', 'serie_ingresso.id', '=', 'estudantes.serie_ingresso_id')
            ->select('estudantes.id','estudantes.nome_aluno','estudantes.data_nascimento','serie_ingresso.serie_ingresso')->get();

        return response()->json($objEstudantes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $objEstudante = new Estudante([
            'nome_aluno' => $request->get('nome_aluno'),
            'serie_ingresso_id' => $request->get('serie_ingresso'),
            'data_nascimento' => \DateTime::createFromFormat ('d/m/Y', $request->get('data_nascimento'))->format('Y-m-d 00:00:00')
          ]);
          
          $objEstudante->save();

          $objResponsavel = new AlunoResponsavel([
            'estudante_id' => $objEstudante->id,  
            'nome_responsavel' => $request->get('nome_responsavel'),
            'cpf_responsavel' => $request->get('cpf_responsavel'),
            'dia_vencimento' => $request->get('dia_vencimento')
          ]);

          $objResponsavel->save();  

          $objEndereco = new AlunoEndereco([
            'estudante_id' => $objEstudante->id,  
            'rua' => $request->get('rua'),
            'cep' => $request->get('cep'),
            'numero' => $request->get('numero'),
            'complemento' => $request->get('complemento'),
            'bairro' => $request->get('bairro'),
            'cidade' => $request->get('cidade'),
            'estado' => $request->get('estado')
          ]);
          
          $objEndereco->save();  
          return response()->json('success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $objEstudante = Estudante::find($id);
      $objResponsavel = AlunoResponsavel::where('estudante_id', $objEstudante->id)->first(); 
      $objEndereco = AlunoEndereco::where('estudante_id', $objEstudante->id)->first();  
     
      $arr['estudante'] = $objEstudante;
      $arr['responsavel'] = $objResponsavel;
      $arr['endereco'] = $objEndereco;
      
      return response()->json($arr);
    }

       
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $objEstudante = Estudante::find($id);
        $objResponsavel = AlunoResponsavel::where('estudante_id', $objEstudante->id)->first(); 
        $objEndereco = AlunoEndereco::where('estudante_id', $objEstudante->id)->first();  
        
        $objEstudante->nome_aluno = $request->get('nome_aluno');
        $objEstudante->serie_ingresso_id = $request->get('serie_ingresso');
        $objEstudante->data_nascimento = \DateTime::createFromFormat ('d/m/Y', $request->get('data_nascimento'))->format('Y-m-d 00:00:00');
       
        $objEstudante->save();
        return response()->json('atualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function delete($id) {
        $objEstudante = Estudante::find($id);
        $objEstudante->delete($id);
        return response()->json('successfully deleted');
    }
}
