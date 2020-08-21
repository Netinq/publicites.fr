@extends('layouts.app', ['styles' => ['pages/departements']])

@section('content')
<img id="background" src="{{asset('images/departements/'.$dep->identifier.'.png')}}">
<div class="title-box">
    <h1>{{$reg->name}}</h1>
    <img id="locate" src="{{asset('images/svg/ping.svg')}}">
    <h2>{{$dep->name}}</h2>
</div>
<div class="ac-content">
    @foreach ($annonces as $ac)
        <a href="{{$ac->link}}" target="_blank">
            <div class="ac-box">
                <img src="{{route('image.fetch', $ac->id)}}">
                <div class="ac-txt">
                    <h3>{{$ac->title}}</h3>
                    <p>{{$ac->description}}</p>
                </div>
                <div class="ac-btn">
                    Plus d'informations...
                </div>
            </div>
        </a>
    @endforeach
</div>
@endsection