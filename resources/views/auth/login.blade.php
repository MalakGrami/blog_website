@extends('master')
@section('title','Connexion')
@section('content')

<section class="login-page">
    <div class="login-form-box">
        <div class="login-title">Connexion</div>
        <div class="login-form">
            <form action="{{route('login')}}" method="POST">
                {{-- Ajouter un jeton CSRF --}}
                @csrf
                <div class="field">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="@error('email') has-error @enderror" placeholder="exemple@gmail.com">
                    @error('email')
                    <span class="field-error">{{$message}}</span>
                    @enderror
                </div>
    
                <div class="field">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" class="@error('password') has-error @enderror" placeholder="********">
                    @error('password')
                    <span class="field-error">{{$message}}</span>
                    @enderror
                </div>
    
    
                <div class="field">
                    <button type="submit" class="btn btn-primary btn-block">Connexion</button>
                </div>
    
            </form>
            <div class="register-link">
                Vous n'avez pas de compte ? <a href="{{route('register')}}">Inscrivez-vous ici</a>
            </div>
        </div>
    </div>
    </section>
    @endsection