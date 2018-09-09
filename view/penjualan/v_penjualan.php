<?php
include 'models/m_penjualan.php';
$pj = new Penjualan($db);
$kode_pj = $_GET['kd_pj'];
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
    

    <!--start container-->
    <div class="container">
      <div class="section">
       <div id="table-datatables">
        <div class="row">
          <div class="col s12 m12">
            <table id="data-table-simple" class="responsive-table display" cellspacing="0">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>Kode Penjualan</th>
                      <th>Nama Barang</th>
                      <th>Jumlah</th>
                      <th>Total</th>
                      <th>Tanggal Penjualan</th>
                      <th>Detail</th>
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
                      <td>
                      	<center>
	                      	<a data-target="modal1" class="btn-floating modal-trigger waves-effect waves-light purple accent-4 detailPenjualan" data-id="<?= $key['kd_penjualan']; ?>"><i class="mdi-image-remove-red-eye"></i></a>
                        </center>
                      </td>
                  </tr>
                  <?php $no++; } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="fixed-action-btn">
          <a href="?hal=penjualan&q=<?php echo $kode_pj; ?>" class="btn-floating tooltipped btn-large pink accent-4" data-position="left" data-delay="50" data-tooltip="Kembali">
            <i class="large mdi-navigation-arrow-back"></i>
          </a>
        </div>
      </div>
    </div>
    <!--end container-->
</section>
<div id="modal1" class="modal">
  <div class="modal-content">
  	<div id="tampilDetail"></div>
  </div>
  <div class="modal-footer">
    <a href="#" class="waves-effect waves-green btn-flat modal-action modal-close">Close</a>
  </div>
</div>
<script type="text/javascript" src="assets/js/jquery-1.11.2.min.js"></script>     
<script type="text/javascript">
	$(document).ready(function(){
		$('.detailPenjualan').click(function(){
			var detail = $(this).data('id');
			$.ajax({
				url : 'controller/penjualan/detail_penjualan.php',
				method : 'post',
				data :'detail='+detail,
				dataType : 'json',
				success:function(data)
				{
					$('#tampilDetail').html(data);
				}
			});
		});
	});
</script>