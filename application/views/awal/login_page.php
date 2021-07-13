<link rel="stylesheet" href="<?= base_url(); ?>assets/css/login.css">

<style>
    input.username {
        background-image: url(<?= base_url('assets/icon/user-line.svg'); ?>);
        background-repeat: no-repeat;
        background-position: left center;
    }

    input.pass {
        background-image: url(<?= base_url('assets/icon/lock-line.svg'); ?>);
        background-repeat: no-repeat;
        background-position: left center;
    }
</style>

<?= $this->session->flashdata('style'); ?>
<?= $this->session->unset_userdata('style'); ?>



<div class="container mt-3 text-center">
    <div class="row">
        <div class="col text-center">
            <img src="<?= base_url(); ?>assets/img/logo-ikhlas-beramal-png.png" alt="logo-kementerian-agama" class="mb-3">
            <h1 class="text-white">Selamat Datang di<br>
                Aplikasi<br><br>Pemilihan Ketua OSIS <br>
                Tahun Ajaran<br>2021/2022<br><br>
                MTs Negeri 2 Ende
            </h1>
        </div>
        <div class="col text-center ma-3">
            <div class="login-field text-center pt-4">
                <div class="row">
                    <h2><u>Login</u></h2>
                    <p class="fs-5">
                        Masukkan Username<br>dan Password Kamu!
                    </p>
                </div>
                <div class="row mt-3 text-center justify-content-center mt-4">
                    <div class="col-sm-10 col-sm-offset-1">
                        <?= form_open('auth', ['method' => 'post', 'autocomplete' => 'off', 'id' => 'form']); ?>
                        <div class="mb-5">
                            <input class="field username" id="username" name="username" type="text" placeholder="Username" value="<?= set_value('username'); ?>">
                            <!-- <i class="fas fa-check"></i> -->
                            <?= form_error('username', '<small class="text-danger text-start"><i>', '</i></small>'); ?>
                        </div>
                        <div class="mb-3">
                            <input class="field pass" id="password" name="password" type="password" placeholder="Password"><br>
                            <?= form_error('password', '<small class="text-danger text-start"><i>', '</i></small>'); ?>
                        </div>
                        <input disabled="disabled" class="btn btn-success py-3 mb-5" type="submit" id="submit" value="SUBMIT">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    form.addEventListener('input', () => {
        if (username.value.length > 0 && password.value.length > 0) {
            submit.removeAttribute('disabled');
        } else {
            submit.setAttribute('disabled', 'disabled');
        }
    });
</script>