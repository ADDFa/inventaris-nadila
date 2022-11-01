<?= $this->extend('templates/template') ?>

<?= $this->section('content') ?>

<div class="title text-center">
    <h1 class="fw-bold">Manajemen Data Gedung</h1>
</div>

<div class="d-flex justify-content-between align-items-center px-5">
    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
        <button type="button" class="btn btn-primary">Show</button>

        <div class="btn-group" role="group">
            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                <li><a class="dropdown-item" href="#">Dropdown link</a></li>
            </ul>
        </div>

        <button type="button" class="btn btn-primary">Entries</button>
    </div>


    <button type="button" class="btn btn-primary">+ Insert Data</button>
</div>

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

<div class="footer d-flex justify-content-end px-5 mb-5">
    <div class="btn-group" role="group" aria-label="Basic example">
        <a href="" class="btn btn-primary">Prev</a>
        <button type="button" class="btn btn-primary">1</button>
        <a href="" class="btn btn-primary">Next</a>
    </div>
</div>

<?= $this->endSection() ?>