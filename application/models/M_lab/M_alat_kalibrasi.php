<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_alat_kalibrasi extends CI_Model
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
            SELECT a.id_prc_master_barang, a.nama_barang, a.kode_barang,a.is_deleted,a.jenis_barang, a.departement, b.id_lab_kalibrasi ,b.no_sertif, b.status_sertif, b.tgl_kalibrasi, b.ed_kalibrasi FROM tb_prc_master_barang a
            LEFT JOIN tb_lab_alat_kalibrasi b ON a.id_prc_master_barang = b.id_prc_master_barang
            WHERE a.is_deleted = 0 AND a.jenis_barang='Alat Ukur' AND a.departement='Lab' AND b.status_sertif IS NULL;
        ";

        return $this->db->query($sql);
    }

    public function detail_with_id_barang($id_prc_master_barang)
    {
        $sql = "SELECT * FROM tb_lab_alat_kalibrasi WHERE is_deleted = 0 AND  id_prc_master_barang = '$id_prc_master_barang'";
        return $this->db->query($sql)->result_array();
    }

    public function add($data)
    {
        $id_user = $this->id_user();
        $sql = "
        INSERT INTO `tb_lab_alat_kalibrasi`(`id_prc_master_barang`, `no_sertif`, `tgl_kalibrasi`,`ed_kalibrasi`, `id_user`,`created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) 
        VALUES ('$data[id_prc_master_barang]','$data[no_sertif]','$data[tgl_kalibrasi]','$data[ed_kalibrasi]','$id_user',NOW(),'$id_user','0000-00-00 00:00:00','','0')
        ";

        return $this->db->query($sql);
    }

    public function update($data)
    {
        $id_user = $this->id_user();
        $sql = "
            UPDATE `tb_lab_alat_kalibrasi` 
            SET `kode_alat`='$data[kode_alat]',
                `nama_alat`='$data[nama_alat]',
                `no_sertif`='$data[no_sertif]',
                `tgl_kalibrasi`='$data[tgl_kalibrasi]',
                `ed_kalibrasi`='$data[ed_kalibrasi]',
                `updated_at`= NOW(),`updated_by`='$id_user' 
            WHERE `id_kalibrasi`='$data[id_kalibrasi]'
        ";
        return $this->db->query($sql);
    }

    public function delete($data)
    {
        $id_user = $this->id_user();
        $sql = "
        DELETE FROM `tb_lab_alat_kalibrasi`
         WHERE `id_kalibrasi`='$data[id_kalibrasi]'
        ";
        return $this->db->query($sql);
    }
}
