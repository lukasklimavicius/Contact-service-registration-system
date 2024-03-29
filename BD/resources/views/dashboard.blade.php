<!DOCTYPE html>
<html>
<head>
    <title>Kontaktinių paslaugų registravimosi sistema</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}"/>
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap5.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/allpages.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/default.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" media="screen">

    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    @yield('head')
</head>
<body>

@guest

    <h1 class="mt-4 mb-5 text-center">Kontaktinių paslaugų registravimosi sistema</h1>

    @yield('content')

@else

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        @if(Auth::user()->type == 'User')
            <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Kliento zona</a>
        @elseif(Auth::user()->type == 'Company')
            <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Įmonės zona</a>
        @else
            <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Admin zona</a>
        @endif


        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3" href="#">Sveiki atvykę, {{ Auth::user()->email }}</a>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">

                        <li class="nav-item">
                            <a class="nav-link {{ Request::segment(1) == 'profile' ? 'active' : '' }}"
                               aria-current="page" href="/profile">Profilis</a>
                        </li>
                        @if(Auth::user()->type == 'User')
                            <li class="nav-item">
                                <a class="nav-link {{ Request::segment(1) == 'dashboard' ? 'active' : '' }}"
                                   aria-current="page" href="/dashboard">Apžvalga</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::segment(1) == 'visit' ? 'active' : '' }}" href="/visit">Vizitai</a>
                            </li>
                        @elseif(Auth::user()->type == 'Company')
                            <li class="nav-item">
                                <a class="nav-link {{ Request::segment(1) == 'visit_company' ? 'active' : '' }}"
                                   href="/visit_company">Įmonės vizitai</a>
                            </li>
                        @elseif(Auth::user()->type == 'Admin')
                            <li class="nav-item">
                                <a class="nav-link {{ Request::segment(1) == 'illnesses' ? 'active' : '' }}"
                                   href="/illnesses">Ligų informacija</a>
                            </li>
                        @endif

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}">Atsijungti</a>
                        </li>

                    </ul>

                </div>
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <!--<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">!-->


                <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1">
                    <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0px;">
                        <a class="u-button-style u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base"
                           href="#">
                            <svg class="u-svg-link" viewBox="0 0 24 24">
                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use>
                            </svg>
                            <svg class="u-svg-content" version="1.1" id="menu-hamburger" viewBox="0 0 16 16" x="0px"
                                 y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                                <g>
                                    <rect y="1" width="16" height="2"></rect>
                                    <rect y="7" width="16" height="2"></rect>
                                    <rect y="13" width="16" height="2"></rect>
                                </g>
                            </svg>
                        </a>
                    </div>

                    <div class="u-custom-menu u-nav-container-collapse">
                        <div
                            class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
                            <div class="u-inner-container-layout u-sidenav-overflow">
                                <div class="u-menu-close"></div>
                                <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2">
                                    <li class="u-nav-item"><a class="u-button-style u-nav-link"
                                                              href="{{route('profile')}}">Profilis</a>
                                    </li>
                                    @if(Auth::user()->type == 'User')
                                        <li class="u-nav-item"><a class="u-button-style u-nav-link"
                                                                  href="{{route('dashboard')}}">Apžvalga</a>
                                        </li>
                                        <li class="u-nav-item"><a class="u-button-style u-nav-link"
                                                                  href="{{route('visit')}}">Mano vizitai</a>
                                        </li>
                                    @endif
                                    @if(Auth::user()->type == 'Company')
                                        <li class="u-nav-item"><a class="u-button-style u-nav-link"
                                                                  href="{{route('visit_company')}}">Įmonės vizitai</a>
                                        </li>
                                    @endif
                                    @if(Auth::user()->type == 'Admin')
                                        <li class="u-nav-item"><a class="u-button-style u-nav-link"
                                                                  href="{{route('illnesses')}}">Ligų informacija</a>
                                        </li>
                                    @endif
                                    <li class="u-nav-item"><a class="u-button-style u-nav-link"
                                                              href="{{route('logout')}}">Atsijungti</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
                    </div>
                </nav>
                @yield('content')

                <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-19a8">
                    <div class="u-clearfix u-sheet u-sheet-1">
                        <p class="u-small-text u-text u-text-variant u-text-1"><b>© 2022 Kontaktinių paslaugų
                                registravimosi sistema</b>
                        </p>
                    </div>
                </footer>

            </main>
        </div>
    </div>

@endguest

<script src="{{ asset('js/bootstrap.js') }}"></script>
<script src="{{asset('js/dataTables.bootstrap5.min.js')}}"></script>

</body>
</html>
