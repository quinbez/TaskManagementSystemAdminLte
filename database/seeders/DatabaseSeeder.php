<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // $this->call(ProjectSeeder::class);

        \App\Models\Category::factory(3)->create()->each(function($category){
            $category->projects()->save(\App\Models\Project::factory()->make());
        });

        $this->call(TaskSeeder::class);



    }
}
