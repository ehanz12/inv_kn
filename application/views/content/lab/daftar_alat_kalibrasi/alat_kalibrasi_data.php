<style>
  .table-orange {
    background-color: #FFA500 !important;
    /* oranye */
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
                  <!-- <h5 class="m-b-10">Data Barang Keluar</h5> -->
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="feather icon-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="javascript:">Lab/QC</a></li>
                  <li class="breadcrumb-item"><a href="<?= base_url('lab/Alat_kalibrasi') ?>">Alat Kalibrasi</a></li>
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
                    <h5>Daftar Alat Kalibrasi</h5>
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
                            <th>Kode Alat</th>
                            <th>Nama Alat</th>
                            <th>No Sertifikat</th>
                            <th>Tanggal Kalibrasi</th>
                            <th>E.D Kalibrasi</th>
                            <th class="text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $level = $this->session->userdata('departement');
                          $jabatan = $this->session->userdata('jabatan');
                          $no = 1;
                          foreach ($result as $k) {
                            if ($k['tgl_kalibrasi'] == null) {
                              $tgl_kalibrasi  = "-";
                            } else {
                              $tgl_kalibrasi =  explode('-', $k['tgl_kalibrasi'])[2] . "/" . explode('-', $k['tgl_kalibrasi'])[1] . "/" . explode('-', $k['tgl_kalibrasi'])[0];
                            }
                            if ($k['ed_kalibrasi'] == null) {
                              $ed_kalibrasi = "-";
                            } else {
                              $ed_kalibrasi =  explode('-', $k['ed_kalibrasi'])[2] . "/" . explode('-', $k['ed_kalibrasi'])[1] . "/" . explode('-', $k['ed_kalibrasi'])[0];
                            }
                          ?>
                            <tr class="table-row">
                              <th scope="row"><?= $no++ ?></th>
                              <td>
                                <span class="btn btn-primary btn-sm btn-square"
                                  data-toggle="modal"
                                  data-target="#view"
                                  data-nama_barang="<?= $k['nama_barang'] ?>"
                                  data-kode_barang="<?= $k['kode_barang'] ?>"
                                  data-id_prc_master_barang="<?= $k['id_prc_master_barang'] ?>">
                                  <?= $k['kode_barang'] ?>
                                </span>
                              </td>
                              <td><?= $k['nama_barang'] ?></td>
                              <td><?= $k['no_sertif'] ?></td>
                              <td><?= $tgl_kalibrasi ?></td>
                              <td class="ed"><?= $ed_kalibrasi ?></td>
                              <td class="text-center">
                                <?php if ($jabatan === "admin" || $jabatan === "operator" || $jabatan === "supervisor") { ?>
                                  <?php if ($k['no_sertif'] == null) :  ?>
                                    <div class="btn-group" role="group">
                                      <button type="button"
                                        class="btn btn-primary btn-square btn-sm"
                                        data-toggle="modal"
                                        data-target="#add"
                                        data-id_prc_master_barang="<?= $k['id_prc_master_barang'] ?>"
                                        data-kode_alat="<?= $k['kode_barang'] ?>"
                                        data-nama_alat="<?= $k['nama_barang'] ?>"> <i class=" feather icon-edit-2"></i> +
                                      </button>
                                    </div>
                                  <?php else : ?>
                                    <div class="btn-group" role="group">
                                      <button type="button"
                                        class="btn btn-success btn-square btn-sm"
                                        data-toggle="modal"
                                        data-target="#edit"
                                        data-tgl_kalibrasi="<?php $k['tgl_kalibrasi'] ?>"
                                        data-ed_kalibrasi="<?php $k['ed_kalibrasi'] ?>"
                                        data-kode_alat="<?= $k['kode_barang'] ?>"
                                        data-nama_alat="<?= $k['nama_barang'] ?>"> <i class=" feather icon-edit-2"></i> +
                                      </button>
                                    </div>
                                  <?php endif; ?>
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

    // INIT DATATABLES (WAJIB)
    let table = $('.datatable').DataTable({
      ordering: true,
      paging: true,
      searching: true,
      info: true
    });

    let toastShown = false; // agar toast tidak muncul berkali-kali


    // ================================
    // FUNGSI HITUNG WARNA TANGGAL
    // ================================
    function warnaTanggalJS(tanggalInput, warnaAman = '#f1f1f1') {
      // parsing dd/mm/YYYY dan normalisasi ke awal hari (00:00)
      const tgl = moment(tanggalInput, "DD/MM/YYYY").startOf('day');
      const now = moment().startOf('day');

      if (!tgl.isValid()) return warnaAman;

      // sekarang akan mengembalikan 0 untuk hari ini, 1 untuk besok, -1 untuk kemarin
      const selisih = tgl.diff(now, "days");
      console.log('selisih hari:', selisih);

      // Pilihan: anggap expired hanya kalau selisih < 0 (kemarin atau lebih lama)
      if (selisih < 0) return "red"; // sudah lewat (expired)
      if (selisih <= 7) return "yellow"; // <= 7 hari
      return warnaAman; // aman (>30 hari)
    }


    // ================================
    // UPDATE ROW COLOR
    // ================================
    function updateRowStatus() {

      $('.table-row').each(function() {
        let tgl = $(this).find('.ed').text().trim();

        if (!tgl || tgl === "-") return;

        let warna = warnaTanggalJS(tgl, "#f1f1f1");

        $(this).removeClass('table-danger table-warning table-orange');

        if (warna === 'red') {
          $(this).addClass('table-danger');
        } else if (warna === 'yellow') {
          $(this).addClass('table-warning');
        } else {
          $(this).css("background-color", warna); // warna aman custom
        }
      });
    }


    // ================================
    // TAMPILKAN TOAST
    // ================================
    function showToastIfNeeded() {

      if (toastShown) return; // agar tidak spam

      if ($('.table-row.table-danger').length > 0) {
        Toastify({
          text: "⚠ Waktu ED Kalibrasi SUDAH HABIS!",
          duration: 5000,
          close: true,
          gravity: "top",
          position: "center",
          style: {
            background: "#BD362F"
          }
        }).showToast();
        toastShown = true;
        return;
      }

      if ($('.table-row.table-warning').length > 0) {
        Toastify({
          text: "⏳ ED Kalibrasi tinggal beberapa hari lagi!",
          duration: 5000,
          close: true,
          gravity: "top",
          position: "center",
          style: {
            background: "#F89406"
          }
        }).showToast();
        toastShown = true;
        return;
      }

      // Kalau semuanya aman
      Toastify({
        text: "✅ Semua alat masih aman!",
        duration: 4000,
        close: true,
        gravity: "top",
        position: "center",
        style: {
          background: "#00CCFF"
        }
      }).showToast();
      toastShown = true;
    }


    // ================================
    // FIRST LOAD
    // ================================
    updateRowStatus();
    showToastIfNeeded();

    // ================================
    // JALAN SAAT DATATABLE DRAW ULANG
    // ================================
    table.on('draw.dt', function() {
      updateRowStatus();
      showToastIfNeeded();
    });

  });
</script>





<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Alat Kalibrasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>lab/Alat_kalibrasi/add">
        <input type="hidden" id="id_prc_master_barang" name="id_prc_master_barang">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="kode_alat">Kode Alat</label>
                <input type="text" class="form-control text-uppercase" id="kode_alat" name="kode_alat" placeholder="Kode Alat" readonly>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="nama_alat">Nama Alat</label>
                <input type="text" class="form-control text-uppercase" id="nama_alat" name="nama_alat" placeholder="Nama Alat" autocomplete="off" readonly>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="no_sertif">No Sertif</label>
                <input type="text" class="form-control text-uppercase" id="no_sertif" name="no_sertif" placeholder="No Sertifikat" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="tgl_kalibrasi">Tanggal Kalibrasi</label>
                <input type="text" class="form-control datepicker" id="tgl_kalibrasi" name="tgl_kalibrasi" placeholder="Tanggal Kalibrasi" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="ed_kalibrasi">E.D Kalibrasi</label>
                <input type="text" class="form-control datepicker" id="ed_kalibrasi" name="ed_kalibrasi" placeholder="E.D Kalibrasi" autocomplete="off" required>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" id="simpan" class="btn btn-primary" onclick="if (! confirm('Apakah Anda Yakin Untuk Menimpan Data Ini? Tolong Untuk Di Check Kembali. Dan Jangan Lupa Untuk Menginputkan Barangnya')) { return false; }">Simpan</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    uppercase('#kode_alat');
    uppercase('#nama_alat');
    uppercase('#no_sertif');

    $('#add').on('show.bs.modal', function(event) {
      var nama_alat = $(event.relatedTarget).data('nama_alat')
      $(this).find('#nama_alat').val(nama_alat);
      var kode_alat = $(event.relatedTarget).data('kode_alat')
      $(this).find('#kode_alat').val(kode_alat);
      var id_prc_master_barang = $(event.relatedTarget).data('id_prc_master_barang')
      $(this).find('#id_prc_master_barang').val(id_prc_master_barang)


      $(this).find('#tgl_kalibrasi').datepicker().on('show.bs.modal', function(event) {
        // prevent datepicker from firing bootstrap modal "show.bs.modal"
        event.stopPropagation();
      });


      $(this).find('#ed_kalibrasi').datepicker().on('show.bs.modal', function(event) {
        // prevent datepicker from firing bootstrap modal "show.bs.modal"
        event.stopPropagation();
      });

    });
  })
