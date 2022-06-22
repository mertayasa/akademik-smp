<?php

namespace Database\Seeders;

use App\Models\AnggotaKelas;
use App\Models\Mapel;
use Illuminate\Database\Seeder;
use App\Models\Nilai;
use Faker\Factory as Faker;

class NilaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Nilai::factory()->count(20)->create();

        $faker = Faker::create('id_ID');
        $anggota_kelas = AnggotaKelas::all();
        $mapel = Mapel::inRandomOrder()->take(3)->get();
        foreach($mapel as $map){
            foreach ($anggota_kelas as $key => $anggota) {
                Nilai::create([
                    'id_anggota_kelas' => $anggota->id,
                    'id_mapel' => $map->id,
                    'semester' => 'ganjil',
                    'ulha1_p' => rand(56, 99),
                    'ulha2_p' => rand(56, 99),
                    'ulha3_p' => rand(56, 99),
                    // 'ulha4_p' => rand(56, 99),
                    'ulha1_k' => rand(56, 99),
                    'ulha2_k' => rand(56, 99),
                    'ulha3_k' => rand(56, 99),
                    // 'ulha4_k' => rand(56, 99),
                    'pts' => rand(56, 99),
                    'pas' => rand(56, 99),
                    'desk_pengetahuan' => $faker->sentence(),
                    'desk_keterampilan' => $faker->sentence(),
                ]);
            }
        }
        foreach($mapel as $map){
            foreach ($anggota_kelas as $key => $anggota) {
                Nilai::create([
                    'id_anggota_kelas' => $anggota->id,
                    'id_mapel' => $map->id,
                    'semester' => 'genap',
                    'ulha1_p' => rand(56, 99),
                    'ulha2_p' => rand(56, 99),
                    'ulha3_p' => rand(56, 99),
                    // 'ulha4_p' => rand(56, 99),
                    'ulha1_k' => rand(56, 99),
                    'ulha2_k' => rand(56, 99),
                    'ulha3_k' => rand(56, 99),
                    // 'ulha4_k' => rand(56, 99),
                    'pts' => rand(56, 99),
                    'pas' => rand(56, 99),
                    'desk_pengetahuan' => $faker->sentence(),
                    'desk_keterampilan' => $faker->sentence(),
                ]);
            }
        }
    }
}
