<?php
/**
* Class Barang create by Egy Satria Hantoro
*/
class Barang
{
	
	private $brg;

	function __construct($conn)
	{
		$this->brg = $conn;
	}

	public function tampilBarang()
	{
		$db 	= $this->brg->konek;
		$sql 	= "SELECT * FROM tb_barang ORDER BY kd_barcode ASC";
		$exc 	= $db->query($sql) or die($db->error);
		$hsl 	= array();
		while ($row = $exc->fetch_assoc()) 
		{
			$hsl[] = $row;
		}

		return $hsl;
	}

	public function kdBarcode()
	{
		$db 	= $this->brg->konek;
		$sql 	= $db->query("SELECT kd_barcode FROM tb_barang");
		$kode 	= mysqli_fetch_array($sql);
		$htng 	= mysqli_num_rows($sql);
		if($kode)
		{
			$nilai  = substr($htng[0], 1);
			$code   = (int) $nilai;
			$code   = $htng + 1;
			$kd_oto = "BR-".str_pad($code,4,"0", STR_PAD_LEFT);
		}
		else
		{
			$kd_oto = "BR-0001";
		}

		echo $kd_oto;
	}

	public function inputBarang($data)
	{
		$db 	= $this->brg->konek;
		$sql 	= "INSERT INTO tb_barang (";
		foreach ($data as $field => $value) 
		{
			$sql .= $field.", ";
		}
		$sql 	= substr($sql, 0, -2).") VALUES (";
		foreach ($data as $field => $value) 
		{
			$sql .= "'$value', ";
		}
		$sql 	= substr($sql, 0, -2).")";

		$exc 	= $db->query($sql) or die ($db->error());
	}

	public function hapusBarang($id)
	{
		$db 	= $this->brg->konek;
		$sql 	= "DELETE FROM tb_barang WHERE kd_barcode = '$id'";
		$exc 	= $db->query($sql) or die($db->error); 
	}

	public function tampilID($id)
	{
		$db 	= $this->brg->konek;
		$sql 	= "SELECT * FROM tb_barang WHERE kd_barcode = '$id'";
		$exc 	= $db->query($sql) or die ($db->error);
		return $exc;
	}

	public function ubahBarang($data, $kondisi)
	{
		$db 	= $this->brg->konek;
		$sql 	= "UPDATE tb_barang SET ";
		foreach ($data as $field => $value) 
		{
			$sql .= $field." = "."'$value', ";
		}
		$sql = substr($sql, 0, -2)." ".$kondisi;
		$exc = $db->query($sql) or die($db->error);
	}
}
?>