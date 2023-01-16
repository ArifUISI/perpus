@extends('layouts.admin')
@section('content')
<!-- DataTales Example -->
<div class="card mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data |
            <a class="btn btn-primary" href="{{ url('add/buku') }}" data-toggle="modal"
                data-target="#exampleModal">Add</a> |
            <a class="btn btn-danger" href="{{ url('deleteall/buku') }}">Delete All</a> |
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#importExcel">Import</button>
        </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive-lg">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Seri Buku</th>
                        <th>Tahun Anggaran</th>
                        <th>Judul</th>
                        <th>Nomer Klasifikasi</th>
                        <th>Kondisi</th>
                        <th>kategori</th>
                        <th>Status</th>
                        <th>Detail</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $d)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $d->seri_buku }}</td>
                        <td>{{ $d->tahun_anggaran }}</td>
                        <td>{{ $d->judul }}</td>
                        <td>{{ $d->nomer_klasifikasi }}</td>
                        <td>{{ $d->kondisi }}</td>
                        <td>{{ $d->kategori }}</td>
                        <td>{{ $d->status }}</td>
                        <td>
                            <a href="{{ url('detail/buku/'.$d->id) }}" class="btn btn-success">Detail</a>
                        </td>
                        <td>
                            <a href="{{ url('edit/buku/'.$d->id) }}" class="btn btn-warning">Edit</a>
                        </td>
                        <td>
                            <a href="{{ url('delete/buku/'.$d->id) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Seri Buku</th>
                        <th>Tahun Anggaran</th>
                        <th>Judul Buku</th>
                        <th>Nomer Klasifikasi</th>
                        <th>Kondisi</th>
                        <th>Kategori</th>
                        <th>Status</th>
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
                                <form method="POST" action="{{ url('save/buku') }}">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="Email" class="col-md-4 col-form-label text-md-right">Seri Buku</label>
                                        <div class="col-lg-8">
                                            <input id="seri_buku" type="text" class="form-control form-control-sm"
                                                name="seri_buku" value="" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Email" class="col-md-4 col-form-label text-md-right">Tahun Anggaran</label>
                                        <div class="col-lg-8">
                                            <input id="tahun_anggaran" type="text" class="form-control form-control-sm"
                                                name="tahun_anggaran" value="" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Nama" class="col-md-4 col-form-label text-md-right">Judul Buku</label>
                                        <div class="col-lg-8">
                                            <input id="judul" type="text" class="form-control form-control-sm"
                                                name="judul" value="" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Email" class="col-md-4 col-form-label text-md-right">Nomer Klasifikasi</label>
                                        <div class="col-lg-8">
                                            <input id="nomer_klasifikasi" type="text" class="form-control form-control-sm"
                                                name="nomer_klasifikasi" value="" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Kondisi" class="col-md-4 col-form-label text-md-right">Kondisi</label>
                                        <div class="col-lg-8">
                                            <select class="js-example-basic-single3 form-control" name="kondisi"
                                                required>
                                                <option value="" selected>Kondisi</option>
                                                <option value="Baik">Baik</option>
                                                <option value="Sedang">Sedang</option>
                                                <option value="Buruk">Buruk</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Kategori" class="col-md-4 col-form-label text-md-right">Kategori</label>
                                        <div class="col-lg-8">
                                            <select class="js-example-basic-single3 form-control" name="kategori"
                                                required>
                                                <option value="" selected>Kategori</option>
                                                <option value="Anak Anak">Anak Anak</option>
                                                <option value="Dewasa">Dewasa</option>
                                            </select>
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
    <!-- Import Excel -->
    <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" action="{{ url('import/buku') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Import Data</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Pilih file excel</label>
                            <input type="file" name="file" required="required">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Import</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
