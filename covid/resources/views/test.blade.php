<!DOCTYPE html>
<html style="font-size: 16px;">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>Pagrindinis</title>

    <link rel="stylesheet" href="{{ asset('css/nicepage.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/Pagrindinis.css') }}" />


    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/nicepage.js')}}"></script>

    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">

    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Pagrindinis">
    <meta property="og:type" content="website">
</head>
<body data-home-page="Pagrindinis.html" data-home-page-title="Pagrindinis" class="u-body u-xl-mode"><header class="u-clearfix u-header u-header" id="sec-f83f"><div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <a href="http://localhost:8000" class="u-image u-logo u-image-1" data-image-width="150" data-image-height="150">
            <img src="images/virus.png" class="u-logo-image u-logo-image-1">
        </a>

        <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1">
            <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0px;">
                <a class="u-button-style u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
                    <svg class="u-svg-link" viewBox="0 0 24 24"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use></svg>
                    <svg class="u-svg-content" version="1.1" id="menu-hamburger" viewBox="0 0 16 16" x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"><g><rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect><rect y="13" width="16" height="2"></rect>
                        </g></svg>
                </a>
            </div>
            <div class="u-custom-menu u-nav-container">
                <ul class="u-nav u-unstyled u-nav-1"><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Pagrindinis.html" style="padding: 10px 20px;">Pagrindinis</a>
                    </li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Apie-mus.html" style="padding: 10px 20px;">Apie mus</a>
                    </li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" style="padding: 10px 20px;">Prisijungti</a>
                    </li></ul>
            </div>
            <div class="u-custom-menu u-nav-container-collapse">
                <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
                    <div class="u-inner-container-layout u-sidenav-overflow">
                        <div class="u-menu-close"></div>
                        <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2"><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Pagrindinis.html">Pagrindinis</a>
                            </li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Apie-mus.html">Apie mus</a>
                            </li><li class="u-nav-item"><a class="u-button-style u-nav-link">Prisijungti</a>
                            </li></ul>
                    </div>
                </div>
                <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
            </div>
        </nav>
    </div></header>
<section class="u-clearfix u-palette-1-light-1 u-section-1" id="carousel_0ce9">
    <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-expanded-width u-list u-list-1">
            <div class="u-repeater u-repeater-1">
                <div class="u-align-center u-container-style u-list-item u-radius-7 u-repeater-item u-shape-round u-white u-list-item-1">
                    <div class="u-container-layout u-similar-container u-container-layout-1">
                        <h4 class="u-text u-text-1">Kliento zona</h4>
                        <img alt="" class="u-expanded-width u-image u-image-contain u-image-default u-image-1" data-image-width="687" data-image-height="889" src="images/19668c1c-a92f-aa26-536b-68db1bda84f6.jpg">
                        <p class="u-text u-text-2">Užsiregistruokite norėdami registruoti savo vizitus.</p>
                        <a href="{{route('register-client')}}" class="u-black u-btn u-btn-round u-button-style u-hover-grey-75 u-radius-50 u-btn-1">Registracija</a>
                    </div>
                </div>
                <div class="u-align-center u-container-style u-list-item u-radius-7 u-repeater-item u-shape-round u-white u-list-item-2">
                    <div class="u-container-layout u-similar-container u-container-layout-2">
                        <h4 class="u-text u-text-3">Prisijungimas</h4>
                        <img alt="" class="u-expanded-width u-image u-image-contain u-image-default u-image-2" data-image-width="1600" data-image-height="1067" src="images/3658058.jpg">
                        <p class="u-text u-text-4">Prisijunkite ir užregistruokite savo vizitą kontaktinių paslaugų įmonėje.</p>
                        <a href="{{ route('login') }}" class="u-black u-btn u-btn-round u-button-style u-hover-grey-75 u-radius-50 u-btn-2">Prisijungti</a>
                    </div>
                </div>
                <div class="u-align-center u-container-style u-list-item u-radius-7 u-repeater-item u-shape-round u-white u-list-item-3">
                    <div class="u-container-layout u-similar-container u-container-layout-3">
                        <h4 class="u-text u-text-5">Įmonės zona</h4>
                        <img alt="" class="u-expanded-width u-image u-image-contain u-image-default u-image-3" data-image-width="8000" data-image-height="5000" src="images/6308.jpg">
                        <p class="u-text u-text-6">Registruoktie savo įmonę, kad klientai galėtų registruoti savo vizitus.</p>
                        <a href="{{route('register')}}" class="u-black u-btn u-btn-round u-button-style u-hover-grey-75 u-radius-50 u-btn-3">registracija</a>
                    </div>
                </div>
            </div>
        </div>
        <p class="u-align-center u-text u-text-7">Images from <a href="https://www.freepik.com/vectors/car" class="u-active-none u-border-1 u-border-black u-btn u-button-link u-button-style u-hover-none u-none u-text-body-color u-btn-4" target="_blank">Freepik</a>
        </p>
    </div>
</section>


<footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-19a8"><div class="u-clearfix u-sheet u-sheet-1">
        <p class="u-small-text u-text u-text-variant u-text-1"><b>© 2022 Kontaktinių paslaugų registravimosi sistema</b>
        </p>
    </div></footer>
<section class="u-backlink u-clearfix u-grey-80">
    <a class="u-link" href="https://nicepage.com/website-templates" target="_blank">
        <span>Website Templates</span>
    </a>
    <p class="u-text">
        <span>created with</span>
    </p>
    <a class="u-link" href="" target="_blank">
        <span>Website Builder Software</span>
    </a>.
</section>
</body>
</html>
