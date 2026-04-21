@extends('layouts.dashboard')

@section('title', 'Tambah Dosen')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.dosen') }}" class="btn btn-link text-decoration-none p-0 mb-2">
        <i class="bi bi-arrow-left"></i> Kembali ke Daftar
    </a>
    <h2 class="fw-bold">Tambah Dosen Baru</h2>
    <p class="text-muted">Lengkapi formulir di bawah untuk mendaftarkan dosen baru.</p>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body p-4">
                <form action="{{ route('admin.dosen.store') }}" method="POST">
                    @csrf
                    
                    <h5 class="mb-4 border-bottom pb-2 text-primary">Informasi Pribadi</h5>
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" required placeholder="Contoh: Dr. Andi Wijaya, M.T.">
                            @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">NIDN</label>
                            <input type="text" name="nidn" class="form-control @error('nidn') is-invalid @enderror" value="{{ old('nidn') }}" required placeholder="Contoh: 0011223344">
                            @error('nidn') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <h5 class="mb-4 border-bottom pb-2 text-primary">Akun Pengguna</h5>
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required placeholder="email@siakad.com">
                            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required placeholder="Minimal 8 karakter">
                            @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <hr>
                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('admin.dosen') }}" class="btn btn-light px-4">Batal</a>
                        <button type="submit" class="btn btn-primary px-4 rounded-pill">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
