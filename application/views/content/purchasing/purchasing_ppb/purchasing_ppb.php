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

<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

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
                  <!-- <h5 class="m-b-10">Data Barang Masuk</h5> -->
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="feather icon-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="javascript:">Purchasing</a></li>
                  <li class="breadcrumb-item"><a href="javascript:">Purchasing PPB</a></li>
                  <li class="breadcrumb-item"><a href="<?= base_url('Purchasing/Purchasing_ppb') ?>">PPB</a></li>
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
                    <h5>Data PPB</h5>
                    <div class="float-right">
                      <div class="input-group">
                       <input type="text" id="filter_tgl" value="<?= $tgl == null ? '' : $tgl ?>" class="form-control datepicker" placeholder="Filter Dari Tanggal" autocomplete="off" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <input type="text" id="filter_tgl2" value="<?= $tgl2 == null ? '' : $tgl2 ?>" class="form-control datepicker" placeholder="Filter Sampai Tanggal" autocomplete="off" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <select id="filter_departement" class="form-control ml-2">
                          <option value=""> Semua Departement </option>
                          <?php foreach ($departement_list as $d) { ?>
                            <option value="<?= $d['departement'] ?>"
                              <?= ($departement_filter == $d['departement'] ? 'selected' : '') ?>>
                              <?= $d['departement'] ?>
                            </option>
                          <?php } ?>
                        </select>
                        
                        <!-- Tombol Lihat -->
                        <div class="btn-group ml-2">
                          <button class="btn btn-primary btn-sm" id="lihat" type="button">
                            <i class="feather icon-filter"></i> Filter
                          </button>
                        </div>
                        
                        <!-- Tombol Reset -->
                        <div class="btn-group ml-1">
                          <a href="<?= base_url() ?>Purchasing/Purchasing_ppb/Purchasing_ppb" style="width: 40px;" class="btn btn-warning btn-sm" title="Reset Filter">
                            <i class="feather icon-refresh-ccw"></i>
                          </a>
                        </div>
                        
                        <!-- Tombol Update Status -->
                        <!-- <div class="btn-group ml-2">
                          <a href="<?= base_url('Purchasing/Purchasing_ppb/Purchasing_ppb/update_status') ?>" 
                             class="btn btn-info btn-sm" title="Update Status Otomatis">
                            <i class="feather icon-refresh-cw"></i> Update Status
                          </a>
                        </div>
                      </div> -->
                    </div>
                    <br><br>
                  </div>
                  <div class="card-block table-border-style">
                    <div class="table-responsive">
                      <table class="table datatable table-bordered table-hover table-striped table-sm">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Tanggal</th>
                            <th>No PPB</th>
                            <th class="text-center">Departement</th>
                            <th class="text-center">Outstanding</th>
                            
                            <th class="text-center">Status</th>
                            <th class="text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $level = $this->session->userdata('departement');
                          $jabatan = $this->session->userdata('jabatan');
                          $no = 1;
                          foreach ($result as $k) {
                            $tgl_ppb =  explode('-', $k['tgl_ppb'])[2] . "/" . explode('-', $k['tgl_ppb'])[1] . "/" . explode('-', $k['tgl_ppb'])[0];
                            $tgl_pakai =  explode('-', $k['tgl_pakai'])[2] . "/" . explode('-', $k['tgl_pakai'])[1] . "/" . explode('-', $k['tgl_pakai'])[0];
                            
                            // Hitung outstanding untuk PPB ini
                            $outstanding_data = $this->M_purchasing_ppb->get_outstanding_status($k['no_ppb']);
                            $total_outstanding = $outstanding_data['total_outstanding'];
                            $is_completed = $outstanding_data['is_completed'];
                            
                            // Status outstanding
                            $outstanding_status = 'success';
                            $outstanding_text = 'Lunas';
                            if ($total_outstanding > 0) {
                                $outstanding_status = 'warning';
                                $outstanding_text = number_format($total_outstanding);
                            }
                          ?>
                            <tr>
                              <th scope="row"><?= $no++ ?></th>
                              <td><?= $tgl_ppb ?></td>
                              <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <button type="button" class="btn btn-info btn-square btn-sm" data-toggle="modal" data-target="#detail"
                                    data-no_ppb="<?= $k['no_ppb'] ?>" 
                                    data-departement="<?= $k['departement'] ?>" 
                                    data-form_ppb="<?= $k['jenis_form_ppb'] ?>" 
                                    data-jenis_ppb="<?= $k['jenis_ppb'] ?>" 
                                    data-tgl_ppb="<?= $tgl_ppb ?>" 
                                    data-tgl_pakai="<?= $tgl_pakai ?>" 
                                    data-ket="<?= $k['ket'] ?>">
                                    <i class="feather icon-eye"></i><?= $k['no_ppb'] ?>
                                  </button>
                                </div>
                              </td>
                              <td class="text-center"><?= $k['departement'] ?></td>
                              
                              <!-- Kolom Outstanding -->
                              <td class="text-center">
                                <span class="badge badge-<?= $outstanding_status ?>">
                                  <?= $outstanding_text ?> 
                                </span>
                              </td>

                              

                              <td class="text-center">
                                <?php 
                                if ($is_completed) {
                                    echo '<span class="badge badge-success">Selesai</span>';
                                } else {
                                    echo '<span class="badge badge-warning">Proses</span>';
                                    echo '<br><small class="text-muted">Outstanding: ' . number_format($total_outstanding) . '</small>';
                                }
                                ?>
                              </td>

                              <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <a type="button" class="btn btn-success btn-square btn-sm text-light" onclick="window.open(`<?= base_url() ?>accounting/accounting_ppb/pdf_cetak/<?= str_replace('/', '--', $k['no_ppb']) ?>`, 'location=yes,height=700,width=1300,scrollbars=yes,status=yes'); "
                                    data-id_prc_ppb_tf="<?= $k['id_prc_ppb_tf'] ?>"
                                    data-form_ppb="<?= $k['jenis_form_ppb'] ?>"
                                    data-jenis_ppb="<?= $k['jenis_ppb'] ?>"
                                    data-tgl_ppb="<?= $k['tgl_ppb'] ?>"
                                    data-tgl_pakai="<?= $k['tgl_pakai'] ?>"
                                    data-ket="<?= $k['ket'] ?>">
                                    <i class="feather icon-file"></i>Cetak
                                  </a>
                                </div>

                                <?php if ($level === "admin" && $k['acc_spv'] !== "Approved" && $k['acc_manager'] !== "Approved" && $k['acc_pm'] !== "Approved") { ?>
                                  <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-primary btn-square btn-sm" data-toggle="modal" data-target="#edit"
                                      data-no_ppb="<?= $k['no_ppb'] ?>"
                                      data-departement="<?= $k['departement'] ?>"
                                      data-form_ppb="<?= $k['jenis_form_ppb'] ?>"
                                      data-jenis_ppb="<?= $k['jenis_ppb'] ?>"
                                      data-tgl_ppb="<?= $tgl_ppb ?>"
                                      data-tgl_pakai="<?= $tgl_pakai ?>"
                                      data-ket="<?= $k['ket'] ?>">
                                      <i class="feather icon-edit-2"></i>Edit
                                    </button>
                                  </div>
                                  <div class="btn-group" role="group" aria-label="Basic example">
                                    <a type="button" class="btn btn-danger btn-square text-light btn-sm" href="<?= base_url() ?>Accounting/Accounting_ppb/delete/<?= str_replace('/', '--', $k['no_ppb']) ?>" onclick="if (! confirm('Apakah Anda Yakin?')) { return false; }">
                                      <i class="feather icon-trash-2"></i>Delete
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
    // Inisialisasi datepicker
    $('.datepicker').datepicker({
      format: 'dd/mm/yyyy',
      autoclose: true
    });

    // Fungsi filter
    $('#lihat').click(function() {
     var filter_tgl = $('#filter_tgl').val();
      var filter_tgl2 = $('#filter_tgl2').val();
      var filter_departement = $('#filter_departement').val();

      // Validasi tanggal
      if (filter_tgl === '' && filter_tgl2 !== '') {
        alert("Dari tanggal belum diisi");
       
      } else if (filter_tgl !== '' && filter_tgl2 === '') {
        alert("Sampai tanggal belum diisi");
        return false;
      }

      // Format tanggal untuk URL
     
      var newFilterTgl = filter_tgl.split("/")[2] + "-" + filter_tgl.split("/")[1] + "-" + filter_tgl.split("/")[0];
      var newFilterTgl2 = filter_tgl2.split("/")[2] + "-" + filter_tgl2.split("/")[1] + "-" + filter_tgl2.split("/")[0];
      
      if (filter_tgl !== '') {
        var tglParts = filter_tgl.split("/");
        newFilterTgl = tglParts[2] + "-" + tglParts[1] + "-" + tglParts[0];
      }
      
      if (filter_tgl2 !== '') {
        var tgl2Parts = filter_tgl2.split("/");
        newFilterTgl2 = tgl2Parts[2] + "-" + tgl2Parts[1] + "-" + tgl2Parts[0];
      }

      // Build URL dengan parameter
      var url = "<?= base_url() ?>purchasing/purchasing_ppb/purchasing_ppb/index?";
      var params = [];
      
      if (newFilterTgl !== '') {
        params.push('date_from=' + encodeURIComponent(newFilterTgl));
      }
      
      if (newFilterTgl2 !== '') {
        params.push('date_until=' + encodeURIComponent(newFilterTgl2));
      }
      
      if (filter_departement !== '') {
        params.push('departement=' + encodeURIComponent(filter_departement));
      }
      
      window.location = url + params.join('&');
    });

    // Auto refresh status setiap 30 detik
    setInterval(function() {
      $.get("<?= base_url('Purchasing/Purchasing_ppb/Purchasing_ppb/update_status_otomatis') ?>", function(response) {
        // Optional: Bisa tambahkan notifikasi jika perlu
      });
    }, 30000); // 30 detik
  });
