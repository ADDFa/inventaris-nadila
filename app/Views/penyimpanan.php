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

<div class="table-barang">
    <table>
        <thead>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            <?php for ($i = 0; $i < 9; $i++) : ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            <?php endfor ?>
        </tbody>
    </table>
</div>

<div class="footer">
    <div class="previous-next">
        <button type="button"></button>
        <label for=""></label>
        <button type="button"></button>
    </div>
</div>

<?= $this->endSection() ?>