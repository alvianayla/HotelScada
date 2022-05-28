<?= $this->extend('Users/Template') ?>
<?= $this->section('content') ?>
<section id="hero" class="d-flex align-items-center">
    <div class="container d-flex flex-column align-items-center" data-aos="zoom-in" data-aos-delay="100">
      <h1>Hotel SCADA</h1>
      <h2>I'm a professional illustrator from San Francisco</h2>
      <form action="/cek" method="post" >
        <div>
        <input type="text" class="form" placeholder="Masukan Email Tamu" name="keyword">
        <button class="btn-about" type="submit" id="submit">Cek Reservasi</button>
        </div>
        <!-- <?php
        // if(isset($hasil_cari)){

        // }
        ?> -->
      </form>
    </div>
  </section>
<?= $this->endSection() ?>