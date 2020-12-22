

USE `ass2`;

-- create table save account

DROP TABLE IF EXISTS tai_khoan;

CREATE TABLE `tai_khoan` (
   `id` int UNIQUE NOT NULL AUTO_INCREMENT,
   `so_dien_thoai` varchar(13) UNIQUE NOT NULL,
   `mat_khau` varchar(20) NOT NULL,
   `loai` int NOT NULL default 1,
   PRIMARY KEY(id)
);
INSERT INTO tai_khoan(id,so_dien_thoai,mat_khau,loai) VALUES
(0,'0','0',2),
(1,'1','1',1);

DROP TABLE IF EXISTS thong_tin_tai_khoan;

CREATE TABLE `thong_tin_tai_khoan` (
   `id` int UNIQUE NOT NULL AUTO_INCREMENT,
   `id_tai_khoan` int UNIQUE NOT NULL,
   `name` varchar(20) CHARACTER SET utf8 NOT NULL,
   `sur_name` varchar(13) CHARACTER SET utf8 NOT NULL,
   `phone` varchar(13) CHARACTER SET utf8 NOT NULL,
   `cmnd` varchar(13) CHARACTER SET utf8 NOT NULL,
   `gmail` varchar(30) NOT NULL,
   `dia_chi` varchar(80) CHARACTER SET utf8 NOT NULL,
   PRIMARY KEY(id)
);

INSERT INTO thong_tin_tai_khoan(id,id_tai_khoan,name,sur_name,phone,cmnd,gmail,dia_chi) VALUES
(0,1,'Lê Đình','Điệp','0394007104','285709698','ledinhdiep@gmail.com','ktx khu B ĐHQG tp Hồ chí Minh'),
(1,3,'Hoàng', 'Thuận','0978156388','123456789','hoangthuan@gmail.com','ktx khu A ĐHQG tp Hồ Chí Minh'),
(2,4,'Hoàng Văn','Long','0378156152','123987456','hoangvanlong@gmail.com','ktx khu A ĐHQG tp Hồ Chí Minh'),
(3,6,'Vũ Mộc Tranh','Phong','0147258369','2546884485','tranhphong@gmail.com','tokyo nhật bản'),
(4,8,'Trần','Quả','0159487263','257125425','tranqua@gmail.com','tp.manchester nước Anh'),
(5,9,'Tô Mộc','Tranh','0951623847','485225585','moctranh@gmail.com','bangkok thailand'),
(6,10,'Tô Mộc','Thu','0147852369','251456214','mocthu@gmail.com','quận 1 tp.hồ chí minh'),
(7,13,'Dương Văn','phong','0154789645','2525822145','phongvan@gmail.com','phường 11 quận tân bình tp.hcm'),
(8,14,'Bùi Thị Phương','Vy','0549125456','884585585','phuongvy@gmail.com','đường 12 quận thủ đức tp.hcm'),
(9,15,'Dương Thúy','Uyên','0215796586','254255442','thuyuyen@gmail.com','lộc ninh bình phước'),
(10,17,'Cao Mỹ','Duyên','0785168135','541154215','myduyen@gmail.com','thường tín hà nội'),
(11,18,'Chu Khải','Trạch','0147522355','558724455','khaitrach@gamil.com','số 203 quận 1 tp.hcm'),
(12,21,'Hoàng','Khửn','0125463245','458544854','hoangkhun@gmail.com','tp son la'),
(13,22,'Lò','Anh','0125453585','542156025','loanh@gmail.com','quận 2 tp.hcm'),
(14,24,'Lâm Trung','Nguyên','0479471522','215782145','trunganh@gmail.com','số 1 đường trường trinh tp.hcm'),
(15,26,'Lầm Ngọc','Hỷ','0212562512','254895995','ngochy@gamil.com','số 5 quận 7 tp.hcm'),
(16,28,'Lê Đình','Nhu','0127899945','245218222','dinhnhu@gmail.com','số 8 quận bình thạch tp.hcm'),
(17,30,'Nguyễn Trọng','Dư','0148524558','254833995','trongdu@gmail.com','ktx khu a dai học quốc gia tp.hcm');

--
-- Table structure for table `cars`
--

DROP TABLE IF EXISTS cars;

CREATE TABLE `cars` (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,0) NOT NULL,
  `description` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL
) CHARACTER SET utf8 COLLATE utf8_general_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `name`, `image`, `price`, `description`, `group`) VALUES
(1, 'LUX SA2.0', 'https://otovinfast.vn/wp-content/uploads/2020/09/chi-tiet-vinfast-lux-sa20-suv-kem-gia-ban-1552115585.jpg', 1500.00, 'Hỗ trợ mua xe trả góp 70-80% giá trị xe, thời gian vay tối đa 8 năm, thủ tục nhanh chóng.', 'lux-a20'),
(2, 'LUX SA2.1', 'https://otovinfast.vn/wp-content/uploads/2019/12/xedoisong_chi_tiet_suv_vinfast_lux_sa_turbo_2019_h1_grzi.jpg', 800.00 , 'Hỗ trợ mua xe trả góp 70-80% giá trị xe, thời gian vay tối đa 8 năm, thủ tục nhanh chóng.', 'lux-a20'),
(3, 'LUX SA2.2', 'https://otovinfast.vn/wp-content/uploads/2019/12/VinFast-Lux-SA-1-2268-1567149878-350x250.jpg', 300.00 , 'Hỗ trợ mua xe trả góp 70-80% giá trị xe, thời gian vay tối đa 8 năm, thủ tục nhanh chóng.', 'lux-a20'),
(4, 'Fadil', 'https://otovinfast.vn/wp-content/uploads/2019/12/maxresdefault-750x536.jpg', 800.00 , 'Hỗ trợ mua xe trả góp 70-80% giá trị xe, thời gian vay tối đa 8 năm, thủ tục nhanh chóng.', 'lux-a20'),
(5, 'LUX SA2.5', 'https://otovinfast.vn/wp-content/uploads/2020/09/chi-tiet-vinfast-lux-sa20-suv-kem-gia-ban-1552115585.jpg', 1500.00, 'Hỗ trợ mua xe trả góp 70-80% giá trị xe, thời gian vay tối đa 8 năm, thủ tục nhanh chóng.', 'lux-a20'),
(6, 'LUX SA2.6', 'https://otovinfast.vn/wp-content/uploads/2019/12/xedoisong_chi_tiet_suv_vinfast_lux_sa_turbo_2019_h1_grzi.jpg', 800.00 , 'Hỗ trợ mua xe trả góp 70-80% giá trị xe, thời gian vay tối đa 8 năm, thủ tục nhanh chóng.', 'lux-a20'),
(7, 'LUX SA2.7', 'https://otovinfast.vn/wp-content/uploads/2019/12/VinFast-Lux-SA-1-2268-1567149878-350x250.jpg', 300.00 , 'Hỗ trợ mua xe trả góp 70-80% giá trị xe, thời gian vay tối đa 8 năm, thủ tục nhanh chóng.', 'lux-a20'),
(8, 'Fadil Pro', 'https://otovinfast.vn/wp-content/uploads/2019/12/maxresdefault-750x536.jpg', 800.00 , 'Hỗ trợ mua xe trả góp 70-80% giá trị xe, thời gian vay tối đa 8 năm, thủ tục nhanh chóng.', 'lux-a20');

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;