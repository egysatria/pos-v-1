<?php
/**
* Class Penjualan create by Egy Satria Hantoro
*/
class Penjualan
{
	private $pj;

	function __construct($conn)
	{
		$this->pj = $conn;
	}

	public function tampilPenjualan()
	{
		$db 	= $this->pj->konek;
		$sql 	= "SELECT * FROM tb_penjualan ORDER BY tgl_penjualan DESC";
		$exc 	= $db->query($sql) or die($db->error);
		$hsl 	= array();
		while ($row = $exc->fetch_assoc()) 
		{
			$hsl[] = $row;
		}

		return $hsl;
	}

	public function tampilDetail($detail = NULL)
	{
		$db 	= $this->pj->konek;
		$sql 	= "SELECT * FROM detail_penjualan";
		if($detail)
		{
			$sql .=" WHERE kd_penjualan = '$detail'";
		}
		$exc 	= $db->query($sql) or die($db->error);
		return $exc;
	}

	public function tambahPenjualan($data)
	{
		$db 	= $this->pj->konek;
		$sql 	= "INSERT INTO tb_penjualan (";
		foreach ($data as $c => $n) 
		{
			$sql .= $c.", ";
		}
		$sql = substr($sql, 0, -2).") VALUES (";
		foreach ($data as $c => $n) 
		{
			$sql .="'$n', ";
		}
		$sql = substr($sql, 0, -2).")";

		$exc = $db->query($sql) or die($db->error);
	}

	public function getPenjualan($kode = NULL)
	{
		$db 	= $this->pj->konek;
		$sql 	= "SELECT * FROM tb_penjualan, tb_barang WHERE tb_penjualan.kd_barcode=tb_barang.kd_barcode";
		if($kode)
		{
			$sql .=" AND kd_penjualan='$kode'";
		}

		$exc 	= $db->query($sql) or die($db->error);
		$hsl 	= array();
		while ($row = $exc->fetch_assoc()) 
		{
			$hsl[] = $row;
		}

		return $hsl;
	}

	public function tambahDetailPJ($data)
	{
		$db 	= $this->pj->konek;
		$sql 	= "INSERT INTO detail_penjualan (";
		foreach ($data as $f => $v) 
		{
			$sql .= $f.", ";
		}
		$sql = substr($sql, 0, -2).") VALUES (";
		foreach ($data as $k => $v) 
		{
			$sql .="'$v', ";
		}
		$sql = substr($sql, 0, -2).")";
		$exc 	= $db->query($sql) or die($db->error);
	}

	public function getStruk($kode)
	{
		$db 	= $this->pj->konek;
		$sql 	= "SELECT * FROM tb_penjualan, detail_penjualan, tb_barang WHERE tb_penjualan.kd_penjualan=detail_penjualan.kd_penjualan AND tb_penjualan.kd_barcode=tb_barang.kd_barcode AND tb_penjualan.kd_penjualan='$kode'";
		$exc 	= $db->query($sql) or die($db->error);
		$hsl 	= array();
		while ($row = $exc->fetch_assoc()) 
		{
			$hsl[] = $row;
		}

		return $hsl;
	}

	public function updateJumlah($id, $act)
	{
		$db 	= $this->pj->konek;

		if($act == 'tambah')
		{
			$sql 	= "UPDATE tb_penjualan SET jumlah=(jumlah+1) WHERE id='$id'";
			$exc 	= $db->query($sql) or die($db->error);
		}
		elseif($act == "kurang")
		{
			$sql 	= "UPDATE tb_penjualan SET jumlah=(jumlah-1) WHERE id='$id'";
			$exc 	= $db->query($sql) or die($db->error);
		}
		
	}

	public function updateTotal($id, $harga_j, $act)
	{
		$db 	= $this->pj->konek;
		if($act == "tambah")
		{
			$sql 	= "UPDATE tb_penjualan SET total=(total+$harga_j) WHERE id='$id'";
			$exc 	= $db->query($sql) or die($db->error);
		}
		elseif($act == "kurang")
		{
			$sql 	= "UPDATE tb_penjualan SET total=(total-$harga_j) WHERE id='$id'";
			$exc 	= $db->query($sql) or die($db->error);
		}
	}

	public function updateStock($id, $act)
	{
		$db 	= $this->pj->konek;
		if($act == "tambah")
		{
			$sql 	= "UPDATE tb_barang SET stok=(stok-1) WHERE kd_barcode='$id'";
			$exc 	= $db->query($sql) or die($db->error);
		}
		elseif($act == "kurang")
		{
			$sql 	= "UPDATE tb_barang SET stok=(stok+1) WHERE kd_barcode='$id'";
			$exc 	= $db->query($sql) or die($db->error);
		}
		
	}

	public function hapusPenjualan($id)
	{
		$db 	= $this->pj->konek;
		$sql 	= "DELETE FROM tb_penjualan WHERE id = '$id'";
		$exc 	= $db->query($sql) or die($db->error);
	}

	public function deleteStock($kode_b, $jum)
	{
		$db 	= $this->pj->konek;
		$sql 	= "UPDATE tb_barang SET stok=(stok+$jum) WHERE kd_barcode='$kode_b'";
		$exc 	= $db->query($sql) or die($db->error);
	}

	public function lapTanggal($tgl1, $tgl2)
	{
		$db 	= $this->pj->konek;
		$sql 	= "SELECT * FROM tb_penjualan, tb_barang WHERE tb_penjualan.kd_barcode=tb_barang.kd_barcode AND tgl_penjualan BETWEEN '$tgl1' AND '$tgl2'";
		$exc 	= $db->query($sql) or die($db->error);
		$hsl 	= array();
		while ($row = $exc->fetch_assoc()) 
		{
			$hsl[] = $row;
		}
		return $hsl;
	}
}
?>