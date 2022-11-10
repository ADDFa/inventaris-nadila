<?= $this->extend('templates/template') ?>

<?= $this->section('content') ?>

<?= $this->include('components/topAndAction') ?>

<?php if ($x = session()->getFlashdata('crud') ?? false) : ?>
    <div class="alert alert-<?= $x->status ?> alert-dismissible fade show w-100 my-3" role="alert">
        <?= $x->message ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif ?>

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
            <?php foreach ($ruangan as $no => $ruangan) : ?>
                <tr>
                    <th scope="row"><?= $no + 1 ?></th>
                    <td>Qr_Code <?= $no + 1 ?></td>
                    <td><?= $ruangan->nama_ruangan ?></td>
                    <td><?= $ruangan->kapasitas_ruangan ?></td>
                    <td>Terisi <?= $no + 1 ?></td>
                    <td>Foto <?= $no + 1 ?></td>
                    <td class="d-flex justify-content-between align-items-center">
                        <a href=""><button class="btn btn-warning"><i class="fa-solid fa-eye"></i></button></a>

                        <a href=""><button class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></button></a>

                        <form action="">
                            <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>

                        </form>


                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?= $this->include('components/bottomAndAction') ?>

<?= $this->endSection() ?>