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
                                    <!-- <h5 class="m-b-10">Data Barang Masuk</h5> -->
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="feather icon-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="javascript:">Lab/QC</a></li>
                                    <li class="breadcrumb-item"><a href="<?= base_url('lab/Hasil_pemeriksaan_lab/Hasil_pemeriksaan_pw') ?>">Hasil Pemeriksaan</a></li>
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
                                        <h5>Data Hasil Pemeriksaan</h5>
                                        <!-- Example single danger button -->
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Jenis Bahan
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="<?= base_url('lab/Hasil_pemeriksaan_lab/Hasil_pemeriksaan_gel') ?>">Bahan Baku</a>
                                                <a class="dropdown-item" href="<?= base_url('lab/Hasil_pemeriksaan_lab/Hasil_pemeriksaan_pel') ?>">Pelarut</a>
                                                <a class="dropdown-item" href="<?= base_url('lab/Hasil_pemeriksaan_lab/Hasil_pemeriksaan_pw') ?>">Pewarna</a>
                                                <a class="dropdown-item" href="<?= base_url('lab/Hasil_pemeriksaan_lab/Hasil_pemeriksaan_tp') ?>">Tinta Print</a>
                                                <a class="dropdown-item" href="<?= base_url('lab/Hasil_pemeriksaan_lab/Bahan_tambahan/Hasil_pemeriksaan_bt_nb') ?>">Bahan Tambahan</a>
                                            </div>
                                        </div><br>
                                        <h5><b>Pewarna</b></h5>
                                    </div>

                                    <!-- Tabel Hasil Bahan Baku -->
                                    <div class="card-block table-border-style">
                                        <div class="table-responsive">
                                            <table id="pelarut" class="table datatable table-hover table-striped table-sm">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Tanggal Uji</th>
                                                        <th>No Batch</th>
                                                        <th>Nama Barang</th>
                                                        <th>Status</th>
                                                        <th class="text-center">Details</th>
                                                        <th class="text-center">Approval</th>
                                                        <th class="text-center">Aksi</th>
                                                        <th class="text-center">Print Hasil</th>
                                                        <!-- <th class="text-center">Print</th> -->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $level = $this->session->userdata('level');
                                                    $jabatan = $this->session->userdata('jabatan');
                                                    $no = 1;
                                                    foreach ($result as $k) {
                                                        $tgl_uji =  explode('-', $k['tgl_uji'])[2] . "/" . explode('-', $k['tgl_uji'])[1] . "/" . explode('-', $k['tgl_uji'])[0];
                                                        $tgl_msk = !empty($k['tgl_bm'])
    ? implode("/", array_reverse(explode("-", $k['tgl_bm'])))
    : "-";

                                                        // $tgl_mfg =  explode('-', $k['mfg'])[2] . "/" . explode('-', $k['mfg'])[1] . "/" . explode('-', $k['mfg'])[0];
                                                        // $tgl_exp =  explode('-', $k['exp'])[2] . "/" . explode('-', $k['exp'])[1] . "/" . explode('-', $k['exp'])[0];
                                                    ?>
                                                        <tr>
                                                            <th scope="row"><?= $no++ ?></th>
                                                            <td><?= $tgl_uji ?></td>
                                                            <td><?= $k['no_batch'] ?></td>
                                                            <td><?= $k['nama_barang'] ?></td>
                                                            <td><?= $k['status_barang'] ?></td>
                                                            <td class="text-center">
                                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                                    <button type="button" class="btn btn-info btn-square btn-sm" data-toggle="modal" data-target="#detail" data-id_prc_master_barang="<?= $k['id_prc_master_barang'] ?>" data-id_adm_bm="<?= $k['id_adm_bm'] ?>" data-no_batch="<?= $k['no_batch'] ?>" data-no_sjl="<?= $k['no_sjl'] ?>" data-tgl="<?= $tgl_msk ?>" data-tgl_uji="<?= $tgl_uji ?>" data-no_analis="<?= $k['no_analis'] ?>" data-nama_barang="<?= $k['nama_barang'] ?>" data-op_gudang="<?= $k['op_gudang'] ?>" data-qty="<?= $k['jml_bm'] ?>" data-pemerian="<?= $k['pemerian'] ?>" data-kelarutan="<?= $k['kelarutan'] ?>" data-ident_air="<?= $k['ident_air'] ?>" data-ident_hcip="<?= $k['ident_hcip'] ?>" data-ident_naohp="<?= $k['ident_naohp'] ?>" data-ident_h2so4p="<?= $k['ident_h2so4p'] ?>" data-ident_t_larutan="<?= $k['ident_t_larutan'] ?>" data-s_pengeringan="<?= $k['s_pengeringan'] ?>" data-p_kadar="<?= $k['p_kadar'] ?>" data-kesamaan_std="<?= $k['kesamaan_std'] ?>" data-kondisi_py="<?= $k['kondisi_py'] ?>" data-penguji="<?= $k['penguji'] ?>">
                                                                        <i class="feather icon-eye"></i>Details
                                                                    </button>
                                                                </div>
                                                            </td>
                                                            <!-- Aksi Approval -->
                                                            <td class="text-center">
                                                                <?php if ($jabatan === "supervisor" || $jabatan === "admin" && $k['status_barang'] === "Proses") { ?>
                                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                                        <button type="button" class="btn btn-primary btn-square btn-sm" data-toggle="modal" data-target="#released" data-id_ujipewarna="<?= $k['id_ujipewarna'] ?>" data-id_adm_bm="<?= $k['id_adm_bm'] ?>" data-id_prc_master_barang="<?= $k['id_prc_master_barang'] ?>" data-id_supplier="<?= $k['id_supplier'] ?>" data-no_batch="<?= $k['no_batch'] ?>" data-no_sjl="<?= $k['no_sjl'] ?>" data-tgl="<?= $tgl_msk ?>" data-tgl_uji="<?= $tgl_uji ?>" data-no_analis="<?= $k['no_analis'] ?>" data-nama_barang="<?= $k['nama_barang'] ?>"  data-op_gudang="<?= $k['op_gudang'] ?>"data-qty="<?= $k['jml_bm'] ?>" data-pemerian="<?= $k['pemerian'] ?>" data-kelarutan="<?= $k['kelarutan'] ?>" data-ident_air="<?= $k['ident_air'] ?>" data-ident_hcip="<?= $k['ident_hcip'] ?>" data-ident_naohp="<?= $k['ident_naohp'] ?>" data-ident_h2so4p="<?= $k['ident_h2so4p'] ?>" data-ident_t_larutan="<?= $k['ident_t_larutan'] ?>" data-s_pengeringan="<?= $k['s_pengeringan'] ?>" data-p_kadar="<?= $k['p_kadar'] ?>" data-kesamaan_std="<?= $k['kesamaan_std'] ?>" data-kondisi_py="<?= $k['kondisi_py'] ?>" data-penguji="<?= $k['penguji'] ?>">
                                                                            <i class="feather icon-edit-2"></i>Released
                                                                        </button>
                                                                    </div>
                                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                                        <button type="button" class="btn btn-danger btn-square btn-sm" data-toggle="modal" data-target="#reject" data-id_ujipewarna="<?= $k['id_ujipewarna'] ?>" data-id_adm_bm="<?= $k['id_adm_bm'] ?>" data-id_prc_master_barang="<?= $k['id_prc_master_barang'] ?>" data-op_gudang="<?= $k['op_gudang'] ?>" data-qty="<?= $k['jml_bm'] ?>"  data-pemerian="<?= $k['pemerian'] ?>" data-kelarutan="<?= $k['kelarutan'] ?>" data-ident_air="<?= $k['ident_air'] ?>" data-ident_hcip="<?= $k['ident_hcip'] ?>" data-ident_naohp="<?= $k['ident_naohp'] ?>" data-ident_h2so4p="<?= $k['ident_h2so4p'] ?>" data-ident_t_larutan="<?= $k['ident_t_larutan'] ?>" data-s_pengeringan="<?= $k['s_pengeringan'] ?>" data-p_kadar="<?= $k['p_kadar'] ?>" data-kesamaan_std="<?= $k['kesamaan_std'] ?>" data-kondisi_py="<?= $k['kondisi_py'] ?>" data-penguji="<?= $k['penguji'] ?>">
                                                                            <i class="feather icon-edit-2"></i>Reject
                                                                        </button>
                                                                    </div>
                                                                <?php } ?>

                                                                <!-- Print Label Released -->
                                                                
                                                            </td>
                                                            <td>
                                                            <?php if ($k['status_barang'] === "Proses") { ?>
                                                                <?php if ($k['jenis_barang'] === "Pewarna"  || $k['jenis_barang'] === "PEWARNA" ) { ?>
                                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                                        <button type="button" class="btn btn-primary btn-square btn-sm" data-toggle="modal" data-target="#edit_ujipw" data-id_ujipewarna="<?= $k['id_ujipewarna'] ?>" data-id_adm_bm="<?= $k['id_adm_bm'] ?>" data-id_prc_master_barang="<?= $k['id_prc_master_barang'] ?>" data-id_supplier="<?= $k['id_supplier'] ?>" data-no_batch="<?= $k['no_batch'] ?>" data-no_sjl="<?= $k['no_sjl'] ?>" data-tgl="<?= $tgl_msk ?>" data-tgl_uji="<?= $tgl_uji ?>" data-no_analis="<?= $k['no_analis'] ?>" data-nama_barang="<?= $k['nama_barang'] ?>"  data-op_gudang="<?= $k['op_gudang'] ?>" data-qty="<?= $k['jml_bm'] ?>" data-pemerian="<?= $k['pemerian'] ?>" data-kelarutan="<?= $k['kelarutan'] ?>" data-ident_air="<?= $k['ident_air'] ?>" data-ident_hcip="<?= $k['ident_hcip'] ?>" data-ident_naohp="<?= $k['ident_naohp'] ?>" data-ident_h2so4p="<?= $k['ident_h2so4p'] ?>" data-ident_t_larutan="<?= $k['ident_t_larutan'] ?>" data-s_pengeringan="<?= $k['s_pengeringan'] ?>" data-p_kadar="<?= $k['p_kadar'] ?>" data-kesamaan_std="<?= $k['kesamaan_std'] ?>" data-kondisi_py="<?= $k['kondisi_py'] ?>" data-penguji="<?= $k['penguji'] ?>">
                                                                            <i class="feather icon-edit-2"></i>Edit PW
                                                                        </button>
                                                                    </div>
                                                                    <?php } ?>
                                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                                        <a href="<?= base_url() ?>lab/pemeriksaan_bahan/delete/<?= $k['id_adm_bm'] ?>" class="btn btn-danger btn-square text-light btn-sm" onclick="if (! confirm('Apakah Anda Yakin?')) { return false; }">
                                                                        <i class="feather icon-trash-2"></i>Hapus
                                                                        </a>
                                                                    </div>
                                                            <?php } ?>
                                                            </td>
                                                            <td class="text-center">
                                                            <?php if ($k['status_barang'] === "Released") { ?>
                                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                                        <a type="button" class="btn btn-success btn-square btn-sm text-light" onclick="window.open(`<?= base_url() ?>lab/Hasil_pemeriksaan_lab/Hasil_pemeriksaan_pw/pdf_label_released/<?= str_replace('/', '--', $k['no_sjl']) ?>`, 'location=yes,height=700,width=1300,scrollbars=yes,status=yes'); " data-id_adm_bm="<?= $k['id_adm_bm'] ?>" data-no_batch="<?= $k['no_batch'] ?>" data-no_sjl="<?= $k['no_sjl'] ?>">
                                                                            <i class="feather icon-file"></i>Print Label
                                                                        </a>
                                                                    </div>
                                                                <?php } ?>

                                                                <!-- Print Label Ditolak -->
                                                                <?php if ($k['status_barang'] === "Di Tolak") { ?>
                                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                                        <a type="button" class="btn btn-danger btn-square btn-sm text-light" onclick="window.open(`<?= base_url() ?>lab/Hasil_pemeriksaan_lab/Hasil_pemeriksaan_pw/pdf_label_reject/<?= str_replace('/', '--', $k['no_sjl']) ?>`, 'location=yes,height=700,width=1300,scrollbars=yes,status=yes'); " data-id_adm_bm="<?= $k['id_adm_bm'] ?>" data-no_batch="<?= $k['no_batch'] ?>" data-no_sjl="<?= $k['no_sjl'] ?>">
                                                                            <i class="feather icon-file"></i>Print Label
                                                                        </a>
                                                                    </div>
                                                                <?php } ?>
                                                                <?php if ($k['status_barang'] === "Released" || $k['status_barang'] === "Di Tolak") { ?>
                                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                                        <a type="button" class="btn btn-warning btn-square btn-sm text-light" onclick="window.open(`<?= base_url() ?>lab/Hasil_pemeriksaan_lab/Hasil_pemeriksaan_pw/pdf_label_hasil/<?= str_replace('/', '--', $k['no_sjl']) ?>`, 'location=yes,height=700,width=1300,scrollbars=yes,status=yes'); " data-id_adm_bm="<?= $k['id_adm_bm'] ?>" data-no_batch="<?= $k['no_batch'] ?>" data-no_sjl="<?= $k['no_sjl'] ?>">
                                                                            <i class="feather icon-file"></i>Print Hasil
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

<!-- Modal Detail -->
<div class="modal fade" id="detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Hasil Pemeriksaan Pewarna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <form>
                    <input type="hidden" id="v-id_ujipewarna" name="id_ujipewarna">
            </div>
            <div class="modal-body">
                <center><label for="pemeriksaan" class="font-weight-bold">Keterangan Bahan</label></center>
                <table class="mt-2">
                    <tr>
                        <td class="px-1 py-2">
                            No Batch
                        </td>
                        <td class="px-3">
                            <input type="text" class="form-control form-control-sm" id="v-no_batch" name="no_batch" placeholder="No Batch" maxlength="20" readonly>
                        </td>
                        <td class="px-1 py-2">
                            Tanggal Masuk
                        </td>
                        <td class="px-4">
                            <input type="text" class="form-control form-control-sm" id="v-tgl" name="tgl" placeholder="Tanggal Masuk" maxlength="20" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-1 py-2">
                            No. Po
                        </td>
                        <td class="px-3">
                            <input type="text" class="form-control form-control-sm" id="v-no_sjl" name="no_sjl" placeholder="No. Po" maxlength="20" readonly>
                        </td>
                       
                    </tr>
                    <tr>
                        <td class="px-1 py-2">
                            Nama Barang
                        </td>
                        <td class="px-3">
                            <input type="text" class="form-control form-control-sm" id="v-nama_barang" name="nama_barang" placeholder="Nama Barang" maxlength="20" readonly>
                        </td>
                        <td class="px-1 py-2">
                            Operator Penerima
                        </td>
                        <td class="px-4">
                            <input type="text" class="form-control form-control-sm" id="v-op_gudang" name="op_gudang" placeholder="Nama Operator" maxlength="20" readonly>
                        </td>
                   
                    <tr>
                        <td class="px-1 py-2">
                            Jumlah Bahan <br> (Di Terima)
                        </td>
                        <td class="px-3">
                            <input type="text" class="form-control form-control-sm" id="v-qty" name="qty" placeholder="Jumlah Bahan (Di Terima)" maxlength="20" readonly>
                        </td>
                        
                    </tr>
                  
                    
                    
                </table>
                <div class="row">
                    <div class="col-md-12 mt-5">
                        <div class="form-group">
                            
                                   
                                
                            

                        </div>
                    </div>
                </div>
                <center><label for="pemeriksaan" class="font-weight-bold mt-1">Hasil Pengujian</label></center>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="v-tgl_uji" class="mt-2">Tanggal Pengujian</label><br>
                            <input type="text" class="form-control" id="v-tgl_uji" name="tgl_uji" placeholder="Tanggal Uji" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="v-penguji" class="mt-2">Penguji</label><br>
                            <input type="text" class="form-control" id="v-penguji" name="penguji" placeholder="Nama Penguji" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="v-no_analis" class="mt-2">No. Analisa</label><br>
                            <input type="text" class="form-control" id="v-no_analis" name="no_analis" placeholder="No. Analisa" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="v-pemerian" class="mt-2">Pemerian</label>
                            <input type="text" class="form-control" id="v-pemerian" name="pemerian" placeholder="Pemerian" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kelarutan" class="mt-2">Kelarutan</label>
                            <input type="text" class="form-control" id="v-kelarutan" name="kelarutan" placeholder="Kelarutan" readonly>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <center><label for="pemeriksaan" class="mt-4"><b>Identifikasi</b></label></center>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="ident_air" class="mt-2">50 mg + 100 ml air</label><br>
                                        <input type="text" class="form-control mt-4" id="v-ident_air" name="ident_air" placeholder="Identifikasi (50 mg + 100 ml air)" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="ident_hcip" class="mt-2">5 ml larutan zat (1:1000) + 1ml HCI P</label><br>
                                        <input type="text" class="form-control" id="v-ident_hcip" name="ident_hcip" placeholder="Identifikasi (5 ml larutan zat (1:1000) + 1ml HCI P)" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="ident_naohp" class="mt-2">5 ml larutan zat (1:1000) + 1ml NAOH P</label><br>
                                        <input type="text" class="form-control" id="v-ident_naohp" name="ident_naohp" placeholder="Identifikasi (5 ml larutan zat (1:1000) + 1ml NAOH P)" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="ident_h2so4p" class="mt-2">0,1 gr zat + 10 ml H2SO4 P (larutan a)</label><br>
                                        <input type="text" class="form-control" id="v-ident_h2so4p" name="ident_h2so4p" placeholder="Identifikasi (0,1 gr zat + 10 ml H2SO4 P (larutan a))" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="ident_t_larutan" class="mt-2">5 ml air + 1 tetes larutan (a)</label><br>
                                        <input type="text" class="form-control mt-4" id="v-ident_t_larutan" name="ident_t_larutan" placeholder="Identifikasi (5 ml air + 1 tetes larutan (a))" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="s_pengeringan" class="mt-4">Susut Pengeringan</label>
                            <input type="text" class="form-control" id="v-s_pengeringan" name="s_pengeringan" placeholder="Susut Pengeringan" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="p_kadar" class="mt-4">Penetapan Kadar</label>
                            <input type="text" class="form-control" id="v-p_kadar" name="p_kadar" placeholder="Penetapan Kadar" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kesamaan_std" class="mt-4">Kesamaan terhadap Standar</label>
                            <input type="text" class="form-control" id="v-kesamaan_std" name="kesamaan_std" placeholder="Kesamaan terhadao Standar" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kondisi_py">Kondisi Penyimpanan</label>
                            <input type="text" class="form-control" id="v-kondisi_py" name="kondisi_py" placeholder="Kondisi Penyimpanan" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!-- <button type="submit" class="btn btn-info">Update</button> -->
            </div>
        </div>
        </form>
    </div>
</div>
</div>


<!-- Modal Approval Released-->
<div class="modal fade" id="released" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Approval Released Hasil Pemeriksaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <form method="post" action="<?= base_url() ?>lab/Hasil_pemeriksaan_lab/Hasil_pemeriksaan_pw/add">
                    <input type="hidden" id="r-id_ujipewarna" name="id_ujipewarna">
                    <input type="hidden" id="r-id_adm_bm" name="id_adm_bm">
                    <input type="hidden" id="r-id_prc_master_barang" name="id_prc_master_barang">
                    <input type="hidden" id="r-id_supplier" name="id_supplier">
            </div>
            <div class="modal-body">
                <center><label for="pemeriksaan" class="font-weight-bold">Keterangan Bahan</label></center>
                <table class="mt-2">
                    <tr>
                        <td class="px-1 py-2">
                            No Batch
                        </td>
                        <td class="px-3">
                            <input type="text" class="form-control form-control-sm" id="r-no_batch" name="no_batch" placeholder="No Batch" maxlength="20" readonly>
                        </td>
                        <td class="px-1 py-2">
                            Tanggal Masuk
                        </td>
                        <td class="px-4">
                            <input type="text" class="form-control form-control-sm" id="r-tgl" name="tgl" placeholder="Tanggal Masuk" maxlength="20" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-1 py-2">
                            No. Po
                        </td>
                        <td class="px-3">
                            <input type="text" class="form-control form-control-sm" id="r-no_sjl" name="no_sjl" placeholder="No. Po" maxlength="20" readonly>
                        </td>
                        
                    </tr>
                    <tr>
                        <td class="px-1 py-2">
                            Nama Barang
                        </td>
                        <td class="px-3">
                            <input type="text" class="form-control form-control-sm" id="r-nama_barang" name="nama_barang" placeholder="Nama Barang" maxlength="20" readonly>
                        </td>
                        <td class="px-1 py-2">
                            Operator Penerima
                        </td>
                        <td class="px-4">
                            <input type="text" class="form-control form-control-sm" id="r-op_gudang" name="op_gudang" placeholder="Nama Operator" maxlength="20" readonly>
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="px-1 py-2">
                            Jumlah Bahan <br> (Di Terima)
                        </td>
                        <td class="px-3">
                            <input type="text" class="form-control form-control-sm" id="r-qty" name="qty" placeholder="Jumlah Bahan (Di Terima)" maxlength="20" readonly>
                        </td>
                        
                       
                    </tr>
                    
                </table>
                <div class="row">
                    <div class="col-md-12 mt-5">
                        <div class="form-group">
                            

                        </div>
                    </div>
                </div>
                <center><label for="pemeriksaan" class="font-weight-bold mt-1">Hasil Pengujian</label></center>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="r-tgl_uji" class="mt-2">Tanggal Pengujian</label><br>
                            <input type="text" class="form-control" id="r-tgl_uji" name="tgl_uji" placeholder="Tanggal Uji" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="r-penguji" class="mt-2">Penguji</label><br>
                            <input type="text" class="form-control" id="r-penguji" name="penguji" placeholder="Nama Penguji" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="r-pemerian" class="mt-2">Pemerian</label>
                            <input type="text" class="form-control" id="r-pemerian" name="pemerian" placeholder="Pemerian" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kelarutan" class="mt-2">Kelarutan</label>
                            <input type="text" class="form-control" id="r-kelarutan" name="kelarutan" placeholder="Kelarutan" readonly>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <center><label for="pemeriksaan"><b>Identifikasi</b></label></center>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="ident_air" class="mt-2">50 mg + 100 ml air</label><br>
                                        <input type="text" class="form-control mt-4" id="r-ident_air" name="ident_air" placeholder="Identifikasi (50 mg + 100 ml air)" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="ident_hcip" class="mt-2">5 ml larutan zat (1:1000) + 1ml HCI P</label><br>
                                        <input type="text" class="form-control" id="r-ident_hcip" name="ident_hcip" placeholder="Identifikasi (5 ml larutan zat (1:1000) + 1ml HCI P)" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="ident_naohp" class="mt-2">5 ml larutan zat (1:1000) + 1ml NAOH P</label><br>
                                        <input type="text" class="form-control" id="r-ident_naohp" name="ident_naohp" placeholder="Identifikasi (5 ml larutan zat (1:1000) + 1ml NAOH P)" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="ident_h2so4p" class="mt-2">0,1 gr zat + 10 ml H2SO4 P (larutan a)</label><br>
                                        <input type="text" class="form-control" id="r-ident_h2so4p" name="ident_h2so4p" placeholder="Identifikasi (0,1 gr zat + 10 ml H2SO4 P (larutan a))" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="ident_t_larutan" class="mt-2">5 ml air + 1 tetes larutan (a)</label><br>
                                        <input type="text" class="form-control mt-4" id="r-ident_t_larutan" name="ident_t_larutan" placeholder="Identifikasi (5 ml air + 1 tetes larutan (a))" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="s_pengeringan" class="mt-4">Susut Pengeringan</label>
                            <input type="text" class="form-control" id="r-s_pengeringan" name="s_pengeringan" placeholder="Susut Pengeringan" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="p_kadar" class="mt-4">Penetapan Kadar</label>
                            <input type="text" class="form-control" id="r-p_kadar" name="p_kadar" placeholder="Penetapan Kadar" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kesamaan_std" class="mt-4">Kesamaan terhadap Standar</label>
                            <input type="text" class="form-control" id="r-kesamaan_std" name="kesamaan_std" placeholder="Kesamaan terhadao Standar" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kondisi_py">Kondisi Penyimpanan</label>
                            <input type="text" class="form-control" id="r-kondisi_py" name="kondisi_py" placeholder="Kondisi Penyimpanan" readonly>
                        </div>
                    </div>
                    <div class="col-md-8"></div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="tgl_rilis" class="mt-2 font-weight-bold">Tanggal Released</label><br>
                            <input type="text" class="form-control datepicker" id="tgl_rilis" name="tgl_rilis" placeholder="Tanggal Released" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="tgl_uu" class="mt-2 font-weight-bold">Tanggal Uji Ulang</label><br>
                            <input type="text" class="form-control" id="tgl_uu" name="tgl_uu" placeholder="Tanggal Uji Ulang" autocomplete="off" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="simpan" class="btn btn-success" onclick="if (! confirm('Apakah Anda Yakin Untuk Menyimpan Data Ini? Tolong Untuk Di Check Kembali. Dan Jangan Lupa Untuk Menginputkan Tanggalnya')) { return false; }">Released</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Approval Reject -->
<div class="modal fade" id="reject" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Approval Reject Hasil Pemeriksaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <form method="post" action="<?= base_url() ?>lab/Hasil_pemeriksaan_lab/Hasil_pemeriksaan_pw/ditolak">
                    <input type="hidden" id="t-id_ujipewarna" name="id_ujipewarna">
                    <input type="hidden" id="t-id_adm_bm" name="id_adm_bm">
                    <input type="hidden" id="t-id_prc_master_barang" name="id_prc_master_barang">
                    <input type="hidden" id="t-id_supplier" name="id_supplier">
            </div>
            <div class="modal-body">
                <center><label for="pemeriksaan" class="font-weight-bold">Keterangan Bahan</label></center>
                <table class="mt-2">
                    <tr>
                        <td class="px-1 py-2">
                            No Batch
                        </td>
                        <td class="px-3">
                            <input type="text" class="form-control form-control-sm" id="t-no_batch" name="no_batch" placeholder="No Batch" maxlength="20" readonly>
                        </td>
                        <td class="px-1 py-2">
                            Tanggal Masuk
                        </td>
                        <td class="px-4">
                            <input type="text" class="form-control form-control-sm" id="t-tgl" name="tgl" placeholder="Tanggal Masuk" maxlength="20" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-1 py-2">
                            No. Po
                        </td>
                        <td class="px-3">
                            <input type="text" class="form-control form-control-sm" id="t-no_sjl" name="no_sjl" placeholder="No. Po" maxlength="20" readonly>
                        </td>
                       
                    </tr>
                    <tr>
                        <td class="px-1 py-2">
                            Nama Barang
                        </td>
                        <td class="px-3">
                            <input type="text" class="form-control form-control-sm" id="t-nama_barang" name="nama_barang" placeholder="Nama Barang" maxlength="20" readonly>
                        </td>
                        <td class="px-1 py-2">
                            Operator Penerima
                        </td>
                        <td class="px-4">
                            <input type="text" class="form-control form-control-sm" id="t-op_gudang" name="op_gudang" placeholder="Nama Operator" maxlength="20" readonly>
                        </td>
                    </tr>
                    <tr>
                       
                      
                    </tr>
                    <tr>
                        <td class="px-1 py-2">
                            Jumlah Bahan <br> (Di Terima)
                        </td>
                        <td class="px-3">
                            <input type="text" class="form-control form-control-sm" id="t-qty" name="qty" placeholder="Jumlah Bahan (Di Terima)" maxlength="20" readonly>
                        </td>
                        
                    </tr>
                    <tr>
                        
                       
                    </tr>
                   
                </table>
                <div class="row">
                    <div class="col-md-12 mt-5">
                        <div class="form-group">
                            
                           

                        </div>
                    </div>
                </div>
                <center><label for="pemeriksaan" class="font-weight-bold">Hasil Pengujian</label></center>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="t-tgl_uji" class="mt-2">Tanggal Pengujian</label><br>
                            <input type="text" class="form-control" id="t-tgl_uji" name="tgl_uji" placeholder="Tanggal Uji" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="t-penguji" class="mt-2">Penguji</label><br>
                            <input type="text" class="form-control" id="t-penguji" name="penguji" placeholder="Nama Penguji" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="t-pemerian" class="mt-2">Pemerian</label>
                            <input type="text" class="form-control" id="t-pemerian" name="pemerian" placeholder="Pemerian" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kelarutan" class="mt-2">Kelarutan</label>
                            <input type="text" class="form-control" id="t-kelarutan" name="kelarutan" placeholder="Kelarutan" readonly>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <center><label for="pemeriksaan"><b>Identifikasi</b></label></center>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="ident_air" class="mt-2">50 mg + 100 ml air</label><br>
                                        <input type="text" class="form-control mt-4" id="t-ident_air" name="ident_air" placeholder="Identifikasi (50 mg + 100 ml air)" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="ident_hcip" class="mt-2">5 ml larutan zat (1:1000) + 1ml HCI P</label><br>
                                        <input type="text" class="form-control" id="t-ident_hcip" name="ident_hcip" placeholder="Identifikasi (5 ml larutan zat (1:1000) + 1ml HCI P)" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="ident_naohp" class="mt-2">5 ml larutan zat (1:1000) + 1ml NAOH P</label><br>
                                        <input type="text" class="form-control" id="t-ident_naohp" name="ident_naohp" placeholder="Identifikasi (5 ml larutan zat (1:1000) + 1ml NAOH P)" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="ident_h2so4p" class="mt-2">0,1 gr zat + 10 ml H2SO4 P (larutan a)</label><br>
                                        <input type="text" class="form-control" id="t-ident_h2so4p" name="ident_h2so4p" placeholder="Identifikasi (0,1 gr zat + 10 ml H2SO4 P (larutan a))" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="ident_t_larutan" class="mt-2">5 ml air + 1 tetes larutan (a)</label><br>
                                        <input type="text" class="form-control mt-4" id="t-ident_t_larutan" name="ident_t_larutan" placeholder="Identifikasi (5 ml air + 1 tetes larutan (a))" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="s_pengeringan" class="mt-4">Susut Pengeringan</label>
                            <input type="text" class="form-control" id="t-s_pengeringan" name="s_pengeringan" placeholder="Susut Pengeringan" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="p_kadar" class="mt-4">Penetapan Kadar</label>
                            <input type="text" class="form-control" id="t-p_kadar" name="p_kadar" placeholder="Penetapan Kadar" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kesamaan_std" class="mt-4">Kesamaan terhadap Standar</label>
                            <input type="text" class="form-control" id="t-kesamaan_std" name="kesamaan_std" placeholder="Kesamaan terhadao Standar" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kondisi_py">Kondisi Penyimpanan</label>
                            <input type="text" class="form-control" id="t-kondisi_py" name="kondisi_py" placeholder="Kondisi Penyimpanan" readonly>
                        </div>
                    </div>
                    <div class="col-md-8"></div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="tgl_reject" class="mt-2 font-weight-bold">Tanggal Reject</label><br>
                            <input type="text" class="form-control datepicker" id="tgl_reject" name="tgl_reject" placeholder="Tanggal Reject" autocomplete="off" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger" onclick="if (! confirm('Apakah Anda Yakin Untuk Merejct Data Ini? Tolong Untuk Di Check Kembali. Dan Jangan Lupa Untuk Menginputkan Tanggalnya')) { return false; }">Di Tolak</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Script Modal Detail -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#detail').on('show.bs.modal', function(event) {
            var id_prc_master_barang = $(event.relatedTarget).data('id_prc_master_barang')
            var id_adm_bm = $(event.relatedTarget).data('id_adm_bm')
            var no_batch = $(event.relatedTarget).data('no_batch')
            var nama_barang = $(event.relatedTarget).data('nama_barang')
            var nama_supplier = $(event.relatedTarget).data('nama_supplier')
            var no_sjl = $(event.relatedTarget).data('no_sjl')
            var op_gudang = $(event.relatedTarget).data('op_gudang')
            var dok_pendukung = $(event.relatedTarget).data('dok_pendukung')
            var tgl = $(event.relatedTarget).data('tgl')
            var jml_kemasan = $(event.relatedTarget).data('jml_kemasan')
            var ditolak_kemasan = $(event.relatedTarget).data('ditolak_kemasan')
            var jenis_kemasan = $(event.relatedTarget).data('jenis_kemasan')
            var qty = $(event.relatedTarget).data('qty')
            var ditolak_qty = $(event.relatedTarget).data('ditolak_qty')
            var mfg = $(event.relatedTarget).data('mfg')
            var exp = $(event.relatedTarget).data('exp')
            var tutup = $(event.relatedTarget).data('tutup')
            var wadah = $(event.relatedTarget).data('wadah')
            var label = $(event.relatedTarget).data('label')
            var tgl_uji = $(event.relatedTarget).data('tgl_uji')
            var penguji = $(event.relatedTarget).data('penguji')
            var no_analis = $(event.relatedTarget).data('no_analis')
            var pemerian = $(event.relatedTarget).data('pemerian')
            var kelarutan = $(event.relatedTarget).data('kelarutan')
            var ident_air = $(event.relatedTarget).data('ident_air')
            var ident_hcip = $(event.relatedTarget).data('ident_hcip')
            var ident_naohp = $(event.relatedTarget).data('ident_naohp')
            var ident_h2so4p = $(event.relatedTarget).data('ident_h2so4p')
            var ident_t_larutan = $(event.relatedTarget).data('ident_t_larutan')
            var s_pengeringan = $(event.relatedTarget).data('s_pengeringan')
            var p_kadar = $(event.relatedTarget).data('p_kadar')
            var kesamaan_std = $(event.relatedTarget).data('kesamaan_std')
            var kondisi_py = $(event.relatedTarget).data('kondisi_py')

            $(this).find('#v-id_prc_master_barang').val(id_prc_master_barang)
            $(this).find('#v-id_adm_bm').val(id_adm_bm)
            $(this).find('#v-no_batch').val(no_batch)
            $(this).find('#v-nama_barang').val(nama_barang)
            $(this).find('#v-nama_supplier').val(nama_supplier)
            $(this).find('#v-no_sjl').val(no_sjl)
            $(this).find('#v-op_gudang').val(op_gudang)
            $(this).find('#v-dok_pendukung').val(dok_pendukung)
            $(this).find('#v-tgl').val(tgl)
            $(this).find('#v-jml_kemasan').val(jml_kemasan)
            $(this).find('#v-ditolak_kemasan').val(ditolak_kemasan)
            $(this).find('#v-jenis_kemasan').val(jenis_kemasan)
            $(this).find('#v-qty').val(qty)
            $(this).find('#v-ditolak_qty').val(ditolak_qty)
            $(this).find('#v-mfg').val(mfg)
            $(this).find('#v-exp').val(exp)
            $(this).find('#v-tutup').val(tutup)
            $(this).find('#v-wadah').val(wadah)
            $(this).find('#v-label').val(label)
            $(this).find('#v-tgl_uji').val(tgl_uji)
            $(this).find('#v-penguji').val(penguji)
            $(this).find('#v-no_analis').val(no_analis)
            $(this).find('#v-pemerian').val(pemerian)
            $(this).find('#v-kelarutan').val(kelarutan)
            $(this).find('#v-ident_air').val(ident_air)
            $(this).find('#v-ident_hcip').val(ident_hcip)
            $(this).find('#v-ident_naohp').val(ident_naohp)
            $(this).find('#v-ident_h2so4p').val(ident_h2so4p)
            $(this).find('#v-ident_t_larutan').val(ident_t_larutan)
            $(this).find('#v-s_pengeringan').val(s_pengeringan)
            $(this).find('#v-p_kadar').val(p_kadar)
            $(this).find('#v-kesamaan_std').val(kesamaan_std)
            $(this).find('#v-kondisi_py').val(kondisi_py)

        })

    })
