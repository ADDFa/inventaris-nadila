<?= $this->extend('templates/template') ?>

<?= $this->section('content') ?>

<h1 class="text-center fw-bold"><?= $title ?></h1>

<form action="/ruangan/insert" method="POST" enctype="multipart/form-data" class="col-md-8 mx-auto my-5">
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="gedung" class="form-label">Pilih Gedung</label>
            <select class="form-select <?= ($validation->hasError('gedung')) ? 'is-invalid' : '' ?>" id="gedung" aria-label="Default select example" name="gedung" aria-describedby="gedungFeedback" data-select="<?= old('gedung') ?>">
                <?php foreach ($gedung as $gedung) : ?>
                    <option value="<?= $gedung->id_gedung ?>"><?= $gedung->nama_gedung ?></option>
                <?php endforeach ?>
            </select>

            <span class="invalid-feedback" id="gedungFeedback"><?= $validation->getError('gedung') ?></span>
        </div>

        <div class="col-md-6">
            <label for="nama" class="form-label">Nama Ruangan</label>
            <input type="text" id="nama" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : '' ?>" name="nama" value="<?= old('nama') ?>" aria-describedby="namaFeedback">
            <span class="invalid-feedback" id="namaFeedback"><?= $validation->getError('nama') ?></span>
        </div>
    </div>

    <div class="mb-3">
        <label for="gambar" class="form-label">Gambar Ruangan</label>
        <input type="file" id="gambar" class="form-control <?= (session()->getFlashdata('gambarError')) ? 'is-invalid' : '' ?>" accept=".jpg, .png, .jpeg" name="gambar">
        <span class="invalid-feedback" id="tahunFeedback"><?= session()->getFlashdata('gambarError') ?></span>
    </div>

    <div class="mb-3 d-flex justify-content-end">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>

<?= $this->endSection() ?>