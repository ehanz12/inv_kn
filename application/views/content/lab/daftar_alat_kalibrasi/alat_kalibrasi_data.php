<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pesanan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css" rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <style>
:root {
    --primary: #4361ee;
    --barang: #436;
    --upd: #f72585;
    --secondary: #3f37c9;
    --success: #4cc9f0;
    --info: #4895ef;
    --warning: #ae4976ff;
    --danger: #e63946;
    --light: #f8f9fa;
    --dark: #212529;
    --gray: #6c757d;
    --light-gray: #e9ecef;
    --border-radius: 12px;
    --box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    --transition: all 0.3s ease;
}

.ppb-container {
    padding: 20px;
    background-color: #f5f7fb;
    min-height: 100vh;
}

/* Page Header & Breadcrumb */
.page-header {
    margin-bottom: 25px;
}

.page-title {
    font-size: 24px;
    font-weight: 700;
    margin-bottom: 10px;
    color: var(--dark);
    display: flex;
    align-items: center;
}

.page-title i {
    margin-right: 10px;
    color: var(--primary);
}

.breadcrumb {
    background: transparent;
    padding: 0;
    margin-bottom: 0;
}

.breadcrumb-item a {
    color: var(--primary);
    text-decoration: none;
}

.breadcrumb-item a:hover {
    color: var(--secondary);
    text-decoration: underline;
}

/* Card Styling */
.card {
    width: 100%;
    border: none;
    border-radius: var(--border-radius);
    box-shadow: var(--box-shadow);
    margin-bottom: 25px;
    transition: var(--transition);
}

.card:hover {
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.12);
}

.card-header {
    background: white;
    border-bottom: 1px solid var(--light-gray);
    padding: 15px 15px;
    border-radius: var(--border-radius) var(--border-radius) 0 0 !important;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 15px;
}

.card-header h5 {
    font-size: 18px;
    font-weight: 700;
    color: var(--dark);
    margin: 0;
    display: flex;
    align-items: center;
    gap: 8px;
}

.card-header h5 i {
    color: var(--primary);
}

/* Buttons */
.btn-group {
    display: flex;
    gap: 10px;
}

.btn {
    border-radius: 8px;
    font-weight: 600;
    padding: 8px 16px;
    transition: var(--transition);
    display: flex;
    align-items: center;
    gap: 5px;
    border: none;
    font-size: 14px;
}

.btn:hover {
    transform: translateY(-2px);
}

.btn-sm {
    padding: 6px 12px;
    font-size: 13px;
}

.btn-square {
    border-radius: 8px !important;
}

.btn-primary {
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    color: white;
}

.btn-primary:hover {
    box-shadow: 0 4px 8px rgba(67, 97, 238, 0.3);
}

.btn-success {
    background: linear-gradient(135deg, var(--success), var(--info));
    color: white;
}

.btn-success:hover {
    box-shadow: 0 4px 8px rgba(76, 201, 240, 0.3);
}

