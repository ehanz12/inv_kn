<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_konfirmasi_pesanan extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }

    function id_user()
    {
        return $this->session->userdata("id_user");
    }
    
    // Get all data dengan join customer
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
            d.warna_cap,
            e.id_master_kw_body,
            e.kode_warna_body,
            e.warna_body,
            COALESCE(SUM(p.jumlah_prd), 0) as jumlah_prd
        FROM tb_mkt_kp a
        LEFT JOIN tb_mkt_master_customer c ON a.id_customer = c.id_customer
        LEFT JOIN tb_mkt_master_print b ON a.id_master_print = b.id_master_print
        LEFT JOIN tb_mkt_master_kw_cap d ON a.id_master_kw_cap = d.id_master_kw_cap
        LEFT JOIN tb_mkt_master_kw_body e ON a.id_master_kw_body = e.id_master_kw_body
        LEFT JOIN tb_mkt_schedule p ON a.id_mkt_kp = p.id_mkt_kp AND p.is_deleted = 0
        WHERE a.is_deleted = 0
    ";

    // Filter customer
    if ($nama_customer && $nama_customer != '') {
        $sql .= " AND c.nama_customer = '" . $this->db->escape_str($nama_customer) . "'";
    }

    // Filter tanggal (konversi format)
    if ($date_from && $date_until && $date_from != '' && $date_until != '') {
        $tgl_mulai = $this->convertFilterDate($date_from);
        $tgl_akhir = $this->convertFilterDate($date_until);
        $sql .= " AND a.tgl_kp BETWEEN '$tgl_mulai' AND '$tgl_akhir'";
    }

    $sql .= " GROUP BY a.id_mkt_kp";
    $sql .= " ORDER BY a.tgl_kp DESC";

    return $this->db->query($sql)->result_array();
}

    /**
     * Convert filter date from dd/mm/yyyy to Y-m-d
     */
    private function convertFilterDate($date) {
        $parts = explode('/', $date);
        if (count($parts) === 3) {
            return $parts[2] . '-' . $parts[1] . '-' . $parts[0];
        }
        return $date; // fallback
    }
    
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
                d.warna_cap,
                e.id_master_kw_body,
                e.kode_warna_body,
                e.warna_body
            FROM tb_mkt_kp a
            LEFT JOIN tb_mkt_master_customer c ON a.id_customer = c.id_customer
            LEFT JOIN tb_mkt_master_print b ON a.id_master_print = b.id_master_print
            LEFT JOIN tb_mkt_master_kw_cap d ON a.id_master_kw_cap = d.id_master_kw_cap
            LEFT JOIN tb_mkt_master_kw_body e ON a.id_master_kw_body = e.id_master_kw_body
            WHERE a.Id_mkt_kp = ? AND a.is_deleted = 0
        ";
        return $this->db->query($sql, [$id])->row_array();
    }
    
    // Insert data
    public function insert($data) {
        $id_user = $this->id_user();
        return $this->db->insert('tb_mkt_kp', $data);
    }
    
    // PERBAIKAN: Update data yang benar
    public function update($id, $data) {
    // Validasi ID di model juga
    if (empty($id) || $id === "" || $id === "0") {
        return false;
    }
    
    $id_user = $this->id_user();
    
    // Gunakan query builder CI untuk menghindari error
    $this->db->where('id_mkt_kp', $id);
    $this->db->where('is_deleted', 0);
    
    $update_data = array(
        'no_kp' => $data['no_kp'],
        'tgl_kp' => $data['tgl_kp'],
        'id_customer' => $data['id_customer'],
        'spek_kapsul' => $data['spek_kapsul'],
        'size_machine' => $data['size_machine'],
        'id_user' => $data['id_user'],
        'id_master_print' => $data['id_master_print'],
        'kode_print' => $data['kode_print'],
        'logo_print' => $data['logo_print'],
        'id_master_kw_cap' => $data['id_master_kw_cap'],
        'kode_warna_cap' => $data['kode_warna_cap'],
        'id_master_kw_body' => $data['id_master_kw_body'],
        'kode_warna_body' => $data['kode_warna_body'],
        'jumlah_kp' => $data['jumlah_kp'],
        'harga_kp' => $data['harga_kp'],
        'no_po' => $data['no_po'],
        'tgl_po' => $data['tgl_po'],
        'jenis_pack' => $data['jenis_pack'],
        'tgl_kirim' => $data['tgl_kirim'],
        'ket_kp' => $data['ket_kp'],
        'updated_by' => $id_user,
        'updated_at' => date('Y-m-d H:i:s')
    );
    
    $result = $this->db->update('tb_mkt_kp', $update_data);
    
    // Debug query
    if (!$result) {
        echo "Error: " . $this->db->error()['message'];
    }
    
    return $result;
} //hanya tanggal kirim
    public function update_tanggal_kirim($id, $data) {
        $this->db->where('id_mkt_kp', $id);
        $this->db->where('is_deleted', 0);
        
        $update_data = array(
            'tgl_kirim' => $data['tgl_kirim'],
            'updated_by' => $data['updated_by'],
            'updated_at' => date('Y-m-d H:i:s')
        );
        
        return $this->db->update('tb_mkt_kp', $update_data);
    }
    
    // Delete data
    public function delete($data) {
        $id_user = $this->id_user();
        $sql = "
        DELETE FROM `tb_mkt_kp`
        WHERE `id_mkt_kp` = ?
        ";
        return $this->db->query($sql, [$data['id_mkt_kp']]);
    }
    
    // Cek No KP sudah ada
    public function cek_no_kp($no_kp) {
        $this->db->where('no_kp', $no_kp);
        $this->db->where('is_deleted', 0);
        $query = $this->db->get('tb_mkt_kp');
        return $query->num_rows() > 0;
    }
    
    // Get prints by customer
    public function get_prints_by_customer($id_customer) {
        $this->db->select('id_master_print, kode_print, logo_print');
        $this->db->from('tb_mkt_master_print');
        $this->db->where('id_customer', $id_customer);
        $this->db->where('is_deleted', 0);
        $this->db->order_by('kode_print', 'ASC');
        return $this->db->get()->result_array();
    }
    
    // Get warna cap untuk dropdown
    public function get_warna_cap() {
        $this->db->select('id_master_kw_cap, kode_warna_cap, warna_cap');
        $this->db->from('tb_mkt_master_kw_cap');
        $this->db->where('is_deleted', 0);
        $this->db->order_by('kode_warna_cap', 'ASC');
        return $this->db->get()->result_array();
    }
    
    // Get warna body untuk dropdown
    public function get_warna_body() {
        $this->db->select('id_master_kw_body, kode_warna_body, warna_body');
        $this->db->from('tb_mkt_master_kw_body');
        $this->db->where('is_deleted', 0);
        $this->db->order_by('kode_warna_body', 'ASC');
        return $this->db->get()->result_array();
    }
}
?>