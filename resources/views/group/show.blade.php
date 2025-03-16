@extends('layouts.app-layout')

@section('title')
    Grupo
@endsection
@section('content')
    <div class="m-4 p-4 d-flex justify-content-center">
        <div style="max-width: 1280px; min-width: 500px;">
            <a href="/">← Regresar</a>
            <h1>Grupo {{$group->semester}}-{{$group->group}}</h1>
            <p class="text-muted">{{$group->session}}</p>
            <div class="d-flex justify-content-around align-items-center">
                <a class="btn btn-secondary" href="/group/{{$group->id}}/edit">Editar grupo</a>
                <form action="/group/{{ $group->id }}" method="POST">
                    @method('delete')
                    @csrf
                    <input type="submit" class="btn btn-secondary" value="Eliminar grupo"/>
                </form>
            </div>
        </div>
    </div>
@endsection
