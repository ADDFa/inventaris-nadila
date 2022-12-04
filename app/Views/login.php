<?= $this->extend('partials/form') ?>

<?= $this->section('content') ?>

<div class="row form">
    <div class="col-md-3 mx-auto">
        <h1 class="text-center pb-4 fs-2 fw-bold text-light">LOGIN</h1>

        <form action="" method="post">
            <div class="mb-3 form-floating">
                <input type="text" class="form-control <?= session('fail-u') ? 'is-invalid' : '' ?>" id="username" placeholder="Masukkan Username Anda" name="username" autocomplete="off" value="<?= old('username') ?>">
                <label for="username">Username</label>
                <div id="username" class="invalid-feedback"><?= session('fail-u') ?></div>
            </div>

            <div class="mb-3 form-floating">
                <input type="password" class="form-control text-light <?= session('fail-p') ? 'is-invalid' : '' ?>" placeholder="Masukkan Password" id="password" name="password">
                <label for="password">Password</label>
                <div id="password" class="invalid-feedback"><?= session('fail-p') ?></div>
            </div>

            <div class="mb-3 d-flex mt-5">
                <button type="submit" class="btn btn-login w-100">Login</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>