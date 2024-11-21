@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Jadwal Keberangkatan</h2>
    <p>Pilih jadwal keberangkatan yang tersedia pada tanggal yang dipilih.</p>
    <ul>
        @foreach($jadwals as $jadwal)
            <li>
                {{ $jadwal->Waktu_Pemberangkatan }} - {{ $jadwal->Waktu_Tiba }}
                <a href="{{ route('pesan.pilihKursi', ['Id_Jadwal' => $jadwal->Id_Jadwal]) }}">Pilih Kursi</a>
            </li>
        @endforeach
    </ul>
</div>
@endsection
