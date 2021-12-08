<?= $this->extend('main_page/layouts/main') ?>
<?= $this->section('add-style') ?>
    <link rel = "stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
<?= $this->endSection() ?>
<?= $this->section('content') ?>
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
                <a href="<?= base_url('list/pesanan') ?>" class="btn btn-success mb-3">Lihat semua</a>
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
                        <tr>
                            <td>1</td>
                            <td><?= $trx['code_trx']; ?></td>
                            <td><?= "Rp " . number_format($trx['total_price'],2,',','.'); ?></td>
                            <td><?= $trx['tgl_pengambilan']; ?></td>
                            <td class="text-capitalize">Laundy <?= $trx['type']; ?></td>
                            <td>
                                <?php if ($trx['bukti_tf']) { ?>
                                    <i class="text-info">Sudah Unggah</i>
                                <?php } else { ?>  
                                    <button type="button" class="btn btn-primary btn-sm btn-upload" data-toggle="modal" data-target="#modalUpload" data-id="<?= $trx['id']; ?>">
                                        <i class="fa fa-upload"></i> Unggah Bukti
                                    </button>
                                <?php } ?>
                            </td>
                            <td>
                                <?php if ($trx['status'] == 'Belum di Bayar') { ?>
                                    <div class="badge badge-danger"><?= $trx['status']; ?></div>
                                <?php } else { ?>
                                    <div class="badge badge-info"><?= $trx['status']; ?></div>
                                <?php } ?>
                            </td>
                        </tr>
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

<?= $this->endSection() ?>
<?= $this->section('add-script') ?>
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
<?= $this->endSection() ?>