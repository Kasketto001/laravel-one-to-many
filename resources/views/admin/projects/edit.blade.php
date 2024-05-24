@extends('layouts.admin')

@section('content')
    <div class="container mt-5 d-flex justify-content-between">
        <h1>Edit {{$project->title}}</h1>
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



        <form action="{{ route('admin.projects.update', $project)}}" method="post" enctype="multipart/form-data">
            @csrf
            @METHOD('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input
                    type="text"
                    class="form-control @error('title') is-invalid @enderror"
                    name="title"
                    id="title"
                    aria-describedby="titleHelp"
                    placeholder="Project Title"
                    value="{{$project->title}}"
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
                    
                >{{$project->description}}</textarea>
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
                    value="{{$project->author}}"
                />
                <small id="authorHelp" class="form-text text-muted">Write the author's name (optional)</small>
                @error('author')
                <div class="text-danger py-3">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="thumb" class="form-label">Thumbnail Image</label>
                <input
                    type="file"
                    class="form-control"
                    name="thumb"
                    id="thumb"
                    placeholder="Add Thumbnail"
                    aria-describedby="thumbHelpId"
                    value="{{ asset(str_replace('public', 'storage', $project->thumb)) }}"
                />

                <small id="thumbHelp" class="form-text text-muted">Provide the thumbnail image (optional)</small>
                @error('thumb')
                <div class="text-danger py-3">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="type_id">Type</label>
                    <select name="type_id" id="type_id" class="form-control">
                        <option value="">Select Type</option>
                        @foreach($types as $type)
                            <option value="{{ $type->id }}" {{ old('type_id', $project->type_id ?? '') == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                        @endforeach
                    </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
