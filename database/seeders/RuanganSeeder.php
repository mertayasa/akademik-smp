<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 25; $i++) {
            $ruangan = [
                'nama' => 'Ruangan ' . ($i < 10 ? '0' . $i : $i),
            ];
            \App\Models\Ruangan::updateOrCreate(['nama' => $ruangan['nama']], $ruangan);
        }
    }
}
