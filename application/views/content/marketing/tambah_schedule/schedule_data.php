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
                  <li class="breadcrumb-item"><a href="javascript:">Marketing</a></li>
                  <li class="breadcrumb-item"><a href="<?= base_url('Marketing/Tambah_schedule') ?>">Tambah Schedule</a>
                  </li>
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
                    <h5>Data Schedule <b>(Marketing)</b></h5>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal"
                      data-target="#add">
                      <i class="feather icon-plus"></i>Tambah Data
                    </button>
                  </div>
                  <div class="card-block table-border-style">
                    <div class="table-responsive">
                      <table class="table datatable table-hover table-striped table-sm">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Tanggal Schedule</th>
                            <th class="text-center">No CR</th>
                            <th>No Batch</th>
                            <th>No KP</th>
                            <th>Nama Customer</th>
                            
                           
                            <th class="text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $level = $this->session->userdata('departement');
                          $no = 1;
                          foreach ($result as $k) {
                            $tgl_sch = explode('-', $k['tgl_sch'])[2] . "/" . explode('-', $k['tgl_sch'])[1] . "/" . explode('-', $k['tgl_sch'])[0];
                            $tgl_kirim = explode('-', $k['tgl_kirim'])[2] . "/" . explode('-', $k['tgl_kirim'])[1] . "/" . explode('-', $k['tgl_kirim'])[0];
                            $tgl_prd = explode('-', $k['tgl_prd'])[2] . "/" . explode('-', $k['tgl_prd'])[1] . "/" . explode('-', $k['tgl_prd'])[0];

                            ?>
                            <tr>
                              <th scope="row"><?= $no++ ?></th>
                              <td><?= $tgl_sch ?></td>
                              <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <span type="button"style="cursor: pointer;" class="badge badge-primary" data-toggle="modal" data-target="#view" 
                                    data-id_mkt_schedule="<?= $k['id_mkt_schedule'] ?>"
                                    data-id_mkt_kp="<?= $k['id_mkt_kp'] ?>" data-id_customer="<?= $k['id_customer'] ?>"
                                    data-id_master_kw_cap="<?= $k['id_master_kw_cap'] ?>"
                                    data-id_master_kw_body="<?= $k['id_master_kw_body'] ?>"
                                    data-no_cr="<?= $k['no_cr'] ?>" data-no_batch="<?= $k['no_batch'] ?>"
                                    data-tgl_sch="<?= $tgl_sch ?>" data-size_machine="<?= $k['size_machine'] ?>"
                                    data-kode_warna_cap="<?= $k['kode_warna_cap'] ?>"
                                    data-kode_warna_body="<?= $k['kode_warna_body'] ?>"
                                    data-warna_cap="<?= $k['short_cap'] ?>" data-warna_body="<?= $k['short_body'] ?>"
                                    data-mesin_prd="<?= $k['mesin_prd'] ?>" data-jumlah_prd="<?= $k['jumlah_prd'] ?>"
                  
                                    data-print="<?= $k['print'] ?>" data-tinta="<?= $k['tinta'] ?>" data-jenis_grv="<?= $k['jenis_grv'] ?>"
                                    data-nama_customer="<?= $k['nama_customer'] ?>"
                                    data-jenis_box="<?= $k['jenis_box'] ?>" data-jenis_zak="<?= $k['jenis_zak'] ?>"
                                    data-tgl_kirim="<?= $tgl_kirim ?>" data-tgl_prd="<?= $tgl_prd ?>"
                                    
                                    data-minyak="<?= $k['minyak'] ?>" data-ket_prd="<?= $k['ket_prd'] ?>">
                                    <i class=""></i><?= $k['no_cr'] ?>
                                  </span>
                                </div>
                              </td>
                              <td><?= $k['no_batch'] ?></td>
                              <td><?= $k['no_kp'] ?? '-' ?></td>
                              <td><?= $k['nama_customer'] ?></td>
                             
                              
                              <td class="text-center">
                                <?php if ($level === "admin") { ?>
                                  <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-primary btn-square btn-sm" data-toggle="modal"
                                      data-target="#edit" data-id_mkt_schedule="<?= $k['id_mkt_schedule'] ?>"
                                      data-id_mkt_kp="<?= $k['id_mkt_kp'] ?>" data-id_customer="<?= $k['id_customer'] ?>"
                                      data-id_master_kw_cap="<?= $k['id_master_kw_cap'] ?>"
                                      data-id_master_kw_body="<?= $k['id_master_kw_body'] ?>"
                                      data-no_cr="<?= $k['no_cr'] ?>" data-no_batch="<?= $k['no_batch'] ?>"
                                      data-tgl_sch="<?= $tgl_sch ?>" data-size_machine="<?= $k['size_machine'] ?>"
                                      data-kode_warna_cap="<?= $k['kode_warna_cap'] ?>"
                                      data-kode_warna_body="<?= $k['kode_warna_body'] ?>"
                                      data-warna_cap="<?= $k['short_cap'] ?>" data-warna_body="<?= $k['short_body'] ?>"
                                      data-mesin_prd="<?= $k['mesin_prd'] ?>" data-jumlah_prd="<?= $k['jumlah_prd'] ?>"
                                      data-cek_print="<?= $k['cek_print'] ?>"
                                      data-print="<?= $k['print'] ?>" data-tinta="<?= $k['tinta'] ?>"
                                      data-jenis_grv="<?= $k['jenis_grv'] ?>"
                                      data-nama_customer="<?= $k['nama_customer'] ?>"
                                      data-jenis_box="<?= $k['jenis_box'] ?>" data-jenis_zak="<?= $k['jenis_zak'] ?>"
                                      data-tgl_kirim="<?= $tgl_kirim ?>" data-tgl_prd="<?= $tgl_prd ?>"
                                      
                                      data-minyak="<?= $k['minyak'] ?>" data-ket_prd="<?= $k['ket_prd'] ?>">
                                      <i class="feather icon-edit-2"></i>Edit
                                    </button>
                                  </div>
                                  <div class="btn-group" role="group">
                                    <a href="<?= base_url() ?>Marketing/Tambah_schedule/delete/<?= $k['id_mkt_schedule'] ?>"
                                      class="btn btn-danger btn-square text-light btn-sm"
                                      onclick="if (! confirm('Apakah Anda Yakin?')) { return false; }">
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
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Modal Add -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="addScheduleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="addScheduleModalLabel">
          <i class="fas fa-plus-circle mr-2"></i>Tambah Schedule
        </h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <!-- FORM -->
      <form method="post" action="<?= base_url() ?>Marketing/Tambah_schedule/add" id="scheduleForm">
        <div class="modal-body">
          <div class="row">

            <!-- No KP -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="id_mkt_kp"><i class="fas fa-calendar mr-1"></i> No KP</label>
                <select class="form-control chosen-select" id="id_mkt_kp" name="id_mkt_kp" autocomplete="off" required>
                  <option value="">- Pilih No KP -</option>
                  <?php foreach ($res_no_kp as $nk) { ?>
                    <option value="<?= $nk['id_mkt_kp'] ?>">
                      <?= $nk['no_kp'] ?> - <?= $nk['nama_customer'] ?? '' ?>
                    </option>
                  <?php } ?>
                </select>
              </div>
            </div>

            <!-- Customer (Readonly) -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="id_customer">Customer</label>
                <input type="text" class="form-control" id="id_customer" name="id_customer" placeholder="Customer"
                  readonly>
                <input type="hidden" id="hidden_id_customer" name="hidden_id_customer">
              </div>
            </div>

            <!-- Size -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="size_machine">Size</label>
                <input type="text" class="form-control text-uppercase" id="size_machine" name="size_machine"
                  placeholder="Size" autocomplete="off" readonly>
              </div>
            </div>

            <!-- Print Information -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="print">Nama Print</label>
                <input type="text" class="form-control text-uppercase" id="print" name="print" placeholder="Print"
                  autocomplete="off" readonly>
              </div>
            </div>

            <!-- Logo Print -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="logo_print">Logo Print</label>
                <input type="text" class="form-control text-uppercase" id="logo_print" name="logo_print"
                  placeholder="Logo Print" autocomplete="off" readonly>
              </div>
            </div>

            <!-- Kode Warna Cap -->
            <div class="col-md-3">
              <div class="form-group">
                <label for="id_master_kw_cap">Kode Warna Cap</label>
                <input type="text" class="form-control" id="id_master_kw_cap" name="id_master_kw_cap"
                  placeholder="Kode Warna Cap" readonly>
                <input type="hidden" id="hidden_id_master_kw_cap" name="hidden_id_master_kw_cap">
              </div>
            </div>

            <!-- Warna Cap -->
            <div class="col-md-3">
              <div class="form-group">
                <label for="warna_cap">Warna Cap</label>
                <input type="text" class="form-control" id="warna_cap" name="warna_cap" placeholder="Warna Cap"
                  readonly>
              </div>
            </div>

            <!-- Kode Warna Body -->
            <div class="col-md-3">
              <div class="form-group">
                <label for="id_master_kw_body">Kode Warna Body</label>
                <input type="text" class="form-control" id="id_master_kw_body" name="id_master_kw_body"
                  placeholder="Kode Warna Body" readonly>
                <input type="hidden" id="hidden_id_master_kw_body" name="hidden_id_master_kw_body">
              </div>
            </div>

            <!-- Warna Body -->
            <div class="col-md-3">
              <div class="form-group">
                <label for="warna_body">Warna Body</label>
                <input type="text" class="form-control" id="warna_body" name="warna_body" placeholder="Warna Body"
                  readonly>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="jumlah_kp">Jumlah KP</label>
                <input type="text" id="jumlah_kp" name="jumlah_kp" class="form-control" placeholder="Jumlah KP" readonly>
              </div>
            </div>


            <div class="col-md-6">
              <div class="form-group">
                <label for="minyak">Minyak N-M</label>
                <input type="text" id="minyak" name="minyak" class="form-control" placeholder="U- M/N" readonly>
              </div>
            </div>

            
            

            <!-- Nomor CR -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="no_cr">Nomor CR</label>
                <input type="text" class="form-control text-uppercase" id="no_cr" name="no_cr" placeholder="Nomor CR"
                  autocomplete="off" required>
                <div class="invalid-feedback" id="cr-feedback">
                  Maaf No. CR sudah ada.
                </div>
              </div>
            </div>

            <!-- Nomor Batch -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="no_batch">Nomor Batch</label>
                <input type="text" class="form-control text-uppercase" id="no_batch" name="no_batch"
                  placeholder="No. Batch" autocomplete="off" required>
              </div>
            </div>

            <!-- Tanggal Schedule -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="tgl_sch">Tanggal Schedule</label>
                <input type="text" class="form-control datepicker" id="tgl_sch" name="tgl_sch"
                  placeholder="Tanggal Schedule" autocomplete="off" required>
              </div>
            </div>

            <!-- Mesin -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="mesin_prd">Mesin</label>
                <select class="form-control chosen-select" id="mesin_prd" name="mesin_prd" required>
                  <option value="" disabled selected hidden>- Pilih Mesin -</option>
                  <?php $nama_mesin = ["A", "B", "C", "D", "E", "F", "G", "H", "I"];
                  foreach ($nama_mesin as $nm) { ?>
                    <option value="<?= $nm ?>"><?= $nm ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>

            <!-- Jumlah -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="jumlah_prd">Jumlah</label>
                <input type="number" class="form-control" id="jumlah_prd" name="jumlah_prd" placeholder="Jumlah" aria-describedby="validationServer03Feedback" style="text-transform:uppercase" onkeyup="this.value = this.value.toUpperCase() "
                  autocomplete="off" min="1" required>
                  <div id="validationServer03Feedback" class="invalid-feedback">
                  Maaf Jumlah tidak boleh lebih dari Jumlah KP.
                </div>
              </div>
                            
            </div>

            <!-- Print Details -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="tinta">Jenis Tinta</label>
                <select class="form-control chosen-select" id="tinta" name="tinta">
                  <option value="" disabled selected hidden>- Pilih Jenis Tinta -</option>
                  <option value="H">Hitam</option>
                  <option value="P">Putih</option>
                  <option value="M">Merah</option>
                </select>
              </div>
            </div>

             <div class="col-md-6">
              <div class="form-group">
                <label for="jenis_grv">Jenis GRV</label>
                <select class="form-control chosen-select" id="jenis_grv" name="jenis_grv">
                  <option value="" disabled selected hidden>- Pilih Jenis GRV -</option>
                  <option value="AXIAL">AXIAL</option>
                  <option value="RDL">RDL</option>
                 
                </select>
              </div>
            </div>

            <!-- Jenis Box -->
            <div class="col-md-3">
              <div class="form-group">
                <label for="jenis_box">Jenis Box</label>
                <select class="form-control chosen-select" id="jenis_box" name="jenis_box" required>
                  <option value="" disabled selected hidden>- Pilih Jenis Box -</option>
                  <option value="C2">C2</option>
                  <option value="D1">D1</option>
                  <option value="D2">D2</option>
                </select>
              </div>
            </div>

            <!-- Jenis Zak -->
            <div class="col-md-3">
              <div class="form-group">
                <label for="jenis_zak">Jenis Zak</label>
                <select class="form-control chosen-select" id="jenis_zak" name="jenis_zak" required>
                  <option value="" disabled selected hidden>- Pilih Jenis Zak -</option>
                  <option value="ZAK PLS">Polos</option>
                  <option value="ZAK BRT">Brataco</option>
                  <option value="LOSS">Los</option>
                </select>
              </div>
            </div>

             <div class="col-md-4">
              <div class="form-group">
                <label for="tgl_prd">Tanggal PRD</label>
                <input type="text" class="form-control datepicker" id="tgl_prd" name="tgl_prd" placeholder="Tanggal PRD"
                  autocomplete="off" required>
              </div>
            </div>


            <!-- Tanggal Kirim -->
            <div class="col-md-4">
              <div class="form-group">
                <label for="tgl_kirim">Tanggal Kirim</label>
                <input type="text" class="form-control datepicker" id="tgl_kirim" name="tgl_kirim"
                  placeholder="Tanggal Kirim" autocomplete="off" required>
              </div>
            </div>

            <!-- Keterangan -->
            <div class="col-md-12">
              <div class="form-group">
                <label for="ket_prd">Keterangan</label>
                <textarea class="form-control text-uppercase" id="ket_prd" name="ket_prd" placeholder="Keterangan"
                  autocomplete="off" rows="3"></textarea>
              </div>
            </div>

          </div>
        </div>

        <!-- FOOTER -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" id="simpan" class="btn btn-primary">
            Simpan Schedule
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal View -->
<div class="modal fade" id="view" tabindex="-1" aria-labelledby="viewScheduleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-info text-white">
        <h5 class="modal-title" id="viewScheduleModalLabel">
          <i class="fas fa-eye mr-2"></i>Detail Schedule
        </h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="v-no_cr">Nomor CR</label>
              <input type="text" class="form-control" id="v-no_cr" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="v-no_batch">Nomor Batch</label>
              <input type="text" class="form-control" id="v-no_batch" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="v-tgl_sch">Tanggal Schedule</label>
              <input type="text" class="form-control" id="v-tgl_sch" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="v-size_machine">Size</label>
              <input type="text" class="form-control" id="v-size_machine" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="v-kode_warna_cap">Kode Warna Cap</label>
              <input type="text" class="form-control" id="v-kode_warna_cap" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="v-warna_cap">Warna Cap</label>
              <input type="text" class="form-control" id="v-warna_cap" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="v-kode_warna_body">Kode Warna Body</label>
              <input type="text" class="form-control" id="v-kode_warna_body" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="v-warna_body">Warna Body</label>
              <input type="text" class="form-control" id="v-warna_body" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="v-mesin_prd">Mesin</label>
              <input type="text" class="form-control" id="v-mesin_prd" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="v-jumlah_prd">Jumlah</label>
              <input type="text" class="form-control" id="v-jumlah_prd" readonly>
            </div>
          </div>
          
          <div class="col-md-6">
            <div class="form-group">
              <label for="v-jenis_grv">Jenis Grv</label>
              <input type="text" class="form-control" id="v-jenis_grv" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="v-customer">Customer</label>
              <input type="text" class="form-control" id="v-customer" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="v-jenis_box">Jenis Box</label>
              <input type="text" class="form-control" id="v-jenis_box" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="v-jenis_zak">Jenis Zak</label>
              <input type="text" class="form-control" id="v-jenis_zak" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="v-minyak">Minyak</label>
              <input type="text" class="form-control" id="v-minyak" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="v-tgl_kirim">Tanggal Kirim</label>
              <input type="text" class="form-control" id="v-tgl_kirim" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="v-tgl_prd">Tanggal PRD</label>
              <input type="text" class="form-control" id="v-tgl_prd" readonly>
            </div>
          </div>
          
          <!-- Print Information -->
          <div class="col-md-6">
            <div class="form-group">
              <label for="v-print">Nama Print</label>
              <input type="text" class="form-control" id="v-print" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="v-tinta">Jenis Tinta</label>
              <input type="text" class="form-control" id="v-tinta" readonly>
            </div>
          </div>

          <div class="col-md-12">
            <div class="form-group">
              <label for="v-ket_prd">Keterangan</label>
              <textarea class="form-control" id="v-ket_prd" readonly rows="3"></textarea>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit - DIPERBAIKI agar sama dengan Add -->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="editScheduleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-warning text-white">
        <h5 class="modal-title" id="editScheduleModalLabel">
          <i class="fas fa-edit mr-2"></i>Edit Schedule
        </h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>Marketing/Tambah_schedule/update">
        <div class="modal-body">
          <div class="row">
            <!-- No KP -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="e_id_mkt_kp"><i class="fas fa-calendar mr-1"></i> No KP</label>
                <select class="form-control chosen-select" id="e_id_mkt_kp" name="id_mkt_kp" autocomplete="off" required>
                  <option value="">- Pilih No KP -</option>
                  <?php foreach ($res_no_kp as $nk) { ?>
                    <option value="<?= $nk['id_mkt_kp'] ?>">
                      <?= $nk['no_kp'] ?> - <?= $nk['nama_customer'] ?? '' ?>
                    </option>
                  <?php } ?>
                </select>
              </div>
            </div>

            <!-- Customer (Readonly) -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="e_id_customer">Customer</label>
                <input type="text" class="form-control" id="e_id_customer" name="id_customer" placeholder="Customer"
                  readonly>
                <input type="hidden" id="e_hidden_id_customer" name="hidden_id_customer">
              </div>
            </div>

            <!-- Size -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="e_size_machine">Size</label>
                <input type="text" class="form-control text-uppercase" id="e_size_machine" name="size_machine"
                  placeholder="Size" autocomplete="off" readonly>
              </div>
            </div>

            <!-- Print Information -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="e_print">Nama Print</label>
                <input type="text" class="form-control text-uppercase" id="e_print" name="print" placeholder="Print"
                  autocomplete="off" readonly>
              </div>
            </div>

            <!-- Logo Print -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="e_logo_print">Logo Print</label>
                <input type="text" class="form-control text-uppercase" id="e_logo_print" name="logo_print"
                  placeholder="Logo Print" autocomplete="off" readonly>
              </div>
            </div>

            <!-- Kode Warna Cap -->
            <div class="col-md-3">
              <div class="form-group">
                <label for="e_id_master_kw_cap">Kode Warna Cap</label>
                <input type="text" class="form-control" id="e_id_master_kw_cap" name="id_master_kw_cap"
                  placeholder="Kode Warna Cap" readonly>
                <input type="hidden" id="e_hidden_id_master_kw_cap" name="hidden_id_master_kw_cap">
              </div>
            </div>

            <!-- Warna Cap -->
            <div class="col-md-3">
              <div class="form-group">
                <label for="e_warna_cap">Warna Cap</label>
                <input type="text" class="form-control" id="e_warna_cap" name="warna_cap" placeholder="Warna Cap"
                  readonly>
              </div>
            </div>

            <!-- Kode Warna Body -->
            <div class="col-md-3">
              <div class="form-group">
                <label for="e_id_master_kw_body">Kode Warna Body</label>
                <input type="text" class="form-control" id="e_id_master_kw_body" name="id_master_kw_body"
                  placeholder="Kode Warna Body" readonly>
                <input type="hidden" id="e_hidden_id_master_kw_body" name="hidden_id_master_kw_body">
              </div>
            </div>

            <!-- Warna Body -->
            <div class="col-md-3">
              <div class="form-group">
                <label for="e_warna_body">Warna Body</label>
                <input type="text" class="form-control" id="e_warna_body" name="warna_body" placeholder="Warna Body"
                  readonly>
              </div>
            </div>

            <!-- Jumlah KP -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="e_jumlah_kp">Jumlah KP</label>
                <input type="text" id="e_jumlah_kp" name="jumlah_kp" class="form-control" placeholder="Jumlah KP" readonly>
              </div>
            </div>

            <!-- Minyak N-M -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="e_minyak">Minyak N-M</label>
                <input type="text" id="e_minyak" name="minyak" class="form-control" placeholder="U- M/N" readonly>
              </div>
            </div>

            

            <!-- Nomor CR -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="e_no_cr">Nomor CR</label>
                <input type="hidden" id="e_id_mkt_schedule" name="id_mkt_schedule">
                <input type="text" class="form-control text-uppercase" id="e_no_cr" name="no_cr" placeholder="Nomor CR"
                  autocomplete="off" required>
                <div class="invalid-feedback" id="e_cr-feedback">
                  Maaf No. CR sudah ada.
                </div>
              </div>
            </div>

            <!-- Nomor Batch -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="e_no_batch">Nomor Batch</label>
                <input type="text" class="form-control text-uppercase" id="e_no_batch" name="no_batch"
                  placeholder="No. Batch" autocomplete="off" required>
              </div>
            </div>

            <!-- Tanggal Schedule -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="e_tgl_sch">Tanggal Schedule</label>
                <input type="text" class="form-control datepicker" id="e_tgl_sch" name="tgl_sch"
                  placeholder="Tanggal Schedule" autocomplete="off" required>
              </div>
            </div>

            <!-- Mesin -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="e_mesin_prd">Mesin</label>
                <select class="form-control chosen-select" id="e_mesin_prd" name="mesin_prd" required>
                  <option value="" disabled selected hidden>- Pilih Mesin -</option>
                  <?php $nama_mesin = ["A", "B", "C", "D", "E", "F", "G", "H", "I"];
                  foreach ($nama_mesin as $nm) { ?>
                    <option value="<?= $nm ?>"><?= $nm ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>

            <!-- Jumlah -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="e_jumlah_prd">Jumlah</label>
                <input type="number" class="form-control" id="e_jumlah_prd" name="jumlah_prd" placeholder="Jumlah" 
                  aria-describedby="e_validationServer03Feedback" style="text-transform:uppercase" 
                  onkeyup="this.value = this.value.toUpperCase()" autocomplete="off" min="1" required>
                <div id="e_validationServer03Feedback" class="invalid-feedback">
                  Maaf Jumlah tidak boleh lebih dari Jumlah KP.
                </div>
              </div>
            </div>

            <!-- Print Details -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="e_tinta">Jenis Tinta</label>
                <select class="form-control chosen-select" id="e_tinta" name="tinta">
                  <option value="" disabled selected hidden>- Pilih Jenis Tinta -</option>
                  <option value="H">Hitam</option>
                  <option value="P">Putih</option>
                  <option value="M">Merah</option>
                </select>
              </div>
            </div>

            <!-- Jenis GRV -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="e_jenis_grv">Jenis GRV</label>
                <select class="form-control chosen-select" id="e_jenis_grv" name="jenis_grv">
                  <option value="" disabled selected hidden>- Pilih Jenis GRV -</option>
                  <option value="AXIAL">AXIAL</option>
                  <option value="RDL">RDL</option>
                </select>
              </div>
            </div>

            <!-- Jenis Box -->
            <div class="col-md-3">
              <div class="form-group">
                <label for="e_jenis_box">Jenis Box</label>
                <select class="form-control chosen-select" id="e_jenis_box" name="jenis_box" required>
                  <option value="" disabled selected hidden>- Pilih Jenis Box -</option>
                  <option value="C2">C2</option>
                  <option value="D1">D1</option>
                  <option value="D2">D2</option>
                </select>
              </div>
            </div>

            <!-- Jenis Zak -->
            <div class="col-md-3">
              <div class="form-group">
                <label for="e_jenis_zak">Jenis Zak</label>
                <select class="form-control chosen-select" id="e_jenis_zak" name="jenis_zak" required>
                  <option value="" disabled selected hidden>- Pilih Jenis Zak -</option>
                  <option value="ZAK PLS">Polos</option>
                  <option value="ZAK BRT">Brataco</option>
                  <option value="LOSS">Los</option>
                </select>
              </div>
            </div>

            <!-- Tanggal PRD -->
            <div class="col-md-4">
              <div class="form-group">
                <label for="e_tgl_prd">Tanggal PRD</label>
                <input type="text" class="form-control datepicker" id="e_tgl_prd" name="tgl_prd" placeholder="Tanggal PRD"
                  autocomplete="off" required>
              </div>
            </div>

            <!-- Tanggal Kirim -->
            <div class="col-md-4">
              <div class="form-group">
                <label for="e_tgl_kirim">Tanggal Kirim</label>
                <input type="text" class="form-control datepicker" id="e_tgl_kirim" name="tgl_kirim"
                  placeholder="Tanggal Kirim" autocomplete="off" required>
              </div>
            </div>

            <!-- Keterangan -->
            <div class="col-md-12">
              <div class="form-group">
                <label for="e_ket_prd">Keterangan</label>
                <textarea class="form-control text-uppercase" id="e_ket_prd" name="ket_prd" placeholder="Keterangan"
                  autocomplete="off" rows="3"></textarea>
              </div>
            </div>

          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary"
            onclick="if (! confirm('Apakah Anda Yakin Untuk Mengupdate Data Ini?')) { return false; }">Update Schedule</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function () {
    // ========== LOAD DATA KP ==========
    
    // Load KP yang available saat modal dibuka - ADD
    $('#add').on('show.bs.modal', function() {
        loadAvailableKP();
    });

    // Load KP yang available saat modal dibuka - EDIT
    $('#edit').on('show.bs.modal', function() {
        loadAvailableKPEdit();
    });

    // Fungsi untuk memuat KP yang available ke dropdown ADD
    function loadAvailableKP() {
        $.ajax({
            url: "<?= base_url('Marketing/Tambah_schedule/get_available_kp_ajax') ?>",
            type: "GET",
            dataType: "json",
            success: function(response) {
                var kpSelect = $('#id_mkt_kp');
                kpSelect.empty().append('<option value="">- Pilih No KP -</option>');

                if (response && response.length > 0) {
                    $.each(response, function(index, kp) {
                        var displayText = kp.no_kp + ' - ' + (kp.nama_customer || '') + ' (Jumlah: ' + formatNumber(kp.jumlah_kp) + ')';
                        
                        kpSelect.append('<option value="' + kp.id_mkt_kp + '" data-jumlah-kp="' + kp.jumlah_kp + '">' + displayText + '</option>');
                    });
                    console.log("Loaded " + response.length + " available KP records");
                } else {
                    kpSelect.append('<option value="">- Tidak ada KP yang tersedia -</option>');
                    console.log("No available KP records found");
                }
                
                kpSelect.trigger('chosen:updated');
            },
            error: function(xhr, status, error) {
                console.error("Error loading available KP:", error);
                var kpSelect = $('#id_mkt_kp');
                kpSelect.empty().append('<option value="">- Error loading data -</option>');
                kpSelect.trigger('chosen:updated');
            }
        });
    }

    // Fungsi untuk memuat KP yang available ke dropdown EDIT
    function loadAvailableKPEdit() {
        $.ajax({
            url: "<?= base_url('Marketing/Tambah_schedule/get_active_kp_ajax') ?>",
            type: "GET",
            dataType: "json",
            success: function(response) {
                var kpSelect = $('#e_id_mkt_kp');
                kpSelect.empty().append('<option value="">- Pilih No KP -</option>');

                if (response && response.length > 0) {
                    $.each(response, function(index, kp) {
                        var displayText = kp.no_kp + ' - ' + (kp.nama_customer || '') + ' (Jumlah: ' + formatNumber(kp.jumlah_kp) + ')';
                        
                        kpSelect.append('<option value="' + kp.id_mkt_kp + '" data-jumlah-kp="' + kp.jumlah_kp + '">' + displayText + '</option>');
                    });
                    console.log("Loaded " + response.length + " active KP records for edit");
                } else {
                    kpSelect.append('<option value="">- Tidak ada KP yang tersedia -</option>');
                    console.log("No active KP records found for edit");
                }
                
                kpSelect.trigger('chosen:updated');
            },
            error: function(xhr, status, error) {
                console.error("Error loading active KP for edit:", error);
                var kpSelect = $('#e_id_mkt_kp');
                kpSelect.empty().append('<option value="">- Error loading data -</option>');
                kpSelect.trigger('chosen:updated');
            }
        });
    }

    // Format number dengan separator
    function formatNumber(num) {
        if (!num) return '0';
        return parseInt(num).toLocaleString('id-ID');
    }

    // ========== AUTO-FILL DATA KP ==========

    // Autofill ketika No KP dipilih - ADD MODAL
    $('#id_mkt_kp').on('change', function () {
        var id_mkt_kp = $(this).val();
        var selectedOption = $(this).find('option:selected');
        var jumlahKp = selectedOption.data('jumlah-kp');

        if (id_mkt_kp) {
            // Tampilkan loading state
            $('#id_customer').val('Loading...');
            $('#id_master_kw_cap').val('Loading...');
            $('#warna_cap').val('Loading...');
            $('#id_master_kw_body').val('Loading...');
            $('#warna_body').val('Loading...');
            $('#minyak').val('Loading...');

            $.ajax({
                url: "<?= base_url('Marketing/Tambah_schedule/get_kp_by_id') ?>",
                type: "POST",
                data: { id_mkt_kp: id_mkt_kp },
                dataType: "json",
                success: function (response) {
                    console.log("Response:", response);

                    if (response.success && response.data) {
                        var data = response.data;

                        // Isi field-field yang readonly
                        $('#id_customer').val(data.nama_customer || '');
                        $('#id_master_kw_cap').val(data.kode_warna_cap || '');
                        $('#warna_cap').val(data.short_cap || '');
                        $('#id_master_kw_body').val(data.kode_warna_body || '');
                        $('#warna_body').val(data.short_body || '');
                        $('#size_machine').val(data.size_kp || '');
                        $('#minyak').val(data.spek_kapsul || '');
                        $('#jumlah_kp').val(formatNumber(data.jumlah_kp) || '');
                        $('#print').val(data.kode_print || '');
                        $('#logo_print').val(data.logo_print || '');

                        // Set hidden values untuk ID
                        $('#hidden_id_customer').val(data.id_customer || '');
                        $('#hidden_id_master_kw_cap').val(data.id_master_kw_cap || '');
                        $('#hidden_id_master_kw_body').val(data.id_master_kw_body || '');

                        console.log("Data loaded successfully");

                    } else {
                        console.log("Data not found or error in response");
                        alert('Data tidak ditemukan');
                        clearAutoFillFields();
                    }
                },
                error: function (xhr, status, error) {
                    console.error("AJAX Error:", error);
                    alert('Terjadi kesalahan saat memuat data: ' + error);
                    clearAutoFillFields();
                }
            });
        } else {
            clearAutoFillFields();
        }
    });

    // Autofill ketika No KP dipilih - EDIT MODAL
    $('#e_id_mkt_kp').on('change', function () {
        var id_mkt_kp = $(this).val();
        var selectedOption = $(this).find('option:selected');
        var jumlahKp = selectedOption.data('jumlah-kp');

        if (id_mkt_kp) {
            // Tampilkan loading state
            $('#e_id_customer').val('Loading...');
            $('#e_id_master_kw_cap').val('Loading...');
            $('#e_warna_cap').val('Loading...');
            $('#e_id_master_kw_body').val('Loading...');
            $('#e_warna_body').val('Loading...');
            $('#e_minyak').val('Loading...');

            $.ajax({
                url: "<?= base_url('Marketing/Tambah_schedule/get_kp_by_id') ?>",
                type: "POST",
                data: { id_mkt_kp: id_mkt_kp },
                dataType: "json",
                success: function (response) {
                    console.log("Edit Response:", response);

                    if (response.success && response.data) {
                        var data = response.data;

                        // Isi field-field yang readonly
                        $('#e_id_customer').val(data.nama_customer || '');
                        $('#e_id_master_kw_cap').val(data.kode_warna_cap || '');
                        $('#e_warna_cap').val(data.short_cap || '');
                        $('#e_id_master_kw_body').val(data.kode_warna_body || '');
                        $('#e_warna_body').val(data.short_body || '');
                        $('#e_size_machine').val(data.size_kp || '');
                        $('#e_minyak').val(data.spek_kapsul || '');
                        $('#e_jumlah_kp').val(formatNumber(data.jumlah_kp) || '');
                        $('#e_print').val(data.kode_print || '');
                        $('#e_logo_print').val(data.logo_print || '');

                        // Set hidden values untuk ID
                        $('#e_hidden_id_customer').val(data.id_customer || '');
                        $('#e_hidden_id_master_kw_cap').val(data.id_master_kw_cap || '');
                        $('#e_hidden_id_master_kw_body').val(data.id_master_kw_body || '');

                        console.log("Edit Data loaded successfully");

                    } else {
                        console.log("Edit Data not found or error in response");
                        alert('Data tidak ditemukan');
                        clearEditAutoFillFields();
                    }
                },
                error: function (xhr, status, error) {
                    console.error("Edit AJAX Error:", error);
                    alert('Terjadi kesalahan saat memuat data: ' + error);
                    clearEditAutoFillFields();
                }
            });
        } else {
            clearEditAutoFillFields();
        }
    });

    // ========== VALIDASI JUMLAH PRODUKSI ==========

    // Fungsi validasi jumlah produksi untuk ADD modal
    function validateJumlahPrd() {
        var jumlah_prd = parseInt($('#jumlah_prd').val()) || 0;
        var jumlah_kp = parseInt($('#jumlah_kp').val().replace(/\./g, '')) || 0;
        
        if (jumlah_prd > jumlah_kp) {
            $('#jumlah_prd').addClass("is-invalid");
            $('#simpan').attr("disabled", "disabled");
            $('#validationServer03Feedback').show();
        } else {
            $('#jumlah_prd').removeClass("is-invalid");
            $('#simpan').removeAttr("disabled");
            $('#validationServer03Feedback').hide();
        }
    }

    // Fungsi validasi jumlah produksi untuk EDIT modal
    function validateJumlahPrdEdit() {
        var jumlah_prd = parseInt($('#e_jumlah_prd').val()) || 0;
        var jumlah_kp = parseInt($('#e_jumlah_kp').val().replace(/\./g, '')) || 0;
        
        if (jumlah_prd > jumlah_kp) {
            $('#e_jumlah_prd').addClass("is-invalid");
            $('button[type="submit"]').attr("disabled", "disabled");
            $('#e_validationServer03Feedback').show();
        } else {
            $('#e_jumlah_prd').removeClass("is-invalid");
            $('button[type="submit"]').removeAttr("disabled");
            $('#e_validationServer03Feedback').hide();
        }
    }

    // Event listener untuk jumlah_prd di modal add
    $("#jumlah_prd").on('input', function() {
        validateJumlahPrd();
    });

    // Event listener untuk jumlah_prd di modal edit
    $("#e_jumlah_prd").on('input', function() {
        validateJumlahPrdEdit();
    });

    // ========== FUNGSI BANTU ==========

    // Clear fields untuk ADD modal
    function clearAutoFillFields() {
        $('#id_customer').val('');
        $('#id_master_kw_cap').val('');
        $('#warna_cap').val('');
        $('#id_master_kw_body').val('');
        $('#warna_body').val('');
        $('#minyak').val('');
        $('#jumlah_kp').val('');
        $('#hidden_id_customer').val('');
        $('#hidden_id_master_kw_cap').val('');
        $('#hidden_id_master_kw_body').val('');
        $('#print').val('');
        $('#logo_print').val('');
    }

    // Clear fields untuk EDIT modal
    function clearEditAutoFillFields() {
        $('#e_id_customer').val('');
        $('#e_id_master_kw_cap').val('');
        $('#e_warna_cap').val('');
        $('#e_id_master_kw_body').val('');
        $('#e_warna_body').val('');
        $('#e_minyak').val('');
        $('#e_jumlah_kp').val('');
        $('#e_hidden_id_customer').val('');
        $('#e_hidden_id_master_kw_cap').val('');
        $('#e_hidden_id_master_kw_body').val('');
        $('#e_print').val('');
        $('#e_logo_print').val('');
    }

    // ========== VALIDASI TINTA DAN GRV ==========

    // Validasi ketergantungan Tinta dan GRV - ADD MODAL
    function validateTintaGrvDependency() {
        const tintaSelected = $('#tinta').val();
        const grvInput = $('#jenis_grv');
        
        if (tintaSelected && tintaSelected !== '') {
            // Jika tinta sudah dipilih, enable GRV
            grvInput.prop('disabled', false);
            grvInput.prop('required', true);
        } else {
            // Jika tinta belum dipilih, disable GRV dan clear value
            grvInput.prop('disabled', true);
            grvInput.prop('required', false);
            grvInput.val('');
        }
    }

    // Validasi ketergantungan Tinta dan GRV - EDIT MODAL
    function validateTintaGrvDependencyEdit() {
        const tintaSelected = $('#e_tinta').val();
        const grvInput = $('#e_jenis_grv');
        
        if (tintaSelected && tintaSelected !== '') {
            // Jika tinta sudah dipilih, enable GRV
            grvInput.prop('disabled', false);
            grvInput.prop('required', true);
        } else {
            // Jika tinta belum dipilih, disable GRV dan clear value
            grvInput.prop('disabled', true);
            grvInput.prop('required', false);
            grvInput.val('');
        }
    }

    // Event listener untuk perubahan tinta - ADD MODAL
    $('#tinta').on('change', function() {
        validateTintaGrvDependency();
    });
    
    // Event listener untuk perubahan tinta - EDIT MODAL
    $('#e_tinta').on('change', function() {
        validateTintaGrvDependencyEdit();
    });

    // ========== FUNGSI UPPERCASE ==========

    // Fungsi untuk uppercase
    function uppercase(selector) {
        $(selector).on('input', function () {
            this.value = this.value.toUpperCase();
        });
    }

    // Terapkan uppercase ke field yang diperlukan
    uppercase('#no_cr');
    uppercase('#no_batch');
    uppercase('#print');
    uppercase('#ket_prd');
    uppercase('#jenis_grv');
    uppercase('#e_no_cr');
    uppercase('#e_no_batch');
    uppercase('#e_print');
    uppercase('#e_ket_prd');
    uppercase('#e_jenis_grv');

    // ========== VALIDASI NO CR ==========

    // Validasi No CR untuk ADD modal
    $("#no_cr").keyup(function () {
        var no_cr = $("#no_cr").val();
        jQuery.ajax({
            url: "<?= base_url() ?>Marketing/Tambah_schedule/cek_no_cr",
            dataType: 'text',
            type: "post",
            data: { no_cr: no_cr },
            success: function (response) {
                if (response == "true") {
                    $("#no_cr").addClass("is-invalid");
                    $("#simpan").attr("disabled", "disabled");
                } else {
                    $("#no_cr").removeClass("is-invalid");
                    $("#simpan").removeAttr("disabled");
                }
            }
        });
    });

    // Validasi No CR untuk EDIT modal
    $("#e_no_cr").keyup(function () {
        var no_cr = $("#e_no_cr").val();
        var id_mkt_schedule = $("#e_id_mkt_schedule").val();
        jQuery.ajax({
            url: "<?= base_url() ?>Marketing/Tambah_schedule/cek_no_cr_edit",
            dataType: 'text',
            type: "post",
            data: { no_cr: no_cr, id_mkt_schedule: id_mkt_schedule },
            success: function (response) {
                if (response == "true") {
                    $("#e_no_cr").addClass("is-invalid");
                    $("button[type='submit']").attr("disabled", "disabled");
                } else {
                    $("#e_no_cr").removeClass("is-invalid");
                    $("button[type='submit']").removeAttr("disabled");
                }
            }
        });
    });

    // ========== MODAL FUNCTIONALITY ==========

    // View Modal functionality
    $('#view').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);

        var no_cr = button.data('no_cr');
        var no_batch = button.data('no_batch');
        var tgl_sch = button.data('tgl_sch');
        var size_machine = button.data('size_machine');
        var kode_warna_cap = button.data('kode_warna_cap');
        var kode_warna_body = button.data('kode_warna_body');
        var warna_cap = button.data('warna_cap');
        var warna_body = button.data('warna_body');
        var mesin_prd = button.data('mesin_prd');
        var jumlah_prd = button.data('jumlah_prd');
        
        var print = button.data('print');
        var tinta = button.data('tinta');
        var jenis_grv = button.data('jenis_grv');
        var customer = button.data('nama_customer');
        var jenis_box = button.data('jenis_box');
        var jenis_zak = button.data('jenis_zak');
        var minyak = button.data('minyak');
        var tgl_kirim = button.data('tgl_kirim');
        var tgl_prd = button.data('tgl_prd');
        var ket_prd = button.data('ket_prd');

        var modal = $(this);
        modal.find('#v-no_cr').val(no_cr);
        modal.find('#v-no_batch').val(no_batch);
        modal.find('#v-tgl_sch').val(tgl_sch);
        modal.find('#v-size_machine').val(size_machine);
        modal.find('#v-kode_warna_cap').val(kode_warna_cap);
        modal.find('#v-warna_cap').val(warna_cap);
        modal.find('#v-kode_warna_body').val(kode_warna_body);
        modal.find('#v-warna_body').val(warna_body);
        modal.find('#v-mesin_prd').val(mesin_prd);
        modal.find('#v-jumlah_prd').val(jumlah_prd);
        
        modal.find('#v-jenis_grv').val(jenis_grv);
        modal.find('#v-customer').val(customer);
        modal.find('#v-jenis_box').val(jenis_box);
        modal.find('#v-jenis_zak').val(jenis_zak);
        modal.find('#v-minyak').val(minyak);
        modal.find('#v-tgl_kirim').val(tgl_kirim);
        modal.find('#v-tgl_prd').val(tgl_prd);
        modal.find('#v-ket_prd').val(ket_prd);
        modal.find('#v-print').val(print);
        modal.find('#v-tinta').val(tinta);
    });

    // Edit Modal functionality dengan PERBAIKAN datepicker
    $('#edit').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);

        var id_mkt_schedule = button.data('id_mkt_schedule');
        var id_mkt_kp = button.data('id_mkt_kp');
        var no_cr = button.data('no_cr');
        var no_batch = button.data('no_batch');
        var tgl_sch = button.data('tgl_sch');
        var size_machine = button.data('size_machine');
        var id_master_kw_cap = button.data('id_master_kw_cap');
        var id_master_kw_body = button.data('id_master_kw_body');
        var kode_warna_cap = button.data('kode_warna_cap');
        var kode_warna_body = button.data('kode_warna_body');
        var warna_cap = button.data('warna_cap');
        var warna_body = button.data('warna_body');
        var mesin_prd = button.data('mesin_prd');
        var jumlah_prd = button.data('jumlah_prd');
        var print = button.data('print');
        var tinta = button.data('tinta');
        var jenis_grv = button.data('jenis_grv');
        var id_customer = button.data('id_customer');
        var jenis_box = button.data('jenis_box');
        var jenis_zak = button.data('jenis_zak');
        var minyak = button.data('minyak');
        var tgl_kirim = button.data('tgl_kirim');
        var tgl_prd = button.data('tgl_prd');
        var ket_prd = button.data('ket_prd');

        var modal = $(this);
        modal.find('#e_id_mkt_schedule').val(id_mkt_schedule);
        modal.find('#e_id_mkt_kp').val(id_mkt_kp).trigger('chosen:updated');
        modal.find('#e_no_cr').val(no_cr);
        modal.find('#e_no_batch').val(no_batch);
        modal.find('#e_tgl_sch').val(tgl_sch);
        modal.find('#e_size_machine').val(size_machine);
        modal.find('#e_id_master_kw_cap').val(kode_warna_cap);
        modal.find('#e_warna_cap').val(warna_cap);
        modal.find('#e_id_master_kw_body').val(kode_warna_body);
        modal.find('#e_warna_body').val(warna_body);
        modal.find('#e_mesin_prd').val(mesin_prd).trigger('chosen:updated');
        modal.find('#e_jumlah_prd').val(jumlah_prd);
       
        modal.find('#e_jenis_grv').val(jenis_grv).trigger('chosen:updated');
        modal.find('#e_id_customer').val(button.data('nama_customer'));
        modal.find('#e_jenis_box').val(jenis_box).trigger('chosen:updated');
        modal.find('#e_jenis_zak').val(jenis_zak).trigger('chosen:updated');
        modal.find('#e_minyak').val(minyak);
        modal.find('#e_tgl_kirim').val(tgl_kirim);
        modal.find('#e_tgl_prd').val(tgl_prd);
        modal.find('#e_ket_prd').val(ket_prd);
        modal.find('#e_print').val(print);
        modal.find('#e_tinta').val(tinta).trigger('chosen:updated');

        // Set hidden values
        modal.find('#e_hidden_id_customer').val(id_customer);
        modal.find('#e_hidden_id_master_kw_cap').val(id_master_kw_cap);
        modal.find('#e_hidden_id_master_kw_body').val(id_master_kw_body);

        // Enable GRV jika tinta sudah dipilih
        if (tinta) {
            modal.find('#e_jenis_grv').prop('disabled', false);
        }

        // PERBAIKAN: Handle datepicker conflict dengan modal
        modal.find('#e_tgl_sch').datepicker().on('show.bs.modal', function(event) {
            event.stopPropagation();
        });
        
        modal.find('#e_tgl_kirim').datepicker().on('show.bs.modal', function(event) {
            event.stopPropagation();
        });
        
        modal.find('#e_tgl_prd').datepicker().on('show.bs.modal', function(event) {
            event.stopPropagation();
        });
    });

    // ========== RESET FORM ==========

    // Reset form ketika modal ditutup - ADD
    $('#add').on('hidden.bs.modal', function () {
        $(this).find('form')[0].reset();
        clearAutoFillFields();
        $('#jenis_grv').prop('disabled', true).val('');
        $('#tinta').val('').trigger('chosen:updated');
    });
    
    // Reset form ketika modal ditutup - EDIT
    $('#edit').on('hidden.bs.modal', function () {
        $('#e_jenis_grv').prop('disabled', true).val('');
        $('#e_tinta').val('').trigger('chosen:updated');
        clearEditAutoFillFields();
    });

    // ========== INISIALISASI TAMBAHAN ==========

    // Inisialisasi datepicker dengan PERBAIKAN untuk mencegah konflik
    $('.datepicker').datepicker({
        format: 'dd/mm/yyyy',
        autoclose: true,
        todayHighlight: true,
        language: 'id'
    }).on('show.bs.modal', function(event) {
        event.stopPropagation();
    });

    // Inisialisasi chosen select
    $('.chosen-select').chosen({
        width: '100%',
        search_contains: true
    });

    // Validasi form submit
    $('#scheduleForm').submit(function(e) {
        var jumlah_prd = parseInt($('#jumlah_prd').val()) || 0;
        var jumlah_kp = parseInt($('#jumlah_kp').val().replace(/\./g, '')) || 0;
        
        if (jumlah_prd > jumlah_kp) {
            e.preventDefault();
            alert('Jumlah produksi tidak boleh melebihi jumlah KP!');
            return false;
        }
        
        return confirm('Apakah Anda yakin ingin menyimpan data Schedule ini?');
    });

    // PERBAIKAN: Handle datepicker untuk modal Add juga
    $('#add').on('shown.bs.modal', function() {
        $('#tgl_sch').datepicker().on('show.bs.modal', function(event) {
            event.stopPropagation();
        });
        
        $('#tgl_kirim').datepicker().on('show.bs.modal', function(event) {
            event.stopPropagation();
        });
        
        $('#tgl_prd').datepicker().on('show.bs.modal', function(event) {
            event.stopPropagation();
        });
    });

    console.log('JavaScript Tambah Schedule loaded successfully');
});
</script>