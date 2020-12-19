<?php
	session_start();
	session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>LOGIN</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="login.css"/>
        <script>
        function dangNhap(){
            $.ajax({
                method:"POST",
                url: "XulyDangNhap.php",
                data: $("#login_form").serialize(),
                success: function(response){
                    if(response == 1){
                        window.location.href='index.php';
                    }
                    else{
                        alert("Tên tài khoản hoặc mật khẩu không chính xác, hãy nhập lại");
                    }
                }
            });
        }
    </script>
    </head>
    <body>
    <div class="container bg-white pb-5">
    <div class="row d-flex justify-content-start align-items-center mt-sm-5">
        <div class="col-lg-5 col-10">
            <div class="pb-5"> <img src="https://now.edu.vn/wp-content/uploads/2018/09/vinfast-logo-now-academy-460x460.jpg" alt=""> </div>
        </div>
        <div class="col-lg-4 offset-lg-2 col-md-6 offset-md-3">
            <div class="pt-4">
                <h6><span class="fa fa-superpowers text-primary px-md-2"></span>OTOVINFAST</h6>
            </div>
            <div class="mt-3 mt-md-5">
                <h5>Log in to your account</h5>
                <form class="pt-4" id="login_form" >
                <div class="d-flex flex-column pb-3"> <label for="phone_number">Số điện thoại</label> <input type="phone_number" name="phone_number" id="phone_number" class="border-bottom border-primary"> </div>
                <div class="d-flex flex-column pb-3"> <label for="password">Password</label> <input type="password" name="password" id="password" class="border-bottom border-primary"> </div>
                    
                </form>
                <div class="d-flex jusity-content-end pb-4">
                    </div> <input type="button" onclick="dangNhap()" value="Login" class="btn btn-primary btn-block mb-3"> </div>
                    <div class="register mt-5">
                        <p>Don't have an account? <a href="register.php">Create an account</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <body>
</html>