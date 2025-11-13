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
                                    <li class="breadcrumb-item"><a href="<?= base_url('administrator/acc/acc_supervisor') ?>">Acc Supervisor</a></li>
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
                                        <h5>Data Acc Supervisor</h5>
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
                                                            <td>
                                                            <span style="cursor: pointer;"
                                                                class="badge badge-primary"
                                                                data-toggle="modal"
                                                                data-target="#detail"
                                                                data-no_ppb="<?= $k['no_ppb'] ?>"
                                                                data-departement="<?= $k['departement'] ?>"
                                                                data-jenis_form_ppb="<?= $k['jenis_form_ppb']?>"
                                                                data-jenis_ppb="<?= $k['jenis_ppb']?>"
                                                                data-tgl_ppb="<?= $tgl_ppb ?>"
                                                                data-tgl_pakai="<?= $tgl_pakai ?>"
                                                                data-ket="<?= $k['ket']?>"
                                                                >
                                                                <?= $k['no_ppb'] ?>
                                                            </span>
                                                        </td>
                                                            <td><?= $tgl_ppb ?></td>
                                                            <td><?= $k['jenis_ppb'] ?></td>
                                                            <td><?= $k['status'] ?></td>
                                                            <td class="text-center">
                                                                <?php if ($level === "admin") { ?>
                                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                                        <button type="button" class="btn btn-info btn-square btn-sm" 
                                                                        data-toggle="modal" 
                                                                        data-target="#edit"
                                                                        data-no_ppb="<?= $k['no_ppb'] ?>"
                                                                        data-departement="<?= $k['departement'] ?>"
                                                                        data-jenis_form_ppb="<?= $k['jenis_form_ppb']?>"
                                                                        data-jenis_ppb="<?= $k['jenis_ppb']?>"
                                                                        data-tgl_ppb="<?= $tgl_ppb ?>"
                                                                        data-tgl_pakai="<?= $tgl_pakai ?>"
                                                                        data-ket="<?= $k['ket']?>"
                                                                        >
                                                                            <i class="feather icon-edit-2"></i>Approval
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
    $(document).ready(function(){
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
      var filter_tgl = $('#filter_tgl').val       ();
      var filter_tgl2 = $('#filter_tgl2').val();
      if (filter_tgl == '' || filter_tgl2 == '') {
        alert('Pilih kedua tanggal untuk melihat data.');
      } else {    
        window.location.href = "<?= base_url() ?>Account/Account_ppbfilter_tg=" + filter_tgl + "&filter_tgl2=" + filter_tgl2;
      }
    });
  });
</script>

<!-- Modal Details -->
<div class="modal fade" id="detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Accounting PPB</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>M_accounting/M_accounting_ppb/">

        <div class="modal-body">
          <div class="row">
          <div class="col-md-3">
              <div class="form-group">
                <label for="v-jenis_ppb">Jenis PPB</label>
                <input type="text" class="form-control" id="v-jenis_ppb" name="jenis_ppb" placeholder="Budget/Non-budget" readonly>
              </div>
            </div>
          <div class="col-md-3">
              <div class="form-group">
                <label for="v-form_ppb">Form A/C</label>
                <input type="text" class="form-control" id="v-form_ppb" name="form_ppb" placeholder="Form A/C" readonly>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="v-departement">Departement</label>
                <input type="text" class="form-control" id="v-departement" name="v-departement" placeholder="Departement" maxlength="20" readonly>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="v-no_ppb_accounting">No PPB</label>
                <input type="text" class="form-control" id="v-no_ppb_accounting" name="no_ppb_accounting" placeholder="No PPB" readonly>
              </div>
            </div>
            <div class="col-md-3">
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
                  <th class="text-right">Jumlah</th>
                  <th class="text-right">Stok</th>
                  
                  
                </tr>
              </thead>
              <tbody id="v-ppb_barang_det">
              </tbody>
            </table>
          </div>
        </div>
        <div class="modal-body">
          <div class="row">
          <div class="col-md-3">
              <div class="form-group">
                <label for="v-tgl_pakai">Tanggal Kebutuhan</label>
                <input type="text" class="form-control" id="v-tgl_pakai" name="tgl_pakai" placeholder="Tanggal Kebutuhan" readonly>
              </div>
            </div>
          
          <div class="col-md-3">
              <div class="form-group">
                <label for="v-ket">Keterangan</label>
                <input type="text" class="form-control" id="v-ket" name="ket" placeholder="Keterangan" readonly>
              </div>
          </div>
          <div class="col-md-3">
              <div class="form-group">
                <label for="v-nama_admin">Nama Admin</label>
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
      var form_ppb = $(event.relatedTarget).data('jenis_form_ppb')
      var departement = $(event.relatedTarget).data('departement')
      var no_ppb_accounting = $(event.relatedTarget).data('no_ppb')
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
      $(this).find('#v-no_ppb_accounting').val(no_ppb_accounting)
      $(this).find('#v-tgl_ppb').val(tgl_ppb)
      $(this).find('#v-tgl_pakai').val(tgl_pakai)
      $(this).find('#v-ket').val(ket)
      $(this).find('#v-nama_admin').val(nama_admin)
      $(this).find('#v-nama_spv').val(nama_spv)
      $(this).find('#v-nama_manager').val(nama_manager)
      $(this).find('#v-nama_pm').val(nama_pm)
      $(this).find('#v-nama_direktur').val(nama_direktur)
      jQuery.ajax({
        url: "<?= base_url() ?>ppb/ppb/data_ppb_barang",
        dataType: 'json',
        type: "post",
        data: {
          no_ppb: no_ppb_accounting
        },
        success: function(response) {
          var data = response;
          var $id = $('#v-ppb_barang_det');
          $id.empty();
          for (var i = 0; i < data.length; i++) {
            // var exp = data[i].exp.split("-")[2] + "/" + data[i].exp.split("-")[1] + "/" + data[i].exp.split("-")[0]
            // var mfg = data[i].mfg.split("-")[2] + "/" + data[i].mfg.split("-")[1] + "/" + data[i].mfg.split("-")[0]
            $id.append(`
              <tr>
                <td>` + data[i].kode_barang + `</td>
                <td>` + data[i].nama_barang + `</td>
                <td>` + data[i].spek + `</td>
                
                <td class="text-right">` + data[i].jumlah_ppb + "&nbsp" + data[i].satuan + `</td>
                <td class="text-right">` + data[i].stok + "&nbsp"   + `</td>
                
              </tr>
            `);
          }
        }
      });
    })
  })
