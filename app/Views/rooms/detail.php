<?= $this->extend('partials/main') ?>

<?= $this->section('content') ?>

<h1 class="text-center fw-bold"><?= $room->room_name ?></h1>

<div class="col-lg-5 mx-auto">
    <img src="/images/rooms/<?= $room->room_image ?>" alt="Foto Ruangan" class="w-100 border border-secondary p-1 rounded-3">
</div>

<div class="col-lg-8 mt-5 mx-auto">
    <ol class="list-group list-group-numbered">
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold">Kapasitas ruangan</div>
                <?= $room->room_capacity ?>
            </div>
            <span class="badge bg-primary rounded-pill"><?= $room->room_capacity ?></span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold">Jumlah barang</div>
                <?= $room->filed ?>
            </div>
            <span class="badge bg-primary rounded-pill"><?= $room->filed ?></span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold">Ruangan Tersedia</div>
                <?= $room->available ?>
            </div>
            <span class="badge bg-primary rounded-pill"><?= $room->available ?></span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold">Dikelola Oleh</div>
                <?= $room->name ?>
            </div>
            <span class="badge bg-primary rounded-pill"><?= $room->name ?></span>
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
                        <?php if (!$items) : ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Nama Barang
                                <a href="/item/new" class="badge bg-warning rounded-pill">
                                    <i class="fa-solid fa-plus"></i> Tambah Barang
                                </a>
                            </li>
                        <?php else : ?>
                            <?php foreach ($items as $item) : ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <?= $item->item_name ?>
                                    <a href="/item/<?= $item->id ?>" class="badge bg-primary rounded-pill">
                                        <i class="fa-solid fa-eye"></i>
                                        Lihat Detail
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

<div class="mb-3 mt-5 d-flex justify-content-end gap-3 col-lg-8 mx-auto">
    <a href="/room" class="btn btn-warning">Kembali</a>
    <a href="/room/<?= $room->room_id ?>/edit" class="btn btn-primary">Ubah</a>
</div>

<?= $this->endSection() ?>