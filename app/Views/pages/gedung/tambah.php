<?= $this->extend('templates/template') ?>

<?= $this->section('content') ?>

<h1 class="text-center fw-bold"><?= $title ?></h1>

<form action="/gedung/insert" method="POST" enctype="multipart/form-data" class="col-md-8 mx-auto my-5">
    <div class="mb-3 row">
        <div class="col-md-7">
            <label for="nama" class="form-label">Nama Gedung</label>
            <input type="text" id="nama" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : '' ?>" name="nama" value="<?= old('nama') ?>" aria-describedby="namaFeedback">
            <span class="invalid-feedback" id="namaFeedback"><?= $validation->getError('nama') ?></span>
        </div>
        <div class="col-md-5">
            <label for="bulan" class="form-label">Tanggal Pencatatan</label>

            <div class="input-group justify-content-between">
                <div class="col-md-4">
                    <select class="form-select <?= ($validation->hasError('tanggal')) ? 'is-invalid' : '' ?>" aria-label="Default select example" name="tanggal" aria-describedby="tanggalFeedback" data-select="<?= old('tanggal') ?>">
                        <option selected value="">Tanggal</option>
                        <?php for ($i = 1; $i <= $jumlahHari; $i++) : ?>
                            <option value="<?= $i ?>"><?= $i ?></option>
                        <?php endfor ?>
                    </select>

                    <span class="invalid-feedback" id="tanggalFeedback"><?= $validation->getError('tanggal') ?></span>
                </div>
                <div class="col-md-4">
                    <select class="form-select <?= ($validation->hasError('bulan')) ? 'is-invalid' : '' ?>" aria-label="Default select example" name="bulan" aria-describedby="bulanFeedback" data-select="<?= old('bulan') ?>">
                        <option selected value="">Bulan</option>
                        <?php foreach ($bulan as $val => $name) : ?>
                            <option value="<?= $val ?>"><?= $name ?></option>
                        <?php endforeach ?>
                    </select>

                    <span class="invalid-feedback" id="bulanFeedback"><?= $validation->getError('bulan') ?></span>
                </div>
                <div class="col-md-4">
                    <select class="form-select <?= ($validation->hasError('tahun')) ? 'is-invalid' : '' ?>" aria-label="Default select example" name="tahun" aria-describedby="tahunFeedback" data-select="<?= old('tahun') ?>">
                        <option selected value="">Tahun</option>
                        <?php for ($i = date('Y'); $i >= date('Y') - 5; $i--) : ?>
                            <option value="<?= $i ?>"><?= $i ?></option>
                        <?php endfor ?>
                    </select>

                    <span class="invalid-feedback" id="tahunFeedback"><?= $validation->getError('tahun') ?></span>
                </div>
            </div>
        </div>
    </div>


    <div class="mb-3">
        <label for="gambar" class="form-label">Gambar Gedung</label>
        <input type="file" id="gambar" class="form-control <?= (session()->getFlashdata('gambarError')) ? 'is-invalid' : '' ?>" accept=".jpg, .png, .jpeg" name="gambar">
        <span class="invalid-feedback" id="tahunFeedback"><?= session()->getFlashdata('gambarError') ?></span>
    </div>
    <div class="mb-3 d-flex justify-content-end">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>

<?= $this->endSection() ?>