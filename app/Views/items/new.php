<?= $this->extend('partials/main') ?>

<?= $this->section('content') ?>

<h1 class="text-center fw-bold mb-5"><?= $title ?></h1>

<form action="/item" method="POST" class="col-lg-10 mx-auto">
    <div class="row mb-3">
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="item_name" class="form-label">Nama Barang</label>
                <input id="item_name" name="item_name" type="text" class="form-control <?= $validation->hasError('item_name') ? 'is-invalid' : '' ?>" value="<?= old('item_name') ?>" aria-describedby="item_nameFeedback">
                <span class="invalid-feedback" id="item_nameFeedback"><?= $validation->getError('item_name') ?></span>
            </div>
            <div class="mb-3">
                <label for="item_total" class="form-label">Jumlah Barang</label>
                <input id="item_total" name="item_total" type="number" class="form-control <?= $validation->hasError('item_total') ? 'is-invalid' : '' ?>" value="<?= old('item_total') ?>" aria-describedby="item_totalFeedback">
                <span class="invalid-feedback" id="item_totalFeedback"><?= $validation->getError('item_total') ?></span>
            </div>
            <div class="mb-3">
                <label for="item_condition" class="form-label">Kondisi Barang</label>
                <input id="item_condition" name="item_condition" type="text" class="form-control <?= $validation->hasError('item_condition') ? 'is-invalid' : '' ?>" value="<?= old('item_condition') ?>" aria-describedby="item_conditionFeedback">
                <span class="invalid-feedback" id="item_conditionFeedback"><?= $validation->getError('item_condition') ?></span>
            </div>
            <div class="mb-3">
                <label for="item_price" class="form-label">Harga Barang</label>
                <input id="item_price" name="item_price" type="number" class="form-control <?= $validation->hasError('item_price') ? 'is-invalid' : '' ?>" value="<?= old('item_price') ?>" aria-describedby="item_priceFeedback">
                <span class="invalid-feedback" id="item_priceFeedback"><?= $validation->getError('item_price') ?></span>
            </div>
            <div class="mb-3">
                <label for="item_brand" class="form-label">Merk Barang</label>
                <input id="item_brand" name="item_brand" type="text" class="form-control <?= $validation->hasError('item_brand') ? 'is-invalid' : '' ?>" value="<?= old('item_brand') ?>" aria-describedby="item_brandFeedback">
                <span class="invalid-feedback" id="item_brandFeedback"><?= $validation->getError('item_brand') ?></span>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="record_date" class="form-label">Tanggal Pencatatan</label>
                <input id="record_date" name="record_date" type="datetime-local" class="form-control <?= $validation->hasError('record_date') ? 'is-invalid' : '' ?>" value="<?= old('record_date') ?>" aria-describedby="record_dateFeedback">
                <span class="invalid-feedback" id="record_dateFeedback"><?= $validation->getError('record_date') ?></span>
            </div>
            <div class="mb-3">
                <label for="room_id" class="form-label">Pilih Ruangan</label>

                <div class="row m-0 justify-content-between align-items-center">
                    <select class="form-select" id="room_id" name="room_id" aria-describedby="room_idFeedback" data-select="<?= old('room_id') ?>">
                        <?php foreach ($rooms as $room) : ?>
                            <option value="<?= $room->id ?>"><?= $room->room_name ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Kategori Barang</label>

                <div class="row m-0 justify-content-between align-items-center">
                    <div class="col-lg-9 p-0">
                        <select class="form-select" id="category_id" name="category_id" aria-describedby="category_idFeedback" data-select="<?= old('category_id') ?>">
                            <?php foreach ($categories as $category) : ?>
                                <option value="<?= $category->id ?>"><?= $category->category_name ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="col-lg-3 p-0 d-flex justify-content-end">
                        <button data-bs-toggle="modal" data-bs-target="#manage-item" type="button" class="manage-category d-block btn badge bg-info">Kelola Kategori</button>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="type_id" class="form-label">Jenis Barang</label>

                <div class="row m-0 justify-content-between align-items-center">
                    <div class="col-lg-9 p-0">
                        <select class="form-select" id="type_id" name="type_id" aria-describedby="type_idFeedback" data-select="<?= old('type_id') ?>">
                            <?php foreach ($types as $type) : ?>
                                <option value="<?= $type->id ?>"><?= $type->type_name ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="col-lg-3 p-0 d-flex justify-content-end">
                        <button data-bs-toggle="modal" data-bs-target="#manage-item" type="button" class="manage-type d-block btn badge bg-info">Kelola Type</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mb-3 d-flex justify-content-end gap-3 mx-auto">
        <a href="/item" class="btn btn-warning">Kembali</a>
        <button class="btn btn-primary">Simpan</button>
    </div>
</form>

<!-- Manage Item -->
<div class="modal fade" id="manage-item" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Kelola Kategori</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span>Data</span>

                        <form action="" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn badge bg-danger">Hapus</button>
                        </form>
                    </li>
                </ul>

                <form action="/item/category" method="POST">
                    <div class="mb-3">
                        <label for="category_name" class="form-label">Tambah Kategori</label>
                        <input type="text" id="category_name" name="category_name" class="form-control">
                    </div>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-default">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>