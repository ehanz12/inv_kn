<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_adm_dpb extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function id_user()
    {
        return $this->session->userdata("id_user");
    }

    public function get()
    {
        $sql = "SELECT * FROM tb_adm_dpb WHERE is_deleted = 0 ORDER BY created_at DESC";
        return $this->db->query($sql);
    }

    // METHOD YANG DIPERBAIKI: Ambil detail barang dengan relasi lengkap
   // METHOD YANG DIPERBAIKI: Ambil detail barang dengan relasi lengkap
public function get_dpb_detail_with_relations($no_dpb)
{
    $sql = "SELECT a.id_prc_dpb, a.no_po, a.jenis_bayar, a.is_deleted, a.id_prc_rb, a.no_dpb, a.jml_beli, a.jml_materi, a.jml_ongkir, a.jml_ppn, a.jml_disc, 
        b.id_prc_rh, c.id_prc_ppb, d.id_prc_master_barang, d.no_budget, e.nama_barang, e.id_prc_master_supplier, e.kode_barang, e.spek, e.satuan, 
        f.id_prc_dpb_tf, f.tgl_dpb, f.id_prc_dpb_tf, g.nama_supplier, h.jml_diterima AS jumlah_diterima 
        FROM tb_prc_dpb a
        LEFT JOIN tb_prc_rb b ON a.id_prc_rb = b.id_prc_rb
        LEFT JOIN tb_prc_rh c ON b.id_prc_rh = c.id_prc_rh
        LEFT JOIN tb_prc_ppb d ON c.id_prc_ppb = d.id_prc_ppb
        LEFT JOIN tb_prc_master_barang e ON d.id_prc_master_barang = e.id_prc_master_barang
        LEFT JOIN tb_prc_dpb_tf f ON f.id_prc_dpb_tf = a.id_prc_dpb_tf
        LEFT JOIN tb_prc_master_supplier g ON e.id_prc_master_supplier = g.id_prc_master_supplier
        LEFT JOIN tb_adm_dpb h ON f.id_prc_dpb_tf = h.id_prc_dpb_tf
        WHERE a.is_deleted = 0 AND a.no_dpb = '$no_dpb'";
    
    return $this->db->query($sql)->result_array();
}

    // METHOD BARU: Cek apakah data ada
    public function check_dpb_exists($no_dpb)
    {
        $sql = "SELECT COUNT(*) as total FROM tb_prc_dpb_tf WHERE no_dpb = '$no_dpb' AND is_deleted = 0";
        $result = $this->db->query($sql)->row_array();
        return $result['total'] > 0;
    }

    public function get_rb()
    {
        $sql = "SELECT * FROM tb_prc_rb_tf WHERE is_deleted = 0";
        return $this->db->query($sql);
    }

    public function generate_no_dpb()
    {
        $this->db->select('no_dpb');
        $this->db->from('tb_prc_dpb_tf');
        $this->db->order_by('id_prc_dpb_tf', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $last_no = $query->row()->no_dpb;
            $last_number = (int)$last_no;
            $new_number = $last_number + 1;
        } else {
            $new_number = 1;
        }

        return str_pad($new_number, 4, '0', STR_PAD_LEFT);
    }

    public function data_no_budget($no_rb)
    {
        $sql = "SELECT a.no_rb, a.is_deleted, b.id_prc_rh, b.id_prc_rb, c.id_prc_ppb, c.jumlah_rh, c.harga_rh, c.total_rh, d.no_budget, e.nama_barang, e.spek, e.satuan FROM tb_prc_rb_tf a
        LEFT JOIN tb_prc_rb b ON a.no_rb = b.no_rb
        LEFT JOIN tb_prc_rh c ON b.id_prc_rh = c.id_prc_rh
        LEFT JOIN tb_prc_ppb d ON c.id_prc_ppb = d.id_prc_ppb
        LEFT JOIN tb_prc_master_barang e ON d.id_prc_master_barang = e.id_prc_master_barang
        WHERE a.is_deleted = 0 AND a.no_rb = '$no_rb'";
        return $this->db->query($sql)->result_array();
    }

    public function add($data)
    {
        $id_user = $this->id_user();
        $sql = "
        INSERT INTO tb_adm_dpb ( tgl_dpb, jml_diterima, no_batch, created_at, created_by)
        VALUES ('$data[tgl_dpb]', '$data[jml_diterima]',  '$data[no_batch]', NOW(), '$id_user')
        ";
        return $this->db->query($sql);
    }

    public function add_barang($data)
    {
        return $this->db->insert('tb_prc_dpb', $data);
    }

    public function delete($id_adm_dpb)
    {
       $sql = "UPDATE tb_adm_dpb SET is_deleted = 1 WHERE id_adm_dpb='$id_adm_dpb'";
       $this->db->query($sql);
       $sql = "UPDATE tb_adm_dpb SET is_deleted = 1 WHERE id_adm_dpb='$id_adm_dpb'";
       return $this->db->query($sql);
    }
}
?>