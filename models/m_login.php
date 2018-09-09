<?php
/**
* Class Login create by Egy Satria Hantoro
*/
class Login
{
	private $log;
	
	function __construct($conn)
	{
		$this->log = $conn;
	}

	public function cekLogin($user, $pass)
	{
		$db 	= $this->log->konek;
		$pw		= md5($pass);
		$sql 	= "SELECT * FROM tb_karyawan WHERE username = '$user' AND password='$pw'";
		$exc 	= $db->query($sql) or die ($db->error);
		$data 	= mysqli_fetch_array($exc);
		if(mysqli_num_rows($exc) == 1)
		{
			$_SESSION['login'] 	= TRUE;
			$_SESSION['id'] 	= $data['kd_karyawan'];
			return TRUE; 
		}
		else
		{
			return FALSE;
		}
	}

	public function isLogin()
	{
		return $_SESSION['login'];
	}

	public function getData($id)
	{
		$db 	= $this->log->konek;
		$sql 	= "SELECT * FROM tb_karyawan WHERE kd_karyawan = '$id'";
		$exc 	= $db->query($sql) or die ($db->error);
		$res 	= mysqli_fetch_array($exc);
		return $res;
	}
}
?>