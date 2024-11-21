@extends('layouts.app')

@section('content')
<style>
    /* Styling khusus hanya untuk halaman pilihTanggal */
    #pilihTanggal {
        background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
        padding: 80px 0;
        color: #2c3e50;
    }

    #pilihTanggal .container {
        background-color: #ffffff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        max-width: 450px;
        margin: auto;
    }

    #pilihTanggal h2 {
        font-family: 'Merriweather', serif;
        color: #2c3e50;
        font-weight: 700;
    }

    #pilihTanggal p {
        color: #7f8c8d;
    }

    #pilihTanggal .btn-primary {
        background-color: #3498db;
        border-color: #3498db;
        color: #fff;
        transition: background-color 0.3s ease;
    }

    #pilihTanggal .btn-primary:hover {
        background-color: #2980b9;
        border-color: #2980b9;
    }

    /* Spasi untuk elemen form */
    #pilihTanggal .form-group {
        margin-top: 20px;
    }
</style>

<div id="pilihTanggal">
    <div class="container text-center">
        <h2>Pilih Tanggal Keberangkatan</h2>
        <p>Temukan jadwal perjalanan bus wisata Ngulisik yang tersedia.</p>
        <form action="{{ route('pesan.jadwal') }}" method="GET">
            <div class="form-group">
                <label for="tanggal" class="form-label">Pilih Tanggal:</label>
                <input type="date" id="tanggal" name="tanggal" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary mt-4">Lihat Jadwal</button>
        </form>
    </div>
</div>
@endsection
