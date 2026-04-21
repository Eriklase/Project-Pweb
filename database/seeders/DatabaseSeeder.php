<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Create Prodi
        $prodi = \App\Models\Prodi::create(['nama_prodi' => 'Teknik Informatika']);

        // 2. Create Semester
        $semester = \App\Models\Semester::create([
            'semester' => 'Ganjil 2023/2024',
            'is_active' => true,
        ]);

        // 3. Create Admin
        User::create([
            'name' => 'Admin SIAKAD',
            'email' => 'admin@siakad.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        // 4. Create Dosen
        $userDosen = User::create([
            'name' => 'Dr. Budi Santoso',
            'email' => 'budi@dosen.com',
            'password' => bcrypt('password'),
            'role' => 'dosen',
        ]);
        \App\Models\Dosen::create([
            'user_id' => $userDosen->id,
            'nidn' => '12345678',
            'nama' => 'Dr. Budi Santoso',
            'email' => 'budi@dosen.com',
        ]);

        // 5. Create Mahasiswa
        $userMhs = User::create([
            'name' => 'Friderikus',
            'email' => 'friderikus@mhs.com',
            'password' => bcrypt('password'),
            'role' => 'mahasiswa',
        ]);
        \App\Models\Mahasiswa::create([
            'user_id' => $userMhs->id,
            'nim' => '20210001',
            'nama' => 'Friderikus',
            'prodi_id' => $prodi->id,
            'semester' => '4',
        ]);

        // 6. Create Mata Kuliah
        $mk = \App\Models\Matakuliah::create([
            'kode_mk' => 'MK001',
            'nama_mk' => 'Pemrograman Web Lanjut',
            'sks' => 3,
        ]);

        // 7. Create Jadwal
        \App\Models\Jadwal::create([
            'matakuliah_id' => $mk->id,
            'dosen_id' => 1, // Assuming first dosen
            'semester_id' => $semester->id,
            'hari' => 'Senin',
            'jam_mulai' => '08:00',
            'jam_selesai' => '10:30',
            'ruangan' => 'Lab Komputer 1',
        ]);
    }
}
