@extends('app')

@section('content')
    <h2>Liste des utilisateurs</h2>
    <a href="{{ route('users.create') }}">Ajouter un utilisateur</a>
    <users-list />
@endsection
