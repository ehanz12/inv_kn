<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Rencana Belanja</title>

<style>
    body {
        font-family: Arial, sans-serif;
        font-size: 11px;
        margin: 0;
        padding: 0;
    }

    .container {
        width: 100%;
        padding: 20px;
        position: relative;
    }

    /* =============================
       HEADER PERUSAHAAN KIRI
       ============================= */
    .header-left {
        position: absolute;
        top: 10px;
        left: 10px;
        font-size: 10px;
        font-weight: bold;
    }

    /* LOGO */
    .logo {
        width: 120px;
        position: absolute;
        top: 0px;
        left: 20px;
    }

    /* =============================
       JUDUL DOKUMEN KANAN
       ============================= */
    .title-right {
        position: absolute;
        right: 20px;
        top: 10px;
        text-align: right;
    }

    .rb-title {
        font-size: 18px;
        font-weight: bold;
        text-transform: uppercase;
        margin: 0;
    }

    .rb-number {
        margin-top: 5px;
        font-size: 12px;
    }

    /* =============================
       TABEL BARANG
       ============================= */
    table.rb-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 60px;
        font-size: 10px;
    }

    .rb-table th, .rb-table td {
        border: 1px solid #000;
        padding: 4px;
        text-align: center;
    }

    .rb-table th {
        font-weight: bold;
        background: #f2f2f2;
    }

    /* =============================
       TANGGAL DI KIRI
       ============================= */
    .tanggal {
        margin-top: 20px;
        font-size: 11px;
    }

    /* =============================
       TANDA TANGAN
       ============================= */
    .ttd-container {
        width: 100%;
        margin-top: 40px;
        display: flex;
        justify-content: space-between;
        text-align: center;
        font-size: 10px;
    }

    .ttd-box {
        width: 30%;
    }

    .space-ttd {
        height: 50px;
    }

    .nama-ttd {
        margin-top: 5px;
        text-decoration: underline;
        font-size: 10px;
    }

    .jabatan {
        margin-top: 2px;
    }

    .signature-table {
    width: 100%;
    border-collapse: collapse;
    text-align: center;
    font-size: 10px;
    margin-top: 40px;
}

.signature-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 40px;
    table-layout: fixed;
    text-align: center;
    font-size: 11px;
}

.signature-table th {
    padding-bottom: 25px;
    font-weight: bold;
}

.signature-table td {
    height: 100px;
    vertical-align: bottom;
    padding-bottom: 5px;
}

.signature-line {
    border-top: 1px solid #000;
    width: 80%;
    margin: 5px auto 0;
}
</style>

</head>
<body>

<div class="container">

    <!-- HEADER KIRI -->
    <!-- <img src="<?= FCPATH . 'assets/images/logokapsul-removebg-preview.png' ?>" class="logo"> -->

    <div class="header-left">
        PT. KAPSULINDO NUSANTARA<br>
        RENCANA BELANJA
    </div>

    <!-- JUDUL KANAN -->
    <div class="title-right">
        <div class="rb-title">RENCANA BELANJA</div>
        <div class="rb-number">Nomor: <?= $rb->no_rb ?></div>
    </div>

    <!-- TABEL DATA BARANG -->
    <table class="rb-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Brg</th>
                <th>No PPB</th>
                <th>Nama Barang</th>
                <th>Spesifikasi</th>
                <th>Unit</th>
                <th>Jml</th>
                <th>Harga Satuan</th>
                <th>Total Harga</th>
            </tr>
        </thead>

        <tbody>
            <?php $no = 1; foreach ($barang as $b): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $b['kode_barang'] ?></td>
                <td><?= $b['no_ppb'] ?></td>
                <td><?= $b['nama_barang'] ?></td>
                <td><?= $b['spek'] ?></td>
                <td><?= $b['satuan'] ?></td>
                <td><?= number_format($b['jumlah_rh'], 0, ",", ".") ?></td>
                <td><?= number_format($b['harga_rh'], 0, ",", ".") ?></td>
                <td><?= number_format($b['total_rh'], 0, ",", ".") ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

   <!-- ========== TANDA TANGAN OTOMATIS ========== -->
<table class="signature-table">
    <thead>
        <tr>
            <th>Cicadas, <?= date('Y m D') ?></th>
            <th>Mengetahui</th>
            <th>Menyetujui</th>
        </tr>
    </thead>

    <tbody>
        <tr>

            <!-- ========== STAFF PURCHASING ========== -->
            <td>
                <?php if (file_exists(FCPATH.'assets/tanda_tangan/staff.png')): ?>
                    <img src="<?= base_url('assets/tanda_tangan/staff.png') ?>" height="70"><br>
                <?php else: ?>
                    <div style="height:70px;">Approved</div>
                <?php endif; ?>

                <div class="signature-line"></div>
                <div>( <?= $rb->ttd_staff ?? 'Staff Purchasing' ?> )</div>
            </td>

            <!-- ========== MENGETAHUI ==========
                 biasanya SPV / Atasan -->
            <td>
                <?php if (file_exists(FCPATH.'assets/tanda_tangan/mengetahui.png')): ?>
                    <img src="<?= base_url('assets/tanda_tangan/mengetahui.png') ?>" height="70"><br>
                <?php else: ?>
                    <div style="height:70px;">Approved</div>
                <?php endif; ?>

                <div class="signature-line"></div>
                <div>( <?= $rb->ttd_mengetahui ?? 'ka.Purchasing' ?> )</div>
            </td>

            <!-- ========== MENYETUJUI ========== -->
            <td>
                <?php if (file_exists(FCPATH.'assets/tanda_tangan/menyetujui.png')): ?>
                    <img src="<?= base_url('assets/tanda_tangan/menyetujui.png') ?>" height="70"><br>
                <?php else: ?>
                    <div style="height:70px;">Approved</div>
                <?php endif; ?>

                <div class="signature-line"></div>
                <div>( <?= $rb->ttd_menyetujui ?? 'Ass.Dirut' ?> )</div>
            </td>

        </tr>
    </tbody>
</table>

</div>

</body>
</html>
