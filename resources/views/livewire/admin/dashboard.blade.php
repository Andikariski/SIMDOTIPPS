
<div class="">
  <div class="row g-4">
    <!-- Card 1: Otsus SG -->
    <div class="col-12 col-md-6 col-lg-3">
      <div class="card shadow-sm border-0 h-100" style="background: linear-gradient(135deg, #219EBC 0%,  #4f46e5 100%);">
        <div class="card-body d-flex align-items-center">
          <i class="bi bi-cash-coin text-light me-3" style="font-size: 60px;"></i>
          <div class="text-start">
            <h6 class="fw-semibold text-light">Dana Otsus BG</h6>
              @if(auth()->user()->is_admin == 1 || $paguOPD == null )
                <span class="badge bg-danger">Pagu belum ada</span>
              @else
                <h5 class="fw-bold text-light">
                  {{ number_format($paguOPD['pagu_BG']) }}
              </h5>
              @endif
          </div>
        </div>
      </div>
    </div>

    <!-- Card 2: Otsus BG -->
    <div class="col-12 col-md-6 col-lg-3">
      <div class="card shadow-sm border-0 h-100" style="background: linear-gradient(135deg, #219EBC 0%,  #4f46e5 100%);">
        <div class="card-body d-flex align-items-center">
          <i class="bi bi-cash-coin text-light me-3" style="font-size: 60px;"></i>
          <div class="text-start">
            <h6 class="fw-semibold text-light">Dana Otsus SG</h6>
              @if(auth()->user()->is_admin == 1 || $paguOPD == null )
                <span class="badge bg-danger">Pagu Belum ada</span>
              @else
                <h5 class="fw-bold text-light">
                  {{ number_format($paguOPD['pagu_SG']) }}
              </h5>
              @endif
          </div>
        </div>
      </div>
    </div>

    <!-- Card 3: Dana DTI -->
    <div class="col-12 col-md-6 col-lg-3">
      <div class="card shadow-sm border-0 h-100" style="background: linear-gradient(135deg, #219EBC 0%,  #4f46e5 100%);">
        <div class="card-body d-flex align-items-center">
          <i class="bi bi-cash-coin text-light me-3" style="font-size: 60px;"></i>
          <div class="text-start">
            <h6 class="fw-semibold text-light">Dana Otsus DTI</h6>
              @if(auth()->user()->is_admin == 1 || $paguOPD == null )
                <span class="badge bg-danger">Pagu Belum ada</span>
              @else
                <h5 class="fw-bold text-light">
                  {{ number_format($paguOPD['pagu_DTI']) }}
              </h5>
              @endif
          </div>
        </div>
      </div>
    </div>

    <!-- Card 4: Kegiatan Berjalan -->
    <div class="col-12 col-md-6 col-lg-3">
     <div class="card shadow-sm border-0 h-100" style="background: linear-gradient(135deg, #219EBC 0%,  #4f46e5 100%);">
        <div class="card-body d-flex align-items-center">
         <i class="bi bi-calendar-check-fill text-light me-3" style="font-size: 60px;"></i>
          <div class="text-start">
            <h6 class="fw-semibold text-light">Dana SiLPA</h6>
            <h5 class="fw-bold text-light mb-0">100.000.000</h5>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- <div class="row g-4">
    <!-- Card 1: Otsus SG -->
    <div class="col-12 col-md-6 col-lg-3">
      <div class="card card-border blue shadow-sm border-0 h-100">
        <div class="card-body d-flex align-items-center">
          <i class="bi bi-cash-coin text-primary me-3" style="font-size: 60px;"></i>
          <div class="text-start">
            <h6 class="fw-semibold">Dana Otsus SG</h6>
            <h5 class="fw-bold text-primary mb-0">12.000.000.000</h5>
          </div>
        </div>
      </div>
    </div>

    <!-- Card 2: Otsus BG -->
    <div class="col-12 col-md-6 col-lg-3">
      <div class="card card-border hijau shadow-sm border-0 h-100">
        <div class="card-body d-flex align-items-center">
          <i class="bi bi-cash-coin text-success me-3" style="font-size: 60px;"></i>
          <div class="text-start">
            <h6 class="fw-semibold">Dana Otsus BG</h6>
            <h5 class="fw-bold text-success mb-0">40.000.000.000</h5>
          </div>
        </div>
      </div>
    </div>

    <!-- Card 3: Dana DTI -->
    <div class="col-12 col-md-6 col-lg-3">
      <div class="card card-border orange shadow-sm border-0 h-100">
        <div class="card-body d-flex align-items-center">
          <i class="bi bi-cash-coin text-warning me-3" style="font-size: 60px;"></i>
          <div class="text-start">
            <h6 class="fw-semibold">Dana DTI</h6>
            <h5 class="fw-bold text-warning mb-0">120.000.000.000</h5>
          </div>
        </div>
      </div>
    </div>

    <!-- Card 4: Kegiatan Berjalan -->
    <div class="col-12 col-md-6 col-lg-3">
      <div class="card card-border danger shadow-sm border-0 h-100">
        <div class="card-body d-flex align-items-center">
          <i class="bi bi-calendar-check-fill subkegiatan me-3" style="font-size: 60px;"></i>
          <div class="text-start">
            <h6 class="fw-semibold">Kegiatan Berjalan</h6>
            <h5 class="fw-bold subkegiatan mb-0">20 SubKegiatan</h5>
          </div>
        </div>
      </div>
    </div>
  </div> --}}
{{-- <div class="card text-white shadow-sm border-0 mt-4" style="background: linear-gradient(135deg, #219EBC 0%,  #4f46e5 100%);">
        <div class="row">
            <div class="col-4">
                <div class="card-body">
                  <div class="row">
                    <div class="col-3">
                      <i class="bi bi-cash-coin text-light me-3" style="font-size: 60px;"></i>
                    </div>
                    <div class="col-9">
                      <h5 class="card-title">Dana Otsus BG (1%)</h5>
                      <h3 class="fw-bold">120.000.000.000</h3>
                      <p class="mb-0">Tahun Anggaran 2025</p>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-4">
                 <div class="card-body">
                  <div class="row">
                    <div class="col-3">
                      <i class="bi bi-cash-coin text-light me-3" style="font-size: 60px;"></i>
                    </div>
                    <div class="col-9">
                      <h5 class="card-title">Dana Otsus SG (1,25%)</h5>
                      <h3 class="fw-bold">120.000.000.000</h3>
                      <p class="mb-0">Tahun Anggaran 2025</p>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-4">
                 <div class="card-body">
                  <div class="row">
                    <div class="col-3">
                      <i class="bi bi-cash-coin text-light me-3" style="font-size: 60px;"></i>
                    </div>
                    <div class="col-9">
                      <h5 class="card-title">Dana DTI</h5>
                      <h3 class="fw-bold">120.000.000.000</h3>
                      <p class="mb-0">Tahun Anggaran 2025</p>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div> --}}

  <div class="card p-4 border shadow-sm rounded-1 mt-4">
    <h5 class="mb-3 fw-semibold text-primary">Grafik Penyerapan Dana per Sub Kegiatan</h5>
    <div id="chart"></div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/countup.js/2.8.0/countUp.umd.js"></script> --}}

