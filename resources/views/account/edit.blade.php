@extends('layouts.app', ['styles' => ['pages/auth/auth', 'background-image', 'account/create'], 'scripts' => ['background-image']])

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
    <div class="col-12 col-md-12 col-lg-6 content-box" style="padding: 0;">
        <div id="box">
            <h1>Editer mon profil</h1>
            <h2>Renseignez quelques informations</h2>
            <form method="POST" action="{{ route('account.update', $account->id) }}">
                @csrf
                {{ method_field('PUT') }}
                <div class="form-group row">
                    <div class="col-5">
                        <label for="surname" class="col-form-label">Nom</label>
                        <input id="surname" type="surname" class="form-control @error('surname') is-invalid @enderror" name="surname" required autocomplete="current-surname" value="{{ $account->surname }}">
                        @error('surname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-7">
                        <label for="firstname" class="col-form-label">Prénom</label>
                        <input id="firstname" type="firstname" class="form-control @error('firstname') is-invalid @enderror" name="firstname" required autocomplete="current-firstname" value="{{ $account->firstname }}">
                        @error('firstname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-8">
                        <label for="adress" class="col-form-label">Adresse</label>
                        <input id="adress" type="text" class="form-control @error('adress') is-invalid @enderror" name="adress" required autocomplete="current-adress" value="{{ $account->adress }}">
                        @error('adress')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-4">
                        <label for="postal_code" class="col-form-label">Code Postal</label>
                        <input id="postal_code" type="number" class="form-control @error('postal_code') is-invalid @enderror" name="postal_code" required autocomplete="current-postal_code" value="{{ $account->cp }}">
                        @error('postal_code')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="locality" class="col-form-label">Ville</label>
                        <input id="locality" type="text" class="form-control @error('locality') is-invalid @enderror" name="locality" required autocomplete="current-locality" value="{{ $account->city }}">
                        @error('locality')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="country" class="col-form-label">Pays</label>
                        <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" required autocomplete="current-country" value="{{ $account->country }}">
                        @error('country')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-12 row" style="justify-content: right;">
                    <button type="submit" class="btn">
                        Valider les informations
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
