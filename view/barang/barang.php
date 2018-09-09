<?php
include 'models/m_barang.php';
$brg = new Barang($db);
?>
<section id="content">
    
    <!--breadcrumbs start-->
    <div id="breadcrumbs-wrapper" class=" grey lighten-3">
      <div class="container">
        <div class="row">
          <div class="col s12 m12 19">
            <h5 class="breadcrumbs-title">Data Barang</h5>
            <ol class="breadcrumb">
                <li><a href="?hal=dashboard">Dashboard</a></li>
                <li class="active">Barang</li>
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
            if($_SESSION['pesan'] == "sukses")
            {
              ?>
                <script type="text/javascript">
                  swal(
                      {
                          title: 'Selamat !',
                          text: 'Data berhasil di Inputkan :)',
                          type: 'success',
                          timer: 1500
                      }
                  );
                </script>

              <?php
              unset($_SESSION['pesan']);
            }
          }
        ?>
       <div id="table-datatables">
        <div class="row">
          <div class="col s12 m12">
            <table id="data-table-simple" class="responsive-table display" cellspacing="0">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>Kode Barcode</th>
                      <th>Nama Barang</th>
                      <th>Satuan</th>
                      <th>Stock</th>
                      <th>Harga Beli</th>
                      <th>Harga Jual</th>
                      <th>Profit</th>
                      <th>Opsi</th>
                  </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                $tpl = $brg->tampilBarang();
                foreach ($tpl as $key) 
                {
                ?>
                  <tr>
                      <td><?= $no; ?></td>
                      <td><?= $key['kd_barcode']; ?></td>
                      <td><?= $key['nm_barang']; ?></td>
                      <td><?= $key['satuan']; ?></td>
                      <td><?= $key['stok']; ?></td>
                      <td><?= "Rp. ".number_format($key['harga_beli'], 2, ",", "."); ?></td>
                      <td><?= "Rp. ".number_format($key['harga_jual'], 2, ",", "."); ?></td>
                      <td><?= "Rp. ".number_format($key['profit'], 2, ",", "."); ?></td>
                      <td>
                        <center>
                          <a href="?hal=barang&act=ubah&id=<?= $key['kd_barcode'];?>" class="btn-floating waves-effect waves-light green accent-4"><i class="mdi-editor-mode-edit"></i></a>
                          <a id="hpsBrg" class="btn-floating waves-effect waves-light  red accent-4" data-id="<?= $key['kd_barcode']; ?>"><i class="mdi-action-delete"></i></a>
                        </center>
                      </td>
                  </tr>
                  <?php $no++; }?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
       <a href="view/barang/c_barang.php" target="_blank" style="margin-top:20px" class="waves-effect waves-light btn"><i class="mdi-action-print left"></i>Cetak</a>
        <div class="fixed-action-btn">
          <a href="?hal=barang&act=tambah" class="btn-floating btn-large amber accent-4">
            <i class="large mdi-content-add"></i>
          </a>
        </div>
    </div>
  </div>
    <!--end container-->
  </section>