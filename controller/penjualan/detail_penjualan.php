<?php
include '../../config/koneksi.php';
include '../../models/m_database.php';
include '../../models/m_penjualan.php';

$db  = new Database($conn);
$pj = new Penjualan($db);

if (isset($_POST['detail'])) 
{
	$detail = $_POST['detail'];
	$output = '';
	$output .='
	<h4><center>~~ Detail Penjualan ~~</center></h4>
		<div class="divider"></div><br/>
		<table class="responsive-table striped"';
	$tpl = $pj->tampilDetail($detail);
	$res = $tpl->fetch_object();
	$output .="<tr>
					<td>Kode Penjualan</td>
					<td>: ".$res->kd_penjualan."</td>
				</tr>
				<tr>
					<td>Bayar </td>
					<td>: Rp. ".number_format($res->bayar, 2, ",", ".")."</td>
				</tr>
				<tr>
					<td>Kembali</td>
					<td>: Rp. ".number_format($res->kembali, 2, ",", ".")."</td>
				</tr>
				<tr>
					<td>Diskon</td>
					<td>: ".$res->diskon."%</td>
				</tr>
				<tr>
					<td>Potongan Diskon</td>
					<td>: Rp. ".number_format($res->potongan, 2, ",", ".")."</td>
				</tr>
				<tr>
					<td>Sub Total</td>
					<td>: Rp. ".number_format($res->total, 2, ",", ".")."</td>
				</tr>"; 
	$output .='</table>';
    echo json_encode($output);
}
?>