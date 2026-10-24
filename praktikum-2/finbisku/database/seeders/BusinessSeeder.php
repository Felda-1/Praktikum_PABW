<?php

namespace Database\Seeders;

use App\Models\Business;
use App\Models\Transaction;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class BusinessSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Factory::create('id_ID');
        $userId = User::query()->value('id');

        // Dikosongkan dulu supaya `db:seed` bisa dijalankan berulang (kolom email unique).
        Schema::disableForeignKeyConstraints();
        Transaction::truncate();
        Business::truncate();
        Schema::enableForeignKeyConstraints();

        $jenis = ['Kuliner', 'Minuman', 'Fashion', 'Jasa', 'Lainnya'];

        for ($i = 0; $i < 10; $i++) {
            Business::create([
                'user_id' => $userId,
                'nama' => $faker->unique()->company(),
                'jenis' => $faker->randomElement($jenis),
                'kota' => $faker->city(),
                'alamat' => $faker->address(),
                'no_telepon' => $faker->phoneNumber(),
                'email' => $faker->unique()->companyEmail(),
                'deskripsi' => $faker->sentence(10),
            ]);
        }
    }
}