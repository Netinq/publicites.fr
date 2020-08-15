@extends('layouts.app', ['styles' => ['pages/departements']])

@section('content')
<div class="ac-content">
@foreach ($annonces as $ac)
    <a href="{{$ac->link}}">
        <div class="ac-box">
            <img src="{{route('image.fetch', $ac->id)}}">
            <h2>{{$ac->title}}</h2>
            <p>{{$ac->description}}</p>
        </div>
    </a>
@endforeach
</div>
@endsection