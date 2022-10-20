<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects = [];
        $projects = [];

        for($i = 0; $i < 10; $i++){
            $project['title'] = fake()->name();
            $project['user_id'] = 1;
            $project['category_id'] = 1;
            $project['description'] = fake()->sentence();
            $project['team_member'] = 1;
            $project['start_date'] = fake()->date();
            $project['deadline'] = fake()->date();
            $project['created_at'] = now();
            $project['updated_at'] = now();
            $project['status'] = 'pending';
            array_push($projects, $project);
        }

        DB::table('projects')->insert($projects);
    }
}
