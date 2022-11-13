<?= $this->extend('templates/template') ?>

<?= $this->section('content') ?>

<h1 class="text-center fw-bold"><?= $title . ' Ruangan' ?></h1>

<?php if ($x = session()->getFlashdata('crud') ?? false) : ?>
    <div class="alert alert-<?= $x['status'] ?> alert-dismissible fade show w-100 my-3" role="alert">
        <?= $x['message'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif ?>

<form action="/ruangan/<?= $path ?>" method="POST" enctype="multipart/form-data" class="col-md-8 mx-auto my-5">
    <?php if ($path === 'update') : ?>
        <input type="hidden" value="<?= $ruangan->id_ruangan ?>" name="id">
    <?php endif ?>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="gedung" class="form-label">Pilih Gedung</label>
            <select class="form-select <?= ($validation->hasError('gedung')) ? 'is-invalid' : '' ?>" id="gedung" aria-label="Default select example" name="gedung" aria-describedby="gedungFeedback" data-select="<?= old('gedung') ?? ($ruangan ? $ruangan->id_gedung : '') ?>">
                <?php foreach ($gedung as $gedung) : ?>
                    <option value="<?= $gedung->id_gedung ?>"><?= $gedung->nama_gedung ?></option>
                <?php endforeach ?>
            </select>

            <span class="invalid-feedback" id="gedungFeedback"><?= $validation->getError('gedung') ?></span>
        </div>

        <div class="col-md-6">
            <label for="nama" class="form-label">Nama Ruangan</label>
            <input type="text" id="nama" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : '' ?>" name="nama" value="<?= old('nama') ?? ($ruangan ? $ruangan->nama_ruangan : '') ?>" aria-describedby="namaFeedback">
            <span class="invalid-feedback" id="namaFeedback"><?= $validation->getError('nama') ?></span>
        </div>
    </div>

    <div class="row mb-3">
        <?php if ($path === 'ubah') : ?>
            <div class="row col-md-12 my-3 justify-content-center">
                <img src="/images/ruangan/<?= $ruangan->gambar_ruangan ?>" class="w-50" alt="Test">
            </div>
        <?php endif ?>

        <div class="col-md-6">
            <label for="kapasitas" class="form-label">Kapasitas Ruangan</label>
            <input type="number" id="kapasitas" class="form-control <?= ($validation->hasError('kapasitas')) ? 'is-invalid' : '' ?>" name="kapasitas" value="<?= old('kapasitas') ?? ($ruangan ? $ruangan->kapasitas_ruangan : 0) ?>" aria-describedby="kapasitasFeedback">
            <span class="invalid-feedback" id="kapasitasFeedback"><?= $validation->getError('kapasitas') ?></span>
        </div>

        <div class="col-md-6">
            <label for="gambar" class="form-label">Gambar Ruangan</label>
            <input type="file" id="gambar" class="form-control <?= (session()->getFlashdata('gambarError')) ? 'is-invalid' : '' ?>" accept=".jpg, .png, .jpeg" name="gambar">
            <span class="invalid-feedback" id="tahunFeedback"><?= session()->getFlashdata('gambarError') ?></span>
        </div>
    </div>

    <div class="mb-3 d-flex justify-content-end gap-3">
        <a href="/ruangan" class="btn btn-warning text-light">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>

<?= $this->endSection() ?>