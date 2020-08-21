@extends('layouts.app', ['styles' => ['pages/user/index']])

@section('content')
@include('layouts.panel', ['select' => 'dashboard'])
<div class="content">
    <div class="profil-content">
        <div class="profil-title">
            <h1>{{$account->firstname}} {{$account->surname}}</h1>
        </div>
        <div class="profil-adress">
            {{-- <p>{{$account->$adress}}</p>
            <p>{{$account->$cp}} {{$account->$city}}</p> --}}
        </div>
        <div class="profil-informations">

        </div>
    </div>
</div>
@endsection