@extends("layouts.admin")

@section("content")

<div class="container">
    <div class="row">
        <div class="col-12 mt-3">
            <h2>{{ $project->name }}</h2>
            <p>{{ $project->slug }}</p>
            @if($project->cover_image !== null)
                <img src="{{ asset("/storage/" . $project->cover_image) }}" alt="{{ $project->name}}" width="150" >
            @else
            <img src="{{ asset("/img/placeholder1.jpg") }}" alt="{{ $project->name}}" width="150">
            @endif
            <p>{{ $project->description }}</p>
            <p>{{ $project->type->name }}</p>
            <p>{{ $project->assigned_by }}</p>
            </div>
    </div>
</div>


@endsection