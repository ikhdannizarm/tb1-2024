@extends('layouts.app')

@section('style')
    <style>
        /* Styling khusus hanya untuk halaman pilihTanggal */
        .containerComponent {
            background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
            padding: 80px 0;
            color: #2c3e50;
            width: 100%;
        }

        #pilihTanggal .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            max-width: 750px;
            margin: auto;
        }

        #pilihTanggal h2 {
            color: #2c3e50;
            font-weight: 700;
            font-size: 24px;
            margin-bottom: 5px;
        }

        #pilihTanggal p {
            color: #7f8c8d;
        }

        /* Spasi untuk elemen form */
        #pilihTanggal .form-group {
            margin-top: 20px;
        }

        #pilihTanggal hr {
            border: 1px solid;
            border-color: #7f8c8d;
            margin-top: 10px;
        }

        #pilihTanggal .form-label {
            font-weight: 700;
            font-size: 14px;
        }

        .form-control {
            border-radius: 10px;
        }

        #pilihJadwal .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            max-width: 750px;
            margin: auto;
            margin-top: 20px;
        }

        #pilihJadwal h2 {
            color: #2c3e50;
            font-weight: 700;
            font-size: 24px;
            margin-bottom: 5px;
        }

        #pilihJadwal p {
            color: #7f8c8d;
        }

        #pilihJadwal hr {
            border: 1px solid;
            border-color: #7f8c8d;
            margin-top: 10px;
        }

        .cardJadwal:hover {
            border-color: green;
            cursor: pointer;
        }

        .cardJadwal.active {
            border-color: green;
        }

        #pilihKursi .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            max-width: 750px;
            margin: auto;
            margin-top: 20px;
        }

        #pilihKursi h2 {
            color: #2c3e50;
            font-weight: 700;
            font-size: 24px;
            margin-bottom: 5px;
        }

        #pilihKursi p {
            color: #7f8c8d;
        }

        #pilihKursi hr {
            border: 1px solid;
            border-color: #7f8c8d;
            margin-top: 10px;
        }

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
            transition: background-color 0.3s ease;
        }

        .seat input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
        }

        .seat.available {
            background-color: #4CAF50;
            color: white;
        }

        .seat.selected {
            background-color: #FF9800;
            color: white;
        }

        .seat.taken {
            background-color: #ccc;
        }

        .seat.available:hover {
            background-color: #66BB6A;
        }

        .seat input[type="checkbox"]:checked+span {
            background-color: #FF9800;
            /* Green background for checked state */
            color: white;
            font-weight: bold;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 5px;
        }

        .bus-layout {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
            margin-top: 20px;
            justify-items: center;
        }
    </style>
@endsection

