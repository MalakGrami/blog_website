@extends('user.master')

@section('title', 'Settings')

@section('content')


<section class="home" >
    <div class="text" style="text-align: center">Créer un blog</div>
    <div class="container">
        <div class="row mb-12">
            <div class="col-8" >
                <div class="card">
                    <div class="card-header">
                        <h5>
                            Créer un blog
                        </h5>
                    </div>
                    <div class="card-body">
                        <form action="{{route('store_blog')}}" method="POST" enctype="multipart/form-data">
                            @csrf
    
    
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-groupe mb-3">
                                        <label for="title">Titre</label>
                                        <input type="text" name="title" id="title" class="form-control @error('title')is-invalid @enderror " value="{{old('title')}}">
                                        @error('title')
                                        <span class="invalid-feedback">
                                            <strong>{{$message}}</strong>
                                        </span>
                               
                                        @enderror
                                    </div>
                                </div> 
                            </div>
    
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="category_id">Catégorie</label>
                                        <select name="category_id" id="category_id" class="form-control @error('category_id')is-invalid @enderror" >
                                            <option>-- sélectionnez une catégorie --</option>
                                            @foreach($categories as $category)
                                            <option value="{{$category->id}}" {{old('category_id')==$category->id ? 'selected':'' }} >{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <span class="invalid-feedback">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
    
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input type="file" name="image" id="image" class="form-control @error('image')is-invalid @enderror">
    
                                        @error('image')
                                        <span class="invalid-feedback">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">Description :</label> 
                                        <textarea name="description" id="description" cols="30" rows="10" class="form-control @error('description')is-invalid @enderror" placeholder="..."></textarea>
    
                                        @error('description')
                                        <span class="invalid-feedback">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
    
                            <div class="form-group text-end">
                                <button type="submit" class="btn">Créer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection


