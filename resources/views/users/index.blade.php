@extends('app')

@section('content')
    <h2>Liste des utilisateurs</h2>

    <div>
        <a href="{{ route('users.create') }}">Ajouter un utilisateur</a>
    </div>

    <users-list />
@endsection
