<?= $this->extend('templates/form') ?>

<?= $this->section('content') ?>

<?php if (session('pesan')) : ?>
    <span data-pesan="<?= session('pesan')[0] . ',' . session('pesan')[1] ?>"></span>
<?php endif ?>

<div class="row form">
    <div class="col-md-3 mx-auto">
        <h1 class="text-center pb-4 fs-2 fw-bold text-light">LOGIN</h1>

        <form action="/login" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control text-light <?= session('wrongUsername') ? 'is-invalid' : '' ?>" id="username" name="username" value="<?= old('username') ?>">
                <div id="username" class="invalid-feedback"><?= session('wrongUsername') ?></div>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control text-light <?= session('wrongPassword') ? 'is-invalid' : '' ?>" id="password" name="password">
                <div id="password" class="invalid-feedback"><?= session('wrongPassword') ?></div>
            </div>

            <div class="mb-3 d-flex mt-5">
                <button type="submit" class="btn btn-login w-100">Login</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>