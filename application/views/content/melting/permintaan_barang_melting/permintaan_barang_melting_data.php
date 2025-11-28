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
                  <!-- <h5 class="m-b-10">Data Barang masuk</h5> -->
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="feather icon-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="javascript:">Melting</a></li>
                  <li class="breadcrumb-item"><a href="javascript:">Kelola Barang</a></li>
                  <li class="breadcrumb-item"><a href="<?= base_url('melting/Permintaan_barang_melting') ?>">Permintaan Barang Melting</a></li>
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
                    <h5>Data Permintaan Barang Melting</h5>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#add">
                      <i class="feather icon-plus"></i>Tambah Data
                    </button>
                  </div>
                  <div class="card-block table-border-style">
                    <div class="table-responsive">
                      <table class="table datatable table-hover table-striped table-sm">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Tanggal Permintaan</th>
                            <th>No Urut</th>
                            <th>Nama Operator</th>
                            <th>Status</th>
                            <th class="text-center">Details</th>
                            <th class="text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $level = $this->session->userdata('departement');
                          $jabatan = $this->session->userdata('jabatan');
                          $no = 1;
                          foreach ($result as $k) {
                            $tgl =  explode('-', $k['tgl_permintaan'])[2] . "/" . explode('-', $k['tgl_permintaan'])[1] . "/" . explode('-', $k['tgl_permintaan'])[0];
                            // $exp =  explode('-', $k['exp'])[2]."/".explode('-', $k['exp'])[1]."/".explode('-', $k['exp'])[0];
                          ?>
                            <tr>
                              <th scope="row"><?= $no++ ?></th>
                              <td><?= $tgl ?></td>
                              <td><?= $k['no_urut'] ?></td>
                              <td><?= $k['nama_operator'] ?></td>
                              <td><?= $k['status'] ?></td>
                              <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <button type="button" class="btn btn-info btn-square btn-sm" data-toggle="modal" data-target="#view"
                                    data-no_urut="<?= $k['no_urut'] ?>" 
                                    data-tgl_permintaan="<?= $tgl ?>" 
                                    ><i class="feather icon-eye"></i>Detail
                                  </button>
                                </div>
                              </td>
                              <td class="text-center">
                                <?php if ($jabatan === "admin" || $jabatan === "supervisor") { ?>
                                  <?php if ($k['status'] === "Proses") { ?>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                      <button type="button"
                                        class="btn btn-primary btn-square btn-sm"
                                        data-toggle="modal" data-target="#edit"
                                        data-no_urut="<?= $k['no_urut'] ?>"
                                        data-tgl_permintaan="<?= $tgl ?>"
                                        data-status="<?= $k['status'] ?>">
                                        <i class="feather icon-edit-2"></i>Edit
                                      </button>
                                    </div>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                      <a type="button" class="btn btn-danger btn-square text-light btn-sm" href="<?= base_url() ?>melting/permintaan_barang_melting/delete/<?= $k['no_urut']?>" onclick="if (! confirm('Apakah Anda Yakin?')) { return false; }">
                                        <i class="feather icon-trash-2"></i>Delete
                                      </a>
                                    </div>
                                  <?php } ?>
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
    $('#export').click(function() {
      var filter_tgl = $('#filter_tgl').val();
      if (filter_tgl == '') {
        window.location = "<?= base_url() ?>laporan_barang_stok/pdf_laporan_barang_stok";
      } else {
        var url = "<?= base_url() ?>laporan_barang_stok/pdf_laporan_barang_stok/" + filter_tgl.split("/")[2] + "-" + filter_tgl.split("/")[1] + "-" + filter_tgl.split("/")[0];
        window.open(url, 'pdf_laporan_barang_stok', 'location=yes,height=700,width=1300,scrollbars=yes,status=yes');
      }
    })

  })
