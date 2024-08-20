<?php

namespace Database\Seeders;

use App\Models\Agenda;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class AgendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Agenda::create([
            'activity_time' => '2023-11-08',
            'title' => 'Pentupan Pelatihan Peningkatan Kapasitas Aparatur Desa Dan Pengurus Kelembagaan Desa',
            'user_id' => 1
        ]);
        
    }
}
