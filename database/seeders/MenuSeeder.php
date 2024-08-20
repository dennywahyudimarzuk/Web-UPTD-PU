<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\MenuChild;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menu::create([
            'name' => 'Beranda',
            'url' => '/',
            'order' => 1,
            'user_id' => 1
        ]);
        Menu::create([
            'name' => 'Profil',
            'url' => '',
            'order' => 2,
            'user_id' => 1
        ]);
        Menu::create([
            'name' => 'Berita',
            'url' => '',
            'order' => 3,
            'user_id' => 1
        ]);
        Menu::create([
            'name' => 'Informasi',
            'url' => '',
            'order' => 4,
            'user_id' => 1
        ]);
        Menu::create([
            'name' => 'Galeri',
            'url' => '',
            'order' => 5,
            'user_id' => 1
        ]);
        Menu::create([
            'name' => 'Agenda',
            'url' => 'agenda',
            'order' => 6,
            'user_id' => 1
        ]);
        Menu::create([
            'name' => 'Kontak Kami',
            'url' => 'kontak-kami',
            'order' => 7,
            'user_id' => 1
        ]);

        MenuChild::create([
            'name' => 'Tugas Pokok dan Fungsi',
            'url' => 'tugaspokok-dan-fungsi',
            'menu_id' => 2,
            'page_id' => 1,
            'order' => 1,
            'user_id' => 1
        ]);
        MenuChild::create([
            'name' => 'Visi Misi',
            'url' => 'visi-misi',
            'menu_id' => 2,
            'page_id' => 2,
            'order' => 2,
            'user_id' => 1
        ]);
        MenuChild::create([
            'name' => 'Struktur Organisasi',
            'url' => 'struktur-organisasi',
            'menu_id' => 2,
            'page_id' => 3,
            'order' => 3,
            'user_id' => 1
        ]);

        MenuChild::create([
            'name' => 'Berita ',
            'url' => 'berita-uptdlabbk',
            'menu_id' => 3,
            'order' => 1,
            'user_id' => 1
        ]);
        MenuChild::create([
            'name' => 'Berita Sumsel',
            'url' => 'berita-sumsel',
            'menu_id' => 3,
            'order' => 2,
            'user_id' => 1
        ]);
        
        MenuChild::create([
            'name' => 'Sakip',
            'url' => 'sakip',
            'menu_id' => 4,
            'order' => 1,
            'user_id' => 1
        ]);
        MenuChild::create([
            'name' => 'Rencana Strategis',
            'url' => 'rencana-strategis',
            'menu_id' => 4,
            'order' => 2,
            'user_id' => 1
        ]);
        MenuChild::create([
            'name' => 'Rencana Kinerja Tahunan',
            'url' => 'rencana-kinerja-tahunan',
            'menu_id' => 4,
            'order' => 3,
            'user_id' => 1
        ]);
        MenuChild::create([
            'name' => 'Indikator Kinerja Utama',
            'url' => 'indikator-kinerja-utama',
            'menu_id' => 4,
            'order' => 4,
            'user_id' => 1
        ]);
        MenuChild::create([
            'name' => 'Perjanjian Kinerja',
            'url' => 'perjanjian-kinerja',
            'menu_id' => 4,
            'order' => 5,
            'user_id' => 1
        ]);

        MenuChild::create([
            'name' => 'Informasi Setiap Saat',
            'url' => 'setiap-saat',
            'menu_id' => 4,
            'order' => 6,
            'user_id' => 1
        ]);
        MenuChild::create([
            'name' => 'Informasi Berkala',
            'url' => 'berkala',
            'menu_id' => 4,
            'order' => 7,
            'user_id' => 1
        ]);
        MenuChild::create([
            'name' => 'Informasi Serta Merta',
            'url' => 'serta-merta',
            'menu_id' => 4,
            'order' => 8,
            'user_id' => 1
        ]);

        MenuChild::create([
            'name' => 'Foto',
            'url' => 'foto',
            'menu_id' => 5,
            'order' => 1,
            'user_id' => 1
        ]);
        MenuChild::create([
            'name' => 'Video',
            'url' => 'video',
            'menu_id' => 5,
            'order' => 2,
            'user_id' => 1
        ]);
    }
}
