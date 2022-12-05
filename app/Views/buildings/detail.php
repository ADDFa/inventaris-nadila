<?= $this->extend('partials/main') ?>

<?= $this->section('content') ?>

<h1 class="text-center fw-bold"><?= $title ?></h1>

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
</div>

<div class="mb-3 d-flex justify-content-end gap-3 col-lg-8 mx-auto">
    <a href="/building" class="btn btn-warning">Kembali</a>
    <a href="/building/<?= $building->id ?>/edit" class="btn btn-primary">Ubah</a>
</div>

<?= $this->endSection() ?>