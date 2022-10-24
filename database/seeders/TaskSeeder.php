<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     *
     * @return void
     */
    public function run()
    {
        $tasks = [];
        $task = [];

        for($i = 0; $i < 10; $i++){
            $task['name'] = fake()->name();
            $task['user_id'] = 1;
            $task['project_id'] = 1;
            $task['description'] = fake()->sentence();
            $task['start_date'] = fake()->date();
            $task['end_date'] = fake()->date();
            $task['created_at'] = now();
            $task['updated_at'] = now();
            $task['status'] = 'Pending';
            array_push($tasks, $task);
        }

        DB::table('tasks')->insert($tasks);
    }
}
