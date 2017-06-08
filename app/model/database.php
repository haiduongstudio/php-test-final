<?php
/**
* 
*/
class database
{
	public $db;
	const HOSTNAME = "localhost"; 
    const USERNAME = "root"; 
    const PASSWORD = ""; 
    const DATABASE = "web-ban-hang";
	public function __construct() 
	{
		$connect = new mysqli(self::HOSTNAME,self::USERNAME,self::PASSWORD,self::DATABASE);
		if($connect->errno !== 0)
		{
		    die("Error: Could not connect to the database. An error ".$connect->error." ocurred.");
		}
		$connect->set_charset('utf8');
		$this->db = &$connect;
	}
}