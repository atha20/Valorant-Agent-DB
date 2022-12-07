<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <style type="text/css">
    
            body
            {
                margin: 0;
                height: 100%;
                font-size: .9rem;
                font-weight: 400;
                line-height: 1.6;
                text-align: justify;
                background-color: rgb(16,24,35) ;
            }
            .navbar
            {
                box-shadow: 0 6px 12px rgba(48,48,48,.5);
                border-radius: 0px 0px 50px 50px;
            }
            .card
            {
                box-shadow: 0 2px 4px rgba(248,71,83,.5);
                border-radius: 50px 20px;
                padding: 10px;
            }
            .navbar-brand
            {
                font-weight: bold;
                font-size: 1.5rem;
            }
            .my-form, .login-form, .table, .h2
            {
                font-family: Raleway, sans-serif;
                font-weight: bold;
                font-size: 1rem;
                color: #f0f0f0;
            }
            .nav-link
            {
                font-weight: bold;
                font-size: 1rem;
                text-decoration: underline;
            }
            .my-form, .login-form
            {
                padding-top: 1.5rem;
                padding-bottom: 1.5rem;
            }
            .my-form, .login-form, .row
            {
                margin-left: 0;
                margin-right: 0;
            }
            .table
            {
                white-space: nowrap;
                border-style: solid;
                border-width: 0px;
            }
            .image 
            {
                height: 35px;
                width: 35px;
                margin: 3px 0px 0px -6px;
                margin-right: .5rem;
            }
            img.background 
            {
                position: fixed;
                left: 0px;
                top: 0px;
                z-index: -1;
                width: 100%;
                height: 100%;
                -webkit-filter: blur(.1rem);
                filter: blur(.09rem);
            }

            .btn
            {
                
                -moz-appearance: none;
                -webkit-appearance: none;
                appearance: none;
                border: none;
                background: none;
                padding: 0;
                color: var(--button-text-color);
                cursor: pointer;

                --border-color: #ffffff;
                
                position: relative;
                padding: 8px;
                margin-bottom: 20px;
                text-transform: uppercase;
                font-weight: bold;
                font-size: 14px;
                transition: all .15s ease;
            }

            .btn::before, .btn::after 
            {
                content: '';
                display: block;
                position: absolute;
                right: 0; left: 0;
                height: calc(50% - 5px);
                border: 1px solid var(--border-color);
                transition: all .15s ease;
            }

            .btn::before
            {
                top: 0;
                border-bottom-width: 0;
                border-radius: 3px;
            }

            .btn::after
            {
                bottom: 0;
                border-top-width: 0;
                border-radius: 3px;
            }

            .btn:active, .btn:focus 
            {
                outline: none;
            }

            .btn:active::before, .btn:active::after
            {
                right: 3px;
                left: 3px;
            }

            .btn:active::before 
            {
                top: 3px;
            }

            .btn:active::after 
            {
                bottom: 3px;
            }

            .btn:hover 
            {
                color: var(--button-text-color-hover);
            }

            .btn:hover
            {
                background-color: var(--button-bits-color-hover);
            }

            input, select {
                box-sizing: content-box;
                padding: 6px 10px;
                font-size: .9rem;
                border: 3px solid black;
                border-radius: 12px;
            }

        </style>
        
        <title>@yield('title')</title>
    </head>
    
    <body class="antialiased">
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgba(248,71,83,.8);">
            <div class="container">
                <img src="https://resources.tidal.com/images/40ebd205/803e/4082/b300/fc462c0cf90d/750x750.jpg" alt="Valorant Logo" class="image">
                <a class="navbar-brand">VALORANT</a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('abilityIndex') }}">Abilities</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <img class="background" src="https://cdn1.dotesports.com/wp-content/uploads/2022/06/23044623/valorant-new-rank-ascendant-episode-5-act-1-1331152772.jpg" alt="bg">
        @yield('content')
    </body>
</html>