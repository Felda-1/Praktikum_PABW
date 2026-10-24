<?php

namespace Database\Seeders;

use App\Models\Business;
use App\Models\Transaction;
use Faker\Factory;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Factory::create('id_ID');

        $kategoriMasuk = ['Penjualan', 'Modal'];
        $kategoriKeluar = ['Bahan baku', 'Gaji', 'Sewa', 'Listrik dan air', 'Pemasaran', 'Lainnya'];

        Business::all()->each(function (Business $usaha) use ($faker, $kategoriMasuk, $kategoriKeluar) {
            for ($i = 0; $i < 5; $i++) {
                $masuk = $faker->boolean(60);

                Transaction::create([
                    'business_id' => $usaha->id,
                    'jenis' => $masuk ? 'pemasukan' : 'pengeluaran',
                    'kategori' => $faker->randomElement($masuk ? $kategoriMasuk : $kategoriKeluar),
                    'jumlah' => $faker->numberBetween(10, 3000) * 1000,
                    'tanggal' => $faker->dateTimeBetween('-60 days', 'now')->format('Y-m-d'),
                    'keterangan' => $faker->optional(0.8)->words(3, true),
                ]);
            }
        });
    }
}