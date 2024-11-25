@extends('layouts.app')

@section('style')
    <style>
        .container.pesanan-saya {
            padding: 40px;
            /* Padding normal */
        }

        .pesanan-saya h1 {
            font-size: 2.5em;
            color: #006400;
            /* Warna hijau untuk judul */
            margin-bottom: 30px;
            text-align: center;
        }

        /* Styling card untuk pesanan */
        .pesanan-card {
            background-color: #f9f9f9;
            /* Warna latar belakang card */
            border-radius: 10px;
            /* Sudut membulat */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            /* Bayangan card */
            padding: 20px;
            margin-bottom: 20px;
            transition: transform 0.3s ease;
            /* Animasi saat hover */
        }

        .pesanan-card:hover {
            transform: translateY(-5px);
            /* Gerakan ke atas saat hover */
        }

        .pesanan-card li {
            list-style-type: none;
            /* Menghapus bullet list */
            font-size: 1.1em;
            line-height: 1.6;
            color: #333;
        }

        .pesanan-card .label {
            font-weight: bold;
            color: #006400;
        }

        /* Styling untuk harga total */
        .total-harga {
            font-weight: bold;
            color: #d9534f;
            /* Warna merah untuk menonjolkan harga */
            font-size: 1.2em;
        }
    </style>
@endsection

@section('content')
    <div class="container pesanan-saya">
        <h1>Pesanan Saya</h1>

        @foreach ($pemesanan as $order)
            <div class="pesanan-card">
                <ul>
                    <li>
                        <span class="label">Tanggal:</span> {{ $order->Tanggal_Pemesanan }}<br>
                        <span class="label">Jadwal:</span> {{ $order->jadwal->Waktu_Pemberangkatan }} -
                        {{ $order->jadwal->Waktu_Tiba }}<br>
                        <span class="label">Kursi:</span>

                        @foreach ($order->kursis as $kursi)
                            {{ $kursi->Nomor_Kursi }}
                            @if (!$loop->last)
                                ,
                            @endif
                        @endforeach

                        <br>

                        <span class="label total-harga">Total Harga:
                            Rp{{ number_format($order->Total_Harga, 0, ',', '.') }}</span>
                    </li>
                </ul>
            </div>
        @endforeach
    </div>
@endsection
