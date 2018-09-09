<?php
session_start();
include '../../config/koneksi.php';
include '../../models/m_database.php';
include '../../models/m_barang.php';
include '../../models/m_karyawan.php';
include '../../models/m_penjualan.php';

$db  = new Database($conn);
$brg = new Barang($db);
$kar = new Karyawan($db);
$pj = new Penjualan($db);

if (isset($_POST['btnTbh'])) 
{
	$Kdpj 	 = $db->konek->real_escape_string($_POST['kd_pj']);
	$barcode = $db->konek->real_escape_string($_POST['kd_barcode']);
	$tgl 	 = date('Y-m-d'); 
	$psn = '';

	$barang = $brg->tampilID($barcode);
	$res = $barang->fetch_object();

	$harga = $res->harga_jual;

	$jml = 1;
	$total = $jml * $harga;

	$barang2 = $brg->tampilID($barcode);
	while ($res2 = $barang2->fetch_object()) 
	{
		$sisa = $res2->stok;
		if ($sisa == 0) 
		{

			$psn = "<script>
						swal('Oops...', 'Stock Barang Habis !', 'error');
					</script>";

			header('location:../../index.php?hal=penjualan&q='.$Kdpj.'');
		}
		else
		{
			$data = array('id' => NULL, 
				'kd_penjualan' => $Kdpj,
				'kd_barcode' => $barcode,
				'jumlah' => $jml,
				'total' => $total,
				'tgl_penjualan' => $tgl,
				'nm_pelanggan' => 'ABC'
			);

			$pj->tambahPenjualan($data);
			header('location:../../index.php?hal=penjualan&q='.$Kdpj.'');
		}
	}

	$_SESSION['psn'] = $psn;
}
?>