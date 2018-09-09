<?php
session_start();
include '../../config/koneksi.php';
include '../../models/m_database.php';
include '../../models/m_karyawan.php';

$db  = new Database($conn);
$kar = new Karyawan($db);

if (isset($_POST['btnUbah'])) 
{
	$kd_karyawan = $db->konek->real_escape_string($_POST['kd_karyawan']);
	$nama_karyawan = $db->konek->real_escape_string($_POST['nama_karyawan']);
	$tgl_lahir = $db->konek->real_escape_string($_POST['tgl_lahir']);
	$alamat = $db->konek->real_escape_string($_POST['alamat']);
	$no_telp = $db->konek->real_escape_string($_POST['no_telp']);
	$jk = $db->konek->real_escape_string($_POST['jk']);
	$jabatan = $db->konek->real_escape_string($_POST['jabatan']);
	$email = $db->konek->real_escape_string($_POST['email']);
	$username = $db->konek->real_escape_string($_POST['username']);
	$password = $db->konek->real_escape_string($_POST['password']);
	$pass = md5($password);

	$pesan = '';

	$pct = $_FILES['foto']['name'];
	$ex = explode(".", $_FILES['foto']['name']);
    $ft = "foto -".round(microtime(true)).".".end($ex);
    $sumber = $_FILES['foto']['tmp_name'];

    if($pct == "")
    {
    	$kondisi = "WHERE kd_karyawan = '$kd_karyawan'";
    	$data1 = array('kd_karyawan' => $kd_karyawan,
    				  'nama_karyawan' => $nama_karyawan,
    				  'tgl_lahir' => $tgl_lahir,
    				  'alamat' => $alamat,
    				  'no_telp' => $no_telp,
    				  'jk' => $jk,
    				  'jabatan' => $jabatan,
    				  'email' => $email,
    				  'username' => $username,
    				  'password' => $pass
    	);

    	$kar->ubahKaryawan($data1, $kondisi);
    	$pesan = " <script>
						swal(
			                {
			                    title: 'Selamat !',
			                    text: 'Data berhasil di Ubah ...',
			                    type: 'success',
			                    timer: 1500
			                }
			            )
					</script>";

		header('location:../../index.php?hal=karyawan');
    }
    else
    {
    	$tpl = $kar->tampilID($kd_karyawan);
		$res = $tpl->fetch_object();
		$ftl = $res->foto;
		unlink('../../assets/images/karyawan/'.$ftl);

		$simpan = move_uploaded_file($sumber, "../../assets/images/karyawan/".$ft);
		$kondisi = "WHERE kd_karyawan = '$kd_karyawan'";

		if($simpan)
		{
	    	$data2 = array('kd_karyawan' => $kd_karyawan,
	    				  'nama_karyawan' => $nama_karyawan,
	    				  'tgl_lahir' => $tgl_lahir,
	    				  'alamat' => $alamat,
	    				  'no_telp' => $no_telp,
	    				  'jk' => $jk,
	    				  'jabatan' => $jabatan,
	    				  'email' => $email,
	    				  'username' => $username,
	    				  'password' => $pass,
	    				  'foto'	=> $ft
	    	);

	    	$kar->ubahGambar($data2, $kondisi);
	    	$pesan = " <script>
							swal(
				                {
				                    title: 'Selamat !',
				                    text: 'Data berhasil di Ubah ...',
				                    type: 'success',
				                    timer: 1500
				                }
				            )
						</script>";

			header('location:../../index.php?hal=karyawan');
		}
    }

    $_SESSION['pesan'] = $pesan;
}
?>