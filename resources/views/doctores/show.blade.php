@extends('layouts.plantilla')


@section('contenido')
    <h1>Doctor</h1>

    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{ $doctor->nombre }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{ $doctor->especialidad}} </h6>
            <a href=" {{ route('doctores.index') }}" class="card-link">Volver</a>
        </div>
    </div>


    <h2>Pacientes </h2>
    <table class="table">
        <thead>
        <th>Id Paciente</th>
        <th>Nombre</th>
        <th>Edad</th>
        <th>Genero</th>
        </thead>
        <tbody>
        @forelse($doctor -> pacientes as $paciente)
            <tr>
                <td>{{$paciente -> id   }}</td>
                <td>{{$paciente -> nombre}}</td>
                <td>{{$paciente -> edad }}</td>
                <td>{{$paciente -> genero }}</td>
            </tr>


        @empty
            <br><br>
            <td colspan="2">El doctor no tiene pacientes</td>
        @endforelse
        </tbody>
    </table>



@endsection
@section('titulo', 'Un paciente')
