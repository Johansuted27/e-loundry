<?= $this->extend('dashboard/layouts/master') ?>
<?= $this->section('content') ?>
<?php 
$session = session();
$error = $session->getFlashdata('error');
?>
<div class="br-pageheader pd-y-15 pd-l-20">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="">Dashboard</a>
        <span class="breadcrumb-item active">Edit Data Paket Layanan</span>
    </nav>
</div>

<div class="br-pagebody">
    <div class="br-section-wrapper">

        <div class="card">
            <div class="card-header d-flex">
                <p class="mb-0 mt-1">Edit Data Paket Layanan</p>
                <a href="<?= route_to('p_layananIndex') ?>" class="btn btn-warning btn-sm ml-auto"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
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
                <form action="<?php echo base_url('admin/master/paket-layanan/update/'.$layanan['id']);?>" method="post" enctype="multipart/form-data">
                    <div class="row mg-b-25">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Nama Paket: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="nama_paket" placeholder="Masukan nama paket" value="<?= $layanan['nama_paket'] ?>"
                                    required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Keterangan: <span class="tx-danger">*</span></label>
                                <textarea name="description" id="description" cols="30" rows="10" class="form-control" placeholder="Masukan keterangan" value="<?= $layanan['description'] ?>" required><?= $layanan['description'] ?></textarea>
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