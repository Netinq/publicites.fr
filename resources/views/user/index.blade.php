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
        @if ($admin)
        <div class="config-content create-form row col-12">
            <form method="POST" action="{{ route('config.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <div class="col-10 col-md-8">
                        <label for="price" class="col-form-label">Prix d'une annonce</label>
                        <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" required autocomplete="current-price" value="{{ $price->integer }}"/>
                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-10 col-md-8">
                        <label for="fb_link" class="col-form-label">Lien facebook</label>
                        <input id="fb_link" type="link" class="form-control @error('fb_link') is-invalid @enderror" name="fb_link" required autocomplete="current-fb_link" value="{{ $fb_link->string }}">
                        @error('fb_link')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-10 col-md-8 row">
                        <div class="col-8 button" style="padding: 0;">
                            <button type="submit" class="btn">
                                Mettre à jour
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        @endif
    </div>
</div>
@endsection