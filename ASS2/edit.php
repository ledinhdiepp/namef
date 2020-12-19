<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
?>

<?php       
    include('config.php');
    $id_login1=$_SESSION['id_login'];
    $name =$_POST['name'];
    $surname =$_POST['surname'];
    $email =$_POST['email'];
    $phone =$_POST['phone'];
    $cmnd =$_POST['cmnd'];
    $address =$_POST['address'];
    $sql ="UPDATE thong_tin_tai_khoan SET name ='$name',sur_name='$surname',gmail='$email',phone ='$phone',cmnd = '$cmnd',dia_chi='$address' WHERE id_tai_khoan =$id_login1";
        if ($conn->query($sql) == TRUE) {
            echo "1";
        } else {
            echo "Không thể cập nhật dữ liệu vào database";
        }
?>