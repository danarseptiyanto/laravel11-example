<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function index()
    {
        return view('create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama'=> 'required',
            'jabatan'=> 'required',
            'ttl'=> 'required',
            'status'=> 'required',
            'alamat'=> 'required',
            'mapel'=> 'required',
            'ijazah'=> 'required',
            'niy'=> 'required',
            'tglmasuk'=> 'required',
            'tglmutasi'=> 'required',
            'foto'=> 'image|mimes:jpeg,jpg,png,webp|max:2048',
        ]);
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $namaFoto = time() . '_' . $foto->getClientOriginalName();
            $foto->move(public_path('img'), $namaFoto);
        } else {
            $namaFoto = 'img1.jpg';
        }
        Karyawan::create([
            'nama'=> $request->nama,
            'jabatan'=> $request->jabatan,
            'ttl'=> $request->ttl,
            'status'=> $request->status,
            'alamat'=> $request->alamat,
            'mapel'=> $request->mapel,
            'ijazah'=> $request->ijazah,
            'niy'=> $request->niy,
            'tglmasuk'=> $request->tglmasuk,
            'tglmutasi' => $request->tglmutasi,
            'foto' => $namaFoto,
        ]);
        return redirect()->route('homepage')->with('success', 'Karyawan Berhasil Ditambahkan');
    }
}
