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
            'name' => 'UPTD LABBK Sumsel',
            'name_brands' => 'Facebook',
            'url' => '',
            'icon' => 'fa-brands fa-facebook-f',
            'background' => '#36528C',
        ]);
        SocialMedia::create([
            'name' => 'UPTD LABBK Sumsel',
            'name_brands' => 'Instagram',
            'url' => '',
            'icon' => 'fa-brands fa-instagram',
            'background' => '#C13282',
        ]);
        SocialMedia::create([
            'name' => 'UPTD LABBK Sumsel',
            'name_brands' => 'Youtube',
            'url' => '',
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