</script>
<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Permintaan Barang Melting</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>melting/Permintaan_barang_melting/add">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="no_urut">No Urut</label>
                <input type="text" class="form-control text-uppercase" id="no_urut" name="no_urut" Value="<?= $no_urut ?>" maxlength="20" aria-describedby="validationServer03Feedback" autocomplete="off" readonly>
                <div id="validationServer03Feedback" class="invalid-feedback">
                  Maaf nomor transfer slip sudah ada.
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="kode_ts">Kode TS</label>
                <select type="text" class="form-control chosen-select" id="kode_ts" name="kode_ts" placeholder="Tanggal Permintaan" autocomplete="off" required>
                  <option value="" disabled selected hidden> - Pilih Kode TS - </option>
                  <option value="Bahan Baku">BA</option>
                  <option value="Bahan Pembantu">BB</option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="tgl_permintaan">Tanggal Permintaan</label>
                <input type="text" class="form-control datepicker" id="tgl_permintaan" name="tgl_permintaan" placeholder="Tanggal Permintaan" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="nama_operator">Nama Operator</label>
                <input type="text" class="form-control" id="nama_operator" name="nama_operator" value="<?= $this->session->userdata('nama_operator') ?>" maxlength="20" readonly>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="no_batch">No Batch & Nama Barang </label>
                <select class="form-control chosen-select" id="no_batch_add" name="no_batch_add" required>
                  <option disabled selected hidden value="">- Pilih No Batch & Nama Barang -</option>
                </select>
              </div>
            </div>
            <div class="col-2">
              <div class="form-group">
                <label for="stok">Stok </label>
                <input class="form-control" id="stok" name="stok" placeholder="Stok" readonly>
              </div>
            </div>
            <div class="col-2" style="padding-left: 0px;">
              <div class="form-group">
                <label for="qty">Quantity</label>
                <input type="text" class="form-control" id="qty" name="qty_add" placeholder="Quantity" onkeypress="return hanyaAngka(event)" maxlength="15" autocomplete="off" required>
              </div>
            </div>
            <div class="col-1" style="padding-left: 0px;">
              <div class="form-group">
                <label for="satuan">Satuan</label>
                <input type="text" class="form-control" id="satuan" name="satuan_add" placeholder="Satuan" onkeypress="return hanyaAngka(event)" maxlength="15" autocomplete="off" readonly>
              </div>
            </div>
            <div class="col-1 text-right">
              <a href="javascript:void(0)" id="input" class="btn btn-primary" style="margin-left:-20px;margin-top: 31px;"><b class="text">Input</b></a>
            </div>
          </div>

          <div class="table-responsive">
            <table class="table table-bordered table-sm">
              <thead>
                <tr>
                  <th>No Batch</th>
                  <th>Nama Barang</th>
                  <th>Qty</th>
                  <th class="text-center">Hapus</th>
                </tr>
              </thead>
              <tbody id="insert_batch">
              </tbody>
            </table>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" id="simpan" class="btn btn-primary" onclick="if (! confirm('Apakah Anda Yakin Untuk Menimpan Data Ini? Tolong Untuk Di Check Kembali. Dan Jangan Lupa Untuk Menginputkan Barangnya')) { return false; }">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {

    $('#kode_ts').on('change', function() {
      let value = $(this).val()

      $('#no_batch_add').html('<option disabled selected hidden>Loading...</option>')
        .trigger("chosen:updated")

      $.ajax({
        url: "<?= base_url('melting/permintaan_barang_melting/get_by_kode_ts') ?>",
        type: "POST",
        data: {
          kode_ts: value
        },
        dataType: "json",
        success: function(data) {

          console.log(data)
          $('#no_batch_add').empty()
            .append('<option value="" disabled selected hidden>- Pilih No Batch & Nama Barang -</option>');

          $.each(data, function(i, item) {
            $('#no_batch_add').append(`
            <option 
              value="${item.no_batch}"
              data-nama_barang="${item.nama_barang}"
              data-jml_bm="${item.jml_bm}"
              data-satuan="${item.satuan}"
              data-id_prc_master_barang="${item.id_prc_master_barang}"
              data-id_adm_bm="${item.id_adm_bm}"
            >
          ${item.nama_barang} | ${item.no_batch}
            </option>
          `);
          });

          $('#no_batch_add').trigger("chosen:updated");
        },
        error: function(xhr, status, error) {
          console.error("Error:", error);
          alert("Terjadi kesalahan saat memuat data barang");
        }
      });

    })


    $("#no_batch_add").on('change', function() {
      let selected = $(this).find('option:selected');
      var jml_bm = selected.data('jml_bm')
      $('#stok').val(selected.data('jml_bm'))

    })

    $('#input').on('click', function() {
      let selected = $('#no_batch_add').find("option:selected");
      let no_batch = selected.val()
      let nama_barang = selected.data('nama_barang')
      let jml_permintaan = $('#qty').val()
      let id_prc_master_barang = selected.data('id_prc_master_barang')
      let id_adm_bm = selected.data('id_adm_bm')
      console.log(id_prc_master_barang)

      if (!no_batch) {
        alert("Pilih Barang dulu!");
        return;
      }

      if (!jml_permintaan) {
        alert("isi jumlah permintaan")
        return;
      }

      let duplikat = false;
      $('#insert_batch tr').each(function() {
        let existing_batch = $(this).find('td:eq(0)').text().trim();
        if (existing_batch === no_batch) {
          duplikat = true;
        }
      });

      if (duplikat) {
        alert("Barang ini sudah ditambahkan!");
        return;
      }

      $("#insert_batch").append(`
        <tr>
        <input type="hidden" name="id_prc_master_barang[]" value="${id_prc_master_barang}">
        <input type="hidden" name="id_adm_bm[]" value="${id_adm_bm}">
        <input type="hidden" name="jml_permintaan[]" value="${jml_permintaan}">
        <td>${no_batch}</td>
        <td>${nama_barang}</td>
        <td>${jml_permintaan}</td>
        <td class="text-center">
          <button type="button" class="btn btn-danger btn-sm btn-hapus">Hapus</button>
        </td>
        </tr>
        `)
    })
    $('#add').on('hidden.bs.modal', function() {
      $(this).find('form')[0].reset();
    });
  })

  $(document).on('click', '.btn-hapus', function() {
    $(this).closest('tr').remove();
  });
