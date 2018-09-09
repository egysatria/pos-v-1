<?php
require_once '../../lib/tcpdf/tcpdf.php';
include '../../config/koneksi.php';
include '../../models/m_database.php';
include '../../models/m_karyawan.php';

$db  = new Database($conn);
$brg = new Karyawan($db);

$pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetTitle('Laporan Data Karyawan');
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
<h3 align="center">Laporan Data Karyawan</h3>
<hr>
<p></p>
  <table border="1" cellspacing="0" cellpadding="5" style="margin-top:20px">
    <tr style="background-color:#e0e0e0">
        <th width="4%">No</th>
        <th width="14%">Kode Karyawan</th>
        <th width="20%">Nama Karyawan</th>
        <th width="16%">Tanggal Lahir</th>
        <th width="23%">Alamat</th>
        <th width="10%">Jabatan</th>
        <th width="14%">No Telepon</th>
    </tr>
';

$no=1;
$tpl = $brg->tampilKaryawan();
$tot_profit = 0;
foreach ($tpl as $key) 
{
  $content .= '<tr>
                  <td>'.$no.'</td>
                  <td style="text-align:center">'.$key['kd_karyawan'].'</td>
                  <td>'.$key['nama_karyawan'].'</td>
                  <td>'.$key['tgl_lahir'].'</td>
                  <td>'.$key['alamat'].'</td>
                  <td>'.$key['jabatan'].'</td>
                  <td>'.$key['no_telp'].'</td>
              </tr>';
              $no++;
}
$content .='</table>';
$pdf->writeHTML($content);
$pdf->Output('data_karyawan.pdf', 'I');
?>