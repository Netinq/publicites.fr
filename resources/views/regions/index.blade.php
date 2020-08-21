@extends('layouts.app', ['styles' => ['pages/regions']])

@section('content')
<div class="dep-content row">
    @foreach ($departements as $dep)
    <div class="dep-box 
    {{ $departements->count() == 2 ? 'col-xs-12 col-sm-6 col-md-6 h-12' : '' }}
    {{ $departements->count() == 3 ? 'col-xs-12 col-sm-6 col-md-4 h-12' : '' }}
    {{ $departements->count() == 4 ? 'col-xs-12 col-sm-6 col-md-6 h-6' : '' }}
    {{ $departements->count() == 5 ? 'col-xs-12 col-sm-6 col-md-4 h-6' : '' }}
    {{ $departements->count() == 6 ? 'col-xs-12 col-sm-6 col-md-4 h-6' : '' }}
    {{ $departements->count() >= 7 ? 'col-xs-12 col-sm-6 col-md-3 h-6' : '' }}
    ">
        <a href="{{route('departements.show', $dep->identifier)}}">
            <h3>{{$dep->name}}</h3>
            <img src="{{asset('images/departements/'.$dep->identifier.'.png')}}"/>
        </a>
    </div>
    @endforeach
</div>
@endsection