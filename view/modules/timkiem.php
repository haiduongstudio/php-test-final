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
                    <h3 class="title">Tìm kiếm sản phẩm</h3>
                    <div class="content">
                        <?php foreach ($sanpham as $sp) { ?>
                            <div class="sanpham">
                                <p class="tieudesanpham"><?php echo $sp['tensanpham']; ?></p>
                                <img src="<?php echo $sp['anhsp']; ?>" class="anhsanpham">
                                <p class="tieudesanpham"><?php echo number_format($sp['giasp'], 0, ',', '.'); ?></p>
                                <div class="chitiet_button">
                                    <p><a class="myButton"
                                          href="index.php?ac=sanpham&mt=chitietsp&pr=<?php echo $sp['id'] ?>">Chi
                                            Tiết</a></p>
                                    <p>
                                        <button class="myButton2" onclick="addcart(<?php echo $sp['id']; ?>)"
                                                id="add_cart_<?php echo $sp['id']; ?>">Thêm Vào Giỏ Hàng
                                        </button>
                                    </p>
                                    <span style="font-weight: bold;color: red;background: white;padding: 5px;cursor: pointer;"><?php echo number_format($sp['giasp'], 0, ',', '.'); ?>
                                        VNĐ</span>
                                </div>
                            </div>
                        <?php } ?>
                        <div style="clear: both;"></div>
                    </div>


                </div>
            </div>
        </div>
    </section>
    <!-- ---------------- END SECTION --------------------- -->

<?php
require 'view/layout/footer.php';
?>