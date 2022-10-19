<?= $this->extend('templates/template') ?>

<?= $this->section('content') ?>

<div class="title row">
    <h1 class="text-center">Manajemen Data Penyimpanan</h1>
</div>

<div class="action row">
    <div class="entries d-flex align-items-center col-md-2">
        <label for="">Show</label>

        <select name="" id="" class="form-select">
            <?php for ($i = 1; $i < 5; $i++) : ?>
                <option value=""><?= $i ?></option>
            <?php endfor ?>
        </select>

        <span>Entries</span>
    </div>

    <div class="add-data-button row col-md-11 d-flex justify-content-end mb-5 mx-auto">
        <button type="button" class="btn btn-primary col-md-1">Tambah</button>
    </div>
</div>

<div class="table-penyimpanan col-md-11 mx-auto row">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Kategori Barang</th>
                <th scope="col">Jumlah Barang</th>
                <th scope="col">Jumlah Penyimpanan</th>
                <th scope="col">Tanggal Penyimpanan</th>
                <th scope="col">Nama Ruangan</th>
                <th scope="col">Tanggal Pencatatan</th>
                <th scope="col" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php for ($i = 1; $i <= 7; $i++) : ?>
                <tr>
                    <th scope="row"><?= $i ?></th>
                    <td>Nama Barang <?= $i ?></td>
                    <td>Kategori Barang <?= $i ?></td>
                    <td>Jumlah Barang <?= $i ?></td>
                    <td>Jumlah Penyimpanan <?= $i ?></td>
                    <td>Tanggal Penyimpanan <?= $i ?></td>
                    <td>Nama Ruangan <?= $i ?></td>
                    <td>Tanggal Pencatatan <?= $i ?></td>
                    <td class="d-flex justify-content-between align-items-center">
                        <a href="">
                            <button class="btn btn-warning"><i class="fa-solid fa-eye"></i></button>
                        </a>

                        <a href="">
                            <button class="btn btn-primary"><i class="fa-regular fa-pen-to-square"></i></button>
                        </a>

                        <form action="" method="POST">
                            <button class="btn btn-danger" type="submit"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            <?php endfor ?>
        </tbody>
    </table>
</div>

<div class="footer mt-4 row">
    <div class="previous-next col-md-11 d-flex justify-content-end mx-auto">
        <button type="button" class="btn btn-primary rounded-0">Previous</button>
        <span class="py-2 px-3 border border-secondary">1</span>
        <button type="button" class="btn btn-primary rounded-0">Next</button>
    </div>
</div>

<?= $this->endSection() ?>