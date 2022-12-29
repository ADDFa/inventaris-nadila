<?= $this->extend('partials/main') ?>

<?= $this->section('content') ?>
<h1>
    Test
</h1>
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

    <a href="/room/new" type="button" class="btn btn-default">+ Insert Data</a>
</div>

<div class="table-ruangan col-lg-11 mx-auto my-5 row">
    <div class="row my-3 gap-3 justify-content-end">
        <div class="spinner-border text-warning d-none" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <form action="/search/room" class="d-flex gap-3 col-lg-5" data-table="room">
            <input type="text" class="form-control" placeholder="Cari Berdasarkan Nama">
            <button type="button" class="search btn btn-primary">Cari</button>
        </form>
    </div>

    <table class="table">
        <thead>
            <tr class="text-center">
                <th scope="col">No</th>
                <th scope="col">Nama Ruangan</th>
                <th scope="col">Kapasitas</th>
                <th scope="col">Terisi</th>
                <th scope="col">Tersedia</th>
                <th scope="col">Nama Gedung</th>
                <th scope="col" class="col-lg-2">Aksi</th>
            </tr>
        </thead>

        <tbody class="table-group-divider">
            <?php foreach ($rooms as $i => $room) : ?>
                <tr class="text-center align-middle">
                    <th scope="row"><?= ++$i ?></th>
                    <td><?= $room->room_name ?></td>
                    <td><?= $room->room_capacity ?></td>
                    <td><?= $room->filed ?></td>
                    <td><?= $room->available ?></td>
                    <td><?= $room->building_name ?></td>
                    <td class="col-lg-2">
                        <div class="d-flex justify-content-center gap-3">
                            <a href="/room/<?= $room->room_id ?>">
                                <button class="btn btn-warning">
                                    <i class='bx bxs-show bx-sm'></i>
                                </button>
                            </a>

                            <a href="/room/<?= $room->room_id ?>/edit">
                                <button class="btn btn-primary">
                                    <i class='bx bx-edit bx-sm'></i>
                                </button>
                            </a>

                            <form action="/room/<?= $room->room_id ?>" method="POST">
                                <input type="hidden" name="_method" value="DELETE">

                                <input type="hidden" name="id" value="<?= $room->room_id ?>">
                                <button type="button" class="btn btn-danger delete">
                                    <i class='bx bxs-trash-alt bx-sm delete'></i>
                                </button>
                                <button type="submit" hidden></button>
                            </form>
                        </div>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>