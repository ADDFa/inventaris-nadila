<div class="title row">
    <h1 class="text-center fw-bold">Manajemen Data <?= $title ?></h1>
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


    <a href="<?= $linkAction['create'] ?>" type="button" class="btn btn-default">+ Insert Data</a>
</div>