@extends('layouts.app', ['styles' => ['pages/auth/auth', 'background-image', 'account/create'], 'scripts' => ['background-image']])

@section('content')
<div id="content-image" class="d-none d-sm-block">
    <img class="background background-active" src="{{asset('images/departements/auvergne-rhone-alpes.jpg')}}">
    <img class="background" src="{{asset('images/departements/bourgogne-franche-compte.jpg')}}">
    <img class="background" src="{{asset('images/departements/centre-val-de-loire.jpg')}}">
    <img class="background" src="{{asset('images/departements/corse.jpg')}}">
    <img class="background" src="{{asset('images/departements/ile-de-france.jpg')}}">
    <img class="background" src="{{asset('images/departements/normandie.jpg')}}">
    <img class="background" src="{{asset('images/departements/nouvelle-aquitaine.jpg')}}">
    <img class="background" src="{{asset('images/departements/occitanie.jpg')}}">
    <img class="background" src="{{asset('images/departements/pays-de-la-loire.jpg')}}">
    <img class="background" src="{{asset('images/departements/provence-alpes-cote-d-azur.jpg')}}">
    <div id="mask"></div>
</div>
<div class="content row">
    <div class="col-12 col-md-12 col-lg-6 content-box" style="padding: 0;">
        <div id="box">
            <h1>Créer mon compte</h1>
            <h2>Renseignez quelques informations</h2>
            <form method="POST" action="{{ route('account.store') }}">
                @csrf
                <div class="form-group row">
                    <div class="col-5">
                        <label for="name" class="col-form-label">Nom</label>
                        <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="current-name" value="{{ old('name') }}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-7">
                        <label for="firstname" class="col-form-label">Prénom</label>
                        <input id="firstname" type="firstname" class="form-control @error('firstname') is-invalid @enderror" name="firstname" required autocomplete="current-firstname" value="{{ old('firstname') }}">
                        @error('firstname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-8">
                        <label for="adress" class="col-form-label">Adresse</label>
                        <input id="adress" type="text" class="form-control @error('adress') is-invalid @enderror" name="adress" required autocomplete="current-adress" value="{{ old('adress') }}">
                        @error('adress')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-4">
                        <label for="postal_code" class="col-form-label">Code Postal</label>
                        <input id="postal_code" type="number" class="form-control @error('postal_code') is-invalid @enderror" name="postal_code" required autocomplete="current-postal_code" value="{{ old('postal_code') }}">
                        @error('postal_code')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="locality" class="col-form-label">Ville</label>
                        <input id="locality" type="text" class="form-control @error('locality') is-invalid @enderror" name="locality" required autocomplete="current-locality" value="{{ old('locality') }}">
                        @error('locality')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="country" class="col-form-label">Pays</label>
                        <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" required autocomplete="current-country" value="{{ old('country') }}">
                        @error('country')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-12 row" style="justify-content: right;">
                    <button type="submit" class="btn">
                        valider les informations
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
