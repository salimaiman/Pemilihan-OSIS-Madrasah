<?= $this->extend('layout/template_peserta') ?>

<?= $this->section('content') ?>

<!-- SECTION 1: HERO -->
<section id="hero" class="hero-section">
    <div class="bg-curve-pattern"></div>
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            
            <div class="col-md-6 hero-content position-relative z-index-2">
                <h2 class="welcome-text text-success fw-bold mb-1">Selamat Datang,</h2>
                <h1 class="student-name fw-bold mb-4 display-5"><?= esc($pemilih['nm_lengkap'] ?? $pemilih['username']); ?></h1>
                
                <h3 class="school-name fw-bold mb-3">MADRASAH TSANAWIYAH NEGERI 2<br>ENDE</h3>
                
                <p class="description-text text-muted mb-4 lead">
                    Mari kita sukseskan pemilihan Ketua OSIS untuk masa bakti ini. 
                    Gunakan hak pilih Anda dengan bijak dan pilih kandidat terbaik 
                    yang dapat memajukan sekolah kita tercinta.
                </p>
                
                <a href="#kandidat" class="btn btn-success btn-lg px-5 rounded-pill shadow-sm cta-button fw-bold">Pilih Sekarang</a>
            </div>

            <div class="col-md-6 hero-illustration text-center position-relative">
                <div class="illustration-container position-relative">
                    <!-- Awan dekoratif -->
                    <img src="/assets/design/assets/Vector 7.svg" alt="Cloud" class="position-absolute cloud-left">
                    <img src="/assets/design/assets/Vector 8.svg" alt="Cloud" class="position-absolute cloud-right">
                    <!-- Gedung sekolah -->
                    <img src="/assets/design/assets/sekolah_vector.svg" alt="Gedung Sekolah" class="img-fluid school-building">
                    <!-- Karakter siswa -->
                    <img src="/assets/design/assets/orang_orasi.svg" alt="Siswa" class="position-absolute student-character">
                </div>
            </div>
            
        </div>
    </div>
</section>

<!-- SECTIONS 2 & 3: KANDIDAT -->
<section id="kandidat" class="kandidat-section py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-success">Daftar Kandidat</h2>
            <p class="text-muted">Kenali lebih dekat calon pemimpin masa depan MTsN 2 Ende</p>
        </div>

        <?php if(!empty($kandidat)): ?>
            <?php foreach($kandidat as $index => $knd): ?>
            
            <div class="row align-items-center mb-5 kandidat-row <?= ($index % 2 == 1) ? 'flex-row-reverse' : '' ?>">
                
                <!-- Card Panel -->
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="kandidat-card shadow rounded-3 text-center overflow-hidden position-relative">
                        <div class="card-bg-green py-4">
                            <div class="nomor-urut position-absolute top-0 start-0 m-3 bg-warning text-dark fw-bold rounded-circle d-flex align-items-center justify-content-center" style="width:40px; height:40px; font-size:1.2rem;">
                                <?= $index + 1; ?>
                            </div>
                            
                            <div class="kandidat-photo-wrapper mx-auto mb-3">
                                <?php $foto = ($knd['foto'] && $knd['foto'] != 'default.png') ? $knd['foto'] : 'default.png'; ?>
                                <img src="/assets/img/kandidat/<?= $foto; ?>" alt="<?= esc($knd['nm_ketua']); ?>" class="kandidat-photo rounded-circle border border-4 border-white shadow-sm object-fit-cover" style="width: 150px; height: 150px;">
                            </div>
                            
                            <h4 class="kandidat-names fw-bold text-white mb-0 px-3">
                                <?= esc($knd['pgl_ketua']); ?> &amp; <?= esc($knd['pgl_wakil']); ?>
                            </h4>
                        </div>
                        
                        <div class="bg-white p-3 text-dark">
                            <small class="d-block mb-1 text-success fw-bold">Ketua:</small>
                            <span class="d-block mb-2"><?= esc($knd['nm_ketua']); ?></span>
                            
                            <small class="d-block mb-1 text-success fw-bold">Wakil Ketua:</small>
                            <span class="d-block"><?= esc($knd['nm_wakil']); ?></span>
                        </div>
                    </div>
                </div>

                <!-- Visi Misi -->
                <div class="col-md-8 px-md-5">
                    <div class="visi-misi-box bg-white p-4 p-md-5 rounded-3 shadow-sm border border-light">
                        <h4 class="text-success fw-bold d-flex align-items-center mb-3">
                            <span class="bg-success text-white rounded px-3 py-1 me-2 small">Visi</span>
                        </h4>
                        <p class="text-muted lh-lg mb-4">
                            <?= nl2br(esc($knd['visi'])); ?>
                        </p>

                        <h4 class="text-success fw-bold d-flex align-items-center mb-3">
                            <span class="bg-success text-white rounded px-3 py-1 me-2 small">Misi</span>
                        </h4>
                        <div class="text-muted lh-lg misi-text">
                            <?= nl2br(esc($knd['misi'])); ?>
                        </div>
                        
                        <!-- Inline Vote Button -->
                        <div class="mt-4 pt-3 border-top text-end">
                            <button type="button" class="btn btn-warning rounded-pill px-4 fw-bold shadow-sm" onclick="vote(<?= $knd['id']; ?>)">
                                Pilih No. <?= $index + 1; ?>
                            </button>
                        </div>
                    </div>
                </div>

            </div>
            
            <?php endforeach; ?>
        <?php else: ?>
            <div class="text-center text-muted py-5">
                <h4>Belum ada data kandidat.</h4>
            </div>
        <?php endif; ?>
        
    </div>
</section>

<!-- SECTION 4: VOTING INFO -->
<section class="voting-section py-5">
    <div class="container">
        <h3 class="fw-bold mb-4 text-white text-center">Pilih Kandidat</h3>
        <div class="row justify-content-center">
            <?php foreach($kandidat as $index => $knd): ?>
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="voting-card text-center p-4 rounded-3 d-flex flex-column h-100">
                    <div class="mb-3 mt-auto">
                        <img src="/assets/img/kandidat/<?= $knd['foto'] ?? 'default.png'; ?>"
                             class="rounded-circle border border-3 shadow-sm"
                             style="width: 80px; height: 80px; object-fit: cover; border-color: #f1f1f1 !important;">
                    </div>
                    <h5 class="fw-bold text-dark mb-4">
                        <?= esc($knd['pgl_ketua']); ?> &amp; <?= esc($knd['pgl_wakil']); ?>
                    </h5>
                    <button class="btn btn-pilih rounded-pill px-4 fw-bold shadow-sm mt-auto mx-auto"
                            style="width: fit-content;"
                            onclick="vote(<?= $knd['id']; ?>)">
                        PILIH
                    </button>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer class="bg-dark text-white py-4 mt-auto">
    <div class="container text-center">
        <p class="mb-1 fw-bold">Pilketos MTs Negeri 2 Ende</p>
        <p class="mb-0 small text-white-50">&copy; <?= date('Y'); ?> Panitia Pemilihan OSIS. All rights reserved.</p>
    </div>
</footer>

<script>
function vote(kandidatId) {
    if(confirm('Apakah Anda yakin ingin memilih kandidat ini? Pilihan tidak dapat diubah.')) {
        // Implementasi logika voting via fetch/AJAX atau redirect ke controller submit
        alert('Terima kasih. Logika submit vote belum diimplementasikan sepenuhnya. ID Kandidat: ' + kandidatId);
    }
}
</script>

<?= $this->endSection() ?>
