@extends('layouts.app', ['styles' => ['pages/user/users', 'pages/user/tb']])

@section('content')
@include('layouts.panel', ['select' => 'users'])
<div class="content">
    <div class="tb-content">
        <div class="tb-title">
            Tous les comptes
        </div>
        @foreach ($users as $user)
        <div class="tb-case">
            <div class="tb-col">
                <h3>{{$user->email}}</h3>
                <span>{{$user->account->firstname}} {{$user->account->surname}}</span>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection