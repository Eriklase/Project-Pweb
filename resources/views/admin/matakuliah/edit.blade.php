@extends('layouts.dashboard')

@section('title', 'Edit Mata Kuliah')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.matakuliah') }}" class="btn btn-link text-decoration-none p-0 mb-2">
        <i class="bi bi-arrow-left"></i> Kembali ke Daftar
    </a>
    <h2 class="fw-bold">Edit Data Mata Kuliah</h2>
    <p class="text-muted">Perbarui informasi mata kuliah <strong>{{ $matakuliah->nama_mk }}</strong>.</p>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body p-4">
                <form action="{{ route('admin.matakuliah.update', $matakuliah->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <label class="form-label">Kode Mata Kuliah</label>
                            <input type="text" name="kode_mk" class="form-control @error('kode_mk') is-invalid @enderror" value="{{ old('kode_mk', $matakuliah->kode_mk) }}" required>
                            @error('kode_mk') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-8">
                            <label class="form-label">Nama Mata Kuliah</label>
                            <input type="text" name="nama_mk" class="form-control @error('nama_mk') is-invalid @enderror" value="{{ old('nama_mk', $matakuliah->nama_mk) }}" required>
                            @error('nama_mk') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <label class="form-label">SKS</label>
                            <input type="number" name="sks" class="form-control @error('sks') is-invalid @enderror" value="{{ old('sks', $matakuliah->sks) }}" required min="1" max="8">
                            @error('sks') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <hr>
                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('admin.matakuliah') }}" class="btn btn-light px-4">Batal</a>
                        <button type="submit" class="btn btn-primary px-4 rounded-pill">Perbarui Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
