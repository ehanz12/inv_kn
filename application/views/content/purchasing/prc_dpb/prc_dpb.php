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
                  <li class="breadcrumb-item"><a href="javascript:">Purchasing DPB</a></li>
                  <li class="breadcrumb-item"><a href="<?= base_url('purchasing/prc_dpb/prc_dpb') ?>">DPB</a></li>
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
                          <a href="<?= base_url() ?>Purchasing/Prc_dpb/Prc_dpb" style="width: 40px;" class="btn btn-warning" id="export" type="button"><i class="feather icon-refresh-ccw"></i></a>
                        </div>

                        <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#add">
                          <i class="feather icon-plus"></i>Tambah DPB
                        </button>

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
                            <th class="text-center">Tanggal Dpb</th>
                            <th class="text-center">No DPB</th>
                            <th class="text-center">No Surat Jalan</th>

                            <th class="text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $level = $this->session->userdata('departement');

                          $no = 1;
                          foreach ($result as $k) {
                            $tgl_dpb =  explode('-', $k['tgl_dpb'])[2] . "/" . explode('-', $k['tgl_dpb'])[1] . "/" . explode('-', $k['tgl_dpb'])[0];
                            // $tgl_pakai =  explode('-', $k['tgl_pakai'])[2] . "/" . explode('-', $k['tgl_pakai'])[1] . "/" . explode('-', $k['tgl_pakai'])[0];
                            // $formatted_tgl = $tgl[2] . "/" . $tgl[1] . "/" . $tgl[0];
                          ?>
                            <tr>
                              <th scope="row"><?= $no++ ?></th>
                              <td><?= $tgl_dpb ?></td>
                              <td>
                                <span class="btn btn-primary btn-sm"
                                  data-toggle="modal"
                                  data-target="#detail"
                                  data-no_dpb="<?= $k['no_dpb'] ?>"
                                  data-tgl_dpb="<?= $tgl_dpb ?>"
                                  data-no_sjl="<?= $k['no_sjl'] ?>"
                                  data-prc_admin="<?= $k['prc_admin'] ?>"
                                  >
                                  <?= $k['no_dpb'] ?>
                                </span>
                              </td>
                              <td><?= $k['no_sjl'] ?></td>
                              <td class="text-center">
                                <?php if ($level === "admin") { ?>
                                  <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button"
                                      class="btn btn-primary btn-square btn-sm text-light"
                                      data-toggle="modal"
                                      data-target="#edit"
                                      data-no_dpb="<?= $k['no_dpb'] ?>"
                                      data-tgl_dpb="<?= $tgl_dpb ?>"
                                      data-no_sjl="<?= $k['no_sjl'] ?>"
                                      data-prc_admin="<?= $k['prc_admin'] ?>"
                                      data-rincian='<?= json_encode($k["detail_barang"]) ?>'>
                                      <i class="fas fa-edit"></i>Edit
                                    </button>
                                  </div>
                                  <div class="btn-group" role="group" aria-label="Basic example">
                                    <a type="button" class="btn btn-danger btn-square btn-sm text-light" href="<?= base_url() ?>purchasing/prc_dpb/prc_dpb/delete/<?= str_replace('/', '--', $k['no_dpb']) ?>"
                                      onclick="return confirm('apakah kamu ingin menghapusnya?')">
                                      <i class="feather icon-trash"></i>Hapus
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
  $(document).ready(function() {
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
      var filter_tgl = $('#filter_tgl').val();
      var filter_tgl2 = $('#filter_tgl2').val();
      if (filter_tgl == '' || filter_tgl2 == '') {
        alert('Pilih kedua tanggal untuk melihat data.');
      } else {
        window.location.href = "<?= base_url() ?>Account/Account_ppbfilter_tg=" + filter_tgl + "&filter_tgl2=" + filter_tgl2;
      }
    });
  });
</script>

<!-- Modal -->





