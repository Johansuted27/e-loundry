<?= $this->extend('dashboard/layouts/master') ?>
<?= $this->section('content') ?>
<?php 
$session = session();
$error = $session->getFlashdata('error');
?>
<div class="br-pageheader pd-y-15 pd-l-20">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="">Dashboard</a>
        <span class="breadcrumb-item active">Edit Data User</span>
    </nav>
</div>

<div class="br-pagebody">
    <div class="br-section-wrapper">

        <div class="card">
            <div class="card-header d-flex">
                <p class="mb-0 mt-1">Edit Data User</p>
                <a href="<?= base_url('/admin/master/user') ?>" class="btn btn-warning btn-sm ml-auto"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
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
                <form action="<?php echo base_url('admin/master/user/update/'.$user['id']);?>" method="post" enctype="multipart/form-data">
                    <div class="row mg-b-25">
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
                                        <input class="form-control" type="text" name="name" placeholder="Masukan nama" value="<?= $user['name'] ?>"
                                            required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Tanggal Lahir: <span
                                                class="tx-danger">*</span></label>
                                        <input class="form-control" type="date" name="dob" value="<?= $user['dob'] ?>" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Jenis Kelamin: <span
                                                class="tx-danger">*</span></label>
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
                                <label class="form-control-label">Alamat: <span class="tx-danger">*</span></label>
                                <textarea name="address" id="address" cols="30" rows="13" class="form-control"
                                    placeholder="Masukan alamat ..." value="<?= $user['address'] ?>" required><?= $user['address'] ?></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="email" name="email" placeholder="Masukan email" value="<?= $user['email'] ?>"
                                    required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Password: <span class="tx-danger">*</span></label>
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
<?= $this->endSection() ?>