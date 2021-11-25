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