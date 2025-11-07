<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
  <div class="pcoded-wrapper">
    <div class="pcoded-content">
      <div class="pcoded-inner-content">
        <div class="main-body">
          <div class="page-wrapper">
            <div class="page-body">
              <!-- ======= REAL TIME PRODUKSI SECTION ======= -->
              <div class="container-fluid py-4">
                <!-- Header -->
                <div class="text-center mb-4">
                  <h2 class="fw-bold text-uppercase text-primary">REAL TIME PRODUKSI</h2>
                  <h5 class="text-muted">Akumulasi Bulan Berjalan</h5>
                </div>

                <!-- Info Section -->
                <div class="row justify-content-center mb-4">
                  <div class="col-md-2 col-6 mb-3">
                    <div class="card shadow-sm border-0 text-center">
                      <div class="card-body">
                        <h6 class="text-muted mb-1">Tanggal</h6>
                        <h5 id="tanggal" class="fw-bold mb-0">03/11/2025</h5>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-2 col-6 mb-3">
                    <div class="card shadow-sm border-0 text-center">
                      <div class="card-body">
                        <h6 class="text-muted mb-1">Hari</h6>
                        <h5 id="hari" class="fw-bold mb-0">Senin</h5>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-2 col-6 mb-3">
                    <div class="card shadow-sm border-0 text-center">
                      <div class="card-body">
                        <h6 class="text-muted mb-1">Bulan</h6>
                        <h5 id="bulan" class="fw-bold mb-0">November</h5>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-2 col-6 mb-3">
                    <div class="card shadow-sm border-0 text-center">
                      <div class="card-body">
                        <h6 class="text-muted mb-1">Tahun</h6>
                        <h5 id="tahun" class="fw-bold mb-0">2025</h5>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-2 col-6 mb-3">
                    <div class="card shadow-sm border-0 text-center bg-primary">
                      <div class="card-body">
                        <h6 class="mb-1" style="color: white;">Jam</h6>
                        <h5 id="jam" class="fw-bold mb-0" style="color: white;">10:05:35</h5>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Tabel Produksi -->
                <div class="card shadow-lg border-0">
                  <div class="card-body">
                    <h5 class="fw-bold text-center text-primary mb-3">Data Produksi Realtime</h5>
                    <div class="table-responsive">
                      <table class="table table-hover align-middle text-center">
                        <thead class="table-primary text-uppercase">
                          <tr>
                            <th>Proses</th>
                            <th>Release</th>
                            <th>Reject</th>
                            <th>% RJK</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td><strong>Forming</strong></td>
                            <td>20,179,204</td>
                            <td> (FR) 780,630</td>
                            <td class="text-danger fw-bold">3.72%</td>
                          </tr>
                          <tr>
                            <td><strong>Sortir</strong></td>
                            <td>16,983,107</td>
                            <td> (SR) 443,037</td>
                            <td class="text-warning fw-bold">2.54%</td>
                          </tr>
                          <tr>
                            <td><strong>Printing</strong></td>
                            <td>3,458,152</td>
                            <td> (PR) 41,580</td>
                            <td class="text-success fw-bold">1.18%</td>
                          </tr>
                          <tr>
                            <td><strong>Packing</strong></td>
                            <td>5,425,000</td>
                            <td> (PR) 1,265,247</td>
                            <td class="text-danger fw-bold">2.33%</td>
                          </tr>
                          <tr>
                            <td><strong>MKT</strong></td>
                            <td>0</td>
                            <td>0</td>
                            <td class="text-muted fw-bold">0.00%</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <!-- ===== END REAL TIME PRODUKSI ===== -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- [ Main Content ] end -->

<script>
  function updateClock() {
    const now = new Date();
    const jam = now.toLocaleTimeString('id-ID', { hour12: false });
    const tanggal = now.getDate().toString().padStart(2, '0');
    const bulan = now.toLocaleString('id-ID', { month: 'long' });
    const tahun = now.getFullYear();
    const hariList = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
    const hari = hariList[now.getDay()];

    document.getElementById('jam').textContent = jam;
    document.getElementById('tanggal').textContent = `${tanggal}/${now.getMonth()+1}/${tahun}`;
    document.getElementById('bulan').textContent = bulan.charAt(0).toUpperCase() + bulan.slice(1);
    document.getElementById('tahun').textContent = tahun;
    document.getElementById('hari').textContent = hari;
  }

  setInterval(updateClock, 1000);
  updateClock();
</script>

<style>
  .card {
    border-radius: 12px;
  }

  .card-body {
    padding: 1rem 1rem;
  }

  .table th {
    font-weight: 700;
    letter-spacing: .5px;
  }

  .table td {
    vertical-align: middle;
  }

  .table thead {
    background-color: #007bff;
    color: white;
  }

  .container-fluid {
    max-width: 1200px; /* biar gak melebar ke kanan */
    margin: 0 auto;
  }

  body {
    background-color: #f8f9fc !important;
  }
</style>
