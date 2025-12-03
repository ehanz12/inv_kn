<style>
  #mesh_container, #bloom_container { display: none; }
  #e-mesh_container, #e-bloom_container { display: none; }
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
                  <li class="breadcrumb-item"><a href="javascript:">Administrator</a></li>
                  <li class="breadcrumb-item"><a href="<?= base_url('administrator/master_barang') ?>">Master Barang</a></li>
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
                          <?php foreach ($fil_barang as $nm) { ?>
                            <option value="<?= $nm['nama_barang'] ?>"><?= $nm['nama_barang'] ?></option>
                          <?php } ?>
                        </select>
                        <select class="form-control chosen-select" id="filter_jenis_barang" name="filter_jenis_barang">
                          <option value="" disabled selected hidden>- Jenis Barang -</option>
                            <option value="Bahan Baku">Bahan Baku</option>
                            <option value="Bahan Tambahan">Bahan Tambahan</option>
                            <option value="Bahan Kemas">Bahan Kemas</option>
                            <option value="Pewarna">Pewarna</option>
                            <option value="Printing">Printing</option>
                            <option value="Bahan Pembantu">Bahan Pembantu</option>
                            <option value="Alat Ukur">Alat Ukur</option>
                        </select>
                        <div class="btn-group">
                          <button class="btn btn-secondary" id="lihat" type="button">Lihat</button>
                        </div>
                        <div class="btn-group">
                          <button class="btn btn-primary" id="export" type="button">Cetak</button>
                        </div>
                        <div class="btn-group">
                          <a href="<?= base_url() ?>administrator/master_barang" style="width: 40px;" class="btn btn-warning" id="export" type="button"><i class="feather icon-refresh-ccw"></i></a>
                        </div>
                        <div class="btn-group">
                          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add">
                            <i class="feather icon-plus"></i>Tambah Data
                          </button>
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
                                    data-id_prc_master_supplier="<?=$k['id_prc_master_supplier']?>" 
                                    data-mesh="<?=$k['mesh']?>" data-bloom="<?=$k['bloom']?>" 
                                    data-tipe_barang="<?= $k['tipe_barang'] ?>"
                                    data-spek="<?= $k['spek'] ?>" 
                                    data-satuan="<?= $k['satuan'] ?>"
                                    data-departement="<?= $k['departement'] ?>>"
                                    data-lab_test="<?= $k['lab_test'] ?>">
                                      <i class="feather icon-edit-2"></i>Edit
                                    </button>
                                  </div>
                                  <div class="btn-group" role="group">
                                    <a href="<?= base_url() ?>purchasing/prc_ppb/prc_ppb_masterbarang/delete/<?= $k['id_prc_master_barang'] ?>" class="btn btn-danger btn-square text-light btn-sm" onclick="if (! confirm('Apakah Anda Yakin?')) { return false; }">
                                      <i class="feather icon-trash-2"></i>Hapus
                                    </a>
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
      var filter_jenis_barang = $('#filter_jenis_barang').find(':selected').val();
      console.log(filter_jenis_barang)
      console.log(filter_nama)
      // If filter_nama is empty, show an alert (optional validation)
      // if (filter_nama != '' || filter_jenis_barang == "") {
      //   window.location = "<?= base_url() ?>administrator/master_barang?alert=warning&msg=Filter belum dipilih";
      // } else {
        const query = new URLSearchParams({
          nama_barang: filter_nama,
          jenis_barang : filter_jenis_barang
        });
        window.location = "<?= base_url() ?>administrator/master_barang/index?" + query.toString();
      // }
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
        var url = "<?= base_url() ?>administrator/master_barang?" + query.toString();
        window.open(url, 'location=yes,height=700,width=1300,scrollbars=yes,status=yes');
      }
    });
  });
</script>


