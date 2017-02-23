<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    public $rules = [ 'name' => 'required|min:3|max:99'];
}
