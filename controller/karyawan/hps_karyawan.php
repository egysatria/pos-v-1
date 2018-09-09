<?php
header('Content-type: application/json; charset=UTF-8');
include '../../config/koneksi.php';
include '../../models/m_database.php';
include '../../models/m_karyawan.php';

$db  = new Database($conn);
$kar = new Karyawan($db);
$response = array();

if ($_POST['delete']) 
{
	$id = $_POST['delete'];

	$tpl = $kar->tampilID($id);
	$res = $tpl->fetch_object();
	$ft  = $res->foto;
	unlink('../../assets/images/karyawan/'.$ft);
	
	if($kar->hapusKaryawan($id))
	{
 		$response['status'] = 'success';
 		$response['message'] = 'Karyawan Berhasil di hapus ...';
 	}
 	else
 	{
 		$response['status'] = 'success';
 		$response['message'] = 'Karyawan Berhasil di hapus ...';
 	}

 	echo json_encode($response);
}
?>