<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $fillable = ['suscripcion_id', 'monto', 'fecha_pago', 'metodo_pago'];

public function suscripcion()
{
    return $this->belongsTo(Suscripcion::class);
}

}
