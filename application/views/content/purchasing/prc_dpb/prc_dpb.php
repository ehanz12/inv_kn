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
                            <th class="text-center">Jenis Bayar</th>
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
                              <td><?= $k['no_dpb'] ?></td>
                              <td><?= $k['jenis_bayar'] ?></td>
                              <td><?= $k['no_sjl'] ?></td>
                              <td class="text-center">
                                <?php if ($level === "admin") { ?>
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
                <tbody id="a-ppb_barang"></tbody>
              </table>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="jenis_bayar">No Po</label>
                <input class="form-control" id="no_po" name="no_po" placeholder="No Po" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="jenis_bayar">Jenis Bayar</label>
                <select class="form-control chosen-select" id="jenis_bayar" name="jenis_bayar" placeholder="No RB" required>
                  <option value=""> - Pilih Jenis Bayar - </option>
                  <option value="T">T</option>
                  <option value="K">K</option>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="jml_beli">Jumlah Beli</label>
                <input type="text" class="form-control" id="jml_beli" name="jml_beli" placeholder="Masukan Jumlah" required autocomplete="off">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="jml_materi">Jumlah Materi</label>
                <input type="text" class="form-control" id="jml_materi" name="jml_materi" placeholder="Masukan jumlah" required autocomplete="off">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="jml_ongkir">Jumlah Ongkir</label>
                <input type="text" class="form-control" id="jml_ongkir" name="jml_ongkir" placeholder="Masukan jumlah" required autocomplete="off">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="jml_ppn">Jumlah PPN</label>
                <input type="text" class="form-control" id="jml_ppn" name="jml_ppn" placeholder="Masukan jumlah" required autocomplete="off">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="jml_disc">Jumlah Disc</label>
                <input type="text" class="form-control" id="jml_disc" name="jml_disc" placeholder="Masukan jumlah" required autocomplete="off">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="no_sjl">No surat Jalan</label>
                <input type="text" class="form-control" id="no_sjl" name="no_sjl" placeholder="Masukan NO Surat" required autocomplete="off">
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
    $('#add').on('show.bs.modal', function(event) {

      $('#no_rb').on('change', function() {
        const no_rb = $(this).val();

        $('#no_budget').html('<option disabled selected hidden>Loading...</option>').trigger("chosen:updated");
        $.ajax({
          url: "<?= base_url('purchasing/prc_dpb/prc_dpb/get_by_no_rb') ?>",
          type: "POST",
          data: {
            no_rb: no_rb
          },
          dataType: "json",
          success: function(data) {
            $('#no_budget').empty().append('<option value="" disabled selected hidden>- Pilih No Budget -</option>');

            $.each(data, function(i, item) {
              $('#no_budget').append(`
              <option value="${item.no_budget}"
              data-nama_barang="${item.nama_barang}"
              data-spek="${item.spek}"
              data-satuan="${item.satuan}"
              data-harga_rh="${item.harga_rh}"
              data-jumlah_rh="${item.jumlah_rh}"
              data-total_rh="${item.total_rh}"
              data-id_prc_rb="${item.id_prc_rb}"
              ">
              ${item.no_budget}
            </option>
            `);
            });
            $('#no_budget').trigger("chosen:updated");
          },
          error: function() {
            alert('Gagal memuat data PO.');
          }
        });
      });
      $(this).find('#tgl_dpb').datepicker().on('show.bs.modal', function(event) {
        event.stopImmediatePropagation();
      });

      $('#no_budget').on('change', function() {
          let selected = $(this).find('option:selected');

          let no_budget = selected.val();
          let id_prc_rb = selected.data('id_prc_rb');
          let nama_barang = selected.data('nama_barang');
          let spek = selected.data('spek');
          let satuan = selected.data('satuan');
          let harga = selected.data('harga_rh');
          let jumlah = selected.data('jumlah_rh');
          let total = selected.data('total_rh');

          let duplikat = false;

          $('#a-ppb_barang tr').each(function() {
              let existingNoBudget = $(this).find('td:eq(0)').text(); 
              if (existingNoBudget === no_budget) {
                  duplikat = true;
              }
          });

          if (duplikat) {
              alert("No Budget ini sudah ditambahkan!");
              return;
          }

          // =============================
          // TAMBAH ROW BARU
          // =============================
          $('#a-ppb_barang').append(`
              <tr>
                  <input type="hidden" id="id_prc_rb" name="id_prc_rb[]" value="${id_prc_rb}">
                  <td>${no_budget}</td>
                  <td>${nama_barang}</td>
                  <td>${spek}</td>
                  <td>${satuan}</td>
                  <td class="text-center">${jumlah}</td>
                  <td>${no_budget}</td>
                  <td class="text-center">${harga}</td>
                  <td class="text-right">${total}</td>
                  <td class="text-center">
                      <button type="button" class="btn btn-danger btn-sm btn-hapus">Hapus</button>
                  </td>
              </tr>
          `);
      });

      $(document).on('click', '.btn-hapus', function() {
        $(this).closest('tr').remove();
      });

      document.getElementById('jml_beli').addEventListener('keyup', function(e) {
        let value = this.value.replace(/\D/g, '');
        value = new Intl.NumberFormat('id-ID').format(value);
        this.value = value;
      });
      document.getElementById('jml_materi').addEventListener('keyup', function(e) {
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
      document.getElementById('jml_disc').addEventListener('keyup', function(e) {
        let value = this.value.replace(/\D/g, '');
        value = new Intl.NumberFormat('id-ID').format(value);
        this.value = value;
      });
    })
  });
</script>

<!-- Modal Edit -->