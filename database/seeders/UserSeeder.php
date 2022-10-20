<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users=[
            ['name'=>'Member',
             'email'=>'member@gmail.com',
             'password'=>bcrypt('12345678'),
             'role'=>'member',
             'phone_number'=>'0911223345',
            ],
            [
             'name'=>'Admin',
             'email'=>'admin@gmail.com',
             'password'=>bcrypt('12345678'),
             'role'=>'admin',
             'phone_number'=>'0911223344',
            ]

        ];
        foreach($users as $user)
        User::create($user);
    }
}
