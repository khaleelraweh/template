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

        $this->call(SiteSettingSeeder::class);

        $this->call(EntrustSeeder::class);


        $this->call(TagSeeder::class);
        $this->call(PhotoSeeder::class);
        $this->call(SpecializationSeeder::class);

        $this->call(MainSliderSeeder::class);
        $this->call(AdvSliderSeeder::class);

        $this->call(WebMenuSeeder::class);
        $this->call(CompanyMenuSeeder::class);
        $this->call(TopicsMenuSeeder::class);
        $this->call(TracksMenuSeeder::class);
        $this->call(SupportMenuSeeder::class);

        $this->call(PageCategorySeeder::class);
        $this->call(PageSeeder::class);

        $this->call(PostSeeder::class);
        $this->call(newsSeeder::class);
        $this->call(AdvsSeeder::class);
        $this->call(EventSeeder::class);

        $this->call(AlbumsSeeder::class);
        $this->call(PlaylistSeeder::class);
    }
}
