<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!-- CSS Tambahan -->
<style>
  .table th {
    background: linear-gradient(135deg, #4361ee, #3a0ca3);
    color: white;
    font-weight: 600;
    border: 1px solid #dee2e6;
  }
  .table td {
    border: 1px solid #dee2e6;
    vertical-align: middle;
  }
  .bg-light-primary {
    background-color: #e3f2fd !important;
  }
  .bg-light-info {
    background-color: #e1f5fe !important;
  }
  .form-control[readonly] {
    background-color: #f8f9fa !important;
  }
  .btn-group .btn {
    margin-right: 2px;
  }
  .spinner-border-sm {
    width: 1rem;
    height: 1rem;
  }
  .jumlah-input {
    width: 120px;
    text-align: center;
    border: 1px solid #28a745;
    background-color: #f8f9fa;
    font-weight: bold;
    margin: 0 auto;
  }
  .input-tambahan {
    width: 120px;
    text-align: center;
    border: 1px solid #4361ee;
    margin: 0 auto;
  }
  .text-center {
    text-align: center !important;
  }
  .align-middle {
    vertical-align: middle !important;
  }
  .modal-header .modal-title {
    font-weight: 700;
    font-size: 1.5rem;
  }
  .form-group label {
    font-size: 14px;
    margin-bottom: 8px;
  }
  
  /* CSS untuk tampilan yang digabungkan */
  .merged-row {
    background-color: #e8f5e9 !important;
    border-left: 4px solid #28a745 !important;
    font-weight: bold;
  }
  .merged-row:hover {
    background-color: #c8e6c9 !important;
  }
  .child-row {
    background-color: #f8f9fa !important;
  }
  .child-row:hover {
    background-color: #e9ecef !important;
  }
  .no-batch-badge {
    background-color: #4361ee;
    color: white;
    padding: 2px 8px;
    border-radius: 12px;
    font-size: 12px;
    margin: 1px;
    display: inline-block;
  }
  .toggle-details {
    cursor: pointer;
    transition: transform 0.3s ease;
  }
  .toggle-details.collapsed {
    transform: rotate(-90deg);
  }
  .child-details {
    display: none;
  }
  .child-details.show {
    display: table-row;
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
                  <h5 class="m-b-10">Data DPB (Daftar Permintaan Barang)</h5>
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="feather icon-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="javascript:">Administrator</a></li>
                  <li class="breadcrumb-item"><a href="javascript:">DPB Management</a></li>
                  <li class="breadcrumb-item"><a href="<?= base_url('administrator/dpb/adm_dpb') ?>">Data DPB</a></li>
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
                    <h5>Data DPB</h5>
                    <div class="float-right">
                      <div class="input-group">
                        <input type="text" id="filter_tgl" value="<?= $tgl == null ? '' : $tgl ?>" class="form-control datepicker" placeholder="Filter Dari Tanggal" autocomplete="off">
                        <input type="text" id="filter_tgl2" value="<?= $tgl2 == null ? '' : $tgl2 ?>" class="form-control datepicker" placeholder="Filter Sampai Tanggal" autocomplete="off">
                        <div class="btn-group">
                          <button class="btn btn-secondary btn-sm" id="lihat" type="button">Lihat</button>
                        </div>
                        <div class="btn-group">
                          <a href="<?= base_url() ?>administrator/dpb/adm_dpb" style="width: 40px;" class="btn btn-warning" id="reset" type="button"><i class="feather icon-refresh-ccw"></i></a>
                        </div>
                      </div>
                    </div>
                    <br><br>
                    
                  </div>
                  <div class="card-block table-border-style">
                    <div class="table-responsive">
                      <table class="table datatable table-bordered table-hover table-striped table-sm">
                        <thead>
                          <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Tanggal DPB</th>
                            <!-- <th class="text-center">No DPB</th> -->
                            <th class="text-center">No Surat Jalan</th>
                            
                            <th class="text-center">Detail Barang</th>
                            <th class="text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $level = $this->session->userdata('departement');
                          
                          // Kelompokkan data berdasarkan no_dpb
                          $grouped_data = [];
                          foreach ($result as $k) {
                            $no_dpb = $k['no_dpb'];
                            if (!isset($grouped_data[$no_dpb])) {
                              $grouped_data[$no_dpb] = [];
                            }
                            $grouped_data[$no_dpb][] = $k;
                          }
                          
                          $no = 1;
                          foreach ($grouped_data as $no_dpb => $items) {
                            $first_item = $items[0];
                            $tgl_dpb = $first_item['tgl_dpb'] ?? '-';
                            $no_surat_jalan = $first_item['no_sjl'] ?? '-';
                            $status = $first_item['is_deleted'] == 1 ? '<span class="badge badge-danger">Dihapus</span>' : '<span class="badge badge-success">Aktif</span>';
                            $item_count = count($items);
                            
                            // Cek apakah ada jumlah_bm yang sudah terisi
                            $can_add = true;
                            foreach ($items as $item) {
                                if (isset($item['jml_diterima']) && $item['jml_diterima'] > 0) {
                                    $can_add = false;
                                    break;
                                }
                            }
                            
                            // Tampilkan baris utama (merged)
                          ?>
                            <tr class="merged-row" data-dpb="<?= $no_dpb ?>">
                              <th scope="row" class="text-center"><?= $no++ ?></th>
                              <td class="text-center"><?= $tgl_dpb ?></td>
                              <!-- <td class="text-center"><strong><?= $no_dpb ?></strong></td> -->
                              <td class="text-center"><?= $no_surat_jalan ?></td>
                              <td class="text-center">
                                <span class="toggle-details" data-dpb="<?= $no_dpb ?>">
                                  <i class="feather icon-chevron-down"></i>
                                  <?= $item_count ?> item
                                </span>
                                <div class="mt-1">
                                  <?php 
                                  $batch_counts = [];
                                  foreach ($items as $item) {
                                    $batch = $item['no_batch'] ?? '-';
                                    if (!isset($batch_counts[$batch])) {
                                      $batch_counts[$batch] = 0;
                                    }
                                    $batch_counts[$batch]++;
                                  }
                                  foreach ($batch_counts as $batch => $count) {
                                    echo '<span class="no-batch-badge">' . $batch . ' (' . $count . ')</span> ';
                                  }
                                  ?>
                                </div>
                              </td>
                              <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <?php if ($can_add) { ?>
                                  <button type="button" class="btn btn-primary float-right btn-sm btn-add-item" 
                                          data-toggle="modal" data-target="#add"
                                          data-no_dpb="<?= $no_dpb ?>">
                                    <i class="feather icon-plus"></i> 
                                  </button>
                                  <?php } ?>
                                  <!-- <button type="button" class="btn btn-info btn-sm view-detail" data-toggle="modal" data-target="#detailModal" 
                                          data-no_dpb="<?= $no_dpb ?>"
                                          data-tgl_dpb="<?= $tgl_dpb ?>"
                                          data-no_sjl="<?= $no_surat_jalan ?>"
                                          title="Lihat Detail">
                                    <i class="feather icon-eye"></i>
                                  </button> -->
                                  <?php if ($level === "admin" && $first_item['is_deleted'] == 0) { ?>
                                    <a type="button" class="btn btn-danger btn-sm text-light" href="<?= base_url() ?>administrator/adm_dpb/delete/<?= str_replace('/', '--', $no_dpb) ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus DPB ini?')" title="Hapus DPB">
                                      <i class="feather icon-trash"></i>
                                    </a>
                                  <?php } ?>
                                </div>
                              </td>
                            </tr>
                            
                            <!-- Baris detail untuk setiap item -->
                            <?php foreach ($items as $index => $item) { ?>
                              <tr class="child-details child-row" data-dpb-parent="<?= $no_dpb ?>" style="display: none;">
                                <td class="text-center"></td>
                                <td class="text-center"><?= $item['tgl_dpb'] ?? '-' ?></td>
                                <td class="text-center">
                                  <small><?= $no_dpb ?></small>
                                </td>
                                <td class="text-center"><?= $item['no_sjl'] ?? '-' ?></td>
                                <td class="text-center">
                                  <?= $item['is_deleted'] == 1 ? '<span class="badge badge-danger">Dihapus</span>' : '<span class="badge badge-success">Aktif</span>' ?>
                                </td>
                                <td class="text-center">
                                  <div>
                                    <strong>Kode:</strong> <?= $item['kode_barang'] ?><br>
                                    <strong>Nama:</strong> <?= $item['nama_barang'] ?><br>
                                    <strong>Batch:</strong> <span class="no-batch-badge"><?= $item['no_batch'] ?></span><br>
                                    <strong>Jumlah BM:</strong> 
                                    <?php if (isset($item['jml_diterima']) && $item['jml_diterima'] > 0): ?>
                                      <span class="badge badge-success"><?= $item['jml_diterima'] ?></span>
                                    <?php else: ?>
                                      <span class="badge badge-warning">Belum diisi</span>
                                    <?php endif; ?>
                                  </div>
                                </td>
                                <td class="text-center">
                                  <div class="btn-group" role="group" aria-label="Basic example">
                                    <?php if (!isset($item['jml_diterima']) || $item['jml_diterima'] == 0) { ?>
                                    <button type="button" class="btn btn-primary btn-sm btn-add-item" 
                                            data-toggle="modal" data-target="#add"
                                            data-no_dpb="<?= $no_dpb ?>">
                                      <i class="feather icon-plus"></i> 
                                    </button>
                                    <?php } ?>
                                    <button type="button" class="btn btn-info btn-sm view-item-detail" 
                                            data-kode_barang="<?= $item['kode_barang'] ?>"
                                            data-no_batch="<?= $item['no_batch'] ?>"
                                            data-toggle="modal" data-target="#itemDetailModal"
                                            title="Lihat Detail Item">
                                      <i class="feather icon-eye"></i>
                                    </button>
                                    <?php if ($level === "admin" && $item['is_deleted'] == 0) { ?>
                                      <a type="button" class="btn btn-danger btn-sm text-light" href="<?= base_url() ?>administrator/adm_dpb/delete_item/<?= $item['id_adm_dpb'] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus item ini?')" title="Hapus Item">
                                        <i class="feather icon-trash"></i>
                                      </a>
                                    <?php } ?>
                                  </div>
                                </td>
                              </tr>
                            <?php } ?>
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

<!-- Modal ADD -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      
      <div class="modal-header">
        <h5 class="modal-title text-center w-100" id="addModalLabel">Tambah Data DPB</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <form method="post" action="<?= base_url() ?>administrator/adm_dpb/add">
        <div class="modal-body">
          <!-- Header DPB -->
          <div class="row mb-4">
            <div class="col-md-3">
              <div class="form-group text-center">
                <label for="tgl_dpb" class="font-weight-bold">Tanggal DPB</label>
                <input type="text" class="form-control text-center" id="tgl_dpb" name="tgl_dpb" readonly style="background-color: #f8f9fa; font-weight: bold;">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group text-center">
                <label for="no_dpb" class="font-weight-bold">No DPB</label>
                <input type="text" class="form-control text-center" id="no_dpb" name="no_dpb" readonly style="background-color: #f8f9fa; font-weight: bold;">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group text-center">
                <label for="no_sjl" class="font-weight-bold">No Surat Jalan</label>
                <input type="text" class="form-control text-center" id="no_sjl" name="no_sjl" readonly style="background-color: #f8f9fa;">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group text-center">
                <label for="status" class="font-weight-bold">Status</label>
                <input type="text" class="form-control text-center" value="0" readonly style="background-color: #f8f9fa; font-weight: bold;">
              </div>
            </div>
          </div>

          <!-- Detail Barang Table -->
          <div class="row">
            <div class="col-md-12">
              <div class="table-responsive">
                <table class="table table-bordered table-sm table-hover" style="font-size: 14px;">
                  <thead class="bg-light-primary">
                    <tr>
                      <th class="text-center align-middle">Kode Barang</th>
                      <th class="text-center align-middle">Nama Barang</th>
                      <th class="text-center align-middle">Jenis Bayar</th>
                      <th class="text-center align-middle">Jumlah PPB</th>
                      <th class="text-center align-middle">Jumlah Diterima</th>
                      <th class="text-center align-middle">No Batch</th>
                    </tr>
                  </thead>
                  <tbody id="detail-barang">
                    <tr>
                      <td colspan="6" class="text-center text-muted py-4">
                        <i class="feather icon-info"></i> Pilih item dari tabel untuk menambah data
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-center">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" id="simpan" class="btn btn-primary" disabled>
            <i class="feather icon-save"></i> Simpan Data
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Detail DPB -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center w-100" id="detailModalLabel">Detail DPB - <span id="modal-title-no-dpb"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-3">
            <div class="form-group text-center">
              <label class="font-weight-bold">No DPB</label>
              <p id="detail-no-dpb" class="form-control-plaintext text-center">-</p>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group text-center">
              <label class="font-weight-bold">Tanggal DPB</label>
              <p id="detail-tgl-dpb" class="form-control-plaintext text-center">-</p>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group text-center">
              <label class="font-weight-bold">Jenis Bayar</label>
              <p id="detail-jenis-bayar" class="form-control-plaintext text-center">-</p>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group text-center">
              <label class="font-weight-bold">No Surat Jalan</label>
              <p id="detail-no-sjl" class="form-control-plaintext text-center">-</p>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <h6 class="mt-3 mb-2 text-center">Detail Barang</h6>
            <div class="table-responsive">
              <table class="table table-bordered table-sm table-hover">
                <thead class="bg-light-info">
                  <tr>
                    <th class="text-center align-middle">#</th>
                    <th class="text-center align-middle">Kode Material</th>
                    <th class="text-center align-middle">Nama Material</th>
                    <th class="text-center align-middle">Satuan</th>
                    <th class="text-center align-middle">Supplier</th>
                    <th class="text-center align-middle">Jumlah</th>
                    <th class="text-center align-middle">No Batch</th>
                    <th class="text-center align-middle">Status BM</th>
                  </tr>
                </thead>
                <tbody id="detail-barang-list">
                  <tr>
                    <td colspan="8" class="text-center text-muted">Memuat data...</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Detail Item -->
<div class="modal fade" id="itemDetailModal" tabindex="-1" aria-labelledby="itemDetailModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center w-100" id="itemDetailModalLabel">Detail Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label class="font-weight-bold">Kode Barang</label>
              <p id="item-kode-barang" class="form-control-plaintext">-</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="font-weight-bold">Nama Barang</label>
              <p id="item-nama-barang" class="form-control-plaintext">-</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label class="font-weight-bold">No Batch</label>
              <p id="item-no-batch" class="form-control-plaintext">-</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="font-weight-bold">Jumlah</label>
              <p id="item-jumlah" class="form-control-plaintext">-</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label class="font-weight-bold">Status</label>
              <p id="item-status" class="form-control-plaintext">-</p>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    // Datepicker
    $('.datepicker').datepicker({
      format: 'dd/mm/yyyy',
      autoclose: true,
      language: 'id'
    });

    // Toggle detail baris
    $('.toggle-details').on('click', function() {
      const no_dpb = $(this).data('dpb');
      const icon = $(this).find('i');
      const childRows = $(`.child-details[data-dpb-parent="${no_dpb}"]`);
      
      if (childRows.hasClass('show')) {
        childRows.removeClass('show').hide();
        icon.removeClass('collapsed');
      } else {
        childRows.addClass('show').show();
        icon.addClass('collapsed');
      }
    });

    // Auto load data ketika modal ADD dibuka
    $('#add').on('show.bs.modal', function(event) {
      var no_dpb = $(event.relatedTarget).data('no_dpb')
      console.log("No DPB yang dipilih:", no_dpb)

      // Tampilkan loading
      $('#detail-barang').html('<tr><td colspan="6" class="text-center py-4"><div class="spinner-border spinner-border-sm text-primary" role="status"></div> Memuat data DPB...</td></tr>');
      
      // Ambil SEMUA data barang berdasarkan no_dpb
      $.ajax({
        url: "<?= base_url('administrator/adm_dpb/get_all_items_by_dpb') ?>",
        type: "POST",
        data: {
          no_dpb: no_dpb
        },
        dataType: "json",
        success: function(response) {
          console.log("DPB Data Response:", response);
          
          if (response.success && response.data && response.data.length > 0) {
            const data = response.data;
            
            // Isi data header dari record pertama
            const firstRecord = data[0];
            $('#tgl_dpb').val(firstRecord.tgl_dpb || '-');
            $('#no_dpb').val(firstRecord.no_dpb || '-');
            $('#no_sjl').val(firstRecord.no_sjl || '-');
            
            // Isi detail barang - SEMUA item dalam DPB tersebut
            let html = '';
            
            $.each(data, function(i, item) {
              const kodeBarang = item.kode_barang || '-';
              const namaBarang = item.nama_barang || '-';
              const jenisBayar = item.jenis_bayar || '-';
              const jmlBeli = item.jumlah_ppb ? item.jumlah_ppb : '0';
              const id_prc_master_barang = item.id_prc_master_barang;
              const id_prc_dpb = item.id_prc_dpb;
              
              // Cek apakah jumlah_bm sudah ada
              const jmlDiterima = item.jml_diterima || '';
              const isDisabled = item.jml_diterima > 0 ? 'readonly' : '';
              const placeholder = item.jml_diterima > 0 ? 'Sudah diisi' : 'Input';
              
              html += `
                <tr>
                  <input type="hidden" name="id_prc_master_barang[]" value="${id_prc_master_barang}">
                  <input type="hidden" name="id_prc_dpb[]" value="${id_prc_dpb}">
                  <td class="text-center align-middle"><strong>${kodeBarang}</strong></td>
                  <td class="text-center align-middle">${namaBarang}</td>
                  <td class="text-center align-middle">${jenisBayar}</td>
                  <td class="text-center align-middle">
                    <input type="text" 
                           class="form-control form-control-sm jumlah-input" 
                           name="jumlah_ppb[]" 
                           value="${jmlBeli}"
                           readonly>
                  </td>
                  <td class="text-center align-middle">
                    <input type="text" 
                           class="form-control form-control-sm input-tambahan" 
                           name="jumlah_diterima[]" 
                           value="${jmlDiterima}"
                           placeholder="${placeholder}"
                           style="text-align: center;"
                           ${isDisabled}
                           required>
                  </td>
                  <td class="text-center align-middle">
                    <input type="text" 
                           class="form-control form-control-sm no_batch" 
                           name="no_batch[]" 
                           value="${item.no_batch || ''}"
                           placeholder="Input No Batch"
                           style="text-align: center;"
                           ${isDisabled}
                           required>
                  </td>
                </tr>
              `;
            });
            
            $('#detail-barang').html(html);
            
            // Cek apakah semua field sudah terisi, jika ya disable tombol simpan
            const allFilled = data.every(item => item.jml_diterima > 0);
            $('#simpan').prop('disabled', allFilled);
            
          } else {
            $('#detail-barang').html('<tr><td colspan="6" class="text-center text-warning py-4"><i class="feather icon-alert-triangle"></i> ' + (response.message || 'Tidak ada data DPB yang tersedia') + '</td></tr>');
            $('#simpan').prop('disabled', true);
          }
        },
        error: function(xhr, status, error) {
          console.error("AJAX Error:", error);
          $('#detail-barang').html('<tr><td colspan="6" class="text-center text-danger py-4"><i class="feather icon-x-circle"></i> Gagal memuat data DPB</td></tr>');
          $('#simpan').prop('disabled', true);
        }
      });
    });

    // Reset form ketika modal ditutup
    $('#add').on('hidden.bs.modal', function() {
      $('#detail-barang').html('<tr><td colspan="6" class="text-center text-muted py-4"><i class="feather icon-info"></i> Pilih item dari tabel untuk menambah data</td></tr>');
      $('#simpan').prop('disabled', true);
    });

    // Event untuk modal detail DPB
    $('.view-detail').on('click', function() {
      const no_dpb = $(this).data('no_dpb');
      const tgl_dpb = $(this).data('tgl_dpb');
      const no_sjl = $(this).data('no_sjl');
      
      // Set judul modal
      $('#modal-title-no-dpb').text(no_dpb);
      
      // Set header data
      $('#detail-no-dpb').text(no_dpb);
      $('#detail-tgl-dpb').text(tgl_dpb);
      $('#detail-no-sjl').text(no_sjl);
      $('#detail-jenis-bayar').text('Loading...');
      
      // Tampilkan loading
      $('#detail-barang-list').html('<tr><td colspan="8" class="text-center"><div class="spinner-border spinner-border-sm text-info" role="status"></div> Memuat data detail...</td></tr>');
      
      // Ambil data detail DPB
      $.ajax({
        url: "<?= base_url('administrator/adm_dpb/get_dpb_detail') ?>",
        type: "POST",
        data: {
          no_dpb: no_dpb
        },
        dataType: "json",
        success: function(response) {
          if (response.success && response.data && response.data.length > 0) {
            const data = response.data;
            
            // Isi data header
            $('#detail-jenis-bayar').text(data[0].jenis_bayar || '-');
            
            // Isi detail barang
            let html = '';
            let no = 1;
            let totalJumlah = 0;
            
            $.each(data, function(i, item) {
              const kodeBarang = item.kode_barang || '-';
              const namaBarang = item.nama_barang || '-';
              const satuan = item.satuan || '-';
              const nama_supplier = item.nama_supplier || '-';
              const jumlah = parseFloat(item.jml_beli) || 0;
              const noBatch = item.no_batch || '-';
              const jmlDiterima = item.jml_diterima || 0;
              const statusBM = jmlDiterima > 0 ? 
                '<span class="badge badge-success">Sudah diisi: ' + jmlDiterima + '</span>' : 
                '<span class="badge badge-warning">Belum diisi</span>';
              
              totalJumlah += jumlah;
              
              html += `
                <tr>
                  <td class="text-center align-middle">${no++}</td>
                  <td class="text-center align-middle"><strong>${kodeBarang}</strong></td>
                  <td class="text-center align-middle">${namaBarang}</td>
                  <td class="text-center align-middle">${satuan}</td>
                  <td class="text-center align-middle">${nama_supplier}</td>
                  <td class="text-center align-middle"><span class="badge badge-primary">${formatNumber(jumlah)}</span></td>
                  <td class="text-center align-middle"><span class="no-batch-badge">${noBatch}</span></td>
                  <td class="text-center align-middle">${statusBM}</td>
                </tr>
              `;
            });
            
            // Tambah baris total
            html += `
              <tr class="table-active font-weight-bold">
                <td colspan="5" class="text-center">Total Jumlah:</td>
                <td class="text-center"><span class="badge badge-success">${formatNumber(totalJumlah)}</span></td>
                <td colspan="2"></td>
              </tr>
            `;
            
            $('#detail-barang-list').html(html);
          } else {
            $('#detail-barang-list').html('<tr><td colspan="8" class="text-center text-warning"><i class="feather icon-alert-triangle"></i> ' + (response.message || 'Tidak ada data barang untuk DPB ini') + '</td></tr>');
            $('#detail-jenis-bayar').text('-');
          }
        },
        error: function(xhr, status, error) {
          console.error("AJAX Error:", error);
          $('#detail-barang-list').html('<tr><td colspan="8" class="text-center text-danger"><i class="feather icon-x-circle"></i> Gagal memuat data detail</td></tr>');
        }
      });
    });

    // Event untuk modal detail item
    $('.view-item-detail').on('click', function() {
      const kode_barang = $(this).data('kode_barang');
      const no_batch = $(this).data('no_batch');
      
      // Set data di modal
      $('#item-kode-barang').text(kode_barang);
      $('#item-nama-barang').text('Loading...');
      $('#item-no-batch').text(no_batch);
      $('#item-jumlah').text('Loading...');
      $('#item-status').text('Loading...');
      
      // Ambil data item detail
      $.ajax({
        url: "<?= base_url('administrator/adm_dpb/get_item_detail') ?>",
        type: "POST",
        data: {
          kode_barang: kode_barang,
          no_batch: no_batch
        },
        dataType: "json",
        success: function(response) {
          if (response.success && response.data) {
            const data = response.data;
            $('#item-nama-barang').text(data.nama_barang || '-');
            $('#item-jumlah').text(formatNumber(data.jml_beli) || '0');
            $('#item-status').html(data.is_deleted == 1 ? '<span class="badge badge-danger">Dihapus</span>' : '<span class="badge badge-success">Aktif</span>');
          } else {
            $('#item-nama-barang').text('-');
            $('#item-jumlah').text('-');
            $('#item-status').text('-');
          }
        },
        error: function(xhr, status, error) {
          console.error("AJAX Error:", error);
          $('#item-nama-barang').text('Error loading data');
          $('#item-jumlah').text('Error');
          $('#item-status').text('Error');
        }
      });
    });

    // Lihat function
    $('#lihat').click(function() {
      var filter_tgl = $('#filter_tgl').val();
      var filter_tgl2 = $('#filter_tgl2').val();
      if (filter_tgl == '' || filter_tgl2 == '') {
        alert('Pilih kedua tanggal untuk melihat data.');
      } else {
        window.location.href = "<?= base_url() ?>administrator/dpb/adm_dpb?date_from=" + filter_tgl + "&date_until=" + filter_tgl2;
      }
    });

    // Format number function
    function formatNumber(num) {
      if (num === null || num === undefined || isNaN(num)) return '0';
      return parseFloat(num).toLocaleString('id-ID');
    }

    // Inisialisasi: disable tombol simpan sampai data dimuat
    $('#simpan').prop('disabled', true);
  });
</script>