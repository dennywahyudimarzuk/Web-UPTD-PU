<?php

namespace Database\Seeders;

use App\Models\InformationCategory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class InformationCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        InformationCategory::create([
            'name' => 'Informasi Serta Merta',
            'user_id' => 1
        ]);
        InformationCategory::create([
            'name' => 'Informasi Berkala',
            'user_id' => 1
        ]);
        InformationCategory::create([
            'name' => 'Informasi Setiap Saat',
            'user_id' => 1
        ]);
        InformationCategory::create([
            'name' => 'Sakip',
            'user_id' => 1
        ]);
        InformationCategory::create([
            'name' => 'Rencana Strategis',
            'user_id' => 1
        ]);
        InformationCategory::create([
            'name' => 'Rencana Kinerja Tahunan',
            'user_id' => 1
        ]);
        InformationCategory::create([
            'name' => 'Indikator Kinerja Utama',
            'user_id' => 1
        ]);
        InformationCategory::create([
            'name' => 'Perjanjian Kinerja',
            'user_id' => 1
        ]);        
    }
}
