<?php
session_start();
include '../../config/koneksi.php';
include '../../models/m_database.php';
include '../../models/m_barang.php';

$db  = new Database($conn);
$brg = new Barang($db);

if (isset($_POST['btnTambah'])) 
{
	$kd_barcode = $db->konek->real_escape_string($_POST['kd_barcode']);
	$nm_barang = $db->konek->real_escape_string($_POST['nm_barang']);
	$satuan = $db->konek->real_escape_string($_POST['satuan']);
	$harga_beli = $db->konek->real_escape_string($_POST['harga_beli']);
	$stok = $db->konek->real_escape_string($_POST['stok']);
	$harga_jual = $db->konek->real_escape_string($_POST['harga_jual']);
	$profit = $db->konek->real_escape_string($_POST['profit']);
	$pesan = '';

	$data = array('kd_barcode' => $kd_barcode, 
				 'nm_barang' => $nm_barang,
				 'satuan' => $satuan,
				 'harga_beli' => $harga_beli,
				 'stok' => $stok,
				 'harga_jual' => $harga_jual,
				 'profit' => $profit
				 );

	if($data)
	{
		$brg->inputBarang($data);
		$pesan = "sukses";

		header('location:../../index.php?hal=barang');
	}
	else
	{
		?>
			<script type="text/javascript">
				alert('Data Gagal di Inputkan !!');
				window.location.href = '../../index.php?hal=barang';
			</script>
		<?php
	}

	$_SESSION['pesan'] = $pesan;
}
?>