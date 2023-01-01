<?= $this->extend('partials/main') ?>

<?= $this->section('content') ?>

<div class="d-flex flex-wrap justify-content-between align-items-center px-5 gap-3">
    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-default dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                Show
            </button>
            <ul class="dropdown-menu">
                <?php for ($i = 1; $i <= $pages; $i++) : ?>
                    <li><a class="dropdown-item" href="<?= "?pages=$i" ?>"><?= "Halaman $i" ?></a></li>
                <?php endfor ?>
            </ul>
        </div>
    </div>

    <a href="/storage/new" type="button" class="btn btn-default">+ Insert Data</a>
</div>

<div class="col-lg-11 my-5 mx-auto filters">
    <h4 class="text-nowrap">Filter Berdasarkan</h4>

    <div class="d-flex justify-content-between">
        <div class="d-flex mb-3 gap-3 col-lg-7">
            <select class="form-select" id="category" aria-label="Default select example">
                <option selected value="">Kategori</option>
                <?php foreach ($categories as $category) : ?>
                    <option class="text-capitalize" value="<?= $category ?>"><?= $category ?></option>
                <?php endforeach ?>
            </select>
            <select class="form-select" id="type" aria-label="Default select example">
                <option selected value="">Jenis</option>
                <?php foreach ($types as $type) : ?>
                    <option class="text-capitalize" value="<?= $type ?>"><?= $type ?></option>
                <?php endforeach ?>
            </select>
            <div class="d-flex align-items-center gap-3">
                <label class="form-label">Tanggal</label>
                <input type="date" class="form-control" id="start-date">
                <span>-</span>
                <input type="date" class="form-control" id="end-date">
            </div>
        </div>

        <div class="spinner-border text-warning d-none" id="loading" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>

        <div class="col-lg-4 d-flex align-items-start gap-2">
            <input type="text" id="search" class="form-control" placeholder="Cari Berdasarkan Nama">
            <button type="button" class="search btn btn-primary">Cari</button>
        </div>
    </div>

    <div class="d-flex gap-3">
        <button type="button" class="btn btn-secondary position-relative">
            Kategori
            <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle" style="width: 10px; height: 10px;">
                <i class='bx bx-x' style="position: absolute; top: 0; left: 0;"></i>
            </span>
        </button>
    </div>
</div>

<div class="table-gedung col-lg-11 mx-auto my-5 row">
    <table class="table">
        <thead>
            <tr class="text-center">
                <th scope="col">No</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Lokasi Penyimpanan</th>
                <th scope="col">Tanggal Disimpan</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Pengelola</th>
                <th scope="col" class="col-lg-2">Aksi</th>
            </tr>
        </thead>

        <tbody class="table-group-divider">
            <?php foreach ($storages as $i => $storage) : ?>
                <tr class="text-center align-middle">
                    <th scope="row"><?= ++$i ?></th>
                    <td><?= $storage->item_name ?></td>
                    <td><?= $storage->room_name ?></td>
                    <td><?= date('d-m-Y', $storage->record_date) ?></td>
                    <td><?= $storage->qty ?></td>
                    <td><?= $storage->name ?></td>
                    <td class="col-lg-2">
                        <div class="d-flex justify-content-center gap-3">
                            <a href="/storage/<?= $storage->id ?>">
                                <button class="btn btn-warning">
                                    <i class='bx bxs-show bx-sm'></i>
                                </button>
                            </a>
                            <a href="/storage/<?= $storage->id ?>/edit">
                                <button class="btn btn-primary">
                                    <i class='bx bx-edit bx-sm'></i>
                                </button>
                            </a>
                            <form action="/storage/<?= $storage->id ?>" method="POST">
                                <input type="hidden" name="_method" value="DELETE">

                                <button type="button" class="delete btn btn-danger">
                                    <i class='bx bxs-trash-alt bx-sm delete'></i>
                                </button>
                                <button hidden type="submit"></button>
                            </form>
                        </div>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>