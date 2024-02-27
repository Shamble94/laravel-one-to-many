@extends("layouts.admin")

@section("content")

<div class="container">
    <div class="row">
        <div class="col-12 mt-3">
            <h2>{{ $type->name }}</h2>
            <p>{{ $type->slug }}</p>
        </div>
        <div class="row">
            @forelse($type->projects as $project)
            <div class="col-12 col-md-3">
                <div class="card">

                    <img src="{{ $project->cover_image ? asset("/storage/" . $project->cover_image)  : asset("/img/placeholder1.jpg")}}" alt="{{ $project->name}}" width="200" >
                    <div class="card-body">
                        {{ $project->name}}
                    </div>
                </div>
            </div>
            
            @empty
                <div class="col-12"><h3>Non ci sono progetti per questa tipologia</h3></div>
            @endforelse
        </div>
    </div>
</div>


@endsection