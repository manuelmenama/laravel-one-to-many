@extends('layouts.app')

@section('content')

    <div class="container mt-5">

        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Cerca
                </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <form action="{{ route('admin.project.index') }}" method="GET">
                        @csrf
                        <div class="mb-3">
                            <input type="text" class="form-control" id="search" placeholder="Cerca per nome.." name="search">
                        </div>
                        <button class="btn btn-primary" type="submit">Cerca</button>
                    </form>

                </div>
            </div>
        </div>


        @if (session('deleted'))

        <div class="alert alert-success">
            {{session('deleted')}}
        </div>
        @endif

        <table class="table">
            <thead>
              <tr>
                <th scope="col"><a href="{{ route('admin.projects.orderby', ['id', $direction]) }}">#</a></th>
                <th scope="col"><a href="{{ route('admin.projects.orderby', ['name', $direction]) }}">Project Name</a></th>
                <th scope="col"><a href="{{ route('admin.projects.orderby', ['client_name', $direction]) }}">Client</a></th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($projects as $project)
                <tr>
                    <td>{{$project->id}}</td>
                    <td>{{$project->name}} <span class="badge text-bg-info">{{ $project->type?->name }}</span></td>
                    <td>{{$project->client_name}}</td>
                    <td class="d-flex">
                        <a href="{{ route('admin.project.show', $project) }}" class="btn btn-primary me-2"><i class="fa-solid fa-eye"></i></a>
                        <a href="{{ route('admin.project.edit', $project) }}" class="btn btn-warning me-2"><i class="fa-solid fa-pencil"></i></a>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal{{$project->id}}">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                        {{-- Button delete manda questo modal --}}
                        @include('admin.partials.confirm-delete')
                    </td>
                </tr>
                @empty
                    <td colspan="4"><h4>Non ci sono risultati</h4></td>
                @endforelse
            </tbody>
          </table>
          {{$projects->links()}}
    </div>

@endsection
