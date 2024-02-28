@extends("layouts.admin")

@section("content")
<div class="container">
    <div class="row">
        <div class="col-12">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <h2 class="text-center">Modifica progetto</h2>
        </div>
        <div class="col-12">
            <form action="{{ route("admin.projects.update", $project->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div class="form-group">
                <label class="mt-3" for="name">Titolo</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Nome progetto" required  value="{{ old("name") ?? $project->name }}">
                @error('name')
                    <div class ="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="mt-3" for="description">Descrizione</label>
                <textarea type="text" name="description" id="description" class="form-control" placeholder="Descrizione fumetto" > {{ old("description") ?? $project->description }}</textarea>
                @error('description')
                    <div class ="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                @if($project->cover_image != null)
                <div class="my-3">

                    <img src="{{ asset("/storage/" . $project->cover_image) }}" 	alt = "{{ $project->title }}" width="200">
                </div>
                @else
                    <h4> Immagine non impostata </h4>
                @endif
                <label class="mt-3" for="cover_image">Immagine di copertina</label>
                <input type="file" name="cover_image" id="cover_image" accept="image/*" class="form-control" placeholder="Descrizione fumetto">
                @error('cover_image')
                    <div class ="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="mt-3" for="type_id">Seleziona tipo di post</label>
                <select class="form-select" name="type_id" id="type_id">
                    <option value="">Seleziona tipologia di post</option>
                    @foreach($type as $types)
	                	<option value = "{{ $types->id }}" @selected($types->id == old("type_id", $project->type ? $project->type->id : ""))> {{ $types->name }} </option>
                    @endforeach      
                </select>   
                    @error('type_id')
                    <div class ="text-danger">{{ $message }}</div>
                @enderror
            </div>
            </div>
            <div class="form-group">
                <label class="mt-3" for="assigned_by">Assigned by</label>
                <textarea type="text" name="assigned_by" id="assigned_by" class="form-control" placeholder="Descrizione fumetto" > {{ old("assigned_by") ?? $project->assigned_by }}</textarea>
                @error('assigned_by')
                    <div class ="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <a href="{{ route("admin.projects.index")}}"><button type="submit" class="btn btn-primary mt-3 ">Salva</button></a>
            
            </form>
        </div>
    </div>
</div>
</body>
@endsection