.btn-info {
    background: linear-gradient(135deg, var(--info), #3a86ff);
    color: white;
}

.btn-info:hover {
    box-shadow: 0 4px 8px rgba(72, 149, 239, 0.3);
}

.btn-warning {
    background: linear-gradient(135deg, var(--warning), #b5179e);
    color: white;
}

.btn-warning:hover {
    box-shadow: 0 4px 8px rgba(174, 73, 118, 0.3);
}

.btn-danger {
    background: linear-gradient(135deg, var(--danger), #d00000);
    color: white;
}

.btn-danger:hover {
    box-shadow: 0 4px 8px rgba(230, 57, 70, 0.3);
}

.btn-secondary {
    background: linear-gradient(135deg, var(--gray), #495057);
    color: white;
}

.btn-secondary:hover {
    box-shadow: 0 4px 8px rgba(108, 117, 125, 0.3);
}

.float-right {
    float: right;
}

/* Tables */
.table-responsive {
    border-radius: 0 0 var(--border-radius) var(--border-radius);
    overflow: hidden;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
}

.table {
    margin-bottom: 0;
    border-collapse: separate;
    border-spacing: 0;
    width: 100%;
    min-width: 800px;
}

.table thead th {
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    color: white;
    border: none;
    padding: 13px 10px;
    font-weight: 600;
    text-transform: uppercase;
    font-size: 12px;
    line-height: 1.5;
    letter-spacing: 0.5px;
    white-space: nowrap;
    position: sticky;
    top: 0;
    z-index: 10;
}

.table tbody td {
    padding: 10px 8px;
    vertical-align: middle;
    border-bottom: 1px solid var(--light-gray);
    white-space: nowrap;
    font-size: 13px;
}

.table tbody tr {
    transition: var(--transition);
}

.table tbody tr:hover {
    background-color: rgba(67, 97, 238, 0.05);
    transform: translateY(-1px);
}

.table tbody tr:last-child td {
    border-bottom: none;
}

.table-bordered {
    border: 1px solid var(--light-gray);
    border-radius: 8px;
    overflow: hidden;
}

.table-bordered thead th {
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    color: white;
    border: none;
}

.table-bordered tbody td {
    border: 1px solid var(--light-gray);
}

.table-hover tbody tr:hover {
    background-color: rgba(67, 97, 238, 0.08);
}

.table-striped tbody tr:nth-of-type(odd) {
    background-color: rgba(0, 0, 0, 0.02);
}

.table-striped tbody tr:nth-of-type(odd):hover {
    background-color: rgba(67, 97, 238, 0.08);
}

/* Status Badges */
.badge {
    padding: 6px 8px;
    border-radius: 20px;
    font-weight: 600;
    font-size: 11px;
    display: inline-block;
}

.badge-success {
    background-color: rgba(76, 201, 240, 0.1);
    color: var(--success);
}

.badge-primary {
    background-color: rgba(67, 97, 238, 0.1);
    color: var(--primary);
}

.badge-warning {
    background-color: rgba(247, 37, 133, 0.1);
    color: var(--warning);
}

.badge-danger {
    background-color: rgba(230, 57, 70, 0.1);
    color: var(--danger);
}

/* Modals */
.modal-content {
    border: none;
    border-radius: var(--border-radius);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
}

.modal-header {
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    color: white;
    border-radius: var(--border-radius) var(--border-radius) 0 0;
    padding: 20px 25px;
}

.modal-up {
    background: linear-gradient(135deg, var(--upd), var(--warning));
    color: white;
    border-radius: var(--border-radius) var(--border-radius) 0 0;
    padding: 20px 25px;
}

.modal-barang {
    background: linear-gradient(135deg, var(--barang), var(--secondary));
    color: white;
    border-radius: var(--border-radius) var(--border-radius) 0 0;
    padding: 20px 25px;
}

.modal-title {
    font-weight: 700;
    font-size: 18px;
    color: white;
    display: flex;
    align-items: center;
    gap: 8px;
}

.close {
    color: white;
    opacity: 0.8;
    text-shadow: none;
}

.close:hover {
    color: white;
    opacity: 1;
}

.modal-body {
    padding: 25px;
}

.modal-footer {
    border-top: 1px solid var(--light-gray);
    padding: 20px 25px;
}

/* Form Elements */
.form-group {
    margin-bottom: 20px;
}

.form-control {
    border: 1px solid var(--light-gray);
    border-radius: 8px;
    padding: 10px 15px;
    transition: var(--transition);
    font-size: 14px;
}

.form-control:focus {
    border-color: var(--primary);
    box-shadow: 0 0 0 0.2rem rgba(67, 97, 238, 0.25);
}

.form-control[readonly] {
    background-color: var(--light-gray);
    cursor: not-allowed;
}

.form-label {
    font-weight: 600;
    color: var(--dark);
    margin-bottom: 8px;
    display: block;
    font-size: 14px;
}

.invalid-feedback {
    font-size: 12px;
    margin-top: 5px;
    color: var(--danger);
}

.is-invalid {
    border-color: var(--danger) !important;
}

.is-invalid:focus {
    box-shadow: 0 0 0 0.2rem rgba(230, 57, 70, 0.25) !important;
}

/* Chosen Select */
.chosen-container {
    width: 100% !important;
}

.chosen-container-single .chosen-single {
    border: 1px solid var(--light-gray);
    border-radius: 8px;
    padding: 10px 15px;
    height: auto;
    background: white;
    box-shadow: none;
    font-size: 14px;
}

.chosen-container-active.chosen-with-drop .chosen-single {
    border-color: var(--primary);
    box-shadow: 0 0 0 0.2rem rgba(67, 97, 238, 0.25);
}

.chosen-container .chosen-results li.highlighted {
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    color: white;
}

/* Datepicker */
.datepicker {
    z-index: 9999 !important;
}

.datepicker-dropdown {
    border-radius: var(--border-radius);
    box-shadow: var(--box-shadow);
    border: none;
}

.datepicker table tr td.active.active,
.datepicker table tr td.active:hover.active {
    background: linear-gradient(135deg, var(--primary), var(--secondary)) !important;
    border-color: var(--primary) !important;
}

.datepicker table tr td.today {
    background-color: var(--light-gray) !important;
}

.datepicker table tr td.today:hover {
    background-color: var(--gray) !important;
}

/* Text Alignment */
.text-center {
    text-align: center;
}

.text-right {
    text-align: right;
}

.text-danger {
    color: var(--danger) !important;
}

.text-success {
    color: var(--success) !important;
}

.text-primary {
    color: var(--primary) !important;
}

.text-muted {
    color: var(--gray) !important;
}

/* Action Buttons in Table */
.action-buttons {
    display: flex;
    gap: 4px;
    justify-content: center;
    flex-wrap: nowrap;
}

.table .btn-sm {
    padding: 4px 8px;
    font-size: 11px;
    line-height: 1.5;
    white-space: nowrap;
    min-width: 70px;
}

.table .btn i {
    font-size: 10px;
    margin-right: 2px;
}

/* Form Sections */
.filter-section {
    background: white;
    padding: 20px;
    border-radius: var(--border-radius);
    box-shadow: var(--box-shadow);
    margin-bottom: 25px;
    border-left: 4px solid var(--primary);
}

.filter-row {
    display: flex;
    gap: 15px;
    align-items: end;
    flex-wrap: wrap;
}

.filter-group {
    flex: 1;
    min-width: 180px;
    margin-bottom: 0;
}

.filter-actions {
    display: flex;
    gap: 10px;
    align-items: end;
}

.filter-actions .btn {
    height: 42px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    white-space: nowrap;
}

/* Row and Column Layout */
.row {
    display: flex;
    flex-wrap: wrap;
    margin-right: -10px;
    margin-left: -10px;
}

.row > [class*="col-"] {
    padding-right: 10px;
    padding-left: 10px;
}

.col-xl-12 {
    flex: 0 0 100%;
    max-width: 100%;
}

.col-md-1 { flex: 0 0 8.333333%; max-width: 8.333333%; }
.col-md-2 { flex: 0 0 16.666667%; max-width: 16.666667%; }
.col-md-3 { flex: 0 0 25%; max-width: 25%; }
.col-md-4 { flex: 0 0 33.333333%; max-width: 33.333333%; }
.col-md-6 { flex: 0 0 50%; max-width: 50%; }
.col-md-12 { flex: 0 0 100%; max-width: 100%; }

/* Scrollbar Styling */
.table-responsive::-webkit-scrollbar {
    height: 8px;
}

.table-responsive::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 4px;
}

.table-responsive::-webkit-scrollbar-thumb {
    background: #c1c1c1;
    border-radius: 4px;
}

.table-responsive::-webkit-scrollbar-thumb:hover {
    background: #a8a8a8;
}

/* Animation for adding/removing table rows */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.table tbody tr {
    animation: fadeIn 0.3s ease;
}

/* Responsive Design */
@media (max-width: 768px) {
    .card-header {
        flex-direction: column;
        gap: 15px;
        align-items: flex-start;
    }
    
    .btn-group {
        width: 100%;
        justify-content: flex-start;
        flex-wrap: wrap;
    }
    
    .filter-row {
        flex-direction: column;
    }
    
    .filter-group {
        width: 100%;
        min-width: auto;
    }
    
    .filter-actions {
        width: 100%;
        justify-content: stretch;
        margin-top: 10px;
    }
    
    .filter-actions .btn {
        flex: 1;
    }
    
    .action-buttons {
        flex-direction: column;
        gap: 3px;
        align-items: center;
    }
    
    .table .btn-sm {
        width: 100%;
        justify-content: center;
    }
    
    .modal-dialog {
        margin: 10px;
    }
    
    .modal-body {
        padding: 15px;
    }
}

@media (max-width: 576px) {
    .col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-6 {
        flex: 0 0 100%;
        max-width: 100%;
    }
    
    .btn {
        width: 100%;
        justify-content: center;
    }
}

/* Icon Styling */
.feather {
    width: 16px;
    height: 16px;
    vertical-align: middle;
}

.feather.icon-home {
    width: 18px;
    height: 18px;
}

.feather.icon-user-plus {
    width: 18px;
    height: 18px;
}

.feather.icon-edit-2 {
    width: 14px;
    height: 14px;
}

.feather.icon-printer {
    width: 14px;
    height: 14px;
}

.feather.icon-trash-2 {
    width: 14px;
    height: 14px;
}

/* Utility Classes */
.mt-3 { margin-top: 15px !important; }
.mt-4 { margin-top: 20px !important; }
.mb-3 { margin-bottom: 15px !important; }
.mb-4 { margin-bottom: 20px !important; }

/* Loading State */
.loading {
    position: relative;
    opacity: 0.7;
    pointer-events: none;
}

.loading::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 20px;
    height: 20px;
    border: 2px solid var(--light-gray);
    border-top: 2px solid var(--primary);
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: translate(-50%, -50%) rotate(0deg); }
    100% { transform: translate(-50%, -50%) rotate(360deg); }
}

  .table-orange {
    background-color: #FFA500 !important;
    /* oranye */
  }
</style>


<!-- [ Main Content ] start -->
<section class="pcoded-main-container">
  <div class="pcoded-wrapper">
    <div class="pcoded-content">
      <div class="pcoded-inner-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
          <div class="page-block">
            <div class="row align-items-center">
              <div class="col-md-12">
                <div class="page-header-title">
                  <!-- <h5 class="m-b-10">Data Barang Keluar</h5> -->
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="feather icon-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="javascript:">Lab/QC</a></li>
                  <li class="breadcrumb-item"><a href="<?= base_url('lab/Alat_kalibrasi') ?>">Alat Kalibrasi</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <div class="main-body">
          <div class="page-wrapper">
            <!-- [ Main Content ] start -->
            <div class="row">
              <!-- [ basic-table ] start -->
              <div class="col-xl-12">
                <div class="card">
                  <div class="card-header">
                    <h5>Daftar Alat Kalibrasi</h5>
                  </div>
                  <div class="card-block table-border-style">

                    <?php
                    // print_r($result);
                    ?>
                    <div class="table-responsive">
                      <table class="table datatable table-hover table-striped table-sm">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Kode Alat</th>
                            <th>Nama Alat</th>
                            <th>No Sertifikat</th>
                            <th>Tanggal Kalibrasi</th>
                            <th>E.D Kalibrasi</th>
                            <th class="text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $today = date("Y-m-d");
                          $level = $this->session->userdata('departement');
                          $jabatan = $this->session->userdata('jabatan');
                          $no = 1;
                          foreach ($result as $k) {
                            $ed = $k['ed_kalibrasi'];  // database sudah Y-m-d
                            if ($k['tgl_kalibrasi'] == null) {
                              $tgl_kalibrasi  = "-";
                            } else {
                              $tgl_kalibrasi =  explode('-', $k['tgl_kalibrasi'])[2] . "/" . explode('-', $k['tgl_kalibrasi'])[1] . "/" . explode('-', $k['tgl_kalibrasi'])[0];
                            }
                            if ($k['ed_kalibrasi'] == null) {
                              $ed_kalibrasi = "-";
                            } else {
                              $ed_kalibrasi =  explode('-', $k['ed_kalibrasi'])[2] . "/" . explode('-', $k['ed_kalibrasi'])[1] . "/" . explode('-', $k['ed_kalibrasi'])[0];
                            }
                          ?>
                            <tr class="table-row">
                              <th scope="row"><?= $no++ ?></th>
                              <td>
                                <span class="btn btn-primary btn-sm btn-square"
                                  data-toggle="modal"
                                  data-target="#view"
                                  data-nama_barang="<?= $k['nama_barang'] ?>"
                                  data-kode_barang="<?= $k['kode_barang'] ?>"
                                  data-id_prc_master_barang="<?= $k['id_prc_master_barang'] ?>">
                                  <?= $k['kode_barang'] ?>
                                </span>
                              </td>
                              <td><?= $k['nama_barang'] ?></td>
                              <td><?= $k['no_sertif'] ?></td>
                              <td><?= $tgl_kalibrasi ?></td>
                              <td class="ed"><?= $ed_kalibrasi ?></td>
                              <td class="text-center">
                                <?php if ($jabatan === "admin" || $jabatan === "operator" || $jabatan === "supervisor") { ?>
                                  <?php if ($k['no_sertif'] == null) :  ?>
                                    <div class="btn-group" role="group">
                                      <button type="button"
                                        class="btn btn-primary btn-square btn-sm"
                                        data-toggle="modal"
                                        data-target="#add"
                                        data-id_prc_master_barang="<?= $k['id_prc_master_barang'] ?>"
                                        data-kode_alat="<?= $k['kode_barang'] ?>"
                                        data-nama_alat="<?= $k['nama_barang'] ?>"> <i class=" feather icon-edit-2"></i> +
                                      </button>
                                    </div>
                                  <?php elseif($ed >= $today): ?>
                                    
                                    <?php else: ?>  
                                      <div class="btn-group" role="group">
                                        <button type="button"
                                          class="btn btn-danger btn-square btn-sm"
                                          data-toggle="modal"
                                          data-target="#renew"
                                          data-tgl_kalibrasi="<?= $tgl_kalibrasi ?>"
                                          data-ed_kalibrasi="<?= $ed_kalibrasi ?>"
                                          data-kode_alat="<?= $k['kode_barang'] ?>"
                                          data-nama_alat="<?= $k['nama_barang'] ?>"
                                          data-id_prc_master_barang="<?= $k['id_prc_master_barang'] ?>">
                                          <i class="feather icon-alert-circle"></i>
                                        </button>
                                      </div>
                                  <?php endif; ?>
                                <?php } ?>
                              </td>
                            </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <!-- [ basic-table ] end -->

            </div>
            <!-- [ Main Content ] end -->
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<script type="text/javascript">
  $(document).ready(function() {

    // INIT DATATABLES (WAJIB)
    let table = $('.datatable').DataTable({
      ordering: true,
      paging: true,
      searching: true,
      info: true
    });

    let toastShown = false; // agar toast tidak muncul berkali-kali


    // ================================
    // FUNGSI HITUNG WARNA TANGGAL
    // ================================
    function warnaTanggalJS(tanggalInput, warnaAman = '#f1f1f1') {
      // parsing dd/mm/YYYY dan normalisasi ke awal hari (00:00)
      const tgl = moment(tanggalInput, "DD/MM/YYYY").startOf('day');
      const now = moment().startOf('day');

      if (!tgl.isValid()) return warnaAman;

      // sekarang akan mengembalikan 0 untuk hari ini, 1 untuk besok, -1 untuk kemarin
      const selisih = tgl.diff(now, "days");
      console.log('selisih hari:', selisih);

      // Pilihan: anggap expired hanya kalau selisih < 0 (kemarin atau lebih lama)
      if (selisih < 0) return "red"; // sudah lewat (expired)
      if (selisih <= 7) return "yellow"; // <= 7 hari
      return warnaAman; // aman (>30 hari)
    }


    // ================================
    // UPDATE ROW COLOR
    // ================================
    function updateRowStatus() {

      $('.table-row').each(function() {
        let tgl = $(this).find('.ed').text().trim();

        if (!tgl || tgl === "-") return;

        let warna = warnaTanggalJS(tgl, "#f1f1f1");

        $(this).removeClass('table-danger table-warning table-orange');

        if (warna === 'red') {
          $(this).addClass('table-danger');
        } else if (warna === 'yellow') {
          $(this).addClass('table-warning');
        } else {
          $(this).css("background-color", warna); // warna aman custom
        }
      });
    }


    // ================================
    // TAMPILKAN TOAST
    // ================================
    function showToastIfNeeded() {

      if (toastShown) return; // agar tidak spam

      if ($('.table-row.table-danger').length > 0) {
        Toastify({
          text: "⚠ Waktu ED Kalibrasi SUDAH HABIS!",
          duration: 5000,
          close: true,
          gravity: "top",
          position: "center",
          style: {
            background: "#BD362F"
          }
        }).showToast();
        toastShown = true;
        return;
      }

      if ($('.table-row.table-warning').length > 0) {
        Toastify({
          text: "⏳ ED Kalibrasi tinggal beberapa hari lagi!",
          duration: 5000,
          close: true,
          gravity: "top",
          position: "center",
          style: {
            background: "#F89406"
          }
        }).showToast();
        toastShown = true;
        return;
      }

      // Kalau semuanya aman
      Toastify({
        text: "✅ Semua alat masih aman!",
        duration: 4000,
        close: true,
        gravity: "top",
        position: "center",
        style: {
          background: "#00CCFF"
        }
      }).showToast();
      toastShown = true;
    }


    // ================================
    // FIRST LOAD
    // ================================
    updateRowStatus();
    showToastIfNeeded();

    // ================================
    // JALAN SAAT DATATABLE DRAW ULANG
    // ================================
    table.on('draw.dt', function() {
      updateRowStatus();
      showToastIfNeeded();
    });

  });
</script>





<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Alat Kalibrasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>lab/Alat_kalibrasi/add">
        <input type="hidden" id="id_prc_master_barang" name="id_prc_master_barang">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="kode_alat">Kode Alat</label>
                <input type="text" class="form-control text-uppercase" id="kode_alat" name="kode_alat" placeholder="Kode Alat" readonly>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="nama_alat">Nama Alat</label>
                <input type="text" class="form-control text-uppercase" id="nama_alat" name="nama_alat" placeholder="Nama Alat" autocomplete="off" readonly>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="no_sertif">No Sertif</label>
                <input type="text" class="form-control text-uppercase" id="no_sertif" name="no_sertif" placeholder="No Sertifikat" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="tgl_kalibrasi">Tanggal Kalibrasi</label>
                <input type="text" class="form-control datepicker" id="tgl_kalibrasi" name="tgl_kalibrasi" placeholder="Tanggal Kalibrasi" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="ed_kalibrasi">E.D Kalibrasi</label>
                <input type="text" class="form-control datepicker" id="ed_kalibrasi" name="ed_kalibrasi" placeholder="E.D Kalibrasi" autocomplete="off" required>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" id="simpan" class="btn btn-primary" onclick="if (! confirm('Apakah Anda Yakin Untuk Menimpan Data Ini? Tolong Untuk Di Check Kembali. Dan Jangan Lupa Untuk Menginputkan Barangnya')) { return false; }">Simpan</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    uppercase('#kode_alat');
    uppercase('#nama_alat');
    uppercase('#no_sertif');

    $('#add').on('show.bs.modal', function(event) {
      var nama_alat = $(event.relatedTarget).data('nama_alat')
      $(this).find('#nama_alat').val(nama_alat);
      var kode_alat = $(event.relatedTarget).data('kode_alat')
      $(this).find('#kode_alat').val(kode_alat);
      var id_prc_master_barang = $(event.relatedTarget).data('id_prc_master_barang')
      $(this).find('#id_prc_master_barang').val(id_prc_master_barang)


      $(this).find('#tgl_kalibrasi').datepicker().on('show.bs.modal', function(event) {
        // prevent datepicker from firing bootstrap modal "show.bs.modal"
        event.stopPropagation();
      });


      $(this).find('#ed_kalibrasi').datepicker().on('show.bs.modal', function(event) {
        // prevent datepicker from firing bootstrap modal "show.bs.modal"
        event.stopPropagation();
      });

    });
  })
