<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;

class AuthController extends Controller
{
    public function page_login()
    {
        return view('auth.login');
    }
    public function kader_kesehatan()
    {
        if (!Auth::check()) {
            return view('auth.login_kader_kesehatan');
        } else {
            return redirect('/dashboard');
        }
    }

    public function terapis_gigi()
    {
        if (!Auth::check()) {
            return view('auth.login_terapis_gigi');
        } else {
            return redirect('/dashboard');
        }
    }


    public function auth(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            switch ($user->role) {
                case 1: // Admin
                    return redirect('/dashboard')->with('sukses', 'Selamat, Anda berhasil masuk aplikasi');
                case 2: // KaderKesehatan
                case 3: // Dokter
                    return redirect()->route('pasien.add')->with('sukses', 'Selamat, Anda berhasil masuk aplikasi');
                default:
                    return redirect('/dashboard')->with('sukses', 'Selamat, Anda berhasil masuk aplikasi');
            }
        } else {
            return redirect()->back()->with('gagal', 'Mohon masukkan password dengan benar');
        }
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function password_baru($id)
    {
        $user = User::find($id);
        // dd($user);
        return view('newpassword', ['user' => $user, 'id' => $id]);
    }
    public function updatepassword(Request $request, $id)
    {
        $this->validate($request, [
            'password' => 'required|min:6',
            'password_konfirm' => 'required_with:password|same:password|min:6'
        ]);

        $password = bcrypt($request->password);
        User::where('id', $id)->update([
            'password' => $password,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        return redirect()->route('petugas')->with('sukses', 'Selamat, password anda sudah diperbaharui');
    }
}
