@extends('layouts.admin')

@section('content')
    <div class="container mt-5 d-flex justify-content-between">
        <h1>All Projects</h1>
        <a class="btn btn-primary "href="{{route('admin.projects.create')}}"><i class="fa fa-plus" aria-hidden="true"></i></a>
    </div>
    <div class="container mt-3">
        <div
            class="table-responsive"
        >
            <table
                class="table table-striped"
            >
                <thead class="">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Author</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($projects as $project)
                        <tr class="">
                        <td scope="row">{{$project->id}}</td>
                        <td scope="row">{{$project->title}}</td>
                        <td>{{$project->author}}</td>
                        <td><a class="btn btn-primary "href="{{route('admin.projects.show', $project->slug)}}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                            <a class="btn btn-primary "href="{{route('admin.projects.edit', $project->slug)}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            /delete</td>
                    </tr>
                    @empty
                        <tr class="">
                        <td scope="row">No projects 😿</td>
                    </tr>
                    @endforelse
                    
                    
                </tbody>
            </table>
        </div>
        
    </div>

@endsection