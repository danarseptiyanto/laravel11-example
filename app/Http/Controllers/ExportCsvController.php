<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ExportCsvController extends Controller
{
    public function export(Request $request)
    {
        $status = $request->status;
        $karyawans = Karyawan::query()->where('status', $status)->get();
        $csvFileName = $status . '.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $csvFileName . '"',
        ];

        $handle = fopen('php://output', 'w');
        fputcsv($handle, ['Daftar ' . $status . ' SMK Something 01 Surakarta']);
        fputcsv($handle, ['']);
        fputcsv($handle, ['No', 'Nama', 'Status','Jabatan', 'Tempat, Tanggal lahir', 'Alamat', 'Mapel', 'NIY', 'Tanggal Masuk']);

        foreach ($karyawans as $index => $karyawan) {
            fputcsv($handle,[
                                $index + 1,
                                $karyawan->nama,
                                $karyawan->status,
                                $karyawan->jabatan,
                                $karyawan->ttl,
                                $karyawan->alamat,
                                $karyawan->mapel,
                                $karyawan->niy,
                                $karyawan->tglmasuk,
                                // $karyawan->ijazah,
                            ]);
        }

        fclose($handle);

        return Response::make('', 200, $headers);
    }
}
