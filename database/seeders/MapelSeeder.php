<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mapel;

class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mapel = [
            [
                'nama' => 'Matematika',
                'kelompok' => Mapel::$kelompok[array_rand(Mapel::$kelompok)],
                'paket' => Mapel::$paket[array_rand(Mapel::$paket)],
            ],
            [
                'nama' => 'Bahasa Indonesia',
                'kelompok' => Mapel::$kelompok[array_rand(Mapel::$kelompok)],
                'paket' => Mapel::$paket[array_rand(Mapel::$paket)],
            ],
            [
                'nama' => 'Pendidikan Kewarganegaraan',
                'kelompok' => Mapel::$kelompok[array_rand(Mapel::$kelompok)],
                'paket' => Mapel::$paket[array_rand(Mapel::$paket)],
            ],
            [
                'nama' => 'IPA',
                'kelompok' => Mapel::$kelompok[array_rand(Mapel::$kelompok)],
                'paket' => Mapel::$paket[array_rand(Mapel::$paket)],
            ],
            [
                'nama' => 'IPS',
                'kelompok' => Mapel::$kelompok[array_rand(Mapel::$kelompok)],
                'paket' => Mapel::$paket[array_rand(Mapel::$paket)],
            ],
            [
                'nama' => 'Olahraga',
                'kelompok' => Mapel::$kelompok[array_rand(Mapel::$kelompok)],
                'paket' => Mapel::$paket[array_rand(Mapel::$paket)],
            ],
            [
                'nama' => 'Bahasa Inggris',
                'kelompok' => Mapel::$kelompok[array_rand(Mapel::$kelompok)],
                'paket' => Mapel::$paket[array_rand(Mapel::$paket)],
            ],
            [
                'nama' => 'Bahasa Bali',
                'kelompok' => Mapel::$kelompok[array_rand(Mapel::$kelompok)],
                'paket' => Mapel::$paket[array_rand(Mapel::$paket)],
            ],
        ];
        foreach ($mapel as $data) {
            Mapel::updateOrCreate(['nama' => $data['nama']], $data);
        }
    }
}
