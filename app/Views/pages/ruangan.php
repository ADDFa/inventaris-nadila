<?= $this->extend('templates/template') ?>

<?= $this->section('content') ?>

<?= $this->include('components/topAndAction') ?>

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

<?= $this->include('components/bottomAndAction') ?>

<?= $this->endSection() ?>