</script>



<!-- Modal -->
<div class="modal fade" id="view" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Alat Kalibrasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <form>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="kode_alat">Kode Alat</label>
              <input type="hidden" id="id_kalibrasi" name="id_kalibrasi">
              <input type="text" class="form-control" id="v-kode_alat" name="kode_alat" placeholder="Kode Alat" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="nama_alat">Nama Alat</label>
              <input type="text" class="form-control" id="v-nama_alat" name="nama_alat" placeholder="Nama Alat" autocomplete="off" readonly>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="table-responsive">
            <table class="table table-bordered table-sm">
              <thead>
                <tr>
                  <th class="text-center">No</th>
                  <th class="text-center">E Sertifikat</th>
                  <th class="text-center">Tanggal Kalibrasi</th>
                  <th class="text-center">ED Kalibrasi</th>
                  <th class="text-center">Status Sertif</th>
                </tr>
              </thead>
              <tbody id="v-detail"></tbody>
            </table>
          </div>
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

  <script type="text/javascript">
    $(document).ready(function() {
      $('#view').on('show.bs.modal', function(event) {
        var id_prc_master_barang = $(event.relatedTarget).data('id_prc_master_barang')
        var kode_alat = $(event.relatedTarget).data('kode_barang')
        var nama_alat = $(event.relatedTarget).data('nama_barang')

        $(this).find('#v-kode_alat').val(kode_alat)
        $(this).find('#v-nama_alat').val(nama_alat)

        $.ajax({
        url: "<?= base_url('lab/Alat_kalibrasi/detail_kalibrasi') ?>",
        type: "POST",
        data: {
          id_prc_master_barang: id_prc_master_barang
        },
        dataType: "json",
        success: function(res, i) {
          $('#v-detail').empty()

          let no = 1;
          res.forEach(row => {
            $('#v-detail').append(`
              <tr>
                  <td class="text-center">${no++}</td>
                  <td class="text-center">${row.no_sertif}</td>
                  <td class="text-center">${row.tgl_kalibrasi}</td>
                  <td class="text-center">${row.ed_kalibrasi}</td>
                  <td class="text-center">${row.status_sertif == null ? "Aktif" : row.status_sertif}</td>
              </tr>
            `)
          });
        }
      });
      })
    })
  </script>

  <!-- Modal Edit-->
  <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Alat Kalibrasi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post" action="<?= base_url() ?>lab/Alat_kalibrasi/update">
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="kode_alat">Kode Alat</label>
                  <input type="hidden" id="e-id_kalibrasi" name="id_kalibrasi">
                  <input type="text" class="form-control" id="e-kode_alat" name="kode_alat" placeholder="Kode Alat" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="nama_alat">Nama Alat</label>
                  <input type="text" class="form-control" id="e-nama_alat" name="nama_alat" placeholder="Nama Alat" autocomplete="off" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="no_sertif">No Sertif</label>
                  <input type="text" class="form-control" id="e-no_sertif" name="no_sertif" placeholder="No Sertifikat" autocomplete="off" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="tgl_kalibrasi">Tanggal Kalibrasi</label>
                  <?php
                  if ($jabatan === "supervisor") { ?>
                    <input type="text" class="form-control datepicker" id="e-tgl_kalibrasi" name="tgl_kalibrasi" placeholder="Tanggal Kalibrasi" autocomplete="off" required>
                  <?php } else { ?>
                    <input type="text" class="form-control" id="e-tgl_kalibrasi" name="tgl_kalibrasi" placeholder="Tanggal Kalibrasi" autocomplete="off" readonly>
                  <?php } ?>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="ed_kalibrasi">E.D Kalibrasi</label>
                  <?php if ($jabatan === "supervisor") { ?>
                    <input type="text" class="form-control datepicker" id="e-ed_kalibrasi" name="ed_kalibrasi" placeholder="E.D Kalibrasi" autocomplete="off" required>
                  <?php } else { ?>
                    <input type="text" class="form-control" id="e-ed_kalibrasi" name="ed_kalibrasi" placeholder="E.D Kalibrasi" autocomplete="off" readonly>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" id="simpan" class="btn btn-primary" onclick="if (! confirm('Apakah Anda Yakin Untuk Mengedit Data Ini? Tolong Untuk Di Check Kembali. Dan Jangan Lupa Untuk Menginputkan Barangnya')) { return false; }">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    $('#edit').on('show.bs.modal', function(event) {
      var id_kalibrasi = $(event.relatedTarget).data('id_kalibrasi')
      var kode_alat = $(event.relatedTarget).data('kode_alat')
      var nama_alat = $(event.relatedTarget).data('nama_alat')
      var no_sertif = $(event.relatedTarget).data('no_sertif')
      var tgl_kalibrasi = $(event.relatedTarget).data('tgl_kalibrasi')
      var ed_kalibrasi = $(event.relatedTarget).data('ed_kalibrasi')

      $(this).find('#e-id_kalibrasi').val(id_kalibrasi)
      $(this).find('#e-kode_alat').val(kode_alat)
      $(this).find('#e-nama_alat').val(nama_alat)
      $(this).find('#e-no_sertif').val(no_sertif)
      $(this).find('#e-tgl_kalibrasi').val(tgl_kalibrasi)
      $(this).find('#e-ed_kalibrasi').val(ed_kalibrasi)

      var jabatan = "<?= $jabatan ?>"
      if (jabatan === "supervisor") {
        $(this).find('#e-ed_kalibrasi').datepicker().on('show.bs.modal', function(event) {
          // prevent datepicker from firing bootstrap modal "show.bs.modal"
          event.stopPropagation();
        });
        $(this).find('#e-tgl_kalibrasi').datepicker().on('show.bs.modal', function(event) {
          // prevent datepicker from firing bootstrap modal "show.bs.modal"
          event.stopPropagation();
        });
      }
    });
  })
