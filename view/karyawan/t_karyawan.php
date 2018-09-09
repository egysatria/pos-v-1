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
          <h5 class="breadcrumbs-title">Input Data Karyawan</h5>
          <ol class="breadcrumb">
              <li><a href="?hal=dashboard">Dashboard</a></li>
              <li><a href="?hal=karyawan">Karyawan</a></li>
              <li class="active">Input Karyawan</li>
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
            <h4 class="header2">Input Data Karyawan</h4>
            <div class="row">
              <form class="col s12 m12" action="controller/karyawan/tbh_karyawan.php" method="POST" onsubmit="return validasiKaryawan(this)" enctype="multipart/form-data">
                <div class="row">
                  <div class="input-field col s12">
                    <input id="kd_karyawan" value="<?= $kar->kodeKaryawan(); ?>" name="kd_karyawan" type="text" readonly>
                    <label for="kd_karyawan">Kode Karyawan</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input name="nama_karyawan" id="nama_karyawan" type="text">
                    <label for="nama_karyawan">Nama Karyawan</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input name="tgl_lahir" id="tgl_lahir" type="date" class="datepicker">
                    <label for="tgl_lahir">Tanggal Lahir</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <textarea id="alamat" name="alamat" class="materialize-textarea" length="120"></textarea>
                    <label for="textarea1">Alamat</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input name="no_telp" id="no_telp" type="number">
                    <label for="no_telp">No Telepon</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <label>Jenis Kelamin</label><br>
                    <p>
                      <input name="jk" type="radio" class="with-gap" id="test1" value="L" />
                      <label for="test1">Laki - Laki</label>
                    </p>
                    <p>
                      <input name="jk" type="radio" class="with-gap" id="test2" value="P" />
                      <label for="test2">Perempuan</label>
                    </p>
                  </div>
                </div>
                <br><br>
                 <div class="row">
                    <div class="input-field col s12">
                    <select name="jabatan" id="jabatan">
                      <option value="" selected>Pilih Jabatan</option>
                      <option value="Kasir">Kasir</option>
                      <option value="Admin">Admin</option>
                      <option value="Pegawai">Pegawai</option>
                      <option value="Manager">Manager</option>
                      <option value="Supervisor">Supervisor</option>
                    </select>
                    <label for="jabatan">Jabatan</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input id="email" type="email" class="validate" name="email">
                    <label for="email">Email</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input name="username" id="username" type="text">
                    <label for="username">Username</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input name="password" id="password" type="password">
                    <label for="password">Password</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                   <div class="file-field input-field">
                      <input class="file-path validate" type="text" />
                      <div class="btn">
                        <span>Foto</span>
                        <input type="file" name="foto" />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <button class="btn orange waves-effect waves-light right" type="submit" name="btnTambah">Simpan
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