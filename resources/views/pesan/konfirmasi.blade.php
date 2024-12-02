@extends('layouts.app')

@section('style')
    <style>
        .title {
            text-align: center;
            font-size: 24px;
            color: #4CAF50;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .confirmation-message {
            background-color: #ffffff;
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

@section('content')
    <div class="container my-10 max-w-[700px]">
        <div class="confirmation-message">
            <h1 class="font-bold text-2xl mb-2">Invoice Pemesanan</h1>
            <hr class="mb-3 border-[#7f8c8d]">
            @if ($pemesanan)
                <div class="flex justify-between mx-2 mb-3">
                    <div class="flex flex-col gap-2">
                        <p class="font-semibold text-secondary">ID Pemesanan</p>
                        <p>{{ $pemesanan->Id_Pemesanan }}</p>
                    </div>
                    <div class="flex flex-col gap-2">
                        <p class="font-semibold text-secondary">Tanggal Pemesanan</p>
                        <p>{{ $pemesanan->Tanggal_Pemesanan }}</p>
                    </div>
                </div>
                <div class="flex justify-between mx-2 mb-3">
                    <div class="flex flex-col gap-2">
                        <p class="font-semibold text-secondary">Nomor Kursi</p>
                        <p>{{ $pemesanan->kursi->Nomor_Kursi }}</p>
                    </div>
                    <div class="flex flex-col gap-2">
                        <p class="font-semibold text-secondary">Waktu Berangkat</p>
                        <p>{{ $pemesanan->jadwal->Waktu_Pemberangkatan }}</p>
                    </div>
                </div>
                <hr>
                <div class="flex justify-between mx-2 mt-3 mb-10">
                    <div class="flex flex-col gap-2">
                        <p class="font-semibold text-secondary">Total Harga</p>
                        <p class="font-bold">Rp {{ number_format($pemesanan->Total_Harga, 0, ',', '.') }}</p>
                    </div>
                </div>
                <a class="btn btn-primary" href="{{ route('home') }}">Ke Halaman Beranda</a>
            @else
                <p class="error-message">Tidak ada pemesanan yang ditemukan.</p>
            @endif
        </div>
    </div>
@endsection
