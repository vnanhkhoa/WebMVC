<div class="primary-nav h-100">

  <button href="#" class="hamburger open-panel nav-toggle">
    <span class="screen-reader-text">Menu</span>
  </button>

  <nav role="navigation" class="menu h-100">

    <a href="Admin" class="logotype"><i class="fas fa-users-cog fa-2x"></i> <span style="margin-left: 1rem">ADMIN</span></a>

    <div class="overflow-container">

      <ul class="menu-dropdown">

        <li><a href="Admin">Home </a><span class="icon"><i class="fas fa-home"></i></span></li>

        <li >
          <a href="Admin/Account/">Tài Khoản</a><span class="icon"> <i class="fas fa-user-alt"></i></span>
        </li>

        <li><a href="Admin/Category/">Danh Mục</a><span class="icon"><i class="fas fa-th-list"></i></span></li>

        <li><a href="Admin/Bill">Hóa Đơn</a><span class="icon"><i class="fas fa-file-invoice-dollar"></i></span></li>
         <li><a href="Admin/Customer/">Khách Hàng</a><span class="icon"><i class="fas fa-users"></i></span></li>
        <li><a href="Admin/Product_All/">Sản Phẩm</a><span class="icon"><i class="fab fa-product-hunt"></i></span></li>
        <li><a href="Login/Logout">Logout</a><span class="icon"><i class="fas fa-sign-out-alt"></i></span></li>

      </ul>

    </div>

  </nav>
</div>
<script >
  $(document).ready(function(){
    $('.nav-toggle').click(function(e) {
      e.preventDefault();
      $("html").toggleClass("openNav");
      $(".nav-toggle").toggleClass("active");
    });
  });
</script>