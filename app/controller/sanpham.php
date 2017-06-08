<?php

require 'app/model/database.php';
class sanpham extends database
{
    public function index(){
        $sanpham  = "SELECT * FROM sanpham ORDER BY id DESC LIMIT 36 ";
        $sanpham = $this->db->query($sanpham);
        require 'view/modules/sanpham.php';
    }
    public function category($pr) {
        $catename = " SELECT * FROM category WHERE id='$pr' LIMIT 1";
        $catename = $this->db->query($catename);
        $catename = $catename->fetch_assoc();
        $sanpham = " SELECT * FROM sanpham WHERE id_cate='$pr' ORDER BY id DESC LIMIT 36 ";
        $sanpham = $this->db->query($sanpham);
        require 'view/modules/category.php';
    }

    public function loailinhkien($pr) {
        $theloai = "SELECT * FROM theloai WHERE id='$pr' LIMIT 1";
        $theloai = $this->db->query($theloai);
        $theloai = $theloai->fetch_assoc();
        $sanpham = " SELECT * FROM sanpham WHERE id_theloai='$pr' ORDER BY id DESC LIMIT 36 ";
        $sanpham = $this->db->query($sanpham);
        require 'view/modules/loailinhkien.php';
    }

    public function chitietsp($pr){
        $sanpham ="SELECT * FROM sanpham WHERE id='$pr' LIMIT 1";
        $sanpham = $this->db->query($sanpham);
        $sanpham = $sanpham->fetch_assoc();
        $id_theloai = $sanpham['id_theloai'];
        $spcungloai = "SELECT * FROM sanpham WHERE id_theloai='$id_theloai' ORDER BY id DESC LIMIT 24";
        $spcungloai = $this->db->query($spcungloai);
        require 'view/modules/chitietsp.php';
    }

}