@extends('layouts.admin')

@section('content')
    <div class="container mt-5 d-flex justify-content-between">
        <h1>All Projects</h1>
        <a class="btn btn-primary d-flex justify-content-center align-items-center px-4" href="{{route('admin.projects.create')}}"><i class="fa fa-plus" aria-hidden="true"></i></a>
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
                            <button type="button" class="btn btn-danger py-2 px-3" data-bs-toggle="modal"
                                data-bs-target="#modalId-{{ $project->id }}">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>

                            <!-- Modal Body -->
                            <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                            <div class="modal fade" id="modalId-{{ $project->id }}" tabindex="-1"
                                data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                aria-labelledby="modalTitleId-{{ $project->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                    role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalTitleId-{{ $project->id }}">
                                                Are you sure to delete this project?
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            If you click on DELETE, the action will be irreversible, and you will lose the
                                            project!
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close
                                            </button>
                                            <form action="{{ route('admin.projects.destroy', $project) }}" method="post">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-danger">
                                                    Confirm
                                                </button>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </td>
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