<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Perubahan Data Kamar</h2>
<p>Silahkan gunakan form dibawah ini untuk merubah data kamar</p>
<form method="POST" action="/kamar/update" enctype="multipart/form-data">
<div class="form-group">
<label class="font-weight-bold">No Kamar</label>
<input type="text" name="txtInputNo"
class="form-control" placeholder="Masukan No Kamar" value="<?=$detailKamar[0]['no_kamar'];?>" readonly>
</div>
<div class="form-group">
<label class="font-weight-bold">Tipe Kamar</label>
<input type="text" name="txtInputTipe"
class="form-control" placeholder="Masukan Tipe Kamar" value="<?=$detailKamar[0]['tipe_kamar'];?>" >
</div>
<div class="form-group">
<label class="font-weight-bold">Deskripsi kamar</label>
<input type="textarea" name="txtInputDeskripsi"
class="form-control" placeholder="Masukan Deskripsi Kamar" value="<?=$detailKamar[0]['deskripsi'];?>" >
</div>
<div class="form-group">
<label class="font-weight-bold">Harga kamar</label>
<input type="textarea" name="txtInputHarga"
class="form-control" placeholder="Masukan harga kamar" value="<?=$detailKamar[0]['harga_kamar'];?>" >
</div>
</div>
<div class="form-group">
<label class="font-weight-bold">Fasilitas kamar</label>
<input type="textarea" name="txtInputFasilitas"
class="form-control" placeholder="Masukan Fasilitas kamar" value="<?=$detailKamar[0]['fasilitas_kamar'];?>" >
</div>
</div>
<div class="form-group">
<label class="font-weight-bold">Jumlah kamar</label>
<input type="textarea" name="txtInputJumlah"
class="form-control" placeholder="Masukan Jumlah" value="<?=$detailKamar[0]['jumlahkamar'];?>" >
</div>
</div>
<div class="form-group">
<label class="font-weight-bold">Foto Kamar</label><br/>
<?php
if (!empty($detailKamar[0]['foto'])) {
    echo '<img src="'.base_url("/gambar/".$detailKamar[0]['foto']).'"width="150">';
}
?>
<input type="file" name="txtInputFoto" class="form-control">
</div>
<div class="form-group">
<button class="btn btn-primary">Update Kamar</button>
</div>
</form>
<?= $this->endSection() ?>