</script>

<!-- Script Modal Approval Released-->
<script type="text/javascript">
    $(document).ready(function() {
        $('#released').on('show.bs.modal', function(event) {
            var id_ujipewarna = $(event.relatedTarget).data('id_ujipewarna')
            var id_prc_master_barang = $(event.relatedTarget).data('id_prc_master_barang')
            var id_supplier = $(event.relatedTarget).data('id_supplier')
            var id_adm_bm = $(event.relatedTarget).data('id_adm_bm')
            var no_batch = $(event.relatedTarget).data('no_batch')
            var nama_barang = $(event.relatedTarget).data('nama_barang')
            var nama_supplier = $(event.relatedTarget).data('nama_supplier')
            var no_sjl = $(event.relatedTarget).data('no_sjl')
            var op_gudang = $(event.relatedTarget).data('op_gudang')
            var dok_pendukung = $(event.relatedTarget).data('dok_pendukung')
            var tgl = $(event.relatedTarget).data('tgl')
            var jml_kemasan = $(event.relatedTarget).data('jml_kemasan')
            var ditolak_kemasan = $(event.relatedTarget).data('ditolak_kemasan')
            var jenis_kemasan = $(event.relatedTarget).data('jenis_kemasan')
            var qty = $(event.relatedTarget).data('qty')
            var ditolak_qty = $(event.relatedTarget).data('ditolak_qty')
            var mfg = $(event.relatedTarget).data('mfg')
            var exp = $(event.relatedTarget).data('exp')
            var tutup = $(event.relatedTarget).data('tutup')
            var wadah = $(event.relatedTarget).data('wadah')
            var label = $(event.relatedTarget).data('label')
            var tgl_uji = $(event.relatedTarget).data('tgl_uji')
            var penguji = $(event.relatedTarget).data('penguji')
            var no_analis = $(event.relatedTarget).data('no_analis')
            var pemerian = $(event.relatedTarget).data('pemerian')
            var kelarutan = $(event.relatedTarget).data('kelarutan')
            var ident_air = $(event.relatedTarget).data('ident_air')
            var ident_hcip = $(event.relatedTarget).data('ident_hcip')
            var ident_naohp = $(event.relatedTarget).data('ident_naohp')
            var ident_h2so4p = $(event.relatedTarget).data('ident_h2so4p')
            var ident_t_larutan = $(event.relatedTarget).data('ident_t_larutan')
            var s_pengeringan = $(event.relatedTarget).data('s_pengeringan')
            var p_kadar = $(event.relatedTarget).data('p_kadar')
            var kesamaan_std = $(event.relatedTarget).data('kesamaan_std')
            var kondisi_py = $(event.relatedTarget).data('kondisi_py')

            $(this).find('#r-id_ujipewarna').val(id_ujipewarna)
            $(this).find('#r-id_prc_master_barang').val(id_prc_master_barang)
            $(this).find('#r-id_supplier').val(id_supplier)
            $(this).find('#r-id_adm_bm').val(id_adm_bm)
            $(this).find('#r-no_batch').val(no_batch)
            $(this).find('#r-nama_barang').val(nama_barang)
            $(this).find('#r-nama_supplier').val(nama_supplier)
            $(this).find('#r-no_sjl').val(no_sjl)
            $(this).find('#r-op_gudang').val(op_gudang)
            $(this).find('#r-dok_pendukung').val(dok_pendukung)
            $(this).find('#r-tgl').val(tgl)
            $(this).find('#r-jml_kemasan').val(jml_kemasan)
            $(this).find('#r-ditolak_kemasan').val(ditolak_kemasan)
            $(this).find('#r-jenis_kemasan').val(jenis_kemasan)
            $(this).find('#r-qty').val(qty)
            $(this).find('#r-ditolak_qty').val(ditolak_qty)
            $(this).find('#r-mfg').val(mfg)
            $(this).find('#r-exp').val(exp)
            $(this).find('#r-tutup').val(tutup)
            $(this).find('#r-wadah').val(wadah)
            $(this).find('#r-label').val(label)
            $(this).find('#r-tgl_uji').val(tgl_uji)
            $(this).find('#r-penguji').val(penguji)
            $(this).find('#r-no_analis').val(no_analis)
            $(this).find('#r-pemerian').val(pemerian)
            $(this).find('#r-kelarutan').val(kelarutan)
            $(this).find('#r-ident_air').val(ident_air)
            $(this).find('#r-ident_hcip').val(ident_hcip)
            $(this).find('#r-ident_naohp').val(ident_naohp)
            $(this).find('#r-ident_h2so4p').val(ident_h2so4p)
            $(this).find('#r-ident_t_larutan').val(ident_t_larutan)
            $(this).find('#r-s_pengeringan').val(s_pengeringan)
            $(this).find('#r-p_kadar').val(p_kadar)
            $(this).find('#r-kesamaan_std').val(kesamaan_std)
            $(this).find('#r-kondisi_py').val(kondisi_py)
            $(this).find('#tgl_rilis').datepicker({
                autoclose: true,
                format: "dd/mm/yyyy"
            }).on('show.bs.modal', function(event) {
                // prevent datepicker from firing bootstrap modal "show.bs.modal"
                event.stopPropagation();

            });
            $('#tgl_rilis').on('change', function() {
                const tgl_rilis = $(this).val()
                const tgl_uu = moment(tgl_rilis, "DD/MM/YYYY").add('months', 6).format('DD/MM/YYYY')
                $('#tgl_uu').val(tgl_uu)
            })
        })

    })
