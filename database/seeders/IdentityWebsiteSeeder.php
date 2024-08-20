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
            'name' => 'Dinas Kependudukan dan Pencatatan Sipil Provinsi Sumatera Selatan',
            'icon' => 'logosumsel.png',
            'logo' => 'capil.png',
            'content' => 'Website ini merupakan bagian dari upaya penguatan sistem akuntabilitas kinerja Dinas Kependudukan dan Pencatatan Sipil Provinsi Sumatera Selatan. Diharapkan dengan adanya website ini menjadi bahan penilaian bagi masyarakat, pemangku kepentingan dan umpan balik bagi jajaran Dinas Kependudukan dan Pencatatan Sipil Provinsi Sumatera Selatan untuk meningkatkan kinerja masing-masing unit kerja di masa yang akan datang.',
            'address' => 'Jl. Kapten Anwar Sastro, Sungai Pangeran, Kec. Ilir Timur I, Kota Palembang, Sumatera Selatan',
            'maps' => '<iframe class = "footer-widget" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63749.27702621148!2d104.70953836409281!3d-3.0056468258992535!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e3b75df9368583f%3A0x6b5c69f3f65889f0!2sKantor%20Dinas%20Kependudukan%20Dan%20Catatan%20Sipil%20Provinsi%20Sumatera%20Selatan!5e0!3m2!1sid!2sid!4v1707828867660!5m2!1sid!2sid" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            'no_tlp' => '(0711) -',
        ]);
    }
}
