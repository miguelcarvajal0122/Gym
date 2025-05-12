<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
 
    public function index() {
        $planes = Plan::all();
        return view('planes.index', compact('planes'));
    }

    public function create() {
        return view('planes.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric',
            'duracion' => 'required|integer',
            'descripcion' => 'nullable|string'
        ]);
        
        

        Plan::create($request->all());
        return redirect()->route('planes.index')->with('success', 'Plan creado correctamente.');
    }

    public function edit($id)
{
    $plan = Plan::findOrFail($id);
    return view('planes.edit', compact('plan'));
}


public function update(Request $request, $id)
{
    $plan = Plan::findOrFail($id);
    $plan->update($request->all());

    return redirect()->route('planes.index')->with('success', 'Plan actualizado correctamente.');
}

    public function destroy($id) {
        $plan = Plan::findOrFail($id);
        $plan->delete();
        return redirect()->route('planes.index')->with('success', 'Plan eliminado.');
    }
}
