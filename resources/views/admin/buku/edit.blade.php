@extends('layouts.admin')
@section('content')
@foreach( $data as $d)
<div class="card shadow mb-4 col-8">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
    </div>
    <div class="card-body">
        <form autocomplete="off" action="{{ url('update/buku') }}" method="post">
            @csrf
            <input hidden type="text" name="id" value="{{ $d->id }}" />
            <div class="form-group row">
                <label for="Email" class="col-md-4 col-form-label text-md-left">Seri Buku</label>
                <div class="col-lg-8">
                    <input id="seri_buku" type="text" class="form-control form-control-sm" name="seri_buku" value="{{ $d->seri_buku }}"
                        required>
                </div>
            </div>
            <div class="form-group row">
                <label for="Email" class="col-md-4 col-form-label text-md-left">Tahun Anggaran</label>
                <div class="col-lg-8">
                    <input id="tahun_anggaran" type="text" class="form-control form-control-sm" name="tahun_anggaran"
                        value="{{ $d->tahun_anggaran }}" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="Nama" class="col-md-4 col-form-label text-md-left">Judul Buku</label>
                <div class="col-lg-8">
                    <input id="judul" type="text" class="form-control form-control-sm" name="judul" value="{{ $d->judul }}" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="Email" class="col-md-4 col-form-label text-md-left">Nomer Klasifikasi</label>
                <div class="col-lg-8">
                    <input id="nomer_klasifikasi" type="text" class="form-control form-control-sm"
                        name="nomer_klasifikasi" value="{{ $d->nomer_klasifikasi }}" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="Kondisi" class="col-md-4 col-form-label text-md-left">Kondisi</label>
                <div class="col-lg-8">
                    <select class="js-example-basic-single3 form-control" name="kondisi" required>
                        <option value="{{ $d->kondisi }}" selected>{{ $d->kondisi }}</option>
                        <option value="Baik">Baik</option>
                        <option value="Sedang">Sedang</option>
                        <option value="Buruk">Buruk</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="Kategori" class="col-md-4 col-form-label text-md-left">Kategori</label>
                <div class="col-lg-8">
                    <select class="js-example-basic-single3 form-control" name="kategori" required>
                        <option value="{{ $d->kategori }}" selected>{{ $d->kategori }}</option>
                        <option value="Anak Anak">Anak Anak</option>
                        <option value="Dewasa">Dewasa</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="Email" class="col-md-4 col-form-label text-md-left">Status</label>
                <div class="col-lg-8">
                    <input id="status" type="text" class="form-control form-control-sm" name="status" value="{{ $d->status }}" required>
                </div>
            </div>
            <button type="submit" class="btn btn-success">
                <i class="fas fa-check" aria-hidden="true"></i> Simpan
            </button>
        </form>
    </div>
</div>
@endforeach
@endsection
