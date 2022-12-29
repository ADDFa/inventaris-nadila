<?= $this->extend('partials/main') ?>

<?= $this->section('content') ?>

<div class="row col-lg-10 mx-auto mb-3">
    <div class="col-lg-6">
        <fieldset disabled>
            <div class="mb-3">
                <label class="form-label">Nama Barang</label>
                <input type="text" class="form-control" value="Handphone">
            </div>
            <div class="mb-3">
                <label class="form-label">Jumlah Barang</label>
                <input type="text" class="form-control" value="asdasd">
            </div>
            <div class="mb-3">
                <label class="form-label">Kategori Barang</label>
                <input type="text" class="form-control" value="asdasd">
            </div>
            <div class="mb-3">
                <label class="form-label">Jenis Barang</label>
                <input type="text" class="form-control" value="asdasd">
            </div>
        </fieldset>
    </div>
    <div class="col-lg-6">
        <fieldset disabled>
            <div class="mb-3">
                <label class="form-label">Dikelola Oleh</label>
                <input type="text" class="form-control" value="asdasd">
            </div>
        </fieldset>
    </div>
</div>

<div class="col-lg-10 mx-auto mb-3">
    <h2>Detail Penyimpanan</h2>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Lokasi Ruangan</th>
                <th scope="col">Tanggal Disimpan</th>
                <th scope="col">Jumlah Barang Di Ruangan</th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i = 0; $i < 10; $i++) : ?>
                <tr>
                    <th scope="row"><?= ++$i ?></th>
                    <td><?= 'asdasd' ?></td>
                    <td><?= 'asdasd' ?></td>
                    <td><?= 'asdasd' ?> Barang</td>
                </tr>
            <?php endfor ?>
        </tbody>
    </table>
</div>

<div class="mb-3 d-flex justify-content-end gap-3 col-lg-10 mx-auto">
    <a href="/item" class="btn btn-warning">Kembali</a>
    <a href="/item/<?= 1 ?>/edit" class="btn btn-primary">Ubah</a>
</div>

<?= $this->endSection() ?>