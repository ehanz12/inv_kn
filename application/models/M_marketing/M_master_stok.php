<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_master_stok extends CI_Model
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
        $sql = "SELECT * FROM tb_mkt_master_stok WHERE is_deleted = 0 ORDER BY tahun_stok DESC, stok_bulan DESC";
        return $this->db->query($sql);
    }

    public function add($data)
{
    // Validasi data
    if(empty($data['tahun_stok']) || $data['tahun_stok'] == 0) {
        // Set default tahun jika kosong
        $data['tahun_stok'] = date('Y');
    }
    
    $id_user = $this->id_user();
    $current_time = date('Y-m-d H:i:s');
    
    $sql = "
    INSERT INTO `tb_mkt_master_stok`(`stok_bulan`, `id_user`, `tahun_stok`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) 
    VALUES ('".$this->db->escape_str($data['stok_bulan'])."', 
            '".$this->db->escape_str($data['id_user'])."', 
            '".$this->db->escape_str($data['tahun_stok'])."', 
            '".$current_time."', 
            '".$id_user."', 
            0, 
            '', 
            '0')
    ";
    
    return $this->db->query($sql);
}

    public function update($data)
    {
        $id_user = $this->id_user();
        $sql = "
            UPDATE `tb_mkt_master_stok` 
            SET `stok_bulan` = '$data[stok_bulan]',
                `tahun_stok` = '$data[tahun_stok]',
                `updated_at` = NOW(),
                `updated_by` = '$id_user' 
            WHERE `id_master_stok_size` = '$data[id_master_stok_size]'
        ";
        return $this->db->query($sql);
    }

    public function delete($data)
    {
        $sql = "
        DELETE FROM `tb_mkt_master_stok`
        WHERE `id_master_stok_size` = '$data[id_master_stok_size]'
        ";
        return $this->db->query($sql);
    }
}