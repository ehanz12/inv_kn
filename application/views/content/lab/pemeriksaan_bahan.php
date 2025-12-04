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
                                    <li class="breadcrumb-item"><a href="">Lab/QC</a></li>
                                    <li class="breadcrumb-item"><a href="<?= base_url('lab/Pemeriksaan_bahan') ?>">Pemeriksaan Bahan</a></li>
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
                                        <h5>Data Pemeriksaan Bahan</h5>
                                    </div>
                                    <div class="card-block table-border-style">
                                        <div class="table-responsive">
                                            <table class="table datatable table-hover table-striped table-sm">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Tanggal Masuk</th>
                                                        <!-- <th>No SJl</th> -->
                                                        
                                                        <th>No Batch</th>
                                                        <th>Nama Barang</th>
                                                        <th class="text-right">Qty</th>
                                                        <th class="">Jenis Bahan</th>
                                                        <th class="text-center">Status</th>
                                                        
                                                        <th class="text-center">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    foreach ($result as $k) {
                                                        $tgl_msk =  explode('-', $k['tgl_dpb'])[2] . "/" . explode('-', $k['tgl_dpb'])[1] . "/" . explode('-', $k['tgl_dpb'])[0];
                                                        // $exp = isset($k['exp']) ? explode('-', $k['exp'])[2] . "/" . explode('-', $k['exp'])[1] . "/" . explode('-', $k['exp'])[0] : '';
                                                        // $mfg = isset($k['mfg']) ? explode('-', $k['mfg'])[2] . "/" . explode('-', $k['mfg'])[1] . "/" . explode('-', $k['mfg'])[0] : ''; 
                                                    ?>
                                                       <?php if ($k['status_barang'] === "karantina" && $k['lab_test'] === "yes") { ?>

                                                            <tr class="table-info">
                                                            <?php } else { ?>
                                                            <tr>
                                                            <?php } ?>
                                                            <th scope="row"><?= $no++ ?></th>
                                                            <td><?= $tgl_msk ?></td>
                                                            <!-- <td><?= $k['no_sjl'] ?></td> -->
                                                           <td class="text-center">
                                                                <div class="btn-group" role="group">
                                                                    <button type="button" class="btn btn-info btn-square btn-sm" data-toggle="modal" data-target="#detail" 
                                                                            data-id_adm_bm="<?= $k['id_adm_bm'] ?>" 
                                                                            data-no_surat_jalan="<?= $k['no_sjl'] ?>" 
                                                                            data-no_batch="<?= $k['no_batch'] ?>" 
                                                                            data-tgl="<?= $tgl_msk ?>" 
                                                                            data-nama_barang="<?= $k['nama_barang'] ?>" 
                                                                            data-qty="<?= $k['jml_bm'] ?>" 
                                                                           
                                                                           
                                                                        <i class="feather icon-eye"></i>  <?= $k['no_batch'] ?>
                                                                    </button>
                                                                </div>
                                                            </td>
                                                            <td><?= $k['nama_barang'] ?></td>
                                                            <td class="text-right"><?= number_format($k['jml_bm'], 0, ",", ".") ?> <?= $k['satuan'] ?? '' ?></td>
                                                            <td><?= $k['jenis_barang'] ?></td>
                                                            <td class="text-center">
                                                                <?php if ($k['status_barang'] === "karantina" && $k['lab_test'] === "yes") { ?>

                                                                    <span class="badge badge-warning"><?= $k['status_barang'] ?></span>
                                                                <?php } else { ?>
                                                                    <span class="badge badge-success"><?= $k['status_barang'] ?></span>
                                                                <?php } ?>
                                                            </td>
                                                            
                                                            <!-- Kolom Details -->
                                                            
                                                            
                                                            <!-- Kolom Aksi -->
                                                            <td class="text-center">
                                                                <?php if ($k['status_barang'] === "karantina" && $k['lab_test'] === "yes") { ?>
                                                                    <!-- Bahan Baku -->
                                                                    <?php if (($k['jenis_barang'] === "Bahan Baku" || $k['jenis_barang'] === "BAHAN BAKU")) { ?>
                                                                        <div class="btn-group" role="group">
                                                                            <button type="button" class="btn btn-primary btn-square btn-sm" data-toggle="modal" data-target="#add_ujigel" 
                                                                                    data-id_adm_bm="<?= $k['id_adm_bm'] ?>" 
                                                                                    data-id_barang="<?= $k['id_prc_master_barang'] ?>" 
                                                                                   
                                                                                    data-no_surat_jalan="<?= $k['no_sjl'] ?>" 
                                                                                    data-no_batch="<?= $k['no_batch'] ?>" 
                                                                                    data-tgl="<?= $tgl_msk ?>" 
                                                                                    data-nama_barang="<?= $k['nama_barang'] ?>" 
                                                                                    data-nama_supplier="<?= $k['nama_supplier'] ?>" 
                                                                                   
                                                                                    data-qty="<?= $k['jml_bm'] ?>">
                                                                                <i class="feather icon-edit-2"></i> Uji BB
                                                                            </button>
                                                                        </div>
                                                                    <?php } ?>
                                                                    
                                                                    <!-- Pelarut -->
                                                                    <?php if (($k['jenis_barang'] === "Pelarut" || $k['jenis_barang'] === "PELARUT")) { ?>
                                                                        <div class="btn-group" role="group">
                                                                            <button type="button" class="btn btn-primary btn-square btn-sm" data-toggle="modal" data-target="#add_ujipel" 
                                                                                    data-id_adm_bm="<?= $k['id_adm_bm'] ?>" 
                                                                                    data-id_barang="<?= $k['id_prc_master_barang'] ?>" 
                                                                                   
                                                                                    data-no_surat_jalan="<?= $k['no_sjl'] ?>" 
                                                                                    data-no_batch="<?= $k['no_batch'] ?>" 
                                                                                    data-tgl="<?= $tgl_msk ?>" 
                                                                                    data-nama_barang="<?= $k['nama_barang'] ?>" 
                                                                                    data-nama_supplier="<?= $k['nama_supplier'] ?>" 
                                                                                    data-op_gudang="<?= $k['op_gudang'] ?>" 
                                                                                    
                                                                                    data-qty="<?= $k['jml_bm'] ?>">
                                                                                <i class="feather icon-edit-2"></i> Uji Pel
                                                                            </button>
                                                                        </div>
                                                                    <?php } ?>
                                                                    
                                                                    <!-- Pewarna -->
                                                                    <?php if (($k['jenis_barang'] === "Pewarna" || $k['jenis_barang'] === "PEWARNA")) { ?>
                                                                        <div class="btn-group" role="group">
                                                                            <button type="button" class="btn btn-primary btn-square btn-sm" data-toggle="modal" data-target="#add_ujipw" 
                                                                                    data-id_adm_bm="<?= $k['id_adm_bm'] ?>" 
                                                                                    data-id_barang="<?= $k['id_prc_master_barang'] ?>" 
                                                                                    data-no_surat_jalan="<?= $k['no_sjl'] ?>" 
                                                                                    data-no_batch="<?= $k['no_batch'] ?>" 
                                                                                    data-tgl="<?= $tgl_msk ?>" 
                                                                                    data-nama_barang="<?= $k['nama_barang'] ?>" 
                                                                                    data-nama_supplier="<?= $k['nama_supplier'] ?>" 
                                                                                    
                                                                                    
                                                                                    data-qty="<?= $k['jml_bm'] ?>">
                                                                                <i class="feather icon-edit-2"></i> Uji Pw
                                                                            </button>
                                                                        </div>
                                                                    <?php } ?>
                                                                    
                                                                    <!-- Tinta Print -->
                                                                    <?php if (($k['jenis_barang'] === "Tinta Print" || $k['nama_barang'] === "TINTA PRINT")) { ?>
                                                                        <div class="btn-group" role="group">
                                                                            <button type="button" class="btn btn-primary btn-square btn-sm" data-toggle="modal" data-target="#add_ujitp" 
                                                                                    data-id_adm_bm="<?= $k['id_adm_bm'] ?>" 
                                                                                    data-id_barang="<?= $k['id_prc_master_barang'] ?>" 
                                                                                    data-no_surat_jalan="<?= $k['no_sjl'] ?>" 
                                                                                    data-no_batch="<?= $k['no_batch'] ?>" 
                                                                                    data-tgl="<?= $tgl_msk ?>" 
                                                                                    data-nama_barang="<?= $k['nama_barang'] ?>" 
                                                                                    data-nama_supplier="<?= $k['nama_supplier'] ?>" 
                                                                                    
                                                                                    data-qty="<?= $k['jml_bm'] ?>">
                                                                                <i class="feather icon-edit-2"></i> Uji TP
                                                                            </button>
                                                                        </div>
                                                                    <?php } ?>
                                                                    
                                                                    <!-- Natrium Benzoat -->
                                                                    <?php if ($k['nama_barang'] === "NATRIUM BENZOAT") { ?>
                                                                        <div class="btn-group" role="group">
                                                                            <button type="button" class="btn btn-primary btn-square btn-sm" data-toggle="modal" data-target="#add_ujinb" 
                                                                                    data-id_adm_bm="<?= $k['id_adm_bm'] ?>" 
                                                                                    data-id_barang="<?= $k['id_prc_master_barang'] ?>" 
                                                                                   
                                                                                    data-no_surat_jalan="<?= $k['no_sjl'] ?>" 
                                                                                    data-no_batch="<?= $k['no_batch'] ?>" 
                                                                                    data-tgl="<?= $tgl_msk ?>" 
                                                                                    data-nama_barang="<?= $k['nama_barang'] ?>" 
                                                                                    data-nama_supplier="<?= $k['nama_supplier'] ?>" 
                                                                                    data-op_gudang="<?= $k['op_gudang'] ?>" 
                                                                                    
                                                                                    data-qty="<?= $k['jml_bm'] ?>">
                                                                                <i class="feather icon-edit-2"></i> Uji BT
                                                                            </button>
                                                                        </div>
                                                                    <?php } ?>

                                                                    <!-- Methyl Paraben -->
                                                                    <?php if ($k['nama_barang'] === "METHYL PARABEN") { ?>
                                                                        <div class="btn-group" role="group">
                                                                            <button type="button" class="btn btn-primary btn-square btn-sm" data-toggle="modal" data-target="#add_ujimp" 
                                                                                    data-id_adm_bm="<?= $k['id_adm_bm'] ?>" 
                                                                                    data-id_barang="<?= $k['id_prc_master_barang'] ?>" 
                                                                                    data-id_supplier="<?= $k['id_supplier'] ?>" 
                                                                                    data-no_surat_jalan="<?= $k['no_surat_jalan'] ?>" 
                                                                                    data-no_batch="<?= $k['no_batch'] ?>" 
                                                                                    data-tgl="<?= $tgl_msk ?>" 
                                                                                    data-nama_barang="<?= $k['nama_barang'] ?>" 
                                                                                    data-nama_supplier="<?= $k['nama_supplier'] ?>" 
                                                                                    data-op_gudang="<?= $k['op_gudang'] ?>" 
                                                                                    
                                                                                    data-qty="<?= $k['jml_bm'] ?>">
                                                                                <i class="feather icon-edit-2"></i> Uji BT
                                                                            </button>
                                                                        </div>
                                                                    <?php } ?>

                                                                    <!-- Lecithin Adlec -->
                                                                    <?php if ($k['nama_barang'] === "LECITHIN ADLEC") { ?>
                                                                        <div class="btn-group" role="group">
                                                                            <button type="button" class="btn btn-primary btn-square btn-sm" data-toggle="modal" data-target="#add_ujila" 
                                                                                    data-id_adm_bm="<?= $k['id_adm_bm'] ?>" 
                                                                                    data-id_barang="<?= $k['id_prc_master_barang'] ?>" 
                                                                                    data-no_surat_jalan="<?= $k['no_sjl'] ?>" 
                                                                                    data-no_batch="<?= $k['no_batch'] ?>" 
                                                                                    data-tgl="<?= $tgl_msk ?>" 
                                                                                    data-nama_barang="<?= $k['nama_barang'] ?>" 
                                                                                    data-nama_supplier="<?= $k['nama_supplier'] ?>" 
                                                                                    data-op_gudang="<?= $k['op_gudang'] ?>" 
                                                                                   
                                                                                    data-qty="<?= $k['jml_bm'] ?>">
                                                                                <i class="feather icon-edit-2"></i> Uji BT
                                                                            </button>
                                                                        </div>
                                                                    <?php } ?>

                                                                    <!-- Candurin Silver Fine -->
                                                                    <?php if ($k['nama_barang'] === "CANDURIN SILVER FINE") { ?>
                                                                        <div class="btn-group" role="group">
                                                                            <button type="button" class="btn btn-primary btn-square btn-sm" data-toggle="modal" data-target="#add_ujicsf" 
                                                                                    data-id_adm_bm="<?= $k['id_adm_bm'] ?>" 
                                                                                    data-id_barang="<?= $k['id_prc_master_barang'] ?>" 
                                                                                    
                                                                                    data-no_surat_jalan="<?= $k['no_sjl'] ?>" 
                                                                                    data-no_batch="<?= $k['no_batch'] ?>" 
                                                                                    data-tgl="<?= $tgl_msk ?>" 
                                                                                    data-nama_barang="<?= $k['nama_barang'] ?>" 
                                                                                    data-nama_supplier="<?= $k['nama_supplier'] ?>" 
                                                                                    data-op_gudang="<?= $k['op_gudang'] ?>" 
                                                                                   
                                                                                    data-qty="<?= $k['jml_bm'] ?>">
                                                                                <i class="feather icon-edit-2"></i> Uji BT
                                                                            </button>
                                                                        </div>
                                                                    <?php } ?>

                                                                    <!-- Sodium Launil Sulfat -->
                                                                    <?php if ($k['nama_barang'] === "SODIUM LAUNIL SULFAT") { ?>
                                                                        <div class="btn-group" role="group">
                                                                            <button type="button" class="btn btn-primary btn-square btn-sm" data-toggle="modal" data-target="#add_ujisls" 
                                                                                    data-id_adm_bm="<?= $k['id_adm_dpb'] ?>" 
                                                                                    data-id_barang="<?= $k['id_prc_master_barang'] ?>" 
                                                                                   
                                                                                    data-no_surat_jalan="<?= $k['no_sjl'] ?>" 
                                                                                    data-no_batch="<?= $k['no_batch'] ?>" 
                                                                                    data-tgl="<?= $tgl_msk ?>" 
                                                                                    data-nama_barang="<?= $k['nama_barang'] ?>" 
                                                                                    data-nama_supplier="<?= $k['nama_supplier'] ?>" 
                                                                                    data-op_gudang="<?= $k['op_gudang'] ?>" 

                                                                                    data-qty="<?= $k['jml_bm'] ?>">
                                                                                <i class="feather icon-edit-2"></i> Uji BT
                                                                            </button>
                                                                        </div>
                                                                    <?php } ?>

                                                                    <!-- Titanium Dioxide -->
                                                                    <?php if ($k['nama_barang'] === "TITANIUM DIOXID") { ?>
                                                                        <div class="btn-group" role="group">
                                                                            <button type="button" class="btn btn-primary btn-square btn-sm" data-toggle="modal" data-target="#add_ujitd" 
                                                                                    data-id_adm_dpb="<?= $k['id_adm_dpb'] ?>" 
                                                                                    data-id_barang="<?= $k['id_prc_master_barang'] ?>" 
                                                                                   
                                                                                    data-no_surat_jalan="<?= $k['no_sjl'] ?>" 
                                                                                    data-no_batch="<?= $k['no_batch'] ?>" 
                                                                                    data-tgl="<?= $tgl_msk ?>" 
                                                                                    data-nama_barang="<?= $k['nama_barang'] ?>" 
                                                                                    data-nama_supplier="<?= $k['nama_supplier'] ?>" 
                                                                                    
                                                                                    data-qty="<?= $k['jml_bm'] ?>">
                                                                                <i class="feather icon-edit-2"></i> Uji BT
                                                                            </button>
                                                                        </div>
                                                                    <?php } ?>
                                                                    
                                                                <?php } else { ?>
                                                                    <span class="badge badge-secondary">Tidak tersedia</span>
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

<?php
// Include modal forms
$this->view('content/lab/pemeriksaan_bahan/gelatin');
$this->view('content/lab/pemeriksaan_bahan/pelarut');
$this->view('content/lab/pemeriksaan_bahan/pewarna');
$this->view('content/lab/pemeriksaan_bahan/tintaprint');
$this->view('content/lab/pemeriksaan_bahan_tambahan/natriumbenzoat');
$this->view('content/lab/pemeriksaan_bahan_tambahan/methylparaben');
$this->view('content/lab/pemeriksaan_bahan_tambahan/lecithinadlec');
$this->view('content/lab/pemeriksaan_bahan_tambahan/candurinsilverfine');
$this->view('content/lab/pemeriksaan_bahan_tambahan/sodiumlaunilsulfat');
$this->view('content/lab/pemeriksaan_bahan_tambahan/titaniumdioxide');
?>

<!-- Modal Detail -->
<div class="modal fade" id="detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Pemeriksaan Bahan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="form_add">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="no_batch">No Batch</label>
                                <input type="text" class="form-control" id="v-no_batch" name="no_batch" placeholder="No Batch" maxlength="20" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="no_surat_jalan">No. Po</label>
                                <input type="text" class="form-control" id="v-no_surat_jalan" name="no_surat_jalan" maxlength="20" placeholder="No. Po" aria-describedby="validationServer03Feedback" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tgl">Tanggal Masuk</label>
                                <input type="text" class="form-control datepicker" id="v-tgl" name="tgl" placeholder="Tanggal Masuk" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="id_barang">Nama Barang</label>
                                <input type="text" class="form-control" id="v-nama_barang" name="nama_barang" placeholder="Nama Barang" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="id_supplier">Nama Supplier</label>
                                <input type="text" class="form-control" id="v-nama_supplier" name="nama_supplier" placeholder="Nama Supplier" readonly>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="op_gudang">OP Gudang</label>
                                <input type="text" class="form-control" id="v-op_gudang" name="op_gudang" placeholder="OP Gudang" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="dok_pendukung">Dokumen Pendukung</label>
                                <input type="text" class="form-control" id="v-dok_pendukung" name="dok_pendukung" readonly>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="qty_pack">QTY Pack</label>
                                <input type="text" class="form-control" id="v-qty_pack" name="qty_pack" placeholder="QTY Pack" readonly>
                            </div>
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="jenis_kemasan">Jenis Kemasan</label>
                                <input type="text" class="form-control" id="v-jenis_kemasan" name="jenis_kemasan" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="qty">Jumlah Bahan</label>
                                <input type="text" class="form-control" id="v-qty" name="qty" placeholder="Jumlah Bahan" maxlength="15" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="jml_kemasan">Jumlah Kemasan</label>
                                <input type="text" class="form-control" id="v-jml_kemasan" name="jml_kemasan" placeholder="Jumlah Kemasan" maxlength="15" readonly>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <center><label for="pemeriksaan"><b>Hasil Pemeriksaan Fisik Kemasan</b></label></center>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Tutup</label>
                                            <input type="text" class="form-control" id="v-tutup" name="tutup" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Wadah</label>
                                            <input type="text" class="form-control" id="v-wadah" name="wadah" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Label</label>
                                            <input type="text" class="form-control" id="v-label" name="label" readonly>
                                        </div>
                                    </div>
                                    <div id="hasil_kemasan" class="col-md-4 form-group">
                                        <div>
                                            <label class="">Hasil Kemasan</label>
                                            <div>
                                                <table id="hasil_kemasan">
                                                    <tr>
                                                        <td style="width: 5%;">Di Terima</td>
                                                        <td style="width: 20%;"><input type="text" class="form-control form-control-sm w-25" id="v-diterima_kemasan" name="diterima_kemasan" readonly></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 5%;"><span class="">Di Tolak</span> </td>
                                                        <td><input type="text" class="form-control form-control-sm w-25" id="v-ditolak_kemasan" name="ditolak_kemasan" readonly></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="hasil_bahan" class="col-md-4 form-group">
                                        <div>
                                            <label class="">Hasil Bahan</label>
                                            <div>
                                                <table id="hasil_bahan">
                                                    <tr>
                                                        <td style="width: 5%;">Di Terima</td>
                                                        <td style="width: 20%;"><input type="text" class="form-control form-control-sm w-50" id="v-diterima_bahan" name="diterima_bahan" readonly></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 5%;"><span class="">Di Tolak</span> </td>
                                                        <td style="width: 20%"><input type="text" class="form-control form-control-sm w-50" id="v-ditolak_bahan" name="ditolak_bahan" readonly></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mfg">Mfg. Date</label>
                                <input type="text" class="form-control" id="v-mfg" name="mfg" placeholder="Tanggal Kadaluarsa" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exp">Exp Date</label>
                                <input type="text" class="form-control" id="v-exp" name="exp" placeholder="Tanggal Kadaluarsa" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        // Detail Modal
        $('#detail').on('show.bs.modal', function(event) {
            var data_id_adm_bm = $(event.relatedTarget).data('id_adm_bm')
            var no_surat_jalan = $(event.relatedTarget).data('no_sjl')
            var no_batch = $(event.relatedTarget).data('no_batch')
            var tgl = $(event.relatedTarget).data('tgl')
            var nama_barang = $(event.relatedTarget).data('nama_barang')
            var nama_supplier = $(event.relatedTarget).data('nama_supplier')
            var op_gudang = $(event.relatedTarget).data('op_gudang')
            var dok_pendukung = $(event.relatedTarget).data('dok_pendukung')
            var qty_pack = $(event.relatedTarget).data('qty_pack')
            var jenis_kemasan = $(event.relatedTarget).data('jenis_kemasan')
            var qty = $(event.relatedTarget).data('qty')
            var jml_kemasan = $(event.relatedTarget).data('jml_kemasan')
            var tutup = $(event.relatedTarget).data('tutup')
            var wadah = $(event.relatedTarget).data('wadah')
            var label = $(event.relatedTarget).data('label')
            var ditolak_qty = $(event.relatedTarget).data('ditolak_qty')
            var ditolak_kemasan = $(event.relatedTarget).data('ditolak_kemasan')

            $(this).find('#v-id_adm_bm').val(id_adm_bm)
            $(this).find('#v-no_surat_jalan').val(no_surat_jalan)
            $(this).find('#v-no_batch').val(no_batch)
            $(this).find('#v-tgl').val(tgl)
            $(this).find('#v-nama_barang').val(nama_barang)
            $(this).find('#v-nama_supplier').val(nama_supplier)
            $(this).find('#v-op_gudang').val(op_gudang)
            $(this).find('#v-dok_pendukung').val(dok_pendukung)
            $(this).find('#v-qty_pack').val(qty_pack)
            $(this).find('#v-jenis_kemasan').val(jenis_kemasan)
            $(this).find('#v-qty').val(qty)
            $(this).find('#v-jml_kemasan').val(jml_kemasan)
            $(this).find('#v-tutup').val(tutup)
            $(this).find('#v-wadah').val(wadah)
            $(this).find('#v-label').val(label)
            $(this).find('#v-diterima_bahan').val(qty)
            $(this).find('#v-ditolak_bahan').val(ditolak_qty)
            $(this).find('#v-diterima_kemasan').val(jml_kemasan)
            $(this).find('#v-ditolak_kemasan').val(ditolak_kemasan)
        })

        // Initialize DataTable
        $('.datatable').DataTable({
            "pageLength": 25,
            "ordering": true,
            "order": [[0, 'asc']],
            "language": {
                "search": "Cari:",
                "lengthMenu": "Tampilkan _MENU_ data per halaman",
                "zeroRecords": "Data tidak ditemukan",
                "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
                "infoEmpty": "Tidak ada data",
                "infoFiltered": "(disaring dari _MAX_ total data)",
                "paginate": {
                    "first": "Pertama",
                    "last": "Terakhir",
                    "next": "Selanjutnya",
                    "previous": "Sebelumnya"
                }
            }
        });
    });
</script>