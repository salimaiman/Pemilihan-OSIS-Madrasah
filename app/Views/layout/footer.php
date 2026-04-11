<!-- Logout Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutModalLabel">Apakah anda yakin ingin logout?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Pilih "Logout" untuk melanjutkan.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="border-radius: 20px;padding: 0.5rem 1rem;">Close</button>
                <a href="<?= base_url('auth/logout'); ?>" class="btn btn-primary" style="border-radius: 20px;padding: 0.5rem 1rem;">Logout</a>
            </div>
        </div>
    </div>
</div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

<!-- Chart.js CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.4.0/chart.js" integrity="sha512-+POM1aKUkb5l91zDBDtxn0dlY5wazuQFtCXin/47Z+eE7AnMuFBMrNjkZA1P6m+infsMMSthlsPNh1rjBtAPBA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

</html>