<?= $this->extend('templates/template') ?>

<?= $this->section('content') ?>

<div class="title row">
    <h1 class="text-center">Manajemen Data <?= $title ?></h1>
</div>

<div class="d-flex justify-content-between align-items-center px-5">
    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
        <button type="button" class="btn btn-default">Show</button>

        <div class="btn-group" role="group">
            <button type="button" class="btn btn-default dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                <li><a class="dropdown-item" href="#">Dropdown link</a></li>
            </ul>
        </div>

        <button type="button" class="btn btn-default">Entries</button>
    </div>


    <a href="/laproran/print" type="button" class="btn btn-default d-flex gap-2 align-items-center">
        <i class='bx bx-printer w-100 h-100'></i>
        Print
    </a>
</div>

<div class="table-penyimpanan col-md-11 mx-auto row my-5">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Kode Barang</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Nama Gedung</th>
                <th scope="col">Nama Ruangan</th>
                <th scope="col">Jumlah Barang</th>
                <th scope="col">Tanggal Penyimpanan</th>
                <th scope="col" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php for ($i = 1; $i <= 12; $i++) : ?>
                <tr>
                    <th scope="row"><?= $i ?></th>
                    <td>Kode Barang <?= $i ?></td>
                    <td>Nama Barang <?= $i ?></td>
                    <td>Nama Gedung <?= $i ?></td>
                    <td>Nama Ruangan <?= $i ?></td>
                    <td>Jumlah Barang <?= $i ?></td>
                    <td>Tanggal Penyimpanan <?= $i ?></td>
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

<?= $this->include('components/bottomAndAction') ?>

<?= $this->endSection() ?>