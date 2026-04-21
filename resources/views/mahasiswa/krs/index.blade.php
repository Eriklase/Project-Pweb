@extends('layouts.dashboard')

@section('title', 'Isi KRS')

@section('content')
<div class="mb-4">
    <h2 class="fw-bold">Pengisian KRS</h2>
    <p class="text-muted">Pilih mata kuliah untuk semester <span class="fw-bold text-primary">{{ $semesterAktif->semester }}</span>.</p>
</div>

<div class="alert alert-info border-0 rounded-3 d-flex align-items-center gap-3" role="alert">
    <i class="bi bi-info-circle-fill fs-4"></i>
    <div>
        Pastikan tidak ada jadwal yang bentrok saat memilih mata kuliah.
    </div>
</div>

<form action="#" method="POST">
    @csrf
    <div class="card overflow-hidden">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th width="50" class="text-center">Pilih</th>
                        <th>Mata Kuliah</th>
                        <th>SKS</th>
                        <th>Dosen</th>
                        <th>Jadwal</th>
                        <th>Ruangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jadwals as $jadwal)
                    <tr>
                        <td class="text-center">
                            <div class="form-check d-flex justify-content-center">
                                <input class="form-check-input" type="checkbox" name="jadwal_ids[]" value="{{ $jadwal->id }}">
                            </div>
                        </td>
                        <td>
                            <div class="fw-bold">{{ $jadwal->matakuliah->nama_mk }}</div>
                            <small class="text-muted">{{ $jadwal->matakuliah->kode_mk }}</small>
                        </td>
                        <td>{{ $jadwal->matakuliah->sks }}</td>
                        <td>{{ $jadwal->dosen->nama }}</td>
                        <td>{{ $jadwal->hari }}, {{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }}</td>
                        <td><span class="badge bg-light text-dark">{{ $jadwal->ruangan }}</span></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer bg-white p-4 text-end">
            <button type="submit" class="btn btn-primary rounded-pill px-5">Simpan KRS</button>
        </div>
    </div>
</form>
@endsection
