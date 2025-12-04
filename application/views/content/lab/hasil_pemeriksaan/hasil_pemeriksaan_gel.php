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
                                    <li class="breadcrumb-item"><a href="<?= base_url() ?>">Lab/QC</a></li>
                                    <li class="breadcrumb-item"><a href="<?= base_url('lab/Hasil_pemeriksaan_lab/Hasil_pemeriksaan_gel') ?>">Hasil Pemeriksaan</a></li>
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
                                        <h5><b>Bahan Baku</b></h5>
                                    </div>

                                    <!-- Tabel Hasil Bahan Baku -->
                                    <div class="card-block table-border-style">
                                        <div class="table-responsive">
                                            <table id="bahan_baku" class="table datatable table-hover table-striped table-sm">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Tanggal Uji</th>
                                                        <th>No. Po</th>
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
                                                                    <button type="button" class="btn btn-info btn-square btn-sm" data-toggle="modal" data-target="#detail" data-id_adm_bm="<?= $k['id_adm_bm'] ?>" data-no_batch="<?= $k['no_batch'] ?>" data-no_sjl="<?= $k['no_sjl'] ?>" data-tgl="<?= $tgl_msk ?>" data-tgl_uji="<?= $tgl_uji ?>" data-no_analis="<?= $k['no_analis'] ?>" data-nama_barang="<?= $k['nama_barang'] ?>"  data-op_gudang="<?= $k['op_gudang'] ?>" data-qty="<?= $k['jml_bm'] ?>"    data-pemerian="<?= $k['pemerian'] ?>" data-kelarutan="<?= $k['kelarutan'] ?>" data-identifikasi="<?= $k['identifikasi'] ?>" data-bauzat_tl_air="<?= $k['bauzat_tl_air'] ?>" data-trans_larutan="<?= $k['trans_larutan'] ?>" data-s_pengeringan="<?= $k['s_pengeringan'] ?>" data-bloom_st="<?= $k['bloom_st'] ?>" data-viscost="<?= $k['viscost'] ?>" data-viscost_bd="<?= $k['viscost_bd'] ?>" data-ph="<?= $k['ph'] ?>" data-t_isl="<?= $k['t_isl'] ?>" data-sett_point="<?= $k['sett_point'] ?>" data-keasaman="<?= $k['keasaman'] ?>" data-sulfur_do="<?= $k['sulfur_do'] ?>" data-sisa_pmj="<?= $k['sisa_pmj'] ?>" data-uk_part_mesh4="<?= $k['uk_part_mesh4'] ?>" data-uk_part_mesh40="<?= $k['uk_part_mesh40'] ?>" data-kndtv="<?= $k['kndtv'] ?>" data-arsen="<?= $k['arsen'] ?>" data-timbal="<?= $k['timbal'] ?>" data-peroksida="<?= $k['peroksida'] ?>" data-besi="<?= $k['besi'] ?>" data-cromium="<?= $k['cromium'] ?>" data-zinc="<?= $k['zinc'] ?>" data-cm_dna_babi="<?= $k['cm_dna_babi'] ?>" data-m_tb="<?= $k['m_tb'] ?>" data-m_akk="<?= $k['m_akk'] ?>" data-m_ec="<?= $k['m_ec'] ?>" data-m_salmon="<?= $k['m_salmon'] ?>" data-wd_py="<?= $k['wd_py'] ?>" data-penguji="<?= $k['penguji'] ?>">
                                                                        <i class="feather icon-eye"></i>Details
                                                                    </button>
                                                                </div>
                                                            </td>
                                                            <!-- Aksi Approval -->
                                                            <td class="text-center">
                                                                <?php if ($jabatan === "supervisor" || $jabatan === "admin" && $k['status_barang'] === "Proses") { ?>
                                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                                        <button type="button" class="btn btn-primary btn-square btn-sm" data-toggle="modal" data-target="#released" data-id_ujigel="<?= $k['id_ujigel'] ?>" data-id_adm_bm="<?= $k['id_adm_bm'] ?>" data-id_prc_master_barang="<?= $k['id_prc_master_barang'] ?>" data-id_adm_bm="<?= $k['id_adm_bm'] ?>" data-no_batch="<?= $k['no_batch'] ?>" data-no_sjl="<?= $k['no_sjl'] ?>" data-tgl="<?= $tgl_msk ?>" data-tgl_uji="<?= $tgl_uji ?>" data-no_analis="<?= $k['no_analis'] ?>" data-nama_barang="<?= $k['nama_barang'] ?>"  data-op_gudang="<?= $k['op_gudang'] ?>" data-qty="<?= $k['jml_bm'] ?>"  data-pemerian="<?= $k['pemerian'] ?>" data-kelarutan="<?= $k['kelarutan'] ?>" data-identifikasi="<?= $k['identifikasi'] ?>" data-bauzat_tl_air="<?= $k['bauzat_tl_air'] ?>" data-trans_larutan="<?= $k['trans_larutan'] ?>" data-s_pengeringan="<?= $k['s_pengeringan'] ?>" data-bloom_st="<?= $k['bloom_st'] ?>" data-viscost="<?= $k['viscost'] ?>" data-viscost_bd="<?= $k['viscost_bd'] ?>" data-ph="<?= $k['ph'] ?>" data-t_isl="<?= $k['t_isl'] ?>" data-sett_point="<?= $k['sett_point'] ?>" data-keasaman="<?= $k['keasaman'] ?>" data-sulfur_do="<?= $k['sulfur_do'] ?>" data-sisa_pmj="<?= $k['sisa_pmj'] ?>" data-uk_part_mesh4="<?= $k['uk_part_mesh4'] ?>" data-uk_part_mesh40="<?= $k['uk_part_mesh40'] ?>" data-kndtv="<?= $k['kndtv'] ?>" data-arsen="<?= $k['arsen'] ?>" data-timbal="<?= $k['timbal'] ?>" data-peroksida="<?= $k['peroksida'] ?>" data-besi="<?= $k['besi'] ?>" data-cromium="<?= $k['cromium'] ?>" data-zinc="<?= $k['zinc'] ?>" data-cm_dna_babi="<?= $k['cm_dna_babi'] ?>" data-m_tb="<?= $k['m_tb'] ?>" data-m_akk="<?= $k['m_akk'] ?>" data-m_ec="<?= $k['m_ec'] ?>" data-m_salmon="<?= $k['m_salmon'] ?>" data-wd_py="<?= $k['wd_py'] ?>" data-penguji="<?= $k['penguji'] ?>">
                                                                            <i class="feather icon-edit-2"></i>Released
                                                                        </button>
                                                                    </div>
                                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                                        <button type="button" class="btn btn-danger btn-square btn-sm" data-toggle="modal" data-target="#reject" data-id_ujigel="<?= $k['id_ujigel'] ?>" data-id_adm_bm="<?= $k['id_adm_bm'] ?>" data-id_prc_master_barang="<?= $k['id_prc_master_barang'] ?>"  data-id_adm_bm="<?= $k['id_adm_bm'] ?>" data-no_batch="<?= $k['no_batch'] ?>" data-no_sjl="<?= $k['no_sjl'] ?>" data-tgl="<?= $tgl_msk ?>" data-tgl_uji="<?= $tgl_uji ?>" data-no_analis="<?= $k['no_analis'] ?>" data-nama_barang="<?= $k['nama_barang'] ?>"  data-op_gudang="<?= $k['op_gudang'] ?>" data-qty="<?= $k['jml_bm'] ?>" data-pemerian="<?= $k['pemerian'] ?>" data-kelarutan="<?= $k['kelarutan'] ?>" data-identifikasi="<?= $k['identifikasi'] ?>" data-bauzat_tl_air="<?= $k['bauzat_tl_air'] ?>" data-trans_larutan="<?= $k['trans_larutan'] ?>" data-s_pengeringan="<?= $k['s_pengeringan'] ?>" data-bloom_st="<?= $k['bloom_st'] ?>" data-viscost="<?= $k['viscost'] ?>" data-viscost_bd="<?= $k['viscost_bd'] ?>" data-ph="<?= $k['ph'] ?>" data-t_isl="<?= $k['t_isl'] ?>" data-sett_point="<?= $k['sett_point'] ?>" data-keasaman="<?= $k['keasaman'] ?>" data-sulfur_do="<?= $k['sulfur_do'] ?>" data-sisa_pmj="<?= $k['sisa_pmj'] ?>" data-uk_part_mesh4="<?= $k['uk_part_mesh4'] ?>" data-uk_part_mesh40="<?= $k['uk_part_mesh40'] ?>" data-kndtv="<?= $k['kndtv'] ?>" data-arsen="<?= $k['arsen'] ?>" data-timbal="<?= $k['timbal'] ?>" data-peroksida="<?= $k['peroksida'] ?>" data-besi="<?= $k['besi'] ?>" data-cromium="<?= $k['cromium'] ?>" data-zinc="<?= $k['zinc'] ?>" data-cm_dna_babi="<?= $k['cm_dna_babi'] ?>" data-m_tb="<?= $k['m_tb'] ?>" data-m_akk="<?= $k['m_akk'] ?>" data-m_ec="<?= $k['m_ec'] ?>" data-m_salmon="<?= $k['m_salmon'] ?>" data-wd_py="<?= $k['wd_py'] ?>" data-penguji="<?= $k['penguji'] ?>">
                                                                            <i class="feather icon-edit-2"></i>Reject
                                                                        </button>
                                                                    </div>
                                                                <?php } ?>

                                                                
                                                            </td>
                                                            <td>
                                                            <?php if ($k['status_barang'] === "Proses") { ?>
                                                                <?php if ($k['jenis_barang'] === "Bahan Baku"  || $k['jenis_barang'] === "BAHAN BAKU" ) { ?>
                                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                                        <button type="button" class="btn btn-primary btn-square btn-sm" data-toggle="modal" data-target="#edit_ujigel" data-id_ujigel="<?= $k['id_ujigel'] ?>" data-id_adm_bm="<?= $k['id_adm_bm'] ?>" data-id_prc_master_barang="<?= $k['id_prc_master_barang'] ?>"  data-id_adm_bm="<?= $k['id_adm_bm'] ?>" data-no_batch="<?= $k['no_batch'] ?>" data-no_sjl="<?= $k['no_sjl'] ?>" data-tgl="<?= $tgl_msk ?>" data-tgl_uji="<?= $tgl_uji ?>" data-no_analis="<?= $k['no_analis'] ?>" data-nama_barang="<?= $k['nama_barang'] ?>" data-op_gudang="<?= $k['op_gudang'] ?>" data-qty="<?= $k['jml_bm'] ?>" data-label="<?= $k['label'] ?>" data-pemerian="<?= $k['pemerian'] ?>" data-kelarutan="<?= $k['kelarutan'] ?>" data-identifikasi="<?= $k['identifikasi'] ?>" data-bauzat_tl_air="<?= $k['bauzat_tl_air'] ?>" data-trans_larutan="<?= $k['trans_larutan'] ?>" data-s_pengeringan="<?= $k['s_pengeringan'] ?>" data-bloom_st="<?= $k['bloom_st'] ?>" data-viscost="<?= $k['viscost'] ?>" data-viscost_bd="<?= $k['viscost_bd'] ?>" data-ph="<?= $k['ph'] ?>" data-t_isl="<?= $k['t_isl'] ?>" data-sett_point="<?= $k['sett_point'] ?>" data-keasaman="<?= $k['keasaman'] ?>" data-sulfur_do="<?= $k['sulfur_do'] ?>" data-sisa_pmj="<?= $k['sisa_pmj'] ?>" data-uk_part_mesh4="<?= $k['uk_part_mesh4'] ?>" data-uk_part_mesh40="<?= $k['uk_part_mesh40'] ?>" data-kndtv="<?= $k['kndtv'] ?>" data-arsen="<?= $k['arsen'] ?>" data-timbal="<?= $k['timbal'] ?>" data-peroksida="<?= $k['peroksida'] ?>" data-besi="<?= $k['besi'] ?>" data-cromium="<?= $k['cromium'] ?>" data-zinc="<?= $k['zinc'] ?>" data-cm_dna_babi="<?= $k['cm_dna_babi'] ?>" data-m_tb="<?= $k['m_tb'] ?>" data-m_akk="<?= $k['m_akk'] ?>" data-m_ec="<?= $k['m_ec'] ?>" data-m_salmon="<?= $k['m_salmon'] ?>" data-wd_py="<?= $k['wd_py'] ?>" data-penguji="<?= $k['penguji'] ?>">
                                                                            <i class="feather icon-edit-2"></i>Edit BB
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

                                                            <!-- Print Hasil -->
                                                            <td class="text-center">
                                                                <!-- Print Label Released -->
                                                                <?php if ($k['status_barang'] === "Released") { ?>
                                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                                        <a type="button" class="btn btn-success btn-square btn-sm text-light" onclick="window.open(`<?= base_url() ?>lab/Hasil_pemeriksaan_lab/Hasil_pemeriksaan_gel/pdf_label_released/<?= str_replace('/', '--', $k['no_sjl']) ?>`, 'location=yes,height=700,width=1300,scrollbars=yes,status=yes'); " data-id_adm_bm="<?= $k['id_adm_bm'] ?>" data-no_batch="<?= $k['no_batch'] ?>" data-no_sjl="<?= $k['no_sjl'] ?>">
                                                                            <i class="feather icon-file"></i>Print Label
                                                                        </a>
                                                                    </div>
                                                                <?php } ?>
                                                                <!-- Print Label Ditolak -->
                                                                <?php if ($k['status_barang'] === "Di Tolak") { ?>
                                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                                        <a type="button" class="btn btn-danger btn-square btn-sm text-light" onclick="window.open(`<?= base_url() ?>lab/Hasil_pemeriksaan_lab/Hasil_pemeriksaan_gel/pdf_label_reject/<?= str_replace('/', '--', $k['no_sjl']) ?>`, 'location=yes,height=700,width=1300,scrollbars=yes,status=yes'); " data-id_adm_bm="<?= $k['id_adm_bm'] ?>" data-no_batch="<?= $k['no_batch'] ?>" data-no_sjl="<?= $k['no_sjl'] ?>">
                                                                            <i class="feather icon-file"></i>Print Label
                                                                        </a>
                                                                    </div>
                                                                <?php } ?>
                                                                <?php if ($k['status_barang'] === "Di Tolak" || $k['status_barang'] === "Released") { ?>
                                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                                        <a type="button" class="btn btn-warning btn-square btn-sm text-light" onclick="window.open(`<?= base_url() ?>lab/Hasil_pemeriksaan_lab/Hasil_pemeriksaan_gel/pdf_label_hasil/<?= str_replace('/', '--', $k['no_sjl']) ?>`, 'location=yes,height=700,width=1300,scrollbars=yes,status=yes'); " data-id_adm_bm="<?= $k['id_adm_bm'] ?>" data-no_batch="<?= $k['no_batch'] ?>" data-no_sjl="<?= $k['no_sjl'] ?>">
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
                <h5 class="modal-title" id="exampleModalLabel">Detail Hasil Pemeriksaan Bahan Baku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <form>
                    <input type="hidden" id="v-id_ujigel" name="id_ujigel">
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
                            No. DPB
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
                    </tr>
                   
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
                            <label for="v-kelarutan" class="mt-2">Kelarutan</label>
                            <input type="text" class="form-control" id="v-kelarutan" name="kelarutan" placeholder="Kelarutan" maxlength="20" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="v-identifikasi" class="mt-2">Identifikasi</label>
                            <input type="text" class="form-control" id="v-identifikasi" name="identifikasi" placeholder="Identifikasi" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="v-bauzat_tl_air" class="mt-2">Bau dan Zat Tak Larut dalam Air</label>
                            <input type="text" class="form-control mt-4" id="v-bauzat_tl_air" name="bauzat_tl_air" placeholder="Bau dan Zat" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="v-trans_larutan" class="mt-2">Transmittance Larutan 1% pada λ 510nm</label>
                            <input type="text" class="form-control" id="v-trans_larutan" name="trans_larutan" placeholder="Transmittance Larutan" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="v-s_pengeringan" class="mt-2">Susut Pengeringan</label>
                            <input type="text" class="form-control mt-4" id="v-s_pengeringan" name="s_pengeringan" placeholder="Susut Pengeringan" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="v-bloom_st" class="mt-2">Bloom Strength</label>
                            <input type="text" class="form-control" id="v-bloom_st" name="bloom_st" placeholder="Bloom Strength" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="v-viscost" class="mt-2">Viscositas 30%</label>
                            <input type="text" class="form-control" id="v-viscost" name="viscost" placeholder="Viscositas 30%" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="v-viscost_bd" class="mt-2">Viscositas Breakdown</label>
                            <input type="text" class="form-control" id="v-viscost_bd" name="viscost_bd" placeholder="Viscositas Breakdown" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="v-ph" class="mt-2">pH</label>
                            <input type="text" class="form-control" id="v-ph" name="ph" placeholder="pH" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="v-t_isl" class="mt-2">Titik Isoelektrik</label>
                            <input type="text" class="form-control" id="v-t_isl" name="t_isl" placeholder="Titik Isoelektrik" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="v-sett_point" class="mt-2">Setting Point</label>
                            <input type="text" class="form-control" id="v-sett_point" name="sett_point" placeholder="Setting Point" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="v-keasaman" class="mt-2">Keasaman</label><br>
                            <input type="text" class="form-control" id="v-keasaman" name="keasaman" placeholder="Keasaman" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="v-sulfur_do" class="mt-2">Sulfur Dioksida</label><br>
                            <input type="text" class="form-control" id="v-sulfur_do" name="sulfur_do" placeholder="Sulfur Dioksida" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="v-sisa_pmj" class="mt-2">Sisa Pemijaran</label><br>
                            <input type="text" class="form-control" id="v-sisa_pmj" name="sisa_pmj" placeholder="Sisa Pemijaran" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="v-uk_part_mesh4" class="mt-2">Ukuran Partikel Mesh 4</label><br>
                            <input type="text" class="form-control" id="v-uk_part_mesh4" name="uk_part_mesh4" placeholder="Ukuran Partikel Mesh 4" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="v-uk_part_mesh40" class="mt-2">Ukuran Partikel Mesh 40</label><br>
                            <input type="text" class="form-control" id="v-uk_part_mesh40" name="uk_part_mesh40" placeholder="Ukuran Partikel Mesh 40" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="v-kndtv" class="mt-2">Konduktivitas</label><br>
                            <input type="text" class="form-control" id="v-kndtv" name="kndtv" placeholder="Konduktivitas" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="v-arsen" class="mt-2">Arsen (As) *)</label><br>
                            <input type="text" class="form-control" id="v-arsen" name="arsen" placeholder="Arsen" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="v-timbal" class="mt-2">Timbal (Pb) *)</label><br>
                            <input type="text" class="form-control" id="v-timbal" name="timbal" placeholder="Timbal" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="v-peroksida" class="mt-2">Peroksida *)</label><br>
                            <input type="text" class="form-control" id="v-peroksida" name="peroksida" placeholder="Peroksida" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="v-besi" class="mt-2">Besi *)</label><br>
                            <input type="text" class="form-control" id="v-besi" name="besi" placeholder="Besi" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="v-cromium" class="mt-2">Cromium *)</label><br>
                            <input type="text" class="form-control" id="v-cromium" name="cromium" placeholder="Cromium" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="v-zinc" class="mt-2">Zinc *)</label><br>
                            <input type="text" class="form-control" id="v-zinc" name="zinc" placeholder="Zinc" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="v-cm_dna_babi" class="mt-2">Cemaran DNA Babi/Porcine *)</label><br>
                            <input type="text" class="form-control mt-4" id="v-cm_dna_babi" name="cm_dna_babi" placeholder="Cemaran DNA Babi/Porcine" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="v-m_tb" class="mt-2">Mikrobiologi (Total Bakteri)</label><br>
                            <input type="text" class="form-control mt-4" id="v-m_tb" name="m_tb" placeholder="M. Total Bakteri" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="v-m_akk" class="mt-2">Mikrobiologi (Angka Kapang dan Khamir)</label><br>
                            <input type="text" class="form-control" id="v-m_akk" name="m_akk" placeholder="M. Angka Kapang dan Khamir" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="v-m_ec" class="mt-2">Mikrobiologi (Escherrichia coli)</label><br>
                            <input type="text" class="form-control" id="v-m_ec" name="m_ec" placeholder="M. Escherrichia coli" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="v-m_salmon" class="mt-2">Mikrobiologi (Salmonella)</label><br>
                            <input type="text" class="form-control" id="v-m_salmon" name="m_salmon" placeholder="M. Salmonella" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="v-wd_py" class="mt-2">Wadah dan Penyimpanan</label><br>
                            <input type="text" class="form-control" id="v-wd_py" name="wd_py" placeholder="Wadah dan Penyimpanan" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!-- <button type="submit" class="btn btn-info">Update</button> -->
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
                <form method="post" action="<?= base_url() ?>lab/Hasil_pemeriksaan_lab/Hasil_pemeriksaan_gel/add">
                    <input type="hidden" id="r-id_ujigel" name="id_ujigel">
                    <input type="hidden" id="r-id_adm_bm" name="id_adm_bm">
                    <input type="hidden" id="r-id_prc_master_barang" name="id_prc_master_barang">
                    
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
                            Jumlah Bahan <br> (Di Terima)
                        </td>
                        <td class="px-3">
                            <input type="text" class="form-control form-control-sm" id="r-qty" name="qty" placeholder="Jumlah Bahan (Di Terima)" maxlength="20" readonly>
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
                            <label for="r-no_analis" class="mt-2">No. Analisa</label><br>
                            <input type="text" class="form-control" id="r-no_analis" name="no_analis" placeholder="No. Analisa" readonly>
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
                            <label for="r-kelarutan" class="mt-2">Kelarutan</label>
                            <input type="text" class="form-control" id="r-kelarutan" name="kelarutan" placeholder="Kelarutan" maxlength="20" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="r-identifikasi" class="mt-2">Identifikasi</label>
                            <input type="text" class="form-control" id="r-identifikasi" name="identifikasi" placeholder="Identifikasi" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="r-bauzat_tl_air" class="mt-2">Bau dan Zat Tak Larut dalam Air</label>
                            <input type="text" class="form-control mt-4" id="r-bauzat_tl_air" name="bauzat_tl_air" placeholder="Bau dan Zat" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="r-trans_larutan" class="mt-2">Transmittance Larutan 1% pada λ 510nm</label>
                            <input type="text" class="form-control" id="r-trans_larutan" name="trans_larutan" placeholder="Transmittance Larutan" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="r-s_pengeringan" class="mt-2">Susut Pengeringan</label>
                            <input type="text" class="form-control mt-4" id="r-s_pengeringan" name="s_pengeringan" placeholder="Susut Pengeringan" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="r-bloom_st" class="mt-2">Bloom Strength</label>
                            <input type="text" class="form-control" id="r-bloom_st" name="bloom_st" placeholder="Bloom Strength" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="r-viscost" class="mt-2">Viscositas 30%</label>
                            <input type="text" class="form-control" id="r-viscost" name="viscost" placeholder="Viscositas 30%" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="r-viscost_bd" class="mt-2">Viscositas Breakdown</label>
                            <input type="text" class="form-control" id="r-viscost_bd" name="viscost_bd" placeholder="Viscositas Breakdown" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="r-ph" class="mt-2">pH</label>
                            <input type="text" class="form-control" id="r-ph" name="ph" placeholder="pH" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="r-t_isl" class="mt-2">Titik Isoelektrik</label>
                            <input type="text" class="form-control" id="r-t_isl" name="t_isl" placeholder="Titik Isoelektrik" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="r-sett_point" class="mt-2">Setting Point</label>
                            <input type="text" class="form-control" id="r-sett_point" name="sett_point" placeholder="Setting Point" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="r-keasaman" class="mt-2">Keasaman</label><br>
                            <input type="text" class="form-control" id="r-keasaman" name="keasaman" placeholder="Keasaman" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="r-sulfur_do" class="mt-2">Sulfur Dioksida</label><br>
                            <input type="text" class="form-control" id="r-sulfur_do" name="sulfur_do" placeholder="Sulfur Dioksida" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="r-sisa_pmj" class="mt-2">Sisa Pemijaran</label><br>
                            <input type="text" class="form-control" id="r-sisa_pmj" name="sisa_pmj" placeholder="Sisa Pemijaran" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="r-uk_part_mesh4" class="mt-2">Ukuran Partikel Mesh 4</label><br>
                            <input type="text" class="form-control" id="r-uk_part_mesh4" name="uk_part_mesh4" placeholder="Ukuran Partikel Mesh 4" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="r-uk_part_mesh40" class="mt-2">Ukuran Partikel Mesh 40</label><br>
                            <input type="text" class="form-control" id="r-uk_part_mesh40" name="uk_part_mesh40" placeholder="Ukuran Partikel Mesh 40" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="r-kndtv" class="mt-2">Konduktivitas</label><br>
                            <input type="text" class="form-control" id="r-kndtv" name="kndtv" placeholder="Konduktivitas" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="r-arsen" class="mt-2">Arsen (As) *)</label><br>
                            <input type="text" class="form-control" id="r-arsen" name="arsen" placeholder="Arsen" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="r-timbal" class="mt-2">Timbal (Pb) *)</label><br>
                            <input type="text" class="form-control" id="r-timbal" name="timbal" placeholder="Timbal" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="r-peroksida" class="mt-2">Peroksida *)</label><br>
                            <input type="text" class="form-control" id="r-peroksida" name="peroksida" placeholder="Peroksida" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="r-besi" class="mt-2">Besi *)</label><br>
                            <input type="text" class="form-control" id="r-besi" name="besi" placeholder="Besi" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="r-cromium" class="mt-2">Cromium *)</label><br>
                            <input type="text" class="form-control" id="r-cromium" name="cromium" placeholder="Cromium" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="r-zinc" class="mt-2">Zinc *)</label><br>
                            <input type="text" class="form-control" id="r-zinc" name="zinc" placeholder="Zinc" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="r-cm_dna_babi" class="mt-2">Cemaran DNA Babi/Porcine *)</label><br>
                            <input type="text" class="form-control mt-4" id="r-cm_dna_babi" name="cm_dna_babi" placeholder="Cemaran DNA Babi/Porcine" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="r-m_tb" class="mt-2">Mikrobiologi (Total Bakteri)</label><br>
                            <input type="text" class="form-control mt-4" id="r-m_tb" name="m_tb" placeholder="M. Total Bakteri" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="r-m_akk" class="mt-2">Mikrobiologi (Angka Kapang dan Khamir)</label><br>
                            <input type="text" class="form-control" id="r-m_akk" name="m_akk" placeholder="M. Angka Kapang dan Khamir" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="r-m_ec" class="mt-2">Mikrobiologi (Escherrichia coli)</label><br>
                            <input type="text" class="form-control" id="r-m_ec" name="m_ec" placeholder="M. Escherrichia coli" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="r-m_salmon" class="mt-2">Mikrobiologi (Salmonella)</label><br>
                            <input type="text" class="form-control" id="r-m_salmon" name="m_salmon" placeholder="M. Salmonella" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="r-wd_py" class="mt-2">Wadah dan Penyimpanan</label><br>
                            <input type="text" class="form-control" id="r-wd_py" name="wd_py" placeholder="Wadah dan Penyimpanan" readonly>
                        </div>
                    </div>
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
                <form method="post" action="<?= base_url() ?>lab/Hasil_pemeriksaan_lab/Hasil_pemeriksaan_gel/ditolak">
                    <input type="hidden" id="t-id_ujigel" name="id_ujigel">
                    <input type="hidden" id="t-id_adm_bm" name="id_adm_bm">
                    <input type="hidden" id="t-id_prc_master_barang" name="id_prc_master_barang">
                    
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
                            No. DPB
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
                            <label for="t-no_analis" class="mt-2">No. Analisa</label><br>
                            <input type="text" class="form-control" id="t-no_analis" name="no_analis" placeholder="No. Analisa" readonly>
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
                            <label for="t-kelarutan" class="mt-2">Kelarutan</label>
                            <input type="text" class="form-control" id="t-kelarutan" name="kelarutan" placeholder="Kelarutan" maxlength="20" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="t-identifikasi" class="mt-2">Identifikasi</label>
                            <input type="text" class="form-control" id="t-identifikasi" name="identifikasi" placeholder="Identifikasi" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="t-bauzat_tl_air" class="mt-2">Bau dan Zat Tak Larut dalam Air</label>
                            <input type="text" class="form-control" id="t-bauzat_tl_air" name="bauzat_tl_air" placeholder="Bau dan Zat" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="t-trans_larutan" class="mt-2">Transmittance Larutan 1% pada λ 510nm</label>
                            <input type="text" class="form-control" id="t-trans_larutan" name="trans_larutan" placeholder="Transmittance Larutan" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="t-s_pengeringan" class="mt-2">Susut Pengeringan</label>
                            <input type="text" class="form-control mt-4" id="t-s_pengeringan" name="s_pengeringan" placeholder="Susut Pengeringan" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="t-bloom_st" class="mt-2">Bloom Strength</label>
                            <input type="text" class="form-control" id="t-bloom_st" name="bloom_st" placeholder="Bloom Strength" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="t-viscost" class="mt-2">Viscositas 30%</label>
                            <input type="text" class="form-control" id="t-viscost" name="viscost" placeholder="Viscositas 30%" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="t-viscost_bd" class="mt-2">Viscositas Breakdown</label>
                            <input type="text" class="form-control" id="t-viscost_bd" name="viscost_bd" placeholder="Viscositas Breakdown" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="t-ph" class="mt-2">pH</label>
                            <input type="text" class="form-control" id="t-ph" name="ph" placeholder="pH" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="t-t_isl" class="mt-2">Titik Isoelektrik</label>
                            <input type="text" class="form-control" id="t-t_isl" name="t_isl" placeholder="Titik Isoelektrik" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="t-sett_point" class="mt-2">Setting Point</label>
                            <input type="text" class="form-control" id="t-sett_point" name="sett_point" placeholder="Setting Point" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="t-keasaman" class="mt-2">Keasaman</label><br>
                            <input type="text" class="form-control" id="t-keasaman" name="keasaman" placeholder="Keasaman" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="t-sulfur_do" class="mt-2">Sulfur Dioksida</label><br>
                            <input type="text" class="form-control" id="t-sulfur_do" name="sulfur_do" placeholder="Sulfur Dioksida" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="t-sisa_pmj" class="mt-2">Sisa Pemijaran</label><br>
                            <input type="text" class="form-control" id="t-sisa_pmj" name="sisa_pmj" placeholder="Sisa Pemijaran" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="t-uk_part_mesh4" class="mt-2">Ukuran Partikel Mesh 4</label><br>
                            <input type="text" class="form-control" id="t-uk_part_mesh4" name="uk_part_mesh4" placeholder="Ukuran Partikel Mesh 4" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="t-uk_part_mesh40" class="mt-2">Ukuran Partikel Mesh 40</label><br>
                            <input type="text" class="form-control" id="t-uk_part_mesh40" name="uk_part_mesh40" placeholder="Ukuran Partikel Mesh 40" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="t-kndtv" class="mt-2">Konduktivitas</label><br>
                            <input type="text" class="form-control" id="t-kndtv" name="kndtv" placeholder="Konduktivitas" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="t-arsen" class="mt-2">Arsen (As) *)</label><br>
                            <input type="text" class="form-control" id="t-arsen" name="arsen" placeholder="Arsen" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="t-timbal" class="mt-2">Timbal (Pb) *)</label><br>
                            <input type="text" class="form-control" id="t-timbal" name="timbal" placeholder="Timbal" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="t-peroksida" class="mt-2">Peroksida *)</label><br>
                            <input type="text" class="form-control" id="t-peroksida" name="peroksida" placeholder="Peroksida" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="t-besi" class="mt-2">Besi *)</label><br>
                            <input type="text" class="form-control" id="t-besi" name="besi" placeholder="Besi" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="t-cromium" class="mt-2">Cromium *)</label><br>
                            <input type="text" class="form-control" id="t-cromium" name="cromium" placeholder="Cromium" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="t-zinc" class="mt-2">Zinc *)</label><br>
                            <input type="text" class="form-control" id="t-zinc" name="zinc" placeholder="Zinc" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="t-cm_dna_babi" class="mt-2">Cemaran DNA Babi/Porcine *)</label><br>
                            <input type="text" class="form-control mt-4" id="t-cm_dna_babi" name="cm_dna_babi" placeholder="Cemaran DNA Babi/Porcine" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="t-m_tb" class="mt-2">Mikrobiologi (Total Bakteri)</label><br>
                            <input type="text" class="form-control mt-4" id="t-m_tb" name="m_tb" placeholder="M. Total Bakteri" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="t-m_akk" class="mt-2">Mikrobiologi (Angka Kapang dan Khamir)</label><br>
                            <input type="text" class="form-control" id="t-m_akk" name="m_akk" placeholder="M. Angka Kapang dan Khamir" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="t-m_ec" class="mt-2">Mikrobiologi (Escherrichia coli)</label><br>
                            <input type="text" class="form-control" id="t-m_ec" name="m_ec" placeholder="M. Escherrichia coli" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="t-m_salmon" class="mt-2">Mikrobiologi (Salmonella)</label><br>
                            <input type="text" class="form-control" id="t-m_salmon" name="m_salmon" placeholder="M. Salmonella" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="t-wd_py" class="mt-2">Wadah dan Penyimpanan</label><br>
                            <input type="text" class="form-control" id="t-wd_py" name="wd_py" placeholder="Wadah dan Penyimpanan" readonly>
                        </div>
                    </div>
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
            var id_adm_bm = $(event.relatedTarget).data('id_adm_bm')
            var no_sjl = $(event.relatedTarget).data('no_sjl')
            var no_batch = $(event.relatedTarget).data('no_batch')
            var tgl = $(event.relatedTarget).data('tgl')
            var tgl_uji = $(event.relatedTarget).data('tgl_uji')
            var no_analis = $(event.relatedTarget).data('no_analis')
            var dok_pendukung = $(event.relatedTarget).data('dok_pendukung')
            var jenis_kemasan = $(event.relatedTarget).data('jenis_kemasan')
            var jml_kemasan = $(event.relatedTarget).data('jml_kemasan')
            var ditolak_kemasan = $(event.relatedTarget).data('ditolak_kemasan')
            var qty = $(event.relatedTarget).data('qty')
            var ditolak_qty = $(event.relatedTarget).data('ditolak_qty')
            var exp = $(event.relatedTarget).data('exp')
            var mfg = $(event.relatedTarget).data('mfg')
            var nama_barang = $(event.relatedTarget).data('nama_barang')
           
            var op_gudang = $(event.relatedTarget).data('op_gudang')
            var pemerian = $(event.relatedTarget).data('pemerian')
            var kelarutan = $(event.relatedTarget).data('kelarutan')
            var identifikasi = $(event.relatedTarget).data('identifikasi')
            var bauzat_tl_air = $(event.relatedTarget).data('bauzat_tl_air')
            var trans_larutan = $(event.relatedTarget).data('trans_larutan')
            var s_pengeringan = $(event.relatedTarget).data('s_pengeringan')
            var bloom_st = $(event.relatedTarget).data('bloom_st')
            var viscost = $(event.relatedTarget).data('viscost')
            var viscost_bd = $(event.relatedTarget).data('viscost_bd')
            var ph = $(event.relatedTarget).data('ph')
            var t_isl = $(event.relatedTarget).data('t_isl')
            var sett_point = $(event.relatedTarget).data('sett_point')
            var keasaman = $(event.relatedTarget).data('keasaman')
            var sulfur_do = $(event.relatedTarget).data('sulfur_do')
            var sisa_pmj = $(event.relatedTarget).data('sisa_pmj')
            var uk_part_mesh4 = $(event.relatedTarget).data('uk_part_mesh4')
            var uk_part_mesh40 = $(event.relatedTarget).data('uk_part_mesh40')
            var kndtv = $(event.relatedTarget).data('kndtv')
            var arsen = $(event.relatedTarget).data('arsen')
            var timbal = $(event.relatedTarget).data('timbal')
            var peroksida = $(event.relatedTarget).data('peroksida')
            var besi = $(event.relatedTarget).data('besi')
            var cromium = $(event.relatedTarget).data('cromium')
            var zinc = $(event.relatedTarget).data('zinc')
            var cm_dna_babi = $(event.relatedTarget).data('cm_dna_babi')
            var m_tb = $(event.relatedTarget).data('m_tb')
            var m_akk = $(event.relatedTarget).data('m_akk')
            var m_ec = $(event.relatedTarget).data('m_ec')
            var m_salmon = $(event.relatedTarget).data('m_salmon')
            var wd_py = $(event.relatedTarget).data('wd_py')
            var penguji = $(event.relatedTarget).data('penguji')
            var tutup = $(event.relatedTarget).data('tutup')
            var wadah = $(event.relatedTarget).data('wadah')
            var label = $(event.relatedTarget).data('label')

            $(this).find('#v-id_adm_bm').val(id_adm_bm)
            $(this).find('#v-no_sjl').val(no_sjl)
            $(this).find('#v-no_batch').val(no_batch)
            $(this).find('#v-tgl').val(tgl)
            $(this).find('#v-tgl_uji').val(tgl_uji)
            $(this).find('#v-no_analis').val(no_analis)
            $(this).find('#v-dok_pendukung').val(dok_pendukung)
            $(this).find('#v-jenis_kemasan').val(jenis_kemasan)
            $(this).find('#v-jml_kemasan').val(jml_kemasan)
            $(this).find('#v-ditolak_kemasan').val(ditolak_kemasan)
            $(this).find('#v-qty').val(qty)
            $(this).find('#v-ditolak_qty').val(ditolak_qty)
            $(this).find('#v-exp').val(exp)
            $(this).find('#v-mfg').val(mfg)
            $(this).find('#v-nama_barang').val(nama_barang)
           
            $(this).find('#v-op_gudang').val(op_gudang)
            $(this).find('#v-pemerian').val(pemerian)
            $(this).find('#v-kelarutan').val(kelarutan)
            $(this).find('#v-identifikasi').val(identifikasi)
            $(this).find('#v-bauzat_tl_air').val(bauzat_tl_air)
            $(this).find('#v-trans_larutan').val(trans_larutan)
            $(this).find('#v-s_pengeringan').val(s_pengeringan)
            $(this).find('#v-bloom_st').val(bloom_st)
            $(this).find('#v-viscost').val(viscost)
            $(this).find('#v-bauzat_tl_air').val(bauzat_tl_air)
            $(this).find('#v-trans_larutan').val(trans_larutan)
            $(this).find('#v-s_pengeringan').val(s_pengeringan)
            $(this).find('#v-bloom_st').val(bloom_st)
            $(this).find('#v-viscost').val(viscost)
            $(this).find('#v-viscost_bd').val(viscost_bd)
            $(this).find('#v-ph').val(ph)
            $(this).find('#v-t_isl').val(t_isl)
            $(this).find('#v-sett_point').val(sett_point)
            $(this).find('#v-keasaman').val(keasaman)
            $(this).find('#v-sulfur_do').val(sulfur_do)
            $(this).find('#v-sisa_pmj').val(sisa_pmj)
            $(this).find('#v-uk_part_mesh4').val(uk_part_mesh4)
            $(this).find('#v-uk_part_mesh40').val(uk_part_mesh40)
            $(this).find('#v-kndtv').val(kndtv)
            $(this).find('#v-arsen').val(arsen)
            $(this).find('#v-timbal').val(timbal)
            $(this).find('#v-peroksida').val(peroksida)
            $(this).find('#v-besi').val(besi)
            $(this).find('#v-cromium').val(cromium)
            $(this).find('#v-zinc').val(zinc)
            $(this).find('#v-cm_dna_babi').val(cm_dna_babi)
            $(this).find('#v-m_tb').val(m_tb)
            $(this).find('#v-m_akk').val(m_akk)
            $(this).find('#v-m_ec').val(m_ec)
            $(this).find('#v-m_salmon').val(m_salmon)
            $(this).find('#v-wd_py').val(wd_py)
            $(this).find('#v-penguji').val(penguji)
            $(this).find('#v-tutup').val(tutup)
            $(this).find('#v-wadah').val(wadah)
            $(this).find('#v-label').val(label)

        })

    })
</script>

<!-- Script Modal Approval Released-->
<script type="text/javascript">
    $(document).ready(function() {
        $('#released').on('show.bs.modal', function(event) {
            var id_ujigel = $(event.relatedTarget).data('id_ujigel')
            var id_prc_master_barang = $(event.relatedTarget).data('id_prc_master_barang')
            
            var id_adm_bm = $(event.relatedTarget).data('id_adm_bm')
            var no_sjl = $(event.relatedTarget).data('no_sjl')
            var no_batch = $(event.relatedTarget).data('no_batch')
            var tgl = $(event.relatedTarget).data('tgl')
            var tgl_uji = $(event.relatedTarget).data('tgl_uji')
            var no_analis = $(event.relatedTarget).data('no_analis')
            var dok_pendukung = $(event.relatedTarget).data('dok_pendukung')
            var jenis_kemasan = $(event.relatedTarget).data('jenis_kemasan')
            var jml_kemasan = $(event.relatedTarget).data('jml_kemasan')
            var ditolak_kemasan = $(event.relatedTarget).data('ditolak_kemasan')
            var qty = $(event.relatedTarget).data('qty')
            var ditolak_qty = $(event.relatedTarget).data('ditolak_qty')
            var exp = $(event.relatedTarget).data('exp')
            var mfg = $(event.relatedTarget).data('mfg')
            var nama_barang = $(event.relatedTarget).data('nama_barang')
            
            var op_gudang = $(event.relatedTarget).data('op_gudang')
            var pemerian = $(event.relatedTarget).data('pemerian')
            var kelarutan = $(event.relatedTarget).data('kelarutan')
            var identifikasi = $(event.relatedTarget).data('identifikasi')
            var bauzat_tl_air = $(event.relatedTarget).data('bauzat_tl_air')
            var trans_larutan = $(event.relatedTarget).data('trans_larutan')
            var s_pengeringan = $(event.relatedTarget).data('s_pengeringan')
            var bloom_st = $(event.relatedTarget).data('bloom_st')
            var viscost = $(event.relatedTarget).data('viscost')
            var viscost_bd = $(event.relatedTarget).data('viscost_bd')
            var ph = $(event.relatedTarget).data('ph')
            var t_isl = $(event.relatedTarget).data('t_isl')
            var sett_point = $(event.relatedTarget).data('sett_point')
            var keasaman = $(event.relatedTarget).data('keasaman')
            var sulfur_do = $(event.relatedTarget).data('sulfur_do')
            var sisa_pmj = $(event.relatedTarget).data('sisa_pmj')
            var uk_part_mesh4 = $(event.relatedTarget).data('uk_part_mesh4')
            var uk_part_mesh40 = $(event.relatedTarget).data('uk_part_mesh40')
            var kndtv = $(event.relatedTarget).data('kndtv')
            var arsen = $(event.relatedTarget).data('arsen')
            var timbal = $(event.relatedTarget).data('timbal')
            var peroksida = $(event.relatedTarget).data('peroksida')
            var besi = $(event.relatedTarget).data('besi')
            var cromium = $(event.relatedTarget).data('cromium')
            var zinc = $(event.relatedTarget).data('zinc')
            var cm_dna_babi = $(event.relatedTarget).data('cm_dna_babi')
            var m_tb = $(event.relatedTarget).data('m_tb')
            var m_akk = $(event.relatedTarget).data('m_akk')
            var m_ec = $(event.relatedTarget).data('m_ec')
            var m_salmon = $(event.relatedTarget).data('m_salmon')
            var wd_py = $(event.relatedTarget).data('wd_py')
            var penguji = $(event.relatedTarget).data('penguji')
            var tutup = $(event.relatedTarget).data('tutup')
            var wadah = $(event.relatedTarget).data('wadah')
            var label = $(event.relatedTarget).data('label')

            $(this).find('#r-id_ujigel').val(id_ujigel)
            $(this).find('#r-id_prc_master_barang').val(id_prc_master_barang)
            
            $(this).find('#r-id_adm_bm').val(id_adm_bm)
            $(this).find('#r-no_sjl').val(no_sjl)
            $(this).find('#r-no_batch').val(no_batch)
            $(this).find('#r-tgl').val(tgl)
            $(this).find('#r-tgl_uji').val(tgl_uji)
            $(this).find('#r-no_analis').val(no_analis)
            $(this).find('#r-dok_pendukung').val(dok_pendukung)
            $(this).find('#r-jenis_kemasan').val(jenis_kemasan)
            $(this).find('#r-jml_kemasan').val(jml_kemasan)
            $(this).find('#r-ditolak_kemasan').val(ditolak_kemasan)
            $(this).find('#r-qty').val(qty)
            $(this).find('#r-ditolak_qty').val(ditolak_qty)
            $(this).find('#r-exp').val(exp)
            $(this).find('#r-mfg').val(mfg)
            $(this).find('#r-nama_barang').val(nama_barang)
           
            $(this).find('#r-op_gudang').val(op_gudang)
            $(this).find('#r-pemerian').val(pemerian)
            $(this).find('#r-kelarutan').val(kelarutan)
            $(this).find('#r-identifikasi').val(identifikasi)
            $(this).find('#r-bauzat_tl_air').val(bauzat_tl_air)
            $(this).find('#r-trans_larutan').val(trans_larutan)
            $(this).find('#r-s_pengeringan').val(s_pengeringan)
            $(this).find('#r-bloom_st').val(bloom_st)
            $(this).find('#r-viscost').val(viscost)
            $(this).find('#r-bauzat_tl_air').val(bauzat_tl_air)
            $(this).find('#r-trans_larutan').val(trans_larutan)
            $(this).find('#r-s_pengeringan').val(s_pengeringan)
            $(this).find('#r-bloom_st').val(bloom_st)
            $(this).find('#r-viscost').val(viscost)
            $(this).find('#r-viscost_bd').val(viscost_bd)
            $(this).find('#r-ph').val(ph)
            $(this).find('#r-t_isl').val(t_isl)
            $(this).find('#r-sett_point').val(sett_point)
            $(this).find('#r-keasaman').val(keasaman)
            $(this).find('#r-sulfur_do').val(sulfur_do)
            $(this).find('#r-sisa_pmj').val(sisa_pmj)
            $(this).find('#r-uk_part_mesh4').val(uk_part_mesh4)
            $(this).find('#r-uk_part_mesh40').val(uk_part_mesh40)
            $(this).find('#r-kndtv').val(kndtv)
            $(this).find('#r-arsen').val(arsen)
            $(this).find('#r-timbal').val(timbal)
            $(this).find('#r-peroksida').val(peroksida)
            $(this).find('#r-besi').val(besi)
            $(this).find('#r-cromium').val(cromium)
            $(this).find('#r-zinc').val(zinc)
            $(this).find('#r-cm_dna_babi').val(cm_dna_babi)
            $(this).find('#r-m_tb').val(m_tb)
            $(this).find('#r-m_akk').val(m_akk)
            $(this).find('#r-m_ec').val(m_ec)
            $(this).find('#r-m_salmon').val(m_salmon)
            $(this).find('#r-wd_py').val(wd_py)
            $(this).find('#r-penguji').val(penguji)
            $(this).find('#r-tutup').val(tutup)
            $(this).find('#r-wadah').val(wadah)
            $(this).find('#r-label').val(label)
            $(this).find('#tgl_rilis').datepicker({
                autoclose: true,
                format: "dd/mm/yyyy"
            }).on('show.bs.modal', function(event) {
                // prevent datepicker from firing bootstrap modal "show.bs.modal"
                event.stopPropagation();

            });
        })

        $('#tgl_rilis').on('change', function() {
            const tgl_rilis = $(this).val()
            const tgl_uu = moment(tgl_rilis, "DD/MM/YYYY").add('months', 6).format('DD/MM/YYYY')
            $('#tgl_uu').val(tgl_uu)
        })
    })
