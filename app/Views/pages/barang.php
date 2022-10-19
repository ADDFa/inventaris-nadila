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
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Merk</th>
                <th>Kategori</th>
                <th>Jumlah</th>
                <th>Kondisi</th>
                <th>Harga</th>
                <th>Opsi</th>
            </tr>
        </thead>

        <tbody>
            <?php for ($i = 0; $i < 9; $i++) : ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td>002</td>
                    <td>Kursi</td>
                    <td>Napoli</td>
                    <td>Non Elektronik</td>
                    <td>30</td>
                    <td>Baru</td>
                    <td>65000</td>
                    <th>
                        <div class="update">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </div>

                        <div class="delete">
                            <i class="fa-solid fa-trash"></i>
                        </div>
                    </th>
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