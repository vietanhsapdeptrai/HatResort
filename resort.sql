-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table laravel.bookings
DROP TABLE IF EXISTS `bookings`;
CREATE TABLE IF NOT EXISTS `bookings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `room_id` bigint unsigned NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bookings_room_id_foreign` (`room_id`),
  CONSTRAINT `bookings_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.bookings: ~5 rows (approximately)
DELETE FROM `bookings`;
INSERT INTO `bookings` (`id`, `room_id`, `customer_name`, `customer_phone`, `check_in`, `check_out`, `status`, `created_at`, `updated_at`) VALUES
	(4, 2, 'test', '0123456789', '2026-06-10', '2026-06-12', 'cancelled', '2026-06-02 08:20:25', '2026-06-02 15:34:37'),
	(5, 3, 'test', '0123456789', '2026-06-10', '2026-06-12', 'cancelled', '2026-06-02 15:24:09', '2026-06-02 15:32:41'),
	(6, 4, 'test', '0123456789', '2026-06-10', '2026-06-12', 'cancelled', '2026-06-04 08:52:34', '2026-06-05 08:22:40'),
	(7, 1, 'test', '0123456789', '2026-06-23', '2026-06-25', 'cancelled', '2026-06-05 08:21:29', '2026-06-05 08:21:41'),
	(8, 3, 'test', '0123456789', '2026-06-30', '2026-07-01', 'confirmed', '2026-06-05 08:22:13', '2026-06-05 08:22:30');

-- Dumping structure for table laravel.cache
DROP TABLE IF EXISTS `cache`;
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.cache: ~0 rows (approximately)
DELETE FROM `cache`;

-- Dumping structure for table laravel.cache_locks
DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.cache_locks: ~0 rows (approximately)
DELETE FROM `cache_locks`;

-- Dumping structure for table laravel.failed_jobs
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.failed_jobs: ~0 rows (approximately)
DELETE FROM `failed_jobs`;

-- Dumping structure for table laravel.jobs
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.jobs: ~0 rows (approximately)
DELETE FROM `jobs`;

-- Dumping structure for table laravel.job_batches
DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.job_batches: ~0 rows (approximately)
DELETE FROM `job_batches`;

-- Dumping structure for table laravel.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.migrations: ~8 rows (approximately)
DELETE FROM `migrations`;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2026_05_14_152649_create_news_table', 1),
	(5, '2026_05_14_152656_create_rooms_table', 1),
	(6, '2026_05_14_152705_create_bookings_table', 1),
	(7, '2026_06_01_210525_add_user_id_to_bookings_table', 2),
	(8, '2026_06_02_151157_add_check_out_to_bookings_table', 3);

-- Dumping structure for table laravel.news
DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Hat Resort',
  `views` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.news: ~12 rows (approximately)
DELETE FROM `news`;
INSERT INTO `news` (`id`, `title`, `category`, `content`, `created_by`, `views`, `created_at`, `updated_at`) VALUES
	(1, 'RỘN RÀNG LỄ HỘI MÙA XUÂN 2025', 'Lễ hội', 'Lễ hội mùa xuân 2025 sẽ diễn ra vào ngày 26/1 tại Hà Nội, hứa hẹn mang đến không khí rộn ràng và nhiều trải nghiệm đặc sắc cho người dân và du khách. Sự kiện năm nay quy tụ hàng chục gian hàng ẩm thực truyền thống, các tiết mục biểu diễn nghệ thuật dân gian, múa lân sư rồng, trò chơi dân gian và khu vực check-in trang trí rực rỡ sắc xuân. Ngoài ra, lễ hội còn có các hoạt động giao lưu văn hóa, trình diễn áo dài, thi gói bánh chưng, cùng nhiều phần quà hấp dẫn dành cho người tham gia. Đây là dịp để mọi người cùng nhau sum họp, tận hưởng không khí Tết cổ truyền và lưu giữ những khoảnh khắc đáng nhớ bên gia đình, bạn bè.', 'Đặng Việt Anh', 100, '2026-06-01 13:50:40', '2026-06-01 13:50:40'),
	(2, 'ĐÊM NHẠC TRUYỀN THỐNG 2024', 'Âm nhạc', 'Đêm nhạc truyền thống 2024 sẽ được tổ chức tại Nhà hát Lớn TP.HCM, quy tụ dàn nghệ sĩ nổi tiếng như Mỹ Linh, Tùng Dương, Đàm Vĩnh Hưng cùng nhiều ban nhạc trẻ tài năng. Chương trình mang đến những ca khúc bất hủ, kết hợp giữa âm nhạc truyền thống và hiện đại, tạo nên không gian nghệ thuật ấm cúng, gắn kết các thế hệ yêu nhạc. Ngoài phần trình diễn, khán giả còn được giao lưu với nghệ sĩ, tham gia các hoạt động tương tác và nhận quà lưu niệm. Đêm nhạc hứa hẹn sẽ là dấu ấn khó quên cho cộng đồng yêu nhạc Việt Nam.', 'Đặng Việt Anh', 220, '2026-06-01 13:50:40', '2026-06-01 13:50:40'),
	(3, 'NGÀY HỘI VIỆC LÀM SINH VIÊN 2024', 'Sự kiện', 'Ngày hội việc làm sinh viên 2024 diễn ra tại Đại học Quốc gia Hà Nội, thu hút hơn 50 doanh nghiệp lớn nhỏ tham gia tuyển dụng trực tiếp. Sự kiện mang đến hàng trăm cơ hội việc làm, thực tập cho sinh viên mới ra trường và các bạn trẻ đang tìm kiếm định hướng nghề nghiệp. Ngoài khu vực phỏng vấn, nộp CV, ngày hội còn có các buổi hội thảo về kỹ năng mềm, chia sẻ kinh nghiệm từ các chuyên gia nhân sự, hướng dẫn viết CV, phỏng vấn thử và tư vấn nghề nghiệp miễn phí. Đây là dịp để sinh viên kết nối với nhà tuyển dụng, nâng cao kỹ năng và chuẩn bị tốt hơn cho tương lai.', 'Đặng Việt Anh', 86, '2026-06-01 13:50:40', '2026-06-01 13:50:40'),
	(4, 'HỘI THẢO KHỞI NGHIỆP QUỐC GIA 2024', 'Hội thảo', 'Hội thảo Khởi nghiệp Quốc gia 2024 tại Đà Nẵng là sự kiện lớn nhất trong năm dành cho cộng đồng startup Việt Nam. Sự kiện quy tụ hàng trăm doanh nhân trẻ, nhà đầu tư, chuyên gia công nghệ và các diễn giả nổi tiếng. Các chủ đề thảo luận đa dạng như xu hướng công nghệ mới, quản trị doanh nghiệp, gọi vốn, phát triển sản phẩm và xây dựng thương hiệu. Ngoài ra, many dự án sáng tạo được trình bày trước các quỹ đầu tư, tạo cơ hội kết nối và hợp tác. Hội thảo còn có các workshop thực hành, tư vấn khởi nghiệp và chương trình kết nối mentor cho các startup tiềm năng.', 'Đặng Việt Anh', 150, '2026-06-01 13:50:40', '2026-06-01 13:50:40'),
	(5, 'FESTIVAL VĂN HÓA ẨM THỰC 2024', 'Ẩm thực', 'Festival Văn hóa Ẩm thực 2024 diễn ra tại Cố đô Huế, tôn vinh tinh hoa ẩm thực ba miền Bắc - Trung - Nam. Sự kiện quy tụ hơn 100 nghệ nhân ẩm thực, đầu bếp nổi tiếng, mang đến hàng trăm món ăn đặc sắc được trình bày đẹp mắt. Du khách sẽ được thưởng thức các món ăn truyền thống, tham gia các hoạt động giao lưu, trình diễn nấu ăn, thi ẩm thực và các workshop hướng dẫn chế biến món ngon. Không gian lễ hội được trang trí đậm chất văn hóa, kết hợp trình diễn nghệ thuật dân gian, ca múa nhạc và các trò chơi dân gian, tạo nên trải nghiệm độc đáo cho khách tham quan.', 'Đặng Việt Anh', 190, '2026-06-01 13:50:40', '2026-06-01 13:50:40'),
	(6, 'GIẢI CHẠY VÌ SỨC KHỎE CỘNG ĐỒNG', 'Thể thao', 'Giải chạy Vì Sức Khỏe Cộng Đồng 2024 tại Hải Phòng thu hút hơn 5.000 vận động viên chuyên nghiệp và không chuyên tham gia. Sự kiện nhằm lan tỏa thông điệp sống khỏe, rèn luyện thể thao và gây quỹ hỗ trợ trẻ em có hoàn cảnh khó khăn. Các cự ly chạy đa dạng phù hợp với mọi lứa tuổi, từ 3km, 5km đến 10km. Ngoài ra, chương trình còn có các hoạt động giao lưu, tư vấn sức khỏe, khu vực check-in, nhận huy chương và quà tặng cho người tham gia. Đây là dịp để cộng đồng cùng nhau nâng cao ý thức rèn luyện thể chất và sẻ chia với những hoàn cảnh khó khăn.', 'Đặng Việt Anh', 300, '2026-06-01 13:50:40', '2026-06-01 13:50:40'),
	(7, 'TRIỂN LÃM NGHỆ THUẬT ĐƯƠNG ĐẠI', 'Triển lãm', 'Triển lãm Nghệ thuật Đương đại 2024 tại Hà Nội giới thiệu hàng trăm tác phẩm hội họa, điêu khắc, nhiếp ảnh của các nghệ sĩ trẻ tài năng. Không gian triển lãm hiện đại, sáng tạo, mang đến trải nghiệm nghệ thuật mới lạ cho khách tham quan. Ngoài việc chiêm ngưỡng tác phẩm, khách còn được tham gia các workshop sáng tạo, giao lưu với nghệ sĩ, mua tác phẩm gốc và nhận quà lưu niệm. Triển lãm còn tổ chức các buổi tọa đàm về nghệ thuật đương đại, giúp công chúng hiểu hơn về xu hướng sáng tạo mới trong nghệ thuật Việt Nam.', 'Đặng Việt Anh', 110, '2026-06-01 13:50:40', '2026-06-01 13:50:40'),
	(8, 'LỄ HỘI ÁNH SÁNG ĐÀ NẴNG 2024', 'Lễ hội', 'Lễ hội Ánh sáng Đà Nẵng 2024 là sự kiện lớn nhất miền Trung, diễn ra dọc bờ sông Hàn với hàng triệu bóng đèn LED lung linh. Đêm hội rực rỡ ánh sáng kết hợp các tiết mục trình diễn nghệ thuật, âm nhạc sôi động và pháo hoa đặc sắc. Du khách sẽ được chiêm ngưỡng các mô hình ánh sáng nghệ thuật, tham gia các hoạt động check-in, trò chơi tương tác và nhận quà lưu niệm. Sự kiện kéo dài 3 đêm liên tục, tạo nên điểm nhấn du lịch nổi bật, thu hút hàng vạn du khách trong và ngoài nước đến tham quan, trải nghiệm.', 'Đặng Việt Anh', 260, '2026-06-01 13:50:40', '2026-06-01 13:50:40'),
	(9, 'TỌA ĐÀM VỀ PHÁT TRIỂN DU LỊCH BỀN VỮNG', 'Hội thảo', 'Tọa đàm về Phát triển Du lịch Bền vững tại Hội An quy tụ nhiều chuyên gia, doanh nghiệp và đại diện chính quyền địa phương. Sự kiện tập trung thảo luận các giải pháp phát triển du lịch xanh, bảo vệ môi trường, nâng cao nhận thức cộng đồng và xây dựng sản phẩm du lịch thân thiện. Ngoài các phiên thảo luận, tọa đàm còn có các hoạt động chia sẻ kinh nghiệm thực tiễn, giới thiệu mô hình du lịch bền vững thành công và kết nối hợp tác giữa các bên liên quan. Đây là diễn đàn ý nghĩa nhằm thúc đẩy phát triển du lịch bền vững tại Việt Nam.', 'Đặng Việt Anh', 70, '2026-06-01 13:50:40', '2026-06-01 13:50:40'),
	(10, 'CUỘC THI ẢNH SÁNG TẠO TRẺ 2024', 'Cuộc thi', 'Cuộc thi Ảnh Sáng tạo Trẻ 2024 dành cho giới trẻ trên toàn quốc, ghi lại những khoảnh khắc sáng tạo, ý nghĩa trong cuộc sống. Ban tổ chức nhận hơn 5.000 tác phẩm dự thi, chọn lọc các tác phẩm xuất sắc để trưng bày tại triển lãm ảnh cuối tháng 9 tại Hà Nội. Ngoài giải thưởng hấp dẫn, cuộc thi còn tổ chức các buổi workshop nhiếp ảnh, giao lưu với nhiếp ảnh gia nổi tiếng và chương trình trao giải được livestream trên fanpage sự kiện. Đây là sân chơi bổ ích, khuyến khích sáng tạo và lan tỏa những giá trị tích cực trong cộng đồng trẻ.', 'Đặng Việt Anh', 340, '2026-06-01 13:50:40', '2026-06-01 13:50:40'),
	(11, 'HỘI CHỢ HÀNG TIÊU DÙNG 2024', 'Sự kiện', 'Hội chợ Hàng tiêu dùng 2024 tại TP.HCM quy mô lớn, quy tụ hơn 200 doanh nghiệp tham gia giới thiệu sản phẩm mới, công nghệ hiện đại và many ưu đãi hấp dẫn. Khách tham quan có cơ hội trải nghiệm, mua sắm các mặt hàng tiêu dùng, điện tử, gia dụng, mỹ phẩm, thực phẩm sạch và nhận quà tặng từ các gian hàng. Ngoài ra, hội chợ còn tổ chức các hoạt động bốc thăm trúng thưởng, trình diễn sản phẩm, tư vấn tiêu dùng thông minh và các chương trình giải trí dành cho gia đình. Đây là dịp lý tưởng để người tiêu dùng tiếp cận sản phẩm mới và tận hưởng ưu đãi lớn.', 'Đặng Việt Anh', 95, '2026-06-01 13:50:40', '2026-06-01 13:50:40'),
	(12, 'LỄ HỘI HOA ANH ĐÀO HÀ NỘI 2025', 'Lễ hội', 'Lễ hội Hoa Anh Đào Hà Nội 2025 diễn ra vào tháng 3, mang đến sắc hồng rực rỡ cho Thủ đô. Hàng nghìn cây hoa anh đào được vận chuyển trực tiếp từ Nhật Bản, tạo nên không gian tuyệt đẹp tại khu vực hồ Hoàn Kiếm và các tuyến phố trung tâm. Lễ hội còn có các hoạt động giao lưu văn hóa Việt - Nhật, trình diễn nghệ thuật, ẩm thực, trình diễn kimono, hướng dẫn cắm hoa và các trò chơi truyền thống. Đây là dịp để người dân và du khách thưởng ngoạn vẻ đẹp hoa anh đào, trải nghiệm văn hóa Nhật Bản và lưu giữ những khoảnh khắc đáng nhớ.', 'Đặng Việt Anh', 280, '2026-06-01 13:50:40', '2026-06-01 13:50:40');

-- Dumping structure for table laravel.password_reset_tokens
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.password_reset_tokens: ~0 rows (approximately)
DELETE FROM `password_reset_tokens`;

-- Dumping structure for table laravel.rooms
DROP TABLE IF EXISTS `rooms`;
CREATE TABLE IF NOT EXISTS `rooms` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `room_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'available',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.rooms: ~12 rows (approximately)
DELETE FROM `rooms`;
INSERT INTO `rooms` (`id`, `room_number`, `type`, `price`, `description`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'HN101', 'Căn hộ Studio áp mái', 7500000.00, 'Tầng thượng, thiết kế áp mái độc đáo, không gian yên tĩnh, lãng mạn. Phù hợp 1-2 người.', 'available', '2026-06-01 13:50:40', '2026-06-05 08:21:29'),
	(2, 'HN102', 'Modern Minimalist Studio', 5500000.00, 'Phong cách tối giản, cửa sổ kịch trần, đầy đủ tiện nghi hiện đại.', 'available', '2026-06-01 13:50:40', '2026-06-02 08:20:25'),
	(3, 'HN103', 'Family Grand Suite', 12000000.00, '2 phòng ngủ, bếp riêng, ban công thoáng mát. Phù hợp gia đình.', 'booked', '2026-06-01 13:50:40', '2026-06-05 08:22:13'),
	(4, 'HN104', 'Green Garden Apartment', 6800000.00, 'Ban công rộng nhiều cây xanh, view thoáng, nội thất mây tre đan.', 'available', '2026-06-01 13:50:40', '2026-06-04 08:52:34'),
	(5, 'HN105', 'Premium Executive Flat', 15000000.00, 'Căn hộ cao cấp, nội thất Ý, hệ thống Smart Home hiện đại.', 'available', '2026-06-01 13:50:40', '2026-06-01 13:50:40'),
	(6, 'HN106', 'City Center Studio', 9000000.00, 'Trung tâm phố cổ, tiện ích xung quanh đa dạng, thiết kế trẻ trung.', 'available', '2026-06-01 13:50:40', '2026-06-01 13:50:40'),
	(7, 'HN107', 'Twin Home Workshop', 6500000.00, 'Kết hợp ở và làm việc, 2 giường đơn, ánh sáng chuyên dụng.', 'available', '2026-06-01 13:50:40', '2026-06-01 13:50:40'),
	(8, 'HN108', 'Skyline Penthouse', 25000000.00, 'View toàn cảnh thành phố, sân vườn riêng, đẳng cấp thượng lưu.', 'available', '2026-06-01 13:50:40', '2026-06-01 13:50:40'),
	(9, 'HN109', 'Standard Student Room', 3500000.00, 'Giá rẻ, gần các trường đại học, đầy đủ tiện nghi cơ bản.', 'available', '2026-06-01 13:50:40', '2026-06-01 13:50:40'),
	(10, 'HN110', 'Romantic Nest for Couples', 6000000.00, 'Tone màu ấm, riêng tư, trang trí theo phong cách Hàn Quốc.', 'available', '2026-06-01 13:50:40', '2026-06-01 13:50:40'),
	(11, 'HN111', 'Professional Business Suite', 8500000.00, 'Bàn làm việc lớn, ghế công thái học, cách âm cao cấp.', 'available', '2026-06-01 13:50:40', '2026-06-01 13:50:40'),
	(13, 'HN112', 'Vintage Indochine Room', 7200000.00, 'Phong cách Đông Dương, gạch bông cổ điển, nghệ thuật.', 'available', '2026-06-04 08:56:55', '2026-06-04 08:56:55');