<script>
document.addEventListener("DOMContentLoaded", function () {
  const danaAnggaran = [100, 150, 180, 100, 90, 120]; // contoh data (Miliar)
  const danaDigunakan = [60, 90, 110, 85, 82, 90];   // contoh data (Miliar)
  const penyerapanDana = [60, 90, 110, 85, 82, 90];   // contoh data (Miliar)

  const maxDana = Math.ceil(Math.max(...danaAnggaran, ...danaDigunakan) / 10) * 10 + 10;

  var options = {
    chart: {
      height: 350,
      type: 'bar',
      toolbar: { show: true },
      animations: {
        enabled: true,
        easing: 'easeinout',
        speed: 1000
      }
    },
    series: [
      {
        name: 'Dana Dianggarkan (Miliar)',
        data: danaAnggaran
      },
      {
        name: 'Dana Digunakan (Miliar)',
        data: danaDigunakan
      },
        // name: 'Penyerapan (%)',
        // data: penyerapanDana
      
    ],
    colors: ['#219EBC', '#4CAF50'],
    plotOptions: {
      bar: {
        horizontal: false,
        columnWidth: '40%',
        endingShape: 'rounded',
        borderRadius: 4
      }
    },
    // Hilangkan hanya nilai (angka) di atas bar
    dataLabels: {
      enabled: false
    },
    xaxis: {
      categories: [
      'Penanggulangan Bencana', 
      'Beasiswa Pendidikan SMP', 
      'Pengadaan ATK', 
      'Perjalanan Dinas', 
      'Pembelian Bus Sekolah', 
      'Seleksi Sekolah Kedinasan']
    },
    yaxis: {
      title: {
        text: 'Dana (Miliar)'
      },
      min: 0,
      max: maxDana,
      labels: {
        formatter: val => val + ' M'
      }
    },
    tooltip: {
      shared: true,
      intersect: false,
      y: {
        formatter: val => val + ' M'
      }
    },
    legend: {
      position: 'top',
      horizontalAlign: 'center'
    },
    grid: {
      borderColor: '#eee',
      row: { colors: ['#f9f9f9', 'transparent'], opacity: 0.5 }
    }
  };

  var chart = new ApexCharts(document.querySelector("#chart"), options);
  chart.render();
});
</script>

