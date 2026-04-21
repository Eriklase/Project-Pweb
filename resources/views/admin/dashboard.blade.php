@extends('layouts.dashboard')

@section('title', 'Admin Dashboard')

@section('content')
<div class="row g-4 mb-4">
    <div class="col-12">
        <h2 class="fw-bold">Selamat Datang, Admin!</h2>
        <p class="text-muted">Berikut adalah ringkasan sistem akademik saat ini.</p>
    </div>
    
    <div class="col-md-4">
        <div class="card">
            <div class="stat-card">
                <div class="stat-icon bg-primary-soft">
                    <i class="bi bi-people"></i>
                </div>
                <div>
                    <div class="text-muted small">Total Mahasiswa</div>
                    <div class="fs-4 fw-bold">{{ $total_mahasiswa }}</div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card">
            <div class="stat-card">
                <div class="stat-icon bg-success-soft">
                    <i class="bi bi-person-badge"></i>
                </div>
                <div>
                    <div class="text-muted small">Total Dosen</div>
                    <div class="fs-4 fw-bold">{{ $total_dosen }}</div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card">
            <div class="stat-card">
                <div class="stat-icon bg-warning-soft">
                    <i class="bi bi-book"></i>
                </div>
                <div>
                    <div class="text-muted small">Mata Kuliah</div>
                    <div class="fs-4 fw-bold">{{ $total_mk }}</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-8">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title fw-bold mb-4">Statistik Mahasiswa per Prodi</h5>
                <canvas id="prodiChart" style="max-height: 300px;"></canvas>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title fw-bold mb-4">Aktivitas Terbaru</h5>
                <div class="list-group list-group-flush">
                    <div class="list-group-item px-0 border-0">
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-1 fw-bold">Admin menambahkan Jadwal</h6>
                            <small class="text-muted">3m ago</small>
                        </div>
                        <p class="mb-1 text-muted small">Jadwal Pemrograman Web Lanjut ditambahkan.</p>
                    </div>
                    <div class="list-group-item px-0 border-0">
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-1 fw-bold">Mahasiswa Baru Terdaftar</h6>
                            <small class="text-muted">1h ago</small>
                        </div>
                        <p class="mb-1 text-muted small">Friderikus (20210001) baru saja bergabung.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('prodiChart');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Teknik Informatika', 'Sistem Informasi', 'Teknik Elektro'],
            datasets: [{
                label: 'Jumlah Mahasiswa',
                data: [{{ $total_mahasiswa }}, 0, 0],
                backgroundColor: '#4f46e5',
                borderRadius: 8
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    grid: { display: false }
                },
                x: {
                    grid: { display: false }
                }
            },
            plugins: {
                legend: { display: false }
            }
        }
    });
</script>
@endsection
