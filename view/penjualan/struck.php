<?php
include '../../config/koneksi.php';
include '../../models/m_database.php';
include '../../models/m_penjualan.php';

$db  = new Database($conn);
$pj = new Penjualan($db);

$kode = $_GET['kd'];
?>
<h4>Nota Penjualan</h4>
<table>
 	<tr>
 		<td><strong>POS APP</strong></td>
    </tr>
    <tr>
    	<td>
    		<span>Jln. Mijil No 41, Condongcatur,</span>
            <br/>
            <span>Sleman, Indonesia</span>
            <br/>
            <span>08765478909</span>
        </td>
    </tr>
  </thead>
</table>
<hr>
<br>
<table>
    <tr>
        <td>Kode Penjualan : <?php echo $kode; ?></td>
    </tr>
    <tr>
        <td>Petugas&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?php echo $_GET['tgs'];?></td>
    </tr>
     <tr>
        <td>Tanggal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?php echo date('Y-m-d');?></td>
    </tr>
</table>
<br>
<hr width="5px">
<table width="100%" style="border: 1px">
    <tr>
        <th>No</th>
        <th>Barang</th>
        <th>Jumlah</th>
        <th>Harga</th>
    </tr>
    <?php
        $no=1;
        $tpl = $pj->getStruk($kode);
        foreach ($tpl as $key) 
        {
           ?>
           <tr>
               <td><center><?php echo $no.'.'; ?></center></td>
               <td><center><?php echo $key['nm_barang']; ?></center></td>
               <td><center><?php echo $key['jumlah']; ?></center></td>
               <td><center><?php echo number_format($key['harga_jual']).',-'; ?></center></td>
           </tr>
           <?php
           $no++;

           $dis = $key['diskon'];
           $potongan = $key['potongan'];
           $bayar = $key['bayar'];
           $kembali = $key['kembali'];
           $total = $key['total'];
        }
    ?>
        <tr><td colspan="4"><hr></td></tr>
        <tr>
            <th colspan="3" align="right">Diskon : </th>
            <td align="center"><?= $dis ?>%</td>
        </tr>
        <tr>
            <th colspan="3" align="right">Potongan : </th>
            <td align="center">Rp. <?php echo number_format($potongan,2, ',', '.'); ?></td>
        </tr>
        <tr>
            <th colspan="3" align="right">Total : </th>
            <td align="center">Rp. <?php echo number_format($total,2, ',', '.'); ?></td>
        </tr>
        <tr>
            <th colspan="3" align="right">Bayar : </th>
            <td align="center">Rp. <?php echo number_format($bayar,2, ',', '.'); ?></td>
        </tr>
        <tr>
            <th colspan="3" align="right">Kembali : </th>
            <td align="center">Rp. <?php echo number_format($kembali,2, ',', '.'); ?></td>
        </tr>
</table>
<br><br><br><br>
<table>
    <tr>
        <td>NB* : Barang yang sudah dibeli tidak bisa di kembalikan</td>
    </tr>
</table>
<br><br>
<button type="button" target="_blank" onclick="window.print()">Cetak</button>