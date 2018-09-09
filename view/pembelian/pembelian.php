<?php
include 'models/m_pembelian.php';
$pbl = new Pembelian($db);

$kd_pb = $_GET['q'];
?>
<section id="content">
    
    <!--breadcrumbs start-->
  <div id="breadcrumbs-wrapper" class=" grey lighten-3">
    <div class="container">
      <div class="row">
        <div class="col s12 m12 19">
          <h5 class="breadcrumbs-title">Data Pembelian</h5>
          <ol class="breadcrumb">
              <li><a href="?hal=dashboard">Dashboard</a></li>
              <li class="active">Pembelian</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!--breadcrumbs end-->
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

     <form action="controller/pembelian/p_pembelian.php" method="POST">
        <div class="row">
          <div class="input-field col m6 s12">
            <br>
            <input style="background-color: #eeeeee" name="kd_pb" type="text" value="<?= $kd_pb ?>" readonly>
            <label for="kd_pb">Kode Pembelian</label>
          </div>
         </div>
         <div class="row">
          <div class="input-field col m6 s12">
            <br>
            <input name="nm_suplier" id="nm_suplier" type="text">
            <label for="nm_suplier">Nama Suplier</label>
          </div>
         </div>
         <div class="row">
          <div class="input-field col m6 s12">
            <br>
            <input name="kd_barcode" id="kd_barcode" type="text" autofocus>
            <div id="daftarBarang"></div>
            <label for="kd_barcode">Nama Barang</label>
          </div>
          <div class="input-field col m2 s12">
            <br>
            <input name="jumlah" id="jumlah" type="text" autofocus>
            <label for="jumlah">Jumlah</label>
          </div>
          <br>
          <div class="input-field col m2 s12" style="margin-top: 25px;">
            <button class="btn teal accent-4 waves-effect waves-light" type="submit" name="btnTbh">Kirim
              <i class="mdi-content-send right"></i>
            </button>
          </div>
        </div>
      </form>

      <form action="controller/pembelian/t_pembelian.php" method="POST">
        <div class="divider"></div>
        <input type="hidden" name="kode_p" value="<?= $kd_pb ?>">
        <div class="invoice-table">
          <div class="row">
            <div class="col s12 m12 l12">
              <table class="striped">
                <thead>
                   <tr>
                      <th data-field="no">No</th>
                      <th data-field="kode_barcode">Kode Pembelian</th>
                      <th data-field="nm_barang">Nama Suplier</th>
                      <th data-field="harga">Nama Barang</th>
                      <th data-field="jumlah">Jumlah</th>
                      <th data-field="total">Harga Beli</th>
                      <th data-field="act">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  $tpl = $pbl->getPembelian($kd_pb);
                  foreach ($tpl as $v) 
                  {
                ?>
                <tr>
                  <td><?= $no; ?></td>
                  <td><?= $v['kd_barcode']; ?></td>
                  <td><?= $v['nama_suplier']; ?></td>
                  <td><?= $v['nm_barang']; ?></td>
                  <td><?= $v['jumlah'];?></td>
                  <td>Rp. <?php echo number_format($v['harga_beli'], 2, ",", "."); ?></td>
                  <td>
                    <center>
                      <a href="controller/pembelian/h_pembelian.php?act=delete&id=<?= $v['id'];?>&kd_pb=<?= $kd_pb ?>&harga_b=<?= $v['harga_beli']?>&kode_b=<?= $v['kd_barcode']?>&jum=<?= $v['jumlah']?>" class="btn-floating waves-effect waves-light red accent-4"><i class="mdi-navigation-close"></i></a>
                    </center>
                  </td>
                </tr>
                <?php $total_byr = $total_byr + $v['total']; $no++; } ?>
                  <tr>
                    <td colspan="4" class="white"></td>
                    <td>Total : Rp. </td>
                    <td><input type="number" id="totalBayar" name="totalBayar" value="<?php echo $total_byr; ?>" readonly></td>
                  </tr>
                  <tr>
                    <td colspan="4" class="white"></td>
                    <td>Bayar : Rp.</td>
                    <td><input type="number" name="bayar" id="bayar"></td>
                  </tr>
                  <tr>
                    <td colspan="4" class="white"></td>
                    <td class="cyan white-text">Kembalian : Rp. </td>
                    <td class="cyan strong white-text"><input type="number" name="kembali" id="kembali"></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="input-field col s12">
              <button class="btn amber darken-1 waves-effect waves-light left" type="submit" name="btnStruck" style="margin-right: 20px">Simpan
                <i class="mdi-content-print right"></i>
              </button>
              <button class="btn green waves-effect waves-light left struck" type="button" onclick="window.open('view/pembelian/struck.php?kd=<?= $kd_pb ?>&tgs=<?php echo $res['nama_karyawan'];?>','mywindow','width-850px','height=400px','left=300px')">Cetak Nota
                <i class="mdi-content-print right"></i>
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  <!--end container-->
</section>