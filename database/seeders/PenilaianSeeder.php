<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PenilaianSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 0; $i < 20; $i++) {
            \App\Models\Penilaian::create([
                'nama_aparatur' => fake()->name(),
                'jabatan' => fake()->randomElement([
                    'Pamong', 
                    'Dukuh', 
                    'Lurah', 
                    'Kapanewon'
                    ]),
                'nilai' => fake()->numberBetween(60, 100),
                'keterangan' => fake()->randomElement([
                    'Sangat Baik', 
                    'Baik', 
                    'Cukup'
                    ]),
            ]);
        }
    }
}
