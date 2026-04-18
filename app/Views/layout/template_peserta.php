<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <!-- Google Fonts: Quicksand -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/assets/css/landing.css">

    <title><?= esc($judul); ?></title>
</head>

<body>
    
    <!-- Navbar (Optional, can be customized or removed based on design) -->
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent absolute-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="/assets/img/logo-ikhlas-beramal-png.png" alt="Logo Kemenag" width="40" height="40" class="me-2 d-inline-block align-text-top">
                <span class="fw-bold" style="font-size: 14px; line-height: 1.2;">MTs NEGERI 2<br>ENDE</span>
            </a>
            <div class="ms-auto d-flex align-items-center">
                <span class="me-3 fw-bold">Hai, <?= esc($pemilih['nm_lengkap'] ?? $pemilih['username']); ?></span>
                <a href="/auth/logout" class="btn btn-outline-danger btn-sm rounded-pill px-3">Logout</a>
            </div>
        </div>
    </nav>

    <?= $this->renderSection('content'); ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>

</html>
