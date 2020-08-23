@extends('layouts.app', ['styles' => ['pages/user/myannonces', 'pages/user/tb']])

@section('content')
@include('layouts.panel', ['select' => 'myannonces'])
<script>
    const annonces = <?php echo $annonces ?>;
    
    function change(id)
    {
        annonces.forEach(ac => {
            if(ac.id == id)
            {
                console.log(ac.title)
                document.getElementById('title').innerHTML = ac.title;
                document.getElementById('desc').innerHTML = ac.description;
                document.getElementById('img').src = ac.image;
            }
        });
    }
</script>
<div class="content">
    <div class="tb-content">
        <div class="tb-title">
            Mes annonces
            <a href="{{route('become_advertiser')}}">
                (publier une annonce)
            </a>
        </div>
        @foreach ($annonces as $ac)
        <div class="tb-case" id="{{$ac->id}}" onmouseover="change({{$ac->id}})">
            <div class="tb-col">
                <h3>{{$ac->title}}</h3>
                <span>{{$ac->departement_id}} - {{$ac->departement_name}}</span>
            </div>
        </div>
        @endforeach
    </div>
</div>
<div class="view">
    <div class="ac-box">
        <img id="img" src="">
        <div class="ac-txt">
            <h3 id="title"></h3>
            <p id="desc"></p>
        </div>
        <div class="ac-btn">
            Plus d'informations...
        </div>
    </div>
</div>
@endsection