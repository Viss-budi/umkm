<div class="card shadow-sm mt-4">
    <div class="card-body">
        <h5 class="mb-3">Grafik Pembelian Bulanan</h5>

        <div style="height:300px;">
            <canvas id="grafikPembelian"></canvas>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
let chart;

function loadGrafik() {
    const tgl_awal = document.querySelector('[name="tgl_awal"]').value;
    const tgl_akhir = document.querySelector('[name="tgl_akhir"]').value;

    fetch(`tampil_grafik_pembelian.php?tgl_awal=${tgl_awal}&tgl_akhir=${tgl_akhir}`)
        .then(res => res.json())
        .then(data => {

            const bulan = data.map(d => d.bulan);
            const total = data.map(d => d.total);

            if (chart) chart.destroy();

            const ctx = document.getElementById('grafikPembelian').getContext('2d');

            chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: bulan,
                    datasets: [{
                        label: 'Total Pembelian',
                        data: total,
                        backgroundColor: '#ff4da6'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false, // 🔥 penting biar tidak tinggi banget
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        })
        .catch(err => console.error(err));
}

// load awal
loadGrafik();

// reload saat klik filter
document.querySelector('form').addEventListener('submit', function(){
    setTimeout(loadGrafik, 300);
});
</script>