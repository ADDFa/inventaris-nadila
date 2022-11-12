<?= $this->extend('templates/template') ?>

<?= $this->section('content') ?>

<div class="row col-md-10 justify-content-end mx-auto">
    <a href="/ruangan" class="col-md-1 badge bg-info py-2 text-light"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
</div>

<h1 class="text-center fw-bold"><?= $ruangan->nama_ruangan ?></h1>

<div class="col-lg-5 mx-auto">
    <img src="/images/ruangan/sample.jpg" alt="" class="w-100 border border-secondary p-1 rounded-3">
</div>

<div class="col-lg-8 mt-5 mx-auto">
    <ol class="list-group list-group-numbered">
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold">Kapasitas ruangan</div>
                <?= $ruangan->kapasitas_ruangan ?>
            </div>
            <span class="badge bg-primary rounded-pill"><?= $ruangan->kapasitas_ruangan ?></span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold">Jumlah barang</div>
                <?= $ruangan->terisi ?>
            </div>
            <span class="badge bg-primary rounded-pill"><?= $ruangan->terisi ?></span>
        </li>
    </ol>

    <div class="accordion my-2" id="accordionBarang">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Lihat List Barang
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionBarang">
                <div class="accordion-body">
                    <ul class="list-group">
                        <?php if (!$barang) : ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Nama Barang
                                <a href="/barang/tambah" class="badge bg-warning rounded-pill">
                                    <i class="fa-solid fa-plus"></i> Tambah Barang
                                </a>
                            </li>
                        <?php else : ?>
                            <?php foreach ($barang as $barang) : ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <?= $barang->nama_barang ?>
                                    <a href="/barang/detail/<?= $barang->id_barang ?>" class="badge bg-primary rounded-pill">
                                        <i class="fa-solid fa-eye"></i> Lihat Detail
                                    </a>
                                </li>
                            <?php endforeach ?>
                        <?php endif ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>