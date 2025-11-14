<style>
  #mesh_container,
  #bloom_container {
    display: none;
  }

  #e-mesh_container,
  #e-bloom_container {
    display: none;
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
                  <!-- <h5 class="m-b-10">Data Barang</h5> -->
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="feather icon-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="javascript:">Purchasing</a></li>
                  <li class="breadcrumb-item"><a href="javascript:">Master Barang PPB</a></li>
                  <li class="breadcrumb-item"><a href="<?= base_url('purchasing/prc_ppb/prc_ppb_masterbarang') ?>">Master Barang</a></li>
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
                    <h5>Data Barang</h5>
                    <div class="float-right">
                      <div class="input-group">
                        <select class="form-control chosen-select" id="filter_barang" name="filter_barang">
                          <option value="" disabled selected hidden>- Nama Barang -</option>
                          <?php foreach ($res_barang as $nm) { ?>
                            <option <?= $name === $nm['nama_barang'] ? 'selected' : '' ?> value="<?= $nm['nama_barang'] ?>"><?= $nm['nama_barang'] ?></option>
                          <?php } ?>
                        </select>
                        <div class="btn-group">
                          <button class="btn btn-secondary" id="lihat" type="button">Lihat</button>
                        </div>
                        <div class="btn-group">
                          <button class="btn btn-primary" id="export" type="button">Cetak</button>
                        </div>
                        <div class="btn-group">
                          <a href="<?= base_url() ?>purchasing/prc_ppb/prc_ppb_masterbarang" style="width: 40px;" class="btn btn-warning" id="export" type="button"><i class="feather icon-refresh-ccw"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-block table-border-style">
                    <div class="table-responsive">
                      <table class="table datatable table-hover table-striped table-sm">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Jenis Barang</th>
                            <th>Tipe Barang</th>
                            <th>Spesifikasi</th>
                            <th>Satuan</th>
                            <th>Nama Supplier</th>
                            <th class="text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $level = $this->session->userdata('departement');
                          $jabatan = $this->session->userdata('jabatan');
                          $no = 1;
                          foreach ($result as $k) {
                          ?>
                            <tr>
                              <th scope="row"><?= $no++ ?></th>
                              <td><?= $k['kode_barang'] ?></td>
                              <td><?= $k['nama_barang'] ?></td>
                              <td><?= $k['jenis_barang'] ?></td>
                              <td><?= $k['tipe_barang'] ?></td>
                              <td><?= $k['spek'] ?></td>
                              <td><?= $k['satuan'] ?></td>
                              <td><?= $k['nama_supplier'] ?></td>
                              <td class="text-center">
                                <?php if ($level === "admin" || $jabatan === "supervisor") { ?>
                                  <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-primary btn-square btn-sm"
                                      data-toggle="modal"
                                      data-target="#edit"
                                      data-id_prc_master_barang="<?= $k['id_prc_master_barang'] ?>"
                                      data-kode_barang="<?= $k['kode_barang'] ?>"
                                      data-nama_barang="<?= $k['nama_barang'] ?>"
                                      data-jenis_barang="<?= $k['jenis_barang'] ?>"
                                      data-id_prc_master_supplier="<?= $k['id_prc_master_supplier'] ?>"
                                      data-mesh="<?= $k['mesh'] ?>" data-bloom="<?= $k['bloom'] ?>"
                                      data-tipe_barang="<?= $k['tipe_barang'] ?>"
                                      data-spek="<?= $k['spek'] ?>"
                                      data-satuan="<?= $k['satuan'] ?>"
                                      data-departement="<?= $k['departement'] ?>">
                                      <i></i> +
                                    </button>
                                  </div>
                                <?php } ?>
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

<script type="text/javascript">
  $(document).ready(function() {
    $('#lihat').click(function() {
      var filter_nama = $('#filter_barang').find(':selected').val();

      // If filter_nama is empty, show an alert (optional validation)
      if (filter_nama == '') {
        window.location = "<?= base_url() ?>purchasing/prc_ppb/prc_ppb_masterbarang?alert=warning&msg=barang belum dipilih";
        alert("Barang belum dipilih");
      } else {
        const query = new URLSearchParams({
          name: filter_nama
        });
        window.location = "<?= base_url() ?>purchasing/prc_ppb/prc_ppb_masterbarang?" + query.toString();
      }
    });

    $('#export').click(function() {
      var filter_nama = $('#filter_barang').find(':selected').val();

      // If filter_nama is empty, show an alert (optional validation)
      if (filter_nama == '') {
        window.location = "<?= base_url() ?>Purchasing/prc_ppb/Prc_ppb_masterbarang?alert=warning&msg=barang belum dipilih";
        alert("Barang belum dipilih");
      } else {
        const query = new URLSearchParams({
          name: filter_nama
        });
        var url = "<?= base_url() ?>Purchasing/prc_ppb/pdf_prc_ppb_masterbarang?" + query.toString();
        window.open(url, 'location=yes,height=700,width=1300,scrollbars=yes,status=yes');
      }
    });
  });
</script>

< <!-- Modal Edit-->
  <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Supplier</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post" action="<?= base_url() ?>purchasing/prc_ppb/prc_ppb_masterbarang/update">
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="kode_barang">Kode Barang</label>
                  <input type="hidden" id="e-id_prc_master_barang" name="id_prc_master_barang">
                  <input type="text" class="form-control" id="e-kode_barang" name="kode_barang" placeholder="Kode Barang" autocomplete="off" readonly>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="departement">Departement</label>
                  <input class="form-control" id="e-departement" name="departement" readonly>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="jenis_barang">Jenis Barang</label>
                  <input class="form-control" id="e-jenis_barang" name="jenis_barang" readonly>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="nama_barang">Nama Barang</label>
                  <input type="text" class="form-control" id="e-nama_barang" name="nama_barang" placeholder="Nama Barang" autocomplete="off" readonly>
                </div>
              </div>

              <!-- Tambahkan ini -->
              <div class="col-md-3" id="e-mesh_container">
                <div class="form-group">
                  <label for="e-mesh">Mesh</label>
                  <input type="text" class="form-control" id="e-mesh" name="mesh" placeholder="Mesh" autocomplete="off" readonly>
                </div>
              </div>

              <div class="col-md-3" id="e-bloom_container">
                <div class="form-group">
                  <label for="e-bloom">Bloom</label>
                  <input type="text" class="form-control" id="e-bloom" name="bloom" placeholder="Bloom" autocomplete="off" readonly>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="spek">Spesifikasi</label>
                  <input type="text" class="form-control" id="e-spek" name="spek" placeholder="Spesifikasi" autocomplete="off" readonly>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="satuan">Satuan</label>
                  <input class="form-control" id="e-satuan" name="satuan" readonly>
                </div>
              </div>

            </div>
            <hr>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="e-id_prc_ppb_supplier">Nama Supplier</label>
                  <select class="form-control chosen-select" id="e-id_prc_ppb_supplier" name="id_prc_master_supplier" required>
                    <option value="" disabled selected hidden>- Pilih Nama Supplier -</option>
                    <?php foreach ($res_supp as $k): ?>
                      <option value="<?= $k['id_prc_master_supplier'] ?>"><?= $k['nama_supplier'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>


              <div class="col-md-6">
                <div class="form-group">
                  <label for="tipe_barang">Tipe Barang</label>
                  <select class="form-control chosen-select" id="e-tipe_barang" name="tipe_barang" required>
                    <option value="" disabled selected hidden>- Pilih Tipe Barang -</option>
                    <option value="Import">Import</option>
                    <option value="Non Import">Non Import</option>
                  </select>
                </div>
              </div>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" id="simpan" class="btn btn-primary" onclick="if (! confirm('Apakah Anda Yakin Untuk Mengedit Data Ini? Tolong Untuk Di Check Kembali. Dan Jangan Lupa Untuk Menginputkan Barangnya')) { return false; }">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    $(document).ready(function() {

      // 🔹 Saat modal edit ditampilkan
      $('#edit').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var id_prc_master_barang = button.data('id_prc_master_barang');
        var id_prc_ppb_supplier = button.data('id_prc_master_supplier');
        var kode_barang = button.data('kode_barang');
        var nama_barang = button.data('nama_barang');
        var jenis_barang = button.data('jenis_barang');
        var tipe_barang = button.data('tipe_barang');
        var spek = button.data('spek');
        var satuan = button.data('satuan');
        var mesh = button.data('mesh');
        var bloom = button.data('bloom');
        var departement = button.data('departement');

        var modal = $(this);
        modal.find('#e-id_prc_master_barang').val(id_prc_master_barang);
        modal.find('#e-id_prc_ppb_supplier').val(id_prc_ppb_supplier);
        modal.find('#e-kode_barang').val(kode_barang);
        modal.find('#e-nama_barang').val(nama_barang);
        modal.find('#e-jenis_barang').val(jenis_barang);
        modal.find('#e-tipe_barang').val(tipe_barang);
        modal.find('#e-spek').val(spek);
        modal.find('#e-satuan').val(satuan);
        modal.find('#e-mesh').val(mesh);
        modal.find('#e-bloom').val(bloom);
        modal.find('#e-departement').val(departement);

        modal.find('#e-id_prc_ppb_supplier').trigger("chosen:updated");
        modal.find('#e-satuan').trigger("chosen:updated");
        modal.find('#e-jenis_barang').trigger("chosen:updated");
        modal.find('#e-tipe_barang').trigger("chosen:updated");
        modal.find('#e-departement').trigger("chosen:updated");

        $('#e-mesh').on('input', function() {
          this.value = this.value.replace(/[^0-9+]/g, ''); // hanya boleh angka & +
        });

        $('#e-bloom').on('input', function() {
          this.value = this.value.replace(/[^0-9+]/g, ''); // hanya boleh angka & +
        });

        // 🔹 Jalankan toggle logic saat modal dibuka
        toggleEditMeshBloom();
      });

      // 🔹 Function untuk show/hide mesh & bloom
      function toggleEditMeshBloom() {
        let jenis = $('#e-jenis_barang').val();
        if (jenis === 'Bahan Baku') {
          $('#e-mesh_container').slideDown(200);
          $('#e-bloom_container').slideDown(200);
          $('#e-mesh').prop('required', true);
          $('#e-bloom').prop('required', true);
        } else {
          $('#e-mesh_container').slideUp(200);
          $('#e-bloom_container').slideUp(200);
          $('#e-mesh').prop('required', false);
          $('#e-bloom').prop('required', false);
          $('#e-mesh').val('');
          $('#e-bloom').val('');
        }
      }

      // 🔹 Jalankan ketika dropdown jenis barang diubah
      $('#e-jenis_barang').on('change', toggleEditMeshBloom);
    });
  </script>