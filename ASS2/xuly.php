  
<?php
header('Content-Type: text/html; charset=utf-8');
?>

<?php       
            include('config.php');

            $phoneNumber =$_POST['phone_number'];
            $password =$_POST['password'];
            if(strlen($phoneNumber) < 9 || strlen($phoneNumber) > 11){
                echo "Số điện thoại phải từ 9 - 11 số";
            }
            else if((int)$phoneNumber[0] != 0 ){
                echo "Số đầu tiên phải là số 0";
            }
            else if (strlen($password) < 4){
                echo "Mật khẩu phải có ít nhất 4 kí tự.";
            }
            else{
                $sql = "INSERT INTO tai_khoan(so_dien_thoai,mat_khau)
                VALUES ('$phoneNumber','$password');";
                if ($conn->query($sql) == TRUE) {
                    echo "1";
                } else {
                    echo "Số điện thoại này đã được đăng ký.";
                }
            }
            $conn->close();
?>