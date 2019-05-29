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
        $this->command->info('Creating some Fake data');
        $this->call(CategoriesTableSeeder::class);
        $this->call(JobTypesTableSeeder::class);
        $this->call(JobsTableSeeder::class);
    }
}
