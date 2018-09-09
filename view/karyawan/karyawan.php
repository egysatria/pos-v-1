<?php
include 'models/m_karyawan.php';
$kar = new Karyawan($db);
?>
<section id="content">
    
    <!--breadcrumbs start-->
    <div id="breadcrumbs-wrapper" class=" grey lighten-3">
      <div class="container">
        <div class="row">
          <div class="col s12 m12 19">
            <h5 class="breadcrumbs-title">Data Karyawan</h5>
            <ol class="breadcrumb">
                <li><a href="?hal=dashboard">Dashboard</a></li>
                <li class="active">Karyawan</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!--breadcrumbs end-->
    

    <!--start container-->
    <div class="container">
      <div class="section">
        <?php
          if(isset($_SESSION['pesan']))
          {
            echo $_SESSION['pesan'];
            unset($_SESSION['pesan']);
          }
        ?>
       <div id="table-datatables">
        <div class="row">
          <div class="col s12 m12">
            <table id="data-table-simple" class="responsive-table display" cellspacing="0">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>Kode Karyawan</th>
                      <th>Nama Karyawan</th>
                      <th>Tanggal Lahir</th>
                      <th>No Telepon</th>
                      <th>E-Mail</th>
                      <th>Foto</th>
                      <th>Opsi</th>
                  </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                $tpl = $kar->tampilKaryawan();
                foreach ($tpl as $key) 
                {
                ?>
                  <tr>
                      <td><?= $no; ?></td>
                      <td><?= $key['kd_karyawan']; ?></td>
                      <td><?= $key['nama_karyawan']; ?></td>
                      <td><?= $key['tgl_lahir']; ?></td>
                      <td><?= $key['no_telp']; ?></td>
                      <td><?= $key['email']; ?></td>
                      <td>
                        <img width="50px" height="55px" src="assets/images/karyawan/<?= $key['foto']; ?>" alt="" class="circle responsive-img valign profile-image">
                      </td>
                      <td>
                        <center>
                          <a href="?hal=karyawan&act=ubah&id=<?= $key['kd_karyawan'];?>" class="btn-floating waves-effect waves-light green accent-4"><i class="mdi-editor-mode-edit"></i></a>
                          <a id="hpsKar" class="btn-floating waves-effect waves-light  red accent-4" data-id="<?= $key['kd_karyawan']; ?>"><i class="mdi-action-delete"></i></a>
                        </center>
                      </td>
                  </tr>
                  <?php $no++; }?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
       <a href="view/karyawan/c_karyawan.php" target="_blank" style="margin-top:20px" class="waves-effect waves-light btn"><i class="mdi-action-print left"></i>Cetak</a>
        <div class="fixed-action-btn">
          <a href="?hal=karyawan&act=tambah" class="btn-floating btn-large amber accent-4">
            <i class="large mdi-content-add"></i>
          </a>
        </div>
      </div>
    </div>
    <!--end container-->
</section>