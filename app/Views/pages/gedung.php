<?= $this->extend('templates/template') ?>

<?= $this->section('content') ?>

<?= $this->include('components/topAndAction') ?>

<div class="my-5 d-flex justify-content-between w-75 mx-auto">
    <?php for ($i = 0; $i < 3; $i++) : ?>
        <div class="card text-bg-light mb-3" style="max-width: 18rem;">
            <div class="card-header text-center">Jumlah Gedung</div>
            <div class="card-body">
                <img class="w-100" src="/images/gedung/sample.jpg" alt="gedung">
            </div>
            <div class="card-footer text-center">
                <a href="#">Lihat Detail ></a>
            </div>
        </div>
    <?php endfor ?>
</div>

<?= $this->include('components/bottomAndAction') ?>

<?= $this->endSection() ?>