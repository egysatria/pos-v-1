<?php
include 'models/m_barang.php';
$brg = new Barang($db);
$id  = $_GET['id'];
$tpl = $brg->tampilID($id);
$res = $tpl->fetch_object();
?>
<section id="content">
    
    <!--breadcrumbs start-->
  <div id="breadcrumbs-wrapper" class=" grey lighten-3">
    <div class="container">
      <div class="row">
        <div class="col s12 m12 19">
          <h5 class="breadcrumbs-title">Ubah Data Barang</h5>
          <ol class="breadcrumb">
              <li><a href="?hal=dashboard">Dashboard</a></li>
              <li><a href="?hal=barang">Barang</a></li>
              <li class="active">Ubah Barang</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!--breadcrumbs end-->
  

  <!--start container-->
  <div class="container">
    <div class="section">
      <div class="row">
        <div class="col s12 m12">
          <div class="card-panel">
            <h4 class="header2">Ubah Data Barang</h4>
            <div class="row">
              <form class="col s12 m12" action="controller/barang/ubh_barang.php" method="POST" onsubmit="return validasi_brg(this)">
                <div class="row">
                  <div class="input-field col s12">
                    <input id="kd_barcode" value="<?= $res->kd_barcode ?>" name="kd_barcode" type="text" readonly>
                    <label for="kd_barcode">Kode Barcode</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input name="nm_barang" id="nm_barang" type="text" value="<?= $res->nm_barang ?>">
                    <label for="nm_barang">Nama Barang</label>
                  </div>
                </div>
                 <div class="row">
                    <div class="input-field col s12">
                    <select name="satuan" id="satuan">
                      <option value="" selected>Pilih Satuan</option>
                      <option <?php if($res->satuan == "LUSIN" ) {echo "selected";} ?> value="LUSIN">LUSIN</option>
                      <option <?php if($res->satuan == "PACK" ) {echo "selected";} ?> value="PACK">PACK</option>
                      <option <?php if($res->satuan == "PCS" ) {echo "selected";} ?> value="PCS">PCS</option>
                      <option <?php if($res->satuan == "RIM" ) {echo "selected";} ?> value="PCS">RIM</option>
                    </select>
                    <label for="satuan">Satuan</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input name="stok" id="stok" type="number" value="<?= $res->stok ?>">
                    <label for="stok">Stock</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input name="harga_beli" id="harga_beli" onkeyup="hitung()" type="number" value="<?= $res->harga_beli ?>">
                    <label for="harga_beli">Harga Beli</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input name="harga_jual" id="harga_jual" onkeyup="hitung()" type="number" value="<?= $res->harga_jual ?>">
                    <label for="harga_jual">Harga Jual</label>
                  </div>
                </div>
                <div class="row">
                <label style="margin-left:10px">Profit</label>
                  <div class="input-field col s12">
                    <input name="profit" id="profit" type="number" value="<?= $res->profit ?>" readonly>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <button class="btn orange waves-effect waves-light right" type="submit" name="btnUbah">Simpan
                      <i class="mdi-content-send right"></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--end container-->
</section>