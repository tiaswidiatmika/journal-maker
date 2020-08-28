<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EntrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $entries = array(
            1 => [
                'Memastikan mesin autogate berfungsi dengan baik, menyiapkan dan merapikan line antrian serta membantu petugas counter yang membutuhkan bantuan.',
                "Mengkomunikasikan kepada penumpang untuk mempersiapkan dokumen keimigrasian untuk memperlancar pelayanan",
            ],
            2 => [
                'Memperhatikan dan mencatat semua bahan yang dibutuhkan setiap counter dalam melakukan pemeriksaan keimigrasian agar berjalan dengan lancar',
                'Memperhatikan dan mencatat semua bahan yang dibutuhkan setiap counter dalam melakukan pemeriksaan keimigrasian agar berjalan dengan lancar'
            ],  
        );

        foreach ($entries as $key => $value) {
            foreach ($value as $entry) {
                DB::table('entries')->insert([
                    'entry_desc' => $entry,
                ]);
            }
        }
    }
}
