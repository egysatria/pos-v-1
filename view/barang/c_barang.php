<?php
require_once '../../lib/tcpdf/tcpdf.php';
include '../../config/koneksi.php';
include '../../models/m_database.php';
include '../../models/m_barang.php';

$db  = new Database($conn);
$brg = new Barang($db);

$pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetTitle('Laporan Data Barang');
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
$content = '';
$content .= '
<h3 align="center">Laporan Data Barang</h3>
<hr>
<p></p>
  <table border="1" cellspacing="0" cellpadding="5" style="margin-top:20px">
    <tr style="background-color:#e0e0e0">
        <th width="5%">No</th>
        <th width="15%">Kode Barcode</th>
        <th width="23%">Nama Barang</th>
        <th width="8%">Satuan</th>
        <th width="8%">Stock</th>
        <th width="14%">Harga Beli</th>
        <th width="14%">Harga Jual</th>
        <th width="14%">Profit</th>
    </tr>
';
$no=1;
$tpl = $brg->tampilBarang();
$tot_profit = 0;
foreach ($tpl as $key) 
{
  $content .= '<tr>
                  <td>'.$no.'</td>
                  <td>'.$key['kd_barcode'].'</td>
                  <td>'.$key['nm_barang'].'</td>
                  <td>'.$key['satuan'].'</td>
                  <td>'.$key['stok'].'</td>
                  <td>Rp. '.number_format($key['harga_beli'], 2, ",", ".").'</td>
                  <td>Rp. '.number_format($key['harga_jual'], 2, ",", ".").'</td>
                  <td>Rp. '.number_format($key['profit'], 2, ",", ".").'</td>
              </tr>';
             $no++;
             $tot_profit = $tot_profit + $key['profit'];
             
}
$content .= '<tr style="background-color:#e0e0e0">
                <td style="text-align:right" colspan="7">Total Profit :</td>
                <td>Rp. '.number_format($tot_profit, 2, ",", ".").'</td>
            </tr>';
$content .='</table>';
$pdf->writeHTML($content);
$pdf->Output('data_barang.pdf', 'I');
?>