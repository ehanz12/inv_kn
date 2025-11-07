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
                                    <!-- <h5 class="m-b-10">Data Master Print</h5> -->
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="feather icon-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="javascript:">Marketing</a></li>
                                    <li class="breadcrumb-item"><a href="<?= base_url('Marketing/master/Master_print') ?>">Master Print</a></li>
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
                                        <h5>Data Master Print</h5>

                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#add">
                                            <i class="feather icon-printer"></i> Tambah Print
                                        </button>
                                    </div>
                                    <div class="card-block table-border-style">

                                        <!-- Alert dari URL parameter -->
                                        <?php if(isset($_GET['alert']) && isset($_GET['msg'])): ?>
                                            <div class="alert alert-<?= $_GET['alert'] == 'success' ? 'success' : 'danger' ?> alert-dismissible fade show">
                                                <i class="feather <?= $_GET['alert'] == 'success' ? 'icon-check-circle' : 'icon-alert-triangle' ?>"></i>
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
                                                        <th>Kode Print</th>
                                                        <th>Nama Customer</th>
                                                        <th>Logo Print</th>
                                                        <th>Dibuat Pada</th>
                                                        <th class="text-center">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $level = $this->session->userdata('level');
                                                    $no = 1;
                                                    if(!empty($result)) {
                                                        foreach ($result as $k) {
                                                    ?>
                                                        <tr>
                                                            <th scope="row"><?= $no++ ?></th>
                                                            <td><span class="badge badge-primary"><?= $k['kode_print'] ?></span></td>
                                                            <td><?= $k['nama_customer'] ?></td>
                                                            <td><?= $k['logo_print'] ?></td>
                                                            <td><?= date('d/m/Y H:i', strtotime($k['created_at'])) ?></td>
                                                            <td class="text-center">
                                                                <?php if ($level === "admin") { ?>
                                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                                        <button type="button" class="btn btn-info btn-square btn-sm" data-toggle="modal" data-target="#edit" 
                                                                                data-id_master_print="<?= $k['id_master_print'] ?>" 
                                                                                data-kode_print="<?= $k['kode_print'] ?>" 
                                                                                data-id_master_customer="<?= $k['id_master_customer'] ?>" 
                                                                                data-logo_print="<?= $k['logo_print'] ?>">
                                                                            <i class="feather icon-edit-2"></i> Edit
                                                                        </button>
                                                                    </div>
                                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                                        <a type="button" class="btn btn-danger btn-square text-light btn-sm" 
                                                                           href="<?= base_url() ?>Marketing/master/Master_print/delete/<?= $k['id_master_print'] ?>" 
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
                                                            <td colspan="6" class="text-center py-4">
                                                                <i class="feather icon-inbox" style="font-size: 48px; color: #ccc;"></i>
                                                                <p class="text-muted mt-2">Belum ada data print</p>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Master Print</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url() ?>Marketing/master/Master_print/add">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="kode_print">Kode Print</label>
                        <input type="text" class="form-control text-uppercase" id="kode_print" name="kode_print" autocomplete="off" placeholder="Kode Print" aria-describedby="validationServer03Feedback" required>
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            Maaf Kode Print sudah ada.
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="id_master_customer">Nama Customer</label>
                        <select class="form-control" id="id_master_customer" name="id_master_customer" required>
                            <option value="">- Pilih Customer -</option>
                            <?php
                            // Ambil data customer dari database
                            $customers = $this->db->query("SELECT * FROM tb_mkt_master_customer WHERE is_deleted = 0 ORDER BY nama_customer ASC")->result_array();
                            foreach($customers as $customer) {
                                echo '<option value="'.$customer['id_customer'].'">'.$customer['nama_customer'].'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="logo_print">Logo Print</label>
                        <input type="text" class="form-control text-uppercase" id="logo_print" name="logo_print" autocomplete="off" placeholder="Logo Print" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="simpan">Simpan</button>
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
                <h5 class="modal-title" id="exampleModalLabel">Edit Master Print</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url() ?>Marketing/master/Master_print/update" id="form-edit">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="kode_print">Kode Print</label>
                        <input type="hidden" id="e_id_master_print" name="id_master_print">
                        <input type="text" class="form-control text-uppercase" id="e_kode_print" name="kode_print" autocomplete="off" required>
                        <div id="validationServer03FeedbackEdit" class="invalid-feedback">
                            Maaf Kode Print sudah ada.
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="id_master_customer">Nama Customer</label>
                        <select class="form-control" id="e_id_master_customer" name="id_master_customer" required>
                            <option value="">- Pilih Customer -</option>
                            <?php
                            foreach($customers as $customer) {
                                echo '<option value="'.$customer['id_customer'].'">'.$customer['nama_customer'].'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="logo_print">Logo Print</label>
                        <input type="text" class="form-control text-uppercase" id="e_logo_print" name="logo_print" autocomplete="off" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info" id="update-btn">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        // Fungsi uppercase untuk input text
        uppercase('#kode_print');
        uppercase('#logo_print');
        uppercase('#e_kode_print');
        uppercase('#e_logo_print');

        // Cek kode print untuk tambah data
        $("#kode_print").keyup(function(){
            var kode_print = $("#kode_print").val();
            jQuery.ajax({
                url: "<?= base_url() ?>Marketing/master/Master_print/cek_kode_print",
                dataType: 'text',
                type: "post",
                data: {kode_print: kode_print},
                success: function(response){
                    if (response == "true") {
                        $("#kode_print").addClass("is-invalid");
                        $("#simpan").attr("disabled", "disabled");
                    } else {
                        $("#kode_print").removeClass("is-invalid");
                        $("#simpan").removeAttr("disabled");
                    }
                }            
            });
        });

        // Cek kode print untuk edit data
        $("#e_kode_print").keyup(function(){
            var kode_print = $("#e_kode_print").val();
            var id_master_print = $("#e_id_master_print").val();
            
            jQuery.ajax({
                url: "<?= base_url() ?>Marketing/master/Master_print/cek_kode_print_edit",
                dataType: 'text',
                type: "post",
                data: {
                    kode_print: kode_print,
                    id_master_print: id_master_print
                },
                success: function(response){
                    if (response == "true") {
                        $("#e_kode_print").addClass("is-invalid");
                        $("#update-btn").attr("disabled", "disabled");
                    } else {
                        $("#e_kode_print").removeClass("is-invalid");
                        $("#update-btn").removeAttr("disabled");
                    }
                }            
            });
        });

        // Modal edit show event
        $('#edit').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id_master_print = button.data('id_master_print');
            var kode_print = button.data('kode_print');
            var id_master_customer = button.data('id_master_customer');
            var logo_print = button.data('logo_print');

            var modal = $(this);
            modal.find('#e_id_master_print').val(id_master_print);
            modal.find('#e_kode_print').val(kode_print);
            modal.find('#e_id_master_customer').val(id_master_customer);
            modal.find('#e_logo_print').val(logo_print);

            // Reset validation state
            modal.find('#e_kode_print').removeClass("is-invalid");
            modal.find('#update-btn').removeAttr("disabled");

            // Apply uppercase
            uppercase('#e_kode_print');
            uppercase('#e_logo_print');
        });

        // Reset form ketika modal edit ditutup
        $('#edit').on('hidden.bs.modal', function() {
            $(this).find('form')[0].reset();
            $(this).find('.is-invalid').removeClass('is-invalid');
            $(this).find('#update-btn').removeAttr('disabled');
        });

        // Auto-hide alert setelah 5 detik
        setTimeout(function() {
            $('.alert').alert('close');
        }, 5000);
    });

    // Fungsi uppercase
    function uppercase(selector) {
        $(selector).on('keyup', function() {
            this.value = this.value.toUpperCase();
        });
    }
</script>