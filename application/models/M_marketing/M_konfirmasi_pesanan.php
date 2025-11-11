<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_konfirmasi_pesanan extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    // Get all data dengan join customer - DIPERBAIKI
    public function get_all($nama_customer = null, $date_from = null, $date_until = null) {
        $sql = "
            SELECT 
                a.*,
                b.id_master_print, 
                b.kode_print,
                b.logo_print,
                c.nama_customer,
                c.kode_customer,
                c.id_customer, 
                d.id_master_kw_cap, 
                d.kode_warna_cap,
                e.id_master_kw_body,
                e.kode_warna_body,
                f.id_master_stok_size,
                f.stok_master,
                f.stok_bulan,
                f.stok_tahun
            FROM tb_mkt_kp a
            LEFT JOIN tb_mkt_master_customer c ON a.id_customer = c.id_customer
            LEFT JOIN tb_mkt_master_print b ON a.id_master_print = b.id_master_print
            LEFT JOIN tb_mkt_master_kw_cap d ON a.id_master_kw_cap = d.id_master_kw_cap
            LEFT JOIN tb_mkt_master_kw_body e ON a.id_master_kw_body = e.id_master_kw_body
            LEFT JOIN tb_mkt_master_stok f ON a.id_master_stok_size = f.id_master_stok_size
            WHERE a.is_deleted = 0 
        ";
        
        // Apply filters
        if ($nama_customer && $nama_customer != '') {
            $sql .= " AND c.nama_customer = '" . $this->db->escape_str($nama_customer) . "'";
        }
        
        if ($date_from && $date_until && $date_from != '' && $date_until != '') {
            $tgl_mulai = date('Y-m-d', strtotime($date_from));
            $tgl_akhir = date('Y-m-d', strtotime($date_until));
            $sql .= " AND a.tgl_kp >= '" . $tgl_mulai . "' AND a.tgl_kp <= '" . $tgl_akhir . "'";
        }
        
        $sql .= " ORDER BY a.tgl_kp DESC";
        
        return $this->db->query($sql)->result_array();
    }

    // public function get_stok_by_id($id_master_stok_size) {
    //     $this->db->select('*');
    //     $this->db->from('tb_mkt_master_stok');
    //     $this->db->where('id_master_stok_size', $id_master_stok_size);
    //     $this->db->where('is_deleted', 0);
    //     return $this->db->get()->row_array();
    // }
    
    // Get customers untuk dropdown
    public function get_customers() {
        $this->db->select('id_customer, nama_customer, kode_customer');
        $this->db->from('tb_mkt_master_customer');
        $this->db->where('is_deleted', 0);
        $this->db->order_by('nama_customer', 'ASC');
        return $this->db->get()->result_array();
    }
    
    // Get by ID dengan join
    public function get_by_id($id) {
        $sql = "
            SELECT 
                a.*,
                b.id_master_print, 
                b.kode_print,
                b.logo_print,
                c.nama_customer,
                c.kode_customer,
                c.id_customer, 
                d.id_master_kw_cap, 
                d.kode_warna_cap,
                e.id_master_kw_body,
                e.kode_warna_body,
                f.id_master_stok_size,
                f.stok_master
            FROM tb_mkt_kp a
            LEFT JOIN tb_mkt_master_customer c ON a.id_customer = c.id_customer
            LEFT JOIN tb_mkt_master_print b ON a.id_master_print = b.id_master_print
            LEFT JOIN tb_mkt_master_kw_cap d ON a.id_master_kw_cap = d.id_master_kw_cap
            LEFT JOIN tb_mkt_master_kw_body e ON a.id_master_kw_body = e.id_master_kw_body
            LEFT JOIN tb_mkt_master_stok f ON a.id_master_stok_size = f.id_master_stok_size
            WHERE a.Id_mkt_kp = ? AND a.is_deleted = 0
        ";
        return $this->db->query($sql, [$id])->row_array();
    }
    
    // Insert data
    public function insert($data) {
        return $this->db->insert('tb_mkt_kp', $data);
    }
    
    // Update data
    public function update($id, $data) {
        $this->db->where('Id_mkt_kp', $id);
        return $this->db->update('tb_mkt_kp', $data);
    }
    
    // Delete data (soft delete)
    public function delete($id) {
        $this->db->where('Id_mkt_kp', $id);
        return $this->db->update('tb_mkt_kp', [
            'is_deleted' => 1,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $this->session->userdata('nama')
        ]);
    }
    
    // Cek No KP sudah ada
    public function cek_no_kp($no_kp) {
        $this->db->where('No_kp', $no_kp);
        $this->db->where('is_deleted', 0);
        $query = $this->db->get('tb_mkt_kp');
        return $query->num_rows() > 0;
    }
    
    // ========== FUNGSI STOK MANAGEMENT ==========
    
    // Update stok size (kurangi stok)
    public function update_stok_size($id_master_stok_size, $jumlah_kp) {
        $sql = "UPDATE tb_mkt_master_stok 
                SET stok_master = stok_master - ?,
                    updated_at = NOW(),
                    updated_by = ?
                WHERE id_master_stok_size = ?";
        
        return $this->db->query($sql, [
            $jumlah_kp,
            $this->session->userdata('id_user'),
            $id_master_stok_size
        ]);
    }
    
    // Get stok size by ID
    public function get_stok_size($id_master_stok_size) {
        $this->db->select('stok_master');
        $this->db->from('tb_mkt_master_stok');
        $this->db->where('id_master_stok_size', $id_master_stok_size);
        $this->db->where('is_deleted', 0);
        return $this->db->get()->row_array();
    }
    
    // Get all stok size untuk dropdown
    public function get_all_stok_size() {
        $this->db->select('id_master_stok_size, stok_bulan, stok_tahun, stok_master');
        $this->db->from('tb_mkt_master_stok');
        $this->db->where('is_deleted', 0);
        $this->db->where('stok_master >', 0);
        $this->db->order_by('stok_tahun DESC, stok_bulan DESC');
        return $this->db->get()->result_array();
    }
    
    // Kembalikan stok saat delete
    public function restore_stok($id_master_stok_size, $jumlah_kp) {
        $sql = "UPDATE tb_mkt_master_stok 
                SET stok_master = stok_master + ?,
                    updated_at = NOW(),
                    updated_by = ?
                WHERE id_master_stok_size = ?";
        
        return $this->db->query($sql, [
            $jumlah_kp,
            $this->session->userdata('id_user'),
            $id_master_stok_size
        ]);
    }
}
?>