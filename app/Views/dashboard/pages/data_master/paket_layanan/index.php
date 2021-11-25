<?= $this->extend('dashboard/layouts/master') ?>
<?= $this->section('content') ?>
<?php 
    $session = session();
    $success = $session->getFlashdata('success');
?>
<div class="br-pageheader pd-y-15 pd-l-20">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="">Dashboard</a>
        <span class="breadcrumb-item active">Data Paket Layanan</span>
    </nav>
</div>

<div class="br-pagebody">
    <div class="br-section-wrapper">

        <div class="card">
            <div class="card-header d-flex">
                <p class="mb-0 mt-1">Data Master Paket Layanan</p>
                <a href="<?= route_to('p_layananCreate') ?>" class="btn btn-primary btn-sm ml-auto">Tambah Data</a>
            </div>
            <div class="card-body">
                <?php if($success){ ?>
                    <div class="alert alert-success w-100 mx-auto">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong><?php echo $success?></strong>
                    </div>
                <?php } ?>
                <div class="table-wrapper">
                    <table id="datatable1" class="table display" width="100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Paket</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if($layanans){ ?>
                        <?php
                            $no = 1; 
                            foreach($layanans as $layanan) {
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $layanan['nama_paket']; ?></td>
                            <td style="width: 50%;"><?= $layanan['description']; ?></td>
                            <td>
                                <a href="<?php echo base_url('/admin/master/paket-layanan/edit/'.$layanan['id']);?>" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                                <a href="<?php echo base_url('/admin/master/paket-layanan/delete/'.$layanan['id']);?>" onclick="return confirm('Yakin untuk menghapus data ini?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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