<?= $this->extend('templates/template') ?>

<?= $this->section('content') ?>

<div class="title">
    <h1></h1>
</div>

<div class="action">
    <div class="entries">
        <label for=""></label>

        <select name="" id="">
            <?php for ($i = 1; $i < 5; $i++) : ?>
                <option value=""></option>
            <?php endfor ?>
        </select><span></span>
    </div>

    <div class="add-data-button">
        <button type="button"></button>
    </div>
</div>

<div class="list-gedung">
    <?php for ($i = 0; $i < 3; $i++) : ?>
        <div>
            <div class="judul">
                <h5></h5>
            </div>

            <div class="gambar">
                <img src="" alt="">
            </div>

            <div class="detail">
                <a href="">View details ></a>
            </div>
        </div>
    <?php endfor ?>
</div>

<div class="footer">
    <div class="previous-next">
        <button type="button"></button>
        <label></label>
        <button type="button"></button>
    </div>
</div>

<?= $this->endSection() ?>