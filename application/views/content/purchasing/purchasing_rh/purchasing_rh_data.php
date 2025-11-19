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
                          <a href="<?= base_url() ?>Purchasing/purchasing_rh/purchasing_rh" style="width: 40px;" class="btn btn-warning" type="button"><i class="feather icon-refresh-ccw"></i></a>
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
                              <td class="text-center">Rp <?= number_format($k['harga_rh'], 0, ",", ".") ?></td>
                              <td class="text-center"><?= number_format($k['jumlah_rh'], 0, ",", ".") ?></td>

                              <td class="text-center">
                                <?php if ($k['no_rb'] == null) : ?>
                                  <div class="btn-group" role="group" aria-label="Basic example">
                                    <a type="button" class="btn btn-primary btn-square btn-sm text-light"
                                      data-toggle="modal"
                                      data-target="#edit"
                                      data-id_prc_rh="<?= $k['id_prc_rh'] ?>"
                                      data-tgl_rh="<?= $tgl_rh ?>"
                                      data-id_prc_ppb="<?= $k['id_prc_ppb'] ?>"
                                      data-no_ppb="<?= $k['no_ppb'] ?>"><i class="feather icon-file"></i>Edit
                                    </a>
                                  </div>
                                  <div class="btn-group" role="group" aria-label="Basic example">
                                    <a type="button" class="btn btn-danger btn-square text-light btn-sm" href="<?= base_url() ?>purchasing/purchasing_rh/purchasing_rh/delete/<?= str_replace('/', '--', $k['id_prc_rh']) ?>" onclick="if (! confirm('Apakah Anda Yakin?')) { return false; }">
                                      <i class="feather icon-trash-2"></i>Delete
                                    </a>
                                  </div>
                                <?php else : ?>
                                  <span class="text-muted">Proses...</span>
                                <?php endif; ?>
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
        // Function format Rupiah
        function formatAngka(angka) {
          if (!angka) return 'Rp 0';

          // Convert ke number jika string
          var number = parseInt(angka) || 0;

          return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }
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
                            <td class="text-center">${formatAngka(item.jumlah_ppb)}</td>
                            
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
      $(document).on('keyup', '.harga-input', function() {
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
        // Function format Rupiah
        function formatAngka(angka) {
          if (!angka) return 'Rp 0';

          // Convert ke number jika string
          var number = parseInt(angka) || 0;

          return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

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

                            <td class="text-center">${formatRupiah(item.jumlah_ppb)}</td>

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
      $(document).on('keyup', '.harga-input', function() {
        let i = $(this).data('index');

        let jumlah = parseInt($("#jumlah_" + i).val());

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
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Rincian Harga</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>Purchasing/Purchasing_rh/purchasing_rh/update">
        <input type="hidden" name="id_prc_rh" id="e-id_prc_rh">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="tgl_rh">Tanggal Rincian</label>
                <input type="text" class="form-control datepicker" id="e-tgl_rh" name="tgl_rh" placeholder="Tanggal Rincian" autocomplete="off" required>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="no_rh">No Rincian</label>
                <input class="form-control" id="e-no_rh" name="no_rh" placeholder="Pilih Nomor Rincian" readonly>
              </div>
            </div>

            <!-- <div class="col-md-4">
              <div class="form-group">
                <label for="a-form_ppb">Jenis Form</label>
                <input type="text" class="form-control" id="a-form_ppb" name="form_ppb" placeholder="Form A/C" readonly>
              </div>
            </div> -->

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
              <tbody id="e-ppb_barang"></tbody>
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
    $('#edit').on('show.bs.modal', function(event) {
      var id_prc_rh = $(event.relatedTarget).data('id_prc_rh')
      var id_prc_ppb = $(event.relatedTarget).data('id_prc_ppb')
      var tgl_rh = $(event.relatedTarget).data('tgl_rh')
      var no_ppb = $(event.relatedTarget).data('no_ppb')

      $(this).find('#e-tgl_rh').val(tgl_rh);
      $(this).find('#e-no_rh').val(no_ppb);
      $(this).find('#e-id_prc_rh').val(id_prc_rh)

      $(this).find('#e-tgl_rh').datepicker().on('show.bs.modal', function(event) {
        event.stopImmediatePropagation();
      });

      // helper: format tanpa Rp (ribuan dengan titik)
      function formatNumber(n) {
        n = parseInt(n) || 0;
        return n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
      }

      // helper: format rupiah dengan Rp
      function formatRupiahView(n) {
        n = parseInt(n) || 0;
        return "Rp " + n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
      }

      // convert string seperti "2.000" atau "Rp 2.000" -> number
      function toNumber(str) {
        if (str === undefined || str === null) return 0;
        str = String(str);
        // hilangkan semua non digit
        var onlyDigits = str.replace(/[^0-9]/g, '');
        return parseInt(onlyDigits || 0);
      }

        // pastikan handler keyup hanya satu kali terpasang
        $(document).off('keyup', '.harga-input').on('keyup', '.harga-input', function() {

          var jumlahRaw = $("#e-jumlah").val(); // harus ada karena kita akan render hidden jumlah
          var jumlah = toNumber(jumlahRaw);

          var hargaRaw = $(this).val();
          var harga = toNumber(hargaRaw);

          var total = jumlah * harga;

          $("#e-total_view").text(formatRupiahView(total));
          $("#e-total").val(total);

          // tampilkan harga yang rapi pada input
          $(this).val(formatRupiahView(harga));
        });


      // AJAX load barang (di dalam show.bs.modal)
      $.ajax({
        url: "<?= base_url('Purchasing/Purchasing_rh/Purchasing_rh/get_barang') ?>",
        type: "POST",
        data: {
          id_prc_ppb: id_prc_ppb
        },
        dataType: "json",
        success: function(data) {

          if (!data || data.length === 0) {
            $("#e-ppb_barang").html("<tr><td colspan='8' class='text-center'>Tidak ada data</td></tr>");
            return;
          }

          var item = data[0];

          // pastikan jumlah (hidden) ada supaya pembulatan bekerja
          var html = `
            <tr>
              <input type="hidden" name="id_prc_ppb" value="${item.id_prc_ppb}">
              <input type="hidden" name="jumlah_rh" value="${item.jumlah_ppb}" id="e-jumlah">

              <td>${item.kode_barang}</td>
              <td>${item.nama_barang}</td>
              <td>${item.spek}</td>
              <td>${item.satuan || '-'}</td>
              <td class="text-center">${formatNumber(item.jumlah_ppb)}</td>

              <td>
                <input type="text"
                      name="no_budget"
                      class="form-control"
                      placeholder="masukan no budget"
                      value="${item.no_budget || ''}" required>
              </td>

              <td class="text-center">
                <input type="text"
                      class="form-control harga-input"
                      name="harga_rh"
                      value="${ item.harga_rh ? formatRupiahView(item.harga_rh) : 'Rp 0' }"
                      id="e-harga"
                      placeholder="Masukkan harga">
              </td>

              <td class="text-center">
                <span id="e-total_view">${ item.total_rh ? formatRupiahView(item.total_rh) : 'Rp 0' }</span>
                <input type="hidden" name="total_rh" id="e-total" value="${ item.total_rh ? item.total_rh : 0 }">
              </td>
            </tr>
          `;

          $("#e-ppb_barang").html(html);

          // jika sudah ada harga & total pada item (dari DB), pastikan nilai tampil rapi
          if (item.harga_rh) {
            // harga input sudah diisi di atas; total di span sudah diisi
            // tapi untuk safety, kita pastikan hidden total berisi angka
            $("#e-total").val(item.total_rh || 0);
          }
        },
        error: function(xhr, status, err) {
          console.error('AJAX error', err);
          $("#e-ppb_barang").html("<tr><td colspan='8' class='text-center'>Gagal memuat data</td></tr>");
        }
      });
    });
  });
</script>