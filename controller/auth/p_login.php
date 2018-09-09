<?php
session_start();

if(isset($_POST['btnLogin']))
{
	include '../../config/koneksi.php';
	include '../../models/m_database.php';
	include '../../models/m_login.php';

	$db  = new Database($conn);
	$log = new Login($db);

	$user = $db->konek->real_escape_string($_POST['username']);
	$pass = $db->konek->real_escape_string($_POST['password']);
	$pesan = '';

	$cek  = $log->cekLogin($user, $pass);

	if ($cek) 
	{
		?>
		<script type="text/javascript">
			window.location.href="../../index.php?hal=dashboard";
		</script>
		<?php
	}
	else
	{
		?>
			<script type="text/javascript">
				alert('Maaf Gagal Login !');
				window.location.href="../../auth/login.php";
			</script>
		<?php
	}
}
?>