@extends('layouts.admin')
@section('content')
@foreach( $data as $d)
<div class="card shadow mb-4 col-8">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
    </div>
    <div class="card-body">
        <form autocomplete="off" action="{{ url('print/'.$d->id) }}" method="get">
            @csrf
            <input hidden name="id" value="{{ $d->id }}" type="text" class="form-control" id="id" disabled>
            <div class="form-group row">
                <label for="exampleInputEmail1" class="col-md-4 col-form-label text-md-left">Siswa</label>
                <div class="col-lg-8">
                    <select class="js-example-basic-single3 form-control" name="id_siswa" disabled>
                        <option value="{{ $d->id_siswa }}" selected>{{ $d->nama }} - {{ $d->nisn }}</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="exampleInputEmail1" class="col-md-4 col-form-label text-md-left">Buku</label>
                <div class="col-lg-8">
                    <select class="js-example-basic-single3 form-control" name="id_buku" disabled>
                        <option value="{{ $d->id_buku }}" selected>{{ $d->buku }}</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="exampleInputEmail1" class="col-md-4 col-form-label text-md-left">Tanggal Pinjam</label>
                <div class="col-lg-8">
                    <input name="tgl_pinjam" value="{{ $d->tgl_pinjam }}" type="date" class="form-control"
                        id="tgl_pinjam" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label for="exampleInputEmail1" class="col-md-4 col-form-label text-md-left">Tanggal Kembali</label>
                <div class="col-lg-8">
                    <input name="tgl_kembali" value="{{ $d->tgl_kembali }}" type="date" class="form-control"
                        id="tgl_kembali" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label for="exampleInputEmail1" class="col-md-4 col-form-label text-md-left">Status</label>
                <div class="col-lg-8">
                    <input name="status" value="{{ $d->status }}" type="text" class="form-control" id="#" disabled>
                </div>
            </div>

            <button type="submit" class="btn btn-success">
                <i class="fas fa-print" aria-hidden="true"></i> Print
            </button>
        </form>
    </div>
</div>
@endforeach
@endsection
