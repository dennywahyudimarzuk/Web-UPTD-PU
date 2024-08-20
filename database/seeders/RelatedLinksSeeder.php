<?php

namespace Database\Seeders;

use App\Models\RelatedLinks;
use Illuminate\Database\Seeder;

class RelatedLinksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RelatedLinks::create([
            'name' => 'Pemprov Sumsel',
            'url' => 'https://sumselprov.go.id/',
        ]);
        RelatedLinks::create([
            'name' => 'Diskominfo Sumsel',
            'url' => 'https://kominfo.sumselprov.go.id/',
        ]);
        RelatedLinks::create([
            'name' => 'PPID Sumsel',
            'url' => 'https://ppid.sumselprov.go.id/',
        ]);
    }
}
