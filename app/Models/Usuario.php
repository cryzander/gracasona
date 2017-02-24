<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    //
	public $rules = [
		'numerousuario' => 'required|numeric'
	];

	protected $fillable = ['numerousuario'];
}
