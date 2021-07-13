<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    
    const USUARIO_ACTIVO = 'A';
    const USUARIO_INACTIVO = 'I';

    protected $fillable = [
        'usuaident',
        'usuanomb',
        'usuanomb1',
        'usuanomb2',
        'usuaapell1',
        'usuaapell2',
        'usuaestado'
    ];

}
