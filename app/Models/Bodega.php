<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bodega extends Model
{
    use HasFactory;

    const BODEGA_ACTIVO = 'A';
    const BODEGA_INACTIVO = 'I';

    const BODEGA_ABIERTA = '1';
    const BODEGA_CERRADA = '0';

    protected $fillable = [
        'sede_id',
        'ciudad_id',
        'usuario_id',
        'bodenomb',
        'bodeabrv',
        'bodedirec',
        'bodecontact',
        'bodetelcont',
        'bodeindice',
        'bodecierre',
        'bodeestado',
        'bodeuscr'
    ];

    public function sede()
    {
        return $this->belongsTo(Sede::class);
    }

    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class);
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function esActivo()
    {
        return $this->bodeestado === Bodega::BODEGA_ACTIVO;
    }

    public function esAbierta()
    {
        return $this->bodecierre == Bodega::BODEGA_ABIERTA;
    }
}
