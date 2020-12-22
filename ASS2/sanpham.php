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
    <div class="row">
        <div class="col-12 col-sm-3">
            <div class="card bg-light mb-3">
                <div class="card-header bg-primary text-white text-uppercase"><i class="fa fa-list"></i> SẢN PHẨM</div>
                <ul class="list-group category_block">
                    <li class="list-group-item"><a href="category.html">VINFAST lUX A 2.0</a></li>
                    <li class="list-group-item"><a href="category.html">VINFAST lUX SA 2.0</a></li>
                    <li class="list-group-item"><a href="category.html">VINFAST FADIL</a></li>
                    <li class="list-group-item"><a href="category.html">VINFAST PRESIDENT</a></li>
                </ul>
            </div>
            <div class="card bg-light mb-3">
                <div class="card-header bg-success text-white text-uppercase">Last product</div>
                <div class="card-body">
                    <img class="img-fluid" src="assets/img/luxa20.png" />
                    <h5 class="card-title">Product title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <p class="bloc_left_price">99.00 $</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="row">
                <?php
                    $sql = "SELECT * FROM cars";
                    $result = mysqli_query($conn, $sql);
                    $result_per_page = 6;
                    $number_of_page = ceil(mysqli_num_rows($result) / $result_per_page);
                    $current_page = 1;
                    if(isset($_GET['page'])){
                        if($_GET['page'] < 1) $current_page = 1;
                        else if($_GET['page'] > $number_of_page) $current_page = $number_of_page;
                        else $current_page = $_GET['page'];
                    }
                    $this_page_first_result = ($current_page-1)*$result_per_page;

                    $sql = 'SELECT * FROM cars  LIMIT ' . $this_page_first_result . ',' .  $result_per_page .';';
                    $page_result = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($page_result) > 0){
                        while($row = mysqli_fetch_array($page_result)) { 
                ?>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card">
                        <img class="card-img-top" src="<?php echo $row['image'];?>" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title"><a href="product.html" title="View Product"><?php echo $row['name'];?></a></h4>
                            <p class="card-text">
                                <ul>
                                    <li><?php echo $row['description'];?> </li>
                                </ul>
                            </p>
                            <div class="row">
                                <div class="col-md-5 col-lg-6">
                                    <p class="btn btn-danger btn-block"><?php echo $row['price'];?>$</p>
                                </div>
                                <div class="col-md-7 col-lg-6">
                                    <button type="button" onclick="addToCart(<?php echo $row['id']?>)" class="btn btn-success btn-block" style="width:109px;">Add to cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <?php 
                        }
                    }
                    $conn->close();   
                ?>
                
                <div class="col-10">
                    <nav aria-label="...">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="sanpham.php?page=<?php echo $current_page-1;?>" tabindex="-1">Previous</a>
                            </li>
                            <?php
                            
                            for ($page=1; $page <= $number_of_page; $page++) { 
                                if($page == $current_page) {
                            
                                echo '<li class="page-item active"><a class="page-link" href="sanpham.php?page='. $page . '">' . $page. '</a></li>';
                        
                                } else {
                                    echo '<li class="page-item"><a class="page-link" href="sanpham.php?page='.$page.'">'.$page.'</a></li>';
                                }
                            }
                            ?>
                            <li class="page-item">
                                <a class="page-link" href="sanpham.php?page=<?php echo $current_page+1;?>">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                
                
            </div>
        </div>

    </div>
</div>

<?php include("footer.php") ?>
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script>
    function addToCart(pid) {
      $.ajax({
        url: 'XLcart.php',
        method: 'get',
        data: {
          pid,
          action : 'add'
        },
        success: function(response) {
          $("#cart-item").html(response);
        }
      });
    }
</script>
</body>
</html>