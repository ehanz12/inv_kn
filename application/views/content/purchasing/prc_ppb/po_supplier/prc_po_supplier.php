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
                                    <!-- <h5 class="m-b-10">Data Supplier</h5> -->
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="feather icon-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="javascript:">Marketing</a></li>
                                    <li class="breadcrumb-item"><a href="<?= base_url('purchasing/prc_ppb/po_supplier/prc_po_supplier') ?>">Supplier</a></li>
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
                                        <h5>Data supplier</h5>

                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#add">
                                            <i class="feather icon-user-plus"></i>Tambah supplier
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
                                                        <th>Kode Supplier</th>
                                                        <th>Nama Supplier</th>
                                                        <th>Kontak Supplier</th>
                                                        <th class="text-center">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $level = $this->session->userdata('departement');
                                                    $no = 1;
                                                    foreach ($result as $k) {
                                                    ?>
                                                        <tr>
                                                            <th scope="row"><?= $no++ ?></th>
                                                            <td><?= $k['kode_supplier'] ?></td>
                                                            <td><?= $k['nama_supplier'] ?></td>
                                                            <td><?= $k['kontak_supplier'] ?></td>
                                                            <td class="text-center">
                                                                <?php if ($level === "admin") { ?>
                                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                                        <button type="button" class="btn btn-info btn-square btn-sm" data-toggle="modal" data-target="#edit" 
                                                                        data-id_prc_master_supplier="<?= $k['id_prc_master_supplier'] ?>"  
                                                                        data-kode_supplier="<?= $k['kode_supplier'] ?>" 
                                                                        data-golongan="<?= $k['golongan'] ?>" 
                                                                        data-nama_supplier="<?= $k['nama_supplier'] ?>" 
                                                                        data-negara_supplier="<?= $k['negara_supplier']?>" 
                                                                        data-kontak_supplier="<?= $k['kontak_supplier']?>" 
                                                                        >
                                                                            <i class="feather icon-edit-2"></i>Edit
                                                                        </button>
                                                                    </div>
                                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                                        <a type="button" class="btn btn-danger btn-square text-light btn-sm" href="<?= base_url() ?>Purchasing/prc_ppb/Po_supplier/Prc_po_supplier/delete/<?= $k['id_prc_master_supplier'] ?>" onclick="if (! confirm('Apakah Anda Yakin?')) { return false; }">
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

<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah supplier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url() ?>Purchasing/prc_ppb/Po_supplier/Prc_po_supplier/add">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="golongan">Golongan</label>
                        <select class="form-control chosen-select" id="golongan" name="golongan" autocomplete="off" required>
                            <option value="" disabled selected hidden>- Golongan -</option>
                            <option value="GELATIN">GELATIN</option>
                            <option value="PEWARNA">PEWARNA</option>
                            <option value="KEMASAN KARTON">KEMASAN KARTON</option>
                            <option value="STEROFORM">STEROFORM</option>
                            <option value="METALIZE">METALIZE</option>
                            <option value="BAHAN GREASE">BAHAN GREASE</option>
                            <option value="PEREAKSI LAB">PEREAKSI LAB</option>
                            <option value="BENGKEL">BENGKEL</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="kode_prc_po_supplier">Kode Supplier</label>
                        <input type="text" class="form-control" id="kode_prc_po_supplier" name="kode_prc_po_supplier" maxlength="20" placeholder="Kode Supplier" aria-describedby="validationServer03Feedback" autocomplete="off" required>
                        <div id="validationServer03Feedback" class="invalid-feedback">
                        Maaf Kode Supplier sudah ada.
                        </div>
                    </div>
            
                    <div class="form-group">
                        <label for="nama_po_supplier">Nama Supplier</label>
                        <input type="text" class="form-control text-uppercase" id="nama_po_supplier" name="nama_po_supplier" autocomplete="off" placeholder="Nama Supplier" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="negara_po_supplier">Negara Supplier</label>
                        <input type="text" class="form-control text-uppercase" id="negara_po_supplier" name="negara_po_supplier" autocomplete="off" placeholder="Negara Supplier" required>
                    </div>
                    <div class="form-group">
                        <label for="kontak_po_supplier">Kontak Supplier</label>
                        <input type="text" class="form-control" id="kontak_supplier" name="kontak_po_supplier" autocomplete="off" placeholder="Kontak Supplier" required>
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

<script type="text/javascript">
    $(document).ready(function() {
        uppercase('#kode_prc_po_supplier');
        uppercase('#nama_po_supplier');
        uppercase('#negara_po_supplier');
        $('#kontak_supplier').on('input', function() {
        this.value = this.value.replace(/[^0-9+]/g, ''); // hanya boleh angka & +
        });

        $("#kode_prc_po_supplier").keyup(function() {
        var kode_prc_po_supplier = $("#kode_prc_po_supplier").val();
        jQuery.ajax({
            url: "<?= base_url() ?>Purchasing/prc_ppb/Po_supplier/Prc_po_supplier/cek_kode_supplier/",
            dataType: 'text',
            type: "post",
            data: {
                kode_prc_po_supplier: kode_prc_po_supplier
            },
            success: function(response) {
                if (response == "true") {
                    $("#kode_prc_po_supplier").addClass("is-invalid");
                    $("#simpan").attr("disabled", "disabled");
                } else {
                    $("#kode_prc_po_supplier").removeClass("is-invalid");
                    $("#simpan").removeAttr("disabled");
                }
            }
        });
    })
    });


    $('#cek_print').change(function() {
        if (this.checked) {
            $('#form_print').show()
            $('#print').prop('required', true);
        } else {
            $('#form_print').hide()
            $('#print').prop('required', false);
        }
    })
</script>

<!-- Modal -->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit PO Supplier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url() ?>Purchasing/prc_ppb/Po_supplier/Prc_po_supplier/update">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" id="e_id_prc_po_supplier" name="id_prc_master_supplier">
                        <div class="form-group">
                            <label for="golongan">Golongan</label>
                            <input type="text" class="form-control text-uppercase" id="e_golongan" name="golongan" autocomplete="off" placeholder="Golongan" required>
                        </div>
                        <label for="kode_prc_po_supplier">Kode PO Supplier</label>
                        <input type="text" class="form-control text-uppercase" id="e_kode_prc_po_supplier" name="kode_supplier" autocomplete="off" placeholder="Kode PO Supplier" required>
                        <div class="form-group">
                            <label for="nama_po_supplier">Nama Supplier</label>
                            <input type="text" class="form-control text-uppercase" id="e_nama_po_supplier" name="nama_supplier" autocomplete="off" placeholder="Nama PO Supplier" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="negara_po_supplier">Negara Supplier</label>
                            <input type="text" class="form-control text-uppercase" id="e_negara_po_supplier" name="negara_supplier" autocomplete="off" placeholder="Negara PO Supplier" required>
                        </div>
                        <div class="form-group">
                            <label for="kontak_supplier">Kontak Supplier</label>
                            <input type="text" class="form-control text-uppercase" id="e_kontak_po_supplier" name="kontak_supplier" autocomplete="off" placeholder="Alamat PO Supplier" required>
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
    $(document).ready(function() {
        $('#edit').on('show.bs.modal', function(event) {
            var id_prc_ppb_supplier = $(event.relatedTarget).data('id_prc_master_supplier')
            var golongan = $(event.relatedTarget).data('golongan')
            var kode_prc_po_supplier = $(event.relatedTarget).data('kode_supplier')
            var nama_po_supplier = $(event.relatedTarget).data('nama_supplier')
            var negara_po_supplier = $(event.relatedTarget).data('negara_supplier')
            var kontak_supplier = $(event.relatedTarget).data('kontak_supplier')
            

            $(this).find('#e_id_prc_po_supplier').val(id_prc_ppb_supplier)
            $(this).find('#e_golongan').val(golongan)
            $(this).find('#e_kode_prc_po_supplier').val(kode_prc_po_supplier)
            $(this).find('#e_nama_po_supplier').val(nama_po_supplier)
            $(this).find('#e_negara_po_supplier').val(negara_po_supplier)
            $(this).find('#e_kontak_po_supplier').val(kontak_supplier)
            
            $('#e_kontak_po_supplier').on('input', function() {
            this.value = this.value.replace(/[^0-9+]/g, ''); // hanya boleh angka & +
            });
            

            uppercase('#e_kode_prc_po_supplier');
            uppercase('#e_nama_po_supplier');
            uppercase('#e_pic_po_supplier');
        })
    }) 
</script>