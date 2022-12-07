<?= $this->extend('partials/main') ?>

<?= $this->section('content') ?>

<figure class="figure col-lg-5 mx-auto d-block mb-3">
    <img src="/images/rooms/<?= $item->room_image ?>" class="figure-img img-fluid rounded" alt="Gambar Ruangan">
    <figcaption class="figure-caption text-center fs-5"><?= $item->room_name ?></figcaption>
</figure>

<div class="row col-lg-10 mx-auto mb-3">
    <div class="col-lg-6">
        <fieldset disabled>
            <div class="mb-3">
                <label class="form-label">Nama Barang</label>
                <input type="text" class="form-control" value="<?= $item->item_name ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Jumlah Barang</label>
                <input type="text" class="form-control" value="<?= $item->item_total ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Kategori Barang</label>
                <input type="text" class="form-control" value="<?= $item->category_name ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Jenis Barang</label>
                <input type="text" class="form-control" value="<?= $item->type_name ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Merk Barang</label>
                <input type="text" class="form-control" value="<?= $item->item_brand ?>">
            </div>
        </fieldset>
    </div>
    <div class="col-lg-6">
        <fieldset disabled>
            <div class="mb-3">
                <label class="form-label">Lokasi Barang</label>
                <input type="text" class="form-control" value="<?= $item->room_name ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Kondisi Barang</label>
                <input type="text" class="form-control" value="<?= $item->item_condition ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Harga Barang</label>
                <input type="text" class="form-control" value="<?= $item->item_price ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Dikelola Oleh</label>
                <input type="text" class="form-control" value="<?= $item->name ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Pada Tanggal</label>
                <input type="text" class="form-control" value="<?= date('d - M - Y', $item->record_date) . ' Pukul : ' . date('H:i:s', $item->record_date) ?>">
            </div>
        </fieldset>
    </div>
</div>

<div class="mb-3 d-flex justify-content-end gap-3 col-lg-10 mx-auto">
    <a href="/item" class="btn btn-warning">Kembali</a>
    <a href="/item/<?= $item->item_id ?>/edit" class="btn btn-primary">Ubah</a>
</div>

<?= $this->endSection() ?>