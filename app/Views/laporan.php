<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Laporan</h2>
<form method="POST" action="/inv" enctype="multipart/form-data">
<div class="box-body">
<label class="font-weight-bold">Tanggal</label>
<input type="text" name="txttanggal"autocomplete="off" autofocus>
</div>
<div class="form-group">
<label class="font-weight-bold">Status </label>
<input type="text" name="txtstatus"class="from form-control">
<option value="">-- Pilih Status --</option>
<option value="">CHECK IN</option>
<option value="">CHECK OUT</option>
<option value="">SELESAI</option>
</div>
</div>
<div class="form-group">
<button class="btn btn-primary btn-lg" type="submit">
    <li class="fa fa-print"></li>Lihat Data</button>
</div>
</form>
<?= $this->endSection() ?>