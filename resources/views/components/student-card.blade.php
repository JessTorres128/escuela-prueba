<div class="card m-2" style="width: 18rem;">
    <div class="card-body">
      <a href="/student/{{$student->id}}" class="h5 link-body-emphasis link-offset-2 link-underline link-underline-opacity-0">{{$student->first_name}} {{$student->last_name}}</a>
      <h6 class="card-subtitle mb-2 text-body-secondary">Contacto: {{$student->phone_number}} - {{$student->email}}</h6>
      <p>Pertenece al grupo: <a href="/group/{{$student->group->id}}" class="link-body-emphasis link-offset-2 link-underline-opacity-25 link-underline-opacity-75-hover">{{$student->group->semester}}-{{$student->group->group}}</a></p>
   
      <a href="/student/{{$student->id}}/edit" class="link-body-emphasis link-offset-2 link-underline-opacity-25 link-underline-opacity-75-hover">Editar</a>
    </div>
    
  </div>