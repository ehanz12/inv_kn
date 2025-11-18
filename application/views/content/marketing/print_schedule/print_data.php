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
                  <!-- <h5 class="m-b-10">Data Barang Keluar</h5> -->
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="feather icon-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="javascript:">Marketing</a></li>
                  <li class="breadcrumb-item"><a href="<?= base_url('Print_schedule') ?>">Print Schedule</a></li>
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
                    <h5>Data Schedule <b>(Marketing)</b></h5>
                    <div class="float-right">
                      <div class="input-group">
                        <?php
                        function newDate($date)
                        {
                          if ($date && $date != '') {
                            $dateParts = explode('-', $date);
                            if (count($dateParts) === 3) {
                              return $dateParts[2] . "/" . $dateParts[1] . "/" . $dateParts[0];
                            }
                          }
                          return '';
                        }
                        ?>
                        <input type="text" id="filter_tgl" value="<?= $tgl == null ? '' : newDate($tgl) ?>" class="form-control datepicker" autocomplete="off" placeholder="Filter Dari Tanggal" aria-label="Dari Tanggal">
                        <input type="text" id="filter_tgl2" value="<?= $tgl2 == null ? '' : newDate($tgl2) ?>" class="form-control datepicker" autocomplete="off" placeholder="Filter Sampai Tanggal" aria-label="Sampai Tanggal">
                        <div class="btn-group">
                          <button class="btn btn-secondary" id="lihat" type="button">Lihat</button>
                        </div>
                        <div class="btn-group">
                          <button class="btn btn-primary" id="export" type="button">Cetak</button>
                        </div>
                        <div class="btn-group">
                          <a href="<?= base_url() ?>Marketing/Print_schedule" style="width: 40px;" class="btn btn-warning" type="button"><i class="feather icon-refresh-ccw"></i></a>
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
                            <th>Tgl Sch</th>
                            <th>Customer</th>
                            <th>Mesin</th>
                            <th class="text-center">No CR</th>
                            <th>No Batch</th>
                            
                            <th>Jumlah</th>
                            <th>Sisa</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $level = $this->session->userdata('departement');
                          $no = 1;
                          foreach ($result as $k) {
                            $tgl_sch = newDate($k['tgl_sch']);
                            $tgl_kirim = newDate($k['tgl_kirim']);
                            $tgl_prd = newDate($k['tgl_prd']);
                            if ($k['sisa'] != 0) { 
                          ?>
                              <tr>
                                <th scope="row"><?= $no++ ?></th>
                                <td><?= $tgl_sch ?></td>
                                <td><?= $k['nama_customer'] ?></td>
                                <td><?= $k['mesin_prd'] ?></td>
                                <td class="text-center">
                                  <div class="action-buttons" role="group" aria-label="Basic example">
                                    <span type="button"style="cursor: pointer;" class="badge badge-primary" data-toggle="modal" data-target="#view" 
                                      data-id_sch="<?= $k['id_mkt_schedule'] ?>" 
                                      data-id_customer="<?= $k['nama_customer'] ?>" 
                                      data-id_kw_cap="<?= $k['id_master_kw_cap'] ?>" 
                                      data-id_kw_body="<?= $k['id_master_kw_body'] ?>" 
                                      data-no_cr="<?= $k['no_cr'] ?>" 
                                      data-no_batch="<?= $k['no_batch'] ?>" 
                                      data-tgl_sch="<?= $tgl_sch ?>" 
                                      data-size="<?= $k['size_machine'] ?>" 
                                      data-kode_warna_cap="<?= $k['kode_warna_cap'] ?>" 
                                      data-kode_warna_body="<?= $k['kode_warna_body'] ?>" 
                                      data-warna_cap="<?= $k['warna_cap'] ?>" 
                                      data-warna_body="<?= $k['warna_body'] ?>" 
                                      data-mesin="<?= $k['mesin_prd'] ?>" 
                                      data-jumlah="<?= $k['jumlah_prd'] ?>" 
                          
                                      data-tinta="<?= $k['tinta'] ?>" 
                                      data-jenis_box="<?= $k['jenis_box'] ?>" 
                                      data-jenis_grv="<?= $k['jenis_grv'] ?>" 
                                      data-jenis_zak="<?= $k['jenis_zak'] ?>" 
                                      data-tgl_kirim="<?= $tgl_kirim ?>" 
                                      data-tgl_prd="<?= $tgl_prd ?>" 
                                      data-minyak="<?= $k['minyak'] ?>" 
                                      data-keterangan="<?= $k['ket_prd'] ?>">
                                      <i class=""></i> <?= $k['no_cr'] ?>
                            </span>
                                  </div>
                                </td>
                                <td><?= $k['no_batch'] ?></td>
                                
                                <td><?= number_format($k['jumlah_prd'], 0, ',', '.') ?></td>
                                <td>-</td>
                                
                              </tr>
                            <?php } ?>
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

<!-- Modal Detail -->
<div class="modal fade" id="view" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Entry Schedule</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="no_cr">Nomor CR</label>
              <input type="hidden" id="v-id_sch" name="id_sch">
              <div class="input-group">
                <input type="text" class="form-control" id="v-no_cr" name="no_cr" placeholder="Nomor CR" readonly>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="customer">Customer</label>
              <input type="text" class="form-control" id="v-customer" name="customer" placeholder="Customer" autocomplete="off" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="no_batch">Nomor Batch</label>
              <input type="text" class="form-control" id="v-no_batch" name="no_batch" placeholder="No. Batch" autocomplete="off" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="tgl_sch">Tanggal Schedule</label>
              <input type="text" class="form-control" id="v-tgl_sch" name="tgl_sch" placeholder="Tanggal Schedule" autocomplete="off" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="size">Size</label>
              <input type="text" class="form-control" id="v-size" name="size" placeholder="Size" autocomplete="off" readonly>
            </div>
          </div> 
           <div class="col-md-6">
            <div class="form-group">
              <label for="kode_warna">Kode Warna Cap</label>
              <div class="input-group">
                <input type="text" class="form-control" id="v-kode_warna_cap" name="kode_warna_cap" placeholder="Kode Warna" autocomplete="off" readonly>
                <input type="text" class="form-control" id="v-warna_cap" name="warna_cap" placeholder="Nama Warna" autocomplete="off" readonly>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="kode_warna">Kode Warna Body</label>
              <div class="input-group">
                <input type="text" class="form-control" id="v-kode_warna_body" name="kode_warna_body" placeholder="Kode Warna" autocomplete="off" readonly>
                <input type="text" class="form-control" id="v-warna_body" name="warna_body" placeholder="Nama Warna" autocomplete="off" readonly>
              </div>
            </div>
          </div> 
          <div class="col-md-6">
            <div class="form-group">
              <label for="mesin">Mesin</label>
              <input type="text" class="form-control" id="v-mesin" name="mesin" placeholder="Mesin" autocomplete="off" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="jumlah">Jumlah</label>
              <input type="text" class="form-control" id="v-jumlah" name="jumlah" placeholder="Jumlah" autocomplete="off" readonly>
            </div>
          </div>
          
          
          
           <div class="col-md-6">
            <div class="form-group">
              <label for="jenis_box">Jenis Box</label>
              <input type="text" class="form-control" id="v-jenis_box" name="jenis_box" placeholder="Jenis Box" autocomplete="off" readonly>
            </div>
          </div> 
          <div class="col-md-6">
            <div class="form-group">
              <label for="v-jenis_grv">Jenis Grv</label>
              <input type="text" class="form-control" id="v-jenis_grv" readonly>
            </div>
          </div>
           <div class="col-md-6">
            <div class="form-group">
              <label for="jenis_zak">Jenis Zak</label>
              <input type="text" class="form-control" id="v-jenis_zak" name="jenis_zak" placeholder="Jenis Zak" autocomplete="off" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="minyak">Minyak N-M</label>
              <input type="text" class="form-control" id="v-minyak" name="minyak" placeholder="Minyak" autocomplete="off" readonly>
            </div>
          </div> 
           <div class="col-md-6">
            <div class="form-group">
              <label for="tgl_kirim">Tanggal Kirim</label>
              <input type="text" class="form-control" id="v-tgl_kirim" name="tgl_kirim" placeholder="Tanggal Kirim" autocomplete="off" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="tgl_prd">Tanggal PRD</label>
              <input type="text" class="form-control" id="v-tgl_prd" name="tgl_prd" placeholder="Tanggal PRD" autocomplete="off" readonly>
            </div>
          </div> 
          <div class="col-md-12">
            <div class="form-group">
              <label for="keterangan">Keterangan</label>
              <textarea type="text" class="form-control" id="v-keterangan" name="keterangan" placeholder="Keterangan" autocomplete="off" readonly rows="3"></textarea>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- JavaScript -->
<script type="text/javascript">
  $(document).ready(function() {
    // Inisialisasi datepicker
    $('.datepicker').datepicker({
      format: 'dd/mm/yyyy',
      autoclose: true
    });

    // Modal detail handler
    $('#view').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget);
      
      // Ambil data dari tombol yang diklik
      var id_sch = button.data('id_sch');
      var id_customer = button.data('id_customer');
      var no_cr = button.data('no_cr');
      var no_batch = button.data('no_batch');
      var tgl_sch = button.data('tgl_sch');
      var size = button.data('size');
      var kode_warna_cap = button.data('kode_warna_cap');
      var kode_warna_body = button.data('kode_warna_body');
      var warna_cap = button.data('warna_cap');
      var warna_body = button.data('warna_body');
      var mesin = button.data('mesin');
      var jumlah = button.data('jumlah');
      var cek_print = button.data('cek_print');
      var jenis_grv= button.data('jenis_grv');
      var print = button.data('print');
      var tinta = button.data('tinta');
      var jenis_box = button.data('jenis_box');
      var jenis_zak = button.data('jenis_zak');
      var minyak = button.data('minyak');
      var tgl_kirim = button.data('tgl_kirim');
      var tgl_prd = button.data('tgl_prd');
      var keterangan = button.data('keterangan');
      
      // Format angka dengan separator
      function formatNumber(num) {
        if (num) {
          return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }
        return '0';
      }

      // Isi data ke modal
      $('#v-id_sch').val(id_sch);
      $('#v-no_cr').val(no_cr);
      $('#v-no_batch').val(no_batch);
      $('#v-tgl_sch').val(tgl_sch);
      $('#v-customer').val(id_customer);
      $('#v-size').val(size);
      $('#v-kode_warna_cap').val(kode_warna_cap);
      $('#v-kode_warna_body').val(kode_warna_body);
      $('#v-warna_cap').val(warna_cap);
      $('#v-warna_body').val(warna_body);
      $('#v-mesin').val(mesin);
      $('#v-jumlah').val(formatNumber(jumlah));
      $('#v-print').val(print);
      $('#v-tinta').val(tinta);
      $('#v-jenis_box').val(jenis_box);
      $('#v-jenis_grv').val(jenis_grv);
      $('#v-jenis_zak').val(jenis_zak);
      $('#v-minyak').val(minyak);
      $('#v-tgl_kirim').val(tgl_kirim);
      $('#v-tgl_prd').val(tgl_prd);
      $('#v-keterangan').val(keterangan);
      
      // Handle checkbox print
      if (cek_print == 1) {
        $('#v-cek_print').prop('checked', true);
        $('#form_print').show();
      } else {
        $('#v-cek_print').prop('checked', false);
        $('#form_print').hide();
      }
      
      // Ambil data customer via AJAX jika diperlukan
      // if (id_customer) {
      //   // Tampilkan loading
      //   $('#v-customer').val('Loading...');
        
      //   $.ajax({
      //     url: '<?= base_url() ?>Marketing/Print_schedule/get_customer/' + id_customer,
      //     type: 'GET',
      //     success: function(response) {
      //       if (response && response.nama_customer) {
      //         $('#v-customer').val(response.nama_customer);
      //       } else {
      //         $('#v-customer').val('Data tidak ditemukan');
      //       }
      //     },
      //     error: function() {
      //       $('#v-customer').val('Error loading data');
      //     }
      //   });
      // } else {
      //   $('#v-customer').val('Tidak ada data customer');
      // }
    });

    // Filter lihat data
    $('#lihat').click(function() {
      var filter_tgl = $('#filter_tgl').val();
      var filter_tgl2 = $('#filter_tgl2').val();

      // Validasi format tanggal
      if (filter_tgl && !isValidDate(filter_tgl)) {
        alert('Format tanggal dari tidak valid. Gunakan format dd/mm/yyyy');
        return;
      }
      
      if (filter_tgl2 && !isValidDate(filter_tgl2)) {
        alert('Format tanggal sampai tidak valid. Gunakan format dd/mm/yyyy');
        return;
      }

      var newFilterTgl = filter_tgl ? filter_tgl.split("/").reverse().join("-") : '';
      var newFilterTgl2 = filter_tgl2 ? filter_tgl2.split("/").reverse().join("-") : '';

      if (filter_tgl == '' && filter_tgl2 != '') {
        alert("Dari tanggal belum diisi");
        window.location = "<?= base_url() ?>Marketing/Print_schedule?alert=warning&msg=dari tanggal belum diisi";
      } else if (filter_tgl != '' && filter_tgl2 == '') {
        alert("Sampai tanggal belum diisi");
        window.location = "<?= base_url() ?>Marketing/Print_schedule?alert=warning&msg=sampai tanggal belum diisi";
      } else if (filter_tgl == '' && filter_tgl2 == '') {
        alert("Form periode harus diisi");
        window.location = "<?= base_url() ?>Marketing/Print_schedule?alert=warning&msg=form periode harus diisi";
      } else {
        window.location = "<?= base_url() ?>Marketing/Print_schedule/index/" + newFilterTgl + "/" + newFilterTgl2;
      }
    });

    // Export PDF
    $('#export').click(function() {
      var filter_tgl = $('#filter_tgl').val();
      var filter_tgl2 = $('#filter_tgl2').val();

      // Validasi format tanggal
      if (filter_tgl && !isValidDate(filter_tgl)) {
        alert('Format tanggal dari tidak valid. Gunakan format dd/mm/yyyy');
        return;
      }
      
      if (filter_tgl2 && !isValidDate(filter_tgl2)) {
        alert('Format tanggal sampai tidak valid. Gunakan format dd/mm/yyyy');
        return;
      }

      var newFilterTgl = filter_tgl ? filter_tgl.split("/").reverse().join("-") : '';
      var newFilterTgl2 = filter_tgl2 ? filter_tgl2.split("/").reverse().join("-") : '';

      if (filter_tgl == '' && filter_tgl2 != '') {
        alert("Dari tanggal belum diisi");
      } else if (filter_tgl != '' && filter_tgl2 == '') {
        alert("Sampai tanggal belum diisi");
      } else if (filter_tgl == '' && filter_tgl2 == '') {
        var url = "<?= base_url() ?>Marketing/Print_schedule/pdf_print_schedule";
        window.open(url, 'pdf_print_schedule', 'location=yes,height=700,width=1300,scrollbars=yes,status=yes');
      } else {
        var url = "<?= base_url() ?>Marketing/Print_schedule/pdf_print_schedule/" + newFilterTgl + "/" + newFilterTgl2;
        window.open(url, 'pdf_print_schedule', 'location=yes,height=700,width=1300,scrollbars=yes,status=yes');
      }
    });

    // Fungsi validasi tanggal
    function isValidDate(dateString) {
      var regex = /^\d{2}\/\d{2}\/\d{4}$/;
      if (!regex.test(dateString)) return false;
      
      var parts = dateString.split("/");
      var day = parseInt(parts[0], 10);
      var month = parseInt(parts[1], 10);
      var year = parseInt(parts[2], 10);
      
      if (year < 1000 || year > 3000 || month == 0 || month > 12) return false;
      
      var monthLength = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
      
      if (year % 400 == 0 || (year % 100 != 0 && year % 4 == 0)) {
        monthLength[1] = 29;
      }
      
      return day > 0 && day <= monthLength[month - 1];
    }
  });
</script>