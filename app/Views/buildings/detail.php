<?= $this->extend('partials/main') ?>

<?= $this->section('content') ?>

<div class="row col-lg-8 mx-auto mb-3">
    <figure class="figure col-lg-5 mx-auto mb-3">
        <img src="/images/building/<?= $building->building_image ?>" class="figure-img img-fluid rounded" alt="Gambar Gedung">
        <figcaption class="figure-caption"><?= $building->building_name ?></figcaption>
    </figure>

    <div class="col-lg-7">
        <fieldset disabled>
            <div class="mb-3">
                <label class="form-label">Nama Gedung</label>
                <input type="text" class="form-control" value="<?= $building->building_name ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Ukuran Gedung</label>
                <input type="text" class="form-control" value="<?= $building->building_size ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Total Ruangan</label>
                <input type="text" class="form-control" value="<?= $building->room_total ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Dikelola Oleh</label>
                <input type="text" class="form-control" value="<?= $building->name ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Pada Tanggal</label>
                <input type="text" class="form-control" value="<?= date('d - M - Y', $building->building_registration_date) . ' Pukul : ' . date('H:i:s', $building->building_registration_date) ?>">
            </div>
        </fieldset>
    </div>

    <div class="accordion my-5" id="accordionBarang">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Lihat List Ruangan
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionBarang">
                <div class="accordion-body">
                    <ul class="list-group">
                        <?php if (!$rooms) : ?>
                            <li class="list-group-item d-flex justify-content-between align-rooms-center">
                                Nama Ruangan
                                <a href="/room/new" class="badge bg-warning rounded-pill">
                                    <i class="fa-solid fa-plus"></i> Tambah Ruangan
                                </a>
                            </li>
                        <?php else : ?>
                            <?php foreach ($rooms as $room) : ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <?= $room->room_name ?>
                                    <a href="/room/<?= $room->id ?>" class="badge bg-primary rounded-pill">
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

<div class="mb-3 d-flex justify-content-end gap-3 col-lg-8 mx-auto">
    <a href="/building" class="btn btn-warning">Kembali</a>
    <a href="/building/<?= $building->id ?>/edit" class="btn btn-primary">Ubah</a>
</div>

<?= $this->endSection() ?>