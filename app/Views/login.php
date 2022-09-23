<?= $this->extend('templates/form') ?>

<?= $this->section('content') ?>

<?php if (session('pesan')) : ?>
    <span data-pesan="<?= session('pesan')[0] . ',' . session('pesan')[1] ?>"></span>
<?php endif ?>

<div class="row form">
    <div class="col-md-3 mx-auto">
        <h1>LOGIN</h1>
        <form action="/login" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Username</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="username">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            </div>

            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</div>

<?= $this->endSection() ?>