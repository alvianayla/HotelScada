<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Penambahan Data Kamar</h2>
<p>Silahkan gunakan form dibawah ini untuk mendata kamar
baru.</p>
<form method="POST" action="/kamar/simpan" enctype="multipart/form-data">
<div class="form-group">
<label class="font-weight-bold">No Kamar</label>
<input type="text" name="txtInputNo"
class="form-control" placeholder="Masukan No Kamar"
autocomplete="off" autofocus>
</div>
<div class="form-group">
<label class="font-weight-bold">Tipe Kamar</label>
<input type="text" name="txtInputTipe"
class="form-control" placeholder="Masukan Tipe Kamar" autocomplete="off">
</div>
<div class="form-group">
<label class="font-weight-bold">Deskripsi</label>
<input type="textarea" name="txtInputDeskripsi"
class="form-control" autocomplete="off">
</div>
<div class="form-group">
<label class="font-weight-bold">Harga kamar</label>
<input type="textarea" name="txtInputHarga"
class="form-control" autocomplete="off">
</div>
<div class="form-group">
<label class="font-weight-bold">Fasilitas kamar</label>
<input type="textarea" name="txtInputFasilitas"
class="form-control" autocomplete="off">
</div>
</div>
<div class="form-group">
<label class="font-weight-bold">Jumlah kamar</label>
<input type="textarea" name="txtInputJumlah"
class="form-control" autocomplete="off">
</div>
<div class="form-group">
<label class="font-weight-bold">Foto</label>
<input type="file" name="txtInputFoto"
class="form-control" >
</div>
<div class="form-group">
<button class="btn btn-primary">Simpan Kamar</button>
</div>
</form>
<?= $this->endSection() ?>