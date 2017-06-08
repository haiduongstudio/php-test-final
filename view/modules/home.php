<?php
	require 'view/layout/header.php';
?>
	<section id="index-section">
		<div class="container">
			<p style="color: #0075CA;font-size: 14px;"><marquee behavior="alternate"><span style="color: #900;font-size: 15px;font-weight: bold">Website:</span> abcshop.com</marquee></p>
            <?php
            require 'view/layout/sidebar.php';
            ?>
			<div class="col-md-9">
				<div class="row sanpham_content">
					<h3 class="title">SẢN PHẨM NỔI BẬT</h3>
                    <div class="content">
                        <?php foreach($spnoibat as $noibat) { ?>
                            <div class="sanpham">
                                <p class="tieudesanpham"><?php echo $noibat['tensanpham']; ?></p>
                                <img src="<?php echo $noibat['anhsp'];  ?>" class="anhsanpham">
                                <div class="chitiet_button">
                                    <p><a class="myButton" href="index.php?ac=sanpham&mt=chitietsp&pr=<?php echo $noibat['id'] ?>">Chi Tiết</a></p>
                                    <p><button class="myButton2" onclick="addcart(<?php echo $noibat['id']; ?>)" id="add_cart_<?php echo $noibat['id']; ?>">Thêm Vào Giỏ Hàng</button></p>
                                    <span style="font-weight: bold;color: red;background: white;padding: 5px;cursor: pointer;"><?php echo number_format($noibat['giasp'], 0, ',', '.'); ?> VNĐ</span>
                                </div>
                            </div>
                        <?php } ?>
                        <div style="clear: both;"></div>
                    </div>
                    

				</div>
                <?php foreach($catehome as $cth){ ?>
				    <div class="row sanpham_content">
					<h3 class="title"><?php echo $cth['cate_name']; ?></h3>
					<div class="content">
                        <?php
                            $cateid = $cth['id'];
                            $sanpham = "SELECT * FROM sanpham WHERE id_cate='$cateid' ORDER BY id desc LIMIT 9 ";
                            $sanpham = $this->db->query($sanpham);
                            foreach($sanpham as $sp) {
                        ?>
                            <div class="sanpham">
                                <p class="tieudesanpham"><?php echo $sp['tensanpham']; ?></p>
                                <img src="<?php echo $sp['anhsp']; ?>" class="anhsanpham">
                                <div class="chitiet_button">
                                    <p><a class="myButton" href="index.php?ac=sanpham&mt=chitietsp&pr=<?php echo $sp['id'] ?>">Chi Tiết</a></p>
                                    <p><button class="myButton2" onclick="addcart(<?php echo $sp['id']; ?>)" id="add_cart_<?php echo $sp['id']; ?>">Thêm Vào Giỏ Hàng</button></p>
                                    <span style="font-weight: bold;color: red;background: white;padding: 5px;cursor: pointer;"><?php echo number_format($sp['giasp'], 0, ',', '.'); ?> VNĐ</span>
                                </div>
                            </div>

                        <?php } ?>

						<div style="clear: both;"></div>
					</div>
				</div>
                <?php } ?>
			</div>
		</div>
	</section>
	<!-- ---------------- END SECTION --------------------- -->
    
<?php
	require 'view/layout/footer.php';
?>