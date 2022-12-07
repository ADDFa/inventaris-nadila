<?= $this->extend('partials/main') ?>

<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center px-5">
    <a href="/laporan/print" type="button" class="btn btn-default d-flex gap-2 align-items-center">
        <i class='bx bx-printer w-100 h-100'></i>
        Print
    </a>
</div>

<div class="table-penyimpanan col-md-11 mx-auto row my-5">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Jumlah Barang</th>
                <th scope="col">Merk Barang</th>
                <th scope="col">Kondisi Barang</th>
                <th scope="col">Harga Barang</th>
                <th scope="col">Tanggal Pencatatan</th>
                <th scope="col">Kategori Barang</th>
                <th scope="col">Jenis Barang</th>
                <th scope="col">Nama Ruangan</th>
                <th scope="col">Dikelola Oleh</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php foreach ($items as $no => $item) : ?>
                <tr>
                    <th scope="row"><?= ++$no ?></th>
                    <td><?= $item->item_name ?></td>
                    <td><?= $item->item_total ?></td>
                    <td><?= $item->item_brand ?></td>
                    <td><?= $item->item_condition ?></td>
                    <td><?= $item->item_price ?></td>
                    <td><?= date('d-M-Y H:i:s', $item->record_date) ?></td>
                    <td><?= $item->category_name ?></td>
                    <td><?= $item->type_name ?></td>
                    <td><?= $item->room_name ?></td>
                    <td><?= $item->name ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>