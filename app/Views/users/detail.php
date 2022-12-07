<?= $this->extend('partials/main') ?>

<?= $this->section('content') ?>

<div class="col-lg-10 mx-auto">
    <div class="col-lg-2 mx-auto d-flex justify-content-center mb-5 rounded-circle overflow-hidden border border-5 border-info">
        <img class="w-100" src="/images/users/<?= $user->profile_picture ?>" alt="<?= $user->name ?>">
    </div>

    <div class="row mb-5">
        <div class="col-lg-6">
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Nama</span>
                <input disabled type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="<?= session('users')->name ?>">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Username</span>
                <input disabled type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="<?= $user->username ?>">
            </div>
        </div>
    </div>

    <div class="row justify-content-end">
        <a href="/user/<?= $user->id ?>/edit" class="btn btn-default w-fit">Edit Profile</a>
    </div>
</div>


<?= $this->endSection() ?>