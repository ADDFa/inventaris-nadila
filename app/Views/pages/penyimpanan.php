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
                <th>Nama Barang</th>
                <th>Nama Ruang</th>
                <th>Kategori</th>
                <th>Jumlah</th>
                <th>Tgl Simpan</th>
                <th>Kondisi</th>
                <th>Opsi</th>
            </tr>
        </thead>

        <tbody>
            <?php for ($i = 0; $i < 9; $i++) : ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td>Meja</td>
                    <td><Ruangan1/td>
                    <td>Non Elektronik</td>
                    <td>30</td>
                    <td>04-10-2022</td>
                    <td>Baru</td>
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