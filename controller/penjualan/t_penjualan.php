<?php
session_start();
include '../../config/koneksi.php';
include '../../models/m_database.php';
include '../../models/m_penjualan.php';

$db  = new Database($conn);
$pj = new Penjualan($db);

if (isset($_GET['act'])) 
{
	$act = $_GET['act'];
	$id = $db->konek->real_escape_string($_GET['id']);
	$kode_pj = $db->konek->real_escape_string($_GET['kode_pj']);
	$harga_j = $db->konek->real_escape_string($_GET['harga_j']);
	$kode_b = $db->konek->real_escape_string($_GET['kode_b']);

	if ($act == "tambah") 
	{
		$jml = $pj->updateJumlah($id,$act);
		$tot = $pj->updateTotal($id, $harga_j, $act);
		$stk = $pj->updateStock($kode_b, $act);

		?>
			<script type="text/javascript">
				window.location.href="../../index.php?hal=penjualan&q=<?php echo $kode_pj; ?>";
			</script>
		<?php
	}
	elseif ($act == "kurang") 
	{
		$jml = $pj->updateJumlah($id,$act);
		$tot = $pj->updateTotal($id, $harga_j, $act);
		$stk = $pj->updateStock($kode_b, $act);

		?>
			<script type="text/javascript">
				window.location.href="../../index.php?hal=penjualan&q=<?php echo $kode_pj; ?>";
			</script>
		<?php
	}
}
?>