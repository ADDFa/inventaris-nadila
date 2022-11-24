<?= $this->extend('templates/template') ?>

<?= $this->section('content') ?>

<div>
    <h1 class="fw-bold">Selamat Datang <?= session('user')->username ?></h1>
    <h3 class="fs-5">Di Sistem Informasi Inventaris Barang SMPIT Iqra' Kota Bengkulu</h3>
</div>

<div class="col-lg-10 d-flex flex-wrap gap-3 justify-content-around mx-auto my-5">
    <div class="card text-bg-light mb-3" style="max-width: 18rem;">
        <div class="card-header text-center">Jumlah Gedung <?= $jumlahData->gedung ?></div>
        <div class="card-body">
            <img class="w-100" src="/images/gedung/sample.jpg" alt="gedung">
        </div>
        <div class="card-footer text-center">
            <a href="/gedung">Lihat Detail &#8811;</a>
        </div>
    </div>

    <div class="card text-bg-light mb-3" style="max-width: 18rem;">
        <div class="card-header text-center">Jumlah Ruangan <?= $jumlahData->ruangan ?></div>
        <div class="card-body">
            <img class="w-100" src="/images/ruangan/sample.jpg" alt="ruangan">
        </div>
        <div class="card-footer text-center">
            <a href="/ruangan">Lihat Detail &#8811;</a>
        </div>
    </div>

    <div class="card text-bg-light mb-3" style="max-width: 18rem;">
        <div class="card-header text-center">Jumlah Barang <?= $jumlahData->barang ?></div>
        <div class="card-body">
            <img class="w-100" src="/images/gedung/sample.jpg" alt="barang">
        </div>
        <div class="card-footer text-center">
            <a href="barang">Lihat Detail &#8811;</a>
        </div>
    </div>

    <!-- <div class="card text-bg-light mb-3" style="max-width: 18rem;">
        <div class="card-header text-center">Penyimpanan</div>
        <div class="card-body">
            <img class="w-100" src="/images/gedung/sample.jpg" alt="pembelian">
        </div>
        <div class="card-footer text-center">
            <a href="/penyimpanan">Lihat Detail &#8811;</a>
        </div>
    </div> -->

    <div class="card text-bg-light mb-3" style="max-width: 18rem;">
        <div class="card-header text-center">Laporan</div>
        <div class="card-body">
            <img class="w-100" src="/images/gedung/sample.jpg" alt="laporan">
        </div>
        <div class="card-footer text-center">
            <a href="/laporan">Lihat Detail &#8811;</a>
        </div>
    </div>
</div>

<?= $this->endSection() ?>