<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>administrator/master_barang/add">
        <div class="modal-body">
          <div class="row">

          <div class="col-md-6">
              <div class="form-group">
                <label for="kode_barang">Kode Barang</label>
                <input type="text" class="form-control" id="kode_barang" name="kode_barang" maxlength="20" placeholder="Kode Barang" aria-describedby="validationServer03Feedback" autocomplete="off" required>
                <div id="validationServer03Feedback" class="invalid-feedback">
                  Maaf Kode Barang sudah ada.
                </div>
              </div>
            </div>
             <div class="col-md-6">
              <div class="form-group">
                <label for="departement">Departement</label>
                <select class="form-control chosen-select" id="departement" name="departement" required>
                  <option value="" disabled selected hidden>- Pilih Departement -</option>
                  <option value="admin">Admin</option>
                  <option value="accounting">Accounting</option>
                  <option value="gudang_bahan_baku">Gudang Bahan Baku</option>
                  <option value="gudang_distribusi">Gudang Distribusi</option>
                  <option value="lab">Lab</option>
                  <option value="melting">Melting</option>
                  <option value="marketing">Marketing</option>
                  <option value="packing">Packing</option>
                  <option value="utility">Utility</option>
                  <option value="stockkeeper">Stock Keeper</option>
                  <option value="ppic">PPIC</option>
                  <option value="forming">Forming</option>
                  <option value="finishing">Finishing</option>
                  <option value="maintenance">Maintenance</option>
                  <option value="workshop">Workshop</option>
                </select>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="lab_test">Pengujian Lab</label>
                <select class="form-control chosen-select" id="lab_test" name="lab_test" required>
                  <option value="" disabled selected hidden>- Butuh Pengujian -</option>
                  <option value="yes">yes</option>
                  <option value="no">no</option>
                  </select>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="jenis_barang">Jenis Barang</label>
                <select class="form-control chosen-select" id="jenis_barang" name="jenis_barang" required>
                  <option value="" disabled selected hidden>- Pilih Jenis Barang -</option>
                  <option value="Bahan Baku">Bahan Baku</option>
                  <option value="Bahan Tambahan">Bahan Tambahan</option>
                  <option value="Bahan Kemas">Bahan Kemas</option>
                  <option value="Pewarna">Pewarna</option>
                  <option value="Printing">Printing</option>
                  <option value="Bahan Pembantu">Bahan Pembantu</option>
                  <option value="Alat Ukur">Alat Ukur</option>
                </select>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama Barang" autocomplete="off">
              </div>
            </div>

            <div class="col-md-3" id="mesh_container">
              <div class="form-group">
                <label for="mesh">Mesh</label>
                <input type="text"  class="form-control" id="mesh" name="mesh" placeholder="Mesh" autocomplete="off">
              </div>
            </div>
            <div class="col-md-3" id="bloom_container">
              <div class="form-group">
                <label for="Bloom">Bloom</label>
                <input type="text"  class="form-control" id="bloom" name="bloom" placeholder="Bloom" autocomplete="off">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="spek">Spesifikasi</label>
                <input type="text" class="form-control" id="spek" name="spek" placeholder="Spesifikasi" autocomplete="off">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="satuan">Satuan</label>
                <select class="form-control chosen-select" id="satuan" name="satuan" required>
                  <option value="" disabled selected hidden>- Pilih Satuan -</option>
                  <option value="Bh">Buah</option>
                  <option value="Set">Set</option>
                  <option value="Pcs">Pcs</option>
                  <option value="Roll">Roll</option>
                  <option value="Mtr">Meter</option>
                  <option value="Klg">Kaleng</option>
                  <option value="Ltr">Liter</option>
                  <option value="Kg">Kg</option>
                  <option value="Grm">Gram</option>
                  <option value="Cm">Centimeter</option>
                  <option value="Cc">Cubic Centimeter</option>
                  <option value="bks">Bungkus</option>
                  <option value="Pack">Package</option>
                  <option value="lbr">Lembar</option> 
                </select>
              </div>
            </div>
          </div>
        
        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" id="simpan" class="btn btn-primary" onclick="if (!confirm('Apakah Anda Yakin Untuk Menyimpan Data Ini? Tolong Untuk Di Check Kembali. Dan Jangan Lupa Untuk Menginputkan Barangnya')) { return false; }">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    $("#kode_barang").keyup(function() {
            var kode_barang = $("#kode_barang").val();
            jQuery.ajax({
                url: "<?= base_url() ?>administrator/master_barang/cek_kode_barang/",
                dataType: 'text',
                type: "post",
                data: {
                    kode_barang: kode_barang
                },
                success: function(response) {
                    if (response == "true") {
                        $("#kode_barang").addClass("is-invalid");
                        $("#simpan").attr("disabled", "disabled");
                    } else {
                        $("#kode_barang").removeClass("is-invalid");
                        $("#simpan").removeAttr("disabled");
                    }
                }
            });
        })

        // 🔹 Logic untuk show/hide input Mesh & Bloom
        function toggleMeshBloom() {
          let jenis = $('#jenis_barang').val();
          if (jenis === 'Bahan Baku') {
            $('#mesh_container').slideDown(200);
            $('#bloom_container').slideDown(200);
            $('#mesh').prop('required', true);
            $('#Bloom').prop('required', true);
          } else {
            $('#mesh_container').slideUp(200);
            $('#bloom_container').slideUp(200);
            $('#mesh').prop('required', false);
            $('#Bloom').prop('required', false);
            $('#mesh').val('');
            $('#Bloom').val('');
          }
        }

         $('#mesh').on('input', function() {
            this.value = this.value.replace(/[^0-9+]/g, ''); // hanya boleh angka & +
        });

         $('#bloom').on('input', function() {
            this.value = this.value.replace(/[^0-9+]/g, ''); // hanya boleh angka & +
        });

        // Jalankan saat dropdown berubah
        $('#jenis_barang').on('change', toggleMeshBloom);

        // Jalankan sekali saat awal (misal kalau edit)
        toggleMeshBloom();
  });