-- Dumping structure for table laravel.sessions
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.sessions: ~0 rows (approximately)
DELETE FROM `sessions`;

-- Dumping structure for table laravel.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'customer',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.users: ~4 rows (approximately)
DELETE FROM `users`;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'admin@hatresort.com', '$2y$12$5K6gG6L0wQ5b9f7/1L6MCO2lVf4Uoml6lq1VvWHeW7n.A0d3gRFe6', 'admin', NULL, NULL, NULL),
	(2, 'Đặng Việt Anh', 'dva10122003@gmail.com', '$2y$12$QYi1TQKM3cxDl2UeyF3a6.t9x7.AmQiOB2Jzp1q0kWHmJLVJChX2a', 'customer', NULL, '2026-06-01 14:27:18', '2026-06-01 14:27:18'),
	(4, 'Kenji Saito', '2151170558@e.tlu.edu.vn', '$2y$12$cAWZKIYtz0kMfXu9K6FVjO9aEtdpZnDA/PEnwNnIfTCr6.cJfNnY2', 'customer', 'LvdvUy9A6co2qzU53WScnNihq5ThCqAxIiD9dpfVh6lZvf3plkZLSUlwhOQA', '2026-06-01 14:33:18', '2026-06-01 14:33:18'),
	(5, 'test', 'test@gmail.com', '$2y$12$tFXI0jvkHceRYInoE2cCseUQHYOV7quJ66GRaXrs9UiqwcaJoF1Ga', 'customer', NULL, '2026-06-02 08:05:07', '2026-06-02 08:05:07');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
