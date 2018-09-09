<?php
include '../../config/koneksi.php';
include '../../models/m_database.php';
include '../../models/m_barang.php';
include '../../models/m_pembelian.php';

$db  = new Database($conn);
$brg = new Barang($db);
$pb = new Pembelian($db);

if(isset($_POST['btnTbh']))
{
	$kdPB = $db->konek->real_escape_string($_POST['kd_pb']);
	$kdBr = $db->konek->real_escape_string($_POST['kd_barcode']);
	$nmSu = $db->konek->real_escape_string($_POST['nm_suplier']);
	$jum  = $db->konek->real_escape_string($_POST['jumlah']);
	$tgl  = date('d F Y');
	$psn = '';

	$barang = $brg->tampilID($kdBr);
	$res 	= $barang->fetch_object();

	$hrg_beli = $res->harga_beli;
	$total 	  = $jum * $hrg_beli;

	if($kdPB)
	{
		$data = array('id' => NULL, 
					  'kd_pembelian' => $kdPB,
					  'nama_suplier' => $nmSu,
					  'kd_barcode' => $kdBr,
					  'jumlah' => $jum,
					  'harga_beli' => $hrg_beli,
					  'total' => $total,
					  'tanggal_beli' => $tgl
		);

		$pb->tambahPembelian($data, $jum, $kdBr);
		header('location:../../index.php?hal=pembelian&q='.$kdPB.'');
	} 
}
?>