<!-- Modal ADD -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah data DPB</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>purchasing/prc_dpb/prc_dpb/add">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label for="tgl_dpb">Tanggal DPB</label>
                <input autocomplete="off" class="form-control datepicker" id="tgl_dpb" name="tgl_dpb" placeholder="Tanggal DPB" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="no_dpb">No DPB</label>
                <input type="text" class="form-control" id="no_dpb" name="no_dpb" autocomplete="off" placeholder="No DPB" value="<?= $generate_no_dpb ?>" maxlength="20" readonly>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="no_sjl">No surat Jalan</label>
                <input type="text" class="form-control" id="no_sjl" name="no_sjl" placeholder="Masukan NO Surat" required autocomplete="off">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="no_rb">No RB</label>
                <select class="form-control chosen-select" id="no_rb" name="no_rb" placeholder="No RB" required>
                  <option value="" disabled selected hidden> - Pilih No RB -</option>
                  <?php foreach ($res_rb as $rb) : ?>
                    <option value="<?= $rb['no_rb'] ?>"><?= $rb['no_rb'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="no_budget">No Budget</label>
                <select type="text" class="form-control chosen-select" id="no_budget" name="no_budget" placeholder="Tanggal PPB" required>
                  <option value="" disabled selected hidden> - Pilih No Budget</option>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="kode_barang">Kode Barang</label>
                <input type="text" class="form-control" id="kode_barang" name="kode_barang" placeholder="Kode Barang" readonly autocomplete="off">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama barang" readonly autocomplete="off">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="spek">Speksifikasi</label>
                <input type="text" class="form-control" id="spek" name="spek" placeholder="Spek Barang" readonly autocomplete="off">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="jumlah_barang">jumlah</label>
                <input type="text" class="form-control" id="jumlah_barang" name="jumlah_barang" placeholder="Jumlah Barang" readonly autocomplete="off">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="satuan">Satuan</label>
                <input type="text" class="form-control" id="satuan" name="satuan" placeholder="Satuan Barang" readonly autocomplete="off">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="jml_beli">Jumlah Beli</label>
                <input type="text" class="form-control" id="jml_beli" placeholder="Masukan Jumlah" required autocomplete="off">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="jml_materi">Jumlah Materi</label>
                <input type="text" class="form-control" id="jml_materi" placeholder="Masukan jumlah" required autocomplete="off">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="jml_ongkir">Jumlah Ongkir</label>
                <input type="text" class="form-control" id="jml_ongkir" placeholder="Masukan jumlah" required autocomplete="off">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="jml_ppn">Jumlah PPN</label>
                <input type="text" class="form-control" id="jml_ppn" placeholder="Masukan jumlah" required autocomplete="off">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="jml_disc">Jumlah Disc</label>
                <input type="text" class="form-control" id="jml_disc" placeholder="Masukan jumlah" required autocomplete="off">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="total">Total</label>
                <input type="text" class="form-control" id="total" name="total" placeholder="Jumlah" readonly autocomplete="off">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="no_po">No Po</label>
                <input type="text" class="form-control" id="no_po" placeholder="No Po" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="jenis_bayar">Jenis Bayar</label>
                <select class="form-control chosen-select" id="jenis_bayar" placeholder="Jenis Bayar" required>
                  <option value=""> - Pilih Jenis Bayar - </option>
                  <option value="T">T</option>
                  <option value="K">K</option>
                </select>
              </div>
            </div>
            <div class="col-md-2">
              <label>&nbsp;</label>
              <button type="button" id="btnInputBarang" class="btn btn-primary btn-block mb-3">
                Input Barang
              </button>
            </div>
          </div>
          <div class="row">
            <div class="table-responsive">
              <table class="table table-bordered table-sm">
                <thead>
                  <tr>
                    <th>No Budget</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>No PO</th>
                    <th>Jenis Bayar</th>
                    <th class="text-center">Jml Beli</th>
                    <th class="text-center">Jml materi</th>
                    <th class="text-center">Jml Ongkir</th>
                    <th class="text-center">Jml PPN</th>
                    <th class="text-center">Jml Disc</th>
                    <th class="text-right">Total</th>
                    <th class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody id="a-ppb_barang"></tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" id="simpan" class="btn btn-primary"
            onclick="if (! confirm('Apakah Anda Yakin Untuk Menimpan Data Ini? Tolong Untuk Di Check Kembali. Dan Jangan Lupa Untuk Menginputnya')) { return false; }">Simpan</button>
        </div>
    </div>
    </form>
  </div>
</div>
</div>

<script type="text/javascript">
  $(document).ready(function() {

    // -----------------------------
    // LOAD NO BUDGET BERDASARKAN NO RB
    // -----------------------------
    $('#no_rb').on('change', function() {
      const no_rb = $(this).val();

      $('#no_budget').html('<option disabled selected hidden>Loading...</option>')
        .trigger("chosen:updated");

      $.ajax({
        url: "<?= base_url('purchasing/prc_dpb/prc_dpb/get_by_no_rb') ?>",
        type: "POST",
        data: {
          no_rb: no_rb
        },
        dataType: "json",
        success: function(data) {

          $('#no_budget').empty()
            .append('<option value="" disabled selected hidden>- Pilih No Budget -</option>');

          $.each(data, function(i, item) {
            $('#no_budget').append(`
            <option 
              value="${item.no_budget}"
              data-kode_barang="${item.kode_barang}"
              data-nama_barang="${item.nama_barang}"
              data-spek="${item.spek}"
              data-satuan="${item.satuan}"
              data-jumlah_rh="${item.jumlah_rh}"
              data-id_prc_rb="${item.id_prc_rb}"
            >
              ${item.no_budget}
            </option>
          `);
          });

          $('#no_budget').trigger("chosen:updated");
        }
      });
    });


    // --------------------------------------
    // AMBIL DETAIL BARANG DARI NO BUDGET
    // --------------------------------------
    $('#no_budget').on('change', function() {
      let selected = $(this).find('option:selected');
      $('#kode_barang').val(selected.data('kode_barang') || '');
      $('#nama_barang').val(selected.data('nama_barang') || '');
      $('#jumlah_barang').val(selected.data('jumlah_rh') || '');
      $('#satuan').val(selected.data('satuan') || '');
      $('#spek').val(selected.data('spek') || '');
    });


    // --------------------------------------
    // INPUT BARANG KE TABEL
    // --------------------------------------
    $('#btnInputBarang').on('click', function() {

      let selected = $('#no_budget').find('option:selected');
      let no_budget = selected.val();

      if (!no_budget) {
        alert("Pilih No Budget dulu!");
        return;
      }

      // Ambil input user
      let jml_beli = $('#jml_beli').val();
      let jml_materi = $('#jml_materi').val();
      let jml_ongkir = $('#jml_ongkir').val();
      let jml_ppn = $('#jml_ppn').val();
      let jml_disc = $('#jml_disc').val();
      let no_po = $('#no_po').val();
      let jenis_bayar = $('#jenis_bayar').val();

      if (!jml_beli || !jml_materi || !jml_ongkir || !jml_ppn || !jml_disc || !no_po || !jenis_bayar) {
        alert("Mohon isi semua jumlah terlebih dahulu.");
        return;
      }

      // Hitung total
      let total =
        convert(jml_beli) +
        convert(jml_ongkir) +
        convert(jml_ppn) -
        convert(jml_disc);

      // --------------------------------------
      // CEK DUPLIKAT
      // --------------------------------------
      let duplikat = false;
      $('#a-ppb_barang tr').each(function() {
        let existing_budget = $(this).find('td:eq(0)').text().trim();
        if (existing_budget === no_budget) {
          duplikat = true;
        }
      });

      if (duplikat) {
        alert("No Budget ini sudah ditambahkan!");
        return;
      }

      // --------------------------------------
      // MASUKKAN KE TABEL
      // --------------------------------------
      $('#a-ppb_barang').append(`
      <tr>
        <input type="hidden" name="id_prc_rb[]" value="${selected.data('id_prc_rb')}">
        <input type="hidden" name="jml_beli[]" value="${jml_beli}">
        <input type="hidden" name="jml_ongkir[]" value="${jml_ongkir}">
        <input type="hidden" name="jml_materi[]" value="${jml_materi}">
        <input type="hidden" name="jml_ppn[]" value="${jml_ppn}">
        <input type="hidden" name="jml_disc[]" value="${jml_disc}">
        <input type="hidden" name="jenis_bayar[]" value="${jenis_bayar}">
        <input type="hidden" name="no_po[]" value="${no_po}">
        <td>${no_budget}</td>
        <td>${selected.data('kode_barang')}</td>
        <td>${selected.data('nama_barang')}</td>
        <td>${no_po}</td>
        <td>${jenis_bayar}</td>
        <td>${jml_beli}</td>
        <td>${jml_materi}</td>
        <td>${jml_ongkir}</td>
        <td>${jml_ppn}</td>
        <td>${jml_disc}</td>
        <td class="text-right">${formatRupiah(total)}</td>
        <td class="text-center">
          <button type="button" class="btn btn-danger btn-sm btn-hapus">Hapus</button>
        </td>
      </tr>
    `);

    });

    // --------------------------------------
    // HAPUS BARIS
    // --------------------------------------
    $(document).on('click', '.btn-hapus', function() {
      $(this).closest('tr').remove();
    });

    // --------------------------------------
    // FUNGSI BANTUAN
    // --------------------------------------
    function convert(v) {
      return Number(v.replace(/\./g, '').replace(/,/g, '')) || 0;
    }

    function formatRupiah(v) {
      return new Intl.NumberFormat('id-ID').format(v);
    }

    document.getElementById('jml_beli', 'jml_ongkir', 'jml_ppn', 'jml_materi', 'jml_disc').addEventListener('keyup', function(e) {
        let value = this.value.replace(/\D/g, '');
        value = new Intl.NumberFormat('id-ID').format(value);
        this.value = value;
    });
    document.getElementById('jml_ongkir').addEventListener('keyup', function(e) {
        let value = this.value.replace(/\D/g, '');
        value = new Intl.NumberFormat('id-ID').format(value);
        this.value = value;
    });
    document.getElementById('jml_ppn').addEventListener('keyup', function(e) {
        let value = this.value.replace(/\D/g, '');
        value = new Intl.NumberFormat('id-ID').format(value);
        this.value = value;
    });
    document.getElementById( 'jml_materi').addEventListener('keyup', function(e) {
        let value = this.value.replace(/\D/g, '');
        value = new Intl.NumberFormat('id-ID').format(value);
        this.value = value;
    });
    document.getElementById('jml_disc').addEventListener('keyup', function(e) {
        let value = this.value.replace(/\D/g, '');
        value = new Intl.NumberFormat('id-ID').format(value);
        this.value = value;
    });
  });
</script>


<!-- Modal Detail -->
<div class="modal fade" id="detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail data DPB</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>purchasing/prc_dpb/prc_dpb/add">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label for="tgl_dpb">Tanggal DPB</label>
                <input autocomplete="off" class="form-control datepicker" id="d-tgl_dpb" name="tgl_dpb" placeholder="Tanggal DPB" readonly>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="no_dpb">No DPB</label>
                <input type="text" class="form-control" id="d-no_dpb" name="no_dpb" autocomplete="off" placeholder="No DPB" maxlength="20" readonly>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="no_sjl">No surat Jalan</label>
                <input type="text" class="form-control" id="d-no_sjl" name="no_sjl" placeholder="Masukan NO Surat" readonly autocomplete="off">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="table-responsive">
              <table class="table table-bordered table-sm">
                <thead>
                  <tr>
                    <th>No Budget</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>No PO</th>
                    <th>Jenis Bayar</th>
                    <th class="text-center">Jml Beli</th>
                    <th class="text-center">Jml Ongkir</th>
                    <th class="text-center">Jml Materi</th>
                    <th class="text-center">Jml PPN</th>
                    <th class="text-center">Jml Disc</th>
                    <th class="text-center">Total</th>
                  </tr>
                </thead>
                <tbody id="v-ppb_barang"></tbody>
              </table>
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
    $('#detail').on('show.bs.modal', function(event) {
      var no_dpb = $(event.relatedTarget).data('no_dpb');
      var tgl_dpb = $(event.relatedTarget).data('tgl_dpb');
      var jenis_bayar = $(event.relatedTarget).data('jenis_bayar');
      var no_sjl = $(event.relatedTarget).data('no_sjl');
      $(this).find('#d-no_sjl').val(no_sjl);
      $(this).find('#d-jenis_bayar').val(jenis_bayar);
      $(this).find('#d-tgl_dpb').val(tgl_dpb);
      $(this).find('#d-no_dpb').val(no_dpb);
      $.ajax({
        url: "<?= base_url('purchasing/prc_dpb/prc_dpb/get_by_no_dpb') ?>",
        dataType: "json",
        type: "POST",
        data: {
          no_dpb: no_dpb
        },
        success: function(data) {
          var $id = $('#v-ppb_barang');
          $id.empty();
          for (var i = 0; i < data.length; i++) {
            $id.append(`
              <tr>
                <td>` + data[i].no_budget + `</td>
                <td>` + data[i].kode_barang + `</td>
                <td>` + data[i].nama_barang + `</td>
                <td>` + data[i].no_po + `</td>
                <td>` + data[i].jenis_bayar + `</td>
                
                <td>` + data[i].jml_beli + `</td>
                <td>` + data[i].jml_ongkir + `</td>
                <td>` + data[i].jml_materi + `</td>
                <td>` + data[i].jml_ppn + `</td>
                <td>` + data[i].jml_disc + `</td>
                <td class="text-right">` + data[i].total + "&nbsp" + `</td>
              </tr>
            `);
          }
        },
        error: function() {
          alert('Gagal memuat data PO.');
        }
      });
    });
  });
