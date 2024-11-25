<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Sticky Header */
        .sticky-header {
            position: sticky;
            top: 0;
            z-index: 1000;
            /* Pastikan header di atas konten lainnya */
            background-color: rgba(0, 0, 0, 0.5);
            /* Pastikan latar belakangnya solid agar tidak transparan */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            /* Efek bayangan saat header sticky */
            padding: 10px 0;
            /* Padding untuk memberikan ruang di dalam header */
            width: 100%;
            /* Memastikan header mengisi lebar layar */
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
            /* Efek transisi */
        }

        /* Header with transparent background and blur effect */
        header {
            background: rgba(0, 0, 0, 0.5);
            /* Transparent background */
            backdrop-filter: blur(8px);
            /* Blur effect */
            padding: 1rem 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            /* Shadow to add depth */
            transition: background-color 0.3s ease-in-out;
            /* Smooth transition for background color */
        }

        /* Header hover effect - change to green */
        header:hover {
            background-color: #004d40;
            /* Green transparent background on hover */
            backdrop-filter: none;
            /* Remove blur on hover */
        }

        /* Navbar link styling */
        .nav-link {
            position: relative;
            color: #f8f9fa !important;
            font-weight: 500;
            transition: color 0.3s ease, transform 0.3s ease;
        }

        /* Hover effect for navbar links */
        .nav-link:hover {
            color: #90e0ef !important;
            transform: scale(1.1);
            /* Zoom-in effect */
        }

        /* Active navbar link */
        .nav-link.active {
            color: #90e0ef !important;
        }

        /* Underline effect for active navbar links */
        .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: #90e0ef;
        }

        /* Footer Styling */
        .footer {
            background-color: #004d40;
            /* Hijau tua */
            color: #ffffff;
            padding: 40px 0;
        }

        .footer-logo {
            max-width: 150px;
            /* Sesuaikan ukuran logo */
            margin-bottom: 20px;
        }

        .footer h5 {
            color: #ffeb3b;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .footer p,
        .footer ul li a {
            color: #e0f2f1;
            font-size: 0.9em;
        }

        .footer ul {
            list-style-type: none;
            padding: 0;
        }

        .footer ul li {
            margin-bottom: 10px;
        }

        .footer ul li a {
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer ul li a:hover {
            color: #ffeb3b;
        }

        .footer .container {
            max-width: 1100px;
            padding: 0 15px;
        }

        .footer .footer-section {
            border-right: 1px solid #b0bec5;
            padding-right: 20px;
            margin-bottom: 20px;
        }

        .footer .footer-section:last-child {
            border-right: none;
            /* Menghilangkan garis pada kolom terakhir */
        }

        .footer-divider {
            border-top: 1px solid #b0bec5;
            /* Garis pemisah */
            margin-top: 20px;
            margin-bottom: 20px;
            opacity: 0.5;
        }

        .footer .text-center {
            font-size: 1em;
            color: #b0bec5;
        }
    </style>

    @yield('style')
</head>

<body>
    <!-- Header with Logo, Centered Navbar, and User Dropdown -->
    <header class="sticky-header">
        <div class="container d-flex justify-content-between align-items-center">
            <!-- Logo -->
            <div class="logo d-flex align-items-center">
                <img src="{{ asset('images/logoNgulisik.png') }}" alt="Logo" class="logo-img me-2"
                    style="width: 50px; height: 50px;">
                <a href="{{ url('/') }}" class="text-white fw-bold fs-4 text-decoration-none">Ngulisik</a>
            </div>

            <!-- Centered Navbar -->
            <nav class="nav mx-auto">
                <a href="{{ url('/') }}" class="nav-link {{ Request::is('/') ? 'active' : '' }}">Beranda</a>
                <a href="{{ url('/tentang') }}" class="nav-link {{ Request::is('tentang') ? 'active' : '' }}">Tentang
                    Kami</a>
                <a href="{{ url('/pesanan') }}" class="nav-link {{ Request::is('pesanan') ? 'active' : '' }}">Pesanan
                    Anda</a>
            </nav>

            <!-- User Auth Links -->
            <div>
                @auth
                    <div class="dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="userDropdown" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="{{ url('/profile') }}">Profile</a></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @endauth
                @guest
                    <a href="{{ route('register') }}" class="btn btn-success">Daftar</a>
                    <a href="{{ route('login') }}" class="btn btn-outline-success">Masuk</a>
                @endguest
            </div>
        </div>
    </header>

    <!-- Page Content -->
    <main class="py-0">
        @yield('content')
    </main>

    <footer class="footer">
        <div class="container">
            <!-- Logo Ngulisik -->
            <div class="row text-center mb-4">
                <div class="col-12">
                    <img src="{{ asset('images/logoNgulisik.png') }}" alt="Logo Ngulisik" class="footer-logo">
                </div>
            </div>

            <div class="row">
                <!-- Kolom 1: Tentang Ngulisik -->
                <div class="col-lg-3 col-md-6 footer-section">
                    <h5>Tentang Ngulisik</h5>
                    <p>Ngulisik adalah layanan bus wisata di Tasikmalaya yang memberikan pengalaman transportasi wisata
                        yang nyaman dan aman.</p>
                    <ul>
                        <li><a href="tentang" target="_blank" rel="noopener noreferrer">Tentang Kami</a></li>
                        <li><a href="#" target="_blank" rel="noopener noreferrer">Kontak</a></li>
                        <li><a href="#" target="_blank" rel="noopener noreferrer">Syarat & Ketentuan</a></li>
                        <li><a href="#" target="_blank" rel="noopener noreferrer">Kebijakan Privasi</a></li>
                    </ul>
                </div>

                <!-- Kolom 2: Layanan -->
                <div class="col-lg-3 col-md-6 footer-section">
                    <h5>Layanan</h5>
                    <ul>
                        <li><a href="#pemesanan-tiket" target="_blank" rel="noopener noreferrer">Pemesanan Tiket</a>
                        </li>
                        <li><a href="#paket-wisata" target="_blank" rel="noopener noreferrer">Paket Wisata</a></li>
                        <li><a href="#rute-perjalanan" target="_blank" rel="noopener noreferrer">Rute Perjalanan</a>
                        </li>
                        <li><a href="#faq" target="_blank" rel="noopener noreferrer">FAQ</a></li>
                    </ul>
                </div>

                <!-- Kolom 3: Link Penting -->
                <div class="col-lg-3 col-md-6 footer-section">
                    <h5>Link Penting</h5>
                    <ul>
                        <li><a href="https://www.tasikmalayakota.go.id" target="_blank"
                                rel="noopener noreferrer">Pemerintah Kota Tasikmalaya</a></li>
                        <li><a href="https://disparbud.jabarprov.go.id" target="_blank" rel="noopener noreferrer">Dinas
                                Pariwisata</a></li>
                        <li><a href="https://news.tasikmalaya.go.id" target="_blank" rel="noopener noreferrer">Portal
                                Berita</a></li>
                        <li><a href="https://www.instagram.com/ngulisik" target="_blank"
                                rel="noopener noreferrer">Sosial Media</a></li>
                    </ul>
                </div>

                <!-- Kolom 4: Kontak -->
                <div class="col-lg-3 col-md-6 footer-section">
                    <h5>Kontak Kami</h5>
                    <p>Alamat: Jl. Raya Tasikmalaya No.123, Tasikmalaya, Jawa Barat</p>
                    <p>Email: info@ngulisik.com</p>
                    <p>Telp: +62 265 1234567</p>
                </div>
            </div>

            <!-- Garis Pemisah -->
            <hr class="footer-divider">

            <!-- Copyright -->
            <div class="row mt-4">
                <div class="col-12 text-center">
                    <p>&copy; 2024 Ngulisik Tasikmalaya. Semua hak dilindungi.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS and Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Jquery --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- Custom Javascript --}}
    @yield('script')
</body>

</html>
