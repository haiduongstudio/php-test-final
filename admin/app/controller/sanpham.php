<?php

/**
* 
*/
require 'app/model/database.php';

class sanpham extends database
{

	public function list()
	{
		if(!isset($_SESSION['login']) && !isset($_SESSION['auth'])){
			header('location:index.php?ac=login');
		}
		$spquery = " SELECT * FROM sanpham ORDER BY ID DESC";
		$sanpham = $this->db->query($spquery);
		require 'view/sanpham/list.php';
	}
	public function add(){
		if(!isset($_SESSION['login']) && !isset($_SESSION['auth'])){
			header('location:index.php?ac=login');
		}
		$tlquery = " SELECT * FROM theloai WHERE id_cate='1' ";
		$theloai = $this->db->query($tlquery);
		$catequery = "SELECT * FROM category";
		$cate = $this->db->query($catequery);
		if(isset($_POST['themsp'])){
			if( $_POST['tensp'] == '' || $_FILES['anhsp']['name'] == '' || $_POST['masp']=="" || $_POST['nsxxx']=="" || $_POST['giasp']=="" || $_POST['trangthai']=="" || $_POST['khuyenmai']=="" || $_POST['chitietsp']=="" ) {
				$_SESSION['error'] = 'Vui lòng nhập đầy đủ các trường thông tin';
			}else {
				$tensp = $_POST['tensp'];
				$masp = $_POST['masp'];
				$nsx = $_POST['nsxxx'];
				$giasp = $_POST['giasp'];
				$trangthai = $_POST['trangthai'];
				$khuyenmai = $_POST['khuyenmai'];
				$chitiet = $_POST['chitietsp'];
                $theloai = $_POST['idtheloai'];
                $cate = $_POST['idcate'];
                $noibat = $_POST['noibat'];

                $name = time().'.'.$_FILES['anhsp']['name'];
                move_uploaded_file($_FILES['anhsp']['tmp_name'], '../public/upload/'. $name);
                $anhsp = 'http://localhost/shoppingcart/public/upload/'. $name;
				$add = "INSERT INTO sanpham (tensanpham,anhsp,masanpham,nhasanxuat,giasp,trangthai,khuyenmai,chitietsp,id_theloai,id_cate,noibat) values ('$tensp','$anhsp','$masp','$nsx','$giasp','$trangthai','$khuyenmai','$chitiet','$theloai','$cate','$noibat') ";
				$this->db->query($add);
				$_SESSION['sucsses'] = 'Đã thêm thành công';
				header('location:index.php?ac=sanpham&mt=list');
			}
		}
		require 'view/sanpham/add.php';
	}

	public function delete($pr) {
		if(!isset($_SESSION['login']) && !isset($_SESSION['auth'])){
			header('location:index.php?ac=login');
		}
		$delete = "DELETE FROM sanpham WHERE id='$pr' ";
		$this->db->query($delete); 
		$_SESSION['sucsses'] = 'Đã xóa thành công';
		header('location:index.php?ac=sanpham&mt=list');
	}

	public function edit($pr) {
		if(!isset($_SESSION['login']) && !isset($_SESSION['auth'])){
			header('location:index.php?ac=login');
		}
		$query = "SELECT * FROM sanpham WHERE id='$pr' LIMIT 1";
		$sanpham = $this->db->query($query);
		$sp = $sanpham->fetch_assoc();
		$id_cate = $sp['id_cate'];
        $tlquery = " SELECT * FROM theloai WHERE id_cate='$id_cate' ";
        $theloai = $this->db->query($tlquery);
        $catequery = "SELECT * FROM category";
        $cate = $this->db->query($catequery);
		if(isset($_POST['suasp'])) {
            if( $_POST['tensp'] == '' || $_POST['masp']=="" || $_POST['nsxxx']=="" || $_POST['giasp']=="" || $_POST['trangthai']=="" || $_POST['khuyenmai']=="" || $_POST['chitietsp']=="" ) {
                $_SESSION['error'] = 'Vui lòng nhập đầy đủ các trường thông tin';
            }else {
                $tensp = $_POST['tensp'];
                $masp = $_POST['masp'];
                $nsx = $_POST['nsxxx'];
                $giasp = $_POST['giasp'];
                $trangthai = $_POST['trangthai'];
                $khuyenmai = $_POST['khuyenmai'];
                $chitiet = $_POST['chitietsp'];
                $theloai = $_POST['idtheloai'];
                $cate = $_POST['idcate'];
                $noibat = $_POST['noibat'];

                if($_FILES['anhsp']['name'] != ''){
                    $name = time().'.'.$_FILES['anhsp']['name'];
                    move_uploaded_file($_FILES['anhsp']['tmp_name'], '../public/upload/'. $name);
                    $anhsp = 'http://localhost/shoppingcart/public/upload/'. $name;
                    $update = "UPDATE sanpham SET anhsp='$anhsp',tensanpham='$tensp',masanpham='$masp',nhasanxuat='$nsx',giasp='$giasp',trangthai='$trangthai',khuyenmai='$khuyenmai',chitietsp='$chitiet',noibat='$noibat',id_theloai ='$theloai',id_cate='$cate' WHERE id='$pr' ";
                }else {
                    $update = "UPDATE sanpham SET tensanpham='$tensp',masanpham='$masp',nhasanxuat='$nsx',giasp='$giasp',trangthai='$trangthai',khuyenmai='$khuyenmai',chitietsp='$chitiet',noibat='$noibat',id_theloai ='$theloai',id_cate='$cate' WHERE id='$pr' ";
                }
                $this->db->query($update);
                $_SESSION['sucsses'] = 'Đã sửa thành công';
                header('location:index.php?ac=sanpham&mt=list');
            }
		}	
		
		require 'view/sanpham/edit.php';
	}

	public function ajax() {
		$ajax = $_POST['number'];
		$tlquery = " SELECT * FROM theloai WHERE id_cate='$ajax' ";
		$theloai = $this->db->query($tlquery);
		foreach ($theloai as $tl) {
			echo '<option value="'.$tl["id"].'">'.$tl["tentheloai"].'</option>';
		}
	}
}