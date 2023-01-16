@extends('layouts.admin')
@section('content')
<!-- DataTales Example -->
<div class="card mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data |
            <a class="btn btn-primary" href="{{ url('add/siswa') }}" data-toggle="modal"
                data-target="#exampleModal">Add</a> |
            <a class="btn btn-danger" href="{{ url('deleteall/siswa') }}">Delete All</a>
        </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Siswa</th>
                        <th>Buku</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Detail</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $d)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $d->siswa }}</td>
                        <td>{{ $d->buku }}</td>
                        <td>{{ date('d-m-Y', strtotime($d->tgl_pinjam)) }}</td>
                        <td>{{ date('d-m-Y', strtotime($d->tgl_kembali)) }}</td>
                        <td>
                            <a href="{{ url('detail/pinjam/'.$d->id) }}" class="btn btn-success">Detail</a>
                        </td>
                        <td>
                            <a href="{{ url('edit/pinjam/'.$d->id) }}" class="btn btn-warning">Edit</a>
                        </td>
                        <td>
                            <a href="{{ url('delete/pinjam/'.$d->id) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Siswa</th>
                        <th>Buku</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Detail</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <br>
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <form method="POST" action="{{ url('save/pinjam') }}">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="exampleInputEmail1"
                                            class="col-md-4 col-form-label text-md-right">Siswa</label>
                                        <div class="col-lg-8">
                                            <select class="js-example-basic-single3 form-control" name="id_siswa"
                                                required>
                                                <option value="" selected>NISN</option>
                                                @foreach( $siswa as $d )
                                                <option value="{{ $d->nisn }}">{{ $d->nama }} - {{ $d->nisn }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputEmail1"
                                            class="col-md-4 col-form-label text-md-right">Buku</label>
                                        <div class="col-lg-8">
                                            <select class="js-example-basic-single3 form-control" name="id_buku"
                                                required>
                                                <option value="" selected>Judul</option>
                                                @foreach( $buku as $d )
                                                <option value="{{ $d->id }}">{{ $d->judul }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Email" class="col-md-4 col-form-label text-md-right">Tanggal
                                            Pinjam</label>
                                        <div class="col-lg-8">
                                            <input id="tgl_pinjam" type="date" class="form-control form-control-sm"
                                                name="tgl_pinjam" value="" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Email" class="col-md-4 col-form-label text-md-right">Tanggal
                                            Kembali</label>
                                        <div class="col-lg-8">
                                            <input id="tgl_kembali" type="date" class="form-control form-control-sm"
                                                name="tgl_kembali" value="" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
