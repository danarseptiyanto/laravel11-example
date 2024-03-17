<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class HomepageController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $karyawanGuru = Karyawan::query()
        ->when($search, function ($query, $search) {
            return $query->where('status', 'Guru')
                        ->where('nama', 'like', '%' . $search . '%')
                        ->orWhere('status', 'like', '%' . $search . '%');
                         
        })
        ->where('status', 'Guru')
        ->get();
        
        $search = $request->input('search');
        $karyawanStaff = Karyawan::query()
        ->when($search, function ($query, $search) {
            return $query->where('status', 'Staff')
                        ->where('nama', 'like', '%' . $search . '%')
                        ->orWhere('status', 'like', '%' . $search . '%');
        })
        ->where('status', 'Staff')
        ->get();

        $search = $request->input('search');
        $karyawanMutasi = Karyawan::query()
        ->when($search, function ($query, $search) {
            return $query->where('status', 'Mutasi')
                        ->where('nama', 'like', '%' . $search . '%')
                        ->orWhere('status', 'like', '%' . $search . '%');
        })
        ->where('status', 'Mutasi')
        ->get();

        return view('homepage', compact('karyawanGuru', 'karyawanStaff', 'karyawanMutasi', 'search'));
    }
}






















// class HomepageController extends Controller
// {
//     public function index()
//     {
//         $karyawans = Karyawan::all();
//         return view('homepage', compact('karyawans'));
//     }
// }