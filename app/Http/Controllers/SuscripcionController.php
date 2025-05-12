<?php

namespace App\Http\Controllers;

use App\Models\Suscripcion;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;

class SuscripcionController extends Controller
{
    public function index()
    {
        $suscripciones = Suscripcion::with(['usuario', 'plan'])->get();
        return view('suscripciones.index', compact('suscripciones'));
    }

    public function create()
    {
        $usuarios = User::all();
        $planes = Plan::all();
        return view('suscripciones.create', compact('usuarios', 'planes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'plan_id' => 'required|exists:planes,id',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
            'estado' => 'required|string',
        ]);
    
        Suscripcion::create([
            'user_id' => $request->user_id,
            'plan_id' => $request->plan_id,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'estado' => $request->estado,
        ]);
    
        return redirect()->route('suscripciones.index')->with('success', 'Suscripción creada correctamente.');
    }

    public function edit(Suscripcion $suscripcion)
    {
        $usuarios = User::all();
        $planes = Plan::all();
        return view('suscripciones.edit', compact('suscripcion', 'usuarios', 'planes'));
    }

    public function update(Request $request, Suscripcion $suscripcion)
    {
        $request->validate([
            'user_id' => 'required',
            'plan_id' => 'required',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
            'estado' => 'required',
        ]);

        $suscripcion->update($request->all());

        return redirect()->route('suscripciones.index')->with('success', 'Suscripción actualizada');
    }

    public function destroy(Suscripcion $suscripcion)
    {
        $suscripcion->delete();
        return redirect()->route('suscripciones.index')->with('success', 'Suscripción eliminada');
    }
}

