<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Rekam;
use App\Models\Dokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DokterController extends Controller
{
    public function index()
    {
        $datas = Dokter::all();
        return view('dokter.index', compact('datas'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'no_hp' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'nip' => 'nullable',
            'alamat' => 'nullable',
        ]);

        try {
            DB::transaction(function () use ($validatedData) {
                $user = User::create([
                    'name' => $validatedData['nama'],
                    'phone' => $validatedData['no_hp'],
                    'email' => $validatedData['email'],
                    'password' => Hash::make($validatedData['password']),
                    'role' => 3,
                ]);

                Dokter::create([
                    'nip' => $validatedData['nip'],
                    'nama' => $validatedData['nama'],
                    'no_hp' => $validatedData['no_hp'],
                    'alamat' => $validatedData['alamat'],
                    'user_id' => $user->id,
                ]);
            });

            return redirect()->route('dokter')->with('sukses', 'Data berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->route('dokter')->with('gagal', 'Data gagal ditambahkan: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {


        $dokter = Dokter::findOrFail($id);

        $validatedData = $request->validate([
            'nama' => 'required',
            'no_hp' => 'required',
            'email' => 'required|email|unique:users,email,' . $dokter->user_id,
            'nip' => 'nullable',
            'alamat' => 'nullable',
        ]);

        try {
            DB::transaction(function () use ($dokter, $validatedData) {
                $dokter->update([
                    'nip' => $validatedData['nip'],
                    'nama' => $validatedData['nama'],
                    'no_hp' => $validatedData['no_hp'],
                    'alamat' => $validatedData['alamat'],
                ]);

                $dokter->user->update([
                    'name' => $validatedData['nama'],
                    'phone' => $validatedData['no_hp'],
                    'email' => $validatedData['email'],
                ]);
            });

            return redirect()->route('dokter')->with('sukses', 'Data berhasil diperbaharui');
        } catch (\Exception $e) {
            return redirect()->route('dokter')->with('gagal', 'Data gagal diperbaharui: ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        $dokter = Dokter::findOrFail($id);

        if (Rekam::where('user_id', $dokter->user_id)->exists()) {
            return redirect()->route('dokter')->with('sukses', 'Data dokter di non aktifkan');
        }

        try {
            DB::transaction(function () use ($dokter) {
                $dokter->user->delete();
                $dokter->delete();
            });

            return redirect()->route('dokter')->with('sukses', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->route('dokter')->with('gagal', 'Data gagal dihapus: ' . $e->getMessage());
        }
    }

    public function getDokter(Request $request)
    {
        $data = Dokter::where('user_id', $request->id)->firstOrFail();
        return response()->json(['success' => true, 'data' => $data]);
    }

    public function updatePassword(Request $request, $id)
    {
        $validatedData = $request->validate([
            'password' => 'required',
            'password_konfirm' => 'required_with:password|same:password'
        ]);

        try {
            $user = User::findOrFail($id);
            $user->update([
                'password' => Hash::make($validatedData['password']),
            ]);

            return redirect()->route('dokter')->with('sukses', 'Password berhasil diperbaharui');
        } catch (\Exception $e) {
            return redirect()->route('dokter')->with('gagal', 'Password gagal diperbaharui: ' . $e->getMessage());
        }
    }
}