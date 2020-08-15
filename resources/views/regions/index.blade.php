@extends('layouts.app', ['styles' => ['pages/regions']])

@section('content')
<div class="dep-content row">
    @foreach ($departements as $dep)
    <div class="dep-box 
    {{ $departements->count() == 2 ? 'col-md-6 h-12' : '' }}
    ">
        <a href="{{route('departements.show', $dep->identifier)}}">
            <h3>{{$dep->name}}</h3>
            <img src="{{asset('images/departements/'.$dep->identifier.'.png')}}"/>
        </a>
    </div>
    @endforeach
</div>
@endsection