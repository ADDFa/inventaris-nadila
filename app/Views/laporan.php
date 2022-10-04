<?= $this->extend('templates/template') ?>

<?= $this->section('content') ?>

<div class="title">
    <h1>Manajemen Laporan Pembelian Barang</h1>
</div>

<div class="action">
    <div class="entries">
        <label for="entries">Show</label>

        <select name="entries" id="entries">
            <?php for ($i = 1; $i < 5; $i++) : ?>
                <option value="<?= $i ?>"><?= $i ?></option>
            <?php endfor ?>
        </select>

        <span>Entries</span>
    </div>

    <div class="print-button button">
        <a href=""><i class="fa-solid fa-print"></i>Print</a>
    </div>
</div>

<div class="table-barang">
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Beli</th>
                <th>Nama Barang</th>
                <th>Nama Supplier</th>
                <th>Jumlah</th>
                <th>Tgl Beli</th>
                <th>Harga</th>
                <th>Opsi</th>
            </tr>
        </thead>

        <tbody>
            <?php for ($i = 0; $i < 19; $i++) : ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td>010</td>
                    <td>Barang</td>
                    <td>Sup</td>
                    <td>Jml</td>
                    <td>09-09-2009</td>
                    <td>20000</td>
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
        <button type="button">Previous</button>
        <label>1</label>
        <button type="button">Next</button>
    </div>
</div>

<?= $this->endSection() ?>