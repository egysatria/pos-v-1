<aside id="left-sidebar-nav">
    <ul id="slide-out" class="side-nav fixed leftside-navigation">
        <li class="user-details cyan darken-2">
            <div class="row">
                <div class="col col s4 m4 l4">
                    <img src="assets/images/karyawan/<?php echo $res['foto'];?>" alt="" class="circle responsive-img valign profile-image">
                </div>
                <div class="col col s8 m8 l8">
                    <ul id="profile-dropdown" class="dropdown-content">
                        <li><a href="?hal=profil"><i class="mdi-action-face-unlock"></i> Profile</a>
                        </li>
                        <li><a id="btnLogout" href="#"><i class="mdi-hardware-keyboard-tab"></i> Logout</a>
                        </li>
                    </ul>
                    <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown"><?php echo $res['nama_karyawan'];?><i class="mdi-navigation-arrow-drop-down right"></i></a>
                    <p class="user-roal"><?php echo $res['jabatan'];?></p>
                </div>
            </div>
        </li>
        <li class="bold"><a href="?hal=dashboard" class="waves-effect waves-cyan"><i class="mdi-action-dashboard"></i> Dashboard</a>
        </li>
        <li class="bold"><a href="?hal=barang" class="waves-effect waves-cyan"><i class="mdi-action-assignment"></i> Barang</a>
        </li>
        <li class="bold"><a href="?hal=karyawan" class="waves-effect waves-cyan"><i class="mdi-action-account-box"></i> Karyawan</a>
        </li>
        <li class="bold"><a href="?hal=penjualan&q=<?php echo $kodePJL; ?>" class="waves-effect waves-cyan"><i class="mdi-action-wallet-travel"></i> Penjualan</a>
        </li>
        <li class="bold"><a href="?hal=pembelian&q=<?php echo $kodePbl; ?>" class="waves-effect waves-cyan"><i class="mdi-action-add-shopping-cart"></i> Pembelian</a>
        </li>
        <li class="bold"><a href="?hal=laporan" class="waves-effect waves-cyan"><i class="mdi-action-print"></i> Report</a>
        </li>
        <li class="li-hover"><div class="divider"></div></li>
        <li class="li-hover"><p class="ultra-small margin more-text">Grafik Barang</p></li>
        <li class="li-hover">
            <div class="row">
                <div class="col s12 m12 l12">
                    <div class="sample-chart-wrapper">                            
                        <div class="ct-chart ct-golden-section" id="ct2-chart"></div>
                    </div>
                </div>
            </div>
        </li>
    </ul>
    <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only darken-2"><i class="mdi-navigation-menu" ></i></a>
</aside>