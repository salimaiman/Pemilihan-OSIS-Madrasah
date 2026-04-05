<link rel="stylesheet" href="<?= base_url('assets/css/'); ?>content.css">


<div class="isi">
    <div class="row">
        <div class="col-md-12 text-center title">
            <span class="fs-1">Dashboard</span>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col offset-2">
            <div class="canvas">
                <h3 class="text-center">Statistik</h3>
                <canvas class="mt-2" id="myChart"></canvas>
            </div>
        </div>
        <div class="col">
            <div class="keterangan ml-4">
                <div class="dsb-total ttl-suara bg-primary">
                    <h5>
                        TOTAL SUARA
                    </h5>
                    <p class="fs-4" id="ttl-suara"></p>
                </div>
                <div class="dsb-total ttl-pemilih bg-success">
                    <h5>
                        TOTAL PEMILIH
                    </h5>
                    <p class="fs-4" id="ttl-pemilih"></p>
                </div>
                <div class="dsb-total sdh-memilih bg-secondary">
                    <h5>
                        SUDAH MEMILIH
                    </h5>
                    <p class="fs-4" id="sdh-memilih"></p>
                </div>
                <div class="dsb-total blm-memilih bg-danger">
                    <h5>
                        BELUM MEMILIH
                    </h5>
                    <p class="fs-4" id="blm-memilih"></p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CHART -->
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: [
                'Paslon 1',
                'Paslon 2',
                'Paslon 3'
            ],
            datasets: [{
                label: 'My First Dataset',
                data: [300, 50, 100],
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)'
                ],
                hoverOffset: 4
            }]
        }
    });
</script>

<!-- COUNT UP -->
<script src="<?= base_url('assets/js/'); ?>Countup.min.js"></script>
<script>
    const c1 = new CountUp('ttl-suara', 0, 90, 0, 1.5);
    const c2 = new CountUp('ttl-pemilih', 0, 90);
    const c3 = new CountUp('sdh-memilih', 0, 90, 0, 2.5);
    const c4 = new CountUp('blm-memilih', 0, 90, 0, 3);

    c1.start();
    c2.start();
    c3.start();
    c4.start();
</script>
</div>
</div>
</div>