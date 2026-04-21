@extends('layouts.dashboard')

@section('title', 'Profil Saya')

@section('content')
<div class="mb-4">
    <h2 class="fw-bold">Profil Saya</h2>
    <p class="text-muted">Informasi detail akun Anda.</p>
</div>

<div class="row">
    <div class="col-lg-4">
        <div class="card mb-4 text-center">
            <div class="card-body">
                <div class="rounded-circle overflow-hidden border bg-light mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 150px; height: 150px;">
                    @if(auth()->user()->role == 'admin')
                        <img src="{{ asset('images/admin-profile.jpg') }}" alt="Profile" style="width: 100%; height: 100%; object-fit: cover;">
                    @else
                        <i class="bi bi-person text-muted display-1"></i>
                    @endif
                </div>
                <h5 class="fw-bold mb-0">{{ auth()->user()->name }}</h5>
                <p class="text-muted text-capitalize">{{ auth()->user()->role }}</p>
                <button class="btn btn-outline-primary btn-sm rounded-pill px-4">Ganti Foto</button>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card mb-4">
            <div class="card-body p-4">
                <h5 class="fw-bold mb-4">Informasi Akun</h5>
                <div class="row mb-3">
                    <div class="col-sm-3 text-muted">Nama Lengkap</div>
                    <div class="col-sm-9 fw-medium">{{ auth()->user()->name }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3 text-muted">Email</div>
                    <div class="col-sm-9 fw-medium">{{ auth()->user()->email }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3 text-muted">Role</div>
                    <div class="col-sm-9 fw-medium text-capitalize">{{ auth()->user()->role }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3 text-muted">Terdaftar Sejak</div>
                    <div class="col-sm-9 fw-medium">{{ auth()->user()->created_at->format('d M Y') }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
