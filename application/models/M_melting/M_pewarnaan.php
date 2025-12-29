<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pewarnaan extends CI_Model
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
        SELECT r.*, a.id_mkt_kp,a.no_batch,a.sisa, a.id_customer, a.id_master_kw_cap, a.id_master_kw_body, a.no_cr, a.jumlah_prd, a.size_machine, a.mesin_prd, a.is_deleted,
        b.jumlah_kp, c.nama_customer, d.kode_warna_cap, e.kode_warna_body, f.nama_operator FROM tb_mlt_pewarnaan r
        LEFT JOIN tb_mkt_schedule a ON r.id_mkt_schedule = a.id_mkt_schedule
        LEFT JOIN tb_mkt_kp b ON a.id_mkt_kp = b.id_mkt_kp
        LEFT JOIN tb_mkt_master_customer c ON a.id_customer = c.id_customer
        LEFT JOIN tb_mkt_master_kw_cap d ON a.id_master_kw_cap = d.id_master_kw_cap
        LEFT JOIN tb_mkt_master_kw_body e ON a.id_master_kw_body = e.id_master_kw_body
        LEFT JOIN tb_user f ON r.id_user = f.id_user
        WHERE r.is_deleted = 0";

        return $this->db->query($sql);
    }

    public function add($data)
    {
        return $this->db->insert('tb_mlt_pewarnaan', $data);
    }
    public function update($data)
    {
        $id_user = $this->id_user();

        $data['updated_at'] = date('Y-m-d H:i:s');
        $data['updated_by'] = $id_user;

        $this->db->where('id_pewarna', $data['id_pewarna']);
        unset($data['id_pewarna']);

        return $this->db->update('tb_mlt_pewarnaan', $data);
    }



    public function delete($id_pewarna)
    {
        $id_user = $this->id_user();
        //$sql = "
        //  UPDATE `tb_barang` 
        // SET `is_deleted`='1',`updated_at`=NOW(),`updated_by`='$id_user' 
        //WHERE `id_barang`='$data[id_barang]'
        //";
        $sql = "
        DELETE FROM `tb_mlt_pewarnaan`
         WHERE `id_pewarna`='$id_pewarna'
        ";
        return $this->db->query($sql);
    }

   public function generate_no_urut()
{
    date_default_timezone_set('Asia/Jakarta');

    $tahun = date('Y'); // 2025
    $bulan = date('m'); // 12

    $prefix = "MW";

    // Ambil nomor terakhir di bulan & tahun yang sama
    $sql = "
        SELECT 
            MAX(CAST(SUBSTRING_INDEX(no_urut, '/', -1) AS UNSIGNED)) AS last_no
        FROM tb_mlt_pewarnaan
        WHERE no_urut LIKE ?
    ";

    $like = $prefix . '-' .   $tahun . '/' . $bulan . '/%';

    $row = $this->db->query($sql, [$like])->row();

    // Jika belum ada → mulai dari 1
    $next_no = ($row && $row->last_no) ? $row->last_no + 1 : 1;

    // Format: 2025/12/001
    $no_urut = sprintf('%s-%s/%s/%03d', $prefix,$tahun, $bulan, $next_no);

    return $no_urut;
}
}
