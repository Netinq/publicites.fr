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
            <h1>Editer mon mot de passe</h1>
            <h2>Renseignez quelques informations</h2>
            <form method="POST" action="{{ route('passwordChange', $account->id) }}">
                @csrf
                <div class="form-group row">
                    <div class="col-7">
                        <label for="oldpassword" class="col-form-label">Ancien mot de passe</label>
                        <input id="oldpassword" type="password" class="form-control @error('oldpassword') is-invalid @enderror" name="oldpassword" required autocomplete="current-oldpassword" value="{{ $account->oldpassword }}">
                        @error('oldpassword')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-7">
                        <label for="password" class="col-form-label">Nouveau mot de passe</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" value="{{ $account->password }}">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-7">
                        <label for="password_confirmation" class="col-form-label">Confirmation du mot de passe</label>
                        <input id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="current-password_confirmation" value="{{ $account->password_confirmation }}">
                        @error('password_confirmation')
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
