<?= $this->extend('Users/Template') ?>
<?= $this->section('content') ?>
<section id="services" class="services">
<div class="row">
<h2><?=$title?></h2>
</div>
<table class="table table-sm table-hovered">
<thead class="bg-light text-center">
<tr>
<th>Nama Pemesan</th>
<th>Email Pemesan</th>
<th>Nama Tamu</th>
<th>Tanggal Cek In</th>
<th>Tanggal Cek Out</th>
<th>Jumlah Kamar Dipesan</th>
<th>Aksi</th>
</tr>
</thead>
<tbody  class="bg-light text-center">
<?php
$htmlData=null;
foreach ($tamu as $row){
$htmlData ='<tr>';
$htmlData .='<td>'.$row['nama_pemesan'].'</td>';
$htmlData .='<td>'.$row['email_pemesan'].'</td>';
$htmlData .='<td>'.$row['nama_tamu'].'</td>';
$htmlData .='<td>'.$row['cek-in'].'</td>';
$htmlData .='<td>'.$row['cek-out'].'</td>';
$htmlData .='<td>'.$row['jumlah_kamar'].'</td>';
$htmlData .='<td class="text-center">';
$htmlData .='<a href="/inv/'.$row['id_reservasi'].'" class="btn btn-info btn-sm mr-1">Print</a>';
$htmlData .='</td>';
$htmlData .='</tr>';
echo $htmlData;
}
?>
</tbody>
</table>
</section>
<?= $this->endSection() ?>