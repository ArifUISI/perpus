<!DOCTYPE html>
<html lang="en">

<head>
    <title>Perpustakaan &mdash; SMPN 59 SURABAYA</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/home/fonts/icomoon/style.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/home/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/home/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/home/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/home/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/home/css/owl.theme.default.min.css')}}">

    <link rel="stylesheet" href="{{ asset('assets/home/css/jquery.fancybox.min.css')}}">

    <link rel="stylesheet" href="{{ asset('assets/home/css/bootstrap-datepicker.css')}}">

    <link rel="stylesheet" href="{{ asset('assets/home/fonts/flaticon/font/flaticon.css')}}">

    <link rel="stylesheet" href="{{ asset('assets/home/css/aos.css')}}">
    <link href="{{ asset('assets/home/css/jquery.mb.YTPlayer.min.css')}}" media="all" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="{{ asset('assets/home/css/style.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <!-- JS Select 2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    <div class="site-wrap tes">
        <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>
        <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

            <div class="container">
                <div class="d-flex align-items-center">
                    <div class="site-logo">
                        <a href="{{ url('/')}}">
                            <img src="{{ asset('assets/home/images/logo3.png')}}" alt="Image" class="img-fluid">
                        </a>
                    </div>

                    <div class="mr-auto">
                        <nav class="site-navigation position-relative text-right" role="navigation">
                            <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                                <li class="active">
                                    <a href="{{ url('/')}}" class="nav-link text-left">Home</a>
                                </li>
                                <li>
                                    <a href="{{ url('peminjaman')}}" class="nav-link text-left">Pinjam Buku</a>
                                </li>
                                <li>
                                    <a href="{{ url('tentang')}}" class="nav-link text-left">Tentang</a>
                                </li>
                            </ul>
                            </ul>
                        </nav>

                    </div>
                    <div class="ml-auto">
                        <div class="social">
                            @if(isset(Auth::user()->id))
                            <a href="{{ url('logout')}}" class="btn btn-primary btn-md px-5"><span
                                    class="fas fa-sign-out-alt"></span> LogOut</a>
                            @else
                            <h1><a href="{{ url('login') }}" class="btn btn-primary btn-md px-5"><span
                                        class="fas fa-sign-in-alt"></span> LogIn Admin</a></h1>
                            @endif
                            <a href="#"
                                class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span
                                    class="icon-menu h3"></span>
                            </a>
                        </div>
                    </div>

                </div>
            </div>

        </header>

        @section('content')
        @show

        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="copyright">
                            <p>
                                Copyright &copy; <script>
                                    document.write(new Date().getFullYear());

                                </script> <i class="icon-heart" aria-hidden="true"></i> by <a
                                    href="https://www.instagram.com/aaaaarrriip/" target="_blank">aaaaarrriip</a>
                                &mdash; SMPN 59 SURABAYA
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- .site-wrap -->


    <!-- loader -->
    <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#51be78" /></svg></div>

    <script src="{{ asset('assets/home/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{ asset('assets/home/js/jquery-migrate-3.0.1.min.js')}}"></script>
    <script src="{{ asset('assets/home/js/jquery-ui.js')}}"></script>
    <script src="{{ asset('assets/home/js/popper.min.js')}}"></script>
    <script src="{{ asset('assets/home/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('assets/home/js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('assets/home/js/jquery.stellar.min.js')}}"></script>
    <script src="{{ asset('assets/home/js/jquery.countdown.min.js')}}"></script>
    <script src="{{ asset('assets/home/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{ asset('assets/home/js/jquery.easing.1.3.js')}}"></script>
    <script src="{{ asset('assets/home/js/aos.js')}}"></script>
    <script src="{{ asset('assets/home/js/jquery.fancybox.min.js')}}"></script>
    <script src="{{ asset('assets/home/js/jquery.sticky.js')}}"></script>
    <script src="{{ asset('assets/home/js/jquery.mb.YTPlayer.min.js')}}"></script>
    <script src="{{ asset('assets/home/js/moment.js')}}"></script>

    <script src="{{ asset('assets/home/js/main.js')}}"></script>
    @include('sweetalert::alert')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    
    @yield('js')

</body>

</html>
