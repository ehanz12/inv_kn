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
                  <li class="breadcrumb-item"><a href="<?= base_url('Purchasing/Purchasing_rh/purchasing_rh') ?>">Rincian Harga</a></li>
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
                    <h5>Data Rincian Harga</h5>
                    <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#add">
                      <i class="feather icon-user-plus"></i>Tambah RH Non Budget
                    </button>
                    <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#add_budget" style="margin-right: 5px;">
                      <i class="feather icon-user-plus"></i>Tambah RH Budget
                    </button>
                    <div class="float-right">
                      <div class="input-group">
                        <input type="text" id="filter_tgl" value="<?= $tgl == null ? '' : $tgl ?>" class="form-control datepicker" placeholder="Filter Dari Tanggal" autocomplete="off" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <input type="text" id="filter_tgl2" value="<?= $tgl2 == null ? '' : $tgl2 ?>" class="form-control datepicker" placeholder="Filter Sampai Tanggal" autocomplete="off" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="btn-group">
                          <button class="btn btn-secondary btn-sm" id="lihat" type="button">Lihat</button>
                        </div>
                        <div class="btn-group">
                          <a href="<?= base_url() ?>Purchasing/purchasing_rh/purchasing_rh" style="width: 40px;" class="btn btn-warning"  type="button"><i class="feather icon-refresh-ccw"></i></a>
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
                            <th>Tanggal Rincian</th>
                            <th>No Budget</th>
                            <th class="text-center">Harga</th>
                            <th class="text-center">Jumlah Rincian</th>
                            <th class="text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $level = $this->session->userdata('level');
                          $jabatan = $this->session->userdata('jabatan');
                          $no = 1;
                          foreach ($result as $k) {
                            $tgl_rh =  explode('-', $k['tgl_rh'])[2] . "/" . explode('-', $k['tgl_rh'])[1] . "/" . explode('-', $k['tgl_rh'])[0];
                          ?>
                            <tr>
                              <th scope="row"><?= $no++ ?></th>
                              <td><?= $tgl_rh ?></td>
                              <td><?= $k['no_budget'] ?></td>
                              <td class="text-center"><?= $k['harga_rh'] ?></td>
                              <td class="text-center"><?= $k['jumlah_rh'] ?></td>

                              <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <a type="button" class="btn btn-primary btn-square btn-sm text-light" onclick="window.open(`<?= base_url() ?>accounting/accounting_ppb/pdf_cetak/<?= str_replace('/', '--', $k['no_ppb']) ?>`, 'location=yes,height=700,width=1300,scrollbars=yes,status=yes'); "
                                    data-no_ppb="<?= $k['no_ppb'] ?>"
                                    data-harga_rh="<?= $k['harga_rh'] ?>"
                                    data-tgl_rh="<?= $k['tgl_rh'] ?>"
                                    data-total_rh="<?= $k['total_rh'] ?>">
                                    <i class="feather icon-file"></i>Edit
                                  </a>
                                </div>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <a type="button" class="btn btn-danger btn-square text-light btn-sm" href="<?= base_url() ?>purchasing/purchasing_ppb/purchasing_ppb/delete/<?= str_replace('/', '--', $k['no_ppb']) ?>" onclick="if (! confirm('Apakah Anda Yakin?')) { return false; }">
                                    <i class="feather icon-trash-2"></i>Delete
                                  </a>
                                </div>
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
  $('#export').click(function() {
    var filter_nama = $('#filter_barang').find(':selected').val();
    var filter_tgl = $('#filter_tgl').val();
    var filter_tgl2 = $('#filter_tgl2').val();

    var newFilterTgl = filter_tgl.split("/")[2] + "-" + filter_tgl.split("/")[1] + "-" + filter_tgl.split("/")[0];
    var newFilterTgl2 = filter_tgl2.split("/")[2] + "-" + filter_tgl2.split("/")[1] + "-" + filter_tgl2.split("/")[0];

    if (filter_tgl === '' && filter_tgl2 !== '') {
      window.location = "<?= base_url() ?>gudang_bahanbaku/Laporan_barang_masuk?alert=warning&msg=dari tanggal belum diisi";
      alert("Dari tanggal belum diisi")
    } else if (filter_tgl !== '' && filter_tgl2 === '') {
      window.location = "<?= base_url() ?>gudang_bahanbaku/Laporan_barang_masuk?alert=warning&msg=sampai tanggal belum diisi";
    } else {
      const query = new URLSearchParams({
        name: filter_nama,
        date_from: newFilterTgl,
        date_until: newFilterTgl2
      });
      var url = "<?= base_url() ?>gudang_bahanbaku/Laporan_barang_masuk/pdf_laporan_barang_masuk?" + query.toString();
      window.open(url, 'location=yes,height=700,width=1300,scrollbars=yes,status=yes');
    }
  });
</script>

<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Rincian Harga (Non Budget)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <input type="hidden" name="id_accounting_ppb_tf" id="a-id_accounting_ppb_tf">
      <form method="post" action="<?= base_url() ?>Purchasing/Purchasing_rh/purchasing_rh/add_2">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="tgl_rh">Tanggal Rincian</label>
                <input type="text" class="form-control datepicker" id="tgl_rh" name="tgl_rh" placeholder="Tanggal Rincian" autocomplete="off" required>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="no_rh">No Rincian</label>
                <select class="form-control chosen-select" id="no_rh" name="no_rh" placeholder="Pilih Nomor Rincian" required>
                  <option value="" disabled selected> - Pilih Nomor Rincian - </option>
                  <?php foreach ($res_ppb_2 as $ppb) : ?>
                    <option
                      value="<?= $ppb['no_ppb'] ?>"
                      data-jenis_form_ppb="<?= $ppb['jenis_form_ppb'] ?>"
                      data-jenis_ppb="<?= $ppb['jenis_ppb'] ?>"><?= $ppb['no_ppb'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="a-form_ppb">Jenis Form</label>
                <input type="text" class="form-control" id="a-form_ppb" name="form_ppb" placeholder="Form A/C" readonly>
              </div>
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
                  <th class="text-center">Jumlah</th>
                  <th>No Budget</th>
                  <th class="text-center">Harga</th>
                  <th class="text-right">Total</th>
                </tr>
              </thead>
              <tbody id="a-ppb_barang"></tbody>
            </table>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="prc_admin">Prc Admin</label>
                <input type="text" class="form-control" id="prc_admin" name="prc_admin" value="<?= $this->session->userdata('nama_operator') ?>" maxlength="20" readonly>
              </div>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" id="simpan" class="btn btn-primary" onclick="return confirm('Apakah Anda Yakin Untuk Menyimpan Data Ini? Tolong Untuk Di Cek Kembali. Dan Jangan Lupa Untuk Menginputkan Barangnya');">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('#add').on('show.bs.modal', function(event) {

      $(this).find('#tgl_rh').datepicker().on('show.bs.modal', function(event) {
      event.stopImmediatePropagation();
    });
      // Ketika dropdown no_rh berubah
      $("#no_rh").change(function() {
        let no_ppb = $(this).val();

        // Set form type otomatis
        let form_type = $(this).find(":selected").data("jenis_form_ppb");
        $("#a-form_ppb").val(form_type);

        // Load barang via AJAX
        $.ajax({
          url: "<?= base_url('Purchasing/Purchasing_rh/Purchasing_rh/get_barang') ?>",
          type: "POST",
          data: {
            no_ppb: no_ppb
          },
          dataType: "json",
          success: function(data) {
            let html = "";

            if (data.length === 0) {
              html += "<tr><td colspan='6' class='text-center'>Tidak ada data</td></tr>";
            } else {
              $.each(data, function(i, item) {
                html += `
                          <tr>
                            <input type="hidden" name="id_prc_ppb[]" value="${item.id_prc_ppb}">
                            <input type="hidden" name="jumlah_rh[]" value="${item.jumlah_ppb}" id="jumlah_${i}">

                            <td>${item.kode_barang}</td>
                            <td>${item.nama_barang}</td>
                            <td>${item.spek}</td>
                            <td>${item.satuan}</td>
                            <td class="text-center">${item.jumlah_ppb}</td>
                            
                            <td><input
                                  type="text"
                                  name="no_budget[]"
                                  class="form-control"
                                  placeholder="masukan no budget"
                                  required></td>

                            <!-- Input Harga -->
                            <td class="text-center">
                                <input 
                                    type="text" 
                                    class="form-control harga-input" 
                                    data-index="${i}"
                                    name="harga_rh[]"
                                    id="harga_${i}"
                                    placeholder="Masukkan harga"
                                >
                            </td>

                            <!-- Total -->
                            <td class="text-center">
                                <span id="total_view_${i}">Rp 0</span>
                                <input type="hidden" name="total_rh[]" id="total_${i}">
                            </td>
                        </tr>

                      `;
              });

            }

            $("#a-ppb_barang").html(html);
          }
        });

      });

      // Format Rupiah
function formatRupiah(angka) {
    return "Rp " + angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

      // Hitung total
      $(document).on('keyup', '.harga-input', function () {
          let i = $(this).data('index');

          let jumlah = parseInt($("#jumlah_" + i).val());

          // harga asli (angka)
          let raw = $(this).val().replace(/[^0-9]/g, '');
          let harga = parseInt(raw || 0);

          // Hitung total
          let total = jumlah * harga;

          // Tampilkan rupiah di view
          $("#total_view_" + i).text(formatRupiah(total));

          // Format input harga (biar cakep)
          $(this).val(formatRupiah(raw));

          // Simpan angka asli ke hidden input
          $("#total_" + i).val(total);
      });
    });
    
  });
