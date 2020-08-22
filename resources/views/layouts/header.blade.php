<header class="row">
    <div class="col-md-4 menu d-none d-md-flex">
        <a href="{{route('home')}}"><img id="logo" alt="Website logo" src="{{asset('images/texte.png')}}"></a>
        <a href="{{route('home')}}">
            <div class="elem elem-btn-secondary elem-btn-home"><img src="{{asset('images/svg/home.svg')}}"></div>
        </a>
    </div>
    <div class="col-md-8 menu menu-right d-none d-md-flex">
        <a href="{{route('become_advertiser')}}">
            <div class="elem elem-btn-primary">devenir annonceur</div>
        </a>
        <a href="{{ Auth::check() ? route('user.index') : route('login')}}">
            <div class="elem elem-btn-secondary">@if (!Auth::check())me connecter @else mon compte @endif</div>
        </a>
    </div>
    <div class="col-12 menu menu-m d-md-none">
        <a href="{{route('home')}}"><img id="logo" alt="Website logo" src="{{asset('images/texte.png')}}"></a>
        <a href="{{route('become_advertiser')}}">
            <div class="elem elem-btn-primary d-none d-sm-block">devenir annonceur</div>
            <div class="elem elem-btn-primary d-sm-none">annoncer</div>
        </a>
    </div>
    <div class="col-12 menu menu-b d-md-none">
        <a href="https://www.facebook.com/sharer/sharer.php?u=publicites.fr">
            <div id="facebook">
                <img id="facebook-logo" src="{{asset('images/svg/facebook.svg')}}"><span class="d-none d-md-inline">partagez</span>
            </div>
        </a>
        <a href="{{route('home')}}">
            <div class="elem elem-btn-secondary elem-btn-home"><img src="{{asset('images/svg/home.svg')}}"></div>
        </a>
        <a href="{{ Auth::check() ? route('user.index') : route('login')}}"><div class="elem elem-btn-secondary">@if (!Auth::check())me connecter @else mon compte @endif</div></a>
    </div>
</header>