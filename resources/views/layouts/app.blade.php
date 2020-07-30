@section('description', 'Commerçants, entrepreneurs, particuliers, présentez vos produits, votre marque, vos services ! Communiquez à vie sur Publicites.fr')

<!DOCTYPE html>
<html lang="fr">
    <head>
        <!-- Default meta -->
        <meta charset='utf-8'>
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    
        <meta name='author' content='Quentin Sar, Netinq'>
        <meta name='owner' content='Gregory Gasser'>
        <meta name='subject' content="Annonces">
        
        <meta name='identifier-URL' content='publicites.fr'>
        <meta name='keywords' content='publicités, publicité, pub, annonces, annonce'>
        <meta name="description" content="@yield('description')">
        <meta name='reply-to' content='contact@sarquentin.fr'>
        
        <meta name='language' content='FR'>
        <meta name='target' content='all'>
        <meta name='theme-color' content='#43757D'>
      
        <link rel='shortcut icon' type='image/png' href='{{ asset('images/logo.png') }}'>
        <link rel='logo' type='image/png' href='{{ asset('images/logo.png') }}'>
        <link rel="apple-touch-icon" href="{{ asset('images/logo.png') }}" />
    
        <!-- Twitter Card meta -->
        <meta name='twitter:card' content='summary'>
        <meta name="twitter:site" content="@Netinq" />
        <meta name="twitter:title" content="@hasSection('title') {{Config::get('app.name')}} - @yield('title') @else Communiquez à vie sur Publicites.fr @endif" />
        <meta name='twitter:url' content='https://publicites.fr' />
        <meta name='twitter:domain' content='publicites.fr' />
        <meta name="twitter:description" content="@yield('description')" />
        <meta name="twitter:image" content="{{asset('images/meta.png')}}" />
        
        <!-- Open Graph meta -->
        <meta property='og:title' content='@hasSection('title') {{Config::get('app.name')}} - @yield('title') @else Communiquez à vie sur Publicites.fr @endif' />
        <meta property="og:description" content="@yield('description')" />
        <meta property="og:image" content="{{asset('images/meta.png')}}" />
        <meta property='og:type' content='website' />
        <meta property='og:url' content='https://publicites.fr' />
        <meta property='og:site_name' content='{{Config::get('app.name')}}' />
        <meta property='author' content='Quentin Sar' />
        <meta property='profile:gender' content='male' />
        <meta property="og:locale" content="fr_FR" />
    
        <!-- IOS meta -->
        <meta name="apple-mobile-web-app-title" content="{{Config::get('app.name')}}">
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />

        <title>
            @hasSection('title') {{Config::get('app.name')}} : @yield('title') 
            @else Communiquez à vie sur Publicites.fr @endif
        </title>

        <meta http-equiv="content-language" content="en">

        <!-- STATIC Stylesheet -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/layouts/header.css') }}">
        <script src="{{asset('js/app.js')}}"></script>

        @hasSection('noMaster') @else
            <link rel="stylesheet" type="text/css" href="{{ asset('css/master.css') }}">
        @endif

        <!-- GENERATE Stylesheet -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        @if($styles ?? null)
            @foreach($styles as $style)
            <link rel="stylesheet" type="text/css" 
            href="{{ asset('css/'.$style.'.css') }}">
            @endforeach
        @endif

    </head>

    @include('layouts.header')
    
    <body class="row">
        @yield('content')
    </body>

    @if($scripts ?? null)
        @foreach($scripts as $script)
        <script src="{{ asset('js/'.$script.'.js') }}"> </script>
        @endforeach
    @endif
    <script>
        $(window).resize(function() {
        var w = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
        var h = Math.max(document.documentElement.clientHeight, window.innerHeight || 0);
        $("html, body").css({"width":w,"height":h});
        });
    </script>
</html>
