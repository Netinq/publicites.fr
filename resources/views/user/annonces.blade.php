@extends('layouts.app', ['styles' => ['pages/user/annonces', 'pages/user/tb']])

@section('content')
@include('layouts.panel', ['select' => 'annonces'])
<div class="content">
    <div class="tb-content">
        <div class="tb-title">
            Toutes les annonces
            <div class="tb-search">
                <form action="{{route('annonces.search')}}" method="POST" role="search">
                    {{ csrf_field() }}
                    <input type="text" class="form-control" name="search" placeholder="Rechercher..."
                    value="{{$args ?? '' ? $args : ''}}">
                </form>
            </div>
        </div>
        @foreach ($annonces as $ac)
        <div class="tb-case tb-at-case">
            <div class="tb-lg-col">
                <h3>{{$ac->title}}</h3>
                <span>{{$ac->departement_id}} - {{$ac->departement_name}}</span>
            </div>
            <div class="tb-lg-col">
                <p>{{$ac->description}}</p>
            </div>
            <div class="tb-col">
                <h3>{{$ac->account->firstname}} {{$ac->account->surname}}</h3>
                <span>{{$ac->user->email}}</span>
            </div>
            <div class="tb-sm-col">
                <a href="{{route('annonces.edit', $ac->id)}}">
                <div class="edit">
                    Modifier
                </div>
                </a>
            </div>
            <div class="tb-sm-col">
                <form action="{{ route('annonces.destroy',$ac->id) }}" method="POST" >
                @csrf
                @method('DELETE')
                <div class="delete">
                    <button type="submit" onclick="return confirm('Êtes-vous sur de vouloir supprimer l\'annonce : {{$ac->title}} ?')">Supprimer</button>
                </div>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection