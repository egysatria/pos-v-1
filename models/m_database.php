<?php
/**
* Class Database
*/
class Database
{
	private $host;
	private $user;
	private $pass;
	private $dbnm;
	public $konek;
	
	function __construct($data)
	{
		$h = $this->host = $data['host'];
		$u = $this->user = $data['user'];
		$p = $this->pass = $data['pass'];
		$d = $this->dbnm = $data['dbnm'];

		$this->konek = new mysqli($h, $u, $p, $d) or die(mysqli_error());

		if(!$this->konek)
		{
			echo "Gagal Koneksi";
		}
	}
}
?>