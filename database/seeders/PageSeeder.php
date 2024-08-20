<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::create([
            'title' => 'Tugas Pokok dan Fungsi',
            'content' => 'tugaspokok-dan-fungsi',
            'template' => 'page-satu',
            'user_id' => 1
        ]);
        Page::create([
            'title' => 'Visi Misi',
            'content' => 'Visi Misi',
            'template' => 'page-satu',
            'user_id' => 1
        ]);
        Page::create([
            'title' => 'Struktur Organisasi',
            'content' => 'fotokegiatan.png',
            'template' => 'page-dua',
            'user_id' => 1
        ]);
        // Page::create([
        //     'title' => 'DPMD',
        //     'template' => 'berita.index',
        //     'user_id' => 1
        // ]);
        // Page::create([
        //     'title' => 'Sumsel',
        //     'template' => 'berita.index',
        //     'user_id' => 1
        // ]);
        // Page::create([
        //     'title' => 'Setiap Saat',
        //     'template' => 'informasi.index',
        //     'user_id' => 1
        // ]);
        // Page::create([
        //     'title' => 'Berkala',
        //     'template' => 'informasi.index',
        //     'user_id' => 1
        // ]);
        // Page::create([
        //     'title' => 'Serta Merta',
        //     'template' => 'informasi.index',
        //     'user_id' => 1
        // ]);
        
    }
}
