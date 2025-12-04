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
                                    <li class="breadcrumb-item">
                                        <a href="<?= base_url() ?>"><i class="feather icon-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="javascript:">Purchasing</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:">PO Reg</a></li>
                                    <li class="breadcrumb-item">
                                        <a href="<?= base_url('Purchasing/PO_Reg/Prc_po_reg') ?>">PO Reg</a>
                                    </li>
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
                                        <h5>Data PO Reg <b>(Approval)</b></h5>

                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#add">
                                            <i class="feather icon-plus"></i>Tambah Data
                                        </button>
                                    </div>
                                    <div class="card-block table-border-style">
                                        <div class="table-responsive">
                                            <table class="table datatable table-hover table-striped table-sm">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th class="text-center">Tanggal</th>
                                                        <th class="text-center">No PO Reg</th>
                                                        <th class="text-center">Details</th>
                                                        <th class="text-center">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $level = $this->session->userdata('level');
                                                    $no = 1;
                                                    foreach ($result as $k) {
                                                        // Split and format the date as dd/mm/yyyy
                                                        $tgl_po_reg = implode('/', array_reverse(explode('-', $k['tgl_po_reg'])));
                                                    ?>
                                                        <tr>
                                                            <th scope="row"><?= $no++ ?></th>
                                                            <td class="text-center"><?= $tgl_po_reg ?></td>
                                                            <td class="text-center"><?= $k['no_po_reg'] ?></td>
                                                            <td class="text-center">
                                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                                    <button type="button" class="btn btn-info btn-square btn-sm" data-toggle="modal" data-target="#detail"
                                                                        data-id_prc_po_reg="<?= $k['id_prc_po_reg'] ?>"
                                                                        data-no_po_reg="<?= $k['no_po_reg'] ?>"
                                                                        data-tgl_po_reg="<?= $tgl_po_reg ?>"
                                                                        data-id_prc_master_barang="<?= $k['id_prc_master_barang'] ?>"
                                                                        data-id_supplier="<?= $k['id_supplier'] ?>"
                                                                        data-jumlah="<?= $k['jumlah'] ?>"
                                                                        data-harga_perunit="<?= $k['harga_perunit'] ?>"
                                                                        data-total_value="<?= $k['total_value'] ?>"
                                                                        data-metode="<?= $k['metode'] ?>"
                                                                        data-shipment="<?= $k['shipment'] ?>"
                                                                        data-pic1="<?= $k['pic1'] ?>"
                                                                        data-pic2="<?= $k['pic2'] ?>"
                                                                        data-no_ppb="<?= $k['no_ppb'] ?>"
                                                                        data-harga_netto="<?= $k['harga_netto'] ?>"
                                                                        data-pajak="<?= $k['pajak'] ?>"
                                                                        data-total_harga="<?= $k['total_harga'] ?>"
                                                                        data-prc_admin="<?= $k['prc_admin'] ?>"
                                                                        data-spek="<?= $k['spek'] ?>"
                                                                        data-nama_barang="<?= $k['nama_barang'] ?>"
                                                                        data-golongan="<?= $k['golongan'] ?>"
                                                                        data-nama_supplier="<?= $k['nama_supplier'] ?>"
                                                                    >
                                                                        <i class="feather icon-eye"></i>Details
                                                                    </button>
                                                                </div>
                                                            </td>
                                                            <td class="text-center">
                                                                <?php if ($level === "admin") { ?>
                                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                                        <button type="button" class="btn btn-primary btn-square btn-sm" data-toggle="modal" data-target="#edit"
                                                                            data-id_prc_po_reg="<?= $k['id_prc_po_reg'] ?>"
                                                                            data-no_po_reg="<?= $k['no_po_reg'] ?>"
                                                                            data-tgl_po_reg="<?= $tgl_po_reg ?>"
                                                                            data-id_prc_master_barang="<?= $k['id_prc_master_barang'] ?>"
                                                                            data-id_supplier="<?= $k['id_supplier'] ?>"
                                                                            data-jumlah="<?= $k['jumlah'] ?>"
                                                                            data-harga_perunit="<?= $k['harga_perunit'] ?>"
                                                                            data-total_harga="<?= $k['total_harga'] ?>"
                                                                            data-total_value="<?= $k['total_value'] ?>"
                                                                            data-metode="<?= $k['metode'] ?>"
                                                                            data-shipment="<?= $k['shipment'] ?>"
                                                                            data-pic1="<?= $k['pic1'] ?>"
                                                                            data-pic2="<?= $k['pic2'] ?>"
                                                                            data-no_ppb="<?= $k['no_ppb'] ?>"
                                                                            data-harga_netto="<?= $k['harga_netto'] ?>"
                                                                            data-pajak="<?= $k['pajak'] ?>"
                                                                            data-prc_admin="<?= $k['prc_admin'] ?>"
                                                                            data-spek="<?= $k['spek'] ?>"
                                                                            data-nama_barang="<?= $k['nama_barang'] ?>"
                                                                            data-golongan="<?= $k['golongan'] ?>"
                                                                        >
                                                                            <i class="feather icon-edit-2"></i>Edit
                                                                        </button>
                                                                    </div>
                                                                    <div class="btn-group" role="group">
                                                                        <a href="<?= base_url() ?>Purchasing/PO_Reg/Prc_po_reg/delete/<?= $k['id_prc_po_reg'] ?>" class="btn btn-danger btn-square text-light btn-sm" onclick="if (!confirm('Apakah Anda Yakin?')) { return false; }">
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
                        <!-- [ Main Content ] end -->
                    </div>
                </div>
            </div>
        </div>
    </div>                         
</section>
                                                                                                                                                                   
<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah PO Reg</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="form_add" action="<?= base_url() ?>Purchasing/PO_Reg/Prc_po_reg/add/">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tgl_po_reg">Tanggal PO Reg</label>
                                <input type="text" class="form-control datepicker" id="tgl_po_reg" name="tgl_po_reg" placeholder="Tanggal PO Reg" autocomplete="off" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="no_po_reg">No PO Reg</label>
                                <input type="text" class="form-control" id="no_po_reg" name="no_po_reg" maxlength="20" placeholder="No PO Reg" aria-describedby="validationServer03Feedback" autocomplete="off" required>
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    Maaf Nomor PO Import sudah ada.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="id_supplier">Nama Supplier</label>
                                <select class="form-control chosen-select" id="id_supplier" name="id_supplier" required>
                                    <option value="" disabled selected hidden>- Pilih Nama Supplier -</option>
                                    <?php foreach ($res_supplier as $s): ?>
                                    <option value="<?= $s['id_supplier'] ?>" data-nama_supplier="<?= $s['nama_supplier'] ?>" data-golongan="<?= $s['golongan'] ?>"><?= $s['nama_supplier'] ?> (<?= $s['golongan'] ?>)</option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="golongan">Golongan</label>
                                <input type="text" class="form-control" id="golongan" name="golongan" placeholder="golongan" readonly>
                            </div>
                        </div>
                                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="id_prc_master_barang">Nama Barang</label>
                                <select class="form-control chosen-select" id="id_prc_master_barang" name="id_prc_master_barang" required>
                                    <option value="" disabled selected hidden>- Pilih Nama Barang -</option>
                                    <?php foreach ($res_barang as $b): ?>
                                    <option value="<?= $b['id_prc_master_barang'] ?>" 
                                    data-spek="<?= $b['spek'] ?>"><?= $b['nama_barang'] ?> (<?= $b['spek'] ?>)</option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="spek">Spesifikasi</label>
                                <input type="text" class="form-control" id="spek" name="spek" placeholder="spek" readonly>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="jumlah">Jumlah</label>
                                <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah" oninput="calculateTotal()">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="harga_perunit">Harga Perunit</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1" style="font-size: small;">Rp</span>
                                    </div>
                                    <input type="text" class="form-control" id="harga_perunit" name="harga_perunit" placeholder="Harga Perunit" required>
                                </div>             
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="total_value">Total Value</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1" style="font-size: small;">Rp</span>
                                    </div>
                                    <input type="text" class="form-control" id="total_value" name="total_value" placeholder="Total Value" readonly>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="metode">Metode</label>
                                <input type="text" class="form-control" id="metode" name="metode" placeholder="Metode">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="shipment">Shipment</label>
                                <input type="text" class="form-control" id="shipment" name="shipment" placeholder="Shipment">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="pic1">PIC Kapsulindo 1</label>
                                <input type="text" class="form-control" id="pic1" name="pic1" placeholder="Pic1">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="pic2">PIC Kapsulindo 2</label>
                                <input type="text" class="form-control" id="pic2" name="pic2" placeholder="Pic2">
                            </div>  
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="no_ppb">No PPB</label>
                                <input type="text" class="form-control" id="no_ppb" name="no_ppb" placeholder="NO PPB">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="harga_netto">Harga Netto</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1" style="font-size: small;">Rp</span>
                                    </div>
                                    <input type="text" class="form-control" id="harga_netto" name="harga_netto" placeholder="Harga Netto" readonly>
                                </div>                           
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="pajak">Pajak</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1" style="font-size: small;">Rp</span>
                                    </div>
                                    <input type="text" class="form-control" id="pajak" name="pajak" placeholder="Pajak" required>
                                </div>             
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="total_harga">Total Harga</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1" style="font-size: small;">Rp</span>
                                    </div>
                                    <input type="text" class="form-control" id="total_harga" name="total_harga" placeholder="Total Harga" readonly>
                                </div>                            
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="prc_admin">Prc Admin</label>
                                <input type="text" class="form-control" id="prc_admin" name="prc_admin" value="<?= $this->session->userdata('nama_operator') ?>" maxlength="20" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="simpan" class="btn btn-primary" onclick="if (! confirm('Apakah Anda Yakin Untuk Menimpan Data Ini? Tolong Untuk Di Check Kembali. Dan Jangan Lupa Untuk Menginputkan Barangnya')) { return false; }">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {

  function calculateTotal() {
    var jumlah = parseFloat($('#jumlah').val()) || 0; 
    var hargaPerUnit = parseFloat($('#harga_perunit').val()) || 0;
    var totalValue = jumlah * hargaPerUnit; 

    $('#total_value').val(totalValue);
    $('#harga_netto').val(totalValue);  
  }

  function calculateTotalHarga() {
    var hargaNetto = parseFloat($('#harga_netto').val()) || 0;
    var pajak = parseFloat($('#pajak').val()) || 0;
    var totalHarga = hargaNetto + pajak;  

    $('#total_harga').val(totalHarga); 
  }

  $('#jumlah').on('input', calculateTotal);
  $('#harga_perunit').on('input', calculateTotal);
  $('#pajak').on('input', calculateTotalHarga);

  $('#id_prc_master_barang').change(function() {
    var selectedOption = $(this).find('option:selected');
    var spek = selectedOption.data('spek');
    $('#spek').val(spek);  
  });

  $('#id_supplier').change(function() {
    var selectedOption = $(this).find('option:selected');
    var golongan = selectedOption.data('golongan');
    $('#golongan').val(golongan);  
  });

});
</script>


<!-- Modal Detail -->
<div class="modal fade" id="detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail PO Reg</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="form_add">
                <div class="modal-body">
                    <div class="row">

                        <!-- Tanggal PO Reg -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="v-tgl_po_reg">Tanggal PO Reg</label>
                                <input type="text" class="form-control datepicker" id="v-tgl_po_reg" name="tgl_po_reg" placeholder="Tanggal PO Reg" autocomplete="off" readonly>
                            </div>
                        </div>

                        <!-- No PO Reg -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="v-no_po_reg">No PO Reg</label>
                                <input type="text" class="form-control" id="v-no_po_reg" name="no_po_reg" maxlength="20" placeholder="No PO Reg" aria-describedby="validationServer03Feedback" autocomplete="off" readonly>
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    Maaf Nomor PO Import sudah ada.
                                </div>
                            </div>
                        </div>

                        <!-- Nama Supplier -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="v-id_supplier">Nama Supplier</label>
                                <input type="text" class="form-control" id="v-id_supplier" name="id_supplier" readonly>
                            </div>
                        </div>

                        <!-- Golongan -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="v-golongan">Golongan</label>
                                <input type="text" class="form-control" id="v-golongan" name="golongan" readonly>
                            </div>
                        </div>

                        <!-- Nama Barang -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="v-id_prc_master_barang">Nama Barang</label>
                                <input type="text" class="form-control" id="v-nama_barang" name="id_prc_master_barang" readonly>
                            </div>
                        </div>

                        <!-- Spesifikasi -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="v-spek">Spesifikasi</label>
                                <input type="text" class="form-control" id="v-spek" name="spek" placeholder="spek" readonly>
                            </div>
                        </div>

                        <!-- Jumlah -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="v-jumlah">Jumlah</label>
                                <input type="text" class="form-control" id="v-jumlah" name="jumlah" placeholder="Jumlah" oninput="calculateTotal()" readonly>
                            </div>
                        </div>

                        <!-- Harga Perunit -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="v-harga_perunit">Harga Perunit</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1" style="font-size: small;">Rp</span>
                                    </div>
                                    <input type="text" class="form-control" id="v-harga_perunit" name="harga_perunit" placeholder="Harga Perunit" readonly>
                                </div>             
                            </div>
                        </div>

                        <!-- Total Harga -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="v-total_value">Total Value</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1" style="font-size: small;">Rp</span>
                                    </div>
                                    <input type="text" class="form-control" id="v-total_value" name="total_value" placeholder="Total Value" readonly>
                                </div>                            
                            </div>
                        </div>

                        <!-- Metode -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="v-metode">Metode</label>
                                <input type="text" class="form-control" id="v-metode" name="metode" placeholder="Metode" readonly>
                            </div>
                        </div>

                        <!-- Shipment -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="v-shipment">Shipment</label>
                                <input type="text" class="form-control" id="v-shipment" name="shipment" placeholder="Shipment" readonly>
                            </div>
                        </div>

                        <!-- PIC Kapsulindo 1 -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="v-pic1">PIC Kapsulindo 1</label>
                                <input type="text" class="form-control" id="v-pic1" name="pic1" placeholder="Pic1" readonly>
                            </div>
                        </div>

                        <!-- PIC Kapsulindo 2 -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="v-pic2">PIC Kapsulindo 2</label>
                                <input type="text" class="form-control" id="v-pic2" name="pic2" placeholder="Pic2" readonly>
                            </div>
                        </div>

                        <!-- No PPB -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="v-no_ppb">No PPB</label>
                                <input type="text" class="form-control" id="v-no_ppb" name="no_ppb" placeholder="NO PPB" readonly>
                            </div>
                        </div>

                        <!-- Harga Netto -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="v-harga_netto">Harga Netto</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1" style="font-size: small;">Rp</span>
                                    </div>
                                    <input type="text" class="form-control" id="v-harga_netto" name="harga_netto" placeholder="Harga Netto" readonly>
                                </div>                            
                            </div>
                        </div>

                        <!-- Pajak -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="v-pajak">Pajak</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1" style="font-size: small;">Rp</span>
                                    </div>
                                    <input type="text" class="form-control" id="v-pajak" name="pajak" placeholder="Pajak" readonly>
                                </div>             
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="v-total_harga">Total Harga</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1" style="font-size: small;">Rp</span>
                                    </div>
                                    <input type="text" class="form-control" id="v-total_harga" name="total_harga" placeholder="Total Harga" readonly>
                                </div>                            
                            </div>
                        </div>

                        <!-- Prc Admin -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="prc_admin">Prc Admin</label>
                                <input type="text" class="form-control" id="prc_admin" name="prc_admin" value="<?= $this->session->userdata('nama_operator') ?>" maxlength="20" readonly>
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
    $('#detail').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget);
      var data = button.data();

      var harga_perunit = parseFloat(data.harga_perunit).toFixed(2).replace(/\.00$/, '');
      var total_harga = parseFloat(data.total_harga).toFixed(2).replace(/\.00$/, '');

      $('#v-id_prc_po_reg').val(data.id_prc_po_reg);
      $('#v-no_po_reg').val(data.no_po_reg);
      $('#v-tgl_po_reg').val(data.tgl_po_reg);
      $('#v-id_supplier').val(data.nama_supplier);
      $('#v-id_prc_master_barang').val(data.id_prc_master_barang);
      $('#v-jumlah').val(data.jumlah);
      $('#v-harga_perunit').val(harga_perunit);
      $('#v-total_value').val(data.total_value);
      $('#v-metode').val(data.metode);
      $('#v-shipment').val(data.shipment);
      $('#v-pic1').val(data.pic1);
      $('#v-pic2').val(data.pic2);
      $('#v-no_ppb').val(data.no_ppb);
      $('#v-harga_netto').val(data.harga_netto);
      $('#v-pajak').val(data.pajak);
      $('#v-prc_admin').val(data.prc_admin);
      $('#v-spek').val(data.spek);
      $('#v-golongan').val(data.golongan);
      $('#v-nama_supplier').val(data.nama_supplier);
      $('#v-nama_barang').val(data.nama_barang);
      $('#v-total_harga').val(total_harga);

      $('#v-id_supplier').trigger("chosen:updated");
      $('#v-id_prc_master_barang').trigger("chosen:updated");
    });

    $('#v-id_prc_master_barang').on('change', function() {
      var spek = $(this).find('option:selected').data('spek');
      $('#v-spek').val(spek);
    });

    $('#v-id_supplier').on('change', function() {
      var golongan = $(this).find('option:selected').data('golongan');
      $('#v-golongan').val(golongan);
    });
  });
