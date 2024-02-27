@extends("layouts.admin")

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-12 mt-4">
               <div class="d-flex justify-content-between">
                    <div>
                        <h2>All Types</h2>
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
                            <th>Project count</th>
                            <th>Tools</th>
                        </tr>
                    </thead>
                    <tbody>
                          @foreach($types as $type)
                            <tr>
                                <td>{{ $type->id}}</td>
                                <td>{{ $type->name}}</td>
                                <td>{{ $type->slug}}</td>
                                <td>{{ count($type->projects) }}</td> 
                                <td>
                                    <a href="{{ route("admin.types.show", ["type" => $type->id])}}" class="btn btn-sm btn-square btn-primary"><i class=" fa-solid fa-eye"></i></a>
                                    <button class="btn btn-sm btn-square btn-danger" data-bs-toggle="modal" 
                                        data-bs-target="#modal_type_delete-{{ $type->id }}" 
                                        data-id= "{{ $type->id }}" data-name="{{ $type->name }}"  data-type="types">Elimina
                                    </button>
                                     @include("admin.types.modal_delete") 
                                </td>
                            </tr>
                            @endforeach  
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    @endsection