<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> | INVENTARIS</title>

    <!-- // TODO: Resources -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <!-- // TODO: My Style -->
    <link rel="stylesheet" href="/css/template.css">
    <link rel="stylesheet" href="/css/templates/main.css">

    <?php if (isset($style)) : ?>
        <link rel="stylesheet" href="<?= '/css/pages/' . $style . '.css' ?>">
    <?php endif ?>

    <script src="https://kit.fontawesome.com/02db274a60.js" crossorigin="anonymous"></script>
</head>

<body>

    <body id="body-pd">
        <header class="header" id="header">
            <div class="header_toggle">
                <i class='bx bx-menu' id="header-toggle"></i>
            </div>
            <div class="header_img">
                <img src="https://i.imgur.com/hczKIze.jpg" alt="user">
            </div>
        </header>

        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div>
                    <a href="#" class="nav_logo">
                        <i class='bx bx-layer nav_logo-icon'></i>
                        <span class="nav_logo-name">INVENTARIS</span>
                    </a>

                    <div class="nav_list">
                        <a href="/dashboard" class="nav_link active">
                            <i class='bx bx-grid-alt nav_icon'></i>
                            <span class="nav_name">Dashboard</span>
                        </a>
                        <a href="/gedung" class="nav_link">
                            <i class='bx bx-building nav_icon'></i>
                            <span class="nav_name">Gedung</span>
                        </a>
                        <a href="/ruangan" class="nav_link">
                            <i class='bx bx-home-circle nav_icon'></i>
                            <span class="nav_name">Ruangan</span>
                        </a>
                        <a href="/barang" class="nav_link">
                            <i class='bx bx-unite nav_icon'></i>
                            <span class="nav_name">Barang</span>
                        </a>
                        <a href="/penyimpanan" class="nav_link">
                            <i class='bx bx-store nav_icon'></i>
                            <span class="nav_name">Penyimpanan</span>
                        </a>
                        <a href="/laporan" class="nav_link">
                            <i class='bx bxs-report'></i>
                            <span class="nav_name">Laporan</span>
                        </a>
                        <a href="/barcode" class="nav_link">
                            <i class='bx bx-qr-scan'></i>
                            <span class="nav_name">QR Code</span>
                        </a>
                    </div>
                </div>

                <a href="/logout" class="nav_link">
                    <i class='bx bx-log-out nav_icon'></i>
                    <span class="nav_name">SignOut</span>
                </a>
            </nav>
        </div>

        <div class="height-100 bg-light">
            <?= $this->renderSection('content') ?>
        </div>


        <!-- // TODO: Resources -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <script src="/js/template.js"></script>

        <!-- // TODO: My Script -->
        <?php if (isset($script)) : ?>
            <script src="<?= '/js/' . $script . '.js' ?>"></script>
        <?php endif ?>
    </body>

</html>