<?php

use App\Model\Role;
use App\Model\User;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Role::truncate();
        User::truncate();
        DB::table('roles')->insert([
            ['id'=>1, 'name' => 'Administrator'],
            ['id'=>2, 'name' => 'Interviewer'],
            ['id'=>3, 'name' => 'Back Office'],
            ['id'=>4, 'name' => 'User'],
        ]);
        DB::table('users')->insert([
            ['id'=>1, 'name' => 'Tam Nguyen','email' => 'tam2012000@gmail.com','password'=> Hash::make('123456'),'role_id' => 1],
            ['id'=>2, 'name' => 'interviewer','email' => 'interviewer@gmail.com','password'=> Hash::make('123456'),'role_id' => 2],
            ['id'=>3, 'name' => 'BackOffice','email' => 'backoffice@gmail.com','password'=> Hash::make('123456'),'role_id' => 3],
            ['id'=>4, 'name' => 'User1','email' => 'user1@gmail.com','password'=> Hash::make('123456'),'role_id' => 4],
            ['id'=>5, 'name' => 'User2','email' => 'user2@gmail.com','password'=> Hash::make('123456'),'role_id' => 4],
            ['id'=>6, 'name' => 'User3','email' => 'user3@gmail.com','password'=> Hash::make('123456'),'role_id' => 4],
            ['id'=>7, 'name' => 'User4','email' => 'user4@gmail.com','password'=> Hash::make('123456'),'role_id' => 4],
            ['id'=>8, 'name' => 'User5','email' => 'user5@gmail.com','password'=> Hash::make('123456'),'role_id' => 4],
        ]);
        Schema::enableForeignKeyConstraints();
    }
}
