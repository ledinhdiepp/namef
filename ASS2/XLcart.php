<?php

    session_start();
    include('config.php');


    if(isset($_GET['pid']) && $_GET['action'] == 'add'){
        $sql = "SELECT * FROM cars WHERE id='".$_GET['pid']. "';";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_array($result); 
        }
        $itemArray = array($row['id']=>array('id'=>$row['id'], 'name'=>$row['name'],'price'=>$row['price'], 'image'=>$row["image"], 'quantity' => 1));

        
        if(isset($_SESSION['cart-item'])){
            $isExist = false;
            foreach ($_SESSION['cart-item'] as $key => $value) {
                if($_GET['pid'] == $value['id']) $isExist = true;
            }
            if(!$isExist)
                $_SESSION["cart-item"] = array_merge($_SESSION["cart-item"],$itemArray);
            else {
                echo '<script>alert("This Item already add to cart !!")</script>';
            }
        }else if(!isset($_SESSION['cart-item'])){
            $_SESSION['cart-item'] = $itemArray;
        }

        if(isset($_SESSION['cart-item'])){
            echo count($_SESSION['cart-item']);
        } else echo '0';
    }

    if (isset($_GET['remove'])) {
        $id = $_GET['remove'];
        if(!empty($_SESSION["cart-item"])) {
			foreach($_SESSION["cart-item"] as $k => $v) {
                    // echo $k . ' ' . $id .'<br/>';
					if($id == $v['id']){

                        // echo $id;			
                        unset($_SESSION["cart-item"][$k]);
                    }
					if(empty($_SESSION["cart-item"]))
						unset($_SESSION["cart-item"]);
			}
		}
        $_SESSION['showAlert'] = 'block';
        $_SESSION['message'] = 'Item removed from the cart!';
        header('location:cart.php');
      }

    if (isset($_GET['clear'])) {
        unset($_SESSION["cart-item"]);
        $_SESSION['showAlert'] = 'block';
        $_SESSION['message'] = 'All Item removed from the cart!';
        header('location:cart.php');
    }

    if (isset($_POST['qty'])) {
        $qty = $_POST['qty'];
        $pid = $_POST['pid'];
        $pprice = $_POST['pprice'];
  
        $tprice = $qty * $pprice;

        foreach ($_SESSION['cart-item'] as $key => $value) {
            if($pid == $value['id']) {
                $_SESSION['cart-item'][$key]['quantity'] = $qty;
            }
        }
        
      }

    if (isset($_POST['action']) && isset($_POST['action']) == 'order') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $products = $_POST['products'];
        $grand_total = $_POST['grand_total'];
        $address = $_POST['address'];
        $pmode = $_POST['pmode'];
  
        $data = '';
        unset($_SESSION['cart-item']);
        //save to database

        $data .= '<div class="text-center">
								<h1 class="display-4 mt-2 text-danger">Thank You!</h1>
								<h2 class="text-success">Your Order Placed Successfully!</h2>
								<h4 class="bg-danger text-light rounded p-2">Items Purchased : ' . $products . '</h4>
								<h4>Your Name : ' . $name . '</h4>
								<h4>Your E-mail : ' . $email . '</h4>
								<h4>Your Phone : ' . $phone . '</h4>
								<h4>Total Amount Paid : ' . number_format($grand_total,2) . '</h4>
								<h4>Payment Mode : ' . $pmode . '</h4>
						  </div>';
	  echo $data;
    }

?>