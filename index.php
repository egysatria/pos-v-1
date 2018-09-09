<?php
session_start();
include 'config/koneksi.php';
include 'models/m_database.php';
include 'models/m_login.php';
include 'custom/kodepj.php';
include 'custom/kodePb.php';

$db  = new Database($conn);
$lgn = new Login($db);
$idKar = $_SESSION['id'];
$res = $lgn->getData($idKar);
$kodePJL = kdPenjualan(15);
$kodePbl = kdPembelian(15);

if(!$lgn->isLogin())
{
  header('location:auth/login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'template/header.php'; ?>

<body>
  <!-- //////////////////////////////////////////////////////////////////////////// -->

  <!-- START HEADER -->
  <header id="header" class="page-topbar">
        <!-- start header nav-->
        <div class="navbar-fixed">
            <nav class="cyan">
            </nav>
        </div>
        <!-- end header nav-->
  </header>
  <!-- END HEADER -->

  <!-- //////////////////////////////////////////////////////////////////////////// -->

  <!-- START MAIN -->
  <div id="main">
    <!-- START WRAPPER -->
    <div class="wrapper">

      <!-- START LEFT SIDEBAR NAV-->
      <?php include 'template/navigasi.php'; ?>
      <!-- END LEFT SIDEBAR NAV-->

      <!-- //////////////////////////////////////////////////////////////////////////// -->

      <!-- START CONTENT -->
     <?php
     error_reporting(0);
	    $hal = $_GET['hal'];
      $act = $_GET['act'];

	    if ($hal == "" || $hal=="dashboard") 
	    {
	      include 'view/dashboard.php';
	    }
	    elseif($hal == "barang")
	    {
        if($act == "")
        {
          include 'view/barang/barang.php';
        }
        elseif ($act == "tambah") 
        {
          include 'view/barang/t_barang.php';
        }
        elseif ($act == "ubah") 
        {
          include 'view/barang/u_barang.php';
        }
      }
       elseif($hal == "karyawan")
      {
        if($act == "")
        {
          include 'view/karyawan/karyawan.php';
        }
        elseif ($act == "tambah") 
        {
          include 'view/karyawan/t_karyawan.php';
        }
        elseif ($act == "ubah") 
        {
          include 'view/karyawan/u_karyawan.php';
        }
      }
       elseif($hal == "penjualan")
      {
        if($act == "")
        {
          include 'view/penjualan/penjualan.php';
        }
        elseif($act == "view")
        {
          include 'view/penjualan/v_penjualan.php';
        }
      }
      elseif($hal == "pembelian")
      {
        if($act == "")
        {
          include 'view/pembelian/pembelian.php';
        }
      }
      elseif($hal == "laporan")
      {
        if($act == "")
        {
          include 'view/laporan/laporan.php';
        }
      }

	  ?>
      <!-- END CONTENT -->

      <!-- //////////////////////////////////////////////////////////////////////////// -->
     
    </div>
    <!-- END WRAPPER -->

  </div>
  <!-- END MAIN -->



  <!-- //////////////////////////////////////////////////////////////////////////// -->

  <?php include 'template/footer.php'; ?>
    
</body>

</html>