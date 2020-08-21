@extends('layouts.app', ['styles' => ['pages/user/myannonces', 'pages/user/tb']])

@section('content')
@include('layouts.panel', ['select' => 'myannonces'])
<div class="content">
    <div class="tb-content">
        <div class="tb-title">
            Mes annonces
        </div>
        @foreach ($annonces as $ac)
        <div class="tb-case">
            <div class="tb-col">
                <h3>{{$ac->title}}</h3>
                <span>{{$ac->departement_id}} - {{$ac->departement_name}}</span>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection