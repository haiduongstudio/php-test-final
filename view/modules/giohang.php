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
                    <h3 class="title">Giỏ hàng của bạn</h3>
                    <?php
                    $stt = 1;
                    if(!empty($_SESSION['cart'])){
                    ?>
                        <table border="1" style="width: 100%;line-height: 40px;text-align: center">
                            <tr style="background-color: #ededed;font-weight: bold;color: #03A9F4;">
                                <td>STT</td>
                                <td>Tên sản phẩm</td>
                                <td>Ảnh sản phẩm</td>
                                <td>Đơn giá</td>
                                <td>Số lượng</td>
                                <td>Thành tiền</td>
                                <td></td>
                            </tr>
                            <?php
                                $tongtien = 0;
                                foreach($_SESSION["cart"] as $key => $gh) {
                            ?>
                                <tr>
                                    <td><?php echo $stt; ?></td>
                                    <td><?php echo $_SESSION["cart"][$key]["tensp"] ?></td>
                                    <td><img src="<?php echo $_SESSION['cart'][$key]['anhsp'] ?>" width="50"></td>
                                    <td><?php echo number_format($_SESSION["cart"][$key]["dongia"], 0, ',', '.'); ?> VNĐ</td>
                                    <td width="70"><input class="input-sp-gh" type="number" id="gh_sl_<?php echo $key; ?>" onchange="updateitem(<?php echo $key.','.$_SESSION["cart"][$key]["dongia"]; ?>)" value="<?php echo $_SESSION['cart'][$key]['sl']; ?>"></td>
                                    <td id="gh_tt_<?php echo $key; ?>"><?php echo number_format($_SESSION["cart"][$key]["dongia"]*$_SESSION['cart'][$key]['sl'],0, ',', '.') ?> VNĐ</td>
                                    <td><a href="index.php?ac=giohang&mt=xoa&pr=<?php echo $key ?>"><img src="public/user/img/xoa.png" width="20"></a></td>
                                </tr>
                            <?php
                                    $tongtien = $tongtien + $_SESSION["cart"][$key]["dongia"]*$_SESSION['cart'][$key]['sl'];
                                    $stt++;
                                }
                            ?>
                        </table>
                        <p id="tongtien">Tổng số tiền là: <span><?php echo number_format($tongtien, 0, ',', '.'); ?> VNĐ</span></p>
                        <form method="post" action="index.php?ac=giohang&mt=sendmail">
                            <table style="width: 55%;margin-left: 30px;">
                                <tr>
                                    <td class="label_form_dich_vu">Họ tên <span style="color: red;">*</span></td>
                                    <td><input type="text" required name="hoten" class="form-control input_form_dich_vu" ></td>
                                </tr>
                                <tr>
                                    <td class="label_form_dich_vu">Email <span style="color: red;">*</span></td>
                                    <td><input type="email" required name="email" class="form-control input_form_dich_vu" ></td>
                                </tr>
                                <tr>
                                    <td class="label_form_dich_vu">Địa chỉ <span style="color: red;">*</span></td>
                                    <td><input type="text" required name="diachi" class="form-control input_form_dich_vu" ></td>
                                </tr>
                                <tr>
                                    <td class="label_form_dich_vu">Số điện thoại <span style="color: red;">*</span></td>
                                    <td><input type="text" required name="sdt" class="form-control input_form_dich_vu"></td>
                                </tr>
                                <tr>
                                    <td class="label_form_dich_vu">Ghi chú</td>
                                    <td><textarea type="text" name="noidung" class="form-control input_form_dich_vu" ></textarea></td>
                                </tr>
                            </table>
                            <input type="hidden" name="tongtien" value="<?php echo $tongtien ?>">
                            <button type="submit" name="gh_dat_hang" class="btn btn-success" style="margin-left: 30px;">Đặt hàng</button>
                        </form>
                    <?php
                    }else {
                    ?>
                        <p>Chưa có sản phẩm trong giỏ hàng</p>
                    <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </section>
    <!-- ---------------- END SECTION --------------------- -->
    <script>
        function updateitem(id,price) {
            $.ajax({
                url: "index.php?ac=giohang&mt=update",
                type: "post",
                dataType: "text",
                data: {
                    sl : $('#gh_sl_'+id).val(),
                    dg : price,
                    id : id
                },
                success: function (result) {
                    $('#gh_tt_'+id).html(result);
                }
            });
            $('#tongtien').load('index.php?ac=giohang&mt=loadtongtien');
        }
    </script>
<?php
require 'view/layout/footer.php';
?>