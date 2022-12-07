<?= $this->extend('partials/main') ?>

<?= $this->section('content') ?>

<div class="col-lg-8 mx-auto">
    <form method="POST" action="/user">
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" name="name" class="form-control <?= $validation->hasError('name') ? 'is-invalid' : '' ?>" id="name" aria-describedby="nameHelp" value="<?= old('name') ?>">
            <div id="nameHelp" class="form-text">Panjang Maksimal 40 Karakter</div>
            <span class="invalid-feedback" id="record_dateFeedback"><?= $validation->getError('name') ?></span>
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" class="form-control <?= $validation->hasError('username') ? 'is-invalid' : '' ?>" id="username" aria-describedby="usernameHelp" value="<?= old('username') ?>">
            <div id="usernameHelp" class="form-text">Panjang Maksimal 40 Karakter</div>
            <span class="invalid-feedback" id="record_dateFeedback"><?= $validation->getError('username') ?></span>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control <?= $validation->hasError('password') ? 'is-invalid' : '' ?>" id="password" minlength="8" maxlength="40" aria-describedby="passwordHelp" value="<?= old('password') ?>">
            <div id="passwordHelp" class="form-text">Panjang Minimal 8 Karakter dan Maksimal 40 Karakter</div>
            <span class="invalid-feedback" id="record_dateFeedback"><?= $validation->getError('password') ?></span>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<?= $this->endSection() ?>