</script>

<!-- Modal Details -->
<div class="modal fade" id="detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Data PPB - <span id="v-no-ppb-title"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="v-jenis_ppb">Jenis PPB</label>
              <input type="text" class="form-control" id="v-jenis_ppb" readonly>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="v-form_ppb">Form A/C</label>
              <input type="text" class="form-control" id="v-form_ppb" readonly>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="v-departement">Departement</label>
              <input type="text" class="form-control" id="v-departement" readonly>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="v-tgl_ppb">Tanggal PPB</label>
              <input type="text" class="form-control" id="v-tgl_ppb" readonly>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="v-tgl_pakai">Tanggal Kebutuhan</label>
              <input type="text" class="form-control" id="v-tgl_pakai" readonly>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="v-ket">Keterangan</label>
              <input type="text" class="form-control" id="v-ket" readonly>
            </div>
          </div>
        </div>
        
        <div class="table-responsive">
          <table class="table table-bordered table-sm">
            <thead class="bg-light-info">
              <tr>
                <th class="text-center">#</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Spek</th>
                <th>Supplier</th>
                <th class="text-center">Jumlah Awal</th>
                <th class="text-center">Jumlah Diterima</th>
                <th class="text-center">Outstanding</th>
                <th class="text-center">Satuan</th>
              </tr>
            </thead>
            <tbody id="v-ppb_barang">
              <tr>
                <td colspan="9" class="text-center text-muted">Memuat data...</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('#detail').on('show.bs.modal', function(event) {
      var jenis_ppb = $(event.relatedTarget).data('jenis_ppb')
      var form_ppb = $(event.relatedTarget).data('form_ppb')
      var departement = $(event.relatedTarget).data('departement')
      var no_ppb = $(event.relatedTarget).data('no_ppb')
      var tgl_ppb = $(event.relatedTarget).data('tgl_ppb')
      var tgl_pakai = $(event.relatedTarget).data('tgl_pakai')
      var ket = $(event.relatedTarget).data('ket')

      $(this).find('#v-jenis_ppb').val(jenis_ppb)
      $(this).find('#v-form_ppb').val(form_ppb)
      $(this).find('#v-departement').val(departement)
      $(this).find('#v-tgl_ppb').val(tgl_ppb)
      $(this).find('#v-tgl_pakai').val(tgl_pakai)
      $(this).find('#v-ket').val(ket)
      $(this).find('#v-no-ppb-title').text(no_ppb)

      // Tampilkan loading
      $('#v-ppb_barang').html('<tr><td colspan="9" class="text-center text-muted">Memuat data...</td></tr>');

      jQuery.ajax({
        url: "<?= base_url() ?>purchasing/purchasing_ppb/purchasing_ppb/data_ppb_barang",
        dataType: 'json',
        type: "post",
        data: {
          no_ppb: no_ppb
        },
        success: function(response) {
          var data = response;
          var $id = $('#v-ppb_barang');
          $id.empty();

          if (data.length === 0) {
            $id.append('<tr><td colspan="9" class="text-center text-muted">Tidak ada data barang</td></tr>');
          } else {
            for (var i = 0; i < data.length; i++) {
              var jumlahAwal = parseFloat(data[i].jumlah_ppb) || 0;
              var jumlahDiterima = parseFloat(data[i].jml_bm) || 0;
              var outstanding = jumlahAwal - jumlahDiterima;
              
              var outstandingBadge = outstanding > 0 ? 
                '<span class="badge badge-warning">' + outstanding.toLocaleString() + '</span>' :
                '<span class="badge badge-success">Lunas</span>';

              $id.append(`
                <tr>
                  <td class="text-center">${i + 1}</td>
                  <td>${data[i].kode_barang || '-'}</td>
                  <td>${data[i].nama_barang || '-'}</td>
                  <td>${data[i].spek || '-'}</td>
                  <td>${data[i].nama_supplier || '-'}</td> 
                  <td class="text-center"><span class="badge badge-primary">${jumlahAwal.toLocaleString()}</span></td>
                  <td class="text-center"><span class="badge badge-success">${jumlahDiterima.toLocaleString()}</span></td>
                  <td class="text-center">${outstandingBadge}</td>
                  <td class="text-center">${data[i].satuan || '-'}</td>
                </tr>
              `);
            }
          }
        },
        error: function() {
          $('#v-ppb_barang').html('<tr><td colspan="9" class="text-center text-danger">Gagal memuat data</td></tr>');
        }
      });
    });
  });
</script>