</script>


<!-- Modal Edit -->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit PO Reg</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="form_update" action="<?= base_url() ?>Purchasing/PO_Reg/Prc_po_reg/update/">
                 <input type="hidden" id="e-id_prc_po_reg" name="id_prc_po_reg">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="e-tgl_po_reg">Tanggal PO Reg</label>
                                <input type="text" class="form-control datepicker" id="e-tgl_po_reg" name="tgl_po_reg" placeholder="Tanggal PO Reg" autocomplete="off" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="e-no_po_reg">No PO Reg</label>
                                <input type="text" class="form-control" id="e-no_po_reg" name="no_po_reg" maxlength="20" placeholder="No PO Reg" aria-describedby="validationServer03Feedback" autocomplete="off" required>
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    Maaf Nomor PO Import sudah ada.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="e-id_supplier">Nama Supplier</label>
                                <select class="form-control chosen-select" id="e-id_supplier" name="id_supplier" required>
                                    <option value="" disabled selected hidden>- Pilih Nama Supplier -</option>
                                    <?php foreach ($res_supplier as $s): ?>
                                    <option value="<?= $s['id_supplier'] ?>" data-nama_supplier="<?= $s['nama_supplier'] ?>" data-golongan="<?= $s['golongan'] ?>"><?= $s['nama_supplier'] ?> (<?= $s['golongan'] ?>)</option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="e-golongan">Golongan</label>
                                <input type="text" class="form-control" id="e-golongan" name="golongan" placeholder="Golongan" readonly>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="e-id_prc_master_barang">Nama Barang</label>
                                <select class="form-control chosen-select" id="e-id_prc_master_barang" name="id_prc_master_barang" required>
                                    <option value="" disabled selected hidden>- Pilih Nama Barang -</option>
                                    <?php foreach ($res_barang as $b): ?>
                                    <option value="<?= $b['id_prc_master_barang'] ?>" data-spek="<?= $b['spek'] ?>"><?= $b['nama_barang'] ?> (<?= $b['spek'] ?>)</option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="e-spek">Spesifikasi</label>
                                <input type="text" class="form-control" id="e-spek" name="spek" placeholder="spek" readonly>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="e-jumlah">Jumlah</label>
                                <input type="text" class="form-control" id="e-jumlah" name="jumlah" placeholder="Jumlah" oninput="calculateTotal()">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="e-harga_perunit">Harga Perunit</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1" style="font-size: small;">Rp</span>
                                    </div>
                                    <input type="text" class="form-control" id="e-harga_perunit" name="harga_perunit" placeholder="Harga Perunit" required>
                                </div>             
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="e-total_value">Total Value</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1" style="font-size: small;">Rp</span>
                                    </div>
                                    <input type="text" class="form-control" id="e-total_value" name="total_value" placeholder="Total Value" readonly>
                                </div>                            
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="e-metode">Metode</label>
                                <input type="text" class="form-control" id="e-metode" name="metode" placeholder="Metode">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="e-shipment">Shipment</label>
                                <input type="text" class="form-control" id="e-shipment" name="shipment" placeholder="Shipment">
                            </div>
                        </div>    

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="e-pic1">PIC Kapsulindo 1</label>
                                <input type="text" class="form-control" id="e-pic1" name="pic1" placeholder="Pic1">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="e-pic2">PIC Kapsulindo 2</label>
                                <input type="text" class="form-control" id="e-pic2" name="pic2" placeholder="Pic2">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="e-no_ppb">No PPB</label>
                                    <input type="text" class="form-control" id="e-no_ppb" name="no_ppb" placeholder="NO PPB">
                                </div>
                            </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="e-harga_netto">Harga Netto</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1" style="font-size: small;">Rp</span>
                                    </div>
                                    <input type="text" class="form-control" id="e-harga_netto" name="harga_netto" placeholder="Harga Netto" readonly>
                                </div>                           
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="e-pajak">Pajak</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1" style="font-size: small;">Rp</span>
                                    </div>
                                    <input type="text" class="form-control" id="e-pajak" name="pajak" placeholder="Pajak" required>
                                </div>             
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="e-total_harga">Total Harga</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1" style="font-size: small;">Rp</span>
                                    </div>
                                    <input type="text" class="form-control" id="e-total_harga" name="total_harga" placeholder="Total Harga" readonly>
                                </div>                            
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="prc_admin">Prc Admin</label>
                                <input type="text" class="form-control" id="prc_admin" name="prc_admin" value="<?= $this->session->userdata('nama_operator') ?>" maxlength="20" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="simpan" class="btn btn-primary" onclick="if (! confirm('Apakah Anda Yakin Untuk Menyimpan Data Ini? Tolong Untuk Di Check Kembali. Dan Jangan Lupa Untuk Menginputkan Barangnya')) { return false; }">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {

        function calculateTotal() {
            var jumlah = parseFloat($('#e-jumlah').val()) || 0;
            var hargaPerUnit = parseFloat($('#e-harga_perunit').val()) || 0;
            var totalValue = jumlah * hargaPerUnit;

            $('#e-total_value').val(totalValue);
            $('#e-harga_netto').val(totalValue);

            calculateTotalHarga();
        }

        function calculateTotalHarga() {
            var hargaNetto = parseFloat($('#e-harga_netto').val()) || 0;
            var pajak = parseFloat($('#e-pajak').val()) || 0;
            var totalHarga = hargaNetto + pajak;

            $('#e-total_harga').val(totalHarga);
        }

        $('#edit').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var data = button.data();

            $('#e-id_prc_po_reg').val(data.id_prc_po_reg);
            $('#e-no_po_reg').val(data.no_po_reg); 
            $('#e-tgl_po_reg').val(data.tgl_po_reg);
            $('#e-id_supplier').val(data.id_supplier);                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           
            $('#e-id_prc_master_barang').val(data.id_prc_master_barang);
            $('#e-jumlah').val(data.jumlah);
            $('#e-harga_perunit').val(data.harga_perunit);
            $('#e-total_value').val(data.total_value);
            $('#e-metode').val(data.metode);
            $('#e-shipment').val(data.shipment);
            $('#e-pic1').val(data.pic1);
            $('#e-pic2').val(data.pic2);          
            $('#e-no_ppb').val(data.no_ppb);
            $('#e-harga_netto').val(data.harga_netto);
            $('#e-pajak').val(data.pajak);
            $('#e-total_harga').val(data.total_harga);
            $('#e-prc_admin').val(data.prc_admin);
            $('#e-golongan').val(data.golongan);
            $('#e-spek').val(data.spek);
            $('#e-spek').val(data.spek);

            $('#e-id_supplier').trigger("chosen:updated");
            $('#e-id_prc_master_barang').trigger("chosen:updated"); 
        });

        $('#e-jumlah').on('input', calculateTotal);                                                                             
        $('#e-harga_perunit').on('input', calculateTotal);
        $('#e-pajak').on('input', calculateTotalHarga);

        $('#e-id_prc_master_barang').on('change', function() {
            var spek = $(this).find('option:selected').data('spek');
            $('#e-spek').val(spek);
        });

        $('#e-id_supplier').on('change', function() {
            var golongan = $(this).find('option:selected').data('golongan');  
            $('#e-golongan').val(golongan);
        });
    });
</script>