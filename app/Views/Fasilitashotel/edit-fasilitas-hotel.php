<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Perubahan Data Fasilitas Hotel</h2>
<p>Silahkan gunakan form dibawah ini untuk merubah data  fasilitas Hotel</p>
<form method="POST" action="/fasilitas-hotel/update" enctype="multipart/form-data">
<div class="form-group">
<input type="hidden" name="id_fasilitas" value="<?=$detailFasilitashotel[0]['id_fasilitas_hotel'];?>"readonly>
<label class="font-weight-bold">Nama Fasilitas Hotel</label>
<input type="textarea" name="txtInputNama"
class="form-control" placeholder="Masukan Nama Fasilitas hotel" value="<?=$detailFasilitashotel[0]['nama_fasilitas'];?>"
autocomplete="off" autofocus>
</div>
<div class="form-group">
<label class="font-weight-bold">Deskripsi Fasilitas Hotel</label>
<input type="textarea" name="txtInputDeskripsi"
class="form-control"   placeholder="Masukan Nama Fasilitas hotel" value="<?=$detailFasilitashotel[0]['deskripsi'];?>" >
</div>
<div class="form-group">
<label class="font-weight-bold">Foto Fasilitas</label><br/>
<?php
if (!empty($detailFasilitashotel[0]['foto'])) {
    echo '<img src="'.base_url("/gambar/".$detailFasilitashotel[0]['foto']).'"width="150">';
}
?>
<input type="file" name="txtInputFoto" class="form-control">
</div>
<div class="form-group">
<button class="btn btn-primary">Simpan Fasilitas Hotel</button>
</div>
</form>
<?= $this->endSection() ?>