<?php
session_start();
include '../../config/koneksi.php';
include '../../models/m_database.php';
include '../../models/m_penjualan.php';

$db  = new Database($conn);
$pj = new Penjualan($db);

if(isset($_POST['btnStruck']))
{
	$kd_jual = $db->konek->real_escape_string($_POST['kd_jual']);
	$diskon = $db->konek->real_escape_string($_POST['diskon']);
	$potongan_diskon = $db->konek->real_escape_string($_POST['potongan_diskon']);
	$s_total = $db->konek->real_escape_string($_POST['s_total']);
	$bayar = $db->konek->real_escape_string($_POST['bayar']);
	$kembali = $db->konek->real_escape_string($_POST['kembali']);

	if ($kd_jual) 
	{
		$data = array('kd_penjualan' => $kd_jual, 
				'bayar' => $bayar,
				'kembali' => $kembali,
				'diskon' => $diskon,
				'potongan' => $potongan_diskon,
				'total' => $s_total
		);

		$pj->tambahDetailPJ($data);

		header('location:../../index.php?hal=penjualan&q='.$kd_jual.'');
	}

}
?>