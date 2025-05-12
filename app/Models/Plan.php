<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion', 'precio', 'duracion'];
    
    protected $table = 'planes'; // <- esta línea soluciona el error
}