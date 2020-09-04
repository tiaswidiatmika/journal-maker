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
                'unit' => 'Kegiatan',
            ],
            [
                'desc' => 'Mencatat kebutuhan bahan dalam kegiatan pemeriksaan keimigrasian di Tempat Pemeriksaan Imigrasi',
                'target' => 24,
                'unit' => 'Kegiatan',
            ],
            [
                'desc' => 'Mencatat permasalahan dalam kegiatan pemeriksaan keimigrasian di Tempat Pemeriksaan Imigrasi',
                'target' => 240,
                'unit' => 'Kegiatan',
            ],
            [
                'desc' => 'Mencatat kegiatan pemeriksaan keimigrasian di Tempat Pemeriksaan Imigrasi yang telah selesai dilaksanakan',
                'target' => 240,
                'unit' => 'Kegiatan',
            ],

            [
                'desc' => 'Mencatat pengaduan dalam pemeriksaan keimigrasian di Tempat Pemeriksaan Imigrasi',
                'target' => 24,
                'unit' => 'Kegiatan',
            ],
            [
                'desc' => 'Melaksanakan penertiban antrean pemeriksaan keimigrasian di Tempat Pemeriksaan Imigrasi dan atau Area Imigrasi',
                'target' =>240,
                'unit' => 'Kegiatan',
            ],
            [
                'desc' => 'Menyiapkan bahan laporan keberangkatan dan atau kedatangan penumpang di Tempat Pemeriksaan Imigrasi',
                'target' => 24,
                'unit' => 'Berkas',
            ],
            [
                'desc' => 'Menyiapkan bahan tindakan keimigrasian pada Tempat Pemeriksaan Imigrasi',
                'target' => 240,
                'unit' => 'Kegiatan',
            ],
            [
                'desc' => 'Membuat laporan pelaksanaan tugas harian',
                'target' => 240,
                'unit' => 'Laporan',
            ],
        ];

        foreach ($calonJftRoles as $key => $value) {

            DB::table('roles')->insert([
                'employee_type_id' => 1,
                'unit' => $value['unit'],
                'role_desc' => $value['desc'],
                'target' => $value['target'],
            ]);    
        }


        
    }
}
