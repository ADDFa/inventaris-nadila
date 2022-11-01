<?= $this->extend('templates/template') ?>

<?= $this->section('content') ?>

<div class="title">
    <h1>Manajemen Data Gedung</h1>
</div>

<div class="action">
    <div class="entries">
        <label for="">Show</label>

        <select name="" id="">
            <?php for ($i = 1; $i < 5; $i++) : ?>
                <option value=""><?= $i ?></option>
            <?php endfor ?>
        </select>
        <span>Entries</span>
    </div>

    <div class="add-data-button">
        <button type="button">Insert Data</button>
    </div>
</div>

<div class="list-gedung">
    <?php for ($i = 0; $i < 3; $i++) : ?>
        <div class="card text-bg-light mb-3" style="max-width: 18rem;">
            <div class="card-header text-center">Jumlah Gedung</div>
            <div class="card-body">
                <img class="w-100" src="/images/gedung/sample.jpg" alt="gedung">
            </div>
            <div class="card-footer text-center">
                <a href="#">Lihat Detail ></a>
            </div>
        </div>
    <?php endfor ?>
</div>

<div class="footer">
    <div class="previous-next">
        <button type="button">Previous</button>
        <span>1</span>
        <button type="button">Next</button>
    </div>
</div>

<?= $this->endSection() ?>