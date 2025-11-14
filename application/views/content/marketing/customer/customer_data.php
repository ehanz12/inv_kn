<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Customer</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #4361ee;
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
        
        body {
            background-color: #f5f7fb;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .page-header {
            margin-bottom: 25px;
            background: white;
            padding: 20px;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            border-left: 4px solid var(--primary);
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
            font-weight: 500;
        }
        
        .breadcrumb-item.active {
            color: var(--gray);
        }
        
        .card {
            width: 100%;
            border: none;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            margin-bottom: 25px;
            transition: var(--transition);
            border-left: 4px solid var(--primary);
        }
        
        .card:hover {
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.12);
        }
        
        .card-header {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 15px 20px;
            border-radius: var(--border-radius) var(--border-radius) 0 0 !important;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        
        .card-header h5 {
            font-size: 18px;
            font-weight: 700;
            color: white;
            margin: 0;
        }
        
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
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(67, 97, 238, 0.3);
        }
        
        .btn-info {
            background: linear-gradient(135deg, var(--info), #3a86ff);
            color: white;
        }
        
        .btn-info:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(72, 149, 239, 0.3);
        }
        
        .btn-danger {
            background: linear-gradient(135deg, var(--danger), #d00000);
            color: white;
        }
        
        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(230, 57, 70, 0.3);
        }
        
        .btn-secondary {
            background: linear-gradient(135deg, var(--gray), #495057);
            color: white;
        }
        
        .btn-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(108, 117, 125, 0.3);
        }
        
        .btn-success {
            background: linear-gradient(135deg, #28a745, #20c997);
            color: white;
        }
        
        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(40, 167, 69, 0.3);
        }
        
        .btn-sm {
            padding: 6px 12px;
            font-size: 12px;
        }
        
        .table-responsive {
            border-radius: 0 0 var(--border-radius) var(--border-radius);
            overflow: hidden;
        }
        
        .table {
            margin-bottom: 0;
            border-collapse: separate;
            border-spacing: 0;
            width: 100%;
        }
        
        .table thead th {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            border: none;
            padding: 12px 15px;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 12px;
            line-height: 1.5;
            letter-spacing: 0.5px;
            white-space: nowrap;
            vertical-align: middle;
        }
        
        .table tbody td {
            padding: 12px 15px;
            vertical-align: middle;
            border-bottom: 1px solid var(--light-gray);
            white-space: nowrap;
            font-size: 14px;
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
        
        .text-center {
            text-align: center;
        }
        
        .no-data {
            padding: 40px !important;
            color: #6c757d;
            font-style: italic;
            background-color: #f8f9fa;
            text-align: center;
        }
        
        .alert {
            padding: 12px 16px;
            border-radius: 6px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            font-weight: 500;
        }
        
        .alert-success {
            background-color: rgba(67, 97, 238, 0.1);
            border-color: rgba(67, 97, 238, 0.3);
            color: #0c1e6b;
        }
        
        .alert-danger {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
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
        
        .form-label {
            font-weight: 600;
            margin-bottom: 8px;
            color: var(--dark);
        }
        
        .modal-header {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            border-radius: var(--border-radius) var(--border-radius) 0 0;
        }
        
        .modal-title {
            font-weight: 700;
        }
        
        .modal-content {
            border-radius: var(--border-radius);
            border: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }
        
        .close {
            color: white;
            opacity: 0.8;
        }
        
        .close:hover {
            color: white;
            opacity: 1;
        }
        
        .badge {
            padding: 6px 10px;
            border-radius: 6px;
            font-weight: 600;
        }
        
        .badge-primary {
            background-color: rgba(67, 97, 238, 0.15);
            color: #0c1e6b;
            border: 1px solid rgba(67, 97, 238, 0.3);
        }
        
        .badge-secondary {
            background-color: rgba(108, 117, 125, 0.15);
            color: #495057;
            border: 1px solid rgba(108, 117, 125, 0.3);
        }
        
        .detail-section {
            margin-bottom: 20px;
            padding: 15px;
            background-color: #f8f9fa;
            border-radius: 8px;
            border-left: 4px solid var(--primary);
        }
        
        .detail-label {
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 5px;
        }
        
        .detail-value {
            color: var(--gray);
            margin-bottom: 10px;
        }
        
        @media (max-width: 768px) {
            .card-header {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }
            
            .btn-group {
                width: 100%;
                justify-content: flex-start;
            }
            
            .table-responsive {
                font-size: 12px;
            }
            
            .table thead th {
                padding: 8px 10px;
            }
            
            .table tbody td {
                padding: 8px 10px;
            }
        }
    </style>
</head>
<body>
  
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
                                    <h5 class="m-b-10"><i class="fas fa-users me-2 text-primary"></i>Customer Management</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="javascript:">Marketing</a></li>
                                    <li class="breadcrumb-item active text-primary">Customer</li>
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
                                        <h5 style="color: white;"><i class="fas fa-users me-2"></i>Data Customer</h5>

                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-light btn-sm float-right" data-toggle="modal" data-target="#add">
                                            <i class="fas fa-plus me-1"></i>Tambah Customer
                                        </button>
                                    </div>
                                    <div class="card-block table-border-style">

                                        <!-- Alert dari URL parameter -->
                                        <?php if(isset($_GET['alert']) && isset($_GET['msg'])): ?>
                                            <div class="alert alert-<?= $_GET['alert'] == 'success' ? 'success' : 'danger' ?> alert-dismissible fade show">
                                                <i class="fas <?= $_GET['alert'] == 'success' ? 'fa-check-circle' : 'fa-exclamation-triangle' ?> me-2"></i>
                                                <?= $_GET['msg'] ?>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        <?php endif; ?>

                                        <div class="table-responsive">
                                            <table class="table datatable table-hover table-striped table-sm">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Kode Customer</th>
                                                        <th>Nama Customer</th>
                                                        <th>Edit</th>
                                                        <th >Hapus</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $level = $this->session->userdata('departement');
                                                    $no = 1;
                                                    foreach ($result as $k) {
                                                    ?>
                                                        <tr>
                                                            <th scope="row"><?= $no++ ?></th>
                                                            
                                                            <td> 
                                                                    <span style="cursor: pointer;" class="badge badge-primary" data-toggle="modal" data-target="#detail" 
                                                                            data-id_customer="<?= $k['id_customer'] ?>" 
                                                                            data-kode_customer="<?= $k['kode_customer'] ?>" 
                                                                            data-nama_customer="<?= $k['nama_customer'] ?>" 
                                                                            data-negara="<?= $k['negara'] ?>" 
                                                                            data-alamat_inv="<?= $k['alamat_inv'] ?>"
                                                                            data-alamat_sjl="<?= $k['alamat_sjl'] ?>"
                                                                            data-alamat_pjk="<?= $k['alamat_pjk'] ?>"
                                                                            data-npwpt="<?= $k['npwpt'] ?>"
                                                                            data-jatuh_tempo="<?= $k['jatuh_tempo'] ?>">
                                                                        <i ></i><?= $k['kode_customer'] ?>
                                                                        </span>
                                                                     </td>

                                                                     <td><span class="badge badge-primary"><?= $k['nama_customer'] ?></span></td>
                                                            
                                                                   
                                                            <td class="text-center">
                                                                    <?php if ($level === "admin") { ?>
                                                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit" 
                                                                                data-id_customer="<?= $k['id_customer'] ?>" 
                                                                                data-kode_customer="<?= $k['kode_customer'] ?>" 
                                                                                data-nama_customer="<?= $k['nama_customer'] ?>" 
                                                                                data-negara="<?= $k['negara'] ?>" 
                                                                                data-alamat_inv="<?= $k['alamat_inv'] ?>"
                                                                                data-alamat_sjl="<?= $k['alamat_sjl'] ?>"
                                                                                data-alamat_pjk="<?= $k['alamat_pjk'] ?>"
                                                                                data-npwpt="<?= $k['npwpt'] ?>"
                                                                                data-jatuh_tempo="<?= $k['jatuh_tempo'] ?>">
                                                                            <i class="fas fa-edit me-1"></i>Edit
                                                                        </button>
                                                                    <?php } ?>
                                                                </div>
                                                            </td>

                                                            <td class="text-center">
                                                                 <a type="button" class="btn btn-danger btn-sm text-light" 
                                                                           href="<?= base_url() ?>Marketing/master/Customer/delete/<?= $k['id_customer'] ?>" 
                                                                           onclick="if (! confirm('Apakah Anda Yakin?')) { return false; }">
                                                                            <i class="fas fa-trash me-1"></i>Hapus
                                                                        </a>
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

<!-- Modal Tambah -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus-circle me-2"></i>Tambah Customer</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url() ?>Marketing/master/Customer/add">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kode_customer" class="form-label">Kode Customer</label>
                                <input type="text" class="form-control text-uppercase" id="kode_customer" name="kode_customer" autocomplete="off" placeholder="Kode Customer" aria-describedby="validationServer03Feedback" required>
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <i class="fas fa-exclamation-triangle me-1"></i>Maaf Kode Customer sudah ada.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama_customer" class="form-label">Nama Customer</label>
                                <input type="text" class="form-control text-uppercase" id="nama_customer" name="nama_customer" autocomplete="off" placeholder="Nama Customer" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="negara" class="form-label">Negara</label>
                                <input type="text" class="form-control text-uppercase" id="negara" name="negara" autocomplete="off" placeholder="Negara Customer" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jatuh_tempo" class="form-label">Jatuh Tempo</label>
                                <input type="text" class="form-control" id="jatuh_tempo" name="jatuh_tempo" autocomplete="off" placeholder="Jatuh Tempo (hari)">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="alamat_inv" class="form-label">Alamat INV</label>
                        <textarea class="form-control text-uppercase" id="alamat_inv" name="alamat_inv" rows="2" placeholder="Alamat Inventory"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="alamat_sjl" class="form-label">Alamat SJL</label>
                        <textarea class="form-control text-uppercase" id="alamat_sjl" name="alamat_sjl" rows="2" placeholder="Alamat Surat Jalan"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="alamat_pjk" class="form-label">Alamat PJK</label>
                        <textarea class="form-control text-uppercase" id="alamat_pjk" name="alamat_pjk" rows="2" placeholder="Alamat Pajak"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="npwpt" class="form-label">NPWPT</label>
                        <textarea class="form-control text-uppercase" id="npwpt" name="npwpt" rows="2" placeholder="NPWPT"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times me-1"></i>Close
                    </button>
                    <button type="submit" class="btn btn-primary" id="simpan">
                        <i class="fas fa-save me-1"></i>Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit me-2"></i>Edit Customer</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url() ?>Marketing/master/Customer/update" id="form-edit">
                <div class="modal-body">
                    <input type="hidden" id="e_id_customer" name="id_customer">
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="e_kode_customer" class="form-label">Kode Customer</label>
                                <input type="text" class="form-control text-uppercase" id="e_kode_customer" name="kode_customer" autocomplete="off" placeholder="Kode Customer" aria-describedby="validationServer03FeedbackEdit" required>
                                <div id="validationServer03FeedbackEdit" class="invalid-feedback">
                                    <i class="fas fa-exclamation-triangle me-1"></i>Maaf Kode Customer sudah ada.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="e_nama_customer" class="form-label">Nama Customer</label>
                                <input type="text" class="form-control text-uppercase" id="e_nama_customer" name="nama_customer" autocomplete="off" placeholder="Nama Customer" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="e_negara" class="form-label">Negara</label>
                                <input type="text" class="form-control text-uppercase" id="e_negara" name="negara" autocomplete="off" placeholder="Negara Customer" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="e_jatuh_tempo" class="form-label">Jatuh Tempo</label>
                                <input type="text" class="form-control" id="e_jatuh_tempo" name="jatuh_tempo" autocomplete="off" placeholder="Jatuh Tempo (hari)">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="e_alamat_inv" class="form-label">Alamat INV</label>
                        <textarea class="form-control text-uppercase" id="e_alamat_inv" name="alamat_inv" rows="2" placeholder="Alamat Inventory"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="e_alamat_sjl" class="form-label">Alamat SJL</label>
                        <textarea class="form-control text-uppercase" id="e_alamat_sjl" name="alamat_sjl" rows="2" placeholder="Alamat Surat Jalan"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="e_alamat_pjk" class="form-label">Alamat PJK</label>
                        <textarea class="form-control text-uppercase" id="e_alamat_pjk" name="alamat_pjk" rows="2" placeholder="Alamat Pajak"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="e_npwpt" class="form-label">NPWPT</label>
                        <textarea class="form-control text-uppercase" id="e_npwpt" name="npwpt" rows="2" placeholder="NPWPT"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times me-1"></i>Close
                    </button>
                    <button type="submit" class="btn btn-info" id="update-btn">
                        <i class="fas fa-sync-alt me-1"></i>Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Detail -->
<div class="modal fade" id="detail" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel"><i class="fas fa-info-circle me-2"></i>Detail Customer</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="detail-section">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="detail-label">Kode Customer</div>
                            <div class="detail-value" id="d_kode_customer">-</div>
                        </div>
                        <div class="col-md-6">
                            <div class="detail-label">Nama Customer</div>
                            <div class="detail-value" id="d_nama_customer">-</div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="detail-label">Negara</div>
                            <div class="detail-value" id="d_negara">-</div>
                        </div>
                        <div class="col-md-6">
                            <div class="detail-label">Jatuh Tempo</div>
                            <div class="detail-value" id="d_jatuh_tempo">-</div>
                        </div>
                    </div>
                </div>
                
                <div class="detail-section">
                    <div class="detail-label">Alamat Inventory (INV)</div>
                    <div class="detail-value" id="d_alamat_inv">-</div>
                </div>
                
                <div class="detail-section">
                    <div class="detail-label">Alamat Surat Jalan (SJL)</div>
                    <div class="detail-value" id="d_alamat_sjl">-</div>
                </div>
                
                <div class="detail-section">
                    <div class="detail-label">Alamat Pajak (PJK)</div>
                    <div class="detail-value" id="d_alamat_pjk">-</div>
                </div>
                
                <div class="detail-section">
                    <div class="detail-label">NPWPT</div>
                    <div class="detail-value" id="d_npwpt">-</div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    <i class="fas fa-times me-1"></i>Tutup
                </button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        // Fungsi uppercase untuk semua input
        uppercase('#kode_customer');
        uppercase('#nama_customer');
        uppercase('#negara');
        uppercase('#alamat_inv');
        uppercase('#alamat_sjl');
        uppercase('#alamat_pjk');
        uppercase('#npwpt');

        // Cek kode customer untuk tambah data
        $("#kode_customer").keyup(function(){
            var kode_customer = $("#kode_customer").val();
            jQuery.ajax({
                url: "<?= base_url() ?>marketing/customer/cek_kode_customer",
                dataType: 'text',
                type: "post",
                data: {kode_customer: kode_customer},
                success: function(response){
                    if (response == "true") {
                        $("#kode_customer").addClass("is-invalid");
                        $("#simpan").attr("disabled", "disabled");
                    } else {
                        $("#kode_customer").removeClass("is-invalid");
                        $("#simpan").removeAttr("disabled");
                    }
                }            
            });
        });

        // Cek kode customer untuk edit data
        $("#e_kode_customer").keyup(function(){
            var kode_customer = $("#e_kode_customer").val();
            var id_customer = $("#e_id_customer").val();
            
            jQuery.ajax({
                url: "<?= base_url() ?>marketing/customer/cek_kode_customer_edit",
                dataType: 'text',
                type: "post",
                data: {
                    kode_customer: kode_customer,
                    id_customer: id_customer
                },
                success: function(response){
                    if (response == "true") {
                        $("#e_kode_customer").addClass("is-invalid");
                        $("#update-btn").attr("disabled", "disabled");
                    } else {
                        $("#e_kode_customer").removeClass("is-invalid");
                        $("#update-btn").removeAttr("disabled");
                    }
                }            
            });
        });

        // Modal edit show event
        $('#edit').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id_customer = button.data('id_customer');
            var kode_customer = button.data('kode_customer');
            var nama_customer = button.data('nama_customer');
            var negara = button.data('negara');
            var alamat_inv = button.data('alamat_inv');
            var alamat_sjl = button.data('alamat_sjl');
            var alamat_pjk = button.data('alamat_pjk');
            var npwpt = button.data('npwpt');
            var jatuh_tempo = button.data('jatuh_tempo');

            var modal = $(this);
            modal.find('#e_id_customer').val(id_customer);
            modal.find('#e_kode_customer').val(kode_customer);
            modal.find('#e_nama_customer').val(nama_customer);
            modal.find('#e_negara').val(negara);
            modal.find('#e_alamat_inv').val(alamat_inv);
            modal.find('#e_alamat_sjl').val(alamat_sjl);
            modal.find('#e_alamat_pjk').val(alamat_pjk);
            modal.find('#e_npwpt').val(npwpt);
            modal.find('#e_jatuh_tempo').val(jatuh_tempo);

            // Reset validation state
            modal.find('#e_kode_customer').removeClass("is-invalid");
            modal.find('#update-btn').removeAttr("disabled");

            // Apply uppercase
            uppercase('#e_kode_customer');
            uppercase('#e_nama_customer');
            uppercase('#e_negara');
            uppercase('#e_alamat_inv');
            uppercase('#e_alamat_sjl');
            uppercase('#e_alamat_pjk');
            uppercase('#e_npwpt');
        });

        // Modal detail show event
        $('#detail').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var kode_customer = button.data('kode_customer');
            var nama_customer = button.data('nama_customer');
            var negara = button.data('negara');
            var alamat_inv = button.data('alamat_inv');
            var alamat_sjl = button.data('alamat_sjl');
            var alamat_pjk = button.data('alamat_pjk');
            var npwpt = button.data('npwpt');
            var jatuh_tempo = button.data('jatuh_tempo');

            var modal = $(this);
            modal.find('#d_kode_customer').text(kode_customer);
            modal.find('#d_nama_customer').text(nama_customer);
            modal.find('#d_negara').text(negara);
            modal.find('#d_jatuh_tempo').text(jatuh_tempo ? jatuh_tempo + ' hari' : '-');
            modal.find('#d_alamat_inv').text(alamat_inv || '-');
            modal.find('#d_alamat_sjl').text(alamat_sjl || '-');
            modal.find('#d_alamat_pjk').text(alamat_pjk || '-');
            modal.find('#d_npwpt').text(npwpt || '-');
        });

        // Reset form ketika modal edit ditutup
        $('#edit').on('hidden.bs.modal', function() {
            $(this).find('form')[0].reset();
            $(this).find('.is-invalid').removeClass('is-invalid');
            $(this).find('#update-btn').removeAttr('disabled');
        });

        // Auto-hide alert setelah 5 detik
        setTimeout(function() {
            $('.alert').alert('close');
        }, 5000);
    });

    // Fungsi uppercase
    function uppercase(selector) {
        $(selector).on('keyup', function() {
            this.value = this.value.toUpperCase();
        });
    }
</script>
</body>
</html>