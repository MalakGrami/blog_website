@extends('user.master')

@section('title', 'Paramètres')

@section('content')
<style>
    .container {
        margin-top: 50px;
        margin-left: 40%
    }

    .login-title {
        text-align: center;
        margin-bottom: 30px;
    }

    .custom-form {
        background-color: #f9f9f9;
        padding: 30px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .form-group.field {
        margin-bottom: 20px;
    }

    .form-group.field label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .has-error .form-control {
        border-color: red;
    }

   
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <h2 class="login-title">Modifier les informations utilisateur</h2>
            <form action="{{ route('updateProfile', $user->id) }}" method="POST" enctype="multipart/form-data" class="custom-form login-form">
                @csrf
                <!-- Ajouter des champs de formulaire pour la mise à jour des informations utilisateur -->
                <div class="form-group field">
                    <label for="name">Nom</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') has-error @enderror" value="{{ $user->name }}">
                </div>
                <div class="form-group field">
                    <label for="image">Image de profil</label>
                    <input type="file" name="image" id="image" class="form-control-file" value="{{ $user->image }}">
                </div>
                <button type="submit" class="btn">Mettre à jour</button>
            </form>
        </div>
        <div class="col-md-9">
            <h2 class="login-title">Modifier le mot de passe</h2>
            <form action="{{ route('changePassword', $user->id) }}" method="POST" class="custom-form login-form">
                @csrf
                <!-- Ajouter des champs de formulaire pour le changement de mot de passe -->
                <div class="form-group field">
                    <label for="current_password">Mot de passe actuel</label>
                    <input type="password" name="current_password" id="current_password" class="form-control @error('current_password') has-error @enderror">
                </div>
                <div class="form-group field">
                    <label for="new_password">Nouveau mot de passe</label>
                    <input type="password" name="new_password" id="new_password" class="form-control @error('new_password') has-error @enderror">
                </div>
                <div class="form-group field">
                    <label for="confirm_password">Confirmer le mot de passe</label>
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control @error('confirm_password') has-error @enderror">
                </div>
                <button type="submit" class="btn">Changer le mot de passe</button>
            </form>
        </div>
        
    </div>
</div>

@endsection
