<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function index($id)
    {
        $karyawan = Karyawan::find($id);
        return view('edit', compact('karyawan'));
    }
    public function store(Request $request, $id)
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
        $karyawan = Karyawan::findOrFail($id);
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $namaFoto = time() . '_' . $foto->getClientOriginalName();
            $foto->move(public_path('img'), $namaFoto);
            if ($karyawan->foto && $karyawan->foto !== 'img1.jpg' && file_exists(public_path('img/' . $karyawan->foto))) {
                unlink(public_path('img/' . $karyawan->foto));
            }
        } else {
            $namaFoto = $karyawan->foto;
        }
        $karyawan->update([
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
        return redirect()->route('homepage')->with('success', 'Karyawan Berhasil Diubah');
    }
}
