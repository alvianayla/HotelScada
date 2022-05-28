<?= $this->extend('Users/Template') ?>
<?= $this->section('content') ?>
<div class="row">
          <div class="col-md-12">
            <div class="card mb-4 mt-4 box-shadow">
              <div class="card-body">
                <h3 class="text-center">REGISTER</h3>
                <form action="<?= base_url() ?>index.php/Auth" method="POST">
                <div class="form-group">
                    <label>NIK</label>
                    <input type="text" name="nik" class="form form-control">
                    </div>
                   <div class="form-group">
                   <label>NAMA</label>
                   <input type="text" name="nama" class="form form-control">
                   </div>
                   <div class="form-group">
                   <label>email</label>
                   <input type="text" name="txtemail" class="form form-control">
                   </div>
                   <div class="form-group">
                   <label>Alamat</label>
                   <input type="textarea" name="alamat" class="form form-control">
                   </div>
                   <div class="form-group">
                   <label>Password</label>
                   <input type="textarea" name="txtPassword" class="form form-control">
                   </div>
                   <div class="form-group">
                   <label>No-Telp</label>
                   <input type="number" name="no_tlp" class="form form-control">
                   </div>
                   <div class="form-group">
                    <button class="btn btn-outline-primary btn-md">REGISTER</button>
                 </div>
                <p> Jika sudah mempunyai Account silahkan untuk login <a href="login">disini.</a>
               </p>
              </div>
            </div>
          </div>
        </div>
<?= $this->endSection() ?>