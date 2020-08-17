<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Linh',
                'email' => 'linhnn160295@gmail.com',
                'password' => Hash::make('123456'),
            ],
            [
                'name' => 'Tam',
                'email' => 'tam2012000@gmail.com',
                'password' => Hash::make('123456'),
            ],
            [
                'name' => 'Interviewer',
                'email' => 'inter@gmail.com',
                'password' => Hash::make('123456'),
            ],
            [
                'name' => 'Back office',
                'email' => 'backoffice@gmail.com',
                'password' => Hash::make('123456'),
            ],
            [
                'name' => 'User',
                'email' => 'user@gmail.com',
                'password' => Hash::make('123456'),
            ]
        ]
    );
    }
}
