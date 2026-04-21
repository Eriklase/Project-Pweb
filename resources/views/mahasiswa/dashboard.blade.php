@extends('layouts.dashboard')

@section('title', 'Mahasiswa Dashboard')

@section('content')
<div class="row g-4 mb-4">
    <div class="col-12">
        <div class="card bg-primary text-white overflow-hidden" style="border-radius: 1.5rem;">
            <div class="card-body p-4 position-relative">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <h2 class="fw-bold mb-2">Halo, {{ $mahasiswa->nama }}! 👋</h2>
                        <p class="mb-0 opacity-75">Selamat datang di Portal Akademik. Jangan lupa untuk mengecek jadwal kuliah dan mengisi KRS tepat waktu.</p>
                    </div>
                    <div class="col-lg-4 text-end d-none d-lg-block">
                        <i class="bi bi-mortarboard" style="font-size: 8rem; position: absolute; top: -2rem; right: 1rem; opacity: 0.15;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card">
            <div class="card-body p-4 text-center">
                <div class="stat-icon bg-primary-soft rounded-circle mx-auto mb-3" style="width: 64px; height: 64px;">
                    <i class="bi bi-person-badge fs-2"></i>
                </div>
                <h5 class="fw-bold mb-1">{{ $mahasiswa->nim }}</h5>
                <p class="text-muted small mb-0">NIM Mahasiswa</p>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card">
            <div class="card-body p-4 text-center">
                <div class="stat-icon bg-success-soft rounded-circle mx-auto mb-3" style="width: 64px; height: 64px;">
                    <i class="bi bi-journal-bookmark fs-2"></i>
                </div>
                <h5 class="fw-bold mb-1">{{ $mahasiswa->prodi->nama_prodi }}</h5>
                <p class="text-muted small mb-0">Program Studi</p>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card">
            <div class="card-body p-4 text-center">
                <div class="stat-icon bg-warning-soft rounded-circle mx-auto mb-3" style="width: 64px; height: 64px;">
                    <i class="bi bi-layers fs-2"></i>
                </div>
                <h5 class="fw-bold mb-1">Semester {{ $mahasiswa->semester }}</h5>
                <p class="text-muted small mb-0">Semester Aktif</p>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-6">
        <div class="card h-100">
            <div class="card-body p-4">
                <h5 class="fw-bold mb-4">Status KRS</h5>
                @if($krs)
                    <div class="d-flex align-items-center justify-content-between p-3 bg-light rounded-3 mb-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="bg-white rounded-circle p-2 shadow-sm text-primary">
                                <i class="bi bi-file-earmark-check"></i>
                            </div>
                            <div>
                                <div class="fw-bold small">KRS {{ $krs->semester->semester }}</div>
                                <div class="text-muted" style="font-size: 0.75rem;">Status: <span class="text-capitalize fw-bold {{ $krs->status == 'approved' ? 'text-success' : 'text-warning' }}">{{ $krs->status }}</span></div>
                            </div>
                        </div>
                        <a href="{{ route('mahasiswa.krs') }}" class="btn btn-sm btn-outline-primary rounded-pill">Detail</a>
                    </div>
                @else
                    <div class="text-center py-4">
                        <i class="bi bi-file-earmark-x text-muted fs-1"></i>
                        <p class="text-muted mt-2">Anda belum mengisi KRS semester ini.</p>
                        <a href="{{ route('mahasiswa.krs') }}" class="btn btn-primary rounded-pill">Isi KRS Sekarang</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
    
    <div class="col-lg-6">
        <div class="card h-100">
            <div class="card-body p-4">
                <h5 class="fw-bold mb-4">Pengumuman Terbaru</h5>
                <div class="list-group list-group-flush">
                    <a href="#" class="list-group-item list-group-item-action px-0 border-0">
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-1 fw-bold">Pengisian KRS Semester Ganjil</h6>
                            <small class="text-muted">Today</small>
                        </div>
                        <p class="mb-1 text-muted small">Batas pengisian KRS diperpanjang hingga akhir minggu ini.</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
