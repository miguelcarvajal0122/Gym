<?php
//iverson
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
/*use Illuminate\Database\Eloquent\Model;*/

class Alumno extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'email', 'telefono', 'plan'];
}

