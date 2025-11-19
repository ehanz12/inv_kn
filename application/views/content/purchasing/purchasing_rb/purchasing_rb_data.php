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
                  <li class="breadcrumb-item"><a href="<?= base_url('Purchasing/Purchasing_rb/purchasing_rb') ?>">Rencana Belanja</a></li>
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
                    <h5>Data Rencana Belanja</h5>
                    <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#add">
                      <i class="feather icon-user-plus"></i>Tambah Rencana Belanja
                    </button>
                    <!-- <div class="float-right">
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
                    </div> -->
                    <br><br>
                  </div>
                  <div class="card-block table-border-style">
                    <div class="table-responsive">
                      <table class="table datatable table-bordered table-hover table-striped table-sm">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Tanggal RB</th>
                            <th class="text-center">No Rencana Belanja</th>
                            <!-- <th class="text-center">Jumlah Rincian</th> -->
                            <th class="text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $level = $this->session->userdata('departement');
                          $jabatan = $this->session->userdata('jabatan');
                          $no = 1;
                          foreach ($result as $k) {
                            $tgl_rb =  explode('-', $k['tgl_rb'])[2] . "/" . explode('-', $k['tgl_rb'])[1] . "/" . explode('-', $k['tgl_rb'])[0];
                          ?>
                            <tr>
                              <th scope="row"><?= $no++ ?></th>
                                <td><?= $tgl_rb ?></td>
                                <td class="text-center">
                                    <span class="btn btn-sm btn-info"
                                    data-toggle="modal"
                                    data-target="#detail"
                                    data-no_rb="<?= $k['no_rb'] ?>"
                                    data-tgl_rb="<?= $tgl_rb ?>">
                                        <?= $k['no_rb'] ?>
                                    </span>
                                </td>

                              <td class="text-center">
                                <?php if($level == "admin") : ?>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <a type="button" 
                                  class="btn btn-success btn-square btn-sm text-light" 
                                  href="<?= base_url()?>Purchasing/Purchasing_rb/purchasing_rb/print_rb/<?= str_replace('/', '--', $k['no_rb']) ?>"
                                  >
                                  <i class="feather icon-file"></i>Centak
                                  </a>
                                </div>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <button type="button" 
                                  class="btn btn-primary btn-square btn-sm text-light" 
                                  data-toggle="modal"
                                  data-target="#edit"
                                  data-no_rb="<?= $k['no_rb'] ?>"
                                  data-tgl_rb="<?= $tgl_rb ?>">
                                  <i class="feather icon-file"></i>Edit
                                  </button>
                                </div>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <a type="button" class="btn btn-danger btn-square text-light btn-sm" href="<?= base_url() ?>purchasing/purchasing_rb/purchasing_rb/delete/<?= str_replace('/', '--', $k['no_rb']) ?>" onclick="if (! confirm('Apakah Anda Yakin?')) { return false; }">
                                    <i class="feather icon-trash-2"></i>Delete
                                  </a>
                                </div>
                              </td>
                              <?php endif; ?>
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Rencana Belanja</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <input type="hidden" name="id_accounting_ppb_tf" id="a-id_accounting_ppb_tf">
      <form method="post" action="<?= base_url() ?>Purchasing/Purchasing_rb/purchasing_rb/add">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="tgl_rh">Tanggal Rencana</label>
                <input type="text" class="form-control datepicker" id="tgl_rh" name="tgl_rb" placeholder="Tanggal Rincian" autocomplete="off" required>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="no_rh">No Rencana</label>
                <input class="form-control" type="text" id="no_rb" name="no_rb" placeholder="Pilih Nomor Rencana" value="<?= $generate_no_rb ?>" readonly>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="id_prc_rh">Nama barang</label>
                <select  class="form-control chosen-select" id="id_prc_rh" name="id_prc_rh" placeholder="Form A/C" readonly>
                    <option value="">-- Pilih Nama Barang --</option>
                    <?php foreach ($res_barang_rh as $brg) : ?>
                      <option value="<?= $brg['id_prc_rh'] ?>"><?= $brg['nama_barang'] ?> | <?= $brg['kode_barang'] ?></option>
                    <?php endforeach; ?>
                </select>
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
                  <th class="text-center">Harga</th>
                  <th class="text-right">Total</th>
                <th class="text-center">Aksi</th>
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

    // Load barang via AJAX
    $("#id_prc_rh").change(function () {
          // Function format Rupiah
              function formatAngka(angka) {
                  if (!angka) return 'Rp 0';
                  
                  // Convert ke number jika string
                  var number = parseInt(angka) || 0;
                  
                  return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
              }
              function formatRupiah(angka) {
                  if (!angka) return 'Rp 0';
                  
                  // Convert ke number jika string
                  var number = parseInt(angka) || 0;
                  
                  return 'Rp ' + number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
              }
            let id = $(this).val();
            let text = $("#id_prc_rh option:selected").text();

            // Cek duplikat
            let exists = false;
            $("input[name='id_prc_rh[]']").each(function () {
                if ($(this).val() == id) exists = true;
            });

            if (exists) {
                alert("Barang sudah dipilih!");
                return;
            }

            // Disable option di dropdown
            $("#id_prc_rh option[value='" + id + "']").prop("disabled", true);
            $("#id_prc_rh").trigger("chosen:updated");

            // LOAD BARANG VIA AJAX
            $.ajax({
                url: "<?= base_url('Purchasing/Purchasing_rb/Purchasing_rb/get_barang_rh') ?>",
                type: "POST",
                data: { id_prc_rh: id },
                dataType: "json",
                success: function(item) {

                    let html = `
                        <tr data-id="${id}">
                            <input type="hidden" name="id_prc_rh[]" value="${item.id_prc_rh}">

                            <td>${item.kode_barang}</td>
                            <td>${item.nama_barang}</td>
                            <td>${item.spek}</td>
                            <td>${item.satuan}</td>
                            <td class="text-center">${formatAngka(item.jumlah_rh)}</td>
                            <td class="text-center">${formatRupiah(item.harga_rh)}</td>
                            <td class="text-right">${formatRupiah(item.total_rh)}</td>

                            <td class="text-center">
                                <button type="button" 
                                        class="btn btn-danger btn-sm remove-row" 
                                        data-id="${id}">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                    `;

                    $("#a-ppb_barang").append(html);
                }
            });
        });
        $(document).on("click", ".remove-row", function () {
    let id = $(this).data("id");

    // hapus row dari tabel
    $(this).closest("tr").remove();

    // aktifkan kembali option di dropdown
    $("#id_prc_rh option[value='" + id + "']").prop("disabled", false);
    $("#id_prc_rh").trigger("chosen:updated");
});

      });
    });
