<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>

    <!-- // TODO: Resources -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <!-- // TODO: My Style -->
    <link rel="stylesheet" href="/css/template.css">

    <?php if ($style) : ?>
        <?php foreach ($style as $s) : ?>
            <!-- <link rel="stylesheet" href="<?= '/css/' . $s . '.css' ?>"> -->
        <?php endforeach ?>
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
                        <a href="#" class="nav_link active">
                            <i class='bx bx-grid-alt nav_icon'></i>
                            <span class="nav_name">Dashboard</span>
                        </a>
                        <a href="#" class="nav_link">
                            <i class='bx bx-user nav_icon'></i>
                            <span class="nav_name">Gedung</span>
                        </a>
                        <a href="#" class="nav_link">
                            <i class='bx bx-message-square-detail nav_icon'></i>
                            <span class="nav_name">Ruangan</span>
                        </a>
                        <a href="#" class="nav_link">
                            <i class='bx bx-bookmark nav_icon'></i>
                            <span class="nav_name">Barang</span>
                        </a>
                        <a href="#" class="nav_link">
                            <i class='bx bx-folder nav_icon'></i>
                            <span class="nav_name">Supplier</span>
                        </a>
                        <a href="#" class="nav_link">
                            <i class='bx bx-bar-chart-alt-2 nav_icon'></i>
                            <span class="nav_name">Penyimpanan</span>
                        </a>
                        <a href="#" class="nav_link">
                            <i class="bx bxl-bitcoin nav_icon"></i>
                            <span class="nav_name">Pembelian Barang</span>
                        </a>
                        <a href="#" class="nav_link">
                            <i class='bx bxs-report'></i>
                            <span class="nav_name">Laporan</span>
                        </a>
                        <a href="#" class="nav_link">
                            <i class='bx bx-qr-scan'></i>
                            <span class="nav_name">QR Code</span>
                        </a>
                    </div>
                </div>

                <a href="#" class="nav_link">
                    <i class='bx bx-log-out nav_icon'></i>
                    <span class="nav_name">SignOut</span>
                </a>
            </nav>
        </div>

        <div class="height-100 bg-light">
            <?= $this->renderSection('content') ?>
        </div>


        <!-- // TODO: Resources -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
        <script src="/js/template.js"></script>

        <!-- // TODO: My Script -->
        <?php if ($script) : ?>
            <?php foreach ($script as $sc) : ?>
                <!-- <script src="<?= '/js/' . $sc . '.js' ?>"></script> -->
            <?php endforeach ?>
        <?php endif ?>
    </body>

</html>