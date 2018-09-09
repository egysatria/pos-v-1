<?php
include '../../config/koneksi.php';
include '../../models/m_database.php';
include '../../models/m_pembelian.php';

$db  = new Database($conn);
$pb = new Pembelian($db);

if($_GET['jum'])
{
	$id = $db->konek->real_escape_string($_GET['id']);
	$kd_pb = $db->konek->real_escape_string($_GET['kd_pb']);
	$harga_b = $db->konek->real_escape_string($_GET['harga_b']);
	$kode_b = $db->konek->real_escape_string($_GET['kode_b']);
	$jum = $db->konek->real_escape_string($_GET['jum']);

	if($_GET['act'] == "delete")
	{
		$pb->deletePembelian($id);
		$pb->updateStock($kode_b, $jum);

		header('location:../../index.php?hal=pembelian&q='.$kd_pb.'');
	}
}

?>