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

  #mesh_container, #bloom_container { display: none; }
  #e-mesh_container, #e-bloom_container { display: none; }
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
                  <!-- <h5 class="m-b-10">Data Barang</h5> -->
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="feather icon-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="javascript:">Administrator</a></li>
                  <li class="breadcrumb-item"><a href="<?= base_url('administrator/master_barang') ?>">Master Barang</a></li>
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
                    <h5>Data Barang</h5>
                    <div class="float-right">
                      <div class="input-group">
                        <select class="form-control chosen-select" id="filter_barang" name="filter_barang">
                          <option value="" disabled selected hidden>- Nama Barang -</option>
                          <?php foreach ($fil_barang as $nm) { ?>
                            <option value="<?= $nm['nama_barang'] ?>"><?= $nm['nama_barang'] ?></option>
                          <?php } ?>
                        </select>
                        <select class="form-control chosen-select" id="filter_jenis_barang" name="filter_jenis_barang">
                          <option value="" disabled selected hidden>- Jenis Barang -</option>
                            <option value="Bahan Baku">Bahan Baku</option>
                            <option value="Bahan Tambahan">Bahan Tambahan</option>
                            <option value="Bahan Kemas">Bahan Kemas</option>
                            <option value="Pewarna">Pewarna</option>
                            <option value="Printing">Printing</option>
                            <option value="Bahan Pembantu">Bahan Pembantu</option>
                            <option value="Alat Ukur">Alat Ukur</option>
                        </select>
                        <div class="btn-group">
                          <button class="btn btn-secondary" id="lihat" type="button">Lihat</button>
                        </div>
                        <div class="btn-group">
                          <button class="btn btn-primary" id="export" type="button">Cetak</button>
                        </div>
                        <div class="btn-group">
                          <a href="<?= base_url() ?>administrator/master_barang" style="width: 40px;" class="btn btn-warning" id="export" type="button"><i class="feather icon-refresh-ccw"></i></a>
                        </div>
                        <div class="btn-group">
                          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add">
                            <i class="feather icon-plus"></i>Tambah Data
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-block table-border-style">
                    <div class="table-responsive">
                      <table class="table datatable table-hover table-striped table-sm">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Jenis Barang</th>
                            <th>Tipe Barang</th>
                            <th>Spesifikasi</th>
                            <th>Satuan</th>
                            <th>Nama Supplier</th>
                            <th class="text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $level = $this->session->userdata('departement');
                          $jabatan = $this->session->userdata('jabatan');
                          $no = 1;
                          foreach ($result as $k) {
                          ?>
                            <tr>
                              <th scope="row"><?= $no++ ?></th>
                              <td><?= $k['kode_barang'] ?></td>
                              <td><?= $k['nama_barang'] ?></td>
                              <td><?= $k['jenis_barang'] ?></td>
                              <td><?= $k['tipe_barang'] ?></td>
                              <td><?= $k['spek'] ?></td>
                              <td><?= $k['satuan'] ?></td>
                              <td><?= $k['nama_supplier'] ?></td>
                              <td class="text-center">
                                <?php if ($level === "admin" || $jabatan === "supervisor") { ?>
                                  <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-primary btn-square btn-sm"
                                    data-toggle="modal" 
                                    data-target="#edit" 
                                    data-id_prc_master_barang="<?= $k['id_prc_master_barang'] ?>" 
                                    data-kode_barang="<?= $k['kode_barang'] ?>" 
                                    data-nama_barang="<?= $k['nama_barang'] ?>" 
                                    data-jenis_barang="<?= $k['jenis_barang'] ?>"
                                    data-id_prc_master_supplier="<?=$k['id_prc_master_supplier']?>" 
                                    data-mesh="<?=$k['mesh']?>" data-bloom="<?=$k['bloom']?>" 
                                    data-tipe_barang="<?= $k['tipe_barang'] ?>"
                                    data-spek="<?= $k['spek'] ?>" 
                                    data-satuan="<?= $k['satuan'] ?>"
                                    data-departement="<?= $k['departement'] ?>>"
                                    data-lab_test="<?= $k['lab_test'] ?>">
                                      <i class="feather icon-edit-2"></i>Edit
                                    </button>
                                  </div>
                                  <div class="btn-group" role="group">
                                    <a href="<?= base_url() ?>purchasing/prc_ppb/prc_ppb_masterbarang/delete/<?= $k['id_prc_master_barang'] ?>" class="btn btn-danger btn-square text-light btn-sm" onclick="if (! confirm('Apakah Anda Yakin?')) { return false; }">
                                      <i class="feather icon-trash-2"></i>Hapus
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
              <!-- [ basic-table ] end -->
            </div>
            <!-- [ Main Content ] end -->
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script type="text/javascript">
  $(document).ready(function() {
    $('#lihat').click(function() {
      var filter_nama = $('#filter_barang').find(':selected').val();
      var filter_jenis_barang = $('#filter_jenis_barang').find(':selected').val();
      console.log(filter_jenis_barang)
      console.log(filter_nama)
      // If filter_nama is empty, show an alert (optional validation)
      // if (filter_nama != '' || filter_jenis_barang == "") {
      //   window.location = "<?= base_url() ?>administrator/master_barang?alert=warning&msg=Filter belum dipilih";
      // } else {
        const query = new URLSearchParams({
          nama_barang: filter_nama,
          jenis_barang : filter_jenis_barang
        });
        window.location = "<?= base_url() ?>administrator/master_barang/index?" + query.toString();
      // }
    });

    $('#export').click(function() {
      var filter_nama = $('#filter_barang').find(':selected').val();

      // If filter_nama is empty, show an alert (optional validation)
      if (filter_nama == '') {
        window.location = "<?= base_url() ?>Purchasing/prc_ppb/Prc_ppb_masterbarang?alert=warning&msg=barang belum dipilih";
        alert("Barang belum dipilih");
      } else {
        const query = new URLSearchParams({
          name: filter_nama
        });
        var url = "<?= base_url() ?>administrator/master_barang?" + query.toString();
        window.open(url, 'location=yes,height=700,width=1300,scrollbars=yes,status=yes');
      }
    });
  });
</script>


<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>administrator/master_barang/add">
        <div class="modal-body">
          <div class="row">

          <div class="col-md-6">
              <div class="form-group">
                <label for="kode_barang">Kode Barang</label>
                <input type="text" class="form-control" id="kode_barang" name="kode_barang" maxlength="20" placeholder="Kode Barang" aria-describedby="validationServer03Feedback" autocomplete="off" required>
                <div id="validationServer03Feedback" class="invalid-feedback">
                  Maaf Kode Barang sudah ada.
                </div>
              </div>
            </div>
             <div class="col-md-6">
              <div class="form-group">
                <label for="departement">Departement</label>
                <select class="form-control chosen-select" id="departement" name="departement" required>
                  <option value="" disabled selected hidden>- Pilih Departement -</option>
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

            <div class="col-md-6">
              <div class="form-group">
                <label for="lab_test">Pengujian Lab</label>
                <select class="form-control chosen-select" id="lab_test" name="lab_test" required>
                  <option value="" disabled selected hidden>- Butuh Pengujian -</option>
                  <option value="yes">yes</option>
                  <option value="no">no</option>
                  </select>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="jenis_barang">Jenis Barang</label>
                <select class="form-control chosen-select" id="jenis_barang" name="jenis_barang" required>
                  <option value="" disabled selected hidden>- Pilih Jenis Barang -</option>
                  <option value="Bahan Baku">Bahan Baku</option>
                  <option value="Bahan Tambahan">Bahan Tambahan</option>
                  <option value="Bahan Kemas">Bahan Kemas</option>
                  <option value="Pewarna">Pewarna</option>
                  <option value="Printing">Printing</option>
                  <option value="Bahan Pembantu">Bahan Pembantu</option>
                  <option value="Alat Ukur">Alat Ukur</option>
                </select>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama Barang" autocomplete="off">
              </div>
            </div>

            <div class="col-md-3" id="mesh_container">
              <div class="form-group">
                <label for="mesh">Mesh</label>
                <input type="text"  class="form-control" id="mesh" name="mesh" placeholder="Mesh" autocomplete="off">
              </div>
            </div>
            <div class="col-md-3" id="bloom_container">
              <div class="form-group">
                <label for="Bloom">Bloom</label>
                <input type="text"  class="form-control" id="bloom" name="bloom" placeholder="Bloom" autocomplete="off">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="spek">Spesifikasi</label>
                <input type="text" class="form-control" id="spek" name="spek" placeholder="Spesifikasi" autocomplete="off">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="satuan">Satuan</label>
                <select class="form-control chosen-select" id="satuan" name="satuan" required>
                  <option value="" disabled selected hidden>- Pilih Satuan -</option>
                  <option value="Bh">Buah</option>
                  <option value="Set">Set</option>
                  <option value="Pcs">Pcs</option>
                  <option value="Roll">Roll</option>
                  <option value="Mtr">Meter</option>
                  <option value="Klg">Kaleng</option>
                  <option value="Ltr">Liter</option>
                  <option value="Kg">Kg</option>
                  <option value="Grm">Gram</option>
                  <option value="Cm">Centimeter</option>
                  <option value="Cc">Cubic Centimeter</option>
                  <option value="bks">Bungkus</option>
                  <option value="Pack">Package</option>
                  <option value="lbr">Lembar</option> 
                </select>
              </div>
            </div>
          </div>
        
        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" id="simpan" class="btn btn-primary" onclick="if (!confirm('Apakah Anda Yakin Untuk Menyimpan Data Ini? Tolong Untuk Di Check Kembali. Dan Jangan Lupa Untuk Menginputkan Barangnya')) { return false; }">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    $("#kode_barang").keyup(function() {
            var kode_barang = $("#kode_barang").val();
            jQuery.ajax({
                url: "<?= base_url() ?>administrator/master_barang/cek_kode_barang/",
                dataType: 'text',
                type: "post",
                data: {
                    kode_barang: kode_barang
                },
                success: function(response) {
                    if (response == "true") {
                        $("#kode_barang").addClass("is-invalid");
                        $("#simpan").attr("disabled", "disabled");
                    } else {
                        $("#kode_barang").removeClass("is-invalid");
                        $("#simpan").removeAttr("disabled");
                    }
                }
            });
        })

        // 🔹 Logic untuk show/hide input Mesh & Bloom
        function toggleMeshBloom() {
          let jenis = $('#jenis_barang').val();
          if (jenis === 'Bahan Baku') {
            $('#mesh_container').slideDown(200);
            $('#bloom_container').slideDown(200);
            $('#mesh').prop('required', true);
            $('#Bloom').prop('required', true);
          } else {
            $('#mesh_container').slideUp(200);
            $('#bloom_container').slideUp(200);
            $('#mesh').prop('required', false);
            $('#Bloom').prop('required', false);
            $('#mesh').val('');
            $('#Bloom').val('');
          }
        }

         $('#mesh').on('input', function() {
            this.value = this.value.replace(/[^0-9+]/g, ''); // hanya boleh angka & +
        });

         $('#bloom').on('input', function() {
            this.value = this.value.replace(/[^0-9+]/g, ''); // hanya boleh angka & +
        });

        // Jalankan saat dropdown berubah
        $('#jenis_barang').on('change', toggleMeshBloom);

        // Jalankan sekali saat awal (misal kalau edit)
        toggleMeshBloom();
  });
