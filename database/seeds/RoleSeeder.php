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
        \App\Model\Admin::truncate();
        \App\Model\Company::truncate();
        \App\Model\CompanyImages::truncate();
        \App\Model\NewSpaper::truncate();
        \App\Model\AboutUs::truncate();
        \App\Model\Section::truncate();
        \App\Model\Category::truncate();
        \App\Model\Job::truncate();
        \App\Model\CV::truncate();
        DB::table('users')->insert([
            ['id'=>1, 'name' => 'User1','email' => 'user1@gmail.com','password'=> Hash::make('123456'), 'phone'=> '1234567890','address'=>'HN'],
            ['id'=>2, 'name' => 'User2','email' => 'user2@gmail.com','password'=> Hash::make('123456'), 'phone'=> '1234567890','address'=>'HN'],
            ['id'=>3, 'name' => 'User3','email' => 'user3@gmail.com','password'=> Hash::make('123456'), 'phone'=> '1234567890','address'=>'HN'],
            ['id'=>4, 'name' => 'User4','email' => 'user4@gmail.com','password'=> Hash::make('123456'), 'phone'=> '1234567890','address'=>'HN'],
            ['id'=>5, 'name' => 'User5','email' => 'user5@gmail.com','password'=> Hash::make('123456'), 'phone'=> '1234567890','address'=>'HN'],
        ]);
        DB::table('admins')->insert([
            ['id'=>1, 'name' => 'Tam Nguyen','email' => 'tam2012000@gmail.com','password'=> Hash::make('123456'), 'phone'=> '1234567890','address'=>'HN', 'role' => 1],
            ['id'=>2, 'name' => 'Linh Nguyen','email' => 'linhnn160295@gmail.com','password'=> Hash::make('123456'), 'phone'=> '1234567890','address'=>'HN', 'role' => 2],
            ['id'=>3, 'name' => 'interviewer','email' => 'interviewer@gmail.com','password'=> Hash::make('123456'), 'phone'=> '1234567890','address'=>'HN', 'role' => 3],
            ['id'=>4, 'name' => 'BackOffice','email' => 'backoffice@gmail.com','password'=> Hash::make('123456'), 'phone'=> '1234567890','address'=>'HN', 'role' => 3],
        ]);
        DB::table('companies')->insert([
            ['id'=>1, 'name' => 'Scuti co., ltd', 'description' => 'Make service people love!', 'email' => 'scuti-asia@gmail.com', 'phone'=>'0999999999', 'address'=>'68 Nguyễn Cơ Thạch, Nam Từ Liêm, Hn', 'logo'=>'https://scontent.fhan3-1.fna.fbcdn.net/v/t31.0-0/p370x247/12622243_1526863174310176_5792404773815484011_o.png?_nc_cat=110&_nc_sid=85a577&_nc_ohc=Ytta26wUm-MAX95QAPU&_nc_ht=scontent.fhan3-1.fna&oh=514584ef7414730723e84bb9b802005f&oe=5F6947F6', 'facebook_page' => 'https://fb.com/scuti', 'youtube_page' => 'youtube.com.vn/scuti'],
        ]);
        DB::table('company_images')->insert([
            ['id'=>1, 'image_url'=>'https://miro.medium.com/max/1200/1*Eu6cAGjXNa0-ct_hlsH1yQ.jpeg'],
            ['id'=>2, 'image_url'=>'http://congstudio.vn/product_images/uploaded_images/chup_anh_profile_chuyen_nghiep_cong_studio_1_aztl4.jpg'],
            ['id'=>3, 'image_url'=>'http://congstudio.vn/product_images/z/320/chup_anh_profile_tai_ha_noi_cong_studio_4__09337_thumb.jpg'],
            ['id'=>4, 'image_url'=>'http://congstudio.vn/product_images/z/320/chup_anh_profile_tai_ha_noi_cong_studio_4__09337_thumb.jpg'],
            ['id'=>5, 'image_url'=>'http://congstudio.vn/product_images/z/320/chup_anh_profile_tai_ha_noi_cong_studio_4__09337_thumb.jpg'],
        ]);
        DB::table('new_spapers')->insert([
            ['id'=>1, 'title' => 'FPT', 'image'=>'https://miro.medium.com/max/1200/1*Eu6cAGjXNa0-ct_hlsH1yQ.jpeg', 'description' => 'Mô tả', 'url' => 'abc.com'],
            ['id'=>2, 'title' => 'TGDD', 'image'=>'http://congstudio.vn/product_images/uploaded_images/chup_anh_profile_chuyen_nghiep_cong_studio_1_aztl4.jpg', 'description' => 'Mô tả', 'url' => 'abc.com'],
            ['id'=>3, 'title' => 'Viettel', 'image'=>'http://congstudio.vn/product_images/z/320/chup_anh_profile_tai_ha_noi_cong_studio_4__09337_thumb.jpg', 'description' => 'Mô tả', 'url' => 'abc.com'],
        ]);
        DB::table('sections')->insert([
            ['id'=>1, 'content' => 'FPT', 'image'=>'https://miro.medium.com/max/1200/1*Eu6cAGjXNa0-ct_hlsH1yQ.jpeg', 'field' => 'benefits'],
            ['id'=>2, 'content' => 'TGDD', 'field' => 'recruitment_flow'],
            ['id'=>3, 'content' => 'TGDD', 'image'=>'https://miro.medium.com/max/1200/1*Eu6cAGjXNa0-ct_hlsH1yQ.jpeg', 'field' => 'about_us'],
            ['id'=>4, 'map_url' => 'd', 'field' => 'visit_us'],
        ]);
        DB::table('about_us')->insert([
            ['id'=>1, 'name'=>'Hà Nội', 'emai' => 'customer@gmail.com', 'message' => 'Qua chơi', 'type' => 'coffee'],
            ['id'=>2, 'name'=>'Tp.Hồ Chí Minh', 'emai' => 'customer2@gmail.com', 'message' => 'Qua chơi', 'type' => 'Trà Đá'],
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
        DB::table('cvs')->insert([
            ['id'=>1,'user_id' => 1, 'cv_url'=>'https://miro.medium.com/max/1200/1*Eu6cAGjXNa0-ct_hlsH1yQ.jpeg'],
            ['id'=>2,'user_id' => 2, 'cv_url'=>'http://congstudio.vn/product_images/uploaded_images/chup_anh_profile_chuyen_nghiep_cong_studio_1_aztl4.jpg'],
            ['id'=>3,'user_id' => 3, 'cv_url'=>'http://congstudio.vn/product_images/z/320/chup_anh_profile_tai_ha_noi_cong_studio_4__09337_thumb.jpg'],
            ['id'=>4,'user_id' => 4, 'cv_url'=>'http://congstudio.vn/product_images/z/320/chup_anh_profile_tai_ha_noi_cong_studio_4__09337_thumb.jpg'],
            ['id'=>5,'user_id' => 5, 'cv_url'=>'http://congstudio.vn/product_images/z/320/chup_anh_profile_tai_ha_noi_cong_studio_4__09337_thumb.jpg'],
        ]);
        DB::table('locations')->insert([
            ['id'=>1, 'name'=>'Hà Nội'],
            ['id'=>2, 'name'=>'Tp.Hồ Chí Minh'],
        ]);
        Schema::enableForeignKeyConstraints();
    }
}
