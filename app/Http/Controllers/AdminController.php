<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\Matakuliah;
use App\Models\Prodi;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $total_mahasiswa = Mahasiswa::count();
        $total_dosen = Dosen::count();
        $total_mk = Matakuliah::count();
        
        return view('admin.dashboard', compact('total_mahasiswa', 'total_dosen', 'total_mk'));
    }

    public function mahasiswas()
    {
        $mahasiswas = Mahasiswa::with('prodi')->get();
        return view('admin.mahasiswa.index', compact('mahasiswas'));
    }

    public function createMahasiswa()
    {
        $prodis = Prodi::all();
        return view('admin.mahasiswa.create', compact('prodis'));
    }

    public function storeMahasiswa(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:20|unique:mahasiswas',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
            'prodi_id' => 'required|exists:prodis,id',
            'semester' => 'required|integer|min:1|max:14',
        ]);

        $user = \App\Models\User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => \Illuminate\Support\Facades\Hash::make($request->password),
            'role' => 'mahasiswa',
        ]);

        Mahasiswa::create([
            'user_id' => $user->id,
            'nim' => $request->nim,
            'nama' => $request->nama,
            'prodi_id' => $request->prodi_id,
            'semester' => $request->semester,
        ]);

        return redirect()->route('admin.mahasiswa')->with('success', 'Mahasiswa berhasil ditambahkan.');
    }

    public function editMahasiswa($id)
    {
        $mahasiswa = Mahasiswa::with('user')->findOrFail($id);
        $prodis = Prodi::all();
        return view('admin.mahasiswa.edit', compact('mahasiswa', 'prodis'));
    }

    public function updateMahasiswa(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $user = $mahasiswa->user;

        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:20|unique:mahasiswas,nim,'.$id,
            'email' => 'required|email|unique:users,email,'.$user->id,
            'prodi_id' => 'required|exists:prodis,id',
            'semester' => 'required|integer|min:1|max:14',
        ]);

        $user->update([
            'name' => $request->nama,
            'email' => $request->email,
        ]);

        if ($request->password) {
            $user->update(['password' => \Illuminate\Support\Facades\Hash::make($request->password)]);
        }

        $mahasiswa->update([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'prodi_id' => $request->prodi_id,
            'semester' => $request->semester,
        ]);

        return redirect()->route('admin.mahasiswa')->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    public function deleteMahasiswa($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->user->delete(); // This should delete the mahasiswa record too if cascading is set, otherwise delete manually
        $mahasiswa->delete();

        return redirect()->route('admin.mahasiswa')->with('success', 'Mahasiswa berhasil dihapus.');
    }

    public function dosens()
    {
        $dosens = Dosen::all();
        return view('admin.dosen.index', compact('dosens'));
    }

    public function createDosen()
    {
        return view('admin.dosen.create');
    }

    public function storeDosen(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nidn' => 'required|string|max:20|unique:dosens',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = \App\Models\User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => \Illuminate\Support\Facades\Hash::make($request->password),
            'role' => 'dosen',
        ]);

        Dosen::create([
            'user_id' => $user->id,
            'nidn' => $request->nidn,
            'nama' => $request->nama,
            'email' => $request->email,
        ]);

        return redirect()->route('admin.dosen')->with('success', 'Dosen berhasil ditambahkan.');
    }

    public function editDosen($id)
    {
        $dosen = Dosen::with('user')->findOrFail($id);
        return view('admin.dosen.edit', compact('dosen'));
    }

    public function updateDosen(Request $request, $id)
    {
        $dosen = Dosen::findOrFail($id);
        $user = $dosen->user;

        $request->validate([
            'nama' => 'required|string|max:255',
            'nidn' => 'required|string|max:20|unique:dosens,nidn,'.$id,
            'email' => 'required|email|unique:users,email,'.$user->id,
        ]);

        $user->update([
            'name' => $request->nama,
            'email' => $request->email,
        ]);

        if ($request->password) {
            $user->update(['password' => \Illuminate\Support\Facades\Hash::make($request->password)]);
        }

        $dosen->update([
            'nidn' => $request->nidn,
            'nama' => $request->nama,
            'email' => $request->email,
        ]);

        return redirect()->route('admin.dosen')->with('success', 'Data dosen berhasil diperbarui.');
    }

    public function deleteDosen($id)
    {
        $dosen = Dosen::findOrFail($id);
        $dosen->user->delete();
        $dosen->delete();

        return redirect()->route('admin.dosen')->with('success', 'Dosen berhasil dihapus.');
    }

    public function matakuliah()
    {
        $matakuliahs = Matakuliah::all();
        return view('admin.matakuliah.index', compact('matakuliahs'));
    }

    public function createMatakuliah()
    {
        return view('admin.matakuliah.create');
    }

    public function storeMatakuliah(Request $request)
    {
        $request->validate([
            'kode_mk' => 'required|string|max:10|unique:matakuliahs',
            'nama_mk' => 'required|string|max:255',
            'sks' => 'required|integer|min:1|max:8',
        ]);

        Matakuliah::create($request->all());

        return redirect()->route('admin.matakuliah')->with('success', 'Mata kuliah berhasil ditambahkan.');
    }

    public function editMatakuliah($id)
    {
        $matakuliah = Matakuliah::findOrFail($id);
        return view('admin.matakuliah.edit', compact('matakuliah'));
    }

    public function updateMatakuliah(Request $request, $id)
    {
        $matakuliah = Matakuliah::findOrFail($id);

        $request->validate([
            'kode_mk' => 'required|string|max:10|unique:matakuliahs,kode_mk,'.$id,
            'nama_mk' => 'required|string|max:255',
            'sks' => 'required|integer|min:1|max:8',
        ]);

        $matakuliah->update($request->all());

        return redirect()->route('admin.matakuliah')->with('success', 'Data mata kuliah berhasil diperbarui.');
    }

    public function deleteMatakuliah($id)
    {
        $matakuliah = Matakuliah::findOrFail($id);
        $matakuliah->delete();

        return redirect()->route('admin.matakuliah')->with('success', 'Mata kuliah berhasil dihapus.');
    }
}
