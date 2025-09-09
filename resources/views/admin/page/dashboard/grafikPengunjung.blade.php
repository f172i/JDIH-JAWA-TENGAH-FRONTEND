<div class="col-lg-12 col-xl-12 col-xxl-6 mb-5 mb-xl-0" style="min-width:100%;">
    <div class="card card-flush overflow-hidden h-md-100 p-5" >
        <div class="card-header py-1">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder text-dark">Grafik Pengunjung JDIH</span>
            </h3>
        </div>
        <div class="card-body d-flex justify-content-between flex-column pb-1 px-0">
            <canvas id="myChart" width="300" height="125"></canvas>
        </div>
    </div>
</div>
<script>
    let jml = "{{ $data_jml }}"
    let tgl = "{{ $data_tgl }}"
    const tglfix = JSON.parse(tgl.replace(/&quot;/g, '"'));
    const jmlfix = JSON.parse(jml.replace(/&quot;/g, '"'));

    const data = {
      labels: tglfix,
      datasets: [{
        backgroundColor: 'rgb(255, 99, 132)',
        borderColor: 'rgb(255, 99, 132)',
        data: jmlfix,
      }]
    };
  
    const config = {
      type: 'line',
      data: data,
      options: {
          plugins: {
              legend: {
                  display: false
              }
          }
      }
    };
    const myChart = new Chart(
      document.getElementById('myChart'),
      config
    );
  </script>