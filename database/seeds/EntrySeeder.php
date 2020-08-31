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
                'Mempersiapkan data pendukung untuk laporan kedatangan warga negara calling visa.',
                'Membuat rekapitulasi data WNA dan WNI yang telah melewati pemeriksaan imigrasi sesuai prosedur.',
                'Memastikan mesin autogate berfungsi dengan baik, menyiapkan dan merapikan line antrian serta membantu petugas counter yang membutuhkan bantuan.',
                'Mengkomunikasikan kepada penumpang untuk mempersiapkan dokumen keimigrasian untuk memperlancar pelayanan.',
            ],
            2 => [
                'Mencatat kebutuhan refill tinta untuk stamp yang disediakan untuk kemudian dikomunikasikan.',
                'Membuat daftar catatan di terminal kedatangan yang berisi WNA yang masuk hit interpol, kehilangan boarding pass, paspor rusak, calling Visa, dan masa berlaku kurang dari 6 bulan.',
                'Memperhatikan dan mencatat semua bahan yang dibutuhkan setiap counter dalam melakukan pemeriksaan keimigrasian agar berjalan dengan lancar',
                'Mencatat kebutuhan isi ulang tinta stamp di setiap counter',
            ],
            3 => [
                'Mengarahkan pengaduan ke office.',
                'Mencatat permasalahan dan kendala selama proses pemeriksaan',
                'Memperhatikan dan mencatat semua bahan yang dibutuhkan setiap counter dalam melakukan pemeriksaan keimigrasian agar berjalan dengan lancar.',
                'Mencatat jenis-jenis paspor dan security features, larangan yang tidak dipatuhi WNA saat dan setelah pemeriksaan Keimigrasian (memakai topi, kacamata hitam dan handphone, mengambil gambar/foto/video).',
            ],
            4 => [
                'Mencatat jenis-jenis paspor dan security features.',
                'Mencatat pertanyaan-pertanyaan dasar wawancara untuk WNA.',
                'Mencatat bahan atau perlengkapan yang dibutuhkan saat pemeriksaan keimigrasian pada masing-masing counter yakni foreigner, Indonesia, dan crew airlines (paspor, boarding pass, KITAS/KITAP, ABTC, General Declarationdan Crew Card atau surat-surat kelengkapan lainnya).',
                'Mencatat dan mendokumentasikan dokumen keimigrasian serta izin tinggal yang diberikan.',
            ],
            5 => [
                'Mencatat aduan penumpang saat berada di barisan atau antrean sebelum pemeriksaan keimigrasian dan setelah dilakukan pemeriksaan keimigrasian di counter.',
                'Membuat daftar catatan di terminal kedatangan yang berisi WNA yang masuk hit interpol, kehilangan boarding pass, paspor rusak, calling Visa, dan masa berlaku kurang dari 6 bulan.',
                'Mencatat pengaduan WNA dan WNI yang terjadi selama di Tempat Pemeriksaan Imigrasi.',
                'Mencatat aduan penumpang saat berada di area pemeriksaan lalu mengkomunikasikannya ke atasan.',
            ],
            6 => [
                'Merapikan tiang line antrian, menyiapkan stamp di konter area keberangkatan, memastikan layar informasi berfungsi dengan baik.',
                'Menulis laporan kegiatan keimigrasian, permasalahan, penertiban antrian dan bahan tindakan keimigrasian.',
                'Mengarahkan WNA ke antrean sesuai jenis paspornya.',
                'Melakukan klasifikasi antrian berdasarkan izin tinggal yang diberikan',
            ],
            7 => [
                'Menyiapkan bahan yang diperlukan untuk membantu kelancaran kegiatan pemeriksaan keimigrasian dengan cara memastikan mesin autogate bisa digunakan dengan baik, menyiapkan line antrian serta membantu petugas counter yang membutuhkan.',
                'Menyiapkan bahan tindakan keimigrasiaan manifest penumpang di kedatangan/keberangkatan.',
                'Mencatat dan mendokumentasikan dokumen keimigrasian serta izin tinggal yang diberikan.',
                ' Membuat laporan di terminal keberangkatan yang berisi WNA overstay.',
            ],
            8 => [
                'Menulis laporan kegiatan keimigrasian, permasalahan, penertiban antrian dan bahan tindakan keimigrasian.',
                'Mengingatkan antrean untuk menyiapkan paspor dan boarding pass Menulis laporan kegiatan keimigrasian, permasalahan, penertiban antrian dan bahan tindakan keimigrasian.',
                'Mempersiapkan data untuk laporan penindakan keimigrasian bagi penumpang di terminal keberangkatan yang melanggar masa berlaku izin tinggalnya.',
                'Membuat daftar catatan di terminal kedatangan yang berisi WNA yang masuk hit interpol, kehilangan boarding pass, paspor rusak, calling Visa, masa berlaku kurang dari 6 bulan, mesin autogate error.',
            ],
            9 => [
                'Mengisi jurnal harian pada aplikasi SIMPEG KEMENKUMHAM.',
                'Membuat daftar isian pada jurnal harian',
                'Menulis jurnal harian di aplikasi simpeg',
                'Mencatat lalu menuliskannya di aplikasi SIMPEG',
            ],


        );

        foreach ($entries as $key => $value) {
            foreach ($value as $entry) {
                DB::table('entries')->insert([
                    'role_id' => $key,
                    'entry_desc' => $entry,
                ]);
            }
        }
    }
}
