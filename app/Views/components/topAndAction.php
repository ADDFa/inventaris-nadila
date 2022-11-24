<div class="title row">
    <h1 class="text-center fw-bold">Manajemen Data <?= $title ?></h1>
</div>

<div class="d-flex flex-wrap justify-content-between align-items-center px-5 gap-3">
    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
        <!-- <button type="button" class="btn btn-default">Show</button> -->

        <div class="btn-group" role="group">
            <button type="button" class="btn btn-default dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                Show
            </button>
            <ul class="dropdown-menu">
                <?php if ($jumlahPages ?? false) : ?>
                    <?php for ($i = 1; $i <= $jumlahPages; $i++) : ?>
                        <li><a class="dropdown-item" href="<?= '?pages=' . $i ?>">Halaman <?= $i ?></a></li>
                    <?php endfor ?>
                <?php else : ?>
                    <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                    <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                <?php endif ?>
            </ul>
        </div>

        <!-- <button type="button" class="btn btn-default">Entries</button> -->
    </div>


    <a href="<?= $linkAction['create'] ?>" type="button" class="btn btn-default">+ Insert Data</a>
</div>