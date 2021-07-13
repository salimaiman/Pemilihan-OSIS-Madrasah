<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<link rel="stylesheet" href="/css/login_style.css">

<div class="gambar">
    <img src="/img/logo-ikhlas-beramal-png.png" alt="logo-kementerian-agama" class="logo-kemenag">
</div>

<div class="text">
    <h1>Selamat Datang di<br>
        Aplikasi<br><br>Pemilihan Ketua OSIS <br>
        Tahun Ajaran<br>2020/2021<br><br>
        MTs Negeri 2 Ende
    </h1>
</div>

<!-- GARIS BORDER -->
<div class="garis-border border-kitas"></div>
<div class="garis-border border-hitam-katas1"></div>
<div class="garis-border border-hitam-katas2"></div>
<div class="garis-border border-hitam-kibaw"></div>
<div class="garis-border border-hitam-kabaw1"></div>
<div class="garis-border border-hitam-kabaw2"></div>


<!-- LOGIN -->
<div class="login-field">
    <h2><u>Login</u></h2>
    <h4>
        Masukkan Username<br>dan Password Kamu!
    </h4>

    <form action="/admin" method="post">
        <input id="user" type="text" placeholder="Username">
        <input id="pass" type="password" placeholder="Password"><br>
        <input type="submit" value="SUBMIT">
    </form>
</div>
<?= $this->endSection(); ?>