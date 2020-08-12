@extends('layouts.app', ['styles' => ['pages/auth/auth', 'background-image'], 'scripts' => ['background-image']])

@section('content')
<div id="content-image" class="d-none d-sm-block">
    <img class="background background-active" src="{{asset('images/regions/auvergne-rhone-alpes.jpg')}}">
    <img class="background" src="{{asset('images/regions/bourgogne-franche-compte.jpg')}}">
    <img class="background" src="{{asset('images/regions/centre-val-de-loire.jpg')}}">
    <img class="background" src="{{asset('images/regions/corse.jpg')}}">
    <img class="background" src="{{asset('images/regions/ile-de-france.jpg')}}">
    <img class="background" src="{{asset('images/regions/normandie.jpg')}}">
    <img class="background" src="{{asset('images/regions/nouvelle-aquitaine.jpg')}}">
    <img class="background" src="{{asset('images/regions/occitanie.jpg')}}">
    <img class="background" src="{{asset('images/regions/pays-de-la-loire.jpg')}}">
    <img class="background" src="{{asset('images/regions/provence-alpes-cote-d-azur.jpg')}}">
    <div id="mask"></div>
</div>
<div class="content row">
    <div class="d-none d-lg-block col-lg-5 col-xl-7 content-logo">
        <img id="logo" src="{{asset('images/logo.png')}}">
    </div>
    <div class="offset-sm-1 offset-md-2 offset-lg-0 col-sm-10 col-md-8 col-lg-6 col-xl-4 content-box" style="padding: 0;">
        <div id="box">
            <h1>connexion</h1>
            <h2>accédez à votre compte</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group row">
                    <div class="col-10 col-md-8">
                        <label for="email" class="col-form-label">E-mail</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="current-email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-10 col-md-8">
                        <label for="password" class="col-form-label">Mot de passe</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-10 col-md-8 row">
                        <div class="col-6 button" style="padding: 0;">
                            <button type="submit" class="btn">
                                Me connecter
                            </button>
                        </div>
                        <div class="col-6 button"id="create">
                            <a href="{{route('register')}}">
                            Pas de compte ?
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
