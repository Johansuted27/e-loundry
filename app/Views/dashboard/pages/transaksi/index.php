<?= $this->extend('dashboard/layouts/master') ?>
<?= $this->section('content') ?>
<?php 
    $session = session();
    $success = $session->getFlashdata('success');
?>
<div class="br-pageheader pd-y-15 pd-l-20">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="">Dashboard</a>
        <span class="breadcrumb-item active">History Transaksi</span>
    </nav>
</div>

<div class="br-pagebody">
    <div class="br-section-wrapper">

        <div class="card">
            <div class="card-header d-flex">
                <p class="mb-0 mt-1">History Transaksi</p>
            </div>
            <div class="card-body">
                <?php if($success){ ?>
                    <div class="alert alert-success w-100 mx-auto">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong><?php echo $success?></strong>
                    </div>
                <?php } ?>
                <div class="table-wrapper">
                    <table id="datatable1" class="table dt-responsive nowrap" width="100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Code</th>
                                <th>Total</th>
                                <th>Tgl Pengambilan</th>
                                <th>Type</th>
                                <th>Bukti Pembayaran</th>
                                <th>Bukti Pickup</th>
                                <th>Bukti Drop Off</th>
                                <th>Status</th>
                                <th>Aksi</th>
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
                                        <div class="text-center">
                                            <button type="button" class="btn btn-success btn-sm btn-bukti" data-toggle="modal" data-target="#modalPriviewImg" data-img="<?= $trxs['bukti_tf']; ?>">
                                                <i class="fa fa-image"></i>
                                            </button>
                                        </div>
                                    <?php } else { ?>  
                                        <small class="text-info text-danger">Belum Unggah</small>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php if ($trxs['status'] == 'Belum di Bayar' || $trxs['status'] == 'Sedang di Konfirmasi') { ?>
                                        <small class="text-info text-danger">Menunggu Pembayaran</small>
                                    <?php } else { ?>
                                        <?php if ($trxs['img_pick_up']) { ?>
                                        <i class="text-info">Sudah Unggah</i>
                                        <?php } else { ?>  
                                            <button type="button" class="btn btn-success btn-sm btn-upload-pickup" data-toggle="modal" data-target="#modalUploadPickUp" data-id="<?= $trxs['id']; ?>">
                                                <i class="fa fa-upload"></i>
                                            </button>
                                        <?php } ?>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php if ($trxs['status'] == 'Belum di Bayar' || $trxs['status'] == 'Sedang di Konfirmasi') { ?>
                                        <small class="text-info text-danger">Menunggu Pembayaran</small>
                                    <?php } else { ?>
                                        <?php if ($trxs['img_drop_off']) { ?>
                                        <i class="text-info">Sudah Unggah</i>
                                        <?php } else { ?>  
                                            <button type="button" class="btn btn-info btn-sm btn-upload-dropoff" data-toggle="modal" data-target="#modalUploadDropOff" data-id="<?= $trxs['id']; ?>">
                                                <i class="fa fa-upload"></i>
                                            </button>
                                        <?php } ?>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php if ($trxs['status'] == 'Belum di Bayar') { ?>
                                        <div class="badge badge-danger"><?= $trxs['status']; ?></div>
                                    <?php } else { ?>
                                        <div class="badge badge-success"><?= $trxs['status']; ?></div>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php if ($trxs['status'] == 'Sedang di Konfirmasi') { ?>
                                        <a href="<?php echo base_url('/admin/history-transaction/ubah-status/'.$trxs['id']);?>" class="btn btn-success btn-sm"><i class="fa fa-check"></i></a>
                                    <?php } else { ?>
                                        <!-- <a href="<?php echo base_url('/admin/history-transaction/ubah-status/'.$trxs['id']);?>" class="btn btn-warning btn-sm"><i class="fa fa-times"></i></a> -->
                                    <?php } ?>
                                    <a href="<?php echo base_url('/admin/history-transaction/edit/'.$trxs['id']);?>" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                                    <a href="<?php echo base_url('/admin/history-transaction/delete/'.$trxs['id']);?>" onclick="return confirm('Yakin untuk menghapus data ini?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php } ?>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalUploadPickUp" tabindex="-1" aria-labelledby="modalUploadPickUpLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalUploadPickUpLabel">Unggah Bukti Pickup</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('/admin/history-transaction/upload-pickup') ?>" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
            <input type="hidden" name="id" id="transaction_id_pickup">
            <input type="file" name="img_pick_up" id="img_pick_up" class="form-control" required>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
            <button type="submit" class="btn btn-primary">Upload</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalPriviewImg" tabindex="-1" aria-labelledby="modalPriviewImgLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalPriviewImgLabel">Bukti Pembayaran</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="w-75 mx-auto">
                <img src="" id="img-bukti" width="100%" alt="">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
        </div>
        </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalUploadDropOff" tabindex="-1" aria-labelledby="modalUploadDropOffLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalUploadDropOffLabel">Unggah Bukti Dropoff</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('/admin/history-transaction/upload-dropoff') ?>" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
            <input type="hidden" name="id" id="transaction_id_dropoff">
            <input type="file" name="img_drop_off" id="img_drop_off" class="form-control" required>
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
<script>
    $(".btn-upload-pickup").on('click', function () {
        document.getElementById("transaction_id_pickup").value = '';

        let id = $(this).attr('data-id');
        console.log(id);

        document.getElementById("transaction_id_pickup").value = id;
    });

    $(".btn-upload-dropoff").on('click', function () {
        let id = $(this).attr('data-id');
        // console.log(id);

        document.getElementById("transaction_id_dropoff").value = id;
    });

    $(".btn-bukti").on('click', function () {
        let img = $(this).attr('data-img');
        let base_url = '<?php echo base_url() ?>';
        // console.log(base_url+'/uploads/bukti/'+img);

        document.getElementById("img-bukti").src = base_url+'/uploads/bukti/'+img;
    });
</script>
<?= $this->endSection() ?>