</script>


<div class="modal fade" id="renew" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Alat Kalibrasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>lab/Alat_kalibrasi/add">
        <input type="hidden" id="r-id_prc_master_barang" name="id_prc_master_barang">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="kode_alat">Kode Alat</label>
                <input type="text" class="form-control text-uppercase" id="r-kode_alat" name="kode_alat" placeholder="Kode Alat" readonly>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="nama_alat">Nama Alat</label>
                <input type="text" class="form-control text-uppercase" id="r-nama_alat" name="nama_alat" placeholder="Nama Alat" autocomplete="off" readonly>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="no_sertif">No Sertif</label>
                <input type="text" class="form-control text-uppercase" id="r-no_sertif" name="no_sertif" placeholder="No Sertifikat" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="tgl_kalibrasi">Tanggal Kalibrasi</label>
                <input type="text" class="form-control datepicker" id="r-tgl_kalibrasi" name="tgl_kalibrasi" placeholder="Tanggal Kalibrasi" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="ed_kalibrasi">E.D Kalibrasi</label>
                <input type="text" class="form-control datepicker" id="r-ed_kalibrasi" name="ed_kalibrasi" placeholder="E.D Kalibrasi" autocomplete="off" required>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" id="simpan" class="btn btn-primary" onclick="if (! confirm('Apakah Anda Yakin Untuk Menimpan Data Ini? Tolong Untuk Di Check Kembali. Dan Jangan Lupa Untuk Menginputkan Barangnya')) { return false; }">Simpan</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    uppercase('#r-kode_alat');
    uppercase('#r-nama_alat');
    uppercase('#r-no_sertif');

    $('#renew').on('show.bs.modal', function(event) {
      var nama_alat = $(event.relatedTarget).data('nama_alat')
      $(this).find('#r-nama_alat').val(nama_alat);
      var kode_alat = $(event.relatedTarget).data('kode_alat')
      $(this).find('#r-kode_alat').val(kode_alat);
      var id_prc_master_barang = $(event.relatedTarget).data('id_prc_master_barang')
      $(this).find('#r-id_prc_master_barang').val(id_prc_master_barang)


      $(this).find('#r-tgl_kalibrasi').datepicker().on('show.bs.modal', function(event) {
        // prevent datepicker from firing bootstrap modal "show.bs.modal"
        event.stopPropagation();
      });


      $(this).find('#r-ed_kalibrasi').datepicker().on('show.bs.modal', function(event) {
        // prevent datepicker from firing bootstrap modal "show.bs.modal"
        event.stopPropagation();
      });

    });
  })
</script>