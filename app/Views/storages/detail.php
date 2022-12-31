<?= $this->extend('partials/main') ?>

<?= $this->section('content') ?>

<div class="row col-lg-10 mx-auto mb-3">
    <div class="col-lg-6">
        <fieldset disabled>
            <div class="mb-3">
                <label class="form-label">Nama Barang</label>
                <input type="text" class="form-control" value="<?= $storage->item_name ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Jumlah Barang</label>
                <input type="text" class="form-control" value="<?= $storage->qty ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Kategori Barang</label>
                <input type="text" class="form-control" value="<?= $storage->item_category ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Jenis Barang</label>
                <input type="text" class="form-control" value="<?= $storage->item_category ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Merk Barang</label>
                <input type="text" class="form-control" value="<?= $storage->item_brand ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Kondisi Barang</label>
                <input type="text" class="form-control" value="<?= $storage->item_condition ?>">
            </div>
        </fieldset>
    </div>
    <div class="col-lg-6">
        <fieldset disabled>
            <div class="mb-3">
                <label class="form-label">Harga Barang</label>
                <input type="text" class="form-control" value="<?= $storage->item_price ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Dikelola Oleh</label>
                <input type="text" class="form-control" value="<?= $storage->name ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Status Pengelola</label>
                <input type="text" class="form-control" value="<?= $storage->role ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Lokasi Penyimpanan</label>
                <input type="text" class="form-control" value="<?= $storage->room_name ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Tanggal Penyimpanan</label>
                <input type="text" class="form-control" value="<?= date('d-m-Y', $storage->record_date) ?>">
            </div>
        </fieldset>
    </div>
</div>

<div class="mb-3 d-flex justify-content-end gap-3 col-lg-10 mx-auto">
    <a href="/storage" class="btn btn-warning">Kembali</a>
    <a href="/storage/<?= $storage->id ?>/edit" class="btn btn-primary">Ubah</a>
</div>

<?= $this->endSection() ?>