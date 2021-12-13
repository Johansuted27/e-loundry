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
                    <h2 class="text-uppercase text-center text-white mb-3">List Pesanan</h2>
                    <div class="mx-auto" style="width: 50px; height: 3px; background-color:white;"></div>
                </div>
            </div>
        </div>
    </section>
    <section class="page-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form action="<?= base_url('list/pesanan/code') ?>" method="post">
                        <div class="row">
                            <div class="col-10">
                                <input type="text" name="code_trx" class="form-control" placeholder="Nomor Transaksi">
                            </div>
                            <div class="col-2">
                                <button type="submit" class="btn btn-primary w-100">Cari</button>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <table id="table-transaksi" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Code</th>
                                <th>Total</th>
                                <th>Tanggal Pengambilan</th>
                                <th>Type</th>
                                <th>Bukti Pembayaran</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if($trx){ ?>
                            <?php
                                $no = 1; 
                                foreach($trx as $trxs) {
                            ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $trxs['code_trx']; ?></td>
                                <td><?= "Rp " . number_format($trxs['total_price'],2,',','.'); ?></td>
                                <td><?= $trxs['tgl_pengambilan']; ?></td>
                                <td class="text-capitalize">Laundy <?= $trxs['type']; ?></td>
                                <td>
                                    <?php if ($trxs['bukti_tf']) { ?>
                                        <i class="text-info">Sudah Unggah</i>
                                    <?php } else { ?>  
                                        <button type="button" class="btn btn-primary btn-sm btn-upload" data-toggle="modal" data-target="#modalUpload" data-id="<?= $trxs['id']; ?>">
                                            <i class="fa fa-upload"></i> Unggah Bukti
                                        </button>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php if ($trxs['status'] == 'Belum di Bayar') { ?>
                                        <div class="badge badge-danger"><?= $trxs['status']; ?></div>
                                    <?php } else { ?>
                                        <div class="badge badge-info"><?= $trxs['status']; ?></div>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php } ?>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>


    <!-- Modal -->
    <!-- Modal -->
    <div class="modal fade" id="modalUpload" tabindex="-1" aria-labelledby="modalUploadLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalUploadLabel">Unggah Bukti Pembayaran</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="<?= base_url('/upload-bukti') ?>" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
                <input type="hidden" name="id" id="transaction_id">
                <div class="form-group">
                    <label>Upload Bukti</label>
                    <input type="file" name="bukti_tf" id="bukti_tf" class="custom-file">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
                <button type="submit" class="btn btn-primary">Upload</button>
            </div>
        </form>
        </div>
    </div>
    </div>


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