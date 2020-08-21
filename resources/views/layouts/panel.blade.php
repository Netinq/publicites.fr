<div class="panel">
    <div class="box-content">
            <a href="{{route('user.index')}}">
                    <div class="box {{ $select == 'dashboard' ? 'select' : ''}}">
                            <img src="{{asset('images/svg/profil.svg')}}">
                            <h3>Dashboard</h3>
                    </div>
            </a>
            <a href="{{route('myannonces')}}">
        <div class="box {{ $select == 'myannonces' ? 'select' : ''}}">
                <img src="{{asset('images/svg/annonces.svg')}}">
                <h3>Mes Annonces</h3>
        </div>
            </a>
            @if ($admin)
            <a href="{{route('user.annonces')}}">
        <div class="box {{ $select == 'annonces' ? 'select' : ''}}">
                <img src="{{asset('images/svg/folder.svg')}}">
                <h3>Annonces</h3>
        </div>
            </a>
        <a href="{{route('user.users')}}">
        <div class="box {{ $select == 'users' ? 'select' : ''}}">
                <img src="{{asset('images/svg/user.svg')}}">
                <h3>Utilisateurs</h3>
        </div>
        </a>
            @endif
        <a href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
        <div class="box box-btm">
                <img src="{{asset('images/svg/exit.svg')}}">
                <h3>Déconnexion</h3>
        </div>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
    </div>
</div>