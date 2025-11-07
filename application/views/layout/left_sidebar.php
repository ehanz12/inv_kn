<?php
// include('../../controllers/Left_sidebar.php');
// $this->load->model('M_pemeriksaan_bahan');
// $notif_pb['cek_karantina'] = $this->M_pemeriksaan_bahan->cek_karantina()->row_array(0);
// $notif_pb['cek_released'] = $this->M_pemeriksaan_bahan->cek_released()->row_array(0);
// var_dump($notif_pb);
// die;
?>
<!--[ navigation menu ] start -->
<nav class="pcoded-navbar">
    <div class="navbar-wrapper">
        <div class="navbar-brand header-logo">
            <a href="" class="b-brand">
                <!-- <div class="b-bg">
                        <i class="feather icon-trending-up"></i>
                    </div> -->
                <div width: 15px;height: 60px;border-radius: 8px;>
                    <?php $src = base_url('assets/images/1669787012654.png'); ?>
                    <?php $logo = base_url('assets/images/knlogo.png'); ?>
                    <img src="<?= $logo ?>" style="width: 95%;margin-left: -35px; auto;">
                </div>
            </a>
            <a class="mobile-menu" id="mobile-collapse" href="javascript:"><span></span></a>
        </div>
        <div class="navbar-content scroll-div">
            <?php
            $uri = $this->uri->segment(1);
            $level = $this->session->userdata('departement'); ?>
            <!-- Side Bar Admin -->
            <ul class="nav pcoded-inner-navbar" style="list-style: none;">
                <li class="nav-item pcoded-menu-caption">
                </li>
                <li class="nav-item <?= $uri == '' ? 'active' : '' ?>">
                    <a href="<?= base_url() ?>" class="nav-link "><span class="pcoded-micon"><i
                                class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                </li>
                <?php if ($level === "admin" || $level === "accounting") { ?>
                    <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds"
                        class="nav-item pcoded-hasmenu">
                        <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-clipboard"></i></span><span
                                class="pcoded-mtext">Accounting</span></a>
                        <ul class="pcoded-submenu">
                            <li class="nav-item <?= $uri == 'Stock_keeper' ? 'active' : '' ?>"><a
                                    href="<?= base_url('accounting/stock_keeper') ?>" class="">Stock Keeper</a></li>
                            <li class="nav-item <?= $uri == 'PPB' ? 'active' : '' ?>"><a
                                    href="<?= base_url('accounting/accounting_ppb') ?>" class="">PPB</a></li>
                        </ul>
                    </li>
                <?php } ?>
                <?php if ($level === "admin" || $level === "marketing") { ?>
                    <li data-username="marketing" class="nav-item pcoded-hasmenu">
                        <a href="javascript:" class="nav-link">
                            <span class="pcoded-micon"><i class="feather icon-tag"></i></span>
                            <span class="pcoded-mtext">Marketing</span>
                        </a>

                        <ul class="pcoded-submenu">
                            <!-- Submenu: Master -->
                            <li data-username="master" class="nav-item pcoded-hasmenu">
                                <a href="javascript:" class="nav-link">
                                    <span class="pcoded-mtext">Master</span>
                                </a>

                                <ul class="pcoded-submenu">
                                    <li class="nav-item <?= $uri == 'Customer' ? 'active' : '' ?>">
                                        <a href="<?= base_url('Marketing/master/Customer') ?>">Customer</a>
                                    </li>
                                    <li class="nav-item <?= $uri == 'Kode_warna' ? 'active' : '' ?>">
                                        <a href="<?= base_url('Marketing/master/Kode_warna') ?>">Kode Warna</a>
                                    </li>
                                    <li class="nav-item <?= $uri == 'Printing' ? 'active' : '' ?>">
                                        <a href="<?= base_url('Qa/Doc/Doc_printing/Printing') ?>">Master Print</a>
                                    </li>
                                    <li class="nav-item <?= $uri == 'Stok Size' ? 'active' : '' ?>">
                                        <a href="<?= base_url('Marketing/master/Master_stock') ?>">Stok Size</a>
                                    </li>
                                </ul>
                            </li>

                            <!-- Submenu: Lain-lain -->
                            <li class="nav-item <?= $uri == 'Capsule_request' ? 'active' : '' ?>">
                                <a href="<?= base_url('Marketing/Capsule_request/Marketing_cr') ?>">Capsule Request</a>
                            </li>
                            <li class="nav-item <?= $uri == 'Tambah_schedule' ? 'active' : '' ?>">
                                <a href="<?= base_url('Marketing/Tambah_schedule') ?>">Tambah Schedule</a>
                            </li>
                            <li class="nav-item <?= $uri == 'Print_schedule' ? 'active' : '' ?>">
                                <a href="<?= base_url('Marketing/Print_schedule') ?>">Print Schedule</a>
                            </li>
                            <li class="nav-item <?= $uri == 'PPB' ? 'active' : '' ?>">
                                <a href="<?= base_url('Ppb/PPB') ?>">PPB</a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>


                <?php if ($level === "admin" || $level === "lab") { ?>
                    <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds"
                        class="nav-item pcoded-hasmenu">
                        <a id="badge-1" href="javascript:" class="nav-link"><span class="pcoded-micon"><i
                                    class="feather icon-clock"></i></span>
                            <span class="pcoded-mtext">Lab/QC
                                <?php if ($jml_notif != 0) { ?>
                                    <span class="badge badge-pill badge-warning"><?= $jml_notif ?></span>
                                <?php } ?>
                            </span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class="nav-item <?= $uri == 'pemeriksaan_bahan' ? 'active' : '' ?>">
                                <a href="<?= base_url('lab/pemeriksaan_bahan') ?>" class="">Pemeriksaan Bahan
                                    <?php if ($cek_karantina != 0) { ?>
                                        <span class="badge badge-pill badge-warning"><?= $cek_karantina ?></span>
                                    <?php } ?>
                                </a>
                            </li>
                            <li class="nav-item <?= $uri == 'hasil_pemeriksaan' ? 'active' : '' ?>">
                                <a href="<?= base_url('lab/Hasil_pemeriksaan_lab/Hasil_pemeriksaan_gel') ?>" class="">Hasil
                                    Pemeriksaan
                                    <?php if ($cek_proses != 0) { ?>
                                        <span id="badge-hp" class="badge badge-pill badge-warning"><?= $cek_proses ?></span>
                                    <?php } ?>
                                </a>
                            </li>
                            <li class="nav-item <?= $uri == 'alat_kalibrasi' ? 'active' : '' ?>">
                                <a href="<?= base_url('lab/Alat_kalibrasi') ?>" class="">Alat Kalibrasi</a>
                            </li>
                            <li class="nav-item <?= $uri == 'PPB' ? 'active' : '' ?>">
                                <a href="<?= base_url('Ppb/PPB') ?>" class="">PPB</a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>
                <?php if ($level === "admin" || $level === "purchasing") { ?>
                    <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds"
                        class="nav-item pcoded-hasmenu">
                        <a id="badge-1" href="javascript:" class="nav-link"><span class="pcoded-micon"><i
                                    class="feather icon-shopping-cart"></i></span>
                            <span class="pcoded-mtext">Purchasing</span>
                        </a>
                        <ul class="pcoded-submenu">
                            <!-- <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds" class="nav-item pcoded-hasmenu">
                                <a href="javascript:" class="nav-link "><span class="pcoded-mitext">Bahan Produksi</span></a>
                                <ul class="pcoded-submenu">
                                    <li class="nav-item <?= $uri == 'barang' ? 'active' : '' ?>"><a href="<?= base_url('gudang_bahanbaku/Barang') ?>" class="">Bahan</a></li>
                                    <li class="nav-item <?= $uri == 'supplier' ? 'active' : '' ?>"><a href="<?= base_url('purchasing/supplier') ?>" class="">Supplier</a></li>
                                    <li class="nav-item <?= $uri == 'pembelian' ? 'active' : '' ?>"><a href="<?= base_url('purchasingpembelian') ?>" class="">Pembelian</a></li>
                                </ul>
                            </li> -->
                            <!-- <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds" class="nav-item pcoded-hasmenu">
                                <a href="javascript:" class="nav-link "><span class="pcoded-mitext">Sparepart Produksi</span></a>
                                <ul class="pcoded-submenu">
                                    <li class="nav-item <?= $uri == 'barang' ? 'active' : '' ?>"><a href="<?= base_url('gudang_bahanbaku/Barang') ?>" class="">Sparepart</a></li>
                                    <li class="nav-item <?= $uri == 'supplier' ? 'active' : '' ?>"><a href="<?= base_url('gudang_bahanbaku/supplier') ?>" class="">Supplier</a></li>
                                    <li class="nav-item <?= $uri == 'pembelian' ? 'active' : '' ?>"><a href="<?= base_url('pembelian') ?>" class="">Pembelian</a></li>
                                </ul>
                            </li> -->
                            <!-- <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds" class="nav-item pcoded-hasmenu">
                                <a href="javascript:" class="nav-link "><span class="pcoded-mitext">ATK</span></a>
                                <ul class="pcoded-submenu">
                                    <li class="nav-item <?= $uri == 'barang' ? 'active' : '' ?>"><a href="<?= base_url('Barang') ?>" class="">ATK</a></li>
                                    <li class="nav-item <?= $uri == 'supplier' ? 'active' : '' ?>"><a href="<?= base_url('supplier') ?>" class="">Supplier</a></li>
                                    <li class="nav-item <?= $uri == 'pembelian' ? 'active' : '' ?>"><a href="<?= base_url('pembelian') ?>" class="">Pembelian</a></li>
                                </ul>
                            </li> -->
                            <!-- <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds" class="nav-item pcoded-hasmenu">
                                <a href="javascript:" class="nav-link "><span class="pcoded-mitext">Other</span></a>
                                <ul class="pcoded-submenu">
                                    <li class="nav-item <?= $uri == 'barang' ? 'active' : '' ?>"><a href="<?= base_url('Barang') ?>" class="">Other</a></li>
                                    <li class="nav-item <?= $uri == 'supplier' ? 'active' : '' ?>"><a href="<?= base_url('Purchasing/prc_ppb/supplier') ?>" class="">Supplier</a></li>
                                    <li class="nav-item <?= $uri == 'pembelian' ? 'active' : '' ?>"><a href="<?= base_url('pembelian') ?>" class="">Pembelian</a></li>
                                    <li class="nav-item <?= $uri == 'Rekap Import' ? 'active' : '' ?>"><a href="<?= base_url('Purchasing/Other/Rekap_impor') ?>" class="">Rekap Import</a></li>
                                    <li class="nav-item <?= $uri == 'PO' ? 'active' : '' ?>"><a href="<?= base_url('Purchasing/Other/Po') ?>" class="">PO</a></li>
                                    <li class="nav-item <?= $uri == 'PO Import' ? 'active' : '' ?>"><a href="<?= base_url('Purchasing/Other/Po_impor') ?>" class="">PO Import</a></li>
                                    <li class="nav-item <?= $uri == 'PPB' ? 'active' : '' ?>"><a href="<?= base_url('Ppb/PPB') ?>" class="">PPB</a></li>
                                    <li class="nav-item <?= $uri == 'DPB' ? 'active' : '' ?>"><a href="<?= base_url('Purchasing/Other/Dpb') ?>" class="">DPB</a></li>
                                    <li class="nav-item <?= $uri == 'Approved Vendor List' ? 'active' : '' ?>"><a href="<?= base_url('Purchasing/Other/Avl') ?>" class="">Approved Vendor List</a></li>
                                </ul>
                            </li> -->
                            <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds"
                                class="nav-item pcoded-hasmenu">
                                <a href="javascript:" class="nav-link "><span class="pcoded-mitext">PPB Master
                                        Barang</span></a>
                                <ul class="pcoded-submenu">
                                    <li class="nav-item <?= $uri == 'prc_ppb_masterbarang' ? 'active' : '' ?>"><a
                                            href="<?= base_url('Purchasing/prc_ppb/Prc_ppb_masterbarang') ?>"
                                            class="">Master Barang</a></li>
                                    <li class="nav-item <?= $uri == 'Supplier' ? 'active' : '' ?>"><a
                                            href="<?= base_url('Purchasing/prc_ppb/Po_supplier/Prc_po_supplier') ?>"
                                            class="">Supplier</a></li>

                                </ul>
                            </li>
                            <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds"
                                class="nav-item pcoded-hasmenu">
                                <a href="javascript:" class="nav-link "><span class="pcoded-mitext">PO Import</span></a>
                                <ul class="pcoded-submenu">
                                    <li class="nav-item <?= $uri == 'PO Import' ? 'active' : '' ?>"><a
                                            href="<?= base_url('Purchasing/Po_import/Prc_po_import') ?>" class="">PO
                                            Import</a></li>
                                    <li class="nav-item <?= $uri == 'Supplier' ? 'active' : '' ?>"><a
                                            href="<?= base_url('Purchasing/Po_rekap/Prc_po_rekap') ?>" class="">Rekap
                                            Import</a></li>

                                </ul>
                            </li>

                            <li class="nav-item <?= $uri == 'PO Reg' ? 'active' : '' ?>"><a
                                    href="<?= base_url('Purchasing/PO_reg/Prc_po_reg') ?>" class="">PO Reg</a></li>
                            <li class="nav-item <?= $uri == 'PO Reg' ? 'active' : '' ?>">
                                <a href="<?= base_url('Purchasing/Purchasing_ppb/Purchasing_ppb') ?>" class="">PPB

                                    <?php if ($cek_status != 0) { ?>
                                        <span id="badge-hp" class="badge badge-pill badge-warning"><?= $cek_status ?></span>
                                    <?php } ?>

                                </a>
                            </li>
                            <li class="nav-item <?= $uri == 'PO Reg' ? 'active' : '' ?>"><a
                                    href="<?= base_url('Purchasing/Prc_dpb/Prc_dpb') ?>" class="">DPB</a></li>



                        </ul>
                    </li>
                <?php } ?>
                <?php if ($level === "admin" || $level === "gudang") { ?>
                    <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds"
                        class="nav-item pcoded-hasmenu">
                        <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-package"></i></span>
                            <span class="pcoded-mtext">Gudang Bahan Baku
                                <?php if ($cek_permintaan != 0) { ?>
                                    <span id="badge-hp" class="badge badge-pill badge-warning"><?= $cek_permintaan ?></span>
                                <?php } ?>
                            </span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds"
                                class="nav-item pcoded-hasmenu">
                                <a href="javascript:" class="nav-link "><span class="pcoded-mtext">Kelola Barang
                                        <?php if ($cek_permintaan != 0) { ?>
                                            <span id="badge-hp"
                                                class="badge badge-pill badge-warning"><?= $cek_permintaan ?></span>
                                        <?php } ?>
                                    </span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class="nav-item  <?= $uri == 'barang_masuk' ? 'active' : '' ?>"><a
                                            href="<?= base_url('gudang_bahanbaku/barang_masuk') ?>" class="">Barang
                                            Masuk</a></li>
                                    <li class="nav-item  <?= $uri == 'barang_keluar' ? 'active' : '' ?>"><a
                                            href="<?= base_url('gudang_bahanbaku/barang_keluar') ?>" class="">Barang
                                            Keluar</a></li>
                                    <li class="nav-item  <?= $uri == 'karantina' ? 'active' : '' ?>"><a
                                            href="<?= base_url('gudang_bahanbaku/karantina') ?>" class="">Karantina</a></li>
                                    <li class="nav-item <?= $uri == 'barang_stok' ? 'active' : '' ?>"><a
                                            href="<?= base_url('gudang_bahanbaku/barang_stok') ?>" class="">Stok Barang</a>
                                    </li>
                                    <li class="nav-item  <?= $uri == 'permintaan_barang_gudang' ? 'active' : '' ?>">
                                        <a href="<?= base_url('gudang_bahanbaku/permintaan_barang_gudang') ?>"
                                            class="">Permintaan Barang Gudang
                                            <?php if ($cek_permintaan != 0) { ?>
                                                <span id="badge-hp"
                                                    class="badge badge-pill badge-warning"><?= $cek_permintaan ?></span>
                                            <?php } ?>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds"
                                class="nav-item pcoded-hasmenu">
                                <a href="javascript:" class="nav-link "><span class="pcoded-mtext">Laporan</span></a>
                                <ul class="pcoded-submenu">
                                    <li class="nav-item <?= $uri == 'Laporan Barang Masuk' ? 'active' : '' ?>"><a
                                            href="<?= base_url('gudang_bahanbaku/Laporan_barang_masuk') ?>" class="">Barang
                                            Masuk</a></li>
                                    <li class="nav-item <?= $uri == 'Laporan Barang Keluar' ? 'active' : '' ?>"><a
                                            href="<?= base_url('gudang_bahanbaku/Laporan_barang_keluar') ?>" class="">Barang
                                            Keluar</a></li>
                                    <li class="nav-item  <?= $uri == 'Laporan Kartu Stok' ? 'active' : '' ?>"><a
                                            href="<?= base_url('gudang_bahanbaku/Laporan_kartu_stok') ?>" class="">Kartu
                                            Stok</a></li>
                                </ul>
                            </li>
                            <li class="nav-item  <?= $uri == 'PPB' ? 'active' : '' ?>"><a href="<?= base_url('Ppb/PPB') ?>"
                                    class="">PPB</a></li>
                        </ul>
                    </li>
                <?php } ?>
                <?php if ($level === "admin" || $level === "melting") { ?>
                    <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds"
                        class="nav-item pcoded-hasmenu">
                        <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-codepen"></i></span><span class="pcoded-mtext">Melting</span></a>
                        <ul class="pcoded-submenu">
                            <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds"
                                class="nav-item pcoded-hasmenu">
                                <a href="javascript:" class="nav-link "><span class="pcoded-mtext">Kelola Barang</span></a>
                                <ul class="pcoded-submenu">
                                    <li class="nav-item <?= $uri == 'permintaan_barang_melting' ? 'active' : '' ?>"><a
                                            href="<?= base_url('melting/permintaan_barang_melting') ?>" class="">Permintaan
                                            Barang Melting</a></li>
                                    <li class="nav-item  <?= $uri == 'barang_masuk_melting' ? 'active' : '' ?>"><a
                                            href="<?= base_url('melting/Barang_masuk_melting/mm_bahan_baku') ?>"
                                            class="">Barang Masuk Melting</a></li>
                                </ul>
                            </li>
                            <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds"
                                class="nav-item pcoded-hasmenu">
                                <a href="javascript:" class="nav-link "><span class="pcoded-mtext">Proses</span></a>
                                <ul class="pcoded-submenu">

                                    <li class="nav-item <?= $uri == 'penimbangan' ? 'active' : '' ?>"><a
                                            href="<?= base_url('lab/penimbangan') ?>" class="">Penimbangan</a></li>
                                    <li class="nav-item <?= $uri == 'masak_gelatin' ? 'active' : '' ?>"><a
                                            href="<?= base_url('melting/Masak_gelatin') ?>" class="">Masak Gelatin</a></li>
                                    <li class="nav-item <?= $uri == 'pembersihan' ? 'active' : '' ?>"><a
                                            href="<?= base_url('melting/pembersihan') ?>" class="">Pembersihan</a></li>
                                    <li class="nav-item <?= $uri == 'pewarnaan' ? 'active' : '' ?>"><a
                                            href="<?= base_url('melting/Pewarnaan') ?>" class="">Pewarnaan</a></li>
                                </ul>
                            </li>
                            <li class="nav-item <?= $uri == 'PPB' ? 'active' : '' ?>"><a href="<?= base_url('Ppb/PPB') ?>"
                                    class="">PPB</a></li>
                        </ul>
                    </li>
                <?php } ?>
                <?php if ($level === "admin" || $level === "forming") { ?>
                    <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds"
                        class="nav-item pcoded-hasmenu">
                        <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-droplet"></i></span><span class="pcoded-mtext">Forming</span></a>
                        <ul class="pcoded-submenu">
                            <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds"
                                class="nav-item pcoded-hasmenu">
                                <a href="javascript:" class="nav-link "></span><span class="pcoded-mtext">Master
                                        Melting</span></a>
                                <ul class="pcoded-submenu">
                                    <li class="nav-item <?= $uri == 'barang' ? 'active' : '' ?>"><a
                                            href="<?= base_url('gudang_bahanbaku/Barang') ?>" class="">Barang</a></li>
                                </ul>
                            </li>
                            <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds"
                                class="nav-item pcoded-hasmenu">
                                <a href="javascript:" class="nav-link "><span class="pcoded-mtext">Kelola Barang</span></a>
                                <ul class="pcoded-submenu">
                                    <li class="nav-item <?= $uri == 'permintaan_barang_melting' ? 'active' : '' ?>"><a
                                            href="<?= base_url('melting/permintaan_barang_melting') ?>" class="">Permintaan
                                            Barang Melting</a></li>
                                    <li class="nav-item  <?= $uri == 'barang_masuk' ? 'active' : '' ?>"><a
                                            href="<?= base_url('gudang_bahanbaku/barang_masuk') ?>" class="">Barang
                                            Masuk</a></li>
                                    <li class="nav-item  <?= $uri == 'permintaan_barang_melting' ? 'active' : '' ?>"><a
                                            href="<?= base_url('melting/permintaan_barang_melting') ?>" class="">Barang
                                            Keluar</a></li>
                                </ul>
                            </li>
                            <li class="nav-item  <?= $uri == 'PPB' ? 'active' : '' ?>"><a href="<?= base_url('Ppb/PPB') ?>"
                                    class="">PPB</a></li>
                        </ul>
                    </li>
                <?php } ?>
                <?php if ($level === "admin" || $level === "sortir") { ?>
                    <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds"
                        class="nav-item pcoded-hasmenu">
                        <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-check-square"></i></span><span
                                class="pcoded-mtext">Sortir</span></a>
                        <ul class="pcoded-submenu">
                            <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds"
                                class="nav-item pcoded-hasmenu">
                                <a href="javascript:" class="nav-link "><span class="pcoded-mtext">Master Melting</span></a>
                                <ul class="pcoded-submenu">
                                    <li class="nav-item <?= $uri == 'barang' ? 'active' : '' ?>"><a
                                            href="<?= base_url('melting/Barang') ?>" class="">Barang</a></li>
                                </ul>
                            </li>
                            <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds"
                                class="nav-item pcoded-hasmenu">
                                <a href="javascript:" class="nav-link "><span class="pcoded-mtext">Kelola Barang</span></a>
                                <ul class="pcoded-submenu">
                                    <li class="nav-item <?= $uri == 'permintaan_barang_melting' ? 'active' : '' ?>"><a
                                            href="<?= base_url('melting/permintaan_barang_melting') ?>" class="">Permintaan
                                            Barang Melting</a></li>
                                    <li class="nav-item  <?= $uri == 'barang_masuk' ? 'active' : '' ?>"><a
                                            href="<?= base_url('melting/barang_masuk') ?>" class="">Barang Masuk</a></li>
                                    <li class="nav-item  <?= $uri == 'permintaan_barang_melting' ? 'active' : '' ?>"><a
                                            href="<?= base_url('melting/permintaan_barang_melting') ?>" class="">Barang
                                            Keluar</a></li>
                                </ul>
                            </li>
                            <li class="nav-item  <?= $uri == 'PPB' ? 'active' : '' ?>"><a href="<?= base_url('Ppb/PPB') ?>"
                                    class="">PPB</a></li>
                        </ul>
                    </li>
                <?php } ?>
                <?php if ($level === "admin" || $level === "printing") { ?>
                    <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds"
                        class="nav-item pcoded-hasmenu">
                        <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-printer"></i></span><span class="pcoded-mtext">Printing</span></a>
                        <ul class="pcoded-submenu">
                            <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds"
                                class="nav-item pcoded-hasmenu">
                                <a href="javascript:" class="nav-link "><span class="pcoded-mtext">Master Melting</span></a>
                                <ul class="pcoded-submenu">
                                    <li class="nav-item <?= $uri == 'barang' ? 'active' : '' ?>"><a
                                            href="<?= base_url('Barang') ?>" class="">Barang</a></li>
                                </ul>
                            </li>
                            <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds"
                                class="nav-item pcoded-hasmenu">
                                <a href="javascript:" class="nav-link "><span class="pcoded-mtext">Kelola Barang</span></a>
                                <ul class="pcoded-submenu">
                                    <li class="nav-item <?= $uri == 'permintaan_barang_melting' ? 'active' : '' ?>"><a
                                            href="<?= base_url('permintaan_barang_melting') ?>" class="">Permintaan Barang
                                            Melting</a></li>
                                    <li class="nav-item  <?= $uri == 'barang_masuk' ? 'active' : '' ?>"><a
                                            href="<?= base_url('barang_masuk') ?>" class="">Barang Masuk</a></li>
                                    <li class="nav-item  <?= $uri == 'permintaan_barang_melting' ? 'active' : '' ?>"><a
                                            href="<?= base_url('permintaan_barang_melting') ?>" class="">Barang Keluar</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item  <?= $uri == 'PPB' ? 'active' : '' ?>"><a href="<?= base_url('Ppb/PPB') ?>"
                                    class="">PPB</a></li>
                        </ul>
                    </li>
                <?php } ?>
                <?php if ($level === "admin" || $level === "packing") { ?>
                    <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds"
                        class="nav-item pcoded-hasmenu">
                        <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-package"></i></span><span class="pcoded-mtext">Packing</span></a>
                        <ul class="pcoded-submenu">
                            <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds"
                                class="nav-item pcoded-hasmenu">
                                <a href="javascript:" class="nav-link "><span class="pcoded-mtext">Master Packing</span></a>
                                <ul class="pcoded-submenu">
                                    <li class="nav-item <?= $uri == 'barang' ? 'active' : '' ?>"><a
                                            href="<?= base_url('packing/packing_masuk') ?>" class="">Packing Masuk</a></li>
                                </ul>
                            </li>
                            <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds"
                                class="nav-item pcoded-hasmenu">
                                <a href="javascript:" class="nav-link "><span class="pcoded-mtext">Kelola Barang</span></a>
                                <ul class="pcoded-submenu">
                                    <li class="nav-item <?= $uri == 'permintaan_barang_melting' ? 'active' : '' ?>"><a
                                            href="<?= base_url('permintaan_barang_melting') ?>" class="">Permintaan Barang
                                            Melting</a></li>
                                    <li class="nav-item  <?= $uri == 'barang_masuk' ? 'active' : '' ?>"><a
                                            href="<?= base_url('barang_masuk') ?>" class="">Barang Masuk</a></li>
                                    <li class="nav-item  <?= $uri == 'permintaan_barang_melting' ? 'active' : '' ?>"><a
                                            href="<?= base_url('permintaan_barang_melting') ?>" class="">Barang Keluar</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item  <?= $uri == 'PPB' ? 'active' : '' ?>"><a href="<?= base_url('Ppb/PPB') ?>"
                                    class="">PPB</a></li>
                        </ul>
                    </li>
                <?php } ?>
                <?php if ($level === "admin" || $level === "qa") { ?>
                    <li data-username="basic components Button Alert Badges breadcrumb Paggination progres Tooltip popovers Carousel Cards Collapse tabs pills Modal Grid System Typoghrapy Extra Shdaows Embeds"
                        class="nav-item pcoded-hasmenu">
                        <a href="javascript:" class="nav-link"><span class="pcoded-micon"><i
                                    class="feather icon-package"></i></span><span class="pcoded-mnext">QA</span></a>
                        <ul class="pcoded-submenu">
                            <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds"
                                class="nav-item pcoded-hasmenu">
                                <a href="javascript:" class="nav-link "><span class="pcoded-mtext">DOC</span></a>
                                <ul class="pcoded-submenu">
                                    <li class="nav-item <?= $uri == 'melting' ? 'active' : '' ?>"><a
                                            href="<?= base_url('Qa/Doc/Doc_melting/Melting') ?>"
                                            class="nav-link">Melting</a></li>
                                    <li class="nav-item <?= $uri == 'forming' ? 'active' : '' ?>"><a
                                            href="<?= base_url('Qa/Doc/Doc_forming/Forming') ?>"
                                            class="nav-link">Forming</a></li>
                                    <li class="nav-item <?= $uri == 'sortir' ? 'active' : '' ?>"><a
                                            href="<?= base_url('Qa/Doc/Doc_sortir/Sortir') ?>" class="nav-link">Sortir</a>
                                    </li>
                                    <li class="nav-item <?= $uri == 'printing' ? 'active' : '' ?>"><a
                                            href="<?= base_url('Qa/Doc/Doc_printing/Printing') ?>"
                                            class="nav-link">Printing</a></li>
                                    <li class="nav-item <?= $uri == 'packing' ? 'active' : '' ?>"><a
                                            href="<?= base_url('Qa/Doc/Doc_packing/Packing') ?>"
                                            class="nav-link">Packing</a></li>
                                    <li class="nav-item <?= $uri == 'gudang_distribusi' ? 'active' : '' ?>"><a
                                            href="<?= base_url('Qa/Doc/Doc_gudang_distribusi/Gudang_distribusi') ?>"
                                            class="nav-link">Gudang Distribusi</a></li>
                                </ul>
                            </li>
                            <li class="nav-item <?= $uri == 'batch' ? 'active' : '' ?>"><a
                                    href="<?= base_url('qa/Batch') ?>" class="">Batch</a></li>
                            <li class="nav-item <?= $uri == 'pelulusan_produk' ? 'active' : '' ?>"><a
                                    href="<?= base_url('pelulusan_produk/Pelulusan_produk') ?>" class="">Pelulusan
                                    Produk</a></li>
                            <li class="nav-item <?= $uri == 'PPB' ? 'active' : '' ?>"><a href="<?= base_url('Ppb/PPB') ?>"
                                    class="">PPB</a></li>
                        </ul>
                    </li>
                <?php } ?>
                <?php if ($level === "admin") { ?>
                    <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds"
                        class="nav-item pcoded-hasmenu">
                        <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-briefcase"></i></span><span class="pcoded-mtext">Gudang
                                Distribusi</span></a>
                        <ul class="pcoded-submenu">
                            <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds"
                                class="nav-item pcoded-hasmenu">
                                <a href="javascript:" class="nav-link "><span class="pcoded-mtext">Master Melting</span></a>
                                <ul class="pcoded-submenu">
                                    <li class="nav-item <?= $uri == 'barang' ? 'active' : '' ?>"><a
                                            href="<?= base_url('Barang') ?>" class="">Barang</a></li>
                                </ul>
                            </li>
                            <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds"
                                class="nav-item pcoded-hasmenu">
                                <a href="javascript:" class="nav-link "><span class="pcoded-mtext">Kelola Barang</span></a>
                                <ul class="pcoded-submenu">
                                    <li class="nav-item <?= $uri == 'permintaan_barang_melting' ? 'active' : '' ?>"><a
                                            href="<?= base_url('permintaan_barang_melting') ?>" class="">Permintaan Barang
                                            Melting</a></li>
                                    <li class="nav-item  <?= $uri == 'barang_masuk' ? 'active' : '' ?>"><a
                                            href="<?= base_url('barang_masuk') ?>" class="">Barang Masuk</a></li>
                                    <li class="nav-item  <?= $uri == 'permintaan_barang_melting' ? 'active' : '' ?>"><a
                                            href="<?= base_url('permintaan_barang_melting') ?>" class="">Barang Keluar</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item  <?= $uri == 'PPB' ? 'active' : '' ?>"><a href="<?= base_url('Ppb/PPB') ?>"
                                    class="">PPB</a></li>
                        </ul>
                    </li>
                <?php } ?>
                <?php if ($level === "admin" || $level === "utility") { ?>
                    <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds"
                        class="nav-item pcoded-hasmenu">
                        <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-wind"></i></span><span class="pcoded-mtext">Utility</span></a>
                        <ul class="pcoded-submenu">
                            <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds"
                                class="nav-item pcoded-hasmenu">
                                <a href="javascript:" class="nav-link "><span class="pcoded-mtext">History Mesin</span></a>
                                <ul class="pcoded-submenu">
                                    <li class="nav-item <?= $uri == 'hm_utility' ? 'active' : '' ?>"><a
                                            href="<?= base_url('Utility/Ahu') ?>" class="">AHU</a></li>
                                    <li class="nav-item <?= $uri == 'boiler' ? 'active' : '' ?>"><a
                                            href="<?= base_url('Utility/Boiler') ?>" class="">BOILER</a></li>
                                    <li class="nav-item <?= $uri == 'chiller' ? 'active' : '' ?>"><a
                                            href="<?= base_url('Utility/Chiller') ?>" class="">CHILLER</a></li>
                                    <li class="nav-item <?= $uri == 'compressor' ? 'active' : '' ?>"><a
                                            href="<?= base_url('Utility/Compressor') ?>" class="">COMPRESSOR</a></li>
                                    <li class="nav-item <?= $uri == 'cwp_hwp' ? 'active' : '' ?>"><a
                                            href="<?= base_url('Utility/Cwp_hwp') ?>" class="">CWP & HWP</a></li>
                                    <li class="nav-item <?= $uri == 'feeding_tank' ? 'active' : '' ?>"><a
                                            href="<?= base_url('Utility/Feeding_tank') ?>" class="">FEEDING TANK</a></li>
                                    <li class="nav-item <?= $uri == 'genset' ? 'active' : '' ?>"><a
                                            href="<?= base_url('Utility/Genset') ?>" class="">GENSET</a></li>
                                    <li class="nav-item <?= $uri == 'holding_tank' ? 'active' : '' ?>"><a
                                            href="<?= base_url('Utility/Holding_tank') ?>" class="">HOLDING TANK</a></li>
                                    <li class="nav-item <?= $uri == 'panel_listrik' ? 'active' : '' ?>"><a
                                            href="<?= base_url('Utility/Panel_listrik') ?>" class="">PANEL LISTRIK</a></li>
                                    <li class="nav-item <?= $uri == 'panel_listrik_hcm' ? 'active' : '' ?>"><a
                                            href="<?= base_url('Utility/Panel_listrik_hcm') ?>" class="">PANEL LISTRIK
                                            HCM</a></li>
                                    <li class="nav-item <?= $uri == 'pompa_sumur' ? 'active' : '' ?>"><a
                                            href="<?= base_url('Utility/Pompa_sumur') ?>" class="">POMPA SUMUR</a></li>
                                    <li class="nav-item <?= $uri == 'vacuum' ? 'active' : '' ?>"><a
                                            href="<?= base_url('Utility/Vacuum') ?>" class="">VACUUM</a></li>
                                    <li class="nav-item <?= $uri == 'water_treatment' ? 'active' : '' ?>"><a
                                            href="<?= base_url('Utility/Water_treatment') ?>" class="">WATER TREATMENT</a>
                                    </li>
                                </ul>
                            <li class="nav-item <?= $uri == 'PPB' ? 'active' : '' ?>"><a href="<?= base_url('Ppb/PPB') ?>"
                                    class="">PPB</a></li>
                    </li>
                </ul>
                </li>
                <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadowa Embeds"
                    class="nav-item pcoded-hasmenu">
                    <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i
                                class="feather icon-users"></i></span><span class="pcoded-mtext">Personalia</span></a>
                    <ul class="pcoded-submenu">
                        <li class="nav-item <?= $uri == 'absensi' ? 'active' : '' ?>"><a
                                href="<?= base_url('Personalia/Absensi') ?>" class="">Absensi</a></li>
                        <li class="nav-item <?= $uri == 'PPB' ? 'active' : '' ?>"><a href="<?= base_url('Ppb/PPB') ?>"
                                class="">PPB</a></li>
                    </ul>
                </li>
            <?php } ?>
            <?php if ($level === "admin" || $level === "stockkeeper") { ?>
                <li data-username="basic components Button Alert Badges breadcrumb Paggination progres Tooltip popovers Carousel Cards Collapse tabs pills Modal Grid System Typoghrapy Extra Shdaows Embeds"
                    class="nav-item pcoded-hasmenu">
                    <a href="javascript:" class="nav-link"><span class="pcoded-micon"><i
                                class="feather icon-package"></i></span><span class="pcoded-mnext">Stock Keeper</span></a>
                    <ul class="pcoded-submenu">
                        <li class="nav-item <?= $uri == 'forming' ? 'active' : '' ?>"><a
                                href="<?= base_url('Stock_keeper/Sk_dpb') ?>" class="nav-link">DPB</a></li>
                        <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds"
                            class="nav-item pcoded-hasmenu">
                            <a href="javascript:" class="nav-link "><span class="pcoded-mtext">Kelola Barang</span></a>
                            <ul class="pcoded-submenu">
                                <!-- <li class="nav-item <?= $uri == 'melting' ? 'active' : '' ?>"><a href="<?= base_url('Stock_keeper/Sk_master_barang') ?>" class="nav-link">Master Barang</a></li>
                                    <li class="nav-item <?= $uri == 'forming' ? 'active' : '' ?>"><a href="<?= base_url('Stock_keeper/Sk_barang_stock') ?>" class="nav-link">Barang Stock</a></li>
                                    <li class="nav-item <?= $uri == 'sortir' ? 'active' : '' ?>"><a href="<?= base_url('Stock_keeper/Sk_barang_masuk') ?>" class="nav-link">Barang Masuk</a></li>
                                    <li class="nav-item <?= $uri == 'sortir' ? 'active' : '' ?>"><a href="<?= base_url('Stock_keeper/Sk_barang_keluar') ?>" class="nav-link">Barang Keluar</a></li> -->
                            </ul>
                        </li>
                    </ul>
                    <ul class="pcoded-submenu">
                        <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds"
                            class="nav-item pcoded-hasmenu">
                            <a href="javascript:" class="nav-link "><span class="pcoded-mtext">Laporan</span></a>
                            <ul class="pcoded-submenu">
                                <li class="nav-item <?= $uri == 'Laporan_barang_masuk' ? 'active' : '' ?>">
                                    <a href="<?= base_url('Stock_keeper/Sk_laporan_barang_masuk') ?>"
                                        class="nav-link">Laporan Barang Masuk</a>
                                </li>
                                <li class="nav-item <?= $uri == 'Laporan_barang_keluar' ? 'active' : '' ?>">
                                    <a href="<?= base_url('Stock_keeper/Laporan_barang_keluar') ?>" class="nav-link">Laporan
                                        Barang Keluar</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <?php
                    $uri = $this->uri->segment(2); // Ambil segmen kedua dari URL
                    ?>

                </li>
            <?php } ?>

            <?php if ($level === "admin") { ?>
                <li class="nav-item pcoded-menu-caption">
                    <label>Users</label>
                </li>
                <li class="nav-item  <?= $uri == 'users' ? 'active' : '' ?>">
                    <a href="<?= base_url('users/users') ?>" class="nav-link "><span class="pcoded-micon"><i
                                class="feather icon-user"></i></span><span class="pcoded-mtext">Kelola User</span></a>
                </li>
            <?php } ?>
            <!-- <li class="nav-item pcoded-menu-caption">
                    <label>Forms & table</label>
                </li>
                <li data-username="form elements advance componant validation masking wizard picker select" class="nav-item">
                    <a href="form_elements.html" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Form elements</span></a>
                </li>
                <li data-username="Table bootstrap datatable footable" class="nav-item">
                    <a href="tbl_bootstrap.html" class="nav-link "><span class="pcoded-micon"><i class="feather icon-server"></i></span><span class="pcoded-mtext">Table</span></a>
                </li>
                <li class="nav-item pcoded-menu-caption">
                    <label>Chart & Maps</label>
                </li>
                <li data-username="Charts Morris" class="nav-item"><a href="chart-morris.html" class="nav-link "><span class="pcoded-micon"><i class="feather icon-pie-chart"></i></span><span class="pcoded-mtext">Chart</span></a></li>
                <li data-username="Maps Google" class="nav-item"><a href="map-google.html" class="nav-link "><span class="pcoded-micon"><i class="feather icon-map"></i></span><span class="pcoded-mtext">Maps</span></a></li>
                <li class="nav-item pcoded-menu-caption">
                    <label>Pages</label>
                </li>
                <li data-username="Authentication Sign up Sign in reset password Change password Personal information profile settings map form subscribe" class="nav-item pcoded-hasmenu">
                    <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather icon-lock"></i></span><span class="pcoded-mtext">Authentication</span></a>
                    <ul class="pcoded-submenu">
                        <li class=""><a href="auth-signup.html" class="" target="_blank">Sign up</a></li>
                        <li class=""><a href="auth-signin.html" class="" target="_blank">Sign in</a></li>
                    </ul>
                </li>
                <li data-username="Sample Page" class="nav-item"><a href="sample-page.html" class="nav-link"><span class="pcoded-micon"><i class="feather icon-sidebar"></i></span><span class="pcoded-mtext">Sample page</span></a></li>
                <li data-username="Disabled Menu" class="nav-item disabled"><a href="javascript:" class="nav-link"><span class="pcoded-micon"><i class="feather icon-power"></i></span><span class="pcoded-mtext">Disabled menu</span></a></li> -->
            </ul>
        </div>
    </div>
</nav>
<!-- [ navigation menu ] end -->