</script>



<!-- Modal -->
<div class="modal fade" id="view" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Alat Kalibrasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <form>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="kode_alat">Kode Alat</label>
              <input type="hidden" id="id_kalibrasi" name="id_kalibrasi">
              <input type="text" class="form-control" id="v-kode_alat" name="kode_alat" placeholder="Kode Alat" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="nama_alat">Nama Alat</label>
              <input type="text" class="form-control" id="v-nama_alat" name="nama_alat" placeholder="Nama Alat" autocomplete="off" readonly>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="table-responsive">
            <table class="table table-bordered table-sm">
              <thead>
                <tr>
                  <th class="text-center">No</th>
                  <th class="text-center">E Sertifikat</th>
                  <th class="text-center">Tanggal Kalibrasi</th>
                  <th class="text-center">ED Kalibrasi</th>
                  <th class="text-center">Status Sertif</th>
                </tr>
              </thead>
              <tbody id="v-detail"></tbody>
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
        var id_prc_master_barang = $(event.relatedTarget).data('id_prc_master_barang')
        var kode_alat = $(event.relatedTarget).data('kode_barang')
        var nama_alat = $(event.relatedTarget).data('nama_barang')
        console.log(id_prc_master_barang)

        $(this).find('#v-kode_alat').val(kode_alat)
        $(this).find('#v-nama_alat').val(nama_alat)

        $.ajax({
        url: "<?= base_url('lab/Alat_kalibrasi/detail_kalibrasi') ?>",
        type: "POST",
        data: {
          id_prc_master_barang: id_prc_master_barang
        },
        dataType: "json",
        success: function(res) {
          console.log(res)
          // res.forEach(row => {

          // });
        }
      });
      })
    })
  </script>

  <!-- Modal Edit-->
  <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Alat Kalibrasi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post" action="<?= base_url() ?>lab/Alat_kalibrasi/update">
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="kode_alat">Kode Alat</label>
                  <input type="hidden" id="e-id_kalibrasi" name="id_kalibrasi">
                  <input type="text" class="form-control" id="e-kode_alat" name="kode_alat" placeholder="Kode Alat" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="nama_alat">Nama Alat</label>
                  <input type="text" class="form-control" id="e-nama_alat" name="nama_alat" placeholder="Nama Alat" autocomplete="off" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="no_sertif">No Sertif</label>
                  <input type="text" class="form-control" id="e-no_sertif" name="no_sertif" placeholder="No Sertifikat" autocomplete="off" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="tgl_kalibrasi">Tanggal Kalibrasi</label>
                  <?php
                  if ($jabatan === "supervisor") { ?>
                    <input type="text" class="form-control datepicker" id="e-tgl_kalibrasi" name="tgl_kalibrasi" placeholder="Tanggal Kalibrasi" autocomplete="off" required>
                  <?php } else { ?>
                    <input type="text" class="form-control" id="e-tgl_kalibrasi" name="tgl_kalibrasi" placeholder="Tanggal Kalibrasi" autocomplete="off" readonly>
                  <?php } ?>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="ed_kalibrasi">E.D Kalibrasi</label>
                  <?php if ($jabatan === "supervisor") { ?>
                    <input type="text" class="form-control datepicker" id="e-ed_kalibrasi" name="ed_kalibrasi" placeholder="E.D Kalibrasi" autocomplete="off" required>
                  <?php } else { ?>
                    <input type="text" class="form-control" id="e-ed_kalibrasi" name="ed_kalibrasi" placeholder="E.D Kalibrasi" autocomplete="off" readonly>
                  <?php } ?>
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
</div>
<script type="text/javascript">
  $(document).ready(function() {
    $('#edit').on('show.bs.modal', function(event) {
      var id_kalibrasi = $(event.relatedTarget).data('id_kalibrasi')
      var kode_alat = $(event.relatedTarget).data('kode_alat')
      var nama_alat = $(event.relatedTarget).data('nama_alat')
      var no_sertif = $(event.relatedTarget).data('no_sertif')
      var tgl_kalibrasi = $(event.relatedTarget).data('tgl_kalibrasi')
      var ed_kalibrasi = $(event.relatedTarget).data('ed_kalibrasi')

      $(this).find('#e-id_kalibrasi').val(id_kalibrasi)
      $(this).find('#e-kode_alat').val(kode_alat)
      $(this).find('#e-nama_alat').val(nama_alat)
      $(this).find('#e-no_sertif').val(no_sertif)
      $(this).find('#e-tgl_kalibrasi').val(tgl_kalibrasi)
      $(this).find('#e-ed_kalibrasi').val(ed_kalibrasi)

      var jabatan = "<?= $jabatan ?>"
      if (jabatan === "supervisor") {
        $(this).find('#e-ed_kalibrasi').datepicker().on('show.bs.modal', function(event) {
          // prevent datepicker from firing bootstrap modal "show.bs.modal"
          event.stopPropagation();
        });
        $(this).find('#e-tgl_kalibrasi').datepicker().on('show.bs.modal', function(event) {
          // prevent datepicker from firing bootstrap modal "show.bs.modal"
          event.stopPropagation();
        });
      }
    });
  })
</script>