<?php

namespace App\Http\Controllers;

use App\Imports\BukuImport;
use App\Models\BukuModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Maatwebsite\Excel\Facades\Excel;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::select('select * from buku');
        return view('admin.buku.data', compact('data'));
    }

    public function store(Request $request)
    {
        BukuModel::insert([
            'seri_buku' => $request->seri_buku,
            'tahun_anggaran' => $request->tahun_anggaran,
            'judul' => $request->judul,
            'nomer_klasifikasi' => $request->nomer_klasifikasi,
            'kondisi' => $request->kondisi,
            'kategori' => $request->kategori,
            'status' => 'Ada'
        ]);
        Alert::success('Success', 'Tambah Data Buku Succes!');
        return redirect()->route('databuku');
    }

    public function show($id)
    {
        $data = BukuModel::where('id',$id)->get();
        return view('admin.buku.edit', compact('data'));
    }
    public function detail($id)
    {
        $data = BukuModel::where('id',$id)->get();
        return view('admin.buku.detail', compact('data'));
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
        BukuModel::where('id', $request->id )
        ->update([
            'seri_buku' => $request->seri_buku,
            'tahun_anggaran' => $request->tahun_anggaran,
            'judul' => $request->judul,
            'nomer_klasifikasi' => $request->nomer_klasifikasi,
            'kondisi' => $request->kondisi,
            'kategori' => $request->kategori,
            'status' => $request->status
        ]);
        Alert::success('Success', 'Simpan Data Buku Berhasil!');
        return redirect()->route('databuku');
    }

    public function destroy($id)
    {
        BukuModel::where('id', $id)->delete();
        Alert::error('Delete', 'Delete Succes!');
        return redirect()->route('databuku');
    }

    public function destroy_buku_all()
    {
        BukuModel::truncate();
        Alert::error('Delete', 'Delete All Buku Succes!');
        return redirect()->route('databuku');
    }

    public function import(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);
        $file = $request->file('file');
        $nama_file = rand() . $file->getClientOriginalName();
        $file->move('file_import', $nama_file);
        Excel::import(new BukuImport, public_path('/file_import/' . $nama_file));
        Alert::success('Success', 'Import Data Buku Succes!');
        return redirect()->route('databuku');
    }
}