</script>

<!-- <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit data DPB</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>purchasing/prc_dpb/prc_dpb/update">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label for="tgl_dpb">Tanggal DPB</label>
                <input autocomplete="off" class="form-control datepicker" id="e-tgl_dpb" name="tgl_dpb" placeholder="Tanggal DPB" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="no_dpb">No DPB</label>
                <input type="text" class="form-control" id="e-no_dpb" name="no_dpb" autocomplete="off" placeholder="No DPB" value="<?= $generate_no_dpb ?>" maxlength="20" readonly>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="no_sjl">No surat Jalan</label>
                <input type="text" class="form-control" id="e-no_sjl" name="no_sjl" placeholder="Masukan NO Surat" required autocomplete="off">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="no_rb">No RB</label>
                <select class="form-control chosen-select" id="e-no_rb" name="no_rb" placeholder="No RB" required>
                  <option value="" disabled selected hidden> - Pilih No RB -</option>
                  <?php foreach ($res_rb as $rb) : ?>
                    <option value="<?= $rb['no_rb'] ?>"><?= $rb['no_rb'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="no_budget">No Budget</label>
                <select type="text" class="form-control chosen-select" id="e-no_budget" name="no_budget" placeholder="Tanggal PPB" required>
                  <option value="" disabled selected hidden> - Pilih No Budget</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
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
                    <th class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody id="e-ppb_barang"></tbody>
              </table>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="jenis_bayar">No Po</label>
                <input class="form-control" id="e-no_po" name="no_po" placeholder="No Po" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="jenis_bayar">Jenis Bayar</label>
                <select class="form-control chosen-select" id="e-jenis_bayar" name="jenis_bayar" placeholder="No RB" required>
                  <option value=""> - Pilih Jenis Bayar - </option>
                  <option value="T">T</option>
                  <option value="K">K</option>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="jml_beli">Jumlah Beli</label>
                <input type="text" class="form-control" id="e-jml_beli" name="jml_beli" placeholder="Masukan Jumlah" required autocomplete="off">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="jml_materi">Jumlah Materi</label>
                <input type="text" class="form-control" id="e-jml_materi" name="jml_materi" placeholder="Masukan jumlah" required autocomplete="off">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="jml_ongkir">Jumlah Ongkir</label>
                <input type="text" class="form-control" id="e-jml_ongkir" name="jml_ongkir" placeholder="Masukan jumlah" required autocomplete="off">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="jml_ppn">Jumlah PPN</label>
                <input type="text" class="form-control" id="e-jml_ppn" name="jml_ppn" placeholder="Masukan jumlah" required autocomplete="off">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="jml_disc">Jumlah Disc</label>
                <input type="text" class="form-control" id="e-jml_disc" name="jml_disc" placeholder="Masukan jumlah" required autocomplete="off">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="total">Total</label>
                <input type="text" class="form-control" id="total" name="total" placeholder="Jumlah" readonly autocomplete="off">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" id="simpan" class="btn btn-primary"
            onclick="if (! confirm('Apakah Anda Yakin Untuk Menimpan Data Ini? Tolong Untuk Di Check Kembali. Dan Jangan Lupa Untuk Menginputnya')) { return false; }">Simpan</button>
        </div>
    </div>
    </form>
  </div>
</div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('#edit').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget);
      // Ambil data dari tombol
      var no_dpb = button.data('no_dpb');
      var tgl_dpb = button.data('tgl_dpb');
      var no_sjl = button.data('no_sjl');
      var jenis_bayar = button.data('jenis_bayar');
      var no_po = button.data('no_po');
      var rincian = button.data('rincian');

      var modal = $(this);

      // Set nilai ke input modal
      modal.find('#e-no_dpb').val(no_dpb);
      modal.find('#e-no_dpb_old').val(no_dpb);
      modal.find('#e-tgl_dpb').val(tgl_dpb);
      modal.find('#e-no_sjl').val(no_sjl);
      modal.find('#e-jenis_bayar').val(jenis_bayar);
      modal.find('#e-no_po').val(no_po);

      // Hapus table sebelumnya
      $('#e-ppb_barang').html('');

      // Tambahkan row detail barang yang sudah ada
      // rincian.forEach(function(item) {
      //   $('#e-ppb_barang').append(`
      //       <tr>
      //           <input type="hidden" name="id_prc_rb[]" value="${item.id_prc_rb}">
      //           <td>${item.no_budget}</td>
      //           <td>${item.nama_barang}</td>
      //           <td>${item.spek}</td>
      //           <td>${item.satuan}</td>
      //           <td class="text-center">${item.jumlah}</td>
      //           <td>${item.no_budget}</td>
      //           <td class="text-center">${item.harga}</td>
      //           <td class="text-right">${item.total}</td>
      //           <td class="text-center">
      //               <button type="button" class="btn btn-danger btn-sm btn-hapus">Hapus</button>
      //           </td>
      //       </tr>
      //   `);
      // });
    });
  })
</script> -->