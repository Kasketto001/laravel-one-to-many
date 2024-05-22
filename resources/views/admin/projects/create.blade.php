@extends('layouts.admin')

@section('content')
    <div class="container mt-5 d-flex justify-content-between">
        <h1>New Project</h1>
    </div>
    <div class="container mt-3">

        @if ($errors->any())
            
            <div
                class="alert alert-danger"
                role="alert"
            >
                <ul>
                    @foreach ($errors->all() as $error )
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            
        @endif



        <form action="{{ route('admin.projects.store') }}" method="post">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input
                    type="text"
                    class="form-control @error('title') is-invalid @enderror"
                    name="title"
                    id="title"
                    aria-describedby="titleHelp"
                    placeholder="Project Title"
                    value="{{old('title')}}"
                />
                <small id="titleHelp" class="form-text text-muted">Write the project title</small>
                @error('title')
                <div class="text-danger py-3">
                    {{$message}}
                </div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea
                    class="form-control @error('description') is-invalid @enderror"
                    name="description"
                    id="description"
                    rows="3"
                    aria-describedby="descriptionHelp"
                    placeholder="Project Description"
                    
                >{{old('description')}}</textarea>
                <small id="descriptionHelp" class="form-text text-muted">Write the project description</small>
                @error('description')
                <div class="text-danger py-3">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="author" class="form-label">Author</label>
                <input
                    type="text"
                    class="form-control @error('author') is-invalid @enderror"
                    name="author"
                    id="author"
                    aria-describedby="authorHelp"
                    placeholder="Author Name"
                    value="{{old('author')}}"
                />
                <small id="authorHelp" class="form-text text-muted">Write the author's name (optional)</small>
                @error('author')
                <div class="text-danger py-3">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="thumb" class="form-label">Thumbnail URL</label>
                <input
                    type="text"
                    class="form-control @error('thumb') is-invalid @enderror"
                    name="thumb"
                    id="thumb"
                    aria-describedby="thumbHelp"
                    placeholder="Thumbnail URL"
                    value="{{old('thumb')}}"
                />
                <small id="thumbHelp" class="form-text text-muted">Provide the thumbnail URL (optional)</small>
                @error('thumb')
                <div class="text-danger py-3">
                    {{$message}}
                </div>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
