<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Master Stock Size</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    :root {
      --primary: #4361ee;
      --secondary: #3f37c9;
      --success: #4cc9f0;
      --danger: #e63946;
      --warning: #f72585;
      --light: #f8f9fa;
      --dark: #212529;
    }

    body {
      background-color: #f5f7fb;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      padding: 0;
    }

    /* Layout dengan sidebar */
    .main-container {
      display: flex;
      min-height: 100vh;
    }

    /* Sidebar - sesuaikan dengan template Anda */
    .sidebar {
      width: 250px;
      background: linear-gradient(135deg, var(--primary), var(--secondary));
      color: white;
      position: fixed;
      height: 100vh;
      overflow-y: auto;
      z-index: 1000;
    }

    /* Content area */
    .content {
      flex: 1;
      margin-left: 250px;
      /* Sesuaikan dengan lebar sidebar */
      padding: 20px;
      width: calc(100% - 250px);
    }

    .card {
      border: none;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
      margin-bottom: 25px;
    }

    .card-header {
      background: linear-gradient(135deg, var(--primary), var(--secondary));
      color: white;
      border-radius: 12px 12px 0 0 !important;
      padding: 20px 25px;
    }

    .card-header h4 {
      margin: 0;
      font-weight: 700;
    }

    .btn-primary {
      background: linear-gradient(135deg, var(--primary), var(--secondary));
      border: none;
      border-radius: 8px;
      font-weight: 600;
      padding: 10px 20px;
    }

    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 8px rgba(67, 97, 238, 0.3);
    }

    .btn-danger {
      background: linear-gradient(135deg, var(--danger), #d00000);
      border: none;
      border-radius: 6px;
      font-weight: 600;
    }

    .table th {
      background: linear-gradient(135deg, var(--primary), var(--secondary));
      color: white;
      border: none;
      padding: 15px 12px;
      font-weight: 600;
    }

    .table td {
      padding: 12px;
      vertical-align: middle;
      border-bottom: 1px solid #e9ecef;
    }

    .table tbody tr:hover {
      background-color: rgba(67, 97, 238, 0.05);
    }

    .form-control {
      border-radius: 8px;
      border: 1px solid #e9ecef;
      padding: 10px 15px;
      transition: all 0.3s ease;
    }

    .form-control:focus {
      border-color: var(--primary);
      box-shadow: 0 0 0 0.2rem rgba(67, 97, 238, 0.25);
    }

    .alert {
      border-radius: 8px;
      border: none;
    }

    .badge {
      padding: 6px 10px;
      border-radius: 20px;
      font-weight: 600;
    }

    .month-badge {
      background: linear-gradient(135deg, var(--success), var(--primary));
      color: white;
    }

    .year-badge {
      background: linear-gradient(135deg, var(--warning), #b5179e);
      color: white;
    }

    /* Responsive design */
    @media (max-width: 768px) {
      .sidebar {
        width: 70px;
      }

      .content {
        margin-left: 70px;
        width: calc(100% - 70px);
        padding: 15px;
      }

      .card-header {
        padding: 15px 20px;
      }

      .form-control {
        padding: 8px 12px;
      }
    }

    @media (max-width: 576px) {
      .content {
        margin-left: 0;
        width: 100%;
        padding: 10px;
      }

      .sidebar {
        transform: translateX(-100%);
      }

      .sidebar.active {
        transform: translateX(0);
      }
    }
  </style>
</head>

<body>
  <div class="main-container">
    <!-- Sidebar Template (Sesuaikan dengan template Anda) -->
    <div class="sidebar">
      <!-- Isi sidebar Anda di sini -->
      <div class="sidebar-content p-3">
        <h4 class="text-center mb-4">Menu</h4>
        <ul class="nav flex-column">
          <li class="nav-item mb-2">
            <a class="nav-link text-white" href="#">
              <i class="fas fa-home me-2"></i>Dashboard
            </a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link text-white active" href="#">
              <i class="fas fa-boxes me-2"></i>Master Stock
            </a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link text-white" href="#">
              <i class="fas fa-chart-bar me-2"></i>Laporan
            </a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link text-white" href="#">
              <i class="fas fa-cog me-2"></i>Pengaturan
            </a>
          </li>
        </ul>
      </div>
    </div>

    <!-- Content Area -->
    <div class="content">
      <div class="container-fluid py-4">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h4><i class="fas fa-boxes me-2"></i>Master Stock Size</h4>
                <div class="d-flex align-items-center">
                  <span class="badge bg-light text-dark me-2">Total: 0 Data</span>
                </div>
              </div>
              <div class="card-body">
                <!-- Alert Notifikasi -->
                <div class="alert alert-success alert-dismissible fade show d-none" role="alert" id="successAlert">
                  <i class="fas fa-check-circle me-2"></i>Data berhasil disimpan
                  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>

                <div class="alert alert-danger alert-dismissible fade show d-none" role="alert" id="errorAlert">
                  <i class="fas fa-exclamation-circle me-2"></i>Terjadi kesalahan
                  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>

                <!-- Form Tambah Data -->
                <div class="row mb-4">
                  <div class="col-12">
                    <div class="card bg-light">
                      <div class="card-body">
                        <h5 class="card-title text-primary mb-3">
                          <i class="fas fa-plus-circle me-2"></i>Tambah Data Stock
                        </h5>
                        <form action="#" method="POST" class="row g-3" id="stockForm">
                          <div class="col-md-3">
                            <label class="form-label fw-semibold">Bulan Stock</label>
                            <select name="stok_bulan" class="form-control" required>
                              <option value="">- Pilih Bulan -</option>
                              <option value="1">January</option>
                              <option value="2">February</option>
                              <option value="3">March</option>
                              <option value="4">April</option>
                              <option value="5">May</option>
                              <option value="6">June</option>
                              <option value="7">July</option>
                              <option value="8">August</option>
                              <option value="9">September</option>
                              <option value="10">October</option>
                              <option value="11">November</option>
                              <option value="12">December</option>
                            </select>
                          </div>
                          <div class="col-md-3">
                            <label class="form-label fw-semibold">Tahun Stock</label>
                            <input type="number" name="tahun_stok" class="form-control" min="2020" max="2030"
                              value="2024" placeholder="Tahun" required>
                          </div>
                          <div class="col-md-3">
                            <label class="form-label fw-semibold text-white">.</label>
                            <button type="submit" class="btn btn-primary w-100">
                              <i class="fas fa-save me-2"></i>Simpan Data
                            </button>
                          </div>
                          <div class="col-md-3">
                            <label class="form-label fw-semibold text-white">.</label>
                            <button type="reset" class="btn btn-outline-secondary w-100">
                              <i class="fas fa-redo me-2"></i>Reset
                            </button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Tabel Data -->
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th width="80">#</th>
                        <th>Bulan Stock</th>
                        <th>Tahun Stock</th>
                        <th>Dibuat Pada</th>
                        <th width="120" class="text-center">Aksi</th>
                      </tr>
                    </thead>
                    <tbody id="stockTableBody">
                      <tr>
                        <td colspan="5" class="text-center py-4">
                          <i class="fas fa-inbox fa-2x text-muted mb-3"></i>
                          <p class="text-muted">Belum ada data stock</p>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.getElementById('stockForm').addEventListener('submit', function (e) {
      e.preventDefault();

      const stokBulan = this.querySelector('[name="stok_bulan"]').value;
      const tahunStok = this.querySelector('[name="tahun_stok"]').value;

      if (!stokBulan || !tahunStok) {
        document.getElementById('errorAlert').classList.remove('d-none');
        document.querySelector('#errorAlert .alert-message').textContent = 'Harap lengkapi semua field!';
        return;
      }

      // kirim pakai AJAX
      fetch('<?= base_url("Marketing/master/Master_stock/add") ?>', {
        method: 'POST',
        body: new FormData(this)
      })
        .then(res => res.text())
        .then(res => {
          document.getElementById('successAlert').classList.remove('d-none');
          this.reset();
        })
        .catch(err => console.error(err));
    });
  </script>

</body>

</html>