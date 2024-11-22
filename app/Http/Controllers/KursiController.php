<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kursi;

class KursiController extends Controller
{
    public function listDataKursi(Request $request)
    {
        $idJadwal = $request->input('idJadwal');
        $kursi = Kursi::where('Id_Jadwal', $idJadwal)->where('Status_Pemesanan', 0)->get();

        return response()->json($kursi);
    }
}
