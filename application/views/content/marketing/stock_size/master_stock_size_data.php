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
                  <!-- <h5 class="m-b-10">Data Master Stock Size</h5> -->
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="feather icon-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="javascript:">Marketing</a></li>
                  <li class="breadcrumb-item"><a href="<?= base_url('Marketing/master/Master_stock') ?>">Master Stock
                      Size</a></li>
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
                    <h5>Data Master Stock Size</h5>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal"
                      data-target="#add">
                      <i class="feather icon-plus"></i> Tambah Stock Size
                    </button>
                  </div>
                  <div class="card-block table-border-style">

                    <!-- Alert dari URL parameter -->
                    <?php if (isset($_GET['alert']) && isset($_GET['msg'])): ?>
                      <div
                        class="alert alert-<?= $_GET['alert'] == 'success' ? 'success' : 'danger' ?> alert-dismissible fade show">
                        <i
                          class="feather <?= $_GET['alert'] == 'success' ? 'icon-check-circle' : 'icon-alert-triangle' ?>"></i>
                        <?= $_GET['msg'] ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    <?php endif; ?>

                    <div class="table-responsive">
                      <table class="table datatable table-hover table-striped table-sm">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Bulan Stock</th>
                            <th>Tahun Stock</th>
                            <th>Dibuat Pada</th>
                            <th class="text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $level = $this->session->userdata('level');
                          $no = 1;
                          if (!empty($result)) {
                            foreach ($result as $k) {
                              $bulanNames = [
                                'January',
                                'February',
                                'March',
                                'April',
                                'May',
                                'June',
                                'July',
                                'August',
                                'September',
                                'October',
                                'November',
                                'December'
                              ];
                              $bulanName = isset($bulanNames[$k['stok_bulan'] - 1]) ? $bulanNames[$k['stok_bulan'] - 1] : 'Unknown';
                              ?>
                              <tr>
                                <th scope="row"><?= $no++ ?></th>
                                <td><span class="badge badge-primary"><?= $bulanName ?></span></td>
                                <td><span class="badge badge-info"><?= $k['tahun_stok'] ?></span></td>
                                <td><?= date('d/m/Y H:i', strtotime($k['created_at'])) ?></td>
                                <td class="text-center">
                                  <?php if ($level === "admin") { ?>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                      <button type="button" class="btn btn-info btn-square btn-sm" data-toggle="modal"
                                        data-target="#edit" data-id_master_stok_size="<?= $k['id_master_stok_size'] ?>"
                                        data-stok_bulan="<?= $k['stok_bulan'] ?>" data-tahun_stok="<?= $k['tahun_stok'] ?>">
                                        <i class="feather icon-edit-2"></i> Edit
                                      </button>
                                    </div>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                      <a type="button" class="btn btn-danger btn-square text-light btn-sm"
                                        href="<?= base_url() ?>Marketing/master/Master_stock/delete/<?= $k['id_master_stok_size'] ?>"
                                        onclick="if (! confirm('Apakah Anda Yakin?')) { return false; }">
                                        <i class="feather icon-trash-2"></i> Hapus
                                      </a>
                                    </div>
                                  <?php } ?>
                                </td>
                              </tr>
                            <?php
                            }
                          } else { ?>
                            <tr>
                              <td colspan="5" class="text-center py-4">
                                <i class="feather icon-inbox" style="font-size: 48px; color: #ccc;"></i>
                                <p class="text-muted mt-2">Belum ada data stock size</p>
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

<!-- Modal Tambah -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Stock Size</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>Marketing/master/Master_stock/add">
        <div class="modal-body">
          <div class="form-group">
            <label for="stok_bulan">Bulan Stock</label>
            <select class="form-control" id="stok_bulan" name="stok_bulan" required>
              <option value="">- Pilih Bulan -</option>
              <option value="1">January</option>
              <option value="2">February</option>
              <option value="3">March</option>
              <option value="4">April</option>
              <option value="5">May</option>
              <option value="6">June</option>
              <option value="7">July</option>
              <option value="8">August</option>
              <option value="9">September</option>
              <option value="10">October</option>
              <option value="11">November</option>
              <option value="12">December</option>
            </select>
          </div>
          <div class="form-group">
            <label for="tahun_stok">Tahun Stock</label>
            <input type="number" class="form-control" id="tahun_stok" name="tahun_stok" min="2020" max="2030"
              value="<?= date('Y') ?>" placeholder="Tahun Stock" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Stock Size</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>Marketing/master/Master_stock/update">
        <div class="modal-body">
          <div class="form-group">
            <label for="stok_bulan">Bulan Stock</label>
            <input type="hidden" id="e_id_master_stok_size" name="id_master_stok_size">
            <select class="form-control" id="e_stok_bulan" name="stok_bulan" required>
              <option value="">- Pilih Bulan -</option>
              <option value="1">January</option>
              <option value="2">February</option>
              <option value="3">March</option>
              <option value="4">April</option>
              <option value="5">May</option>
              <option value="6">June</option>
              <option value="7">July</option>
              <option value="8">August</option>
              <option value="9">September</option>
              <option value="10">October</option>
              <option value="11">November</option>
              <option value="12">December</option>
            </select>
          </div>
          <div class="form-group">
            <label for="tahun_stok">Tahun Stock</label>
            <input type="number" class="form-control" id="tahun_stok" name="tahun_stok" min="2020" max="2030"
              value="<?= date('Y') ?>" placeholder="Tahun Stock" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-info">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function () {
    // Modal edit show event
    $('#edit').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget);
      var id_master_stok_size = button.data('id_master_stok_size');
      var stok_bulan = button.data('stok_bulan');
      var tahun_stok = button.data('tahun_stok');

      var modal = $(this);
      modal.find('#e_id_master_stok_size').val(id_master_stok_size);
      modal.find('#e_stok_bulan').val(stok_bulan);
      modal.find('#e_tahun_stok').val(tahun_stok);
    });

    // Auto-hide alert setelah 5 detik
    setTimeout(function () {
      $('.alert').alert('close');
    }, 5000);
  });
</script>