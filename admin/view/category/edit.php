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
                    <h1 class="page-header">Danh mục
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
                            <label>Tên danh mục:</label>
                            <input class="form-control" value="<?php echo $cate['cate_name'] ?>" name="catename" placeholder="Nhập tên danh mục" />
                        </div>
                        <button type="submit" name="suadm" class="btn btn-default">Sửa </button>
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