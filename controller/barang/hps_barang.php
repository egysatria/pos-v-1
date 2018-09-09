<?php
header('Content-type: application/json; charset=UTF-8');
include '../../config/koneksi.php';
include '../../models/m_database.php';
include '../../models/m_barang.php';

$db  = new Database($conn);
$brg = new Barang($db);
$response = array();

$row = $brg->tampilBarang();
if ($_POST['delete']) 
{
 	$id = $_POST['delete'];

 	if ($brg->hapusBarang($id)) 
 	{
 		$response['status'] = 'success';
 		$response['message'] = 'Barang Berhasil di hapus ...';
 	}
 	else
 	{
 		$response['status'] = 'success';
 		$response['message'] = 'Barang Berhasil di hapus ...';
 	}

 	echo json_encode($response);
} 
?>