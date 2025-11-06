<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Tambahkan ini

class OperatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Mendapatkan timestamp saat ini
        $now = now(); 

        User::insert([
            [
                'name'              => 'Tim Otsus PPS',
                'email'             => 'bapperida.pps@gmail.com',
                'password'          => bcrypt('otsus@2025'),
                'kontak'            => '082399770016',
                'is_admin'          => 1,
                'opd_id'            => 21,
                'email_verified_at' => $now, // Disarankan
                'created_at'        => $now, // Disarankan
                'updated_at'        => $now, // Disarankan
            ],
            [
                'name'              => 'Syahrul',
                'email'             => 'dinkes.pps@gmail.com',
                'password'          => bcrypt('dinkes@2025'),
                'kontak'            => '082393123123',
                'is_admin'          => 0,
                'opd_id'            => 2,
                'email_verified_at' => $now, // Disarankan
                'created_at'        => $now, // Disarankan
                'updated_at'        => $now, // Disarankan
            ],
            [
                'name'              => 'Rocky',
                'email'             => 'dpupr.pps@gmail.com',
                'password'          => bcrypt('dpupr@2025'),
                'kontak'            => '082393145623',
                'is_admin'          => 0,
                'opd_id'            => 10,
                'email_verified_at' => $now, // Disarankan
                'created_at'        => $now, // Disarankan
                'updated_at'        => $now, // Disarankan
            ]
        ]);
    }
}