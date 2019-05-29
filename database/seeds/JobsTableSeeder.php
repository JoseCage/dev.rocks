<?php

use Illuminate\Database\Seeder;

use DevRocks\Models\Job;

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
        factory(Job::class, 10)->create();
    }
}