</script>

<div class="modal fade" id="detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Rencana Belanja</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <input type="hidden" name="id_accounting_ppb_tf" id="a-id_accounting_ppb_tf">
      <form method="post" action="<?= base_url() ?>Purchasing/Purchasing_rb/purchasing_rb/add">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="tgl_rh">Tanggal Rencana</label>
                <input type="text" class="form-control datepicker" id="d-tgl_rh" name="tgl_rb" placeholder="Tanggal Rincian" autocomplete="off" readonly>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="no_rh">No Rencana</label>
                <input class="form-control" type="text" id="d-no_rb" name="no_rb" placeholder="Pilih Nomor Rencana" readonly>
              </div>
            </div>


          </div>

          <div class="table-responsive">
            <table class="table table-bordered table-sm">
              <thead>
                <tr>
                  <th>Kode Barang</th>
                  <th>Nama Barang</th>
                  <th>Nama Supplier</th>
                  <th>No Budget</th>
                  <th>Spek</th>
                  <th>Satuan</th>
                  <th class="text-center">Jumlah</th>
                  <th class="text-center">Harga</th>
                  <th class="text-right">Total</th>
                </tr>
              </thead>
              <tbody id="v-ppb_barang"></tbody>
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
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
 $(document).ready(function() {
    $('#detail').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var no_rb = button.data('no_rb');
        var tgl_rb = button.data('tgl_rb');
        var modal = $(this);
        modal.find('#d-no_rb').val(no_rb);
        modal.find('#d-tgl_rh').val(tgl_rb);

        // Function format Rupiah
        function formatAngka(angka) {
            if (!angka) return 'Rp 0';
            
            // Convert ke number jika string
            var number = parseInt(angka) || 0;
            
            return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }
        // Function format Rupiah
        function formatRupiah(angka) {
            if (!angka) return 'Rp 0';
            
            // Convert ke number jika string
            var number = parseInt(angka) || 0;
            
            return 'Rp ' + number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }
        // Load barang via AJAX
        $.ajax({
            url: "<?= base_url('Purchasing/Purchasing_rb/Purchasing_rb/get_barang_rb') ?>",
            type: "POST",
            data: { no_rb : no_rb },
            dataType: "json",
            success: function(response) {
                console.log(no_rb);
                var $id = $('#v-ppb_barang');
                $id.empty();
                
                if (response && response.length > 0) {
                    response.forEach(function(item) {
                        $id.append(`
                            <tr>
                                <td>${item.kode_barang || ''}</td>
                                <td>${item.nama_barang || ''}</td>
                                <td>${item.nama_supplier || ''}</td>
                                <td>${item.no_budget || ''}</td>
                                <td>${item.spek || ''}</td>
                                <td>${item.satuan || ''}</td>
                                <td class="text-center">${formatAngka(item.jumlah_rh) || '0'}</td>
                                <td class="text-right">${formatRupiah(item.harga_rh) || '0'}&nbsp;</td>
                                <td class="text-right">${formatRupiah(item.total_rh) || '0'}&nbsp;</td>
                            </tr>
                        `);
                    });
                } else {
                    $id.append(`
                        <tr>
                            <td colspan="9" class="text-center">Tidak ada data barang</td>
                        </tr>
                    `);
                }
            },
            error: function(xhr, status, error) {
                console.error("Error:", error);
                alert("Terjadi kesalahan saat memuat data barang");
            }
        });
    });
});
</script>

