<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SIAKAD - @yield('title')</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- Scripts & Styles -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    
    <style>
        :root {
            --sidebar-width: 260px;
            --primary-color: #4f46e5;
            --secondary-color: #6366f1;
            --bg-color: #f8fafc;
            --sidebar-bg: #ffffff;
            --sidebar-hover: #f1f5f9;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-color);
            color: #1e293b;
            overflow-x: hidden;
        }

        #wrapper {
            display: flex;
            width: 100%;
        }

        #sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            background: var(--sidebar-bg);
            border-right: 1px solid #e2e8f0;
            position: fixed;
            left: 0;
            top: 0;
            z-index: 1000;
            transition: all 0.3s;
        }

        #content {
            flex: 1;
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            transition: all 0.3s;
        }

        .sidebar-header {
            padding: 2rem 1.5rem;
            border-bottom: 1px solid #f1f5f9;
        }

        .sidebar-brand {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--primary-color);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .nav-list {
            padding: 1.5rem 0.75rem;
            list-style: none;
            margin: 0;
        }

        .nav-item {
            margin-bottom: 0.5rem;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0.75rem 1rem;
            color: #64748b;
            text-decoration: none;
            border-radius: 0.5rem;
            font-weight: 500;
            transition: all 0.2s;
        }

        .nav-link:hover, .nav-link.active {
            background-color: var(--sidebar-hover);
            color: var(--primary-color);
        }

        .nav-link i {
            font-size: 1.25rem;
        }

        .nav-link.active {
            background-color: #eef2ff;
            color: var(--primary-color);
        }

        .navbar-custom {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(8px);
            border-bottom: 1px solid #e2e8f0;
            padding: 1rem 2rem;
            position: sticky;
            top: 0;
            z-index: 999;
        }

        .main-content {
            padding: 2rem;
        }

        .card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            transition: transform 0.2s;
        }

        .card:hover {
            transform: translateY(-2px);
        }

        .stat-card {
            padding: 1.5rem;
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .stat-icon {
            width: 56px;
            height: 56px;
            border-radius: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }

        .bg-primary-soft { background-color: #eef2ff; color: #4f46e5; }
        .bg-success-soft { background-color: #f0fdf4; color: #16a34a; }
        .bg-warning-soft { background-color: #fffbeb; color: #d97706; }
        .bg-danger-soft { background-color: #fef2f2; color: #dc2626; }

        .dropdown-toggle::after {
            display: none;
        }

        @media (max-width: 992px) {
            #sidebar {
                margin-left: calc(-1 * var(--sidebar-width));
            }
            #content {
                margin-left: 0;
            }
            #sidebar.active {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <div id="wrapper">
        <!-- Sidebar -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <a href="#" class="sidebar-brand">
                    <i class="bi bi-mortarboard-fill"></i>
                    <span>SIAKAD PRO</span>
                </a>
            </div>
            
            <ul class="nav-list">
                @if(auth()->user()->role == 'admin')
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                            <i class="bi bi-speedometer2"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.mahasiswa') }}" class="nav-link {{ request()->routeIs('admin.mahasiswa') ? 'active' : '' }}">
                            <i class="bi bi-people"></i> Mahasiswa
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.dosen') }}" class="nav-link {{ request()->routeIs('admin.dosen') ? 'active' : '' }}">
                            <i class="bi bi-person-badge"></i> Dosen
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.matakuliah') }}" class="nav-link {{ request()->routeIs('admin.matakuliah') ? 'active' : '' }}">
                            <i class="bi bi-book"></i> Mata Kuliah
                        </a>
                    </li>
                @elseif(auth()->user()->role == 'dosen')
                    <li class="nav-item">
                        <a href="{{ route('dosen.dashboard') }}" class="nav-link {{ request()->routeIs('dosen.dashboard') ? 'active' : '' }}">
                            <i class="bi bi-speedometer2"></i> Dashboard
                        </a>
                    </li>
                @elseif(auth()->user()->role == 'mahasiswa')
                    <li class="nav-item">
                        <a href="{{ route('mahasiswa.dashboard') }}" class="nav-link {{ request()->routeIs('mahasiswa.dashboard') ? 'active' : '' }}">
                            <i class="bi bi-speedometer2"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('mahasiswa.krs') }}" class="nav-link {{ request()->routeIs('mahasiswa.krs') ? 'active' : '' }}">
                            <i class="bi bi-pencil-square"></i> Isi KRS
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('mahasiswa.khs') }}" class="nav-link {{ request()->routeIs('mahasiswa.khs') ? 'active' : '' }}">
                            <i class="bi bi-file-earmark-text"></i> Lihat KHS
                        </a>
                    </li>
                @endif
                
                <li class="nav-item mt-4 pt-4 border-top">
                    <a href="{{ route('logout') }}" class="nav-link text-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Page Content -->
        <div id="content">
            <nav class="navbar navbar-custom">
                <div class="container-fluid">
                    <button class="btn btn-link d-lg-none" id="sidebarToggle">
                        <i class="bi bi-list fs-4"></i>
                    </button>
                    <div class="ms-auto d-flex align-items-center gap-3">
                        <div class="dropdown">
                            <a href="#" class="d-flex align-items-center gap-3 text-decoration-none dropdown-toggle" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="text-end d-none d-sm-block">
                                    <div class="fw-bold text-dark">{{ auth()->user()->name }}</div>
                                    <small class="text-muted text-capitalize">{{ auth()->user()->role }}</small>
                                </div>
                                <div class="rounded-circle overflow-hidden border" style="width: 40px; height: 40px;">
                                    <img src="{{ asset('images/admin-profile.jpg') }}" alt="Profile" style="width: 100%; height: 100%; object-fit: cover;">
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow border-0 p-2 mt-3 rounded-3" aria-labelledby="profileDropdown">
                                <li>
                                    <a class="dropdown-item rounded-2 py-2" href="{{ route('profile') }}">
                                        <i class="bi bi-person me-2"></i> Lihat Profil
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item rounded-2 py-2" href="{{ route('settings') }}">
                                        <i class="bi bi-gear me-2"></i> Pengaturan
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item rounded-2 py-2 text-danger" href="{{ route('logout') }}" 
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="bi bi-box-arrow-right me-2"></i> Logout
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>

            <div class="main-content">
                @yield('content')
            </div>
        </div>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>

    <script>
        document.getElementById('sidebarToggle')?.addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('active');
        });
    </script>
</body>
</html>
