<?php

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
        // $this->call(UsersTableSeeder::class);
        $this->call(CTypesTableSeeder::class);
        $this->call(CBloodsTableSeeder::class);
        $this->call(CReligionTableSeeder::class);
        $this->call(CMstatusesTableSeeder::class);
        $this->call(CEchelonTableSeeder::class);
        $this->call(CProvincesTableSeeder::class);

        $this->command->info('All table seeded!');
    }
}
