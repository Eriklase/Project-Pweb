@extends('layouts.dashboard')

@section('title', 'Pengaturan')

@section('content')
<div class="mb-4">
    <h2 class="fw-bold">Pengaturan</h2>
    <p class="text-muted">Kelola preferensi dan keamanan akun Anda.</p>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card mb-4">
            <div class="card-body p-4">
                <h5 class="fw-bold mb-4">Ubah Password</h5>
                <form action="#" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Password Lama</label>
                        <input type="password" class="form-control" placeholder="••••••••">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password Baru</label>
                        <input type="password" class="form-control" placeholder="••••••••">
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Konfirmasi Password Baru</label>
                        <input type="password" class="form-control" placeholder="••••••••">
                    </div>
                    <button type="submit" class="btn btn-primary rounded-pill px-4">Simpan Perubahan</button>
                </form>
            </div>
        </div>

        <div class="card border-danger-subtle bg-danger-subtle bg-opacity-10">
            <div class="card-body p-4">
                <h5 class="fw-bold text-danger mb-3">Zona Berbahaya</h5>
                <p class="small text-muted mb-4">Sekali Anda menghapus akun, semua data akan hilang secara permanen. Mohon berhati-hati.</p>
                <button class="btn btn-danger rounded-pill px-4">Hapus Akun</button>
            </div>
        </div>
    </div>
</div>
@endsection
