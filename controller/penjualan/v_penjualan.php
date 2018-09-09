<?php
session_start();
include '../../config/koneksi.php';
include '../../models/m_database.php';
include '../../models/m_penjualan.php';

$db  = new Database($conn);
$pj = new Penjualan($db);
$output = '';

$tpl = $pj->getPenjualan($kd_pj);

$no = 1;
foreach ($tpl as $v) 
{
$output .= '
<tr>
  <td><?= $no; ?></td>
  <td><?= $v['kd_barcode']; ?></td>
  <td><?= $v['nm_barang']; ?></td>
  <td>Rp. <?php echo number_format($v['harga_jual'], 2, ",", "."); ?></td>
  <td><?= $v['jumlah'];?></td>
  <td>Rp. <?php echo number_format($v['total'], 2, ",", "."); ?></td>
  <td>
    <center>
      <a href="?hal=karyawan&act=ubah&id=<?= $key['kd_karyawan'];?>" class="btn-floating waves-effect waves-light green accent-4"><i class="mdi-editor-mode-edit"></i></a>
      <a id="hpsKar" class="btn-floating waves-effect waves-light  red accent-4" data-id="<?= $key['kd_karyawan']; ?>"><i class="mdi-action-delete"></i></a>
      <a id="hpsKar" class="btn-floating waves-effect waves-light  red accent-4" data-id="<?= $key['kd_karyawan']; ?>"><i class="mdi-action-delete"></i></a>
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
</tr>';

echo json_encode($output);