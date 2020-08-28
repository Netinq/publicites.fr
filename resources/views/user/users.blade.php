@extends('layouts.app', ['styles' => ['pages/user/users', 'pages/user/tb']])

@section('content')
@include('layouts.panel', ['select' => 'users'])
<div class="content">
    <div class="tb-content">
        <div class="tb-title">
            Tous les comptes
            <div class="tb-search">
                <form action="{{route('users.search')}}" method="POST" role="search">
                    {{ csrf_field() }}
                    <input type="text" class="form-control" name="search" placeholder="Rechercher..."
                    value="{{$args ?? '' ? $args : ''}}">
                </form>
            </div>
        </div>
        @foreach ($users as $user)
        <div class="tb-case">
            <div class="tb-col">
                <h3>{{$user->email}}</h3>
                <span>{{$user->account->firstname}} {{$user->account->surname}}</span>
            </div>
            <div class="tb-col">
                <span class="span-f">{{$user->account->adress}}</span class="span-f">
                <span>{{$user->account->postal_code}} {{$user->account->city}}</span>
            </div>
            <div class="tb-sm-col">
                <form action="{{ route('user.destroy',$user->id) }}" method="POST" >
                @csrf
                @method('DELETE')
                <div class="delete">
                    <button type="submit" onclick="return confirm('Êtes-vous sur de vouloir supprimer l\'utilisateur : {{$user->email}} ?')">Supprimer</button>
                </div>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection