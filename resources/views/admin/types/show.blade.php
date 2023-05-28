@extends('layouts.admin')

@section('content')
  
<div class="container">
    
<h1 class="m-3">Type: {{$type->name}}</h1>


@if (count($type->projects) > 0)




<table class="mt-5 table table-striped">


    <thead class="thead-dark">
        <tr>
            <th>Title</th>
            {{-- <th>Content</th> --}}
            <th>Slug</th>
            <th>Console</th>
        </tr>
    </thead>


    <tbody>
        @foreach($type->projects as $item)
        <tr>
            <td>{{$item->title}}</td>
            {{-- <td>{{$item->content}}</td> --}}
            <td>{{$item->slug}}</td>

            <td class="line-height">
                <div class="d-flex gap-2">
                    <a href="{{route('admin.projects.show', ['project' => $item->slug])}}" class="btn btn-primary">View</a>
                    <a href="{{route('admin.projects.edit', ['project' => $item->slug])}}" class="btn btn-warning">Edit</a>

                    <form method="POST" action="{{route('admin.projects.destroy', ['project' => $item->slug])}}"  class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Confermi di voler cancellare questo elemento dalla libreria? Questa azione non è reversibile')">Delete</button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>



@else
    <strong>No project of this type</strong>
@endif

<div class="d-flex justify-content-around">
    <a href="{{route('admin.types.edit', $type)}}" class="btn btn-secondary">Edit Type</a>

    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
      Elimina
    </button>
    
  </div>


</div>
@endsection
