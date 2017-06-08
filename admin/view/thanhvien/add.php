<?php
    require 'view/layout/header.php';
?>
<div id="wrapper">

    <!-- Navigation -->
    <?php require 'view/layout/menu.php'; ?>
    <!-- END-Navigation -->
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thành viên
                        <small>Thêm mới</small>
                    </h1>
                </div>
                <?php if(isset($_SESSION['error'])){ ?>
                    <div class="alert alert-danger">
                        <ul>
                           <li><?php echo $_SESSION['error']; ?></li>
                        </ul>
                    </div>

                <?php unset($_SESSION['error']); } ?>
                
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form method="POST">
                        <div class="form-group">
                            <label>Tên đăng nhập:</label>
                            <input class="form-control" name="user" placeholder="Nhập tên đăng nhập" />
                        </div>
                        <div class="form-group">
                            <label>Mật khẩu:</label>
                            <input type="password" class="form-control" name="pass" placeholder="Nhập mật khẩu" />
                        </div>
                        <div class="form-group">
                            <label>Nhập lại mật khẩu:</label>
                            <input type="password" class="form-control" name="repass" placeholder="Nhập lại mật khẩu" />
                        </div>
                        <div class="form-group">
                            <label>Email:</label>
                            <input type="email" class="form-control" name="email" placeholder="Nhập Email" />
                        </div>
                        <div class="form-group">
                            <label>Quyền hạn:</label>
                            <label class="radio-inline">
                                <input name="quyenhan" value="1" checked="" type="radio">Admin
                            </label>
                            <label class="radio-inline">
                                <input name="quyenhan" value="2" type="radio">Quản lý
                            </label>
                        </div>
                        <button type="submit" name="themthanhvien" class="btn btn-default">Thêm thành viên</button>
                        <button type="reset" class="btn btn-default">Làm mới</button>
                    <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<?php
    require 'view/layout/footer.php';
?>