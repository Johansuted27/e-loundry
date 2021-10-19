<?= $this->extend('dashboard/layouts/master') ?>
<?= $this->section('content') ?>
<div class="br-pageheader pd-y-15 pd-l-20">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="">Dashboard</a>
        <span class="breadcrumb-item active">Data User</span>
    </nav>
</div>

<div class="br-pagebody">
    <div class="br-section-wrapper">

        <div class="card">
            <div class="card-header d-flex">
                <p class="mb-0 mt-1">Data Master User</p>
                <a href="<?= base_url('/admin/master/user/create') ?>" class="btn btn-primary btn-sm ml-auto">Tambah Data</a>
            </div>
            <div class="card-body">
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if($users){ ?>
                        <?php
                            $no = 1; 
                            foreach($users as $user) {
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $user['name']; ?></td>
                            <td><?= $user['dob']; ?></td>
                            <td>
                                <?php if ($user['gender'] == 'l') { ?>
                                    Laki - Laki
                                <?php } else { ?>
                                    Perempuan
                                <?php } ?>
                            </td>
                            <td><?= $user['address']; ?></td>
                            <td><?= $user['email']; ?></td>
                            <td>
                                <?php if ($user['role_id'] == 1) { ?>
                                    <div class="badge badge-info">Admin</div>
                                <?php } else { ?>
                                    <div class="badge badge-success">User</div>
                                <?php } ?>
                            </td>
                            <td>
                                <a href="<?php echo base_url('/admin/master/user/edit/'.$user['id']);?>" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                                <a href="<?php echo base_url('delete/'.$user['id']);?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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