@extends('layouts.home')
@section('content')
<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
    <div class="container">
        <div class="row align-items-end justify-content-center text-center">
            <div class="col-lg-7">
                <h2 class="mb-0">Masukkan NISN</h2>
                <p>Siswa harus memasukkan NISN terlebih dahulu sebelum melakukan Peminjaman Buku di halaman
                    Peminajaman Buku.</p>
            </div>
        </div>
    </div>
</div>
<div class="custom-breadcrumns border-bottom">
    <div class="container">
        <a href="index.html">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Peminjaman</span>
    </div>
</div>
<form method="POST" action="{{ url('save/peminjaman') }}" class="my-login-validation" novalidate="">
    @csrf
    <div class="site-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    @foreach( $pinjam as $d )
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <input hidden type="text" id="status" class="form-control form-control-lg" name="id"
                                value="{{ $d->id }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="NISN">NISN</label>
                            <input type="text" id="status" class="form-control form-control-lg" name="id_siswa"
                                value="{{ $d->id_siswa }}">
                        </div>
                    </div>
                    @endforeach
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="NISN">Buku</label>
                            <select class="js-example-basic-single3 " name="id_buku" required>
                                <option value="" selected>Judul</option>
                                @foreach( $buku as $d )
                                <option value="{{ $d->id }}">{{ $d->judul }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="Tanggal Kembali">Tanggal Kembali</label>
                            <input type="date" id="tgl_pinjam" class="form-control form-control-lg" name="tgl_pinjam">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="Tanggal Kembali">Tanggal Kembali</label>
                            <input type="date" id="tgl_kembali" class="form-control form-control-lg" name="tgl_kembali">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <input hidden type="text" id="status" class="form-control form-control-lg" name="status"
                                value="Di Pinjam">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <input type="submit" value="Lanjut" class="btn btn-primary btn-lg px-5">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<div class="card-footer text-center">
    <a href="{{ url('/')}}"><small>Back to home</small></a>
</div>
<br>
</div>
@endsection
