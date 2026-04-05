<?= $this->extend('layout/template_bfr_login'); ?>

<?= $this->section('content'); ?>

<style>
    .img-mockup {
        position: absolute;
        top: -285px;
        left: -192px;
        z-index: -100;
    }

    .logo-kemenag {
        width: 375px;
        height: auto;
    }

    .ma-5 {
        margin-top: 5rem !important;
    }

    .mk-5 {
        margin-left: 5.5rem;
    }

    @media only screen and (max-width: 1125px) {
        .img-mockup {
            left: -270px;
        }

        .logo-kemenag {
            width: 327px;
        }
    }

    @media only screen and (max-height: 657px) {
        .ma-5 {
            margin-top: 3rem !important;
        }

        .mk-5 {
            margin-left: 5rem;
        }

        .img-mockup {
            top: -303px;
        }
    }

    a.btn {
        border-radius: 50px;
        font-size: 16pt;
        box-shadow: 0px 7px 3px rgba(0, 0, 0, 0.25);
        padding-right: 6rem;
        padding-left: 6rem;
    }

    a:hover {
        cursor: pointer;
    }
</style>

<div class="img-mockup">
    <img src="/svg/Rectangle_miring.svg" alt="">
</div>

<div class="container ma-5">
    <div class="row">
        <div class="col mk-5">
            <img src="/img/logo-ikhlas-beramal-png.png" alt="logo-ikhlas-beramal" class="logo-kemenag">
        </div>
        <div class="col text-center mt-5">
            <h2 class="fw-bold">PEMILIHAN KETUA OSIS</h2><br>
            <h2 class="fw-bold">TAHUN AJARAN<br>2021/2022</h2><br>
            <h2 class="fw-bold">MTs Negeri 2 Ende</h2>
            <div class="row">
                <div class="col mt-5">
                    <a href="/" class="btn btn-success py-3 fw-bold">MULAI</a>
                </div>
            </div>
        </div>
    </div>
</div>




<?= $this->endSection(); ?>