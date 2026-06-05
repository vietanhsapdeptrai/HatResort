<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Xóa dữ liệu cũ để tránh trùng lặp dữ liệu khi chạy lại lệnh
        DB::table('news')->truncate();

        // Khai báo mảng dữ liệu mẫu của bạn đã được chuyển sang cú pháp PHP
        $newsData = [
            [
                'title' => 'RỘN RÀNG LỄ HỘI MÙA XUÂN 2025',
                'category' => 'Lễ hội',
                'content' => 'Lễ hội mùa xuân 2025 sẽ diễn ra vào ngày 26/1 tại Hà Nội, hứa hẹn mang đến không khí rộn ràng và nhiều trải nghiệm đặc sắc cho người dân và du khách. Sự kiện năm nay quy tụ hàng chục gian hàng ẩm thực truyền thống, các tiết mục biểu diễn nghệ thuật dân gian, múa lân sư rồng, trò chơi dân gian và khu vực check-in trang trí rực rỡ sắc xuân. Ngoài ra, lễ hội còn có các hoạt động giao lưu văn hóa, trình diễn áo dài, thi gói bánh chưng, cùng nhiều phần quà hấp dẫn dành cho người tham gia. Đây là dịp để mọi người cùng nhau sum họp, tận hưởng không khí Tết cổ truyền và lưu giữ những khoảnh khắc đáng nhớ bên gia đình, bạn bè.',
                'created_by' => 'Đặng Việt Anh',
                'views' => 100,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'ĐÊM NHẠC TRUYỀN THỐNG 2024',
                'category' => 'Âm nhạc',
                'content' => 'Đêm nhạc truyền thống 2024 sẽ được tổ chức tại Nhà hát Lớn TP.HCM, quy tụ dàn nghệ sĩ nổi tiếng như Mỹ Linh, Tùng Dương, Đàm Vĩnh Hưng cùng nhiều ban nhạc trẻ tài năng. Chương trình mang đến những ca khúc bất hủ, kết hợp giữa âm nhạc truyền thống và hiện đại, tạo nên không gian nghệ thuật ấm cúng, gắn kết các thế hệ yêu nhạc. Ngoài phần trình diễn, khán giả còn được giao lưu với nghệ sĩ, tham gia các hoạt động tương tác và nhận quà lưu niệm. Đêm nhạc hứa hẹn sẽ là dấu ấn khó quên cho cộng đồng yêu nhạc Việt Nam.',
                'created_by' => 'Đặng Việt Anh',
                'views' => 220,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'NGÀY HỘI VIỆC LÀM SINH VIÊN 2024',
                'category' => 'Sự kiện',
                'content' => 'Ngày hội việc làm sinh viên 2024 diễn ra tại Đại học Quốc gia Hà Nội, thu hút hơn 50 doanh nghiệp lớn nhỏ tham gia tuyển dụng trực tiếp. Sự kiện mang đến hàng trăm cơ hội việc làm, thực tập cho sinh viên mới ra trường và các bạn trẻ đang tìm kiếm định hướng nghề nghiệp. Ngoài khu vực phỏng vấn, nộp CV, ngày hội còn có các buổi hội thảo về kỹ năng mềm, chia sẻ kinh nghiệm từ các chuyên gia nhân sự, hướng dẫn viết CV, phỏng vấn thử và tư vấn nghề nghiệp miễn phí. Đây là dịp để sinh viên kết nối với nhà tuyển dụng, nâng cao kỹ năng và chuẩn bị tốt hơn cho tương lai.',
                'created_by' => 'Đặng Việt Anh',
                'views' => 86,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'HỘI THẢO KHỞI NGHIỆP QUỐC GIA 2024',
                'category' => 'Hội thảo',
                'content' => 'Hội thảo Khởi nghiệp Quốc gia 2024 tại Đà Nẵng là sự kiện lớn nhất trong năm dành cho cộng đồng startup Việt Nam. Sự kiện quy tụ hàng trăm doanh nhân trẻ, nhà đầu tư, chuyên gia công nghệ và các diễn giả nổi tiếng. Các chủ đề thảo luận đa dạng như xu hướng công nghệ mới, quản trị doanh nghiệp, gọi vốn, phát triển sản phẩm và xây dựng thương hiệu. Ngoài ra, many dự án sáng tạo được trình bày trước các quỹ đầu tư, tạo cơ hội kết nối và hợp tác. Hội thảo còn có các workshop thực hành, tư vấn khởi nghiệp và chương trình kết nối mentor cho các startup tiềm năng.',
                'created_by' => 'Đặng Việt Anh',
                'views' => 150,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'FESTIVAL VĂN HÓA ẨM THỰC 2024',
                'category' => 'Ẩm thực',
                'content' => 'Festival Văn hóa Ẩm thực 2024 diễn ra tại Cố đô Huế, tôn vinh tinh hoa ẩm thực ba miền Bắc - Trung - Nam. Sự kiện quy tụ hơn 100 nghệ nhân ẩm thực, đầu bếp nổi tiếng, mang đến hàng trăm món ăn đặc sắc được trình bày đẹp mắt. Du khách sẽ được thưởng thức các món ăn truyền thống, tham gia các hoạt động giao lưu, trình diễn nấu ăn, thi ẩm thực và các workshop hướng dẫn chế biến món ngon. Không gian lễ hội được trang trí đậm chất văn hóa, kết hợp trình diễn nghệ thuật dân gian, ca múa nhạc và các trò chơi dân gian, tạo nên trải nghiệm độc đáo cho khách tham quan.',
                'created_by' => 'Đặng Việt Anh',
                'views' => 190,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'GIẢI CHẠY VÌ SỨC KHỎE CỘNG ĐỒNG',
                'category' => 'Thể thao',
                'content' => 'Giải chạy Vì Sức Khỏe Cộng Đồng 2024 tại Hải Phòng thu hút hơn 5.000 vận động viên chuyên nghiệp và không chuyên tham gia. Sự kiện nhằm lan tỏa thông điệp sống khỏe, rèn luyện thể thao và gây quỹ hỗ trợ trẻ em có hoàn cảnh khó khăn. Các cự ly chạy đa dạng phù hợp với mọi lứa tuổi, từ 3km, 5km đến 10km. Ngoài ra, chương trình còn có các hoạt động giao lưu, tư vấn sức khỏe, khu vực check-in, nhận huy chương và quà tặng cho người tham gia. Đây là dịp để cộng đồng cùng nhau nâng cao ý thức rèn luyện thể chất và sẻ chia với những hoàn cảnh khó khăn.',
                'created_by' => 'Đặng Việt Anh',
                'views' => 300,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'TRIỂN LÃM NGHỆ THUẬT ĐƯƠNG ĐẠI',
                'category' => 'Triển lãm',
                'content' => 'Triển lãm Nghệ thuật Đương đại 2024 tại Hà Nội giới thiệu hàng trăm tác phẩm hội họa, điêu khắc, nhiếp ảnh của các nghệ sĩ trẻ tài năng. Không gian triển lãm hiện đại, sáng tạo, mang đến trải nghiệm nghệ thuật mới lạ cho khách tham quan. Ngoài việc chiêm ngưỡng tác phẩm, khách còn được tham gia các workshop sáng tạo, giao lưu với nghệ sĩ, mua tác phẩm gốc và nhận quà lưu niệm. Triển lãm còn tổ chức các buổi tọa đàm về nghệ thuật đương đại, giúp công chúng hiểu hơn về xu hướng sáng tạo mới trong nghệ thuật Việt Nam.',
                'created_by' => 'Đặng Việt Anh',
                'views' => 110,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'LỄ HỘI ÁNH SÁNG ĐÀ NẴNG 2024',
                'category' => 'Lễ hội',
                'content' => 'Lễ hội Ánh sáng Đà Nẵng 2024 là sự kiện lớn nhất miền Trung, diễn ra dọc bờ sông Hàn với hàng triệu bóng đèn LED lung linh. Đêm hội rực rỡ ánh sáng kết hợp các tiết mục trình diễn nghệ thuật, âm nhạc sôi động và pháo hoa đặc sắc. Du khách sẽ được chiêm ngưỡng các mô hình ánh sáng nghệ thuật, tham gia các hoạt động check-in, trò chơi tương tác và nhận quà lưu niệm. Sự kiện kéo dài 3 đêm liên tục, tạo nên điểm nhấn du lịch nổi bật, thu hút hàng vạn du khách trong và ngoài nước đến tham quan, trải nghiệm.',
                'created_by' => 'Đặng Việt Anh',
                'views' => 260,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'TỌA ĐÀM VỀ PHÁT TRIỂN DU LỊCH BỀN VỮNG',
                'category' => 'Hội thảo',
                'content' => 'Tọa đàm về Phát triển Du lịch Bền vững tại Hội An quy tụ nhiều chuyên gia, doanh nghiệp và đại diện chính quyền địa phương. Sự kiện tập trung thảo luận các giải pháp phát triển du lịch xanh, bảo vệ môi trường, nâng cao nhận thức cộng đồng và xây dựng sản phẩm du lịch thân thiện. Ngoài các phiên thảo luận, tọa đàm còn có các hoạt động chia sẻ kinh nghiệm thực tiễn, giới thiệu mô hình du lịch bền vững thành công và kết nối hợp tác giữa các bên liên quan. Đây là diễn đàn ý nghĩa nhằm thúc đẩy phát triển du lịch bền vững tại Việt Nam.',
                'created_by' => 'Đặng Việt Anh',
                'views' => 70,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'CUỘC THI ẢNH SÁNG TẠO TRẺ 2024',
                'category' => 'Cuộc thi',
                'content' => 'Cuộc thi Ảnh Sáng tạo Trẻ 2024 dành cho giới trẻ trên toàn quốc, ghi lại những khoảnh khắc sáng tạo, ý nghĩa trong cuộc sống. Ban tổ chức nhận hơn 5.000 tác phẩm dự thi, chọn lọc các tác phẩm xuất sắc để trưng bày tại triển lãm ảnh cuối tháng 9 tại Hà Nội. Ngoài giải thưởng hấp dẫn, cuộc thi còn tổ chức các buổi workshop nhiếp ảnh, giao lưu với nhiếp ảnh gia nổi tiếng và chương trình trao giải được livestream trên fanpage sự kiện. Đây là sân chơi bổ ích, khuyến khích sáng tạo và lan tỏa những giá trị tích cực trong cộng đồng trẻ.',
                'created_by' => 'Đặng Việt Anh',
                'views' => 340,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'HỘI CHỢ HÀNG TIÊU DÙNG 2024',
                'category' => 'Sự kiện',
                'content' => 'Hội chợ Hàng tiêu dùng 2024 tại TP.HCM quy mô lớn, quy tụ hơn 200 doanh nghiệp tham gia giới thiệu sản phẩm mới, công nghệ hiện đại và many ưu đãi hấp dẫn. Khách tham quan có cơ hội trải nghiệm, mua sắm các mặt hàng tiêu dùng, điện tử, gia dụng, mỹ phẩm, thực phẩm sạch và nhận quà tặng từ các gian hàng. Ngoài ra, hội chợ còn tổ chức các hoạt động bốc thăm trúng thưởng, trình diễn sản phẩm, tư vấn tiêu dùng thông minh và các chương trình giải trí dành cho gia đình. Đây là dịp lý tưởng để người tiêu dùng tiếp cận sản phẩm mới và tận hưởng ưu đãi lớn.',
                'created_by' => 'Đặng Việt Anh',
                'views' => 95,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'LỄ HỘI HOA ANH ĐÀO HÀ NỘI 2025',
                'category' => 'Lễ hội',
                'content' => 'Lễ hội Hoa Anh Đào Hà Nội 2025 diễn ra vào tháng 3, mang đến sắc hồng rực rỡ cho Thủ đô. Hàng nghìn cây hoa anh đào được vận chuyển trực tiếp từ Nhật Bản, tạo nên không gian tuyệt đẹp tại khu vực hồ Hoàn Kiếm và các tuyến phố trung tâm. Lễ hội còn có các hoạt động giao lưu văn hóa Việt - Nhật, trình diễn nghệ thuật, ẩm thực, trình diễn kimono, hướng dẫn cắm hoa và các trò chơi truyền thống. Đây là dịp để người dân và du khách thưởng ngoạn vẻ đẹp hoa anh đào, trải nghiệm văn hóa Nhật Bản và lưu giữ những khoảnh khắc đáng nhớ.',
                'created_by' => 'Đặng Việt Anh',
                'views' => 280,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        // Thực hiện lệnh insert hàng loạt vào DB
        DB::table('news')->insert($newsData);
    }
}