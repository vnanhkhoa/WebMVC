<div class="head-bread">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="">Home</a></li>
            <li><a href="Home/Product">Products</a></li>
            <li class="active">CART</li>
        </ol>
    </div>
</div>
<!-- check-out -->
<div class="check">
    <div class="container">	 
        <div class="col-md-3 cart-total">
            <a class="continue" href="">Continue to basket</a>
            <div class="price-details">
                <h3>Price Details</h3>
                <span>Total</span>
                <span class="total1">
                    <?php if (isset($_SESSION['cart'])): ?>
                        <?php echo number_format($_SESSION['gia'],3) ?> 
                        <?php else: ?>
                            0
                        <?php endif ?>  
                    VND</span>
                    <span>Discount</span>
                    <span class="total1">10%(Festival Offer)</span>
                    <span>Delivery Charges</span>
                    <span class="total1">Free</span>
                    <div class="clearfix"></div>				 
                </div>
                <hr class="featurette-divider">
                <ul class="total_price">
                 <li class="last_price"> <h4>TOTAL</h4></li>	
                 <li class="last_price"><span>
                    <?php if (isset($_SESSION['cart'])): ?>
                        <?php echo number_format($_SESSION['gia'],3) ?> 
                        <?php else: ?>
                            0
                        <?php endif ?>  
                    VND</span></li>
                    <div class="clearfix"> </div>
                </ul> 
                <div class="clearfix"></div>
                <a class="order" href="Home/Pay">Place Order</a>
            </div>
            <div class="col-md-9 cart-items">
                <h1>My Shopping Bag (<?php
                    if (isset($_SESSION['cart'])) 
                    {
                        echo sizeof($_SESSION['cart']); 
                    }
                    else 
                    {
                        echo 0;
                    }
                    ?>)</h1>
                    <script>
                        $(document).ready(function(c) {
                            $('.close').on('click', function(c){
                                var id = $(this).attr('id');
                                $('#'+id).fadeOut('slow', function(c){
                                    $('#'+id).remove();
                                });
                                $.post("./mvc/core/xuly_ajax.php",
                                {
                                    delete_item : id,
                                },
                                function(data,status){
                                    if (status == 'success') {
                                        window.location.reload();
                                    }
                                });
                            });
                            $('input[name=qty]').change( function() {
                                var qty = $(this).val();
                                var id = $(this).attr('id');
                                $.post("./mvc/core/xuly_ajax.php",
                                {
                                    edit_qty : qty,
                                    id_ed : id
                                },
                                function(data,status){
                                    if (status == 'success') {
                                        window.location.reload();
                                    }
                                });
                            });	  
                        });
                    </script>
                    <?php
                    if (isset($_SESSION['cart'])) {
                        foreach($_SESSION['cart'] as $key=>$value)
                        {
                            $item[]=$key;
                        }
                        $str=implode(",",$item); 
                        $sql="SELECT * FROM `sanpham` where masp in ($str) order by gia ASC";
                        $query = $con->query($sql) or die($con->error);
                        while($row = mysqli_fetch_array($query)) { ?>
                            <div class="cart-header" id = "<?php echo $row['masp'] ?>" >
                                <div class="close" id = "<?php echo $row['masp'] ?>"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></div>
                                <div class="cart-sec simpleCart_shelfItem">
                                    <div class="cart-item cyc">
                                        <img src="public/images/<?php echo $row['anh'] ?>" class="img-responsive" alt=""/>
                                    </div>
                                    <div class="cart-item-info">
                                        <ul class="qty">
                                            <li><p>Size : 9 US</p></li>
                                            <li><p>Qty : <input type="number" name="qty" id="<?php echo $row['masp'] ?>" value="<?php echo $_SESSION['cart'][$row['masp']] ?>"></p></li>
                                            <li><p>Price each : $<?php echo number_format($row['gia']*(1-(float)$row['khuyenmai']/100)*$_SESSION['cart'][$row['masp']],3); ?></p></li>
                                        </ul>
                                        <div class="delivery">
                                           <p>Service Charges : Rs.190.00</p>
                                           <span>Delivered in 2-3 bussiness days</span>
                                           <div class="clearfix"></div>
                                       </div>	
                                   </div>
                                   <div class="clearfix"></div>
                               </div>
                           </div>
                       <?php    }
                   } ?>
               </div>
               <div class="clearfix"> </div>
           </div>
       </div>