<link rel="stylesheet" href="<?= base_url('assets/css/'); ?>content.css">
<link rel="stylesheet" href="<?= base_url('assets/css/'); ?>kandidat.css">

<div class="isi">
    <div class="row">
        <div class="col-md text-center title">
            <span class="fs-1">Kandidat</span>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="contain scroll mt-5 px-4 pt-1">
                <div class="calon">
                    <div class="nama text-center">
                        <h5 class="text-white">Salim & Aiman</h5>
                    </div>
                    <div class="foto">
                        <img src="<?= base_url('assets/img/kandidat/default.png'); ?>" width="90%">
                    </div>
                    <div class="aksi text-center pt-1">
                        <a href="#" class="btn btn-primary d-block"><i class='bx bxs-info-circle'></i> Detail</a>
                        <a href="#" class="btn btn-danger d-block"><i class='bx bxs-x-circle'></i> Hapus</a>
                    </div>
                </div>
                <div class="calon">
                    <div class="nama text-center">
                        <h5 class="text-white">Salim & Aiman</h5>
                    </div>
                    <div class="foto">
                        <img src="<?= base_url('assets/img/kandidat/default.png'); ?>" width="90%">
                    </div>
                    <div class="aksi text-center pt-1">
                        <a href="#" class="btn btn-primary d-block"><i class='bx bxs-info-circle'></i> Detail</a>
                        <a href="#" class="btn btn-danger d-block"><i class='bx bxs-x-circle'></i> Hapus</a>
                    </div>
                </div>
                <div class="calon">
                    <div class="nama text-center">
                        <h5 class="text-white">Salim & Aiman</h5>
                    </div>
                    <div class="foto">
                        <img src="<?= base_url('assets/img/kandidat/default.png'); ?>" width="90%">
                    </div>
                    <div class="aksi text-center pt-1">
                        <a href="#" class="btn btn-primary d-block"><i class='bx bxs-info-circle'></i> Detail</a>
                        <a href="#" class="btn btn-danger d-block"><i class='bx bxs-x-circle'></i> Hapus</a>
                    </div>
                </div>
                <div class="calon">
                    <div class="nama text-center">
                        <h5 class="text-white">Salim & Aiman</h5>
                    </div>
                    <div class="foto">
                        <img src="<?= base_url('assets/img/kandidat/default.png'); ?>" width="90%">
                    </div>
                    <div class="aksi text-center pt-1">
                        <a href="#" class="btn btn-primary d-block"><i class='bx bxs-info-circle'></i> Detail</a>
                        <a href="#" class="btn btn-danger d-block"><i class='bx bxs-x-circle'></i> Hapus</a>
                    </div>
                </div>

                <!-- TAMBAH CALON -->
                <div class="calon" style="width: 125px;">
                    <div class="plus-calon">
                        <a href="">
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