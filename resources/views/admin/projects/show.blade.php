@extends('layouts.admin')

@section('content')

<header>
    <div class="py-5 bg-dark text-white">
        <div class="container">
            <h1>{{ $project->title }}</h1>
        </div>
    </div>
</header>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="container d-flex justify-content-center align-items-center">
                <img  class=" rounded" src="{{asset('storage/app/public/uploads/' . $project->thumb)}}" alt="">
            </div>
            <h4 class="mt-4">Tipo</h4>
            @if($project->type)
                <p>Type: {{ $project->type->name }}</p>
            @endif
            <h2 class="mb-3">Descrizione</h2>
            <p>{{ $project->description }}</p>
            <hr>
            <h4 class="mt-4">Autore</h4>
            <p>{{ $project->author }}</p>

        </div>
    </div>
</div>

@endsection
