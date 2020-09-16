@extends('layouts.app', ['styles' => ['pages/user/users', 'pages/user/tb', 'popups']])

@section('content')
@include('layouts.panel', ['select' => 'users'])
@if ( Session::has('success'))
<div class="popup success alert alert-dismissible fade show">
    <img src="{{asset('images/svg/success.svg')}}">
    <h4>{{ Session::get('success')[0] }}</h4>
    <span>{{ Session::get('success')[1] }}</span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Fermer">
      <span aria-hidden="true">&times;</span>
      <span class="sr-only">Fermer</span>
    </button>
</div>
@endif
@if ( Session::has('error'))
<div class="popup error alert alert-dismissible fade show">
    <img src="{{asset('images/svg/error.svg')}}">
    <h4>{{ Session::get('error')[0] }}</h4>
    <span>{{ Session::get('error')[1] }}</span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Fermer">
      <span aria-hidden="true">&times;</span>
      <span class="sr-only">Fermer</span>
    </button>
</div>
@endif
<div class="content">
    <div class="tb-content">
        <div class="tb-title">
            Tous les comptes
            <div class="tb-search">
                <form action="{{route('users.search')}}" method="POST" role="search">
                    {{ csrf_field() }}
                    <input type="text" class="form-control" name="search" placeholder="Rechercher..."
                    value="{{$args ?? '' ? $args : ''}}">
                </form>
            </div>
        </div>
        @foreach ($users as $user)
        <div class="tb-case">
            <div class="tb-col">
                <h3>{{$user->email}}</h3>
                <span>{{$user->account->firstname}} {{$user->account->surname}}</span>
            </div>
            <div class="tb-col">
                <span class="span-f">{{$user->account->adress}}</span class="span-f">
                <span>{{$user->account->postal_code}} {{$user->account->city}}</span>
            </div>
            <div class="tb-sm-col">
                <form action="{{ route('user.destroy',$user->id) }}" method="POST" >
                @csrf
                @method('DELETE')
                <div class="delete">
                    <button type="submit" onclick="return confirm('Êtes-vous sur de vouloir supprimer l\'utilisateur : {{$user->email}} ?')">Supprimer</button>
                </div>
                </form>
            </div>
            <div class="tb-sm-col">
                <form action="{{ route('passwordReset',[$user->id]) }}" method="POST" >
                @csrf
                <div class="delete">
                    <button type="submit" onclick="return confirm('Êtes-vous sur de vouloir réinitialisé le mot de passe de : {{$user->email}} ?')">Réinitialiser</button>
                </div>
                </form>
            </div>
            <div class="tb-sm-col">
                <form action="{{ route($user->admin ? 'removeAdmin' : 'setAdmin', [$user->id]) }}" method="POST" >
                @csrf
                <div class="admin {{$user->admin ? 'removeAdmin' : 'setAdmin'}}">
                    <button type="submit">{{$user->admin ? 'Admin' : 'Membre'}}</button>
                </div>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
