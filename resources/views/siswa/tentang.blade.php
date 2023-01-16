@extends('layouts.home')
@section('content')
<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4"
    style="background-image: url('assets/home/images/bg_1.jpg')">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-7">
                <h2 class="mb-0">Tentang</h2>
            </div>
        </div>
    </div>
</div>


<div class="custom-breadcrumns border-bottom">
    <div class="container">
        <a href="{{ url('/') }}">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Tentang</span>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-6 mb-lg-0 mb-4">
                <img src="{{ asset('assets/home/images/course_1.jpg')}}" alt="Image" class="img-fluid">
            </div>
            <div class="col-lg-5 ml-auto align-self-center">
                <h2 class="section-title-underline mb-5">
                    <span>Tentang Web Perpustakaan</span>
                </h2>
                <p>Web Perpustakaan di buat agar siswa lebih mudah untuk melakukan peminjaman buku di perpustakaan</p>
                <p>Fitur Aplikasi Perpustakaan</p>

                <ol class="ul-check primary list-unstyled">
                    <li>Hanya bisa di akses oleh Siswa SMPN 59 Surabaya</li>
                    <li>Peminjaman Buku Menggunakan NISN </li>
                    <li>Pencatatan Buku Perpustakaan</li>
                    <li>Bukti Peminjaman</li>
                    <li>Real Time</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row mb-5 justify-content-center text-center">
            <div class="col-lg-12 mb-5">
                <h2 class="section-title-underline mb-5">
                    <span>Langkah Langkah Peminjaman Buku</span>
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">

                <div class="feature-1 border">
                    <div class="icon-wrapper bg-primary">
                        <span class="icon flaticon-school-material text-white"></span>
                    </div>
                    <div class="feature-1-content">
                        <h2>Memasukkan NISN</h2>
                        <p>Siswa harus mencari data NISN atau Nama mereka di kolom pencarian yang telah di sediakan.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                <div class="feature-1 border">
                    <div class="icon-wrapper bg-primary">
                        <span class="icon flaticon-books-1 text-white"></span>
                    </div>
                    <div class="feature-1-content">
                        <h2>Pilih Buku</h2>
                        <p>Setelah memasukkan NISN, Maka akan tampil menu Buku.</p>
                        <p>Siswa juga harus menentukan berapa lama buku tersebut akan di pinjam.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                <div class="feature-1 border">
                    <div class="icon-wrapper bg-primary">
                        <span class="icon flaticon-book text-white"></span>
                    </div>
                    <div class="feature-1-content">
                        <h2>Bukti Peminjaman</h2>
                        <p>Setelah memilih Buku yang akan dipinjam dan menentukan lama peminjaman, maka siswa bukti
                            peminjaman buku akan langsung ter download dalam bentuk pdf yang nantinya ditunjukkan ke
                            penjaga perpustakaan
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
