<?php

namespace Database\Seeders;

use App\Models\Kontrol;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KontrolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Kontrol::insert([
            // Kontrol akses RAP
            [
                'tipe' => 'RAP_Akses',
                'status' => 'Tutup', // default
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Kontrol status RAP
            [
                'tipe' => 'RAP_Status',
                'status' => 'RAP Awal', // default
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
