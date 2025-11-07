<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_master_print extends CI_Model
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
        $sql = "
        SELECT a.*, b.nama_customer 
        FROM tb_mkt_master_print a
        LEFT JOIN tb_mkt_master_customer b ON a.id_master_customer = b.id_customer
        WHERE a.is_deleted = 0 
        ORDER BY a.created_at ASC";

        return $this->db->query($sql);
    }

    public function add($data)
    {
        $id_user = $this->id_user();
        $sql = "
        INSERT INTO `tb_mkt_master_print`(`kode_print`, `id_user`, `id_master_customer`, `logo_print`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) 
        VALUES ('$data[kode_print]',$data[id_user],'$data[id_master_customer]','$data[logo_print]',NOW(),'$id_user','0000-00-00 00:00:00','','0')
        ";

        return $this->db->query($sql);
    }

    public function update($data)
    {
        $id_user = $this->id_user();
        $sql = "
            UPDATE `tb_mkt_master_print` 
            SET `kode_print`='$data[kode_print]',
                `id_master_customer`='$data[id_master_customer]',
                `logo_print`='$data[logo_print]',
                `updated_at`=NOW(),
                `updated_by`='$id_user' 
            WHERE `id_master_print`='$data[id_master_print]'
        ";
        return $this->db->query($sql);
    }

    public function delete($data)
    {
        $id_user = $this->id_user();
        $sql = "
        DELETE FROM `tb_mkt_master_print`
        WHERE `id_master_print`='$data[id_master_print]'
        ";
        return $this->db->query($sql);
    }

    public function cek_kode_print($kode_print){
        $sql = "
            SELECT COUNT(a.kode_print) count_sj FROM tb_mkt_master_print a
            WHERE a.kode_print = '$kode_print' AND a.is_deleted = 0";
        return $this->db->query($sql);
    }
}