<?php

/**
 *
 */
require 'app/model/database.php';
class giohang extends database
{

    public function index()
    {
        require 'view/modules/giohang.php';
    }

    public function addcart($pr) {
        $sanpham = "SELECT * FROM sanpham WHERE id='$pr'";
        $sanpham = $this->db->query($sanpham);
        $sanpham = $sanpham->fetch_assoc();

        if(!empty($_SESSION["cart"])) {
            $cart = $_SESSION["cart"];
            if(array_key_exists($pr, $cart)){
                $cart[$pr] = array(
                    "sl" => (int)$cart[$pr]["sl"] + 1,
                    "dongia" => $sanpham["giasp"],
                    "tensp" => $sanpham["tensanpham"]
                );
            }else {
                $cart[$pr] = array(
                    "sl" => 1,
                    "dongia" => $sanpham["giasp"],
                    "tensp" => $sanpham["tensanpham"]
                );
            }
        }else {
            $cart[$pr] = array(
                "sl" => 1,
                "dongia" => $sanpham["giasp"],
                "tensp" => $sanpham["tensanpham"]
            );
        }
        $_SESSION["cart"] = $cart;
        header('location:index.php?ac=giohang');

    }

    public function xoa($pr) {
        unset($_SESSION["cart"][$pr]);
        header('location:index.php?ac=giohang');
    }

    public function update(){
        $id = $_POST['id'];
        if($_POST["sl"] <= 0){
            unset($_SESSION["cart"][$id]);
            echo '<script>location.reload(true);</script>';
        }else{
            echo number_format($_POST["sl"]*$_POST["dg"],0, ',', '.').' VNĐ';
            $_SESSION["cart"][$id]["sl"] = $_POST["sl"];
        }
    }

    public function addcartajax() {
        $pr = $_POST['id'];
        $sanpham = "SELECT * FROM sanpham WHERE id='$pr'";
        $sanpham = $this->db->query($sanpham);
        $sanpham = $sanpham->fetch_assoc();

        if(!empty($_SESSION["cart"])) {
            $cart = $_SESSION["cart"];
            if(array_key_exists($pr, $cart)){
                $cart[$pr] = array(
                    "sl" => (int)$cart[$pr]["sl"] + 1,
                    "dongia" => $sanpham["giasp"],
                    "tensp" => $sanpham["tensanpham"],
                    "anhsp" => $sanpham["anhsp"]
                );
            }else {
                $cart[$pr] = array(
                    "sl" => 1,
                    "dongia" => $sanpham["giasp"],
                    "tensp" => $sanpham["tensanpham"],
                    "anhsp" => $sanpham["anhsp"]
                );
            }
        }else {
            $cart[$pr] = array(
                "sl" => 1,
                "dongia" => $sanpham["giasp"],
                "tensp" => $sanpham["tensanpham"],
                "anhsp" => $sanpham["anhsp"]
            );
        }
        $_SESSION["cart"] = $cart;
        echo '('.count($_SESSION["cart"]).')';
    }

    public function loadtongtien(){
        $tongtien = 0;
        foreach ($_SESSION["cart"] as $tt){
            $tongtien = $tongtien + $tt["dongia"]*$tt["sl"];
        }
        echo 'Tổng số tiền là: <span>'.number_format($tongtien, 0, ',', '.').' VNĐ</span>';
    }

    public function sendmail() {
        if(isset($_POST['gh_dat_hang'])){
            $ten = $_POST['hoten'];
            $email = $_POST['email'];
            $diachi = $_POST['diachi'];
            $tongtien = '';
            $sdt = $_POST['sdt'];
            $noidung = $_POST['noidung'];
            $body = 'Họ và tên: '.$ten.'<br>Email: '.$email.'<br>Địa chỉ: '.$diachi.'<br>Số điện thoại: '.$sdt.'<br>Ghi chú: '.$noidung.'<br>';
            $content = '';
            $content .= '<table border="1" style="width: 100%;text-align: center;line-height: 34px;"><tr style="background-color: #ededed;font-weight: bold;"><td>Tên sản phẩm</td><td>Đơn giá</td><td>Số lượng</td><td>Thành tiền</td></tr>';
            foreach ($_SESSION["cart"] as $vl){
                $content .= '<tr><td>'.$vl["tensp"].'</td><td>'.$vl["dongia"].'</td><td>'.$vl["sl"].'</td><td>'.$vl["sl"]*$vl["dongia"].'</td></tr>';
                $tongtien = $tongtien + $vl["sl"]*$vl["dongia"];
            }
            $content .= '</table><br>';
            $tongtien = 'TỔNG SỐ TIỀN LÀ: '.$tongtien;
            require 'library/sendmail/PHPMailerAutoload.php';

            $mail = new PHPMailer;
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'haitin4bk@gmail.com';                 // SMTP username
            $mail->Password = '19291812';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            $mail->setFrom($email, 'Dat mua hang');
            $mail->addAddress('haitin4bk@gmail.com', 'Joe User');     // Add a recipient
            $mail->isHTML(true);                                  // Set email format to HTML

            $mail->Subject = 'shoppingcart';
            $mail->Body    = $body.$content.$tongtien;

//            $mail->SMTPDebug = 0;

            if(!$mail->send()) {
                echo '<script>confirm("Gửi mail không thành công. Nhấn ok về trang chủ");window.location = "http://localhost/shoppingcart";</script>';
            } else {
                unset($_SESSION["cart"]);
                echo '<script>confirm("Gửi mail thành công. Nhấn ok về trang chủ");window.location = "http://localhost/shoppingcart"</script>';
            }
            //header("location:index.php");
        }
    }
}