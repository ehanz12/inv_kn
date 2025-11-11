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
        $sql = "SELECT * FROM tb_mkt_master_stok WHERE is_deleted = 0 ORDER BY stok_master DESC, stok_tahun DESC, stok_bulan DESC";
        return $this->db->query($sql);
    }

    public function add($data)
{
    // Validasi data
    if(empty($data['stok_tahun']) || $data['stok_tahun'] == 0) {
        // Set default tahun jika kosong
        $data['stok_tahun'] = date('Y');
    }
    
    $id_user = $this->id_user();
    $current_time = date('Y-m-d H:i:s');
    
    $sql = "
    INSERT INTO `tb_mkt_master_stok`(`stok_bulan`, `id_user`, `stok_tahun`, `size_machine` ,`stok_master` ,`created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) 
    VALUES ('".$this->db->escape_str($data['stok_bulan'])."',  
            '".$this->db->escape_str($data['id_user'])."', 
            '".$this->db->escape_str($data['stok_tahun'])."', 
            '".$this->db->escape_str($data['size_machine'])."',
            '".$this->db->escape_str($data['stok_master'])."',
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
                `stok_tahun` = '$data[stok_tahun]',
                `size_machine` = '$data[size_machine]',
                `stok_master` = '$data[stok_master]',
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