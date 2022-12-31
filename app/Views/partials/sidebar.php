<header class="header" id="header">
    <div class="header_toggle">
        <i class='bx bx-menu' id="header-toggle"></i>
    </div>
    <div class="header_img">
        <img src="/images/users/<?= session('users')->profile_picture ?>" alt="user" aria-controls="user-action" data-bs-toggle="collapse" data-bs-target="#user-action">
    </div>

    <div class="collapse" id="user-action">
        <ul class="d-flex flex-column align-items-center gap-4" style="list-style: none;">
            <li>
                <a href="/user/<?= session('users')->id ?>">Profile</a>
            </li>
            <li>
                <a href="/logout">SignOut</a>
            </li>
        </ul>
    </div>
</header>

<div class="l-navbar" id="nav-bar">
    <nav class="nav">
        <div>
            <a href="#" class="nav_logo">
                <i class='bx bx-layer nav_logo-icon'></i>
                <span class="nav_logo-name">INVENTARIS</span>
            </a>

            <div class="nav_list">
                <a href="/dashboard" class="nav_link active">
                    <i class='bx bx-grid-alt nav_icon'></i>
                    <span class="nav_name">Dashboard</span>
                </a>
                <a href="/building" class="nav_link">
                    <i class='bx bx-building nav_icon'></i>
                    <span class="nav_name">Gedung</span>
                </a>
                <a href="/room" class="nav_link">
                    <i class='bx bx-home-circle nav_icon'></i>
                    <span class="nav_name">Ruangan</span>
                </a>
                <a href="/item" class="nav_link">
                    <i class='bx bx-unite nav_icon'></i>
                    <span class="nav_name">Barang</span>
                </a>
                <a href="/storage" class="nav_link">
                    <i class='bx bxl-dropbox'></i>
                    <span class="nav_name">Penyimpanan</span>
                </a>
                <?php if (session('users')->role === 'admin') : ?>
                    <a href="/user" class="nav_link">
                        <i class='bx bxs-user-detail'></i>
                        <span class="nav_name">Kelola Petugas</span>
                    </a>
                <?php endif ?>
                <a href="/report" class="nav_link">
                    <i class='bx bxs-report'></i>
                    <span class="nav_name">Laporan</span>
                </a>
            </div>
        </div>

        <a href="/logout" class="nav_link">
            <i class='bx bx-log-out nav_icon'></i>
            <span class="nav_name">SignOut</span>
        </a>
    </nav>
</div>