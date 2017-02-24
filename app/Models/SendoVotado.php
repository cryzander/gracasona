<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SendoVotado extends Model
{
    protected $fillable = ['id_candidato', 'sessao'];
    public $timestamps = false;
}
