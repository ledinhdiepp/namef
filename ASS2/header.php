<?php
	include('config.php');

	function check_info(){
		include('config.php');
		$id_login = $_SESSION['id_login'];
		$type_login = $_SESSION['type_login'];
		$sql = "SELECT * FROM thong_tin_tai_khoan WHERE id_tai_khoan='$id_login' " ;
	
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) > 0){
			return true;
		}
		else{
			return false;
		}
	}

?>
 <!-- ======= Top Bar ======= -->
 <div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
    <div class="container d-flex">
      <div class="contact-info mr-auto">
        <i class="icofont-envelope"></i> <a href="mailto:contact@example.com">Otovinfast@vinfast.com</a>
        <i class="icofont-phone"></i>HotLine: 0964 2222 88 (Tư vấn)
      </div>
    
      <div class="social-links">
        
        <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
        <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
        <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
        <a href="#" class="skype"><i class="icofont-skype"></i></a>
        <a href="#" class="linkedin"><i class="icofont-linkedin"></i></i></a>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="index.php">OtoVinFast<span>.</span></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt=""></a>-->

      <nav class="nav-menu d-none d-lg-block">
      <ul>
          <li><a href="index.php">TRANG CHỦ</a></li>
		  <li><a href="about-us.php">VỀ CHÚNG TÔI</a></li>
          <li class="drop-down"><a href="">XE VINFAST</a>
            <ul>
              <li><a href="#">Vinfast Lux A 2.0</a></li>
              <li><a href="#">Vinfast Lux SA 2.0</a></li>
              <li><a href="#">Vinfast Fadil</a></li>
            </ul>
          </li>
          <li><a href="#services">BẢNG GIÁ</a></li>
          <li><a href="#portfolio">TIN TỨC</a></li>
          <li><a href="#team">LIÊN HỆ</a></li>
          <li class="nav-item" >
					<a href="login.php"><button <?php if(isset($_SESSION['type_login'])){ echo "style=\"display:none\"";} ?> type="button" class="btn btn-info">ĐĂNG NHẬP</button></a>
				</li>
        
          <li  <?php if(!isset($_SESSION['type_login'])){ echo "style=\"display:none\"";} ?> class="drop-down"><a href=""><i class="icofont-user-male"></i></a>
            <ul>
              <li><a href="Thongtin.php" <?php if(!isset($_SESSION['type_login']) or ($_SESSION['type_login']!=1) or !check_info()){ echo "style=\"display:none\"";} ?> ><i class="icofont-address-book"></i> THÔNG TIN CÁ NHÂN </a></a></li>
              <li><a href="themthongtin.php" <?php if(!isset($_SESSION['type_login']) or ($_SESSION['type_login']!=1) or check_info()){ echo "style=\"display:none\"";} ?> > <i class="icofont-ui-add"></i>THÊM THÔNG TIN CÁ NHÂN</a></li>
              <li><a href="login.php" <?php if(!isset($_SESSION['type_login'])){ echo "style=\"display:none\"";} ?> ><i class="icofont-logout"></i> ĐĂNG XUẤT </a></li>
            </ul>
          </li>
        </ul>

	
          
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->