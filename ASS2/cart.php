<?php
    session_start();
    include('config.php');

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
      <div class="col-lg-10">
        <div style="display:<?php if (isset($_SESSION['showAlert'])) {
          echo $_SESSION['showAlert'];
            } else {
              echo 'none';
            } unset($_SESSION['showAlert']); ?>" class="alert alert-success alert-dismissible mt-3" id="massage">
          <button type="button" class="close" data-dismiss="alert" onclick="hideMassage()">&times;</button>
          <strong>
            <?php if (isset($_SESSION['message'])) {
              echo $_SESSION['message'];
            } unset($_SESSION['showAlert']); ?>
          </strong>
        </div>
        <div class="table-responsive mt-2">
          <table class="table table-bordered table-striped text-center">
            <thead>
              <tr>
                <td colspan="7">
                  <h4 class="text-center text-info m-0">Products in your cart!</h4>
                </td>
              </tr>
              <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>
                  <a href="XLcart.php?clear=all" class="badge-danger badge p-1" onclick="return confirm('Are you sure want to clear your cart?');"><i class="fas fa-trash"></i>&nbsp;&nbsp;Clear Cart</a>
                </th>
              </tr>
            </thead>
            <tbody>
			<?php	
				$total_price = 0;	
				if(isset($_SESSION['cart-item'])){
					$total_quantity = 0;
					$total_price = 0;
					foreach ($_SESSION["cart-item"] as $item){
            $item_price = $item["quantity"]*$item["price"];
			?>
				<tr>
                <td><?= $item['id'] ?></td>
                <input type="hidden" class="pid" value="<?= $item['id'] ?>">
                <td><img src="<?= $item['image'] ?>" width="50"></td>
                <td><?= $item['name'] ?></td>
                <td>
                  </i>&nbsp;&nbsp;<?= number_format($item['price'],0); ?> $
                </td>
                <input type="hidden" class="pprice" value="<?= $item['price'] ?>">
                <td>
                  <input type="number" min="1" class="form-control itemQty" value="<?= $item['quantity'] ?>" style="width:75px;">
                </td>
                <td>&nbsp;&nbsp;<?= number_format($item_price,0); ?>$</td>
                <td>
                  <a href="XLcart.php?remove=<?= $item['id'] ?>" class="text-danger lead" onclick="return confirm('Are you sure want to remove this item?');"><i class="fas fa-trash-alt"></i></a>
                </td>
              </tr>
			<?php
						$total_quantity += $item["quantity"];
						$total_price += ($item["price"]*$item["quantity"]);
				}
				
				}
			?>
              
              <tr>
                <td colspan="3">
                  <a href="sanpham.php" class="btn btn-success"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Continue Shopping</a>
                </td>
                <td colspan="2"><b>Grand Total</b></td>
                <td><b></i>&nbsp;&nbsp;<?= number_format($total_price,0); ?>$</b></td>
                <td>
                  <a href="checkout.php" class="btn btn-info <?= ($total_price > 1) ? '' : 'disabled'; ?>"><i class="far fa-credit-card"></i>&nbsp;&nbsp;Checkout</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

<?php include("footer.php") ?>

<script src="assets/vendor/jquery/jquery.min.js"></script>
<script>
  var hideMassage = () => {
    $('#massage').hide();
  }

  //change quantity
  $(".itemQty").on('change', function() {
      var $el = $(this).closest('tr');

      var pid = $el.find(".pid").val();
      var pprice = $el.find(".pprice").val();
      var qty = $el.find(".itemQty").val();
      if(qty <= 0) {
        $(this).val(1);
        qty = 1;
      }
      location.reload(true);
      $.ajax({
        url: 'Xlcart.php',
        method: 'post',
        cache: false,
        data: {
          qty: qty,
          pid: pid,
          pprice: pprice
        },
        success: function(response) {
          console.log(response);
        }
      });
    });
  
</script>
</body>
</html>