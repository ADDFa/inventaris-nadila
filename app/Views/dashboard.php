<?= $this->extend('partials/main') ?>

<?= $this->section('content') ?>

<div>
    <h1 class="fw-bold">Selamat Datang <?= session('users')->username ?></h1>
    <h3 class="fs-5">Di Sistem Informasi Inventaris Barang SMPIT Iqra' Kota Bengkulu</h3>
</div>

<div class="col-lg-10 d-flex flex-wrap gap-3 justify-content-around mx-auto my-5">
    <div class="card text-bg-light mb-3" style="max-width: 18rem;">
        <div class="card-header text-center">Jumlah Gedung <?= $numberOf['building'] ?></div>
        <div class="card-body">
            <img class="w-100" src="/images/sample.jpg" alt="gedung">
        </div>
        <div class="card-footer text-center">
            <a href="/building">Lihat Detail &#8811;</a>
        </div>
    </div>

    <div class="card text-bg-light mb-3" style="max-width: 18rem;">
        <div class="card-header text-center">Jumlah Ruangan <?= $numberOf['room'] ?></div>
        <div class="card-body">
            <img class="w-100" src="/images/sample.jpg" alt="ruangan">
        </div>
        <div class="card-footer text-center">
            <a href="/room">Lihat Detail &#8811;</a>
        </div>
    </div>

    <div class="card text-bg-light mb-3" style="max-width: 18rem;">
        <div class="card-header text-center">Jumlah Barang <?= $numberOf['item'] ?></div>
        <div class="card-body">
            <img class="w-100" src="/images/sample.jpg" alt="barang">
        </div>
        <div class="card-footer text-center">
            <a href="/item">Lihat Detail &#8811;</a>
        </div>
    </div>

    <div class="card text-bg-light mb-3" style="max-width: 18rem;">
        <div class="card-header text-center">Laporan</div>
        <div class="card-body">
            <img class="w-100" src="/images/sample.jpg" alt="laporan">
        </div>
        <div class="card-footer text-center">
            <a href="/report">Lihat Detail &#8811;</a>
        </div>
    </div>
</div>

<?= $this->endSection() ?>