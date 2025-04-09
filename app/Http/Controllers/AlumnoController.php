<?php
//iverson
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    public function create()
    {
        return view('alumnos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email|unique:alumnos',
            'telefono' => 'required',
            'plan' => 'required',
        ]);

        Alumno::create($request->all());

        return redirect()->back()->with('success', 'Alumno agregado correctamente.');
    }

    //editar alumnos
   /* public function edit($alumnos) {
        $alumnos = alumnos::findOrFail($alumnos);
        return view('alumnos.edit', compact('alumnos'));
    }

    public function update(Request $request, $id) {
        $plan = Plan::findOrFail($id);
        $request->validate([
            'nombre' => 'required',
            'correo' => 'required|numeric',
            'telefono' => 'required|integer'
        ]);

        $plan->update($request->all());
        return redirect()->route('planes.index')->with('success', 'Plan actualizado.');
    }

    public function destroy($id) {
        $plan = Plan::findOrFail($id);
        $plan->delete();
        return redirect()->route('planes.index')->with('success', 'Plan eliminado.');
    }*/


}


