<?php
include 'models/m_penjualan.php';
$kd_pj = $_GET['q'];
$pjl   = new Penjualan($db);
?>
<section id="content">
    
    <!--breadcrumbs start-->
  <div id="breadcrumbs-wrapper" class=" grey lighten-3">
    <div class="container">
      <div class="row">
        <div class="col s12 m12 19">
          <h5 class="breadcrumbs-title">Data Penjualan</h5>
          <ol class="breadcrumb">
              <li><a href="?hal=dashboard">Dashboard</a></li>
              <li class="active">Penjualan</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!--breadcrumbs end-->
  <div class="fixed-action-btn">
    <a href="?hal=penjualan&act=view&kd_pj=<?= $kd_pj?>" class="btn-floating tooltipped btn-large pink accent-4" data-position="left" data-delay="50" data-tooltip="Lihat Data Penjualan">
      <i class="large mdi-image-remove-red-eye"></i>
    </a>
  </div>
<?php
error_reporting(0);
if(isset($_SESSION['psn']))
{
  echo $_SESSION['psn'];
  unset($_SESSION['psn']);
}
?>
  <!--start container-->
  <div class="container">
    <div id="invoice">
      <div class="invoice-header">
        <div class="row section">
          <div class="col s12 m6 l6">
            <img src="assets/images/12.jpg" alt="company logo">
            <p>Petugas :
              <br/>
              <span class="strong"><?php echo $res['nama_karyawan'];?></span>
              <br/>
              <span><?php echo $res['jabatan'];?></span>
            </p>
          </div>

          <div class="col s12 m6 l6">
            <div class="invoce-company-address right-align">
              <span class="invoice-icon"><i class="mdi-social-location-city cyan-text"></i></span>

              <p><span class="strong">APLIKASI POS</span>
                <br/>
                <span>Jln. Mijil No 41, Condongcatur,</span>
                <br/>
                <span>Sleman, Indonesia</span>
                <br/>
                <span>08765478909</span>
              </p>
            </div>

            <div class="invoce-company-contact right-align">
              <span class="invoice-icon"><i class="mdi-communication-quick-contacts-mail cyan-text"></i></span>
              <p><span class="strong">www.apppos.com</span>
                <br/>
                <span>satriah9102@gmail.com</span>
                <br/>
              </p>
            </div>

          </div>
        </div>
      </div>

     <form action="controller/penjualan/pjKode.php" method="POST">
        <div class="row">
          <div class="input-field col m2 s12">
            <br>
            <input style="background-color: #eeeeee" name="kd_pj" id="kd_pj" type="text" value="<?= $kd_pj ?>" readonly>
            <label for="kd_pj">Kode Penjualan</label>
          </div>
          <div class="input-field col m2 s12">
            <br>
            <input name="kd_barcode" id="kd_barcode" type="text" autofocus>
            <label for="kd_barcode">Kode Barang</label>
          </div>
          <br>
          <div class="input-field col m2 s12" style="margin-top: 25px;">
            <button class="btn teal accent-4 waves-effect waves-light" type="submit" name="btnTbh">Simpan
              <i class="mdi-content-send right"></i>
            </button>
          </div>
        </div>
      </form>

      <div class="divider"></div>

      <form action="controller/penjualan/tbh_penjualan.php" method="POST">
          <input type="hidden" name="kd_jual" value="<?= $kd_pj ?>">
          <div class="invoice-lable">
            <div class="row">
              <div class="col s12 m3 l3 cyan">
                <h4 class="white-text invoice-text">PENJUALAN</h4>
              </div>
              <div class="col s12 m9 l9 invoice-brief cyan white-text">
                <div class="row">
                  <div class="col s12 m6">
                    <p class="strong">Kode Penjualan</p>
                    <h4 class="header"><?= $kd_pj ?></h4>
                  </div>
                  <div class="col s12 m6">
                    <p class="strong">Tanggal</p>
                    <h4 class="header"><?= date('Y-m-d') ?></h4>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="invoice-table">
            <div class="row">
              <div class="col s12 m12 l12">
                <table class="striped">
                  <thead>
                     <tr>
                        <th data-field="no">No</th>
                        <th data-field="kode_barcode">Kode Barcode</th>
                        <th data-field="nm_barang">Nama Barang</th>
                        <th data-field="harga">Harga</th>
                        <th data-field="jumlah">Jumlah</th>
                        <th data-field="total">Total</th>
                        <th data-field="act">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    $tpl = $pjl->getPenjualan($kd_pj);
                    foreach ($tpl as $v) 
                    {
                  ?>
                  <tr>
                    <td><?= $no; ?></td>
                    <td><?= $v['kd_barcode']; ?></td>
                    <td><?= $v['nm_barang']; ?></td>
                    <td>Rp. <?php echo number_format($v['harga_jual'], 2, ",", "."); ?></td>
                    <td><?= $v['jumlah'];?></td>
                    <td>Rp. <?php echo number_format($v['total'], 2, ",", "."); ?></td>
                    <td>
                      <center>
                        <a href="controller/penjualan/t_penjualan.php?act=tambah&id=<?= $v['id'];?>&kode_pj=<?= $kd_pj ?>&harga_j=<?= $v['harga_jual']?>&kode_b=<?= $v['kd_barcode']?>" class="btn-floating waves-effect waves-light green accent-4"><i class="mdi-content-add"></i></a>
                       
                        <a href="controller/penjualan/t_penjualan.php?act=kurang&id=<?= $v['id'];?>&kode_pj=<?= $kd_pj ?>&harga_j=<?= $v['harga_jual']?>&kode_b=<?= $v['kd_barcode']?>" class="btn-floating waves-effect waves-light pink accent-4"><i class="mdi-content-remove"></i></a>

                        <a href="controller/penjualan/h_penjualan.php?act=hapus&id=<?= $v['id'];?>&kode_pj=<?= $kd_pj ?>&harga_j=<?= $v['harga_jual']?>&kode_b=<?= $v['kd_barcode']?>&jum=<?= $v['jumlah']?>" class="btn-floating waves-effect waves-light red accent-4"><i class="mdi-action-delete"></i></a>
                      </center>
                    </td>
                  </tr>
                  <?php $total_byr = $total_byr + $v['total']; $no++; } ?>
                    <tr>
                      <td colspan="4" class="white"></td>
                      <td>Total : Rp. </td>
                      <td><input type="number" id="totalBayar" name="totalBayar" onkeyup="jumlah()" value="<?php echo $total_byr; ?>" readonly></td>
                    </tr>
                    <tr>
                      <td colspan="4" class="white"></td>
                      <td>Diskon : %</td>
                      <td><input type="number" onkeyup="jumlah()" name="diskon" id="diskonByr"></td>
                    </tr>
                    <tr>
                      <td colspan="4" class="white"></td>
                      <td>Potongan Diskon : Rp. </td>
                      <td><input type="number" name="potongan_diskon" id="potongan_diskon" readonly></td>
                    </tr>
                    <tr>
                      <td colspan="4" class="white"></td>
                      <td class="cyan white-text">Sub Total : Rp. </td>
                      <td class="cyan strong white-text"><input type="number" name="s_total" id="s_total" readonly=""></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              
            </div>
          </div>
          
          <div class="invoice-footer">
            <div class="row">
              <div class="col s12 m5">
                <p class="strong">Pembayaran</p>
                <p><input type="number" onkeyup="jumlah()" name="bayar" id="bayar"></p>
                <p class="strong">Kembalian</p>
                <p><input type="number" name="kembali" id="kembali" readonly=""></p>
                <div class="input-field col s12">
                  <button class="btn orange waves-effect waves-light left" type="submit" name="btnStruck" style="margin-right: 20px">Simpan
                    <i class="mdi-content-print right"></i>
                  </button>
                  <button class="btn teal waves-effect waves-light left" type="button" onclick="window.open('view/penjualan/struck.php?kd=<?= $kd_pj ?>&tgs=<?php echo $res['nama_karyawan'];?>','mywindow','width-850px','height=400px','left=300px')">Cetak Nota
                    <i class="mdi-content-print right"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
      </form>

    </div>
  </div>
  <!--end container-->
</section>