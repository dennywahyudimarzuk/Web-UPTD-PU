<?php

namespace Database\Seeders;

use App\Models\SocialMedia;
use Illuminate\Database\Seeder;

class SocialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SocialMedia::create([
            'name' => 'Disdukcapil Sumsel',
            'name_brands' => 'Facebook',
            'url' => 'https://www.facebook.com/pages/Dinas-Kependudukan-dan-Pencatatan-Sipil-prov-Sumsel/212542689444746',
            'icon' => 'fa-brands fa-facebook-f',
            'background' => '#36528C',
        ]);
        SocialMedia::create([
            'name' => 'Disdukcapil Sumsel',
            'name_brands' => 'Instagram',
            'url' => 'https://www.instagram.com/disdukcapilprovsumsel/',
            'icon' => 'fa-brands fa-instagram',
            'background' => '#C13282',
        ]);
        SocialMedia::create([
            'name' => 'Disdukcapil Sumsel',
            'name_brands' => 'Youtube',
            'url' => 'https://www.youtube.com/@disdukcapilsumsel',
            'icon' => 'fa-brands fa-youtube',
            'background' => '#DE4B39',
        ]);
        // SocialMedia::create([
        //     'name' => 'DPMD Sumsel',
        //     'name_brands' => 'Tiktok',
        //     'url' => '-',
        //     'icon' => 'fa-brands fa-tiktok',
        //     'background' => '#000000',
        // ]);
    }
}