@section('content')
    <div class="containerComponent">
        <div id="pilihTanggal">
            <div class="container">
                <h2>Pilih Tanggal Keberangkatan</h2>
                <p>Temukan jadwal perjalanan bus wisata Ngulisik yang tersedia.</p>
                <hr>
                <div>
                    <div class="form-group">
                        <label for="tanggal" class="form-label">Pilih Tanggal</label>
                        <input type="date" id="tanggal" name="tanggal" class="form-control">
                    </div>
                </div>
            </div>
        </div>

        <div id="pilihJadwal">
            <div class="container">
                <h2 class="text-center" id="beforeSearch">Pilih Tanggal Keberangkatan Terlebih Dahulu.</h2>
                <h2 class="text-center hidden text-danger" id="notFoundSearch">Jadwal Keberangkatan Tidak Ditemukan.</h2>
                <div class="hidden" id="foundSearch">
                    <h2>Pilih Jadwal Keberangkatan</h2>
                    <p>Pilih jadwal keberangkatan yang tersedia pada tanggal yang dipilih.</p>
                    <hr>
                    <div id="contentJadwal" class="mt-3">
                        {{-- Content Jadwal Will Append In this div --}}
                    </div>
                </div>
            </div>
        </div>

        <div id="pilihKursi" class="hidden">
            <div class="container">
                <h2 class="text-center hidden text-danger" id="notFoundKursi">Kursi Bus Pada Jadwal Keberangkatan Diatas
                    Tidak Ditemukan.</h2>
                <div id="foundKursi">
                    <h2>Pilih Kursi</h2>
                    <p>Pilih kursi yang tersedia pada jadwal keberangkatan yang Anda pilih.</p>
                    <hr>
                    <div class="mt-3">
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

                        <form action="{{ route('pesan.pilihKursi') }}" method="POST" class="mt-3">
                            <input type="hidden" name="id_jadwal" id="idJadwal">

                            @csrf
                            <div class="bus-layout mb-4" id="contentKursi">
                                {{-- Content Kursi Will Append In this div --}}
                            </div>

                            <button type="submit" class="btn btn-primary">Pesan Sekarang</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        // this function works to disabled past date
        $(function() {
            var dtToday = new Date();

            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();
            if (month < 10)
                month = '0' + month.toString();
            if (day < 10)
                day = '0' + day.toString();

            var maxDate = year + '-' + month + '-' + day;

            $('#tanggal').attr('min', maxDate);
        });

        $(document).ready(function() {
            // this trigger on change is works to get jadwal based on the date
            $('#tanggal').on('change', function() {
                $("#pilihKursi").addClass('hidden');
                $("#foundKursi").addClass('hidden');
                $("#notFoundKursi").removeClass('hidden');

                let contentKursi = $("#contentKursi");

                contentKursi.empty();

                const value = $(this).val();

                const formattedDate = new Intl.DateTimeFormat('id-ID', {
                    day: '2-digit',
                    month: 'long',
                    year: 'numeric'
                }).format(new Date(value));

                $.ajax({
                    url: "{{ route('list-data.jadwal') }}" + "?date=" + value,
                    type: "GET",
                    dataType: 'json',
                    success: function(result) {
                        if (result.length > 0) {
                            $("#beforeSearch").addClass("hidden");
                            $("#foundSearch").removeClass("hidden");
                            $("#notFoundSearch").addClass("hidden");

                            let contentJadwal = $("#contentJadwal");

                            contentJadwal.empty();

                            result.forEach(valueJadwal => {
                                const formattedHarga = new Intl.NumberFormat('id-ID', {
                                    style: 'decimal',
                                    minimumFractionDigits: 0
                                }).format(valueJadwal.Harga);

                                const departureTime = valueJadwal.Waktu_Pemberangkatan
                                    .slice(0, 5);
                                const arrivalTime = valueJadwal.Waktu_Tiba.slice(0, 5);

                                contentJadwal.append(`
                                 <div class="card mb-2 cardJadwal" onClick="searchChair(${valueJadwal.Id_Jadwal})" id="jadwal_${valueJadwal.Id_Jadwal}">
                                    <div class="card-body">
                                        <h5 class="card-title font-bold">Bus Wisata Tanggal ${formattedDate}</h5>
                                        <h6 class="card-subtitle mb-2 font-semibold text-success">Rp. ${formattedHarga}</h6>
                                        <p class="card-text">Bus wisata ini akan berangkat pada jam ${departureTime} dan akan tiba pada jam ${arrivalTime}</p>
                                    </div>
                                </div>
                                `)
                            });
                        } else {
                            $("#beforeSearch").addClass("hidden");
                            $("#foundSearch").addClass("hidden");
                            $("#notFoundSearch").removeClass("hidden");
                        }
                    }
                });
            })
        })

        // this function works to search chair by id jadwal
        function searchChair(idJadwal) {
            $('.cardJadwal').removeClass('active');
            $(`#jadwal_${idJadwal}`).addClass('active');
            $("#idJadwal").val(idJadwal);

            $.ajax({
                url: "{{ route('list-data.kursi') }}" + "?idJadwal=" + idJadwal,
                type: "GET",
                dataType: 'json',
                success: function(result) {
                    if (result.length > 0) {
                        $("#pilihKursi").removeClass('hidden');
                        $("#foundKursi").removeClass('hidden');
                        $("#notFoundKursi").addClass('hidden');

                        let contentKursi = $("#contentKursi");

                        contentKursi.empty();

                        result.forEach(valueKursi => {
                            contentKursi.append(`
                                <label class="seat ${valueKursi.Status_Pemesanan === 1 ? 'taken' : 'available'} }}">
                                    <input type="checkbox" name="kursi[]" value="${valueKursi.Id_Kursi}" ${valueKursi.Status_Pemesanan === '1' ? 'disabled' : ''}>
                                    <span>${valueKursi.Nomor_Kursi}</span>
                                </label>
                            `)
                        })
                    } else {
                        $("#foundKursi").addClass('hidden');
                        $("#notFoundKursi").removeClass('hidden');
                    }
                }
            });
        }
    </script>
@endsection
