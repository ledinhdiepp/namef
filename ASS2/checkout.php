<?php
    session_start();
    include('config.php');
    $name = '';
    $email = '';
    $phone = '';
    $address = '';

    if(isset($_SESSION['id_login'])){
        $sql = "select * from thong_tin_tai_khoan where id_tai_khoan=" . $_SESSION['id_login'];
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_array($result);
            $name = $row['name'] . ' ' . $row['sur_name'];
            $email = $row['gmail'];
            $phone = $row['phone'];
            $address = $row['dia_chi'];
        }
    }

    $total_price = 0;
	$allItems = '';
    $items = [];
    
    if(isset($_SESSION['cart-item'])){
        foreach ($_SESSION["cart-item"] as $item){
            $total_price += $item["quantity"]*$item["price"];
            $allItems .= ($item['name'] .' ('. $item['quantity'] .'), ');
        }
    }

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
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />

  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">


  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/sanpham.css" rel="stylesheet">


</head>

<body>

<?php include("header.php") ?>
<br/><br/><br/><br/><br/></br/><br/><br/>

<div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 px-4 pb-4" id="order">
        <h4 class="text-center text-info p-2">Complete your order!</h4>
        <div class="jumbotron p-3 mb-2 text-center">
          <h6 class="lead"><b>Product(s) : </b><?= $allItems; ?></h6>
          <h6 class="lead"><b>Delivery Charge : </b>Free</h6>
          <h5><b>Total Amount Payable : </b><?= number_format($total_price,0) ?>/-</h5>
        </div>
        <form action="" method="post" id="placeOrder">
          <input type="hidden" name="products" value="<?= $allItems; ?>">
          <input type="hidden" name="grand_total" value="<?= $total_price; ?>">
          <div class="form-group">
            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>" placeholder="Enter Name" required>
          </div>
          <div class="form-group">
            <input type="email" name="email" class="form-control" value="<?php echo $email; ?>" placeholder="Enter E-Mail" required>
          </div>
          <div class="form-group">
            <input type="tel" name="phone" class="form-control" value="<?php echo $phone; ?>"  placeholder="Enter Phone" required>
          </div>
          <div class="form-group">
            <textarea name="address" class="form-control" value="<?php echo $address; ?>"  rows="3" cols="10" placeholder="Enter Delivery Address Here..."><?php echo $address; ?></textarea>
          </div>
          <h6 class="text-center lead">Select Payment Mode</h6>
          <div class="form-group">
            <select name="pmode" class="form-control">
              <!-- <option value="" selected disabled>-Select Payment Mode-</option> -->
              <option value="cash" selected>Cash On Delivery</option>
              <option value="netbanking">Net Banking</option>
              <option value="cards">Debit/Credit Card</option>
            </select>
          </div>
          <div class="form-group">
            <input type="submit" name="submit" value="Place Order" class="btn btn-danger btn-block">
          </div>
        </form>
      </div>
    </div>
  </div>


<?php include("footer.php") ?>

<script src="assets/vendor/jquery/jquery.min.js"></script>
<script>
  $("#placeOrder").submit(function(e) {
      e.preventDefault();
      $.ajax({
        url: 'XLcart.php',
        method: 'post',
        data: $('form').serialize() + "&action=order",
        success: function(response) {
          $("#order").html(response);
          $("#cart-item").html(0);
        }
      });
    });
  
</script>
</body>
</html>