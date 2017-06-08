<?php 
require 'app/model/database.php';
/**
* 
*/
class category extends database
{
	
	public function list() {
		if(!isset($_SESSION['login']) && !isset($_SESSION['auth'])){
			header('location:index.php?ac=login');
		}
		$query = " SELECT * FROM category";
		$cate = $this->db->query($query);
		require 'view/category/list.php';
	}

	public function add() {
		if(!isset($_SESSION['login']) && !isset($_SESSION['auth'])){
			header('location:index.php?ac=login');
		}
		if(isset($_POST['themdanhmuc'])){
			if( $_POST['catename'] == '' ) {
				$_SESSION['error'] = 'Vui lòng nhập đầy đủ các trường thông tin';
			}else {
				$catename = $_POST['catename'];
				$add = "INSERT INTO category (cate_name) values ('$catename')";
				$this->db->query($add);
				$_SESSION['sucsses'] = 'Đã thêm thành công';
				header('location:index.php?ac=category&mt=list');
			}
		}
		require 'view/category/add.php';
	}

	public function delete($pr) {
		if(!isset($_SESSION['login']) && !isset($_SESSION['auth'])){
			header('location:index.php?ac=login');
		}
		$delete = "DELETE FROM category WHERE id='$pr' ";
		$this->db->query($delete); 
		$_SESSION['sucsses'] = 'Đã xóa thành công';
		header('location:index.php?ac=category&mt=list');
	}

	public function edit($pr) {
		if(!isset($_SESSION['login']) && !isset($_SESSION['auth'])){
			header('location:index.php?ac=login');
		}
		$query = "SELECT * FROM category WHERE id='$pr' LIMIT 1";
		$cate = $this->db->query($query);
		$cate = $cate->fetch_assoc();
		if(isset($_POST['suadm'])) {
			if( $_POST['catename'] == '' ) {
				$_SESSION['error'] = 'Vui lòng nhập đầy đủ các trường thông tin';
			}else {
				$catename = $_POST['catename'];;
				$update = "UPDATE category SET cate_name='$catename' WHERE id='$pr'";
				$this->db->query($update);
				$_SESSION['sucsses'] = 'Đã sửa thành công';
				header('location:index.php?ac=category&mt=list');
			}
		}	
		
		require 'view/category/edit.php';		
	}
}