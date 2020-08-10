<?php

use App\Model\Role;
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
        DB::table('roles')->insert([
            ['id'=>1, 'name' => 'Administrator'],
            ['id'=>2, 'name' => 'Interviewer'],
            ['id'=>3, 'name' => 'Back Office'],
            ['id'=>4, 'name' => 'User'],
            ]);
        Schema::enableForeignKeyConstraints();
    }
}
