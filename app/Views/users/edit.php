<?= $this->extend('partials/main') ?>

<?= $this->section('content') ?>

<div class="col-lg-8 mx-auto">
    <form method="POST" action="/user/<?= $user->id ?>" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PUT">

        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" name="name" class="form-control <?= $validation->hasError('name') ? 'is-invalid' : '' ?>" id="name" aria-describedby="nameHelp" value="<?= old('name') ?? $user->name ?>">
            <div id="nameHelp" class="form-text">Panjang Maksimal 40 Karakter</div>
            <span class="invalid-feedback" id="record_dateFeedback"><?= $validation->getError('name') ?></span>
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" class="form-control <?= $validation->hasError('username') ? 'is-invalid' : '' ?>" id="username" aria-describedby="usernameHelp" value="<?= old('username') ?? $user->username ?>">
            <div id="usernameHelp" class="form-text">Panjang Maksimal 40 Karakter</div>
            <span class="invalid-feedback" id="record_dateFeedback"><?= $validation->getError('username') ?></span>
        </div>
        <div class="mb-3">
            <label for="old-password" class="form-label">Password Lama</label>
            <input type="password" name="oldPassword" class="form-control <?= $validation->hasError('oldPassword') ? 'is-invalid' : '' ?>" id="old-password" value="<?= old('oldPassword') ?>">
            <span class="invalid-feedback" id="record_dateFeedback"><?= $validation->getError('oldPassword') ?></span>
        </div>
        <div class="mb-3">
            <label for="new-password" class="form-label">Password Baru</label>
            <input type="password" name="password" class="form-control <?= $validation->hasError('password') ? 'is-invalid' : '' ?>" id="new-password" minlength="8" maxlength="40" aria-describedby="passwordHelp" value="<?= old('password') ?>">
            <div id="passwordHelp" class="form-text">Panjang Minimal 8 Karakter dan Maksimal 40 Karakter</div>
            <span class="invalid-feedback" id="record_dateFeedback"><?= $validation->getError('password') ?></span>
        </div>
        <div class="mb-3">
            <label for="profile-picture" class="form-label">Foto Profile</label>
            <input type="file" name="profilePicture" class="form-control <?= $validation->hasError('image') ? 'is-invalid' : '' ?>" id="profile-picture">
            <span class="invalid-feedback" id="record_dateFeedback"><?= $validation->getError('image') ?></span>
        </div>

        <div class="mb-3 d-flex justify-content-end gap-3 mx-auto">
            <a href="/user/<?= $user->id ?>" class="btn btn-warning">Kembali</a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>