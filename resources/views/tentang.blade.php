@extends('layouts.app')

@section('content')
<style>
    /* Styling khusus untuk halaman "Tentang Ngulisik" */

    .container.tentang {
        margin-top: 80px;
        padding: 40px; /* Padding normal */
        background-color: #f9f9f9; /* Warna latar belakang lembut */
        border-radius: 8px; /* Sudut membulat */
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); /* Bayangan halus */
    }

    .tentang h1 {
        font-size: 2.5em;
        color: #006400; /* Warna hijau untuk judul */
        margin-bottom: 20px;
        text-align: center; /* Pusatkan judul */
    }

    .tentang p {
        font-size: 1.1em;
        line-height: 1.6;
        color: #333; /* Warna teks gelap */
        text-align: justify; /* Justifikasi teks */
        margin-bottom: 20px;
    }

    .tentang .highlight {
        font-weight: bold;
        color: #006400;
    }

    /* Tombol Pesan Sekarang */
    .tentang .btn-discover {
        display: inline-block;
        padding: 10px 20px;
        background-color: #006400;
        color: #fff;
        border: none;
        border-radius: 5px;
        text-align: center;
        text-decoration: none;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    .tentang .btn-discover:hover {
        background-color: #004d00; /* Warna lebih gelap saat hover */
    }
</style>

<div class="container tentang">
    <h1>Tentang Ngulisik</h1>
    <p>
        <span class="highlight">Ngulisik</span> adalah layanan bus wisata di Tasikmalaya yang menyediakan transportasi nyaman dan aman bagi wisatawan yang ingin menjelajahi keindahan kota ini. Dengan pelayanan yang ramah dan fasilitas yang lengkap, Ngulisik hadir untuk memberikan pengalaman perjalanan yang tak terlupakan.
    </p>
    <p>
        Kami memahami bahwa kenyamanan dan keamanan adalah prioritas utama dalam berwisata. Oleh karena itu, kami berkomitmen untuk selalu menjaga kualitas pelayanan kami agar wisatawan merasa puas dan kembali lagi.
    </p>
    <a href="/booking" class="btn-discover">Pesan Sekarang</a>
</div>
@endsection
