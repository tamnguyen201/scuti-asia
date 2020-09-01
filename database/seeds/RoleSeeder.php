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
        \App\Model\Locations::truncate();
        \App\Model\CompanyImages::truncate();
        \App\Model\NewSpaper::truncate();
        \App\Model\VisitUs::truncate();
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
            ['id'=>1, 'name' => 'Scuti co., ltd', 'description' => 'Make service people love!', 'email' => 'scuti-asia@gmail.com', 'phone'=>'0999999999', 'address'=>'68 Nguyễn Cơ Thạch, Nam Từ Liêm, Hn', 'logo'=>'logo.png', 'facebook_page' => 'https://fb.com/scuti', 'youtube_page' => 'youtube.com.vn/scuti'],
        ]);
        DB::table('locations')->insert([
            ['id'=>1, 'name'=>'Hà Nội'],
            ['id'=>2, 'name'=>'Tp.Hồ Chí Minh'],
        ]);
        DB::table('company_images')->insert([
            ['id'=>1,'name' => 'Môi trường làm việc', 'image_url'=>'https://miro.medium.com/max/1200/1*Eu6cAGjXNa0-ct_hlsH1yQ.jpeg'],
            ['id'=>2,'name' => 'Môi trường làm việc', 'image_url'=>'http://congstudio.vn/product_images/z/320/chup_anh_profile_tai_ha_noi_cong_studio_4__09337_thumb.jpg'],
            ['id'=>3,'name' => 'Môi trường làm việc', 'image_url'=>'http://congstudio.vn/product_images/z/320/chup_anh_profile_tai_ha_noi_cong_studio_4__09337_thumb.jpg'],
            ['id'=>4,'name' => 'Môi trường làm việc', 'image_url'=>'http://congstudio.vn/product_images/z/320/chup_anh_profile_tai_ha_noi_cong_studio_4__09337_thumb.jpg'],
            ['id'=>5,'name' => 'Môi trường làm việc', 'image_url'=>'http://congstudio.vn/product_images/z/320/chup_anh_profile_tai_ha_noi_cong_studio_4__09337_thumb.jpg'],
        ]);
        DB::table('new_spapers')->insert([
            ['id'=>1, 'title' => 'Dev Candidates Tour- Hành Trình Trở Thành Lập Trình Viên', 'image'=>'https://miro.medium.com/max/1200/1*Eu6cAGjXNa0-ct_hlsH1yQ.jpeg', 'description' => 'Dev Candidates Tour tháng 6/2017 là sự kiện kết nối giữa các doanh nghiệp công nghệ phần mềm và các ứng viên tiềm năng. Các nhà tuyển dụng luôn luôn tìm kiếm các ứng viên tài năng nhưng dường như trong quy trình tuyển dụng luôn thiếu một bước nào đó để họ tiếp cận được với các nhân tài, hãy cùng Dev Candidates Tour giao lưu và lắng nghe ý kiến trực tiếp của các ứng viên và nâng cao hiệu quả quy trình tuyển dụng của doanh nghiệp.', 'url' => 'https://www.facebook.com/events/136182586941319/'],
            ['id'=>2, 'title' => 'TGDD', 'image'=>'http://congstudio.vn/product_images/z/320/chup_anh_profile_tai_ha_noi_cong_studio_4__09337_thumb.jpg', 'description' => 'Mô tả', 'url' => 'abc.com'],
            ['id'=>3, 'title' => 'Viettel', 'image'=>'http://congstudio.vn/product_images/z/320/chup_anh_profile_tai_ha_noi_cong_studio_4__09337_thumb.jpg', 'description' => 'Mô tả', 'url' => 'abc.com'],
        ]);
        DB::table('sections')->insert([
            ['id'=>1, 'content' => 
                        '<div class="col-lg-4">
                            <div class="text-container">
                                <h3>Môi Trường Lí Tưởng</h3>
                                <p>Linh hoạt, thách thức, năng động và thân thiện, là những điều chúng tôi mang đến cho bạn sự thoải mái để tập trung tạo hiệu quả công việc tốt nhất bên cạnh sự hỗ trợ của đồng nghiệp và hướng dẫn từ quản lý.</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="text-container">
                                <h3>Cơ hội phát triển </h3>
                                <p>Bạn sẽ có cơ hội để học hỏi rất nhanh và phát triển sự nghiệp bền vững trong ngành CNTT cùng với sự mở rộng và phát triển không ngừng của công ty.</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="text-container">
                                <h3>Thoải mái sáng tạo</h3>
                                <p>Đừng để mình bị gò bó trong những nguyên tắc cũ kỹ, cổ hủ. Những nguyên tắc đó sẽ giết dần giết mòn những suy nghĩ tích cực của bạn. Hãy mạnh dạn phá vỡ những điều từ xa xưa trong cuộc sống nếu nó không đúng.</p>
                            </div>
                        </div>',
                        'image'=>'https://www.scuti.asia/uploads/6/1/9/4/61941893/scuti-recruitment-pitch-2019-video_orig.jpg', 'map_url' => '', 'field' => 'benefits'],
            ['id'=>2, 'content' => 
                        '<div class="col-lg-11 offset-lg-1 row my-3">
                            <div class="col-md-2 text-center pt-2 mb-3" style="font-size: 3.5rem">①</div>
                            <div class="col-md-10 text-center text-md-left">
                                <p>Vui lòng liên hệ với chúng tôi từ nút bên dưới và cho bạn thấy ý định muốn ứng tuyển vào công ty của chúng tôi. Khi bạn liên hệ với chúng tôi, vui lòng nói rõ bạn muốn ứng tuyển vào vị trí nào. Không ai thất bại trong giai đoạn này.</p>   
                            </div>
                        </div>
                        <div class="col-lg-11 offset-lg-1 row my-3">
                            <div class="col-md-2 text-center pt-2 mb-3" style="font-size: 3.5rem">②</div>
                            <div class="col-md-10 text-center text-md-left">
                                <p>Nhân viên của chúng tôi sẽ trả lời bạn sớm và thông báo cho bạn những gì chúng tôi muốn bạn gửi. Điều này bao gồm cả bài kiểm tra trên giấy.</p>   
                            </div>
                        </div>
                        <div class="col-lg-11 offset-lg-1 row my-3">
                            <div class="col-md-2 text-center pt-2 mb-3" style="font-size: 3.5rem">③</div>
                            <div class="col-md-10 text-center text-md-left">
                                <p>Bạn phỏng vấn các thành viên của chúng tôi (bao gồm cả Giám đốc điều hành) một hoặc hai lần. Tất cả các cuộc phỏng vấn được tổ chức bằng tiếng Anh.</p>   
                            </div>
                        </div>
                        <div class="col-lg-11 offset-lg-1 row my-3">
                            <div class="col-md-2 text-center pt-2 mb-3" style="font-size: 3.5rem">④</div>
                            <div class="col-md-10 text-center text-md-left">
                                <p>Nếu bạn may mắn vượt qua tất cả các cuộc tuyển chọn, chúng tôi sẽ gặp bạn một lần nữa để đưa ra lời mời làm việc.</p>   
                            </div>
                        </div>
                        <div class="col-lg-11 offset-lg-1 row my-3">
                            <div class="col-md-2 text-center pt-2 mb-3" style="font-size: 3.5rem">⑤</div>
                            <div class="col-md-10 text-center text-md-left">
                                <p>Nếu bạn đồng ý với tất cả các điều kiện của một lời mời làm việc, bạn bắt đầu làm việc với chúng tôi!</p>   
                            </div>
                        </div>', 
                        'image' => '', 'map_url' => '', 'field' => 'recruitment_flow'],
            ['id'=>3, 'content' => 
                        '<h4>Quá trình thành lập và phát triển Scuti!</h4>
                        <ul>
                            <li>Feb 2016&nbsp;<a href="http://ezukatechnight.com/events/ezukatecknight/vol-35-report/#.WLjwbmSLTAc" target="_blank">e-ZUKA Tech Night vol.35</a></li>
                            <li>Jul 2016&nbsp;<a href="https://techsauce.co/en/thailand-en/why-you-should-definitely-be-at-the-techsauce-summit-2016-asias-hottest-tech-conference-in-thailand/" target="_blank">Tech Source Summit 2016 in Bangkok</a>&nbsp;&lt;<a href="http://blog.scuti.asia/2016/07/the-extremely-rapid-report-of.html" target="_blank">Blog</a>&gt;</li>
                            <li>Sep 2016&nbsp;<a href="http://blog.innovatube.com/geek-talk-vol-01/" target="_blank">GEEK TALK VOL.01</a></li>
                            <li>Jan 2017&nbsp;<a href="http://www.fukuokastartup.com/" target="_blank">Fukuoka Startup Global Challenge</a>&nbsp;&lt;<a href="http://blog.scuti.asia/2017/02/san-francisco-as-sanctuary-for-startups.html" target="_blank">Blog</a>&gt;</li>
                            <li>Jan 2017&nbsp;<a href="http://www.fukuoka-dc.jpn.com/?p=16933" target="_blank">Tere Estonia! Tere Startup!!</a></li>
                            <li>Jun 2017 <a href="https://www.facebook.com/events/136182586941319/" target="_blank">Dev tour for internships in Hanoi</a>&nbsp;&lt;<a href="http://vitv.vn/tin-video/23-06-2017/tap-chi-startup-360-so-74-ngay-23-6-2017-khi-startup-ngoai-khoi-nghiep-tai-vi/169457" target="_blank">TV program to introduce this activity</a>&gt;</li>
                            <li>Jul 2017 <a href="http://startupthailand.org/" target="_blank">Startup Thailand</a></li>
                            <li><span>Jan 2018 JETRO Navigate Hanoi</span></li>
                            <li>Jun 2018 <a href="https://www.techinasia.com/events/singapore" target="_blank">Tech in Asia Singapore 2018</a>&nbsp;&lt;<a href="http://blog.scuti.asia/2018/06/report-of-tech-in-asia-singapore.html" target="_blank">Blog</a>&gt;</li>
                            <li>Jun 2018 <a href="https://startupthailand.org/showcase/" target="_blank">Startup Thailand 2018</a>&nbsp;&lt;<a href="http://blog.scuti.asia/2018/06/report-of-startupthailand-2018.html" target="_blank">Blog</a>&gt;</li>
                        </ul>',
                        'image'=>'https://inovatik.com/juno-landing-page/images/about.jpg', 'map_url' => '', 'field' => 'about_us'],
            ['id'=>4, 'content' => '', 'image' => '', 'map_url' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.962023272904!2d105.76304874986745!3d21.034205492900966!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454b947cd6e49%3A0x6a87974c6b44d671!2zNjggUGjhu5EgTmd1eeG7hW4gQ8ahIFRo4bqhY2gsIE3hu7kgxJDDrG5oLCBU4burIExpw6ptLCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1598327887854!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>', 'field' => 'visit_us'],
        ]);
        DB::table('visit_us')->insert([
            ['id'=>1, 'name'=>'Hà Nội', 'email' => 'customer@gmail.com', 'message' => 'Qua chơi', 'type' => 'coffee'],
            ['id'=>2, 'name'=>'Tp.Hồ Chí Minh', 'email' => 'customer2@gmail.com', 'message' => 'Qua chơi', 'type' => 'Trà Đá'],
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
            ['id'=>1,'user_id' => 1, 'cv_name' => 'CV1', 'cv_url'=>'https://miro.medium.com/max/1200/1*Eu6cAGjXNa0-ct_hlsH1yQ.jpeg'],
            ['id'=>2,'user_id' => 2, 'cv_name' => 'CV2', 'cv_url'=>'http://congstudio.vn/product_images/uploaded_images/chup_anh_profile_chuyen_nghiep_cong_studio_1_aztl4.jpg'],
            ['id'=>3,'user_id' => 3, 'cv_name' => 'CV3', 'cv_url'=>'http://congstudio.vn/product_images/z/320/chup_anh_profile_tai_ha_noi_cong_studio_4__09337_thumb.jpg'],
            ['id'=>4,'user_id' => 4, 'cv_name' => 'CV4', 'cv_url'=>'http://congstudio.vn/product_images/z/320/chup_anh_profile_tai_ha_noi_cong_studio_4__09337_thumb.jpg'],
            ['id'=>5,'user_id' => 5, 'cv_name' => 'CV5', 'cv_url'=>'http://congstudio.vn/product_images/z/320/chup_anh_profile_tai_ha_noi_cong_studio_4__09337_thumb.jpg'],
        ]);
        Schema::enableForeignKeyConstraints();
    }
}
