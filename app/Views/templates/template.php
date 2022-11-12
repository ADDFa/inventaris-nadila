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
    <div id="body-pd">
        <?= $this->include('components/sidebar') ?>
    </div>

    <div class="bg-light py-5">
        <?= $this->renderSection('content') ?>
    </div>

    <!-- // TODO: Resources -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="/js/index.js" type="module"></script>

    <!-- // TODO: My Script -->
    <?php if (isset($script)) : ?>
        <script src="<?= '/js/pages/' . $script . '.js' ?>" type="module"></script>
    <?php endif ?>
</body>

</html>