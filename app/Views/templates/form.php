<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>

    <!-- <link rel="icon" href=""> -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">

    <?php foreach ($style as $style) : ?>
        <link rel="stylesheet" href="<?= '/css/' . $style . '.css' ?>">
    <?php endforeach ?>

    <script src="/js/sweetalert2.all.min.js"></script>
</head>

<body>
    <?= $this->renderSection('content') ?>

    <?php if ($script) : ?>
        <?php foreach ($script as $script) : ?>
            <script src="<?= '/js/' . $script . '.js' ?>"></script>
        <?php endforeach ?>
    <?php endif ?>
</body>

</html>