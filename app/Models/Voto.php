<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voto extends Model
{
    //
	public $timestamps = false;
    protected $fillable = ['id_candidato', 'sessao', 'estrelas', 'id_usuario'];
	public $rules = [
		'id_candidato' => 'required|numeric',
		'sessao' => 'required|numeric',
		'estrelas' => 'required|numeric',
		'id_usuario' => 'required'
	];
}
