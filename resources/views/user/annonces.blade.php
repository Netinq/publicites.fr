@extends('layouts.app', ['styles' => ['pages/user/annonces', 'pages/user/tb']])

@section('content')
@include('layouts.panel', ['select' => 'annonces'])
<div class="content">
    <div class="tb-content">
        <div class="tb-title">
            Toutes les annonces
        </div>
        @foreach ($annonces as $ac)
        <div class="tb-case">
            <div class="tb-col">
                <h3>{{$ac->title}}</h3>
                <span>{{$ac->departement_id}} - {{$ac->departement_name}}</span>
            </div>
            <div class="tb-col">
                <h3>{{$ac->account->firstname}} {{$ac->account->surname}}</h3>
                <span>{{$ac->user->email}}</span>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection