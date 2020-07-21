<header class="row">
    <div class="col-md-4 menu d-none d-md-flex">
        <img id="logo" alt="Website logo" src="{{asset('images/logo.png')}}">
        <a href="{{route('home')}}">
            <div class="elem">accueil</div>
        </a>
    </div>
    <div class="col-md-8 menu menu-right d-none d-md-flex">
        <a href="#">
            <div class="elem elem-btn">devenir annonceur</div>
        </a>
        <a href="#">
            <div class="elem">me connecter</div>
        </a>
    </div>
    <div class="col-12 menu menu-m d-md-none">
        <a href="{{route('home')}}">
            <img id="logo" alt="Website logo" src="{{asset('images/logo.png')}}">
        </a>
        <a href="#">
            <div class="elem">devenir annonceur</div>
        </a>
    </div>
    <div class="col-12 menu menu-b d-md-none">
        <a href="#">
            <div class="elem">me connecter</div>
        </a>
    </div>
</header>