<!-- ===========================================
     MODAL EDIT RENCANA BELANJA
     =========================================== -->

<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="editLabel">Edit Rencana Belanja</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>

      <form method="post" action="<?= base_url() ?>Purchasing/Purchasing_rb/purchasing_rb/update">

        <div class="modal-body">

          <div class="row">
            <!-- Tanggal -->
            <div class="col-md-4">
              <div class="form-group">
                <label>Tanggal Rencana</label>
                <input type="text" class="form-control datepicker" 
                       id="edit_tgl_rb" name="tgl_rb" autocomplete="off" required>
              </div>
            </div>

            <!-- Nomor RB -->
            <div class="col-md-4">
              <div class="form-group">
                <label>No Rencana</label>
                <input type="text" class="form-control" 
                       id="edit_no_rb" name="no_rb" readonly>
              </div>
            </div>

            <!-- Dropdown Barang -->
            <div class="col-md-4">
              <div class="form-group">
                <label>Nama Barang</label>
                <select class="form-control chosen-select" 
                        id="edit_id_prc_rh" name="edit_id_prc_rh">
                  <option value="">-- Pilih Nama Barang --</option>
                  <?php foreach ($res_barang_rh as $brg) : ?>
                      <option value="<?= $brg['id_prc_rh'] ?>">
                          <?= $brg['nama_barang'] ?> | <?= $brg['kode_barang'] ?>
                      </option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

          </div>

          <!-- TABLE BARANG -->
          <div class="table-responsive">
            <table class="table table-bordered table-sm">
              <thead>
                <tr>
                  <th>Kode Barang</th>
                  <th>Nama Barang</th>
                  <th>Spek</th>
                  <th>Satuan</th>
                  <th>Jumlah</th>
                  <th>Harga</th>
                  <th>Total</th>
                  <th class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody id="edit-ppb_barang"></tbody>
            </table>
          </div>

          <div class="row">
            <div class="col-md-4">
              <label>Prc Admin</label>
              <input type="text" class="form-control" 
                     value="<?= $this->session->userdata('nama_operator') ?>" readonly>
            </div>
          </div>

        </div>

        <div class="modal-footer">
          <button class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button class="btn btn-primary" type="submit"
            onclick="return confirm('Apakah Anda yakin ingin update Rencana Belanja?')">
            Update
          </button>
        </div>
      </form>
    </div>
  </div>
</div>


