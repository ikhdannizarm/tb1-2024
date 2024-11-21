@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Pilih Kursi</h2>
    <p>Pilih kursi yang tersedia pada jadwal keberangkatan yang Anda pilih.</p>

    <div class="legend">
        <div class="legend-item">
            <span class="seat available"></span> Tersedia
        </div>
        <div class="legend-item">
            <span class="seat selected"></span> Dipilih
        </div>
        <div class="legend-item">
            <span class="seat taken"></span> Terisi
        </div>
    </div>

    <form action="{{ route('pesan.konfirmasi') }}" method="POST">
        @csrf
        <input type="hidden" name="Id_Jadwal" value="{{ $Id_Jadwal }}">

        <div class="bus-layout">
            @foreach($kursi as $seat)
                <label class="seat {{ $seat->Status_Pemesanan ? 'taken' : 'available' }}">
                    <input type="checkbox" name="kursi[]" value="{{ $seat->Id_Kursi }}" {{ $seat->Status_Pemesanan ? 'disabled' : '' }}>
                    <span>{{ $seat->Nomor_Kursi }}</span>
                </label>
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary">Lanjutkan Pemesanan</button>
    </form>
</div>

<style>
    .container {
        max-width: 600px;
        margin: 0 auto;
    }

    /* Legend Styles */
    .legend {
        display: flex;
        gap: 20px;
        margin-bottom: 20px;
    }
    .legend-item {
        display: flex;
        align-items: center;
        gap: 5px;
    }
    .legend-item span {
        width: 20px;
        height: 20px;
        display: inline-block;
    }
    
    /* Bus Layout Styles */
    .bus-layout {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 10px;
        margin-top: 20px;
    }
    .seat {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        background-color: #e0e0e0;
        border-radius: 5px;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    .seat input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
    }
    .seat.available {
        background-color: #4CAF50;
    }
    .seat.taken {
        background-color: #ccc;
        cursor: not-allowed;
    }
    .seat input:checked + span {
        background-color: #FF9800;
        color: white;
        border-radius: 5px;
    }

    /* Hover and Selected Styles */
    .seat.available:hover {
        background-color: #66BB6A;
    }
</style>
@endsection
