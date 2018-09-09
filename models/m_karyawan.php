<?php
/**
* Class Karyawan create by Egy Satria Hantoro
*/
class Karyawan
{
	private $kar;

	function __construct($conn)
	{
		$this->kar = $conn;
	}

	public function tampilKaryawan()
	{
		$db 	= $this->kar->konek;
		$sql 	= "SELECT * FROM tb_karyawan ORDER BY kd_karyawan ASC";
		$exc 	= $db->query($sql) or die ($db->error);
		$res 	= array();
		while ($row = $exc->fetch_assoc()) 
		{
			$res[] = $row;
		}
		return $res;
	}

	public function tampilID($id)
	{
		$db 	= $this->kar->konek;
		$sql 	= "SELECT * FROM tb_karyawan WHERE kd_karyawan ='$id'";
		$exc 	= $db->query($sql) or die ($db->error);
		return $exc;
	}

	public function kodeKaryawan()
	{
		$db 	= $this->kar->konek;
		$sql	= $db->query("SELECT kd_karyawan FROM tb_karyawan");
		$kode 	= mysqli_fetch_array($sql);
		$htng 	= mysqli_num_rows($sql);
		if ($kode) 
		{
			$n 		= substr($htng[0], 1);
			$code 	= (int) $nilai;
			$code 	= $htng + 1;
			$kd_oto = "KR-".str_pad($code, 4, "0", STR_PAD_LEFT);
		}
		else
		{
			$kd_oto = "KR-0001";
		}

		echo $kd_oto;
	}

	public function tambahKaryawan($data)
	{
		$db 	= $this->kar->konek;
		$sql 	= "INSERT INTO tb_karyawan (";
		foreach ($data as $field => $value) 
		{
			$sql .= $field.", ";
		}
		$sql = substr($sql, 0, -2).") VALUES (";
		foreach ($data as $key => $value) 
		{
			$sql .= "'$value', ";
		}
		$sql = substr($sql, 0, -2).")";

		$exc 	= $db->query($sql) or die ($db->error);
	}

	public function hapusKaryawan($id)
	{
		$db 	= $this->kar->konek;
		$sql 	= "DELETE FROM tb_karyawan WHERE kd_karyawan = '$id'";
		$exc 	= $db->query($sql) or die ($db->error);
	}

	public function ubahKaryawan($data1, $kondisi)
	{
		$db 	= $this->kar->konek;
		if ($data1) 
		{
			$sql = "UPDATE tb_karyawan SET ";
			foreach ($data1 as $field => $value) 
			{
				$sql .= $field." = "."'$value', ";
			}
			$sql = substr($sql, 0, -2)." ".$kondisi;
		}

		$exc 	= $db->query($sql) or die ($db->error);
	}

	public function ubahGambar($data2, $kondisi)
	{
		$db 	= $this->kar->konek;
		if ($data2) 
		{
			$sql = "UPDATE tb_karyawan SET ";
			foreach ($data2 as $field => $value) 
			{
				$sql .= $field." = "."'$value', ";
			}
			$sql = substr($sql, 0, -2)." ".$kondisi;
		}

		$exc 	= $db->query($sql) or die ($db->error);
	}
}
?>
