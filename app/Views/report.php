<?= $this->extend('partials/main') ?>

<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center px-5">
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

    <a href="/report/print" target="_blank" type="button" class="btn btn-default d-flex gap-2 align-items-center">
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
            <?php foreach ($reports as $no => $report) : ?>
                <tr>
                    <th scope="row"><?= ++$no ?></th>
                    <td><?= $report->item_name ?></td>
                    <td><?= $report->item_total ?></td>
                    <td><?= $report->item_brand ?></td>
                    <td><?= $report->item_condition ?></td>
                    <td><?= $report->item_price ?></td>
                    <td><?= date('d-M-Y H:i:s', $report->record_date) ?></td>
                    <td><?= $report->item_category ?></td>
                    <td><?= $report->item_type ?></td>
                    <td><?= $report->room_name ?></td>
                    <td><?= $report->administrator ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>