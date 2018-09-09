<?php
/**
* Class Pembelian
*/
class Pembelian
{

	private $pbl;
	
	function __construct($conn)
	{
		$this->pbl = $conn;
	}

	public function cariBarang($kdBarcode)
	{
		$db 	= $this->pbl->konek;
		$sql 	= "SELECT * FROM tb_barang WHERE nm_barang LIKE '%".$kdBarcode."%'";
		$exc	= $db->query($sql) or die($db->error);
		$hsl 	= array();
		if(mysqli_num_rows($exc) > 0)
		{
			while ($row = $exc->fetch_assoc()) 
			{
				$hsl[] = $row; 
			}
		}

		return $hsl;
	}

	public function tambahPembelian($data, $jum, $kd_br)
	{
		$db 	= $this->pbl->konek;
		$sql 	= "INSERT INTO tb_pembelian (";
		foreach ($data as $key => $value) 
		{
			$sql .= $key.", ";
		}
		$sql = substr($sql, 0, -2).") VALUES (";
		foreach ($data as $key => $value) 
		{
			$sql .= "'$value', ";
		}
		$sql = substr($sql, 0, -2).")";
		$exc	= $db->query($sql) or die($db->error);
		if($exc)
		{
			$sql1 = "UPDATE tb_barang SET stok=(stok+$jum) WHERE kd_barcode = '$kd_br'";
			$exc	= $db->query($sql1) or die($db->error);
		}
	}

	public function getPembelian($kd_pb)
	{
		$db 	= $this->pbl->konek;
		$sql 	= "SELECT * FROM tb_pembelian, tb_barang WHERE tb_pembelian.kd_barcode=tb_barang.kd_barcode AND kd_pembelian ='$kd_pb'";
		$exc 	= $db->query($sql) or die($db->error);
		$hsl 	= array();
		while ($row = $exc->fetch_assoc()) 
		{
			$hsl[] = $row;
		}

		return $hsl;
	}

	public function tambahDetailPB($data)
	{
		$db 	= $this->pbl->konek;
		$sql 	= "INSERT INTO detail_pembelian (";
		foreach ($data as $key => $value) 
		{
			$sql .= $key.", ";
		}
		$sql = substr($sql, 0, -2).") VALUES (";
		foreach ($data as $key => $value) 
		{
			$sql .= "'$value', ";
		}
		$sql = substr($sql, 0, -2).")";

		$exc 	= $db->query($sql) or die($db->error);
		
	}

	public function getStruck($kdPB)
	{
		$db 	= $this->pbl->konek;
		$sql 	= "SELECT * FROM tb_pembelian, detail_pembelian, tb_barang WHERE tb_pembelian.kd_pembelian=detail_pembelian.kd_pembelian AND tb_pembelian.kd_barcode=tb_barang.kd_barcode AND tb_pembelian.kd_pembelian='$kdPB'";
		$exc 	= $db->query($sql) or die($db->error);
		$hsl 	= array();
		while ($row = $exc->fetch_assoc()) 
		{
			$hsl[] = $row;
		}
		return $hsl;
	}

	public function deletePembelian($id)
	{
		$db 	= $this->pbl->konek;
		$sql 	= "DELETE FROM tb_pembelian WHERE id = '$id'";
		$exc 	= $db->query($sql) or die($db->error);
	}

	public function updateStock($kd_br, $jum)
	{
		$db 	= $this->pbl->konek;
		$sql 	= "UPDATE tb_barang SET stok=(stok-$jum) WHERE kd_barcode='$kd_br'";
		$exc 	= $db->query($sql) or die($db->error);
	}
}
?>