<?= $this->extend('Users/Template') ?>
<?= $this->section('content') ?>

<h3 class="text-muted">Kamar</h3>
        <div class="row">
          <?php foreach ($Listkamar as $row){?>
        <div class="col-md-5">
            <div class="card mb-6 mt-2 box-shadow">
              <div class="card-header">   
                <img class="img img-thumbnail"  src="<?= base_url("/gambar/".$row['foto']);?>"> 
                
              </div>
              <div class="card-body">
              <strong><?= $row['deskripsi']?></strong> <br> <br>
                <hr>
                <strong><?= $row['tipe_kamar']?></strong> <br>
                <strong>Jumlah Kamar <?=$row['jumlahkamar']?></strong> <br>
                <strong><?=$row['fasilitas_kamar']?></strong> <br>
                <strong>Rp. <?=$row['harga_kamar']?></strong> <br>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <a href="/form-reservasi "><button type="button" class="btn btn-sm btn-outline-secondary">Book Now</button></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>

<?= $this->endSection() ?>