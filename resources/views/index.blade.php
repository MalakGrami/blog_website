@extends('master')
@section('title', 'Home')
@section('content')
<div class="hero-section">
    <div class="hero-image"></div>
    <div class="hero-overlay">
        <div class="hero-text">
            <h2>Parlez de ce qui vous passionne, à votre manière</h2>
            <h3>Créez un blog unique et de qualité</h3>
            <a href="{{route('create_blog')}}" class="btn">Écrire un blog</a>
        </div>
    </div>
</div>

<h1>Other content...</h1>
<h1>Other content...</h1>
<h1>Other content...</h1>
@endsection
