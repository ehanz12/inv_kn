

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

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#add">
                      <i class="feather icon-plus"></i>Tambah CR
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
                            <th class="text-center">#</th>
                            <th class="text-center">No MCR</th>
                            <th class="text-center">Tanggal</th>
                            <th class="text-center">Nama Operator</th>
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
                              <td class="text-center"><?= $k['no_mcr'] ?></td>
                              <td class="text-center"><?= $tgl_cr ?></td>
                              <td class="text-center"><?= $k['nama_operator'] ?></td>
                              <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <button style="margin-right: 5px;" type="button" class="btn btn-info btn-square btn-sm" data-toggle="modal" data-target="#view" data-id_mcr="<?= $k['id_mcr'] ?>" ; data-tgl_cr="<?= $tgl_cr ?>" data-nama_operator="<?= $k['nama_operator'] ?>" data-no_mcr="<?= $k['no_mcr'] ?>">
                                    <i class="feather icon-eye"></i>Detail
                                  </button>
                                  <a style="margin-left: 5px;" href="<?= base_url() ?>Marketing/Capsule_request/Marketing_cr/delete/<?= str_replace('/', '--', $k['no_mcr']) ?>" class="btn btn-danger btn-square text-light btn-sm" onclick="if (! confirm('Apakah Anda Yakin?')) { return false; }">
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


