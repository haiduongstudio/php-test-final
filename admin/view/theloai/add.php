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
                    <h1 class="page-header">Thể loại
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
                            <label>Tên thể loại:</label>
                            <input class="form-control" name="tentheloai" placeholder="Nhập tên thể loại" />
                        </div>
                        <div class="form-group">
                            <label>Danh mục: </label>
                            <select class="form-control" name="idcate">
                                <?php foreach ($category as $ct) { ?>
                                    <option value="<?php echo $ct['id'] ?>"><?php echo $ct['cate_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <button type="submit" name="themtl" class="btn btn-default">Thêm</button>
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