<?= $this->extend('templates/template') ?>

<?= $this->section('content') ?>

<h1 class="text-center fw-bold"><?= $title ?> Barang</h1>

<?php if ($x = session()->getFlashdata('crud') ?? false) : ?>
    <div class="alert alert-<?= $x['status'] ?> alert-dismissible fade show w-100 my-3" role="alert">
        <?= $x['message'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif ?>

<div class="col-lg-10 mx-auto mt-5">
    <form action="/barang/<?= $path ?>" method="POST" enctype="multipart/form-data">
        <?php if ($path === 'update') : ?>
            <input type="hidden" name="id" value="<?= $id ?>">
        <?php endif ?>

        <div class="row mb-3">
            <div class="col-lg-6">
                <div>
                    <label class="form-label" for="nama">Nama Barang</label>
                    <input type="text" class="form-control <?= $validation->hasError('nama') ? 'is-invalid' : '' ?>" id="nama" name="nama" value="<?= old('nama') ?? ($barang ?? false ? $barang->nama_barang : '') ?>" required>
                    <div class="invalid-feedback"><?= $validation->getError('nama') ?></div>
                </div>
            </div>
            <div class="col-lg-6">
                <div>
                    <label class="form-label" for="kategori">Kategori Barang</label>
                    <input type="text" class="form-control <?= $validation->hasError('kategori') ? 'is-invalid' : '' ?>" id="kategori" name="kategori" value="<?= old('kategori') ?? ($barang ?? false ? $barang->kategori_barang : '') ?>" required>
                    <div class="invalid-feedback"><?= $validation->getError('kategori') ?></div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-lg-6">
                <div>
                    <label class="form-label" for="jenis">Jenis Barang</label>
                    <input type="text" class="form-control <?= $validation->hasError('jenis') ? 'is-invalid' : '' ?>" id="jenis" name="jenis" value="<?= $barang->jenis_barang ?? old('jenis') ?>" required>
                    <div class="invalid-feedback"><?= $validation->getError('jenis') ?></div>
                </div>
            </div>
            <div class="col-lg-6">
                <div>
                    <label class="form-label" for="jumlah">Jumlah Barang</label>
                    <input type="number" class="form-control <?= $validation->hasError('jumlah') ? 'is-invalid' : '' ?>" id="jumlah" name="jumlah" value="<?= old('jumlah') ?? ($barang ?? false ? $barang->jumlah_barang : '') ?>" required>
                    <div class="invalid-feedback"><?= $validation->getError('jumlah') ?></div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="merk">Merk Barang</label>
                    <input type="text" class="form-control <?= $validation->hasError('merk') ? 'is-invalid' : '' ?>" id="merk" name="merk" value="<?= old('merk') ?? ($barang ?? false ? $barang->merk_barang : '') ?>" required>
                    <div class="invalid-feedback"><?= $validation->getError('merk') ?></div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-4">
                        <label class="form-label" for="tanggal">Tanggal Pencatatan</label>
                        <select class="form-select <?= $validation->hasError('tanggal') ? 'is-invalid' : '' ?>" aria-label="Default select example" id="tanggal" name="tanggal" data-select="<?= old('tanggal') ?? ($barang ?? false ? $barang->tgl_pencatatan : '') ?>">
                            <?php for ($i = 1; $i <= $jumlahHari; $i++) : ?>
                                <option value="<?= $i ?>"><?= $i ?></option>
                            <?php endfor ?>
                        </select>
                        <div class="invalid-feedback"><?= $validation->getError('tanggal') ?></div>
                    </div>
                    <div class="col-lg-4">
                        <label class="form-label" for="bulan">Bulan Pencatatan</label>
                        <select class="form-select <?= $validation->hasError('bulan') ? 'is-invalid' : '' ?>" aria-label="Default select example" id="bulan" name="bulan" data-select="<?= old('bulan') ?? ($barang ?? false ? $barang->bulan_pencatatan : '') ?>">
                            <?php foreach ($bulan as $key => $val) : ?>
                                <option value="<?= $key ?>"><?= $val ?></option>
                            <?php endforeach ?>
                        </select>
                        <div class="invalid-feedback"><?= $validation->getError('bulan') ?></div>
                    </div>
                    <div class="col-lg-4">
                        <label class="form-label" for="tahun">Tahun Pencatatan</label>
                        <select class="form-select <?= $validation->hasError('tahun') ? 'is-invalid' : '' ?>" aria-label="Default select example" id="tahun" name="tahun" data-select="<?= old('tahun') ?? ($barang ?? false ? $barang->tahun_pencatatan : '') ?>">
                            <?php for ($i = date('Y'); $i >= date('Y') - 5; $i--) : ?>
                                <option value="<?= $i ?>"><?= $i ?></option>
                            <?php endfor ?>
                        </select>
                        <div class="invalid-feedback"><?= $validation->getError('tahun') ?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-lg-6">
                <div>
                    <label class="form-label" for="ketersediaan">Ketersediaan Barang</label>
                    <input type="text" class="form-control <?= $validation->hasError('ketersediaan') ? 'is-invalid' : '' ?>" id="ketersediaan" name="ketersediaan" value="<?= old('ketersediaan') ?? ($barang ?? false ? $barang->ketersediaan_barang : '') ?>" required>
                    <div class="invalid-feedback"><?= $validation->getError('ketersediaan') ?></div>
                </div>
            </div>
            <div class="col-lg-6">
                <div>
                    <label class="form-label" for="harga">Harga Barang</label>
                    <input type="number" class="form-control <?= $validation->hasError('harga') ? 'is-invalid' : '' ?>" id="harga" name="harga" value="<?= old('harga') ?? ($barang ?? false ? $barang->harga_barang : '') ?>" required>
                    <div class="invalid-feedback"><?= $validation->getError('harga') ?></div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-lg-6">
                <div>
                    <label class="form-label" for="ruangan">Ruangan</label>
                    <select class="form-select <?= $validation->hasError('ruangan') ? 'is-invalid' : '' ?>" aria-label="Default select example" id="ruangan" name="ruangan" data-select="<?= old('ruangan') ?? ($barang ?? false ? $barang->id_ruangan : '') ?>">
                        <?php foreach ($ruangan as $ruangan) : ?>
                            <option value="<?= $ruangan->id_ruangan ?>"><?= $ruangan->nama_ruangan ?></option>
                        <?php endforeach ?>
                    </select>
                    <div class="invalid-feedback"><?= $validation->getError('ruangan') ?></div>
                </div>
            </div>
            <div class="col-lg-6">
                <div>
                    <label class="form-label" for="gambar">Foto Barang</label>
                    <input type="file" class="form-control <?= session()->getFlashdata('gambarError') ? 'is-invalid' : '' ?>" id="gambar" name="gambar" accept=".jpg,.png,.jpeg">
                    <div class="invalid-feedback"><?= session()->getFlashdata('gambarError') ?></div>
                </div>
            </div>
        </div>
        <div class="row mb-3 justify-content-end">
            <div class="col-md-3 justify-content-end d-flex gap-3">
                <a href="/barang" class="btn btn-warning">Kembali</a>
                <button class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </form>
</div>

<?= $this->endSection() ?>