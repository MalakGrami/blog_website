@extends('adminPanel.master')
@section('title','Modifier un blog')
@section('content')

<section class="home">
    <div class="text" style="text-align: center">Modifier un blog</div>
    <div class="container">
        <div class="row mb-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>
                            Modifier un blog
                        </h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-groupe mb-3">
                                        <label for="title">Titre</label>
                                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ $blog->title }}">
                                        @error('title')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="category_id">Catégorie</label>
                                        <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                            <option>-- sélectionnez une catégorie --</option>
                                            @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ $blog->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                                        @error('image')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    @if ($blog->image)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="keep_image" id="keep_image" value="1">
                                        <label class="form-check-label" for="keep_image">
                                            Keep existing image
                                        </label>
                                    </div>
                                    @endif
                                    @if ($blog->image)
                                    <img src="{{ asset('storage/'.$blog->image) }}" style="height: 100px;">
                                    @endif
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">Description :</label>
                                        <textarea name="description" id="description" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror" placeholder="...">{{ $blog->description }}</textarea>
                                        @error('description')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group text-end">
                                <button type="submit" class="btn btn-primary">Modifier</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
