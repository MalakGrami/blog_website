@extends('adminPanel.master')
@section('title','Dashboard')
@section('content')

<section class="home" >
  <div class="text" style="text-align: center">Catégories</div>
  <div class="container">
    <div class="row mb-5">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    <h5>
                        Créer une catégorie
                    </h5>
                </div>
                <div class="card-body">
                    <form action="{{route('add_categories')}}" method="POST">
                        @csrf
                        <div class="form-groupe mb-3">
                            <label for="name">Nom</label>
                            <input type="text" name="name" id="name" class="form-control @error('name')is-invalid @enderror " value="{{old('name')}}">
                            @error('name')
                            <span class="invalid-feedback">
                                <strong>{{$message}}</strong>
                            </span>

                        @enderror

                    </div>
                    <div class="form-group text-end">
                        <button type="submit" class="btn btn-primary">Créer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5>Catégories</h5>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            
                            <th>Publié le</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            
                            <td>{{$category->created_at}}</td>
                            <td>
                                <form action="{{route('delete_categorie',$category->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <Button type="submit" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M7 21q-.825 0-1.413-.588T5 19V6q-.425 0-.713-.288T4 5q0-.425.288-.713T5 4h4q0-.425.288-.713T10 3h4q.425 0 .713.288T15 4h4q.425 0 .713.288T20 5q0 .425-.288.713T19 6v13q0 .825-.588 1.413T17 21H7Zm2-5q0 .425.288.713T10 17q.425 0 .713-.288T11 16V9q0-.425-.288-.713T10 8q-.425 0-.713.288T9 9v7Zm4 0q0 .425.288.713T14 17q.425 0 .713-.288T15 16V9q0-.425-.288-.713T14 8q-.425 0-.713.288T13 9v7Z"/></svg>Supprimer</Button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content">
                    {{ $categories->links('pagination::bootstrap-4') }}
    
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</section>
  

@endsection