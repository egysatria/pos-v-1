<?php
require_once '../../lib/tcpdf/tcpdf.php';
include '../../config/koneksi.php';
include '../../models/m_database.php';
include '../../models/m_penjualan.php';

$db  = new Database($conn);
$pj = new Penjualan($db);

$pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetTitle('Laporan Data Penjualan');
$pdf->SetHeaderData('','', PDF_HEADER_TITLE, PDF_HEADER_STRING);
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$pdf->SetDefaultMonospacedFont('helvetica');
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetAutoPageBreak(TRUE, 10);
$pdf->SetFont('helvetica', '', 12);
$pdf->AddPage();
$tgl1 = date('Y-m-d', strtotime($_POST['tgl_awal']));
$tgl2 = date('Y-m-d', strtotime($_POST['tgl_akhir']));
$content = '';
$content .= '
<h3 align="center">Laporan Data Penjualan</h3>
<p align="center">Dari Tanggal '.date('d F Y', strtotime($tgl1)).' Sampai Tanggal '.date('d F Y', strtotime($tgl2)).'</p>
<p></p>
  <table border="1" cellspacing="0" cellpadding="5" style="margin-top:20px">
    <tr style="background-color:#e0e0e0">
        <th width="4%">No</th>
        <th width="21%">Kode Penjualan</th>
        <th width="20%">Nama Barang</th>
        <th width="15%">Tanggal Penjualan</th>
        <th width="14%">Profit</th>
        <th width="19%" style="text-align:center">Harga Penjualan</th>
        <th width="8%">Jumlah</th>
    </tr>
';
$no = 1;
$tpl = $pj->lapTanggal($tgl1, $tgl2);
$tot_profit = 0;
$tottal_pj = 0;
foreach ($tpl as $key) 
{
  $content .= '<tr>
                  <td>'.$no.'</td>
                  <td style="text-align:center">'.$key['kd_penjualan'].'</td>
                  <td>'.$key['nm_barang'].'</td>
                  <td>'.$key['tgl_penjualan'].'</td>
                  <td>Rp. '.number_format($key['profit'], 2, ",", ".").'</td>
                  <td>Rp. '.number_format($key['harga_jual'], 2, ",", ".").'</td>
                  <td>'.$key['jumlah'].'</td>
              </tr>';
              $no++;
              $profit = $key['profit'] * $key['jumlah'];
              $tottal_pj = $tottal_pj + $key['total'];
              $tot_profit = $tot_profit + $profit;
}
$content .= '<tr style="background-color:#e0e0e0">
                <td style="text-align:right" colspan="5">Total Profit :</td>
                <td colspan="2">Rp. '.number_format($tot_profit, 2, ",", ".").'</td>
            </tr>';
$content .= '<tr style="background-color:#e0e0e0">
    <td style="text-align:right" colspan="5">Total Penjualan :</td>
    <td colspan="2">Rp. '.number_format($tottal_pj, 2, ",", ".").'</td>
</tr>';
$content .='</table>';
$pdf->writeHTML($content);
$pdf->Output('data_karyawan.pdf', 'I');
?>