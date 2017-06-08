<?php

/**
* 
*/
require 'app/model/database.php';

class user extends database
{

	public function list()
	{
		if(!isset($_SESSION['login']) && !isset($_SESSION['auth'])){
			header('location:index.php?ac=login');
		}
		$userquery = " SELECT * FROM user";
		$user = $this->db->query($userquery);
		require 'view/thanhvien/list.php';
	}
	public function add(){
		if(!isset($_SESSION['login']) && !isset($_SESSION['auth'])){
			header('location:index.php?ac=login');
		}
		if(isset($_POST['themthanhvien'])){
			if( $_POST['user'] == '' || $_POST['pass']=="" || $_POST['repass']=="" || $_POST['email']="" ) {
				$_SESSION['error'] = 'Vui lòng nhập đầy đủ các trường thông tin';
			}else if($_POST['pass'] != $_POST['repass']) {
				$_SESSION['error'] = 'Nhập khẩu nhập lại không chính xác';
			}else {
				$user = $_POST['user'];
				$pass = $_POST['pass'];
				$email = $_POST['email'];
				$auth = $_POST['quyenhan'];
				$pass = md5($user.$pass);
				$add = "INSERT INTO user (username,password,email,auth) values ('$user','$pass','$email','$auth')";
				$this->db->query($add);
				$_SESSION['sucsses'] = 'Đã thêm thành công';
				header('location:index.php?ac=user&mt=list');
			}
		}
		require 'view/thanhvien/add.php';
	}

	public function delete($pr) {
		if(!isset($_SESSION['login']) && !isset($_SESSION['auth'])){
			header('location:index.php?ac=login');
		}
		$delete = "DELETE FROM user WHERE id='$pr' ";
		$this->db->query($delete); 
		$_SESSION['sucsses'] = 'Đã xóa thành công';
		header('location:index.php?ac=user&mt=list');
	}

	public function edit($pr) {
		if(!isset($_SESSION['login']) && !isset($_SESSION['auth'])){
			header('location:index.php?ac=login');
		}
		$query = "SELECT * FROM user WHERE id='$pr' LIMIT 1";
		$user = $this->db->query($query);
		$user = $user->fetch_assoc();
		if(isset($_POST['suatv'])) {
			if( $_POST['password'] == '' || $_POST['repassword']== '' || $_POST['email']== '' ) {
				$_SESSION['error'] = 'Vui lòng nhập đầy đủ các trường thông tin';
			}else if($_POST['password'] != $_POST['repassword']) {
				$_SESSION['error'] = 'Nhập khẩu nhập lại không chính xác';
			}else {
				$pass = md5($_POST['password']);
				$email = $_POST['email'];
				$auth = $_POST['quyenhan'];
				$update = "UPDATE user SET password='$pass',email ='$email',auth='$auth' WHERE id='$pr'";
				$this->db->query($update);
				$_SESSION['sucsses'] = 'Đã sửa thành công';
				header('location:index.php?ac=user&mt=list');
			}
		}	
		
		require 'view/thanhvien/edit.php';		
	}
}