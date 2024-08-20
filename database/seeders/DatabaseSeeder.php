<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminSeeder::class);
        $this->call(IdentityWebsiteSeeder::class);
        $this->call(SocialMediaSeeder::class);
        $this->call(RelatedLinksSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(InformationCategorySeeder::class);
        $this->call(AgendaSeeder::class);
        $this->call(PageSeeder::class);
    }
}
