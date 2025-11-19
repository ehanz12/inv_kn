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
               e.no_kp, e.tgl_kp, e.jenis_pack, e.kode_warna_cap, e.kode_warna_body, e.id_customer, e.id_master_print, e.spek_kapsul, e.jumlah_kp
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
                kp.size_machine AS size_kp,
                kp.jumlah_kp,
                cust.nama_customer,
                kw_cap.id_master_kw_cap,
                kw_cap.kode_warna_cap,
                kw_cap.short_name AS short_cap,
                kw_cap.warna_cap,
                kw_body.id_master_kw_body,
                kw_body.kode_warna_body,
                kw_body.short_name AS short_body
            FROM tb_mkt_kp kp
            LEFT JOIN tb_mkt_master_customer cust ON kp.id_customer = cust.id_customer
            LEFT JOIN tb_mkt_master_kw_cap kw_cap ON kp.id_master_kw_cap = kw_cap.id_master_kw_cap
            LEFT JOIN tb_mkt_master_kw_body kw_body ON kp.id_master_kw_body = kw_body.id_master_kw_body
            WHERE kp.id_mkt_kp = ? AND kp.is_deleted = 0
        ";

        return $this->db->query($sql, [$id_mkt_kp])->row_array();
    }

    // Fungsi untuk mendapatkan total jumlah_prd yang sudah dijadwalkan untuk suatu KP
    public function get_total_scheduled($id_mkt_kp)
    {
        $sql = "
            SELECT COALESCE(SUM(jumlah_prd), 0) as total_scheduled 
            FROM tb_mkt_schedule 
            WHERE id_mkt_kp = ? AND is_deleted = 0
        ";
        $result = $this->db->query($sql, [$id_mkt_kp])->row_array();
        return $result['total_scheduled'];
    }

    // Fungsi untuk mendapatkan sisa KP yang belum dijadwalkan
    public function get_remaining_kp($id_mkt_kp)
    {
        $sql = "
            SELECT 
                kp.jumlah_kp,
                COALESCE(SUM(sch.jumlah_prd), 0) as total_scheduled,
                (kp.jumlah_kp - COALESCE(SUM(sch.jumlah_prd), 0)) as sisa_kp
            FROM tb_mkt_kp kp
            LEFT JOIN tb_mkt_schedule sch ON kp.id_mkt_kp = sch.id_mkt_kp AND sch.is_deleted = 0
            WHERE kp.id_mkt_kp = ? AND kp.is_deleted = 0
            GROUP BY kp.id_mkt_kp
        ";
        return $this->db->query($sql, [$id_mkt_kp])->row_array();
    }

    public function add($data)
    {
        $id_user = $this->id_user();
        
        // Mulai transaction
        $this->db->trans_start();
        
        // 1. Validasi apakah jumlah_prd tidak melebihi sisa KP
        $remaining = $this->get_remaining_kp($data['id_mkt_kp']);
        $sisa_kp = $remaining['sisa_kp'];
        
        if ($data['jumlah_prd'] > $sisa_kp) {
            $this->db->trans_rollback();
            return [
                'success' => false,
                'message' => "Jumlah produksi (" . number_format($data['jumlah_prd']) . 
                            ") melebihi sisa KP yang tersedia (" . number_format($sisa_kp) . ")"
            ];
        }
        
        // 2. Insert schedule (TANPA mengupdate jumlah_kp di master)
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
        
        $insert = $this->db->query($sql, $params);
        
        if (!$insert) {
            $this->db->trans_rollback();
            return [
                'success' => false,
                'message' => 'Gagal menambahkan schedule'
            ];
        }
        
        // DIHAPUS: Tidak perlu update jumlah_kp di tabel master
        // $update_kp_sql = "UPDATE tb_mkt_kp SET jumlah_kp = jumlah_kp - ? WHERE id_mkt_kp = ?";
        
        $this->db->trans_complete();
        
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return [
                'success' => false,
                'message' => 'Transaction failed'
            ];
        }
        
        return [
            'success' => true,
            'message' => 'Schedule berhasil ditambahkan'
        ];
    }

    public function update($data)
    {
        $id_user = $this->id_user();
        
        // Mulai transaction
        $this->db->trans_start();
        
        // 1. Dapatkan data schedule lama
        $old_schedule = $this->db->get_where('tb_mkt_schedule', ['id_mkt_schedule' => $data['id_mkt_schedule']])->row_array();
        
        if (!$old_schedule) {
            $this->db->trans_rollback();
            return [
                'success' => false,
                'message' => 'Data schedule tidak ditemukan'
            ];
        }
        
        // 2. Hitung selisih jumlah_prd
        $selisih_jumlah = $data['jumlah_prd'] - $old_schedule['jumlah_prd'];
        
        // 3. Validasi jika selisih positif (penambahan jumlah)
        if ($selisih_jumlah > 0) {
            $remaining = $this->get_remaining_kp($data['id_mkt_kp']);
            $sisa_kp = $remaining['sisa_kp'];
            
            if ($selisih_jumlah > $sisa_kp) {
                $this->db->trans_rollback();
                return [
                    'success' => false,
                    'message' => "Penambahan jumlah produksi (" . number_format($selisih_jumlah) . 
                                ") melebihi sisa KP yang tersedia (" . number_format($sisa_kp) . ")"
                ];
            }
        }
        
        // 4. Update schedule
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
        
        $update = $this->db->query($sql, $params);
        
        if (!$update) {
            $this->db->trans_rollback();
            return [
                'success' => false,
                'message' => 'Gagal mengupdate schedule'
            ];
        }
        
        // DIHAPUS: Tidak perlu update jumlah_kp di tabel master berdasarkan selisih
        // if ($selisih_jumlah != 0) {
        //     $update_kp_sql = "UPDATE tb_mkt_kp SET jumlah_kp = jumlah_kp - ? WHERE id_mkt_kp = ?";
        // }
        
        $this->db->trans_complete();
        
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return [
                'success' => false,
                'message' => 'Transaction failed'
            ];
        }
        
        return [
            'success' => true,
            'message' => 'Schedule berhasil diupdate'
        ];
    }

    public function delete($data)
    {
        $id_user = $this->id_user();
        
        // Mulai transaction
        $this->db->trans_start();
        
        // 1. Dapatkan data schedule yang akan dihapus
        $schedule = $this->db->get_where('tb_mkt_schedule', ['id_mkt_schedule' => $data['id_mkt_schedule']])->row_array();
        
        if (!$schedule) {
            $this->db->trans_rollback();
            return [
                'success' => false,
                'message' => 'Data schedule tidak ditemukan'
            ];
        }
        
        $sql = "
        UPDATE `tb_mkt_schedule` 
        SET `is_deleted` = 1, `updated_at` = NOW(), `updated_by` = ?
        WHERE `id_mkt_schedule` = ?";
        
        $delete = $this->db->query($sql, [$id_user, $data['id_mkt_schedule']]);
        
        if (!$delete) {
            $this->db->trans_rollback();
            return [
                'success' => false,
                'message' => 'Gagal menghapus schedule'
            ];
        }
        
        // DIHAPUS: Tidak perlu mengembalikan jumlah_kp di tabel master
        // $update_kp_sql = "UPDATE tb_mkt_kp SET jumlah_kp = jumlah_kp + ? WHERE id_mkt_kp = ?";
        
        $this->db->trans_complete();
        
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return [
                'success' => false,
                'message' => 'Transaction failed'
            ];
        }
        
        return [
            'success' => true,
            'message' => 'Schedule berhasil dihapus'
        ];
    }

    // Fungsi untuk mendapatkan data KP yang tersedia (masih ada sisa)
    public function get_available_kp()
    {
        $sql = "
            SELECT 
                kp.id_mkt_kp,
                kp.no_kp,
                kp.tgl_kp,
                kp.jumlah_kp,
                cust.nama_customer,
                COALESCE(SUM(sch.jumlah_prd), 0) as total_scheduled,
                (kp.jumlah_kp - COALESCE(SUM(sch.jumlah_prd), 0)) as sisa_kp
            FROM tb_mkt_kp kp
            LEFT JOIN tb_mkt_master_customer cust ON kp.id_customer = cust.id_customer
            LEFT JOIN tb_mkt_schedule sch ON kp.id_mkt_kp = sch.id_mkt_kp AND sch.is_deleted = 0
            WHERE kp.is_deleted = 0
            GROUP BY kp.id_mkt_kp, kp.no_kp, kp.tgl_kp, kp.jumlah_kp, cust.nama_customer
            HAVING sisa_kp > 0
            ORDER BY kp.tgl_kp DESC
        ";
        
        return $this->db->query($sql)->result_array();
    }

    // Fungsi untuk mendapatkan semua KP yang aktif
    public function get_active_kp()
    {
        $sql = "
            SELECT 
                kp.id_mkt_kp,
                kp.no_kp,
                kp.tgl_kp,
                kp.jumlah_kp,
                cust.nama_customer,
                COALESCE(SUM(sch.jumlah_prd), 0) as total_scheduled,
                (kp.jumlah_kp - COALESCE(SUM(sch.jumlah_prd), 0)) as sisa_kp
            FROM tb_mkt_kp kp
            LEFT JOIN tb_mkt_master_customer cust ON kp.id_customer = cust.id_customer
            LEFT JOIN tb_mkt_schedule sch ON kp.id_mkt_kp = sch.id_mkt_kp AND sch.is_deleted = 0
            WHERE kp.is_deleted = 0
            GROUP BY kp.id_mkt_kp, kp.no_kp, kp.tgl_kp, kp.jumlah_kp, cust.nama_customer
            HAVING sisa_kp > 0
            ORDER BY kp.tgl_kp DESC
        ";
        
        return $this->db->query($sql)->result_array();
    }

    // Fungsi untuk cek no_cr pada edit (exclude current schedule)
    public function cek_no_cr_edit($no_cr, $id_mkt_schedule)
    {
        $sql = "
            SELECT COUNT(a.no_cr) as count_cr 
            FROM tb_mkt_schedule a
            WHERE a.no_cr = ? AND a.id_mkt_schedule != ? AND a.is_deleted = 0";
        return $this->db->query($sql, [$no_cr, $id_mkt_schedule]);
    }
}