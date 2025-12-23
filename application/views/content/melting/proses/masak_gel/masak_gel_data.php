<style>
  .scrollable-menu {
    height: auto;
    max-height: 200px;
    overflow-x: hidden;
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
                  <li class="breadcrumb-item"><a href="javascript:">Melting</a></li>
                  <li class="breadcrumb-item"><a href="javascript:">Proses</a></li>
                  <li class="breadcrumb-item"><a href="<?= base_url('Penimbangan') ?>">Masak Gelatin</a></li>
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
                    <h5>Masak Gelatin</h5>

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
                            <th>Tanggal Masak</th>
                            <th>Batch Masak</th>
                            <th>Shift</th>
                            <th class="text-center">Detail</th>
                            <th class="text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $nama_operator = $this->session->userdata('nama_operator');
                          $level = $this->session->userdata('departement');
                          $jabatan = $this->session->userdata('jabatan');
                          $no = 1;
                          foreach ($result as $k) {
                            $tgl_masak =  explode('-', $k['tgl_masak'])[2] . "/" . explode('-', $k['tgl_masak'])[1] . "/" . explode('-', $k['tgl_masak'])[0];
                          ?>
                            <tr>
                              <th scope="row"><?= $no++ ?></th>
                              <td><?= $tgl_masak ?></td>
                              <td><?= $k['batch_masak'] ?></td>
                              <td><?= $k['shift'] ?></td>
                              <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <button type="button" class="btn btn-info btn-square btn-sm" data-toggle="modal" data-target="#view" data-id_masak_gel="<?= $k['id_masak_gel_tf'] ?>" data-tgl_masak="<?= $tgl_masak ?>" data-shift="<?= $k['shift'] ?>" data-batch_masak="<?= $k['batch_masak'] ?>" data-jml_air="<?= $k['jml_air'] ?>" data-temp_pel="<?= $k['temp_pel'] ?>" data-jam_gel="<?= $k['jam_gel'] ?>" data-jam_bt="<?= $k['jam_bt'] ?>" data-mixing1="<?= $k['mixing1'] ?>" data-mixing2="<?= $k['mixing2'] ?>" data-vac1="<?= $k['vac1'] ?>" data-vac2="<?= $k['vac2'] ?>" data-scala_vac="<?= $k['scala_vac'] ?>" data-visco_cps="<?= $k['visco_cps'] ?>" data-visco_c="<?= $k['visco_c'] ?>" data-suhu_ruang="<?= $k['suhu_ruang'] ?>" data-kel_ruang="<?= $k['kel_ruang'] ?>" data-keb_melter="<?= $k['keb_melter'] ?>" data-label_bersih="<?= $k['label_bersih'] ?>" data-op1="<?= $k['op1'] ?>" data-op2="<?= $k['op2'] ?>" data-supervisor="<?= $k['supervisor'] ?>">
                                    <i class=" feather icon-eye"></i>Detail
                                  </button>
                                </div>
                              </td>
                              <td class="text-center">
                                <?php if ($level === "admin") { ?>
                                  <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-primary btn-square btn-sm" data-toggle="modal" data-target="#edit" data-id_masak_gel="<?= $k['id_masak_gel_tf'] ?>" data-tgl_masak="<?= $tgl_masak ?>" data-shift="<?= $k['shift'] ?>" data-batch_masak="<?= $k['batch_masak'] ?>" data-jml_air="<?= $k['jml_air'] ?>" data-temp_pel="<?= $k['temp_pel'] ?>" data-jam_gel="<?= $k['jam_gel'] ?>" data-jam_bt="<?= $k['jam_bt'] ?>" data-mixing1="<?= $k['mixing1'] ?>" data-mixing2="<?= $k['mixing2'] ?>" data-vac1="<?= $k['vac1'] ?>" data-vac2="<?= $k['vac2'] ?>" data-scala_vac="<?= $k['scala_vac'] ?>" data-visco_cps="<?= $k['visco_cps'] ?>" data-visco_c="<?= $k['visco_c'] ?>" data-suhu_ruang="<?= $k['suhu_ruang'] ?>" data-kel_ruang="<?= $k['kel_ruang'] ?>" data-keb_melter="<?= $k['keb_melter'] ?>" data-label_bersih="<?= $k['label_bersih'] ?>" data-op1="<?= $k['op1'] ?>" data-op2="<?= $k['op2'] ?>" data-supervisor="<?= $k['supervisor'] ?>">
                                      <i class=" feather icon-edit-2"></i>Edit
                                    </button>
                                  </div>
                                  <div class="btn-group" role="group">
                                    <a href="<?= base_url() ?>melting/Masak_gelatin/delete/<?= str_replace('/', '-', $k['batch_masak']) ?>" class="btn btn-danger btn-square text-light btn-sm" onclick="return confirm('Apakah anda yakin menghapus data ini ?')">
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
              <!-- [ basic-table ] end -->

            </div>
            <!-- [ Main Content ] end -->
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Modal Add -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Masak Gelatin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>melting/Masak_gelatin/add">
        <div class="modal-body">
          <center><label for="pemeriksaan" class="font-weight-bold mt-3">Komposisi Masak Gelatin</label></center>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="tgl_masak">Tanggal Masak</label>
                <input type="text" class="form-control datepicker" id="tgl_masak" name="tgl_masak"  autocomplete="off" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="shift">Shift</label>
                <input type="number" class="form-control" id="shift" name="shift" placeholder="Shift" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="batch_masak">Batch Masak</label>
                <input type="text" class="form-control text-uppercase" id="batch_masak" name="batch_masak" value="<?= $generate_batch_masak ?>" autocomplete="off" readonly>
              </div>
            </div>
          </div>

          <center><label for="pemeriksaan" class="font-weight-bold mt-3">Tambah Bahan</label></center>
          <input type="hidden" id="jumlah_barang" name="jumlah_barang" value="1">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="bahan_add">Nama Barang</label>
                <select class="form-control chosen-select" role="menu" id="bahan_add" name="bahan_add">
                  <option value="" disabled selected hidden>- Nama Barang -</option>
                  <?php
                  foreach ($res_mm_bhn as $mm) { ?>
                    <option value="<?= $mm['id_mm'] ?>" data-id_prc_master_barang="<?= $mm['id_prc_master_barang'] ?>" data-stok="<?= $mm['stok'] ?>" data-bloom="<?= $mm['bloom'] ?>" data-no_batch="<?= $mm['no_batch'] ?>"> <?= $mm['nama_barang'] ?> | <?= $mm['no_batch'] ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="bloom_add">Bloom</label>
                <label for="no_batch_add" style="padding-left: 20%;">No Batch</label>
                <label for="stok_add" style="padding-left: 20px;">Stok</label>
                <div class="input-group">
                  <input type="text" class="form-control" id="bloom_add" name="bloom_add" placeholder="Bloom" autocomplete="off" readonly>
                  <input type="text" class="form-control" id="no_batch_add" name="no_batch_add" placeholder="No Batch" autocomplete="off" readonly>
                  <input type="text" class="form-control" id="stok_add" name="stok_add" placeholder="Stok" autocomplete="off" readonly>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="jml_add">Jumlah</label>
                <div class="input-group">
                  <input type="number" class="form-control" id="jml_add" name="jml_add" placeholder="Jumlah" autocomplete="off" aria-describedby="validationServer03Feedback">
                  <div id="validationServer03Feedback" class="invalid-feedback">
                    Maaf Stok tidak mencukupi.
                  </div>
                </div>
              </div>
            </div>
            <div class="col-1">
              <a href="javascript:void(0)" id="input" class="btn btn-primary" style="margin-left:-20px;margin-top: 31px;"><b class="text">Input</b></a>
            </div>
          </div>

          <div class="table-responsive">
            <table class="table table-bordered table-sm">
              <thead>
                <tr>
                  <th>Nama Barang</th>
                  <th>Bloom</th>
                  <th>No Batch</th>
                  <th>Qty</th>
                  <th class="text-right">Hapus</th>
                </tr>
              </thead>
              <tbody id="insert_bahan">
              </tbody>
              <tfoot>
                <tr>
                  <th colspan="3" class="text-center">Jumlah</th>
                  <th id="total"></th>
                  <th></th>
                </tr>
              </tfoot>
            </table>
          </div>
          <center><label for="pemeriksaan" class="font-weight-bold mt-3">Bahan Tambahan</label></center>

          <div class="table-responsive">
            <table class="table table-bordered table-sm">
              <thead>
                <tr>
                  <th style="width: 59%;">Nama Barang</th>
                  <th>No Batch</th>
                  <th>Qty</th>
                  <th class="text-right">Hapus</th>
                </tr>
              </thead>
              <tbody id="bt">
              </tbody>
            </table>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="jml_air">Jumlah Air (L)</label>
                <input type="number" class="form-control" id="jml_air" name="jml_air" placeholder="Jumlah Air (L)" autocomplete="off" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="temp_pel">Temp Air Pelarut</label>
                <input type="number" class="form-control" id="temp_pel" name="temp_pel" placeholder="°C" autocomplete="off" min="80" max="90" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="jam_gel">Jam Masuk Gelatin (WIB)</label>
                <input type="text" class="form-control" id="jam_gel" name="jam_gel" placeholder="00.00" autocomplete="off" onkeyup="Waktumasuk();" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="jam_bt">Jam Masuk MP/PP/SLS (WIB)</label>
                <input type="text" class="form-control" id="jam_bt" name="jam_bt" placeholder="00.00" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="mixing">Mixing</label>
                <div class="input-group">
                  <input type="text" class="form-control" id="mixing1" name="mixing1" placeholder="00.00" autocomplete="off" required>
                  <input type="text" class="form-control" id="" name="" value="s/d" readonly>
                  <input type="text" class="form-control" id="mixing2" name="mixing2" placeholder="00.00" autocomplete="off" required>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="vac">Vaccum</label>
                <div class="input-group">
                  <input type="text" class="form-control" id="vac1" name="vac1" placeholder="00.00" autocomplete="off" required>
                  <input type="text" class="form-control" id="" name="" value="s/d" readonly>
                  <input type="text" class="form-control" id="vac2" name="vac2" placeholder="00.00" autocomplete="off" required>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="scala_vac">Scala Vaccum</label>
                <input type="text" class="form-control" id="scala_vac" name="scala_vac" placeholder="Scala Vaccum" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="visco_cps">Viscositas</label>
                <div class="input-group">
                  <input type="number" class="form-control" id="visco_cps" name="visco_cps" placeholder="Cps" autocomplete="off" required>
                  <input type="number" class="form-control" id="visco_c" name="visco_c" placeholder="°C" autocomplete="off" required>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="suhu_ruang">Suhu Ruangan</label>
                <input type="text" class="form-control text-uppercase" id="suhu_ruang" name="suhu_ruang" placeholder="suhu ruang" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="kel_ruang">Kelembapan Ruangan</label>
                <input type="text" class="form-control text-uppercase" id="kel_ruang" name="kel_ruang" placeholder="kelembapan ruangan" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="keb_melter">Kebersihan Melter</label>
                <input type="text" class="form-control text-uppercase" id="keb_melter" name="keb_melter" placeholder="Kebersihan Melter" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <div class="form-check mr-2">
                  <input class="form-check-input" name="label_bersih" type="checkbox" value="Ada">
                  <label class="form-check-label">Label Bersih</label>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="op1">Operator 1</label>
                <input type="text" class="form-control text-uppercase" id="op1" name="op1" placeholder="Operator 1" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="op2">Operator 2</label>
                <input type="text" class="form-control text-uppercase" id="op2" name="op2" placeholder="Operator 2" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="supervisor">Supervisor</label>
                <input type="text" class="form-control text-uppercase" id="supervisor" name="supervisor" placeholder="Supervisor" autocomplete="off" required>
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
function todayDMY() {
  const d = new Date();
  return String(d.getDate()).padStart(2,'0') + '/' +
         String(d.getMonth()+1).padStart(2,'0') + '/' +
         d.getFullYear();
}

$(document).ready(function () {

  $('#tgl_masak').val(todayDMY());

  let usedItems = []; // <-- SIMPAN ID BARANG YANG SUDAH MASUK

  // =========================
  // VALIDASI STOK
  // =========================
  $('#jml_add').on('keyup change', function () {
    const stok = parseInt($('#bahan_add option:selected').data('stok') || 0);
    const jml  = parseInt($(this).val() || 0);

    if (jml <= 0 || jml > stok) {
      $(this).addClass('is-invalid');
      $('#simpan').prop('disabled', true);
    } else {
      $(this).removeClass('is-invalid');
      $('#simpan').prop('disabled', false);
    }
  });

  // =========================
  // ISI DATA BARANG
  // =========================
  $('#bahan_add').on('change', function () {
    const opt = $(this).find(':selected');
    $('#bloom_add').val(opt.data('bloom') || '');
    $('#no_batch_add').val(opt.data('no_batch') || '');
    $('#stok_add').val(opt.data('stok') || '');
  });

  // =========================
  // TOMBOL INPUT
  // =========================
  $('#input').on('click', function () {

    const id_mm   = $('#bahan_add').val();
    const jml     = parseInt($('#jml_add').val() || 0);
    console.log(jml)
    const stok    = parseInt($('#bahan_add option:selected').data('stok') || 0);

    if (!id_mm) {
      alert('⚠️ Silahkan pilih barang terlebih dahulu');
      return;
    }

    if (jml <= 0) {
      alert('⚠️ Jumlah tidak boleh kosong / 0');
      return;
    }

    if (jml > stok) {
      alert('⚠️ Stok tidak mencukupi');
      return;
    }

    if (usedItems.includes(id_mm)) {
      alert('⚠️ Barang sudah ditambahkan, tidak boleh double');
      return;
    }

    usedItems.push(id_mm); // <-- KUNCI BARANG

    const nama_bahan = $('#bahan_add option:selected').text();
    const bloom      = $('#bahan_add option:selected').data('bloom');
    const no_batch   = $('#bahan_add option:selected').data('no_batch');
    const id_prc     = $('#bahan_add option:selected').data('id_prc_master_barang');

    const rowId = 'row_' + id_mm;

    if (bloom && bloom != 0) {
      $('#insert_bahan').append(`
        <tr id="${rowId}">
          <input type="hidden" name="bahan[${id_mm}][id_mm]" value="${id_mm}">
          <input type="hidden" name="bahan[${id_mm}][id_prc_master_barang]" value="${id_prc}">
          <input type="hidden" class="jml_gel" name="bahan[${id_mm}][jml_bahan]" value="${jml}">
          <td>${nama_bahan}</td>
          <td>${bloom}</td>
          <td>${no_batch}</td>
          <td>${jml}</td>
          <td class="text-right">
            <a href="#" class="text-danger remove" data-id="${id_mm}">
              <i class="feather icon-trash-2"></i>
            </a>
          </td>
        </tr>
      `);
    } else {
      $('#bt').append(`
        <tr id="${rowId}">
          <input type="hidden" name="bahan[${id_mm}][id_mm]" value="${id_mm}">
          <input type="hidden" name="bahan[${id_mm}][id_prc_master_barang]" value="${id_prc}">
          <input type="hidden" name="bahan[${id_mm}][jml_bahan]" value="${jml}">
          <td>${nama_bahan}</td>
          <td>${no_batch}</td>
          <td>${jml}</td>
          <td class="text-right">
            <a href="#" class="text-danger remove" data-id="${id_mm}">
              <i class="feather icon-trash-2"></i>
            </a>
          </td>
        </tr>
      `);
    }

    hitungTotal();

    // reset input
    $('#bahan_add').val('').trigger('chosen:updated');
    $('#jml_add').val('');
    $('#bloom_add, #no_batch_add, #stok_add').val('');
  });

  // =========================
  // HAPUS BARIS
  // =========================
  $(document).on('click', '.remove', function (e) {
    e.preventDefault();
    const id = $(this).data('id');
    usedItems = usedItems.filter(v => v != id);
    $('#row_' + id).remove();
    hitungTotal();
  });

  // =========================
  // HITUNG TOTAL & AIR
  // =========================
  function hitungTotal() {
    let total = 0;
    $('.jml_gel').each(function () {
      total += parseInt($(this).val());
    });
    $('#total').text(total || '');
    $('#jml_air').val(total * 2 || '');
  }

});
</script>



<!-- Modal Detail -->
<div class="modal fade" id="view" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Bahan Masak Gelatin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <form>
      </div>
      <div class="modal-body">
        <center><label for="pemeriksaan" class="font-weight-bold mt-3">Komposisi Masak Gelatin</label></center>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="tgl_masak">Tanggal Masak</label>
              <input type="text" class="form-control" id="v-tgl_masak" name="tgl_masak" placeholder="Tanggal Masak" autocomplete="off" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="shift">Shift</label>
              <label for="batch_masak" style="padding-left: 42%;">Batch Masak</label>
              <div class="input-group">
                <input type="text" class="form-control" id="v-shift" name="shift" placeholder="Shift" autocomplete="off" readonly>
                <input type="text" class="form-control" id="v-batch_masak" name="batch_masak" placeholder="Batch Masak" autocomplete="off" readonly>
              </div>
            </div>
          </div>
        </div>

        <center><label for="pemeriksaan" class="font-weight-bold mt-3">Detail Bahan Baku</label></center>
        <div class="table-responsive">
          <table class="table table-bordered table-sm">
            <thead>
              <tr>
                <th>Nama Barang</th>
                <th>Bloom</th>
                <th>Batch Masak</th>
                <th>Qty</th>
              </tr>
            </thead>
            <tbody id="v-bahan_gel">
            </tbody>
          </table>
        </div>

        <center><label for="pemeriksaan" class="font-weight-bold mt-3">Detail Bahan Tambahan</label></center>
        <div class="table-responsive">
          <table class="table table-bordered table-sm">
            <thead>
              <tr>
                <th>Nama Barang</th>
                <th>Batch Masak</th>
                <th>Qty</th>
              </tr>
            </thead>
            <tbody id="v-bahan_bt">
            </tbody>
          </table>
        </div>

        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="jml_air">Jumlah Air (L)</label>
              <input type="text" class="form-control" id="v-jml_air" name="jml_air" placeholder="Jumlah Air (L)" autocomplete="off" readonly>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="temp_pel">Temp Air Pelarut</label>
              <input type="text" class="form-control" id="v-temp_pel" name="temp_pel" placeholder="Temp Air Pelarut" autocomplete="off" readonly>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="jam_gel">Jam Masuk Gelatin</label>
              <input type="text" class="form-control" id="v-jam_gel" name="jam_gel" placeholder="Jam Masuk Gelatin" autocomplete="off" readonly>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="jam_bt">Jam Masuk MP/PP/SLS</label>
              <input type="text" class="form-control" id="v-jam_bt" name="jam_bt" placeholder="Jam Masuk MP/PP/SLS" autocomplete="off" readonly>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="mixing">Mixing</label>
              <div class="input-group">
                <input type="text" class="form-control" id="v-mixing1" name="mixing1" readonly>
                <input type="text" class="form-control" id="" name="" Value="s/d" readonly>
                <input type="text" class="form-control" id="v-mixing2" name="mixing2" readonly>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="vac">Vaccum</label>
              <div class="input-group">
                <input type="text" class="form-control" id="v-vac1" name="vac1" readonly>
                <input type="text" class="form-control" id="" name="" Value="s/d" readonly>
                <input type="text" class="form-control" id="v-vac2" name="vac2" readonly>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="scala_vac">Scala Vaccum</label>
              <input type="text" class="form-control" id="v-scala_vac" name="scala_vac" placeholder="Scala Vaccum" autocomplete="off" readonly>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="visco_cps">Viscositas</label>
              <div class="input-group">
                <input type="text" class="form-control" id="v-visco_cps" name="visco_cps" placeholder="Cps" value=" Cps" autocomplete="off" readonly>
                <input type="text" class="form-control" id="v-visco_c" name="visco_c" placeholder="°C" value=" °C" autocomplete="off" readonly>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="suhu_ruang">Suhu Ruangan</label>
              <input type="text" class="form-control" id="v-suhu_ruang" name="suhu_ruang" placeholder="Suhu Ruangan" autocomplete="off" readonly>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="kel_ruang">Kelembapan Ruangan</label>
              <input type="text" class="form-control" id="v-kel_ruang" name="kel_ruang" placeholder="Kelembapan Ruangan" autocomplete="off" readonly>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="keb_melter">Kebersihan Melter</label>
              <input type="text" class="form-control" id="v-keb_melter" name="keb_melter" placeholder="Kebersihan Ruangan" autocomplete="off" readonly>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="label_bersih">Label Bersih</label>
              <input type="text" class="form-control" id="v-label_bersih" name="label_bersih" readonly>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="op1">Operator 1</label>
              <input type="text" class="form-control" id="v-op1" name="op1" placeholder="Operator 1" autocomplete="off" readonly>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="op2">Operator 2</label>
              <input type="text" class="form-control" id="v-op2" name="op2" placeholder="Operator 2" autocomplete="off" readonly>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="supervisor">Supervisor</label>
              <input type="text" class="form-control" id="v-supervisor" name="supervisor" placeholder="Supervisor" autocomplete="off" readonly>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('#view').on('show.bs.modal', function(event) {
      var tgl_masak = $(event.relatedTarget).data('tgl_masak')
      var shift = $(event.relatedTarget).data('shift')
      var batch_masak = $(event.relatedTarget).data('batch_masak')
      var jml_air = $(event.relatedTarget).data('jml_air')
      var temp_pel = $(event.relatedTarget).data('temp_pel')
      var jam_gel = $(event.relatedTarget).data('jam_gel')
      var jam_bt = $(event.relatedTarget).data('jam_bt')
      var mixing1 = $(event.relatedTarget).data('mixing1')
      var mixing2 = $(event.relatedTarget).data('mixing2')
      var vac1 = $(event.relatedTarget).data('vac1')
      var vac2 = $(event.relatedTarget).data('vac2')
      var scala_vac = $(event.relatedTarget).data('scala_vac')
      var visco_cps = $(event.relatedTarget).data('visco_cps')
      var visco_c = $(event.relatedTarget).data('visco_c')
      var suhu_ruang = $(event.relatedTarget).data('suhu_ruang')
      var kel_ruang = $(event.relatedTarget).data('kel_ruang')
      var keb_melter = $(event.relatedTarget).data('keb_melter')
      var label_bersih = $(event.relatedTarget).data('label_bersih')
      var op1 = $(event.relatedTarget).data('op1')
      var op2 = $(event.relatedTarget).data('op2')
      var supervisor = $(event.relatedTarget).data('supervisor')

      $(this).find('#v-tgl_masak').val(tgl_masak)
      $(this).find('#v-shift').val(shift)
      $(this).find('#v-batch_masak').val(batch_masak)
      $(this).find('#v-jml_air').val(jml_air)
      $(this).find('#v-temp_pel').val(temp_pel)
      $(this).find('#v-jam_gel').val(jam_gel)
      $(this).find('#v-jam_bt').val(jam_bt)
      $(this).find('#v-mixing1').val(mixing1)
      $(this).find('#v-mixing2').val(mixing2)
      $(this).find('#v-vac1').val(vac1)
      $(this).find('#v-vac2').val(vac2)
      $(this).find('#v-scala_vac').val(scala_vac)
      $(this).find('#v-visco_cps').val(visco_cps)
      $(this).find('#v-visco_c').val(visco_c)
      $(this).find('#v-suhu_ruang').val(suhu_ruang)
      $(this).find('#v-kel_ruang').val(kel_ruang)
      $(this).find('#v-keb_melter').val(keb_melter)
      $(this).find('#v-label_bersih').val(label_bersih)
      $(this).find('#v-op1').val(op1)
      $(this).find('#v-op2').val(op2)
      $(this).find('#v-supervisor').val(supervisor)
      jQuery.ajax({
        url: "<?= base_url() ?>melting/Masak_gelatin/get_detail_gel",
        dataType: 'json',
        type: "post",
        data: {
          batch_masak: batch_masak
        },
        success: function(response) {
          var data = response;
          // alert(JSON.stringify(data))
          var $id = $('#v-bahan_gel');
          $id.empty();
          // $id.append('<option value=0>- Pilih Prioritas Kegiatan -</option>');
          for (var i = 0; i < data.length; i++) {
            $id.append(`
              <tr>
                <td>` + data[i].nama_barang + `</td>
                <td>` + data[i].bloom + `</td>
                <td>` + data[i].batch_masak + `</td>
                <td>` + data[i].jml_bahan + `</td>
              </tr>
            `);
          }
        }
      });

      jQuery.ajax({
        url: "<?= base_url() ?>melting/Masak_gelatin/get_detail_bt",
        dataType: 'json',
        type: "post",
        data: {
          batch_masak: batch_masak
        },
        success: function(response) {
          var data = response;
          // alert(JSON.stringify(data))
          var $id = $('#v-bahan_bt');
          $id.empty();
          // $id.append('<option value=0>- Pilih Prioritas Kegiatan -</option>');
          for (var i = 0; i < data.length; i++) {
            $id.append(`
              <tr>
                <td>` + data[i].nama_barang + `</td>
                <td>` + data[i].batch_masak + `</td>
                <td>` + data[i].jml_bahan + `</td>
              </tr>
            `);
          }
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
        <h5 class="modal-title" id="exampleModalLabel">Edit Bahan Masak Gelatin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>melting/Masak_gelatin/update">
        <input type="hidden" id="e-id_masak_gel" name="id_masak_gel">
        <div class="modal-body">
          <center><label for="pemeriksaan" class="font-weight-bold mt-3">Komposisi Masak Gelatin</label></center>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="tgl_masak">Tanggal Masak</label>
                <input type="text" class="form-control datepicker" id="e-tgl_masak" name="tgl_masak" placeholder="Tanggal Masak" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="shift">Shift</label>
                <label for="batch_masak" style="padding-left: 42%;">Batch Masak</label>
                <div class="input-group">
                  <input type="text" class="form-control" id="e-shift" name="shift" placeholder="Shift" autocomplete="off" required>
                  <input type="text" class="form-control" id="e-batch_masak" name="batch_masak" placeholder="Batch Masak" autocomplete="off" readonly>
                </div>
              </div>
            </div>
          </div>

          <center><label for="pemeriksaan" class="font-weight-bold mt-3">Edit Bahan Gelatin</label></center>
          <div class="table-responsive">
            <table class="table table-bordered table-sm">
              <thead>
                <tr>
                  <th>Nama Barang</th>
                  <th>Bloom</th>
                  <th>Batch Masak</th>
                  <th>Qty</th>
                </tr>
              </thead>
              <tbody id="e-bahan_gel">
              </tbody>
            </table>
          </div>

          <center><label for="pemeriksaan" class="font-weight-bold mt-3">Edit Bahan Tambahan</label></center>
          <div class="table-responsive">
            <table class="table table-bordered table-sm">
              <thead>
                <tr>
                  <th>Nama Barang</th>
                  <th>Batch Masak</th>
                  <th>Qty</th>
                </tr>
              </thead>
              <tbody id="e-bahan_bt">
              </tbody>
            </table>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="jml_air">Jumlah Air (L)</label>
                <input type="text" class="form-control" id="e-jml_air" name="jml_air" placeholder="Jumlah Air (L)" autocomplete="off" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="temp_pel">Temp Air Pelarut</label>
                <input type="text" class="form-control" id="e-temp_pel" name="temp_pel" placeholder="Temp Air Pelarut" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="jam_gel">Jam Masuk Gelatin</label>
                <input type="text" class="form-control" id="e-jam_gel" name="jam_gel" placeholder="Jam Masuk Gelatin" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="jam_bt">Jam Masuk MP/PP/SLS</label>
                <input type="text" class="form-control" id="e-jam_bt" name="jam_bt" placeholder="Jam Masuk MP/PP/SLS" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="mixing">Mixing</label>
                <div class="input-group">
                  <input type="text" class="form-control" id="e-mixing1" name="mixing1" autocomplete="off" required>
                  <input type="text" class="form-control" id="" name="" Value="s/d" readonly>
                  <input type="text" class="form-control" id="e-mixing2" name="mixing2" autocomplete="off" required>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="vac">Vaccum</label>
                <div class="input-group">
                  <input type="text" class="form-control" id="e-vac1" name="vac1" autocomplete="off" required>
                  <input type="text" class="form-control" id="" name="" Value="s/d" readonly>
                  <input type="text" class="form-control" id="e-vac2" name="vac2" autocomplete="off" required>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="scala_vac">Scala Vaccum</label>
                <input type="text" class="form-control" id="e-scala_vac" name="scala_vac" placeholder="Scala Vaccum" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="visco_cps">Viscositas</label>
                <div class="input-group">
                  <input type="text" class="form-control" id="e-visco_cps" name="visco_cps" placeholder="Cps" value=" Cps" autocomplete="off" required>
                  <input type="text" class="form-control" id="e-visco_c" name="visco_c" placeholder="°C" value=" °C" autocomplete="off" required>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="suhu_ruang">Suhu Ruangan</label>
                <input type="text" class="form-control" id="e-suhu_ruang" name="suhu_ruang" placeholder="Suhu Ruangan" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="kel_ruang">Kelembapan Ruangan</label>
                <input type="text" class="form-control" id="e-kel_ruang" name="kel_ruang" placeholder="Kelembapan Ruangan" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="keb_melter">Kebersihan Melter</label>
                <input type="text" class="form-control" id="e-keb_melter" name="keb_melter" placeholder="Kebersihan Ruangan" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-check mr-2">
                <input class="form-check-input" id="e-label_bersih" name="label_bersih" value="Ada" type="checkbox">
                <label class="form-check-label">Label Bersih</label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="op1">Operator 1</label>
                <input type="text" class="form-control" id="e-op1" name="op1" placeholder="Operator 1" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="op2">Operator 2</label>
                <input type="text" class="form-control" id="e-op2" name="op2" placeholder="Operator 2" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="supervisor">Supervisor</label>
                <input type="text" class="form-control" id="e-supervisor" name="supervisor" placeholder="Supervisor" autocomplete="off" required>
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
</div>
<script type="text/javascript">
  $(document).ready(function() {
    $('#edit').on('show.bs.modal', function(event) {
      var id_masak_gel = $(event.relatedTarget).data('id_masak_gel')
      var tgl_masak = $(event.relatedTarget).data('tgl_masak')
      var shift = $(event.relatedTarget).data('shift')
      var batch_masak = $(event.relatedTarget).data('batch_masak')
      var jml_air = $(event.relatedTarget).data('jml_air')
      var temp_pel = $(event.relatedTarget).data('temp_pel')
      var jam_gel = $(event.relatedTarget).data('jam_gel')
      var jam_bt = $(event.relatedTarget).data('jam_bt')
      var mixing1 = $(event.relatedTarget).data('mixing1')
      var mixing2 = $(event.relatedTarget).data('mixing2')
      var vac1 = $(event.relatedTarget).data('vac1')
      var vac2 = $(event.relatedTarget).data('vac2')
      var scala_vac = $(event.relatedTarget).data('scala_vac')
      var visco_cps = $(event.relatedTarget).data('visco_cps')
      var visco_c = $(event.relatedTarget).data('visco_c')
      var suhu_ruang = $(event.relatedTarget).data('suhu_ruang')
      var kel_ruang = $(event.relatedTarget).data('kel_ruang')
      var keb_melter = $(event.relatedTarget).data('keb_melter')
      var label_bersih = $(event.relatedTarget).data('label_bersih')
      var op1 = $(event.relatedTarget).data('op1')
      var op2 = $(event.relatedTarget).data('op2')
      var supervisor = $(event.relatedTarget).data('supervisor')


      $(this).find('#e-id_masak_gel').val(id_masak_gel)
      $(this).find('#e-tgl_masak').val(tgl_masak)
      $(this).find('#e-shift').val(shift)
      $(this).find('#e-batch_masak').val(batch_masak)
      $(this).find('#e-jml_air').val(jml_air)
      $(this).find('#e-temp_pel').val(temp_pel)
      $(this).find('#e-jam_gel').val(jam_gel)
      $(this).find('#e-jam_bt').val(jam_bt)
      $(this).find('#e-mixing1').val(mixing1)
      $(this).find('#e-mixing2').val(mixing2)
      $(this).find('#e-vac1').val(vac1)
      $(this).find('#e-vac2').val(vac2)
      $(this).find('#e-scala_vac').val(scala_vac)
      $(this).find('#e-visco_cps').val(visco_cps)
      $(this).find('#e-visco_c').val(visco_c)
      $(this).find('#e-suhu_ruang').val(suhu_ruang)
      $(this).find('#e-kel_ruang').val(kel_ruang)
      $(this).find('#e-keb_melter').val(keb_melter)
      $(this).find('#e-label_bersih').val(label_bersih)
      $(this).find('#e-op1').val(op1)
      $(this).find('#e-op2').val(op2)
      $(this).find('#e-supervisor').val(supervisor)
      $(this).find('#e-tgl_masak').datepicker().on('show.bs.modal', function(event) {
        event.stopImmediatePropagation();
      });
      if (label_bersih === "Ada") {
        $('#e-label_bersih').attr('checked', true);
      } else {
        $('#e-label_bersih').attr('checked', false);
      }

      jQuery.ajax({
        url: "<?= base_url() ?>melting/Masak_gelatin/get_detail_gel",
        dataType: 'json',
        type: "post",
        data: {
          batch_masak: batch_masak
        },
        success: function(response) {
          var data = response;
          var $tbody = $('#e-bahan_gel');
          $tbody.empty();

          for (var i = 0; i < data.length; i++) {

            var row = `
      <tr>
        <td>
          <select class="form-control chosen-select e-nama-bahan-gel" name="bahan_gel[id_mm][]" required>
            <?php foreach ($res_mm_bhn as $mm) { ?>
              <option 
                value="<?= $mm['id_mm'] ?>" 
                data-bloom="<?= $mm['bloom'] ?>">
                <?= $mm['nama_barang'] ?> | <?= $mm['no_urut'] ?>
              </option>
            <?php } ?>
          </select>
        </td>

        <td>
          <span class="e-bloom">${data[i].bloom}</span>
        </td>

        <td>${data[i].batch_masak}</td>

        <td>
          <input 
            type="number" 
            class="form-control e-qty" 
            name="bahan_gel[jml_bahan][]" 
            value="${data[i].jml_bahan}" 
            min="0"
            required>
        </td>
      </tr>
    `;

            $tbody.append(row);

            var $lastRow = $tbody.find('tr:last');

            $lastRow.find('.e-nama-bahan-gel')
              .val(data[i].id_mm)
              .chosen()
              .trigger("chosen:updated");
          }
        }

      });
      jQuery.ajax({
        url: "<?= base_url() ?>melting/Masak_gelatin/get_detail_bt",
        dataType: 'json',
        type: "post",
        data: {
          batch_masak: batch_masak
        },
        success: function(response) {
          var data = response;
          var $tbody = $('#e-bahan_bt');
          $tbody.empty();

          for (var i = 0; i < data.length; i++) {

            var row = `
      <tr>
        <td>
          <select class="form-control chosen-select e-nama-bahan-bt" name="bahan_bt[id_mm][]" required>
            <?php foreach ($res_mm_bhn as $mm) { ?>
              <option 
                value="<?= $mm['id_mm'] ?>">
                <?= $mm['nama_barang'] ?> | <?= $mm['no_urut'] ?>
              </option>
            <?php } ?>
          </select>
        </td>

        <td>${data[i].batch_masak}</td>

        <td>
          <input 
            type="number" 
            class="form-control e-qty" 
            name="bahan_bt[jml_bahan][]" 
            value="${data[i].jml_bahan}" 
            min="0"
            required>
        </td>
      </tr>
    `;

            $tbody.append(row);

            var $lastRow = $tbody.find('tr:last');

            $lastRow.find('.e-nama-bahan-bt')
              .val(data[i].id_mm)
              .chosen()
              .trigger("chosen:updated");
          }
        }

      });
    });
  })

  $(document).on('change', '.e-nama-bahan-gel', function() {
    var bloom = $(this).find(':selected').data('bloom');
    $(this).closest('tr').find('.e-bloom').text(bloom);
  });
  $(document).on('input', '.e-qty', function() {
    if ($(this).val() < 0) {
      $(this).val(0);
    }
  });
</script>