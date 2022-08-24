<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(CategorySeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(CitySeeder::class);
        $this->call(ServicePointSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ExchangeRateSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(ApplicationSeeder::class);
        $this->call(NewsSeeder::class);
        $this->call(ServiceSliderSeeder::class);
        $this->call(ServiceAdvantagesSeeder::class);
        $this->call(ServiceNumberSeeder::class);
        $this->call(SuccessStoriesSeeder::class);
        $this->call(BoardDirectorsSeeder::class);
        $this->call(BoardDirectorsInfoSeeder::class);
    }
}
