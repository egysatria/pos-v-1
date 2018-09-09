<?php
include '../../config/koneksi.php';
include '../../models/m_database.php';
include '../../models/m_pembelian.php';

$db  = new Database($conn);
$pb = new Pembelian($db);

if(isset($_POST['btnStruck']))
{
	$kdPbl	 = $db->konek->real_escape_string($_POST['kode_p']);
	$total 	 = $db->konek->real_escape_string($_POST['totalBayar']);
	$bayar 	 = $db->konek->real_escape_string($_POST['bayar']);
	$kembali = $db->konek->real_escape_string($_POST['kembali']);
	$tgl_PB  = date('d F Y');

	if($kdPbl)
	{
		$data = array('kd_pembelian' => $kdPbl,
					  'total' => $total,
					  'bayar' => $bayar,
					  'kembali' => $kembali,
					  'tgl_pembelian' => $tgl_PB
		);

		$pb->tambahDetailPB($data);
		header('location:../../index.php?hal=pembelian&q='.$kdPbl.'');
	}
}
?>