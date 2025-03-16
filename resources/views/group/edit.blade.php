@extends('layouts.app-layout')

@section('title')
    Actualizar grupo
@endsection
@section('content')
    <div class="m-4 p-4 d-flex justify-content-center">
        <div style="max-width: 1280px">
            <a href="/">← Regresar</a>
            <h1>Actualizar grupo</h1>
            <form method="post" action="/group/{{$group->id}}">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="semester" class="form-label">Semestre</label>
                    <input type="numeric" class="form-control" id="semester" name="semester" value="{{ $group->semester }}" required>
                    @if ($errors->has('semester'))
                        <span class="text-danger">{{ $errors->first('semester') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="group" class="form-label">Grupo</label>
                    <input type="text" class="form-control" id="group" name="group" value="{{ $group->group }}" required maxlength="1">
                    @if ($errors->has('group'))
                        <span class="text-danger">{{ $errors->first('group') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="session" class="form-label">Turno</label>
                    <input type="text" class="form-control" id="session" name="session" value="{{ $group->session }}" required>
                    @if ($errors->has('session'))
                        <span class="text-danger">{{ $errors->first('session') }}</span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </div>
@endsection
