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
      DB::table('job_types')->truncate();
      $this->command->info('Creating fake job types');
      //factory(JobType::class, 5)->create();
      DB::insert([
        array([
            'type' => 'Full Time',
            'slug' => 'fulltime',
            'description' => 'Full time jobs'
          ]),
        array([
            'type' => 'Freelance',
            'slug' => 'freelance',
            'description' => 'Freelance jobs'
          ]),
        array([
            'type' => 'Part Time',
            'slug' => 'parttime',
            'description' => 'Part time jobs'
          ]),
        array([
            'type' => 'Internship',
            'slug' => 'internship',
            'description' => 'Internship jobs'
          ]),
        array([
            'type' => 'Temporary',
            'slug' => 'temporary',
            'description' => 'Temporary jobs'
          ]),
      ]);
    }
}
