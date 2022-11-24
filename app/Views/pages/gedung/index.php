<?= $this->extend('templates/template') ?>

<?= $this->section('content') ?>

<?= $this->include('components/topAndAction') ?>

<?php if ($x = session()->getFlashdata('crud') ?? false) : ?>
    <div class="alert alert-<?= $x['status'] ?> alert-dismissible fade show w-100 my-3" role="alert">
        <?= $x['message'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif ?>

<div class="my-5 d-flex flex-wrap justify-content-evenly gap-3 mx-auto col-lg-10">
    <?php foreach ($dataGedung as $gedung) : ?>
        <div class="card text-bg-light mb-3" style="max-width: 18rem;">
            <div class="card-header text-center"><?= $gedung->nama_gedung ?></div>
            <div class="card-body">
                <img class="w-100" src="<?= '/images/gedung/' . $gedung->gambar_gedung ?>" alt="gedung">
            </div>
            <div class="card-footer text-center">
                <a href="#">Lihat Detail ></a>
            </div>
        </div>
    <?php endforeach ?>
</div>

<?= $this->include('components/bottomAndAction') ?>

<?= $this->endSection() ?>