</script>

<!-- Script Modal Approval Reject -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#reject').on('show.bs.modal', function(event) {
            var id_ujipewarna = $(event.relatedTarget).data('id_ujipewarna')
            var id_prc_master_barang = $(event.relatedTarget).data('id_prc_master_barang')
            var id_supplier = $(event.relatedTarget).data('id_supplier')
            var id_adm_bm = $(event.relatedTarget).data('id_adm_bm')
            var no_batch = $(event.relatedTarget).data('no_batch')
            var nama_barang = $(event.relatedTarget).data('nama_barang')
            var nama_supplier = $(event.relatedTarget).data('nama_supplier')
            var no_sjl = $(event.relatedTarget).data('no_sjl')
            var op_gudang = $(event.relatedTarget).data('op_gudang')
            var dok_pendukung = $(event.relatedTarget).data('dok_pendukung')
            var tgl = $(event.relatedTarget).data('tgl')
            var jml_kemasan = $(event.relatedTarget).data('jml_kemasan')
            var ditolak_kemasan = $(event.relatedTarget).data('ditolak_kemasan')
            var jenis_kemasan = $(event.relatedTarget).data('jenis_kemasan')
            var qty = $(event.relatedTarget).data('qty')
            var ditolak_qty = $(event.relatedTarget).data('ditolak_qty')
            var mfg = $(event.relatedTarget).data('mfg')
            var exp = $(event.relatedTarget).data('exp')
            var tutup = $(event.relatedTarget).data('tutup')
            var wadah = $(event.relatedTarget).data('wadah')
            var label = $(event.relatedTarget).data('label')
            var tgl_uji = $(event.relatedTarget).data('tgl_uji')
            var penguji = $(event.relatedTarget).data('penguji')
            var no_analis = $(event.relatedTarget).data('no_analis')
            var pemerian = $(event.relatedTarget).data('pemerian')
            var kelarutan = $(event.relatedTarget).data('kelarutan')
            var ident_air = $(event.relatedTarget).data('ident_air')
            var ident_hcip = $(event.relatedTarget).data('ident_hcip')
            var ident_naohp = $(event.relatedTarget).data('ident_naohp')
            var ident_h2so4p = $(event.relatedTarget).data('ident_h2so4p')
            var ident_t_larutan = $(event.relatedTarget).data('ident_t_larutan')
            var s_pengeringan = $(event.relatedTarget).data('s_pengeringan')
            var p_kadar = $(event.relatedTarget).data('p_kadar')
            var kesamaan_std = $(event.relatedTarget).data('kesamaan_std')
            var kondisi_py = $(event.relatedTarget).data('kondisi_py')

            $(this).find('#t-id_ujipewarna').val(id_ujipewarna)
            $(this).find('#t-id_prc_master_barang').val(id_prc_master_barang)
            $(this).find('#t-id_supplier').val(id_supplier)
            $(this).find('#t-id_adm_bm').val(id_adm_bm)
            $(this).find('#t-no_batch').val(no_batch)
            $(this).find('#t-nama_barang').val(nama_barang)
            $(this).find('#t-nama_supplier').val(nama_supplier)
            $(this).find('#t-no_sjl').val(no_sjl)
            $(this).find('#t-op_gudang').val(op_gudang)
            $(this).find('#t-dok_pendukung').val(dok_pendukung)
            $(this).find('#t-tgl').val(tgl)
            $(this).find('#t-jml_kemasan').val(jml_kemasan)
            $(this).find('#t-ditolak_kemasan').val(ditolak_kemasan)
            $(this).find('#t-jenis_kemasan').val(jenis_kemasan)
            $(this).find('#t-qty').val(qty)
            $(this).find('#t-ditolak_qty').val(ditolak_qty)
            $(this).find('#t-mfg').val(mfg)
            $(this).find('#t-exp').val(exp)
            $(this).find('#t-tutup').val(tutup)
            $(this).find('#t-wadah').val(wadah)
            $(this).find('#t-label').val(label)
            $(this).find('#t-tgl_uji').val(tgl_uji)
            $(this).find('#t-penguji').val(penguji)
            $(this).find('#t-no_analis').val(no_analis)
            $(this).find('#t-pemerian').val(pemerian)
            $(this).find('#t-kelarutan').val(kelarutan)
            $(this).find('#t-ident_air').val(ident_air)
            $(this).find('#t-ident_hcip').val(ident_hcip)
            $(this).find('#t-ident_naohp').val(ident_naohp)
            $(this).find('#t-ident_h2so4p').val(ident_h2so4p)
            $(this).find('#t-ident_t_larutan').val(ident_t_larutan)
            $(this).find('#t-s_pengeringan').val(s_pengeringan)
            $(this).find('#t-p_kadar').val(p_kadar)
            $(this).find('#t-kesamaan_std').val(kesamaan_std)
            $(this).find('#t-kondisi_py').val(kondisi_py)
            $(this).find('#tgl_reject').datepicker({
                autoclose: true,
                format: "dd/mm/yyyy"
            }).on('show.bs.modal', function(event) {
                event.stopPropagation();

            });
        })
    })
</script>
<?php
    $this->view('content/lab/pemeriksaan_bahan/pewarna_edit');
?>