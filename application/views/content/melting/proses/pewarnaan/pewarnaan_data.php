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
                  <h5 class="m-b-10">Data Proses Pewarnaan</h5>
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="feather icon-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="javascript:">Melting</a></li>
                  <li class="breadcrumb-item"><a href="javascript:">Proses</a></li>
                  <li class="breadcrumb-item"><a href="<?= base_url('Pewarnaan') ?>">Pewarnaan</a></li>
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
                    <h5>Data Pewarnaan</h5>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#add">
                      <i class="feather icon-plus"></i>Tambah Data
                    </button>
                  </div>
                  <div class="card-block table-border-style">

                    <?php
                    // print_r($result);
                    ?>
                    <div class="table-responsive">
                      <table class="table datatable table-hover table-striped table-sm">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>No CR</th>
                            <th>Batch Kapsul</th>
                            <th>Kode Warna</th>
                            <th>Viscositas</th>
                            <th>No Batch Gelatin</th>
                            <th>Operator</th>
                            <th class="text-center">Detail</th>
                            <th class="text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $level = $this->session->userdata('departement');
                          $no = 1;
                          foreach ($result as $k) {
                            $tgl_tf =  explode('-', $k['tgl_tf_mw'])[2] . "/" . explode('-', $k['tgl_tf_mw'])[1] . "/" . explode('-', $k['tgl_tf_mw'])[0];
                            $tgl_lrt =  explode('-', $k['tgl_buat_lrt'])[2] . "/" . explode('-', $k['tgl_tf_mw'])[1] . "/" . explode('-', $k['tgl_buat_lrt'])[0];
                          ?>
                            <tr>
                              <th scope="row"><?= $no++ ?></th>
                              <td><?= $k['no_cr'] ?></td>
                              <td><?= $k['no_batch'] ?></td>
                              <td><?= $k['kode_warna_cap'] && $k['kode_warna_body']  ?  $k['kode_warna_cap'] .  " | " . $k['kode_warna_body'] : "Tidak Ada"  ?></td>
                              <td><?= $k['visco'] ?></td>
                              <td><?= $k['batch_masak'] ?></td>
                              <td><?= $k['nama_operator'] ?></td>
                              <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <button type="button"
                                      class="btn btn-info btn-square btn-sm btn-detail"
                                      data-toggle="modal"
                                      data-target="#view"
                                      data-id_pewarna="<?= $k['id_pewarna'] ?>"
                                      data-batch_masak="<?= $k['batch_masak'] ?>"
                                      data-no_cr="<?= $k['no_cr'] ?>"
                                      data-no_batch="<?= $k['no_batch'] ?>"
                                      data-kode_warna_cap="<?= $k['kode_warna_cap'] ?>"
                                      data-kode_warna_body="<?= $k['kode_warna_body'] ?>"
                                      data-jml_larut_awal="<?= $k['jml_larut_awal'] ?>"
                                      data-jml_cutting="<?= $k['jml_cutting'] ?>"
                                      data-jml_cake="<?= $k['jml_cake'] ?>"
                                      data-batch_cutting="<?= $k['batch_cutting'] ?>"
                                      data-batch_cake="<?= $k['batch_cake'] ?>"
                                      data-nama_customer="<?= $k['nama_customer'] ?>"
                                      data-jumlah_prd="<?= $k['jumlah_prd'] ?>"
                                      data-jumlah_kp="<?= $k['jumlah_kp'] ?>"
                                      data-size_machine="<?= $k['size_machine'] ?>"
                                      data-mesin_prd="<?= $k['mesin_prd'] ?>"
                                      data-cek_warna="<?= $k['cek_warna'] ?>"
                                      data-jam_pw="<?= $k['jam_pw'] ?>"
                                      data-visco="<?= $k['visco'] ?>"
                                      data-vac1="<?= $k['vac1'] ?>"
                                      data-vac2="<?= $k['vac2'] ?>"
                                      data-tekanan="<?= $k['tekanan'] ?>"
                                      data-batch_ti02="<?= $k['batch_ti02'] ?>"
                                      data-batch_r1="<?= $k['batch_r1'] ?>"
                                      data-batch_r3="<?= $k['batch_r3'] ?>"
                                      data-batch_y5="<?= $k['batch_y5'] ?>"
                                      data-batch_b1="<?= $k['batch_b1'] ?>"
                                      data-batch_y10="<?= $k['batch_y10'] ?>"
                                      data-silver="<?= $k['silver'] ?>"
                                      data-bpn="<?= $k['bpn'] ?>"
                                      data-r_40="<?= $k['r_40'] ?>"
                                      data-r_102="<?= $k['r_102'] ?>"
                                      data-ior="<?= $k['ior'] ?>"
                                      data-ioy="<?= $k['ioy'] ?>"
                                      data-p_blue="<?= $k['p_blue'] ?>"
                                      data-p_green="<?= $k['p_green'] ?>"
                                      data-gold="<?= $k['gold'] ?>"
                                      data-y6="<?= $k['y6'] ?>"
                                      data-tgl_tf_mw="<?= $tgl_tf ?>"
                                      data-tgl_buat_lrt="<?= $tgl_lrt ?>"
                                      data-shift="<?= $k['mlt_shift'] ?>"
                                      data-no_fid="<?= $k['no_fid'] ?>"
                                      data-no_urut="<?= $k['no_urut'] ?>"
                                      data-kurang="<?= $k['sisa'] ?>"
                                      data-op1="<?= $k['op1'] ?>"
                                      data-op2="<?= $k['op2'] ?>"
                                      data-supervisor="<?= $k['spv'] ?>"
                                      data-nama_operator="<?= $k['nama_operator'] ?>">
                                      <i class="feather icon-eye"></i> Detail
                                    </button>
                                </div>
                              </td>
                              <td class="text-center">
                                <?php if ($level === "admin" || $level === "purchasing") { ?>
                                  <div class="btn-group" role="group">
                                    <button type="button"
                                      class="btn btn-primary btn-square btn-sm btn-edit"
                                      data-toggle="modal"
                                      data-target="#edit"
                                      data-id_pewarna="<?= $k['id_pewarna'] ?>"
                                      data-batch_masak="<?= $k['batch_masak'] ?>"
                                      data-no_cr="<?= $k['no_cr'] ?>"
                                      data-no_batch="<?= $k['no_batch'] ?>"
                                      data-kode_warna_cap="<?= $k['kode_warna_cap'] ?>"
                                      data-kode_warna_body="<?= $k['kode_warna_body'] ?>"
                                      data-jml_larut_awal="<?= $k['jml_larut_awal'] ?>"
                                      data-jml_cutting="<?= $k['jml_cutting'] ?>"
                                      data-jml_cake="<?= $k['jml_cake'] ?>"
                                      data-batch_cutting="<?= $k['batch_cutting'] ?>"
                                      data-batch_cake="<?= $k['batch_cake'] ?>"
                                      data-nama_customer="<?= $k['nama_customer'] ?>"
                                      data-jumlah_prd="<?= $k['jumlah_prd'] ?>"
                                      data-jumlah_kp="<?= $k['jumlah_kp'] ?>"
                                      data-size_machine="<?= $k['size_machine'] ?>"
                                      data-mesin_prd="<?= $k['mesin_prd'] ?>"
                                      data-cek_warna="<?= $k['cek_warna'] ?>"
                                      data-jam_pw="<?= $k['jam_pw'] ?>"
                                      data-visco="<?= $k['visco'] ?>"
                                      data-vac1="<?= $k['vac1'] ?>"
                                      data-vac2="<?= $k['vac2'] ?>"
                                      data-tekanan="<?= $k['tekanan'] ?>"
                                      data-batch_ti02="<?= $k['batch_ti02'] ?>"
                                      data-batch_r1="<?= $k['batch_r1'] ?>"
                                      data-batch_r3="<?= $k['batch_r3'] ?>"
                                      data-batch_y5="<?= $k['batch_y5'] ?>"
                                      data-batch_b1="<?= $k['batch_b1'] ?>"
                                      data-batch_y10="<?= $k['batch_y10'] ?>"
                                      data-silver="<?= $k['silver'] ?>"
                                      data-bpn="<?= $k['bpn'] ?>"
                                      data-r_40="<?= $k['r_40'] ?>"
                                      data-r_102="<?= $k['r_102'] ?>"
                                      data-ior="<?= $k['ior'] ?>"
                                      data-ioy="<?= $k['ioy'] ?>"
                                      data-p_blue="<?= $k['p_blue'] ?>"
                                      data-p_green="<?= $k['p_green'] ?>"
                                      data-gold="<?= $k['gold'] ?>"
                                      data-y6="<?= $k['y6'] ?>"
                                      data-tgl_tf_mw="<?= $tgl_tf ?>"
                                      data-tgl_buat_lrt="<?= $tgl_lrt ?>"
                                      data-shift="<?= $k['mlt_shift'] ?>"
                                      data-no_fid="<?= $k['no_fid'] ?>"
                                      data-no_urut="<?= $k['no_urut'] ?>"
                                      data-kurang="<?= $k['sisa'] ?>"
                                      data-op1="<?= $k['op1'] ?>"
                                      data-op2="<?= $k['op2'] ?>"
                                      data-supervisor="<?= $k['spv'] ?>"
                                      data-nama_operator="<?= $k['nama_operator'] ?>">
                                      <i class="feather icon-edit"></i> Edit
                                    </button>
                                  </div>
                                  <div class="btn-group" role="group">
                                    <a href="<?= base_url() ?>melting/Pewarnaan/delete/<?= $k['id_pewarna'] ?>" class="btn btn-danger btn-square text-light btn-sm" onclick="if (! confirm('Apakah Anda Yakin?')) { return false; }">
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
<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Pewarnaan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>melting/pewarnaan/add">
        <div class="modal-body">
          <!-- <center><label for="pemeriksaan" class="font-weight-bold mt-3">Komposisi Masak Gelatin</label></center> -->
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label for="id_mkt_schedule">NO CR</label>
                <select type="text" class="form-control chosen-select" id="id_mkt_schedule" name="id_mkt_schedule" autocomplete="off" required>
                  <option value="" disabled selected>- Pilih NO CR - </option>
                  <?php foreach ($res_cr as $cr) :  ?>
                    <option value="<?= $cr['id_mkt_schedule'] ?>"
                      data-nama_customer="<?= $cr['nama_customer'] ?>"
                      data-jumlah_order="<?= $cr['jumlah_kp'] ?>"
                      data-size_machine="<?= $cr['size_machine'] ?>"
                      data-jumlah_prd="<?= $cr['jumlah_prd'] ?>"
                      data-warna_cap="<?= $cr['kode_warna_cap'] ?>"
                      data-warna_body="<?= $cr['kode_warna_body'] ?>"
                      data-mesin_prd="<?= $cr['mesin_prd'] ?>"
                      data-batch_kp="<?= $cr['no_batch'] ?>"
                      data-kurang="<?= $cr['sisa'] ?>"><?= $cr['no_cr'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="mkt_customer">Customer</label>
                <input type="text" class="form-control" id="mkt_customer" name="mkt_customer" placeholder="Customer" autocomplete="off" readonly>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="jml_order">Order</label>
                <input type="text" class="form-control" id="jml_order" name="jml_order" placeholder="Order" autocomplete="off" readonly>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="jml_prd">Produksi</label>
                <input type="text" class="form-control" id="jml_prd" name="jml_prd" placeholder="Jumlah Produksi" autocomplete="off" readonly>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="kurang">Kurang</label>
                <input type="text" class="form-control" id="kurang" name="kurang" placeholder="Kurang" autocomplete="off" readonly>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="machine">Machine</label>
                <input type="text" class="form-control" id="machine" name="machine" placeholder="Machine" autocomplete="off" readonly>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="size_machine">Size Machine</label>
                <input type="text" class="form-control" id="size_machine" name="size_machine" placeholder="Size Machine" autocomplete="off" readonly>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="">Kode Warna</label>
                <div class="input-group">
                  <input type="text" class="form-control" id="cap" name="cap" placeholder="Cap" autocomplete="off" readonly>
                  <input type="text" class="form-control" id="body" name="body" placeholder="Body" autocomplete="off" readonly>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="batch_kp">Batch Kapsule</label>
                <input type="text" class="form-control" id="batch_kp" name="batch_kp" placeholder="Batch Kapsule" autocomplete="off" readonly>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="no_urut">No Urut</label>
                <input type="text" class="form-control" id="no_urut" name="no_urut" placeholder="No urut" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="mlt-shift">Shift</label>
                <input type="number" class="form-control" id="mlt-shift" name="mlt-shift" placeholder="Shift" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="tgl_tf_mw">Tanggal Transfer</label>
                <input type="text" class="form-control datepicker" id="tgl_tf_mw" name="tgl_tf_mw" placeholder="Pilih Tanggal" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="tgl_buat_lrt">Tanggal Buat Lrt</label>
                <input type="text" class="form-control datepicker" id="tgl_buat_lrt" name="tgl_buat_lrt" placeholder="Pilih Tanggal" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="no_fid">No Fid</label>
                <input type="text" class="form-control" id="no_fid" name="no_fid" placeholder="No Fid" autocomplete="off" required>
              </div>
            </div>
          </div>

          <center><label for="pemeriksaan" class="font-weight-bold mt-3">Pilih Gelatin</label></center>
          <input type="hidden" id="jumlah_barang" name="jumlah_barang" value="1">
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label for="batch_gel">Batch Gelatin</label>
                <select class="form-control chosen-select" role="menu" id="batch_gel" name="batch_gel">
                  <option value="" disabled selected hidden>- Nama NO Batch -</option>
                  <?php foreach ($res_batch as $b) :  ?>
                    <option value="<?= $b['batch_masak'] ?>"><?= $b['batch_masak'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
          </div>

          <div class="table-responsive">
            <table class="table table-bordered table-sm">
              <thead>
                <tr>
                  <th>Nama Barang</th>
                  <th>Bloom</th>
                  <th>No Batch</th>
                  <th>Qty</th>
                  <th class="text-right">Hapus</th>
                </tr>
              </thead>
              <tbody id="insert_batch">
              </tbody>
            </table>
          </div>

          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label for="jml_larut_awal">Jumlah Larutan Gel Awal (L)</label>
                <input type="number" class="form-control" id="jml_larut_awal" name="jml_larut_awal" placeholder="Jumlah Larutan (L)" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="jml_cutting">Jumlah Cutting (Kg)</label>
                <input type="number" class="form-control" id="jml_cutting" name="jml_cutting" placeholder="Cutting (Kg)" autocomplete="off" min="80" max="90" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="jam_gel">Jumlah Cake (L)</label>
                <input type="text" class="form-control" id="jam_gel" name="jml_cake" placeholder="Jumlah Cake (L)" autocomplete="off" onkeyup="Waktumasuk();" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="jam_pw">Jam Pewarnaan(WIB)</label>
                <input type="text" class="form-control" id="jam_pw" name="jam_pw" placeholder="00.00" autocomplete="off" onkeyup="Waktumasuk();" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="vac">Vaccum</label>
                <div class="input-group">
                  <input type="text" class="form-control" id="vac1" name="vac1" placeholder="00.00" autocomplete="off" required>
                  <input type="text" class="form-control" id="" name="" value="s/d" readonly>
                  <input type="text" class="form-control" id="vac2" name="vac2" placeholder="00.00" autocomplete="off" required>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="visco_cps">Viscositas</label>
                <div class="input-group">
                  <input type="number" class="form-control" id="visco_cps" name="visco_cps" placeholder="Cps" autocomplete="off" required>
                  <!-- <input type="number" class="form-control" id="visco_c" name="visco_c" placeholder="°C" autocomplete="off" required> -->
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="tekanan">Tekanan</label>
                <input type="number" class="form-control text-uppercase" id="tekanan" name="tekanan" placeholder="Tekanan" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="keb_melter">Liter</label>
                <input type="text" class="form-control text-uppercase" id="keb_melter" name="keb_melter" placeholder="Liter" autocomplete="off">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <div class="form-check">
                  <input class="form-check-input" name="cek_warna" type="checkbox" value="Oke">
                  <label class="form-check-label">Cek Warna</label>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="id_user">Forming</label>
                <select type="text" class="form-control chosen-select" id="id_user" name="id_user" autocomplete="off" required>
                  <option value="" disabled selected>- Pilih Forming - </option>
                  <?php foreach ($res_frm as $f): ?>
                    <option value="<?= $f['id_user'] ?>"><?= $f['nama_operator'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="batch_cutting">Batch Cutting</label>
                <input type="text" class="form-control text-uppercase" id="batch_cutting" name="batch_cutting" placeholder="Batch Cutting" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="batch_cake">Batch Cake</label>
                <input type="text" class="form-control text-uppercase" id="batch_cake" name="batch_cake" placeholder="Batch Cake" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="batch_ti02">Batch Ti02</label>
                <input type="text" class="form-control text-uppercase" id="batch_ti02" name="batch_ti02" placeholder="Batch Ti02" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="batch_r1">Batch R1</label>
                <input type="text" class="form-control text-uppercase" id="batch_r1" name="batch_r1" placeholder="Batch R1" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="batch_r3">Batch R3</label>
                <input type="text" class="form-control text-uppercase" id="batch_r3" name="batch_r3" placeholder="Batch R3" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="batch_y5">Batch Y5</label>
                <input type="text" class="form-control text-uppercase" id="batch_y5" name="batch_y5" placeholder="Batch Y5" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="batch_b1">Batch B1</label>
                <input type="text" class="form-control text-uppercase" id="batch_b1" name="batch_b1" placeholder="Batch B1" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="batch_y10">Batch Y10</label>
                <input type="text" class="form-control text-uppercase" id="batch_y10" name="batch_y10" placeholder="Batch Y10" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="silver">Silver</label>
                <input type="text" class="form-control text-uppercase" id="silver" name="silver" placeholder="Silver" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="bpn">Bpn</label>
                <input type="text" class="form-control text-uppercase" id="bpn" name="bpn" placeholder="Bpn" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="r_40">R. 40</label>
                <input type="text" class="form-control text-uppercase" id="r_40" name="r_40" placeholder="R. 40" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="r_102">R. 102</label>
                <input type="text" class="form-control text-uppercase" id="r_102" name="r_102" placeholder="R. 102" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="ior">IOR</label>
                <input type="text" class="form-control text-uppercase" id="ior" name="ior" placeholder="IOR" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="ioy">IOY</label>
                <input type="text" class="form-control text-uppercase" id="ioy" name="ioy" placeholder="IOR" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="p_blue">P. BLUE</label>
                <input type="text" class="form-control text-uppercase" id="p_blue" name="p_blue" placeholder="P. BLUE" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="p_green">P. GREEN</label>
                <input type="text" class="form-control text-uppercase" id="p_green" name="p_green" placeholder="P. GREEN" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="gold">GOLD</label>
                <input type="text" class="form-control text-uppercase" id="gold" name="gold" placeholder="GOLD" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="y6">Y6</label>
                <input type="text" class="form-control text-uppercase" id="y6" name="y6" placeholder="Y6" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="op1">Operator 1</label>
                <input type="text" class="form-control text-uppercase" id="op1" name="op1" placeholder="Operator 1" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="op2">Operator 2</label>
                <input type="text" class="form-control text-uppercase" id="op2" name="op2" placeholder="Operator 2" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="spv">Supervisor</label>
                <input type="text" class="form-control text-uppercase" id="spv" name="spv" placeholder="Supervisor" autocomplete="off" required>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" id="simpan" class="btn btn-primary" onclick="if (! confirm('Apakah Anda Yakin Untuk Menimpan Data Ini? Tolong Untuk Di Check Kembali. Dan Jangan Lupa Untuk Menginputkan Barangnya')) { return false; }">Simpan</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    //set cr
    $('#id_mkt_schedule').on('change', function() {
      const selected = $(this).find(':selected');
      const nama_customer = selected.data('nama_customer');
      const jumlah_kp = selected.data('jumlah_order');
      const jumlah_prd = selected.data('jumlah_prd');
      const sisa = selected.data('kurang');
      const size_machine = selected.data('size_machine');
      const mesin_prd = selected.data('mesin_prd');
      const no_batch = selected.data('no_batch');
      const warna_cap = selected.data('warna_cap');
      const warna_body = selected.data('warna_body');
      const batch_kp = selected.data('batch_kp')

      $('#mkt_customer').val(nama_customer);
      $('#jml_order').val(jumlah_kp);
      $('#jml_prd').val(jumlah_prd);
      $('#kurang').val(sisa);
      $('#size_machine').val(size_machine);
      $('#machine').val(mesin_prd);
      $('#cap').val(warna_cap);
      $('#body').val(warna_body);
      $('#batch_kp').val(batch_kp);
    })

    var $body = $('#insert_batch');
    $body.empty();

    let index = 0;

    $('#batch_gel').on('change', function() {
      const batch = $(this).val();

      $.ajax({
        url: "<?= base_url('melting/pewarnaan/get_by_batch') ?>",
        type: "POST",
        data: {
          batch_masak: batch
        },
        dataType: "json",
        success: function(res) {

          if (res.length === 0) {
            alert('Data batch tidak ditemukan');
            return;
          }

          res.forEach(function(item) {

            let row = `
            <tr id="row_${index}">
              <td>
                ${item.nama_barang}
              </td>

              <td>
                ${item.bloom}
              </td>

              <td>
                ${item.batch_masak}
              </td>

              <td>
                  ${item.jml_bahan}
              </td>

              <td class="text-right">
                <button type="button" class="btn btn-danger btn-sm"
                  onclick="$('#row_${index}').remove()">X</button>
              </td>
            </tr>
          `;

            $('#insert_batch').append(row);
            index++;
          });

        }
      });
    });
  })
</script>

<!-- Modal Detail -->
<div class="modal fade" id="view" tabindex="-1">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Detail Pewarnaan</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>

      <div class="modal-body">

        <!-- ================= HEADER ================= -->
        <div class="row">
          <div class="col-md-3">
            <label>NO CR</label>
            <input type="text" class="form-control" id="d_no_cr" readonly>
          </div>

          <div class="col-md-3">
            <label>Customer</label>
            <input type="text" class="form-control" id="d_customer" readonly>
          </div>

          <div class="col-md-3">
            <label>Order</label>
            <input type="text" class="form-control" id="d_order" readonly>
          </div>

          <div class="col-md-3">
            <label>Produksi</label>
            <input type="text" class="form-control" id="d_produksi" readonly>
          </div>

          <div class="col-md-3">
            <label>Machine</label>
            <input type="text" class="form-control" id="d_machine" readonly>
          </div>

          <div class="col-md-3">
            <label>Size Machine</label>
            <input type="text" class="form-control" id="d_size_machine" readonly>
          </div>

          <div class="col-md-3">
            <label>Kode Warna</label>
            <div class="input-group">
              <input type="text" class="form-control" id="d_cap" readonly>
              <input type="text" class="form-control" id="d_body" readonly>
            </div>
          </div>

          <div class="col-md-3">
            <label>Kurang</label>
            <input type="text" class="form-control" id="d_kurang" readonly>
          </div>

          <div class="col-md-3">
            <label>Batch Kapsule</label>
            <input type="text" class="form-control" id="d_batch_kp" readonly>
          </div>

          <div class="col-md-3">
            <label>No Urut</label>
            <input type="text" class="form-control" id="d_no_urut" readonly>
          </div>

          <div class="col-md-3">
            <label>Shift</label>
            <input type="text" class="form-control" id="d_shift" readonly>
          </div>

          <div class="col-md-3">
            <label>Tanggal Transfer</label>
            <input type="text" class="form-control" id="d_tgl_tf" readonly>
          </div>

          <div class="col-md-3">
            <label>Tanggal Buat LRT</label>
            <input type="text" class="form-control" id="d_tgl_lrt" readonly>
          </div>

          <div class="col-md-3">
            <label>No Fid</label>
            <input type="text" class="form-control" id="d_no_fid" readonly>
          </div>
        </div>

        <hr>

        <!-- ================= GELATIN ================= -->
        <h6 class="font-weight-bold text-center">Gelatin</h6>

        <div class="table-responsive">
          <table class="table table-bordered table-sm">
            <thead>
              <tr>
                <th>Nama Barang</th>
                <th>Bloom</th>
                <th>No Batch</th>
                <th>Qty</th>
              </tr>
            </thead>
            <tbody id="detail_batch">
              <!-- diisi via ajax -->
            </tbody>
          </table>
        </div>

        <hr>

        <!-- ================= PROSES ================= -->
        <div class="row">
          <div class="col-md-3">
            <label>Jumlah Larutan (L)</label>
            <input type="text" class="form-control" id="d_jml_larut" readonly>
          </div>

          <div class="col-md-3">
            <label>Jumlah Cutting (Kg)</label>
            <input type="text" class="form-control" id="d_cutting" readonly>
          </div>

          <div class="col-md-3">
            <label>Jumlah Cake (L)</label>
            <input type="text" class="form-control" id="d_cake" readonly>
          </div>

          <div class="col-md-3">
            <label>Jam Pewarnaan</label>
            <input type="text" class="form-control" id="d_jam_pw" readonly>
          </div>

          <div class="col-md-3">
            <label>Vacuum</label>
            <div class="input-group">
              <input type="text" class="form-control" id="d_vac1" readonly>
              <input type="text" class="form-control" value="s/d" readonly>
              <input type="text" class="form-control" id="d_vac2" readonly>
            </div>
          </div>

          <div class="col-md-3">
            <label>Viscositas</label>
            <input type="text" class="form-control" id="d_visco" readonly>
          </div>

          <div class="col-md-3">
            <label>Tekanan</label>
            <input type="text" class="form-control" id="d_tekanan" readonly>
          </div>
          <div class="col-md-3">
            <label>Liter</label>
            <input type="text" class="form-control" id="d_liter" readonly>
          </div>

          <div class="col-md-3">
            <label>Cek Warna</label>
            <input type="text" class="form-control" id="d_cek_warna" readonly>
          </div>

          <div class="col-md-3">
            <label>Forming</label>
            <input type="text" class="form-control" id="d_forming" readonly>
          </div>

          <div class="col-md-3">
            <label>Batch Cutting</label>
            <input type="text" class="form-control" id="d_batch_cutting" readonly>
          </div>

          <div class="col-md-3">
            <label>Batch Cake</label>
            <input type="text" class="form-control" id="d_batch_cake" readonly>
          </div>


        </div>
        <hr>
        <h6 class="font-weight-bold text-center">Bahan Pewarna</h6>

        <div class="row">
          <!-- ===== BAHAN PEWARNA (DETAIL) ===== -->

          <div class="col-md-3">
            <div class="form-group">
              <label>Batch Ti02</label>
              <input type="text" class="form-control text-uppercase"
                id="d_batch_ti02" readonly>
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group">
              <label>Batch R1</label>
              <input type="text" class="form-control text-uppercase"
                id="d_batch_r1" readonly>
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group">
              <label>Batch R3</label>
              <input type="text" class="form-control text-uppercase"
                id="d_batch_r3" readonly>
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group">
              <label>Batch Y5</label>
              <input type="text" class="form-control text-uppercase"
                id="d_batch_y5" readonly>
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group">
              <label>Batch B1</label>
              <input type="text" class="form-control text-uppercase"
                id="d_batch_b1" readonly>
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group">
              <label>Batch Y10</label>
              <input type="text" class="form-control text-uppercase"
                id="d_batch_y10" readonly>
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group">
              <label>Silver</label>
              <input type="text" class="form-control text-uppercase"
                id="d_silver" readonly>
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group">
              <label>Bpn</label>
              <input type="text" class="form-control text-uppercase"
                id="d_bpn" readonly>
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group">
              <label>R. 40</label>
              <input type="text" class="form-control text-uppercase"
                id="d_r40" readonly>
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group">
              <label>R. 102</label>
              <input type="text" class="form-control text-uppercase"
                id="d_r102" readonly>
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group">
              <label>IOR</label>
              <input type="text" class="form-control text-uppercase"
                id="d_ior" readonly>
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group">
              <label>IOY</label>
              <input type="text" class="form-control text-uppercase"
                id="d_ioy" readonly>
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group">
              <label>P. BLUE</label>
              <input type="text" class="form-control text-uppercase"
                id="d_p_blue" readonly>
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group">
              <label>P. GREEN</label>
              <input type="text" class="form-control text-uppercase"
                id="d_p_green" readonly>
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group">
              <label>GOLD</label>
              <input type="text" class="form-control text-uppercase"
                id="d_gold" readonly>
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group">
              <label>Y6</label>
              <input type="text" class="form-control text-uppercase"
                id="d_y6" readonly>
            </div>
          </div>

        </div>

        <hr>
        <h6 class="font-weight-bold text-center">Operator</h6>

        <div class="row">
          <div class="col-md-3">
            <label>Operator 1</label>
            <input type="text" class="form-control" id="d_op1" readonly>
          </div>
          <div class="col-md-3">
            <label>Operator 2</label>
            <input type="text" class="form-control" id="d_op2" readonly>
          </div>
          <div class="col-md-3">
            <label>Supervisor</label>
            <input type="text" class="form-control" id="d_supervisor" readonly>
          </div>
        </div>



      </div>

      <div class="modal-footer">
        <button class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<script>
  $(document).on('click', '.btn-detail', function() {

   const el = $(this);

    const map = {
        no_cr: 'd_no_cr',
        nama_customer: 'd_customer',
        jumlah_kp: 'd_order',
        jumlah_prd: 'd_produksi',
        mesin_prd: 'd_machine',
        size_machine: 'd_size_machine',
        kode_warna_cap: 'd_cap',
        kode_warna_body: 'd_body',

        jml_larut_awal: 'd_jml_larut',
        jml_cutting: 'd_cutting',
        jml_cake: 'd_cake',
        jam_pw: 'd_jam_pw',
        vac1: 'd_vac1',
        vac2: 'd_vac2',
        visco: 'd_visco',
        tekanan: 'd_tekanan',

        kurang: 'd_kurang',
        no_batch: 'd_batch_kp',
        no_urut: 'd_no_urut',
        shift: 'd_shift',
        tgl_tf_mw: 'd_tgl_tf',
        tgl_buat_lrt: 'd_tgl_lrt',
        no_fid: 'd_no_fid',

        keb_melter: 'd_liter',
        cek_warna: 'd_cek_warna',
        nama_operator: 'd_forming',
        batch_cutting: 'd_batch_cutting',
        batch_cake: 'd_batch_cake',

        batch_ti02: 'd_batch_ti02',
        batch_r1: 'd_batch_r1',
        batch_r3: 'd_batch_r3',
        batch_y5: 'd_batch_y5',
        batch_b1: 'd_batch_b1',
        batch_y10: 'd_batch_y10',
        silver: 'd_silver',
        bpn: 'd_bpn',
        r_40: 'd_r40',
        r_102: 'd_r102',
        ior: 'd_ior',
        ioy: 'd_ioy',
        p_blue: 'd_p_blue',
        p_green: 'd_p_green',
        gold: 'd_gold',
        y6: 'd_y6',

        op1: 'd_op1',
        op2: 'd_op2',
        supervisor: 'd_supervisor'
    };

    $.each(map, function (dataKey, inputId) {
        $('#' + inputId).val(el.data(dataKey));
    });





    // LOAD DETAIL GELATIN
    const batch_masak = $(this).data('batch_masak');
    $('#detail_batch').html('');

    $.ajax({
      url: "<?= base_url('melting/pewarnaan/get_by_batch') ?>",
      type: "POST",
      data: {
        batch_masak: batch_masak
      },
      dataType: "json",
      success: function(res) {

        if (res.length === 0) {
          alert('Data batch tidak ditemukan');
          return;
        }
        res.forEach(r => {
          $('#detail_batch').append(`
          <tr>
            <td>${r.nama_barang}</td>
            <td>${r.bloom}</td>
            <td>${r.batch_masak}</td>
            <td>${r.jml_bahan}</td>
          </tr>
        `);
        });
      }
    });

  });
</script>