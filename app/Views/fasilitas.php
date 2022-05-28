<?= $this->extend('Users/Template') ?>
<?= $this->section('content') ?>

<h3 class="text-muted">Fasilitas Hotel</h3>
        <div class="row">
        <?php foreach ($ListFasilitashotel as $row){?>
          <div class="col-md-6">
            <div class="card mb-4 mt-2 box-shadow">
              <div class="card-body">
              <img class="img img-thumbnail" src="<?= base_url("/gambar/".$row['foto']);?>">
              </div>
              <div class="card-footer">
              <hr>
                <strong><?= $row['nama_fasilitas']?></strong> <br>
              </div>
            </div>
          </div>
      <?php } ?>
        </div>
<?= $this->endSection() ?>