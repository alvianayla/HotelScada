<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Data Fasilitas Hotel</h2>
<p>Berikut ini daftar Fasilitas Hotel yang
sudah terdaftar dalam database.</p>
<p>
<a href="/fasilitas-hotel/tambah" class="btn btn-primary
btn-sm">Tambah Fasilitas Hotel</a>
</p>
<table class="table table-sm table-hovered">
<thead class="bg-light text-center">
<tr>
<th>Nama Fasilitas Hotel</th>
<th>Deskripsi Fasilitas Hotel</th>
<th>Foto Fasilitas</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
<?php
$htmlData=null;
$nomor=null;
foreach ($ListFasilitashotel as $row) {
$nomor++;
$htmlData ='<tr>';

$htmlData .='<td>'.$row['nama_fasilitas'].'</td>';
$htmlData .='<td>'.$row['deskripsi'].'</td>';
$htmlData .='<td>'.'<img src="'.base_url("/gambar/".$row['foto']).'" width="150">'.'</td>';
$htmlData .='<td class="text-center">';
$htmlData .='<a href="/fasilitas-hotel/edit/'.$row['id_fasilitas_hotel'].'" class="btn btn-info btn-sm mr-1">Edit</a>';
$htmlData .='<a href="/fasilitas-hotel/editfoto/'.$row['id_fasilitas_hotel'].'" class="btn btn-info btn-sm mr-1">Edit Foto</a>';
$htmlData .='<a href="/fasilitas-hotel/hapus/'.$row['id_fasilitas_hotel'].'" class="btn btn-danger btn-sm">Hapus</a>';
$htmlData .='</td>';
$htmlData .='</tr>';
echo $htmlData;
}
?>
</tbody>
</table>
<?= $this->endSection() ?>