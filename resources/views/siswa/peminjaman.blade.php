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
<div class="site-section">
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-5">
                <div class="row">

                    <div class="col-md-12 form-group">
                        <label for="NISN">Pencarian</label>
                        <select class="form-control nisn"></select>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="site-section section-form" style="display:none">
    <div class="container">


        <div class="row justify-content-center">
            <div class="col-md-5">
                <form id="form1" method="POST" action="{{ url('save/peminjaman') }}" class="my-login-validation"
                    novalidate="">
                    @csrf
                    <div class="row">
                        <div style="display:none" class="col-md-12 form-group section-data">
                            <label for="NISN">NISN</label>
                            <input name="id_siswa" type="text" class="form-control section-nama" readonly>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="Buku">Buku</label>
                            <select class="form-control form-control-lg" name="id_buku" required>
                                <option value="" selected>Judul</option>
                                @foreach( $buku as $d )
                                <option value="{{ $d->id }}">{{ $d->judul }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 form-group input-daterange">
                            <label for="Tanggal Pinjam">Tanggal Pinjam</label>
                            <input  value="{{ date('d-m-Y') }}" type="text" id="tgl_pinjam" class="form-control form-control-lg tanggal-awal" name="tgl_pinjam"
                                required>
                        
                            <label for="Tanggal Kembali">Tanggal Kembali</label>
                            <input type="text" id="tgl_kembali" class="form-control form-control-lg tanggal-kembali" name="tgl_kembali"
                                readonly>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <input hidden type="text" id="status" class="form-control form-control-lg" name="status"
                                    value="Di Pinjam">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <input type="submit" value="Pinjam Buku" class="btn btn-primary btn-lg px-5">
                        </div>
                    </div>
                </form>
            </div>
        </div>



    </div>
</div>
<div class="card-footer text-center">
    <a href="{{ url('/')}}"><small>Back to home</small></a>
</div>
</div>
@endsection
@section('js')

<script>
    $(document).ready(function () {
        $('.section-nama').val('');
        $('.nisn').select2({
            placeholder: "Masukkan Nama atau NISN",
            allowClear: true,
            ajax: {
                url: "{{ url('getDataNisn') }}",
                processResults: function (data) {
                    return {
                        results: $.map(data, function (data) {
                            return {
                                text: data.nama + ' - ' + data.nisn,
                                id: data.nisn

                            }
                        })
                    }
                },
            }
        }).on('select2:select', function (e) {
            var data = e.params.data;
            $('.section-data').show();
            $('.section-form').show();
            $('.section-nama').val(data.id);
        }).on('select2:unselect', function (e) {
            var data = e.params.data;
            $('.section-data').hide();
            $('.section-form').hide();
            $('.section-nama').val(data.id);
        });
        $('.input-daterange').datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
        });
        $(document).on('change', '.tanggal-awal', function () {
            var tglAwal = moment(this.value,'DD-MM-YYYY').format('YYYY-MM-DD');
            var hasil = moment(tglAwal).add(6, 'days').format('DD-MM-YYYY');
            console.warn({tglAwal,hasil});
            $('.tanggal-kembali').val(hasil);
        });
    })

</script>

@endsection
