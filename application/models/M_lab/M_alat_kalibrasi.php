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
            SELECT 
    a.id_prc_master_barang, 
    a.nama_barang, 
    a.kode_barang,
    a.is_deleted,
    a.jenis_barang, 
    a.departement,
    b.id_lab_kalibrasi,
    b.no_sertif,
    b.status_sertif,
    b.tgl_kalibrasi,
    b.ed_kalibrasi
FROM tb_prc_master_barang a
LEFT JOIN tb_lab_alat_kalibrasi b 
    ON b.id_prc_master_barang = a.id_prc_master_barang
    AND b.tgl_kalibrasi = (
        SELECT MAX(t2.tgl_kalibrasi)
        FROM tb_lab_alat_kalibrasi t2
        WHERE t2.id_prc_master_barang = a.id_prc_master_barang
    )
WHERE 
    a.is_deleted = 0 
    AND a.jenis_barang = 'Alat Ukur'
    AND a.departement = 'Lab'
        ";

        return $this->db->query($sql);
    }

    public function get_alat()
    {
        $sql = "SELECT a.id_lab_kalibrasi, a.status_sertif, a.tgl_kalibrasi, a.id_prc_master_barang, b.nama_barang AS nama_alat FROM tb_lab_alat_kalibrasi a
        LEFT JOIN tb_prc_master_barang b ON a.id_prc_master_barang = b.id_prc_master_barang
        WHERE a.is_deleted = 0 AND a.status_sertif != 'EXPIRED' ORDER BY a.tgl_kalibrasi DESC";

        return $this->db->query($sql)->result_array();
    }

    public function checkExpired()
    {
        return $this->db->query("
        UPDATE tb_lab_alat_kalibrasi
        SET status_sertif = 'EXPIRED'
            WHERE ed_kalibrasi < CURDATE()
        ");
    }


    public function detail_with_id_barang($id_prc_master_barang)
    {
        $sql = "SELECT * FROM tb_lab_alat_kalibrasi WHERE is_deleted = 0 AND  id_prc_master_barang = '$id_prc_master_barang' ORDER BY tgl_kalibrasi DESC";
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
