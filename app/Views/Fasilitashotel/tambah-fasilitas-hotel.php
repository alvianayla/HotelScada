<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Penambahan Data Fasilitas Hotel</h2>
<p>Silahkan gunakan form dibawah ini untuk mendata fasilitas hotel
baru.</p>
<form method="POST" action="/fasilitas-hotel/simpan" enctype="multipart/form-data">
<div class="form-group">
<label class="font-weight-bold">Nama Fasilitas Hotel</label>
<input type="text" name="txtInputNama"
class="form-control" placeholder="Masukan Nama Fasilitas Hotel"
autocomplete="off" autofocus>
</div>
<div class="form-group">
<label class="font-weight-bold">Deskripsi Fasilitas</label>
<input type="textarea" name="txtInputDeskripsi"
class="form-control" id="exampleFormControlTextareal" placeholder="Masukan Deskripsi Fasilitas Hotel">
</div>
<div class="form-group">
<label class="font-weight-bold">Foto Fasilitas</label>
<input type="file" name="txtInputFoto"
class="form-control" >
</div>
<div class="form-group">
<button class="btn btn-primary">Simpan Fasilitas Hotel</button>
</div>
</form>
<?= $this->endSection() ?>