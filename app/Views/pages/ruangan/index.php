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
            <tr class="text-center">
                <th scope="col">No</th>
                <th scope="col">Id Ruangan</th>
                <th scope="col">Nama Ruangan</th>
                <th scope="col">Kapasitas</th>
                <th scope="col">Terisi</th>
                <th scope="col">Foto</th>
                <th scope="col" class="col-md-2">Aksi</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php foreach ($ruangan as $no => $ruangan) : ?>
                <tr class="text-center align-middle">
                    <th scope="row"><?= $no + 1 ?></th>
                    <td>Qr_Code <?= $no + 1 ?></td>
                    <td><?= $ruangan->nama_ruangan ?></td>
                    <td><?= $ruangan->kapasitas_ruangan ?></td>
                    <td><?= $ruangan->terisi ?></td>
                    <td class="col-md-2">
                        <img class="rounded-3 p-1 border bg-light w-100 h-100" src="<?= '/images/ruangan/' . $ruangan->gambar_ruangan ?>" alt="<?= $ruangan->gambar_ruangan ?>">
                    </td>
                    <td class="col-md-2">
                        <div class="d-flex justify-content-center gap-3">
                            <a href="/ruangan/detail/<?= $ruangan->id_ruangan ?>"><button class="btn btn-warning"><i class="fa-solid fa-eye"></i></button></a>

                            <a href="/ruangan/ubah/<?= $ruangan->id_ruangan ?>"><button class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></button></a>

                            <form action="/ruangan/delete" method="POST">
                                <input type="hidden" name="id" value="<?= $ruangan->id_ruangan ?>">

                                <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?= $this->include('components/bottomAndAction') ?>

<?= $this->endSection() ?>