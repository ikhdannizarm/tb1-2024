@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="title">Konfirmasi Pemesanan</h2>

    @if($pemesanan)
        <div class="confirmation-message">
            <p>Terima kasih! Pemesanan Anda telah berhasil.</p>
            <ul class="order-details">
                <li><strong>ID Pemesanan:</strong> {{ $pemesanan->Id_Pemesanan }}</li>
                <li><strong>Jadwal:</strong> {{ $pemesanan->jadwal->Waktu_Pemberangkatan }}</li>
                <li><strong>Nomor Kursi:</strong> {{ $pemesanan->kursi->Nomor_Kursi }}</li>
                <li><strong>Tanggal Pemesanan:</strong> {{ $pemesanan->Tanggal_Pemesanan }}</li>
                <li><strong>Total Harga:</strong> Rp {{ number_format($pemesanan->Total_Harga, 0, ',', '.') }}</li>
            </ul>
        </div>
    @else
        <p class="error-message">Tidak ada pemesanan yang ditemukan.</p>
    @endif
</div>

{{-- Inline CSS for styling --}}
@section('styles')
<style>
    .container {
        margin-top: 30px;
    }

    .title {
        text-align: center;
        font-size: 24px;
        color: #4CAF50;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .confirmation-message {
        background-color: #f4f4f9;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .order-details {
        list-style-type: none;
        padding: 0;
    }

    .order-details li {
        margin-bottom: 10px;
        font-size: 18px;
    }

    .order-details li strong {
        color: #333;
    }

    .error-message {
        color: red;
        font-size: 18px;
        text-align: center;
    }
</style>
@endsection

@endsection
