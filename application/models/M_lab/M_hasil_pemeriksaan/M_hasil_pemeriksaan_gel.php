<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_hasil_pemeriksaan_gel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function id_user()
    {
        return $this->session->userdata("id_user");
    }
    public function get($id = null)
    {
        // $kode_user = $this->kode_user();
        $sql = "
            SELECT a.*,b.id_prc_master_barang,b.status_barang,b.id_user AS op_gudang,b.no_batch,b.jml_bm,c.no_sjl, c.tgl_dpb,d.nama_barang,d.jenis_barang FROM tb_lab_hasil_ujigel a
            LEFT JOIN tb_adm_barang_masuk b ON a.id_adm_bm = b.id_adm_bm
            LEFT JOIN tb_prc_dpb_tf c ON b.no_dpb = c.no_dpb
            LEFT JOIN tb_prc_master_barang d ON a.id_prc_master_barang = d.id_prc_master_barang
            
            WHERE a.is_deleted = 0 ORDER BY a.tgl_uji ASC";
        return $this->db->query($sql);
    }

    public function add_ujigel($data)
    {
        $id_user = $this->id_user();
        $sql = "
        INSERT INTO `tb_lab_hasil_ujigel`(`id_adm_bm`,`id_prc_master_barang`,`tgl_uji`,`no_analis`,`penguji`,`pemerian`,`kelarutan`, `identifikasi`, `bauzat_tl_air`, `trans_larutan`, `s_pengeringan`, `bloom_st`, `viscost`, `viscost_bd`, `ph`, `t_isl`, `sett_point`, `keasaman`,`sulfur_do`, `sisa_pmj`, `uk_part_mesh4`, `uk_part_mesh40`, `kndtv`, `arsen`, `timbal`, `peroksida`, `besi`, `cromium`, `zinc`, `cm_dna_babi`, `m_tb`, `m_akk`, `m_ec`, `m_salmon`, `wd_py`) 
        VALUES ('$data[id_adm_bm]','$data[id_prc_master_barang]','$data[tgl_uji]','$data[no_analis]','$data[nama_operator]','$data[pemerian]','$data[kelarutan]','$data[identifikasi]','$data[bauzat_tl_air]','$data[trans_larutan]','$data[s_pengeringan]','$data[bloom_st]','$data[viscost]','$data[viscost_bd]','$data[ph]','$data[t_isl]','$data[sett_point]','$data[keasaman]','$data[sulfur_do]','$data[sisa_pmj]','$data[uk_part_mesh4]','$data[uk_part_mesh40]','$data[kndtv]','$data[arsen]','$data[timbal]','$data[peroksida]','$data[besi]', '$data[cromium]', '$data[zinc]','$data[cm_dna_babi]','$data[m_tb]','$data[m_akk]','$data[m_ec]','$data[m_salmon]','$data[wd_py]')
        ";
        return $this->db->query($sql);
    }

    public function update($data)
    {
        $id_user = $this->id_user();
        $sql = "
        UPDATE `tb_lab_hasil_ujigel`
        SET
        `tgl_uji` = '$data[tgl_uji]',
        `no_analis` = '$data[no_analis]',
        `pemerian` = '$data[pemerian]',
        `kelarutan` = '$data[kelarutan]',
        `identifikasi` = '$data[identifikasi]',
        `bauzat_tl_air` = '$data[bauzat_tl_air]',
        `trans_larutan` = '$data[trans_larutan]',
        `s_pengeringan` = '$data[s_pengeringan]',
        `bloom_st` = '$data[bloom_st]',
        `viscost` = '$data[viscost]',
        `viscost_bd` = '$data[viscost_bd]',
        `ph` = '$data[ph]',
        `t_isl` = '$data[t_isl]',
        `sett_point` = '$data[sett_point]',
        `keasaman` = '$data[keasaman]',
        `sulfur_do` = '$data[sulfur_do]',
        `sisa_pmj` = '$data[sisa_pmj]',
        `uk_part_mesh4` = '$data[uk_part_mesh4]',
        `uk_part_mesh40` = '$data[uk_part_mesh40]',
        `kndtv` = '$data[kndtv]',
        `arsen` = '$data[arsen]',
        `timbal` = '$data[timbal]',
        `peroksida` = '$data[peroksida]',
        `besi` = '$data[besi]',
        `cromium` = '$data[cromium]',
        `zinc` = '$data[zinc]',
        `cm_dna_babi` = '$data[cm_dna_babi]',
        `m_tb` = '$data[m_tb]',
        `m_akk` = '$data[m_akk]',
        `m_ec` = '$data[m_ec]',
        `m_salmon` = '$data[m_salmon]',
        `wd_py` = '$data[wd_py]'
         WHERE `id_ujigel` = '$data[id_ujigel]'
        ";
        return $this->db->query($sql);
    }

    public function approval_rilis($data)
    {
        $sql = "
        UPDATE `tb_lab_hasil_ujigel`
        SET `tgl_rilis`='$data[tgl_rilis]',`tgl_uu`='$data[tgl_uu]'
        WHERE `id_ujigel`='$data[id_ujigel]';
        ";
        return $this->db->query($sql);
    }

    public function approval_ditolak($data)
    {
        $id_user = $this->id_user();
        $sql = "
        UPDATE `tb_lab_hasil_ujigel`
        SET `tgl_reject`='$data[tgl_reject]'
        WHERE `id_ujigel`='$data[id_ujigel]';
        ";
        return $this->db->query($sql);
    }

    public function ambil_label($no_surat_jalan)
    {
        $sql = "
        SELECT a.*,b.id_adm_bm,b.no_batch,b.tgl,b.status,b.dok_pendukung,b.op_gudang,b.jenis_kemasan,b.jml_kemasan,b.jml_kemasan,b.qty,b.exp,b.mfg,b.tutup,b.wadah,b.label,c.nama_supplier,d.nama_barang,d.satuan,d.qty_pack FROM tb_lab_hasil_ujigel a
        LEFT JOIN tb_lab_pemeriksaan_bahan b ON a.id_prc_master_barang = b.id_prc_masster_barang
        LEFT JOIN tb_prc_supplier c ON a.id_supplier = c.id_supplier
        LEFT JOIN tb_prc_barang d ON a.id_barang = d.id_barang
        WHERE a.is_deleted = 0 AND b.no_surat_jalan = '$no_surat_jalan' ORDER BY a.tgl_uji ASC";
        return $this->db->query($sql);
    }

    public function ambil_hasil($no_surat_jalan)
    {
        $sql = "
        SELECT a.*,b.id_adm_bm,b.no_batch,b.tgl,b.status,b.dok_pendukung,b.op_gudang,b.jenis_kemasan,b.jml_kemasan,b.jml_kemasan,b.qty,b.exp,b.mfg,b.tutup,b.wadah,b.label,c.nama_supplier,d.nama_barang,d.satuan,d.nama_produsen,d.negara_produsen,d.jenis_gel FROM tb_lab_hasil_ujigel a
        LEFT JOIN tb_lab_pemeriksaan_bahan b ON a.id_barang = b.id_barang
        LEFT JOIN tb_prc_supplier c ON a.id_supplier = c.id_supplier
        LEFT JOIN tb_prc_barang d ON a.id_barang = d.id_barang
        WHERE a.is_deleted = 0 AND b.no_surat_jalan = '$no_surat_jalan' ORDER BY a.tgl_uji ASC";
        return $this->db->query($sql);
    }
}
