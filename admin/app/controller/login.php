<?php
require 'app/model/database.php';

/**
* 
*/
class login extends database
{
	public function index() 
	{	
		if(isset($_POST['username']) && isset($_POST['password']))
		{
			$user = $_POST['username'];
			$pass = $_POST['password'];
			$pass = md5($pass);
			$query = "SELECT * FROM user WHERE username='$user' AND password='$pass' LIMIT 1";
			$results = $this->db->query($query);
			$rows = $results->fetch_assoc();
			if($rows != '')
			{
				$_SESSION['login'] = $rows['username'];
				$_SESSION['auth'] = $rows['auth'];
				header('location:index.php');
			}
			
		}
		require 'view/login.php';
	}

	public function logout() {
		session_destroy();
		header('location:index.php?ac=login');
	}
}