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
                  <li class="breadcrumb-item"><a href="javascript:">Gudang Bahan Baku</a></li>
                  <li class="breadcrumb-item"><a href="javascript:">Kelola Barang</a></li>
                  <li class="breadcrumb-item"><a href="javascript:">Permintaan Barang Gudang</a></li>
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
                    <h5>Data Permintaan Barang Gudang</h5>
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
                            <th>Tanggal Keluar</th>
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
                            if($k['tgl_setuju'] != null) {
                              $tgl_setuju =  explode('-', $k['tgl_setuju'])[2] . "/" . explode('-', $k['tgl_setuju'])[1] . "/" . explode('-', $k['tgl_setuju'])[0];
                            }else {
                              $tgl_setuju = "-";
                            }
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
                                  data-tgl_setuju="<?= $tgl_setuju ?>" 
                                  data-nama_operator="<?= $k['nama_operator'] ?>" 
                                  >
                                    <i class="feather icon-eye"></i>Detail
                                  </button>
                                </div>
                              </td>
                              <td class="text-center">
                                <?php if ($jabatan === "supervisor" || $jabatan === "admin") { ?>
                                  <?php if ($k['status'] === "Proses") { ?>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                      <button type="button" class="btn btn-primary btn-square btn-sm" data-toggle="modal" data-target="#disetujui" 
                                      data-no_urut="<?= $k['no_urut'] ?>" 
                                      data-tgl_permintaan="<?= $tgl ?>" 
                                      data-nama_operator="<?= $k['nama_operator'] ?>" 
                                      >
                                        <i class=" feather icon-edit-2"></i>DiSetujui
                                      </button>
                                    </div>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                      <button type="button" class="btn btn-danger btn-square btn-sm" data-toggle="modal" data-target="#tidakdisetujui" 
                                      data-no_urut="<?= $k['no_urut'] ?>"
                                      data-tgl_permintaan="<?= $tgl ?>" 
                                      data-nama_operator="<?= $k['nama_operator'] ?>" 
                                      >
                                        <i class=" feather icon-edit-2"></i>Tidak DiSetujui
                                      </button>
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
<!-- Modal -->


<div class="modal fade" id="disetujui" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">DiSetujui Permintaan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>gudang_bahanbaku/permintaan_barang_gudang/disetujui">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="s-no_urut">No Urut</label>
                <input type="text" class="form-control" id="s-no_urut" name="no_urut" placeholder="No Surat Jalan" maxlength="20" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="tgl_permintaan">Tanggal Permintaan</label>
                <input type="text" class="form-control" id="s-tgl_permintaan" name="tgl_permintaan" placeholder="Tanggal Keluar" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="s-nama_operator">Nama Operator</label>
                <input type="text" class="form-control" id="s-nama_operator" name="nama_operator" placeholder="No Surat Jalan" maxlength="20" readonly>
              </div>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table table-bordered table-sm">
              <thead>
                <tr>
                  <th>No Batch</th>
                  <th>Nama Barang</th>
                  <th>Nama Supplier</th>
                  <th class="text-center">Qty</th>
                </tr>
              </thead>
              <tbody id="s-insert_table">
              </tbody>
            </table>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="tgl_setuju" class="mt-2 font-weight-bold">Tanggal DiSetujui</label><br>
              <input type="text" class="form-control datepicker" id="tgl_setuju" name="tgl_setuju" placeholder="Tanggal DiSetujui" autocomplete="off" required>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" id="simpan" class="btn btn-success" onclick="if (! confirm('Apakah Anda Yakin Untuk Menyimpan Data Ini? Tolong Untuk Di Check Kembali. Dan Jangan Lupa Untuk Menginputkan Tanggalnya')) { return false; }">DiSetujui</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('#disetujui').on('show.bs.modal', function(event) {
      var no_urut = $(event.relatedTarget).data('no_urut')
      var tgl_permintaan = $(event.relatedTarget).data('tgl_permintaan')
      var nama_operator = $(event.relatedTarget).data('nama_operator')


      $(this).find('#s-no_urut').val(no_urut)
      $(this).find('#s-tgl_permintaan').val(tgl_permintaan)
      $(this).find('#s-nama_operator').val(nama_operator)
      // $(this).find('#v-exp').val(exp)
      $(this).find('#tgl_setuju').datepicker({
        autoclose: true,
        format: "dd/mm/yyyy"
      }).on('show.bs.modal', function(event) {
        event.stopPropagation();
      });
      $.ajax({
        url: "<?= base_url('melting/permintaan_barang_melting/get_by_no_urut') ?>",
        type: "POST",
        data: {
          no_urut: no_urut
        },
        dataType: "json",

        success: function(data) {
          console.log(data)
          $('#s-insert_table').empty();

          $.each(data, function(i, item) {

            $("#s-insert_table").append(`
                        <tr>
                            <input type="hidden" name="id_prc_master_barang[]" value="${item.id_prc_master_barang}">
                            <input type="hidden" name="id_adm_bm[]" value="${item.id_adm_bm}">
                            <input type="hidden" name="jml_masuk[]" value="${item.jml_permintaan}">
                            <td>${item.no_batch}</td>
                            <td>${item.nama_barang}</td>
                            <td>${item.nama_supplier}</td>
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

<div class="modal fade" id="tidakdisetujui" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tidak DiSetujui Permintaan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>gudang_bahanbaku/Permintaan_barang_gudang/ditolak">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="d-no_urut">No Urut</label>
                <input type="text" class="form-control" id="d-no_urut" name="no_urut" placeholder="No Surat Jalan" maxlength="20" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="tgl_permintaan">Tanggal Permintaan</label>
                <input type="text" class="form-control" id="d-tgl_permintaan" name="tgl_permintaan" placeholder="Tanggal Keluar" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="d-nama_operator">Nama Operator</label>
                <input type="text" class="form-control" id="d-nama_operator" name="nama_operator" placeholder="No Surat Jalan" maxlength="20" readonly>
              </div>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table table-bordered table-sm">
              <thead>
                <tr>
                  <th>No Batch</th>
                  <th>Nama Barang</th>
                  <th>Nama Supplier</th>
                  <th class="text-center">Qty</th>
                </tr>
              </thead>
              <tbody id="d-insert_table">
              </tbody>
            </table>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="tgltdksetuju" class="mt-2 font-weight-bold">Tanggal Tidak DiSetujui</label><br>
              <input type="text" class="form-control datepicker" id="tgl_tdksetuju" name="tgl_tdksetuju" placeholder="Tanggal Tidak DiSetujui" autocomplete="off" required>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" id="simpan" class="btn btn-danger" onclick="if (! confirm('Apakah Anda Yakin Untuk Menyimpan Data Ini? Tolong Untuk Di Check Kembali. Dan Jangan Lupa Untuk Menginputkan Tanggalnya')) { return false; }">Tidak DiSetujui</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('#tidakdisetujui').on('show.bs.modal', function(event) {
      var no_urut = $(event.relatedTarget).data('no_urut')
      var tgl_permintaan = $(event.relatedTarget).data('tgl_permintaan')
      var nama_operator = $(event.relatedTarget).data('nama_operator')
      // var exp = $(event.relatedTarget).data('exp') 


      $(this).find('#d-no_urut').val(no_urut)
      $(this).find('#d-tgl_permintaan').val(tgl_permintaan)
      $(this).find('#d-nama_operator').val(nama_operator)
      // $(this).find('#v-exp').val(exp)
      $(this).find('#tgl_tdksetuju').datepicker({
        autoclose: true,
        format: "dd/mm/yyyy"
      }).on('show.bs.modal', function(event) {
        event.stopPropagation();
      });
      $.ajax({
        url: "<?= base_url('melting/permintaan_barang_melting/get_by_no_urut') ?>",
        type: "POST",
        data: {
          no_urut: no_urut
        },
        dataType: "json",

        success: function(data) {
          console.log(data)
          $('#d-insert_table')
          $.each(data, function(i, item) {

            $("#d-insert_table").append(`
                        <tr>
                            <td>${item.no_batch}</td>
                            <td>${item.nama_barang}</td>
                            <td>${item.nama_supplier}</td>
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


<div class="modal fade" id="view" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Permintaan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>gudang_bahanbaku/permintaan_barang_gudang/disetujui">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="s-no_urut">No Urut</label>
                <input type="text" class="form-control" id="v-no_urut" name="no_urut" placeholder="No Surat Jalan" maxlength="20" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="tgl_permintaan">Tanggal Permintaan</label>
                <input type="text" class="form-control" id="v-tgl_permintaan" name="tgl_permintaan" placeholder="Tanggal Keluar" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="s-nama_operator">Nama Operator</label>
                <input type="text" class="form-control" id="v-nama_operator" name="nama_operator" placeholder="No Surat Jalan" maxlength="20" readonly>
              </div>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table table-bordered table-sm">
              <thead>
                <tr>
                  <th>No Batch</th>
                  <th>Nama Barang</th>
                  <th>Nama Supplier</th>
                  <th class="text-center">Qty</th>
                </tr>
              </thead>
              <tbody id="v-insert_table">
              </tbody>
            </table>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="tgl_setuju" class="mt-2 font-weight-bold">Tanggal DiSetujui</label><br>
              <input type="text" class="form-control datepicker" id="v-tgl_setuju" name="tgl_setuju" placeholder="Tanggal DiSetujui" autocomplete="off" readonly>
            </div>
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
      var tgl_permintaan = $(event.relatedTarget).data('tgl_permintaan')
      var nama_operator = $(event.relatedTarget).data('nama_operator')
      var tgl_setuju = $(event.relatedTarget).data('tgl_setuju')

      $(this).find('#v-tgl_setuju').val(tgl_setuju)
      $(this).find('#v-no_urut').val(no_urut)
      $(this).find('#v-tgl_permintaan').val(tgl_permintaan)
      $(this).find('#v-nama_operator').val(nama_operator)
      // $(this).find('#v-exp').val(exp)
     
      $.ajax({
        url: "<?= base_url('melting/permintaan_barang_melting/get_by_no_urut') ?>",
        type: "POST",
        data: {
          no_urut: no_urut
        },
        dataType: "json",

        success: function(data) {
          console.log(data)
          $('#v-insert_table').empty();

          $.each(data, function(i, item) {

            $("#v-insert_table").append(`
                        <tr>
                            <input type="hidden" name="id_prc_master_barang[]" value="${item.id_prc_master_barang}">
                            <input type="hidden" name="id_adm_bm[]" value="${item.id_adm_bm}">
                            <input type="hidden" name="jml_masuk[]" value="${item.jml_permintaan}">
                            <td>${item.no_batch}</td>
                            <td>${item.nama_barang}</td>
                            <td>${item.nama_supplier}</td>
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