<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;

class JadwalController extends Controller
{
    public function list(Request $request)
    {
        $tanggal = $request->input('tanggal');
        $jadwal = Jadwal::whereDate('Waktu_Pemberangkatan', $tanggal)->get();

        return view('jadwal', compact('jadwal', 'tanggal'));
    }

    public function listDataJadwal(Request $request)
    {
        $tanggal = $request->input('date');
        $jadwalList = Jadwal::whereDate('tanggal', $tanggal)->get();

        return response()->json($jadwalList);
    }
}
