<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/template.css">

    <?php if ($style) : ?>
        <?php foreach ($style as $s) : ?>
            <link rel="stylesheet" href="<?= '/css/' . $s . '.css' ?>">
        <?php endforeach ?>
    <?php endif ?>

    <script src="https://kit.fontawesome.com/02db274a60.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav>
        <ul>
            <li>
                <a href="/dashboard">
                    <i class="fa-solid fa-house-chimney-window"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li>
                <a href="/gedung">
                    <i class="fa-solid fa-landmark"></i>
                    <span>Gedung</span>
                </a>
            </li>

            <li>
                <a href="/ruangan">
                    <i class="fa-solid fa-door-open"></i>
                    <span>Ruangan</span>
                </a>
            </li>

            <li>
                <a href="/barang">
                    <i class="fa-solid fa-boxes-stacked"></i>
                    <span>Barang</span>
                </a>
            </li>

            <li>
                <a href="/supplier">
                    <i class="fa-solid fa-people-carry-box"></i>
                    <span>Supplier</span>
                </a>
            </li>
            <li>
                <a href="/penyimpanan">
                    <i class="fa-solid fa-database"></i>
                    <span>Penyimpanan</span>
                </a>
            </li>
            <li>
                <a href="/pembelian">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span>Pembelian Barang</span>
                </a>
            </li>
            <li>
                <a href="/laporan">
                    <i class="fa-solid fa-file-lines"></i>
                    <span>Laporan</span>
                </a>
            </li>
            <li>
                <a href="/barcode">
                    <i class="fa-solid fa-qrcode"></i>
                    <span>QR Code</span>
                </a>
            </li>
        </ul>
    </nav>

    <div class="content">
        <header>
            <form action="">
                <input type="text">
            </form>

            <div class="user">
                <i class="fa-solid fa-user"></i>
                <span class="username"><?= session('username') ?></span>

                <a href="/logout" class="logout">
                    <i class="fa-solid fa-right-from-bracket"></i>
                </a>
            </div>
        </header>

        <?= $this->renderSection('content') ?>
    </div>

    <script src="/js/template.js"></script>

    <?php if ($script) : ?>
        <?php foreach ($script as $sc) : ?>
            <script src="<?= '/js/' . $sc . '.js' ?>"></script>
        <?php endforeach ?>
    <?php endif ?>
</body>

</html>