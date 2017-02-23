<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voto extends Model
{
    //
	public rules = [
		'id_candidato' => 'required|numeric',
		'sessao' => 'required|numeric',
		'estrelas' => 'required|numeric',
		'id_usuario' => 'required|numeric'
	];
}
