<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Palestra extends Model
{
    protected $fillable = [
    'titulo',
    'descricao',
    'data_hora',
    'local',
    'palestrante',
    'estado',
];

}
