<?= $this->extend('templates/template') ?>

<?= $this->section('content') ?>

<h1 class="text-center fw-bold"><?= $title ?> Barang</h1>

<div class="col-lg-10 mx-auto mt-5">
    <form action="/barang/<?= $path ?>" method="POST">
        <?php if ($path === 'update') : ?>
            <input type="hidden" name="id" value="<?= $id ?>">
        <?php endif ?>

        <div class="row mb-3">
            <div class="col-lg-6">
                <div>
                    <label class="form-label" for="nama">Nama Barang</label>
                    <input type="text" class="form-control" id="nama" name="nama" aria-describedby="emailHelp">
                </div>
            </div>
            <div class="col-lg-6">
                <div>
                    <label class="form-label" for="kategori">Kategori Barang</label>
                    <input type="text" class="form-control" id="kategori" name="kategori" aria-describedby="emailHelp">
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-lg-6">
                <div>
                    <label class="form-label" for="jenis">Jenis Barang</label>
                    <input type="text" class="form-control" id="jenis" name="jenis" aria-describedby="emailHelp">
                </div>
            </div>
            <div class="col-lg-6">
                <div>
                    <label class="form-label" for="jumlah">Jumlah Barang</label>
                    <input type="text" class="form-control" id="jumlah" name="jumlah" aria-describedby="emailHelp">
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="merk">Merk Barang</label>
                    <input type="text" class="form-control" id="merk" name="merk" aria-describedby="emailHelp">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-4">
                        <label class="form-label" for="tanggal">Tanggal Pencatatan</label>
                        <select class="form-select" aria-label="Default select example" id="tanggal" name="tanggal">
                            <?php for ($i = 0; $i < 30; $i++) : ?>
                                <option value="<?= $i + 1 ?>"><?= $i + 1 ?></option>
                            <?php endfor ?>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label class="form-label" for="bulan">Bulan Pencatatan</label>
                        <select class="form-select" aria-label="Default select example" id="bulan" name="bulan">
                            <?php for ($i = 0; $i < 12; $i++) : ?>
                                <option value="<?= $i + 1 ?>"><?= $i + 1 ?></option>
                            <?php endfor ?>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label class="form-label" for="tahun">Tahun Pencatatan</label>
                        <select class="form-select" aria-label="Default select example" id="tahun" name="tahun">
                            <?php for ($i = 2019; $i < 2022; $i++) : ?>
                                <option value="<?= $i + 1 ?>"><?= $i + 1 ?></option>
                            <?php endfor ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-lg-6">
                <div>
                    <label class="form-label" for="ketersediaan">Ketersediaan Barang</label>
                    <input type="text" class="form-control" id="ketersediaan" name="ketersediaan" aria-describedby="emailHelp">
                </div>
            </div>
            <div class="col-lg-6">
                <div>
                    <label class="form-label" for="harga">Harga Barang</label>
                    <input type="number" class="form-control" id="harga" name="harga" aria-describedby="emailHelp">
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-lg-6">
                <div>
                    <label class="form-label" for="gambar">Foto Barang</label>
                    <input type="file" class="form-control" id="gambar" name="gambar" aria-describedby="emailHelp">
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