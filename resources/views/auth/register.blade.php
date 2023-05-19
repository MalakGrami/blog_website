@extends('master')
@section('title','register')
@section('content') 

<section class="login-page">
    
    <div class="login-form-box">
        <div class="login-title">Inscription</div>
        <div class="login-form">
            <form action="{{route('register')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="field">
                    <label for="name">Nom</label>
                    <input type="text" id="name" name="name" class="@error('name') has-error @enderror" placeholder="Malak Grami" required> 
                    @error('name')
                        <span class="field-error">{{$message}}</span>
                    @enderror
                </div>
    
                <div class="field">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="@error('email') has-error @enderror" placeholder="malak@gmail.com"> 
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
                    <label for="password_confirmation">Confirmez le mot de passe</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="********"> 
                </div>
    
                
    
                <div class="field">
                    <label for="image">Votre image</label>
                    <input type="file" id="image" name="image" class="@error('image') has-error @enderror"> 
                    @error('image')
                        <span class="field-error">{{$message}}</span>
                    @enderror
                </div>
                <div class="field">
                    <button type="submit" class="btnn btnn-primary btnn-block">Inscription</button>
                </div>
                
                    @csrf
            </form>
            <div class="register-link">
                Vous avez un compte ? <a href="{{route('login')}}">Connectez-vous ici</a>
            </div>
        </div>
    </div>
    </section>
    @endsection
