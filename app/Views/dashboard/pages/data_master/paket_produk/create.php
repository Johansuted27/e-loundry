<?= $this->extend('dashboard/layouts/master') ?>
<?= $this->section('content') ?>
<?php 
$session = session();
$error = $session->getFlashdata('error');
?>
<div class="br-pageheader pd-y-15 pd-l-20">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="">Dashboard</a>
        <span class="breadcrumb-item active">Tambah Data Paket Produk</span>
    </nav>
</div>

<div class="br-pagebody">
    <div class="br-section-wrapper">

        <div class="card">
            <div class="card-header d-flex">
                <p class="mb-0 mt-1">Tambah Data Paket Produk</p>
                <a href="<?= route_to('p_produkIndex') ?>" class="btn btn-warning btn-sm ml-auto"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
            </div>
            <div class="card-body">
                <?php if($error){ ?>
                <div class="alert alert-danger">
                    <strong>Maaf!</strong> Terjadi Kesalahan:
                    <ul>
                        <?php foreach($error as $e){ ?>
                        <li><?php echo $e ?></li>
                        <?php } ?>
                    </ul>
                </div>
                <?php } ?>
                <form action="<?= base_url('/admin/master/paket-produk/store') ?>" method="post" enctype="multipart/form-data">
                    <div class="row mg-b-25">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Nama Produk: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_name" placeholder="Masukan nama produk"
                                    required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Harga Produk: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="number" min="0" name="product_price" placeholder="Masukan harga produk"
                                    required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Kategory Produk: <span class="tx-danger">*</span></label>
                                <select name="product_category" id="product_category" class="form-control" required>
                                    <option value="" selected disabled>-- Pilih Kategory --</option>
                                    <option value="pakaian">Pakaian</option>
                                    <option value="non-pakaian">Non-Pakaian</option>
                                </select>
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
<?= $this->endSection() ?>