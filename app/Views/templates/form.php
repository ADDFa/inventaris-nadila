<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>

    <!-- ----------------------- //TODO: Bootstrap ----------------------- -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!-- ----------------------- //TODO: My Style ----------------------- -->
    <?php foreach ($style as $style) : ?>
        <link rel="stylesheet" href="<?= '/css/pages/' . $style . '.css' ?>">
    <?php endforeach ?>

    <script src="/js/sweetalert2.all.min.js"></script>
</head>

<body>
    <?= $this->renderSection('content') ?>

    <!-- ----------------------- //TODO: Bootstrap ----------------------- -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <!-- ----------------------- //TODO: My Script ----------------------- -->
    <?php if ($script) : ?>
        <?php foreach ($script as $script) : ?>
            <script src="<?= '/js/' . $script . '.js' ?>"></script>
        <?php endforeach ?>
    <?php endif ?>
</body>

</html>