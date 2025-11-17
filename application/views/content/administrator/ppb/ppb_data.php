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
                  <!-- <h5 class="m-b-10">Data Supplier</h5> -->
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="feather icon-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="javascript:">Administrator</a></li>
                  <li class="breadcrumb-item"><a href="<?= base_url('gudang_bahanbaku/gudang_bahan_baku_ppb') ?>">PPB</a></li>
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
                    <h5>Data PPB Administrator</h5>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#add">
                      <i class="feather icon-user-plus"></i>Tambah PPB
                    </button>
                  </div>
                  <div class="card-block table-border-style">

                    <?php
                    // print_r($result);
                    ?>
                    <div class="table-responsive">
                      <table class="table datatable table-hover table-striped table-sm">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>No PPB</th>
                            <th>Tanggal PPB</th>
                            <th>Jenis PPB</th>
                            <th>Status</th>
                            <th class="text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $level = $this->session->userdata('departement');
                          $no = 1;
                          foreach ($result as $k) {
                            $tgl_ppb =  explode('-', $k['tgl_ppb'])[2] . "/" . explode('-', $k['tgl_ppb'])[1] . "/" . explode('-', $k['tgl_ppb'])[0];
                            $tgl_pakai =  explode('-', $k['tgl_pakai'])[2] . "/" . explode('-', $k['tgl_pakai'])[1] . "/" . explode('-', $k['tgl_pakai'])[0];
                          ?>
                            <tr>
                              <th scope="row"><?= $no++ ?></th>
                              <td><?= $k['no_ppb'] ?></td>
                              <td><?= $tgl_ppb ?></td>
                              <td><?= $k['jenis_ppb'] ?></td>
                              <td><?= $k['status'] ?></td>
                              <td class="text-center">
                                <?php if ($level === "admin" && $k['acc_spv'] == null) { ?>
                                  <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-info btn-square btn-sm"
                                      data-toggle="modal"
                                      data-target="#edit"
                                      data-no_ppb="<?= $k['no_ppb'] ?>"
                                      data-departement="<?= $k['departement'] ?>"
                                      data-jenis_form_ppb="<?= $k['jenis_form_ppb'] ?>"
                                      data-jenis_ppb="<?= $k['jenis_ppb'] ?>"
                                      data-tgl_ppb="<?= $tgl_ppb ?>"
                                      data-tgl_pakai="<?= $tgl_pakai ?>"
                                      data-ket="<?= $k['ket'] ?>">
                                      <i class="feather icon-edit-2"></i>Edit
                                    </button>
                                  </div>
                                  <div class="btn-group" role="group" aria-label="Basic example">
                                    <a type="button" class="btn btn-success btn-square text-light btn-sm" href="<?= base_url() ?>administrator/ppb/cetak/<?= $k['no_ppb'] ?>">
                                      <i class="feather icon-printer"></i>Cetak
                                    </a>
                                  </div>
                                  <div class="btn-group" role="group" aria-label="Basic example">
                                    <a type="button" class="btn btn-danger btn-square text-light btn-sm" href="<?= base_url() ?>ppb/ppb/delete/<?= $k['no_ppb'] ?>" onclick="if (! confirm('Apakah Anda Yakin?')) { return false; }">
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
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script type="text/javascript">
  $(document).ready(function() {
    $('#export').click(function() {
      var filter_tgl = $('#filter_tgl').val();
      var filter_tgl2 = $('#filter_tgl2').val();
      if (filter_tgl == '' || filter_tgl2 == '') {
        alert('Pilih kedua tanggal untuk menampilkan data.');
      } else {
        var url = "<?= base_url() ?>laporan_barang_stok/pdf_laporan_barang_stok/" + filter_tgl.split("/")[2] + "-" + filter_tgl.split("/")[1] + "-" + filter_tgl.split("/")[0] + "/" + filter_tgl2.split("/")[2] + "-" + filter_tgl2.split("/")[1] + "-" + filter_tgl2.split("/")[0];
        window.open(url, 'pdf_laporan_barang_stok', 'location=yes,height=700,width=1300,scrollbars=yes,status=yes');
      }
    });

    $('#lihat').click(function() {
      var filter_tgl = $('#filter_tgl').val();
      var filter_tgl2 = $('#filter_tgl2').val();
      if (filter_tgl == '' || filter_tgl2 == '') {
        alert('Pilih kedua tanggal untuk melihat data.');
      } else {
        window.location.href = "<?= base_url() ?>Account/Account_ppbfilter_tg=" + filter_tgl + "&filter_tgl2=" + filter_tgl2;
      }
    });
  });
</script>

<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5>Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
      </div>
      <form method="post" action="<?= base_url() ?>ppb/ppb/add">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label for="jenis_ppb">Budget/Non Budget</label>
                <select class="form-control chosen-select" id="jenis_ppb" name="jenis_ppb" required onchange="toggleDirekturField()">
                  <option value="jenis_ppb" disabled selected hidden>- Pilih Budget/Non Budget -</option>
                  <option value="Budget">Budget</option>
                  <option value="Non-Budget">Non Budget</option>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="form_ppb">Form A/C</label>
                <select class="form-control chosen-select" id="form_ppb" name="form_ppb" required>
                  <option value="" disabled selected hidden>- Pilih Form A/C -</option>
                  <option value="FormA">FormA</option>
                  <option value="FormC">FormC</option>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="level">Departement</label>
                <select class="form-control chosen-select" id="level" name="departement" autocomplete="off" required>
                  <option value="" disabled selected hidden> - Pilih Departement - </option>
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
            <div class="col-md-3">
              <div class="form-group">
                <label for="no_ppb">No PPB</label>
                <input type="text" class="form-control" id="no_ppb" name="no_ppb" maxlength="20" placeholder="No PPB" aria-describedby="validationServer03Feedback" autocomplete="off" required>
                <div id="validationServer03Feedback" class="invalid-feedback">
                  Maaf Nomor PPB sudah ada.
                </div>
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="tgl_ppb">Tanggal PPB</label>
                <input type="text" class="form-control datepicker" id="tgl_ppb" name="tgl_ppb" placeholder="Tanggal PPB" autocomplete="off" required>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label for="kode_barang">Pilih Barang</label>
                <select class="form-control chosen-select" id="kode_barang_add" name="kode_barang_add" required>
                  <option disabled selected hidden value="">-Pilih Barang-</option>
                  <?php foreach ($res_barang as $s) { ?>
                    <option
                      data-satuan="<?= $s['satuan'] ?>"
                      data-spek="<?= $s['spek'] ?>"
                      data-nama="<?= $s['nama_barang'] ?>"
                      data-stok="<?= $s['stok'] ?>"
                      value="<?= $s['kode_barang'] ?>,<?= $s['nama_barang'] ?>,<?= $s['id_prc_master_barang'] ?>">
                      <?= $s['kode_barang'] ?> | <?= $s['nama_barang'] ?>
                    </option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="spek">Spek</label>
                <input type="text" class="form-control" id="spek" name="spek" placeholder="Spek" autocomplete="off" readonly>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="satuan">Satuan</label>
                <input type="text" class="form-control" id="satuan" name="satuan" placeholder="Unit" autocomplete="off" readonly>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="Stok">Stok</label>
                <input type="text" class="form-control" id="stok" name="stok" placeholder="stok" maxlength="15" autocomplete="off" readonly>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="Stok">No Budget</label>
                <input type="text" class="form-control" id="no_budget" name="no_budget" placeholder="No Budget" maxlength="15" autocomplete="off" readonly>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="jumlah">Jumlah Order</label>
                <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah" autocomplete="off" aria-describedby="validationServer03Feedback" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required>
                <div id="validationServer03Feedback" class="invalid-feedback">
                  Maaf Jumlah tidak boleh lebih dari Stock.
                </div>
              </div>
            </div>

            <!-- Tombol Input -->
            <div class="col-md-1 text-right">
              <a href="javascript:void(0)" id="input" class="btn btn-primary" style="margin-top: 31px;">
                <b class="text">Input</b>
              </a>
            </div>
          </div>

          <div class="table-responsive">
            <table class="table table-bordered table-sm">
              <thead>
                <tr>
                  <th>Kode Barang</th>
                  <th>Nama Barang</th>
                  <th>Spek</th>
                  <th>Satuan</th>
                  <th>Stok</th>
                  <th>No Budget</th>
                  <th>Jumlah Order</th>
                  <th class="text-right">Hapus</th>
                </tr>
              </thead>
              <tbody id="insert_batch">
              </tbody>
            </table>
          </div>

          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label for="tgl_pakai">Tanggal Kebutuhan</label>
                <input type="text" class="form-control datepicker" id="tgl_pakai" name="tgl_pakai" placeholder="Tanggal Kebutuhan" autocomplete="off" required>
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="ket">Keterangan</label>
                <input type="text" class="form-control" id="ket" name="ket" placeholder="Keterangan" autocomplete="off" required>
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="nama_admin">Nama Admin</label>
                <input type="text" class="form-control" id="nama_admin" name="nama_admin" value="<?= $this->session->userdata('nama_operator') ?>" maxlength="20" readonly>
              </div>
            </div>


            <input type="hidden" id="jumlah_batch" name="jumlah_batch" value="1">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
      </form>
    </div>
  </div>
</div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    // Ketika kode_barang_add berubah (barang dipilih)
    $('#kode_barang_add').on('change', function() {
      const selected = $(this).find(':selected');
      const satuan = selected.attr('data-satuan');
      const spek = selected.attr('data-spek');
      const nama_barang = selected.attr('data-nama_barang');
      const stok = selected.attr('data-stok');

      $('#satuan').val(satuan).prop('readonly', true);
      $('#spek').val(spek).prop('readonly', true);
      $('#stok').val(stok).prop('readonly', true);
      $('#nama_barang_add').val(nama_barang);
    });

    $('#kode_barang_add').on('change', function() {
      if ($(this).val() === "") {
        $('#satuan').val("").prop('readonly', false);
        $('#spek').val("").prop('readonly', false);
        $('#stok').val("").prop('readonly', false);
        $('#nama_barang_add').val("");
      }
    });


    // Fungsi untuk toggle Nama Direktur field visibility
    function toggleDirekturField() {
      const jenis_ppbValue = $('#jenis_ppb').val();
      if (jenis_ppbValue === 'Non-Budget') { // If "Non Budget" is selected
        $('#nama_direktur_div').show();
      } else { // If "Budget" is selected
        $('#nama_direktur_div').hide();
      }
    }
    // Call the function when the dropdown value changes
    $('#jenis_ppb').on('change', toggleDirekturField);
    // Trigger the function on page load to set initial state
    toggleDirekturField();
    // Input button to add items to table
    $('#input').on('click', function() {
      const kode = $('#kode_barang_add').val();
      const kode_barang = kode.split(",")[0];
      const nama_barang = kode.split(",")[1];
      const spek = $('#spek').val();
      const satuan = $('#satuan').val();
      const unit = $('#unit').val();
      const jumlah = $('#jumlah').val();
      const stok = $('#stok').val();
      const nextform = Date.now();
      const no_batch = 'Batch-' + nextform;
      const id_prc_master_barang = kode.split(",")[2];

      $('#insert_batch').append(`
            <tr id="tr_${nextform}">
            <input type="hidden" name="kode_barang[]" value="${kode_barang}">
            <input type="hidden" name="nama_barang[]" value="${nama_barang}">
            <input type="hidden" name="spek[]" value="${spek}">
            <input type="hidden" name="satuan[]" value="${satuan}">
            <input type="hidden" name="jumlah[]" value="${jumlah}">
            <input type="hidden" name="id_prc_master_barang[]" value="${id_prc_master_barang}">

            <td>${kode_barang}</td>
            <td>${nama_barang}</td> <!-- Nama Barang -->
            <td>${spek}</td>
            <td>${satuan}</td>
            <td>${stok}</td>
            <td></td>
            <td>${jumlah}</td>
            <td class="text-right">
              <a href="javascript:void(0)" class="text-danger btn-remove-row">
                <i class="feather icon-trash-2"></i>
              </a>
            </td>
            </tr>
        `);

      // Fungsi untuk menghapus baris
    });
    // ketika tombol hapus di-klik, hapus barisnya
    $(document).on('click', '.btn-remove-row', function() {
      $(this).closest('tr').remove();
    });



    $("#no_ppb").keyup(function() {
      var no_ppb = $("#no_ppb").val();
      jQuery.ajax({
        url: "<?= base_url() ?>ppb/ppb/cek_no_ppb/",
        dataType: 'text',
        type: "post",
        data: {
          no_ppb: no_ppb
        },
        success: function(response) {
          if (response == "true") {
            $("#no_ppb").addClass("is-invalid");
            $("#simpan").attr("disabled", "disabled");
          } else {
            $("#no_ppb").removeClass("is-invalid");
            $("#simpan").removeAttr("disabled");
          }
        }
      });

      function remove(id) {
        $('#tr_' + id).remove();
      }
    })
  })
</script>
<!-- Modal Edit -->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit PPB</h5>
        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
      </div>

      <form method="post" action="<?= base_url('ppb/ppb/update') ?>">
        <div class="modal-body">

          <!-- ===== INFO UMUM ===== -->
          <div class="row">
            <div class="col-md-3">
              <label>Budget/Non Budget</label>
              <select class="form-control chosen-select" id="e-jenis_ppb" name="jenis_ppb" required>
                <option value="" disabled selected hidden>- Pilih Budget/Non Budget -</option>
                <option value="Budget">Budget</option>
                <option value="Non-Budget">Non Budget</option>
              </select>
            </div>
            <div class="col-md-3">
              <label>Form A/C</label>
              <select class="form-control chosen-select" id="e-form_ppb" name="form_ppb" required>
                <option value="" disabled selected hidden>- Pilih Form A/C -</option>
                <option value="FormA">FormA</option>
                <option value="FormC">FormC</option>
              </select>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="level">Departement</label>
                <select class="form-control chosen-select" id="e-departement" name="departement" autocomplete="off" required>
                  <option value="" disabled selected hidden> - Pilih Departement - </option>
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
            <div class="col-md-3">
              <label>No PPB</label>
              <input type="text" class="form-control" id="e-no_ppb" name="no_ppb" readonly>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="tgl_ppb">Tanggal PPB</label>
                <input type="text" class="form-control" id="e-tgl_ppb" name="tgl_ppb" placeholder="Tanggal PPB" autocomplete="off" required>
              </div>
            </div>
          </div>

          <!-- ===== PILIH BARANG ===== -->
          <div class="row mt-3">
            <div class="col-md-3">
              <label>Pilih Barang</label>
              <select class="form-control chosen-select" id="e-kode_barang" name="kode_barang_add">
                <option disabled selected hidden>- Pilih Barang -</option>
                <?php foreach ($res_barang as $s) { ?>
                  <option
                    data-satuan="<?= $s['satuan'] ?>"
                    data-spek="<?= $s['spek'] ?>"
                    data-nama="<?= $s['nama_barang'] ?>"
                    data-stok="<?= $s['stok'] ?>"
                    value="<?= $s['kode_barang'] ?>,<?= $s['nama_barang'] ?>,<?= $s['id_prc_master_barang'] ?>">
                    <?= $s['kode_barang'] ?> | <?= $s['nama_barang'] ?>
                  </option>
                <?php } ?>
              </select>
            </div>

            <div class="col-md-2">
              <label>Spek</label>
              <input type="text" class="form-control" id="e-spek" readonly>
            </div>

            <div class="col-md-2">
              <label>Satuan</label>
              <input type="text" class="form-control" id="e-satuan" readonly>
            </div>
            <div class="col-md-2">
              <label>Stok</label>
              <input type="text" class="form-control" id="e-stok" readonly>
            </div>

            <div class="col-md-2">
              <label>Jumlah Order</label>
              <input type="number" class="form-control" id="e-jumlah" placeholder="Jumlah" aria-describedby="validationServer03Feedback" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase()" required">
              <div id="validationServer03Feedback" class="invalid-feedback">
                Maaf Jumlah tidak boleh lebih dari Stock.
              </div>
            </div>

            <div class="col-md-2 text-right">
              <a href="javascript:void(0)" style="cursor: pointer;" class="btn btn-primary mt-4" id="e-add-item">
                <i class="feather icon-plus"></i> Tambah
              </a>
            </div>
          </div>

          <!-- ===== TABEL BARANG ===== -->
          <div class="table-responsive mt-3">
            <table class="table table-bordered table-sm">
              <thead>
                <tr>
                  <th>Kode Barang</th>
                  <th>Nama Barang</th>
                  <th>Spek</th>
                  <th>Satuan</th>
                  <th>Jumlah</th>
                  <th>Stok</th>
                  <th width="60">Hapus</th>
                </tr>
              </thead>
              <tbody id="e-ppb_barang_det"></tbody>
            </table>
          </div>

          <!-- ===== INFO TAMBAHAN ===== -->
          <div class="row mt-3">
            <div class="col-md-3">
              <label>Tanggal Kebutuhan</label>
              <input type="text" class="form-control" id="e-tgl_pakai" name="tgl_pakai">
            </div>
            <div class="col-md-3">
              <label>Keterangan</label>
              <input type="text" class="form-control" id="e-ket" name="ket">
            </div>
            <div class="col-md-3">
              <label>Nama Admin</label>
              <input type="text" class="form-control" id="e-nama_admin" name="nama_admin" value="<?= $this->session->userdata("nama_operator") ?>" readonly>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" onclick="return confirm('yakin mengupdate data ini silahkan cek kembali form !')">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>


<script type="text/javascript">
  $(document).ready(function() {

    // ========== LOAD DATA SAAT MODAL DIBUKA ==========
    $(document).on('show.bs.modal', '#edit', function(event) {
      var btn = $(event.relatedTarget);
      var no_ppb = btn.data('no_ppb');
      var jenis_ppb = btn.data('jenis_ppb');
      var form_ppb = btn.data('jenis_form_ppb');
      var dept = btn.data('departement');
      var tgl_ppb = btn.data('tgl_ppb');
      var tgl_pakai = btn.data('tgl_pakai');
      var ket = btn.data('ket');

      var modal = $(this);
      modal.find('#e-no_ppb').val(no_ppb);
      modal.find('#e-jenis_ppb').val(jenis_ppb).trigger('chosen:updated');
      modal.find('#e-form_ppb').val(form_ppb).trigger('chosen:updated');
      modal.find('#e-departement').val(dept);
      modal.find('#e-departement').trigger('chosen:updated');
      modal.find('#e-tgl_ppb').val(tgl_ppb);
      modal.find('#e-tgl_pakai').val(tgl_pakai);
      modal.find('#e-ket').val(ket);

      var $tbody = modal.find('#e-ppb_barang_det');
      $tbody.empty();

      $.ajax({
        url: "<?= base_url('ppb/ppb/data_ppb_barang') ?>",
        type: "POST",
        dataType: "json",
        data: {
          no_ppb: no_ppb
        },
        success: function(res) {
          if (res.length > 0) {
            res.forEach(item => {
              $tbody.append(rowHTML(item.kode_barang, item.nama_barang, item.spek, item.satuan, item.jumlah_ppb, item.id_prc_master_barang, item.stok));
            });
          } else {
            $tbody.html(`<tr><td colspan="7" class="text-center text-muted">Tidak ada data barang</td></tr>`);
          }
        }
      });
    });

    // ========== FUNGSI BUAT ROW ==========
    function rowHTML(kode, nama, spek, satuan, jumlah, id, stok) {
      return `
      <tr>
        <td><input type="hidden" name="kode_barang[]" value="${kode}">${kode}</td>
        <td><input type="hidden" name="nama_barang[]" value="${nama}">${nama}</td>
        <td><input type="hidden" name="spek[]" value="${spek}">${spek}</td>
        <td><input type="hidden" name="satuan[]" value="${satuan}">${satuan}</td>
        <input type="hidden" name="id_prc_master_barang[]" value="${id}">
        <td><input type="number" class="form-control" name="jumlah[]" value="${jumlah}"></td>
        <td>${stok}</td>
        <td class="text-center">
          <a href="javascript:void(0)" class="btn btn-sm btn-danger btn-remove-row">
            <i class="feather icon-trash-2"></i>
          </a>
        </td>
      </tr>
    `;
    }


    // ========== SAAT PILIH BARANG BARU ==========
    $('#e-kode_barang').on('change', function() {
      const selected = $(this).find(':selected');
      $('#e-spek').val(selected.data('spek'));
      $('#e-satuan').val(selected.data('satuan'));
      $('#e-stok').val(selected.data('stok'));
    });

    // ========== TAMBAH BARANG BARU ==========
    $('#e-add-item').on('click', function() {
      const val = $('#e-kode_barang').val();
      if (!val) return alert('Pilih barang dulu');

      const [kode, nama, id] = val.split(',');
      const spek = $('#e-spek').val();
      const satuan = $('#e-satuan').val();
      const jumlah = $('#e-jumlah').val();
      const stok = $('#e-stok').val();

      if (!jumlah || jumlah <= 0) return alert('Isi jumlah dengan benar');

      $('#e-ppb_barang_det').append(rowHTML(kode, nama, spek, satuan, jumlah, id, stok));
      // reset input
      $('#e-kode_barang').val('').trigger('chosen:updated');
      $('#e-spek').val('');
      $('#e-satuan').val('');
      $('#e-jumlah').val('');
      $('#e-stok').val('');
    });

    // ========== HAPUS BARIS ==========
    $(document).on('click', '.btn-remove-row', function() {
      $(this).closest('tr').remove();
    });
  });
</script>