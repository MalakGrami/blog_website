@extends('adminPanel.master')
@section('title', 'Créer un blog')
@section('content')

<section class="home">
    <div class="text" style="text-align: center">Blog {{ $blog->title }}</div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">{{ $blog->title }}</h5>
                    </div>
                    <div class="card-body">
                        <h5>Created at:</h5> {{ $blog->created_at }}
                        <h5>Description:</h5> {{ $blog->description }}
                        <h5>category :</h5> {{ $blog->category->name }}
                        <h5>Accepté :</h5>{{$blog->accepted ? 'Accepté' : 'Non accepté'}}
                        <h5>image :</h5>
                        <img src="{{asset('storage/'.$blog->image)}}" style="height: 300px; ">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
