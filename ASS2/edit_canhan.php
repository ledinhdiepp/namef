<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">       
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>OtoVinFast - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="assets/img/vinfast1.png" rel="icon">
  <link href="assets/img/vinfast1.png" rel="apple-touch-icon">


  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">


  <link href="assets/css/style.css" rel="stylesheet">
	
	<style>
		#next{
				text-align:center;
			}
		
	</style>
	<script>
        function ChinhSua(){
            $.ajax({
                method:"POST",
                url: "XLupdate_canhan.php",
                data: $("#contact-form").serialize(),
                success: function(response){
                    if(response == 1){
                        alert("Đã chỉnh sửa thông tin thành công!")
                        window.location.href='index.php';
                    }
                    else{
                        document.getElementById("result").innerHTML = response;
                    }
                }
            });
        }
    </script>
</head>

<body>
	<?php include("header.php") ?>
    <br/><br/><br/><br/><br/>
<div class="container">

        <div class="row">

            <div class="col-xl-8 offset-xl-2">

            <?php 
                $id_modify = $_SESSION['id_login'];
                $sql = " SELECT * FROM thong_tin_tai_khoan WHERE id_tai_khoan=$id_modify ";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0){
                    $row = mysqli_fetch_array($result);
                    $ho = $row['name'];
                    $ten = $row['sur_name'];
                    $soDienThoai = $row['phone'];
                    $CMND = $row['cmnd'];
                    $gmail = $row['gmail'];
                    $diaChi = $row['dia_chi'];
                }
            
            ?>

                <h1 style="font-size:50px;">Cập nhật thông tin cá nhân</h1>


                <form id="contact-form" method="post" action="contact.php" role="form">

                    <div class="messages"></div>

                    <div class="controls">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="form_name">Họ *</label>
                                    <input id="form_name" type="text" name="name" class="form-control" value=<?php echo "\"$ho\"" ?> required="required"
                                        data-error="Lastname is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="form_lastname">Tên *</label>
                                    <input id="form_lastname" type="text" name="surname" class="form-control" value=<?php echo "\"$ten\"" ?> required="required"
                                        data-error="Firstname is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="form_email">Email *</label>
                                    <input id="form_email" type="email" name="email" class="form-control" value=<?php echo "\"$gmail\"" ?> required="required"
                                        data-error="Valid email is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="form_phone">Phone</label>
                                    <input id="form_phone" type="tel" name="phone" class="form-control" value=<?php echo "\"$soDienThoai\"" ?>>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
						<div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="form_cmnd">CMND: *</label>
                                    <input id="form_cmnd" type="text" name="cmnd" class="form-control" value=<?php echo "\"$CMND\"" ?> required="required"
                                        data-error="cmnd is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="form_address">Address: *</label>
                                    <input id="form_address" type="text" name="address" class="form-control" value=<?php echo "\"$diaChi\"" ?> required="required"
                                        data-error="address is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="form_message">Message *</label>
                            <textarea id="form_message" name="message" class="form-control" placeholder="Message for me *" rows="4" required="required"
                                data-error="Please, leave us a message."></textarea>
                            <div class="help-block with-errors"></div>
                        </div>


                        <div class="form-group">
                            <div class="g-recaptcha" data-sitekey="6LfKURIUAAAAAO50vlwWZkyK_G2ywqE52NU7YO0S" data-callback="verifyRecaptchaCallback" data-expired-callback="expiredRecaptchaCallback"></div>
                            <input class="form-control d-none" data-recaptcha="true" required data-error="Please complete the Captcha">
                            <div class="help-block with-errors"></div>
                        </div>


                        

                        <p class="text-muted">
                            <strong>*</strong> Nếu có gì thắc mắc. xin vui lòng liên hệ
                            <a href="https://bootstrapious.com/p/bootstrap-recaptcha" target="_blank">0974837395</a>.
                        </p>

                    </div>

                </form>

                <div id="result" style="color:red">
                </div>

				<input onclick="ChinhSua()" type="submit" class="btn btn-success btn-send" value="Submit">
            </div>

        </div>

    </div>

<?php include("footer.php") ?>
</body>