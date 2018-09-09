<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<!--================================================================================
	Item Name: Materialize - Material Design Admin Template
	Version: 1.0
	Author: GeeksLabs
	Author URL: http://www.themeforest.net/user/geekslabs
================================================================================ -->

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
  <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
  <title>Login Auth | APP POS</title>

  <!-- Favicons-->
  <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">
  <!-- Favicons-->
  <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
  <!-- For iPhone -->
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
  <!-- For Windows Phone -->


  <!-- CORE CSS-->
  
  <link href="../assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="../assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="../assets/css/page-center.css" type="text/css" rel="stylesheet" media="screen,projection">

  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="../assets/css/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="../assets/js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
  
</head>

<body class="cyan">
  <!-- Start Page Loading -->
  <div id="loader-wrapper">
      <div id="loader"></div>        
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>
  <!-- End Page Loading -->



  <div id="login-page" class="row">
    <div class="col s12 z-depth-4 card-panel">
      <form class="login-form" action="../controller/auth/p_login.php" method="POST" onsubmit="return validasiLogin(this)">
        <div class="row">
          <div class="input-field col s12 center">
            <img src="../assets/images/12.jpg" alt="" class="responsive-img valign profile-image-login">
            <p class="center login-form-text">Login Aplikasi POS</p>
          </div>
        </div>
        <?php
          if(isset($_SESSION['pesan']))
          {
            echo $_SESSION['pesan'];
            unset($_SESSION['pesan']);
          }
        ?>
          <div class="row margin">
            <div class="input-field col s12">
              <i class="mdi-social-person-outline prefix"></i>
              <input id="username" type="text" name="username">
              <label for="username" class="center-align">Username</label>
            </div>
          </div>
          <div class="row margin">
            <div class="input-field col s12">
              <i class="mdi-action-lock-outline prefix"></i>
              <input id="password" type="password" name="password" class="f-password">
              <label for="password">Password</label>
            </div>
          </div>
          <div class="row">          
            <div class="input-field col s12 m12 l12  login-text">
                <input type="checkbox" id="remember-me" class="lihat_pass" />
                <label for="remember-me" id="showPass">Lihat Password</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <button type="submit" name="btnLogin" class="btn waves-effect waves-light col s12">Login</button>
            </div>
          </div>
      </form>
    </div>
  </div>



  <!-- ================================================
    Scripts
    ================================================ -->

  <!-- jQuery Library -->
  <script type="text/javascript" src="../assets/js/jquery-1.11.2.min.js"></script>
  <!--materialize js-->
  <script type="text/javascript" src="../assets/js/materialize.js"></script>
  <!--prism-->
  <script type="text/javascript" src="../assets/js/prism.js"></script>
  <!--scrollbar-->
  <script type="text/javascript" src="../assets/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

  <!--plugins.js - Some Specific JS codes for Plugin Settings-->
  <script type="text/javascript" src="../assets/js/plugins.js"></script>

  <script type="text/javascript" src="../custom/c.login.js"></script>

</body>

</html>
<script type="text/javascript">
  var pass = document.getElementById('password');
  var chk = document.getElementById('remember-me');
  var sh = document.getElementById('showPass');
  chk.onclick = function()
  {
    if (chk.checked) 
    {
        pass.setAttribute('type', 'text');
        sh.textContent = 'Sembunyikan Password';
    }
    else
    {
        pass.setAttribute('type', 'password');
        sh.textContent = 'Lihat Password';
    }
  }
</script>