<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Anis laundry</title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url('/main_page/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
  
  <!-- Custom fonts for this template -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="<?php echo base_url('/main_page/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
  <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700;800&family=Roboto:wght@300;400;500;700&family=Source+Sans+Pro:wght@400;600;700;900&display=swap"
      rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
      rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?php echo base_url('/main_page/css/style.css') ?>" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Anis Laundry</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">Tentang Kami</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#services">Layanan Kami</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">Kontak Kami</a>
          </li>
          <?php if (!session()->get('isLogin')){ ?>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="<?php echo base_url('/login') ?>"><i class="fa fa-sign-in-alt"></i> Login</a>
            </li>
          <?php } else { ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Akun
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="<?php echo base_url('/list/pesanan') ?>">Pesanan</a>
                <a class="dropdown-item" href="<?php echo base_url('/my-profile') ?>">Profile</a>
                <a class="dropdown-item" href="<?php echo base_url('/logout') ?>">Logout</a>
              </div>
            </li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Header -->
  <header class="masthead" id="home">
    <div class="container">
      <div class="intro-text">
        <div class="intro-heading">Laundry and Dry Cleaning</div>
        <div class="intro-lead-in">
        Laundry antar jemput daerah Jakarta Selatan dan sekitarnya. Hemat waktu dan simpel buat kamu yang #mager
        </div>
        <?php if (!session()->get('isLogin')){ ?>
          <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger px-4" style="border-radius: 30px;" href="<?= base_url("/login") ?>">Laundry Sekarang</a>
        <?php } else { ?>
          <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger px-4" style="border-radius: 30px;" href="<?= base_url("/pesan") ?>">Laundry Sekarang</a>
        <?php } ?>
      </div>
    </div>
  </header>

  <!-- About -->
  <section class="page-section" id="about">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 mb-4">
                <img src="<?php echo base_url('/main_page/img/img-about.png') ?>" class="img-hover-zoom" width="100%" alt="">
            </div>
            <div class="col-xl-6 align-self-center">
              <h2 class="section-heading text-primary">Tentang Kami</h2>
              <h3 class="section-subheading">
              Nikmati layanan fasilitas laundry antar jemput. Anis-Laundry hadir membantu anda mencuci pakaian di wilayah Jakarta Selatan dan sekitarnya. Melayani dengan senang hati untuk membantu mencuci pakaian anda. Anis-Laundry mempunyai standar khusus yang memudahkan anda tanpa harus repot datang. Setiap pengguna jasa yang masuk di laundry kami, ditangani oleh pekerja yang terlatih dan berkomitmen. Dengan memanfaatkan teknologi, mempermudah anda tanpa repot datang ke laundry Dengan memanfaatkan teknologi, mempermudah anda tanpa repot datang ke laundry kami. Jangan ragu untuk menjadikan kami sebagai bagian dari mitra laundry dalam membantu anda mencuci pakaian. 
              </h3>
            </div>
        </div>
    </div>
  </section>

  <section class="page-section bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-primary">Bagaimana itu bekerja?</h2>
          <h3 class="section-subheading text-muted">Empat langkah sederhana</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <ul class="timeline">
            <li>
              <div class="timeline-image">
                <img class="rounded-circle img-fluid img-hover-zoom" src="<?php echo base_url('/main_page/img/steps/s1.jpg') ?>" alt="">
              </div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h4 class="text-primary">Tahap 1</h4>
                  <h4 class="subheading">Antar / ambil pakaian</h4>
                </div>
                <div class="timeline-body">
                  <p class="text-muted">
                  Layanan antar jemput membuat anda mudah dan hemat waktu cukup siapkan pakaian kotor, Anis-Laundry akan sigap menjemput pakaian kotor anda.
                  </p>
                </div>
              </div>
            </li>
            <li class="timeline-inverted">
              <div class="timeline-image">
                <img class="rounded-circle img-fluid img-hover-zoom" src="<?php echo base_url('/main_page/img/steps/s2.jpg') ?>" alt="">
              </div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h4 class="text-primary">Tahap 2</h4>
                  <h4 class="subheading">Mencuci dan menyetrika</h4>
                </div>
                <div class="timeline-body">
                  <p class="text-muted">
                    Anis-Laundry mencuci dan menyetrika dengan jaminan higienis karena Anis-Laundry menganut konsep 1 mesin cuci hanya untuk 1 pengguna jasa tidak dicampur dengan pengguna jasa yang lain. Konsep ini juga dapat meminimalisir pakaian tertukar dengan pengguna jasa lain.
                  </p>
                </div>
              </div>
            </li>
            <li>
              <div class="timeline-image">
                <img class="rounded-circle img-fluid img-hover-zoom" src="<?php echo base_url('/main_page/img/steps/s3.jpg') ?>" alt="">
              </div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h4 class="text-primary">Tahap 3</h4>
                  <h4 class="subheading">Akan selesai dalam waktu 24 jam</h4>
                </div>
                <div class="timeline-body">
                  <p class="text-muted">
                    Anis-Laundry melayani layanan selesai dalam waktu 24 jam dengan menyediakan beberapa paket dengan layanan express dan reguler dengan jaminan kebersihan yang tetap terjaga.
                  </p>
                </div>
              </div>
            </li>
            <li class="timeline-inverted">
              <div class="timeline-image">
                <img class="rounded-circle img-fluid img-hover-zoom" src="<?php echo base_url('/main_page/img/steps/s4.jpg') ?>" alt="">
              </div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h4 class="text-primary">Tahap 4</h4>
                  <h4 class="subheading">Laundry siap diambil / diantar</h4>
                </div>
                <div class="timeline-body">
                  <p class="text-muted">
                    Kami membebaskan pengguna jasa kami untuk memilih pakaian ambil sendiri atau diantar. Jika memilih layanan ambil sendiri, maka pengguna jasa bisa memilih jadwal pengambilan kapan saja. Jika pengguna memilih layanan antar, maka staff kami akan mengantar pakaian sesuai jadwal.
                  </p>
                </div>
              </div>
            </li>
            <li class="timeline-inverted">
              <div class="timeline-image">
                <h4>Laundry
                  <br>telah selesai,
                  <br>Terimakasih!</h4>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- Services -->
  <section class="page-section" id="services">
    <div class="container">
        <div class="row" id="about">
            <div class="col-xl-6 order-xl-first align-self-center mb-3">
              <h2 class="section-heading text-primary">Layanan Kami</h2>
              <h3 class="section-subheading">
                Anda bisa mendapatkan cucian bersih tanpa meninggalkan rumah dengan menggunakan layanan penjemputan dan pengiriman kami. Kami mengambil cucian Anda, mencuci, mengeringkan dan melipatnya, lalu mengantarnya keesokan harinya. Dengan penjemputan dan pengantaran gratis serta sanitasi ozon yang termasuk dalam harga per pon kami yang rendah, ini adalah layanan Superior Laundry yang paling nyaman dan bernilai tinggi.  
              </h3>
            </div>
            <div class="col-xl-6 order-first mb-4">
                <div class="row">
                    <div class="col-lg-4 col-6 mt-3">
                        <img src="<?php echo base_url('/main_page/img/services/dry.png') ?>" class="box-services" width="100%" alt="">
                    </div>
                    <div class="col-lg-4 col-6 mt-3">
                        <img src="<?php echo base_url('/main_page/img/services/dry_cleaning.png') ?>" class="box-services" width="100%" alt="">
                    </div>
                    <div class="col-lg-4 col-6 mt-3">
                        <img src="<?php echo base_url('/main_page/img/services/laundry.png') ?>" class="box-services" width="100%" alt="">
                    </div>
                    <div class="col-lg-4 col-6 mt-3">
                        <img src="<?php echo base_url('/main_page/img/services/wash.png') ?>" class="box-services" width="100%" alt="">
                    </div>
                    <div class="col-lg-4 col-6 mt-3">
                        <img src="<?php echo base_url('/main_page/img/services/fold.png') ?>" class="box-services" width="100%" alt="">
                    </div>
                    <div class="col-lg-4 col-6 mt-3">
                        <img src="<?php echo base_url('/main_page/img/services/ironing.png') ?>" class="box-services" width="100%" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>

  <!-- Contact -->
  <section class="page-section" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading" style="margin-bottom: 75px;">Hubungi Kami!</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 mb-3 mb-md-0">
          <div class="card py-4 h-100">
            <div class="card-body text-center">
              <i class="fas fa-map-marked-alt text-primary mb-2"></i>
              <p class="text-uppercase m-0">Alamat</p>
              <hr class="my-4">
              <div class="small text-black-50">
                Jl. Kemandoran Pluis No.5 6 14, RT.6/RW.14, Grogol Utara, Kec. Kby. Lama, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12210
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4 mb-3 mb-md-0">
          <div class="card py-4 h-100">
            <div class="card-body text-center">
              <i class="fas fa-envelope text-primary mb-2"></i>
              <p class="text-uppercase m-0">Email</p>
              <hr class="my-4">
              <div class="small text-black-50">
                <a href="#">anislaundry@gmail.com</a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4 mb-3 mb-md-0">
          <div class="card py-4 h-100">
            <div class="card-body text-center">
              <i class="fas fa-mobile-alt text-primary mb-2"></i>
              <p class="text-uppercase m-0">No Telp</p>
              <hr class="my-4">
              <div class="small text-black-50">(+62) 123 1234 1234</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer">
    <div class="container">
      <div class="row align-items-center">
        <!-- <div class="col-md-4">
          <span class="copyright">Copyright &copy; Your Website 2019</span>
        </div> -->
        <div class="col-md-12">
          <p class="mb-2">
            <a class="font-logo js-scroll-trigger" href="#page-top">Anis Laundry</a>
          </p>
          <ul class="list-inline quicklinks mb-2">
            <li class="list-inline-item ml-3">
              <a href="#">Beranda</a>
            </li>
            <li class="list-inline-item ml-3">
              <a href="#about">Tentang Kami</a>
            </li>
            <li class="list-inline-item ml-3">
              <a href="#services">Layanan Kami</a>
            </li>
            <li class="list-inline-item ml-3">
              <a href="#contact">Kontak Kami</a>
            </li>
          </ul>
          <ul class="list-inline social-buttons mb-3">
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-instagram"></i>
              </a>
            </li>
          </ul>
          <p class="m-0 w-50 mx-auto text-muted">
            Laundry antar jemput daerah Jakarta Selatan dan sekitarnya. Hemat waktu dan simpel buat kamu yang #mager
          </p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="<?php echo base_url('/main_page/vendor/jquery/jquery.min.js') ?>"></script>
  <script src="<?php echo base_url('/main_page/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

  <!-- Plugin JavaScript -->
  <script src="<?php echo base_url('/main_page/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

  <!-- Contact form JavaScript -->
  <script src="<?php echo base_url('/main_page/js/jqBootstrapValidation.js') ?>"></script>
  <script src="<?php echo base_url('/main_page/js/contact_me.js') ?>"></script>

  <!-- Custom scripts for this template -->
  <script src="<?php echo base_url('/main_page/js/agency.min.js') ?>"></script>

</body>

</html>
