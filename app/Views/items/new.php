<?= $this->extend('partials/main') ?>

<?= $this->section('content') ?>

<form action="/item" method="POST">
    <div class="col-lg-8 mx-auto">
        <div class="mb-3">
            <label for="item_name" class="form-label">Nama Barang</label>
            <input id="item_name" name="item_name" type="text" class="form-control <?= (session('errors')['item_name'] ?? false) ? 'is-invalid' : '' ?>" value="<?= old('item_name') ?>" aria-describedby="item_nameFeedback">
            <span class="invalid-feedback" id="item_nameFeedback"><?= session('errors')['item_name'] ?? '' ?></span>
        </div>
        <div class="mb-3">
            <label for="item_category" class="form-label">Kategori Barang</label>
            <input id="item_category" name="item_category" type="text" class="form-control <?= (session('errors')['item_category'] ?? false) ? 'is-invalid' : '' ?>" value="<?= old('item_category') ?>" aria-describedby="item_categoryFeedback">
            <span class="invalid-feedback" id="item_nameFeedback"><?= session('errors')['item_category'] ?? '' ?></span>
        </div>
        <div class="mb-3">
            <label for="item_type" class="form-label">Jenis Barang</label>
            <input id="item_type" name="item_type" type="text" class="form-control <?= (session('errors')['item_type'] ?? false) ? 'is-invalid' : '' ?>" value="<?= old('item_type') ?>" aria-describedby="item_typeFeedback">
            <span class="invalid-feedback" id="item_nameFeedback"><?= session('errors')['item_type'] ?? '' ?></span>
        </div>
        <div class="mb-3 d-flex justify-content-end gap-3 mx-auto">
            <a href="/item" class="btn btn-warning">Kembali</a>
            <button class="btn btn-primary">Simpan</button>
        </div>
    </div>
</form>

<?= $this->endSection() ?>