<?= $this->extend('dashboard/layouts/master') ?>
<?= $this->section('content') ?>
<?php 
    $session = session();
    $success = $session->getFlashdata('success');
?>
<div class="br-pageheader pd-y-15 pd-l-20">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="">Dashboard</a>
        <span class="breadcrumb-item active">Data Paket Produk</span>
    </nav>
</div>

<div class="br-pagebody">
    <div class="br-section-wrapper">

        <div class="card">
            <div class="card-header d-flex">
                <p class="mb-0 mt-1">Data Master Paket Produk</p>
                <a href="<?= route_to('p_produkCreate') ?>" class="btn btn-primary btn-sm ml-auto">Tambah Data</a>
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
                                <th>Nama Produk</th>
                                <th>Harga Produk</th>
                                <th>Kategory</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if($produks){ ?>
                        <?php
                            $no = 1; 
                            foreach($produks as $produk) {
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $produk['product_name']; ?></td>
                            <td><?= "Rp " . number_format($produk['product_price'],2,',','.'); ?></td>
                            <td>
                                <?php if ($produk['product_category'] == 'pakaian') { ?>
                                    <div class="badge badge-info">pakaian</div>
                                <?php } else { ?>
                                    <div class="badge badge-success">non-pakaian</div>
                                <?php } ?>
                            </td>
                            <td>
                                <a href="<?php echo base_url('/admin/master/paket-produk/edit/'.$produk['id']);?>" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                                <a href="<?php echo base_url('/admin/master/paket-produk/delete/'.$produk['id']);?>" onclick="return confirm('Yakin untuk menghapus data ini?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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