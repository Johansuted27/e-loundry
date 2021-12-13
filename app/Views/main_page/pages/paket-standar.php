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
                    <h2 class="text-uppercase text-center text-white mb-3">Paket Standar</h2>
                    <div class="mx-auto" style="width: 50px; height: 3px; background-color:white;"></div>
                </div>
            </div>
        </div>
    </section>
    <section class="page-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card mx-auto" style="width: 80%;">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Jenis Laundry</label>
                                <select name="jenis_laundry" id="jenis_laundry" class="custom-select">
                                    <option value="" selected disabled>-- Pilih --</option>
                                    <option value="kiloan">Kiloan</option>
                                    <option value="satuan">Satuan</option>
                                </select>
                            </div>
                            <div id="form-satuan">
                                <hr>
                                <h5>Paket Satuan</h5>
                                <hr>
                                <form action="/transaction" method="post" id="formSatuan">
                                    <input type="hidden" name="paket_id" value="2">
                                    <input type="hidden" name="type_paket" value="satuan">
                                    <input type="hidden" name="estimasi" value="0">
                                    <button class="btn btn-success btn-sm mb-3" id="add-product" type="button"><i class="fa fa-plus-circle"></i></button>
                                    <table class="table table-bordered" id="tbl_product">
                                        <thead>
                                            <tr>
                                                <th>Barang</th>
                                                <th>Harga</th>
                                                <th>Jumlah</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbody-product">
                                        </tbody>
                                    </table>
                                    <div class="form-group">
                                        <label>Tanggal Pengambilan</label>
                                        <input type="date" name="tgl_pengambilan" id="tgl_pengambilan" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Total</label>
                                        <input type="hidden" name="total" id="total_pesanan_hd" class="form-control" readonly>
                                        <input type="text" name="" id="total_pesanan" class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit">Pesan Sekarang</button>
                                    </div>
                                </form>
                            </div>
                            <div id="form-kiloan">
                                <hr>
                                <h5>Paket Kiloan</h5>
                                <p class="text-danger m-0">Harga akan diupdate disaat pegawai kami datang kerumah anda!</p>
                                <hr>
                                <form action="/transaction" method="post" id="formKiloan">
                                    <input type="hidden" name="paket_id" value="2">
                                    <input type="hidden" name="type_paket" value="kiloan">
                                    <div class="form-group">
                                        <label>Paket Laundry</label>
                                        <?php
                                            foreach($estimasi as $estimasis) {
                                        ?>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="estimasi" id="estimasi_kiloan" value="<?= $estimasis['id'] ?>" data-harga="<?= $estimasis['harga_estimasi'] ?>" required>
                                            <label class="form-check-label" for="estimasi_kiloan">
                                                <?= $estimasis['nama_estimasi'] ?>
                                            </label>
                                            <small class="text-danger"><?= "Rp " . number_format($estimasis['harga_estimasi'],2,',','.') ?></small>
                                        </div>
                                        <?php } ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Pengambilan</label>
                                        <input type="date" name="tgl_pengambilan" id="tgl_pengambilan" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Total</label>
                                        <input type="hidden" name="total" id="total_pesanan_kiloan_hd" class="form-control" required readonly>
                                        <input type="text" name="" id="total_pesanan_kiloan" class="form-control" disabled>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit">Pesan Sekarang</button>
                                    </div>
                                </form>
                            </div>
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

  <!-- Custom scripts for this template -->

    <script>
        $('input[type=radio][name=estimasi]').change(function() {
            let harga = $(this).attr('data-harga');
            // console.log(val);
            $("#total_pesanan_kiloan").val(convertToRupiah(harga));
            $("#total_pesanan_kiloan_hd").val(harga);
        });

        document.getElementById("form-satuan").style.display = 'none';
        document.getElementById("form-kiloan").style.display = 'none';
        $('#jenis_laundry').on('change', function ()  {
            document.getElementById("formSatuan").reset();
            document.getElementById("formKiloan").reset();
            $('#tbody-product').empty().append();
            let val = $(this).val();
            if (val === "kiloan") {
                document.getElementById("form-kiloan").style.display = 'block';
                document.getElementById("form-satuan").style.display = 'none';
            } else {
                document.getElementById("form-kiloan").style.display = 'none';
                document.getElementById("form-satuan").style.display = 'block';
            }
        });

        let j = 0;
        $("#add-product").click(function () {
            j += 1;
            $("#tbody-product").append(
                `
                <tr id="rowproduct${j}">
                    <td>
                        <select name="product[]" id="product_id${j}" class="custom-select" required>
                        <option value="" selected disabled>-- Pilih --</option>
                        <?php
                            foreach($product as $products) {
                        ?>
                        <option value="<?= $products['id'] ?>"><?= $products['product_name'] ?></option>
                        <?php } ?>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="product_price" id="product_price${j}" class="form-control price_product" readonly>
                    </td>
                    <td>
                        <input type="number" name="qty[]" id="qty" class="form-control qty_product" required>
                    </td>
                    <td>
                    <button class="btn btn-danger btn-sm deleterowproduct" id="${j}" type="button"><i class="fa fa-times-circle"></i></button>
                    </td>
                </tr>
                `
            );

            $('#product_id' + j ).on('change', function () {
                let query = $(this).val();
                // console.log(query);
                $.ajax({
                    type: "POST",
                    url: "/ajax/produk/satuan",
                    data: {
                        'id': query
                    },
                    success: function (data) {
                        // console.log(data);
                        // console.log(JSON.parse(data));
                        let row = JSON.parse(data)
                        document.getElementById("product_price" + j).value = row.product_price;
                    }
                })
            });

            $(document).on('click', '.deleterowproduct', function(){
                document.getElementById("total_pesanan").value = '';
                let button_hapus = $(this).attr("id");
                j = button_hapus - 1;
                $('#rowproduct'+button_hapus+'').remove();
                total('product');
            });

        });

        function convertToRupiah(angka)
        {
            var rupiah = '';		
            var angkarev = angka.toString().split('').reverse().join('');
            for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
            return 'Rp. '+rupiah.split('',rupiah.length-1).reverse().join('');
        }

        $(document).on('keyup', '.qty_product', function(){
            total('product');
        });

        function total(cat){
            var sum = 0;
            $('#tbl_product > tbody  > tr').each(function() {
                var qty = $(this).find('.price_product').val();
                var price = $(this).find('.qty_product').val();
                var amount = (qty*price);
                sum+=amount;
            });

            $("#total_pesanan").val(convertToRupiah(sum));
            $("#total_pesanan_hd").val(sum);
        }

    </script>

  <?= $this->renderSection('add-script') ?>
</body>

</html>