</script>


<div class="modal fade" id="add_budget" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Rincian Harga (Budget)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <input type="hidden" name="id_accounting_ppb_tf" id="a-id_accounting_ppb_tf">
      <form method="post" action="<?= base_url() ?>Purchasing/Purchasing_rh/purchasing_rh/add">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="b-tgl_rh">Tanggal Rincian</label>
                <input type="text" class="form-control datepicker" id="b-tgl_rh" name="tgl_rh" placeholder="Tanggal Rincian" autocomplete="off" required>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="b-no_rh">No Rincian</label>
                <select class="form-control chosen-select" id="b-no_rh" name="no_rh" placeholder="Pilih Nomor Rincian" required>
                  <option value="" disabled selected> - Pilih Nomor Rincian - </option>
                  <?php foreach ($res_ppb as $ppb) : ?>
                    <option
                      value="<?= $ppb['no_ppb'] ?>"
                      data-jenis_form_ppb="<?= $ppb['jenis_form_ppb'] ?>"
                      data-jenis_ppb="<?= $ppb['jenis_ppb'] ?>"><?= $ppb['no_ppb'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="b-form_ppb">Jenis Form</label>
                <input type="text" class="form-control" id="b-form_ppb" name="form_ppb" placeholder="Form A/C" readonly>
              </div>
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
                  <th>No Budget</th>
                  <th class="text-center">Jumlah</th>
                  <th class="text-center">Harga</th>
                  <th class="text-right">Total</th>
                </tr>
              </thead>
              <tbody id="b-ppb_barang"></tbody>
            </table>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="b-prc_admin">Prc Admin</label>
                <input type="text" class="form-control" id="b-prc_admin" name="prc_admin" value="<?= $this->session->userdata('nama_operator') ?>" maxlength="20" readonly>
              </div>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" id="simpan" class="btn btn-primary" onclick="return confirm('Apakah Anda Yakin Untuk Menyimpan Data Ini? Tolong Untuk Di Cek Kembali. Dan Jangan Lupa Untuk Menginputkan Barangnya');">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('#add_budget').on('show.bs.modal', function(event) {

      $(this).find('#b-tgl_rh').datepicker().on('show.bs.modal', function(event) {
      event.stopImmediatePropagation();
    });
      // Ketika dropdown no_rh berubah
      $("#b-no_rh").change(function() {
        let no_ppb = $(this).val();

        // Set form type otomatis
        let form_type = $(this).find(":selected").data("jenis_form_ppb");
        $("#b-form_ppb").val(form_type);

        // Load barang via AJAX
        $.ajax({
          url: "<?= base_url('Purchasing/Purchasing_rh/Purchasing_rh/get_barang') ?>",
          type: "POST",
          data: {
            no_ppb: no_ppb
          },
          dataType: "json",
          success: function(data) {
            let html = "";

            if (data.length === 0) {
              html += "<tr><td colspan='6' class='text-center'>Tidak ada data</td></tr>";
            } else {
              $.each(data, function(i, item) {
                html += `
                          <tr>
                            <input type="hidden" name="id_prc_ppb[]" value="${item.id_prc_ppb}">
                            <input type="hidden" name="jumlah_rh[]" value="${item.jumlah_ppb}" id="b-jumlah_${i}">

                            <td>${item.kode_barang}</td>
                            <td>${item.nama_barang}</td>
                            <td>${item.spek}</td>
                            <td>${item.satuan}</td>
                            <td>${item.no_budget}</td>

                            <td class="text-center">${item.jumlah_ppb}</td>

                            <!-- Input Harga -->
                            <td class="text-center">
                                <input 
                                    type="text" 
                                    class="form-control harga-input" 
                                    data-index="${i}"
                                    name="harga_rh[]"
                                    id="b-harga_${i}"
                                    placeholder="Masukkan harga"
                                >
                            </td>

                            <!-- Total -->
                            <td class="text-center">
                                <span id="b-total_view_${i}">Rp 0</span>
                                <input type="hidden" name="total_rh[]" id="b-total_${i}">
                            </td>
                        </tr>

                      `;
              });

            }

            $("#b-ppb_barang").html(html);
          }
        });

      });

      // Format Rupiah
function formatRupiah(angka) {
    return "Rp " + angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

      // Hitung total
      $(document).on('keyup', '.harga-input', function () {
          let i = $(this).data('index');

          let jumlah = parseInt($("#b-jumlah_" + i).val());

          // harga asli (angka)
          let raw = $(this).val().replace(/[^0-9]/g, '');
          let harga = parseInt(raw || 0);

          // Hitung total
          let total = jumlah * harga;

          // Tampilkan rupiah di view
          $("#b-total_view_" + i).text(formatRupiah(total));

          // Format input harga (biar cakep)
          $(this).val(formatRupiah(raw));

          // Simpan angka asli ke hidden input
          $("#b-total_" + i).val(total);
      });
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
                <label for="v-no_ppb_accounting">No PPB</label>
                <input type="text" class="form-control" id="v-no_ppb_accounting" name="no_ppb_accounting" placeholder="No PPB" readonly>
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
                  <th class="text-right">Jumlah</th>
                  <th>Nama Supplier</th>


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
                <label for="v-nama_admin">Accounting Admin</label>
                <input type="text" class="form-control" id="v-nama_admin" name="nama_admin" placeholder="Admin" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="v-nama_spv">Nama Supervisor</label>
                <input type="text" class="form-control" id="v-nama_spv" name="nama_spv" placeholder="Nama Supervisor" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="v-nama_manager">Nama Manager</label>
                <input type="text" class="form-control" id="v-nama_manager" name="nama_manager" placeholder="Nama Manager" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="v-nama_pm">Nama Plant Manager</label>
                <input type="text" class="form-control" id="v-nama_pm" name="nama_pm" placeholder="Nama Plant Manager" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="v-nama_direktur">Nama Direktur</label>
                <input type="text" class="form-control" id="v-nama_direktur" name="nama_direktur" placeholder="-" readonly>
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
      var no_ppb_accounting = $(event.relatedTarget).data('no_ppb_accounting')
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
        url: "<?= base_url() ?>accounting/accounting_ppb/data_ppb_barang",
        dataType: 'json',
        type: "post",
        data: {
          no_ppb_accounting: no_ppb_accounting
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
                <td>` + data[i].no_budget + `</td>
                <td class="text-right">` + data[i].jumlah + "&nbsp" + data[i].satuan + `</td>
                <td>` + data[i].nama_po_supplier + `</td> 
              </tr>
            `);
          }
        }
      });
    });
  });
</script>