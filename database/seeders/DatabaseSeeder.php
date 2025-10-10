<?php

namespace Database\Seeders;

use App\Models\Opd;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        
        // Seeder Data OPD
        Opd::insert([
            [   'nama_opd' => 'Inspektorat Daerah', 
                'kode_opd' => 'INSKEPTORAT',
                'alamat_opd' => 'Papua Selatan'
            ],
            [
                'nama_opd' => 'Dinas Kesehatan, Pengendalian Penduduk Dan Keluarga Berencana',
                 'kode_opd' => 'DINKESPKKB',
                 'alamat_opd' => 'Papua Selatan'
            ],
            [
                'nama_opd' => 'Dinas Pendidikan Dan Kebudayaan',
                'kode_opd' => 'DISDIKBUD',
                'alamat_opd' => 'Papua Selatan'
            ],
            [
                'nama_opd' => 'Dinas Administrasi Kependudukan Dan Pencatatan Sioil, Pemberdayaan Masyarakat Dan Kampung',
                'kode_opd' => 'DUKCAPIL',
                'alamat_opd' => 'Papua Selatan'
            ],
            [
                'nama_opd' => 'Dinas Kepemudaan Dan Olahraga Pariwisata Dan Ekonomi Kreatif', 
                'kode_opd' => 'DISPORAPAREKRAF',
                'alamat_opd' => 'Papua Selatan'
            ],
            [
                'nama_opd' => 'Badan Keegawaian Dan Pengembangan Sumber Daya Manusia', 
                'kode_opd' => 'BKPSDM',
                'alamat_opd' => 'Papua Selatan'
            ],
            [
                'nama_opd' => 'Dinas Koperasi Usaha Kecil Dan Menengah Perindustrian Dan Perdagangan', 
                'kode_opd' => 'DISKOPERINDAG',
                'alamat_opd' => 'Papua Selatan'
            ],
            [
                'nama_opd' => 'Dinas Pangan Pertanian Kelautan Dan Perikanan', 
                'kode_opd' => 'DISPANGKELKAN',
                'alamat_opd' => 'Papua Selatan'
            ],
            [
                'nama_opd' => 'Dinas Komunikasi Dan Informasi, Statistik Dan Persandian', 
                'kode_opd' => 'DISKOMINFO',
                'alamat_opd' => 'Papua Selatan'
            ],
            [
                'nama_opd' => 'Dinas Pekerjaan Umum Dan Perumahan Rakyat', 
                'kode_opd' => 'DISPUPR',
                'alamat_opd' => 'Papua Selatan'
            ],
            [
                'nama_opd' => 'Dinas Perhubungan', 
                'kode_opd' => 'DISHUB',
                'alamat_opd' => 'Papua Selatan'
            ],
            [
                'nama_opd' => 'Badan Kesatuan Bangsa Dan Politik', 
                'kode_opd' => 'KESBANGPOL',
                'alamat_opd' => 'Papua Selatan'
            ],
            [
                'nama_opd' => 'Dinas Tenaga Kerja, Transmigrasi, Energi Dan Sumber Daya Mineral', 
                'kode_opd' => 'DISNAKERTRANSESDM',
                'alamat_opd' => 'Papua Selatan'
            ],
            [
                'nama_opd' => 'Sekretariat Majelis Rakyat Papua Selatan', 
                'kode_opd' => 'MRPPS',
                'alamat_opd' => 'Papua Selatan'
            ],
            [
                'nama_opd' => 'Sekretariat Dewan Perwakilan Daerah', 
                'kode_opd' => 'SETWAN',
                'alamat_opd' => 'Papua Selatan'
            ],
            [
                'nama_opd' => 'Dinas Sosial, Pemberdayaan Perempuan Dan Perlindungan Anak', 
                'kode_opd' => 'DINSOSP3A',
                'alamat_opd' => 'Papua Selatan'
            ],
            [
                'nama_opd' => 'Biro Pengadaan Barang Dan Jasa', 
                'kode_opd' => 'SETDABARJAS',
                'alamat_opd' => 'Papua Selatan'
            ],
            [
                'nama_opd' => 'Biro Pemerintahan, Otonomi Khusus Dan Kesra', 
                'kode_opd' => 'SETDABIROPEM',
                'alamat_opd' => 'Papua Selatan'
            ],
            [
                'nama_opd' => 'Dinas Kebakaran Dan Penyelematan, Penanggulangan Bencana Dan Satpol', 
                'kode_opd' => 'DAMKARPP',
                'alamat_opd' => 'Papua Selatan'
            ],
            [
                'nama_opd' => 'Badan Perencanaan Pembangunan Riset Dan Inovasi Daerah', 
                'kode_opd' => 'BAPPERIDA',
                'alamat_opd' => 'Papua Selatan'
            ],
            ]);


        // Seeder Data User
        User::factory()->create([
            'name'      => 'Andika Riski',
            'email'     => 'dika.pps@gmail.com',
            'password'  =>  bcrypt('12345678'),
            'kontak'    => '082399770016',
            'is_admin'  => 1,
            'opd_id'    => 20
        ]);


        User::factory()->create([
            'name'      => 'Joko Mulyono',
            'email'     => 'dinkes.pps@gmail.com',
            'password'  =>  bcrypt('12345678'),
            'kontak'    => '082393123123',
            'is_admin'  => 0,
            'opd_id'    => 2
        ]);

    }
}
