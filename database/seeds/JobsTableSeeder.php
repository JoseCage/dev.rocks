<?php

use Illuminate\Database\Seeder;

use DevRocks\Models\Job;
use DevRocks\Models\Company;

class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jobs')->truncate();
        $this->command->info('Creating fake jobs');
        //factory(Job::class, 10)->create();
        $company = Company::create([
          'name' => 'Linka Softwares',
          'email' => 'jobs@linkasoftwares.com',
          'slug' => 'linka-softwares',
          'password' => \Hash::make('notsecret'),
        ]);

        DB::table('jobs')->insert([
          array(
            'id' => 'd5b5c2d8-b224-4e17-a62b-e43f76310318',
            'title' => 'Junior Back-End Developer',
            'summary' => 'A job for a good Junior Developer',
            'context' => 'A job for a good Junior Developer',
            'location' => 'Luanda, Angola',
            'is_open' =>true,
            'is_featured' => true,
            'job_type_id' => 'd5b5c2d8-b224-4e17-a62b-e43f76310318',
            'company_id' => $company->id,
            'due_date' => now()->addDays(60),
            'slug' => str_slug('Junior Back-End Developer')
          ),
          array(
            'id' => 'd5b5c2d8-b224-4e17-a62b-e43f76310319',
            'title' => 'Data Analyst',
            'summary' => 'A job for a good Data Analyst',
            'context' => 'A job for a good Data Analyst',
            'location' => 'Luanda, Angola',
            'is_open' =>true,
            'is_featured' => true,
            'job_type_id' => 'cf31d9b5-2cb0-4c55-9779-ab9745ee6b90',
            'company_id' => $company->id,
            'due_date' => now()->addDays(60),
            'slug' => str_slug('Data Analyst')
          ),
          array(
            'id' => 'd5b5c2d8-b224-4e17-a62b-e43f76310320',
            'title' => 'Graphic Designer',
            'summary' => 'A job for a good Graphic Designer',
            'context' => 'A job for a good Graphic Designer',
            'location' => 'Luanda, Angola',
            'is_open' =>true,
            'is_featured' => true,
            'job_type_id' => 'd5b5c2d8-b224-4e17-a62b-e43f76310318',
            'company_id' => $company->id,
            'due_date' => now()->addDays(60),
            'slug' => str_slug('Graphic Designer')
          ),
          array(
            'id' => 'd5b5c2d8-b224-4e17-a62b-e43f76310321',
            'title' => 'Junior Front-End Developer',
            'summary' => 'A job for a good Senior Developer',
            'context' => 'A job for a good Senior Developer',
            'location' => 'Luanda, Angola',
            'is_open' =>true,
            'is_featured' => true,
            'job_type_id' => 'cf31d9b5-2cb0-4c55-9779-ab9745ee6b90',
            'company_id' => $company->id,
            'due_date' => now()->addDays(60),
            'slug' => str_slug('Junior Front-End Developer')
          ),
          array(
            'id' => 'd5b5c2d8-b224-4e17-a62b-e43f76310330',
            'title' => 'Senior Front-End Developer',
            'summary' => 'A job for a good Senior Developer',
            'context' => 'A job for a good Senior Developer',
            'location' => 'Luanda, Angola',
            'is_open' =>true,
            'is_featured' => true,
            'job_type_id' => 'd5b5c2d8-b224-4e17-a62b-e43f76310318',
            'company_id' => $company->id,
            'due_date' => now()->addDays(60),
            'slug' => str_slug('Senior Front-End Developer')
          ),
        ]);
    }
}
