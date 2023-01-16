@extends('layouts.admin')
@section('content')
@foreach( $data as $d)
<div class="card shadow mb-4 col-8">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
    </div>
    <div class="card-body">
        <form autocomplete="off" action="{{ url('update/pinjam') }}" method="post">
            @csrf
            <input hidden type="text" name="id" value="{{ $d->id }}" />
            <div class="form-group row">
                <label for="exampleInputEmail1" class="col-md-4 col-form-label text-md-left">Siswa</label>
                <div class="col-lg-8">
                    <select class="js-example-basic-single3 form-control" name="id_siswa" required>
                        <option value="{{ $d->id_siswa }}" selected>{{ $d->nama }} - {{ $d->nisn }}</option>
                        @foreach( $siswa as $b )
                        <option value="{{ $b->nisn }}">{{ $b->nama }} - {{ $b->nisn }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="exampleInputEmail1" class="col-md-4 col-form-label text-md-left">Buku</label>
                <div class="col-lg-8">
                    <select class="js-example-basic-single3 form-control" name="id_buku" required>
                        <option value="{{ $d->id_buku }}" selected>{{ $d->buku }}</option>
                        @foreach( $buku as $c )
                        <option value="{{ $c->id }}">{{ $c->judul }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="exampleInputEmail1" class="col-md-4 col-form-label text-md-left">Tanggal Pinjam</label>
                <div class="col-lg-8">
                    <input name="tgl_pinjam" value="{{ $d->tgl_pinjam }}" type="date" class="form-control"
                        id="tgl_pinjam" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="exampleInputEmail1" class="col-md-4 col-form-label text-md-left">Tanggal Kembali</label>
                <div class="col-lg-8">
                    <input name="tgl_kembali" value="{{ $d->tgl_kembali }}" type="date" class="form-control"
                        id="tgl_kembali" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="exampleInputEmail1" class="col-md-4 col-form-label text-md-left">Status</label>
                <div class="col-lg-8">
                    <input name="status" value="{{ $d->status }}" type="text" class="form-control" id="#">
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
