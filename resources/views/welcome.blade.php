<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIAKAD PRO - Sistem Informasi Akademik Modern</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- Styles -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    
    <style>
        :root {
            --primary: #4f46e5;
            --secondary: #6366f1;
            --dark: #1e293b;
        }

        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            overflow-x: hidden;
            background-color: #fff;
        }

        .hero-section {
            position: relative;
            height: 100vh;
            width: 100%;
            display: flex;
            align-items: center;
            background: linear-gradient(rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.8)), url('{{ asset('images/hero-bg.png') }}');
            background-size: cover;
            background-position: center;
        }

        .navbar {
            padding: 1.5rem 0;
            transition: all 0.3s;
            background: transparent;
        }

        .navbar.scrolled {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            padding: 1rem 0;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-weight: 800;
            font-size: 1.5rem;
            color: var(--primary) !important;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .hero-content {
            max-width: 700px;
            z-index: 2;
        }

        .hero-title {
            font-size: 4rem;
            font-weight: 800;
            line-height: 1.1;
            color: var(--dark);
            margin-bottom: 1.5rem;
        }

        .hero-subtitle {
            font-size: 1.25rem;
            color: #64748b;
            margin-bottom: 2.5rem;
            line-height: 1.6;
        }

        .btn-hero-primary {
            background-color: var(--primary);
            color: white;
            padding: 1rem 2.5rem;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 10px 15px -3px rgba(79, 70, 229, 0.3);
        }

        .btn-hero-primary:hover {
            background-color: var(--secondary);
            transform: translateY(-3px);
            color: white;
        }

        .btn-hero-outline {
            background-color: transparent;
            color: var(--primary);
            padding: 1rem 2.5rem;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            border: 2px solid var(--primary);
            transition: all 0.3s;
            margin-left: 1rem;
        }

        .btn-hero-outline:hover {
            background-color: rgba(79, 70, 229, 0.05);
            transform: translateY(-3px);
        }

        .features-grid {
            padding: 100px 0;
            background-color: #f8fafc;
        }

        .feature-card {
            background: white;
            padding: 2.5rem;
            border-radius: 1.5rem;
            border: 1px solid #e2e8f0;
            transition: all 0.3s;
            height: 100%;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.05);
        }

        .feature-icon {
            width: 60px;
            height: 60px;
            background: #eef2ff;
            color: var(--primary);
            border-radius: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            .btn-hero-outline {
                margin-left: 0;
                margin-top: 1rem;
                display: block;
                text-align: center;
            }
            .btn-hero-primary {
                display: block;
                text-align: center;
            }
        }

        .btn-nav-primary {
            background-color: var(--primary);
            color: white;
            border-radius: 50px;
            font-weight: 600;
            padding: 0.6rem 1.5rem;
            transition: all 0.3s;
        }

        .btn-nav-primary:hover {
            background-color: var(--secondary);
            color: white;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="bi bi-mortarboard-fill"></i> SIAKAD PRO
            </a>
            <div class="ms-auto d-flex gap-2">
                @auth
                    <a href="{{ route('home') }}" class="btn btn-nav-primary">Dashboard</a>
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger rounded-pill px-4 ms-2">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-primary">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-outline-primary">Register</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <span class="badge bg-primary-soft text-primary px-3 py-2 rounded-pill mb-4" style="background: rgba(79, 70, 229, 0.1);">Sistem Informasi Akademik Terbaru</span>
                <h1 class="hero-title">Solusi Cerdas Kelola Akademik Kampus</h1>
                <p class="hero-subtitle">Platform terintegrasi untuk mahasiswa, dosen, dan admin. Kelola KRS, KHS, dan jadwal perkuliahan dengan lebih mudah, cepat, dan modern.</p>
                
                <div class="d-flex flex-wrap gap-3">
                    @auth
                        <a href="{{ route('home') }}" class="btn btn-hero-primary">
                            Ke Dashboard <i class="bi bi-speedometer2"></i>
                        </a>
                    @endauth
                    
                    <a href="{{ route('about') }}" class="btn btn-hero-primary">
                        Pelajari Lebih Lanjut
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="features-grid">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold h1">Fitur Unggulan</h2>
                <p class="text-muted">Semua yang Anda butuhkan dalam satu genggaman.</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon"><i class="bi bi-people-fill"></i></div>
                        <h4 class="fw-bold">Multi Role</h4>
                        <p class="text-muted mb-0">Akses khusus untuk Admin, Dosen, dan Mahasiswa dengan fitur yang disesuaikan dengan kebutuhan masing-masing.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon"><i class="bi bi-calendar-check"></i></div>
                        <h4 class="fw-bold">Manajemen KRS</h4>
                        <p class="text-muted mb-0">Proses pengisian Kartu Rencana Studi (KRS) yang intuitif dan validasi otomatis jadwal bentrok.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon"><i class="bi bi-graph-up-arrow"></i></div>
                        <h4 class="fw-bold">Monitoring Nilai</h4>
                        <p class="text-muted mb-0">Pantau perkembangan akademik melalui KHS dan Transkrip Nilai secara real-time kapan saja.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-5 bg-white border-top">
        <div class="container text-center">
            <div class="navbar-brand justify-content-center mb-4">
                <i class="bi bi-mortarboard-fill"></i> SIAKAD PRO
            </div>
            <p class="text-muted small">&copy; {{ date('Y') }} SIAKAD PRO. Built for Academic Excellence.</p>
        </div>
    </footer>
    <script>
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                document.querySelector('.navbar').classList.add('scrolled');
            } else {
                document.querySelector('.navbar').classList.remove('scrolled');
            }
        });
    </script>
</body>
</html>