</script>
<!-- Modal Edit -->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Approval PPB</h5>
        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
      </div>

      <form method="post" action="<?= base_url('ppb/ppb/update') ?>">
        <div class="modal-body">

          <!-- ===== INFO UMUM ===== -->
          <div class="row">
            <div class="col-md-3">
              <label>Budget/Non Budget</label>
              <input class="form-control" id="e-jenis_ppb" name="jenis_ppb" readonly>
            </div>
            <div class="col-md-3">
              <label>Form A/C</label>
              <input class="form-control" id="e-form_ppb" name="form_ppb" readonly>
            </div>
            <div class="col-md-3">
              <label>Departement</label>
              <input type="text" class="form-control" id="e-departement" name="departement" readonly>
            </div>
            <div class="col-md-3">
              <label>No PPB</label>
              <input type="text" class="form-control" id="e-no_ppb" name="no_ppb" readonly>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                  <label for="tgl_ppb">Tanggal PPB</label>
                  <input type="text" class="form-control" id="e-tgl_ppb" name="tgl_ppb" placeholder="Tanggal PPB" autocomplete="off" readonly>
                </div>
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
                </tr>
              </thead>
              <tbody id="e-ppb_barang_det"></tbody>
            </table>
          </div>

          <!-- ===== INFO TAMBAHAN ===== -->
          <div class="row mt-3">
            <div class="col-md-3">
              <label>Tanggal Kebutuhan</label>
              <input type="text" class="form-control" id="e-tgl_pakai" name="tgl_pakai" readonly>
            </div>
            <div class="col-md-3">
              <label>Keterangan</label>
              <input type="text" class="form-control" id="e-ket" name="ket" readonly>
            </div>
            <div class="col-md-3">
              <label>Nama Admin</label>
              <input type="text" class="form-control" id="e-nama_admin" name="nama_admin" value="<?= $this->session->userdata("nama_operator") ?>" readonly>
            </div>
          </div>
          
          <!-- <center class="mt-3"><span style="font-family: italy;">Approval</span></center> -->
          <div class="row mt-4">
            <div class="col-md-3">
              <label>Approved</label>
            <input class="form-control" id="approved" name="approved" value="Approved" readonly> 
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
    modal.find('#e-tgl_ppb').val(tgl_ppb);
    modal.find('#e-tgl_pakai').val(tgl_pakai);
    modal.find('#e-ket').val(ket);

    var $tbody = modal.find('#e-ppb_barang_det');
    $tbody.empty();

    $.ajax({
      url: "<?= base_url('ppb/ppb/data_ppb_barang') ?>",
      type: "POST",
      dataType: "json",
      data: { no_ppb: no_ppb },
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
        <td>${kode}</td>
        <td>${nama}</td>
        <td>${spek}</td>
        <td><inp>${satuan}</td>
        <td><input type="hidden" clas>${jumlah}</td>
        <td>${stok}</td>
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


