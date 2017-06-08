<?php

/**
* 
*/
require 'app/model/database.php';
class home extends database
{
//	public function __construct(){
//		if(!isset($_SESSION['login']) && !isset($_SESSION['auth'])){
//			header('location:index.php?ac=login');
//		}
//	}
	public function index()
	{
        if(!isset($_SESSION['login']) && !isset($_SESSION['auth'])){
            header('location:index.php?ac=login');
        }
	    $sanpham = "SELECT * FROM sanpham";
	    $sanpham = $this->db->query($sanpham);
	    $theloai = "SELECT * FROM theloai";
	    $theloai = $this->db->query($theloai);
	    $cate = "SELECT * FROM category";
	    $cate = $this->db->query($cate);
	    $user = "SELECT * FROM user";
	    $user = $this->db->query($user);
		require 'view/dashboar.php';
	}
}