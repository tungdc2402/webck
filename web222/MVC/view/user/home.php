
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Main menu</title>
    <link rel="icon" type="image/png" href="img/logo.png">
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">
      <style>
          /* 1. Container chứa các nút (Xếp dọc) */
          .floating-contact-wrap {
              position: fixed;
              bottom: 24px;
              right: 24px;
              z-index: 9999999;
              display: flex;
              flex-direction: column; /* Xếp dọc */
              gap: 15px; /* Khoảng cách giữa các nút */
          }

          /* 2. Style chung cho các nút */
          .contact-btn {
              width: 60px;
              height: 60px;
              border-radius: 50%;
              display: flex;
              align-items: center;
              justify-content: center;
              box-shadow: 0 4px 12px rgba(0,0,0,0.3);
              cursor: pointer;
              text-decoration: none !important;
              position: relative;
              transition: transform 0.3s;
          }

          .contact-btn:hover { transform: scale(1.1); }

          /* Nút Zalo (Màu xanh Zalo) */
          .btn-zalo {
              background-color: #0068ff;
              border: 2px solid white;
          }

          /* Chữ Z cho icon Zalo */
          .zalo-text {
              color: white;
              font-family: Arial, sans-serif;
              font-weight: 900;
              font-size: 32px;
              line-height: 1;
          }

          /* Nút Messenger (Màu xanh Messenger) */
          .btn-messenger {
              background-color: #0084ff;
              border: 2px solid white;
          }

          .btn-messenger svg {
              width: 30px; height: 30px; fill: white;
          }

          /* 3. Tooltip (Chữ hiện ra bên cạnh) */
          .contact-tooltip {
              position: absolute;
              right: 70px;
              top: 15px;
              background: #333;
              padding: 5px 12px;
              border-radius: 5px;
              font-size: 13px;
              color: white;
              white-space: nowrap;
              opacity: 0; visibility: hidden;
              transition: 0.3s;
              font-family: Arial, sans-serif;
          }

          /* Mũi tên tooltip */
          .contact-tooltip::after {
              content: ''; position: absolute; right: -6px; top: 50%;
              transform: translateY(-50%);
              border-left: 6px solid #333; border-top: 6px solid transparent; border-bottom: 6px solid transparent;
          }

          .contact-btn:hover .contact-tooltip { opacity: 1; visibility: visible; right: 75px; }

          /* 4. Hiệu ứng rung lắc cho nút Zalo để gây chú ý */
          .btn-zalo { animation: quick-alo-circle-img-anim 1s infinite ease-in-out; }

          @keyframes quick-alo-circle-img-anim {
              0% {transform: rotate(0) scale(1) skew(1deg);}
              10% {transform: rotate(-25deg) scale(1) skew(1deg);}
              20% {transform: rotate(25deg) scale(1) skew(1deg);}
              30% {transform: rotate(-25deg) scale(1) skew(1deg);}
              40% {transform: rotate(25deg) scale(1) skew(1deg);}
              50% {transform: rotate(0) scale(1) skew(1deg);}
              100% {transform: rotate(0) scale(1) skew(1deg);}
          }
      </style>
  </head>
  <body>

    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                            <li><a href="my_account.html"><i class="fa fa-user"></i> My Account</a></li>
                            <li><a href="404.html"><i class="fa fa-heart"></i> Wishlist</a></li>
                            <li><a href="cart.html"><i class="fa fa-user"></i> My Cart</a></li>
                            <li><a href="checkout.html"><i class="fa fa-user"></i> Checkout</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="header-right">
                        <ul class="list-unstyled list-inline">
                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">Currency :</span><span class="value">USD </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">USD</a></li>
                                    <li><a href="#">VND</a></li>                                </ul>
                            </li>

                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">Language :</span><span class="value">English </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">Vietnamese</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End header area -->

    <div class="site-branding-area1">
        <div class="container1">
            <div class="row1">
                <div class="logo1">
                    <a href="./">
                        <img src="img/logo1.png" alt="Logo" />
                    </a>
                </div>

                <div class="search">
                    <form action="index.php" method="GET" style="display: flex;">
                        <input type="hidden" name="url" value="search">
                        <input type="text" name="keyword" placeholder="Search here..." required
                               value="<?php echo isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : '' ?>" />
                        <button style="background-color: #5cb85c; color: white; padding: 8px 16px; border: none; border-radius: 50px;">Search</button>
                    </form>
                </div>

                <div class="cart">
                    <a href="cart.html"><i class="fa fa-shopping-cart" style="font-size:30px;color:red"></i></a>
                </div>

                <div class="auth-buttons" style="display: flex; align-items: center; gap: 10px;">
                    <?php if (isset($_SESSION['user_name'])): ?>

                        <div class="user-info">
                        <span style="font-weight: 600; color: #333;">
                            <i class="fa fa-user" style="color: #d70018;"></i>
                            Hello, <?php echo htmlspecialchars($_SESSION['user_name']); ?>
                        </span>
                        </div>
                        <a href="index.php?url=logout" class="btn-auth" style="background: #555; color: white; padding: 5px 10px; border-radius: 5px; text-decoration: none; font-size: 14px;">
                            Đăng xuất
                        </a>

                    <?php else: ?>

                        <a href="index.php?url=login" class="btn-auth btn-login">Đăng nhập</a>
                        <a href="index.php?url=register" class="btn-auth btn-register">Đăng ký</a>

                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div> <!-- End site branding area -->

    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active">
                        <a href="home">Home</a></li>
                        <li><a href="shoppage">Shop page</a></li>
                        <li><a href="cart.html">Cart</a></li>
                        <li><a href="checkout.html">Checkout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div> <!-- End mainmenu area -->

    <div class="slider-area">
        	<!-- Slider -->
			<div class="block-slider block-slider4">
				<ul class="" id="bxslider-home4">
					<li>
						<a href="shop.html">
                            <img src="img/h4-slide.png" alt="Slide">
                        </a>
					</li>
					<li>
                        <a href="shop.html">
                            <img src="img/h4-slide2.png" alt="Slide">
                        </a>
					</li>
					<li>
                        <a href="shop.html">
                            <img src="img/h4-slide3.png" alt="Slide">
                        </a>
					</li>
					<li>
                        <a href="shop.html">
                        <img src="img/h4-slide4.png" alt="Slide">
                        </a>
					</li>
				</ul>
			</div>
			<!-- ./Slider -->
    </div> <!-- End slider area -->

    <div class="promo-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo1">
                        <i class="fa fa-refresh"></i>
                        <p>30 Days return</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo2">
                        <i class="fa fa-truck"></i>
                        <p>Free shipping</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo3">
                        <i class="fa fa-lock"></i>
                        <p>Secure payments</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo4">
                        <i class="fa fa-gift"></i>
                        <p>New products</p>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End promo area -->
