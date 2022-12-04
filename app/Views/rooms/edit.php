<?= $this->extend('partials/main') ?>

<?= $this->section('content') ?>

<h1 class="text-center fw-bold"><?= $title ?></h1>

<form action="/room/<?= $room->id ?>" method="POST" enctype="multipart/form-data" class="col-lg-10 mx-auto my-5">
    <input type="hidden" name="_method" value="PUT">

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="building_id" class="form-label">Pilih Gedung</label>
            <select class="form-select <?= $validation->hasError('building_id') ? 'is-invalid' : '' ?>" id="building_id" name="building_id" aria-describedby="building_idFeedback" data-select="<?= old('building_id') ?? $room->building_id ?>">
                <?php foreach ($buildings as $building) : ?>
                    <option value="<?= $building->id ?>"><?= $building->building_name ?></option>
                <?php endforeach ?>
            </select>

            <span class="invalid-feedback" id="building_idFeedback"><?= $validation->getError('building_id') ?></span>
        </div>

        <div class="col-md-6">
            <label for="room_name" class="form-label">Nama Ruangan</label>
            <input type="text" id="room_name" class="form-control <?= $validation->hasError('room_name') ? 'is-invalid' : '' ?>" name="room_name" value="<?= old('room_name') ?? $room->room_name ?>" aria-describedby="room_nameFeedback">
            <span class="invalid-feedback" id="room_nameFeedback"><?= $validation->getError('room_name') ?></span>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="room_capacity" class="form-label">Kapasitas Ruangan</label>
            <input type="number" id="room_capacity" class="form-control <?= $validation->hasError('room_capacity') ? 'is-invalid' : '' ?>" name="room_capacity" value="<?= old('room_capacity') ?? $room->room_capacity ?>" aria-describedby="room_capacityFeedback">
            <span class="invalid-feedback" id="room_capacityFeedback"><?= $validation->getError('room_capacity') ?></span>
        </div>

        <div class="col-lg-6">
            <label for="room_size" class="form-label">Ukuran Ruangan</label>
            <input type="text" id="room_size" placeholder="24 X 24 M" class="form-control <?= $validation->hasError('room_size') ? 'is-invalid' : '' ?>" name="room_size" value="<?= old('room_size') ?? $room->room_size ?>" aria-describedby="room_sizeFeedback">
            <span class="invalid-feedback" id="room_sizeFeedback"><?= $validation->getError('room_size') ?></span>
        </div>

        <div class="col-md-6">
            <label for="room_image" class="form-label">Gambar Ruangan</label>
            <input type="file" id="room_image" class="form-control <?= $validation->hasError('image') ? 'is-invalid' : '' ?>" accept=".jpg, .png, .jpeg" name="room_image" aria-describedby="room_imageFeedback">
            <span class="invalid-feedback" id="room_imageFeedback"><?= $validation->getError('image') ?></span>
        </div>
    </div>

    <div class="mb-3 d-flex justify-content-end gap-3">
        <a href="/room" class="btn btn-warning text-light">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>

<?= $this->endSection() ?>