<?php

namespace App\Http\Controllers;

use App\Imports\SiswaImport;
use App\Models\BukuModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\SiswaModel;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Calculation\LookupRef\ExcelMatch;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function siswa()
    {
        $data = SiswaModel::all();
        return view('admin.siswa.data', compact('data'));
    }
    
    public function store(Request $request)
    {
        SiswaModel::insert([
            'nama' => $request->nama,
            'nisn' => $request->nisn,
            'kelas' => $request->kelas,
            'kelamin' => $request->kelamin,
            'seluler' => $request->seluler,
            'alamat' => $request->alamat
        ]);
        Alert::success('Success', 'Tambah Data Siswa Succes!');
        return redirect()->route('datasiswa');
    }

    public function show($id)
    {
        $data = SiswaModel::where('id',$id)->get();
        return view('admin.siswa.edit', compact('data'));
    }
    public function detail($id)
    {
        $data = SiswaModel::where('id',$id)->get();
        return view('admin.siswa.detail', compact('data'));
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
        SiswaModel::where('id', $request->id )
        ->update([
            'nama' => $request->nama,
            'nisn' => $request->nisn,
            'kelas' => $request->kelas,
            'kelamin' => $request->kelamin,
            'seluler' => $request->seluler,
            'alamat' => $request->alamat
        ]);
        Alert::success('Success', 'Simpan Data Siswa Berhasil!');
        return redirect()->route('datasiswa');
    }

    public function destroy($id)
    {
        SiswaModel::where('id', $id)->delete();
        Alert::error('Delete', 'Delete Succes!');
        return redirect()->route('datasiswa');
    }

    public function destroy_siswa_all()
    {
        SiswaModel::truncate();
        Alert::error('Delete', 'Delete All Siswa Succes!');
        return redirect()->route('datasiswa');
    }

    public function import(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);
        $file = $request->file('file');
        $nama_file = rand() . $file->getClientOriginalName();
        $file->move('file_import', $nama_file);
        Excel::import(new SiswaImport, public_path('/file_import/' . $nama_file));
        Alert::success('Success', 'Import Data Siswa Succes!');
        return redirect()->route('datasiswa');
    }
}
