@extends('layouts.app', ['styles' => ['pages/user/index']])

@section('content')
@include('layouts.panel', ['select' => 'dashboard'])
<div class="content">
    <div class="profil-content row">
        <div class="profil-title col-12">
            <h1>{{$account->firstname}} {{$account->surname}}</h1>
        </div>
        <div class="profil-adress col-6">
            <p>{{$account->adress}}</p>
            <p>{{$account->cp}} {{$account->city}}</p>
        </div>
        <div class="profil-informations col-6">
            <p>{{$user->email}}</p>
            <p>{{$account->country}}</p>
        </div>
        <div class="profil-red col-12 row">
            <a href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="red offset-6 col-6">
                déconnexion
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
        </div>
    </div>
</div>
@endsection