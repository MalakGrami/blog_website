@extends('adminPanel.master')
@section('title','Tableau de bord')
@section('content')

<section class="home">
  <div class="text" style="text-align: center">utilisateurs</div>
  <div class="container">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5>Liste des utilisateurs</h5>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Image</th>
                            <th>Date de création</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            <img src="{{asset('storage/users/'.$user->image)}}" style="height: 30px; ">
                        </td>
                        <td>{{$user->created_at}}</td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content">
                {{ $users->links('pagination::bootstrap-4') }}

            </div>
            
        </div>
    </div>
</div>
</div>
</div>
@endsection
