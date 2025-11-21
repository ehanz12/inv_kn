<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_prc_dpb extends CI_Model
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
        $sql = "SELECT * FROM tb_prc_dpb_tf";
        return $this->db->query($sql);
    }

    public function get_rb()
    {
        $sql = "SELECT * FROM tb_prc_rb_tf";

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

            // Ambil angka, misal "0012" → 12
            $last_number = (int)$last_no;
            $new_number = $last_number + 1;
        } else {
            $new_number = 1;
        }

        // generate format 4 digit: 0001, 0002, ... 0100, 1000
        return str_pad($new_number, 4, '0', STR_PAD_LEFT);
    }

    public function data_no_budget($no_rb)
    {
        $sql = "SELECT a.no_rb, a.is_deleted, b.id_prc_rh, b.id_prc_rb, c.id_prc_ppb, c.jumlah_rh, c.harga_rh, c.total_rh, d.no_budget,e.kode_barang, e.nama_barang, e.spek, e.satuan FROM tb_prc_rb_tf a
        LEFT JOIN tb_prc_rb b ON a.no_rb = b.no_rb
        LEFT JOIN tb_prc_rh c ON b.id_prc_rh = c.id_prc_rh
        LEFT JOIN tb_prc_ppb d ON c.id_prc_ppb = d.id_prc_ppb
        LEFT JOIN tb_prc_master_barang e ON d.id_prc_master_barang = e.id_prc_master_barang
        WHERE a.is_deleted = 0 AND a.no_rb = '$no_rb'
        ";
        return $this->db->query($sql)->result_array();
    }

    public function data_barang_dpb($no_dpb)
    {
        $sql = "SELECT a.id_prc_dpb, a.no_po, a.jenis_bayar ,a.is_deleted, a.id_prc_rb, a.no_dpb, a.jml_beli, a.jml_materi, a.jml_ongkir, a.jml_ppn, a.jml_disc, 
        b.id_prc_rh, c.id_prc_ppb, d.id_prc_master_barang, d.no_budget, e.nama_barang, e.kode_barang,e.spek, e.satuan FROM tb_prc_dpb a
        LEFT JOIN tb_prc_rb b ON a.id_prc_rb = b.id_prc_rb
        LEFT JOIN tb_prc_rh c ON b.id_prc_rh = c.id_prc_rh
        LEFT JOIN tb_prc_ppb d ON c.id_prc_ppb = d.id_prc_ppb
        LEFT JOIN tb_prc_master_barang e ON d.id_prc_master_barang = e.id_prc_master_barang
        WHERE a.is_deleted = 0 AND a.no_dpb = '$no_dpb'";
        
        return $this->db->query($sql)->result_array();
    }

    public function add($data)
    {
        $id_user = $this->id_user();
        $sql = "
        INSERT INTO tb_prc_dpb_tf (no_dpb, tgl_dpb, no_sjl, prc_admin, created_at, created_by)
        VALUES ('$data[no_dpb]', '$data[tgl_dpb]','$data[no_sjl]', '$id_user', NOW(), '$id_user')
        ";
        return $this->db->query($sql);
    }

    public function add_barang($data)
    {
        return $this->db->insert('tb_prc_dpb', $data);
    }

    public function delete($no_dpb)
    {
       $sql ="DELETE FROM tb_prc_dpb WHERE no_dpb='$no_dpb'";
       $this->db->query($sql);
       $sql = "DELETE  FROM tb_prc_dpb_tf WHERE no_dpb='$no_dpb'";
       return $this->db->query($sql);
    }

}
?>