<?php

use Illuminate\Database\Seeder;

use DevRocks\Models\JobType;

class JobTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('job_types')->delete();
      $this->command->info('Creating fake job types');
      DB::table('job_types')->insert([
        array('id' => 'd5b5c2d8-b224-4e17-a62b-e43f76310318', 'type' => 'Full Time', 'slug' => 'fulltime', 'description' => 'Full time jobs'),
        array('id' => 'cf31d9b5-2cb0-4c55-9779-ab9745ee6b90', 'type' => 'Freelance', 'slug' => 'freelance', 'description' => 'Freelance jobs'),
        array('id' => 'cf31d9b5-2cb0-4c55-9779-ab9745ee6c80', 'type' => 'Part Time', 'slug' => 'parttime', 'description' => 'Part time jobs'),
        array('id' => 'cf31d9b5-2cb0-4c55-9779-ab9745ea7c10', 'type' => 'Internship', 'slug' => 'internship', 'description' => 'Internship jobs'),
        array('id' => 'ca41d9b5-2cb0-4c55-9779-ab9745ea7c11', 'type' => 'Temporary', 'slug' => 'temporary', 'description' => 'Temporary jobs'),
      ]);
    }
}
