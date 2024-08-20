<?php

namespace Database\Seeders;

use App\Models\IdentityWebsite;
use Illuminate\Database\Seeder;

class IdentityWebsiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        IdentityWebsite::create([
            'name' => 'UPTD Laboratorium Bahan Konstruksi Dinas PUBMTR Prov. Sumatera Selatan',
            'icon' => '',
            'logo' => '',
            'content' => 'Website ini merupakan bagian dari upaya penguatan sistem akuntabilitas kinerja UPTD Laboratorium Bahan Konstruksi Dinas Pekerjaan Umum Bina Marga dan Tata Ruang Provinsi Sumatera Selatan. Diharapkan dengan adanya website ini menjadi bahan penilaian bagi masyarakat, pemangku kepentingan dan umpan balik bagi jajaran UPTD Laboratorium Bahan Konstruksi Dinas Pekerjaan Umum Bina Marga dan Tata Ruang Provinsi Sumatera Selatan untuk meningkatkan kinerja masing-masing unit kerja di masa yang akan datang.',
            'address' => 'Jl. Kolonel Sulaiman Amin KM.7 Talang Buruk , Palembang Sumatera Selatan',
            'maps' => '<iframe class = "footer-widget" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d270.4203248685289!2d104.72041739423514!3d-2.940606345620928!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e3b7524d02ef77d%3A0xbfeeb5a7d952157d!2sUPTD%20Laboratorium%20Bahan%20Konstruksi!5e0!3m2!1sid!2sid!4v1724122508130!5m2!1sid!2sid" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            'no_tlp' => '(0711) -',
        ]);
    }
}
