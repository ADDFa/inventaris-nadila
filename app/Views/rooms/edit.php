<?= $this->extend('partials/main') ?>

<?= $this->section('content') ?>

<form action="/room/<?= $room->id ?>" method="POST" enctype="multipart/form-data" class="col-lg-10 mx-auto my-5">
    <input type="hidden" name="_method" value="PUT">

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="building_id" class="form-label">Pilih Gedung</label>
            <select class="form-select" id="building_id" name="building_id" data-select="<?= old('building_id') ?? $room->building_id ?>">
                <?php foreach ($buildings as $building) : ?>
                    <option value="<?= $building->id ?>"><?= $building->building_name ?></option>
                <?php endforeach ?>
            </select>
        </div>

        <div class="col-md-6">
            <label for="room_name" class="form-label">Nama Ruangan</label>
            <input type="text" id="room_name" class="form-control <?= (session('errors')['room_name'] ?? false) ? 'is-invalid' : '' ?>" name="room_name" value="<?= old('room_name') ?? $room->room_name ?>" aria-describedby="room_nameFeedback">
            <span class="invalid-feedback" id="room_nameFeedback"><?= session('errors')['room_name'] ?? '' ?></span>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="room_capacity" class="form-label">Kapasitas Ruangan</label>
            <input type="number" id="room_capacity" class="form-control <?= (session('errors')['room_capacity'] ?? false) ? 'is-invalid' : '' ?>" name="room_capacity" value="<?= old('room_capacity') ?? $room->room_capacity ?>" aria-describedby="room_capacityFeedback">
            <span class="invalid-feedback" id="room_capacityFeedback"><?= session('errors')['room_capacity'] ?? '' ?></span>
        </div>

        <div class="col-lg-6">
            <label for="room_size" class="form-label">Ukuran Ruangan</label>
            <input type="text" id="room_size" placeholder="24 X 24 M" class="form-control <?= (session('errors')['room_size'] ?? false) ? 'is-invalid' : '' ?>" name="room_size" value="<?= old('room_size') ?? $room->room_size ?>" aria-describedby="room_sizeFeedback">
            <span class="invalid-feedback" id="room_sizeFeedback"><?= session('errors')['room_size'] ?? '' ?></span>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            <label for="description" class="form-label">Keterangan</label>
            <input type="text" id="description" class="form-control <?= (session('errors')['description'] ?? false) ? 'is-invalid' : '' ?>" name="description" value="<?= old('description') ?? $room->description ?>" aria-describedby="descriptionFeedback">
            <span class="invalid-feedback" id="descriptionFeedback"><?= session('errors')['description'] ?? '' ?></span>
        </div>
    </div>

    <div class="mb-3 d-flex justify-content-end gap-3">
        <a href="/room" class="btn btn-warning text-light">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>

<?= $this->endSection() ?>