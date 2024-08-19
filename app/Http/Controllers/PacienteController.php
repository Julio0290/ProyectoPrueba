<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\Doctor;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pacientes = Paciente::paginate(10); // Correct variable name
        return view('pacientes.index')->with('pacientes', $pacientes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pacientes.formulario');  //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|regex:/[A-Za-z áéíóúñ]+$/i',
            'edad' => ['required', 'numeric', 'min:0'],
            'genero'=>'required',
            ]);

        $nuevoPaciente = new Paciente();
        $nuevoPaciente->nombre = $request->input('nombre');
        $nuevoPaciente->edad = $request->input('edad');
        $nuevoPaciente->genero = $request->input('genero');

        if($nuevoPaciente->save()){//significa que se guardo
            return redirect()->route('pacientes.index')->with('mensaje', 'Paciente guardado exitosamente');
        } else{return redirect()->route('pacientes.index')->with('mensaje', 'Error, el paciente no se pudo guardar');}

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $paciente = Paciente::findOrfail($id);
        return view('pacientes.formulario')->with('paciente', $paciente);//
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $paciente = Paciente::findOrfail($id); //

    $request->validate([
        'nombre' => 'required|regex:/[A-Za-z áéíóúñ]+$/i',
        'edad' => ['required', 'numeric', 'min:0'],
        'genero' => 'required',
    ]);

    $paciente->nombre = $request->input('nombre');
    $paciente->edad = $request->input('edad');
    $paciente->genero = $request->input('genero');

    if ($paciente->save()) {//significa que se guardo
        return redirect()->route('pacientes.index')->with('mensaje', 'Paciente guardado exitosamente');
    } else {
        return redirect()->route('pacientes.index')->with('mensaje', 'Error, el paciente no se pudo guardar');

    }

}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
