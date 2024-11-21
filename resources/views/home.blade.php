<body class="home">
    @extends('layouts.app')

    @section('content')
    <!-- Slideshow Section -->
    <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="carousel-image" style="background-image: url('{{ asset('images/slide1.jpg') }}');"></div>
                <div class="carousel-caption">
                    <h1>Selamat Datang di Ngulisik - Bus Wisata Tasikmalaya</h1>
                    <p>Nikmati perjalanan wisata dengan layanan bus kami yang nyaman dan aman.</p>
                    <a href="{{ route('pesan.pilihTanggal') }}" class="btn btn-primary">Pesan Tiket Sekarang</a>
                </div>
            </div>
            <div class="carousel-item">
                <div class="carousel-image" style="background-image: url('{{ asset('images/slide2.jpg') }}');"></div>
                <div class="carousel-caption">
                    <h1>Jelajahi Tasikmalaya dengan Ngulisik</h1>
                    <p>Pesan tiket bus wisata Anda dan nikmati pengalaman yang tak terlupakan!</p>
                    <a href="{{ route('pesan.pilihTanggal') }}" class="btn btn-primary">Pesan Tiket Sekarang</a>
                </div>
            </div>
            <div class="carousel-item">
                <div class="carousel-image" style="background-image: url('{{ asset('images/slide3.jpg') }}');"></div>
                <div class="carousel-caption">
                    <h1>Wisata Terbaik di Tasikmalaya</h1>
                    <p>Temukan destinasi wisata terbaik dengan bus kami yang nyaman dan aman.</p>
                    <a href="{{ route('pesan.pilihTanggal') }}" class="btn btn-primary">Pesan Tiket Sekarang</a>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Informasi Rute, Jadwal, Harga, dll. -->
    <div class="container mt-5">
        <section id="rute">
            <h2>Rute Wisata</h2>
            <p>Detail rute perjalanan dan tempat-tempat menarik yang akan dilewati.</p>
        </section>

        <section id="jadwal">
            <h2>Jadwal Keberangkatan</h2>
            <p>Informasi mengenai jadwal keberangkatan dan waktu tempuh setiap rute.</p>
        </section>

        <section id="harga">
            <h2>Harga Tiket</h2>
            <p>Rincian harga tiket untuk berbagai tujuan dan kategori wisatawan.</p>
        </section>

        <section id="fasilitas">
            <h2>Fasilitas</h2>
            <p>Fasilitas yang tersedia di dalam bus, seperti AC, Wi-Fi, dan sebagainya.</p>
        </section>
    </div>

    <style>
    /* Slideshow */
    #heroCarousel {
        position: relative;
        z-index: 1;
        margin-top: -100px;
    }

    /* Efek Setengah Lingkaran */
    #heroCarousel::after {
        content: '';
        position: absolute;
        bottom: -100px; /* Posisi efek sedikit di bawah carousel */
        left: 0;
        width: 100%;
        height: 200px;
        background: linear-gradient(to bottom, rgb(0, 98, 0), rgb(255, 255, 255)); /* Gradasi dari atas ke bawah */
        border-top-left-radius: 50%;
        border-top-right-radius: 50%;
        box-shadow: 0 -10px 15px rgba(0, 0, 0, 0.1);
        z-index: 1;
    }

    .carousel-inner {
        position: relative;
    }

    .carousel-item {
        position: relative;
        height: 100vh; /* Full screen */
    }

    .carousel-image {
        background-size: cover;
        background-position: center;
        height: 100%;
        width: 100%;
        position: absolute;
        top: 0;
        left: 0;
        z-index: -1;
    }

    .carousel-caption {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
        text-align: center;
        z-index: 2;
        background: rgba(0, 0, 0, 0.6); /* Darker overlay */
        padding: 25px;
        max-width: 600px;
        border-radius: 10px;
    }

    .carousel-caption h1 {
        font-size: 2.5rem;
        font-weight: bold;
        color: #fff;
        text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
    }

    .carousel-caption p {
        font-size: 1.2rem;
        color: #ddd;
        margin-top: 15px;
    }

    .carousel-caption .btn {
        background-color: #00a300; /* Contrast color for button */
        padding: 10px 25px;
        font-size: 1rem;
        border: none;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .carousel-caption .btn:hover {
        background-color: #0a7800;
    }

    /* Controls */
    .carousel-control-prev, .carousel-control-next {
        filter: invert(100%);
    }

    /* Style for Sections */
    .container section {
        position: relative; /* Agar section ini berada di atas efek setengah lingkaran */
        z-index: 2; /* Menempatkan section di atas efek setengah lingkaran */
        background: #f0f2f5; /* Light background color for sections */
        padding: 30px;
        margin-bottom: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .container section:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }

    /* Title Style for Sections */
    .container section h2 {
        font-size: 1.75rem;
        color: #333;
        font-weight: bold;
        margin-bottom: 15px;
        position: relative;
    }

    /* Adding a subtle line below each title */
    .container section h2::after {
        content: "";
        display: block;
        width: 50px;
        height: 3px;
        background-color: rgb(0, 98, 0); /* Primary accent color */
        margin-top: 10px;
    }

    /* Text Style for Sections */
    .container section p {
        color: #555;
        line-height: 1.7;
        font-size: 1.1rem;
    }

    /* Alternatif: Jika ingin menambah jarak pada section tanpa mempengaruhi layout */
    .container #rute,
    .container #jadwal,
    .container #harga,
    .container #fasilitas {
        margin-top: 10px; /* Menambahkan margin agar section dimulai dari posisi yang lebih tinggi */
    }
    </style>

    @endsection
</body>
