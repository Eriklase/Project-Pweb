<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tentang SIAKAD PRO</title>
    
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
            --dark: #1e293b;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
            color: var(--dark);
        }

        .header-bg {
            background: linear-gradient(135deg, var(--primary), #6366f1);
            padding: 80px 0;
            color: white;
            margin-bottom: -50px;
        }

        .content-card {
            background: white;
            border-radius: 2rem;
            padding: 3rem;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            margin-bottom: 50px;
        }

        .section-title {
            color: var(--primary);
            font-weight: 800;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .back-btn {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            color: white;
            padding: 0.6rem 1.2rem;
            border-radius: 50px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 25px;
            font-weight: 600;
            font-size: 0.9rem;
            border: 1px solid rgba(255, 255, 255, 0.3);
            transition: all 0.3s;
        }

        .back-btn:hover {
            background: rgba(255, 255, 255, 0.3);
            color: white;
            transform: translateX(-5px);
        }

        @media (max-width: 768px) {
            .header-bg {
                padding: 60px 0;
            }
            .content-card {
                padding: 1.5rem;
                border-radius: 1.5rem;
                margin-top: -30px;
            }
            .display-4 {
                font-size: 2.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="header-bg">
        <div class="container">
            <a href="{{ url('/') }}" class="back-btn"><i class="bi bi-arrow-left"></i> Kembali ke Beranda</a>
            <h1 class="display-4 fw-800">Tentang SIAKAD PRO</h1>
            <p class="lead opacity-75">Sistem Informasi Akademik Modern untuk Masa Depan Pendidikan.</p>
        </div>
    </div>

    <div class="container">
        <div class="content-card">
            <div class="row">
                <div class="col-lg-8">
                    <h2 class="section-title"><i class="bi bi-info-circle-fill"></i> Apa itu SIAKAD PRO?</h2>
                    <p class="lead text-muted mb-4">SIAKAD PRO adalah platform manajemen akademik terpadu yang dirancang untuk mempermudah seluruh proses administrasi di perguruan tinggi.</p>
                    
                    <p>Dikembangkan dengan teknologi terbaru, SIAKAD PRO menawarkan kecepatan, keamanan, dan kemudahan akses bagi seluruh civitas akademika. Mulai dari pendaftaran mahasiswa, pengisian KRS, hingga pemantauan nilai (KHS), semuanya dapat dilakukan dalam satu platform yang responsif.</p>

                    <h2 class="section-title mt-5"><i class="bi bi-bullseye"></i> Visi & Misi</h2>
                    <div class="row g-4 mt-2">
                        <div class="col-md-6">
                            <div class="p-4 rounded-4 bg-light h-100">
                                <h5 class="fw-bold">Visi</h5>
                                <p class="small text-muted mb-0">Menjadi platform manajemen akademik nomor satu di Indonesia yang mendorong digitalisasi pendidikan secara menyeluruh.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-4 rounded-4 bg-light h-100">
                                <h5 class="fw-bold">Misi</h5>
                                <p class="small text-muted mb-0">Memberikan kemudahan akses data, transparansi nilai, dan efisiensi waktu bagi admin, dosen, maupun mahasiswa.</p>
                            </div>
                        </div>
                    </div>

                    <h2 class="section-title mt-5"><i class="bi bi-check-circle-fill"></i> Mengapa Memilih Kami?</h2>
                    <ul class="list-unstyled">
                        <li class="mb-3 d-flex align-items-start gap-2">
                            <i class="bi bi-check2-circle text-primary fs-5"></i>
                            <span><strong>Keamanan Data Terjamin:</strong> Enkripsi tingkat tinggi untuk melindungi data pribadi dan nilai mahasiswa.</span>
                        </li>
                        <li class="mb-3 d-flex align-items-start gap-2">
                            <i class="bi bi-check2-circle text-primary fs-5"></i>
                            <span><strong>Antarmuka Modern:</strong> Desain bersih dan intuitif yang mudah digunakan bahkan oleh pengguna baru.</span>
                        </li>
                        <li class="mb-3 d-flex align-items-start gap-2">
                            <i class="bi bi-check2-circle text-primary fs-5"></i>
                            <span><strong>Dukungan Multi-Perangkat:</strong> Akses SIAKAD dari mana saja, baik melalui laptop, tablet, maupun smartphone.</span>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <div class="sticky-top" style="top: 20px;">
                        <div class="p-4 rounded-4 bg-primary text-white mb-4 shadow">
                            <h4 class="fw-bold mb-3">Siap Bergabung?</h4>
                            <p class="small opacity-75 mb-4">Mulai perjalanan akademik Anda dengan sistem yang lebih baik sekarang juga.</p>
                            <a href="{{ route('register') }}" class="btn btn-light w-100 rounded-pill fw-bold py-2">Daftar Sekarang</a>
                        </div>
                        
                        <div class="p-4 rounded-4 border bg-white shadow-sm text-center">
                            <h6 class="fw-bold text-muted mb-3">Ikuti Kami</h6>
                            <div class="d-flex justify-content-center gap-3">
                                <a href="#" class="text-primary fs-4"><i class="bi bi-facebook"></i></a>
                                <a href="#" class="text-info fs-4"><i class="bi bi-twitter-x"></i></a>
                                <a href="#" class="text-danger fs-4"><i class="bi bi-instagram"></i></a>
                                <a href="#" class="text-primary fs-4"><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="py-5 text-center text-muted">
        <p class="small">&copy; {{ date('Y') }} SIAKAD PRO. Built with Passion for Education.</p>
    </footer>
</body>
</html>
