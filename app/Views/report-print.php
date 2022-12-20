<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>

    <style>
        h1 {
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
            margin: 3rem auto;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        table,
        th,
        td {
            border: 1px solid;
            border-collapse: collapse;
        }

        table {
            width: 80vw;
            margin: 0 auto;
        }

        th,
        td {
            padding: .4rem .8rem;
        }

        @media print {
            @page {
                size: landscape;
            }

            body {
                width: 34cm;
            }

            table {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <h1><?= $title ?></h1>

    <div>
        <table>
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

    <script>
        window.addEventListener('load', print())
    </script>
</body>

</html>