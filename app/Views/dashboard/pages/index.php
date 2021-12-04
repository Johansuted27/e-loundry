<?= $this->extend('dashboard/layouts/master') ?>
<?= $this->section('content') ?>
<div class="br-pageheader pd-y-15 pd-l-20">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <!-- <a class="breadcrumb-item" href="#">Dashboard</a> -->
        <span class="breadcrumb-item active">Dashboard</span>
    </nav>
</div>
<div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
    <h4 class="tx-gray-800 mg-b-5">Selamat Datang di Anis Laundry Dashboard!</h4>
    <p class="mg-b-0">Semoga hari mu menyenangkan.</p>
</div>

<div class="br-pagebody">
    <div class="row row-sm">
        <div class="col-sm-6 col-xl-3">
            <div class="bg-teal rounded overflow-hidden">
                <div class="pd-25 d-flex align-items-center">
                <i class="ion ion-person-stalker tx-60 lh-0 tx-white op-7"></i>
                <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">User</p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1"><?= $users; ?></p>
                </div>
                </div>
            </div>
        </div><!-- col-3 -->
        <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
            <div class="bg-danger rounded overflow-hidden">
                <div class="pd-25 d-flex align-items-center">
                <i class="ion ion-bag tx-60 lh-0 tx-white op-7"></i>
                <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">Paket Produk</p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1"><?= $products; ?></p>
                </div>
                </div>
            </div>
        </div><!-- col-3 -->
        <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
            <div class="bg-br-primary rounded overflow-hidden">
                <div class="pd-25 d-flex align-items-center">
                <i class="ion ion-person tx-60 lh-0 tx-white op-7"></i>
                <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">Paket Layanan</p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1"><?= $layanans; ?></p>
                </div>
                </div>
            </div>
        </div><!-- col-3 -->
        <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
            <div class="bg-primary rounded overflow-hidden">
                <div class="pd-25 d-flex align-items-center">
                <i class="ion ion-card tx-60 lh-0 tx-white op-7"></i>
                <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">Transaksi</p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1"><?= $transactions; ?></p>
                </div>
                </div>
            </div>
        </div><!-- col-3 -->
    </div><!-- row -->
    
    <div class="row row-sm mg-t-20">
        <div class="col-12">
            <div class="card pd-0 bd-0 shadow-base">
                <div class="pd-x-30 pd-t-30 pd-b-15">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                    <h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Pemesanan</h6>
                    </div>
                    <!-- <div class="tx-13">
                    <p class="mg-b-0"><span class="square-8 rounded-circle bg-purple mg-r-10"></span> TCP Reset Packets</p>
                    <p class="mg-b-0"><span class="square-8 rounded-circle bg-pink mg-r-10"></span> TCP FIN Packets</p>
                    </div> -->
                </div><!-- d-flex -->
                </div>
                <div class="pd-x-15 pd-b-15">
                <div id="ch1" class="br-chartist br-chartist-2 ht-200 ht-sm-300"></div>
                </div>
            </div><!-- card -->
        </div>
    </div><!-- row -->

</div>
<?= $this->endSection() ?>