</script>

<!-- Modal -->
<div class="modal fade" id="view" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Permintaan Barang Melting</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>melting/permintaan_barang_melting/update">
        <input type="hidden" id="e_id_barang_masuk" name="id_barang_masuk">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="v-no_transfer_slip">No Urut</label>
                <input type="text" class="form-control" id="v-no_transfer_slip" name="v-no_transfer_slip" placeholder="No Surat Jalan" maxlength="20" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="tgl">Tanggal Permintaan</label>
                <input type="text" class="form-control" id="v-tgl" name="tgl" placeholder="Tanggal Permintaan" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="v-nama_operator">Nama Operator</label>
                <input type="text" class="form-control" id="v-nama_operator" name="v-nama_operator" placeholder="Nama operator" maxlength="20" readonly>
              </div>
            </div>
            <div class="col-md-6">
              <!-- <div class="form-group">
              <label for="tgl">Tanggal Kadaluarsa</label>
              <input type="text" class="form-control" id="v-exp" name="exp"  placeholder="Tanggal Kadaluarsa" readonly>
            </div> -->
            </div>
          </div>
          <div class="table-responsive">
            <table class="table table-bordered table-sm">
              <thead>
                <tr>
                  <th>No Batch</th>
                  <th>Nama Barang</th>
                  <th>Qty</th>
                </tr>
              </thead>
              <tbody id="v-insert_batch">
              </tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    $('#view').on('show.bs.modal', function(event) {
      var no_urut = $(event.relatedTarget).data('no_urut')
      var tgl = $(event.relatedTarget).data('tgl_permintaan')


      $(this).find('#v-no_transfer_slip').val(no_urut)
      $(this).find('#v-tgl').val(tgl)
      

      $.ajax({
        url: "<?= base_url('melting/permintaan_barang_melting/get_by_no_urut') ?>",
        type: "POST",
        data: {
          no_urut: no_urut
        },
        dataType: "json",

        success: function(data) {
          console.log(data)
          $('#v-insert_batch').empty()

          $.each(data, function(i, item) {

            $("#v-insert_batch").append(`
                        <tr>
                            <td>${item.no_batch}</td>
                            <td>${item.nama_barang}</td>
                            <td>${item.jml_permintaan}</td>
                        </tr>
                    `)
          })
        },

        error: function(xhr, status, error) {
          console.error("Error:", error);
          alert("Terjadi kesalahan saat memuat data barang");
        }
      })

    })
  })