<!-- Modal add -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Capsule Request</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>marketing/capsule_request/marketing_cr/add">
        <div class="modal-body">
          <div class="row">

            <div class="col-md-4">
              <div class="form-group">
                <label for="no_mcr">No. MCR</label>
                <input type="text" class="form-control" id="no_mcr" name="no_mcr" value="O000<?= $no++ ?>/M-CR/I/2024" autocomplete="off" required>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="tgl_cr">Tanggal CR</label>
                <input type="text" class="form-control datepicker" id="tgl_cr" name="tgl_cr" placeholder="Tanggal CR" autocomplete="off" required>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="nama_operator">Nama Operator</label>
                <input type="text" class="form-control" id="nama_operator" name="nama_operator" value="<?= $this->session->userdata('nama_operator') ?>" maxlength="20" readonly>
              </div>
            </div>
          </div>

          <input type="hidden" id="jumlah_cr" name="jumlah_cr" value="1">
          <div class="row">

            <div class="col-2">
              <div class="form-group">
                <label for="no_cr">No CR</label>
                <input type="text" class="form-control" id="no_cr" name="no_cr" placeholder="No CR" autocomplete="off" required>
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label for="size">Size</label>
                <select class="form-control chosen-select" id="size" name="size" autocomplete="off" required>
                  <option value="" disabled selected hidden>- Size -</option>
                  <?php $size = ["00", "0N", "1N", "2N", "3N", "0RL"];
                  foreach ($size as $sz) { ?>
                    <option value="<?= $sz ?>"><?= $sz ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>

            <div class="col-4">
              <div class="form-group">
                <label for="id_customer">Customer</label>
                <select class="form-control chosen-select" id="customer_add" name="customer_add" autocomplete="off" required>
                  <option value="" disabled selected hidden>- Customer -</option>
                  <?php
                  foreach ($res_customer as $rc) {
                  ?>
                    <option value="<?= $rc['id_customer'] ?>,<?= $rc['kode_customer'] ?>,<?= $rc['nama_customer'] ?>"><?= $rc['kode_customer'] ?> | <?= $rc['nama_customer'] ?> </option>
                  <?php
                  }
                  ?>
                </select>
              </div>
            </div>

            <div class="col-2">
              <div class="form-group">
                <label for="id_kw_cap">Warna Cap</label>
                <select class="form-control chosen-select" id="kw_cap_add" name="kw_cap_add" autocomplete="off" required>
                  <option value="" disabled selected hidden>- Warna Cap -</option>
                  <?php
                  foreach ($res_kodewarna_cap as $kwcap) {
                  ?>
                    <option value="<?= $kwcap['id_master_kw_cap'] ?>,<?= $kwcap['kode_warna_cap'] ?>,<?= $kwcap['warna_cap'] ?>"><?= $kwcap['kode_warna_cap'] ?> | <?= $kwcap['warna_cap'] ?> </option>
                  <?php
                  }
                  ?>
                </select>
              </div>
            </div>

            <div class="col-2">
              <div class="form-group">
                <label for="id_kw_body">Warna Body</label>
                <select class="form-control chosen-select" id="kw_body_add" name="kw_body_add" autocomplete="off" required>
                  <option value="" disabled selected hidden>- Warna Body -</option>
                  <?php
                  foreach ($res_kodewarna_body as $kwbody) {
                  ?>
                    <option value="<?= $kwbody['id_master_kw_body'] ?>,<?= $kwbody['kode_warna_body'] ?>,<?= $kwbody['warna_body'] ?>"><?= $kwbody['kode_warna_body'] ?> | <?= $kwbody['warna_body'] ?> </option>
                  <?php
                  }
                  ?>
                </select>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="print">Print</label>
                <input style="width: 17%;" class="form-check-input" id="cek_print" type="checkbox" name="cek_print">
                <!-- <input class="form-control" id="cek_print1" type="text" name="cek_print1"> -->
                <div id="form_print" class="input-group" style="display: none;">
                  <input type="text" class="form-control text-uppercase" id="print" name="print" placeholder="Print" autocomplete="off">
                  <select class="form-control chosen-select" id="tinta" name="tinta" autocomplete="off">
                    <option value="">- Tinta -</option>
                    <option value="H">Hitam</option>
                    <option value="P">Putih</option>
                    <option value="M">Merah</option>
                  </select>
                  <select class="form-control chosen-select" id="gravurol" name="gravurol" autocomplete="off">
                    <option value="">- Grav -</option>
                    <option value="Radial">Radial</option>
                    <option value="Axial">Axial</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="col-2">
              <div class="form-group">
                <label for="qty_cr">Qty</label>
                <input type="text" class="form-control" id="qty_cr" name="qty_cr" placeholder="QTY" autocomplete="off" required>
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label for="jenis_box">Box</label>
                <select class="form-control chosen-select" id="jenis_box" name="jenis_box" autocomplete="off" required>
                  <option value="" disabled selected hidden>- Box -</option>
                  <?php $box = ["C2", "D1", "D2"];
                  foreach ($box as $bx) { ?>
                    <option value="<?= $bx ?>"><?= $bx ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label for="jenis_zak">ZAK</label>
                <select class="form-control chosen-select" id="jenis_zak" name="jenis_zak" autocomplete="off" required>
                  <option value="" disabled selected hidden>- Zak -</option>
                  <?php $zak = ["PLS", "BRT", "LOS"];
                  foreach ($zak as $zk) { ?>
                    <option value="<?= $zk ?>"><?= $zk ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>

            <div class="col-1 text-right">
              <a href="javascript:void(0)" id="uuu" class="btn btn-primary" style="margin-left:-20px;margin-top: 31px;"><b class="text">Input</b></a>
            </div>
          </div>

          <div class="table-responsive">
            <table class="table table-bordered table-sm">
              <thead>
                <tr>
                  <th>No CR</th>
                  <th>Size</th>
                  <th>Customer</th>
                  <th>Kode Warna</th>
                  <th>Warna</th>
                  <th>Print</th>
                  <th>Tinta</th>
                  <th>Gravurol</th>
                  <th>Qty</th>
                  <th>Box</th>
                  <th>Zak</th>
                  <th class="text-right">Hapus</th>
                </tr>
              </thead>
              <tbody id="insert_cr">
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

    $("#uuu").click(function() {
      // alert()
      var jumlah = parseInt($("#jumlah_cr").val()); // Ambil jumlah data form pada textbox jumlah-form      
      var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya
      $("#jumlah_cr").val(nextform)

      var no_cr = $("#no_cr").val();
      var size = $("#size").val();
      var customer = $("#customer_add").val();
      var id_customer = customer.split(",")[0];
      var kode_customer = customer.split(",")[1];
      var nama_customer = customer.split(",")[2];
      var kw_cap = $("#kw_cap_add").val();
      var id_kw_cap = kw_cap.split(",")[0];
      var kode_warna_cap = kw_cap.split(",")[1];
      var warna_cap = kw_cap.split(",")[2];
      var kw_body = $("#kw_body_add").val();
      var id_kw_body = kw_body.split(",")[0];
      var kode_warna_body = kw_body.split(",")[1];
      var warna_body = kw_body.split(",")[2];
      var print = $("#print").val();
      var tinta = $("#tinta").val();
      var gravurol = $("#gravurol").val();
      var qty_cr = $("#qty_cr").val();
      var jenis_box = $("#jenis_box").val();
      var jenis_zak = $("#jenis_zak").val();
      var delivery = $("#delivery").val();

      if (no_cr == '') {
        alert("No CR tidak Boleh Kosong");
      } else if (size == '') {
        alert("Size tidak Boleh Kosong");
      } else if (customer == '') {
        alert("Customer tidak Boleh Kosong");
      } else if (kw_cap == '') {
        alert("KW CAP tidak Boleh Kosong");
      } else if (kw_body == '') {
        alert("KW BODY tidak Boleh Kosong");
      } else if (qty_cr == '') {
        alert("Qty tidak Boleh Kosong");
      } else if (jenis_box == '') {
        alert("Box tidak Boleh Kosong");
      } else if (jenis_zak == '') {
        alert("Zak tidak Boleh Kosong");
      } else if (insert_cr == '') {
        alert("tidak Boleh Kosong");
      } else {
        $("#insert_cr").append(`
          <tr id="tr_` + nextform + `">
            <input type="hidden" name="id_customer[]" value="` + id_customer + `">
            <input type="hidden" name="id_kw_cap[]" value="` + id_kw_cap + `">
            <input type="hidden" name="id_kw_body[]" value="` + id_kw_body + `">
            <td>` + no_cr + `<input type="hidden" name="no_cr[]" value="` + no_cr + `"></td>
            <td>` + size + `<input type="hidden" name="size[]" value="` + size + `"></td>
            <td>` + nama_customer + `<input type="hidden" name="nama_customer[]" value="` + nama_customer + ` "></td>
            <td>` + kode_warna_cap + `<input type="hidden" name="kode_warna_cap[]" value="` + kode_warna_cap + `"> - ` + kode_warna_body + `<input type="hidden" name="kode_warna_body[]" value="` + kode_warna_body + `"></td>
            <td>` + warna_cap + `<input type="hidden" name="warna_cap[]" value="` + warna_cap + `"> - ` + warna_body + `<input type="hidden" name="warna_body[]" value="` + warna_body + `"></td>
            <td>` + print + `<input type="hidden" name="print[]" value="` + print + `"></td>
            <td>` + tinta + `<input type="hidden" name="tinta[]" value="` + tinta + `"></td>
            <td>` + gravurol + `<input type="hidden" name="gravurol[]" value="` + gravurol + `"></td>
            <td>` + qty_cr + `<input type="hidden" name="qty_cr[]" value="` + qty_cr + `"></td>
            <td>` + jenis_box + `<input type="hidden" name="jenis_box[]" value="` + jenis_box + `"></td>
            <td>` + jenis_zak + `<input type="hidden" name="jenis_zak[]" value="` + jenis_zak + `"></td>
            <td class="text-right"><a href="javascript:void(0)" onclick="remove(` + nextform + `)" class="text-danger"><i class="feather icon-trash-2"></i></a></td>
          </tr>
        `);
      }


      remove = function(param) {
        var p = document.getElementById('insert_cr');
        var e = document.getElementById('tr_' + param);
        p.removeChild(e); //menghapus elemen child dengan id error bila kita menginput nama
      }
    })

    $('#add').on('hidden.bs.modal', function() {
      $(this).find('form')[0].reset();
    });

    $('#cek_print').change(function() {
      if (this.checked) {
        $('#form_print').show()
        $('#print').prop('required', true);
        $('#tinta').prop('required', true);
        $('#gravurol').prop('required', true);
      } else {
        $('#form_print').hide()
        $('#print').prop('required', false);
        $('#tinta').prop('required', false);
        $('#gravurol').prop('required', false);
      }
      // const value = $(this).val()
      // if (value === 'Tidak Rapat') {} else {}
    })

  })
</script>


<!-- Modal view-->
<div class="modal fade" id="view" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Capsule Request</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="tgl_cr">Tanggal CR</label>
                <input type="text" class="form-control" id="v-tgl_cr" name="tgl_cr" placeholder="Tanggal CR" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="no_mcr">No. MCR</label>
                <input type="text" class="form-control" id="v-no_mcr" name="no_mcr" aria-describedby="validationServer03Feedback" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="nama_operator">Nama Operator</label>
                <input type="text" class="form-control" id="v-nama_operator" name="nama_operator" maxlength="20" readonly>
              </div>
            </div>
          </div>

          <div class="table-responsive">
            <table class="table table-bordered table-sm">
              <thead>
                <tr>
                  <th>No CR</th>
                  <th>Size</th>
                  <th>Customer</th>
                  <th>Kode Warna</th>
                  <th>Warna</th>
                  <th>Print</th>
                  <th>Tinta</th>
                  <th>Gravurol</th>
                  <th>Qty</th>
                  <th>Box</th>
                  <th>Zak</th>
                </tr>
              </thead>
              <tbody id="v-insert_cr">
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
      var no_mcr = $(event.relatedTarget).data('no_mcr')
      var l_no_mcr = $(event.relatedTarget).data('l-no_mcr')
      var tgl_cr = $(event.relatedTarget).data('tgl_cr')
      var nama_operator = $(event.relatedTarget).data('nama_operator')


      $(this).find('#v-no_mcr').val(no_mcr)
      $(this).find('#v-tgl_cr').val(tgl_cr)
      $(this).find('#v-nama_operator').val(nama_operator)


      jQuery.ajax({
        url: "<?= base_url() ?>marketing/Capsule_request/Marketing_cr/data_mcr",
        dataType: 'json',
        type: "post",
        data: {
          no_mcr: no_mcr
        },
        success: function(response) {
          var data = response;
          var $id = $('#v-insert_cr');
          $id.empty();
          for (var i = 0; i < data.length; i++) {
            $id.append(`
              <tr>
                <td>` + data[i].no_cr + `</td>
                <td>` + data[i].size + `</td>
                <td>` + data[i].nama_customer + `</td>
                <td>` + data[i].kode_warna_cap + `-` + data[i].kode_warna_body + `</td>
                <td>` + data[i].warna_cap + `-` + data[i].warna_body + `</td>
                <td>` + data[i].print + `</td>
                <td>` + data[i].tinta + `</td>
                <td>` + data[i].gravurol + `</td>
                <td>` + data[i].qty_cr + `</td>
                <td>` + data[i].jenis_box + `</td>
                <td>` + data[i].jenis_zak + `</td>
              </tr>
            `);
          }
        }
      });
    })
  })
</script>