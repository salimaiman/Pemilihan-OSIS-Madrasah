<link rel="stylesheet" href="<?= base_url('assets/css/'); ?>content.css">
<link rel="stylesheet" href="<?= base_url('assets/css/'); ?>kandidat.css">

<style>
    .btn {
        border-radius: 20px;
        padding: 0.5rem 1rem;
    }
</style>

<div class="isi">
    <div class="row">
        <div class="col-md text-center title">
            <span class="fs-1">Kandidat</span>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="contain scroll mt-5 px-4 pt-1 <?= (!$kandidat) ? 'd-flex' : ''; ?>">
                <?php if ($kandidat) : ?>
                    <?php foreach ($kandidat as $k) : ?>
                        <div class="calon">
                            <div class="nama text-center">
                                <h5 class="text-white"><?= (!$k['nm_wakil']) ? $k['nm_ketua'] : $k['pgl_ketua'] . ' & ' . $k['pgl_wakil']; ?></h5>
                            </div>
                            <div class="foto">
                                <img src="<?= base_url('assets/img/kandidat/' . $k['foto']); ?>" width="90%">
                            </div>
                            <div class="aksi text-center pt-1">
                                <a href="#" class="btn btn-primary d-block"><i class='bx bxs-info-circle'></i> Detail</a>
                                <a href="<?= base_url('admin/hapuskandidat/' . $k['id']); ?>" class="btn btn-danger d-block" data-bs-toggle="modal" data-bs-target="#deleteModal" data-bs-whatever="<?= $k['pgl_ketua'] ?><?= ($k['pgl_wakil'] != '') ? ' & ' . $k['pgl_wakil'] : ''; ?>" data-bs-id="<?= $k['id'] ?>"><i class='bx bxs-x-circle'></i> Hapus</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

                <!-- TAMBAH CALON -->
                <div class="calon" style="width: 125px;">
                    <div class="plus-calon">
                        <a href="<?= base_url('admin/tambahkandidat'); ?>" role="button">
                            <div class="tbl-plus">
                                <svg xmlns="http://www.w3.org/2000/svg" width="96" height="96" viewBox="0 0 24 24" style="fill:rgba(255, 255, 255, 1);transform:;-ms-filter:;">
                                    <path d="M19 11L13 11 13 5 11 5 11 11 5 11 5 13 11 13 11 19 13 19 13 13 19 13z"></path>
                                </svg>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>

<!-- MODAL HAPUS KANDIDAT -->
<div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true" aria-labelledby="deleteModalLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Apakah anda yakin ingin menghapus kandidat?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="fs-6">Pilih "<span class="text-danger">Ya</span>" untuk melanjutkan,</p>
                <p class="fs-6">Pilih "<span class="text-secondary">Tidak</span>" untuk membatalkan aksi ini</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Tidak</button>
                <a class="btn btn-danger px-4" id="btn-hapus" href="<?= base_url('admin/kandidat'); ?>">Ya</a>
            </div>
        </div>
    </div>
</div>

<script>
    const slider = document.querySelector('.contain');
    let isDown = false;
    let startX;
    let scrollLeft;

    slider.addEventListener('mousedown', (e) => {
        isDown = true;
        slider.classList.add('active');
        startX = e.pageX - slider.offsetLeft;
        scrollLeft = slider.scrollLeft;
    });
    slider.addEventListener('mouseleave', () => {
        isDown = false;
        slider.classList.remove('active');
    });
    slider.addEventListener('mouseup', () => {
        isDown = false;
        slider.classList.remove('active');
    });
    slider.addEventListener('mousemove', (e) => {
        if (!isDown) return;
        e.preventDefault();
        const x = e.pageX - slider.offsetLeft;
        const walk = (x - startX) * 3; //scroll-fast
        slider.scrollLeft = scrollLeft - walk;
        console.log(walk);
    });
</script>

<!-- script Modal Content -->
<script>
    var deleteModal = document.getElementById('deleteModal')
    var buttonHapus = document.querySelector('#btn-hapus')

    deleteModal.addEventListener('show.bs.modal', function(event) {
        // Button that triggered the modal
        var button = event.relatedTarget
        // Extract info from data-bs-* attributes
        var kandidat = button.getAttribute('data-bs-whatever')
        var id = button.getAttribute('data-bs-id')
        // If necessary, you could initiate an AJAX request here
        // and then do the updating in a callback.
        //
        // Update the modal's content.
        var modalTitle = deleteModal.querySelector('.modal-title')
        var modalBodyInput = deleteModal.querySelector('.modal-body input')

        modalTitle.textContent = 'Apakah anda yakin ingin menghapus ' + kandidat
        buttonHapus.setAttribute("href", "hapuskandidat/" + id)
    })
</script>