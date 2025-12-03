<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cart</title>
    <link rel="icon" type="image/png" href="img/logo.png">

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../frontend/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="../frontend/css/font-awesome.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../frontend/css/owl.carousel.css">
    <link rel="stylesheet" href="../frontend/css/style.css">
    <link rel="stylesheet" href="../frontend/css/responsive.css">

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
                                    <li><a href="#">VND</a></li>
                                </ul>
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

    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><a href="./"><img src="../frontend/img/icon.png"></a></h1>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="shopping-item">
                        <a href="cart.html">Cart - <span class="cart-amunt">$400</span> <i class="fa fa-shopping-cart"></i> <span class="product-count">1</span></a>
                    </div>
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
                        <li><a href="index.html">Home</a></li>
                        <li><a href="shop.html">Shop page</a></li>
                        <li><a href="single-product.html">Product</a></li>
                        <li class="active"><a href="cart.html">Cart</a></li>
                        <li><a href="checkout.html">Checkout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div> <!-- End mainmenu area -->

    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2><b>Shopping Cart</b></h2>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Page title area -->


    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Search Products</h2>
                        <form action="index.php" method="GET" style="display: flex; flex-direction: column;">
                            <input type="hidden" name="url" value="search">
                            <div>
                                <input type="text" name="keyword" placeholder="Search here..." required
                                    value="<?php echo isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : ''; ?>" />
                            </div>
                            <div>
                                <input type="submit" value="Search">
                            </div>
                        </form>
                    </div>
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Products</h2>
                        <div class="thubmnail-recent">
                            <img src="../frontend/img/product-thumb-1.jpg" class="recent-thumb" alt="">
                            <h2><a href="">Case MIK BARBATOS</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$150.00</ins> <del>$225.00</del>
                            </div>
                        </div>
                        <div class="thubmnail-recent">
                            <img src="../frontend/img/product-thumb-2.jpg" class="recent-thumb" alt="">
                            <h2><a href="">Mainboard Gigabyte AORUS Z890</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$400.00</ins> <del>$425.00</del>
                            </div>
                        </div>
                        <div class="thubmnail-recent">
                            <img src="../frontend/img/product-thumb-3.jpg" class="recent-thumb" alt="">
                            <h2><a href="">Case ASUS A21 micro-ATX 3FA</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$199.00</ins> <del>$225.00</del>
                            </div>
                        </div>
                        <div class="thubmnail-recent">
                            <img src="../frontend/img/product-thumb-1.jpg" class="recent-thumb" alt="">
                            <h2><a href="">Case MIK BARBATOS</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$150.00</ins> <del>$225.00</del>
                            </div>
                        </div>
                    </div>

                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Recent Posts</h2>
                        <ul>
                            <li><a href="shop.html">Case MIK BARBATOS</a></li>
                            <li><a href="shop.html">Case ASUS A21 micro-ATX 3FA</a></li>
                            <li><a href="shop.html">SSD WD Blue 1TB</a></li>
                            <li><a href="shop.html">RAM KINGSTON 16GB</a></li>
                            <li><a href="shop.html">CPU AMD RYZEN™ 5 5600</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="woocommerce">
                            <form method="post" action="#">
                                <table cellspacing="0" class="shop_table cart">
                                    <thead>
                                        <tr>
                                            <th class="product-remove">&nbsp;</th>
                                            <th class="product-thumbnail">&nbsp;</th>
                                            <th class="product-name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (empty($cartItems)): ?>
                                            <tr>
                                                <td colspan="6" class="text-center">Giỏ hàng trống. <a href="index.php?url=shop">Tiếp tục mua sắm</a></td>
                                            </tr>
                                        <?php else: ?>
                                            <?php foreach ($cartItems as $item): ?>
                                                <tr class="cart_item">
                                                    <td class="product-remove">
                                                        <a title="Remove this item" class="remove" href="index.php?url=cart&remove=<?php echo $item['IDProduct']; ?>" onclick="return confirm('Xóa sản phẩm?');">×</a>
                                                    </td>

                                                    <td class="product-thumbnail">
                                                        <a href="single-product.html"><img width="145" height="145" alt="../frontend/img/poster_1_up" class="shop_thumbnail" src="<?php echo $item['ImageProduct'] ?? '../frontend/img/product-thumb-2.jpg'; ?>"></a>
                                                    </td>

                                                    <td class="product-name">
                                                        <a href="single-product.html"><?php echo htmlspecialchars($item['NameProduct']); ?></a>
                                                    </td>

                                                    <td class="product-price">
                                                        <span class="amount">$<?php echo number_format($item['PriceProduct']); ?></span>
                                                    </td>

                                                    <td class="product-quantity">
                                                        <div class="quantity buttons_added" style="display: inline-flex; align-items: center; border: 1px solid #ddd; border-radius: 8px; overflow: hidden;">
                                                            <button type="button" class="minus btn-qty" data-id="<?php echo $item['IDProduct']; ?>"
                                                                style="background:#e74c3c; color:white; border:none; width:36px; height:40px; font-size:18px;">−</button>

                                                            <input type="number"
                                                                name="qty[<?php echo $item['IDProduct']; ?>]"
                                                                class="input-text qty text qty-input"
                                                                value="<?php echo $item['QuantityCartItem']; ?>"
                                                                min="1"
                                                                data-id="<?php echo $item['IDProduct']; ?>"
                                                                style="width:60px; text-align:center; border:none; height:40px; font-size:16px;"
                                                                readonly>

                                                            <button type="button" class="plus btn-qty" data-id="<?php echo $item['IDProduct']; ?>"
                                                                style="background:#27ae60; color:white; border:none; width:36px; height:40px; font-size:18px;">+</button>
                                                        </div>
                                                    </td>

                                                    <td class="product-subtotal">
                                                        <span class="amount">$<?php echo number_format($item['PriceProduct'] * $item['QuantityCartItem']); ?></span>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                        <tr>
                                            <td class="actions" colspan="6">
                                                <!-- <div class="coupon">
                                                    <label for="coupon_code">Coupon:</label>
                                                    <input type="text" placeholder="Coupon code" value="" id="coupon_code" class="input-text" name="coupon_code">
                                                    <input type="submit" value="Apply Coupon" name="apply_coupon" class="button">
                                                </div> -->
                                                <!-- Bọc trong form để tất cả nút đều submit được submit -->
                                                <div style="margin-top: 20px; text-align: right;">
                                                    <button type="submit" name="update_cart" class="button"
                                                        formaction="index.php?url=shoppage">
                                                        Tiếp tục mua sắm </button>
                                                    <button type="submit" name="update_cart" class="button"
                                                        formaction="index.php?url=cart&clear_cart=1"
                                                        onclick="return confirm('Xóa toàn bộ giỏ hàng?')">
                                                        Xóa toàn bộ giỏ hàng
                                                    </button>
                                                    <input type="submit"
                                                        value="Checkout →"
                                                        name="proceed_to_checkout"
                                                        class="checkout-button button alt wc-forward">
                                                </div>
                            </form>
                            </td>
                            </tr>
                            </tbody>
                            </table>
                            </form>

                            <div class="cart-collaterals">
                                <div class="cross-sells">
                                    <h2>You may be interested in...</h2>
                                    <ul class="products">
                                        <li class="product">
                                            <a href="single-product.html">
                                                <img width="325" height="325" alt="T_4_front" class="attachment-shop_catalog wp-post-image" src="../frontend/img/product-2.jpg">
                                                <h3>Ship Your Idea</h3>
                                                <span class="price"><span class="amount">£20.00</span></span>
                                            </a>
                                            <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="22" rel="nofollow" href="single-product.html">Select options</a>
                                        </li>

                                        <li class="product">
                                            <a href="single-product.html">
                                                <img width="325" height="325" alt="T_4_front" class="attachment-shop_catalog wp-post-image" src="../frontend/img/product-4.jpg">
                                                <h3>Ship Your Idea</h3>
                                                <span class="price"><span class="amount">£20.00</span></span>
                                            </a>
                                            <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="22" rel="nofollow" href="single-product.html">Select options</a>
                                        </li>
                                    </ul>
                                </div>


                                <div class="cart_totals ">
                                    <h2>Cart Totals</h2>

                                    <table cellspacing="0">
                                        <tbody>
                                            <tr class="cart-subtotal">
                                                <th>Cart Subtotal</th>
                                                <td><span class="amount">$<?php echo number_format($totalPrice); ?></span></td>
                                            </tr>

                                            <tr class="shipping">
                                                <th>Shipping and Handling</th>
                                                <td>Free Shipping</td>
                                            </tr>

                                            <tr class="order-total">
                                                <th>Order Total</th>
                                                <td><strong><span class="amount">$<?php echo number_format($totalPrice); ?></span></strong> </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


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
                            <li><a href="shop.html">Mainboard</a></li> <!-- filter -->
                            <li><a href="shop.html">Card VGA </a></li> <!-- filter -->
                            <li><a href="shop.html">Ram</a></li> <!-- filter -->
                            <li><a href="shop.html">Case PC</a></li> <!-- filter -->
                            <li><a href="shop.html">CPU</a></li> <!-- filter -->
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
    </div>

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
    </div>

    <!-- Latest jQuery form server -->
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
    <script>
        $(document).ready(function() {
            $(document).on('click', '.btn-qty', function(e) {
                e.preventDefault();

                var $button = $(this);
                var $input = $button.closest('.quantity').find('.qty-input');
                var IDProduct = $input.data('id'); // Giả sử bạn đã sửa data-id
                var oldValue = parseInt($input.val(), 10) || 1;
                var newVal = $button.hasClass('plus') ? oldValue + 1 : Math.max(1, oldValue - 1);

                if (!IDProduct) {
                    console.error('Missing IDProduct!');
                    return;
                }

                console.log('Updating:', {
                    IDProduct,
                    oldValue,
                    newVal
                });

                $input.val(newVal);

                $.ajax({
                    url: 'ajax/updateQuantity.php',
                    method: 'POST',
                    data: {
                        IDProduct: IDProduct,
                        quantity: newVal
                    },
                    dataType: 'json',
                    success: function(res) {
                        console.log('Success response:', res);
                        if (res.success) {
                            location.reload();
                        } else {
                            alert('Cập nhật thất bại: ' + (res.message || 'Unknown error'));
                            $input.val(oldValue);
                        }
                    },
                    error: function(xhr, status, err) {
                        console.error('AJAX Error:', {
                            status,
                            err,
                            response: xhr.responseText
                        }); // Debug chi tiết
                        alert('Lỗi kết nối server: ' + status + ' - ' + err);
                        $input.val(oldValue);
                    }
                });
            });
        });
    </script>
</body>

</html>