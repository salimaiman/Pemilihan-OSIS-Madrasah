<link rel="stylesheet" href="<?= base_url('assets/css/navbar.css') ?>">

<nav class="navbar navbar-expand-lg navbar-light bg-success">
    <div class="container">
        <span class="navbar-mts mb-0 h1" href="#" style="color: var(--kuning); font-size: 1.4rem">E-Pilketos</span>
        <span class="text-white mt-1">Admin</span>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <div class="navbar-nav mx-auto mb-2 mb-lg-0">
                <img src="<?= base_url(); ?>assets/img/logo-ikhlas-beramal-png.png" alt="" class="mx-auto d-block" width="40px" height="40px">
            </div>
            <span class="navbar-text text-white">
                <?= $user['nm_lengkap']; ?>
            </span>
            <img src="<?= base_url('assets/img/' . $admin['picture']); ?>" alt="foto-admin" width="30px" class="rounded-circle mx-3">

        </div>
    </div>
</nav>