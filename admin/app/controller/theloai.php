<?php 
require 'app/model/database.php';
/**
* 
*/
class theloai extends database
{
	
	public function list() {
		if(!isset($_SESSION['login']) && !isset($_SESSION['auth'])){
			header('location:index.php?ac=login');
		}
		$query = " SELECT * FROM theloai";
		$theloai = $this->db->query($query);
		require 'view/theloai/list.php';
	}

	public function add() {
		if(!isset($_SESSION['login']) && !isset($_SESSION['auth'])){
			header('location:index.php?ac=login');
		}
		$catequery = "SELECT * FROM category";
        $category = $this->db->query($catequery);
		if(isset($_POST['themtl'])){
			if( $_POST['tentheloai'] == '' ) {
				$_SESSION['error'] = 'Vui lòng nhập đầy đủ các trường thông tin';
			}else {
				$tentheloai = $_POST['tentheloai'];
				$idcate = $_POST['idcate'];
				$add = "INSERT INTO theloai (tentheloai,id_cate) values ('$tentheloai','$idcate')";
				$this->db->query($add);
				$_SESSION['sucsses'] = 'Đã thêm thành công';
				header('location:index.php?ac=theloai&mt=list');
			}
		}
		require 'view/theloai/add.php';
	}

	public function delete($pr) {
		if(!isset($_SESSION['login']) && !isset($_SESSION['auth'])){
			header('location:index.php?ac=login');
		}
		$delete = "DELETE FROM theloai WHERE id='$pr' ";
		$this->db->query($delete); 
		$_SESSION['sucsses'] = 'Đã xóa thành công';
		header('location:index.php?ac=theloai&mt=list');
	}

	public function edit($pr) {
		if(!isset($_SESSION['login']) && !isset($_SESSION['auth'])){
			header('location:index.php?ac=login');
		}
		$query = "SELECT * FROM theloai WHERE id='$pr' LIMIT 1";
		$theloai = $this->db->query($query);
		$theloai = $theloai->fetch_assoc();
		$catequery = "SELECT * FROM category";
        $category = $this->db->query($catequery);
		
		if(isset($_POST['suatl'])) {
			if( $_POST['tentheloai'] == '' ) {
				$_SESSION['error'] = 'Vui lòng nhập đầy đủ các trường thông tin';
			}else {
				$tentheloai = $_POST['tentheloai'];
				$idcate = $_POST['idcate'];
				$update = "UPDATE theloai SET tentheloai='$tentheloai',id_cate='$idcate' WHERE id='$pr'";
				$this->db->query($update);
				$_SESSION['sucsses'] = 'Đã sửa thành công';
				header('location:index.php?ac=theloai&mt=list');
			}
		}	
		
		require 'view/theloai/edit.php';		
	}
}