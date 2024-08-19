@extends('layouts.plantilla')

@section('titulo', 'Formulario de pacientes')

@section('contenido')
    <br>
    <h1>{{ isset($paciente)? 'Editar paciente' : 'Registrar un nuevo paciente'}}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="{{ isset($paciente)? route('pacientes.update', $paciente->id) : route('pacientes.store')}}">
        @if(isset($paciente))
            @method('put')
        @endif
        @csrf
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="nombre" name="nombre"
        value="{{isset($paciente)?$paciente->nombre :  old('nombre')}}"
        >
        <label for="nombre">Nombre del paciente:</label>
    </div>

    <div class="row g-2">
        <div class="col-md">
            <div class="form-floating">
                <input type="text" class="form-control" name="edad" id="edad"
                       value="{{isset($paciente)?$paciente->edad :  old('edad')}}">
                <label for="edad">Edad:</label>
            </div>
        </div>

        <div class="col-md">
            <div class="form-floating">
                <select class="form-select" id="genero" name="genero"
                        value="{{isset($paciente)?$paciente->genero :  old('genero')}}"
                >
                    <option value="">--Selecciona--</option>
                    <option value="M">M</option>
                    <option value="F">F</option>
                </select>
                <label for="genero">Selecciona tu genero:</label>
            </div>
        </div>
    </div>
        <br>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a class="btn btn-danger" href="{{route('pacientes.index')}}">Atrás</a>

    </form>




@endsection
