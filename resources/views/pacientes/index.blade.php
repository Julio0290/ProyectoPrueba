@extends('layouts.plantilla')

@section('titulo', 'Pacientes')

@section('contenido')

    <h1>Pacientes <span><a class="btn btn-success" href="{{route('pacientes.create')}}">Nuevo paciente</a></span></h1>
    @if(session('mensaje'))
        <div class="alert alert-success" role="alert">
            {{session('mensaje')}}
        </div>
    @endif

    <table class="table table-striped ">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Edad</th>
            <th scope="col">Genero</th>
            <th scope="col">Acciones</th>

        </tr>
        </thead>
        <tbody>


        @foreach($pacientes as $paciente)
            <tr>
                <th scope="row">{{ $paciente->id }} </th>
                <td> <a >{{ $paciente->nombre }}</a></td>
                <td>{{ $paciente->edad}} años</td>
                <td>{{ ($paciente->genero) }}</td>
                <td>
                    <a class="btn btn-warning btn-sm" href="{{route('pacientes.edit', $paciente->id )}}">Editar</a>
                </td>
                        </tr>
@endforeach
        </tbody>
    </table>
    {{ $pacientes->links()}}
@endsection
