<?= $this->extend('templates/template') ?>

<?= $this->section('content') ?>

<div>
    <h1>Selamat Datang..</h1>
    <h3>Di Sistem Informasi Inventaris Barang SMPIT Iqra' Kota Bengkulu</h3>
</div>

<div class="container d-flex flex-wrap gap-5 justify-content-around mx-auto my-5">
    <div class="card text-bg-light mb-3" style="max-width: 18rem;">
        <div class="card-header text-center">Jumlah Gedung</div>
        <div class="card-body">
            <img class="w-100" src="/images/gedung/sample.jpg" alt="gedung">
        </div>
        <div class="card-footer text-center">
            <a href="#">Lihat Detail ></a>
        </div>
    </div>

    <div class="card text-bg-light mb-3" style="max-width: 18rem;">
        <div class="card-header text-center">Jumlah Ruangan</div>
        <div class="card-body">
            <img class="w-100" src="/images/ruangan/sample.jpg" alt="ruangan">
        </div>
        <div class="card-footer text-center">
            <a href="#">Lihat Detail ></a>
        </div>
    </div>

    <div class="card text-bg-light mb-3" style="max-width: 18rem;">
        <div class="card-header text-center">Jumlah Barang</div>
        <div class="card-body">
            <img class="w-100" src="/images/gedung/sample.jpg" alt="barang">
        </div>
        <div class="card-footer text-center">
            <a href="#">Lihat Detail ></a>
        </div>
    </div>

    <div class="card text-bg-light mb-3" style="max-width: 18rem;">
        <div class="card-header text-center">Pembelian Gedung</div>
        <div class="card-body">
            <img class="w-100" src="/images/gedung/sample.jpg" alt="pembelian">
        </div>
        <div class="card-footer text-center">
            <a href="#">Lihat Detail ></a>
        </div>
    </div>

    <div class="card text-bg-light mb-3" style="max-width: 18rem;">
        <div class="card-header text-center">Laporan</div>
        <div class="card-body">
            <img class="w-100" src="/images/gedung/sample.jpg" alt="laporan">
        </div>
        <div class="card-footer text-center">
            <a href="#">Lihat Detail ></a>
        </div>
    </div>
</div>

<?= $this->endSection() ?>