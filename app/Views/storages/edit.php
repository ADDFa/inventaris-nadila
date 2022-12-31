<?= $this->extend('partials/main') ?>

<?= $this->section('content') ?>

<form action="/storage/<?= $storage->id ?>" method="POST">
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="room_id" value="<?= $storage->room_id ?>">
    <input type="hidden" name="item_id" value="<?= $storage->item_id ?>">

    <div class="col-lg-8 mx-auto">
        <div class="mb-3">
            <label class="form-label">Lokasi Ruangan</label>
            <input type="text" class="form-control" value="<?= $storage->room_name ?>" disabled>
        </div>
        <div class="mb-3">
            <label class="form-label">Nama Barang</label>
            <input type="text" class="form-control" value="<?= $storage->item_name ?>" disabled>
        </div>
        <div class="mb-3">
            <label for="qty" class="form-label">Jumlah Barang Disimpan</label>
            <input id="qty" name="qty" type="number" class="form-control <?= (session('errors')['qty'] ?? false) ? 'is-invalid' : '' ?>" value="<?= old('qty') ?? $storage->qty ?>" aria-describedby="qtyFeedback">
            <span class="invalid-feedback" id="qtyFeedback"><?= session('errors')['qty'] ?? '' ?></span>
        </div>
        <div class="mb-3">
            <label for="item_price" class="form-label">Harga Barang</label>
            <input id="item_price" name="item_price" type="number" class="form-control <?= (session('errors')['item_price'] ?? false) ? 'is-invalid' : '' ?>" value="<?= old('item_price') ?? $storage->item_price ?>" aria-describedby="item_priceFeedback">
            <span class="invalid-feedback" id="item_nameFeedback"><?= session('errors')['item_price'] ?? '' ?></span>
        </div>
        <div class="mb-3">
            <label for="item_brand" class="form-label">Merk Barang</label>
            <input id="item_brand" name="item_brand" type="text" class="form-control <?= (session('errors')['item_brand'] ?? false) ? 'is-invalid' : '' ?>" value="<?= old('item_brand') ?? $storage->item_brand ?>" aria-describedby="item_brandFeedback">
            <span class="invalid-feedback" id="item_nameFeedback"><?= session('errors')['item_brand'] ?? '' ?></span>
        </div>
        <div class="mb-3">
            <label for="item_condition" class="form-label">Kondisi Barang</label>
            <input id="item_condition" name="item_condition" type="text" class="form-control <?= (session('errors')['item_condition'] ?? false) ? 'is-invalid' : '' ?>" value="<?= old('item_condition') ?? $storage->item_condition ?>" aria-describedby="item_conditionFeedback">
            <span class="invalid-feedback" id="item_nameFeedback"><?= session('errors')['item_condition'] ?? '' ?></span>
        </div>
        <div class="mb-5 d-flex justify-content-end gap-3 mx-auto">
            <a href="/storage" class="btn btn-warning">Kembali</a>
            <button class="btn btn-primary">Simpan</button>
        </div>
    </div>
</form>

<?= $this->endSection() ?>