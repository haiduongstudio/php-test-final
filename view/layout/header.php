<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Shop bán hàng online</title>
	<link rel="stylesheet" href="public/user/css/style.css">
	<link rel="stylesheet" href="public/user/css/bootstrap.css">
	<script src="public/user/js/jquery-3.1.1.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="public/user/js/bootstrap.js" type="text/javascript" charset="utf-8"></script>
	<link rel="stylesheet" href="public/user/font-awesome/css/font-awesome.min.css">
</head>
<body>
	<div id="fb-root"></div>
    <div id="fb-root"></div>
    <div id="fb-root"></div>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.9&appId=695512303856807";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
	<header id="index-header">
		<div class="container">
			<div class="header-left col-md-6">
				<h1>Shopping cart</h1>
				<p>Dịch vụ bán hàng online chuyên nghiệp</p>
			</div>
			<div class="header-right col-md-6">
				<div class="row">
					<form action="" method="POST" id="formtimkiem">
						<input type="text" class="nhaptimkiem" name="search" placeholder="Nhập từ khóa..."><input type="submit" class="btn btn-success timkiem" name="search" value="Tìm kiếm">
					</form>
				</div>
				<div class="row addressheader">
					<span class="sdt"><i class="fa fa-phone-square"></i> 01649732758</span>
					<span class="diachi"><i class="fa fa-map-marker"></i> 120 Nguyễn Trãi - Thanh Xuân - Hà Nội</span>
				</div>
				<div class="row addressheader">
					<span class="diachiemail"><i class="fa fa-envelope"></i> haitin4bk@gmail.com</span>
				</div>
			</div>
		</div>
	</header>
	<!-- ---------------- END HEADER --------------------- -->
	<nav id="index-nav">
		<div class="container">
			<ul class="nav nav-pills">
				<li role="presentation" class="nav-menu <?php echo ($_GET["ac"] == '') ? 'active' : '' ?>"><a href="http://localhost/shoppingcart">Trang chủ</a></li>
				<li role="presentation" class="nav-menu <?php echo ($_GET["ac"] == 'sanpham') ? 'active' : '' ?>"><a href="index.php?ac=sanpham">Sản phẩm mới</a></li>
                <li role="presentation" class="nav-menu <?php echo ($_GET["ac"] == 'giohang') ? 'active' : '' ?> "><a href="index.php?ac=giohang">Giỏ hàng <span class="gio-hang-tb">(<?php echo (isset($_SESSION["cart"]) ? count($_SESSION["cart"]) : 0)  ?>)</span></a></li>
				<li role="presentation" class="nav-menu <?php echo ($_GET["ac"] == 'lienhe') ? 'active' : '' ?>" style="border: none;"><a href="index.php?ac=lienhe">Liên hệ</a></li>
			</ul>
		</div>
	</nav>
	<!-- ---------------- END NAV --------------------- -->