<script>
$(document).ready(function() {

    // === LOAD DATA EDIT ===
    $("#edit").on("show.bs.modal", function(e){

      function formatRupiah(angka) {
            if (!angka) return 'Rp 0';
            
            // Convert ke number jika string
            var number = parseInt(angka) || 0;
            
            return 'Rp ' + number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }
      function formatAngka(angka) {
            if (!angka) return 'Rp 0';
            
            // Convert ke number jika string
            var number = parseInt(angka) || 0;
            
            return 'Rp ' + number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        let tgl_rb = $(e.relatedTarget).data("tgl_rb");
        $("#edit_tgl_rb").val(tgl_rb);
        let no_rb = $(e.relatedTarget).data("no_rb");
        $("#edit_no_rb").val(no_rb);

        $(this).find('#edit_tgl_rb').datepicker().on('show.bs.modal', function(event) {
          event.stopImmediatePropagation();
        });
        // Clear table
        $("#edit-ppb_barang").html("");

        // Clear disabled options
        $("#edit_id_prc_rh option").prop("disabled", false);

        
        // AJAX load barang lama
        $.ajax({
            url: "<?= base_url('Purchasing/Purchasing_rb/Purchasing_rb/get_barang_rb') ?>",
            type: "POST",
            data: { no_rb:no_rb },
            dataType:"json",
            success:function(data){

                $.each(data, function(i,item){

                    // Disable dropdown for existing
                    $("#edit_id_prc_rh option[value='"+item.id_prc_rh+"']")
                        .prop("disabled", true);

                    let row = `
                        <tr data-id="${item.id_prc_rh}">
                            <input type="hidden" name="id_prc_rh[]" value="${item.id_prc_rh}">

                            <td>${item.kode_barang}</td>
                            <td>${item.nama_barang}</td>
                            <td>${item.spek || ''}</td>
                            <td>${item.satuan}</td>
                            <td class="text-center">${formatAngka(item.jumlah_rh) || '0'}</td>
                            <td class="text-center">${formatRupiah(item.harga_rh)|| '0'}</td>
                            <td class="text-right">${formatRupiah(item.total_rh) || '0'}</td>

                            <td class="text-center">
                                <button type="button" class="btn btn-danger btn-sm edit-remove-row" data-id="${item.id_prc_rh}">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                    `;

                    $("#edit-ppb_barang").append(row);
                });

                $("#edit_id_prc_rh").trigger("chosen:updated");
            }
        });

    });

    
    // === ADD BARANG BARU KE EDIT ===
    $("#edit_id_prc_rh").change(function(){
      
      function formatRupiah(angka) {
            if (!angka) return 'Rp 0';
            
            // Convert ke number jika string
            var number = parseInt(angka) || 0;
            
            return 'Rp ' + number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }
        let id = $(this).val();

        // Check duplicate
        let exist = false;
        $("input[name='id_prc_rh[]']").each(function(){
            if($(this).val() == id) exist = true;
        });

        if (exist){
            alert("Barang ini sudah ada!");
            return;
        }

        // Disable option
        $("#edit_id_prc_rh option[value='"+id+"']").prop("disabled", true);
        $("#edit_id_prc_rh").trigger("chosen:updated");

        // Load barang via AJAX
        $.ajax({
            url: "<?= base_url('Purchasing/Purchasing_rb/Purchasing_rb/get_barang_rh') ?>",
            type: "POST",
            data: { id_prc_rh:id },
            dataType: "json",
            success: function(item){

                let row = `
                    <tr data-id="${id}">
                        <input type="hidden" name="id_prc_rh[]" value="${item.id_prc_rh}">

                        <td>${item.kode_barang}</td>
                        <td>${item.nama_barang}</td>
                        <td>${item.spek || ''}</td>
                        <td>${item.satuan}</td>
                        <td class="text-center">${item.jumlah_rh}</td>
                        <td class="text-center">${formatRupiah(item.harga_rh) || '0'}</td>
                        <td class="text-right">${formatRupiah(item.total_rh) || '0'}</td>

                        <td class="text-center">
                            <button type="button" class="btn btn-danger btn-sm edit-remove-row" data-id="${item.id_prc_rh}">
                                Hapus
                            </button>
                        </td>
                    </tr>
                `;

                $("#edit-ppb_barang").append(row);
            }
        });

    });

    // === REMOVE ROW (RESTORE DROPDOWN OPTION) ===
    $(document).on("click",".edit-remove-row",function(){

        let id = $(this).data("id");

        $(this).closest("tr").remove();

        $("#edit_id_prc_rh option[value='"+id+"']")
            .prop("disabled",false);

        $("#edit_id_prc_rh").trigger("chosen:updated");
    });

});
</script>
