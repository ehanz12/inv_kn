<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_permintaan_barang_melting extends CI_Model
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
            SELECT a.*,b.nama_operator,b.status,c.nama_barang,d.nama_supplier,e.mfg,e.exp FROM tb_gbb_permintaan_barang a
            LEFT JOIN tb_transfer_slip b ON a.no_transfer_slip = b.no_transfer_slip
            LEFT JOIN tb_prc_barang c ON a.id_barang = c.id_barang
            LEFT JOIN tb_prc_supplier d ON a.id_supplier = d.id_supplier
            LEFT JOIN tb_gbb_barang_masuk e ON a.id_barang_masuk = e.id_barang_masuk
            WHERE a.is_deleted = 0 ORDER BY a.tgl ASC";
        return $this->db->query($sql);
    }

    public function get1($id = null)
    {
        $sql = "
            SELECT a.*, b.nama_operator FROM tb_mlt_permintaan_barang_tf a
            LEFT JOIN tb_user b ON a.id_user = b.id_user
            WHERE a.is_deleted = 0 ORDER BY a.tgl_permintaan ASC";
        return $this->db->query($sql);
    }
    public function data_permintaan_barang($no_transfer_slip)
    {
        $sql = "
            SELECT a.*,c.nama_barang,c.satuan,d.nama_supplier,b.mfg,b.exp FROM tb_gbb_permintaan_barang a
            LEFT JOIN tb_gbb_barang_masuk b ON a.id_barang_masuk = b.id_barang_masuk
            LEFT JOIN tb_prc_barang c ON a.id_barang = c.id_barang
            LEFT JOIN tb_prc_supplier d ON a.id_supplier = d.id_supplier
            LEFT JOIN tb_transfer_slip e ON a.no_transfer_slip = e.no_transfer_slip
            WHERE a.no_transfer_slip = '$no_transfer_slip' AND a.is_deleted = 0 AND e.is_deleted = 0 ORDER BY a.no_batch ASC";
        return $this->db->query($sql);
    }
    public function cek_transfer_slip($no_transfer_slip)
    {
        $sql = "
            SELECT COUNT(a.no_transfer_slip) count_sj FROM tb_transfer_slip a
            WHERE a.no_transfer_slip = '$no_transfer_slip' AND a.is_deleted = 0";
        return $this->db->query($sql);
    }
    public function add_transfer_slip($data)
    {
        $id_user = $this->id_user();
        $sql = "
        INSERT INTO `tb_mlt_permintaan_barang_tf`(`no_urut`, `tgl_permintaan`, `id_user`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) 
        VALUES ('$data[no_urut]','$data[tgl_permintaan]','$id_user','Proses',NOW(),'$id_user','0000-00-00 00:00:00','','0')
        ";
        return $this->db->query($sql);
    }

    public function add_permintaan_barang($d)
    {
        $id_user = $this->id_user();
        $sql = "
        INSERT INTO tb_mlt_permintaan_barang (no_urut, id_adm_bm, id_prc_master_barang, jml_permintaan, id_user, created_at, created_by, updated_at, updated_by, is_deleted)
        VALUE('$d[no_urut]', '$d[id_adm_bm]', '$d[id_prc_master_barang]', '$d[jml_permintaan]', '$id_user', 'NOW()', '$id_user', '0000-00-00', 0, 0)
        ";
        return $this->db->query($sql);
    }

    public function delete_barang($data)
    {
        $sql = "
        DELETE FROM tb_mlt_permintaan_barang WHERE no_urut='$data[no_urut]'
        ";
        return $this->db->query($sql);
    }

    public function update_status_pb($id_transfer_slip, $status)
    {
        $sql = "
        UPDATE `tb_transfer_slip`
        SET `status`='$status'
        WHERE `id_transfer_slip`='$id_transfer_slip';
        ";
        return $this->db->query($sql);
    }
    public function update($data)
    {
        $id_user = $this->id_user();
        $sql = "
            UPDATE tb_mlt_permintaan_barang_tf 
            SET tgl_permintaan='$data[tgl_permintaan]', updated_at='NOW()', updated_by='$id_user'
            WHERE no_urut='$data[no_urut]'
        ";
        return $this->db->query($sql);
        // return $sql;
    }


    public function delete($no_urut)
    {
        $id_user = $this->id_user();

        $sql1 = "
            DELETE FROM `tb_mlt_permintaan_barang` 
            WHERE `no_urut`='$no_urut'
        ";
        $sql = "
           DELETE FROM `tb_mlt_permintaan_barang_tf`
            WHERE `no_urut`='$no_urut'
        ";
        $this->db->query($sql);
        return $this->db->query($sql1);
    }

    public function jml_permintaan_barang($data)
    {
        $sql = "
            SELECT sum(qty) tot_permintaan_barang FROM `tb_mlt_melting_masuk` WHERE no_batch='$data[no_batch]' AND is_deleted = 0";
        return $this->db->query($sql);
    }
    public function jml_permintaan_barang2($data)
    {
        $sql = "
            SELECT sum(a.qty) tot_permintaan_barang FROM `tb_gbb_permintaan_barang` a 
            LEFT JOIN tb_barang_masuk b ON a.no_batch = b.no_batch 
            WHERE b.id_barang ='$data[id_barang]' AND a.is_deleted = 0";
        return $this->db->query($sql);
    }
    // public function status($data)
    // {
    //     $sql = "
    //         SELECT sum(a.status) status FROM `tb_transfer_slip` a 
    //         LEFT JOIN tb_permintaan_barang b ON a.no_transfer_slip = b.no_transfer_slip 
    //         WHERE b.id_barang ='$data[id_barang]' AND a.is_deleted = 0";
    //     return $this->db->query($sql);
    // }
    public function ambil_transfer_slip($no_transfer_slip = null)
    {
        $sql = "
            SELECT a.*,b.nama_operator,b.alamat FROM tb_transfer_slip a
            LEFT JOIN tb_user b ON a.nama_operator = b.nama_operator
            WHERE a.is_deleted = 0 AND a.no_transfer_slip = '$no_transfer_slip' ORDER BY a.created_at DESC";
        return $this->db->query($sql);
    }

    public function get_by_no_urut($no_urut)
    {
        $sql = "
        SELECT a.id_mlt_permintaan_barang, a.id_adm_bm, a.no_urut ,a.is_deleted, a.id_prc_master_barang,a.jml_permintaan, b.satuan ,b.nama_barang,b.id_prc_master_supplier,c.no_batch, d.nama_supplier  FROM tb_mlt_permintaan_barang a 
        LEFT JOIN tb_prc_master_barang b ON a.id_prc_master_barang = b.id_prc_master_barang
        LEFT JOIN tb_adm_barang_masuk c ON a.id_adm_bm = c.id_adm_bm
        LEFT JOIN tb_prc_master_supplier d ON b.id_prc_master_supplier = d.id_prc_master_supplier
        WHERE a.is_deleted = 0 AND a.no_urut='$no_urut'
        ";

        return $this->db->query($sql)->result_array();
    }


    public function generate_no_urut()
    {
        $prefix = 'MLT';

        $this->db->select('no_urut');
        $this->db->from('tb_mlt_permintaan_barang_tf');
        $this->db->like('no_urut', $prefix . '-', 'after');
        $this->db->order_by('id_permintaan_barang_tf', 'DESC');
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $last_no = $query->row()->no_urut;

            // Ambil angka setelah "MLT-"
            $last_number = (int) str_replace($prefix . '-', '', $last_no);
            $new_number = $last_number + 1;
        } else {
            $new_number = 1;
        }

        // Format: MLT-001
        return $prefix . '-' . str_pad($new_number, 3, '0', STR_PAD_LEFT);
    }
}
