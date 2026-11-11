<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $pelanggan = Pelanggan::all();

        return view('home', compact('pelanggan'));
    }

    public function create()
    {
        return view('tambah-pelanggan');//Return view Tambah-pelanggan
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:pelanggan,email',
            'telepon' => 'required',
            'alamat' => 'required',
            'level_member' => 'required',
        ]);

        Pelanggan::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
            'level_member' => $request->level_member,
            'dibuat_pada' => now(),
        ]);

        return redirect('/')->with('success', 'Pelanggan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);

        return view('edit-pelanggan', compact('pelanggan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:pelanggan,email,' . $id,
            'telepon' => 'required',
            'alamat' => 'required',
            'level_member' => 'required',
        ]);

        $pelanggan = Pelanggan::findOrFail($id);

        $pelanggan->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
            'level_member' => $request->level_member,
        ]);

        return redirect('/')->with('success', 'Data pelanggan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();//delete $Pelanggan

        return redirect('/')->with('success', 'Data pelanggan berhasil dihapus!');
    }
}
