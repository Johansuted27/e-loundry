<?= $this->extend('dashboard/layouts/master') ?>
<?= $this->section('content') ?>
<?php 
    $session = session();
    $success = $session->getFlashdata('success');
?>
<div class="br-pageheader pd-y-15 pd-l-20">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="">Dashboard</a>
        <span class="breadcrumb-item active">Data Paket Estimasi</span>
    </nav>
</div>

<div class="br-pagebody">
    <div class="br-section-wrapper">

        <div class="card">
            <div class="card-header d-flex">
                <p class="mb-0 mt-1">Data Master Paket Estimasi</p>
                <a href="<?= route_to('p_estimasiCreate') ?>" class="btn btn-primary btn-sm ml-auto">Tambah Data</a>
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
                                <th>Nama Estimasi</th>
                                <th>Harga Estimasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if($estimasis){ ?>
                        <?php
                            $no = 1; 
                            foreach($estimasis as $estimasi) {
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $estimasi['nama_estimasi']; ?></td>
                            <td><?= "Rp " . number_format($estimasi['harga_estimasi'],2,',','.'); ?></td>
                            <td>
                                <a href="<?php echo base_url('/admin/master/paket-estimasi/edit/'.$estimasi['id']);?>" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                                <a href="<?php echo base_url('/admin/master/paket-estimasi/delete/'.$estimasi['id']);?>" onclick="return confirm('Yakin untuk menghapus data ini?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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