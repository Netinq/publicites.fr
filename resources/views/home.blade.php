@extends('layouts.app', ['styles' => ['pages/home'], 'scripts' => ['home']])

@section('content')
<div id="content">
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
@endsection
