<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Data Kamar</h2>
<p>Berikut ini daftar Kamar Hotel yang
sudah terdaftar dalam database.</p>
<p>
<a href="/kamar/tambah" class="btn btn-primary
btn-sm">Tambah Kamar</a>
</p>
<table class="table table-sm table-hovered">
<thead class="bg-light text-center">
<tr>
<th>No Kamar</th>
<th>Tipe Kamar</th>
<th>Deskripsi</th>
<th>Harga Kamar</th>
<th>Fasilitas Kamar</th>
<th>Jumlah Kamar</th>
<th>Foto</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
<?php
$htmlData=null;
$nomor=null;
foreach ($Listkamar as $row){
$nomor++;
$htmlData ='<tr>';

$htmlData .='<td>'.$row['no_kamar'].'</td>';
$htmlData .='<td>'.$row['tipe_kamar'].'</td>';
$htmlData .='<td>'.$row['deskripsi'].'</td>';
$htmlData .='<td>'.$row['harga_kamar'].'</td>';
$htmlData .='<td>'.$row['fasilitas_kamar'].'</td>';
$htmlData .='<td>'.$row['jumlahkamar'].'</td>';
$htmlData .='<td>'.'<img src="'.base_url("/gambar/".$row['foto']).'" width="150">'.'</td>';
$htmlData .='<td class="text-center">';
$htmlData .='<a href="/kamar/edit/'.$row['no_kamar'].'" class="btn btn-info btn-sm mr-1">Edit</a>';
$htmlData .='<a href="/kamar/editfoto/'.$row['no_kamar'].'" class="btn btn-info btn-sm mr-1">Edit Foto</a>';
$htmlData .='<a href="/kamar/hapus/'.$row['no_kamar'].'" class="btn btn-danger btn-sm">Hapus</a>';
$htmlData .='</td>';
$htmlData .='</tr>';
echo $htmlData;
}
?>
</tbody>
</table>
<?= $this->endSection() ?>
