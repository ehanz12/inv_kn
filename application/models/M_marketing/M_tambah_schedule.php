<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_tambah_schedule extends CI_Model
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
        SELECT a.*, 
               b.kode_warna_cap, b.short_name AS short_cap,
               c.kode_warna_body, c.short_name AS short_body,
               d.nama_customer, d.kode_customer,
               e.no_kp, e.tgl_kp, e.jenis_pack, e.kode_warna_cap, e.kode_warna_body, e.id_customer, e.id_master_print, e.spek_kapsul
        FROM tb_mkt_schedule a
        LEFT JOIN tb_mkt_master_kw_cap b ON a.id_master_kw_cap = b.id_master_kw_cap
        LEFT JOIN tb_mkt_master_kw_body c ON a.id_master_kw_body = c.id_master_kw_body
        LEFT JOIN tb_mkt_master_customer d ON a.id_customer = d.id_customer
        LEFT JOIN tb_mkt_kp e ON a.id_mkt_kp = e.id_mkt_kp
        WHERE a.is_deleted = 0 
        ORDER BY a.created_at DESC";
        
        return $this->db->query($sql);
    }

    // Fungsi untuk mendapatkan data KP berdasarkan ID
    public function get_kp_by_id($id_mkt_kp)
    {
        $sql = "
            SELECT 
                kp.id_mkt_kp,
                kp.id_customer,
                kp.id_master_stok_size,
                kp.id_master_print,
                kp.kode_print,
                kp.logo_print,
                kp.spek_kapsul,
                cust.nama_customer,
                kw_cap.id_master_kw_cap,
                kw_cap.kode_warna_cap,
                kw_cap.short_name AS short_cap,
                kw_cap.warna_cap,
                kw_body.id_master_kw_body,
                kw_body.kode_warna_body,
                kw_body.short_name AS short_body,
                size.id_master_stok_size,
                size.size_machine AS size_kp
            FROM tb_mkt_kp kp
            LEFT JOIN tb_mkt_master_customer cust ON kp.id_customer = cust.id_customer
            LEFT JOIN tb_mkt_master_kw_cap kw_cap ON kp.id_master_kw_cap = kw_cap.id_master_kw_cap
            LEFT JOIN tb_mkt_master_kw_body kw_body ON kp.id_master_kw_body = kw_body.id_master_kw_body
            LEFT JOIN tb_mkt_master_stok size ON kp.id_master_stok_size = size.id_master_stok_size
            WHERE kp.id_mkt_kp = ? AND kp.is_deleted = 0
        ";

        return $this->db->query($sql, [$id_mkt_kp])->row_array();
    }

    public function add($data)
    {
        $id_user = $this->id_user();
        $sql = "
        INSERT INTO `tb_mkt_schedule`(
            `id_mkt_kp`, `id_customer`, `id_master_kw_cap`, `id_master_kw_body`, 
            `no_cr`, `no_batch`, `tgl_sch`, `size_machine`, `mesin_prd`, 
            `jumlah_prd`, `cek_print`, `print`, `tinta`, `jenis_grv`, 
            `jenis_box`, `jenis_zak`, `tgl_kirim`, `ket_prd`, `tgl_prd`, 
            `minyak`, `sisa`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`
        ) VALUES (
            ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), ?, '0000-00-00 00:00:00', '', 0
        )";
        
        $params = [
            $data['id_mkt_kp'] ?? null,
            $data['id_customer'],
            $data['id_master_kw_cap'],
            $data['id_master_kw_body'],
            $data['no_cr'],
            $data['no_batch'],
            $data['tgl_sch'],
            $data['size_machine'],
            $data['mesin_prd'],
            $data['jumlah_prd'],
            $data['cek_print'] ?? 0,
            $data['print'] ?? null,
            $data['tinta'] ?? null,
            $data['jenis_grv'] ?? null,
            $data['jenis_box'],
            $data['jenis_zak'],
            $data['tgl_kirim'],
            $data['ket_prd'],
            $data['tgl_prd'],
            $data['minyak'],
            $data['sisa'],
            $id_user
        ];
        
        return $this->db->query($sql, $params);
    }

    public function update($data)
    {
        $id_user = $this->id_user();
        $sql = "
            UPDATE `tb_mkt_schedule` 
            SET `id_mkt_kp` = ?,
                `id_customer` = ?,
                `id_master_kw_cap` = ?,
                `id_master_kw_body` = ?,
                `no_cr` = ?,
                `no_batch` = ?,
                `tgl_sch` = ?,
                `size_machine` = ?,
                `mesin_prd` = ?,
                `jumlah_prd` = ?,
                `sisa` = ?,
                `cek_print` = ?,
                `print` = ?,
                `tinta` = ?,
                `jenis_grv` = ?,
                `jenis_box` = ?,
                `jenis_zak` = ?,
                `tgl_kirim` = ?,
                `ket_prd` = ?,
                `tgl_prd` = ?,
                `minyak` = ?,
                `updated_at` = NOW(),
                `updated_by` = ?
            WHERE `id_mkt_schedule` = ?";
            
        $params = [
            $data['id_mkt_kp'] ?? null,
            $data['id_customer'],
            $data['id_master_kw_cap'],
            $data['id_master_kw_body'],
            $data['no_cr'],
            $data['no_batch'],
            $data['tgl_sch'],
            $data['size_machine'],
            $data['mesin_prd'],
            $data['jumlah_prd'],
            $data['sisa'],
            $data['cek_print'] ?? 0,
            $data['print'] ?? null,
            $data['tinta'] ?? null,
            $data['jenis_grv'] ?? null,
            $data['jenis_box'],
            $data['jenis_zak'],
            $data['tgl_kirim'],
            $data['ket_prd'],
            $data['tgl_prd'],
            $data['minyak'],
            $id_user,
            $data['id_mkt_schedule']
        ];
        
        return $this->db->query($sql, $params);
    }

    public function cek_no_cr($no_cr)
    {
        $sql = "
            SELECT COUNT(a.no_cr) as count_cr 
            FROM tb_mkt_schedule a
            WHERE a.no_cr = ? AND a.is_deleted = 0";
        return $this->db->query($sql, [$no_cr]);
    }

    public function delete($data)
    {
        $id_user = $this->id_user();
        $sql = "
        UPDATE `tb_mkt_schedule` 
        SET `is_deleted` = 1, `updated_at` = NOW(), `updated_by` = ?
        WHERE `id_mkt_schedule` = ?";
        
        return $this->db->query($sql, [$id_user, $data['id_mkt_schedule']]);
    }
}