{{-- <script>
document.addEventListener("DOMContentLoaded", function () {
  const danaAnggaran = [100, 150, 180, 100, 90, 120];
  const danaDigunakan = [60, 90, 110, 85, 82, 90];
  const penyerapan = [60, 70, 63, 85, 82, 90];

  const maxDana = Math.ceil(Math.max(...danaAnggaran, ...danaDigunakan) / 10) * 10;

  var options = {
    chart: {
      height: 350,
      type: 'line',
      toolbar: { show: true },
      animations: { enabled: true, easing: 'easeinout', speed: 1000 }
    },
    series: [
      {
        name: 'Dana Dianggarkan (Miliar)',
        type: 'column',
        data: danaAnggaran
      },
      {
        name: 'Dana Digunakan (Miliar)',
        type: 'column',
        data: danaDigunakan
      },
      {
        name: 'Penyerapan (%)',
        type: 'line',
        data: penyerapan,
        yAxisIndex: 1 // arahkan ke y-axis kanan (persentase)
      }
    ],
    colors: ['#219EBC', '#4CAF50', '#FFB703'],
    stroke: {
      width: [0, 0, 3],
      curve: 'smooth'
    },
    plotOptions: {
      bar: {
        horizontal: false,
        columnWidth: '40%',
        endingShape: 'rounded',
        borderRadius: 4,
        dataLabels: {
          position: 'top'
        }
      }
    },
    dataLabels: {
      enabled: true,
      enabledOnSeries: [0, 1], // tampilkan hanya di bar
      formatter: val => val + ' M',
      offsetY: -10,
      style: { fontSize: '12px', colors: ['#333'] }
    },
    xaxis: {
      categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun']
    },
    yaxis: [
      {
        title: { text: 'Dana (Miliar)' },
        labels: { formatter: val => val + ' M' },
        min: 0,
        max: maxDana
      },
      {
        opposite: true,
        title: { text: 'Penyerapan (%)' },
        labels: { formatter: val => val + '%' },
        min: 0,
        max: 100
      }
    ],
    tooltip: {
      shared: true,
      intersect: false,
      y: [
        { formatter: val => val + ' M' },
        { formatter: val => val + ' M' },
        { formatter: val => val + '%' }
      ]
    },
    legend: {
      position: 'top',
      horizontalAlign: 'center'
    },
    grid: {
      borderColor: '#eee',
      row: { colors: ['#f9f9f9', 'transparent'], opacity: 0.5 }
    }
  };

  var chart = new ApexCharts(document.querySelector("#chart"), options);
  chart.render();
});
</script> --}}

