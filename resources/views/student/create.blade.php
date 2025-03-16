@extends('layouts.app-layout')

@section('title')
    Crear un nuevo estudiante
@endsection
@section('content')
    <div class="m-4 p-4 d-flex justify-content-center">
        <div style="max-width: 1280px">
            <a href="/">← Regresar</a>
            <h1>Crear nuevo estudiante</h1>
            <form method="post" action="/student">
                @csrf
                <div class="mb-3">
                    <label for="first_name" class="form-label">Nombre</label>
                    <input type="numeric" class="form-control" id="first_name" name="first_name" value="{{ old('first_name') }}" required maxlength="50">
                    @if ($errors->has('first_name'))
                        <span class="text-danger">{{ $errors->first('first_name') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="last_name" class="form-label">Apellido</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name') }}" required maxlength="50">
                    @if ($errors->has('last_name'))
                        <span class="text-danger">{{ $errors->first('last_name') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email"  value="{{ old('email') }}" required>
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="phone_number" class="form-label">Número de telefono</label>
                    <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" required>
                    @if ($errors->has('phone_number'))
                        <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="group" class="form-label">Grupo</label>
                    <select class="form-select" id="group" name="group_id"  value="{{ old('group_id') }}" required>
                        <option value="" disabled selected>Selecciona...</option>
                        @foreach ($groups as $grupo)
                            <option value="{{$grupo->id}}">{{$grupo->semester}}-{{$grupo->group}}</option>
                        @endforeach
                      </select>
                      @if ($errors->has('group_id'))
                          <span class="text-danger">{{ $errors->first('group_id') }}</span>
                      @endif
                    </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </div>
@endsection
