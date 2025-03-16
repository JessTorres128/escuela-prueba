@extends('layouts.app-layout')


@section('title')
    Home
@endsection
@section('content')
    <div class="m-4 p-4 d-flex justify-content-center">
        <div style="max-width: 1280px; min-width: 500px;">
            <div class="d-flex flex-wrap justify-content-start">
                <div class="row w-100">
                    <h2>Estudiantes <a href="/student/create"
                            class="link-body-emphasis link-offset-2 link-underline-opacity-25 link-underline-opacity-75-hover">Nuevo</a>
                    </h2>
                </div>
                @if($students->isEmpty())
                    <div class="p-4 m-4">
                        <p class="h1">No hay estudiantes registrados</p>
                    </div>
                @endif
                @foreach ($students as $student)
                    @component('components.student-card', ['student' => $student])
                    @endcomponent
                @endforeach
            </div>
            <div class="d-flex justify-content-end pagination">
                {{ $students->appends(request()->query())->links() }}
            </div>

            <div class="d-flex flex-wrap justify-content-start">
                <div class="row w-100">
                    <h2>Grupos <a href="/group/create"
                            class="link-body-emphasis link-offset-2 link-underline-opacity-25 link-underline-opacity-75-hover">Nuevo</a>
                    </h2>
                </div>
                @if($groups->isEmpty())
                    <div class="p-4 m-4">
                        <p class="h1">No hay grupos registrados</p>
                    </div>
                @endif
                @foreach ($groups as $group)
                    @component('components.group-card', ['group' => $group])
                    @endcomponent
                @endforeach
            </div>
            <div class="d-flex justify-content-end pagination">
                {{ $groups->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
@endsection
