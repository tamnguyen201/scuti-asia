<?php


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
        \App\Model\Role::truncate();
        \App\Model\User::truncate();
        \App\Model\Manager::truncate();
        DB::table('roles')->insert([
            ['id'=>1, 'name' => 'Administrator'],
            ['id'=>2, 'name' => 'Interviewer'],
            ['id'=>3, 'name' => 'Back Office'],
            ['id'=>4, 'name' => 'User'],
        ]);
        DB::table('users')->insert([
            ['id'=>1, 'name' => 'Tam Nguyen','email' => 'tam2012000@gmail.com','password'=> Hash::make('123456')],
            ['id'=>2, 'name' => 'Linh Nguyen','email' => 'linhnn160295@gmail.com','password'=> Hash::make('123456')],
            ['id'=>3, 'name' => 'interviewer','email' => 'interviewer@gmail.com','password'=> Hash::make('123456')],
            ['id'=>4, 'name' => 'BackOffice','email' => 'backoffice@gmail.com','password'=> Hash::make('123456')],
            ['id'=>5, 'name' => 'User1','email' => 'user1@gmail.com','password'=> Hash::make('123456')],
            ['id'=>6, 'name' => 'User2','email' => 'user2@gmail.com','password'=> Hash::make('123456')],
            ['id'=>7, 'name' => 'User3','email' => 'user3@gmail.com','password'=> Hash::make('123456')],
            ['id'=>8, 'name' => 'User4','email' => 'user4@gmail.com','password'=> Hash::make('123456')],
            ['id'=>9, 'name' => 'User5','email' => 'user5@gmail.com','password'=> Hash::make('123456')],
        ]);
        DB::table('managers')->insert([
            ['id'=>1, 'user_id' => 1, 'role_id' => 1, 'phone'=>'0366668888', 'address'=>'68 Nguyễn Cơ Thạch, Nam Từ Liêm, Hn', 'avatar'=>'https://miro.medium.com/max/1200/1*Eu6cAGjXNa0-ct_hlsH1yQ.jpeg'],
            ['id'=>2, 'user_id' => 2, 'role_id' => 1, 'phone'=>'0366668888', 'address'=>'68 Nguyễn Cơ Thạch, Nam Từ Liêm, Hn', 'avatar'=>'http://congstudio.vn/product_images/uploaded_images/chup_anh_profile_chuyen_nghiep_cong_studio_1_aztl4.jpg'],
            ['id'=>3, 'user_id' => 3, 'role_id' => 2, 'phone'=>'0366668888', 'address'=>'68 Nguyễn Cơ Thạch, Nam Từ Liêm, Hn', 'avatar'=>'http://congstudio.vn/product_images/z/320/chup_anh_profile_tai_ha_noi_cong_studio_4__09337_thumb.jpg'],
            ['id'=>4, 'user_id' => 5, 'role_id' => 3, 'phone'=>'0366668888', 'address'=>'68 Nguyễn Cơ Thạch, Nam Từ Liêm, Hn', 'avatar'=>'http://congstudio.vn/product_images/z/320/chup_anh_profile_tai_ha_noi_cong_studio_4__09337_thumb.jpg'],
        ]);
        Schema::enableForeignKeyConstraints();
    }
}
