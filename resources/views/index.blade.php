@extends('master')
@section('title', 'Home')
@section('content')

<div class="hero-section">
    <div class="hero-image"></div>
    <div class="hero-overlay">
        <div class="hero-text">
            <h2>Parlez de ce qui vous passionne, à votre manière</h2>
            <h3>Créez un blog unique et de qualité</h3>
            <a href="{{ route('create_blog') }}" class="btnn">Écrire un blog</a>
        </div>
    </div>
</div>

<div class="blog-container">
    @foreach($blogs as $blog)
        <div class="blog-box">
            <h2 class="blog-title">{{ $blog->title }}</h2>
            <div class="blog-image">
                <img src="{{ asset('storage/'.$blog->image) }}" alt="{{ $blog->title }}">
            </div>
            <div class="blog-details">
                <p class="blog-category">Categorie: {{ $blog->category->name }}</p>
                <p class="blog-author">Créé par: {{ $blog->user->name }}</p>
                <p class="blog-description">{{ substr($blog->description, 0, 50) . '...' }}</p>
                <a href="{{ route('blog.show', $blog->id) }}">Lire la suite...</a>
            </div>
        </div>
    @endforeach
</div>

<div class="pagination-container">
  <ul class="pagination">
      @if($blogs->onFirstPage())
          <li class="disabled"><span class="arrow">&laquo;</span></li>
      @else
          <li><a href="{{ $blogs->previousPageUrl() }}" rel="prev" class="arrow">&laquo;</a></li>
      @endif

      @foreach($blogs as $blog)
          @if($blog->url)
              <li><a href="{{ $blog->url }}">{{ $blog->page }}</a></li>
          @else
              <li class="active"><span>{{ $blog->page }}</span></li>
          @endif
      @endforeach

      @if($blogs->hasMorePages())
          <li><a href="{{ $blogs->nextPageUrl() }}" rel="next" class="arrow">&raquo;</a></li>
      @else
          <li class="disabled"><span class="arrow">&raquo;</span></li>
      @endif
  </ul>
</div>

@endsection