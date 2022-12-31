<?= $this->extend('partials/main') ?>

<?= $this->section('content') ?>

<div class="row col-lg-10 mx-auto mb-3">
    <div class="col-lg-6">
        <fieldset disabled>
            <div class="mb-3">
                <label class="form-label">Nama Barang</label>
                <input type="text" class="form-control" value="">
            </div>
            <div class="mb-3">
                <label class="form-label">Jumlah Barang</label>
                <input type="text" class="form-control" value="">
            </div>
            <div class="mb-3">
                <label class="form-label">Kategori Barang</label>
                <input type="text" class="form-control" value="">
            </div>

        </fieldset>
    </div>
    <div class="col-lg-6">
        <fieldset disabled>
            <div class="mb-3">
                <label class="form-label">Dikelola Oleh</label>
                <input type="text" class="form-control" value="">
            </div>
            <div class="mb-3">
                <label class="form-label">Jenis Barang</label>
                <input type="text" class="form-control" value="">
            </div>
        </fieldset>
    </div>
</div>

<div class="mb-3 d-flex justify-content-end gap-3 col-lg-10 mx-auto">
    <a href="/item" class="btn btn-warning">Kembali</a>
    <a href="/item/<?= $item->id ?>/edit" class="btn btn-primary">Ubah</a>
</div>

<div class="col-lg-10 mx-auto mb-3">
    <h2 class="mb-3 my-5 fw-bold">Detail Penyimpanan</h2>

    <table class="table">
        <thead>
            <tr class="text-center">
                <th scope="col">No</th>
                <th scope="col">Lokasi Ruangan</th>
                <th scope="col">Tanggal Disimpan</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Pengelola</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($storages as $i => $storage) : ?>
                <tr class="text-center align-middle">
                    <th scope="row"><?= ++$i ?>1</th>
                    <td><?= $storage->room_name ?></td>
                    <td><?= date('d-m-Y', $storage->record_date) ?></td>
                    <td><?= $storage->qty ?></td>
                    <td><?= $storage->name ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>