<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="http://localhost/shoppingcart/admin">Trang quản trị bán hàng</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> <?php echo $_SESSION['login']; ?> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="#"><i class="fa fa-user fa-fw"></i> Hồ sơ</a>
                </li>
                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Cài đặt</a>
                </li>
                <li class="divider"></li>
                <li><a href="http://localhost/shoppingcart/admin/index.php?ac=login&mt=logout"><i class="fa fa-sign-out fa-fw"></i> Đăng xuất</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="http://localhost/shoppingcart/admin/index.php"><i class="fa fa-dashboard fa-fw"></i> Bảng tin</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Danh mục<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="http://localhost/shoppingcart/admin/index.php?ac=category&mt=list">Danh sách</a>
                        </li>
                        <li>
                            <a href="http://localhost/shoppingcart/admin/index.php?ac=category&mt=add">Thêm danh mục</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
				<li>
                    <a href="#"><i class="fa fa-cube fa-fw"></i> Thể loại<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="http://localhost/shoppingcart/admin/index.php?ac=theloai&mt=list">Danh sách</a>
                        </li>
                        <li>
                            <a href="http://localhost/shoppingcart/admin/index.php?ac=theloai&mt=add">Thêm thể loại</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="#"><i class="fa fa-shopping-cart"></i> Sản phẩm<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="http://localhost/shoppingcart/admin/index.php?ac=sanpham&mt=list">Danh sách</a>
                        </li>
                        <li>
                            <a href="http://localhost/shoppingcart/admin/index.php?ac=sanpham&mt=add">Thêm sản phẩm</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="#"><i class="fa fa-users fa-fw"></i> User<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="http://localhost/shoppingcart/admin/index.php?ac=user&mt=list">Danh sách user</a>
                        </li>
                        <li>
                            <a href="http://localhost/shoppingcart/admin/index.php?ac=user&mt=add">Thêm user</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>