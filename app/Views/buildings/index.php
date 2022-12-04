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

    <a href="/building/new" type="button" class="btn btn-default">+ Insert Data</a>
</div>

<div class="table-gedung col-lg-11 mx-auto my-5 row">
    <table class="table">
        <thead>
            <tr class="text-center">
                <th scope="col">No</th>
                <th scope="col">Nama Gedung</th>
                <th scope="col">Ukuran</th>
                <th scope="col">Jumlah Ruangan</th>
                <th scope="col" class="col-lg-2">Aksi</th>
            </tr>
        </thead>

        <tbody class="table-group-divider">
            <?php foreach ($buildings as $i => $building) : ?>
                <tr class="text-center align-middle">
                    <th scope="row"><?= ++$i ?></th>
                    <td><?= $building->building_name ?></td>
                    <td><?= $building->building_size ?></td>
                    <td><?= $building->room_total ?></td>
                    <td class="col-lg-2">
                        <div class="d-flex justify-content-center gap-3">
                            <a href="/building/<?= $building->id ?>">
                                <button class="btn btn-warning">
                                    <i class='bx bxs-show bx-sm'></i>
                                </button>
                            </a>

                            <a href="/building/<?= $building->id ?>/edit">
                                <button class="btn btn-primary">
                                    <i class='bx bx-edit bx-sm'></i>
                                </button>
                            </a>

                            <form action="/building/<?= $building->id ?>" method="POST">
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