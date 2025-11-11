<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Kode Warna</title>
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
            cursor: pointer;
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
            cursor: pointer;
            border: 1px solid rgba(67, 97, 238, 0.3);
        }
        
        .input-group-text {
            background-color: var(--light);
            border: 1px solid var(--light-gray);
            color: var(--dark);
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
                  <h5 class="m-b-10"><i class="fas fa-palette me-2 text-primary"></i>Kode Warna Management</h5>
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="javascript:">Marketing</a></li>
                  <li class="breadcrumb-item active text-primary">Input Kode Warna</li>
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
                    <h5 style="color: white;"><i class="fas fa-palette me-2"></i>Data Kode Warna</h5>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-light btn-sm float-right" data-toggle="modal" data-target="#add">
                      <i class="fas fa-plus me-1"></i>Tambah Data
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
                            <th>Kode Warna</th>
                            <th>Nama Warna</th>
                            <th>Short Name</th>
                            <th class="text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $level = $this->session->userdata('level');
                          $no = 1;
                          foreach ($result as $k) {
                          ?>
                            <tr>
                              <th scope="row"><?= $no++ ?></th>
                              <td>
                                <span class="badge badge-primary" data-toggle="modal" data-target="#view" 
                                  data-id_master_kw_cap="<?= $k['id_master_kw_cap'] ?>" 
                                  data-kode_warna_cap="<?= $k['kode_warna_cap'] ?>" 
                                  data-warna_cap="<?= $k['warna_cap'] ?>" 
                                  data-short_name="<?= $k['short_name'] ?>" 
                                  data-ti02="<?= $k['f_ti02'] ?>" 
                                  data-r1="<?= $k['f_r1'] ?>" 
                                  data-r3="<?= $k['f_r3'] ?>" 
                                  data-y5="<?= $k['f_y5'] ?>" 
                                  data-b1="<?= $k['f_b1'] ?>" 
                                  data-y10="<?= $k['f_y10'] ?>" 
                                  data-sf="<?= $k['f_sf'] ?>">
                                  <?= $k['kode_warna_cap'] ?>
                                </span>
                              </td>
                              <td><?= $k['warna_cap'] ?></td>
                              <td><?= $k['short_name'] ?></td>
                              <td class="text-center">
                                <?php if ($level === "admin") { ?>
                                  <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit" 
                                      data-id_master_kw_cap="<?= $k['id_master_kw_cap'] ?>" 
                                      data-kode_warna_cap="<?= $k['kode_warna_cap'] ?>" 
                                      data-warna_cap="<?= $k['warna_cap'] ?>" 
                                      data-short_name="<?= $k['short_name'] ?>" 
                                      data-ti02="<?= $k['f_ti02'] ?>" 
                                      data-r1="<?= $k['f_r1'] ?>" 
                                      data-r3="<?= $k['f_r3'] ?>" 
                                      data-y5="<?= $k['f_y5'] ?>" 
                                      data-b1="<?= $k['f_b1'] ?>" 
                                      data-y10="<?= $k['f_y10'] ?>" 
                                      data-sf="<?= $k['f_sf'] ?>">
                                      <i class="fas fa-edit me-1"></i>Edit
                                    </button>
                                    <a href="<?= base_url() ?>Marketing/master/Kode_warna/delete/<?= $k['id_master_kw_cap'] ?>" class="btn btn-danger btn-sm text-light" onclick="if (! confirm('Apakah Anda Yakin?')) { return false; }">
                                      <i class="fas fa-trash me-1"></i>Hapus
                                    </a>
                                  </div>
                                <?php } ?>
                              </td>
                            </tr>
                          <?php
                          }
                          ?>
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
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus-circle me-2"></i>Tambah Kode Warna</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>Marketing/master/Kode_warna/add">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="kode_warna" class="form-label">Kode Warna</label>
                <div class="input-group">
                  <input type="number" maxlength="4" class="form-control text-uppercase" id="kode_warna" name="kode_warna" placeholder="Kode Warna" autocomplete="off" required>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="warna" class="form-label">Nama Warna</label>
                <input type="text" class="form-control text-uppercase" id="warna" name="warna" placeholder="Nama Warna" autocomplete="off" required>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="short_name" class="form-label">Short Name</label>
                <input type="text" class="form-control text-uppercase" id="short_name" name="short_name" placeholder="Short name" autocomplete="off">
                <small class="form-text text-muted">Kosongkan untuk generate otomatis</small>
              </div>
            </div>
          </div>

          <center><label for="formula_warna" class="font-weight-bold mt-3 form-label">Komposisi Formula</label></center>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="ti02" class="form-label">Titanium Dioksida (Ti02)</label>
                <div class="input-group">
                  <input type="number" step="0.01" class="form-control" id="ti02" name="ti02" placeholder="0.00" autocomplete="off" required>
                  <div class="input-group-append">
                    <span class="input-group-text">%</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="r1" class="form-label">Carmoisine (R1)</label>
                <div class="input-group">
                  <input type="number" step="0.01" class="form-control" id="r1" name="r1" placeholder="0.00" autocomplete="off" required>
                  <div class="input-group-append">
                    <span class="input-group-text">ml</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="r3" class="form-label">Eritrhosine (R3)</label>
                <div class="input-group">
                  <input type="number" step="0.01" class="form-control" id="r3" name="r3" placeholder="0.00" autocomplete="off" required>
                  <div class="input-group-append">
                    <span class="input-group-text">ml</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="y5" class="form-label">Tartrazine (Y5)</label>
                <div class="input-group">
                  <input type="number" step="0.01" class="form-control" id="y5" name="y5" placeholder="0.00" autocomplete="off" required>
                  <div class="input-group-append">
                    <span class="input-group-text">ml</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="b1" class="form-label">Brilliant Blue (B1)</label>
                <div class="input-group">
                  <input type="number" step="0.01" class="form-control" id="b1" name="b1" placeholder="0.00" autocomplete="off" required>
                  <div class="input-group-append">
                    <span class="input-group-text">ml</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="y10" class="form-label">Quinoline Yellow (Y10)</label>
                <div class="input-group">
                  <input type="number" step="0.01" class="form-control" id="y10" name="y10" placeholder="0.00" autocomplete="off" required>
                  <div class="input-group-append">
                    <span class="input-group-text">ml</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="sf" class="form-label">Silver F (SF)</label>
                <div class="input-group">
                  <input type="number" step="0.01" class="form-control" id="sf" name="sf" placeholder="0.00" autocomplete="off" required>
                  <div class="input-group-append">
                    <span class="input-group-text">ml</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">
              <i class="fas fa-times me-1"></i>Close
            </button>
            <button type="submit" id="simpan" class="btn btn-primary">
              <i class="fas fa-save me-1"></i>Simpan
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal View -->
<div class="modal fade" id="view" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-eye me-2"></i>Detail Kode Warna</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="kode_warna" class="form-label">Kode Warna</label>
              <div class="input-group">
                <input type="text" class="form-control" id="v-kode_warna" name="kode_warna" placeholder="Kode Warna" readonly>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="warna" class="form-label">Nama Warna</label>
              <input type="text" class="form-control" id="v-warna" name="warna" placeholder="Nama Warna" readonly>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="short_name" class="form-label">Short Name</label>
              <input type="text" class="form-control" id="v-short_name" name="short_name" placeholder="Short Name" readonly>
            </div>
          </div>
        </div>

        <center><label for="formula_warna" class="font-weight-bold mt-3 form-label">Komposisi Formula</label></center>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="ti02" class="form-label">Titanium Dioksida (Ti02)</label>
              <input type="text" class="form-control" id="v-ti02" name="ti02" placeholder="Titanium Dioksida" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="r1" class="form-label">Carmoisine (R1)</label>
              <input type="text" class="form-control" id="v-r1" name="r1" placeholder="Carmoisine" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="r3" class="form-label">Eritrhosine (R3)</label>
              <input type="text" class="form-control" id="v-r3" name="r3" placeholder="Eritrhosine" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="y5" class="form-label">Tartrazine (Y5)</label>
              <input type="text" class="form-control" id="v-y5" name="y5" placeholder="Tartrazine" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="b1" class="form-label">Brilliant Blue (B1)</label>
              <input type="text" class="form-control" id="v-b1" name="b1" placeholder="Brilliant Blue" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="y10" class="form-label">Quinoline Yellow (Y10)</label>
              <input type="text" class="form-control" id="v-y10" name="y10" placeholder="Quinoline Yellow" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="sf" class="form-label">Silver F (SF)</label>
              <input type="text" class="form-control" id="v-sf" name="sf" placeholder="Silver F" readonly>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
            <i class="fas fa-times me-1"></i>Close
          </button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit me-2"></i>Edit Kode Warna</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>Marketing/master/Kode_warna/update">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="kode_warna" class="form-label">Kode Warna</label>
                <input type="hidden" id="e-id_master_kw_cap" name="id_master_kw_cap">
                <input type="hidden" id="e-id_master_kw_body" name="id_master_kw_body">
                <div class="input-group">
                  <input type="number" class="form-control" id="e-kode_warna" name="kode_warna" placeholder="Kode Warna" required>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="warna" class="form-label">Nama Warna</label>
                <input type="text" class="form-control" id="e-warna" name="warna" placeholder="Nama Warna" autocomplete="off" required>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="short_name" class="form-label">Short Name</label>
                <input type="text" class="form-control text-uppercase" id="e-short_name" name="short_name" placeholder="Short name" autocomplete="off" required>
              </div>
            </div>
          </div>

          <center><label for="formula_warna" class="font-weight-bold mt-3 form-label">Komposisi Formula</label></center>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="ti02" class="form-label">Titanium Dioksida (Ti02)</label>
                <div class="input-group">
                  <input type="number" step="0.01" class="form-control" id="e-ti02" name="ti02" autocomplete="off" placeholder="Titanium Dioksida" required>
                  <div class="input-group-append">
                    <span class="input-group-text">%</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="r1" class="form-label">Carmoisine (R1)</label>
                <div class="input-group">
                  <input type="number" step="0.01" class="form-control" id="e-r1" name="r1" autocomplete="off" placeholder="Carmoisine" required>
                  <div class="input-group-append">
                    <span class="input-group-text">ml</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="r3" class="form-label">Eritrhosine (R3)</label>
                <div class="input-group">
                  <input type="number" step="0.01" class="form-control" id="e-r3" name="r3" autocomplete="off" placeholder="Eritrhosine" required>
                  <div class="input-group-append">
                    <span class="input-group-text">ml</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="y5" class="form-label">Tartrazine (Y5)</label>
                <div class="input-group">
                  <input type="number" step="0.01" class="form-control" id="e-y5" name="y5" autocomplete="off" placeholder="Tartrazine" required>
                  <div class="input-group-append">
                    <span class="input-group-text">ml</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="b1" class="form-label">Brilliant Blue (B1)</label>
                <div class="input-group">
                  <input type="number" step="0.01" class="form-control" id="e-b1" name="b1" autocomplete="off" placeholder="Brilliant Blue" required>
                  <div class="input-group-append">
                    <span class="input-group-text">ml</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="y10" class="form-label">Quinoline Yellow (Y10)</label>
                <div class="input-group">
                  <input type="number" step="0.01" class="form-control" id="e-y10" name="y10" autocomplete="off" placeholder="Quinoline Yellow" required>
                  <div class="input-group-append">
                    <span class="input-group-text">ml</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="sf" class="form-label">Silver F (SF)</label>
                <div class="input-group">
                  <input type="number" step="0.01" class="form-control" id="e-sf" name="sf" autocomplete="off" placeholder="Silver F" required>
                  <div class="input-group-append">
                    <span class="input-group-text">ml</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
            <i class="fas fa-times me-1"></i>Close
          </button>
          <button type="submit" id="simpan" class="btn btn-primary">
            <i class="fas fa-save me-1"></i>Simpan
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    // Uppercase function
    uppercase('#kode_warna');
    uppercase('#warna');
    uppercase('#short_name');
    uppercase('#e-short_name');
    
    // Reset form ketika modal tambah ditutup
    $('#add').on('hidden.bs.modal', function() {
      $(this).find('form')[0].reset();
    });

    // Validasi input length
    $("#kode_warna").keypress(function() {
      if (this.value.length == 4) {
        return false;
      }
    });

    $("#ti02").keypress(function() {
      if (this.value.length == 5) {
        return false;
      }
    });

    $("#r1").keypress(function() {
      if (this.value.length == 5) {
        return false;
      }
    });

    $("#r3").keypress(function() {
      if (this.value.length == 5) {
        return false;
      }
    });

    $("#y5").keypress(function() {
      if (this.value.length == 5) {
        return false;
      }
    });

    $("#b1").keypress(function() {
      if (this.value.length == 5) {
        return false;
      }
    });

    $("#y10").keypress(function() {
      if (this.value.length == 5) {
        return false;
      }
    });

    $("#sf").keypress(function() {
      if (this.value.length == 5) {
        return false;
      }
    });

    // Modal View
    $('#view').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget);
      var id_kw_cap = button.data('id_master_kw_cap');
      var kode_warna = button.data('kode_warna_cap');
      var warna = button.data('warna_cap');
      var short_name = button.data('short_name');
      var ti02 = button.data('ti02');
      var r1 = button.data('r1');
      var r3 = button.data('r3');
      var y5 = button.data('y5');
      var b1 = button.data('b1');
      var y10 = button.data('y10');
      var sf = button.data('sf');

      $(this).find('#v-kode_warna').val(kode_warna);
      $(this).find('#v-warna').val(warna);
      $(this).find('#v-short_name').val(short_name);
      $(this).find('#v-ti02').val(ti02 + " %");
      $(this).find('#v-r1').val(r1 + " ml");
      $(this).find('#v-r3').val(r3 + " ml");
      $(this).find('#v-y5').val(y5 + " ml");
      $(this).find('#v-b1').val(b1 + " ml");
      $(this).find('#v-y10').val(y10 + " ml");
      $(this).find('#v-sf').val(sf + " ml");
    });

    // Modal Edit
    $('#edit').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget);
      
      // Ambil data dengan cara yang lebih reliable
      var id_kw_cap = button.attr('data-id_master_kw_cap') || button.data('id_master_kw_cap');
      var kode_warna = button.attr('data-kode_warna_cap') || button.data('kode_warna_cap');
      var warna = button.attr('data-warna_cap') || button.data('warna_cap');
      var short_name = button.attr('data-short_name') || button.data('short_name');
      var ti02 = button.attr('data-ti02') || button.data('ti02');
      var r1 = button.attr('data-r1') || button.data('r1');
      var r3 = button.attr('data-r3') || button.data('r3');
      var y5 = button.attr('data-y5') || button.data('y5');
      var b1 = button.attr('data-b1') || button.data('b1');
      var y10 = button.attr('data-y10') || button.data('y10');
      var sf = button.attr('data-sf') || button.data('sf');

      // Set values ke form edit
      $(this).find('#e-id_master_kw_cap').val(id_kw_cap);
      $(this).find('#e-id_master_kw_body').val(id_kw_cap);
      $(this).find('#e-kode_warna').val(kode_warna);
      $(this).find('#e-warna').val(warna);
      $(this).find('#e-short_name').val(short_name);
      $(this).find('#e-ti02').val(ti02);
      $(this).find('#e-r1').val(r1);
      $(this).find('#e-r3').val(r3);
      $(this).find('#e-y5').val(y5);
      $(this).find('#e-b1').val(b1);
      $(this).find('#e-y10').val(y10);
      $(this).find('#e-sf').val(sf);
    });

    // Function untuk uppercase
    function uppercase(selector) {
      $(selector).on('input', function() {
        this.value = this.value.toUpperCase();
      });
    }

    // Function untuk check koma (jika diperlukan)
    function checkKoma(selector) {
      $(selector).on('input', function() {
        this.value = this.value.replace(',', '.');
      });
    }

    // Terapkan checkKoma untuk input edit
    checkKoma('#e-ti02');
    checkKoma('#e-r1');
    checkKoma('#e-r3');
    checkKoma('#e-y5');
    checkKoma('#e-b1');
    checkKoma('#e-y10');
    checkKoma('#e-sf');

    // Auto-hide alert setelah 5 detik
    setTimeout(function() {
      $('.alert').alert('close');
    }, 5000);
  });
</script>
</body>
</html>