<?= $this->extend('main_page/layouts/main') ?>
<?= $this->section('add-style') ?>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
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
<?= $this->endSection() ?>
<?= $this->section('add-script') ?>
<?= $this->endSection() ?>