<?php 
if (isset($_POST['cart'])) {
  $id = $_POST['cart'];
  if(isset($_SESSION['cart'][$id]))
  {
    $qty = $_SESSION['cart'][$id] + 1;
  }
  else
  {
    $qty=1;
  }
  $_SESSION['cart'][$id]=$qty;
}
if (isset($_POST['unsetcart']))
{
  unset($_SESSION['cart']);
}
?>
<script>
  $(document).ready(function(){
    $('.simpleCart_empty').click(function(){
      $.post("./mvc/core/xuly_ajax.php",
      {
        delete : '1',
      },
      function(data,status){
        if (status == 'success') {
          window.location.reload();
        }
      });
    });
  });
</script>
<div class="header">
  <div class="container-fluid" style="padding: 0;">
    <div class="header-top">
      <div class="logo">
        <a href="index.html">N-AIR</a>
      </div>
      <div class="login-bars">
        <?php if (isset($_SESSION['user'])) {?>
          <a class="btn btn-default log-bar" href="" role="button">
            <?php if (strlen($_SESSION['user']) >= 10) {
              echo substr($_SESSION['user'],0,round(strlen($_SESSION['user'])/2, 0, PHP_ROUND_HALF_DOWN))."...";
            }
            else {
              echo $_SESSION['user'];
            }
             ?>
            </a>
          <a class="btn btn-default log-bar" href="Login/Logout" role="button">Logout</a>
        <?php }else {?>
          <a class="btn btn-default log-bar" href="Login/Sign_in" role="button">Sign up</a>
          <a class="btn btn-default log-bar" href="Login" role="button">Login</a>
        <?php }  ?>
        <div class="cart box_1">
          <a href="Home/Checkout">
            <h3>
              <div class="total">
                $<span class='simpleCart_total'>
                  <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                    foreach($_SESSION['cart'] as $key=>$value)
                    {
                      $item[]=$key;
                    }
                    $str=implode(",",$item); 
                    $gia = 0;
                    $con = new mysqli('localhost', 'root', '', 'qlbg') or die(mysqli_error($con));
                    mysqli_set_charset($con, 'UTF8');
                    $sql = "SELECT * FROM `sanpham` where masp in ($str)";
                    $query = $con->query($sql) or die($con->error);
                    while($row = mysqli_fetch_array($query))
                    {
                      $gia = $gia + $row['gia']*(1-(float)$row['khuyenmai']/100)*$_SESSION['cart'][$row['masp']];
                    }
                    echo number_format($gia,3);
                    $_SESSION['gia'] = $gia;
                  }
                  else 
                  {
                    echo '0,000';
                  } ?>
                </span>(<span id="simpleCart_quantity" class="simpleCart_quantity">
                 <?php 
                 if (isset($_SESSION['cart']))
                 {
                  echo sizeof($_SESSION['cart']);
                }
                else 
                {
                  echo '0';
                } ?>
              </span>)
            </div>
          </h3>
        </a>
        <a href="javascript:;" class="simpleCart_empty">Empty Cart</a>
        <div class="clearfix"> </div>
      </div>  
    </div>
    <div class="clearfix"></div>
  </div>
  <div class="header-botom">
    <div class="content white">
      <nav class="navbar navbar-default nav-menu" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="clearfix"></div>

        <div class="collapse navbar-collapse collapse-pdng" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav nav-font">
            <li class="nav-item">
              <a href="" class="nav-link">Home</a>
            </li>
            <li class="nav-item dropdown">
              <a href="Home/Product" class="dropdown-toggle" >Product</a>
            </li>
            <li class="nav-item "><a href="Home/Checkout">Checkout</a></li>
            <li class="nav-item "><a href="Home/Pay" <?php if (!isset($_SESSION['cart']) ) {
              echo "class='disabled' onclick='return false;'";
            } ?>>Pay</a></li>
          </ul>
        </div>
      </nav>
    </div>
  </div>
</div>
</div>