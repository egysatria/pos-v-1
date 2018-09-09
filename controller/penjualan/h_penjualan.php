<?php
session_start();
include '../../config/koneksi.php';
include '../../models/m_database.php';
include '../../models/m_penjualan.php';

$db  = new Database($conn);
$pj = new Penjualan($db);

if ($_GET['jum']) 
{
	$act = $_GET['act'];
	$id = $db->konek->real_escape_string($_GET['id']);
	$kode_pj = $db->konek->real_escape_string($_GET['kode_pj']);
	$harga_j = $db->konek->real_escape_string($_GET['harga_j']);
	$kode_b = $db->konek->real_escape_string($_GET['kode_b']);
	$jum = $db->konek->real_escape_string($_GET['jum']);

	if($act == "hapus")
	{
		$pj->hapusPenjualan($id);
		$pj->deleteStock($kode_b, $jum);

		?>
			<script type="text/javascript">
				window.location.href="../../index.php?hal=penjualan&q=<?php echo $kode_pj; ?>";
			</script>
		<?php
	}
}
?>