<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_masak_gelatin extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function id_user()
    {
        return $this->session->userdata("id_user");
    }

    public function get()
    {
        $sql = "SELECT a.* FROM tb_mlt_masak_gelatin_tf a
        WHERE a.is_deleted = 0 ORDER BY a.tgl_masak DESC";
        return $this->db->query($sql);
    }

    public function get_by_batch($batch_masak)
    {
        $this->db->select('id_ts_melt');
        $this->db->where('batch_masak', $batch_masak);
        return $this->db->get('tb_mlt_masak_gelatin')->result_array();
    }

    public function get_detail_gel($batch_masak)
    {
        $sql = "
        SELECT a.*,c.nama_barang,c.jenis_barang,c.bloom FROM tb_mlt_masak_gelatin a
        LEFT JOIN tb_mlt_melting_masuk b ON a.id_mm = b.id_mm
        LEFT JOIN tb_prc_master_barang c ON b.id_prc_master_barang = c.id_prc_master_barang
        WHERE a.batch_masak = '$batch_masak' AND c.jenis_barang = 'Bahan Baku' ORDER BY a.id_masak_gel ASC";

        return $this->db->query($sql);
    }

    public function get_detail_bt($batch_masak)
    {
        $sql = "
        SELECT a.*,c.nama_barang,c.jenis_barang FROM tb_mlt_masak_gelatin a
        LEFT JOIN tb_mlt_melting_masuk b ON a.id_mm = b.id_mm
        LEFT JOIN tb_prc_master_barang c ON b.id_prc_master_barang = c.id_prc_master_barang
        WHERE a.batch_masak = '$batch_masak' AND c.jenis_barang = 'Bahan Tambahan' ORDER BY a.id_masak_gel ASC";

        return $this->db->query($sql);
    }

    public function add_tf($data)
    {
        $id_user = $this->id_user();
        $sql = "
        INSERT INTO `tb_mlt_masak_gelatin_tf`( `tgl_masak`, `shift`, `batch_masak`,`jml_air`,`temp_pel`,`jam_gel`,`jam_bt`,`mixing1`,`mixing2`,`vac1`,`vac2`,`scala_vac`,`visco_cps`,`visco_c`,`suhu_ruang`,`kel_ruang`,`keb_melter`,`label_bersih`,`op1`,`op2`,`supervisor`,`created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) 
        VALUES ('$data[tgl_masak]','$data[shift]','$data[batch_masak]','$data[jml_air]','$data[temp_pel]','$data[jam_gel]','$data[jam_bt]','$data[mixing1]','$data[mixing2]','$data[vac1]','$data[vac2]','$data[scala_vac]','$data[visco_cps]','$data[visco_c]','$data[suhu_ruang]','$data[kel_ruang]','$data[keb_melter]','$data[label_bersih]','$data[op1]','$data[op2]','$data[supervisor]',NOW(),'$id_user','0000-00-00 00:00:00','','0')
        ";

        return $this->db->query($sql);
    }

    public function add($data) {
        $sql = "INSERT INTO `tb_mlt_masak_gelatin`( `batch_masak`, `id_mm`, `id_prc_master_barang`, `jml_bahan`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) 
        VALUES ('$data[batch_masak]','$data[id_mm]','$data[id_prc_master_barang]','$data[jml_bahan]',NOW(),'".$this->id_user()."','0000-00-00 00:00:00','','0')";
        return $this->db->query($sql);
    }

    public function update($data)
    {
        $id_user = $this->id_user();
        $sql = "
            UPDATE `tb_mlt_masak_gelatin` 
            SET `tgl_masak`='$data[tgl_masak]',
                `shift`='$data[shift]',
                `batch_masak`='$data[batch_masak]',
                `jml_air`='$data[jml_air]',
                `temp_pel`='$data[temp_pel]',
                `jam_gel`='$data[jam_gel]',
                `jam_bt`='$data[jam_bt]',
                `mixing1`='$data[mixing1]',
                `mixing2`='$data[mixing2]',
                `vac1`='$data[vac1]',
                `vac2`='$data[vac2]',
                `scala_vac`='$data[scala_vac]',
                `visco_cps`='$data[visco_cps]',
                `visco_c`='$data[visco_c]',
                `suhu_ruang`='$data[suhu_ruang]',
                `kel_ruang`='$data[kel_ruang]',
                `keb_melter`='$data[keb_melter]',
                `label_bersih`='$data[label_bersih]',
                `op1`='$data[op1]',
                `op2`='$data[op2]',
                `supervisor`='$data[supervisor]',
                `updated_at`= NOW(),`updated_by`='$id_user' 
                 WHERE `id_masak_gel`='$data[id_masak_gel]'
        ";
        return $this->db->query($sql);
    }


    public function delete_tf($batch_masak)
    {
        $id_user = $this->id_user();
        $sql = "
        DELETE FROM `tb_mlt_masak_gelatin_tf`
         WHERE `batch_masak`='$batch_masak'
        ";
        return $this->db->query($sql);
    }

    public function delete($batch_masak)
    {
        $id_user = $this->id_user();
        $sql = "
        DELETE FROM `tb_mlt_masak_gelatin`
         WHERE `batch_masak`='$batch_masak'
        ";
        return $this->db->query($sql);
    }
}
