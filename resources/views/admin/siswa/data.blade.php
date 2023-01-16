@extends('layouts.admin')
@section('content')
<!-- DataTales Example -->
<div class="card mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data |
            <a class="btn btn-primary" href="{{ url('add/siswa') }}" data-toggle="modal"
                data-target="#exampleModal">Add</a> |
            <a class="btn btn-danger" href="{{ url('deleteall/siswa') }}">Delete All</a> |
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#importExcel">Import</button>
        </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NISN</th>
                        <th>Nama Lengkap</th>
                        <th>Kelas</th>
                        <th>Jenis Kelamin</th>
                        <th>No. Telfon</th>
                        <th>Alamat</th>
                        <th>Detail</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $d)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $d->nisn }}</td>
                        <td>{{ $d->nama }}</td>
                        <td>{{ $d->kelas }}</td>
                        <td>{{ $d->kelamin }}</td>
                        <td>{{ $d->seluler }}</td>
                        <td>{{ Str::limit($d->alamat, 30, $end='...') }}</td>
                        <td>
                            <a href="{{ url('detail/siswa/'.$d->id) }}" class="btn btn-success">Detail</a>
                        </td>
                        <td>
                            <a href="{{ url('edit/siswa/'.$d->id) }}" class="btn btn-warning">Edit</a>
                        </td>
                        <td>
                            <a href="{{ url('delete/siswa/'.$d->id) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>NISN</th>
                        <th>Nama Lengkap</th>
                        <th>Kelas</th>
                        <th>Jenis Kelamin</th>
                        <th>No. Telfon</th>
                        <th>Alamat</th>
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
                                <form method="POST" action="{{ url('save/siswa') }}">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="Email" class="col-md-4 col-form-label text-md-right">NISN</label>
                                        <div class="col-lg-8">
                                            <input id="nisn" type="text" class="form-control form-control-sm"
                                                name="nisn" value="" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Nama" class="col-md-4 col-form-label text-md-right">Nama</label>
                                        <div class="col-lg-8">
                                            <input id="nama" type="text" class="form-control form-control-sm"
                                                name="nama" value="" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Email" class="col-md-4 col-form-label text-md-right">Kelas</label>
                                        <div class="col-lg-8">
                                            <input id="Kelas" type="text" class="form-control form-control-sm"
                                                name="kelas" value="" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Jenis Kelamin" class="col-md-4 col-form-label text-md-right">Jenis
                                            Kelamin</label>
                                        <div class="col-lg-8">
                                            <select class="js-example-basic-single3 form-control" name="kelamin"
                                                required>
                                                <option value="" selected>Jenis Kelamin</option>
                                                <option value="Laki Laki">Laki Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Email" class="col-md-4 col-form-label text-md-right">Nomer Telfon
                                            Seluler</label>
                                        <div class="col-lg-8">
                                            <input id="seluler" type="text" class="form-control form-control-sm"
                                                name="seluler" value="" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Email" class="col-md-4 col-form-label text-md-right">Alamat</label>
                                        <div class="col-lg-8">
                                            <input id="alamat" type="text" class="form-control form-control-sm"
                                                name="alamat" value="" required>
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
            <form method="post" action="{{ url('import/siswa') }}" enctype="multipart/form-data">
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
