<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
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
                            <th class="text-center">Tanggal</th>
                            <th class="text-center">NO Batch</th>
                            <th class="text-center">Kode Barang</th>
                            <th class="text-center">Nama Barang</th>
                            <th class="text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $level = $this->session->userdata('departement');
                          $no = 1;
                          foreach ($result as $k) {
                            $tgl_bm = date('d/m/Y', strtotime($k['tgl_dpb']));
                            $status = $k['is_deleted'] == 1 ? '<span class="badge badge-danger">Dihapus</span>' : '<span class="badge badge-success">Aktif</span>';
                          ?>
                            <tr>
                              <th scope="row" class="text-center"><?= $no++ ?></th>
                              <td class="text-center"><?= $k['tgl_dpb'] ?? '-' ?></td>
                              <td class="text-center"><?= $k['no_batch'] ?></td>  
                              <td class="text-center"><?= $k['kode_barang'] ?></td>
                              <td class="text-center"><?= $k['nama_barang'] ?></td>
                              <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <button type="button" class="btn btn-primary float-right btn-sm btn-add-item" 
                                          data-toggle="modal" data-target="#add"
                                          data-kode-barang="<?= $k['kode_barang'] ?>"
                                          data-nama-barang="<?= $k['nama_barang'] ?>"
                                          data-no-batch="<?= $k['no_batch'] ?>"
                                          data-tgl-dpb="<?= $k['tgl_dpb'] ?>">
                                    <i class="feather icon-plus"></i> 
                                  </button>
                                  <button type="button" class="btn btn-info btn-sm view-detail" data-toggle="modal" data-target="#detailModal" title="Lihat Detail">
                                    <i class="feather icon-eye"></i>
                                  </button>
                                  <?php if ($level === "admin" && $k['is_deleted'] == 0) { ?>
                                    <a type="button" class="btn btn-danger btn-sm text-light" href="<?= base_url() ?>administrator/adm_dpb/delete/<?= str_replace('/', '--', $k['id_adm_dpb']) ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus DPB ini?')" title="Hapus DPB">
                                      <i class="feather icon-trash"></i>
                                    </a>
                                  <?php } ?>
                                </div>
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
                    </tr>
                  </thead>
                  <tbody id="detail-barang">
                    <tr>
                      <td colspan="5" class="text-center text-muted py-4">
                        <i class="feather icon-info"></i> Pilih item dari tabel untuk menambah data
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <!-- Input No Batch -->
          <div class="row mt-4">
            <div class="col-md-12">
              <div class="form-group text-center">
                <label for="no_batch" class="font-weight-bold">No Batch</label>
                <input type="text" class="form-control text-center mx-auto" id="no_batch" name="no_batch" placeholder="Masukkan No Batch" required style="border: 2px solid #4361ee; max-width: 300px;">
                <input type="hidden" id="selected_kode_barang" name="kode_barang">
                <input type="hidden" id="selected_nama_barang" name="nama_barang">
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

<!-- Modal Detail -->
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
                    <th class="text-center align-middle">Spesifikasi</th>
                  </tr>
                </thead>
                <tbody id="detail-barang-list">
                  <tr>
                    <td colspan="7" class="text-center text-muted">Memuat data...</td>
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
</style>

<script type="text/javascript">
  $(document).ready(function() {
    // Datepicker
    $('.datepicker').datepicker({
      format: 'dd/mm/yyyy',
      autoclose: true,
      language: 'id'
    });

    // Variabel untuk menyimpan data item yang dipilih
    let selectedItem = null;

    // Event ketika tombol + diklik
    $('.btn-add-item').on('click', function() {
      // Simpan data dari item yang diklik
      selectedItem = {
        kode_barang: $(this).data('kode-barang'),
        nama_barang: $(this).data('nama-barang'),
        no_batch: $(this).data('no-batch'),
        tgl_dpb: $(this).data('tgl-dpb')
      };
      
      console.log("Item yang dipilih:", selectedItem);
      
      // Set nilai no batch di modal
      $('#no_batch').val(selectedItem.no_batch);
      $('#selected_kode_barang').val(selectedItem.kode_barang);
      $('#selected_nama_barang').val(selectedItem.nama_barang);
    });

    // Auto load data ketika modal ADD dibuka
    $('#add').on('show.bs.modal', function() {
      if (selectedItem) {
        loadDpbData(selectedItem);
      } else {
        $('#detail-barang').html('<tr><td colspan="5" class="text-center text-warning py-4"><i class="feather icon-alert-triangle"></i> Pilih item terlebih dahulu dari tabel</td></tr>');
        $('#simpan').prop('disabled', true);
      }
    });

    // Reset selectedItem ketika modal ditutup
    $('#add').on('hidden.bs.modal', function() {
      selectedItem = null;
      $('#detail-barang').html('<tr><td colspan="5" class="text-center text-muted py-4"><i class="feather icon-info"></i> Pilih item dari tabel untuk menambah data</td></tr>');
      $('#no_batch').val('');
      $('#selected_kode_barang').val('');
      $('#selected_nama_barang').val('');
      $('#simpan').prop('disabled', true);
    });

    // Fungsi untuk memuat data DPB berdasarkan item yang dipilih
    function loadDpbData(item) {
      // Tampilkan loading
      $('#detail-barang').html('<tr><td colspan="5" class="text-center py-4"><div class="spinner-border spinner-border-sm text-primary" role="status"></div> Memuat data DPB...</td></tr>');
      
      // Reset field
      $('#tgl_dpb').val('');
      $('#no_dpb').val('');
      $('#no_sjl').val('');

      // Ambil data DPB berdasarkan item yang dipilih
      $.ajax({
        url: "<?= base_url('administrator/adm_dpb/get_dpb_by_item') ?>",
        type: "POST",
        data: {
          kode_barang: item.kode_barang,
          tgl_dpb: item.tgl_dpb
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
            
            // Isi detail barang - HANYA item yang dipilih
            let html = '';
            
            $.each(data, function(i, item) {
              // Hanya tampilkan item dengan kode_barang yang sesuai
              if (item.kode_barang === selectedItem.kode_barang) {
                const kodeBarang = item.kode_barang || '-';
                const namaBarang = item.nama_barang || '-';
                const jenisBayar = item.jenis_bayar || '-';
                const jmlBeli = item.jml_beli ? formatNumber(item.jml_beli) : '0';
                
                html += `
                  <tr>
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
                             placeholder="Input"
                             style="text-align: center;"
                             required>
                    </td>
                  </tr>
                `;
              }
            });
            
            if (html === '') {
              $('#detail-barang').html('<tr><td colspan="5" class="text-center text-warning py-4"><i class="feather icon-alert-triangle"></i> Data tidak ditemukan untuk item ini</td></tr>');
              $('#simpan').prop('disabled', true);
            } else {
              $('#detail-barang').html(html);
              $('#simpan').prop('disabled', false);
            }
            
          } else {
            $('#detail-barang').html('<tr><td colspan="5" class="text-center text-warning py-4"><i class="feather icon-alert-triangle"></i> ' + (response.message || 'Tidak ada data DPB yang tersedia untuk item ini') + '</td></tr>');
            $('#simpan').prop('disabled', true);
          }
        },
        error: function(xhr, status, error) {
          console.error("AJAX Error:", error);
          $('#detail-barang').html('<tr><td colspan="5" class="text-center text-danger py-4"><i class="feather icon-x-circle"></i> Gagal memuat data DPB</td></tr>');
          $('#simpan').prop('disabled', true);
        }
      });
    }

    // Event untuk modal detail
    $('.view-detail').on('click', function() {
      // Cari data dari baris yang diklik
      const row = $(this).closest('tr');
      const kode_barang = row.find('td').eq(2).text().trim();
      const no_batch = row.find('td').eq(1).text().trim();
      
      if (!kode_barang) {
        alert('Kode barang tidak ditemukan');
        return;
      }
      
      // Set judul modal
      $('#modal-title-no-dpb').text(kode_barang + ' - ' + no_batch);
      
      // Set header data
      $('#detail-no-dpb').text(kode_barang);
      $('#detail-tgl-dpb').text('Loading...');
      $('#detail-jenis-bayar').text('Loading...');
      $('#detail-no-sjl').text('Loading...');
      
      // Tampilkan loading
      $('#detail-barang-list').html('<tr><td colspan="7" class="text-center"><div class="spinner-border spinner-border-sm text-info" role="status"></div> Memuat data detail...</td></tr>');
      
      // Ambil data detail
      $.ajax({
        url: "<?= base_url('administrator/adm_dpb/get_dpb_detail') ?>",
        type: "POST",
        data: {
          kode_barang: kode_barang,
          no_batch: no_batch
        },
        dataType: "json",
        success: function(response) {
          if (response.success && response.data && response.data.length > 0) {
            const data = response.data;
            
            // Isi data header
            $('#detail-tgl-dpb').text(data[0].tgl_dpb || '-');
            $('#detail-jenis-bayar').text(data[0].jenis_bayar || '-');
            $('#detail-no-sjl').text(data[0].no_sjl || '-');
            
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
              totalJumlah += jumlah;
              
              html += `
                <tr>
                  <td class="text-center align-middle">${no++}</td>
                  <td class="text-center align-middle"><strong>${kodeBarang}</strong></td>
                  <td class="text-center align-middle">${namaBarang}</td>
                  <td class="text-center align-middle">${satuan}</td>
                  <td class="text-center align-middle">${nama_supplier}</td>
                  <td class="text-center align-middle"><span class="badge badge-primary">${formatNumber(jumlah)}</span></td>
                  <td class="text-center align-middle">${noBatch}</td>
                </tr>
              `;
            });
            
            // Tambah baris total
            html += `
              <tr class="table-active font-weight-bold">
                <td colspan="5" class="text-center">Total Jumlah:</td>
                <td class="text-center"><span class="badge badge-success">${formatNumber(totalJumlah)}</span></td>
                <td></td>
              </tr>
            `;
            
            $('#detail-barang-list').html(html);
          } else {
            $('#detail-barang-list').html('<tr><td colspan="7" class="text-center text-warning"><i class="feather icon-alert-triangle"></i> ' + (response.message || 'Tidak ada data barang untuk item ini') + '</td></tr>');
            $('#detail-tgl-dpb').text('-');
            $('#detail-jenis-bayar').text('-');
            $('#detail-no-sjl').text('-');
          }
        },
        error: function(xhr, status, error) {
          console.error("AJAX Error:", error);
          $('#detail-barang-list').html('<tr><td colspan="7" class="text-center text-danger"><i class="feather icon-x-circle"></i> Gagal memuat data detail</td></tr>');
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