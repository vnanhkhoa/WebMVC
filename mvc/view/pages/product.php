<div class="head-bread">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li class="active">PRODUCTS</li>
        </ol>
    </div>
</div>
<div class="products-gallery">
 <div class="container">
     <div class="col-md-9 grid-gallery">
         <?php while ($row = mysqli_fetch_array($data['sp'])) {
            if (empty($row['khuyenmai'])) {
                $km = 1;
            }else {
                $km = 1-(float)$row['khuyenmai']/100;
            }
            ?>
            <div class="col-md-4 grid-stn simpleCart_shelfItem">
               <div class="ih-item square effect3 bottom_to_top">
                <div class="bottom-2-top">
                    <div class="img"><img style="height: 278px;" src="public/images/<?php echo $row['anh'] ?>" alt="/" class="img-responsive gri-wid"></div>
                    <div class="info">
                        <div class="pull-left styl-hdn">
                            <h3><?php echo $row['tensp'] ?></h3>
                        </div>
                        <div class="pull-right styl-price">
                            <p>
                                <form action="" method="POST" accept-charset="utf-8">
                                    <button value="<?php echo $row['masp'] ?>" type='submit' name="cart" class="item_add btn btn-light"><span class="glyphicon glyphicon-shopping-cart grid-cart" aria-hidden="true"></span>$<span class="item_price"><?php echo number_format($row['gia']*$km,3) ?></span>
                                    </button>
                                </form>
                            </p>
                        </div>
                        <div class="clearfix"></div>
                    </div></div>
                </div>
                <div class="quick-view">
                    <a href="Home/Product_id/<?php echo $row['masp'] ?>">Quick view</a>
                </div>
            </div>
        <?php }  ?>
    </div>
    <div class="col-md-3 grid-details">
        <div class="grid-addon">
            <section  class="sky-form">
              <div class="product_right">
                 <h4 class="m_2"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span>Categories</h4>
                 <div class="row row1 scroll-pane">
                     <div class="col col-4">
                        <?php while($dm = mysqli_fetch_array($data['dm'])) { ?>                      
                         <label class="dm checkbox"><input type="checkbox" name="checkbox" id="<?php echo $dm['iddanhmuc'] ?>"><i></i><?php echo $dm['tendanhmuc']; ?></label>
                     <?php } ?>
                 </div>
             </div>
         </div>                       
         <script>
           $(document).ready(function(){
               const x = [];
               $(".dm input[name='checkbox']").click(function(ev) { 
                var id = $(this).attr('id'); 
                if ($(this).is(':checked'))
                {
                    var newLength = x.push(id);
                }
                else 
                {
                    var pos = x.indexOf(id);
                    var removedItem = x.splice(pos, 1);
                }
                var str = x.toString();
                $.post("./mvc/core/xuly_ajax.php",
                {
                    id_dm : str.trim(),
                },
                function(data,status){
                    if (status == 'success') {
                        $('.col-md-9').html(data);
                    }
                });
            });
           });
       </script>				 
   </section>
   <section  class="sky-form">
      <h4><span class="glyphicon glyphicon-minus" aria-hidden="true"></span>DISCOUNTS</h4>
      <div class="row row1 scroll-pane">
         <div class="col col-4">
            <label class="checkbox"><input type="checkbox" name="checkbox" ><i></i>Upto - 10% (20)</label>
        </div>
        <div class="col col-4">
            <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>40% - 50% (5)</label>
            <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>30% - 20% (7)</label>
            <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>10% - 5% (2)</label>
            <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Other(50)</label>
        </div>
    </div>
</section> 				                                         
<link rel="stylesheet" type="text/css" href="public/css/jquery-ui.css">
<section  class="sky-form">
  <h4><span class="glyphicon glyphicon-minus" aria-hidden="true"></span>Type</h4>
  <div class="row row1 scroll-pane">
    <div class="col col-4">
        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Air Max (30)</label>
    </div>
    <div class="col col-4">
        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Armagadon   (30)</label>
        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Helium (30)</label>
        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Kyron     (30)</label>
        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Napolean  (30)</label>
        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Foot Rock   (30)</label>
        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Radiated  (30)</label>
        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Spiked  (30)</label>
    </div>
</div>
</section>		
</div>
</div>
<div class="clearfix"></div>
</div> 
</div>