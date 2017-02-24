<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidato;
use App\Models\Voto;

class CandidatosController extends Controller
{
    //
	private $candidato;
	private $voto;
	
	public function __construct(Candidato $candidato, Voto $voto)
	{
		$this->candidato = $candidato;
		$this->voto = $voto;
	}

	public function inserir($nome){


		$insert = $this->candidato->create([
            "name" => $nome
        ]);


		if ($insert){
			return ["mensagem" => "Cadastrado com sucesso!"];
		} else {
			return ["mensagem" => "Ocorreu alguma falha no cadastro desta pessoa.
			Verifique se o campo não está vazio ou não é menor que 3 caracteres"];
		}

	}

	public function getAllCandidatos()
	{
	
		$candidatosResult = array 
        	    (
                	array ( 'id' => 4,
                        	'nome' => 'teste',
	                        'estrelas' => 1)        
        	    );

	
		$candidatos = $this->candidato->all();
		//$candidatosResult = $candidatos;

		foreach ($candidatos as $cand) 
		{
			$id_candidato = $cand->id;
			$estrelas = $this->voto->where('id_candidato', $id_candidato)->sum('estrelas');
			array_push($candidatosResult, array('id' => $cand->id, 'nome' => $cand->name, 'estrelas' => $estrelas));
		}

	

		return response()->json($candidatosResult);
	}
}
