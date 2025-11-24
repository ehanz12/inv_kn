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
                        <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#add">
                          <i class="feather icon-plus"></i> Tambah DPB
                        </button>
                      </div>
                    </div>
                    <br><br>
                  </div>
                  <div class="card-block table-border-style">
                    <div class="table-responsive">
                      <table class="table datatable table-bordered table-hover table-striped table-sm">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th class="text-center">Jumlah</th>
                           
                            <th class="text-center">Tanggal</th>
                            <th class="text-center">No Batch</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $level = $this->session->userdata('departement');
                          $no = 1;
                          foreach ($result as $k) {
                            $tgl_dpb = date('d/m/Y', strtotime($k['tgl_dpb']));
                            $status = $k['is_deleted'] == 1 ? '<span class="badge badge-danger">Dihapus</span>' : '<span class="badge badge-success">Aktif</span>';
                          ?>
                            <tr>
                              <th scope="row"><?= $no++ ?></th>
                              <td class="text-center"><?= $k['jml_diterima'] ?></td>
                              <!-- <td class="text-center"><?= $k['no_dpb'] ?></td> -->
                              
                              <td class="text-center"><?= $k['tgl_dpb'] ?? '-' ?></td>
                              <td class="text-center"><?= $k['no_batch'] ?></td>
                              <td class="text-center"><?= $status ?></td>
                              <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <button type="button" class="btn btn-info btn-sm view-detail" data-toggle="modal" data-target="#detailModal"  title="Lihat Detail">
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
        <h5 class="modal-title" id="addModalLabel">Tambah Data DPB</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>administrator/adm_dpb/add">
        <div class="modal-body">
          <div class="row">
            <!-- No DPB (Dropdown) -->
            <div class="col-md-3">
              <div class="form-group">
                <label for="no_dpb">No DPB *</label>
                <select class="form-control chosen-select" id="no_dpb" name="no_dpb" required>
                  <option value="" disabled selected hidden> - Pilih No DPB -</option>
                  <?php foreach ($res_kode as $rk) : ?>
                    <option value="<?= $rk['no_dpb'] ?>"><?= $rk['no_dpb'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <!-- Tanggal (Readonly) -->
           

            <!-- Jenis Bayar (Readonly) -->
           
            <div class="col-md-3">
              <div class="form-group">
                <label for="tgl_dpb">Tanggal BDP</label>
                <input type="text" class="form-control" id="tgl_dpb" name="tgl_dpb" readonly>
              </div>
            </div>


             <div class="col-md-3">
              <div class="form-group">
                <label for="Jumlah">Jumlah</label>
                <input type="text" class="form-control" id="jumlah" name="jumlah" >
              </div>
            </div>

            <!-- No Surat Jalan (Readonly) -->
            <div class="col-md-3">
              <div class="form-group">
                <label for="no_sjl">no batch</label>
                <input type="text" class="form-control" id="no_batch" name="no_batch" >
              </div>
            </div>
          </div>

          <!-- Detail Barang -->
          <div class="row">
            <div class="col-md-12">
              <h6 class="mt-3 mb-2">Detail Barang</h6>
              <div class="table-responsive">
                <table class="table table-bordered table-sm table-hover">
                  <thead class="bg-light-primary">
                    <tr>
                      <th class="text-center">#</th>
                      <th>Kode Material</th>
                      <th>Nama Material</th>
                      <th class="text-center">Satuan</th>
                      <th>Supplier</th>
                     
                    </tr>
                  </thead>
                  <tbody id="detail-barang">
                    <tr>
                      <td colspan="7" class="text-center text-muted">Pilih No DPB untuk melihat detail barang</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <!-- Input No Batch -->
          
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" id="simpan" class="btn btn-primary" onclick="return confirm('Apakah Anda yakin untuk menyimpan data ini? Pastikan semua data sudah benar dan No Batch sudah diisi.')">
            <i class="feather icon-save"></i> Simpan
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
        <h5 class="modal-title" id="detailModalLabel">Detail DPB - <span id="modal-title-no-dpb"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-3">
            <div class="form-group">
              <label><strong>No DPB</strong></label>
              <p id="detail-no-dpb" class="form-control-plaintext">-</p>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label><strong>Tanggal DPB</strong></label>
              <p id="detail-tgl-dpb" class="form-control-plaintext">-</p>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label><strong>Jenis Bayar</strong></label>
              <p id="detail-jenis-bayar" class="form-control-plaintext">-</p>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label><strong>No Surat Jalan</strong></label>
              <p id="detail-no-sjl" class="form-control-plaintext">-</p>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <h6 class="mt-3 mb-2">Detail Barang</h6>
            <div class="table-responsive">
              <table class="table table-bordered table-sm table-hover">
                <thead class="bg-light-info">
                  <tr>
                    <th class="text-center">#</th>
                    <th>Kode Material</th>
                    <th>Nama Material</th>
                    <th class="text-center">Satuan</th>
                    <th>Supplier</th>
                    <th class="text-center">Jumlah</th>
                    <th class="text-center">Spesifikasi</th>
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
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<!-- CSS Tambahan -->
<style>
  .chosen-container {
    width: 100% !important;
  }
  .table th {
    background-color: #f8f9fa;
    font-weight: 600;
  }
  .bg-light-primary {
    background-color: #e3f2fd !important;
  }
  .bg-light-info {
    background-color: #e1f5fe !important;
  }
  .btn-group .btn {
    margin-right: 2px;
  }
  .spinner-border-sm {
    width: 1rem;
    height: 1rem;
  }
</style>

<script type="text/javascript">
  $(document).ready(function() {
    // Inisialisasi chosen select
    $('.chosen-select').chosen({
      width: "100%",
      search_contains: true,
      no_results_text: "Tidak ditemukan data dengan kata kunci:"
    });
    
    // Datepicker
    $('.datepicker').datepicker({
      format: 'dd/mm/yyyy',
      autoclose: true,
      language: 'id'
    });

    // Event ketika No DPB dipilih di modal Add
    $('#no_dpb').on('change', function() {
      const no_dpb = $(this).val();
      
      if (no_dpb) {
        // Tampilkan loading
        $('#detail-barang').html('<tr><td colspan="7" class="text-center"><div class="spinner-border spinner-border-sm text-primary" role="status"></div> Memuat data barang...</td></tr>');
        
        // Reset form fields
        $('#tgl_dpb').val('');
        $('#jenis_bayar').val('');
        $('#no_sjl').val('');
        
        // Ambil data DPB berdasarkan no_dpb
        $.ajax({
          url: "<?= base_url('administrator/adm_dpb/get_dpb_detail') ?>",
          type: "POST",
          data: {
            no_dpb: no_dpb
          },
          dataType: "json",
          success: function(response) {
            console.log("DPB Detail Response:", response);
            
            if (response.success) {
              const data = response.data;
              
              if (data && data.length > 0) {
                // Isi data header
                $('#tgl_dpb').val(data[0].tgl_dpb|| '-');
                $('#jenis_bayar').val(data[0].jenis_bayar || '-');
                $('#no_sjl').val(data[0].no_sjl || '-');
                
                // Isi detail barang
                let html = '';
                let no = 1;
                let totalJumlah = 0;
                
                $.each(data, function(i, item) {
                  const kodeBarang = item.kode_barang || '-';
                  const namaBarang = item.nama_barang || '-';
                  const satuan = item.satuan || '-';
                  
                  const nama_supplier = item.nama_supplier || '-';
                 
                  html += `
                    <tr>
                      <td class="text-center">${no++}</td>
                      <td><strong>${kodeBarang}</strong></td>
                      <td>${namaBarang}</td>
                      
                      <td class="text-center">${satuan}</td>
                      <td>${nama_supplier}</td>
                     
                    </tr>
                  `;
                });
                
                // Tambahkan baris total jika ada data
                // if (data.length > 0) {
                //   html += `
                //     <tr class="table-active font-weight-bold">
                //       <td colspan="5" class="text-right">Total Jumlah:</td>
                //       <td class="text-center"><span class="badge badge-success">${formatNumber(totalJumlah)}</span></td>
                //       <td></td>
                //     </tr>
                //   `;
                // }
                
                $('#detail-barang').html(html);
                
                // Enable tombol simpan
                $('#simpan').prop('disabled', false);
                
              } else {
                // Data header ada tapi tidak ada detail barang
                $('#detail-barang').html('<tr><td colspan="7" class="text-center text-warning"><i class="feather icon-alert-triangle"></i> DPB ditemukan tetapi tidak ada detail barang</td></tr>');
                $('#tgl_dpb').val('-');
                $('#jenis_bayar').val('-');
                $('#no_sjl').val('-');
                $('#simpan').prop('disabled', true);
              }
              
            } else {
              // Response success = false
              $('#detail-barang').html('<tr><td colspan="7" class="text-center text-danger"><i class="feather icon-x-circle"></i> ' + (response.message || 'Gagal memuat data') + '</td></tr>');
              $('#tgl_dpb').val('-');
              $('#jenis_bayar').val('-');
              $('#no_sjl').val('-');
              $('#simpan').prop('disabled', true);
            }
          },
          error: function(xhr, status, error) {
            console.error("AJAX Error:", xhr.responseText);
            $('#detail-barang').html('<tr><td colspan="7" class="text-center text-danger"><i class="feather icon-x-circle"></i> Gagal memuat data. Error: ' + error + '</td></tr>');
            $('#simpan').prop('disabled', true);
          }
        });
      } else {
        // Reset jika no_dpb kosong
        $('#tgl_dpb').val('');
        $('#jenis_bayar').val('');
        $('#no_sjl').val('');
        $('#detail-barang').html('<tr><td colspan="7" class="text-center text-muted"><i class="feather icon-info"></i> Pilih No DPB untuk melihat detail barang</td></tr>');
        $('#simpan').prop('disabled', true);
      }
    });

    // Event untuk modal detail
    $('.view-detail').on('click', function() {
      const no_dpb = $(this).data('no-dpb');
      
      // Set judul modal
      $('#modal-title-no-dpb').text(no_dpb);
      
      // Set header data
      $('#detail-no-dpb').text(no_dpb);
      $('#detail-tgl-dpb').text('Loading...');
      $('#detail-jenis-bayar').text('Loading...');
      $('#detail-no-sjl').text('Loading...');
      
      // Tampilkan loading
      $('#detail-barang-list').html('<tr><td colspan="7" class="text-center"><div class="spinner-border spinner-border-sm text-info" role="status"></div> Memuat data detail...</td></tr>');
      
      // Ambil data detail
      $.ajax({
        url: "<?= base_url('administrator/dpb/adm_dpb/get_dpb_detail') ?>",
        type: "POST",
        data: {
          no_dpb: no_dpb
        },
        dataType: "json",
        success: function(response) {
          if (response.success && response.data && response.data.length > 0) {
            const data = response.data;
            
            // Isi data header
            $('#detail-tgl-dpb').text(data[0].tgl_dpb_formatted || '-');
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
              const jumlah = parseFloat(item.jumlah) || 0;
              const noBatch = item.no_batch || '-';
              totalJumlah += jumlah;
              
              html += `
                <tr>
                  <td class="text-center">${no++}</td>
                  <td><strong>${kodeBarang}</strong></td>
                  <td>${namaBarang}</td>
                  <td class="text-center">${satuan}</td>
                  <td>${nama_supplier}</td>
                  <td class="text-center"><span class="badge badge-primary">${formatNumber(jumlah)}</span></td>
                  <td class="text-center">${noBatch}</td>
                </tr>
              `;
            });
            
            // Tambah baris total
            html += `
              <tr class="table-active font-weight-bold">
                <td colspan="5" class="text-right">Total Jumlah:</td>
                <td class="text-center"><span class="badge badge-success">${formatNumber(totalJumlah)}</span></td>
                <td></td>
              </tr>
            `;
            
            $('#detail-barang-list').html(html);
          } else {
            $('#detail-barang-list').html('<tr><td colspan="7" class="text-center text-warning"><i class="feather icon-alert-triangle"></i> ' + (response.message || 'Tidak ada data barang untuk DPB ini') + '</td></tr>');
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

    // Reset modal ketika ditutup
    $('#add').on('hidden.bs.modal', function() {
      $('#no_dpb').val('').trigger('chosen:updated');
      $('#tgl_dpb').val('');
      $('#jenis_bayar').val('');
      $('#no_sjl').val('');
      $('#detail-barang').html('<tr><td colspan="7" class="text-center text-muted"><i class="feather icon-info"></i> Pilih No DPB untuk melihat detail barang</td></tr>');
      $('#no_batch').val('');
      $('#simpan').prop('disabled', true);
    });

    // Format number function
    function formatNumber(num) {
      if (num === null || num === undefined || isNaN(num)) return '0';
      return parseFloat(num).toLocaleString('id-ID');
    }

    // Inisialisasi: disable tombol simpan sampai data dipilih
    $('#simpan').prop('disabled', true);
  });
</script>