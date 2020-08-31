<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $calonJftRoles = [
            'Menyiapkan bahan perlengkapan yang diperlukan untuk melancarkan kegiatan pemeriksaan keimigrasian di Tempat Pemeriksaan Imigrasi',
            'Mencatat kebutuhan bahan dalam kegiatan pemeriksaan keimigrasian di Tempat Pemeriksaan Imigrasi',
            'Mencatat permasalahan dalam kegiatan pemeriksaan keimigrasian di Tempat Pemeriksaan Imigrasi',
            'Mencatat kegiatan pemeriksaan keimigrasian di Tempat Pemeriksaan Imigrasi yang telah selesai dilaksanakan',
            'Mencatat pengaduan dalam pemeriksaan keimigrasian di Tempat Pemeriksaan Imigrasi',
            'Melaksanakan penertiban antrean pemeriksaan keimigrasian di Tempat Pemeriksaan Imigrasi dan atau Area Imigrasi',
            'Menyiapkan bahan laporan keberangkatan dan atau kedatangan penumpang di Tempat Pemeriksaan Imigrasi',
            'Menyiapkan bahan tindakan keimigrasian pada Tempat Pemeriksaan Imigrasi',
            'Membuat laporan pelaksanaan tugas harian',
        ];

        foreach ($calonJftRoles as $key => $value) {

            DB::table('roles')->insert([
                'role_desc' => $value,
            ]);    
        }


        
    }
}
