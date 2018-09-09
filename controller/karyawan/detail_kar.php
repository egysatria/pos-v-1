<?php
include '../../config/koneksi.php';
include '../../models/m_database.php';
include '../../models/m_karyawan.php';

$db  = new Database($conn);
$kar = new Karyawan($db);

if(isset($_POST['idKar']))
{
	$id 	= $_POST['idKar'];
	$output = '';
	$tpl 	= $kar->tampilID($id);
	$res 	= $tpl->fetch_object();
	$output .= '<div class="col s12 m4 l4">
      <h4 class="header">Profil Karyawan</h4>
      <div id="profile-card" class="card">
        <div class="card-image waves-effect waves-block waves-light">
          <img class="activator" src="assets/images/user-bg.jpg" alt="user bg">
        </div>
        <div class="card-content">
          <img src="assets/images/avatar.jpg" alt="" class="circle responsive-img activator card-profile-image">
          <a class="btn-floating btn-large activator btn-move-up waves-effect waves-light darken-2 right">
            <i class="mdi-editor-mode-edit"></i>
          </a>

          <span class="card-title activator grey-text text-darken-4"><?= $res->nama_karyawan; ?></span>
          <p><i class="mdi-action-perm-identity"></i> <?= $res->jabatan; ?></p>
          <p><i class="mdi-action-perm-phone-msg"></i> +1 (612) 222 8989</p>
          <p><i class="mdi-communication-email"></i> yourmail@domain.com</p>

        </div>
        <div class="card-reveal">
          <span class="card-title grey-text text-darken-4">Roger Waters <i class="mdi-navigation-close right"></i></span>
          <p>Here is some more information about this card.</p>
          <p><i class="mdi-action-perm-identity"></i> Project Manager</p>
          <p><i class="mdi-action-perm-phone-msg"></i> +1 (612) 222 8989</p>
          <p><i class="mdi-communication-email"></i> yourmail@domain.com</p>
          <p><i class="mdi-social-cake"></i> 18th June 1990
            <p>
              <p><i class="mdi-device-airplanemode-on"></i> BAR - AUS
                <p>
        </div>
      </div>
    </div>'

    echo $output;
}
?>