<!-- hiển thị sản phẩm mới nhất -->
<?php
    echo '<div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">Latest Products</h2>
                        <div class="product-carousel">';
?>

<?php
while($row = mysqli_fetch_array($products))
{
?>
 <div class="single-product">
 <div class="product-f-image">
     <img src="img/<?php echo htmlspecialchars($row['ImageUrlProduct']); ?>" alt="">
<div class="product-hover">
   <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a><a href="index.php?url=detail&id=<?php echo $row['IDProduct']; ?>" class="view-details-link"><i class="fa fa-link"></i> See details</a>
</div>
 </div>

     <h2><a href="index.php?url=detail&id=<?php echo $row['IDProduct']; ?>"><?php echo htmlspecialchars($row['NameProduct']); ?></a></h2>
     <div class="product-carousel-price">
         <ins>$500.00</ins> <del>$999.00</del>
     </div>
 </div>
<?php
}
?>

<?php
    echo '                    </div>';
    echo '                </div>';
    echo '            </div>';
    echo '        </div>';
    echo '    </div>';
    echo '</div>';
?>
<!-- End brands area -->

    <div class="product-widget-area">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">Top Sellers</h2>
                        <a href="" class="wid-view-more">View All</a>
                        <div class="single-wid-product">
                            <a href="single-product.html"><img src="img/product-thumb-1.jpg" alt="" class="product-thumb"></a>
                            <h2><a href="single-product.html">Case MIK BARBATOS</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins>$150.00</ins> <del>$225.00</del>
                            </div>
                        </div>
                        <div class="single-wid-product">
                            <a href="single-product.html"><img src="img/product-thumb-2.jpg" alt="" class="product-thumb"></a>
                            <h2><a href="single-product.html">Mainboard Gigabyte AORUS Z890</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins>$400.00</ins> <del>$425.00</del>
                            </div>
                        </div>
                        <div class="single-wid-product">
                            <a href="single-product.html"><img src="img/product-thumb-3.jpg" alt="" class="product-thumb"></a>
                            <h2><a href="single-product.html">Case ASUS A21 micro-ATX 3FA</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins>$199.00</ins> <del>$225.00</del>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">Recently Viewed</h2>
                        <a href="#" class="wid-view-more">View All</a>
                        <div class="single-wid-product">
                            <a href="single-product.html"><img src="img/product-thumb-4.jpg" alt="" class="product-thumb"></a>
                            <h2><a href="single-product.html">Corsair NAUTILUS 240 ARGB</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>

                            </div>
                            <div class="product-wid-price">
                                <ins>$100.00</ins> <del>$125.00</del>
                            </div>
                        </div>
                        <div class="single-wid-product">
                            <a href="single-product.html"><img src="img/product-thumb-1.jpg" alt="" class="product-thumb"></a>
                            <h2><a href="single-product.html">Case MIK BARBATOS</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins>$150.00</ins> <del>$225.00</del>
                            </div>
                        </div>
                        <div class="single-wid-product">
                            <a href="single-product.html"><img src="img/product-thumb-2.jpg" alt="" class="product-thumb"></a>
                            <h2><a href="single-product.html">Mainboard Gigabyte AORUS Z890</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins>$400.00</ins> <del>$425.00</del>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">Top New</h2>
                        <a href="#" class="wid-view-more">View All</a>
                        <div class="single-wid-product">
                            <a href="single-product.html"><img src="img/product-thumb-3.jpg" alt="" class="product-thumb"></a>
                            <h2><a href="single-product.html">Case ASUS A21 micro-ATX 3FA</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins>$199.00</ins> <del>$225.00</del>
                            </div>
                        </div>
                        <div class="single-wid-product">
                            <a href="single-product.html"><img src="img/product-thumb-4.jpg" alt="" class="product-thumb"></a>
                            <h2><a href="single-product.html">Corsair NAUTILUS 240 ARGB</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>

                            </div>
                            <div class="product-wid-price">
                                <ins>$100.00</ins> <del>$125.00</del>
                            </div>
                        </div>
                        <div class="single-wid-product">
                            <a href="single-product.html"><img src="img/product-thumb-1.jpg" alt="" class="product-thumb"></a>
                            <h2><a href="single-product.html">Case MIK BARBATOS</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins>$150.00</ins> <del>$225.00</del>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End product widget area -->

    <div class="footer-top-area">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="footer-about-us">
                        <h2>Demo <span>IE104</span></h2>
                        <p>Trong thời đại hiện đại, sự tiện lợi và linh hoạt trong việc mua sắm trực tuyến ngày càng trở thành một xu hướng phổ biến. Đối với lĩnh vực điện máy, việc tạo ra một website bán hàng chuyên nghiệp không chỉ là một cơ hội kinh doanh mà còn là cách để đáp ứng nhu cầu ngày càng cao của khách hàng. ( văn mẫu.txt )</p>
                        <div class="footer-social">
                            <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">User Navigation </h2>
                        <ul>
                            <li><a href="my_account.html">My account</a></li> <!-- filter -->
                            <li><a href="#">Order history</a></li> <!-- filter -->
                            <li><a href="#">Wishlist</a></li> <!-- filter -->
                            <li><a href="#">Vendor contact</a></li> <!-- filter -->
                            <li><a href="index.html">Home page</a></li> <!-- filter -->
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Categories</h2>
                        <ul>
                            <li><a href="shop.html">Mainboard</a></li>  <!-- filter -->
                            <li><a href="shop.html">Card VGA </a></li>  <!-- filter -->
                            <li><a href="shop.html">Ram</a></li>  <!-- filter -->
                            <li><a href="shop.html">Case PC</a></li>  <!-- filter -->
                            <li><a href="shop.html">CPU</a></li>  <!-- filter -->
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="footer-feedback">
                        <h2 class="footer-wid-title">Feedback</h2>
                        <p>Feel free to reach out to us for any inquiries, feedback, or support. We're here to help!</p>
                        <div class="feedback-form">
                            <form action="404.html">
                                <input type="email" placeholder="Your email">
                                <input type="submit" value="Subscribe">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer top area -->

    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="copyright">
                        <p>&copy; 2024 IE104. All Rights Reserved. </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="footer-card-icon">
                        <i class="fa fa-cc-discover"></i>
                        <i class="fa fa-cc-mastercard"></i>
                        <i class="fa fa-cc-paypal"></i>
                        <i class="fa fa-cc-visa"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer bottom area -->
 	<div>.</div>
    <!-- Latest jQuery form server -->

    <div class="floating-contact-wrap">

        <a href="https://zalo.me/0705955589" target="_blank" class="contact-btn btn-zalo">
            <span class="zalo-text">Z</span>
            <div class="contact-tooltip">Chat Zalo</div>
        </a>

        <a href="https://m.me/102803015947076" target="_blank" class="contact-btn btn-messenger">
            <svg viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.03 2 11C2 13.66 3.39 16.05 5.61 17.58L4.99 20.54C4.86 21.13 5.39 21.61 5.95 21.43L9.08 20.41C10.02 20.79 11 21 12 21C17.52 21 22 16.97 22 12C22 7.03 17.52 2 12 2ZM13.06 15.19L10.68 12.63L6.03 15.18C5.69 15.37 5.28 15 5.43 14.64L8.08 8.41C8.25 8.02 8.78 8.02 8.95 8.41L11.32 10.97L15.97 8.42C16.31 8.23 16.72 8.6 16.57 8.96L13.92 15.19C13.75 15.58 13.22 15.58 13.06 15.19Z"/></path></svg>
            <div class="contact-tooltip">Chat Facebook</div>
        </a>

    </div>
    <script src="https://code.jquery.com/jquery.min.js"></script>

    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <!-- jQuery sticky menu -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>

    <!-- jQuery easing -->
    <script src="js/jquery.easing.1.3.min.js"></script>

    <!-- Main Script -->
    <script src="js/main.js"></script>

    <!-- Slider -->
    <script type="text/javascript" src="js/bxslider.min.js"></script>
	<script type="text/javascript" src="js/script.slider.js"></script>
</body>

</html>