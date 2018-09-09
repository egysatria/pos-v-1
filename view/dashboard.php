<?php
include 'models/m_dashboard.php';
$dash = new Dashboard($db);
$tgl = date('Y-m-d');
$tpl = $dash->Wiget($tgl);
foreach ($tpl as $key) 
{
	$profit = $key['profit'] * $key['jumlah'];
	$tottal_pj = $tottal_pj + $key['total'];
	$tot_profit = $tot_profit + $profit;
}
$tgl_1 = date('d F Y');
?>
<section id="content">
    
    <!--breadcrumbs start-->
    <div id="breadcrumbs-wrapper" class=" grey lighten-3">
      <div class="container">
        <div class="row">
          <div class="col s12 m12 19">
            <h5 class="breadcrumbs-title">Dashboard</h5>
          </div>
        </div>
      </div>
    </div>
    <!--breadcrumbs end-->
    

    <!--start container-->
    <div class="container">
      <div class="section">
      	<!--card stats start-->
        <div id="card-stats">
            <div class="row">
                <div class="col s12 m6 l3">
                    <div class="card">
                        <div class="card-content  green white-text">
                            <p class="card-stats-title"><i class="mdi-content-content-paste"></i> Barang</p>
                            <h4 class="card-stats-number"><?php echo $dash->jumBarang();?></h4>
                            <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up"></i><span class="green-text text-lighten-5">Jumlah Barang</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col s12 m6 l3">
                    <div class="card">
                        <div class="card-content purple white-text">
                            <p class="card-stats-title"><i class="mdi-editor-attach-money"></i>Penjualan</p>
                            <h4 class="card-stats-number">Rp. <?php echo number_format($tottal_pj, 2, ",", ".");?></h4>
                            <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up"></i>  <span class="purple-text text-lighten-5">Total Penjualan Hari Ini</span>
                            </p>
                        </div>
                    </div>
                </div>                            
                <div class="col s12 m6 l3">
                    <div class="card">
                        <div class="card-content blue-grey white-text">
                            <p class="card-stats-title"><i class="mdi-action-trending-up"></i> Profit</p>
                            <h4 class="card-stats-number">Rp. <?php echo number_format($tot_profit, 2, ",", ".");?></h4>
                            <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up"></i>  <span class="blue-grey-text text-lighten-5">Profit Hari Ini</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col s12 m6 l3">
                    <div class="card">
                        <div class="card-content deep-purple white-text">
                            <p class="card-stats-title"><i class="mdi-editor-insert-drive-file"></i> Pembelian</p>
                            <h4 class="card-stats-number">Rp. <?php echo number_format($dash->getPembelian($tgl_1), 2, ",", ".");?></h4>
                            <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up"></i> <span class="deep-purple-text text-lighten-5">Pembelian Hari Ini</span>
                            </p>
                        </div>
                    </div>
                </div>                            
            </div>
        </div>
        <div class="row">
            <div class="col s12 m4">
              <h4 class="header">Profile Admin</h4>
              <div id="profile-card" class="card">
                <div class="card-image waves-effect waves-block waves-light">
                  <img class="activator" src="assets/images/user-bg.jpg" alt="user bg">
                </div>
                <div class="card-content">
                  <img src="assets/images/karyawan/<?php echo $res['foto'];?>" alt="" class="circle responsive-img activator card-profile-image">
                  <a class="btn-floating activator btn-move-up waves-effect waves-light darken-2 right">
                    <i class="mdi-editor-mode-edit"></i>
                  </a>
                  <br>
                  <span class="card-title activator grey-text text-darken-4"><?php echo $res['nama_karyawan'];?></span>
                  <p><i class="mdi-action-perm-identity"></i> <?php echo $res['jabatan'];?></p>
                  <p><i class="mdi-action-perm-phone-msg"></i> <?php echo $res['no_telp'];?></p>
                  <p><i class="mdi-communication-email"></i> <?php echo $res['email'];?></p>

                </div>
                <div class="card-reveal">
                  <span class="card-title grey-text text-darken-4"><?php echo $res['nama_karyawan'];?><i class="mdi-navigation-close right"></i></span>
                  <p>Informasi tentang profil karyawan.</p>
                  <p><i class="mdi-action-perm-identity"></i> <?php echo $res['jabatan'];?></p>
                  <p><i class="mdi-action-perm-phone-msg"></i> <?php echo $res['no_telp'];?></p>
                  <p><i class="mdi-communication-email"></i> <?php echo $res['email'];?></p>
                  <p><i class="mdi-social-cake"></i> <?php echo $res['tgl_lahir'];?>
                    <p>
                      <p><i class="mdi-device-airplanemode-on"></i> <?php echo $res['alamat'];?>
                        <p>
                </div>
              </div>
            </div>
        </div>
        <!--card stats end-->
    </div>
    <!--end container-->
</section>