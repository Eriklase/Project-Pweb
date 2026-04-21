@extends('layouts.dashboard')

@section('title', 'Dosen Dashboard')

@section('content')
<div class="row g-4 mb-4">
    <div class="col-12">
        <h2 class="fw-bold">Selamat Datang, {{ auth()->user()->name }}!</h2>
        <p class="text-muted">Berikut adalah jadwal mengajar Anda semester ini.</p>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-bold mb-4"><i class="bi bi-calendar3 me-2 text-primary"></i> Jadwal Mengajar</h5>
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Mata Kuliah</th>
                        <th>Hari</th>
                        <th>Jam</th>
                        <th>Ruangan</th>
                        <th>Semester</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($jadwals as $jadwal)
                    <tr>
                        <td>
                            <div class="fw-bold text-primary">{{ $jadwal->matakuliah->nama_mk }}</div>
                            <small class="text-muted">{{ $jadwal->matakuliah->kode_mk }}</small>
                        </td>
                        <td>{{ $jadwal->hari }}</td>
                        <td>{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</td>
                        <td><span class="badge bg-primary-soft text-primary">{{ $jadwal->ruangan }}</span></td>
                        <td>{{ $jadwal->semester->semester }}</td>
                        <td>
                            <a href="{{ route('dosen.nilai.input', $jadwal->id) }}" class="btn btn-sm btn-primary rounded-pill px-3">
                                <i class="bi bi-pencil-square me-1"></i> Input Nilai
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-muted">Belum ada jadwal mengajar.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
