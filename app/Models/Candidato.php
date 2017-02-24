<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    protected $fillable = ['name'];
    public $rules = [ 'name' => 'required|min:3|max:99'];
}
