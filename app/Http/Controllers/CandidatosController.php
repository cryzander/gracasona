<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidato;
use App\Models\Voto;
use App\Models\SendoVotado;

class CandidatosController extends Controller
{
    //
	private $candidato;
	private $voto;
	private $sendovotado;
	///private $idSendoVotado;
	
	public function __construct(Candidato $candidato, Voto $voto, SendoVotado $sendovotado)
	{
		$this->candidato = $candidato;
		$this->voto = $voto;
		$this->sendovotado = $sendovotado;

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

	public function deletar($id){
		$insert = $this->candidato->find($id)->delete();

		if ($insert){
			return ["mensagem" => "Deletado com sucesso!"];
		} else {
			return ["mensagem" => "Erro ao deletar. Talvez ele já tenha sido deletado."];
		}
	}

	public function escolherVotar($id){
		$this->sendovotado->create([
			"id_candidato" => $id
		]);
	}

	public function candidatoSendoVotado(){
		return $this->sendovotado->all()->last()->pluck('id_candidato');
	}

	public function votar($idusuario, $estrelas){
		
		$res;
		
		if (!$this->votouMaisdeUmaVez($idusuario, $this->candidatoSendoVotado)){
			$res = $this->voto->create([
				"id_candidato" => $this->candidatoSendoVotado,
				"sessao" => 1,
				"estrelas" => $estrelas,
				"id_usuario" => $idusuario
			]);
		}

		if ($res){
			return ["mensagem" => $this->candidatoSendoVotado];
		} else {
			return ["mensagem" => "Voto não realizado. Talvez você esteja tentando votar mais de uma vez na mesma pessoa na mesma sessao."];
		}
	}


	public function votouMaisdeUmaVez($idusuario, $idcandidato ){
		return false;
	}

	

	public function getAllCandidatos()
	{
	
		$candidatosResult = array 
        	    (
                	array ( 'id' => 0,
                        	'nome' => 'Ninguém',
	                        'estrelas' => 0)        
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
