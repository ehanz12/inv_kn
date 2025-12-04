<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_sk_master_barang extends CI_Model
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
        $sql = "SELECT * FROM tb_sk_masterbarang WHERE is_deleted = 0 ORDER BY kode_barang DESC";

        return $this->db->query($sql);
    }

    public function add($data)
    {
        $id_user = $this->id_user();
        $sql = "
        INSERT INTO `tb_sk_masterbarang`(`nama_barang`, `spek`, `unit`,`created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) 
        VALUES ('$data[nama_barang]','$data[spek]','$data[unit]',NOW(),'$id_user','0000-00-00 00:00:00','','0')
        ";

        return $this->db->query($sql);
    }
    public function update($data)
    {
        $id_user = $this->id_user();
        $sql = "
            UPDATE `tb_sk_masterbarang` 
            SET `nama_barang`='$data[nama_barang]',
                `spek`='$data[spek]',
                `unit`='$data[unit]',
                `updated_at` = NOW(),`updated_by`='$id_user' 
            WHERE `id_sk_barang`='$data[id_sk_barang]'
        ";
        return $this->db->query($sql);
        // return $sql;
    }


    public function delete($data)
    {
        $id_user = $this->id_user();
        $sql = "
        DELETE FROM `tb_sk_masterbarang`
         WHERE `id_sk_barang`='$data[id_sk_barang]'
        ";
        return $this->db->query($sql);
    }

    public function get_stock_by_id($id_barang)
{
    // Ambil stok terbaru
    $this->db->select('COALESCE(SUM(b.jumlah_masuk), 0) - COALESCE(SUM(k.jumlah_keluar), 0) AS stok');
    $this->db->from('tb_sk_masterbarang a');
    $this->db->join('tb_sk_barang_masuk b', 'a.id_sk_barang = b.id_sk_barang', 'left');
    $this->db->join('tb_sk_barang_keluar k', 'a.id_sk_barang = k.id_sk_barang', 'left');
    $this->db->where('a.id_sk_barang', $id_barang);
    $query = $this->db->get();
    $result = $query->row_array();
    return $result['stok'];
}

}
