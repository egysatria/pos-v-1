<?php
include 'models/m_penjualan.php';
$pj = new Penjualan($db);
?>
<section id="content">
    
    <!--breadcrumbs start-->
    <div id="breadcrumbs-wrapper" class=" grey lighten-3">
      <div class="container">
        <div class="row">
          <div class="col s12 m12 19">
            <h5 class="breadcrumbs-title">Report</h5>
            <ol class="breadcrumb">
                <li><a href="?hal=dashboard">Dashboard</a></li>
                <li class="active">Report</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!--breadcrumbs end-->
    

    <!--start container-->
    <div class="container">
      <div class="section">
        <div id="accordion" class="section">
          <div class="row">
            <div class="col s12 m12">
              <ul class="collapsible collapsible-accordion" data-collapsible="accordion">
                <li>
                  <div class="collapsible-header ">Data Penjualan</div>
                  <div class="collapsible-body">
                    <div id="table-datatables">
                      <div class="row">
                        <div class="container">
                          <div class="col s12 m12 19">
                            <table id="data-table-simple" class="responsive-table display" cellspacing="0">
                              <thead>
                                  <tr>
                                      <th>No</th>
                                      <th>Kode Penjualan</th>
                                      <th>Nama Barang</th>
                                      <th>Jumlah</th>
                                      <th>Total</th>
                                      <th>Tanggal Penjualan</th>
                                      <th>Nama Pelanggan</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php
                                  $no = 1;
                                  $tpl = $pj->tampilPenjualan();
                                  foreach ($tpl as $key) 
                                  {
                                ?>
                                  <tr>
                                      <td><?= $no; ?></td>
                                      <td><?= $key['kd_penjualan']; ?></td>
                                      <td><?= $key['kd_barcode']; ?></td>
                                      <td><?= $key['jumlah']; ?></td>
                                      <td><?= $key['total']; ?></td>
                                      <td><?= date('d F Y', strtotime($key['tgl_penjualan']));?></td>
                                      <td><?= $key['nm_pelanggan']; ?></td>
                                  </tr>
                                  <?php $no++; } ?>
                                </tbody>
                              </table>
                              <a data-target="modalCetak" style="margin-top:20px" class="waves-effect modal-trigger waves-light btn red"><i class="mdi-action-print left"></i>Cetak Per Tanggal</a>
                              <a href="view/penjualan/c_penjualan.php" target="_blank" style="margin-top:20px" class="waves-effect waves-light btn red"><i class="mdi-action-print left"></i>Cetak Semua</a>
                              <br><br>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
                </li>
                <li>
                  <div class="collapsible-header ">Detail Data Penjualan</div>
                  <div class="collapsible-body">
                   <div id="table-datatables">
                      <div class="row">
                        <div class="container">
                          <div class="col s12 m12 19">
                            <table id="data-table-simple" class="responsive-table display" cellspacing="0">
                              <thead>
                                  <tr>
                                      <th>No</th>
                                      <th>Kode Penjualan</th>
                                      <th>Pembayaran</th>
                                      <th>Kembalian</th>
                                      <th>Diskon</th>
                                      <th>Potongan Diskon</th>
                                      <th>Total</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php
                                  $no = 1;
                                  $tpl = $pj->tampilDetail();
                                  while($key = $tpl->fetch_assoc())
                                  {
                                ?>
                                  <tr>
                                      <td><?= $no++; ?></td>
                                      <td><?= $key['kd_penjualan']; ?></td>
                                      <td><?= $key['bayar']; ?></td>
                                      <td><?= $key['kembali']; ?></td>
                                      <td><?= $key['diskon']; ?></td>
                                      <td><?= $key['potongan']; ?></td>
                                      <td><?= $key['total']; ?></td>
                                  </tr>
                                  <?php ; } ?>
                                </tbody>
                              </table>
                              <a data-target="modalCetak" style="margin-top:20px" class="waves-effect modal-trigger waves-light btn red"><i class="mdi-action-print left"></i>Cetak Per Tanggal</a>
                              <a href="view/penjualan/c_penjualan.php" target="_blank" style="margin-top:20px" class="waves-effect waves-light btn red"><i class="mdi-action-print left"></i>Cetak Semua</a>
                              <br><br>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
      </div>
    </div>
    <!--end container-->
</section>
<div id="modalCetak" class="modal">
  <form action="view/laporan/cetak_tgl.php" method="POST">
    <div class="modal-content">
      <h4><center>~~ Input Batas Tanggal Cetak ~~</center></h4>
      <div class="row">
        <div class="input-field col s12">
          <input name="tgl_awal" id="tgl_awal" type="date" class="datepicker">
          <label for="tgl_awal">Tanggal Awal</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input name="tgl_akhir" id="tgl_akhir" type="date" class="datepicker">
          <label for="tgl_akhir">Tanggal Akhir</label>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button class="waves-effect waves-green btn-flat" target="_blank" type="submit" name="btnTambah">Cetak
        <i class="mdi-content-print right"></i>
      </button>
      <a href="#" class="waves-effect waves-green btn-flat modal-action modal-close">Close</a>
    </div>
  </form>
</div>