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
                    <h1 class="page-header">Sản phẩm
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
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Tên sản phẩm:</label>
                            <input class="form-control" name="tensp" placeholder="Nhập tên sản phẩm" />
                        </div>
                         <div class="form-group">
                            <label>Ảnh sản phẩm: </label>
                            <input type="file" class="form-control"  name="anhsp" />
                        </div>
                        <div class="form-group">
                            <label>Mã sản phẩm:</label>
                            <input type="text" class="form-control" name="masp" placeholder="Nhập mã sản phẩm" />
                        </div>
                         <div class="form-group">
                            <label>Thể loại: </label>
                            <select class="form-control" name="idcate" id="cate-ajax">
                                <?php foreach ($cate as $ct) { ?>
                                    <option value="<?php echo $ct['id'] ?>"><?php echo $ct['cate_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Danh mục: </label>
                            <select class="form-control" name="idtheloai" id="theloai-ajax">
                                <?php foreach ($theloai as $tl) { ?>
                                    <option value="<?php echo $tl['id'] ?>"><?php echo $tl['tentheloai'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nhà sản xuất:</label>
                            <input type="text" class="form-control" name="nsxxx" />
                        </div>
                        <div class="form-group">
                            <label>Giá sản phẩm:</label>
                            <input type="number" class="form-control" name="giasp" />
                        </div>
                        <div class="form-group">
                            <label>Trạng thái:</label>
                            <input type="text" class="form-control" name="trangthai" />
                        </div>
                        <div class="form-group">
                            <label>Khuyến mại:</label>
                            <input type="text" class="form-control" name="khuyenmai" />
                        </div>
                        <div class="form-group">
                            <label>Chi tiết sản phẩm:</label>
                            <textarea class="form-control" name="chitietsp"></textarea>
                        </div>
                         <div class="form-group">
                            <label>Nổi bật:</label>
                            <label class="radio-inline">
                                <input name="noibat" value="1" type="radio">Có
                            </label>
                            <label class="radio-inline">
                                <input name="noibat" value="0" checked type="radio">Không
                            </label>
                        </div>
                        <button type="submit" name="themsp" class="btn btn-default">Thêm</button>
                        <button type="reset" class="btn btn-default">Làm mới</button>
                    <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
    <script>
        $('#cate-ajax').change(function (){
            $.ajax({
                url: "http://localhost/shoppingcart/admin/index.php?ac=sanpham&mt=ajax",
                    type: "post",
                    dataType: "text",
                    data: {
                        number : $('#cate-ajax').val()
                    },
                    success: function (result) {
                        // console.log(result);
                        $('#theloai-ajax').html(result);
                    }
                });
            });
    </script>
</div>
<!-- /#wrapper -->
<?php
    require 'view/layout/footer.php';
?>