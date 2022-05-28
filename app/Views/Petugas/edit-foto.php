<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Perubahan Foto Kamar</h2>
<p>Silahkan gunakan form dibawah ini untuk merubah foto kamar</p>
<form method="POST" action="/kamar/updatefoto" enctype="multipart/form-data">
<div class="form-group">
<label class="font-weight-bold">No Kamar</label>
<input type="hidden" name="foto" class="form-control" value="<?=$detailKamar[0]['foto'];?>">
<input type="text" name="txtInputNo"
class="form-control" placeholder="Masukan No Kamar" value="<?=$detailKamar[0]['no_kamar'];?>" readonly>
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
<button class="btn btn-primary">Update Foto Kamar</button>
</div>
</form>
<?= $this->endSection() ?>