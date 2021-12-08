<?= $this->extend('dashboard/layouts/master') ?>
<?= $this->section('content') ?>
<?php 
$session = session();
$error = $session->getFlashdata('error');
?>
<div class="br-pageheader pd-y-15 pd-l-20">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="">Dashboard</a>
        <span class="breadcrumb-item active">Edit History Transaksi</span>
    </nav>
</div>

<div class="br-pagebody">
    <div class="br-section-wrapper">

        <div class="card">
            <div class="card-header d-flex">
                <p class="mb-0 mt-1">Edit History Transaksi</p>
                <a href="<?= route_to('transactionIndex') ?>" class="btn btn-warning btn-sm ml-auto"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
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
                <form action="<?php echo base_url('admin/history-transaction/update/'.$trx['id']);?>" method="post" enctype="multipart/form-data">
                    <div class="row mg-b-25">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Code Transaksi: </label>
                                <input class="form-control" type="text" name="code_trx" value="<?= $trx['code_trx'] ?>" disabled required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Type Laundry: </label>
                                <input class="form-control" type="text" name="type" value="<?= $trx['type'] ?>" disabled required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Total: <span class="tx-danger">*</span></label>
                                <?php if ($trx['type'] == "satuan") { ?>
                                    <input class="form-control" type="text" name="total_price" value="<?= $trx['total_price'] ?>" readonly>
                                <?php } else { ?>
                                    <?php if ($trx['img_pick_up']) { ?>
                                        <input class="form-control" type="text" name="total_price" value="<?= $trx['total_price'] ?>" readonly>
                                    <?php } else { ?>
                                        <input class="form-control" type="text" name="total_price" value="<?= $trx['total_price'] ?>" required>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Tanggal Pengambilan: <span class="tx-danger">*</span></label>
                                <?php if ($trx['img_pick_up']) { ?>
                                    <input class="form-control" type="date" name="tgl_pengambilan" value="<?= $trx['tgl_pengambilan'] ?>" readonly>
                                <?php } else { ?>
                                    <input class="form-control" type="date" name="tgl_pengambilan" value="<?= $trx['tgl_pengambilan'] ?>" required>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-4 text-center">
                                    <p>Bukti Transfer</p>
                                    <?php if ($trx['bukti_tf']) { ?>
                                        <img src="<?= base_url('/uploads/bukti/'.$trx['bukti_tf']); ?>" width="100%" alt="">
                                    <?php } else { ?>
                                        <p class="text-danger"><i>Gambar belum ada</i></p>
                                    <?php } ?>
                                </div>
                                <div class="col-lg-4 text-center">
                                    <p>Bukti Pickup Barang</p>
                                    <?php if ($trx['img_pick_up']) { ?>
                                        <img src="<?= base_url('/uploads/bukti/pick-up/'.$trx['img_pick_up']); ?>" width="100%" alt="">
                                    <?php } else { ?>
                                        <p class="text-danger"><i>Gambar belum ada</i></p>
                                    <?php } ?>
                                </div>
                                <div class="col-lg-4 text-center">
                                    <p>Bukti Drop Off Barang</p>
                                    <?php if ($trx['img_drop_off']) { ?>
                                        <img src="<?= base_url('/uploads/bukti/drop-off/'.$trx['img_drop_off']); ?>" width="100%" alt="">
                                    <?php } else { ?>
                                        <p class="text-danger"><i>Gambar belum ada</i></p>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <hr>
                            <div class="form-group">
                                <label class="form-control-label">Status: <span class="tx-danger">*</span></label>
                                <select name="status" id="status" class="form-control" required>
                                    <option value="" disabled selected>-- Pilih Status --</option>
                                    <?php if ($trx['status'] == "Menunggu Pembayaran" || $trx['status'] == "Sedang di Konfirmasi" || $trx['status'] == "Laundry Selesai") { ?>
                                    <?php } else { ?>
                                        <!-- <option value="Menunggu Pembayaran" <?php if ($trx['status'] == 'Menunggu Pembayaran') { ?> selected disabled <?php } ?>>Menunggu Pembayaran</option> -->
                                        <!-- <option value="Sedang di Konfirmasi" <?php if ($trx['status'] == 'Sedang di Konfirmasi') { ?> selected disabled <?php } ?>>Sedang di Konfirmasi</option> -->
                                        <!-- <option value="Sudah di Bayar" <?php if ($trx['status'] == 'Sudah di Bayar') { ?> selected disabled <?php } ?>>Sudah di Bayar</option> -->
                                        <option value="Pengambilan Barang" <?php if ($trx['status'] == 'Pengambilan Barang') { ?> selected disabled <?php } ?>>Pengambilan Barang</option>
                                        <option value="Proses Laundry" <?php if ($trx['status'] == 'Proses Laundry') { ?> selected disabled <?php } ?>>Proses Laundry</option>
                                        <option value="Pengembalian Barang" <?php if ($trx['status'] == 'Pengembalian Barang') { ?> selected disabled <?php } ?>>Pengembalian Barang</option>
                                        <option value="Laundry Selesai" <?php if ($trx['status'] == 'Laundry Selesai') { ?> selected disabled <?php } ?>>Laundry Selesai</option>
                                    <?php } ?>
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