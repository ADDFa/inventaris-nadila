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

        </fieldset>
    </div>
    <div class="col-lg-6">
        <fieldset disabled>
            <div class="mb-3">
                <label class="form-label">Dikelola Oleh</label>
                <input type="text" class="form-control" value="asdasd">
            </div>
            <div class="mb-3">
                <label class="form-label">Jenis Barang</label>
                <input type="text" class="form-control" value="asdasd">
            </div>
        </fieldset>
    </div>
</div>

<div class="col-lg-10 mx-auto mb-3">
    <h2 class="mb-5 text-danger">Detail Penyimpanan</h2>

    <table class="table">
        <thead>
            <tr class="text-center">
                <th scope="col">No</th>
                <th scope="col">Lokasi Ruangan</th>
                <th scope="col">Tanggal Disimpan</th>
                <th scope="col">Jumlah Barang Di Ruangan</th>
                <th scope="col" class="col-lg-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i = 0; $i < 10; $i++) : ?>
                <tr class="text-center align-middle">
                    <th scope="row"><?= ++$i ?>1</th>
                    <td>Ruangan 7A</td>
                    <td>25122022</td>
                    <td>20</td>
                    <td>
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class='bx bx-show bx-sm'></i>
                        </button>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class='bx bx-edit bx-sm'></i>
                        </button>
                        <button type="button" class="btn btn-danger">
                            <i class='bx bxs-trash-alt bx-sm delete'></i>
                        </button>
                    </td>
                </tr>
            <?php endfor ?>
        </tbody>
    </table>
</div>

<div class="mb-3 d-flex justify-content-end gap-3 col-lg-10 mx-auto">
    <a href="/item" class="btn btn-warning">Kembali</a>
    <a href="/item/<?= 1 ?>/edit" class="btn btn-primary">Ubah</a>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>