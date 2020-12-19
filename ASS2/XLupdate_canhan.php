<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
?>

<?php       
    include('config.php');
    $error = false;
    $response = '';
    $id_login1=$_SESSION['id_login'];
    if(isset($_POST['name']) and $_POST['name']!=""){
        $name =$_POST['name'];
    }
    else{
        $error = true;
        $response = $response . '- Hãy nhập họ của bạn! <br/>';
    }

    if(isset($_POST['surname']) and $_POST['surname']!=""){
        $surname =$_POST['surname'];
    }
    else{
        $error = true;
        $response = $response . '- Hãy nhập tên của bạn! <br/>';
    }

    if(isset($_POST['email']) and $_POST['email']!=""){
        $email =$_POST['email'];
    }
    else{
        $error = true;
        $response = $response . '- Hãy nhập email của bạn! <br/>';
    }

    if(isset($_POST['phone']) and $_POST['phone']!=""){
        $phone =$_POST['phone'];
    }
    else{
        $error = true;
        $response = $response . '- Hãy nhập số điện thoại của bạn! <br/>';
    }

    if(isset($_POST['cmnd']) and $_POST['cmnd']!=""){
        $cmnd =$_POST['cmnd'];
    }
    else{
        $error = true;
        $response = $response . '- Hãy nhập số CMND của bạn! <br/>';
    }

    if(isset($_POST['address']) and $_POST['address']!=""){
        $address =$_POST['address'];
    }
    else{
        $error = true;
        $response = $response . '- Hãy nhập địa chỉ bạn! <br/>';
    }
    
    if(!$error){
        $sql ="UPDATE thong_tin_tai_khoan SET name ='$name',sur_name='$surname',gmail='$email',phone ='$phone',cmnd = '$cmnd',dia_chi='$address' WHERE id_tai_khoan =$id_login1";
        if ($conn->query($sql) == TRUE) {
            echo "1";
        } else {
            echo "Không thể cập nhật dữ liệu vào database";
        }
    }
    else{
        echo "$response";
    }
    $conn->close();
?>