</script>

<!-- Modal -->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Permintaan Barang Melting</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>melting/Permintaan_barang_melting/update">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="no_urut">No Urut</label>
                <input type="text" class="form-control text-uppercase" id="e-no_urut" name="no_urut" maxlength="20" aria-describedby="validationServer03Feedback" autocomplete="off" readonly>
                <div id="validationServer03Feedback" class="invalid-feedback">
                  Maaf nomor transfer slip sudah ada.
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="kode_ts">Kode TS</label>
                <select type="text" class="form-control chosen-select" id="e-kode_ts" name="kode_ts" placeholder="Tanggal Permintaan" autocomplete="off">
                  <option value="" disabled selected hidden> - Pilih Kode TS - </option>
                  <option value="Bahan Baku">BA</option>
                  <option value="Bahan Pembantu">BB</option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="tgl_permintaan">Tanggal Permintaan</label>
                <input type="text" class="form-control datepicker" id="e-tgl_permintaan" name="tgl_permintaan" placeholder="Tanggal Permintaan" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="nama_operator">Nama Operator</label>
                <input type="text" class="form-control" id="nama_operator" name="nama_operator" value="<?= $this->session->userdata('nama_operator') ?>" maxlength="20" readonly>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="no_batch">No Batch & Nama Barang </label>
                <select class="form-control chosen-select" id="no_batch_edit" name="no_batch_add">
                  <option disabled selected hidden value="">- Pilih No Batch & Nama Barang -</option>
                </select>
              </div>
            </div>
            <div class="col-2">
              <div class="form-group">
                <label for="stok">Stok </label>
                <input class="form-control" id="e-stok" name="stok" placeholder="Stok" readonly>
              </div>
            </div>
            <div class="col-2" style="padding-left: 0px;">
              <div class="form-group">
                <label for="qty">Quantity</label>
                <input type="text" class="form-control" id="e-qty" name="qty" placeholder="Quantity" onkeypress="return hanyaAngka(event)" maxlength="15" autocomplete="off">
              </div>
            </div>
            <div class="col-1" style="padding-left: 0px;">
              <div class="form-group">
                <label for="satuan">Satuan</label>
                <input type="text" class="form-control" id="e-satuan" name="satuan" placeholder="Satuan" onkeypress="return hanyaAngka(event)" maxlength="15" autocomplete="off" readonly>
              </div>
            </div>
            <div class="col-1 text-right">
              <a href="javascript:void(0)" id="e-input" class="btn btn-primary" style="margin-left:-20px;margin-top: 31px;"><b class="text">Input</b></a>
            </div>
          </div>

          <div class="table-responsive">
            <table class="table table-bordered table-sm">
              <thead>
                <tr>
                  <th>No Batch</th>
                  <th>Nama Barang</th>
                  <th>Qty</th>
                  <th class="text-center">Hapus</th>
                </tr>
              </thead>
              <tbody id="e-insert_batch">
              </tbody>
            </table>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" id="simpan" class="btn btn-primary" onclick="if (! confirm('Apakah Anda Yakin Untuk Menimpan Data Ini? Tolong Untuk Di Check Kembali. Dan Jangan Lupa Untuk Menginputkan Barangnya')) { return false; }">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('#edit').on('show.bs.modal', function(event) {

      var no_urut = $(event.relatedTarget).data('no_urut')
      var tgl_permintaan = $(event.relatedTarget).data('tgl_permintaan')

      $('#e-no_urut').val(no_urut)
      $('#e-tgl_permintaan').val(tgl_permintaan)

      // Clear table sebelum memasukkan ulang
      $("#e-insert_batch").empty();

      $.ajax({
        url: "<?= base_url('melting/permintaan_barang_melting/get_by_no_urut') ?>",
        type: "POST",
        data: {
          no_urut: no_urut
        },
        dataType: "json",

        success: function(data) {
          console.log(data)

          $.each(data, function(i, item) {

            $("#e-insert_batch").append(`
                        <tr>
                            <input type="hidden" name="id_prc_master_barang[]" value="${item.id_prc_master_barang}">
                            <input type="hidden" name="id_adm_bm[]" value="${item.id_adm_bm}">
                            <input type="hidden" name="jml_permintaan[]" value="${item.jml_permintaan}">

                            <td>${item.no_batch}</td>
                            <td>${item.nama_barang}</td>
                            <td>${item.jml_permintaan}</td>

                            <td class="text-center">
                                <button type="button" class="btn btn-danger btn-sm btn-hapus">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                    `)
          })
        },

        error: function(xhr, status, error) {
          console.error("Error:", error);
          alert("Terjadi kesalahan saat memuat data barang");
        }
      })

      $(this).find('#e-tgl_permintaan').datepicker().on('show.bs.modal', function(event) {
        // prevent datepicker from firing bootstrap modal "show.bs.modal"
        event.stopPropagation();
      });
    })
  })

  $(document).ready(function() {

    $('#e-kode_ts').on('change', function() {
      let value = $(this).val()
      console.log(value)

      $('#no_batch_edit').html('<option disabled selected hidden>Loading...</option>')
        .trigger("chosen:updated")

      $.ajax({
        url: "<?= base_url('melting/permintaan_barang_melting/get_by_kode_ts') ?>",
        type: "POST",
        data: {
          kode_ts: value
        },
        dataType: "json",
        success: function(data) {

          console.log(data)
          $('#no_batch_edit').empty()
            .append('<option value="" disabled selected hidden>- Pilih No Batch & Nama Barang -</option>');

          $.each(data, function(i, item) {
            $('#no_batch_edit').append(`
            <option 
              value="${item.no_batch}"
              data-nama_barang="${item.nama_barang}"
              data-jml_bm="${item.jml_bm}"
              data-satuan="${item.satuan}"
              data-id_prc_master_barang="${item.id_prc_master_barang}"
              data-id_adm_bm="${item.id_adm_bm}"
            >
          ${item.nama_barang} | ${item.no_batch}
            </option>
          `);
          });

          $('#no_batch_edit').trigger("chosen:updated");
        },
        error: function(xhr, status, error) {
          console.error("Error:", error);
          alert("Terjadi kesalahan saat memuat data barang");
        }
      });
    })
  })

  $(document).ready(function() {


    $("#no_batch_edit").on('change', function() {
      let selected = $(this).find('option:selected');
      var jml_bm = selected.data('jml_bm')
      $('#e-stok').val(selected.data('jml_bm'))
      $('#e-satuan').val(selected.data('satuan'))

    })

    $('#e-input').on('click', function() {
      let selected = $('#no_batch_edit').find("option:selected");
      let no_batch = selected.val()
      let nama_barang = selected.data('nama_barang')
      let jml_permintaan = $('#e-qty').val()
      let id_prc_master_barang = selected.data('id_prc_master_barang')
      let id_adm_bm = selected.data('id_adm_bm')
      console.log(id_prc_master_barang)

      if (!no_batch) {
        alert("Pilih Barang dulu!");
        return;
      }

      if (!jml_permintaan) {
        alert("isi jumlah permintaan")
        return;
      }

      let duplikat = false;
      $('#e-insert_batch tr').each(function() {
        let existing_batch = $(this).find('td:eq(0)').text().trim();
        if (existing_batch === no_batch) {
          duplikat = true;
        }
      });

      if (duplikat) {
        alert("Barang ini sudah ditambahkan!");
        return;
      }

      $("#e-insert_batch").append(`
        <tr>

        <input type="hidden" name="id_prc_master_barang[]" value="${id_prc_master_barang}">
        <input type="hidden" name="id_adm_bm[]" value="${id_adm_bm}">
        <input type="hidden" name="jml_permintaan[]" value="${jml_permintaan}">

        <td>${no_batch}</td>
        <td>${nama_barang}</td>
        <td>${jml_permintaan}</td>
        <td class="text-center">
          <button type="button" class="btn btn-danger btn-sm btn-hapus">Hapus</button>
        </td>
        </tr>
        `)
    })
  })




  // event delete dynamic row
  $(document).on('click', '.btn-hapus', function() {
    $(this).closest('tr').remove();
  })
</script>