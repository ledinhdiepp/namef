<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
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


</head>

<body>

<?php include("header.php") ?>

<br/><br/><br/><br/><br/><br/><br/><br/>
<?php
		include('config.php');
        
        $id_login1=$_SESSION['id_login'];

        $sql= "SELECT * FROM thong_tin_tai_khoan WHERE id_tai_khoan = '$id_login1'";
        
        
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_array($result)) {
                $name =  $row['name'];
				$surname = $row['sur_name'];
				$phone =$row['phone'];
				$cmnd = $row['cmnd'];
                $gmail = $row['gmail'];
                $dia_chi = $row['dia_chi'];
            }
        }
        else{
            echo "Lấy thông tin thất bại!  ";
        }

?>
<div class="container bootstrap snippet">
<div class="panel-body inf-content">
    <div class="row">
        <div class="col-md-4">
            <img alt="" style="width:600px;" title="" class="img-circle img-thumbnail isTooltip" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRVYAfG_R3P-_7XifPu80ftUcb1G1-GHZKqCg&usqp=CAU" data-original-title="Usuario"> 
            <ul title="Ratings" class="list-inline ratings text-center">
                <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
                <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
                <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
                <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
                <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
            </ul>
        </div>
        <div class="col-md-6">
            <strong>THÔNG TIN TÀI KHOẢN CÁ NHÂN</strong><br>
            <div class="table-responsive">
            <table class="table table-user-information">
                <tbody>
                    <tr>        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-asterisk text-primary"></span>
                                Họ và tên :                                               
                            </strong>
                        </td>
                        <td class="text-primary">
                            <?php echo " $name $surname " ?>      
                        </td>
                    </tr>
                    <tr>    
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-user  text-primary"></span>    
                                Gmail 	  :   	                                             
                            </strong>
                        </td>
                        <td class="text-primary">
                            <?php echo " $gmail"?>
                        </td>
                    </tr>
					
					<tr>        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-cloud text-primary"></span>  
                               Phone :                                               
                            </strong>
                        </td>
                        <td class="text-primary">
                            <?php echo "$phone"?>
                        </td>
                    </tr>
					
					<tr>        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-cloud text-primary"></span>  
                               CMND :                                               
                            </strong>
                        </td>
                        <td class="text-primary">
                            <?php echo "$cmnd"?>
                        </td>
                    </tr>
					
                    <tr>        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-cloud text-primary"></span>  
                                Địa chỉ:                                               
                            </strong>
                        </td>
                        <td class="text-primary">
                            <?php echo "$dia_chi"?>
                        </td>
                    </tr>

                    <tr>
						<td>
                            <strong>
                                <span class="glyphicon glyphicon-cloud text-primary"></span>  
                                <a href="edit_canhan.php">Chỉnh sửa thông tin</a>                                            
                            </strong>
                        </td>
					</tr>                                
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
</div> 
<?php include("footer.php") ?>
</boby>
</html>