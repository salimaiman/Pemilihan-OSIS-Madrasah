<link rel="stylesheet" href="<?= base_url('assets/css/'); ?>content.css">

<div class="isi">
    <div class="row">
        <div class="col-md-12 text-center title">
            <span class="fs-1">Data Pemilih</span>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="bg-white">
                <table class="table mt-5 <?= ($pemilih) ? 'table-hover' : ''; ?> text-center">
                    <thead style="color: #fff; background-color: var(--hijau);">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Password</th>
                            <th scope="col">Nama Lengkap</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($pemilih) : ?>
                            <?php foreach ($pemilih as $p) : ?>
                                <tr>
                                    <th><?= $p['username']; ?></th>
                                    <td><?= $p['password']; ?></td>
                                    <td><?= $p['nm_lengkap']; ?></td>
                                    <td><?= $p['kelas']; ?></td>
                                    <td><?= $p['gender']; ?></td>
                                    <td><?= ($p['status'] == '1') ? '<span class="badge bg-primary">Sudah Memilih</span>' : '<span class="badge bg-danger">Belum Memilih</span>'; ?></td>
                                    <td>
                                        <a href="" class="btn btn-danger">Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="7" class="text-center">
                                    <p class="fs-6 mb-4 mt-3">Tidak ada data.</p>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#importModal" class="btn btn-success mb-4" style="border-radius: 12px;padding: 0.5rem 1rem;">
                                        <i class='bx bxs-file-import'></i> Import Data
                                    </a>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>

<style>
    .btn-download {
        color: #333;
        transition: color 0.2s ease-in-out;
    }

    .btn-download:hover {
        color: #1dcca9;
    }

    .btn {
        border-radius: 20px;
        padding: 0.5rem 1rem;
    }
</style>

<div class="modal fade" id="importModal" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true" aria-labelledby="importModalLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="importModalLabel">Import Data Pemilih</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-between mb-4 mt-2">
                    <div class="col-5">
                        <p class="fs-6">Download Format File</p>
                    </div>
                    <div class="col-2">
                        <a href="<?= base_url('admin/download'); ?>"><i class='bx bx-download fs-5 btn-download'></i></a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        <p class="fw-bolder fs-5">Upload File</p>
                        <?php echo form_open_multipart('admin/import_excel'); ?>
                        <input type="file" id="filePemilih" name="filePemilih" accept=".xls, .xlsx">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batal</button>
                <input type="submit" class="btn btn-success px-4" value="Upload">
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>