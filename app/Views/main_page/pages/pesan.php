<?= $this->extend('main_page/layouts/main') ?>
<?= $this->section('content') ?>
<section class="page-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card p-3">
                            <div class="card-body">
                                <div class="text-center">
                                    <img src="<?php echo base_url('/main_page/img/kost.png') ?>" width="70%" alt="">
                                </div>
                                <div class="text-center">
                                    <h3>Paket Anak Kostan</h1>
                                    <p style="height: 130px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto, illo. Saepe, laborum numquam error neque sint, corporis optio earum blanditiis possimus dolor adipisci rem architecto facere sunt atque dignissimos eum.</p>
                                    <a href="<?php echo base_url('paket-kostan') ?>" class="btn btn-primary text-uppercase">Pilih Paket</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card p-3">
                            <div class="card-body">
                                <div class="text-center">
                                    <img src="<?php echo base_url('/main_page/img/sendiri.png') ?>" width="70%" alt="">
                                </div>
                                <div class="text-center">
                                    <h3>Paket Standar</h1>
                                    <p style="height: 130px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo dolorum soluta minus alias. Perspiciatis, quia. Maiores numquam aperiam neque iste. Dolore libero ab excepturi molestias nam sequi, optio quis harum!</p>
                                    <a href="<?php echo base_url('paket-standar') ?>" class="btn btn-primary text-uppercase">Pilih Paket</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>