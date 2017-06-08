<?php
require 'view/layout/header.php';
?>
    <section id="index-section">
        <div class="container">
            <?php
            require 'view/layout/sidebar.php';
            ?>
            <div class="col-md-9">
                <div class="row sanpham_content">
                    <h3 class="title">SẢN PHẨM</h3>
                    <div>
                        <div class="col-md-6" style="text-align: center">
                            <img src="<?php echo $sanpham['anhsp']; ?>" style="width: 75%">
                        </div>
                        <div class="col-md-6 chitietsanpham">
                            <p class="tensanpham"><?php echo $sanpham['tensanpham'] ?></p>
                            <p><span style="font-weight: bold;">Mã sản phẩm: </span> <?php echo $sanpham['masanpham'] ?></p>
                            <p><span style="font-weight: bold;">Nhà sản xuất: </span> <?php echo $sanpham['nhasanxuat'] ?></p>
                            <p><span style="font-weight: bold;">Tình trạng: </span> <?php echo $sanpham['trangthai'] ?></p>
                            <p><span style="font-weight: bold;">Giá: </span> <?php echo number_format($sanpham['giasp'], 0, ',', '.') ?> VNĐ</p>
                            <p><span style="font-weight: bold;">Khuyến mại: </span> <?php echo $sanpham['khuyenmai']; ?></p>
                            <p><button type="submit" name="dathang" class="button-dathang" onclick="addcart(<?php echo $sanpham['id']; ?>)" id="add_cart_<?php echo $sanpham['id']; ?>">Đặt hàng</button></p>
                        </div>
                        <div style="clear: both;"></div>
                        <div class="content" style="margin-top: 30px;">
                            <h3 class="chitietsanpham-text">Chi tiết sản phẩm</h3>
                            <p style="padding: 10px;"><?php echo $sanpham['chitietsp'] ?></p>
                        </div>
                        <h3 class="title" style="margin-top: 30px;">SẢN PHẨM CÙNG LOẠI</h3>
                        <div class="content">
                            <?php
                                foreach($spcungloai as $sp) {
                                    if ($sp['id'] != $sanpham['id']) {
                                        ?>
                                        <div class="sanpham">
                                            <p class="tieudesanpham"><?php echo $sp['tensanpham']; ?></p>
                                            <img src="<?php echo $sp['anhsp']; ?>" class="anhsanpham">
                                            <div class="chitiet_button">
                                                <p><a class="myButton"
                                                      href="index.php?ac=sanpham&mt=chitietsp&pr=<?php echo $sp['id'] ?>">Chi
                                                        Tiết</a></p>
                                                <p>
                                                    <button class="myButton2"
                                                            onclick="addcart(<?php echo $sp['id']; ?>)"
                                                            id="add_cart_<?php echo $sp['id']; ?>">Thêm Vào Giỏ Hàng
                                                    </button>
                                                </p>
                                                <span style="font-weight: bold;color: red;background: white;padding: 5px;cursor: pointer;"><?php echo number_format($sp['giasp'], 0, ',', '.'); ?>
                                                    VNĐ</span>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                            ?>
                            <div style="clear: both;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ---------------- END SECTION --------------------- -->
<?php
require 'view/layout/footer.php';
?>