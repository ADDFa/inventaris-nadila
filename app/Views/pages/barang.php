<?= $this->extend('templates/template') ?>

<?= $this->section('content') ?>

<?= $this->include('components/topAndAction') ?>

<div class="table-barang col-md-11 mx-auto row my-5">
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

<?= $this->include('components/bottomAndAction') ?>

<?= $this->endSection() ?>