@extends('layouts.admin')
@section('content')
@foreach( $data as $d)
<div class="card shadow mb-4 col-8">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail Siswa</h6>
    </div>
    <div class="card-body">
        <form autocomplete="off" action="#" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">NISN</label>
                <input name="nisn" value="{{ $d->nisn }}" type="text" class="form-control" id="#" disabled>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama</label>
                <input name="nama" value="{{ $d->nama }}" type="text" class="form-control" id="#" disabled>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Kelas</label>
                <input name="kelas" value="{{ $d->kelas }}" type="text" class="form-control" id="#" disabled>
            </div>
            <div class="mb-3">
                <label for="Mata Kuliah" class="form-label">Jenis Kelamin</label>
                <select class="js-example-basic-single3 form-control" name="kelamin" disabled>
                    <option value="" placeholder="{{ $d->kelamin }}" selected>{{ $d->kelamin }}</option>
                    <option value="Laki Laki">Laki Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nomer Telfon Seluler</label>
                <input name="seluler" value="{{ $d->seluler }}" type="text" class="form-control" id="#" disabled>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Alamat</label>
                <textarea name="alamat" cols="80" rows="4" disabled>{{ $d->alamat }}</textarea>
            </div>
            <a class="btn btn-success" href="{{ url('datasiswa') }}">
                <i class="fas fa-arrow-left" aria-hidden="true"></i> Kembali
            </a>
        </form>
    </div>
</div>
@endforeach
@endsection
