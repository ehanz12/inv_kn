<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_kode_warna extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function id_user()
    {
        return $this->session->userdata("id_user");
    }
    
    public function getcap($id = null)
    {
        $sql = "
        SELECT * FROM tb_mkt_master_kw_cap 
        WHERE is_deleted = 0 ORDER BY created_at ASC";
        return $this->db->query($sql);
    }

    public function getbody($id = null)
    {
        $sql = "
        SELECT * FROM tb_mkt_master_kw_body 
        WHERE is_deleted = 0 ORDER BY created_at ASC";
        return $this->db->query($sql);
    }

    public function add_cap($data)
    {
        $id_user = $this->id_user();
        
        $insert_data = array(
            'id_master_kw_cap' => $data['id_master_kw_cap'],
            'kode_warna_cap' => $data['kode_warna'],
            'warna_cap' => $data['warna'],
            'short_name' => $data['short_name'],
            'f_ti02' => $data['ti02'],  
            'f_r1' => $data['r1'],    
            'f_r3' => $data['r3'],    
            'f_y5' => $data['y5'],    
            'f_b1' => $data['b1'],    
            'f_y10' => $data['y10'],   
            'f_sf' => $data['sf'],    
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => $id_user,
            'updated_at' => '0000-00-00 00:00:00',
            'updated_by' => '',
            'is_deleted' => '0'
        );
        
        return $this->db->insert('tb_mkt_master_kw_cap', $insert_data);
    }

    public function add_body($data)
    {
        $id_user = $this->id_user();
        
        $insert_data = array(
            'id_master_kw_body' => $data['id_master_kw_body'],
            'kode_warna_body' => $data['kode_warna'],
            'warna_body' => $data['warna'],
            'short_name' => $data['short_name'],
            'f_ti02' => $data['ti02'],  
            'f_r1' => $data['r1'],    
            'f_r3' => $data['r3'],    
            'f_y5' => $data['y5'],    
            'f_b1' => $data['b1'],    
            'f_y10' => $data['y10'],   
            'f_sf' => $data['sf'],    
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => $id_user,
            'updated_at' => '0000-00-00 00:00:00',
            'updated_by' => '',
            'is_deleted' => '0'
        );
        
        return $this->db->insert('tb_mkt_master_kw_body', $insert_data);
    }

    public function update_cap($data)
    {
        $id_user = $this->id_user();
        
        $update_data = array(
            'kode_warna_cap' => $data['kode_warna'],
            'warna_cap' => $data['warna'],
            'short_name' => $data['short_name'],
            'f_ti02' => $data['ti02'],  
            'f_r1' => $data['r1'],    
            'f_r3' => $data['r3'],    
            'f_y5' => $data['y5'],    
            'f_b1' => $data['b1'],    
            'f_y10' => $data['y10'],   
            'f_sf' => $data['sf'],    
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $id_user
        );
        
        $this->db->where('id_master_kw_cap', $data['id_master_kw_cap']);
        return $this->db->update('tb_mkt_master_kw_cap', $update_data);
    }

    public function update_body($data)
    {
        $id_user = $this->id_user();
        
        $update_data = array(
            'kode_warna_body' => $data['kode_warna'],
            'warna_body' => $data['warna'],
            'short_name' => $data['short_name'],
            'f_ti02' => $data['ti02'],  
            'f_r1' => $data['r1'],    
            'f_r3' => $data['r3'],    
            'f_y5' => $data['y5'],    
            'f_b1' => $data['b1'],    
            'f_y10' => $data['y10'],   
            'f_sf' => $data['sf'],    
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $id_user
        );
        
        $this->db->where('id_master_kw_body', $data['id_master_kw_body']);
        return $this->db->update('tb_mkt_master_kw_body', $update_data);
    }

    public function delete_cap($data)
    {
        $id_user = $this->id_user();
        $sql = "
            UPDATE `tb_mkt_master_kw_cap` 
            SET `is_deleted` = 1,
                `updated_at` = NOW(),
                `updated_by` = '$id_user'
            WHERE `id_master_kw_cap` = '$data[id_master_kw_cap]'
        ";
        return $this->db->query($sql);
    }

    public function delete_body($data)
    {
        $id_user = $this->id_user();
        $sql = "
            UPDATE `tb_mkt_master_kw_body` 
            SET `is_deleted` = 1,
                `updated_at` = NOW(),
                `updated_by` = '$id_user'
            WHERE `id_master_kw_body` = '$data[id_master_kw_body]'
        ";
        return $this->db->query($sql);
    }

    public function findcap($kode_warna)
    {
        $sql = "SELECT * FROM tb_mkt_master_kw_cap WHERE kode_warna_cap = '$kode_warna' AND is_deleted = 0";
        return $this->db->query($sql);
    }

    public function findbody($kode_warna)
    {
        $sql = "SELECT * FROM tb_mkt_master_kw_body WHERE kode_warna_body = '$kode_warna' AND is_deleted = 0";
        return $this->db->query($sql);
    }

    public function cek_kode_warna_cap($kode_warna, $id = null)
    {
        $sql = "SELECT COUNT(*) as count FROM tb_mkt_master_kw_cap 
                WHERE kode_warna_cap = '$kode_warna' AND is_deleted = 0";
        
        if ($id) {
            $sql .= " AND id_master_kw_cap != '$id'";
        }
        
        return $this->db->query($sql);
    }

    public function cek_kode_warna_body($kode_warna, $id = null)
    {
        $sql = "SELECT COUNT(*) as count FROM tb_mkt_master_kw_body 
                WHERE kode_warna_body = '$kode_warna' AND is_deleted = 0";
        
        if ($id) {
            $sql .= " AND id_master_kw_body != '$id'";
        }
        
        return $this->db->query($sql);
    }
}