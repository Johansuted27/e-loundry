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
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Code</th>
                                <th>Total</th>
                                <th>Tanggal Pengambilan</th>
                                <th>Type</th>
                                <th>Bukti Pembayaran</th>
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
                                <td>
                                    <!-- <a href="<?php echo base_url('/admin/history-transaction/edit/'.$trxs['id']);?>" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a> -->
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
<?= $this->endSection() ?>