

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
                  <li class="breadcrumb-item"><a href="<?= base_url('Marketing/Capsule_request/Marketing_cr') ?>">Capsule Request</a></li>
                  <li class="breadcrumb-item"><a href="<?= base_url('Marketing/Capsule_request/Capsule_request') ?>">No CR</a></li>
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
                    <h5>Data Capsule Request</h5>

                    <div class="btn-group">
                      <button type="button" class="btn btn-dark btn-outline-warning btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Sort
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?= base_url('marketing/Capsule_request/Marketing_cr') ?>">NO MCR</a>
                        <a class="dropdown-item" href="<?= base_url('marketing/Capsule_request/Capsule_request') ?>">NO CR</a>
                      </div>
                    </div><br>
                  </div>

                  <div class="card-block table-border-style">
                    <?php
                    // print_r($result);
                    ?>
                    <div class="table-responsive">
                      <table class="table datatable table-hover table-striped table-sm">
                        <thead>
                          <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">No CR</th>
                            <th class="text-center">No MCR</th>
                            <th class="text-center">Tanggal</th>
                            <th class="text-center">Nama Customer</th>
                            <th class="text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $no = 1;
                          foreach ($result as $k) {
                            $tgl_cr =  explode('-', $k['tgl_cr'])[2] . "/" . explode('-', $k['tgl_cr'])[1] . "/" . explode('-', $k['tgl_cr'])[0];
                          ?>
                            <tr>
                              <th scope="row" class="text-center"><?= $no++ ?></th>
                              <td class="text-center"><?= $k['no_cr'] ?></td>
                              <td class="text-center"><?= $k['no_mcr'] ?></td>
                              <td class="text-center"><?= $tgl_cr ?></td>
                              <td class="text-center"><?= $k['nama_customer'] ?></td>
                              <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <button style="margin-right: 5px;" type="button" class="btn btn-info btn-square btn-sm" data-toggle="modal" data-target="#view" data-id_cr="<?= $k['id_cr'] ?>" ; data-tgl_cr="<?= $tgl_cr ?>" data-no_cr="<?= $k['no_cr'] ?>" data-no_mcr="<?= $k['no_mcr'] ?>" data-nama_customer="<?= $k['nama_customer'] ?>">
                                    <i class="feather icon-eye"></i>Detail
                                  </button>
                                  <a style="margin-left: 5px;" href="<?= base_url() ?>marketing/capsule_request/capsule_request/delete/<?= $k['id_cr'] ?>" class="btn btn-danger btn-square text-light btn-sm" onclick="if (! confirm('Apakah Anda Yakin?')) { return false; }">
                                    <i class="feather icon-trash-2"></i>hapus
                                  </a>
                                </div>
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


<!-- Modal -->
<div class="modal fade" id="view" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Barang Masuk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>barang_masuk/update">
        <input type="hidden" id="e_id_barang_masuk" name="id_barang_masuk">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="v-no_surat_jalan">No Surat Jalan</label>
                <input type="text" class="form-control" id="v-no_surat_jalan" name="v-no_surat_jalan" placeholder="No Surat Jalan" maxlength="20" readonly>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="tgl">Tanggal Keluar</label>
                <input type="text" class="form-control" id="v-tgl" name="tgl" placeholder="Tanggal Keluar" readonly>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="v-nama_customer">Nama Customer</label>
                <input type="text" class="form-control" id="v-nama_customer" name="v-nama_customer" placeholder="No Surat Jalan" maxlength="20" readonly>
              </div>
            </div>
            <div class="col-md-6">
              <!-- <div class="form-group">
              <label for="tgl">Tanggal Kadaluarsa</label>
              <input type="text" class="form-control" id="v-exp" name="exp"  placeholder="Tanggal Kadaluarsa" readonly>
            </div> -->
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="">No. SPPB</label>
                <input type="text" class="form-control" id="v-no_sppb" name="no_sppb" placeholder="No SPPB" readonly>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="">No. PO</label>
                <input type="text" class="form-control" id="v-no_po" name="no_po" placeholder="No PO" readonly>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="v-note">Keterangan</label>
                <textarea class="form-control" id="v-note" name="note" rows="3" readonly></textarea>
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
                  <th class="text-right">Qty</th>
                  <th class="text-right">Kadaluarsa</th>
                </tr>
              </thead>
              <tbody id="v-barang_keluar">
              </tbody>
            </table>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <!-- <button type="submit" class="btn btn-info">Update</button> -->
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('#view').on('show.bs.modal', function(event) {
      var no_surat_jalan = $(event.relatedTarget).data('no_surat_jalan')
      var l_no_surat_jalan = $(event.relatedTarget).data('l-no_surat_jalan')
      var tgl = $(event.relatedTarget).data('tgl')
      var nama_customer = $(event.relatedTarget).data('nama_customer')
      // var exp = $(event.relatedTarget).data('exp') 
      var note = $(event.relatedTarget).data('note')
      var no_sppb = $(event.relatedTarget).data('no_sppb')
      var no_po = $(event.relatedTarget).data('no_po')



      $(this).find('#v-no_surat_jalan').val(no_surat_jalan)
      $(this).find('#v-tgl').val(tgl)
      $(this).find('#v-nama_customer').val(nama_customer)
      // $(this).find('#v-exp').val(exp)
      $(this).find('#v-note').val(note)
      $(this).find('#v-no_sppb').val(no_sppb)
      $(this).find('#v-no_po').val(no_po)
      jQuery.ajax({
        url: "<?= base_url() ?>barang_keluar/data_barang_keluar",
        dataType: 'json',
        type: "post",
        data: {
          no_surat_jalan: no_surat_jalan
        },
        success: function(response) {
          var data = response;
          // alert(JSON.stringify(data))
          var $id = $('#v-barang_keluar');
          $id.empty();
          // $id.append('<option value=0>- Pilih Prioritas Kegiatan -</option>');
          for (var i = 0; i < data.length; i++) {
            var exp = data[i].exp.split("-")[2] + "/" + data[i].exp.split("-")[1] + "/" + data[i].exp.split("-")[0]
            $id.append(`
              <tr>
                <td>` + data[i].no_batch + `</td>
                <td>` + data[i].nama_barang + `</td>
                <td>` + data[i].nama_suplier + `</td>
                <td class="text-right">` + data[i].qty + data[i].satuan + `</td>
                <td class="text-right">` + exp + `</td>
              </tr>
            `);
          }
        }
      });
      // $(this).find('#e_tgl').datepicker().on('show.bs.modal', function(event) {
      //   // prevent datepicker from firing bootstrap modal "show.bs.modal"
      //   event.stopPropagation();
      // });
    })

  })
</script>