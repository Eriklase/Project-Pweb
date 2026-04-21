<?php

namespace App\Http\Controllers;

use App\Models\Krs;
use App\Models\Jadwal;
use App\Models\Semester;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = auth()->user()->mahasiswa;
        $krs = Krs::where('mahasiswa_id', $mahasiswa->id)->latest()->first();
        
        return view('mahasiswa.dashboard', compact('mahasiswa', 'krs'));
    }

    public function krs()
    {
        $mahasiswa = auth()->user()->mahasiswa;
        $semesterAktif = Semester::where('is_active', true)->first();
        $jadwals = Jadwal::where('semester_id', $semesterAktif->id)->with('matakuliah', 'dosen')->get();
        
        return view('mahasiswa.krs.index', compact('jadwals', 'semesterAktif'));
    }

    public function khs()
    {
        $mahasiswa = auth()->user()->mahasiswa;
        $krsList = Krs::where('mahasiswa_id', $mahasiswa->id)->with('semester', 'krsDetails.nilai', 'krsDetails.jadwal.matakuliah')->get();
        
        return view('mahasiswa.khs.index', compact('krsList'));
    }
}
