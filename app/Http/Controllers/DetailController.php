<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index($id)
    {
        $karyawan = Karyawan::find($id);
        return view('detail', compact('karyawan'));
    }
    public function delete($id) {
        $karyawan = Karyawan::find($id);
        $karyawan->delete();
        return redirect()->route('homepage')->with('success', 'Karyawan berhasil dihapus');
    }
}
