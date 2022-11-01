<?= $this->extend('templates/template') ?>

<?= $this->section('content') ?>

<div class="title text-center">
    <h1 class="fw-bold">Manajemen Data Ruangan</h1>
</div>

<div class="d-flex justify-content-between align-items-center px-5">
    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
        <button type="button" class="btn btn-primary">Show</button>

        <div class="btn-group" role="group">
            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                <li><a class="dropdown-item" href="#">Dropdown link</a></li>
            </ul>
        </div>

        <button type="button" class="btn btn-primary">Entries</button>
    </div>


    <button type="button" class="btn btn-primary">+ Insert Data</button>
</div>

<div class="table-ruangan col-md-11 mx-auto my-5 row">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Id Ruangan</th>
                <th scope="col">Nama Ruangan</th>
                <th scope="col">Kapasitas</th>
                <th scope="col">Terisi</th>
                <th scope="col">Foto</th>
                <th scope="col" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php for ($i = 1; $i <= 5; $i++) : ?>
                <tr>
                    <th scope="row"><?= $i ?></th>
                    <td>Qr_Code <?= $i ?></td>
                    <td>Nama Ruangan <?= $i ?></td>
                    <td>Kapasitas <?= $i ?></td>
                    <td>Terisi <?= $i ?></td>
                    <td>Foto <?= $i ?></td>
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

<div class="footer d-flex justify-content-end px-5 mb-5">
    <div class="btn-group" role="group" aria-label="Basic example">
        <a href="" class="btn btn-primary">Prev</a>
        <button type="button" class="btn btn-primary">1</button>
        <a href="" class="btn btn-primary">Next</a>
    </div>
</div>

<?= $this->endSection() ?>