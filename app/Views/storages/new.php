<?= $this->extend('partials/main') ?>

<?= $this->section('content') ?>

<form action="/storage" method="POST">
    <div class="col-lg-8 mx-auto">
        <div class="mb-3">
            <label for="room_id" class="form-label">Pilih Ruangan</label>
            <select class="form-select" id="room_id" name="room_id" data-select="<?= old('room_id') ?>">
                <?php foreach ($rooms as $room) : ?>
                    <option value="<?= $room->id ?>"><?= $room->room_name ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="item_id" class="form-label">Pilih Barang</label>
            <select class="form-select" id="item_id" name="item_id" data-select="<?= old('item_id') ?>">
                <?php foreach ($items as $item) : ?>
                    <option value="<?= $item->id ?>"><?= $item->item_name ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="qty" class="form-label">Jumlah Barang Disimpan</label>
            <input id="qty" name="qty" type="number" class="form-control <?= (session('errors')['qty'] ?? false) ? 'is-invalid' : '' ?>" value="<?= old('qty') ?>" aria-describedby="qtyFeedback">
            <span class="invalid-feedback" id="qtyFeedback"><?= session('errors')['qty'] ?? '' ?></span>
        </div>
        <div class="mb-3">
            <label for="item_price" class="form-label">Harga Barang</label>
            <input id="item_price" name="item_price" type="number" class="form-control <?= (session('errors')['item_price'] ?? false) ? 'is-invalid' : '' ?>" value="<?= old('item_price') ?>" aria-describedby="item_priceFeedback">
            <span class="invalid-feedback" id="item_nameFeedback"><?= session('errors')['item_price'] ?? '' ?></span>
        </div>
        <div class="mb-3">
            <label for="item_brand" class="form-label">Merk Barang</label>
            <input id="item_brand" name="item_brand" type="text" class="form-control <?= (session('errors')['item_brand'] ?? false) ? 'is-invalid' : '' ?>" value="<?= old('item_brand') ?>" aria-describedby="item_brandFeedback">
            <span class="invalid-feedback" id="item_nameFeedback"><?= session('errors')['item_brand'] ?? '' ?></span>
        </div>
        <div class="mb-3">
            <label for="item_condition" class="form-label">Kondisi Barang</label>
            <input id="item_condition" name="item_condition" type="text" class="form-control <?= (session('errors')['item_condition'] ?? false) ? 'is-invalid' : '' ?>" value="<?= old('item_condition') ?>" aria-describedby="item_conditionFeedback">
            <span class="invalid-feedback" id="item_nameFeedback"><?= session('errors')['item_condition'] ?? '' ?></span>
        </div>
        <div class="mb-3 d-flex justify-content-end gap-3 mx-auto">
            <a href="/storage" class="btn btn-warning">Kembali</a>
            <button class="btn btn-primary">Simpan</button>
        </div>
    </div>
</form>

<?= $this->endSection() ?>