<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
?>


<?php
        
        include('config.php');

        $phoneNumber =$_POST['phone_number'];
        $password =$_POST['password'];
        $sql = "SELECT * FROM tai_khoan WHERE so_dien_thoai='$phoneNumber' AND mat_khau='$password'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            $id = $row = '';
            while($row = mysqli_fetch_array($result)) {
                $id = $row['id'];
                $loai = $row['loai'];
            }
            echo "1";
            $_SESSION['id_login'] = $id;
            $_SESSION['type_login'] = $loai;
            $_SESSION['phone_login'] =$phoneNumber;
        }
        $conn->close();   
?>