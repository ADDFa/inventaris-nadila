<?= $this->extend('templates/template') ?>

<?= $this->section('content') ?>

<div class="title row">
    <h1 class="text-center">Manajemen Data Barang</h1>
</div>

<div class="action row">
    <div class="entries d-flex align-items-center col-md-2">
        <label for="">Show</label>

        <select name="" id="" class="form-select ">
            <?php for ($i = 1; $i < 5; $i++) : ?>
                <option value=""><?= $i ?></option>
            <?php endfor ?>
        </select>
        <span>Entries</span>
    </div>

    <div class="add-data-button row col-md-11 d-flex justify-content-end mb-5 p-0 mx-auto">
        <button type="button" class="btn btn-primary col-md-1">Tambah</button>
    </div>
</div>

<div class="table-barang col-md-11 mx-auto row">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Id_Barang</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Foto</th>
                <th scope="col">Kategori</th>
                <th scope="col">Merk </th>
                <th scope="col">Jenis Barang</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Tanggal Pencatatan</th>
                <th scope="col" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
           <?php for ($i = 1; $i <= 7; $i++) : ?>
            <tr>
                <th scope="row"><?= $i ?></th>
                <td>Qr_Code <?= $i ?></td>
                <td>Nama Barang <?= $i ?></td>
                <td>Foto <?= $i ?></td>
                <td>Kategori <?= $i ?></td>
                <td>Merk <?= $i ?></td>
                <td>Jenis Barang <?= $i ?></td>
                <td>Jumlah <?= $i ?></td>
                <td>Tanggal Pencatatan <?= $i ?></td>
                <td class="d-flex justify-content-between align-items-center">
                    <a href=""><button class="btn btn-warning"><i class="fa-solid fa-eye"></i></button></a>
                    
                    <a href=""><button class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></button></a>

                    <form action="">
                        <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>

                    </form>
    

                </td>
            </tr>
            <?php endfor ?>
        </tbody>
    </table>

</div>

<div class="footer mt=4 row">
    <div class="previous-next col-md-10 d-flex justify-content-end mx-auto">
        <button type="button" class="btn btn-primary rounded-0">Previous</button>
        <span for="" class="py-2 px-3 border border-secondary">1</span>
        <button type="button" class="btn btn-primary rounded-0">Next</button>
    </div>
</div>

<?= $this->endSection() ?>