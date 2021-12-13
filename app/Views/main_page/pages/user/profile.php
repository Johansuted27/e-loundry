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
    <link rel = "stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">

  <!-- Custom styles for this template -->
  <link href="<?php echo base_url('/main_page/css/style.css') ?>" rel="stylesheet">
  <?= $this->renderSection('add-style') ?>
</head>

<body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="mainNav" style="padding-top: 0; padding-bottom: 0;">
        <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="<?= base_url() ?>" style="font-size: 1.25em; padding: 12px 0;">Anis Laundry</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="<?= base_url() ?>">Beranda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="<?= base_url() ?>">Tentang Kami</a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="<?= base_url() ?>">Layanan Kami</a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="<?= base_url() ?>">Kontak Kami</a>
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

    
    <section class="page-section" style="background-color: #72b8e9;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="text-uppercase text-center text-white mb-3">Profile Diri</h2>
                    <div class="mx-auto" style="width: 50px; height: 3px; background-color:white;"></div>
                </div>
            </div>
        </div>
    </section>
    <section class="page-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">  
                    <div class="card">
                        <div class="card-body">
                            <form action="<?php echo base_url('/my-profile/ubah/'.$user['id']);?>" method="post" enctype="multipart/form-data">
                                <div class="row mg-b-25">
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">Name: <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="name" placeholder="Masukan nama" value="<?= $user['name'] ?>"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">Tanggal Lahir: <span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control" type="date" name="dob" value="<?= $user['dob'] ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">Jenis Kelamin: <span
                                                            class="text-danger">*</span></label>
                                                    <select name="gender" id="gender" class="form-control" required>
                                                        <option value="" selected disabled>-- Pilih --</option>
                                                        <option value="l" <?php if ($user['gender'] == 'l') { ?> selected <?php } ?>>Laki - Laki</option>
                                                        <option value="p" <?php if ($user['gender'] == 'p') { ?> selected <?php } ?>>Perempuan</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Alamat: <span class="text-danger">*</span></label>
                                            <textarea name="address" id="address" cols="30" rows="13" class="form-control"
                                                placeholder="Masukan alamat ..." value="<?= $user['address'] ?>" required><?= $user['address'] ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <hr>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Email: <span class="text-danger">*</span></label>
                                            <input class="form-control" type="email" name="email" placeholder="Masukan email" value="<?= $user['email'] ?>"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Password: <span class="text-danger">*</span></label>
                                            <input class="form-control" type="password" name="password"
                                                placeholder="Masukan password">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-layout-footer">
                                    <button class="btn btn-info">Simpan</button>
                                </div>
                            </form>
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
                <a href="<?php echo base_url('') ?>">Beranda</a>
                </li>
                <li class="list-inline-item ml-3">
                <a href="<?php echo base_url('') ?>">Tentang Kami</a>
                </li>
                <li class="list-inline-item ml-3">
                <a href="<?php echo base_url('') ?>">Layanan Kami</a>
                </li>
                <li class="list-inline-item ml-3">
                <a href="<?php echo base_url('') ?>">Kontak Kami</a>
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

    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(".btn-upload").on('click', function () {
            let id = $(this).attr('data-id');
            // console.log(id);

            document.getElementById("transaction_id").value = id;
        })
        $(document).ready(function() {
            $('#table-transaksi').DataTable();
        } );
    </script>

  <!-- Custom scripts for this template -->
  <?= $this->renderSection('add-script') ?>
</body>

</html>