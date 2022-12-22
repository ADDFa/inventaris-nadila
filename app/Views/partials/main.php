<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> | INVENTARIS</title>

    <link rel="stylesheet" href="/css/index.css">
</head>

<body>
    <span class="notif" data-status="<?= session('status') ?>" data-message="<?= session('message') ?>"></span>

    <div id="body-pd">
        <?= $this->include('partials/sidebar') ?>
    </div>

    <div class="py-5 col-lg-11 mx-auto">
        <span class="notif" data-status="<?= session('status') ?>" data-message="<?= session('message') ?>"></span>

        <div class="title">
            <h1 class="text-center fw-bold"><?= $title ?></h1>
        </div>

        <?= $this->renderSection('content') ?>
    </div>

    <script src="/js/index.js"></script>
</body>

</html>