</script>

< <!-- Modal Edit-->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>purchasing/prc_ppb/prc_ppb_masterbarang/update">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="kode_barang">Kode Barang</label>
                <input type="hidden" id="e-id_prc_master_barang" name="id_prc_master_barang">
                <input type="text" class="form-control" id="e-kode_barang" name="kode_barang" placeholder="Kode Barang" autocomplete="off" required>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="departement">Departement</label>
                <select class="form-control chosen-select" id="e-departement" name="departement" required>
                  <option value="" disabled selected hidden>- Pilih Departement -</option>
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

            <div class="col-md-6">
              <div class="form-group">
                <label for="jenis_barang">Jenis Barang</label>
                <select class="form-control chosen-select" id="e-jenis_barang" name="jenis_barang" required>
                  <option value="" disabled selected hidden>- Pilih Jenis Barang -</option>
                  <option value="Bahan Baku">Bahan Baku</option>
                  <option value="Bahan Tambahan">Bahan Tambahan</option>
                  <option value="Bahan Kemas">Bahan Kemas</option>
                  <option value="Pewarna">Pewarna</option>
                  <option value="Printing">Printing</option>
                  <option value="Bahan Pembantu">Bahan Pembantu</option>
                  <option value="Alat Ukur">Alat Ukur</option>
                </select>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                <input type="text" class="form-control" id="e-nama_barang" name="nama_barang" placeholder="Nama Barang" autocomplete="off" required>
              </div>
            </div>

            <!-- Tambahkan ini -->
            <div class="col-md-3" id="e-mesh_container">
              <div class="form-group">
                <label for="e-mesh">Mesh</label>
                <input type="text" class="form-control" id="e-mesh" name="mesh" placeholder="Mesh" autocomplete="off">
              </div>
            </div>

            <div class="col-md-3" id="e-bloom_container">
              <div class="form-group">
                <label for="e-bloom">Bloom</label>
                <input type="text" class="form-control" id="e-bloom" name="bloom" placeholder="Bloom" autocomplete="off">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="spek">Spesifikasi</label>
                <input type="text" class="form-control" id="e-spek" name="spek" placeholder="Spesifikasi" autocomplete="off">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="satuan">Satuan</label>
                <select class="form-control chosen-select" id="e-satuan" name="satuan" required>
                  <option value="" disabled selected hidden>- Pilih Satuan -</option>
                  <option value="Bh">Buah</option>
                  <option value="Set">Set</option>
                  <option value="Pcs">Pcs</option>
                  <option value="Roll">Roll</option>
                  <option value="Mtr">Meter</option>
                  <option value="Klg">Kaleng</option>
                  <option value="Ltr">Liter</option>
                  <option value="Kg">Kg</option>
                  <option value="Grm">Gram</option>
                  <option value="Cm">Centimeter</option>
                  <option value="Cc">Cubic Centimeter</option>
                  <option value="bks">Bungkus</option>
                  <option value="Pack">Package</option>
                  <option value="lbr">Lembar</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" id="simpan" class="btn btn-primary" onclick="if (! confirm('Apakah Anda Yakin Untuk Mengedit Data Ini? Tolong Untuk Di Check Kembali. Dan Jangan Lupa Untuk Menginputkan Barangnya')) { return false; }">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {

    // 🔹 Saat modal edit ditampilkan
    $('#edit').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget);
      var id_prc_master_barang = button.data('id_prc_master_barang');
      var id_prc_ppb_supplier = button.data('id_prc_master_supplier');
      var kode_barang = button.data('kode_barang');
      var nama_barang = button.data('nama_barang');
      var jenis_barang = button.data('jenis_barang');
      var tipe_barang = button.data('tipe_barang');
      var spek = button.data('spek');
      var satuan = button.data('satuan');
      var mesh = button.data('mesh');
      var bloom = button.data('bloom');
      var departement = button.data('departement');
      var lab_test = button.data('lab_test');

      var modal = $(this);
      modal.find('#e-id_prc_master_barang').val(id_prc_master_barang);
      modal.find('#e-id_prc_ppb_supplier').val(id_prc_ppb_supplier);
      modal.find('#e-kode_barang').val(kode_barang);
      modal.find('#e-nama_barang').val(nama_barang);
      modal.find('#e-jenis_barang').val(jenis_barang);
      modal.find('#e-tipe_barang').val(tipe_barang);
      modal.find('#e-spek').val(spek);
      modal.find('#e-satuan').val(satuan);
      modal.find('#e-mesh').val(mesh);
      modal.find('#e-bloom').val(bloom);
      modal.find('#e-departement').val(departement);
      modal.find('#e-lab_test').val(lab_test);

      modal.find('#e-id_prc_ppb_supplier').trigger("chosen:updated");
      modal.find('#e-satuan').trigger("chosen:updated");
      modal.find('#e-jenis_barang').trigger("chosen:updated");
      modal.find('#e-tipe_barang').trigger("chosen:updated");
      modal.find('#e-departement').trigger("chosen:updated");
      modal.find('#e-lab_test').trigger("chosen:updated");

       $('#e-mesh').on('input', function() {
            this.value = this.value.replace(/[^0-9+]/g, ''); // hanya boleh angka & +
        });

       $('#e-bloom').on('input', function() {
            this.value = this.value.replace(/[^0-9+]/g, ''); // hanya boleh angka & +
        });

      // 🔹 Jalankan toggle logic saat modal dibuka
      toggleEditMeshBloom();
    });

    // 🔹 Function untuk show/hide mesh & bloom
    function toggleEditMeshBloom() {
      let jenis = $('#e-jenis_barang').val();
      if (jenis === 'Bahan Baku') {
        $('#e-mesh_container').slideDown(200);
        $('#e-bloom_container').slideDown(200);
        $('#e-mesh').prop('required', true);
        $('#e-bloom').prop('required', true);
      } else {
        $('#e-mesh_container').slideUp(200);
        $('#e-bloom_container').slideUp(200);
        $('#e-mesh').prop('required', false);
        $('#e-bloom').prop('required', false);
        $('#e-mesh').val('');
        $('#e-bloom').val('');
      }
    }

    // 🔹 Jalankan ketika dropdown jenis barang diubah
    $('#e-jenis_barang').on('change', toggleEditMeshBloom);
  });
</script>
