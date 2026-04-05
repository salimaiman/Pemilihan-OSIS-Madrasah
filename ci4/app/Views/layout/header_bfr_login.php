<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <!-- Font Quicksand -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">

    <!-- Tab Icon -->
    <link rel="icon" href="<?= base_url(); ?>assets/img/logo-ikhlas-beramal-png.png">

    <!-- BOXICONS CDN -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <!-- My Style -->
    <!-- <link rel="stylesheet" href="/css/"> -->

    <style>
        html {
            --hijau: #009b4c;
            --kuning: #fff500;
            height: 100%;
        }

        body {
            font-family: 'Quicksand', sans-serif;
            position: relative;
            top: 0;
            bottom: 0;
            right: 0;
            left: 0;
            overflow: hidden;
            height: 100%;
        }

        .garis {
            position: relative;
            width: 65px;
            height: 3px;
            margin: .5rem;

            border: 3px solid transparent;
            border-radius: 20px;
        }

        .border-kitas {
            background-color: var(--kuning);
        }

        .border-katas,
        .border-kibaw,
        .border-kabaw {
            background-color: #000;
        }

        .bawah {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            margin: auto;
            z-index: -10;
        }
    </style>

    <title><?= $judul; ?></title>
</head>
<!-- GARIS BORDER -->
<div class="d-flex">
    <div class="garis border-kitas me-auto"></div>
    <div class="garis border-katas" style="margin-right: 1px"></div>
    <div class="garis border-katas"></div>
</div>
<div class="d-flex bawah align-items-end">
    <div class="garis border-kibaw"></div>
    <div class="ms-auto d-flex">
        <div class="garis border-kabaw" style="margin-right: 1px"></div>
        <div class="garis border-kabaw"></div>
    </div>
</div>
<!-- END GARIS BORDER -->

<body>
    <div class="container-fluid">