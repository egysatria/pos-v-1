<?php
include '../../config/koneksi.php';
include '../../models/m_database.php';
include '../../models/m_pembelian.php';

$db  = new Database($conn);
$pb = new Pembelian($db);
if (isset($_POST['kdBarcode'])) 
{
	$kdBarcode 	= $_POST['kdBarcode'];
	$output 	= '';

	$tpl = $pb->cariBarang($kdBarcode);
	$output .= "<ul>";
	foreach ($tpl as $key) 
	{
		$output .= '<li>'.$key['kd_barcode'].'</li>';
	}

	$output .='</ul>';
}

echo json_encode($output);
?>