<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    use HasFactory;
    
    const CIUDAD_ACTIVO = 'A';
    const CIUDAD_INACTIVO = 'I';

    protected $table = 'ciudades';

    protected $fillable = [
        'ciudnomb',
        'ciudabrv',
        'ciudestado',
        'ciuduscr'
    ];

}
