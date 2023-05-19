@extends('master')
@section('title', 'Blog Detail')
@section('content')
    <div class="blog-detail-container">
    <h2 class="blog-title">{{ $blog->title }}</h2>
    <div class="blog-image">
        <img src="{{ asset('storage/'.$blog->image) }}" alt="{{ $blog->title }}">
    </div>
    <div class="blog-details">
        <p class="blog-category">Catégorie : {{ $categoryName }}</p>
        <p class="blog-author">Créé par : {{ $blog->user->name }}</p>
        <p class="blog-author">Date de création : {{ $blog->created_at->format('Y-m-d H:i') }}</p>
        <p class="blog-description">{{ $blog->description }}</p>
    </div>
    </div>
@endsection

<style>
    .blog-detail-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f8f8f8;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .blog-title {
        font-size: 28px;
        font-weight: bold;
        margin-bottom: 10px;
        color: #333;
        text-align: center;
    }

    .blog-image img {
        max-width: 100%;
        height: auto;
        border-radius: 4px;
        margin-bottom: 20px;
    }

    .blog-category,
    .blog-author {
        font-size: 16px;
        color: #666;
        margin-bottom: 8px;
    }

    .blog-description {
        font-size: 18px;
        line-height: 1.5;
        color: #444;
    }
</style>
