<?= $this->extend('templates/template') ?>

<?= $this->section('content') ?>

<?= $this->include('components/topAndAction') ?>

<div class="table-barang col-md-11 mx-auto row my-5">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Id_Barang</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Foto</th>
                <th scope="col">Kategori</th>
                <th scope="col">Merk </th>
                <th scope="col">Jenis Barang</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Tanggal Pencatatan</th>
                <th scope="col" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php foreach ($barang as $no => $barang) : ?>
                <tr>
                    <th scope="row"><?= $no ?></th>
                    <td>Qr_Code <?= $no + 1 ?></td>
                    <td><?= $barang->nama_barang ?></td>
                    <td>
                        <img src="<?= '/images/barang/' . $barang->gambar_barang ?>" alt="<?= $barang->nama_barang ?>">
                    </td>
                    <td><?= $barang->kategori_barang ?></td>
                    <td><?= $barang->merk_barang ?></td>
                    <td><?= $barang->jenis_barang ?></td>
                    <td><?= $barang->jumlah_barang ?></td>
                    <td>
                        <?= $barang->tgl_pencatatan . '-' . $barang->bulan_pencatatan . '-' . $barang->tahun_pencatatan ?>
                    </td>
                    <td class="d-flex justify-content-between align-items-center">
                        <a href=""><button class="btn btn-warning"><i class="fa-solid fa-eye"></i></button></a>

                        <a href=""><button class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></button></a>

                        <form action="">
                            <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?= $this->include('components/bottomAndAction') ?>

<?= $this->endSection() ?>