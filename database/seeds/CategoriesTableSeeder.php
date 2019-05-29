<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();
        $this->command->info('Creating fake categories');
        DB::table('categories')->insert([
          array('id' => 'd5b5c2d8-b224-4e17-a62b-e43f76310318', 'category' => 'Frontend', 'description' => 'This means the Candidate will apply as a frontend dev', 'created_at' => now(), 'updated_at' => now()),
          array('id' => 'cf31d9b5-2cb0-4c55-9779-ab9745ee6b90', 'category' => 'Backend', 'description' => 'This means the Candidate will apply as a backend dev', 'created_at' => now(), 'updated_at' => now()),
          array('id' => 'ca4f5a40-3d4b-4ba5-8b37-d9b4b050592a', 'category' => 'Designer', 'description' => 'This means the Candidate will apply as a designer dev', 'created_at' => now(), 'updated_at' => now()),
        ]);
    }
}
