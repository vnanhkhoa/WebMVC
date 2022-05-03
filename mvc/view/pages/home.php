<div class="header-end">
    <?php if (isset($_SESSION['thanhtoan'])): ?>
       <div class="alert alert-success">
        <?php echo $_SESSION['thanhtoan']; unset($_SESSION['thanhtoan']);?>
    </div>
<?php endif ?>
<div class="container">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img src="public/images/shoe3.jpg" alt="...">
            <div class="carousel-caption car-re-posn">
                <h3>AirMax</h3>
                <h4>You feel to fall</h4>
                <span class="color-bar"></span>
            </div>
        </div>
        <div class="item">
          <img src="public/images/shoe1.jpg" alt="...">
          <div class="carousel-caption car-re-posn">
            <h3>AirMax</h3>
            <h4>You feel to fall</h4>
            <span class="color-bar"></span>
        </div>
    </div>
    <div class="item">
      <img src="public/images/shoe2.jpg" alt="...">
      <div class="carousel-caption car-re-posn">
        <h3>AirMax</h3>
        <h4>You feel to fall</h4>
        <span class="color-bar"></span>
    </div>
</div>
</div>

<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left car-icn" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right car-icn" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
</a>
</div>
<div class="clearfix"></div>
</div>
</div>
<div class="feel-fall">
    <div class="container">
        <div class="pull-left fal-box">
            <div class=" fall-left">
                <h3>Fall</h3>
                <img src="public/images/f-l.png" alt="/" class="img-responsive fl-img-wid">
                <p>Inspiration and innovation<br> for every athlete in the world</p>
                <span class="fel-fal-bar"></span>
            </div>
        </div>
        <div class="pull-right fel-box">
            <div class="feel-right">
                <h3>Feel</h3>
                <img src="public/images/f-r.png" alt="/" class="img-responsive fl-img-wid">
                <p>Inspiration and innovation<br> for every athlete in the world</p>
                <span class="fel-fal-bar2"></span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="shop-grid">
    <div class="container">
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
        <div class="clearfix"></div>
    </div>
</div>
<div class="sub-news">
    <div class="container">
        <form>
            <h3>NewsLetter</h3>
            <input type="text" class="sub-email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}">
            <a class="btn btn-default subs-btn" href="#" role="button">SUBSCRIBE</a>
        </form>
    </div>
</div>