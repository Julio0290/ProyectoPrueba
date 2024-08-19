@extends('layouts.plantilla')

@section('titulo', 'Doctores')

@section('contenido')

    <h1>Doctor <span><a class="btn btn-success" href="{{route('doctores.create')}}">Nuevo doctor</a></span></h1>
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
            <th scope="col">Especialidad</th>
            <th scope="col">Acciones</th>

        </tr>
        </thead>
        <tbody>


        @foreach($doctores as $doctor)
            <tr>
                <th scope="row">{{ $doctor->id }}</th>
                <td> <a href="{{ route('doctores.show',['doctore'=>$doctor->id]) }}" >{{ $doctor->nombre }}</a></td>
                <td>{{ $doctor->especialidad}}</td>

            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $doctores->links()}}

@endsection
