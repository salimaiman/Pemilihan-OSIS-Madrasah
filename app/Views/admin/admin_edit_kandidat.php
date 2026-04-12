<link rel="stylesheet" href="<?= base_url('assets/css/'); ?>content.css">
<link rel="stylesheet" href="<?= base_url('assets/css/'); ?>addkandidat.css">

<script src='<?= base_url('assets/js/'); ?>tinymce/tinymce.min.js'></script>
<script>
    tinymce.init({
        selector: 'textarea#visi',
        plugins: 'advlist lists',
        toolbar: 'undo redo | bold italic underline strikethrough | fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent | numlist',
    });
</script>

<script>
    tinymce.init({
        selector: 'textarea#misi',
        plugins: 'advlist lists',
        toolbar: 'undo redo | bold italic underline strikethrough | fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent | numlist',
    });
</script>

<div class="isi" style="overflow-y: auto; overflow-x: hidden">
    <div class="row">
        <div class="col-md-12 text-center title">
            <span class="fs-1">Edit Kandidat</span>
        </div>
    </div>
    <div class="mt-4">
        <form action="<?= base_url('admin/editkandidat/' . $kandidat['id']) ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <input type="hidden" name="foto_lama" value="<?= $kandidat['foto']; ?>">
        <div class="row mb-5">
            <div class="col">
                <div class="form form-ketua ">
                    <h3><b>Ketua</b></h3>
                    <div class="my-4">
                        <input class="field nm_ketua" id="nm_ketua" name="nm_ketua" type="text" placeholder="Nama Lengkap" value="<?= old('nm_ketua') ?? $kandidat['nm_ketua']; ?>">
                        <?= (isset($errors['nm_ketua'])) ? '<small class="text-danger text-start"><i>' . $errors['nm_ketua'] . '</i></small>' : ''; ?>
                    </div>
                    <div class="mb-2">
                        <input class="field pgl_ketua" id="pgl_ketua" name="pgl_ketua" type="text" placeholder="Nama Panggilan" value="<?= old('pgl_ketua') ?? $kandidat['pgl_ketua']; ?>">
                        <?= (isset($errors['pgl_ketua'])) ? '<small class="text-danger text-start"><i>' . $errors['pgl_ketua'] . '</i></small>' : ''; ?>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="form form-wakil ">
                    <h3><b>Wakil Ketua</b> <i style="color:#999">(Jika Ada)</i></h3>
                    <div class="my-4">
                        <input class="field nm_wakil" id="nm_wakil" name="nm_wakil" type="text" placeholder="Nama Lengkap" value="<?= old('nm_wakil') ?? $kandidat['nm_wakil']; ?>">
                        <?= (isset($errors['nm_wakil'])) ? '<small class="text-danger text-start"><i>' . $errors['nm_wakil'] . '</i></small>' : ''; ?>
                    </div>
                    <div class="mb-2">
                        <input class="field pgl_wakil" id="pgl_wakil" name="pgl_wakil" type="text" placeholder="Nama Panggilan" value="<?= old('pgl_wakil') ?? $kandidat['pgl_wakil']; ?>">
                        <?= (isset($errors['pgl_wakil'])) ? '<small class="text-danger text-start"><i>' . $errors['pgl_wakil'] . '</i></small>' : ''; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-8">
                <div class="form" style="width: 152%;">
                    <h3><b>Visi</b></h3>
                    <div class="mt-4">
                        <textarea name="visi" id="visi" cols="30" rows="10"><?= old('visi') ?? $kandidat['visi']; ?></textarea>
                        <?= (isset($errors['visi'])) ? '<small class="text-danger text-start"><i>' . $errors['visi'] . '</i></small>' : ''; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-8">
                <div class="form" style="width: 152%;">
                    <h3><b>Misi</b></h3>
                    <div class="mt-4">
                        <textarea name="misi" id="misi" cols="30" rows="10"><?= old('misi') ?? $kandidat['misi']; ?></textarea>
                        <?= (isset($errors['misi'])) ? '<small class="text-danger text-start"><i>' . $errors['misi'] . '</i></small>' : ''; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-8">
                <div class="form">
                    <h3><b>Upload Foto Baru (Opsional)</b></h3>
                    <div class="mt-4">
                        <p class="text-danger">
                            <i>*Biarkan kosong jika tidak ingin mengubah foto.</i><br>
                            <i>*Foto berukuran 4 x 6, tanpa background (.png), maksimal 3MB.</i>
                        </p>
                        <hr>
                        <input type="file" class="custom-file-input form-control" id="foto" name="foto">
                        <?= (isset($errors['foto'])) ? '<small class="text-danger text-start"><i>' . $errors['foto'] . '</i></small>' : ''; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-end">
            <div class="col-3">
                <a data-bs-toggle="modal" data-bs-target="#backModal" href="<?= base_url('admin/kandidat'); ?>" class="btn btn-batal">BATAL</a>
                <input type="submit" class="btn btn-warning text-white" value="UPDATE">
            </div>
        </div>
        </form>
    </div>
</div>
</div>
</div>
</div>
<div class="modal fade" id="backModal" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true" aria-labelledby="backModalLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="backModalLabel">Apakah anda yakin ingin kembali?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="fs-6">Pilih "<span class="text-danger">Ya</span>" untuk membatalkan perubahan,</p>
                <p class="fs-6">Pilih "<span class="text-secondary">Tidak</span>" untuk tetap di halaman ini</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Tidak</button>
                <a class="btn btn-danger px-4" href="<?= base_url('admin/kandidat'); ?>">Ya</a>
            </div>
        </div>
    </div>
</div>
