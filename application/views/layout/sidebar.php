<link rel="stylesheet" href="<?= base_url('assets/css/'); ?>sidebar.css">

<div class="wrapper mt-3">
    <div class="content d-inline">
        <!-- sidebar -->
        <div class="sidebar">
            <div class="menu">MENU</div>
            <hr>
            <ul class="nav-list">
                <li>
                    <div class="link <?= ($menu == 'dashboard') ? 'active' : ''; ?>">
                        <a href="<?= base_url('admin'); ?>">
                            <i class='bx bxs-dashboard'></i>
                            <span class="link-name">Dashboard</span>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="link <?= ($menu == 'kandidat') ? 'active' : ''; ?>">
                        <a href="<?= base_url('admin/kandidat'); ?>">
                            <i class='bx bxs-user-circle'></i>
                            <span class="link-name">Kandidat</span>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="link <?= ($menu == 'pemilih') ? 'active' : ''; ?>">
                        <a href="<?= base_url('admin/datapemilih'); ?>">
                            <i class='bx bxs-user-pin'></i>
                            <span class="link-name">Data Pemilih</span>
                        </a>
                    </div>
                </li>
                <hr>
                <li>
                    <div class="link <?= ($menu == 'laporan') ? 'active' : ''; ?>">
                        <a href="<?= base_url('admin/laporan'); ?>">
                            <i class='bx bxs-report'></i>
                            <span class="link-name">Laporan</span>
                        </a>
                    </div>
                </li>
            </ul>
            <div class="logout-content">
                <div class="logout-detail">
                    <a href="<?= base_url('auth/logout'); ?>">
                        <i class='bx bx-log-out'></i>
                        <span>Logout</span>
                    </a>
                </div>
            </div>
        </div>