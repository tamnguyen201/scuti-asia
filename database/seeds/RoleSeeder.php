<?php


use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
        \App\Model\MainMember::truncate();
        \App\Model\Benefit::truncate();
        \App\Model\CompanyImages::truncate();
        \App\Model\NewSpaper::truncate();
        \App\Model\VisitUs::truncate();
        \App\Model\Section::truncate();
        \App\Model\Category::truncate();
        \App\Model\Job::truncate();
        \App\Model\CV::truncate();
        \App\Model\UserJob::truncate();
        \App\Model\Process::truncate();
        \App\Model\Evaluate::truncate();
        DB::table('users')->insert([
            ['id'=>1, 'name' => 'User1','email' => 'user1@gmail.com','password'=> Hash::make('123456'), 'phone'=> '1234567890','address'=>'HN', 'created_at' => \Carbon\Carbon::parse('11-05-2020 03:26:49')->format('Y-m-d H:i:s')],
            ['id'=>2, 'name' => 'User2','email' => 'user2@gmail.com','password'=> Hash::make('123456'), 'phone'=> '1234567890','address'=>'HN', 'created_at' => \Carbon\Carbon::parse('15-06-2020 03:26:49')->format('Y-m-d H:i:s')],
            ['id'=>3, 'name' => 'User3','email' => 'user3@gmail.com','password'=> Hash::make('123456'), 'phone'=> '1234567890','address'=>'HN', 'created_at' => \Carbon\Carbon::parse('21-06-2020 03:26:49')->format('Y-m-d H:i:s')],
            ['id'=>4, 'name' => 'User4','email' => 'user4@gmail.com','password'=> Hash::make('123456'), 'phone'=> '1234567890','address'=>'HN', 'created_at' => \Carbon\Carbon::parse('30-06-2020 03:26:49')->format('Y-m-d H:i:s')],
            ['id'=>5, 'name' => 'User5','email' => 'user5@gmail.com','password'=> Hash::make('123456'), 'phone'=> '1234567890','address'=>'HN', 'created_at' => \Carbon\Carbon::parse('06-07-2020 03:26:49')->format('Y-m-d H:i:s')],
            ['id'=>6, 'name' => 'User6','email' => 'user6@gmail.com','password'=> Hash::make('123456'), 'phone'=> '1234567890','address'=>'HN', 'created_at' => \Carbon\Carbon::parse('18-07-2020 03:26:49')->format('Y-m-d H:i:s')],
            ['id'=>7, 'name' => 'User7','email' => 'user7@gmail.com','password'=> Hash::make('123456'), 'phone'=> '1234567890','address'=>'HN', 'created_at' => \Carbon\Carbon::parse('03-08-2020 03:26:49')->format('Y-m-d H:i:s')],
            ['id'=>8, 'name' => 'User8','email' => 'user8@gmail.com','password'=> Hash::make('123456'), 'phone'=> '1234567890','address'=>'HN', 'created_at' => \Carbon\Carbon::parse('15-08-2020 03:26:49')->format('Y-m-d H:i:s')],
            ['id'=>9, 'name' => 'User9','email' => 'user9@gmail.com','password'=> Hash::make('123456'), 'phone'=> '1234567890','address'=>'HN', 'created_at' => \Carbon\Carbon::parse('16-08-2020 03:26:49')->format('Y-m-d H:i:s')],
            ['id'=>10, 'name' => 'User10','email' => 'user10@gmail.com','password'=> Hash::make('123456'), 'phone'=> '1234567890','address'=>'HN', 'created_at' => \Carbon\Carbon::parse('27-08-2020 03:26:49')->format('Y-m-d H:i:s')],
            ['id'=>11, 'name' => 'User11','email' => 'user11@gmail.com','password'=> Hash::make('123456'), 'phone'=> '1234567890','address'=>'HN', 'created_at' => \Carbon\Carbon::parse('01-09-2020 03:26:49')->format('Y-m-d H:i:s')],
            ['id'=>12, 'name' => 'User12','email' => 'user12@gmail.com','password'=> Hash::make('123456'), 'phone'=> '1234567890','address'=>'HN', 'created_at' => \Carbon\Carbon::parse('03-09-2020 03:26:49')->format('Y-m-d H:i:s')],
            ['id'=>13, 'name' => 'User13','email' => 'user13@gmail.com','password'=> Hash::make('123456'), 'phone'=> '1234567890','address'=>'HN', 'created_at' => \Carbon\Carbon::parse('05-09-2020 03:26:49')->format('Y-m-d H:i:s')],
            ['id'=>14, 'name' => 'User14','email' => 'user14@gmail.com','password'=> Hash::make('123456'), 'phone'=> '1234567890','address'=>'HN', 'created_at' => \Carbon\Carbon::parse('06-09-2020 03:26:49')->format('Y-m-d H:i:s')],
            ['id'=>15, 'name' => 'User15','email' => 'user15@gmail.com','password'=> Hash::make('123456'), 'phone'=> '1234567890','address'=>'HN', 'created_at' => \Carbon\Carbon::parse('08-09-2020 03:26:49')->format('Y-m-d H:i:s')],
        ]);
        DB::table('admins')->insert([
            ['id'=>1, 'name' => 'Tam Nguyen','email' => 'tam2012000@gmail.com','password'=> Hash::make('123456'), 'phone'=> '1234567890','address'=>'HN', 'role' => 1, 'status' => 1],
            ['id'=>2, 'name' => 'Linh Nguyen','email' => 'linhnn160295@gmail.com','password'=> Hash::make('123456'), 'phone'=> '1234567890','address'=>'HN', 'role' => 1, 'status' => 1],
            ['id'=>3, 'name' => 'Admin','email' => 'admin@gmail.com','password'=> Hash::make('123456'), 'phone'=> '1234567890','address'=>'HN', 'role' => 1, 'status' => 1],
            ['id'=>4, 'name' => 'Interviewer','email' => 'interviewer@gmail.com','password'=> Hash::make('123456'), 'phone'=> '1234567890','address'=>'HN', 'role' => 2, 'status' => 1],
            ['id'=>5, 'name' => 'BackOffice','email' => 'backoffice@gmail.com','password'=> Hash::make('123456'), 'phone'=> '1234567890','address'=>'HN', 'role' => 3, 'status' => 1],
        ]);
        DB::table('companies')->insert([
            ['id'=>1, 'name' => 'Scuti co., ltd', 'description' => 'Make service people love!', 'email' => 'scuti-asia@gmail.com', 'phone'=>'0999999999', 'address'=>'68 Nguyễn Cơ Thạch, Nam Từ Liêm, Hn', 'logo'=>'logo.png', 'facebook_page' => 'https://fb.com/scuti', 'youtube_page' => 'youtube.com.vn/scuti'],
        ]);
        DB::table('locations')->insert([
            ['id'=>1, 'name'=>'Hà Nội'],
            ['id'=>2, 'name'=>'Tp.Hồ Chí Minh'],
        ]);
        DB::table('main_member')->insert([
            ['id'=>1, 'name'=>'Nguyễn Thanh Quyên', 'avatar' => 'https://miro.medium.com/max/1200/1*Eu6cAGjXNa0-ct_hlsH1yQ.jpeg', 'position' => 'General Manager', 'quote' => 'Hoạch định chiến lược xuất sắc và thực hiện là cần thiết để đạt được mục tiêu của công ty. Khả năng lãnh đạo và động viên các thành viên khác và các đội là sức mạnh của cô ấy.', 'member_type' => 1],
            ['id'=>2, 'name'=>'Mạnh Duẩn', 'avatar' => 'http://congstudio.vn/product_images/z/320/chup_anh_profile_tai_ha_noi_cong_studio_4__09337_thumb.jpg', 'position' => 'Leader', 'quote' => '', 'member_type' => 0],
            ['id'=>3, 'name'=>'Lê Anh Hoài', 'avatar' => 'http://congstudio.vn/product_images/z/320/chup_anh_profile_tai_ha_noi_cong_studio_4__09337_thumb.jpg', 'position' => 'Development Manager', 'quote' => 'Mạnh mẽ về lập trình, phân tích kinh doanh, hiệu suất, hệ thống, quản lý, phức tạp các dự án logic. Exten-sive có kinh nghiệm trong quản lý và phát triển ứng dụng.', 'member_type' => 1],
            ['id'=>4, 'name'=>'Hoàng Cảnh', 'avatar' => 'http://congstudio.vn/product_images/z/320/chup_anh_profile_tai_ha_noi_cong_studio_4__09337_thumb.jpg', 'position' => 'Leader', 'quote' => '', 'member_type' => 0],
            ['id'=>5, 'name'=>'Tuấn Anh', 'avatar' => 'https://miro.medium.com/max/1200/1*Eu6cAGjXNa0-ct_hlsH1yQ.jpeg', 'position' => 'Leeder', 'quote' => '', 'member_type' => 0],
            ['id'=>6, 'name'=>'Vũ Nguyễn', 'avatar' => 'http://congstudio.vn/product_images/z/320/chup_anh_profile_tai_ha_noi_cong_studio_4__09337_thumb.jpg', 'position' => 'QA Manager', 'quote' => 'Một người giàu kinh nghiệm, có kinh nghiệm và đam mê các tiêu chuẩn QA và thực hành tốt nhất với nền giáo dục tiên tiến trong cả quản trị kinh doanh và khoa học máy tính.', 'member_type' => 1],
        ]);
        DB::table('benefits')->insert([
            ['id'=>1, 'name'=>'Trả lương đều', 'image' => 'https://kenh14cdn.com/thumb_w/650/2016/1-1467292490653.jpg', 'description' => 'Mùng 5 hàng tháng'],
            ['id'=>2, 'name'=>'Hỗ trợ ăn trưa', 'image' => 'https://cdn.dealtoday.vn/img/s630x420/486eddbfe8654079aa5b041b4bdb8f83.jpg?sign=c4chRr5yV1gkJT3L1Xv4CQ', 'description' => 'Tối đa 500k/tháng'],
            ['id'=>3, 'name'=>'Hỗ trọ gửi xe', 'image' => 'https://image.phunuonline.com.vn/news/2018/20180411/fckimage/125822_27752217-189571811799860-2629126936167693586-n-111830491.jpg', 'description' => 'Tối đa 110k/tháng'],
            ['id'=>4, 'name'=>'Miễn phí đồ ăn vặt', 'image' => 'https://toplist.vn/images/800px/fritos-198624.jpg', 'description' => 'Tối đa 1 lần/tháng'],
            ['id'=>5, 'name'=>'Hỗ trợ laptop gamming', 'image' => 'https://cdn.tgdd.vn/hoi-dap/1122656/top-5-laptop-gamig-2.jpg', 'description' => 'Tối đa 365 triệu/năm'],
        ]);
        DB::table('company_images')->insert([
            ['id'=>1, "name" => "Thân thiện và vui vẻ", 'description' => 'Chúng tôi mở để chia sẻ kiến ​​thức, kinh nghiệm qua các cuộc hội thảo, hội thảo mỗi tuần.', 'image_url'=>'https://miro.medium.com/max/1200/1*Eu6cAGjXNa0-ct_hlsH1yQ.jpeg'],
            ['id'=>2, "name" => "Làm việc từ xa", 'description' => 'Bạn có quyền chọn địa điểm làm việc, thời gian làm việc.', 'image_url'=>'http://congstudio.vn/product_images/z/320/chup_anh_profile_tai_ha_noi_cong_studio_4__09337_thumb.jpg'],
            ['id'=>3, "name" => "Phong cách làm việc tự do", 'description' => 'Bạn có quyền mặc bất kỳ phong cách quần áo trở nên độc đáo người trong công ty của chúng tôi.', 'image_url'=>'http://congstudio.vn/product_images/z/320/chup_anh_profile_tai_ha_noi_cong_studio_4__09337_thumb.jpg'],
            ['id'=>4, "name" => "Môi trường chuyên nghiệp", 'description' => 'Teambuilding at Mai Chau - Hoa Binh', 'image_url'=>'http://congstudio.vn/product_images/z/320/chup_anh_profile_tai_ha_noi_cong_studio_4__09337_thumb.jpg'],
            ['id'=>5, "name" => "Tài Năng trẻ", 'description' => 'Teambuilding at Mai Chau - Hoa Binh', 'image_url'=>'http://congstudio.vn/product_images/z/320/chup_anh_profile_tai_ha_noi_cong_studio_4__09337_thumb.jpg'],
            ['id'=>6, "name" => "Môi trường làm việc", 'description' => 'Bạn có cơ hội để thực hành nhiều ngôn ngữ: Nhật Bản, Anh, Tây Ban Nha, Ấn Độ ... và Việt Nam.', 'image_url'=>'http://congstudio.vn/product_images/z/320/chup_anh_profile_tai_ha_noi_cong_studio_4__09337_thumb.jpg'],
        ]);
        DB::table('new_spapers')->insert([
            ['id'=>1, 'title' => 'Dev Candidates Tour- Hành Trình Trở Thành Lập Trình Viên', 'image'=>'https://miro.medium.com/max/1200/1*Eu6cAGjXNa0-ct_hlsH1yQ.jpeg', 'description' => 'Dev Candidates Tour tháng 6/2017 là sự kiện kết nối giữa các doanh nghiệp công nghệ phần mềm và các ứng viên tiềm năng. Các nhà tuyển dụng luôn luôn tìm kiếm các ứng viên tài năng nhưng dường như trong quy trình tuyển dụng luôn thiếu một bước nào đó để họ tiếp cận được với các nhân tài, hãy cùng Dev Candidates Tour giao lưu và lắng nghe ý kiến trực tiếp của các ứng viên và nâng cao hiệu quả quy trình tuyển dụng của doanh nghiệp.', 'url' => 'https://www.facebook.com/events/136182586941319/'],
            ['id'=>2, 'title' => 'TGDD', 'image'=>'http://congstudio.vn/product_images/z/320/chup_anh_profile_tai_ha_noi_cong_studio_4__09337_thumb.jpg', 'description' => 'Mô tả', 'url' => 'abc.com'],
            ['id'=>3, 'title' => 'Viettel', 'image'=>'http://congstudio.vn/product_images/z/320/chup_anh_profile_tai_ha_noi_cong_studio_4__09337_thumb.jpg', 'description' => 'Mô tả', 'url' => 'abc.com'],
        ]);
        DB::table('sections')->insert([
            ['id'=>1, 'name' => 'Trở thành thành viên trong gia đình Scuti', 'slug' => Str::slug('Trở thành thành viên trong gia đình Scuti'), 'description' => 'Hãy đến với chúng tôi khi nhận thấy những giá trị này phù hợp với bạn!', 'content' => '', 'image' => ''],
            ['id'=>2, 'name' => 'Scuti Mang Lại Cho Bạn', 'slug' => Str::slug('Scuti Mang Lại Cho Bạn'), 'description' => 'Hãy đến với chúng tôi khi nhận thấy những giá trị này phù hợp với bạn!', 
                'content' => 
                    '<div class="col-lg-4">
                        <div class="text-container text-center">
                            <h3>Môi Trường Lí Tưởng</h3>
                            <p class="text-justify">Linh hoạt, thách thức, năng động và thân thiện, là những điều chúng tôi mang đến cho bạn sự thoải mái để tập trung tạo hiệu quả công việc tốt nhất bên cạnh sự hỗ trợ của đồng nghiệp và hướng dẫn từ quản lý.</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="text-container text-center">
                            <h3>Cơ hội phát triển </h3>
                            <p class="text-justify">Bạn sẽ có cơ hội để học hỏi rất nhanh và phát triển sự nghiệp bền vững trong ngành CNTT cùng với sự mở rộng và phát triển không ngừng của công ty.</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="text-container text-center">
                            <h3>Thoải mái sáng tạo</h3>
                            <p class="text-justify">Đừng để mình bị gò bó trong những nguyên tắc cũ kỹ, cổ hủ. Những nguyên tắc đó sẽ giết dần giết mòn những suy nghĩ tích cực của bạn. Hãy mạnh dạn phá vỡ những điều từ xa xưa trong cuộc sống nếu nó không đúng.</p>
                        </div>
                    </div>',
                'image'=>'https://www.scuti.asia/uploads/6/1/9/4/61941893/mg-5747.jpg'],
            ['id'=>3, 'name' => 'Môi Trường Làm Việc', 'slug' => Str::slug('Môi Trường Làm Việc'), 'description' => 'Hãy đến với chúng tôi khi nhận thấy những giá trị này phù hợp với bạn!', 'content' => '', 'image' => ''],
            ['id'=>4, 'name' => 'Về Chúng Tôi', 'slug' => Str::slug('Về Chúng Tôi'), 'description' => 'Chúng tôi tin rằng xây dựng được hạnh phúc, chú trọng con đường sự nghiệp cho nhân viên, sự hài lòng trong công việc và môi trường tích cực sẽ là nền tảng lâu dài cho sự phát triển bền vững của Scuti.', 
                'content' => 
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
                'image'=>'https://scontent.fhan3-3.fna.fbcdn.net/v/t1.0-9/p720x720/118331394_2611383379191478_8068547518063368158_o.jpg?_nc_cat=101&_nc_sid=8024bb&_nc_ohc=N9PHqo0HIWwAX_ijg4P&_nc_ht=scontent.fhan3-3.fna&tp=6&oh=6e4a8eb661adf4e61a2f682ed67d3d5e&oe=5F748A9C'],
            ['id'=>5, 'name' => 'Thành Viên Cốt Lõi', 'slug' => Str::slug('Thành Viên Cốt Lõi'), 'description' => '', 'content' => '', 'image' => ''],
            ['id'=>6, 'name' => 'Nhóm Của Chúng Tôi', 'slug' => Str::slug('Nhóm Của Chúng Tôi'), 'description' => '', 'content' => '', 'image' => ''],
            ['id'=>7, 'name' => 'Quyền Lợi Khi Gia Nhập Với Chúng Tôi', 'slug' => Str::slug('Quyền Lợi Khi Gia Nhập Với Chúng Tôi'), 'description' => '', 'content' => '', 'image' => ''],
            ['id'=>8, 'name' => 'Báo Chí Nói Về Chúng Tôi', 'slug' => Str::slug('Báo Chí Nói Về Chúng Tôi'), 'description' => 'Scuti đã vinh dự nhận được nhiều bằng khen, giải thưởng các cấp vinh danh những đóng góp và thành tích của công ty trong hoạt động sản xuất kinh doanh, hoạt động cộng đồng xã hội và sự nghiệp xây dựng, bảo vệ Tổ quốc.', 'content' => '', 'image' => ''],
            ['id'=>9, 'name' => 'Ghé Thăm Chúng Tôi', 'slug' => Str::slug('Ghé Thăm Chúng Tôi'), 'description' => 'Đừng ngần ngại gọi cho chúng tôi hoặc gửi tin nhắn liên hệ cho chúng tôi!', 'content' => '', 'image' => 'https://www.scuti.asia/uploads/6/1/9/4/61941893/img-4248_orig.jpg'],
            ['id'=>10, 'name' => 'Quy Trình Tuyển Dụng', 'slug' => Str::slug('Quy Trình Tuyển Dụng'), 'description' => 'Chúng tôi luôn tìm kiếm những người tuyệt vời! Nếu bạn chưa tìm thấy cơ hội phù hợp hiện tại, nhưng tin rằng bạn có thể trở thành 1 phần của Scuti, hãy gửi thông tin cho chúng tôi.', 
                'content' => 
                '<div class="col-lg-10 offset-lg-1 row my-3">
                        <div class="col-md-2 text-center pt-2 mb-3">①</div>
                        <div class="col-md-10 text-center text-md-left">
                            <p>Vui lòng liên hệ với chúng tôi từ nút bên dưới và cho bạn thấy ý định muốn ứng tuyển vào công ty của chúng tôi. Khi bạn liên hệ với chúng tôi, vui lòng nói rõ bạn muốn ứng tuyển vào vị trí nào. Không ai thất bại trong giai đoạn này.</p>   
                        </div>
                    </div>
                    <div class="col-lg-10 offset-lg-1 row my-3">
                        <div class="col-md-2 text-center pt-2 mb-3">②</div>
                        <div class="col-md-10 text-center text-md-left">
                            <p>Nhân viên của chúng tôi sẽ trả lời bạn sớm và thông báo cho bạn những gì chúng tôi muốn bạn gửi. Điều này bao gồm cả bài kiểm tra trên giấy.</p>   
                        </div>
                    </div>
                    <div class="col-lg-10 offset-lg-1 row my-3">
                        <div class="col-md-2 text-center pt-2 mb-3">③</div>
                        <div class="col-md-10 text-center text-md-left">
                            <p>Bạn phỏng vấn các thành viên của chúng tôi (bao gồm cả Giám đốc điều hành) một hoặc hai lần. Tất cả các cuộc phỏng vấn được tổ chức bằng tiếng Anh.</p>   
                        </div>
                    </div>
                    <div class="col-lg-10 offset-lg-1 row my-3">
                        <div class="col-md-2 text-center pt-2 mb-3">④</div>
                        <div class="col-md-10 text-center text-md-left">
                            <p>Nếu bạn may mắn vượt qua tất cả các cuộc tuyển chọn, chúng tôi sẽ gặp bạn một lần nữa để đưa ra lời mời làm việc.</p>   
                        </div>
                    </div>
                    <div class="col-lg-10 offset-lg-1 row my-3">
                        <div class="col-md-2 text-center pt-2 mb-3">⑤</div>
                        <div class="col-md-10 text-center text-md-left">
                            <p>Nếu bạn đồng ý với tất cả các điều kiện của một lời mời làm việc, bạn bắt đầu làm việc với chúng tôi!</p>   
                        </div>
                    </div>', 
                'image' => ''],
            ['id'=>11, 'name' => 'Tin Tuyển Dụng', 'slug' => Str::slug('Tin Tuyển Dụng'), 'description' => 'Chúng tôi luôn tìm kiếm những người tuyệt vời! Nếu bạn chưa tìm thấy cơ hội phù hợp hiện tại, nhưng tin rằng bạn có thể trở thành 1 phần của Scuti, hãy gửi thông tin cho chúng tôi.', 'content' => '', 'image' => ''],
        ]);
        DB::table('visit_us')->insert([
            ['id'=>1, 'name'=>'Tâm Nguyễn', 'email' => 'customer@gmail.com', 'message' => 'Qua chơi', 'type' => 'coffee'],
            ['id'=>2, 'name'=>'Nguyễn Phú Tâm', 'email' => 'customer2@gmail.com', 'message' => 'Qua chơi', 'type' => 'Trà Đá'],
        ]);
        DB::table('categories')->insert([
            ['id'=>1,'user_id' => 1, 'category_name'=>'PHP', 'slug' => \Str::slug('PHP'), 'status' => 1],
            ['id'=>2,'user_id' => 1, 'category_name'=>'NodeJs', 'slug' => \Str::slug('NodeJs'), 'status' => 1],
            ['id'=>3,'user_id' => 1, 'category_name'=>'Java', 'slug' => \Str::slug('Java'), 'status' => 1],
            ['id'=>4,'user_id' => 1, 'category_name'=>'Html Css', 'slug' => \Str::slug('Html Css'), 'status' => 1],
            ['id'=>5,'user_id' => 1, 'category_name'=>'ReactJs', 'slug' => \Str::slug('ReactJs'), 'status' => 1],
        ]);
        DB::table('jobs')->insert([
            ['id'=>1,'category_id' => 1, 'name'=>'PHP', 'slug' => \Str::slug('PHP'), 'description'=> 'Hỗ trợ xác định yêu cầu, phân tích yêu cầu và thử nghiệm trong các dự án với quan điểm của người dùng với CEO.', 
                'content' => 
                '<h4>Mô tả công việc</h4>
                <p>
                    - Quản trị web<br>
                    - Tham gia xây dựng, phát triển các website sản phẩm, dịch vụ, tin tức.<br>
                    - Xử lý các lỗi phát sinh trong quá trình vận hành website.<br>
                    - Tối ưu hóa website chuẩn seo, giao diện thân thiện với mọi thiết bị. Code thêm các tính năng mới trên hệ thống web có sẵn của công ty.<br>
                    - Tối ưu hóa code, tối ưu hóa truy xuất cơ sở dữ liệu để các website có thể chịu tải được nhiều lượt truy cập/ngày.<br>
                    - Quản lý tên miền, hosting…<br>
                    - Các công việc khác: Quản trị hệ thống mạng. Kiểm tra khắc phục nếu phát sinh lỗi<br>
                    - Thực hiện báo cáo công việc hàng tuần với cấp trên.<br>
                    - Thực hiện nhiệm vụ khác do cấp trên giao.<br>
                </p>
                <h4>Yêu cầu công việc</h4>
                <p>
                    - Thành thạo ngôn ngữ lập trình PHP, cơ sở dữ liệu MySQL;<br>
                    - Tham gia lập trình website thương mại điện tử bằng WordPress<br>
                    - Sử dụng theme, plugin để thiết kế Landingpage trên nền tảng Wordpress<br>
                    - Hiểu biết jQuery,  HTML5, CSS, Javascript, Bootstrap<br>
                    - Có kinh nghiệm với Laravel, Joomla là 1 lợi thế 
                </p>
                <h4>Quyền lợi</h4>
                <p>
					- Thu nhập từ 7 đến 12 triệu+ KPIs phụ thuộc vào năng lực<br>
                    - Được nghỉ các ngày lễ, tết theo quy định, nghỉ phép 12ngày/năm, hưởng lương tháng 13.<br>
                    - Nghỉ các ngày chủ nhật và 2 ngày thứ 7/tháng.<br>
                    - Thu nhập xứng đáng với năng lực và hiệu quả công việc.<br>
                    - Làm việc trong môi trường chuyên nghiệp, năng động vui vẻ.<br>
                    - Có nhiều cơ hội học hỏi, nâng cao trình độ nghiệp vụ.<br>
                    - Thăng tiến nhanh nếu chứng tỏ được năng lực bản thân. Lương sẽ lên cao đúng như năng lực chứng mình được trong thời gian làm việc.
                </p>',
                'location_id' => 1, 'salary' => 'Thỏa Thuận', 'expireDay' => '2020/10/15', 'status' =>1],
            ['id'=>2,'category_id' => 2, 'name'=>'Node', 'slug' => \Str::slug('Node'), 'description'=> 'Hỗ trợ xác định yêu cầu, phân tích yêu cầu và thử nghiệm trong các dự án với quan điểm của người dùng với CEO.', 
                'content' => 
                    '<h4>Mô tả công việc</h4>
                    <div class="description">
                        <ul>
                            <li>Tham gia xây dựng, phát triển backend cho các hệ thống xử lý dữ liệu lớn, hiệu năng cao: Social network, thương mại điện tử, quảng cáo trực tuyến, các hệ thống cho doanh nghiệp sản xuất phân phối.</li>
                            <li>Tham gia vào quá trình tìm hiểu và phân tích yêu cầu, thiết kế và tối ưu hệ thống cho hệ thống dữ liệu lớn phục vụ hàng triệu người dùng.</li>
                            <li>Làm việc với các phòng ban khác để tham gia phát triển các tính năng, sản phẩm mới.</li>
                            <li>Tham gia các buổi đánh giá chất lượng công việc của các thành viên khác trong team, hỗ trợ các thành viên phát triển các module phức tạp.</li>
                            <li>Tham gia training cho các bạn mới.</li>
                        </ul>
                    </div>
                    <h4>Yêu cầu công việc</h4>
                    <div>
                        <ul>
                            <li><strong>UV có tối thiểu 1 năm kinh nghiệm lập trình NodeJS</strong></li>
                            <li><strong>Độ tuổi: &lt;= 30 tuổi</strong></li>
                            <li><strong>Thành thạo một trong các hệ quản trị CSDL: MySQL, MongoDB, Postgres, …</strong></li>
                            <li><strong>Có kinh nghiệm với một trong các framework ExpressJS, Sails,...</strong></li>
                            <li>Lập trình thuật toán tốt, có kinh nghiệm&nbsp; xử lý tốt với lượng dữ liệu lớn là một lợi thế</li>
                            <li>Có kinh nghiệm làm việc với Redis, ElasticSearch, RabbitMQ,..</li>
                            <li><strong>Có khả năng phân tích, thiết kế hệ thống hướng đối tượng (UML) là một lợi thế</strong></li>
                            <li>Có khả năng làm độc lập, nghiên cứu tốt để giải quyết các vấn đề khó của dự án</li>
                            <li>Có kinh nghiệm làm việc với Linux, hiểu biết về Docker và Kubernetes là một lợi thế</li>
                            <li>Có khả năng đọc hiểu tiếng Anh.</li>
                            <li>Có niềm đam mê, khám phá, học hỏi công nghệ mới. Sẵn sàng chuyển đổi công nghệ, ngôn ngữ mới.</li>
                            <li>Nhiệt tình và cẩn thận trong công việc, teamwork với team tốt.</li>
                        </ul>
                    </div>
                    <h4>Quyền lợi</h4>
                    <ul>
                        <li>Chính sách thưởng phong phú: Thưởng tháng lương 13 + thưởng nóng dự án + thưởng nhân viên xuất sắc + các khoản thưởng khác;</li><li>Xét tăng lương 2 lần/năm dựa trên hiệu quả công việc;</li><li>Hưởng đầy đủ các chế độ bảo hiểm theo quy định;</li><li>Được tặng quà, thăm hỏi nhân các dịp sinh nhật, cưới hỏi, hiếu hỉ, ốm đau…;</li><li>Làm việc trong môi trường hiện đại, trẻ trung, văn hóa mở với nhiều hoạt động văn hóa tinh thần: du lịch, nghỉ dưỡng, party sự kiện…</li>
                    </ul>',
                'location_id' => 1, 'salary' => 'Thỏa Thuận', 'expireDay' => '2020/10/15', 'status' =>1],
            ['id'=>3,'category_id' => 3, 'name'=>'Java', 'slug' => \Str::slug('java'), 'description'=> 'Hỗ trợ xác định yêu cầu, phân tích yêu cầu và thử nghiệm trong các dự án với quan điểm của người dùng với CEO.', 
                'content' => 
                    '<h4>Mô tả công việc</h4>
                    <p>
                        Công việc lập trình Winform ERP:<br>
                        · Tham gia xây dựng Form nhập liệu, Form phân tích thống kê theo yêu cầu.<br>
                        · Tham gia xây dựng biểu mẫu, báo cáo theo yêu cầu.<br>
                        · Tham gia bảo trì hệ thống: Xử lý lỗi, Ưu hóa truy xuất CSDL, Ưu hóa các chức năng của hệ thống.<br>
                        · Phối hợp với Đội Dự án để triển khai hệ thống.<br>
                        Công việc kỹ thuật viên:<br>
                        · Quản trị và bảo trì Hệ thống mạng, máy chủ, máy trạm, các thiết bị liên quan máy tính…<br>
                        · Triển khai, giám sát Công trình ICT, Tổng đài VOIP, Hệ thống ảo hóa VMWare…<br>
                        · Bảo trì các thiết bị CNTT: Máy chủ, máy trạm, máy in, các thiết bị liên quan máy tính…
                    </p>
                    <h4>Yêu cầu công việc</h4>
                    <p>
                        · Tốt nghiệp CAO ĐẲNG trở lên chuyên ngành CNTT, Tự động hóa, Toán - Tin học hoặc các ngành liên quan…<br>
                        · Anh văn tương đương bằng B.<br>
                        · Yêu thích công việc lập trình và có tư duy logic trong toán học.<br>
                        · Giao tiếp tốt, trình bày vấn đề rõ ràng, dễ hiểu.<br>
                        · Ưu tiên ứng viên có hiểu biết về SQL Server / Database hoặc TCP/IP, Các loại thiết bị chia sẻ IP.
                    </p>
                    <h4>Quyền lợi</h4>
                    <p>
                        · Lương học việc: 6.000.000 /tháng.<br>
                        · Lương chính thức: Từ 7.000.000 - 12.000.000<br>
                        · Chế độ lương và thưởng: Lương cơ bản, Thưởng thâm niên, Thưởng hiệu quả, Thưởng lãnh đạo, Thưởng động viên, Thưởng khác, Phụ cấp cơm, Phụ cấp gửi xe….<br>
                        · Công ty sẽ cung cấp máy tính làm việc.<br>
                        · Có cơ hội phát triển vào các vị trí quản lý của các chi nhánh công ty ở nước ngoài (Đài Loan, Myanmar,…).<br>
                        · Được đào tạo dựa trên công việc thực tế, giúp hội nhập nhanh và xử lý công việc hiệu quả.<br>
                        · Được đào tạo về lập trình cơ sở dữ liệu và lập trình hướng đối tượng.<br>
                        · Được đào tạo về nghiệp vụ và quy trình làm việc của hệ thống ERP.<br>
                        · Có cơ hội phát triển vào các vị trí chuyên viên, quản lý của công ty.<br>
                        · Có cơ hội làm việc và triển khai dự án cho các doanh nghiệp lớn.<br>
                        · Hưởng chế độ theo quy định luật lao động và BHXH, BHYT, BHTN...<br>
                        · Tham gia các hoạt động tinh thần: du lịch, giải trí do Công ty tổ chức…
                    </p>',
                'location_id' => 1, 'salary' => 'Thỏa Thuận', 'expireDay' => '2020/10/15', 'status' =>1],
            ['id'=>4,'category_id' => 4, 'name'=>'FE', 'slug' => \Str::slug('FE'), 'description'=> 'Hỗ trợ xác định yêu cầu, phân tích yêu cầu và thử nghiệm trong các dự án với quan điểm của người dùng với CEO.', 
                'content' => 
                    '<h4>Mô tả công việc</h4>
                    <p>
                    - Sử dụng <strong>CMS (như WordPress)</strong> hoặc những kỹ thuật như <strong>HTML, CSS, JavaScript (ReactJS/ VueJS)</strong> v.v… để viết Code và tạo Website dành cho PC và Smartphone.<br>- Lên kế hoạch, thiết kế, tạo Website mới.<br>- Kiểm tra hiệu quả của trang web đã tạo.<br>- Chỉnh sửa, cập nhật những trang Web có sẵn.
                    </p>
                    <h4>Yêu cầu công việc</h4>
                    <p>✔️ Yêu cầu kỹ thuật:<br><br>- Có kinh nghiệm làm việc từ 4 năm trở lên với <strong>JavaScript</strong>, và trên 2 năm với phiên bản từ <strong>ES2015(ES6)</strong> trở lên).<br>- Có kinh nghiệm sử dụng FrameWork/Library như <strong>React/Vue </strong>để lập trình JavaScript.<br>- Có kinh nghiệm Coding bằng <strong>HTML5＋CSS3</strong> (kinh nghiệm làm việc thực tiễn từ 4 năm trở lên).<br>- Có kinh nghiệm sử dụng ngôn ngữ lập trình <strong>Meta (Sass (SCSS), Less, Stylus) </strong>để thiết kế CSS.<br>- Có kinh nghiệm tạo HTML/CSS theo các quy tắc chuẩn của Coding (Bao gồm kinh nghiệm sử dụng Quy tắc đặt tên phổ biến <strong>BEM</strong>.v.v...)<br>- Có kinh nghiệm sử dụng Tool quản lý version như <strong>Git</strong>, v.v...<br>- Có kinh nghiệm sử dụng Task runner.<br>- Có kinh nghiệm lập trình web với 2 front-end dev trở lên.<br><br>✔️ Yêu cầu khác:<br><br>- Có khả năng làm việc nhóm và thích giao tiếp<br>- Yêu thích những công việc mang tính chất tỉ mỉ, cẩn thận.<br>- Có tư duy tích cực, suy nghĩ có lập trường.<br>- Có khả năng thấu hiểu, nắm bắt và phác họa tốt những yêu cầu của khách hàng cũng như khả năng trình bày suy nghĩ, ý tưởng của bản thân.<br>- Có khả năng kiểm tra và chỉnh sửa Code sao cho chính xác, rõ ràng, dễ hiểu.<br>- Bắt kịp những xu hướng và kỹ thuật mới, chủ động mở rộng tầm nhìn và kiến thức.<br>- Có tinh thần hợp tác tốt và tính linh hoạt cao.
                    </p>
                    <h4>Quyền lợi</h4>
                    <p>- Thời gian làm việc: 8:00 ~ 17:00 từ thứ 2 đến thứ 6 (nghỉ Thứ Bảy, Chủ Nhật và các ngày Lễ, Tết)<br>- Thưởng: 2 lần/năm<br>- Ngoài các gói bảo hiểm cơ bản theo quy định của Luật Lao Động, bạn còn được tham gia gói bảo hiểm tai nạn lao động tại Lampart.<br>- Trà, sữa, coffee,... miễn phí<br>- Ngày nghỉ đặc biệt dành cho nhân viên nữ: 0.5 ngày/ tháng.<br>- Được hưởng những phúc lợi đặc biệt như chương trình quà tết, bánh trung thu, tiền mừng đám cưới (5,000,000 VND), tiền mừng khi sanh con (2,000,000 VND),…<br>- Đối với nhân viên ký hợp đồng không xác định thời hạn: từ thời điểm ký hợp đồng không xác định thời hạn, cứ mỗi năm được cộng thêm 1 ngày nghỉ phép. Ngày nghỉ phép không sử dụng hết trong năm sẽ trả vào lương tháng cuối cùng của năm.
                    </p>',
                'location_id' => 1, 'salary' => 'Thỏa Thuận', 'expireDay' => '2020/10/15', 'status' =>1],
            ['id'=>5,'category_id' => 5, 'name'=>'React', 'slug' => \Str::slug('React'), 'description'=> 'Hỗ trợ xác định yêu cầu, phân tích yêu cầu và thử nghiệm trong các dự án với quan điểm của người dùng với CEO.', 
                'content' => 
                    '<h4>Mô tả công việc</h4>
                    <div class="description">
                        <p></p><ul><li>Xây dựng các sản phẩm phần mềm của công ty.</li><li>Đảm bảo chất lượng code.</li></ul><p></p>
                    </div>
                    <h4>Yêu cầu công việc</h4>
                    <div class="experience">
                    <p></p><ul><li>Có ít nhất 2 năm kinh nghiệm trong việc phát triển phần mềm&nbsp;</li><li>Có kinh nghiệm với React, ReactJS, AngularJS&nbsp;</li><li>Nhiều kinh nghiệm với CSS, HTML, Javascript&nbsp;</li><li>Có kinh nghiệm làm việc với NodeJS, PHP Có kinh nghiệm làm việc với MySQL.&nbsp;</li><li>Giao tiếp và làm việc nhóm tốt&nbsp;</li><li>Tiếng Anh giao tiếp tốt.&nbsp;</li><li>Trách nhiệm, cầu tiến trong công việc&nbsp;</li><li>Làm việc với quy trình Agile.&nbsp;</li><li>Có kinh nghiệm trong lĩnh vực F&amp;B là lợi thế</li></ul><p></p>
                    </div>
                    <h4>Quyền lợi</h4>
                    <div class="culture_description">
                        <ul><li>Lương, thưởng cạnh tranh trên thị trường và công bằng trong nội bộ.</li><li>Được làm việc trong môi trường năng động, trẻ trung, đầy nhiệt huyết.</li><li>Cơ hội được làm việc trên một sản phẩm phát triển theo hướng B2B</li><li>Được tham gia các hoạt động team building của công ty.</li><li>Trợ cấp ăn trưa và đi lại.</li><li>Chế độ nghỉ lễ tết, BHYT/BHXH/BHTN theo quy định của luật lao động.</li></ul>
                    </div>',
                'location_id' => 1, 'salary' => 'Thỏa Thuận', 'expireDay' => '2020/10/15', 'status' =>1],
        ]);
        DB::table('cvs')->insert([
            ['id'=>1,'user_id' => 1, 'cv_name' => 'CV1', 'cv_url'=>'https://miro.medium.com/max/1200/1*Eu6cAGjXNa0-ct_hlsH1yQ.jpeg'],
            ['id'=>2,'user_id' => 2, 'cv_name' => 'CV2', 'cv_url'=>'http://congstudio.vn/product_images/uploaded_images/chup_anh_profile_chuyen_nghiep_cong_studio_1_aztl4.jpg'],
            ['id'=>3,'user_id' => 3, 'cv_name' => 'CV3', 'cv_url'=>'http://congstudio.vn/product_images/z/320/chup_anh_profile_tai_ha_noi_cong_studio_4__09337_thumb.jpg'],
            ['id'=>4,'user_id' => 4, 'cv_name' => 'CV4', 'cv_url'=>'http://congstudio.vn/product_images/z/320/chup_anh_profile_tai_ha_noi_cong_studio_4__09337_thumb.jpg'],
            ['id'=>5,'user_id' => 5, 'cv_name' => 'CV5', 'cv_url'=>'http://congstudio.vn/product_images/z/320/chup_anh_profile_tai_ha_noi_cong_studio_4__09337_thumb.jpg'],
        ]);
        DB::table('user_job')->insert([
            ['id'=>1, 'user_id' => 1, 'cv_id' => 1, 'job_id' => 1, 'letter' => 'Cảm ơn', 'status' => 0, 'result' => 0, 'created_at' => \Carbon\Carbon::parse('11-06-2020 03:26:49')->format('Y-m-d H:i:s')],
            ['id'=>2, 'user_id' => 2, 'cv_id' => 2, 'job_id' => 2, 'letter' => 'Cảm ơn', 'status' => 0, 'result' => 0, 'created_at' => \Carbon\Carbon::parse('12-07-2020 03:26:49')->format('Y-m-d H:i:s')],
            ['id'=>3, 'user_id' => 2, 'cv_id' => 2, 'job_id' => 3, 'letter' => 'Cảm ơn', 'status' => 0, 'result' => 0, 'created_at' => \Carbon\Carbon::parse('20-08-2020 03:26:49')->format('Y-m-d H:i:s')],
            ['id'=>4, 'user_id' => 3, 'cv_id' => 3, 'job_id' => 4, 'letter' => 'Cảm ơn', 'status' => 0, 'result' => 0, 'created_at' => \Carbon\Carbon::parse('01-09-2020 03:26:49')->format('Y-m-d H:i:s')],
            ['id'=>5, 'user_id' => 4, 'cv_id' => 4, 'job_id' => 5, 'letter' => 'Cảm ơn', 'status' => 1, 'result' => 1, 'created_at' => \Carbon\Carbon::parse('09-09-2020 03:26:49')->format('Y-m-d H:i:s')],
        ]);
        DB::table('process')->insert([
            ['id'=>1, 'step' => 1, 'name' => 'Checking', 'user_job_id' => 1],
            ['id'=>2, 'step' => 2, 'name' => 'Interviewer', 'user_job_id' => 1],
            ['id'=>3, 'step' => 1, 'name' => 'Checking', 'user_job_id' => 2],
            ['id'=>4, 'step' => 1, 'name' => 'Checking', 'user_job_id' => 3],
            ['id'=>5, 'step' => 1, 'name' => 'Checking', 'user_job_id' => 5],
            ['id'=>6, 'step' => 2, 'name' => 'Interviewer', 'user_job_id' => 5],
            ['id'=>7, 'step' => 3, 'name' => 'Make Offer', 'user_job_id' => 5],
        ]);
        DB::table('evaluates')->insert([
            ['id'=>1, 'process_id' => 1,'comment' => '', 'reason' => 'Checking', 'status' => 1],
            ['id'=>2, 'process_id' => 2,'comment' => '', 'reason' => 'Interviewer', 'status' => 1],
            ['id'=>3, 'process_id' => 3,'comment' => '', 'reason' => 'Checking', 'status' => 1],
            ['id'=>4, 'process_id' => 4,'comment' => '', 'reason' => 'Checking', 'status' => 1],
            ['id'=>5, 'process_id' => 5,'comment' => '', 'reason' => 'Checking', 'status' => 1],
            ['id'=>6, 'process_id' => 6,'comment' => '', 'reason' => 'Interviewer', 'status' => 1],
            ['id'=>7, 'process_id' => 7,'comment' => '', 'reason' => 'Make Offer', 'status' => 1],
        ]);
        Schema::enableForeignKeyConstraints();
    }
}
