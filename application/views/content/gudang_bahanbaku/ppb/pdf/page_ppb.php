<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Permohonan Pembelian Barang (PPB)</title>
    <style>
        @page {
            size: A4;
            margin: 1cm;
        }

        body {
            font-family: "Arial", sans-serif;
            font-size: 11px;
            line-height: 1.3;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            max-width: 21cm;
            margin: 0 auto;
        }

        .company-header {
            text-align: center;
            position: relative;
            top: 20px;
            margin-bottom: 8px;
        }

        .company-logo {
            position: absolute;
            right: 400px;
            top: -40px;
            z-index: -9999;
        }

        .company-name {
            font-size: 14px;
            font-weight: bold;
            text-transform: uppercase;
            margin: 0;
        }

        .company-desc {
            font-size: 10px;
            margin: 0;
            font-style: italic;
        }

        .form-info {
            text-align: right;
            font-size: 9px;
            margin-bottom: 15px;
            border-bottom: 1px solid #000;
            padding-bottom: 5px;
        }

        .document-title {
            text-align: center;
            font-size: 13px;
            font-weight: bold;
            text-decoration: underline;
            margin: 15px 0;
        }

        .department-info {
            margin-bottom: -40px;
        }

        .budgeting-section {
            position: relative;
            margin: 10px 0;
            left: 500px;
            bottom: 44px;
        }

        .budgeting-title {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-note {
            font-size: 10px;
            font-style: italic;
            margin: 5px 0;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin: 10px 0;
            font-size: 9px;
        }

        .data-table th,
        .data-table td {
            border: 1px solid #000;
            padding: 3px;
            text-align: center;
            vertical-align: middle;
        }

        .data-table th {
            background-color: #f0f0f0;
            font-weight: bold;
        }

        .signature-section {
            display: flex;
            margin-top: 50px;
        }

        .signature-section>.departement-info-card {
            margin-top: 50px;
        }

        .signature-table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }

        .signature-table td {
            width: 25%;
            text-align: center;
            vertical-align: bottom;
            padding: 10px;
            position: relative;
        }

        .signature-table img {
            display: block;
            margin: 0 auto;
        }

        .signature-line {
            border-bottom: 1px solid #000;
            margin: 0 auto;
            width: 90%;
            height: 1px;
        }


        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Header Perusahaan -->
        <div class="company-header">
            <img src="<?= FCPATH . 'assets/images/logokapsul.jpeg' ?>" alt="" width="200" class="company-logo">
        </div>

        <!-- Info Form -->
        <div class="form-info">
            <div>Form-PRC-12/R0<br>
            Mulai Berlaku : 02 Januari 2006</div>
        </div>

        <!-- Judul Dokumen -->
        <div class="document-title">
            PERMOHONAN PEMBELIAN BARANG
        </div>

        <!-- Info Departemen -->
        <div class="department-info">
            <strong>BAGIAN</strong>  : <?= strtoupper($ppb->departement) ?><br>
            <strong>BULAN</strong>   : <?= $ppb->tgl_ppb ? date('F Y', strtotime($ppb->tgl_ppb)) : date('F Y') ?><br>
            <strong>NO. PPB</strong> : <?= strtoupper($ppb->no_ppb) ?>
        </div>

        <!-- Section Budgeting -->
        <div class="budgeting-section">
            <div class="budgeting-title"><?= $ppb->jenis_ppb ?></div>
            <div class="form-note">FORM: A/C <sup>1</sup></div>
        </div>

        <!-- Tabel Data Barang -->
        <table class="data-table">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NO BUDGET</th>
                    <th>NAMA BARANG</th>
                    <th>SPESIFIKASI</th>
                    <th>SAT</th>
                    <th>JML</th>
                    <th>TANGGAL PAKAI</th>
                    <th>KETERANGAN</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($barang)): $no = 1; ?>
                    <?php foreach ($barang as $b): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $b['kode_barang'] ?></td>
                            <td><?= $b['nama_barang'] ?></td>
                            <td><?= $b['spek'] ?></td>
                            <td><?= $b['satuan'] ?></td>
                            <td><?= $b['jumlah_ppb'] ?></td>
                            <td><?= $ppb->tgl_pakai ? date('d/m/Y', strtotime($ppb->tgl_pakai)) : '-' ?></td>
                            <td><?= $ppb->ket ?? '-' ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8">Tidak ada data barang</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- Catatan Form -->
        <div class="form-note">
            <sup>1</sup> Coret yang tidak sesuai
        </div>

        <!-- Bagian Penandatanganan -->
        <!-- Bagian Penandatanganan -->
        <div class="signature-section">
            <table class="signature-table">
                <tr>
                    <td>Diperiksa,</td>
                    <td>Mengetahui,</td>
                    <td>Menyetujui,</td>
                    <?php if ($ppb->jenis_ppb == "Non-Budget"): ?>
                        <td>Disetujui,</td>
                    <?php endif; ?>
                </tr>
                <tr>
                    <!-- Adm / Stock Keeper -->
                    <td>
                        <?php if (file_exists(FCPATH . 'assets/tanda_tangan/adm.png')): ?>
                            <img src="<?= FCPATH . 'assets/tanda_tangan/adm.png' ?>" alt="Ttd Adm" style="width:80px; height:auto; margin-top:10px;">
                        <?php else: ?>
                            <div style="height:60px;">Sudah</div>
                        <?php endif; ?>
                        <div class="signature-line"></div>
                        <div style="margin-top:3px;">( <?= $ppb->ttd_adm ?? 'Adm / Stock Keeper' ?> )</div>
                    </td>

                    <!-- Supy / Kasie -->
                    <td>
                        <?php if (file_exists(FCPATH . 'assets/tanda_tangan/supy.png')): ?>
                            <img src="<?= FCPATH . 'assets/tanda_tangan/supy.png' ?>" alt="Ttd Supy" style="width:80px; height:auto; margin-top:10px;">
                        <?php else: ?>
                            <div style="height:60px;"></div>
                        <?php endif; ?>
                        <div class="signature-line"></div>
                        <div style="margin-top:3px;">( <?= $ppb->ttd_supy ?? 'Supv / Kasie' ?> )</div>
                    </td>

                    <!-- Manager Dept -->
                    <td>
                        <?php if (file_exists(FCPATH . 'assets/tanda_tangan/manager.png')): ?>
                            <img src="<?= FCPATH . 'assets/tanda_tangan/manager.png' ?>" alt="Ttd Manager" style="width:80px; height:auto; margin-top:10px;">
                        <?php else: ?>
                            <div style="height:60px;"></div>
                        <?php endif; ?>
                        <div class="signature-line"></div>
                        <div style="margin-top:3px;">( <?= $ppb->ttd_manager ?? 'Manager Dept.' ?> )</div>
                    </td>

                    <!-- Plant Manager / Direktur -->
                    <td>
                        <?php if ($ppb->jenis_ppb == "Non-Budget"): ?>
                            <?php if (file_exists(FCPATH . 'assets/tanda_tangan/direktur.png')): ?>
                                <img src="<?= FCPATH . 'assets/tanda_tangan/direktur.png' ?>" alt="Ttd Direktur" style="width:80px; height:auto; margin-top:10px;">
                            <?php else: ?>
                                <div style="height:60px;"></div>
                            <?php endif; ?>
                            <div class="signature-line"></div>
                            <div style="margin-top:3px;">( <?= $ppb->ttd_direktur ?? 'Direktur' ?> )</div>
                        <?php else: ?>
                            <?php if (file_exists(FCPATH . 'assets/tanda_tangan/plant.png')): ?>
                                <img src="<?= FCPATH . 'assets/tanda_tangan/plant.png' ?>" alt="Ttd Plant" style="width:80px; height:auto; margin-top:10px;">
                            <?php else: ?>
                                <div style="height:60px;"></div>
                            <?php endif; ?>
                            <div class="signature-line"></div>
                            <div style="margin-top:3px;">( <?= $ppb->ttd_plant ?? 'Plant Manager' ?> )</div>
                        <?php endif; ?>
                    </td>
                </tr>
            </table>
        </div>


        <!-- Footer -->
        <div class="footer">
            Cicadas, 5 Oktober 2016
        </div>
    </div>
</body>

</html>