<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suscripcion extends Model
{
    protected $table = 'suscripciones';

    protected $fillable = ['user_id', 'plan_id', 'fecha_inicio', 'fecha_fin', 'estado'];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class, 'plan_id');
    }

    public function pagos()
    {
        return $this->hasMany(Pago::class, 'suscripcion_id');
    }
}
