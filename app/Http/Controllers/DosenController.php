<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        $dosen = auth()->user()->dosen;
        $jadwals = Jadwal::where('dosen_id', $dosen->id)->with('matakuliah', 'semester')->get();
        
        return view('dosen.dashboard', compact('jadwals'));
    }

    public function inputNilai($jadwal_id)
    {
        $jadwal = Jadwal::with('krsDetails.krs.mahasiswa')->findOrFail($jadwal_id);
        return view('dosen.nilai.input', compact('jadwal'));
    }
}
