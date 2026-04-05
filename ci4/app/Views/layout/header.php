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

    <!-- TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <!-- My Style -->
    <!-- <link rel="stylesheet" href="/css/"> -->

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        html {
            --hijau: #009b4c;
            --hijau-md: #01BE5E;
            --kuning: #fff500;
            height: 100%;
            width: 100%;
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
            width: 100%;
        }

        .container-fluid {
            height: 100%;
        }
    </style>

    <title><?= $judul; ?></title>
</head>

<body>
    <div class="container-fluid">