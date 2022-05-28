<?= $this->extend('Users/Template') ?>
<?= $this->section('content') ?>
<div class="row">
          <div class="col-md-12">
            <div class="card mb-4 mt-4 box-shadow">
              <div class="card-body">
                <h3 class="text-center">LOGIN</h3>
                <form action="<?= base_url() ?>index.php/Auth" method="POST">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form form-control">
                    </div>
                   <div class="form-group">
                   <label>Password</label>
                   <input type="text" name="username" class="form form-control">
                   </div>
                   <div class="form-group">
                    <button class="btn btn-outline-primary btn-md">LOGIN</button>
                 </div>
                <p> Jika belum mempunyai Account silahkan untuk daftar <a href="register">disini.</a>
               </p>
              </div>
            </div>
          </div>
        </div>
        <?= $this->endSection() ?>