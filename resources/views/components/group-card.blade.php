<div class="card m-3" style="width: 18rem;">
    <div class="card-body">
        <a href="/group/{{ $group->id }}"
            class="h5 link-body-emphasis link-offset-2 link-underline link-underline-opacity-0">
            {{ $group->semester }}-{{ $group->group }}</a>
        <h6 class="card-subtitle mb-2 text-body-secondary">{{ $group->session }}</h6>
        <ul>
            @if ($group->students->isEmpty())
                <li>No hay estudiantes en este grupo.</li>
            @else
                <strong class="mb-1">Estudiantes</strong>
                @foreach ($group->students as $student)
                    <li>{{ $student->first_name }} {{ $student->last_name }}</li>
                @endforeach
            @endif
        </ul>
        <a href="/group/{{ $group->id }}/edit"
            class="link-body-emphasis link-offset-2 link-underline-opacity-25 link-underline-opacity-75-hover">Editar</a>
    </div>
</div>
