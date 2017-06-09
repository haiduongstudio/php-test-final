<?php

require 'app/model/database.php';
class timkiem extends database
{
    public function findProduct(){
        if(isset($_POST['txtsearch'])&&($_POST['txtsearch']!="")) {
            $sanpham = "SELECT * FROM sanpham WHERE tensanpham LIKE '%".$_POST['txtsearch']."%' ORDER BY id DESC LIMIT 36 ";
            $sanpham = $this->db->query($sanpham);
            //var_dump($sanpham);
            require 'view/modules/timkiem.php';
        }
        header('location:index.php');
    }
}