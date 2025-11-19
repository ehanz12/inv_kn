<?php

use Mpdf\Tag\P;

defined('BASEPATH') or exit('No direct script access allowed');

class M_prc_rb extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function convertDate($date)
{
    if (!$date || $date == "" || $date == "0000-00-00") {
        return null;
    }

    // Format dari datepicker biasanya dd/mm/yyyy
    $exp = explode("/", $date);

    if (count($exp) == 3) {
        return $exp[2] . "-" . $exp[1] . "-" . $exp[0];
    }

    // Kalau format sudah yyyy-mm-dd langsung return
    return $date;
}


    function id_user()
    {
        return $this->session->userdata("id_user");
    }

    public function get()
    {
        $sql = "SELECT * FROM tb_prc_rb_tf
        ORDER BY id_prc_rb_tf ASC";
        return $this->db->query($sql);
    }
    public function get_2()
    {
        $sql = "
            SELECT a.*,b.id_prc_rh ,c.id_prc_ppb, c.harga_rh, c.jumlah_rh, c.total_rh, d.id_prc_master_barang, e.id_prc_master_supplier, e.nama_barang, e.satuan, e.kode_barang, f.nama_supplier
            FROM tb_prc_rb_tf a
            LEFT JOIN tb_prc_rb b ON a.no_rb = b.no_rb
            LEFT JOIN tb_prc_rh c ON b.id_prc_rh = c.id_prc_rh
            LEFT JOIN tb_prc_ppb d ON c.id_prc_ppb = d.id_prc_ppb
            LEFT JOIN tb_prc_master_barang e ON d.id_prc_master_barang = e.id_prc_master_barang
            LEFT JOIN tb_prc_master_supplier f ON e.id_prc_master_supplier = f.id_prc_master_supplier
            WHERE a.is_deleted = 0 AND b.is_deleted = 0 AND c.is_deleted = 0 AND d.is_deleted = 0 AND e.is_deleted = 0 AND f.is_deleted = 0
            ORDER BY a.id_prc_rb_tf ASC
            ";
        return $this->db->query($sql);
    }

        public function generate_no_rb()
    {
        $this->db->select('no_rb');
        $this->db->from('tb_prc_rb_tf');
        $this->db->order_by('id_prc_rb_tf', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $last_no = $query->row()->no_rb;

            // Ambil angka, misal "0012" → 12
            $last_number = (int)$last_no;
            $new_number = $last_number + 1;
        } else {
            $new_number = 1;
        }

        // generate format 4 digit: 0001, 0002, ... 0100, 1000
        return str_pad($new_number, 4, '0', STR_PAD_LEFT);
    }

    public function add_2()
    {
        $data = [
            'no_rb'         => $this->input->post('no_rb', TRUE),
            'tgl_rb'        => $this->convertDate($this->input->post('tgl_rb', TRUE)),
            'prc_admin'     => $this->session->userdata('id_user'),
            'created_at'    => date('Y-m-d H:i:s'),
            'created_by'    => $this->session->userdata('id_user'),
            'is_deleted'    => 0
        ];

        return $this->db->insert('tb_prc_rb_tf', $data);
    }

    public function add($data)
    {
        $this->db->insert('tb_prc_rb', $data);
    }
    public function update_barang($data)
    {
        $this->db->insert('tb_prc_rb', $data);
    }

    public function update($data)
    {
        $id_user = $this->session->userdata('id_user');
        $sql ="UPDATE tb_prc_rb_tf SET 
            tgl_rb = '$data[tgl_rb]',
            updated_at = '".date('Y-m-d H:i:s')."',
            updated_by = '".$id_user."'
            WHERE no_rb = '$data[no_rb]'
        ";
        return $this->db->query($sql);
    }

    public function delete_barang($no_rb) {
    $this->db->where('no_rb',$no_rb);
    return $this->db->delete('tb_prc_rb'); // ganti sesuai nama tabelmu
    }

    public function data_print_rb($no_rb)
    {
        $sql = "
        SELECT 
            a.*, 
            b.id_prc_rh, 
            c.id_prc_ppb, c.harga_rh, c.jumlah_rh, c.total_rh, 
            d.id_prc_master_barang, d.no_ppb, 
            e.id_prc_master_supplier, e.nama_barang, e.satuan, e.kode_barang, e.spek,
            f.nama_supplier
        FROM tb_prc_rb_tf a
        LEFT JOIN tb_prc_rb b ON a.no_rb = b.no_rb
        LEFT JOIN tb_prc_rh c ON b.id_prc_rh = c.id_prc_rh
        LEFT JOIN tb_prc_ppb d ON c.id_prc_ppb = d.id_prc_ppb
        LEFT JOIN tb_prc_master_barang e ON d.id_prc_master_barang = e.id_prc_master_barang
        LEFT JOIN tb_prc_master_supplier f ON e.id_prc_master_supplier = f.id_prc_master_supplier
        WHERE a.no_rb = '$no_rb' AND a.is_deleted = 0 AND b.is_deleted = 0 AND c.is_deleted = 0 AND d.is_deleted = 0 AND e.is_deleted = 0 AND f.is_deleted = 0";
        return $this->db->query($sql);
}
    public function get_rb($no_rb)
    {
        $sql = "SELECT a.*,
        b.id_prc_rh,
        c.id_prc_ppb,
        e.no_ppb
        FROM tb_prc_rb_tf a 
        LEFT JOIN tb_prc_rb b ON a.no_rb = b.no_rb
        LEFT JOIN tb_prc_rh c ON b.id_prc_rh = c.id_prc_rh
        LEFT JOIN tb_prc_ppb e ON c.id_prc_ppb = e.id_prc_ppb
        WHERE a.no_rb = '$no_rb' AND a.is_deleted = 0";
        return $this->db->query($sql)->row();
    }

    public function get_approve()
    {

    }
}
?>