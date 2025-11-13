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
            --primary: #2fc5ebff;
            --secondary: #108bdcff;
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
            /* background-color: #f5f7fb; */
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
            /* color: white; */
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(160, 19, 172, 0.3);
        }
        
        .btn-info {
            background: linear-gradient(135deg, #4895ef, #3a86ff);
            /* color: white; */
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
            background-color: #469bf0ff;
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
            background-color: #ffff6bff;
            border-color: #f8f364e1;
            color: #ffffffff;
        }
        
        .alert-danger {
            border-radius: 12px;
            background-color: #f8d7da;
            border-color: #464141ff;
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
            box-shadow: 0 0 0 0.2rem rgba(205, 50, 50, 0.25);
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
            /* color: white; */
            opacity: 0.8;
        }
        
        .close:hover {
            /* color: white; */
            opacity: 1;
        }
        
        .badge {
            padding: 6px 10px;
            border-radius: 6px;
            font-weight: 600;
        }
        
        .badge-primary {
            background-color: rgba(76, 134, 222, 0.15);
            color: #005cc6ff;
            border: 1px solid rgba(70, 155, 205, 0.3);
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
                                    <h5 class="m-b-10"><i class="fas fa-print me-2 text-lime"></i>Master Print Management</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="javascript:">Marketing</a></li>
                                    <li class="breadcrumb-item active text-lime">Master Print</li>
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
                                        <h5 style="Color: white;"><i class="fas fa-print me-2" ></i>Data Master Print</h5>

                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-light btn-sm float-right" data-toggle="modal" data-target="#add">
                                            <i class="fas fa-plus me-1"></i> Tambah Print
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
                                                        <th>Kode Print</th>
                                                        <th>Nama Customer</th>
                                                        <th>Logo Print</th>
                                                        <th>Dibuat Pada</th>
                                                        <th class="text-center">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $level = $this->session->userdata('departement');
                                                    $no = 1;
                                                    if(!empty($result)) {
                                                        foreach ($result as $k) {
                                                    ?>
                                                        <tr>
                                                            <th scope="row"><?= $no++ ?></th>
                                                            <td><span class="badge badge-primary"><?= $k['kode_print'] ?></span></td>
                                                            <td><?= $k['nama_customer'] ?></td>
                                                            <td><?= $k['logo_print'] ?></td>
                                                            <td><?= date('d/m/Y', strtotime($k['created_at'])) ?></td>
                                                            <td class="text-center">
                                                                <?php if ($level === "admin") { ?>
                                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit" 
                                                                                data-id_master_print="<?= $k['id_master_print'] ?>" 
                                                                                data-kode_print="<?= $k['kode_print'] ?>" 
                                                                                data-id_master_customer="<?= $k['id_master_customer'] ?>" 
                                                                                data-logo_print="<?= $k['logo_print'] ?>">
                                                                            <i class="fas fa-edit me-1"></i> Edit
                                                                        </button>
                                                                        <a type="button" class="btn btn-danger btn-sm text-light" 
                                                                           href="<?= base_url() ?>Marketing/master/Master_print/delete/<?= $k['id_master_print'] ?>" 
                                                                           onclick="if (! confirm('Apakah Anda Yakin?')) { return false; }">
                                                                            <i class="fas fa-trash me-1"></i> Hapus
                                                                        </a>
                                                                    </div>
                                                                <?php } ?>
                                                            </td>
                                                        </tr>
                                                    <?php 
                                                        }
                                                    } else { ?>
                                                        <tr>
                                                            <td colspan="6" class="text-center no-data">
                                                                <i class="fas fa-inbox fa-3x mb-3 text-muted"></i>
                                                                <p class="mb-0">Belum ada data print</p>
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
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus-circle me-2"></i>Tambah Master Print</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url() ?>Marketing/master/Master_print/add">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="id_master_customer" class="form-label">Nama Customer</label>
                        <select class="form-control" id="id_master_customer" name="id_master_customer" required>
                            <option value="">- Pilih Customer -</option>
                            <?php
                            // Ambil data customer dari database
                            $customers = $this->db->query("SELECT * FROM tb_mkt_master_customer WHERE is_deleted = 0 ORDER BY nama_customer ASC")->result_array();
                            foreach($customers as $customer) {
                                echo '<option value="'.$customer['id_customer'].'">'.$customer['nama_customer'].'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kode_print" class="form-label">Kode Print</label>
                        <input type="text" class="form-control text-uppercase" id="kode_print" name="kode_print" autocomplete="off" placeholder="Kode Print" aria-describedby="validationServer03Feedback" required>
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <i class="fas fa-exclamation-triangle me-1"></i>Maaf Kode Print sudah ada.
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="logo_print" class="form-label">Logo Print</label>
                        <input type="text" class="form-control text-uppercase" id="logo_print" name="logo_print" autocomplete="off" placeholder="Logo Print" required>
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
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit me-2"></i>Edit Master Print</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url() ?>Marketing/master/Master_print/update" id="form-edit">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="id_master_customer" class="form-label">Nama Customer</label>
                        <select class="form-control" id="e_id_master_customer" name="id_master_customer" required>
                            <option value="">- Pilih Customer -</option>
                            <?php
                            foreach($customers as $customer) {
                                echo '<option value="'.$customer['id_customer'].'">'.$customer['nama_customer'].'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kode_print" class="form-label">Kode Print</label>
                        <input type="hidden" id="e_id_master_print" name="id_master_print">
                        <input type="text" class="form-control text-uppercase" id="e_kode_print" name="kode_print" autocomplete="off" required>
                        <div id="validationServer03FeedbackEdit" class="invalid-feedback">
                            <i class="fas fa-exclamation-triangle me-1"></i>Maaf Kode Print sudah ada.
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="logo_print" class="form-label">Logo Print</label>
                        <input type="text" class="form-control text-uppercase" id="e_logo_print" name="logo_print" autocomplete="off" required>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        // Fungsi uppercase untuk input text
        uppercase('#kode_print');
        uppercase('#logo_print');
        uppercase('#e_kode_print');
        uppercase('#e_logo_print');

        // Cek kode print untuk tambah data
        $("#kode_print").keyup(function(){
            var kode_print = $("#kode_print").val();
            jQuery.ajax({
                url: "<?= base_url() ?>Marketing/master/Master_print/cek_kode_print",
                dataType: 'text',
                type: "post",
                data: {kode_print: kode_print},
                success: function(response){
                    if (response == "true") {
                        $("#kode_print").addClass("is-invalid");
                        $("#simpan").attr("disabled", "disabled");
                    } else {
                        $("#kode_print").removeClass("is-invalid");
                        $("#simpan").removeAttr("disabled");
                    }
                }            
            });
        });

        // Cek kode print untuk edit data
        $("#e_kode_print").keyup(function(){
            var kode_print = $("#e_kode_print").val();
            var id_master_print = $("#e_id_master_print").val();
            
            jQuery.ajax({
                url: "<?= base_url() ?>Marketing/master/Master_print/cek_kode_print_edit",
                dataType: 'text',
                type: "post",
                data: {
                    kode_print: kode_print,
                    id_master_print: id_master_print
                },
                success: function(response){
                    if (response == "true") {
                        $("#e_kode_print").addClass("is-invalid");
                        $("#update-btn").attr("disabled", "disabled");
                    } else {
                        $("#e_kode_print").removeClass("is-invalid");
                        $("#update-btn").removeAttr("disabled");
                    }
                }            
            });
        });

        // Modal edit show event
        $('#edit').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id_master_print = button.data('id_master_print');
            var kode_print = button.data('kode_print');
            var id_master_customer = button.data('id_master_customer');
            var logo_print = button.data('logo_print');

            var modal = $(this);
            modal.find('#e_id_master_print').val(id_master_print);
            modal.find('#e_kode_print').val(kode_print);
            modal.find('#e_id_master_customer').val(id_master_customer);
            modal.find('#e_logo_print').val(logo_print);

            // Reset validation state
            modal.find('#e_kode_print').removeClass("is-invalid");
            modal.find('#update-btn').removeAttr("disabled");

            // Apply uppercase
            uppercase('#e_kode_print');
            uppercase('#e_logo_print');
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