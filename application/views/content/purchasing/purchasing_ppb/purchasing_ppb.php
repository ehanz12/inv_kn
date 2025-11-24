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
                  <!-- <h5 class="m-b-10">Data Barang Masuk</h5> -->
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="feather icon-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="javascript:">Purchasing</a></li>
                  <li class="breadcrumb-item"><a href="javascript:">Purchasing PPB</a></li>
                  <li class="breadcrumb-item"><a href="<?= base_url('Purchasing/Purchasing_ppb') ?>">PPB</a></li>
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
                    <h5>Data PPB</h5>
                    <div class="float-right">
                      <div class="input-group">
                        <input type="text" id="filter_tgl" value="<?= $tgl == null ? '' : $tgl ?>" class="form-control datepicker" placeholder="Filter Dari Tanggal" autocomplete="off" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <input type="text" id="filter_tgl2" value="<?= $tgl2 == null ? '' : $tgl2 ?>" class="form-control datepicker" placeholder="Filter Sampai Tanggal" autocomplete="off" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="btn-group">
                          <button class="btn btn-secondary btn-sm" id="lihat" type="button">Lihat</button>
                        </div>
                        <div class="btn-group">
                          <a href="<?= base_url() ?>Purchasing/Purchasing_ppb" style="width: 40px;" class="btn btn-warning" id="export" type="button"><i class="feather icon-refresh-ccw"></i></a>
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
                            <th>#</th>
                            <th>Tanggal</th>
                            <th>No PPB</th>
                            <th class="text-center">Departement</th>
                            <th class="text-center">Detail</th>
                            <th class="text-center">Status</th> <!-- Kolom baru untuk approval -->
                            <th class="text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $level = $this->session->userdata('departement');
                          $jabatan = $this->session->userdata('jabatan');
                          $no = 1;
                          foreach ($result as $k) {
                            $tgl_ppb =  explode('-', $k['tgl_ppb'])[2] . "/" . explode('-', $k['tgl_ppb'])[1] . "/" . explode('-', $k['tgl_ppb'])[0];
                            $tgl_pakai =  explode('-', $k['tgl_pakai'])[2] . "/" . explode('-', $k['tgl_pakai'])[1] . "/" . explode('-', $k['tgl_pakai'])[0];
                          ?>
                            <tr>
                              <th scope="row"><?= $no++ ?></th>
                              <td><?= $tgl_ppb ?></td>
                              <td><?= $k['no_ppb'] ?></td>
                              <td class="text-center"><?= $k['departement'] ?></td>

                              <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <button type="button" class="btn btn-info btn-square btn-sm" data-toggle="modal" data-target="#detail"
                                    data-no_ppb="<?= $k['no_ppb'] ?>" ,
                                    data-departement="<?= $k['departement'] ?>" ,
                                    data-form_ppb="<?= $k['jenis_form_ppb'] ?>" ,
                                    data-jenis_ppb="<?= $k['jenis_ppb'] ?>" ,
                                    data-tgl_ppb="<?= $tgl_ppb ?>" ,
                                    data-tgl_pakai="<?= $tgl_pakai ?>" ,
                                    data-ket="<?= $k['ket'] ?>" ,>
                                    <i class="feather icon-eye"></i>Details
                                  </button>
                                </div>
                              </td>

                              <td class="text-center">
                                <?= $k['status'] === 'selesai' ? '<span class="badge badge-success">Selesai</span>' : '<span class="badge badge-warning">Proses</span>'; ?>
                              </td>

                              <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <a type="button" class="btn btn-success btn-square btn-sm text-light" onclick="window.open(`<?= base_url() ?>accounting/accounting_ppb/pdf_cetak/<?= str_replace('/', '--', $k['no_ppb']) ?>`, 'location=yes,height=700,width=1300,scrollbars=yes,status=yes'); "
                                    data-id_prc_ppb_tf="<?= $k['id_prc_ppb_tf'] ?>"
                                    data-form_ppb="<?= $k['jenis_form_ppb'] ?>"
                                    data-jenis_ppb="<?= $k['jenis_ppb'] ?>"
                                    data-tgl_ppb="<?= $k['tgl_ppb'] ?>"
                                    data-tgl_pakai="<?= $k['tgl_pakai'] ?>"
                                    data-ket="<?= $k['ket'] ?>">
                                    <i class="feather icon-file"></i>Cetak
                                  </a>
                                </div>


                                <?php if ($level === "admin" && $k['acc_spv'] !== "Approved" && $k['acc_manager'] !== "Approved" && $k['acc_pm'] !== "Approved") { ?>
                                  <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-primary btn-square btn-sm" data-toggle="modal" data-target="#edit"
                                      data-no_ppb="<?= $k['no_ppb'] ?>"
                                      data-departement="<?= $k['departement'] ?>"
                                      data-form_ppb="<?= $k['jenis_form_ppb'] ?>"
                                      data-jenis_ppb="<?= $k['jenis_ppb'] ?>"
                                      data-tgl_ppb="<?= $tgl_ppb ?>"
                                      data-tgl_pakai="<?= $tgl_pakai ?>"
                                      data-ket="<?= $k['ket'] ?>">
                                      <i class="feather icon-edit-2"></i>Edit
                                    </button>
                                  </div>
                                  <div class="btn-group" role="group" aria-label="Basic example">
                                    <a type="button" class="btn btn-danger btn-square text-light btn-sm" href="<?= base_url() ?>Accounting/Accounting_ppb/delete/<?= str_replace('/', '--', $k['no_ppb']) ?>" onclick="if (! confirm('Apakah Anda Yakin?')) { return false; }">
                                      <i class="feather icon-trash-2"></i>Delete
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
  $('#lihat').click(function() {
    var filter_tgl = $('#filter_tgl').val();
    var filter_tgl2 = $('#filter_tgl2').val();

    var newFilterTgl = filter_tgl.split("/")[2] + "-" + filter_tgl.split("/")[1] + "-" + filter_tgl.split("/")[0];
    var newFilterTgl2 = filter_tgl2.split("/")[2] + "-" + filter_tgl2.split("/")[1] + "-" + filter_tgl2.split("/")[0];

    if (filter_tgl === '' && filter_tgl2 !== '') {
      window.location = "<?= base_url() ?>purchasing/purchasing_ppb/purchasing_ppb?alert=warning&msg=dari tanggal belum diisi";
      alert("Dari tanggal belum diisi")
    } else if (filter_tgl !== '' && filter_tgl2 === '') {
      window.location = "<?= base_url() ?>purchasing/purchasing_ppb/purchasing_ppb?alert=warning&msg=sampai tanggal belum diisi";
    } else {
      const query = new URLSearchParams({
        date_from: newFilterTgl,
        date_until: newFilterTgl2
      });
      window.location = "<?= base_url() ?>purchasing/purchasing_ppb/purchasing_ppb/index?" + query.toString();
    }
  });
</script>




<!-- Modal Details -->
<div class="modal fade" id="detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Data PPB</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>M_accounting/M_accounting_ppb/">

        <div class="modal-body">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="v-jenis_ppb">Jenis PPB</label>
                <input type="text" class="form-control" id="v-jenis_ppb" name="jenis_ppb" placeholder="Budget/Non-budget" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="v-form_ppb">Form A/C</label>
                <input type="text" class="form-control" id="v-form_ppb" name="form_ppb" placeholder="Form A/C" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="v-departement">Departement</label>
                <input type="text" class="form-control" id="v-departement" name="v-departement" placeholder="Departement" maxlength="20" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="v-no_ppb">No PPB</label>
                <input type="text" class="form-control" id="v-no_ppb" name="no_ppb" placeholder="No PPB" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="v-tgl_ppb">Tanggal PPB</label>
                <input type="text" class="form-control" id="v-tgl_ppb" name="tgl_ppb" placeholder="Tanggal PPB" readonly>
              </div>
            </div>

            <div class="col-md-6">
            </div>
          </div>
          <div class="table-responsive">
            <table class="table table-bordered table-sm">
              <thead>
                <tr>
                  <th>Kode Barang</th>
                  <th>Nama Barang</th>
                  <th>Spek</th>
                  <th>Nama Supplier</th>
                  <th class="text-right">Jumlah</th>
                </tr>
              </thead>
              <tbody id="v-ppb_barang">
              </tbody>
            </table>
          </div>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="v-tgl_pakai">Tanggal Kebutuhan</label>
                <input type="text" class="form-control" id="v-tgl_pakai" name="tgl_pakai" placeholder="Tanggal Kebutuhan" readonly>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="v-ket">Keterangan</label>
                <input type="text" class="form-control" id="v-ket" name="ket" placeholder="Keterangan" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="v-nama_admin">Prc Admin</label>
                <input type="text" class="form-control" id="v-nama_admin" name="nama_admin" placeholder="Admin" readonly>
              </div>
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
    $('#detail').on('show.bs.modal', function(event) {
      var jenis_ppb = $(event.relatedTarget).data('jenis_ppb')
      var form_ppb = $(event.relatedTarget).data('form_ppb')
      var departement = $(event.relatedTarget).data('departement')
      var no_ppb = $(event.relatedTarget).data('no_ppb')
      var tgl_ppb = $(event.relatedTarget).data('tgl_ppb')
      var tgl_pakai = $(event.relatedTarget).data('tgl_pakai')
      var ket = $(event.relatedTarget).data('ket')
      var nama_admin = $(event.relatedTarget).data('nama_admin')
      var nama_spv = $(event.relatedTarget).data('nama_spv')
      var nama_manager = $(event.relatedTarget).data('nama_manager')
      var nama_pm = $(event.relatedTarget).data('nama_pm')
      var nama_direktur = $(event.relatedTarget).data('nama_direktur')

      $(this).find('#v-jenis_ppb').val(jenis_ppb)
      $(this).find('#v-form_ppb').val(form_ppb)
      $(this).find('#v-departement').val(departement)
      $(this).find('#v-no_ppb').val(no_ppb)
      $(this).find('#v-tgl_ppb').val(tgl_ppb)
      $(this).find('#v-tgl_pakai').val(tgl_pakai)
      $(this).find('#v-ket').val(ket)
      $(this).find('#v-nama_admin').val(nama_admin)
      $(this).find('#v-nama_spv').val(nama_spv)
      $(this).find('#v-nama_manager').val(nama_manager)
      $(this).find('#v-nama_pm').val(nama_pm)
      $(this).find('#v-nama_direktur').val(nama_direktur)

      jQuery.ajax({
        url: "<?= base_url() ?>purchasing/purchasing_ppb/purchasing_ppb/data_ppb_barang",
        dataType: 'json',
        type: "post",
        data: {
          no_ppb: no_ppb
        },
        success: function(response) {
          var data = response;
          var $id = $('#v-ppb_barang');
          $id.empty();

          for (var i = 0; i < data.length; i++) {
            $id.append(`
              <tr>
                <td>` + data[i].kode_barang + `</td>
                <td>` + data[i].nama_barang + `</td>
                <td>` + data[i].spek + `</td>
                <td>` + data[i].nama_supplier + `</td> 
                <td class="text-right">` + data[i].jumlah_ppb + "&nbsp" + data[i].satuan + `</td>
              </tr>
            `);
          }
        }
      });
    });
  });
</script>