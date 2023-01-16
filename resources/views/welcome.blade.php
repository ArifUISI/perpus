@extends('layouts.home')
@section('content')
<div class="hero-slide owl-carousel site-blocks-cover">
    <div class="intro-section" style="background-image: url('assets/home/images/3.jpg');">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 mx-auto text-center" data-aos="fade-up">
                    
                    @if(isset(Auth::user()->id))
                    <h1>Selamat datang {{ Auth::user()->name }} di aplikasi presensi SMPN 59 Surabaya</h1>
                    @else
                    <h1>Selamat datang di SMPN 59 Surabaya</h1>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
