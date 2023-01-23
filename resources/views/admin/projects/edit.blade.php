@extends('layouts.app')

@section('title')

| Modifica progetto: {{ $project->name }}

@endsection

@section('content')

<div class="container mt-5">
    <h4>Modifica progetto: {{ $project->name }}</h4>

    @if ($errors->any())

    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>
                    {{$error}}
                </li>
            @endforeach
        </ul>
    </div>

    @endif
    <form action="{{ route('admin.project.update', $project) }}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Project name..." name="name" value="{{old('name', $project->name)}}">
            @error('name')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="client_name" class="form-label">Client name</label>
            <input type="text" class="form-control @error('client_name') is-invalid @enderror" id="client_name" placeholder="Client name..." name="client_name" value="{{old('client_name', $project->client_name)}}">
            @error('client_name')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="cover_image" class="form-label">Cover image</label>
            <input
                onchange="showImage(event)"
                type="file" class="form-control @error('cover_image') is-invalid @enderror" id="cover_image" placeholder="Image path..." name="cover_image" value="{{old('cover_image', $project->cover_image)}}">
            @error('cover_image')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
            <div>
                <img class="my-minature" id="output-image" src="{{ asset('storage/' . $project->cover_image) }}" alt="{{$project->image_original_name}}">
            </div>
        </div>
        <div class="mb-3">
            <label for="summary" class="form-label">Summary</label>
            <textarea class="form-control @error('summary') is-invalid @enderror" id="summary" rows="3" name="summary">{{ old('summary', $project->summary) }}</textarea>
            @error('summary')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Invia</button>
    </form>
</div>

<script>
    ClassicEditor
        .create( document.querySelector( '#summary' ), {
            toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
        } )
        .catch( error => {
            console.error( error );
        } );

    function showImage(event){
        const targetImage = document.getElementById('output-image');
        targetImage.src = URL.createObjectURL(event.target.files[0]);
    }
</script>

@endsection
