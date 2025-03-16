@extends('layouts.app-layout')

@section('title')
    Estudiante
@endsection
@section('content')
    <div class="m-4 p-4 d-flex justify-content-center">
        <div style="max-width: 1280px; min-width: 500px;">
            <a href="/">← Regresar</a>
            <h1>{{ $student->first_name }} {{ $student->last_name }}</h1>
            <div class="row">
                <p class="text-center">{{ $student->phone_number }} - {{ $student->email }}</p>
            </div>
            <div class="d-flex justify-content-center align-items-center">
                <p>Pertenece al grupo {{ $student->group->semester }}-{{ $student->group->group }}</p>
            </div>
            <div class="d-flex justify-content-around align-items-center">
                <a class="btn btn-secondary" href="/student/{{$student->id}}/edit">Editar alumno</a>
                <form action="/student/{{ $student->id }}" method="POST">
                    @method('delete')
                    @csrf
                    <input type="submit" class="btn btn-secondary" value="Eliminar Estudiante"/>
                </form>
            </div>
        </div>
    </div>
@endsection