</script>

< <!-- Modal Edit-->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Barang</h5>
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
                <input type="text" class="form-control" id="e-kode_barang" name="kode_barang" placeholder="Kode Barang" autocomplete="off" required>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="departement">Departement</label>
                <select class="form-control chosen-select" id="e-departement" name="departement" required>
                  <option value="" disabled selected hidden>- Pilih Departement -</option>
                  <option value="admin">Admin</option>
                  <option value="accounting">Accounting</option>
                  <option value="gudang_bahan_baku">Gudang Bahan Baku</option>
                  <option value="gudang_distribusi">Gudang Distribusi</option>
                  <option value="lab">Lab</option>
                  <option value="melting">Melting</option>
                  <option value="marketing">Marketing</option>
                  <option value="packing">Packing</option>
                  <option value="utility">Utility</option>
                  <option value="stockkeeper">Stock Keeper</option>
                  <option value="ppic">PPIC</option>
                  <option value="forming">Forming</option>
                  <option value="finishing">Finishing</option>
                  <option value="maintenance">Maintenance</option>
                  <option value="workshop">Workshop</option>
                </select>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="jenis_barang">Jenis Barang</label>
                <select class="form-control chosen-select" id="e-jenis_barang" name="jenis_barang" required>
                  <option value="" disabled selected hidden>- Pilih Jenis Barang -</option>
                  <option value="Bahan Baku">Bahan Baku</option>
                  <option value="Bahan Tambahan">Bahan Tambahan</option>
                  <option value="Bahan Kemas">Bahan Kemas</option>
                  <option value="Pewarna">Pewarna</option>
                  <option value="Printing">Printing</option>
                  <option value="Bahan Pembantu">Bahan Pembantu</option>
                  <option value="Alat Ukur">Alat Ukur</option>
                </select>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                <input type="text" class="form-control" id="e-nama_barang" name="nama_barang" placeholder="Nama Barang" autocomplete="off" required>
              </div>
            </div>

            <!-- Tambahkan ini -->
            <div class="col-md-3" id="e-mesh_container">
              <div class="form-group">
                <label for="e-mesh">Mesh</label>
                <input type="text" class="form-control" id="e-mesh" name="mesh" placeholder="Mesh" autocomplete="off">
              </div>
            </div>

            <div class="col-md-3" id="e-bloom_container">
              <div class="form-group">
                <label for="e-bloom">Bloom</label>
                <input type="text" class="form-control" id="e-bloom" name="bloom" placeholder="Bloom" autocomplete="off">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="spek">Spesifikasi</label>
                <input type="text" class="form-control" id="e-spek" name="spek" placeholder="Spesifikasi" autocomplete="off">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="satuan">Satuan</label>
                <select class="form-control chosen-select" id="e-satuan" name="satuan" required>
                  <option value="" disabled selected hidden>- Pilih Satuan -</option>
                  <option value="Bh">Buah</option>
                  <option value="Set">Set</option>
                  <option value="Pcs">Pcs</option>
                  <option value="Roll">Roll</option>
                  <option value="Mtr">Meter</option>
                  <option value="Klg">Kaleng</option>
                  <option value="Ltr">Liter</option>
                  <option value="Kg">Kg</option>
                  <option value="Grm">Gram</option>
                  <option value="Cm">Centimeter</option>
                  <option value="Cc">Cubic Centimeter</option>
                  <option value="bks">Bungkus</option>
                  <option value="Pack">Package</option>
                  <option value="lbr">Lembar</option>
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
      var lab_test = button.data('lab_test');

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
      modal.find('#e-lab_test').val(lab_test);

      modal.find('#e-id_prc_ppb_supplier').trigger("chosen:updated");
      modal.find('#e-satuan').trigger("chosen:updated");
      modal.find('#e-jenis_barang').trigger("chosen:updated");
      modal.find('#e-tipe_barang').trigger("chosen:updated");
      modal.find('#e-departement').trigger("chosen:updated");
      modal.find('#e-lab_test').trigger("chosen:updated");

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
