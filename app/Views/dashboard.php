<?= $this->extend('templates/template') ?>

<?= $this->section('content') ?>

<div>
    <h1>Selamat Datang..</h1>
    <h3>Di Sistem Informasi Inventaris Barang SMPIT Iqra' Kota Bengkulu</h3>
</div>

<div>
    <div>
        <div class="">
            <h5>Jumlah Gedung</h5>
        </div>

        <div class="gambar">
            <i class="fa-solid fa-school"></i>
        </div>

        <div class="">
            <a href="">View details ></a>
        </div>
    </div>

    <div>
        <div class="Jumlah Ruangan"></div>
        <div class="gambar">
            <i class="fa-solid fa-door-open"></i>
        </div>
        <div class="view details"></div>
    </div>

    <div>
        <div class="Jumlah Barang"></div>
        <div class="gambar">
            <i class="fa-solid fa-layer-group"></i>
        </div>
        <div class="view details"></div>
    </div>

    <div>
        <div class="Pembelian Barang"></div>
        <div class="gambar">
            <i class="fa-solid fa-cart-shopping"></i>
        </div>
        <div class="view details"></div>
    </div>

    <div>
        <div class="Laporan"></div>
        <div class="gambar">
            <i class="fa-regular fa-file"></i>
        </div>
        <div class="view details"></div>
    </div>
</div>

<?= $this->endSection() ?>