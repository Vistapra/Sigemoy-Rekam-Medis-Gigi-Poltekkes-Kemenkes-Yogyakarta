<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    public function index()
    {
        $datas = User::where('role', '!=', 3)->get();
        return view('petugas.index', compact('datas'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'phone' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'role' => 'required'
        ]);

        try {
            $validatedData['password'] = Hash::make($validatedData['password']);
            User::create($validatedData);

            return redirect()->route('petugas')->with('sukses', 'Data berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->route('petugas')->with('gagal', 'Data gagal ditambahkan: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable',
            'role' => 'required'
        ]);

        try {
            $user = User::findOrFail($id);

            if ($request->filled('password')) {
                $validatedData['password'] = Hash::make($validatedData['password']);
            } else {
                unset($validatedData['password']);
            }

            $user->update($validatedData);

            return redirect()->route('petugas')->with('sukses', 'Data berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->route('petugas')->with('gagal', 'Data gagal diperbarui: ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();
            return redirect()->route('petugas')->with('sukses', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->route('petugas')->with('gagal', 'Data gagal dihapus: ' . $e->getMessage());
        }
    }
}