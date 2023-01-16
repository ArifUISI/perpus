@extends('layouts.admin')
@section('content')
@foreach( $data as $d)
<div class="card shadow mb-4 col-8">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
    </div>
    <div class="card-body">
        <form autocomplete="off" action="{{ url('update/siswa') }}" method="post">
            @csrf
            <input hidden type="text" name="id" value="{{ $d->id }}" />
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">NISN</label>
                <input name="nisn" value="{{ $d->nisn }}" type="text" class="form-control" id="#" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama</label>
                <input name="nama" value="{{ $d->nama }}" type="text" class="form-control" id="#" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Kelas</label>
                <input name="kelas" value="{{ $d->kelas }}" type="text" class="form-control" id="#" required>
            </div>
            <div class="mb-3">
                <label for="Mata Kuliah" class="form-label">Jenis Kelamin</label>
                <select class="js-example-basic-single3 form-control" name="kelamin" required>
                    <option value="" placeholder="{{ $d->kelamin }}" selected>{{ $d->kelamin }}</option>
                    <option value="L">Laki Laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nomer Telfon Seluler</label>
                <input name="seluler" value="{{ $d->seluler }}" type="text" class="form-control" id="#" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Alamat</label>
                <textarea name="alamat" cols="80" rows="4">{{ $d->alamat }}</textarea>
            </div>
            <button type="submit" class="btn btn-success">
                <i class="fas fa-check" aria-hidden="true"></i> Simpan
            </button>
        </form>
    </div>
</div>
@endforeach
@endsection
