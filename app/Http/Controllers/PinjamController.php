<?php

namespace App\Http\Controllers;

use App\Models\BukuModel;
use App\Models\PinjamModel;
use App\Models\SiswaModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;
use App;

class PinjamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = SiswaModel::all();
        $buku = BukuModel::all();
        $data = DB::table('pinjam as p')
        ->join('siswa as s', 'p.id_siswa', '=', 's.nisn')
        ->join('buku as b', 'p.id_buku', '=', 'b.id')
        ->select('p.*', 's.nisn as siswa', 'b.judul as buku')
        ->orderBy('p.id')
        ->get();
        return view('admin.pinjam.data', compact('data' , 'siswa' , 'buku' ));
    }

    public function store(Request $request)
    {
        PinjamModel::insert([
            'id_siswa' => $request->id_siswa,
            'id_buku' => $request->id_buku,
            'tgl_pinjam' => $request->tgl_pinjam,
            'tgl_kembali' => $request->tgl_kembali,
        ]);
        BukuModel::where('id', $request->id_buku )
        ->update([
            'status' => 'Di Pinjam'
        ]);
        Alert::success('Success', 'Tambah Data Pinjam Succes!');
        return redirect()->route('datapinjam');
    }

    public function peminjaman()
    {
        $siswa = SiswaModel::all();
        $buku = BukuModel::all()->where('status', 'LIKE', 'Ada');
        return view('siswa.peminjaman', compact('siswa', 'buku'));
    }

    public function save_peminjaman(Request $request)
    {
        PinjamModel::insert([
            'id_siswa' => $request->id_siswa,
            'id_buku' => $request->id_buku,
            'tgl_pinjam' => date('Y-m-d', strtotime($request->tgl_pinjam)),
            'tgl_kembali' => date('Y-m-d', strtotime($request->tgl_kembali))
        ]);
        BukuModel::where('id', $request->id_buku )
        ->update([
            'status' => $request->status
        ]);
        Alert::success('Success', 'Simpan Data Pinjam Berhasil!');
        $data = DB::table('pinjam as p')
        ->join('siswa as s', 'p.id_siswa', '=', 's.nisn')
        ->join('buku as b', 'p.id_buku', '=', 'b.id')
        ->select('p.*', 's.nisn as nisn', 's.nama as nama', 's.seluler as seluler', 'b.judul as judul')
        ->where('p.id_siswa', $request->id_siswa)
        ->where('p.id_buku', $request->id_buku)
        ->orderBy('p.id', 'desc')
        ->limit(1)
        ->get();
        
        $pdf = PDF::loadView('tiket_pdf', [
            'data' => $data
        ]);
        return $pdf->download('Perpustakaan — SMPN 59 SURABAYA.pdf');
    }

    public function show($id)
    {
        $siswa = SiswaModel::all();
        $buku = BukuModel::all();
        $data = DB::table('pinjam as p')
        ->join('siswa as s', 'p.id_siswa', '=', 's.nisn')
        ->join('buku as b', 'p.id_buku', '=', 'b.id')
        ->select('p.*', 's.nisn as nisn', 's.nama as nama', 'b.judul as buku', 'b.status as status')
        ->where('p.id', $id)
        ->get();
        return view('admin.pinjam.edit', compact('data' , 'siswa' , 'buku' ));
    }
    public function detail($id)
    {
        $data = DB::table('pinjam as p')
        ->join('siswa as s', 'p.id_siswa', '=', 's.nisn')
        ->join('buku as b', 'p.id_buku', '=', 'b.id')
        ->select('p.*', 's.nisn as nisn', 's.nama as nama', 'b.judul as buku', 'b.status as status')
        ->where('p.id', $id)
        ->get();
        return view('admin.pinjam.detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {
        PinjamModel::where('id', $request->id )
        ->update([
            'id_siswa' => $request->id_siswa,
            'id_buku' => $request->id_buku,
            'tgl_pinjam' => $request->tgl_pinjam,
            'tgl_kembali' => $request->tgl_kembali,
        ]);
        BukuModel::where('id', $request->id_buku )
        ->update([
            'status' => $request->status
        ]);
        Alert::success('Success', 'Simpan Data Pinjam Berhasil!');
        return redirect()->route('datapinjam');
    }

    public function destroy($id)
    {
        $idbuku = PinjamModel::all()->where('id', $id)->first();
        DB::table('buku')->where('id', $idbuku->id_buku)->update([
            'status' => 'Ada'
        ]);
        PinjamModel::where('id', $id)->delete();
        Alert::error('Delete', 'Delete Succes!');
        return redirect()->route('datapinjam');
    }

    public function destroy_pinjam_all()
    {
        PinjamModel::truncate();
        BukuModel::all()
        ->update([
            'status' => 'Ada'
        ]);
        Alert::error('Delete', 'Delete All Data Succes!');
        return redirect()->route('datapinjam');
    }

    public function getDataNisn(Request $request){
        $sql = "select * from siswa where 1=1";
        if(isset($request->q)){
            $sql .= " and nisn Like '%$request->q%'  or nama LIKE '%$request->q%'";
        }
        $data = DB::select($sql);
        return $data;
    }

    public function print($id) {
        $data = DB::table('pinjam as p')
        ->join('siswa as s', 'p.id_siswa', '=', 's.nisn')
        ->join('buku as b', 'p.id_buku', '=', 'b.id')
        ->select('p.*', 's.nisn as nisn', 's.nama as nama', 's.seluler as seluler', 'b.judul as judul')
        ->where('p.id', $id)
        ->get();

        $pdf = PDF::loadView('tiket_pdf', [
            'data' => $data
        ]);
        return $pdf->download('Perpustakaan — SMPN 59 SURABAYA.pdf');
    }
}
