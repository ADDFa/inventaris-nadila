<?= $this->extend('partials/main') ?>

<?= $this->section('content') ?>

<span class="notif" data-status="<?= session('status') ?>" data-message="<?= session('message') ?>"></span>

<h1 class="text-center fw-bold"><?= $title ?></h1>

<div class="row col-lg-8 mx-auto mb-3">
    <figure class="figure col-lg-5 mx-auto mb-3">
        <img src="/images/building/<?= $building->building_image ?>" class="figure-img img-fluid rounded" alt="Gambar Gedung">
        <figcaption class="figure-caption"><?= $building->building_name ?></figcaption>
    </figure>

    <div class="col-lg-7">
        <form action="/building/<?= $building->id ?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">

            <div class="mb-3">
                <label for="building_name" class="form-label">Nama Gedung</label>
                <input type="text" id="building_name" placeholder="Gedung A" class="form-control <?= $validation->hasError('building_name') ? 'is-invalid' : '' ?>" name="building_name" value="<?= old('building_name') ?? $building->building_name ?>" aria-describedby="nameFeedback">
                <span class="invalid-feedback" id="nameFeedback"><?= $validation->getError('building_name') ?></span>
            </div>
            <div class="mb-3">
                <label for="building_size" class="form-label">Ukuran Gedung</label>
                <input type="text" id="building_size" placeholder="24 X 24 M" class="form-control <?= $validation->hasError('building_size') ? 'is-invalid' : '' ?>" name="building_size" value="<?= old('building_size') ?? $building->building_size ?>" aria-describedby="sizeFeedback">
                <span class="invalid-feedback" id="sizeFeedback"><?= $validation->getError('building_size') ?></span>
            </div>
            <div class="mb-3">
                <label for="building_registration_date" class="form-label">Tanggal Pendaftaran Bangunan</label>
                <input type="datetime-local" id="building_registration_date" class="form-control <?= $validation->hasError('building_registration_date') ? 'is-invalid' : '' ?>" name="building_registration_date" aria-describedby="dateFeedback" value="<?= old('building_registration_date') ?? date('Y-m-d H:i:s', $building->building_registration_date) ?>">
                <span class="invalid-feedback" id="dateFeedback"><?= $validation->getError('building_registration_date') ?></span>
            </div>
            <div class="mb3">
                <label for="building_image" class="form-label">Gambar Gedung</label>
                <input type="file" id="building_image" class="form-control <?= $validation->hasError('building_image') ? 'is-invalid' : '' ?>" aria-describedby="imageFeedback" accept=".jpg, .png, .jpeg" name="building_image" min="0" name="building_image">
                <span class="invalid-feedback" id="imageFeedback"><?= $validation->getError('building_image') ?></span>
            </div>

            <div class="mb-3 mt-5 d-flex justify-content-end gap-3">
                <a href="/building" class="btn btn-warning">Kembali</a>
                <button class="btn btn-primary">Simpan</button=>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>