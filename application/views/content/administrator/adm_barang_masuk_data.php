<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Barang Masuk</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <style>
        /* CSS styles tetap sama seperti sebelumnya */
        :root {
            --primary: #4361ee;
            --secondary: #3f37c9;
            --success: #4cc9f0;
            --info: #4895ef;
            --warning: #ae4976ff;
            --danger: #e63946;
            --light: #f8f9fa;
            --dark: #212529;
            --gray: #6c757d;
            --light-gray: #e9ecef;
            --border-radius: 12px;
            --box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            --transition: all 0.3s ease;
        }

        body {
            background-color: #f5f7fb;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
        }

        .page-header {
            margin-bottom: 25px;
        }

        .page-title {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 10px;
            color: var(--dark);
            display: flex;
            align-items: center;
        }

        .page-title i {
            margin-right: 10px;
            color: var(--primary);
        }

        .breadcrumb {
            background: transparent;
            padding: 0;
            margin-bottom: 0;
        }

        .breadcrumb-item a {
            color: var(--primary);
            text-decoration: none;
        }

        .card {
            width: 100%;
            border: none;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            margin-bottom: 25px;
        }

        .card-header {
            background: white;
            border-bottom: 1px solid var(--light-gray);
            padding: 15px 20px;
            border-radius: var(--border-radius) var(--border-radius) 0 0 !important;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .card-header h5 {
            font-size: 18px;
            font-weight: 700;
            color: var(--dark);
            margin: 0;
        }

        .btn {
            border-radius: 8px;
            font-weight: 600;
            padding: 8px 16px;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 5px;
            border: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(67, 97, 238, 0.3);
        }

        .btn-secondary {
            background: linear-gradient(135deg, var(--gray), #495057);
            color: white;
        }

        .btn-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(108, 117, 125, 0.3);
        }

        .btn-warning {
            background: linear-gradient(135deg, var(--warning), #b5179e);
            color: white;
        }

        .btn-warning:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(174, 73, 118, 0.3);
        }

        .btn-info {
            background: linear-gradient(135deg, var(--info), #3a86ff);
            color: white;
        }

        .btn-info:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(72, 149, 239, 0.3);
        }

        .table-responsive {
            border-radius: 0 0 var(--border-radius) var(--border-radius);
            overflow: hidden;
        }

        .table {
            margin-bottom: 0;
            border-collapse: separate;
            border-spacing: 0;
            width: 100%;
        }

        .table thead th {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            border: none;
            padding: 13px 10px;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 12px;
            line-height: 1.5;
            letter-spacing: 0.5px;
            white-space: nowrap;
        }

        .table tbody td {
            padding: 12px 10px;
            vertical-align: middle;
            border-bottom: 1px solid var(--light-gray);
            white-space: nowrap;
            font-size: 13px;
        }

        .table tbody tr {
            transition: var(--transition);
        }

        .table tbody tr:hover {
            background-color: rgba(67, 97, 238, 0.05);
            transform: translateY(-1px);
        }

        .table tbody tr:last-child td {
            border-bottom: none;
        }

        .badge {
            padding: 6px 10px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 11px;
            cursor: pointer;
            transition: var(--transition);
        }

        .badge:hover {
            transform: translateY(-1px);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .badge-primary {
            background-color: rgba(67, 97, 238, 0.1);
            color: var(--primary);
            border: 1px solid rgba(67, 97, 238, 0.2);
        }

        .badge-success {
            background-color: rgba(76, 201, 240, 0.1);
            color: var(--success);
            border: 1px solid rgba(76, 201, 240, 0.2);
        }

        .filter-section {
            background: white;
            padding: 20px;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            margin-bottom: 25px;
            border-left: 4px solid var(--primary);
        }

        .filter-row {
            display: flex;
            gap: 15px;
            align-items: end;
            flex-wrap: wrap;
        }

        .filter-group {
            flex: 1;
            min-width: 250px;
            margin-bottom: 0;
            position: relative;
        }

        .filter-actions {
            display: flex;
            gap: 10px;
            align-items: end;
        }

        .filter-actions .btn {
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            white-space: nowrap;
        }

        .form-label {
            font-weight: 600;
            margin-bottom: 8px;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .form-control {
            border-radius: 8px;
            border: 1px solid var(--light-gray);
            padding: 10px 12px;
            transition: var(--transition);
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.2rem rgba(67, 97, 238, 0.25);
        }

        /* Autocomplete Styles */
        .autocomplete-container {
            position: relative;
        }

        .autocomplete-list {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: white;
            border: 1px solid var(--light-gray);
            border-radius: 8px;
            box-shadow: var(--box-shadow);
            max-height: 200px;
            overflow-y: auto;
            z-index: 1000;
            display: none;
        }

        .autocomplete-item {
            padding: 10px 12px;
            cursor: pointer;
            border-bottom: 1px solid var(--light-gray);
            transition: var(--transition);
        }

        .autocomplete-item:hover {
            background-color: rgba(67, 97, 238, 0.1);
        }

        .autocomplete-item:last-child {
            border-bottom: none;
        }

        .autocomplete-item.active {
            background-color: rgba(67, 97, 238, 0.2);
        }

        /* Datepicker Styles */
        .datepicker {
            border-radius: 8px;
            box-shadow: var(--box-shadow);
        }

        .datepicker table tr td.active, 
        .datepicker table tr td.active:hover {
            background-color: var(--primary);
        }

        .datepicker table tr td.today {
            background-color: rgba(67, 97, 238, 0.1);
        }

        /* Modal Detail Styles */
        .detail-item {
            padding: 8px 0;
            border-bottom: 1px solid var(--light-gray);
        }

        .detail-item:last-child {
            border-bottom: none;
        }

        .detail-label {
            font-weight: 600;
            color: var(--dark);
            min-width: 150px;
        }

        .detail-value {
            color: var(--gray);
        }

        @media (max-width: 768px) {
            .card-header {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }

            .filter-row {
                flex-direction: column;
            }

            .filter-group {
                width: 100%;
                min-width: auto;
            }

            .filter-actions {
                width: 100%;
                justify-content: stretch;
                margin-top: 10px;
            }

            .filter-actions .btn {
                flex: 1;
            }

            .detail-label {
                min-width: 120px;
            }
        }
    </style>
</head>

<body>

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
                                    <h5 class="m-b-10 page-title">
                                        <i class="fas fa-boxes"></i>Laporan Barang Masuk
                                    </h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="javascript:">Laporan Barang Masuk</a></li>
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
                                
                                <!-- Filter Section -->
                                <div class="filter-section">
                                    <form method="GET" action="<?= base_url('administrator/adm_barang_masuk') ?>" id="filterForm">
                                        <div class="filter-row">
                                            <div class="filter-group autocomplete-container">
                                                <label class="form-label">
                                                    <i class="fas fa-search"></i>No. DPB
                                                </label>
                                                <input type="text" class="form-control" id="filter_no_dpb" name="no_dpb" value="<?= htmlspecialchars($no_dpb ?? '') ?>" placeholder="Masukkan No. DPB" autocomplete="off">
                                                <div class="autocomplete-list" id="no_dpb_suggestions"></div>
                                            </div>
                                            
                                            <div class="filter-group">
                                                <label class="form-label">
                                                    <i class="fas fa-calendar"></i>Tanggal Mulai
                                                </label>
                                                <input type="text" class="form-control datepicker" id="filter_tgl_mulai" name="tgl_mulai" value="<?= htmlspecialchars($tgl_mulai ?? '') ?>" placeholder="Pilih tanggal mulai" readonly>
                                            </div>
                                            
                                            <div class="filter-group">
                                                <label class="form-label">
                                                    <i class="fas fa-calendar"></i>Tanggal Selesai
                                                </label>
                                                <input type="text" class="form-control datepicker" id="filter_tgl_selesai" name="tgl_selesai" value="<?= htmlspecialchars($tgl_selesai ?? '') ?>" placeholder="Pilih tanggal selesai" readonly>
                                            </div>
                                            
                                            <div class="filter-actions">
                                                <button class="btn btn-secondary" type="submit">
                                                    <i class="fas fa-eye mr-1"></i> Lihat
                                                </button>
                                                <button type="button" class="btn btn-primary" id="btn-cetak-semua">
                                                    <i class="fas fa-file-pdf mr-1"></i> Cetak PDF
                                                </button>
                                                <a href="<?= base_url('administrator/adm_barang_masuk/') ?>" class="btn btn-warning" type="button">
                                                    <i class="fas fa-sync-alt mr-1"></i> Reset
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <h5><i class="fas fa-table mr-2"></i>Data Barang Masuk</h5>
                                        <div class="total-records">
                                            <span class="badge badge-primary">Total: <?= count($result) ?> Data</span>
                                           
                                        </div>
                                    </div>
                                    
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-striped table-sm">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Tanggal Diterima</th>
                                                        <th>Nama Barang</th>
                                                        <th>No. Batch</th>                                                       
                                                        <th>Jumlah Diterima</th>
                                                       
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    if (!empty($result) && is_array($result)) {
                                                        foreach ($result as $k) {
                                                    ?>
                                                            <tr>
                                                                <td><?= $no++ ?></td>
                                                                <td><?= !empty($k['tgl_dpb']) ? date('d/m/Y', strtotime($k['tgl_dpb'])) : '-' ?></td>
                                                                <td><?= htmlspecialchars($k['nama_barang'] ?? '-') ?></td>
                                                                <td>
                                                                    <span class="badge badge-success btn-batch-detail" 
                                                                          style="cursor: pointer;"
                                                                          data-batch="<?= htmlspecialchars($k['no_batch'] ?? '') ?>"
                                                                          data-dpb="<?= htmlspecialchars($k['no_dpb'] ?? '') ?>"
                                                                          data-tgl="<?= !empty($k['tgl_dpb']) ? date('Y-m-d', strtotime($k['tgl_dpb'])) : '' ?>"
                                                                          data-jumlah="<?= $k['jml_bm'] ?? 0 ?>"
                                                                          data-jenis-bayar="<?= htmlspecialchars($k['jenis_bayar'] ?? '') ?>"
                                                                          data-surat-jalan="<?= htmlspecialchars($k['no_sjl'] ?? '') ?>"
                                                                          data-admin="<?= htmlspecialchars($k['prc_admin'] ?? '') ?>"
                                                                          data-barang="<?= htmlspecialchars($k['nama_barang'] ?? '') ?>"
                                                                          data-supplier="<?= htmlspecialchars($k['nama_supplier'] ?? '') ?>"
                                                                          data-kode="<?= htmlspecialchars($k['kode_barang'] ?? '') ?>"
                                                                          data-spek="<?= htmlspecialchars($k['spesifikasi'] ?? '') ?>"
                                                                          data-satuan="<?= htmlspecialchars($k['satuan'] ?? '') ?>"
                                                                          data-created="<?= !empty($k['created_at']) ? date('Y-m-d H:i:s', strtotime($k['created_at'])) : '' ?>">
                                                                          
                                                                        <?= htmlspecialchars($k['no_batch'] ?? '-') ?>
                                                                    </span>
                                                                </td>
                                                                
                                                                <td><?= number_format($k['jml_bm'] ?? 0, 0, ',', '.') ?></td>
                                                                
                                                                
                                                              
                                                                
                                                            </tr>
                                                        <?php
                                                        }
                                                    } else { ?>
                                                        <tr>
                                                            <td colspan="11" class="text-center py-4">
                                                                <i class="fas fa-inbox fa-2x text-muted mb-2"></i>
                                                                <br>
                                                                <span class="text-muted">Tidak ada data barang masuk</span>
                                                                <br>
                                                                <small class="text-muted">Data hanya muncul jika sudah memiliki No. Batch di Admin DPB</small>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
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

<!-- Modal Detail Batch -->
<div class="modal fade" id="batchDetailModal" tabindex="-1" aria-labelledby="batchDetailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="batchDetailModalLabel">
                    <i class="fas fa-info-circle me-2"></i>Detail Barang Masuk
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="detail-item d-flex">
                            <span class="detail-label">No. Batch:</span>
                            <span class="detail-value" id="detail-batch">-</span>
                        </div>
                        <div class="detail-item d-flex">
                            <span class="detail-label">No. DPB:</span>
                            <span class="detail-value" id="detail-dpb">-</span>
                        </div>
                        <div class="detail-item d-flex">
                            <span class="detail-label">Tanggal Diterima:</span>
                            <span class="detail-value" id="detail-tanggal">-</span>
                        </div>
                        <div class="detail-item d-flex">
                            <span class="detail-label">Jumlah Diterima:</span>
                            <span class="detail-value" id="detail-jumlah">-</span>
                        </div>
                        <div class="detail-item d-flex">
                            <span class="detail-label">Jenis Bayar:</span>
                            <span class="detail-value" id="detail-jenis-bayar">-</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="detail-item d-flex">
                            <span class="detail-label">No. Surat Jalan:</span>
                            <span class="detail-value" id="detail-surat-jalan">-</span>
                        </div>
                        <div class="detail-item d-flex">
                            <span class="detail-label">Admin:</span>
                            <span class="detail-value" id="detail-admin">-</span>
                        </div>
                        <div class="detail-item d-flex">
                            <span class="detail-label">Nama Barang:</span>
                            <span class="detail-value" id="detail-barang">-</span>
                        </div>
                        <div class="detail-item d-flex">
                            <span class="detail-label">Supplier:</span>
                            <span class="detail-value" id="detail-supplier">-</span>
                        </div>
                        <div class="detail-item d-flex">
                            <span class="detail-label">Tanggal Input:</span>
                            <span class="detail-value" id="detail-created">-</span>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="detail-item d-flex">
                            <span class="detail-label">Kode Barang:</span>
                            <span class="detail-value" id="detail-kode">-</span>
                        </div>
                        <div class="detail-item d-flex">
                            <span class="detail-label">Spesifikasi:</span>
                            <span class="detail-value" id="detail-spek">-</span>
                        </div>
                        <div class="detail-item d-flex">
                            <span class="detail-label">Satuan:</span>
                            <span class="detail-value" id="detail-satuan">-</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-1"></i>Tutup
                </button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.id.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // Inisialisasi datepicker
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            language: 'id',
            todayHighlight: true,
            autoclose: true
        });

        // Variabel untuk menyimpan data autocomplete
        let noDpbList = [];

        // Fungsi untuk mengambil data No. DPB untuk autocomplete
        function loadNoDpbSuggestions() {
            $.ajax({
                url: "<?= base_url('administrator/adm_barang_masuk/get_no_dpb_list') ?>",
                type: "GET",
                dataType: "json",
                success: function(response) {
                    noDpbList = response;
                },
                error: function(xhr, status, error) {
                    console.error('Gagal memuat data No. DPB:', error);
                }
            });
        }

        // Panggil fungsi untuk memuat data saat halaman dimuat
        loadNoDpbSuggestions();

        // Autocomplete untuk No. DPB
        $('#filter_no_dpb').on('input', function() {
            const searchTerm = $(this).val().toLowerCase();
            const suggestionsContainer = $('#no_dpb_suggestions');
            
            if (searchTerm.length < 2) {
                suggestionsContainer.hide();
                return;
            }

            const filteredSuggestions = noDpbList.filter(item => 
                item.no_dpb.toLowerCase().includes(searchTerm)
            );

            if (filteredSuggestions.length > 0) {
                let suggestionsHTML = '';
                filteredSuggestions.slice(0, 10).forEach(item => {
                    suggestionsHTML += `<div class="autocomplete-item" data-value="${item.no_dpb}">${item.no_dpb}</div>`;
                });
                suggestionsContainer.html(suggestionsHTML).show();
            } else {
                suggestionsContainer.hide();
            }
        });

        // Handle klik pada item autocomplete
        $(document).on('click', '.autocomplete-item', function() {
            const selectedValue = $(this).data('value');
            $('#filter_no_dpb').val(selectedValue);
            $('#no_dpb_suggestions').hide();
        });

        // Sembunyikan autocomplete ketika klik di luar
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.autocomplete-container').length) {
                $('#no_dpb_suggestions').hide();
            }
        });

        // Navigasi keyboard untuk autocomplete
        let currentFocus = -1;
        $('#filter_no_dpb').on('keydown', function(e) {
            const items = $('.autocomplete-item');
            
            if (e.keyCode === 40) { // Arrow down
                currentFocus++;
                setActive(items);
            } else if (e.keyCode === 38) { // Arrow up
                currentFocus--;
                setActive(items);
            } else if (e.keyCode === 13) { // Enter
                e.preventDefault();
                if (currentFocus > -1) {
                    if (items[currentFocus]) {
                        $(items[currentFocus]).click();
                    }
                }
            }
        });

        function setActive(items) {
            if (!items) return false;
            removeActive(items);
            if (currentFocus >= items.length) currentFocus = 0;
            if (currentFocus < 0) currentFocus = items.length - 1;
            $(items[currentFocus]).addClass('active');
        }

        function removeActive(items) {
            items.removeClass('active');
        }

        // Auto-fill tanggal berdasarkan No. DPB yang dipilih
        $(document).on('click', '.autocomplete-item', function() {
            const selectedNoDpb = $(this).data('value');
            
            // Cari data lengkap berdasarkan No. DPB
            const selectedData = noDpbList.find(item => item.no_dpb === selectedNoDpb);
            
            if (selectedData && selectedData.tgl_dpb) {
                // Isi otomatis tanggal mulai dan selesai berdasarkan tanggal DPB
                const tglDpb = selectedData.tgl_dpb;
                $('#filter_tgl_mulai').val(tglDpb);
                $('#filter_tgl_selesai').val(tglDpb);
            }
        });

        // Fungsi untuk cetak PDF berdasarkan filter
        $('#btn-cetak-semua').click(function() {
            var no_dpb = $('#filter_no_dpb').val();
            var tgl_mulai = $('#filter_tgl_mulai').val();
            var tgl_selesai = $('#filter_tgl_selesai').val();
            
            var url = '<?= base_url('administrator/adm_barang_masuk/export_pdf') ?>?';
            
            if (no_dpb) {
                url += 'no_dpb=' + encodeURIComponent(no_dpb) + '&';
            }
            
            if (tgl_mulai) {
                url += 'tgl_mulai=' + encodeURIComponent(tgl_mulai) + '&';
            }
            
            if (tgl_selesai) {
                url += 'tgl_selesai=' + encodeURIComponent(tgl_selesai) + '&';
            }
            
            window.open(url.slice(0, -1), '_blank');
        });

        // Modal detail ketika klik No. Batch
        $(document).on('click', '.btn-batch-detail', function() {
            const batch = $(this).data('batch');
            const dpb = $(this).data('dpb');
            const tgl = $(this).data('tgl');
            const jumlah = $(this).data('jumlah');
            const jenisBayar = $(this).data('jenis-bayar');
            const suratJalan = $(this).data('surat-jalan');
            const admin = $(this).data('admin');
            const barang = $(this).data('barang');
            const supplier = $(this).data('supplier');
            const kode = $(this).data('kode');
            const spek = $(this).data('spek');
            const satuan = $(this).data('satuan');
            const created = $(this).data('created');

            // Isi data ke modal
            $('#detail-batch').text(batch || '-');
            $('#detail-dpb').text(dpb || '-');
            $('#detail-tanggal').text(tgl ? formatDate(tgl) : '-');
            $('#detail-jumlah').text(jumlah ? numberFormat(jumlah) : '0');
            $('#detail-jenis-bayar').text(jenisBayar || '-');
            $('#detail-surat-jalan').text(suratJalan || '-');
            $('#detail-admin').text(admin || '-');
            $('#detail-barang').text(barang || '-');
            $('#detail-supplier').text(supplier || '-');
            $('#detail-kode').text(kode || '-');
            $('#detail-spek').text(spek || '-');
            $('#detail-satuan').text(satuan || '-');
            $('#detail-created').text(created ? formatDate(created) : '-');

            // Update judul modal
            $('#batchDetailModalLabel').html(`<i class="fas fa-info-circle me-2"></i>Detail Barang Masuk - Batch: ${batch}`);

            // Tampilkan modal
            const modal = new bootstrap.Modal(document.getElementById('batchDetailModal'));
            modal.show();
        });

        // Fungsi format tanggal
        function formatDate(dateString) {
            const date = new Date(dateString);
            return date.toLocaleDateString('id-ID');
        }

        // Fungsi format tanggal dan waktu
        function formatDateTime(dateTimeString) {
            const date = new Date(dateTimeString);
            return date.toLocaleString('id-ID');
        }

        // Fungsi format number
        function numberFormat(number) {
            return new Intl.NumberFormat('id-ID').format(number);
        }
    });
</script>
</body>
</html>