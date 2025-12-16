<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_barang_keluar_melting extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function id_user()
    {
        return $this->session->userdata("id_user");
    }


   public function trans_keluar($data)
    {
        $id_user = $this->id_user();
        $post_data = array(
            'id_mm' => $data['id_mm'],
            'qty' => $data['qty'],
            'id_prc_master_barang' => $data['id_prc_master_barang'],
            'batch_keluar' => $data['batch_keluar'],
            'created_by' => $id_user,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_by' => '',
            'updated_at' => '0000-00-00 00:00:00',
            'is_deleted' => '0'
        );
        $this->db->insert('tb_mlt_melting_keluar', $post_data);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }

    public function delete($id_mm)
    {
        $this->db->where('id_mm', $id_mm);
        $this->db->delete('tb_mlt_melting_keluar');
        return $this->db->affected_rows();
    }
   
    public function delete_by_batch_masak($batch_masak)
    {
        $sql = "
        DELETE FROM tb_mlt_melting_keluar WHERE batch_keluar = '$batch_masak'
        ";

        return $this->db->query($sql);
    }
}
