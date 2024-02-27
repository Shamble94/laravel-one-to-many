@extends("layouts.admin")

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-12 mt-4">
               <div class="d-flex justify-content-between">
                    <div>
                        <h2>All Projects</h2>
                    </div>

                    <div>
                        <a href=" {{ route("admin.projects.create") }}"><button class="btn btn-primary">Add New Project</button></a>
                    </div>    
               </div>
            </div>
            <div class="col-12">
                <table class=" table mt-3 table-stipred">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Assigned by</th>
                            <th>Tools</th>
                        </tr>
                    </thead>
                    <tbody>
                          @foreach($projects as $project)
                            <tr>
                                <td>{{ $project->id}}</td>
                                <td>{{ $project->name}}</td>
                                <td>{{ $project->slug}}</td>
                                <td>{{ Str::limit($project->description, 30, "(...)") }}</td>
                                <td>{{ $project->type ? $project->type->name : "Senza categoria"}}</td>
                                <td>{{ $project->assigned_by}}</td>
                                <td>
                                    <a href="{{ route("admin.projects.show", ["project" => $project->id])}}" class="btn btn-sm btn-square btn-primary"><i class=" fa-solid fa-eye"></i></a>
                                    <a href="{{ route("admin.projects.edit", ["project" => $project->id])}}" class="btn btn-sm btn-square btn-warning"><i class=" fa-solid fa-edit"></i></a>
                                    <button class="btn btn-sm btn-square btn-danger" data-bs-toggle="modal" 
                                        data-bs-target="#modal_project_delete-{{ $project->id }}" data-type="projects" 
                                        data-id= "{{ $project->id }}" data-name="{{ $project->name }}" >Elimina
                                    </button>
                                    @include("admin.projects.modal_delete")
                                </td>
                            </tr>
                            @endforeach  
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    @endsection