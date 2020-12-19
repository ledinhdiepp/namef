<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>About Us</title>
        <link href="assets/img/vinfast1.png" rel="icon">
        <link href="assets/img/vinfast1.png" rel="apple-touch-icon">


        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
        <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
        <link href="assets/vendor/aos/aos.css" rel="stylesheet">

        <link rel="stylesheet" href="./assets/css/about-us.css">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    </head>
    <body>

    <?php include("header.php") ?>

        <div class="relative">
            <div class="banner">
                <img class="banner-absolute" src="https://vinfast.vn//themes/custom/vinfast/static/images/about-us/way.png" >
                <img class="banner-relative" src="https://vinfast.vn/themes/custom/vinfast/fe-vinfast/app/images/about-us/banner.jpg" 
                alt="image">
                <p class="paragraph" >Hành trình 365 ngày biến “giấc mơ ô tô Việt” thành hiện thực</p>
                <a href="#discover">
                    <div class="discover-icon" >
                        <div>Khám phá</div>
                        <div class="icon-down">
                            <i class="fas fa-angle-down"></i>
                        </div>
                    </div>
                </a>
            </div>
            
            <div class="discover" id="discover">
                <div class="select" style="z-index: 5000;">                
                        <select id="thumbs-select">
                            <option value="0">VinFast: Công ty Ô tô thương hiệu Việt Nam đầu tiên</option>
                            <option value="1">Đột phá từ tư duy thiết kế</option>
                            <option value="2">Thành lập công ty ô tô đẳng cấp thế giới</option>
                            <option value="3">VinFast hướng tới tương lai</option>
                        </select>
                </div>
                <ul class="thumbs">
                    <li class="is-active">VinFast: Công ty Ô tô thương hiệu Việt Nam đầu tiên</li>
                    <li>Đột phá từ tư duy thiết kế</li>
                    <li>Thành lập công ty ô tô đẳng cấp thế giới</li>
                    <li>VinFast hướng tới tương lai</li>
                </ul>
                <div class="slick-story">
                    <div class="slick-item" id="0">
                        <div class="image"><img alt="" class="img" src="https://vinfast.vn/themes/custom/vinfast/static/images/about-us/pic-2.jpg" /></div>
                        
                        <div class="caption">
                        <h2>VinFast: Công ty Ô tô thương hiệu Việt Nam đầu tiên</h2>
                        
                        <div class="caption-body">
                        <p>VinFast là một Công ty khởi nghiệp trong lĩnh vực ô tô với sự hậu thuẫn của Vingroup – doanh nghiệp tư nhân lớn nhất và là một trong những Tập đoàn Công nghệ - Công nghiệp – Dịch vụ hàng đầu Việt Nam. Sau khi Tập đoàn đã xây dựng được vị thế dẫn đầu và được hàng triệu khách hàng tin tưởng trong các lĩnh vực kinh doanh như bất động sản, bán lẻ, du lịch – vui chơi giải trí, y tế, giáo dục, nông nghiệp. Với sứ mệnh “Vì một cuộc sống tốt đẹp hơn cho người Việt”, Vingroup muốn xây dựng cho đất nước một thương hiệu ô tô đầy tự hào, phong cách, đẳng cấp mang đậm tinh thần Việt Nam, với tham vọng vượt ra ngoài biên giới Việt Nam, vươn tầm thế giới</p>
                        
                        <p>Tập đoàn hướng tới mục tiêu tạo ra những chiếc xe trở thành hình ảnh đại diện cho Việt Nam và có thể cạnh tranh trên thị trường ô tô thế giới.</p>
                        </div>
                        </div>
                    </div>
                    
                    <div class="slick-item hidden" id="1">
                        <div class="image"><img alt="" class="img" src="https://vinfast.vn/themes/custom/vinfast/static/images/about-us/pic-1.jpg" /></div>
                        
                        <div class="caption">
                        <h2>Đột phá từ tư duy thiết kế</h2>
                        
                        <div class="caption-body">
                        <p>Nhằm chế tạo ra dòng xe phản ánh mong muốn của người tiêu dùng, VinFast đã thực hiện điều mà chưa một thương hiệu xe nào từng tiến hành từ trước đến nay.</p>
                        
                        <p>Cách tiếp cận hoàn toàn mới mẻ và sáng tạo này đã phá vỡ mọi quy tắc thiết kế từ trước đến nay. Những mẫu xe này không chỉ đáp ứng mong muốn của người tiêu dùng về mặt ngoại hình mà còn đáp ứng được các yêu cầu về khả năng vận hành của họ.</p>
                        </div>
                        </div>
                    </div>
                    
                    <div class="slick-item hidden" id="2">
                        <div class="image"><img alt="" class="img" src="https://vinfast.vn/themes/custom/vinfast/static/images/about-us/pic-3.jpg" /></div>
                        
                        <div class="caption">
                            <h2>Thành lập công ty ô tô đẳng cấp thế giới</h2>
                            
                            <div class="caption-body">
                            <p>Bằng cách chiêu mộ các chuyên gia xuất sắc nhất trong ngành công nghiệp ô tô - bao gồm hãng thiết kế Ý Pininfarina, chuyên gia kỹ thuật Magna Steyr và các kỹ sư hệ thống truyền động AVL - ngay từ đầu VinFast đã hoàn toàn có thể tạo ra những chiếc xe đẳng cấp thế giới.</p>
                            
                            <p>Ô tô VinFast cũng được chế tạo bằng các trang thiết bị đẳng cấp thế giới. Máy dập trợ lực của Schuler là trái tim của của xưởng dập và một xưởng thân vỏ hoàn toàn tự động cùng với dây truyền sơn Dürr chất lượng cao sẽ đảm bảo tạo ra bề mặt sơn xe đẳng cấp thế giới. Đây là một Tổ hợp nhà máy sản xuất không chỉ mang tầm cỡ thế giới mà còn đứng hàng đầu trong ngành.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="slick-item hidden" id="3">
                        <div class="image"><img alt="" class="img" src="https://vinfast.vn/themes/custom/vinfast/static/images/about-us/pic-4.jpg" /></div>
                        
                        <div class="caption">
                        <h2>VinFast hướng tới tương lai</h2>
                        
                            <div class="caption-body">
                                <p>Là một doanh nghiệp Việt Nam với tầm nhìn toàn cầu, VinFast tự hào cho ra mắt những mẫu xe đầu tiên trong bộ sưu tập GlobalCar (Ô tô toàn cầu) của mình.</p>
                            
                                <p>Với VinFast, Vingroup đã tạo ra một thương hiệu ô tô mà người Việt Nam có thể tự hào. VinFast đáp ứng được những yêu cầu của người lái xe trong nước, cũng như giải quyết nhu cầu của thị trường nội địa đang gia tăng, tại một trong số những nền kinh tế tăng trưởng nhanh nhất Đông Nam Á. Nhưng VinFast cũng là một hãng xe tân tiến trên thị trường thế giới, một công ty sẵn sàng chọn hướng tiếp cận chưa từng có để tạo ra những điều tuyệt vời. Bằng cách mang tới thị trường những mẫu xe đẳng cấp thế giới, VinFast sẽ trở thành một đối thủ mới có khả năng làm rung chuyển ngành công nghiệp ô tô toàn cầu.</p>
                            </div>
                        </div>
                    </div>
            </div>
            
        </div>
        <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
        <div class="container">
            <div class="row">

            <div class="col-lg-3 col-md-6 footer-contact">
                <h3>OtoVinFast<span>.</span></h3>
                <p>
                Địa chỉ : Số 1 Lê Thánh Tông, Máy Tơ, Ngô Quyền, Hải Phòng <br><br>
                <strong>Phone:</strong>  0964 2222 88<br>
                <strong>Email:</strong> Otovinfast@vinfast.com<br>
                </p>
            </div>

            <div class="col-lg-3 col-md-6 footer-links">
                <h4>Chuyên mục</h4>
                <ul>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Trang Chủ</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Xe VinFast</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Bảng Giá</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Tin Tức</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Liên Hệ</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-6 footer-links">
                <h4>Dòng Xe</h4>
                <ul>
                <li><i class="bx bx-chevron-right"></i> <a href="#">VinFast Lux A 2.0</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">VinFast Lux SA 2.0</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Xe VinFast</a></li>
                
                </ul>
            </div>

            <div class="col-lg-3 col-md-6 footer-links">
                
                <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                </div>
            </div>

            </div>
        </div>
        </div>

        <div class="container py-4">
        <div class="copyright">
            &copy; Copyright <strong><span>BizLand</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bizland-bootstrap-business-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
        </div>
    </footer><!-- End Footer -->
        

         <!-- Vendor JS Files -->
        <script src="assets/vendor/jquery/jquery.min.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
        <script src="assets/vendor/php-email-form/validate.js"></script>
        <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
        <script src="assets/vendor/counterup/counterup.min.js"></script>
        <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
        <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="assets/vendor/venobox/venobox.min.js"></script>
        <script src="assets/vendor/aos/aos.js"></script>

        <script src="./assets/js/about-us.js"></script>
        <script src="assets/js/main.js"></script>
    </body>
</html>