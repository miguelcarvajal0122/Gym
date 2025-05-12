<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pago;
use App\Models\Suscripcion;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pagos = Pago::with('suscripcion.usuario')->get(); // Carga también el usuario
        return view('pagos.index', compact('pagos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Cargar relaciones usuario y plan para mostrar en el formulario
        $suscripciones = Suscripcion::with(['usuario', 'plan'])->get();
        return view('pagos.create', compact('suscripciones'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'suscripcion_id' => 'required|exists:suscripciones,id',
            'fecha_pago' => 'required|date',
        ]);

        // Obtener el monto del plan desde la suscripción
        $suscripcion = Suscripcion::with('plan')->findOrFail($request->suscripcion_id);
        $monto = $suscripcion->plan->precio;

        // Registrar el pago
        Pago::create([
            'suscripcion_id' => $request->suscripcion_id,
            'monto' => $monto,
            'fecha_pago' => $request->fecha_pago,
            'metodo_pago' => 'efectivo',
        ]);

        return redirect()->route('pagos.index')->with('success', 'Pago registrado correctamente');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pago $pago)
    {
        $suscripciones = Suscripcion::with(['usuario', 'plan'])->get();
        return view('pagos.edit', compact('pago', 'suscripciones'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pago $pago)
    {
        $request->validate([
            'suscripcion_id' => 'required|exists:suscripciones,id',
            'fecha_pago' => 'required|date',
        ]);

        // Obtener el nuevo monto del plan desde la suscripción
        $suscripcion = Suscripcion::with('plan')->findOrFail($request->suscripcion_id);
        $monto = $suscripcion->plan->precio;

        $pago->update([
            'suscripcion_id' => $request->suscripcion_id,
            'monto' => $monto,
            'fecha_pago' => $request->fecha_pago,
            'metodo_pago' => 'efectivo',
        ]);

        return redirect()->route('pagos.index')->with('success', 'Pago actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pago $pago)
    {
        $pago->delete();

        return redirect()->route('pagos.index')->with('success', 'Pago eliminado correctamente');
    }
}