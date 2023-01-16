<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function siswa()
    {
        return view('siswa.home');
    }
    public function admin()
    {
        return view('admin.home');
    }
    public function guru()
    {
        return view('guru.home');
    }

    //Ganti Password
    public function ganti_password()
    {
        $id = Auth::user()->id;
        $data = DB::table('users')->select('users.*')
            ->where('users.id', $id)
            ->get();
        return view('/admin/changepassword', compact('data'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
   
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        Alert::success('Succes', 'Change Password Succes');
        return redirect()->route('admin');
    }

    //Ganti Password Guru
    public function ganti_password3()
    {
        $id = Auth::user()->id;
        $data = DB::table('users')->select('users.*')
            ->where('users.id', $id)
            ->get();
        return view('guru/changepassword', compact('data'));
    }

    public function update3(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
   
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        Alert::success('Succes', 'Change Password Succes');
        return redirect()->route('guru');
    }
}
