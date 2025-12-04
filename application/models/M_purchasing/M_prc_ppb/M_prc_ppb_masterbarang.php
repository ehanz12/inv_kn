<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_prc_ppb_masterbarang extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function id_user()
    {
        return $this->session->userdata("id_user");
    }

    public function get($nama_barang = null, $jenis_barang = null)
    {
        if ($nama_barang == null) {
            $where[] = "";
        } else {
            $where[] = "AND a.nama_barang = '$nama_barang'";
        }

        if ($jenis_barang == null) {
            $where[] = "";
        } else {
            $where[] = "AND a.jenis_barang= '$jenis_barang'";
        }

        $where = implode(" ", $where);

        $sql = "
        SELECT a.*,b.nama_supplier
        FROM tb_prc_master_barang a
        LEFT JOIN tb_prc_master_supplier b ON a.id_prc_master_supplier = b.id_prc_master_supplier
        WHERE a.is_deleted = 0 $where ORDER BY kode_barang ASC";
        return $this->db->query($sql);
    }


    public function update_supplier($data)
    {
        $id_user = $this->id_user();
        $sql = "
            UPDATE tb_prc_master_barang 
            SET id_prc_master_supplier='$data[id_prc_master_supplier]',
                tipe_barang='$data[tipe_barang]',
                updated_at= NOW(),
                updated_by='$id_user' 
            WHERE id_prc_master_barang='$data[id_prc_master_barang]'
        ";
        return $this->db->query($sql);
    }

    public function get_filter_brng()
    {
        $sql = "SELECT DISTINCT nama_barang FROM tb_prc_master_barang WHERE is_deleted = 0 ORDER BY nama_barang ASC";
        return $this->db->query($sql)->result_array();
    }

    public function get_master_barang()
    {
        $sql = "SELECT 
        *,
        (COALESCE(`in`, 0) - COALESCE(`out`, 0)) AS stok
    FROM 
        tb_prc_master_barang
    WHERE 
        is_deleted = 0
    ORDER BY 
        nama_barang ASC;

";
        return $this->db->query($sql)->result_array();
    }

    public function add($data)
    {
        $id_user = $this->id_user();
        $sql = "
        INSERT INTO tb_prc_master_barang (id_prc_master_supplier,kode_barang, nama_barang, jenis_barang, tipe_barang, departement,lab_test,spek,mesh,bloom ,satuan, created_at, created_by, updated_at, updated_by, is_deleted) 
        VALUES ('$data[id_prc_ppb_supplier]','$data[kode_barang]', '$data[nama_barang]', '$data[jenis_barang]', '$data[tipe_barang]','$data[departement]','$data[lab_test]','$data[spek]','$data[mesh]','$data[bloom]','$data[satuan]', NOW(), '$id_user', '0000-00-00', '', '0')
        ";
        return $this->db->query($sql);
    }

    public function update($data)
    {
        $id_user = $this->id_user();
        $sql = "
            UPDATE tb_prc_master_barang 
            SET id_prc_master_supplier='$data[id_prc_master_supplier]',
                kode_barang='$data[kode_barang]',
                nama_barang='$data[nama_barang]',
                jenis_barang='$data[jenis_barang]',
                tipe_barang='$data[tipe_barang]',
                spek='$data[spek]',
                mesh='$data[mesh]',
                bloom='$data[bloom]',
                satuan='$data[satuan]',
                departement='$data[departement]',
                updated_at= NOW(),
                updated_by='$id_user' 
            WHERE id_prc_master_barang='$data[id_prc_master_barang]'
        ";
        return $this->db->query($sql);
    }

    public function delete($data)
    {
        $sql = "
        DELETE FROM tb_prc_master_barang
         WHERE id_prc_master_barang='$data[id_prc_master_barang]'
        ";
        return $this->db->query($sql);
    }


    public function cek_kode_barang($kode_barang)
    {
        $sql = "
            SELECT COUNT(a.kode_barang) count_sj FROM tb_prc_master_barang a
            WHERE a.kode_barang = '$kode_barang' AND a.is_deleted = 0";
        return $this->db->query($sql);
    }
}
?>