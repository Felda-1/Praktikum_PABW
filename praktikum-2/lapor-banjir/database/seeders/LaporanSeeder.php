<?php

namespace Database\Seeders;

use App\Models\Laporan;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Seeder;

class LaporanSeeder extends Seeder
{
    /**
     * Seed data dummy laporan banjir.
     */
    public function run(): void
    {
        $faker = FakerFactory::create('id_ID');

        $kecamatan = ['Dayeuhkolot', 'Baleendah', 'Bojongsoang', 'Rancaekek', 'Majalaya'];

        // Rentang tinggi genangan digilir agar status Waspada, Siaga, dan Awas
        // selalu muncul (tetap acak di dalam rentang 10–150 cm).
        $rentang = [[10, 29], [30, 70], [71, 150]];

        // Hindari data dobel saat seeder dijalankan ulang.
        Laporan::truncate();

        for ($i = 0; $i < 18; $i++) {
            [$min, $max] = $rentang[$i % 3];

            Laporan::create([
                'nama_pelapor'     => $faker->name(),
                'lokasi'           => 'Kec. ' . $faker->randomElement($kecamatan),
                'tinggi_genangan'  => $faker->numberBetween($min, $max),
                'tanggal_kejadian' => $faker->dateTimeBetween('-1 month', 'now')->format('Y-m-d'),
            ]);
        }
    }
}
