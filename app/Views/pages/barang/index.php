<?= $this->extend('templates/template') ?>

<?= $this->section('content') ?>

<?= $this->include('components/topAndAction') ?>

<?php if ($x = session()->getFlashdata('crud') ?? false) : ?>
    <div class="alert alert-<?= $x['status'] ?> alert-dismissible fade show w-100 my-3" role="alert">
        <?= $x['message'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif ?>

<div class="table-barang col-lg-11 mx-auto row my-5">
    <table class="table">
        <thead>
            <tr class="text-center">
                <th scope="col">No</th>
                <th scope="col">Id_Barang</th>
                <th scope="col">Nama Barang</th>
                <th scope="col" class="col-lg-2">Foto</th>
                <th scope="col">Kategori</th>
                <th scope="col">Merk </th>
                <th scope="col">Jenis Barang</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Tanggal Pencatatan</th>
                <th scope="col" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php foreach ($barang as $barang) : ?>
                <tr class="text-center align-middle">
                    <th scope="row"><?= $startNumber++ ?></th>
                    <td>Qr_Code 1</td>
                    <td><?= $barang->nama_barang ?></td>
                    <td class="col-lg-2">
                        <img class="w-100 p-1 border border-secondary rounded-3" src="<?= '/images/barang/' . $barang->gambar_barang ?>" alt="<?= $barang->gambar_barang ?>">
                    </td>
                    <td><?= $barang->kategori_barang ?></td>
                    <td><?= $barang->merk_barang ?></td>
                    <td><?= $barang->jenis_barang ?></td>
                    <td><?= $barang->jumlah_barang ?></td>
                    <td>
                        <?= $barang->tgl_pencatatan . '-' . $barang->bulan_pencatatan . '-' . $barang->tahun_pencatatan ?>
                    </td>
                    <td class="col-lg-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <a href=""><button class="btn btn-warning"><i class="fa-solid fa-eye"></i></button></a>

                            <a href="/barang/ubah/<?= $barang->id_barang ?>">
                                <button class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></button>
                            </a>

                            <form action="/barang/delete" method="POST">
                                <input type="hidden" name="id" value="<?= $barang->id_barang ?>">

                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus">
                                    <i class="fa-solid fa-trash"></i>
                                </button>

                                <div class="modal fade" id="hapus" tabindex="-1" aria-labelledby="label" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="label">Yakin ingin menghapus?</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button class="btn btn-primary">Ya hapus!</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?= $this->include('components/bottomAndAction') ?>

<?= $this->endSection() ?>