</script>

<!-- Script Modal Approval Reject -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#reject').on('show.bs.modal', function(event) {
            var id_ujigel = $(event.relatedTarget).data('id_ujigel')
            var id_prc_master_barang = $(event.relatedTarget).data('id_prc_master_barang')
            
            var id_adm_bm = $(event.relatedTarget).data('id_adm_bm')
            var no_sjl = $(event.relatedTarget).data('no_sjl')
            var no_batch = $(event.relatedTarget).data('no_batch')
            var tgl = $(event.relatedTarget).data('tgl')
            var tgl_uji = $(event.relatedTarget).data('tgl_uji')
            var no_analis = $(event.relatedTarget).data('no_analis')
            var tgl_reject = $(event.relatedTarget).data('tgl_reject')
            var dok_pendukung = $(event.relatedTarget).data('dok_pendukung')
            var jenis_kemasan = $(event.relatedTarget).data('jenis_kemasan')
            var jml_kemasan = $(event.relatedTarget).data('jml_kemasan')
            var ditolak_kemasan = $(event.relatedTarget).data('ditolak_kemasan')
            var qty = $(event.relatedTarget).data('qty')
            var ditolak_qty = $(event.relatedTarget).data('ditolak_qty')
            var exp = $(event.relatedTarget).data('exp')
            var mfg = $(event.relatedTarget).data('mfg')
            var nama_barang = $(event.relatedTarget).data('nama_barang')
            
            var op_gudang = $(event.relatedTarget).data('op_gudang')
            var pemerian = $(event.relatedTarget).data('pemerian')
            var kelarutan = $(event.relatedTarget).data('kelarutan')
            var identifikasi = $(event.relatedTarget).data('identifikasi')
            var bauzat_tl_air = $(event.relatedTarget).data('bauzat_tl_air')
            var trans_larutan = $(event.relatedTarget).data('trans_larutan')
            var s_pengeringan = $(event.relatedTarget).data('s_pengeringan')
            var bloom_st = $(event.relatedTarget).data('bloom_st')
            var viscost = $(event.relatedTarget).data('viscost')
            var viscost_bd = $(event.relatedTarget).data('viscost_bd')
            var ph = $(event.relatedTarget).data('ph')
            var t_isl = $(event.relatedTarget).data('t_isl')
            var sett_point = $(event.relatedTarget).data('sett_point')
            var keasaman = $(event.relatedTarget).data('keasaman')
            var sulfur_do = $(event.relatedTarget).data('sulfur_do')
            var sisa_pmj = $(event.relatedTarget).data('sisa_pmj')
            var uk_part_mesh4 = $(event.relatedTarget).data('uk_part_mesh4')
            var uk_part_mesh40 = $(event.relatedTarget).data('uk_part_mesh40')
            var kndtv = $(event.relatedTarget).data('kndtv')
            var arsen = $(event.relatedTarget).data('arsen')
            var timbal = $(event.relatedTarget).data('timbal')
            var peroksida = $(event.relatedTarget).data('peroksida')
            var besi = $(event.relatedTarget).data('besi')
            var cromium = $(event.relatedTarget).data('cromium')
            var zinc = $(event.relatedTarget).data('zinc')
            var cm_dna_babi = $(event.relatedTarget).data('cm_dna_babi')
            var m_tb = $(event.relatedTarget).data('m_tb')
            var m_akk = $(event.relatedTarget).data('m_akk')
            var m_ec = $(event.relatedTarget).data('m_ec')
            var m_salmon = $(event.relatedTarget).data('m_salmon')
            var wd_py = $(event.relatedTarget).data('wd_py')
            var penguji = $(event.relatedTarget).data('penguji')
            var tutup = $(event.relatedTarget).data('tutup')
            var wadah = $(event.relatedTarget).data('wadah')
            var label = $(event.relatedTarget).data('label')

            $(this).find('#t-id_ujigel').val(id_ujigel)
            $(this).find('#t-id_prc_master_barang').val(id_prc_master_barang)
           
            $(this).find('#t-id_adm_bm').val(id_adm_bm)
            $(this).find('#t-no_sjl').val(no_sjl)
            $(this).find('#t-no_batch').val(no_batch)
            $(this).find('#t-tgl').val(tgl)
            $(this).find('#t-tgl_uji').val(tgl_uji)
            $(this).find('#t-no_analis').val(no_analis)
            $(this).find('#t-dok_pendukung').val(dok_pendukung)
            $(this).find('#t-jenis_kemasan').val(jenis_kemasan)
            $(this).find('#t-jml_kemasan').val(jml_kemasan)
            $(this).find('#t-ditolak_kemasan').val(ditolak_kemasan)
            $(this).find('#t-jenis_kemasan').val(jenis_kemasan)
            $(this).find('#t-qty').val(qty)
            $(this).find('#t-ditolak_qty').val(ditolak_qty)
            $(this).find('#t-exp').val(exp)
            $(this).find('#t-mfg').val(mfg)
            $(this).find('#t-nama_barang').val(nama_barang)
            
            $(this).find('#t-op_gudang').val(op_gudang)
            $(this).find('#t-pemerian').val(pemerian)
            $(this).find('#t-kelarutan').val(kelarutan)
            $(this).find('#t-identifikasi').val(identifikasi)
            $(this).find('#t-bauzat_tl_air').val(bauzat_tl_air)
            $(this).find('#t-trans_larutan').val(trans_larutan)
            $(this).find('#t-s_pengeringan').val(s_pengeringan)
            $(this).find('#t-bloom_st').val(bloom_st)
            $(this).find('#t-viscost').val(viscost)
            $(this).find('#t-bauzat_tl_air').val(bauzat_tl_air)
            $(this).find('#t-trans_larutan').val(trans_larutan)
            $(this).find('#t-s_pengeringan').val(s_pengeringan)
            $(this).find('#t-bloom_st').val(bloom_st)
            $(this).find('#t-viscost').val(viscost)
            $(this).find('#t-viscost_bd').val(viscost_bd)
            $(this).find('#t-ph').val(ph)
            $(this).find('#t-t_isl').val(t_isl)
            $(this).find('#t-sett_point').val(sett_point)
            $(this).find('#t-keasaman').val(keasaman)
            $(this).find('#t-sulfur_do').val(sulfur_do)
            $(this).find('#t-sisa_pmj').val(sisa_pmj)
            $(this).find('#t-uk_part_mesh4').val(uk_part_mesh4)
            $(this).find('#t-uk_part_mesh40').val(uk_part_mesh40)
            $(this).find('#t-kndtv').val(kndtv)
            $(this).find('#t-arsen').val(arsen)
            $(this).find('#t-timbal').val(timbal)
            $(this).find('#t-peroksida').val(peroksida)
            $(this).find('#t-besi').val(besi)
            $(this).find('#t-cromium').val(cromium)
            $(this).find('#t-zinc').val(zinc)
            $(this).find('#t-cm_dna_babi').val(cm_dna_babi)
            $(this).find('#t-m_tb').val(m_tb)
            $(this).find('#t-m_akk').val(m_akk)
            $(this).find('#t-m_ec').val(m_ec)
            $(this).find('#t-m_salmon').val(m_salmon)
            $(this).find('#t-wd_py').val(wd_py)
            $(this).find('#t-penguji').val(penguji)
            $(this).find('#t-tutup').val(tutup)
            $(this).find('#t-wadah').val(wadah)
            $(this).find('#t-label').val(label)
            $(this).find('#tgl_reject').datepicker({
                autoclose: true,
                format: "dd/mm/yyyy"
            }).on('show.bs.modal', function(event) {
                // prevent datepicker from firing bootstrap modal "show.bs.modal"
                event.stopPropagation();
            });
        })
    })
</script>
</div>
<?php
    $this->view('content/lab/pemeriksaan_bahan/gelatin_edit');
?>