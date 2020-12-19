

USE `ass2`;

-- create table save account

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