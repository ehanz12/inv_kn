<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pesanan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css" rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <style>
        :root {
            --primary: #4361ee;
            --barang: #436;
            --upd: #f72585;
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

        .barang-container {
            padding: 20px;
            background-color: #f5f7fb;
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
            padding: 15px 15px;
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

        .btn-group {
            display: flex;
            gap: 10px;
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

        .btn-success {
            background: linear-gradient(135deg, var(--success), var(--info));
            color: white;
        }

        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(76, 201, 240, 0.3);
        }

        .btn-info {
            background: linear-gradient(135deg, var(--info), #3a86ff);
            color: white;
        }

        .btn-warning {
            background: linear-gradient(135deg, var(--warning), #b5179e);
            color: white;
        }

        .btn-danger {
            background: linear-gradient(135deg, var(--danger), #d00000);
            color: white;
        }

        .btn-secondary {
            background: linear-gradient(135deg, var(--gray), #495057);
            color: white;
        }

        .table-responsive {
            border-radius: 0 0 var(--border-radius) var(--border-radius);
            overflow: hidden;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .table {
            margin-bottom: 0;
            border-collapse: separate;
            border-spacing: 0;
            width: 100%;
            min-width: 1200px;
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
            padding: 10px 8px;
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

        .table-responsive::-webkit-scrollbar {
            height: 8px;
        }

        .table-responsive::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 4px;
        }

        .table-responsive::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 4px;
        }

        .table-responsive::-webkit-scrollbar-thumb:hover {
            background: #a8a8a8;
        }

        .badge {
            padding: 6px 8px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 11px;
        }

        .badge-success {
            background-color: rgba(76, 201, 240, 0.1);
            color: var(--success);
        }

        .badge-primary {
            background-color: rgba(67, 97, 238, 0.1);
            color: var(--primary);
        }

        .badge-warning {
            background-color: rgba(247, 37, 133, 0.1);
            color: var(--warning);
        }

        .modal-content {
            border: none;
            border-radius: var(--border-radius);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        .modal-header {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            border-radius: var(--border-radius) var(--border-radius) 0 0;
            padding: 20px 25px;
        }

        .modal-up {
            background: linear-gradient(135deg, var(--upd), var(--warning));
            color: white;
            border-radius: var(--border-radius) var(--border-radius) 0 0;
            padding: 20px 25px;
        }

        .modal-barang {
            background: linear-gradient(135deg, var(--barang), var(--secondary));
            color: white;
            border-radius: var(--border-radius) var(--border-radius) 0 0;
            padding: 20px 25px;
        }

        .modal-title {
            font-weight: 700;
            font-size: 18px;
            color: white;
        }

        .close {
            color: white;
            opacity: 0.8;
        }

        .close:hover {
            color: white;
            opacity: 1;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            border: 1px solid var(--light-gray);
            border-radius: 8px;
            padding: 10px 15px;
            transition: var(--transition);
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.2rem rgba(67, 97, 238, 0.25);
        }

        .form-label {
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .form-label i {
            color: var(--primary);
            font-size: 14px;
            width: 16px;
        }

        .invalid-feedback {
            font-size: 12px;
            margin-top: 5px;
        }

        .action-buttons {
            display: flex;
            gap: 4px;
            justify-content: center;
            flex-wrap: nowrap;
        }

        .table .btn-sm {
            padding: 4px 8px;
            font-size: 11px;
            line-height: 1.5;
            white-space: nowrap;
        }

        .table .btn i {
            font-size: 10px;
            margin-right: 2px;
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
            min-width: 180px;
            margin-bottom: 0;
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

        .chosen-container {
            width: 100% !important;
        }

        .chosen-container-single .chosen-single {
            border: 1px solid var(--light-gray);
            border-radius: 8px;
            padding: 10px 15px;
            height: auto;
            background: white;
            box-shadow: none;
        }

        .chosen-container-active.chosen-with-drop .chosen-single {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.2rem rgba(67, 97, 238, 0.25);
        }

        .datepicker {
            z-index: 9999 !important;
        }

        .datepicker-dropdown {
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            border: none;
        }

        .datepicker table tr td.active.active,
        .datepicker table tr td.active:hover.active {
            background: linear-gradient(135deg, var(--primary), var(--secondary)) !important;
            border-color: var(--primary) !important;
        }

        .datepicker table tr td.today {
            background-color: var(--light-gray) !important;
        }

        .datepicker table tr td.today:hover {
            background-color: var(--gray) !important;
        }

        .form-check {
            margin-bottom: 15px;
        }

        .form-check-input {
            margin-right: 8px;
        }

        .form-check-label {
            font-weight: 600;
            color: var(--dark);
            cursor: pointer;
        }

        .print-section {
            transition: all 0.3s ease;
        }

        @media (max-width: 768px) {
            .card-header {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }

            .btn-group {
                width: 100%;
                justify-content: flex-start;
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

            .action-buttons {
                flex-direction: column;
                gap: 3px;
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
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i
                                                    class="fas fa-home"></i></a></li>
                                        <li class="breadcrumb-item"><a href="javascript:">Marketing</a></li>
                                        <li class="breadcrumb-item"><a href="javascript:">Konfirmasi Pesanan</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- [ breadcrumb ] end -->
                    <div class="main-body">
                        <div class="page-wrapper">
                            <!-- [ Main Content ] start -->

                            <!-- Filter Section -->
                            <div class="filter-section">
                                <div class="filter-row">
                                    <div class="filter-group">
                                        <label class="form-label">
                                            <i class="fas fa-user"></i>
                                            <span>Customer</span>
                                        </label>
                                        <select class="form-control chosen-select" id="filter_customer"
                                            name="filter_customer">
                                            <option value="" selected>- Pilih Customer -</option>
                                            <?php foreach ($res_customer as $rc) { ?>
                                                <option value="<?= $rc['nama_customer'] ?>"
                                                    <?= $nama_customer === $rc['nama_customer'] ? 'selected' : '' ?>>
                                                    <?= $rc['nama_customer'] ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="filter-group">
                                        <label class="form-label">
                                            <i class="fas fa-calendar-alt"></i>
                                            <span>Dari Tanggal</span>
                                        </label>
                                        <input type="text" id="filter_tgl" value="<?= $tgl ? $tgl : '' ?>"
                                            class="form-control datepicker" placeholder="Pilih tanggal"
                                            autocomplete="off">
                                    </div>

                                    <div class="filter-group">
                                        <label class="form-label">
                                            <i class="fas fa-calendar-alt"></i>
                                            <span>Sampai Tanggal</span>
                                        </label>
                                        <input type="text" id="filter_tgl2" value="<?= $tgl2 ? $tgl2 : '' ?>"
                                            class="form-control datepicker" placeholder="Pilih tanggal"
                                            autocomplete="off">
                                    </div>

                                    <div class="filter-actions">
                                        <button class="btn btn-info" id="lihat" type="button">
                                            <i class="fas fa-search"></i> Filter
                                        </button>
                                        <button class="btn btn-success" id="export" type="button">
                                            <i class="fas fa-print"></i> Cetak
                                        </button>
                                        <a href="<?= base_url() ?>marketing/konfirmasi_pesanan" class="btn btn-warning"
                                            id="reset" type="button">
                                            <i class="fas fa-refresh"></i> Reset
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5><i class="fas fa-list"></i> Data Konfirmasi Pesanan</h5>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                                data-target="#add">
                                                <i class="fas fa-plus-circle"></i> Tambah Konfirmasi Pesanan
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-block table-border-style">
                                        <div class="table-responsive">
                                            <table class="table datatable table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Tgl KP</th>
                                                        <th>No KP</th>
                                                        <th>Customer</th>
                                                        <th>Jumlah KP</th>
                                                        <th>Tanggal Kirim</th>
                                                        <th class="text-center">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $level = $this->session->userdata('departement');
                                                    $no = 1;
                                                    if (isset($result) && is_array($result) && count($result) > 0) {
                                                        foreach ($result as $k) {
                                                            // PERBAIKAN: Format tanggal dengan pengecekan yang lebih baik
                                                            $tgl_kp = (!empty($k['tgl_kp']) && $k['tgl_kp'] != '0000-00-00') ?
                                                                date('d/m/Y', strtotime($k['tgl_kp'])) : '';

                                                            $tgl_po = (!empty($k['tgl_po']) && $k['tgl_po'] != '0000-00-00') ?
                                                                date('d/m/Y', strtotime($k['tgl_po'])) : '';

                                                            $tgl_kirim = (!empty($k['tgl_kirim']) && $k['tgl_kirim'] != '0000-00-00') ?
                                                                date('d/m/Y', strtotime($k['tgl_kirim'])) : '';

                                                            // Default values untuk field yang mungkin kosong
                                                            $id_mkt_kp = isset($k['Id_mkt_kp']) ? $k['Id_mkt_kp'] : '';
                                                            $no_kp = isset($k['no_kp']) ? $k['no_kp'] : '';
                                                            $id_customer = isset($k['id_customer']) ? $k['id_customer'] : '';
                                                            $nama_customer = isset($k['nama_customer']) ? $k['nama_customer'] : '';
                                                            $kode_customer = isset($k['kode_customer']) ? $k['kode_customer'] : '';
                                                            $spek_kapsul = isset($k['spek_kapsul']) ? $k['spek_kapsul'] : '';
                                                            $kode_print = isset($k['kode_print']) ? $k['kode_print'] : '';
                                                            $logo_print = isset($k['logo_print']) ? $k['logo_print'] : '';
                                                            $kode_warna_cap = isset($k['kode_warna_cap']) ? $k['kode_warna_cap'] : '';
                                                            $warna_cap = isset($k['warna_cap']) ? $k['warna_cap'] : '';
                                                            $warna_body = isset($k['warna_body']) ? $k['warna_body'] : '';
                                                            $kode_warna_body = isset($k['kode_warna_body']) ? $k['kode_warna_body'] : '';
                                                            $jumlah_kp = isset($k['jumlah_kp']) ? $k['jumlah_kp'] : 0;
                                                            $harga_kp = isset($k['harga_kp']) ? $k['harga_kp'] : 0;
                                                            $no_po = isset($k['no_po']) ? $k['no_po'] : '';
                                                            $jenis_pack = isset($k['jenis_pack']) ? $k['jenis_pack'] : '';
                                                            $ket_kp = isset($k['ket_kp']) ? $k['ket_kp'] : '';
                                                            $created_by = isset($k['created_by']) ? $k['created_by'] : '';

                                                            ?>
                                                            <tr>
                                                                <th scope="row"><?= $no++ ?></th>
                                                                <td><?= $tgl_kp ?></td>
                                                                <td>
                                                                    <span style="cursor: pointer;" class="badge badge-primary"
                                                                        data-toggle="modal" data-target="#detail"
                                                                        data-id_mkt_kp="<?= $id_mkt_kp ?>"
                                                                        data-no_kp="<?= $no_kp ?>" data-tgl_kp="<?= $tgl_kp ?>"
                                                                        data-id_customer="<?= $id_customer ?>"
                                                                        data-nama_customer="<?= $nama_customer ?>"
                                                                        data-kode_customer="<?= $kode_customer ?>"
                                                                        data-spek_kapsul="<?= $spek_kapsul ?>"
                                                                        data-kode_print="<?= $kode_print ?>"
                                                                        data-logo_print="<?= $logo_print ?>"
                                                                        data-kode_warna_cap="<?= $kode_warna_cap ?>"
                                                                        data-warna_cap="<?= $warna_cap ?>"
                                                                        data-kode_warna_body="<?= $kode_warna_body ?>"
                                                                        data-warna_body="<?= $warna_body ?>"
                                                                        data-jumlah_kp="<?= $jumlah_kp ?>"
                                                                        data-harga_kp="<?= $harga_kp ?>"
                                                                        data-no_po="<?= $no_po ?>" data-tgl_po="<?= $tgl_po ?>"
                                                                        data-jenis_pack="<?= $jenis_pack ?>"
                                                                        data-tgl_kirim="<?= $tgl_kirim ?>"
                                                                        data-ket_kp="<?= $ket_kp ?>"
                                                                        data-created_by="<?= $created_by ?>">
                                                                        <?= $k['no_kp'] ?>
                                                                    </span>
                                                                </td>
                                                                <td><?= $nama_customer ?></td>
                                                                <td class="text-right">
                                                                    <?= number_format($jumlah_kp, 0, ",", ".") ?> pcs
                                                                </td>
                                                                <td><?= $tgl_kirim ?></td>

                                                                <td class="text-center">
                                                                    <div class="action-buttons">
                                                                        <?php if ($level === "admin" || $level == "marketing") { ?>
                                                                            <button type="button"
                                                                                class="btn btn-warning btn-sm btn-action"
                                                                                data-toggle="modal" data-target="#edit"
                                                                                data-id_mkt_kp="<?= $id_mkt_kp ?>"
                                                                                data-no_kp="<?= $no_kp ?>"
                                                                                data-tgl_kp="<?= $tgl_kp ?>"
                                                                                data-id_customer="<?= $id_customer ?>"
                                                                                data-nama_customer="<?= $nama_customer ?>"
                                                                                data-kode_customer="<?= $kode_customer ?>"
                                                                                data-spek_kapsul="<?= $spek_kapsul ?>"
                                                                                data-kode_print="<?= $kode_print ?>"
                                                                                data-logo_print="<?= $logo_print ?>"
                                                                                data-kode_warna_cap="<?= $kode_warna_cap ?>"
                                                                                data-warna_cap="<?= $warna_cap ?>"
                                                                                data-kode_warna_body="<?= $kode_warna_body ?>"
                                                                                data-warna_body="<?= $warna_body ?>"
                                                                                data-jumlah_kp="<?= $jumlah_kp ?>"
                                                                                data-harga_kp="<?= $harga_kp ?>"
                                                                                data-no_po="<?= $no_po ?>"
                                                                                data-tgl_po="<?= $tgl_po ?>"
                                                                                data-jenis_pack="<?= $jenis_pack ?>"
                                                                                data-tgl_kirim="<?= $tgl_kirim ?>"
                                                                                data-ket_kp="<?= $ket_kp ?>"
                                                                                data-created_by="<?= $created_by ?>">
                                                                                <i class="fas fa-edit"></i> Edit
                                                                            </button>
                                                                            <a href="<?= base_url() ?>marketing/konfirmasi_pesanan/delete/<?= $id_mkt_kp ?>"
                                                                                class="btn btn-danger btn-sm btn-action"
                                                                                onclick="if (! confirm('Apakah Anda Yakin?')) { return false; }">
                                                                                <i class="fas fa-trash"></i> Hapus
                                                                            </a>
                                                                        <?php } ?>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    } else {
                                                        echo '<tr><td colspan="14" class="text-center">Tidak ada data</td></tr>';
                                                    }
                                                    ?>
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
    </section>

    <!-- Modal Tambah -->
    <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-barang">
                    <h5 class="modal-title"><i class="fas fa-plus-circle"></i> Tambah Konfirmasi Pesanan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?= base_url() ?>marketing/konfirmasi_pesanan/add" id="form-add">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">No PO</label>
                                    <input type="text" class="form-control" id="no_po" name="no_po" placeholder="No PO"
                                        autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Tanggal PO</label>
                                    <input type="text" class="form-control datepicker" id="tgl_po" name="tgl_po"
                                        placeholder="Tanggal PO" autocomplete="off">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">No KP</label>
                                    <input type="text" class="form-control" id="no_kp" name="no_kp" placeholder="No KP"
                                        autocomplete="off" style="text-transform:uppercase"
                                        onkeyup="this.value = this.value.toUpperCase()" required>
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        Maaf No KP sudah ada.
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Tanggal KP</label>
                                    <input type="text" class="form-control datepicker" id="tgl_kp" name="tgl_kp"
                                        placeholder="Tanggal KP" autocomplete="off" required>
                                </div>
                            </div>



                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Customer</label>
                                    <select class="form-control chosen-select" id="id_customer" name="id_customer"
                                        autocomplete="off" required>
                                        <option value="">- Pilih Customer -</option>
                                        <?php foreach ($res_customer as $c) { ?>
                                            <option value="<?= $c['id_customer'] ?>"><?= $c['nama_customer'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Tanggal Kirim</label>
                                    <input type="text" class="form-control datepicker" id="tgl_kirim" name="tgl_kirim"
                                        placeholder="Tanggal Kirim" autocomplete="off">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Spek Kapsul</label>
                                    <select class="form-control chosen-select" id="spek_kapsul" name="spek_kapsul"
                                        autocomplete="off" required>
                                        <option value="">- Pilih Spek Kapsul -</option>
                                        <option value="Minyak">Minyak</option>
                                        <option value="Non Minyak">Non Minyak</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Checkbox untuk kode print -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="use_print" name="use_print">
                                        <label class="form-check-label" for="use_print">
                                            <i class="fas fa-print"></i> Gunakan Kode Print
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Kode Print dengan dropdown - Awalnya tersembunyi -->
                            <div class="col-md-6 print-section" style="display: none;">
                                <div class="form-group">
                                    <label class="form-label">Kode Print</label>
                                    <select class="form-control chosen-select" id="id_master_print"
                                        name="id_master_print" autocomplete="off">
                                        <option value="">- Pilih Kode Print -</option>
                                    </select>
                                    <input type="hidden" id="kode_print" name="kode_print">
                                </div>
                            </div>

                            <div class="col-md-6 print-section" style="display: none;">
                                <div class="form-group">
                                    <label class="form-label">Logo Print</label>
                                    <input type="text" class="form-control" id="logo_print" name="logo_print"
                                        placeholder="Logo Print" autocomplete="off" readonly>
                                </div>
                            </div>

                            <!-- Kode Warna Cap - langsung dari master -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Kode Warna Cap</label>
                                    <select class="form-control chosen-select" id="id_master_kw_cap"
                                        name="id_master_kw_cap" autocomplete="off">
                                        <option value="">- Pilih Kode Warna Cap -</option>
                                        <?php foreach ($res_warna_cap as $warna) { ?>
                                            <option value="<?= $warna['id_master_kw_cap'] ?>"
                                                data-kode="<?= $warna['kode_warna_cap'] ?>"
                                                data-warna="<?= $warna['warna_cap'] ?>">
                                                <?= $warna['kode_warna_cap'] ?> | <?= $warna['warna_cap'] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                    <input type="hidden" id="kode_warna_cap" name="kode_warna_cap">
                                    <input type="hidden" id="warna_cap" name="warna_cap">
                                </div>
                            </div>

                            <!-- Kode Warna Body - langsung dari master -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Kode Warna Body</label>
                                    <select class="form-control chosen-select" id="id_master_kw_body"
                                        name="id_master_kw_body" autocomplete="off">
                                        <option value="">- Pilih Kode Warna Body -</option>
                                        <?php foreach ($res_warna_body as $warna) { ?>
                                            <option value="<?= $warna['id_master_kw_body'] ?>"
                                                data-kode="<?= $warna['kode_warna_body'] ?>"
                                                data-warna="<?= $warna['warna_body'] ?>">
                                                <?= $warna['kode_warna_body'] ?> | <?= $warna['warna_body'] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                    <input type="hidden" id="kode_warna_body" name="kode_warna_body">
                                    <input type="hidden" id="warna_body" name="warna_body">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Jumlah Pesanan</label>
                                    <input type="text" class="form-control" id="jumlah_kp" name="jumlah_kp"
                                        placeholder="Jumlah KP" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Harga Per pcs</label>
                                    <input type="text" class="form-control" id="harga_kp" name="harga_kp"
                                        placeholder="Harga KP" autocomplete="off" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Jenis Packing</label>
                                    <select class="form-control chosen-select" id="jenis_pack" name="jenis_pack"
                                        autocomplete="off">
                                        <option value="">- Pilih Jenis Packing -</option>
                                        <option value="Polos">Polos</option>
                                        <option value="Bratako">Bratako</option>
                                        <option value="Loss">Loss</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Keterangan</label>
                                    <textarea class="form-control" id="ket_kp" name="ket_kp" placeholder="Keterangan"
                                        rows="3"></textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Created By</label>
                                    <input type="text" class="form-control" id="created_by" name="created_by"
                                        value="<?= $this->session->userdata('id_user') ?>" autocomplete="off" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" id="simpan" class="btn btn-primary">
                            <i class="fas fa-save"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Detail -->
    <div class="modal fade" id="detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-eye"></i> Detail Konfirmasi Pesanan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="v-id_mkt_kp" name="id_mkt_kp">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">No KP</label>
                                <input type="text" class="form-control" id="v-no_kp" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Tanggal KP</label>
                                <input type="text" class="form-control" id="v-tgl_kp" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Customer</label>
                                <input type="text" class="form-control" id="v-nama_customer" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Kode Customer</label>
                                <input type="text" class="form-control" id="v-kode_customer" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Spesifikasi Kapsul</label>
                                <input type="text" class="form-control" id="v-spek_kapsul" readonly>
                            </div>
                        </div>

                        <!-- Section Kode Print di Detail -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Kode Print</label>
                                <input type="text" class="form-control" id="v-kode_print" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Logo Print</label>
                                <input type="text" class="form-control" id="v-logo_print" readonly>
                            </div>
                        </div>

                        <!-- PERBAIKAN: Kode Warna Cap dan Body di Detail -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Kode Warna Cap</label>
                                <input type="text" class="form-control" id="v-kode_warna_cap" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Kode Warna Body</label>
                                <input type="text" class="form-control" id="v-kode_warna_body" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Jumlah KP</label>
                                <input type="text" class="form-control" id="v-jumlah_kp" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Harga KP</label>
                                <input type="text" class="form-control" id="v-harga_kp" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">No PO</label>
                                <input type="text" class="form-control" id="v-no_po" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Tanggal PO</label>
                                <input type="text" class="form-control" id="v-tgl_po" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Jenis Packing</label>
                                <input type="text" class="form-control" id="v-jenis_pack" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Tanggal Kirim</label>
                                <input type="text" class="form-control" id="v-tgl_kirim" readonly>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Keterangan</label>
                                <textarea class="form-control" id="v-ket_kp" readonly rows="3"></textarea>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Created By</label>
                                <input type="text" class="form-control" id="v-created_by" readonly>
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

    <!-- Modal Edit - DIUBAH AGAR SAMA DENGAN MODAL TAMBAH -->
    <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-up">
                    <h5 class="modal-title"><i class="fas fa-edit"></i> Edit Konfirmasi Pesanan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?= base_url() ?>marketing/konfirmasi_pesanan/update" id="form-edit">
                    <input type="hidden" id="e-id_mkt_kp" name="id_mkt_kp">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">No PO</label>
                                    <input type="text" class="form-control" id="e-no_po" name="no_po"
                                        placeholder="No PO" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Tanggal PO</label>
                                    <input type="text" class="form-control datepicker" id="e-tgl_po" name="tgl_po"
                                        placeholder="Tanggal PO" autocomplete="off">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">No KP</label>
                                    <input type="text" class="form-control" id="e-no_kp" name="no_kp"
                                        placeholder="No KP" autocomplete="off" style="text-transform:uppercase"
                                        onkeyup="this.value = this.value.toUpperCase()" required>
                                    <div id="validationServer03FeedbackEdit" class="invalid-feedback">
                                        Maaf No KP sudah ada.
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Tanggal KP</label>
                                    <input type="text" class="form-control datepicker" id="e-tgl_kp" name="tgl_kp"
                                        placeholder="Tanggal KP" autocomplete="off" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Customer</label>
                                    <select class="form-control chosen-select" id="e-id_customer" name="id_customer"
                                        autocomplete="off" required>
                                        <option value="">- Pilih Customer -</option>
                                        <?php foreach ($res_customer as $c) { ?>
                                            <option value="<?= $c['id_customer'] ?>"><?= $c['nama_customer'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Tanggal Kirim</label>
                                    <input type="text" class="form-control datepicker" id="e-tgl_kirim" name="tgl_kirim"
                                        placeholder="Tanggal Kirim" autocomplete="off">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Spek Kapsul</label>
                                    <select class="form-control chosen-select" id="e-spek_kapsul" name="spek_kapsul"
                                        autocomplete="off" required>
                                        <option value="">- Pilih Spek Kapsul -</option>
                                        <option value="Minyak">Minyak</option>
                                        <option value="Non Minyak">Non Minyak</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Checkbox untuk kode print di Edit - SAMA DENGAN TAMBAH -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="e-use_print"
                                            name="use_print">
                                        <label class="form-check-label" for="e-use_print">
                                            <i class="fas fa-print"></i> Gunakan Kode Print
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Kode Print dengan dropdown di Edit - SAMA DENGAN TAMBAH -->
                            <div class="col-md-6 e-print-section" style="display: none;">
                                <div class="form-group">
                                    <label class="form-label">Kode Print</label>
                                    <select class="form-control chosen-select" id="e-id_master_print"
                                        name="id_master_print" autocomplete="off">
                                        <option value="">- Pilih Kode Print -</option>
                                    </select>
                                    <input type="hidden" id="e-kode_print" name="kode_print">
                                </div>
                            </div>

                            <div class="col-md-6 e-print-section" style="display: none;">
                                <div class="form-group">
                                    <label class="form-label">Logo Print</label>
                                    <input type="text" class="form-control" id="e-logo_print" name="logo_print"
                                        placeholder="Logo Print" autocomplete="off" readonly>
                                </div>
                            </div>

                            <!-- Kode Warna Cap - langsung dari master - SAMA DENGAN TAMBAH -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Kode Warna Cap</label>
                                    <select class="form-control chosen-select" id="e-id_master_kw_cap"
                                        name="id_master_kw_cap" autocomplete="off">
                                        <option value="">- Pilih Kode Warna Cap -</option>
                                        <?php foreach ($res_warna_cap as $warna) { ?>
                                            <option value="<?= $warna['id_master_kw_cap'] ?>"
                                                data-kode="<?= $warna['kode_warna_cap'] ?>"
                                                data-warna="<?= $warna['warna_cap'] ?>">
                                                <?= $warna['kode_warna_cap'] ?> | <?= $warna['warna_cap'] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                    <input type="hidden" id="e-kode_warna_cap" name="kode_warna_cap">
                                    <input type="hidden" id="e-warna_cap" name="warna_cap">
                                </div>
                            </div>

                            <!-- Kode Warna Body - langsung dari master - SAMA DENGAN TAMBAH -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Kode Warna Body</label>
                                    <select class="form-control chosen-select" id="e-id_master_kw_body"
                                        name="id_master_kw_body" autocomplete="off">
                                        <option value="">- Pilih Kode Warna Body -</option>
                                        <?php foreach ($res_warna_body as $warna) { ?>
                                            <option value="<?= $warna['id_master_kw_body'] ?>"
                                                data-kode="<?= $warna['kode_warna_body'] ?>"
                                                data-warna="<?= $warna['warna_body'] ?>">
                                                <?= $warna['kode_warna_body'] ?> | <?= $warna['warna_body'] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                    <input type="hidden" id="e-kode_warna_body" name="kode_warna_body">
                                    <input type="hidden" id="e-warna_body" name="warna_body">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Jumlah KP</label>
                                    <input type="text" class="form-control" id="e-jumlah_kp" name="jumlah_kp"
                                        placeholder="Jumlah KP" autocomplete="off" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Harga KP</label>
                                    <input type="text" class="form-control" id="e-harga_kp" name="harga_kp"
                                        placeholder="Harga KP" autocomplete="off" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Jenis Packing</label>
                                    <select class="form-control chosen-select" id="e-jenis_pack" name="jenis_pack"
                                        autocomplete="off">
                                        <option value="">- Pilih Jenis Packing -</option>
                                        <option value="Polos">Polos</option>
                                        <option value="Bratako">Bratako</option>
                                        <option value="Loss">Loss</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Keterangan</label>
                                    <textarea class="form-control" id="e-ket_kp" name="ket_kp" placeholder="Keterangan"
                                        rows="3"></textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Updated By</label>
                                    <input type="text" class="form-control" id="e-updated_by" name="updated_by"
                                        value="<?= $this->session->userdata('nama') ?>" autocomplete="off" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" id="update" class="btn btn-primary">
                            <i class="fas fa-save"></i> Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.id.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        // ========== INISIALISASI KOMPONEN ==========
        
        // Initialize chosen select
        $('.chosen-select').chosen({
            width: '100%',
            search_contains: true
        });

        // Initialize Datepicker
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true,
            todayHighlight: true,
            language: 'id',
            orientation: 'bottom auto'
        });

        // ========== FUNGSI UTILITAS ==========

        // Format Rupiah yang benar
        function formatRupiah(angka) {
            if (!angka) return '0';
            // Hapus semua karakter non-digit
            let number_string = angka.toString().replace(/[^,\d]/g, '');
            // Jika kosong, return 0
            if (number_string === '') return '0';
            // Konversi ke number
            let number = parseInt(number_string);
            // Format dengan separator ribuan
            return number.toLocaleString('id-ID');
        }

        function unformatRupiah(angka) {
            if (!angka) return 0;
            // Hapus semua karakter non-digit dan konversi ke number
            return parseInt(angka.toString().replace(/[^0-9]/g, ''));
        }

        // Format tanggal untuk input (dd/mm/yyyy)
        function formatDateForInput(date) {
            var day = String(date.getDate()).padStart(2, '0');
            var month = String(date.getMonth() + 1).padStart(2, '0');
            var year = date.getFullYear();
            return day + '/' + month + '/' + year;
        }

        // Format tanggal untuk Date object dari string dd/mm/yyyy
        function parseDateFromInput(dateString) {
            if (!dateString || dateString === '01/01/1970' || dateString === '00/00/0000') return null;
            var parts = dateString.split('/');
            if (parts.length !== 3) return null;
            
            // Validasi tanggal
            var day = parseInt(parts[0]);
            var month = parseInt(parts[1]);
            var year = parseInt(parts[2]);
            
            if (day < 1 || day > 31 || month < 1 || month > 12 || year < 1900 || year > 2100) {
                return null;
            }
            
            return new Date(year, month - 1, day);
        }

        // Fungsi untuk menampilkan notifikasi
        function showNotification(message, type) {
            // Hapus notifikasi sebelumnya jika ada
            $('.auto-update-notification').remove();
            
            // Buat elemen notifikasi
            var notification = $('<div class="alert alert-' + type + ' alert-dismissible fade show auto-update-notification" style="position: fixed; top: 20px; right: 20px; z-index: 9999; min-width: 300px;">' +
                                '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                                '<i class="fas fa-info-circle"></i> ' + message +
                                '</div>');
            
            // Tambahkan ke body
            $('body').append(notification);
            
            // Hapus otomatis setelah 5 detik
            setTimeout(function() {
                notification.alert('close');
            }, 5000);
        }

        // Validasi tanggal
        function isValidDate(dateString) {
            if (!dateString || dateString === '01/01/1970' || dateString === '00/00/0000') return false;
            var dateObj = parseDateFromInput(dateString);
            return dateObj !== null && dateObj instanceof Date && !isNaN(dateObj);
        }

        // ========== FUNGSI TANGGAL KIRIM OTOMATIS ==========

        // Fungsi untuk mengupdate tanggal kirim otomatis jika sudah lewat
        function updateDeliveryDateIfPassed() {
            var today = new Date();
            var todayFormatted = formatDateForInput(today);
            var updatedCount = 0;
            
            console.log('Memulai pengecekan tanggal kirim...');
            
            // Loop melalui semua data di tabel
            $('.table tbody tr').each(function() {
                var deliveryDateCell = $(this).find('td:eq(5)'); // Kolom tanggal kirim (index 5)
                var deliveryDateText = deliveryDateCell.text().trim();
                var idMktKp = $(this).find('.badge-primary').data('id_mkt_kp');
                
                console.log('Cek data ID:', idMktKp, 'Tanggal:', deliveryDateText);
                
                if (deliveryDateText && isValidDate(deliveryDateText) && idMktKp) {
                    var deliveryDate = parseDateFromInput(deliveryDateText);
                    
                    // Reset waktu untuk perbandingan yang akurat
                    today.setHours(0, 0, 0, 0);
                    deliveryDate.setHours(0, 0, 0, 0);
                    
                    if (deliveryDate && deliveryDate < today) {
                        console.log('Tanggal kirim sudah lewat untuk ID:', idMktKp);
                        
                        // Update tampilan di tabel
                        deliveryDateCell.text(todayFormatted);
                        updatedCount++;
                        
                        // Update di database via AJAX
                        updateDeliveryDateInDatabase(idMktKp, todayFormatted);
                    }
                }
            });
            
            if (updatedCount > 0) {
                showNotification(updatedCount + ' tanggal kirim telah disesuaikan ke hari ini', 'info');
            }
        }

        // Fungsi untuk update tanggal kirim di database
        function updateDeliveryDateInDatabase(idMktKp, newDate) {
            console.log('Update database untuk ID:', idMktKp, 'dengan tanggal:', newDate);
            
            $.ajax({
                url: "<?= base_url() ?>marketing/konfirmasi_pesanan/update_delivery_date",
                type: "POST",
                data: {
                    id_mkt_kp: idMktKp,
                    tgl_kirim: newDate,
                    updated_by: "<?= $this->session->userdata('nama') ?>"
                },
                dataType: "json",
                success: function(response) {
                    if (response.success) {
                        console.log('Tanggal kirim berhasil diupdate untuk ID: ' + idMktKp);
                    } else {
                        console.error('Gagal update tanggal kirim:', response.message);
                        showNotification('Gagal update tanggal kirim: ' + response.message, 'danger');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error update tanggal kirim:', error);
                    showNotification('Error update tanggal kirim: ' + error, 'danger');
                }
            });
        }

        // Fungsi untuk mengatur tanggal kirim otomatis di form input
        function setAutoDeliveryDate(inputElement) {
            var selectedDate = $(inputElement).val();
            
            if (isValidDate(selectedDate)) {
                var selectedDateObj = parseDateFromInput(selectedDate);
                var today = new Date();
                
                if (selectedDateObj) {
                    // Reset waktu untuk perbandingan yang akurat
                    today.setHours(0, 0, 0, 0);
                    selectedDateObj.setHours(0, 0, 0, 0);
                    
                    // Jika tanggal yang dipilih sudah lewat dari hari ini
                    if (selectedDateObj < today) {
                        // Set ke tanggal hari ini
                        var formattedDate = formatDateForInput(new Date());
                        $(inputElement).val(formattedDate);
                        
                        // Beri notifikasi kepada user
                        showNotification('Tanggal kirim telah disesuaikan ke tanggal hari ini karena tanggal yang dipilih sudah lewat.', 'info');
                    }
                }
            } else if (selectedDate && !isValidDate(selectedDate)) {
                // Jika tanggal tidak valid, set ke hari ini
                var formattedDate = formatDateForInput(new Date());
                $(inputElement).val(formattedDate);
                showNotification('Tanggal kirim tidak valid, telah disesuaikan ke tanggal hari ini.', 'warning');
            }
        }

        // ========== JALANKAN AUTO UPDATE ==========

        // Jalankan auto-update saat page load
        setTimeout(function() {
            updateDeliveryDateIfPassed();
        }, 1000);
        
        // Juga jalankan saat filter diubah
        $('#lihat').click(function() {
            setTimeout(function() {
                updateDeliveryDateIfPassed();
            }, 1500);
        });

        // ========== EVENT HANDLER TANGGAL KIRIM ==========

        // Event handler untuk tanggal kirim di form tambah
        $('#tgl_kirim').on('change', function() {
            setAutoDeliveryDate(this);
        });

        // Event handler untuk tanggal kirim di form edit
        $('#e-tgl_kirim').on('change', function() {
            setAutoDeliveryDate(this);
        });

        // Set default tanggal kirim saat modal tambah dibuka
        $('#add').on('show.bs.modal', function() {
            // Set default tanggal kirim ke hari ini
            var formattedDate = formatDateForInput(new Date());
            $('#tgl_kirim').val(formattedDate);
        });

        // ========== FUNGSI CHECKBOX KODE PRINT ==========

        // Toggle kode print section untuk tambah
        $('#use_print').change(function() {
            if ($(this).is(':checked')) {
                $('.print-section').slideDown(300);
                // Load data kode print jika customer sudah dipilih
                var id_customer = $('#id_customer').val();
                if (id_customer) {
                    loadPrintsByCustomer(id_customer, '');
                }
            } else {
                $('.print-section').slideUp(300);
                // Reset nilai kode print dan logo print
                $('#id_master_print').val('').trigger('chosen:updated');
                $('#kode_print').val('');
                $('#logo_print').val('');
            }
        });

        // Toggle kode print section untuk edit - SAMA DENGAN TAMBAH
        $('#e-use_print').change(function() {
            if ($(this).is(':checked')) {
                $('.e-print-section').slideDown(300);
                // Load data kode print jika customer sudah dipilih
                var id_customer = $('#e-id_customer').val();
                if (id_customer) {
                    loadPrintsByCustomer(id_customer, 'e-');
                }
            } else {
                $('.e-print-section').slideUp(300);
                // Reset nilai kode print dan logo print
                $('#e-id_master_print').val('').trigger('chosen:updated');
                $('#e-kode_print').val('');
                $('#e-logo_print').val('');
            }
        });

        // Format input angka dengan benar
        $('#jumlah_kp, #harga_kp, #e-jumlah_kp, #e-harga_kp').on('input', function () {
            let value = this.value.replace(/[^0-9]/g, '');
            this.value = formatRupiah(value);
        });

        // Load data kode print berdasarkan customer (Tambah)
        $('#id_customer').change(function () {
            var id_customer = $(this).val();
            // Jika checkbox kode print dicentang, load data print
            if ($('#use_print').is(':checked')) {
                loadPrintsByCustomer(id_customer, '');
            }
        });

        // Load data kode print berdasarkan customer (Edit) - SAMA DENGAN TAMBAH
        $('#e-id_customer').change(function () {
            var id_customer = $(this).val();
            // Jika checkbox kode print dicentang, load data print
            if ($('#e-use_print').is(':checked')) {
                loadPrintsByCustomer(id_customer, 'e-');
            }
        });

        // Load kode print berdasarkan customer
        function loadPrintsByCustomer(id_customer, prefix) {
            if (id_customer) {
                $.ajax({
                    url: "<?= base_url() ?>marketing/konfirmasi_pesanan/get_prints_by_customer",
                    type: "POST",
                    data: { id_customer: id_customer },
                    dataType: "json",
                    success: function (response) {
                        var printSelect = $('#' + prefix + 'id_master_print');
                        printSelect.empty().append('<option value="">- Pilih Kode Print -</option>');

                        if (response && response.length > 0) {
                            $.each(response, function (index, print) {
                                printSelect.append('<option value="' + print.id_master_print + '" data-kode="' + print.kode_print + '" data-logo="' + (print.logo_print || '') + '">' + print.kode_print + '</option>');
                            });
                        }
                        printSelect.trigger("chosen:updated");
                    },
                    error: function (xhr, status, error) {
                        console.log("Error loading prints data: " + error);
                        showNotification('Gagal memuat data kode print', 'danger');
                    }
                });
            }
        }

        // Handle perubahan kode print (Tambah)
        $('#id_master_print').change(function () {
            var selectedOption = $(this).find('option:selected');
            var kodePrint = selectedOption.data('kode');
            var logoPrint = selectedOption.data('logo');

            $('#kode_print').val(kodePrint);
            $('#logo_print').val(logoPrint || '');
        });

        // Handle perubahan kode print (Edit) - SAMA DENGAN TAMBAH
        $('#e-id_master_print').change(function () {
            var selectedOption = $(this).find('option:selected');
            var kodePrint = selectedOption.data('kode');
            var logoPrint = selectedOption.data('logo');

            $('#e-kode_print').val(kodePrint);
            $('#e-logo_print').val(logoPrint || '');
        });

        // Handle perubahan kode warna cap (Tambah)
        $('#id_master_kw_cap').change(function () {
            var selectedOption = $(this).find('option:selected');
            var kodeWarna = selectedOption.data('kode');
            var warnaCap = selectedOption.data('warna');
            $('#kode_warna_cap').val(kodeWarna);
            $('#warna_cap').val(warnaCap);
        });

        // Handle perubahan kode warna cap (Edit) - SAMA DENGAN TAMBAH
        $('#e-id_master_kw_cap').change(function () {
            var selectedOption = $(this).find('option:selected');
            var kodeWarna = selectedOption.data('kode');
            var warnaCap = selectedOption.data('warna');
            $('#e-kode_warna_cap').val(kodeWarna);
            $('#e-warna_cap').val(warnaCap);
        });

        // Handle perubahan kode warna body (Tambah)
        $('#id_master_kw_body').change(function () {
            var selectedOption = $(this).find('option:selected');
            var kodeWarna = selectedOption.data('kode');
            var warnaBody = selectedOption.data('warna');
            $('#kode_warna_body').val(kodeWarna);
            $('#warna_body').val(warnaBody);
        });

        // Handle perubahan kode warna body (Edit) - SAMA DENGAN TAMBAH
        $('#e-id_master_kw_body').change(function () {
            var selectedOption = $(this).find('option:selected');
            var kodeWarna = selectedOption.data('kode');
            var warnaBody = selectedOption.data('warna');
            $('#e-kode_warna_body').val(kodeWarna);
            $('#e-warna_body').val(warnaBody);
        });

        // ========== FUNGSI FILTER ==========

        // Filter functionality
        $('#lihat').click(function () {
            var filter_customer = $('#filter_customer').find(':selected').val();
            var filter_tgl = $('#filter_tgl').val();
            var filter_tgl2 = $('#filter_tgl2').val();

            if (filter_tgl == '' && filter_tgl2 != '') {
                alert('Dari tanggal belum diisi');
            } else if (filter_tgl != '' && filter_tgl2 == '') {
                alert('Sampai tanggal belum diisi');
            } else {
                const query = new URLSearchParams({
                    nama_customer: filter_customer,
                    date_from: filter_tgl,
                    date_until: filter_tgl2
                })
                window.location = "<?= base_url() ?>marketing/konfirmasi_pesanan/index?" + query.toString()
            }
        });

        // ========== MODAL FUNCTIONALITY ==========

        // Detail modal functionality
        $('#detail').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id_mkt_kp = button.data('id_mkt_kp');
            var no_kp = button.data('no_kp');
            var tgl_kp = button.data('tgl_kp');
            var nama_customer = button.data('nama_customer');
            var kode_customer = button.data('kode_customer');
            var spek_kapsul = button.data('spek_kapsul');
            var kode_print = button.data('kode_print');
            var logo_print = button.data('logo_print');
            var kode_warna_cap = button.data('kode_warna_cap');
            var warna_cap = button.data('warna_cap');
            var kode_warna_body = button.data('kode_warna_body');
            var warna_body = button.data('warna_body');
            var jumlah_kp = button.data('jumlah_kp');
            var harga_kp = button.data('harga_kp');
            var no_po = button.data('no_po');
            var tgl_po = button.data('tgl_po');
            var jenis_pack = button.data('jenis_pack');
            var tgl_kirim = button.data('tgl_kirim');
            var ket_kp = button.data('ket_kp');
            var created_by = button.data('created_by');

            var modal = $(this);
            modal.find('#v-id_mkt_kp').val(id_mkt_kp);
            modal.find('#v-no_kp').val(no_kp);
            
            // Handle tanggal dengan validasi
            modal.find('#v-tgl_kp').val(isValidDate(tgl_kp) ? tgl_kp : '-');
            modal.find('#v-tgl_po').val(isValidDate(tgl_po) ? tgl_po : '-');
            modal.find('#v-tgl_kirim').val(isValidDate(tgl_kirim) ? tgl_kirim : '-');
            
            modal.find('#v-nama_customer').val(nama_customer || '-');
            modal.find('#v-kode_customer').val(kode_customer || '-');
            modal.find('#v-spek_kapsul').val(spek_kapsul || '-');
            modal.find('#v-kode_print').val(kode_print || '-');
            modal.find('#v-logo_print').val(logo_print || '-');
            
            // Format kode warna dengan nama warna
            var kodeWarnaCap = (kode_warna_cap && warna_cap) ? kode_warna_cap + ' - ' + warna_cap : '-';
            var kodeWarnaBody = (kode_warna_body && warna_body) ? kode_warna_body + ' - ' + warna_body : '-';
            modal.find('#v-kode_warna_cap').val(kodeWarnaCap);
            modal.find('#v-kode_warna_body').val(kodeWarnaBody);
            
            modal.find('#v-jumlah_kp').val(formatRupiah(jumlah_kp.toString()) + ' pcs');
            modal.find('#v-harga_kp').val('Rp ' + formatRupiah(harga_kp.toString()));
            modal.find('#v-no_po').val(no_po || '-');
            modal.find('#v-jenis_pack').val(jenis_pack || '-');
            modal.find('#v-ket_kp').val(ket_kp || '-');
            modal.find('#v-created_by').val(created_by || '-');
        });

        // Edit modal functionality dengan penanganan yang SAMA DENGAN TAMBAH
        $('#edit').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id_mkt_kp = button.data('id_mkt_kp');
            var no_kp = button.data('no_kp');
            var tgl_kp = button.data('tgl_kp');
            var id_customer = button.data('id_customer');
            var nama_customer = button.data('nama_customer');
            var kode_customer = button.data('kode_customer');
            var spek_kapsul = button.data('spek_kapsul');
            var kode_print = button.data('kode_print');
            var logo_print = button.data('logo_print');
            var kode_warna_cap = button.data('kode_warna_cap');
            var warna_cap = button.data('warna_cap');
            var kode_warna_body = button.data('kode_warna_body');
            var warna_body = button.data('warna_body');
            var jumlah_kp = button.data('jumlah_kp');
            var harga_kp = button.data('harga_kp');
            var no_po = button.data('no_po');
            var tgl_po = button.data('tgl_po');
            var jenis_pack = button.data('jenis_pack');
            var tgl_kirim = button.data('tgl_kirim');
            var ket_kp = button.data('ket_kp');
            var created_by = button.data('created_by');

            var modal = $(this);
            modal.find('#e-id_mkt_kp').val(id_mkt_kp);
            modal.find('#e-no_kp').val(no_kp);
            
            // Handle tanggal KP
            if (isValidDate(tgl_kp)) {
                modal.find('#e-tgl_kp').val(tgl_kp);
            } else {
                modal.find('#e-tgl_kp').val(formatDateForInput(new Date()));
            }
            
            modal.find('#e-id_customer').val(id_customer).trigger("chosen:updated");
            modal.find('#e-no_po').val(no_po || '');
            
            // Handle tanggal PO
            if (isValidDate(tgl_po)) {
                modal.find('#e-tgl_po').val(tgl_po);
            } else {
                modal.find('#e-tgl_po').val('');
            }
            
            modal.find('#e-spek_kapsul').val(spek_kapsul).trigger("chosen:updated");
            
            // Handle tanggal kirim dengan lebih baik
            if (isValidDate(tgl_kirim)) {
                var today = new Date();
                var deliveryDate = parseDateFromInput(tgl_kirim);
                
                if (deliveryDate) {
                    today.setHours(0, 0, 0, 0);
                    deliveryDate.setHours(0, 0, 0, 0);
                    
                    if (deliveryDate < today) {
                        // Jika tanggal kirim sudah lewat, set ke hari ini
                        modal.find('#e-tgl_kirim').val(formatDateForInput(new Date()));
                        showNotification('Tanggal kirim telah disesuaikan ke tanggal hari ini karena tanggal sebelumnya sudah lewat.', 'info');
                    } else {
                        // Jika masih valid, gunakan tanggal asli
                        modal.find('#e-tgl_kirim').val(tgl_kirim);
                    }
                } else {
                    // Jika parsing gagal, set default hari ini
                    modal.find('#e-tgl_kirim').val(formatDateForInput(new Date()));
                }
            } else {
                // Jika tidak ada tanggal kirim atau tanggal invalid, set default hari ini
                modal.find('#e-tgl_kirim').val(formatDateForInput(new Date()));
            }
            
            // Set checkbox kode print berdasarkan apakah ada kode print - SAMA DENGAN TAMBAH
            if (kode_print && kode_print !== '' && kode_print !== '-') {
                $('#e-use_print').prop('checked', true);
                $('.e-print-section').show();
                modal.find('#e-kode_print').val(kode_print);
                modal.find('#e-logo_print').val(logo_print || '');
                // Load data kode print untuk edit
                setTimeout(function() {
                    loadPrintsByCustomer(id_customer, 'e-');
                    // Set nilai yang dipilih setelah data dimuat
                    setTimeout(function() {
                        $('#e-id_master_print').val(kode_print).trigger('chosen:updated');
                    }, 500);
                }, 300);
            } else {
                $('#e-use_print').prop('checked', false);
                $('.e-print-section').hide();
            }

            // Set kode warna - SAMA DENGAN TAMBAH
            modal.find('#e-kode_warna_cap').val(kode_warna_cap || '');
            modal.find('#e-warna_cap').val(warna_cap || '');
            modal.find('#e-kode_warna_body').val(kode_warna_body || '');
            modal.find('#e-warna_body').val(warna_body || '');
            
            // Set nilai dropdown kode warna jika ada - SAMA DENGAN TAMBAH
            if (kode_warna_cap) {
                $('#e-id_master_kw_cap').val(kode_warna_cap).trigger('chosen:updated');
            }
            if (kode_warna_body) {
                $('#e-id_master_kw_body').val(kode_warna_body).trigger('chosen:updated');
            }
            
            modal.find('#e-jumlah_kp').val(formatRupiah(jumlah_kp.toString()));
            modal.find('#e-harga_kp').val(formatRupiah(harga_kp.toString()));
            modal.find('#e-jenis_pack').val(jenis_pack).trigger("chosen:updated");
            modal.find('#e-ket_kp').val(ket_kp || '');
            modal.find('#e-updated_by').val(created_by);

            // Handle datepicker conflict dengan modal
            modal.find('#e-tgl_po').datepicker().on('show.bs.modal', function(event) {
                event.stopPropagation();
            });
            
            modal.find('#e-tgl_kp').datepicker().on('show.bs.modal', function(event) {
                event.stopPropagation();
            });

            modal.find('#e-tgl_kirim').datepicker().on('show.bs.modal', function(event) {
                event.stopPropagation();
            });
        });

        // ========== VALIDASI NO KP ==========

        // Cek No KP untuk tambah
        $("#no_kp").keyup(function () {
            var no_kp = $("#no_kp").val();
            if (no_kp.length > 0) {
                jQuery.ajax({
                    url: "<?= base_url() ?>marketing/konfirmasi_pesanan/cek_no_kp",
                    dataType: 'text',
                    type: "post",
                    data: { no_kp: no_kp },
                    success: function (response) {
                        if (response == "true") {
                            $("#no_kp").addClass("is-invalid");
                            $("#simpan").attr("disabled", "disabled");
                        } else {
                            $("#no_kp").removeClass("is-invalid");
                            $("#simpan").removeAttr("disabled");
                        }
                    },
                    error: function() {
                        $("#no_kp").removeClass("is-invalid");
                        $("#simpan").removeAttr("disabled");
                    }
                });
            } else {
                $("#no_kp").removeClass("is-invalid");
                $("#simpan").removeAttr("disabled");
            }
        });

        // Cek No KP untuk edit - SAMA DENGAN TAMBAH
        $("#e-no_kp").keyup(function () {
            var no_kp = $("#e-no_kp").val();
            if (no_kp.length > 0) {
                jQuery.ajax({
                    url: "<?= base_url() ?>marketing/konfirmasi_pesanan/cek_no_kp",
                    dataType: 'text',
                    type: "post",
                    data: { no_kp: no_kp },
                    success: function (response) {
                        if (response == "true") {
                            $("#e-no_kp").addClass("is-invalid");
                            $("#update").attr("disabled", "disabled");
                        } else {
                            $("#e-no_kp").removeClass("is-invalid");
                            $("#update").removeAttr("disabled");
                        }
                    },
                    error: function() {
                        $("#e-no_kp").removeClass("is-invalid");
                        $("#update").removeAttr("disabled");
                    }
                });
            } else {
                $("#e-no_kp").removeClass("is-invalid");
                $("#update").removeAttr("disabled");
            }
        });

        // ========== RESET FORM ==========

        // Reset form saat modal tambah ditutup
        $('#add').on('hidden.bs.modal', function () {
            $(this).find('form')[0].reset();
            $('.chosen-select').trigger('chosen:updated');
            $('#simpan').removeAttr('disabled');
            // Reset checkbox dan sembunyikan section kode print
            $('#use_print').prop('checked', false);
            $('.print-section').hide();
            // Hapus class invalid
            $('#no_kp').removeClass('is-invalid');
        });

        // Reset form saat modal edit ditutup - SAMA DENGAN TAMBAH
        $('#edit').on('hidden.bs.modal', function () {
            $('#update').removeAttr('disabled');
            // Reset checkbox dan sembunyikan section kode print
            $('#e-use_print').prop('checked', false);
            $('.e-print-section').hide();
            // Hapus class invalid
            $('#e-no_kp').removeClass('is-invalid');
        });

        // ========== KONFIRMASI SUBMIT ==========

        // Konfirmasi submit untuk form tambah dengan validasi tanggal
        $('#form-add').submit(function(e) {
            // Validasi field wajib
            var no_kp = $('#no_kp').val();
            var tgl_kp = $('#tgl_kp').val();
            var id_customer = $('#id_customer').val();
            var jumlah_kp = $('#jumlah_kp').val();
            var harga_kp = $('#harga_kp').val();
            
            if (!no_kp || !tgl_kp || !id_customer || !jumlah_kp || !harga_kp) {
                alert('Harap lengkapi semua field yang wajib diisi!');
                return false;
            }
            
            // Validasi tanggal
            if (!isValidDate(tgl_kp)) {
                alert('Tanggal KP tidak valid!');
                $('#tgl_kp').focus();
                return false;
            }
            
            var tgl_kirim = $('#tgl_kirim').val();
            if (tgl_kirim && !isValidDate(tgl_kirim)) {
                alert('Tanggal Kirim tidak valid!');
                $('#tgl_kirim').focus();
                return false;
            }
            
            var tgl_po = $('#tgl_po').val();
            if (tgl_po && !isValidDate(tgl_po)) {
                alert('Tanggal PO tidak valid!');
                $('#tgl_po').focus();
                return false;
            }
            
            return confirm('Apakah Anda yakin ingin menyimpan data Konfirmasi Pesanan ini?');
        });

        // Konfirmasi submit untuk form edit dengan validasi tanggal - SAMA DENGAN TAMBAH
        $('#form-edit').submit(function(e) {
            // Validasi field wajib
            var no_kp = $('#e-no_kp').val();
            var tgl_kp = $('#e-tgl_kp').val();
            var id_customer = $('#e-id_customer').val();
            var jumlah_kp = $('#e-jumlah_kp').val();
            var harga_kp = $('#e-harga_kp').val();
            
            if (!no_kp || !tgl_kp || !id_customer || !jumlah_kp || !harga_kp) {
                alert('Harap lengkapi semua field yang wajib diisi!');
                return false;
            }
            
            // Validasi tanggal
            if (!isValidDate(tgl_kp)) {
                alert('Tanggal KP tidak valid!');
                $('#e-tgl_kp').focus();
                return false;
            }
            
            var tgl_kirim = $('#e-tgl_kirim').val();
            if (tgl_kirim && !isValidDate(tgl_kirim)) {
                alert('Tanggal Kirim tidak valid!');
                $('#e-tgl_kirim').focus();
                return false;
            }
            
            var tgl_po = $('#e-tgl_po').val();
            if (tgl_po && !isValidDate(tgl_po)) {
                alert('Tanggal PO tidak valid!');
                $('#e-tgl_po').focus();
                return false;
            }
            
            return confirm('Apakah Anda yakin ingin mengupdate data Konfirmasi Pesanan ini?');
        });

        // ========== EKSPORT FUNCTIONALITY ==========

        // Export functionality
        $('#export').click(function () {
            var filter_customer = $('#filter_customer').find(':selected').val();
            var filter_tgl = $('#filter_tgl').val();
            var filter_tgl2 = $('#filter_tgl2').val();

            if (filter_tgl == '' && filter_tgl2 != '') {
                alert('Dari tanggal belum diisi');
            } else if (filter_tgl != '' && filter_tgl2 == '') {
                alert('Sampai tanggal belum diisi');
            } else {
                const query = new URLSearchParams({
                    nama_customer: filter_customer,
                    date_from: filter_tgl,
                    date_until: filter_tgl2,
                    export: 'true'
                })
                window.location = "<?= base_url() ?>marketing/konfirmasi_pesanan/export?" + query.toString()
            }
        });

        // ========== INISIALISASI TAMBAHAN ==========

        // Auto-focus pada input pertama di modal tambah
        $('#add').on('shown.bs.modal', function () {
            $('#no_kp').focus();
        });

        // Auto-focus pada input pertama di modal edit - SAMA DENGAN TAMBAH
        $('#edit').on('shown.bs.modal', function () {
            $('#e-no_kp').focus();
        });

        // Handle escape key untuk close modal
        $(document).keyup(function(e) {
            if (e.key === "Escape") {
                $('.modal').modal('hide');
            }
        });

        console.log('JavaScript Konfirmasi Pesanan loaded successfully');
    });
</script>
</body>
 
</html>