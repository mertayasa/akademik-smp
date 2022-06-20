<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kelas;
use App\Models\WaliKelas;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kelas = [
            [
                'kode' => 'Kelas IA',
                'jenjang' => '1',
                'kelompok' => Kelas::$kelompok[array_rand(Kelas::$kelompok)],
            ],
            [
                'kode' => 'Kelas IB',
                'jenjang' => '1',
                'kelompok' => Kelas::$kelompok[array_rand(Kelas::$kelompok)],
            ],
            [
                'kode' => 'Kelas IC',
                'jenjang' => '1',
                'kelompok' => Kelas::$kelompok[array_rand(Kelas::$kelompok)],
            ],
            [
                'kode' => 'Kelas ID',
                'jenjang' => '1',
                'kelompok' => Kelas::$kelompok[array_rand(Kelas::$kelompok)],
            ],
            [
                'kode' => 'Kelas IIA',
                'jenjang' => '2',
                'kelompok' => Kelas::$kelompok[array_rand(Kelas::$kelompok)],
            ],
            [
                'kode' => 'Kelas IIB',
                'jenjang' => '2',
                'kelompok' => Kelas::$kelompok[array_rand(Kelas::$kelompok)],
            ],
            [
                'kode' => 'Kelas IIC',
                'jenjang' => '2',
                'kelompok' => Kelas::$kelompok[array_rand(Kelas::$kelompok)],
            ],
            [
                'kode' => 'Kelas IID',
                'jenjang' => '2',
                'kelompok' => Kelas::$kelompok[array_rand(Kelas::$kelompok)],
            ],
            [
                'kode' => 'Kelas IIIA',
                'jenjang' => '3',
                'kelompok' => Kelas::$kelompok[array_rand(Kelas::$kelompok)],
            ],
            [
                'kode' => 'Kelas IIIB',
                'jenjang' => '3',
                'kelompok' => Kelas::$kelompok[array_rand(Kelas::$kelompok)],
            ],
            [
                'kode' => 'Kelas IIIC',
                'jenjang' => '3',
                'kelompok' => Kelas::$kelompok[array_rand(Kelas::$kelompok)],
            ],
            [
                'kode' => 'Kelas IIID',
                'jenjang' => '3',
                'kelompok' => Kelas::$kelompok[array_rand(Kelas::$kelompok)],
            ],
        ];
        foreach ($kelas as $data) {
            Kelas::updateOrCreate(['kode' => $data['kode']], $data);
        }
    }
}
