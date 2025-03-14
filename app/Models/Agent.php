<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_agent';

    protected $fillable = [
        'id_user',
        'nombre_agente',
        'info',
        'web',
        'telefono',
    ];
}