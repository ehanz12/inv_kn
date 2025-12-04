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
                  <!-- <h5 class="m-b-10">Data Supplier</h5> -->
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="feather icon-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="javascript:">Administrator</a></li>
                  <li class="breadcrumb-item"><a href="<?= base_url('gudang_bahanbaku/gudang_bahan_baku_ppb') ?>">PPB</a></li>
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
                    <h5>Data PPB Administrator</h5>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#add">
                      <i class="feather icon-user-plus"></i>Tambah PPB
                    </button>
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
                            <th>No PPB</th>
                            <th>Tanggal PPB</th>
                            <th>Jenis PPB</th>
                            <th>Status</th>
                            <th class="text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $level = $this->session->userdata('departement');
                          $no = 1;
                          foreach ($result as $k) {
                            $tgl_ppb =  explode('-', $k['tgl_ppb'])[2] . "/" . explode('-', $k['tgl_ppb'])[1] . "/" . explode('-', $k['tgl_ppb'])[0];
                            $tgl_pakai =  explode('-', $k['tgl_pakai'])[2] . "/" . explode('-', $k['tgl_pakai'])[1] . "/" . explode('-', $k['tgl_pakai'])[0];
                          ?>
                            <tr>
                              <th scope="row"><?= $no++ ?></th>
                              <td><?= $k['no_ppb'] ?></td>
                              <td><?= $tgl_ppb ?></td>
                              <td><?= $k['jenis_ppb'] ?></td>
                              <td>
                                <?= $k['status'] ?></td>
                              <td class="text-center">
                                <?php if ($level === "admin" && $k['acc_spv'] == null) { ?>
                                  <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-info btn-square btn-sm"
                                      data-toggle="modal"
                                      data-target="#edit"
                                      data-no_ppb="<?= $k['no_ppb'] ?>"
                                      data-departement="<?= $k['departement'] ?>"
                                      data-jenis_form_ppb="<?= $k['jenis_form_ppb'] ?>"
                                      data-jenis_ppb="<?= $k['jenis_ppb'] ?>"
                                      data-tgl_ppb="<?= $tgl_ppb ?>"
                                      data-tgl_pakai="<?= $tgl_pakai ?>"
                                      data-ket="<?= $k['ket'] ?>">
                                      <i class="feather icon-edit-2"></i>Edit
                                    </button>
                                  </div>
                                  <div class="btn-group" role="group" aria-label="Basic example">
                                    <a type="button" class="btn btn-success btn-square text-light btn-sm" href="<?= base_url() ?>administrator/ppb/cetak/<?= $k['no_ppb'] ?>">
                                      <i class="feather icon-printer"></i>Cetak
                                    </a>
                                  </div>
                                  <div class="btn-group" role="group" aria-label="Basic example">
                                    <a type="button" class="btn btn-danger btn-square text-light btn-sm" href="<?= base_url() ?>ppb/ppb/delete/<?= $k['no_ppb'] ?>" onclick="if (! confirm('Apakah Anda Yakin?')) { return false; }">
                                      <i class="feather icon-trash-2"></i>Hapus
                                    </a>
                                  </div>
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
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script type="text/javascript">
  $(document).ready(function() {
    $('#export').click(function() {
      var filter_tgl = $('#filter_tgl').val();
      var filter_tgl2 = $('#filter_tgl2').val();
      if (filter_tgl == '' || filter_tgl2 == '') {
        alert('Pilih kedua tanggal untuk menampilkan data.');
      } else {
        var url = "<?= base_url() ?>laporan_barang_stok/pdf_laporan_barang_stok/" + filter_tgl.split("/")[2] + "-" + filter_tgl.split("/")[1] + "-" + filter_tgl.split("/")[0] + "/" + filter_tgl2.split("/")[2] + "-" + filter_tgl2.split("/")[1] + "-" + filter_tgl2.split("/")[0];
        window.open(url, 'pdf_laporan_barang_stok', 'location=yes,height=700,width=1300,scrollbars=yes,status=yes');
      }
    });

    $('#lihat').click(function() {
      var filter_tgl = $('#filter_tgl').val();
      var filter_tgl2 = $('#filter_tgl2').val();
      if (filter_tgl == '' || filter_tgl2 == '') {
        alert('Pilih kedua tanggal untuk melihat data.');
      } else {
        window.location.href = "<?= base_url() ?>Account/Account_ppbfilter_tg=" + filter_tgl + "&filter_tgl2=" + filter_tgl2;
      }
    });
  });
</script>

<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5>Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
      </div>
      <form method="post" action="<?= base_url() ?>ppb/ppb/add">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label for="jenis_ppb">Budget/Non Budget</label>
                <select class="form-control chosen-select" id="jenis_ppb" name="jenis_ppb" required onchange="toggleDirekturField()">
                  <option value="jenis_ppb" disabled selected hidden>- Pilih Budget/Non Budget -</option>
                  <option value="Budget">Budget</option>
                  <option value="Non-Budget">Non Budget</option>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="form_ppb">Form A/C</label>
                <select class="form-control chosen-select" id="form_ppb" name="form_ppb" required>
                  <option value="" disabled selected hidden>- Pilih Form A/C -</option>
                  <option value="FormA">FormA</option>
                  <option value="FormC">FormC</option>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="level">Departement</label>
                <select class="form-control chosen-select" id="level" name="departement" autocomplete="off" required>
                  <option value="" disabled selected hidden> - Pilih Departement - </option>
                  <option value="admin">Admin</option>
                  <option value="Accounting">Accounting</option>
                  <option value="Gudang Bahan Baku">Gudang Bahan Baku</option>
                  <option value="Gudang Distribusi">Gudang Distribusi</option>
                  <option value="Lab">Lab</option>
                  <option value="Melting">Melting</option>
                  <option value="Marketing">Marketing</option>
                  <option value="Packing">Packing</option>
                  <option value="Utility">Utility</option>
                  <option value="stockkeeper">Stock Keeper</option>
                  <option value="ppic">PPIC</option>
                  <option value="forming">Forming</option>
                  <option value="finishing">Finishing</option>
                  <option value="maintenance">Maintenance</option>
                  <option value="workshop">Workshop</option>
                </select>

              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="no_ppb">No PPB</label>
                <input type="text" class="form-control" id="no_ppb" name="no_ppb" maxlength="20" placeholder="No PPB" aria-describedby="validationServer03Feedback" autocomplete="off" required>
                <div id="validationServer03Feedback" class="invalid-feedback">
                  Maaf Nomor PPB sudah ada.
                </div>
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="tgl_ppb">Tanggal PPB</label>
                <input type="text" class="form-control datepicker" id="tgl_ppb" name="tgl_ppb" placeholder="Tanggal PPB" autocomplete="off" required>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label for="kode_barang">Pilih Barang</label>
                <select class="form-control chosen-select" id="kode_barang_add" name="kode_barang_add" required>
                  <option disabled selected hidden value="">-Pilih Barang-</option>
                  <?php foreach ($res_barang as $s) { ?>
                    <option
                      data-satuan="<?= $s['satuan'] ?>"
                      data-spek="<?= $s['spek'] ?>"
                      data-nama="<?= $s['nama_barang'] ?>"
                      data-stok="<?= $s['stok'] ?>"
                      value="<?= $s['kode_barang'] ?>,<?= $s['nama_barang'] ?>,<?= $s['id_prc_master_barang'] ?>">
                      <?= $s['kode_barang'] ?> | <?= $s['nama_barang'] ?>
                    </option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="spek">Spek</label>
                <input type="text" class="form-control" id="spek" name="spek" placeholder="Spek" autocomplete="off" readonly>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="satuan">Satuan</label>
                <input type="text" class="form-control" id="satuan" name="satuan" placeholder="Unit" autocomplete="off" readonly>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="Stok">Stok</label>
                <input type="text" class="form-control" id="stok" name="stok" placeholder="stok" maxlength="15" autocomplete="off" readonly>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="Stok">No Budget</label>
                <input type="text" class="form-control" id="no_budget" name="no_budget" placeholder="No Budget" maxlength="15" autocomplete="off" readonly>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="jumlah">Jumlah Order</label>
                <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah" autocomplete="off" aria-describedby="validationServer03Feedback" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required>
                <div id="validationServer03Feedback" class="invalid-feedback">
                  Maaf Jumlah tidak boleh lebih dari Stock.
                </div>
              </div>
            </div>

            <!-- Tombol Input -->
            <div class="col-md-1 text-right">
              <a href="javascript:void(0)" id="input" class="btn btn-primary" style="margin-top: 31px;">
                <b class="text">Input</b>
              </a>
            </div>
          </div>

          <div class="table-responsive">
            <table class="table table-bordered table-sm">
              <thead>
                <tr>
                  <th>Kode Barang</th>
                  <th>Nama Barang</th>
                  <th>Spek</th>
                  <th>Satuan</th>
                  <th>Stok</th>
                  <th>No Budget</th>
                  <th>Jumlah Order</th>
                  <th class="text-right">Hapus</th>
                </tr>
              </thead>
              <tbody id="insert_batch">
              </tbody>
            </table>
          </div>

          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label for="tgl_pakai">Tanggal Kebutuhan</label>
                <input type="text" class="form-control datepicker" id="tgl_pakai" name="tgl_pakai" placeholder="Tanggal Kebutuhan" autocomplete="off" required>
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="ket">Keterangan</label>
                <input type="text" class="form-control" id="ket" name="ket" placeholder="Keterangan" autocomplete="off" required>
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="nama_admin">Nama Admin</label>
                <input type="text" class="form-control" id="nama_admin" name="nama_admin" value="<?= $this->session->userdata('nama_operator') ?>" maxlength="20" readonly>
              </div>
            </div>


            <input type="hidden" id="jumlah_batch" name="jumlah_batch" value="1">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
      </form>
    </div>
  </div>
</div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    // Ketika kode_barang_add berubah (barang dipilih)
    $('#kode_barang_add').on('change', function() {
      const selected = $(this).find(':selected');
      const satuan = selected.attr('data-satuan');
      const spek = selected.attr('data-spek');
      const nama_barang = selected.attr('data-nama_barang');
      const stok = selected.attr('data-stok');

      $('#satuan').val(satuan).prop('readonly', true);
      $('#spek').val(spek).prop('readonly', true);
      $('#stok').val(stok).prop('readonly', true);
      $('#nama_barang_add').val(nama_barang);
    });

    $('#kode_barang_add').on('change', function() {
      if ($(this).val() === "") {
        $('#satuan').val("").prop('readonly', false);
        $('#spek').val("").prop('readonly', false);
        $('#stok').val("").prop('readonly', false);
        $('#nama_barang_add').val("");
      }
    });


    // Fungsi untuk toggle Nama Direktur field visibility
    function toggleDirekturField() {
      const jenis_ppbValue = $('#jenis_ppb').val();
      if (jenis_ppbValue === 'Non-Budget') { // If "Non Budget" is selected
        $('#nama_direktur_div').show();
      } else { // If "Budget" is selected
        $('#nama_direktur_div').hide();
      }
    }
    // Call the function when the dropdown value changes
    $('#jenis_ppb').on('change', toggleDirekturField);
    // Trigger the function on page load to set initial state
    toggleDirekturField();
    // Input button to add items to table
    $('#input').on('click', function() {
      const kode = $('#kode_barang_add').val();
      const kode_barang = kode.split(",")[0];
      const nama_barang = kode.split(",")[1];
      const spek = $('#spek').val();
      const satuan = $('#satuan').val();
      const unit = $('#unit').val();
      const jumlah = $('#jumlah').val();
      const stok = $('#stok').val();
      const nextform = Date.now();
      const no_batch = 'Batch-' + nextform;
      const id_prc_master_barang = kode.split(",")[2];

      $('#insert_batch').append(`
            <tr id="tr_${nextform}">
            <input type="hidden" name="kode_barang[]" value="${kode_barang}">
            <input type="hidden" name="nama_barang[]" value="${nama_barang}">
            <input type="hidden" name="spek[]" value="${spek}">
            <input type="hidden" name="satuan[]" value="${satuan}">
            <input type="hidden" name="jumlah[]" value="${jumlah}">
            <input type="hidden" name="id_prc_master_barang[]" value="${id_prc_master_barang}">

            <td>${kode_barang}</td>
            <td>${nama_barang}</td> <!-- Nama Barang -->
            <td>${spek}</td>
            <td>${satuan}</td>
            <td>${stok}</td>
            <td></td>
            <td>${jumlah}</td>
            <td class="text-right">
              <a href="javascript:void(0)" class="text-danger btn-remove-row">
                <i class="feather icon-trash-2"></i>
              </a>
            </td>
            </tr>
        `);

      // Fungsi untuk menghapus baris
    });
    // ketika tombol hapus di-klik, hapus barisnya
    $(document).on('click', '.btn-remove-row', function() {
      $(this).closest('tr').remove();
    });



    $("#no_ppb").keyup(function() {
      var no_ppb = $("#no_ppb").val();
      jQuery.ajax({
        url: "<?= base_url() ?>ppb/ppb/cek_no_ppb/",
        dataType: 'text',
        type: "post",
        data: {
          no_ppb: no_ppb
        },
        success: function(response) {
          if (response == "true") {
            $("#no_ppb").addClass("is-invalid");
            $("#simpan").attr("disabled", "disabled");
          } else {
            $("#no_ppb").removeClass("is-invalid");
            $("#simpan").removeAttr("disabled");
          }
        }
      });

      function remove(id) {
        $('#tr_' + id).remove();
      }
    })
  })
</script>
<!-- Modal Edit -->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit PPB</h5>
        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
      </div>

      <form method="post" action="<?= base_url('ppb/ppb/update') ?>">
        <div class="modal-body">

          <!-- ===== INFO UMUM ===== -->
          <div class="row">
            <div class="col-md-3">
              <label>Budget/Non Budget</label>
              <select class="form-control chosen-select" id="e-jenis_ppb" name="jenis_ppb" required>
                <option value="" disabled selected hidden>- Pilih Budget/Non Budget -</option>
                <option value="Budget">Budget</option>
                <option value="Non-Budget">Non Budget</option>
              </select>
            </div>
            <div class="col-md-3">
              <label>Form A/C</label>
              <select class="form-control chosen-select" id="e-form_ppb" name="form_ppb" required>
                <option value="" disabled selected hidden>- Pilih Form A/C -</option>
                <option value="FormA">FormA</option>
                <option value="FormC">FormC</option>
              </select>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="level">Departement</label>
                <select class="form-control chosen-select" id="e-departement" name="departement" autocomplete="off" required>
                  <option value="" disabled selected hidden> - Pilih Departement - </option>
                  <option value="admin">Admin</option>
                  <option value="accounting">Accounting</option>
                  <option value="gudang_bahan_baku">Gudang Bahan Baku</option>
                  <option value="gudang_distribusi">Gudang Distribusi</option>
                  <option value="lab">Lab</option>
                  <option value="melting">Melting</option>
                  <option value="marketing">Marketing</option>
                  <option value="packing">Packing</option>
                  <option value="utility">Utility</option>
                  <option value="stockkeeper">Stock Keeper</option>
                  <option value="ppic">PPIC</option>
                  <option value="forming">Forming</option>
                  <option value="finishing">Finishing</option>
                  <option value="maintenance">Maintenance</option>
                  <option value="workshop">Workshop</option>
                </select>

              </div>
            </div>
            <div class="col-md-3">
              <label>No PPB</label>
              <input type="text" class="form-control" id="e-no_ppb" name="no_ppb" readonly>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="tgl_ppb">Tanggal PPB</label>
                <input type="text" class="form-control" id="e-tgl_ppb" name="tgl_ppb" placeholder="Tanggal PPB" autocomplete="off" required>
              </div>
            </div>
          </div>

          <!-- ===== PILIH BARANG ===== -->
          <div class="row mt-3">
            <div class="col-md-3">
              <label>Pilih Barang</label>
              <select class="form-control chosen-select" id="e-kode_barang" name="kode_barang_add">
                <option disabled selected hidden>- Pilih Barang -</option>
                <?php foreach ($res_barang as $s) { ?>
                  <option
                    data-satuan="<?= $s['satuan'] ?>"
                    data-spek="<?= $s['spek'] ?>"
                    data-nama="<?= $s['nama_barang'] ?>"
                    data-stok="<?= $s['stok'] ?>"
                    value="<?= $s['kode_barang'] ?>,<?= $s['nama_barang'] ?>,<?= $s['id_prc_master_barang'] ?>">
                    <?= $s['kode_barang'] ?> | <?= $s['nama_barang'] ?>
                  </option>
                <?php } ?>
              </select>
            </div>

            <div class="col-md-2">
              <label>Spek</label>
              <input type="text" class="form-control" id="e-spek" readonly>
            </div>

            <div class="col-md-2">
              <label>Satuan</label>
              <input type="text" class="form-control" id="e-satuan" readonly>
            </div>
            <div class="col-md-2">
              <label>Stok</label>
              <input type="text" class="form-control" id="e-stok" readonly>
            </div>

            <div class="col-md-2">
              <label>Jumlah Order</label>
              <input type="number" class="form-control" id="e-jumlah" placeholder="Jumlah" aria-describedby="validationServer03Feedback" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required">
              <div id="validationServer03Feedback" class="invalid-feedback">
                Maaf Jumlah tidak boleh lebih dari Stock.
              </div>
            </div>

            <div class="col-md-2 text-right">
              <a href="javascript:void(0)" style="cursor: pointer;" class="btn btn-primary mt-4" id="e-add-item">
                <i class="feather icon-plus"></i> Tambah
              </a>
            </div>
          </div>

          <!-- ===== TABEL BARANG ===== -->
          <div class="table-responsive mt-3">
            <table class="table table-bordered table-sm">
              <thead>
                <tr>
                  <th>Kode Barang</th>
                  <th>Nama Barang</th>
                  <th>Spek</th>
                  <th>Satuan</th>
                  <th>Jumlah</th>
                  <th>Stok</th>
                  <th width="60">Hapus</th>
                </tr>
              </thead>
              <tbody id="e-ppb_barang_det"></tbody>
            </table>
          </div>

          <!-- ===== INFO TAMBAHAN ===== -->
          <div class="row mt-3">
            <div class="col-md-3">
              <label>Tanggal Kebutuhan</label>
              <input type="text" class="form-control" id="e-tgl_pakai" name="tgl_pakai">
            </div>
            <div class="col-md-3">
              <label>Keterangan</label>
              <input type="text" class="form-control" id="e-ket" name="ket">
            </div>
            <div class="col-md-3">
              <label>Nama Admin</label>
              <input type="text" class="form-control" id="e-nama_admin" name="nama_admin" value="<?= $this->session->userdata("nama_operator") ?>" readonly>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" onclick="return confirm('yakin mengupdate data ini silahkan cek kembali form !')">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>


<script type="text/javascript">
  $(document).ready(function() {

    // ========== LOAD DATA SAAT MODAL DIBUKA ==========
    $(document).on('show.bs.modal', '#edit', function(event) {
      var btn = $(event.relatedTarget);
      var no_ppb = btn.data('no_ppb');
      var jenis_ppb = btn.data('jenis_ppb');
      var form_ppb = btn.data('jenis_form_ppb');
      var dept = btn.data('departement');
      var tgl_ppb = btn.data('tgl_ppb');
      var tgl_pakai = btn.data('tgl_pakai');
      var ket = btn.data('ket');

      var modal = $(this);
      modal.find('#e-no_ppb').val(no_ppb);
      modal.find('#e-jenis_ppb').val(jenis_ppb).trigger('chosen:updated');
      modal.find('#e-form_ppb').val(form_ppb).trigger('chosen:updated');
      modal.find('#e-departement').val(dept);
      modal.find('#e-departement').trigger('chosen:updated');
      modal.find('#e-tgl_ppb').val(tgl_ppb);
      modal.find('#e-tgl_pakai').val(tgl_pakai);
      modal.find('#e-ket').val(ket);

      var $tbody = modal.find('#e-ppb_barang_det');
      $tbody.empty();

      $.ajax({
        url: "<?= base_url('ppb/ppb/data_ppb_barang') ?>",
        type: "POST",
        dataType: "json",
        data: {
          no_ppb: no_ppb
        },
        success: function(res) {
          if (res.length > 0) {
            res.forEach(item => {
              $tbody.append(rowHTML(item.kode_barang, item.nama_barang, item.spek, item.satuan, item.jumlah_ppb, item.id_prc_master_barang, item.stok));
            });
          } else {
            $tbody.html(`<tr><td colspan="7" class="text-center text-muted">Tidak ada data barang</td></tr>`);
          }
        }
      });
    });

    // ========== FUNGSI BUAT ROW ==========
    function rowHTML(kode, nama, spek, satuan, jumlah, id, stok) {
      return `
      <tr>
        <td><input type="hidden" name="kode_barang[]" value="${kode}">${kode}</td>
        <td><input type="hidden" name="nama_barang[]" value="${nama}">${nama}</td>
        <td><input type="hidden" name="spek[]" value="${spek}">${spek}</td>
        <td><input type="hidden" name="satuan[]" value="${satuan}">${satuan}</td>
        <input type="hidden" name="id_prc_master_barang[]" value="${id}">
        <td><input type="number" class="form-control" name="jumlah[]" value="${jumlah}"></td>
        <td>${stok}</td>
        <td class="text-center">
          <a href="javascript:void(0)" class="btn btn-sm btn-danger btn-remove-row">
            <i class="feather icon-trash-2"></i>
          </a>
        </td>
      </tr>
    `;
    }


    // ========== SAAT PILIH BARANG BARU ==========
    $('#e-kode_barang').on('change', function() {
      const selected = $(this).find(':selected');
      $('#e-spek').val(selected.data('spek'));
      $('#e-satuan').val(selected.data('satuan'));
      $('#e-stok').val(selected.data('stok'));
    });

    // ========== TAMBAH BARANG BARU ==========
    $('#e-add-item').on('click', function() {
      const val = $('#e-kode_barang').val();
      if (!val) return alert('Pilih barang dulu');

      const [kode, nama, id] = val.split(',');
      const spek = $('#e-spek').val();
      const satuan = $('#e-satuan').val();
      const jumlah = $('#e-jumlah').val();
      const stok = $('#e-stok').val();

      if (!jumlah || jumlah <= 0) return alert('Isi jumlah dengan benar');

      $('#e-ppb_barang_det').append(rowHTML(kode, nama, spek, satuan, jumlah, id, stok));
      // reset input
      $('#e-kode_barang').val('').trigger('chosen:updated');
      $('#e-spek').val('');
      $('#e-satuan').val('');
      $('#e-jumlah').val('');
      $('#e-stok').val('');
    });

    // ========== HAPUS BARIS ==========
    $(document).on('click', '.btn-remove-row', function() {
      $(this).closest('tr').remove();
    });
  });
</script>