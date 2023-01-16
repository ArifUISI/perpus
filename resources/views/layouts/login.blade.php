<!DOCTYPE html>
<html lang="en">

<head>
    <title>Perpustakaan SMPN 59 Surabaya</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/login/dist/css/adminx.css')}}" media="screen" />
</head>

<body>
    <div class="adminx-container d-flex justify-content-center align-items-center">
        <div class="page-login">
            <div class="text-center">
                <a class="navbar-brand mb-4 h1" href="{{ url('login') }}">
                    <img src="{{ asset('assets/login/dist/img/icons.png')}}"
                        class="navbar-brand-image d-inline-block align-top mr-2" alt="">
                </a>
            </div>

            <div class="card mb-0">
                <div class="card-body">
                    <h5 class="card-title">Perpustakaan SMPN 59 Surabaya</h5>
                    @section('content')
                    @show
                </div>
                <div class="fututututututut">
                    Copyright &copy; 2021 <i class="icon-heart" aria-hidden="true"></i> by <a
                        href="https://www.instagram.com/aaaaarrriip/" target="_blank">Aripin</a> &nbsp;&bull;&nbsp; <a
                        href="https://www.instagram.com/jagad.hotspot">Jagad</a> <br> SMPN 59 SURABAYA
                </div>
            </div>
        </div>

        <!-- If you prefer jQuery these are the required scripts -->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
        <script src="{{ asset('assets/login/dist/js/vendor.js')}}"></script>
        <script src="{{ asset('assets/login/dist/js/adminx.js')}}"></script>
        <script src="{{ asset('assets/login/dist/js/my-login.js') }}"></script>
        <!-- If you prefer vanilla JS these are the only required scripts -->
        <!-- script src="../dist/js/vendor.js"></script>
    <script src="../dist/js/adminx.vanilla.js"></script-->
</body>

</html>
