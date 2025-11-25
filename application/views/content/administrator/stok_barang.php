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
                  <li class="breadcrumb-item"><a href="javascript:">Administrasi</a></li>
                  <li class="breadcrumb-item"><a href="<?= base_url('administrator/stok_barang') ?>">Stok Barang</a></li>
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
                          <a href="<?= base_url() ?>administrator/stok_barang" style="width: 40px;" class="btn btn-warning" id="export" type="button"><i class="feather icon-refresh-ccw"></i></a>
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
                            <th>Spesifikasi</th>
                            <th>Satuan</th>
                            <th>In</th>
                            <th>Out</th>
                            <th>Stock</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $level = $this->session->userdata('departement');
                          $jabatan = $this->session->userdata('jabatan');
                          $no = 1;
                          foreach ($result as $k) {
                            $stok = $k['jml_diterima'] - 0;
                          ?>
                            <tr>
                              <th scope="row"><?= $no++ ?></th>
                              <td><?= $k['kode_barang'] ?></td>
                              <td><?= $k['nama_barang'] ?></td>
                              <td><?= $k['spek'] ?></td>
                              <td><?= $k['satuan'] ?></td>
                              <td><?= $k['jml_diterima'] ?? 0 ?></td>
                              <td> 0 </td>
                              <td><?= $stok ?? 0 ?></td>
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






