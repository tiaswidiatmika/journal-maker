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
            [
                'desc' => 'Menyiapkan bahan perlengkapan yang diperlukan untuk melancarkan kegiatan pemeriksaan keimigrasian di Tempat Pemeriksaan Imigrasi',
                'target' => 12,
            ],
            [
                'desc' => 'Mencatat kebutuhan bahan dalam kegiatan pemeriksaan keimigrasian di Tempat Pemeriksaan Imigrasi',
                'target' => 24,
            ],
            [
                'desc' => 'Mencatat permasalahan dalam kegiatan pemeriksaan keimigrasian di Tempat Pemeriksaan Imigrasi',
                'target' => 240,
            ],
            [
                'desc' => 'Mencatat kegiatan pemeriksaan keimigrasian di Tempat Pemeriksaan Imigrasi yang telah selesai dilaksanakan',
                'target' => 240,
            ],

            [
                'desc' => 'Mencatat pengaduan dalam pemeriksaan keimigrasian di Tempat Pemeriksaan Imigrasi',
                'target' => 24,
            ],
            [
                'desc' => 'Melaksanakan penertiban antrean pemeriksaan keimigrasian di Tempat Pemeriksaan Imigrasi dan atau Area Imigrasi',
                'target' =>240,
            ],
            [
                'desc' => 'Menyiapkan bahan laporan keberangkatan dan atau kedatangan penumpang di Tempat Pemeriksaan Imigrasi',
                'target' => 24,
            ],
            [
                'desc' => 'Menyiapkan bahan tindakan keimigrasian pada Tempat Pemeriksaan Imigrasi',
                'target' => 240,
            ],
            [
                'desc' => 'Membuat laporan pelaksanaan tugas harian',
                'target' => 240,
            ],
        ];

        foreach ($calonJftRoles as $key => $value) {

            DB::table('roles')->insert([
                'role_desc' => $value['desc'],
                'target' => $value['target'],
            ]);    
        }


        
    }
}
