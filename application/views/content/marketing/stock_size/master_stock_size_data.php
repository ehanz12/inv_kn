<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Print</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #008cffff;
            --secondary: #1b39beff;
            --success: #4cc9f0;
            --info: #4895ef;
            --warning: #ae4976ff;
            --danger: #e63946;
            --light: #a1cbf5ff;
            --dark: #212529;
            --gray: #6c757d;
            --light-gray: #e9ecef;
            --border-radius: 12px;
            --box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            --transition: all 0.3s ease;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fb;
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
            box-shadow: 0 4px 8px rgba(160, 19, 172, 0.3);
        }
        
        .btn-info {
            background: linear-gradient(135deg, #4895ef, #3a86ff);
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
            background-color: rgba(50, 205, 50, 0.05);
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
            border-radius: 12px;
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
        }
        
        .alert-danger {
            border-radius: 12px;
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
            box-shadow: 0 0 0 0.2rem rgba(0, 140, 255, 0.25);
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
            background-color: rgba(222, 76, 76, 0.15);
            color: #7e1e1e;
            border: 1px solid rgba(205, 70, 70, 0.3);
        }
        
        .badge-info {
            background-color: rgba(72, 149, 239, 0.15);
            color: #1b39be;
            border: 1px solid rgba(72, 149, 239, 0.3);
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
                  <!-- <h5 class="m-b-10">Data Master Stock Size</h5> -->
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="feather icon-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="javascript:">Marketing</a></li>
                  <li class="breadcrumb-item"><a href="<?= base_url('Marketing/master/Master_stock') ?>">Master Stock Size</a></li>
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
                    <h5>Data Master Stock Size</h5>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#add">
                      <i class="feather icon-plus"></i> Tambah Stock Size
                    </button>
                  </div>
                  <div class="card-block table-border-style">

                    <!-- Alert dari URL parameter -->
                    <?php if (isset($_GET['alert']) && isset($_GET['msg'])): ?>
                      <div class="alert alert-<?= $_GET['alert'] == 'success' ? 'success' : 'danger' ?> alert-dismissible fade show">
                        <i class="feather <?= $_GET['alert'] == 'success' ? 'icon-check-circle' : 'icon-alert-triangle' ?>"></i>
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
                            <th>Master Stock</th>
                            <th>Size Machine</th>
                            <th>Bulan Stock</th>
                            <th>Tahun Stock</th>
                            <th>Dibuat Pada</th>
                            <th class="text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $level = $this->session->userdata('departement');
                          $no = 1;
                          if (!empty($result)) {
                            foreach ($result as $k) {
                              $bulanNames = [
                                'January',
                                'February',
                                'March',
                                'April',
                                'May',
                                'June',
                                'July',
                                'August',
                                'September',
                                'October',
                                'November',
                                'December'
                              ];
                              $bulanName = isset($bulanNames[$k['stok_bulan'] - 1]) ? $bulanNames[$k['stok_bulan'] - 1] : 'Unknown';
                              ?>
                              <tr>
                                <th scope="row"><?= $no++ ?></th>
                                <td><span class="badge badge-info"><?= $k['stok_master'] ?></span></td>
                                <td><span class="badge badge-info"><?= $k['size_machine'] ?></span></td>
                                <td><span class="badge badge-primary"><?= $bulanName ?></span></td>
                                <td><span class="badge badge-info"><?= $k['stok_tahun'] ?></span></td>
                                <td><?= date('d/m/Y', strtotime($k['created_at'])) ?></td>
                                <td class="text-center">
                                  <?php if ($level === "admin") { ?>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                      <button type="button" class="btn btn-info btn-square btn-sm" data-toggle="modal"
                                        data-target="#edit" 
                                        data-id_master_stok_size="<?= $k['id_master_stok_size'] ?>"
                                        data-stok_bulan="<?= $k['stok_bulan'] ?>" 
                                        data-stok_tahun="<?= $k['stok_tahun'] ?>"
                                        data-size_machine="<?= $k['size_machine'] ?>"
                                        data-stok_master="<?= $k['stok_master'] ?>">
                                        <i class="feather icon-edit-2"></i> Edit
                                      </button>
                                    </div>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                      <a type="button" class="btn btn-danger btn-square text-light btn-sm"
                                        href="<?= base_url() ?>Marketing/master/Master_stock/delete/<?= $k['id_master_stok_size'] ?>"
                                        onclick="if (! confirm('Apakah Anda Yakin?')) { return false; }">
                                        <i class="feather icon-trash-2"></i> Hapus
                                      </a>
                                    </div>
                                  <?php } ?>
                                </td>
                              </tr>
                            <?php
                            }
                          } else { ?>
                            <tr>
                              <td colspan="7" class="text-center py-4">
                                <i class="feather icon-inbox" style="font-size: 48px; color: #ccc;"></i>
                                <p class="text-muted mt-2">Belum ada data stock size</p>
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
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Stock Size</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <form method="post" action="<?= base_url() ?>Marketing/master/Master_stock/add">
        <div class="modal-body">
          <div class="form-group">
            <label for="stok_bulan">Bulan Stock</label>
            <select class="form-control" id="stok_bulan" name="stok_bulan" required>
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
          
          <div class="form-group">
            <label for="stok_master" class="form-label">Master Stok</label>
            <input type="text" class="form-control text-uppercase" id="stok_master" name="stok_master" autocomplete="off" placeholder="Stok Master" required>
          </div>
          
          <div class="form-group">
            <label for="size_machine">Size Machine</label>
            <select class="form-control" id="size_machine" name="size_machine" required>
              <option value="">- Pilih Size Machine -</option>
              <option value="00">00</option>
              <option value="0N">0N</option>
              <option value="1N">1N</option>
              <option value="2N">2N</option>
              <option value="3N">3N</option>     
            </select>
          </div>
              
          <div class="form-group">
            <label for="stok_tahun">Tahun Stock</label>
            <input type="number" class="form-control" id="stok_tahun" name="stok_tahun" min="2020" max="2030"
              value="<?= date('Y') ?>" placeholder="Tahun Stock" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Stock Size</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>Marketing/master/Master_stock/update">
        <div class="modal-body">
          <input type="hidden" id="e_id_master_stok_size" name="id_master_stok_size">
          
          <div class="form-group">
            <label for="e_stok_bulan">Bulan Stock</label>
            <select class="form-control" id="e_stok_bulan" name="stok_bulan" required>
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
          
          <div class="form-group">
            <label for="e_stok_master" class="form-label">Master Stok</label>
            <input type="text" class="form-control text-uppercase" id="e_stok_master" name="stok_master" autocomplete="off" placeholder="Stok Master" required>
          </div>
          
          <div class="form-group">
            <label for="e_size_machine">Size Machine</label>
            <select class="form-control" id="e_size_machine" name="size_machine" required>
              <option value="">- Pilih Size Machine -</option>
              <option value="00">00</option>
              <option value="0N">0N</option>
              <option value="1N">1N</option>
              <option value="2N">2N</option>
              <option value="3N">3N</option>     
            </select>
          </div>
          
          <div class="form-group">
            <label for="e_stok_tahun">Tahun Stock</label>
            <input type="number" class="form-control" id="e_stok_tahun" name="stok_tahun" min="2020" max="2030" placeholder="Tahun Stock" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-info">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
  $(document).ready(function () {
    // Modal edit show event
    $('#edit').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget);
      var id_master_stok_size = button.data('id_master_stok_size');
      var stok_bulan = button.data('stok_bulan');
      var size_machine = button.data('size_machine');
      var stok_tahun = button.data('stok_tahun');
      var stok_master = button.data('stok_master');

      var modal = $(this);
      modal.find('#e_id_master_stok_size').val(id_master_stok_size);
      modal.find('#e_stok_bulan').val(stok_bulan);
      modal.find('#e_size_machine').val(size_machine);
      modal.find('#e_stok_tahun').val(stok_tahun);
      modal.find('#e_stok_master').val(stok_master);
    });

    // Auto-hide alert setelah 5 detik
    setTimeout(function () {
      $('.alert').alert('close');
    }, 5000);
  });
</script>
</body>
</html>