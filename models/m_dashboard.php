<?php
/**
* Dashboard
*/
class Dashboard 
{
	private $dash;

	function __construct($conn)
	{
		$this->dash = $conn;
	}

	public function Wiget($tgl)
	{
		$db 	= $this->dash->konek;
		$sql 	= "SELECT * FROM tb_penjualan, tb_barang WHERE tb_penjualan.kd_barcode=tb_barang.kd_barcode AND tgl_penjualan='$tgl'";
		$exc 	= $db->query($sql) or die ($db->error);
		$hsl 	= array();
		while ($row = $exc->fetch_assoc()) 
		{
			$hsl[] = $row;
		}

		return $hsl;
	}

	public function getPembelian($tgl)
	{
		$db 	= $this->dash->konek;
		$sql 	= "SELECT * FROM tb_pembelian WHERE tanggal_beli = '$tgl'";
		$exc 	= $db->query($sql) or die ($db->error);
		while ($row = $exc->fetch_assoc()) 
		{
			$tot_pem = $tot_pem + $row['total'];
		}

		echo $tot_pem;
	}

	public function jumBarang()
	{
		$db 	= $this->dash->konek;
		$sql 	= "SELECT * FROM tb_barang";
		$exc 	= $db->query($sql) or die ($db->error);
		$hit 	= $exc->num_rows;
		echo $hit;
	}
}
?>