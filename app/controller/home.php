<?php

/**
* 
*/
require 'app/model/database.php';
class home extends database
{
	
	public function index()
	{
        $cate = " SELECT * FROM category";
        $cate = $this->db->query($cate);
        $catehome = "SELECT * FROM category LIMIT 1,4 ";
        $catehome = $this->db->query($catehome);
        $spnoibat  = "SELECT * FROM sanpham WHERE noibat='1' ORDER BY id DESC LIMIT 6 ";
        $spnoibat = $this->db->query($spnoibat);
		require 'view/modules/home.php';
	}
}