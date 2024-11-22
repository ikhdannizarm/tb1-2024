<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Kursi;
use App\Models\Pemesanan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TiketController extends Controller
{
    public function index()
    {
        return view('home');
    }

    // 1. Halaman memilih tanggal di kalender
    public function pilihTanggal()
    {
        return view('pesan.pilihTanggal');
    }

    // 2. Menampilkan waktu pemberangkatan sesuai tanggal yang dipilih
    public function pilihJadwal(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date|after_or_equal:today'
        ]);

        $tanggal = $request->input('tanggal');
        $jadwals = Jadwal::whereDate('Waktu_Pemberangkatan', $tanggal)->get();

        if ($jadwals->isEmpty()) {
            return redirect()->back()->with('error', 'Tidak ada jadwal untuk tanggal yang dipilih.');
        }

        return view('pesan.Jadwal', compact('jadwals', 'tanggal'));
    }

    // 3. Menampilkan layout bus untuk memilih kursi berdasarkan jadwal yang dipilih
    public function pilihKursi($Id_Jadwal)
    {
        $jadwal = Jadwal::findOrFail($Id_Jadwal);
        $kursi = Kursi::where('Id_Jadwal', $Id_Jadwal)->where('Status_Pemesanan', 'tersedia')->get();

        if ($kursi->isEmpty()) {
            return redirect()->route('pilihTanggal')->with('error', 'Semua kursi untuk jadwal ini telah dipesan.');
        }

        return view('pesan.pilihKursi', compact('jadwal', 'kursi', 'Id_Jadwal'));
    }

    // 4. Menyimpan pemesanan kursi setelah user memilih kursi
    public function pesanKursi(Request $request)
    {
        $request->validate([
            'kursi' => 'required|array|min:1',
            'kursi.*' => 'exists:kursi,Id_Kursi',
            'id_jadwal' => 'required'
        ]);


        try {
            DB::beginTransaction();

            $kursiIds = $request->input('kursi');
            $Id_Jadwal = $request->input('id_jadwal');

            // Verifikasi ketersediaan kursi yang dipilih
            $selectedKursi = Kursi::whereIn('Id_Kursi', $kursiIds)
                ->where('Status_Pemesanan', '0')
                ->lockForUpdate()
                ->get();

            if (count($selectedKursi) != count($kursiIds)) {
                throw new \Exception('Beberapa kursi yang dipilih telah dipesan. Silakan pilih kursi lain.');
            }

            $totalHarga = 10000 * count($kursiIds);

            // Menyimpan pemesanan kursi
            foreach ($selectedKursi as $kursi) {
                $kursi->Status_Pemesanan = '1';
                $kursi->save();

                Pemesanan::create([
                    'user_id' => Auth::id(),
                    'Id_Jadwal' => $Id_Jadwal,
                    'Id_Kursi' => $kursi->Id_Kursi,
                    'Tanggal_Pemesanan' => Carbon::now(),
                    'Total_Harga' => $totalHarga
                ]);
            }

            DB::commit();

            return redirect()->route('pesan.konfirmasi')->with('success', 'Pemesanan berhasil.');
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('error : ' . $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function tentang()
    {
        return view('tentang');
    }

    // 5. Halaman untuk melihat riwayat pesanan pengguna
    public function pesanan()
    {
        $pemesanan = Pemesanan::where('user_id', Auth::id())->get();
        return view('pesan.pesanan', compact('pemesanan'));
    }

    // 6. Halaman konfirmasi untuk menampilkan struk pembelian setelah pemesanan
    public function konfirmasi()
    {
        $pemesanan = Pemesanan::where('user_id', Auth::id())
            ->orderBy('Tanggal_Pemesanan', 'desc')
            ->with(['jadwal', 'kursi'])
            ->first();

        if (!$pemesanan) {
            return redirect()->route('pesan.pesanan')->with('error', 'Tidak ada pemesanan yang ditemukan.');
        }

        return view('pesan.konfirmasi', compact('pemesanan'));
    }
}
