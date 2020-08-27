@extends('layouts.app', ['styles' => ['pages/user/index', 'popups']])

@section('content')
@include('layouts.panel', ['select' => 'dashboard'])
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