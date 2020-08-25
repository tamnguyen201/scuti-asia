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
        \App\Model\User::truncate();
        \App\Model\Manager::truncate();
        \App\Model\Company::truncate();
        \App\Model\CompanyImages::truncate();
        \App\Model\PartnerCompanies::truncate();
        \App\Model\Category::truncate();
        //\App\Model\Job::truncate();
        \App\Model\Candidate::truncate();
        \App\Model\CV::truncate();
        DB::table('users')->insert([
            ['id'=>1, 'name' => 'Tam Nguyen','email' => 'tam2012000@gmail.com','password'=> Hash::make('123456'), 'role' => 1],
            ['id'=>2, 'name' => 'Linh Nguyen','email' => 'linhnn160295@gmail.com','password'=> Hash::make('123456'), 'role' => 2],
            ['id'=>3, 'name' => 'interviewer','email' => 'interviewer@gmail.com','password'=> Hash::make('123456'), 'role' => 3],
            ['id'=>4, 'name' => 'BackOffice','email' => 'backoffice@gmail.com','password'=> Hash::make('123456'), 'role' => 3],
            ['id'=>5, 'name' => 'User1','email' => 'user1@gmail.com','password'=> Hash::make('123456'), 'role' => 0],
            ['id'=>6, 'name' => 'User2','email' => 'user2@gmail.com','password'=> Hash::make('123456'), 'role' => 0],
            ['id'=>7, 'name' => 'User3','email' => 'user3@gmail.com','password'=> Hash::make('123456'), 'role' => 0],
            ['id'=>8, 'name' => 'User4','email' => 'user4@gmail.com','password'=> Hash::make('123456'), 'role' => 0],
            ['id'=>9, 'name' => 'User5','email' => 'user5@gmail.com','password'=> Hash::make('123456'), 'role' => 0],
        ]);
        DB::table('managers')->insert([
            ['id'=>1, 'user_id' => 1, 'phone'=>'0366668888', 'address'=>'68 Nguyễn Cơ Thạch, Nam Từ Liêm, Hn', 'avatar'=>'https://miro.medium.com/max/1200/1*Eu6cAGjXNa0-ct_hlsH1yQ.jpeg'],
            ['id'=>2, 'user_id' => 2, 'phone'=>'0366668888', 'address'=>'68 Nguyễn Cơ Thạch, Nam Từ Liêm, Hn', 'avatar'=>'http://congstudio.vn/product_images/uploaded_images/chup_anh_profile_chuyen_nghiep_cong_studio_1_aztl4.jpg'],
            ['id'=>3, 'user_id' => 3, 'phone'=>'0366668888', 'address'=>'68 Nguyễn Cơ Thạch, Nam Từ Liêm, Hn', 'avatar'=>'http://congstudio.vn/product_images/z/320/chup_anh_profile_tai_ha_noi_cong_studio_4__09337_thumb.jpg'],
            ['id'=>4, 'user_id' => 4, 'phone'=>'0366668888', 'address'=>'68 Nguyễn Cơ Thạch, Nam Từ Liêm, Hn', 'avatar'=>'http://congstudio.vn/product_images/z/320/chup_anh_profile_tai_ha_noi_cong_studio_4__09337_thumb.jpg'],
        ]);
        DB::table('companies')->insert([
            ['id'=>1, 'name' => 'scuti', 'description' => 'Make service people love!', 'email' => 'scuti-asia@gmail.com', 'phone'=>'0999999999', 'address'=>'68 Nguyễn Cơ Thạch, Nam Từ Liêm, Hn', 'logo'=>'https://miro.medium.com/max/1200/1*Eu6cAGjXNa0-ct_hlsH1yQ.jpeg', 'facebook_page' => 'https://fb.com/scuti', 'youtube_page' => 'youtube.com.vn/scuti'],
        ]);
        DB::table('company_images')->insert([
            ['id'=>1, 'image_url'=>'https://miro.medium.com/max/1200/1*Eu6cAGjXNa0-ct_hlsH1yQ.jpeg'],
            ['id'=>2, 'image_url'=>'http://congstudio.vn/product_images/uploaded_images/chup_anh_profile_chuyen_nghiep_cong_studio_1_aztl4.jpg'],
            ['id'=>3, 'image_url'=>'http://congstudio.vn/product_images/z/320/chup_anh_profile_tai_ha_noi_cong_studio_4__09337_thumb.jpg'],
            ['id'=>4, 'image_url'=>'http://congstudio.vn/product_images/z/320/chup_anh_profile_tai_ha_noi_cong_studio_4__09337_thumb.jpg'],
            ['id'=>5, 'image_url'=>'http://congstudio.vn/product_images/z/320/chup_anh_profile_tai_ha_noi_cong_studio_4__09337_thumb.jpg'],
        ]);
        DB::table('partner_companies')->insert([
            ['id'=>1, 'name' => 'FPT', 'logo'=>'https://miro.medium.com/max/1200/1*Eu6cAGjXNa0-ct_hlsH1yQ.jpeg'],
            ['id'=>2, 'name' => 'TGDD', 'logo'=>'http://congstudio.vn/product_images/uploaded_images/chup_anh_profile_chuyen_nghiep_cong_studio_1_aztl4.jpg'],
            ['id'=>3, 'name' => 'Viettel', 'logo'=>'http://congstudio.vn/product_images/z/320/chup_anh_profile_tai_ha_noi_cong_studio_4__09337_thumb.jpg'],
            ['id'=>4, 'name' => 'Shopee', 'logo'=>'http://congstudio.vn/product_images/z/320/chup_anh_profile_tai_ha_noi_cong_studio_4__09337_thumb.jpg'],
            ['id'=>5, 'name' => 'Tiki', 'logo'=>'http://congstudio.vn/product_images/z/320/chup_anh_profile_tai_ha_noi_cong_studio_4__09337_thumb.jpg'],
        ]);
        DB::table('categories')->insert([
            ['id'=>1,'user_id' => 1, 'category_name'=>'PHP', 'slug' => 'php', 'status' => 1],
            ['id'=>2,'user_id' => 1, 'category_name'=>'NodeJs', 'slug' => 'nodejs', 'status' => 1],
            ['id'=>3,'user_id' => 1, 'category_name'=>'Java', 'slug' => 'java', 'status' => 1],
            ['id'=>4,'user_id' => 1, 'category_name'=>'Html Css', 'slug' => 'html-css', 'status' => 1],
            ['id'=>5,'user_id' => 1, 'category_name'=>'ReactJs', 'slug' => 'reactjs', 'status' => 1],
        ]);
        DB::table('jobs')->insert([
            ['id'=>1,'category_id' => 1, 'name'=>'PHP job', 'slug' => 'abc', 'description'=> 'mô tả', 'location_id' => 1, 'expireDay' => '2020/08/15', 'status' =>1],
            ['id'=>2,'category_id' => 2, 'name'=>'Node job', 'slug' => 'abc', 'description'=> 'mô tả', 'location_id' => 1, 'expireDay' => '2020/08/15', 'status' =>1],
            ['id'=>3,'category_id' => 3, 'name'=>'java job', 'slug' => 'abc', 'description'=> 'mô tả', 'location_id' => 1, 'expireDay' => '2020/08/15', 'status' =>1],
            ['id'=>4,'category_id' => 4, 'name'=>'FE job', 'slug' => 'abc', 'description'=> 'mô tả', 'location_id' => 1, 'expireDay' => '2020/08/15', 'status' =>1],
            ['id'=>5,'category_id' => 5, 'name'=>'React job', 'slug' => 'abc', 'description'=> 'mô tả', 'location_id' => 1, 'expireDay' => '2020/08/15', 'status' =>1],
        ]);
        DB::table('candidates')->insert([
            ['id'=>1, 'phone'=>'0345678966', 'address' => 'HN', 'user_id'=> 5],
            ['id'=>2, 'phone'=>'0345678966', 'address' => 'HN', 'user_id'=> 6],
            ['id'=>3, 'phone'=>'0345678966', 'address' => 'HN', 'user_id'=> 7],
            ['id'=>4, 'phone'=>'0345678966', 'address' => 'HN', 'user_id'=> 8],
            ['id'=>5, 'phone'=>'0345678966', 'address' => 'HN', 'user_id'=> 9],
        ]);
        DB::table('cvs')->insert([
            ['id'=>1,'candidate_id' => 1, 'cv_url'=>'https://miro.medium.com/max/1200/1*Eu6cAGjXNa0-ct_hlsH1yQ.jpeg'],
            ['id'=>2,'candidate_id' => 2, 'cv_url'=>'http://congstudio.vn/product_images/uploaded_images/chup_anh_profile_chuyen_nghiep_cong_studio_1_aztl4.jpg'],
            ['id'=>3,'candidate_id' => 3, 'cv_url'=>'http://congstudio.vn/product_images/z/320/chup_anh_profile_tai_ha_noi_cong_studio_4__09337_thumb.jpg'],
            ['id'=>4,'candidate_id' => 4, 'cv_url'=>'http://congstudio.vn/product_images/z/320/chup_anh_profile_tai_ha_noi_cong_studio_4__09337_thumb.jpg'],
            ['id'=>5,'candidate_id' => 5, 'cv_url'=>'http://congstudio.vn/product_images/z/320/chup_anh_profile_tai_ha_noi_cong_studio_4__09337_thumb.jpg'],
        ]);
        DB::table('locations')->insert([
            ['id'=>1, 'name'=>'Hà Nội'],
            ['id'=>2, 'name'=>'Tp.Hồ Chí Minh'],
        ]);
        Schema::enableForeignKeyConstraints();
    }
}
