<?= $this->extend('partials/main') ?>

<?= $this->section('content') ?>

<form action="/building" method="POST" enctype="multipart/form-data" class="col-lg-10 mx-auto my-5">
    <div class="mb-3 row">
        <div class="col-lg-6">
            <label for="building_name" class="form-label">Nama Gedung</label>
            <input type="text" id="building_name" placeholder="Gedung A" class="form-control <?= (session('errors')['building_name'] ?? false) ? 'is-invalid' : '' ?>" name="building_name" value="<?= old('building_name') ?>" aria-describedby="nameFeedback">
            <span class="invalid-feedback" id="nameFeedback"><?= session('errors')['building_name'] ?? '' ?></span>
        </div>

        <div class="col-lg-6">
            <label for="building_size" class="form-label">Ukuran Gedung</label>
            <input type="text" id="building_size" placeholder="24 X 24 M" class="form-control <?= (session('errors')['building_size'] ?? false) ? 'is-invalid' : ''  ?>" name="building_size" value="<?= old('building_size') ?>" aria-describedby="sizeFeedback">
            <span class="invalid-feedback" id="sizeFeedback"><?= session('errors')['building_size'] ?? '' ?></span>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            <label for="building_registration_date" class="form-label">Tanggal Pendaftaran Bangunan</label>
            <input type="datetime-local" id="building_registration_date" class="form-control <?= (session('errors')['building_registration_date'] ?? false) ? 'is-invalid' : ''  ?>" name="building_registration_date" aria-describedby="dateFeedback" value="<?= old('building_registration_date') ?>">
            <span class="invalid-feedback" id="dateFeedback"><?= session('errors')['building_registration_date'] ?? '' ?></span>
        </div>

        <div class="col-lg-6">
            <label for="building_image" class="form-label">Gambar Gedung</label>
            <input type="file" id="building_image" class="form-control <?= (session('errors')['image'] ?? false) ? 'is-invalid' : '' ?>" aria-describedby="imageFeedback" accept=".jpg, .png, .jpeg" name="building_image" min="0" name="building_image">
            <span class="invalid-feedback" id="imageFeedback"><?= session('errors')['image'] ?? '' ?></span>
        </div>
    </div>

    <div class="mb-3 d-flex justify-content-end gap-3">
        <a href="/building" class="btn btn-warning">Kembali</a>
        <button class="btn btn-primary">Simpan</button>
    </div>
</form>

<?= $this->endSection() ?>